<?php foreach( $projects as $project ): ?>
    <div>
        <a href="<?php echo $project->local_url; ?>"><?php echo $project->name; ?></a><br />
        <?php $project_user_count = count( $project->users );
              echo $project_user_count, ' ' , inflector::plural( ' member', $project_user_count ) ?>
    </div>
<?php endforeach; ?>

