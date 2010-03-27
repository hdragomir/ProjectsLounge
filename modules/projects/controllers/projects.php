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
            
            $project = projects_utils::create_project( $post );
            url::redirect( $project->url );
            exit;
        } else {
            
            $this->template->content = new View( 'projects/add' );
            $this->template->content->project_types = projects_utils::get_poject_types_dropdown_array();
        }
    }
    
}