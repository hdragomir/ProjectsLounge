<?php defined('SYSPATH') OR die('No direct access allowed.');

class User_Model extends Auth_User_Model {
    
    
    public function __get( $prop ){
        
        if( 'local_url' == $prop )
            return url::site( 'profiles/' . $this->id );
        
        return parent::__get( $prop );
    }

    
    public function __toString(){
        
        return current( explode( '@', $this->email ) );
    }

    
    
    public function save(){
        
        if( empty( $this->username ) && ! empty( $this->id ) )
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
    
    
    public static function current(){
        $user = Auth::instance()->get_user();
        if( ! $user ){
            $user = new self;
            $user->username = 'visitor';
        }
        
        return $user;
    }
} // End User Model