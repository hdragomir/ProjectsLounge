<?php

class Contact_Controller extends Template_Controller{
    
    public function index(){
        
        
        if( $post = $this->input->post( 'contact' ) ){
            
            $validation = new Validation( $post );
            $validation
                ->pre_filter( 'trim' )
                ->add_rules( 'email', 'email', 'required' )
                ->add_rules( 'subject', 'required' )
                ->add_rules( 'body', 'required' );
            
            if( ! $validation->validate() )
                return $this->template->content = Kohana::debug( $validation->errors() );
            
            $post = $validation->as_array();
            
            $message = sprintf( "%s used the contact form to say: \n\n %s",
                                $post['email'], $post['body'] );
            
            $subject = sprintf( '[ProjectsLounge Contact] %s', $post['subject'] );
            
            
            email::send( 'horia@hdragomir.com', 'contact@projectslounge.com', $subject, $message );

            return url::redirect( 'contact/thanks' );
        }
        
        HTMLPage::add_style( 'forms' );
        HTMLPage::add_style( 'contact' );
        
        $this->template->content = View::factory( 'contact/form' );
    }
    
    
    public function thanks(){
        
        $this->template->content = View::factory( 'contact/thanks' );
    }
}
