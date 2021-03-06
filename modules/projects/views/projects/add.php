
<h2 class="pad">Add a new Project</h2>
<?php echo form::open_multipart( null, array( 'method' => 'post', 'class' => 'project-form' ) ); ?>
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
    <p><label><span>Brief Description</span><br /><?php echo form::textarea( array( 'name' => 'project[description]',
                                                                               'id' => 'project-description' ) ); ?></label></p>
    <p><label><span>Your Role</span> <?php echo form::input( 'user[role]' ); ?></label></p>

<?php echo form::close_fieldset(); ?>



<?php echo form::open_fieldset( array( 'class' => 'tags' ) ); ?>

    <p><label><span>Tags</span> <?php echo form::input( 'project[tags]' ); ?></label><br /><small>(space separated)</small></p>

<?php echo form::close_fieldset(); ?>


<?php echo form::open_fieldset( array( 'class' => 'images' ) ); ?>
    <p><label><span>Screenshot</span> <?php echo form::upload( 'screenshot' ); ?></label></p>
    <p><label><span>Logo</span> <?php echo form::upload( 'logo' ); ?></label></p>
<?php echo form::close_fieldset(); ?>


<?php echo form::submit( array( 'value' => 'Add', 'class' => 'btn awesome' ) ); ?>

<?php echo form::close(); ?>
