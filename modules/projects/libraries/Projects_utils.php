<?php

class Projects_utils{
    
    
    public static function get_project_types_dropdown_array(){
        
        $types = array();
        foreach( ORM::factory( 'project_type' )->find_all() as $type ) $types[ $type->id ] = $type->name;
        return $types;
    }
    
    
    public static function projects_add_validation( array $data ){
        
        $validation = new Validation( $data );
        
        $validation
            ->add_rules( 'name', 'required' )
            ->add_rules( 'project_type_id', 'required', 'numeric' );
        
        return $validation;
    }
    
    
    public static function projects_edit_validation( array $data ){
        
        $validation = new Validation( $data );
        
        $validation
            ->add_rules( 'name', 'required' )
            ->add_rules( 'project_type_id', 'numeric', 'required' );
            
        return $validation;
    }
    
}