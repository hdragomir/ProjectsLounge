<?php

class HTMLPage{

    public static $styles = array();


    public static function add_style( $url ){

        self::$styles[] = url::site( "media/css/$url.css" );
    }
}