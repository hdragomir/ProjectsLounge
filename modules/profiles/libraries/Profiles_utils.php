<?php

class Profiles_utils{
    
    
    public static function reserve_email_if_available( $email ){
        
        $user = ORM::factory( 'user' );
        if( $user->email_available( $email ) ){
            $user->email = $email;
            $user->save();
        }
    }
    
    
    public static function list_profiles_view( $profiles ){
        
        $content = '';
        $view = View::factory( 'profiles/list-item' );
        foreach( $profiles as $profile )
            $content .= $view->bind( 'profile', $profile );
            
        return $content;
    }
}