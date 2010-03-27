<?php

class Profiles_Controller extends Template_Controller{
    
    public $template = 'base';
    
    
    public function index(){
        
    }
    
    
    public function __call( $method, array $arguments ){
        
        return $this->profile( $method );
    }
    
    
    public function profile( $id ){
        
        $profile = ORM::factory( 'user', $id );
        if( ! $profile->loaded ){
            echo 'user now found';
        }
        
        $this->template->content = View::factory( 'profiles/profile', compact( 'profile' ) );
    }
}