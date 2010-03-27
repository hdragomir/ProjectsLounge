<?php defined('SYSPATH') OR die('No direct access allowed.');

class Homepage_Controller extends Template_Controller {

    public $template = 'base';


    public function index(){

        if( ! Auth::instance()->logged_in() )
            Auth::instance()->force_login( 'user@projectslounge.com' );
        
        $this->template->content = new View( 'homepage' );
        
    }


    public function __call($method, $arguments){

        $this->auto_render = FALSE;
        echo '404';
    }

}