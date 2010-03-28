<li>
        <a href="<?php echo $project->local_url; ?>"><img class="project_thumb" src="<?php echo $project->image_url; ?>" alt="" /></a>
        <h3><a href="<?php echo $project->local_url; ?>"><?php echo $project->name; ?></a></h3>
        <p class="team_members"><?php
            $member_links = array();
            foreach( $project->users as $member ):
                $member_links[ $member->local_url ] = $member; 
             endforeach;
             echo implode( ' | ', html::anchor_array( $member_links ) );
             ?></p>
        <p class="project_tags"><?php
            foreach( $project->tags as $tag ):
                echo html::anchor( $tag->url, $tag );
            endforeach;
            ?></p>
</li>