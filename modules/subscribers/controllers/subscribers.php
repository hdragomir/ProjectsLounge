<?php

class Subscribers_Controller extends Template_Controller{
    
    
    
    
    public function index()
    {
    }
    
    
    public function __call( $method, array $arguments )
    {
        return $this->subscribe( $method );
    }
    
    
    public function subscribe( $email )
    {
        if( $post = $this->input->post( 'subscriber' ) )
        {
            $subscriber = Subscribers_utils::add_subscriber( $post );
            if ( $subscriber->saved )
                url::redirect( 'http://projectslounge.com/thanks.html' );
            else
                url::redirect( 'http://projectslounge.com/error.html' );
        } else {
            url::redirect( 'http://projectslounge.com/' );
        }
    }

}