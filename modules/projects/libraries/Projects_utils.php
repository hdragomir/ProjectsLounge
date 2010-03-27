<?php

class Projects_utils{
    
    
    public static function get_poject_types_dropdown_array(){
        
        $types = array();
        foreach( ORM::factory( 'project_type' )->find_all() as $type ) $types[ $type->id ] = $type->name;
        return $types;
    }
    
    
    public static function createProject( array $post ){
        
        
        
        $project = ORM::factory( 'project' );
        
        $validation = new Validation( $post );
        
        $validation
            ->add_rules( 'name', 'required' )
            ->add_rules( 'project_type_id', 'required', 'numeric' );
        
        $project->validate( $validation, true );
        
        return $project;
    }
    
}