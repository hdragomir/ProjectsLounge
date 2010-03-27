<?php

class Project_user_role_Model extends ORM{
    
    protected $table_name = 'projects_users';
    protected $belongs_to = array( 'project', 'user' );
    protected $sorting = array( 'project_id' => 'asc' );
    protected $primary_val = 'role';
    
    
    public function __toString(){
        
        return "$this->{$this->primary_val}";
    }
    
    
    public function __set( $prop, $value ){
        
        if( 'user' == $prop || 'project' == $prop ){
            $prop .= '_id';
            $value = $value->id;
        }
        return parent::__set( $prop, $value );
    }
}