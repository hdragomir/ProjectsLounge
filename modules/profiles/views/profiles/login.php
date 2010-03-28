<h1>Welcome! Please log in.</h1>
 
<?php if (isset($message)): ?>
	<div class="error" style="color: red;">
		<?=$message?>
	</div>
<?php endif; ?>
 
<?php echo form::open('login')?>
	<?php echo form::label('username', 'Username:')?>
	<?php echo form::input('username', $username)?>
	<br />
	<?php echo form::label('password', 'Password:')?>
	<?php echo form::password('password')?>
	<br />
	<?php echo form::submit('submit', 'Login')?>
<?php echo form::close()?>