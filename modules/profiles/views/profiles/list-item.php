<li>
    <a href="<?php echo $profile->local_url; ?>"><img src="<?php echo $profile->avatar_url; ?>" alt="<?php echo $profile; ?>" /></a>
    <a href="<?php echo $profile->local_url; ?>" class="member_name"><?php echo $profile; ?></a>
    <span class="descr"><?php echo $profile->tagline; ?></span>
    <a href="<?php echo $profile->local_url; ?>#Projects" class="involved_in"><?php $project_count_for_profile = count( $profile->projects );
        echo $project_count_for_profile, ' ', inflector::plural( 'project', $project_count_for_profile );
    ?></a>
</li>