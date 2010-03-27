<?php

class Subscriber_Model extends ORM
{
    
    public function __get( $prop )
    {
        if( 'url' == $prop )
            return url::site( "subscribers/{$this->email}" );

        return parent::__get( $prop );
    }

}
