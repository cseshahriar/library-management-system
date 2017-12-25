<?php if(isset($_SESSION['user'])) : ?> <!-- if user is logged in -->
<?php echo 'You can\'t destroy session at this time';  ?> 
<?php else: ?>
<?php 
	session_start();
	session_destroy();
	header("Location: login.php");     
?>
<?php endif; ?>     