<?php

class Tag_Model extends ORM
{
    
    protected $has_and_belongs_to_many = array( 'projects' );
    
    public function __get( $prop )
    {
        if( 'url' == $prop )
            return url::site( "tags/{$this->id}" );

        return parent::__get( $prop );
    }

}
