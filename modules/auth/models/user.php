<?php defined('SYSPATH') OR die('No direct access allowed.');

class User_Model extends Auth_User_Model {
	// This class can be replaced or extended
	
    public function save(){
        
        
        if( empty( $this->username ) )
            $this->username = $this->id;
        
        return parent::save();
    }
    
    public function role_for_project( $project ){
        if( ! ( $project instanceof Project_Model ) )
            $project = ORM::factory( 'project', $project );
        
        return Database::instance()->select( 'role' )
                    ->where( 'user_id', $this->id )
                    ->where( 'project_id', $project->id )
                    ->get( 'projects_users' )->current()->role;
        
    }
} // End User Model