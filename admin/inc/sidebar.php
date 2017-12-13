<!-- sidebar start -->
  <style>
    li.sub:hover{
    background:#0D1214;
  }
  </style>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print" >
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="images/user.png" alt="User Image"></div>
            <div class="pull-left info">
              <p>Username</p>
              <p class="designation">Admin</p>
            </div>
          </div>
          <!-- Subment Menu-->
          <ul class="sidebar-menu">
            <li class="active" style="border-bottom: 1px solid #000 !important;">
              <a href="book_list.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
            </li>
            <!-- users-->
            <li class="treeview " style="border-bottom: 1px solid #000 !important;">
              <a href="users_list.php"><i class="fa fa-users"></i><span>Users</span><i class="fa fa-angle-right"></i></a>    
              <ul class="treeview-menu">
                <li class="sub">
                  <a href="user_admin_add.php" title="Admin Panel User">  
                    <i class="fa fa-plus" aria-hidden="true"></i> Add Admin
                  </a>
                </li>
                <li class="sub">
                  <a href="user_student_teacher_add.php" title="App Users">  
                    <i class="fa fa-plus" aria-hidden="true"></i> Add Student or Teacher
                  </a>
                </li>
                <li class="sub">
                  <a href="users_list.php">
                    <i class="fa fa-eye" aria-hidden="true"></i>Users List
                  </a>
                </li>
                <li class="sub">
                  <a href="user_admin_update.php" title="Update Admin Data">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Update Admin Data
                  </a>
                </li>
                <li class="sub">
                  <a href="user_update.php" title="Update Students or Teachers Data">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Update Users Data
                  </a>
                </li>
               <!--  <li class="sub">
                  <a href="#">
                    <i class="fa fa-minus" aria-hidden="true"></i> Delete User Data 
                     </a>
                </li> -->
      
              </ul>
            </li> 

            <!-- books -->
            <li class="treeview " style="border-bottom: 1px solid #000 !important;">
              <a href="book_list.php"><i class="fa fa-book"></i><span>Books</span><i class="fa fa-angle-right"></i></a>     
              <ul class="treeview-menu">
                <li class="sub">
                  <a href="book_add.php">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add Book
                  </a>
                </li>
                <li class="sub">
                  <a href="book_list.php">
                    <i class="fa fa-eye" aria-hidden="true"></i> Book List
                  </a>
                </li>
                <li class="sub">
                  <a href="book_edit.php">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Update Book
                     </a>
                </li>
                <li class="sub">
                  <a href="#">
                    <i class="fa fa-minus" aria-hidden="true"></i> Delete Book
                     </a>
                </li>
                &nbsp;
            
              </ul>
            </li> 
        
            <li style="border-bottom: 1px solid #000 !important;">
              <a href="settings.php"><i class="fa fa-cogs" aria-hidden="true"></i><span>Settings</span></a>
            </li>
        
            <li style="border-bottom: 1px solid #000 !important;">
              <a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a>
            </li>
          </ul>
        </section>
      </aside>
<!-- sidebar end --> 