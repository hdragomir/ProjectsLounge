<div id="member_details">
    <div class="section">
        <div id="member_info">
            <img id="member_thumb" src="<?php echo $profile->avatar_url ; ?>" alt="<?php echo $profile; ?>" />
            <h1><?php echo $profile; ?></h1>
            <p id="info_list">
                <strong><?php echo $profile->tagline; ?></strong>
            </p>
            <p class="project_tags"><a href="#">great</a> <a href="#">things</a> <a href="#">together</a></p>
            <p><?php echo $profile->description; ?></p>

            <div id="featured_projects">
                <h2 id="Projects">Projects</h2>
                <ul>
                    <?php echo Projects_utils::list_projects_view( $profile->projects ); ?>
                </ul>
            </div>
        </div>

        <div id="members_list">
            <h2>Connections</h2>
            <ul>
                
                <?php foreach( $connections as $connection ): ?>
                    <li>
                        <a href="<?php echo $connection->local_url; ?>"><img class="member_thumb_small" src="<?php echo $connection->avatar_url; ?>" alt="" /></a>
                        <h3><a href="<?php echo $connection->local_url; ?>"><?php echo $connection; ?></a></h3>
                        <span class="descr"><?php echo $connection->tagline; ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<a class="btn awesome big" href="#">Contact this member</a>

</div>