<div id="user-top-menu">
<?php $user = User_Model::current(); 
    if( ! $user->loaded ): ?>
<a id="login" rel="nofollow" href="<?php echo url::site( 'login' ); ?>">Login to your account</a>

<?php else: ?>

Howdy, <a href="<?php echo $user->local_url; ?>"><?php echo $user; ?></a>.
<a href="<?php echo url::site( 'logout' ); ?>">Logout</a>.
<?php endif; ?>
</div>
