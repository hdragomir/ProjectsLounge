<?php

class Projects_utils{
    
    
    public static function get_poject_types_dropdown_array(){
        
        $types = array();
        foreach( ORM::factory( 'project_type' )->find_all() as $type ) $types[ $type->id ] = $type->name;
        return $types;
    }
    
}