<h2 class="pad">Add a new Project</h2>
<?php echo form::open( null, array( 'method' => 'post', 'class' => 'project-form' ) ); ?>
<fieldset class="project-type">
    <legend>Project Type</legend>
    <?php foreach( $project_types as $type_id => $type_name ): ?>
        <label><input type="radio" name="project[project_type_id]" value="<?php echo $type_id; ?>" />
        <?php echo $type_name; ?></label>
    <?php endforeach; ?>
</fieldset>


<?php echo form::open_fieldset( array( 'class' => 'required-info' ) ); ?>
    <?php echo form::legend( 'Project Info' ); ?>

    <p class="important-stuff"><label><span>Project Name</span> <?php echo form::input( 'project[name]' ); ?></label>
       <label><span>Project URL</span> <?php echo form::input( 'project[url]' ); ?></label></p>
    <p><label><span>Your Role</span> <?php echo form::input( 'user[role]' ); ?></label></p>

<?php echo form::close_fieldset(); ?>


<?php echo form::open_fieldset( array( 'class' => 'additional-users' ) ); ?>
    <?php echo form::legend( 'Additional Members' ); ?>
    <p><label><span>Email</span> <?php echo form::input( array( 'name' => 'additional_user_emails[]',
                                   'type' => 'email' ) ); ?></label>
    <label><span>Role</span> <?php echo form::input( 'additional_user_roles[]' ); ?></label></p>
    
<?php echo form::close_fieldset(); ?>


<?php echo form::submit( array( 'value' => 'Add', 'class' => 'btn awesome' ) ); ?>

<?php echo form::close(); ?>