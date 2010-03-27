<?php defined('SYSPATH') OR die('No direct access allowed.');

class User_Model extends Auth_User_Model {
    
    public function save(){
        
        if( empty( $this->username ) )
            $this->username = $this->id;
        
        return parent::save();
    }
    
    
    public function role_for_project( $project ){
        
        if( ! ( $project instanceof Project_Model ) )
            $project = ORM::factory( 'project', $project );

        return ORM::factory( 'project_user_role' )
            ->where( 'project_id', $project->id )
            ->where( 'user_id', $this->id )
            ->find_all()->current();
    }
} // End User Model