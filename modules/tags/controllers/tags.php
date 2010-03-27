<?php

class Tags_Controller extends Template_Controller{
    
    public $template = 'base';
    
    
    public function index()
    {
        return $this->all();
    }
    
    
    public function __call( $method, array $arguments )
    {
        return $this->tag( $method );
    }
    
    
    public function tag( $name )
    {
        $data = array();
        $data[ 'tag' ] = ORM::factory( 'tag' )->where( 'name', $name )->find();
        $this->template->content = View::factory( 'tags/view', $data );
    }

    public function all()
    {
        $data = array();
        $data[ 'tags' ] = ORM::factory( 'tag' )->find_all();
        $this->template->content = View::factory( 'tags/all', $data );
    }

    public function add( $name = null )
    {
        if( $post = $this->input->post( 'tag' ) )
        {
            $tag = Tags_utils::create_tag( $post );
            url::redirect( $tag->url );
            exit;
        } else {
            $this->template->content = new View( 'tags/add' );
        }
    }

}