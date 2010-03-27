<?php defined('SYSPATH') OR die('No direct access allowed.');

class Homepage_Controller extends Template_Controller {

    public $template = 'base';


    public function index(){

        if( ! Auth::instance()->logged_in( 'login' ) )
            Auth::instance()->force_login( 'user@projectslounge.com' );
        var_export( Auth::instance()->get_user()->projects );
    }


    public function __call($method, $arguments){

        $this->auto_render = FALSE;
        echo '404';
    }

}