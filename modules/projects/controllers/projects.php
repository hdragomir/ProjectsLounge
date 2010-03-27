<?php

class Projects_Controller extends Template_Controller{
    
    public $template = 'base';
    
    
    public function index(){
        
        
    }
    
    
    public function project( $id ){
        
        $data = array();
        
        $data[ 'project' ] = ORM::factory( 'project', $id );
        
        $this->template->content = View::factory( 'projects/view', $data );
    }
    
    
    public function __call( $method, $arguments ){
        
        return $this->project( $method );
    }
    
    
    public function add(){
        
        if( $post = $this->input->post( 'project' ) ){
            $user = Auth::instance()->get_user();
            if( ! $user )
                return $this->template->content = 'You need to be logged in';
            
            $project = ORM::factory( 'project' );
        
            $validation = new Validation( $post );
            
            $validation
                ->add_rules( 'name', 'required' )
                ->add_rules( 'project_type_id', 'required', 'numeric' );
            
            if( !$project->validate( $validation, true ) )
                return $this->template->content = Kohana::debug( $validation->errors() );

            $post_user_data = $this->input->post( 'user' );
            
            if( ! empty( $post_user_data[ 'role' ] ) )
                $project->set_user_roles( array( $user->id => $post_user_data[ 'role' ] ) );
            
            return url::redirect( $project->url );
            
        } else {
            
            $this->template->content = new View( 'projects/add' );
            $this->template->content->project_types = Projects_utils::get_poject_types_dropdown_array();
        }
    }
    
}