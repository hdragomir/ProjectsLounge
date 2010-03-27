<h2>Projects</h2>
    <ul>
    <?php if( sizeof( $profile->projects ) ): foreach( $profile->projects as $project ): ?>
            <a href="<?php echo $project->url; ?> "><?php echo $project->name; ?></a>
    <?php endforeach; endif; ?>
    </ul>