<?php

    echo $project->name, '<br />';
    
    foreach( $project->users as $user ):
        
        echo $user->email, ' role: ', $user->role_for_project( $project ), '<br />';
    endforeach;