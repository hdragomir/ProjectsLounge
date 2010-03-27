<?php

class Project_Model extends ORM{
    
    protected $belongs_to = array( 'project_type' );
    protected $has_and_belongs_to_many = array( 'users', 'projects' );
    
    
    public function __get( $prop ){

        if( 'url' == $prop )
            return url::site( "projects/{$this->id}" );
        
        return parent::__get( $prop );
    }
}
