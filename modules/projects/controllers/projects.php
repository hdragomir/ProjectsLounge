<?php

class Projects_Controller extends Template_Controller{
    
    public $template = 'base';
    
    
    public function index(){
        
        
    }
    
    
    public function project( $id ){
        
        $this->template->content = ORM::factory( 'project', $id )->name;
    }
    
    
    public function __call( $method, $arguments ){
        
        echo 'faling back';
        
        return $this->project( $method );
    }
    
    
    public function add(){
        
        if( $post = $this->input->post() ){
            
            $project = Projects_utils::createProject( $post[ 'project' ] )->save();
            url::redirect( $project->url );
            exit;
        } else {
            
            $this->template->content = new View( 'projects/add' );
            $this->template->content->project_types = projects_utils_Core::get_poject_types_dropdown_array();
        }
    }
    
    
    
    
}