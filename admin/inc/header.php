<?php  session_start();  ?> 
<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Library Management System</title>
  <!-- CSS-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">
</head>
<body class="sidebar-mini fixed">
<div class="wrapper">
<!-- Navbar-->
  <header class="main-header hidden-print" >
    <a class="logo" href="index.php">
      <b style="color:#fff; font-size: 30px; 
        font-style:italic; font-family:Courier, Monaco, monospace;">LMS </b>Admin Panel </a>
    <!-- nav --> 
    <nav class="navbar navbar-static-top" >
      <a class="sidebar-toggle" href="" data-toggle="offcanvas"></a>
      <!-- Navbar Right Menu-->
      <div class="navbar-custom-menu">
        <ul class="top-nav">
          <!--Notification Menu-->  
          <li>
              <a data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-target="#myModal"> 
                  <i class="fa fa-calculator" aria-hidden="true"></i>
              </a>
            </li>
          <li class="dropdown notification-menu">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell-o fa-lg"></i>
                <sup style="color: red;"><b>1</b></sup></a>
                <ul class="dropdown-menu">
                   <li class="not-head">You have 4 new notifications.</li>
                   <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block">2min ago</span></div></a></li>
                    <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block">2min ago</span></div></a></li>
                    <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li class="not-footer"><a href="#">See all notifications.</a></li>
                </ul>
          </li>
          <!-- User Menu-->
          <li class="dropdown"> 
              <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;
                  <span class="hidden-xs">
                    <b>
                    <?php if(isset($_SESSION['user_username'])) { echo $_SESSION['user_username']; } ?>
                      
                    </b>
                  </span>
              </a>
              <ul class="dropdown-menu settings-menu">
                  <li><a href="settings_admin.php"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                  <li><a href="profile.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                  <li><a href="login.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
              </ul>  
          </li>
        </ul> 
      </div>
    </nav>
  </header>
<style>
  .add-on .input-group-btn > .btn {
    border-left-width: 0;
    left: -2px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  }
  /* stop the glowing blue shadow */
  .add-on .form-control:focus {
    box-shadow: none;
    -webkit-box-shadow: none; 
    border-color: #cccccc; 
  }
  /* enable absolute positioning */
  .inner-addon {
    position: relative;
  }
  /* style glyph */
  .inner-addon .glyphicon {
    position: absolute;
    padding: 10px;
    pointer-events: none;
  }
  /* align glyph */
  .left-addon .glyphicon  { 
    left: 0px;}
  .right-addon .glyphicon { 
    right: 0px;}

  /* add padding  */
  .left-addon input  { 
    padding-left: 30px; }
  .right-addon input { 
    padding-right: 30px; }

  /* align button at bottom */
  .vertical-align-bottom { 
    vertical-align: bottom !important; }
</style>
<div class="modal fade" data-keyboard="false" data-backdrop="static"  id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center"><i class="fa fa-calculator" aria-hidden="true" ></i>&nbsp;&nbsp;Calculator</h2>
      </div>
      <div class="modal-body">
          <form class="calc">
            <p class="calc-display">
              <input type="text" name="res" id="res" value="" class="calc-display-input" onfocus="this.blur()">
            </p>
            <p class="calc-row">
              <button type="button" class="calc-button calc-button-gray" onclick="s('Just....')">mrc</button>
              <button type="button" class="calc-button calc-button-gray" onclick="s('....do..')">m-</button>
              <button type="button" class="calc-button calc-button-gray" onclick="s('......it')">m+</button>
              <button type="button" class="calc-button calc-button-red calc-button-big" style="font: 25px/32px UbuntuMono, monospace;" onclick="a('/')">÷</button>
            </p>
            <p class="calc-row">
              <button type="button" class="calc-button" onclick="a('7')">7</button>
              <button type="button" class="calc-button" onclick="a('8')">8</button>
              <button type="button" class="calc-button" onclick="a('9')">9</button>
              <button type="button" class="calc-button calc-button-red calc-button-big" onclick="a('*')">x</button>
            </p>
            <p class="calc-row">
              <button type="button" class="calc-button" onclick="a('4')">4</button>
              <button type="button" class="calc-button" onclick="a('5')">5</button>
              <button type="button" class="calc-button" onclick="a('6')">6</button>
              <button type="button" class="calc-button calc-button-red calc-button-big" onclick="a('-')">-</button>
            </p>
            <p class="calc-row">
              <button type="button" class="calc-button" onclick="a('1')">1</button>
              <button type="button" class="calc-button" onclick="a('2')">2</button>
              <button type="button" class="calc-button" onclick="a('3')">3</button>
              <button type="button" class="calc-button calc-button-red calc-button-big" onclick="a('+')">+</button>
            </p>
            <p class="calc-row">
              <button type="button" class="calc-button" onclick="a('0')">0</button>
              <button type="button" class="calc-button" onclick="a('.')">.</button>
              <button type="button" class="calc-button" onclick="s('')">C</button>
              <button type="button" class="calc-button calc-button-yellow calc-button-big" onclick="e()">=</button>
            </p>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  function s(v) { document.getElementById('res').value = v }
  function a(v) { document.getElementById('res').value += v }
  function e() { try { s(eval(document.getElementById('res').value)) } catch(e) { s('Error') } }
</script>
<!-- header end -->