<?php

class Project_type_Model extends ORM{
    
    protected $has = array( 'projects' );
    
    
    public function __toString(){
    
        return $this->name;
    }
}
