
<?php echo form::open( null, array( 'method' => 'post' ) ); ?>


<fieldset>
    <legend>Project Type</legend>
    <?php foreach( $project_types as $type_id => $type_name ): ?>
        <label><input type="radio" name="project[project_type_id]" value="<?php echo $type_id; ?>" />
        <?php echo $type_name; ?></label>
    <?php endforeach; ?>
</fieldset>


<?php echo form::open_fieldset( array( 'class' => 'required-info' ) ); ?>
    <?php echo form::legend( 'Required Info' ); ?>

    <p><?php echo form::label( 'project[name]', 'Project Name' ),
                  form::input( 'project[name]' ); ?>
    <?php echo form::label( 'user[role]', 'Your Role' ),
                  form::input( 'user[role]' ); ?></p>
    <p></p>
<?php echo form::close_fieldset(); ?>


<?php echo form::open_fieldset( array( 'class' => 'additional-users' ) ); ?>
    <?php echo form::legend( 'Additional Members' ); ?>
    <p><label>Email <?php echo form::input( array( 'name' => 'additional_user_emails[]',
                                   'type' => 'email' ) ); ?></label>
    <label>Role <?php echo form::input( 'additional_user_roles[]' ); ?></label></p>
<?php echo form::close_fieldset(); ?>


<?php echo form::submit( array( 'value' => 'Add' ) ); ?>

<?php echo form::close(); ?>