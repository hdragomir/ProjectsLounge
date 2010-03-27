<?php

class Project_Model extends ORM{
    
    protected $belongs_to = array( 'project_type' );
    protected $has_and_belongs_to_many = array( 'users' );
    
    
    public function __get( $prop ){

        if( 'url' == $prop )
            return url::site( "projects/{$this->id}" );
        
        return parent::__get( $prop );
    }
    
    public function set_user_roles( array $roles ){
        
        foreach( $roles as $user_key => $role )
            $this->add_user_role( $user_key, $role );
    }
    
    
    public function add_user_role( $user, $role ){
        
        $user = ORM::factory( 'user', $user );
        $role = ORM::factory( 'project_user_role' );
        $role->user = $user;
        $role->project = $this;
        $role->role = $role;
        $role->save();
        
        var_export( $role );
    }
}
