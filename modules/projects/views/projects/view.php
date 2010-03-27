<?php

    echo $project->name, '<br />';
    
    foreach( $project->users as $member ):
        
        echo $member->email, ' role: ', $member->role_for_project( $project ), '<br />';
    endforeach;
    
    if( $project->user_can( $user, 'edit' ) ): ?>
    
        <a href="<?php echo $project->url, '/edit'; ?>" >Edit</a>
    <?php endif;

