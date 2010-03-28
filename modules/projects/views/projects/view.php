<div id="project_details">
    <div class="section">
        <div id="project_info">
            <img id="project_logo" src="<?php echo $project->tiny_image_url; ?>" alt="<?php echo $project->name; ?>" />
            <h1><?php echo $project->name; ?></h1>
            

            <p id="info_list">
                <span><strong>Project type:</strong> <?php echo $project->project_type; ?></span>
                <span><strong>Time frame:</strong> 56 hours</span>
                <span><strong>URL:</strong> <?php echo text::auto_link( $project->url ); ?></span>
                <?php if( $project->user_can( $user, 'edit' ) ): ?>
                    <a class="right" href="<?php echo $project->url, '/edit'; ?>" >Edit</a>
                <?php endif; ?>
            </p>
            <p class="project_tags">
                
                 <?php foreach( $project->tags as $tag ):
                        
                        echo html::anchor( $tag->url, $tag );
                    endforeach; ?>
            
            </p>
            
            <p id="project-description"><?php echo $project->description; ?></p>

            <div id="screenshots">
                <h2>Screenshot</h2>
                <img class="screenshot" src="<?php echo $project->image_url; ?>" alt="" />
            </div>
        </div>

        <div id="members_list">
            <h2>Who worked on this project</h2>
            <ul>
                
                <?php foreach( $project->users as $member ): ?>
                    <li>
                        <a href="<?php echo $member->local_url; ?>"><img class="member_thumb_small" src="<?php echo url::site( 'media/images/member_thumb_small.png' ); ?>" alt="" /></a>
                        <h3><a href="<?php echo $member->local_url; ?>"><?php echo $member; ?></a></h3>
                        <span class="descr"><?php echo $member->role_for_project( $project ); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
</div>

<a class="btn awesome big" href="<?php echo url::site( 'projects' ); ?>">See other great projects</a>

</div>


