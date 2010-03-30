<?php

class Profiles_Controller extends Template_Controller{
    
    
    
    
    public function index(){
        
        $this->template->content = View::factory( 'profiles/list' )
            ->bind( 'profiles', ORM::factory( 'user' )->find_all() );
        
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

	//Check if already logged in
	if (Auth::instance()->logged_in('login')) {
		url::redirect( url::base() );
	}
 
	//Initialize template and form fields
	$view = View::factory( 'profiles/login' );
	$view->username = '';
	$view->password = '';
 
	//Attempt login if form was submitted
	if ($post = $this->input->post()) {
		if (ORM::factory('user')->login($post)) {
			url::redirect( '' );
		} else {
            $view->username = $post['username'];
			$view->message = in_array('required', $post->errors()) ? 'Username and password are required.' : 'Invalid username and/or password.';
		}
	}
 
	//Display login form
	//$view->render(TRUE);
       
        $this->template->content = $view;
    }

    public function logout(){
        
        Auth::instance()->logout();
        url::redirect();
    }
}