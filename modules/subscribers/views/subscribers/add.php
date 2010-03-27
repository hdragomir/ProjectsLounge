
<?php echo form::open( null, array( 'method' => 'post' ) ); ?>

<?php echo form::open_fieldset( array( 'class' => 'required-info' ) ); ?>
    <?php echo form::legend( 'Required Info' ); ?>

    <p><?php echo form::label( 'subscriber[email]', 'Subscriber' ),
                  form::input( 'subscriber[email]' ); ?></p>

<?php echo form::close_fieldset(); ?>

<?php echo form::submit( array( 'value' => 'Add' ) ); ?>

<?php echo form::close(); ?>