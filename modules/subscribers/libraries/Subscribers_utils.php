<?php

class Subscribers_utils
{    
    
    public static function add_subscriber( array $data )
    {
        
        $subscriber = ORM::factory( 'subscriber' );
        
        $validation = new Validation( $data );
        
        $validation
            ->add_rules( 'email', 'required', 'valid::email' );        
        
        $subscriber->validate( $validation, true );
        
        return $subscriber;
    }
    
}