<?php defined('SYSPATH') OR die('No direct access allowed.');

if( 'localhost' == $_SERVER['SERVER_NAME']
   || 'projectslounge.diz' == $_SERVER['SERVER_NAME'] )

$config['default'] = array(
    'benchmark'     => TRUE,
    'persistent'    => FALSE,
    'connection'    => array(
        'type'     => 'mysql',
        'user'     => 'root',
        'pass'     => 'root',
        'host'     => 'localhost',
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

else

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