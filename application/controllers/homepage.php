<?php defined('SYSPATH') OR die('No direct access allowed.');

class Homepage_Controller extends Template_Controller {

    public $template = 'base';

    public function index(){
        
    }

    public function __call($method, $arguments){


        $this->auto_render = FALSE;
        echo '404';
    }

} // End Welcome Controller