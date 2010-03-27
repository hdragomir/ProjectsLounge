<?php echo form::open( null, array( 'method' => 'post' ) ); ?>

<?php echo form::open_fieldset(); ?>

    <p><?php echo form::label( 'project[name]', 'Project Name' ),
                  form::input( 'project[name]' ); ?></p>
    <p><?php echo form::label( 'project[project_type_id]', 'Project Type' ),
                  form::dropdown( 'project[project_type_id]', $project_types ); ?></p>
    

<?php echo form::close_fieldset(); ?>

<?php echo form::submit( array( 'value' => 'Add' ) ); ?>

<?php echo form::close(); ?>