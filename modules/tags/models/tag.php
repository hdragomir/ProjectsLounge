<?php

class Tag_Model extends ORM
{
    
    protected $has_and_belongs_to_many = array( 'projects' );
    
    
    public function __toString(){
        
        return $this->name;
    }
    
    
    public function unique_key( $id ){
        
        return is_numeric( $id ) ? 'id' : 'name';
    }
    
    
    public function __get( $prop )
    {
        if( 'url' == $prop )
            return url::site( "tags/{$this->name}" );

        return parent::__get( $prop );
    }
    
    
    public function __set( $prop, $value ){
        
        if( 'name' == $prop )
            $value = url::title( $value );
        
        parent::__set( $prop, $value );
    }

}
