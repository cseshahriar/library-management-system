<?php 
  session_start(); 
  if($_SESSION['user_role_id'] == 1) :
?>
<?php require_once('inc/header.php'); ?>
<?php include_once('inc/sidebar.php'); ?>

<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-dashboard"></i>&nbsp;Welcome to Dashboard </h1>
      <p>Your home Page ..</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li><a href="#">Dashboard</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <?php if(isset($_SESSION['logInSuccess'])): ?>
    <!-- alert -->
        <div class="error alert alert-success alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-user"></i>
          <strong ><?php echo $_SESSION['logInSuccess']; ?></strong> 
        </div>
    <?php endif; ?>
  </div>
</div>

<?php require_once('inc/footer.php'); ?>
<?php 
  else: 
      echo "<script>window.location.href = 'login.php'; </script>"; 
  endif;
?>