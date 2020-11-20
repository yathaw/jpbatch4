<?php 
	include 'backendheader.php';
	include 'db_connect.php';
?>

<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  	<h1 class="h3 mb-4 text-gray-800">
	  		<i class="fas fa-dolly pr-3"></i> 
	  		Item 
	  	</h1>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Create New Item 
			            </h4>
					</div>

					<div class="col-2">
						<a href="item_list.php" class="btn btn-outline-primary btn-block float-right"> 
		            		<i class="fa fa-backward pr-2"></i>	Go Back 
		            	</a>
					</div>
				</div>

	        </div>
	        <div class="card-body">
	            <form action="item_add.php" method="POST" enctype="multipart/form-data">

	            	<div class="form-group row">
						<label for="categoryName" class="col-sm-2 col-form-label"> Photo  </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="file" name="images[]" multiple="">
				    	</div>
					</div>

					<div class="form-group row">
						<label for="categoryName" class="col-sm-2 col-form-label"> Name </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="categoryName" placeholder="Enter Brand Name" name="name">
				    	</div>
					</div>

					<div class="form-group row">
						<label for="categoryName" class="col-sm-2 col-form-label"> Price </label>
				    	
				    	<div class="col-sm-10">
				      		<nav>
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
							    	<a class="nav-item nav-link active" id="nav-price-tab" data-toggle="tab" href="#nav-price" role="tab" aria-controls="nav-price" aria-selected="true"> Unit Price </a>
							    	
							    	<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Discount </a>
							  	</div>
							</nav>
							
							<div class="tab-content mt-3" id="nav-tabContent">
							  	<div class="tab-pane fade show active" id="nav-price" role="tabpanel" aria-labelledby="nav-price-tab">
							  		<input type="number" class="form-control" id="categoryName" placeholder="Enter Unit Price" name="unitprice">
							  	</div>
							  	
							  	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							  		<input type="text" class="form-control" id="categoryName" placeholder="Enter Discount Price" name="discount">
							  	</div>
							</div>
				    	</div>
					</div>

					<div class="form-group row">
						<label for="categoryName" class="col-sm-2 col-form-label"> Description </label>
				    	
				    	<div class="col-sm-10">
				      		<textarea class="form-control summernote" name="description"></textarea>
				    	</div>
					</div>

					<div class="form-group row">
						<label for="categoryName" class="col-sm-2 col-form-label"> Brand </label>
				    	
				    	<div class="col-sm-10">
				      		<select class="form-control select2 form-control-lg" name="brand">
				      			<option> Choose Brand </option>
								
								<?php 
									$sql="SELECT * from brands ORDER BY name ASC";
						        	$stmt=$pdo->prepare($sql);
						        	$stmt->execute();
						        	$rows= $stmt->fetchAll();

						        	$i=1;
	        						foreach ($rows as $brand):

	        						$id = $brand['id'];
	        						$name = $brand['name']; 

								?>
									
										<option value="<?= $id; ?>" > 
											<?= $name; ?> 
										</option>

								<?php endforeach; ?>

				      		</select>
				    	</div>
					</div>

					<div class="form-group row">
						<label for="categoryName" class="col-sm-2 col-form-label"> Sub-category </label>
				    	
				    	<div class="col-sm-10">
				      		<select class="form-control select2 form-control-lg" name="category">
				      			<option> Choose Sub-category </option>
								
								<?php 
									$sql="SELECT * from subcategories ORDER BY name ASC";
						        	$stmt=$pdo->prepare($sql);
						        	$stmt->execute();
						        	$rows= $stmt->fetchAll();

						        	$i=1;
	        						foreach ($rows as $category):

	        						$id = $category['id'];
	        						$name = $category['name']; 

								?>
									
										<option value="<?= $id; ?>" <?php if(isset($categoryid) && $id == $categoryid ) echo "selected" ?> > 
											<?= $name; ?> 
										</option>

								<?php endforeach; ?>

				      		</select>
				    	</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-2"></div>
					    <div class="col-sm-10">
					      <button type="submit" class="btn btn-primary">
					      	<i class="fa fa-save"></i> Save
					      </button>
					    </div>
					</div>

				</form>

	        </div>
		</div>

	</div>
<!-- /.container-fluid -->

<?php 
	include 'backendfooter.php'; 
?>