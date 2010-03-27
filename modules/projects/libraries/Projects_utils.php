<?php

class projects_utils{
    
    
    public static function get_poject_types_dropdown_array(){
        
        $types = array();
        foreach( ORM::factory( 'project_type' )->find_all() as $type ) $types[ $type->id ] = $type->name;
        return $types;
    }
    
    
    public static function create_project( array $data ){
        
        $project = ORM::factory( 'project' );
        
        $validation = new Validation( $data );
        
        $validation
            ->add_rules( 'name', 'required' )
            ->add_rules( 'project_type_id', 'required', 'numeric' );
        
        
        $project->validate( $validation, true );
        
        return $project;
    }
    
}