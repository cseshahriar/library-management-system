  <?php include "inc/header.php";?> 
<?php include "inc/sidebar.php";?> 
      

<div class="content-wrapper">
	<div class="page-title">
		<div>
			<h1><i class="fa fa-key"></i>&nbsp;Are you Change your Password ?</h1>
			<p>Your Change Password  Page ..</p>
		</div>
		<div>
			<ul class="breadcrumb">
				<li><i class="fa fa-home fa-lg"></i></li>
				<li><a href="#">Dashboard</a></li>
			</ul>
		</div>
       
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="card">
				<h3 class="card-title text-center"><b>
						<i class="fa fa-key"></i>&nbsp;Change your Password</b></h3><br/>		
				<form class="form-horizontal">
					<div class="card-body">
					
						<div class="form-group">
							<label class="control-label col-md-3">Current Password</label>
							<div class="col-md-8">
								<input class="form-control" type="text" autofocus="" placeholder="Enter Current Password">
							</div>
							<sup style="color: red; font-size: 20px;">*</sup>
						</div>
                
                
						<div class="form-group">
							<label class="control-label col-md-3">New Password</label>
							<div class="col-md-8">
								<input class="form-control" type="text" placeholder="Enter New Password">
							</div>
							<sup style="color: red; font-size: 20px;">*</sup>
						</div>
						
						
						<div class="form-group">
							<label class="control-label col-md-3">Repete New Password</label>
							<div class="col-md-8">
								<input class="form-control" type="text" placeholder="Enter Repete New Password">
							</div>
							<sup style="color: red; font-size: 20px;">*</sup>
						</div>
						
						
		
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-md-8 col-md-offset-3">
								<button class="btn btn-primary icon-btn" type="button"
								data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
								<button type="reset" class="btn btn-default icon-btn"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
							</div>
						</div>
					</div>
				
				</form>
			</div>
		</div>
	</div>
</div>







<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
       <br/>
      <div class="modal-body text-center">
        <h4><i class="fa fa-key"></i>
        &nbsp;Are You Sure to Change Password ?</h4>
      </div>
      <div class="text-center">
       	
       	<button class="btn btn-success">
       	<i class="fa fa-fw fa-lg fa-check-circle"></i>&nbsp;Yes</button>
       	<button class="btn btn-danger"  data-dismiss="modal">
       	<i class="fa fa-fw fa-lg fa-times-circle"></i>&nbsp;NO</button>
       	<br/><br/><br/>
       </div>
  </div>
</div>  
</div>  
<?php include "inc/footer.php";?> 