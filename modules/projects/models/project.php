<?php

class Project_Model extends ORM{
    
    protected $belongs_to = array( 'project_type' );
    protected $has_and_belongs_to_many = array( 'users', 'tags' );
    protected $sorting = array( 'id' => 'desc' );
    
    
    public function __get( $prop ){
        
        if( 'local_url' == $prop )
            return url::site( "projects/{$this->id}" );
        
        if( 'image_url' == $prop ){
            $image_url = $this->has_image();
            return url::site( $image_url ? $image_url : 'media/images/project_thumb.png' );
        }
        
        if( 'tiny_image_url' == $prop ){
            $image_url = $this->has_image( 'tiny' );
            return url::site( $image_url ? $image_url : 'media/images/ferta_logo.png' );
        }
        
        return parent::__get( $prop );
    }
    
    
    public function __set( $prop, $value ){
        
        Kohana::log( 'debug', $prop . ' -> ' . Kohana::debug( $value ) );
        
        if( 'tags' == $prop && is_string( $value ) )
            return $this->set_tags( $value );

        return parent::__set( $prop, $value );
    }
    
    
    public function has_image( $which = 'screenshot' ){
        $tail = $this->id ;
        if( 'screenshot' != $which ){
            $tail .= "-$which";
        }
        $image_url = 'media/project-images/' . $tail . '.jpg';
        return file_exists( DOCROOT . '/' . $image_url ) ? $image_url : false;
    }
    
    
    public function add_user_roles( array $roles ){
        
        foreach( $roles as $user_key => $role )
            $this->add_user_role( $user_key, $role );
    }
    
    
    public function set_tags( $tags_string ){
        
        $tag_strings = preg_split( '/[^\w\-\.\_]+/', $tags_string );
        $tags = array();
        foreach( $tag_strings as $tag_string ){
            
            $tag = ORM::factory( 'tag', url::title( $tag_string ) );
            if( ! $tag->loaded ){
                $tag->name = $tag_string;
                $tag->save();
            }
            $tags[] = $tag->id;
        }
        
        $this->__set( 'tags', $tags );
    }
    
    
    public function add_user_role( $user, $role_string ){
        
        $user = ORM::factory( 'user', $user );
        if( $this->has_user( $user ) ){
            
            $role = $user->role_for_project( $this );
        } else {
            $role = ORM::factory( 'project_user_role' );
            $role->user = $user;
            $role->project = $this;
        }
        $role->role = $role_string;
        $role->save();
    }
    
    public function user_can( $user, $action ){
        
        if( 'edit' == $action )
            return $this->has_user( $user );
    }
    
    
    public function has_user( User_Model $user ){
        
        return 1 == ORM::factory( 'project_user_role' )
                        ->where( 'project_id', $this->id )
                        ->where( 'user_id', $user->id )
                        ->count_all();
    }
    
    
    public function __toString(){

        return $this->name;
    }
}

