<?php

class HTMLPage{

    public static $styles = array();


    public static function add_style( $url ){

        self::$styles[] = url::site( "media/css/$url.css" );
    }
    
    
    public function body_class( $add = null ){
        
        $body_class = implode( ' ',  Router::$segments );
        if( empty( $body_class ) )
            $body_class = 'home';
        
        if( null !== $add )
            $body_class = "$body_class $add";
        
        return $body_class;
    }
}