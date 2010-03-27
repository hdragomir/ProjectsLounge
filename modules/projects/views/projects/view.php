<?php

    echo $project->name, '<br />';
    
    foreach( $project->users as $user ):
        
        echo $user->email, '<br />',
             $user->role_for_project( $project );
    endforeach;