<?php defined('SYSPATH') OR die('No direct access allowed.');

class Fallback_Page_Controller extends Template_Controller {
    public $template = 'base';

    public function find_view(){
        $path = implode( '_', Router::$segments );
        if( Kohana::find_file( 'views/flat-pages', $path ) ){
            $this->template->content = new View( "flat-pages/$path" );
        } else {
            $view = new View( 'four_oh_four' );
            $view->route = Router::$segments; // passing the route in, for debug purposes
            $this->template->content = $view;
        }
    }

}