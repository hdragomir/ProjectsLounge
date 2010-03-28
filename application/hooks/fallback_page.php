<?php defined('SYSPATH') OR die('No direct access allowed.');

Event::add('system.post_routing' ,'call_fallback_page');

function call_fallback_page()
{
    if (Router::$controller === NULL)
    {
        Router::$controller = 'fallback_page';
        Router::$method = 'find_view';
        Router::$controller_path = APPPATH.'controllers/fallback_page.php';
    }
}