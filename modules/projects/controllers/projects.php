<?php

class Projects_Controller extends Template_Controller{
    
    
    

    public function __construct(){
        
        HTMLPage::add_style( 'projects' );
        
        parent::__construct();
    }
    
    public function index(){
        
        $projects = ORM::factory( 'project' )->find_all();
        $this->template->content = View::factory( 'projects/list' )
            ->bind( 'projects', $projects )
            ->bind( 'user', User_Model::current() );
        
    }
    
    
    public function project( $id ){
        
        $data = array();
        $data[ 'project' ] = ORM::factory( 'project', $id );
        $data[ 'user' ] = User_Model::current();
        $this->template->content = View::factory( 'projects/view', $data );
    }
    
    
    public function __call( $method, $arguments ){
        
        return $this->project( $method );
    }
    
    
    public function add(){
        
        $user = User_Model::current();
        
        if( $post = $this->input->post( 'project' ) ){
            if( ! $user->loaded )
                return $this->template->content = 'You need to be logged in';
            
            $project = ORM::factory( 'project' );
        
            $validation = Projects_utils::projects_add_validation( $post );
            
            if( !$project->validate( $validation, true ) )
                return $this->template->content = Kohana::debug( $validation->errors() );

            $post_user_data = $this->input->post( 'user' );
            
            if( empty( $post_user_data[ 'role' ] ) )
                return $this->template->content = 'What was your role?!';
            
            $project->add_user_roles( array( $user->id => $post_user_data[ 'role' ] ) );
            
            if( ! empty( $_FILES ) ){
                
                $image_file = $_FILES[ 'screenshot' ];
                
                if( ! $image_file[ 'error' ] ){
                    $image = new Image( $image_file[ 'tmp_name' ] );
                    if( $image->width > 547 )
                        $image->resize( 547, null );
                    $image->save( DOCROOT . '/media/project-images/' . $project->id . '.jpg' );
                }
                
                $image_file = $_FILES[ 'logo' ];
                if( ! $image_file[ 'error' ] ){
                    $image = new Image( $image_file[ 'tmp_name' ] );
                    if( $image->width > 60 )
                        $image->resize( 90, 90, Image::AUTO );
                    $image->crop( 60, 60, 'center' )
                    ->save( DOCROOT . '/media/project-images/' . $project->id . '-tiny.jpg' );
                }
                

                
            }
            
            return url::redirect( $project->local_url );
            
        } else {
            HTMLPage::add_style( 'forms' );
            $this->template->content = new View( 'projects/add' );
            $this->template->content->project_types = Projects_utils::get_project_types_dropdown_array();
            $this->template->content->user = $user;
        }
    }
    
    
    public function edit( $id ){

        $user = User_Model::current();
        $project = ORM::factory( 'project', $id );
        if( ! $user->loaded && $project->user_can( $user, 'edit' ) )
            return $this->template->content = 'oh, come on!';
        
        if( $post = $this->input->post( 'project' ) ){
            
            $validation = Projects_utils::projects_edit_validation( $post );
            
            if( ! $project->validate( $validation, true ) )
                return $this->template->content = Kohana::debug( $validation->errors() );
            
            if( $additional_user_emails = $this->input->post( 'additional_user_emails' ) ){
                $additional_user_roles = $this->input->post( 'additional_user_roles' );
                foreach( $additional_user_emails as $email )
                    Profiles_utils::reserve_email_if_available( $email );
                $additional_users = array_combine( $additional_user_emails, $additional_user_roles );
                
                $project->add_user_roles( $additional_users );
            }
            
            url::redirect( $project->local_url );
            
        } else {
            HTMLPage::add_style( 'forms' );
            $this->template->content = View::factory( 'projects/edit' )
                                    ->bind( 'project_types', Projects_utils::get_project_types_dropdown_array() )
                                    ->bind( 'project', $project )
                                    ->bind( 'user', $user );
        }
    }
}
