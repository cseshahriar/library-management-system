<?php if(!isset($_SESSION['admin'])) : ?> <!-- if admin is not login -->
<?php echo 'You can\'t destroy session at this time';  ?>
<?php else: ?>
<?php 
	session_start();
	session_destroy();
	header("Location: login.php");     
?>
<?php endif; ?>   