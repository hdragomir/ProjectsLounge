<?php echo form::open( null, array( 'method' => 'post' ) ); ?>

<?php echo form::open_fieldset( array( 'class' => 'required-info' ) ); ?>
    <?php echo form::legend( 'Required Info' ); ?>

    <p><?php echo form::label( 'project[name]', 'Project Name' ),
                  form::input( 'project[name]', $project->name ); ?></p>
    <p><?php echo form::label( 'project[project_type_id]', 'Project Type' ),
                  form::dropdown( 'project[project_type_id]', $project_types, $project->project_type_id ); ?></p>
    <p><?php echo form::label( 'user[role]', 'Your Role' ),
                  form::input( 'user[role]', $user->role_for_project( $project ) ); ?></p>

<?php echo form::close_fieldset(); ?>

<?php echo form::submit( array( 'value' => 'Save' ) ); ?>

<?php echo form::close(); ?>