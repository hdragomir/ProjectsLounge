<?php defined('SYSPATH') OR die('No direct access allowed.');

class Homepage_Controller extends Template_Controller {

    


    public function index(){

        $featured_projects = ORM::factory( 'project' )->orderby( 'id', 'desc' )->find_all( 5 );
        $featured_members = ORM::factory( 'user' )->find_all( 7 );
        
        $this->template->content = new View( 'homepage' );
        $this->template->content->featured_projects = $featured_projects;
        $this->template->content->featured_members = $featured_members;
        
    }


    public function __call($method, $arguments){

        $this->auto_render = FALSE;
        echo '404';
    }

}