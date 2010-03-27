<?php

class Projects_Controller extends Template_Controller{
    
    public $template = 'base';
    
    
    public function index(){
        
        $projects = ORM::factory( 'project' )->find_all();
        $this->template->content = View::factory( 'projects/list' )
            ->bind( 'projects', $projects )
            ->bind( 'user', Auth::instance()->get_user() );
        
    }
    
    
    public function project( $id ){
        
        $data = array();
        
        $data[ 'project' ] = ORM::factory( 'project', $id );
        $data[ 'user' ] = Auth::instance()->get_user();
        $this->template->content = View::factory( 'projects/view', $data );
    }
    
    
    public function __call( $method, $arguments ){
        
        return $this->project( $method );
    }
    
    
    public function add(){
        
        $user = Auth::instance()->get_user();
        
        if( $post = $this->input->post( 'project' ) ){
            if( ! $user )
                return $this->template->content = 'You need to be logged in';
            
            $project = ORM::factory( 'project' );
        
            $validation = Projects_utils::projects_add_validation( $post );
            
            if( !$project->validate( $validation, true ) )
                return $this->template->content = Kohana::debug( $validation->errors() );

            $post_user_data = $this->input->post( 'user' );
            
            if( ! empty( $post_user_data[ 'role' ] ) )
                $project->set_user_roles( array( $user->id => $post_user_data[ 'role' ] ) );
            
            return url::redirect( $project->url );
            
        } else {
            
            $this->template->content = new View( 'projects/add' );
            $this->template->content->project_types = Projects_utils::get_project_types_dropdown_array();
            $this->template->content->user = $user;
        }
    }
    
    
    public function edit( $id ){
        
        $user = Auth::instance()->get_user();

        $project = ORM::factory( 'project', $id );
        if( ! $project->user_can( $user, 'edit' ) )
            return $this->template->content = 'oh, come on!';
        
        if( $post = $this->input->post( 'project' ) ){
            
            $validation = Projects_utils::projects_edit_validation( $post );
            
            $project->validate( $validation, true );
            
            url::redirect( $project->url );
        } else {
            $this->template->content = View::factory( 'projects/edit' )
                                    ->bind( 'project_types', Projects_utils::get_project_types_dropdown_array() )
                                    ->bind( 'project', $project )
                                    ->bind( 'user', $user );
        }
    }
    
}