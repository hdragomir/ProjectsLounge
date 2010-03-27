<?php

class Tags_utils
{    
    
    public static function create_tag( array $data )
    {
        
        $tag = ORM::factory( 'tag' );
        
        $validation = new Validation( $data );
        
        $validation
            ->add_rules( 'name', 'required' );        
        
        $tag->validate( $validation, true );
        
        return $tag;
    }
    
}