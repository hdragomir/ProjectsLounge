<?php defined('SYSPATH') OR die('No direct access allowed.');

class User_Model extends Auth_User_Model {
	// This class can be replaced or extended
	
    public function save(){
        
        
        if( empty( $this->username ) )
            $this->username = $this->id;
        
        return parent::save();
    }
} // End User Model