<?php require_once('include/header.php'); ?>  
<!-- user data -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h2>Username's Informations</h2> 
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover table-striped table-responsive">
						<tr>
							<th>SR NO.</th>
							<th>Issued Book Name</th>
							<th>Status</th>
							<th>Active Date</th> <!-- issue date -->
							<th>Submit Date</th>
							<th>Submit Stattus</th>
							<th>Fine</th>
							<td>Paid/Unpaid</td>
						</tr>
						<tr>
							<td>01</td>
							<td>Book Name</td>
							<td>Panding/Active</td> 
							<td>12-12-2017</td>
							<td>12-12-2017</td>
							<td>Supmiited/Expired</td>
							<td>$50</td>
							<td>Paid/Unpaid</td>
						</tr>
						<!-- not loop -->
					</table>
					<!-- calculation table -->
					<table class="table table-bordered table-hover table-striped table-responsive">
						<tr>
							<td>Total Issued Book</td>
							<td>Submitted Book</td>
							<td>Expire Submission</td>
							<td>Total Fine</td>
							<td>Paid/Unpaid</td> 
						</tr>
						<tr>
							<td>03</td>
							<td>02</td>
							<td>01</td>
							<td>$50</td>
							<td>Paid/Unpaid</td>
						</tr>
					</table>

				</div>
			</div>
			
		</div>	
	</div>
</div>
<!-- /user data -->

<!-- end content -->
<?php require_once('include/footer.php'); ?> 
