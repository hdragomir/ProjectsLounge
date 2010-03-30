<div class="section-wrapper">
    <div class="section">
        
        <h2>Drop us a line!</h2>
        
        <?php echo form::open(); ?>
        
        <p><?php echo form::label( 'contact[email]', 'You name' ), form::input( 'contact[email]' ); ?>
        
        <p><?php echo form::label( 'contact[subject]', 'Subject' ), form::input( 'contact[subject]' ); ?>
        
        <p><?php echo  form::label( 'contact[body]', 'Your Message' ), '<br />', form::textarea( 'contact[body]' ); ?>
        
        <p id="send-wrapper"><?php echo form::submit( array( 'value' => 'Send', 'class' => 'btn awesome big' ) ); ?>
            
        <?php echo form::close(); ?>
    </div>
</div>
