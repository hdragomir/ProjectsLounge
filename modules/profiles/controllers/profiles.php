<?php

class Profiles_Controller extends Template_Controller{
    
    public $template = 'base';
    
    
    public function index(){
        
    }
    
    
    public function __call( $method, array $arguments ){
        
        return $this->profile( $method );
    }
    
    
    public function profile( $id ){
        
        $user = User_Model::current();
        $profile = ORM::factory( 'user', $id );
        if( ! $profile->loaded ){
            $this->template->content = 'user now found';
        }
        
        $connections = array();
        foreach( $profile->projects as $project )
            foreach( $project->users as $member )
                if( $member->id != $profile->id )
                    $connections[ $member->id ] = $member;
        
        $this->template->content = View::factory( 'profiles/view', compact( 'profile', 'user', 'connections' ) );
    }
    
    public function login(){
        
        
    }
}