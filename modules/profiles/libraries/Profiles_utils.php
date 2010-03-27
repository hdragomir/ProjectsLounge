<?php

class Profiles_utils{
    
    
    public static function reserve_email_if_available( $email ){
        
        $user = ORM::factory( 'user' );
        if( $user->email_available( $email ) ){
            $user->email = $email;
            $user->save();
        }
    }
}