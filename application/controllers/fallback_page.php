<?php defined('SYSPATH') OR die('No direct access allowed.');

class Fallback_Page_Controller extends Template_Controller 
{
    public $template = 'base';

    public function find_view()
    {

// search for a view, and load it if it exists
        $path = '/' . implode('/', Router::$segments);
        if(Kohana::find_file('views', $path))
        {
            $this->template->content = new View($path);
        }

// display alternative content if not found

        else
        {
            $view = new View('four_oh_four');
            $view->route = Router::$segments; // passing the route in, for debug purposes
            $this->template->content = $view;
        }
    }

}