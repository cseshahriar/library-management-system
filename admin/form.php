  <?php include "inc/header.php";?> 
<?php include "inc/sidebar.php";?> 
      

<div class="content-wrapper">
	<div class="page-title">
		<div>
			<h1><i class="fa fa-product-hunt"></i>&nbsp;Your Product Details </h1>
			<p>Your product Details Page </p>
		</div>
		<div>
			<ul class="breadcrumb">
				<li><i class="fa fa-home fa-lg"></i></li>
				<li><a href="#">Dashboard</a></li>
			</ul>
		</div>
       
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<h3 class="card-title text-center"><b>
						<i class="fa fa-product-hunt"></i>&nbsp;Product Details</b></h3>	
				<div class="card-body">
					<table class="table table-hover table-bordered" id="sampleTable">
						<thead>
							<tr>
								<th>Product Name</th>
								<th>Product Code</th>
								<th>Company Name</th>
								<th>Catagory Type</th>
								<th>Buying Price</th>
								<th>Receive Date</th>
								<th>Manufacture Date</th>
								<th>Expire Date</th>
								<th>Product Pice</th>
								<th>Product Type</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>2011/04/25</td>
								<td>$320,800</td>
								<td>$320,800</td>
								<td>$320,800</td>
								<td>$320,800</td>
								<td>$320,800</td>
								<td class="text-center">
                      
									<a class="label label-primary" href="#"
                      	data-toggle="modal" data-target=".bs-example-modal-md">
										&nbsp;&nbsp;&nbsp;&nbsp;
										<i class="fa fa-pencil-square" aria-hidden="true"></i>	Edit
										&nbsp;&nbsp;&nbsp;&nbsp;
									</a>
									<br/>
                     	 
									<a class="label label-danger" href="#"
									data-toggle="modal" data-target=".bs-example-modal-sm">
										&nbsp;&nbsp;&nbsp;
										<i class="fa fa-trash" aria-hidden="true"></i>	Delete
										&nbsp;&nbsp;&nbsp;
									</a>
                     
								</td>
							</tr>
						</tbody>
                   
					</table>
                    
				</div>
			</div>
		</div>
	</div>
</div>


<!--modal-->    
<form class="form-horizontal">      

	<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center">
						<i class="fa fa-pencil-square"></i>&nbsp;&nbsp;Update Product Details</h4>
				</div>
				<div class="modal-body">

			
			
					<div class="form-group">
						<label class="control-label col-md-3">Product Name</label>
						<div class="col-md-8">
							<input class="form-control" type="text" autofocus="" placeholder="Enter Product Name">
						</div>
						
					</div>
                
                
					<div class="form-group">
						<label class="control-label col-md-3">Product Code</label>
						<div class="col-md-8">
							<input class="form-control" type="text" placeholder="Enter full name">
						</div>
						
					</div>
						
						
					<div class="form-group">
						<label class="control-label col-md-3">Company Name</label>
						<div class="col-md-8">
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
				
					</div>
						
						
						
					<div class="form-group">
						<label class="control-label col-md-3">Catagory</label>
						<div class="col-md-8">
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
		
					</div>
                  
                  
					<div class="form-group">
						<label class="control-label col-md-3">Product Buying Price</label>
						<div class="col-md-8">
							
							<div class="inner-addon right-addon">
								<i class="glyphicon">TK</i>
								<input placeholder="Product Buying Price" class="form-control form-text" id="edit-submitted-codepostal" name="" value="" size="60" maxlength="5" autocomplete="off" type="text">
							</div>
                        	
								
						</div>
		
					</div>
                  
                  
					<div class="form-group">
						<label class="control-label col-md-3">Receive Date</label>
						<div class="col-md-8">
							
							<div class="inner-addon right-addon">
								<i class="glyphicon glyphicon-calendar"></i>
								<input class="form-control" id="demoDate" type="text" placeholder="Select Receive Date">
							</div>
                        	
								
						</div>

					</div>
                  
                  		
					<div class="form-group">
						<label class="control-label col-md-3">Manufacture Date</label>
						<div class="col-md-8">
							
							<div class="inner-addon right-addon">
								<i class="glyphicon glyphicon-calendar"></i>
								<input class="form-control" id="demoDate2" type="text" placeholder="Select Manufacture Date">
							</div>
                        	
								
						</div>

					</div>
						
					<div class="form-group">
						<label class="control-label col-md-3">Expire Date</label>
						<div class="col-md-8">
							
							<div class="inner-addon right-addon">
								<i class="glyphicon glyphicon-calendar"></i>
								<input class="form-control" id="demoDate3" type="text" placeholder="Select Expire Date">
							</div>
                        	
								
						</div>

					</div>
                  
                  
					<div class="form-group">
						<label class="control-label col-md-3">Product Pice</label>
						<div class="col-md-8">
							<input class="form-control"  type="number" placeholder="Enter Product Pice">
						</div>

					</div>
                  
                  	
						
					<div class="form-group">
						<label class="control-label col-md-3">Product Type</label>
						<div class="col-md-9">
							<div class="radio-inline">
								<label>
									<input type="radio" name="product">Intact
								</label>
							</div>
							<div class="radio-inline">
								<label>
									<input type="radio" name="product">Retail
								</label>
							</div>
								

								
						</div>
							
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Who Receive</label>
						<div class="col-md-8">
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>

					</div>
					
				
			

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						<i class="fa fa-fw fa-lg fa-times-circle"></i>Close</button>
					<button type="button" class="btn btn-primary">
						<i class="fa fa-fw fa-lg fa-check-circle"></i>Save changes</button>
				</div>
			</div>
		</div>
	</div>    
</form>     
      
      
      
      
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
       <br/>
      <div class="modal-body text-center">
        <h4><i class="fa fa-trash"></i>
        &nbsp;Are You Sure to Delete ?</h4>
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