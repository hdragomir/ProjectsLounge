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
    
    public function login(){

	//Check if already logged in
	if (Auth::instance()->logged_in('login')) {
		url::redirect('index');
	}
 
	//Initialize template and form fields
	$view = View::factory( 'profiles/login' );
	$view->username = '';
	$view->password = '';
 
	//Attempt login if form was submitted
	if ($post = $this->input->post()) {
		if (ORM::factory('user')->login($post)) {
			url::redirect($this->session->get('requested_url'));
		} else {
			$view->username = $post['username']; //Redisplay username (but not password) when form is redisplayed.
			$view->message = in_array('required', $post->errors()) ? 'Username and password are required.' : 'Invalid username and/or password.';
		}
	}
 
	//Display login form
	//$view->render(TRUE);
       
        $this->template->content = $view;
    }

    public function register(){
        
    }
}