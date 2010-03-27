<?php defined('SYSPATH') OR die('No direct access allowed.');
$config['default'] = array(
    'benchmark'     => TRUE,
    'persistent'    => FALSE,
    'connection'    => array(
        'type'     => 'mysql',
        'user'     => 'projectslounge',
        'pass'     => 'valiugteam',
        'host'     => 'mysql.projectslounge.com',
        'port'     => FALSE,
        'socket'   => FALSE,
        'database' => 'projectslounge'
    ),
    'character_set' => 'utf8',
    'table_prefix'  => '',
    'object'        => TRUE,
    'cache'         => FALSE,
    'escape'        => TRUE
);
