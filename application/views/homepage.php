<div id="welcome" class="section-wrapper">
    <div class="section">
        <h1>What is Projects Lounge?</h1>
        <p>Projects Lounge was created for web specialists who want to expose their portfolios and share their working experience with others. 
        It is both a business card for practitioners and a manual guide for apprentices.
        This is the perfect occasion to meet those who did that great application you talked about with your friends the other days. 
        See the best web related projects and learn how they were made.</p>
        <a class="btn awesome" href="#">Become a member</a>
    </div>
    <div class="section">
        <div id="featured_projects">
            <h2>Featured Projects</h2>
            <ul>
               <?php echo Projects_utils::list_projects_view( $featured_projects ); ?>
            </ul>
        </div>
        <div id="featured_members">
            <h2>Featured Members</h2>
            <ul>
                
                <?php foreach( $featured_members as $featured_member ): ?>
                    <li>
                        <a href="<?php echo $featured_member->local_url; ?>"><img src="<?php echo $featured_member->avatar_url; ?>" alt="" /></a>
                        <a href="<?php echo $featured_member->local_url; ?>" class="member_name"><?php echo $featured_member; ?></a>
                        <span class="descr"><?php echo $featured_member->tagline; ?></span>
                        <a href="<?php echo $featured_member->local_url; ?>#Projects" class="involved_in"><?php $project_count_for_featured_member = count( $featured_member->projects );
                            echo $project_count_for_featured_member, ' ', inflector::plural( 'project', $project_count_for_featured_member );
                        ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
    
    <div id="reasons">
        <h2>5 reasons to <a href="#">become a member</a></h2>
    
        <p id="nr_1" class="reason">Gain high visibility amongst web specialists.</p>
        <p id="nr_2" class="reason">Create and update your online portfolio quick and free.</p>
        <p id="nr_3" class="reason">Communicate with your team members and collaborators.</p>
        <p id="nr_4" class="reason">Meet other specialists in your field and see their work.</p>
        <p id="nr_5" class="reason">Share your working experience.</p>
    
        <a class="btn awesome" href="#">Become a member now</a>
    
    </div>
    
    </div>