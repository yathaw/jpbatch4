<?php 
	require 'frontendheader.php';

	$sql = "SELECT * FROM categories ORDER BY name LIMIT 8 ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $categories = $stmt->fetchAll();

    // Discount Items
    $sql = "SELECT * FROM items WHERE discount !='' LIMIT 8 ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $discount_items = $stmt->fetchAll();

    // Flash Sale
    $sql = "SELECT * FROM items ORDER BY created_at DESC LIMIT 8";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $hot_items = $stmt->fetchAll();

    // Subcategory Item => Foundation 27
    $sid = 27;

    $sql = 'SELECT * FROM items WHERE subcategory_id =:value1 LIMIT 8';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value1', $sid);
    $stmt->execute();

    $radom_items = $stmt->fetchAll();
?>
	<!-- Carousel -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
    		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  		</ol>
  		
  		<div class="carousel-inner">
    		<div class="carousel-item active">
		      	<img src="frontend/image/banner/ac.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="frontend/image/banner/giordano.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
		    <div class="carousel-item">
		      	<img src="frontend/image/banner/garnier.jpg" class="d-block w-100 bannerImg" alt="...">
		    </div>
  		</div>
	</div>


	<!-- Content -->
	<div class="container mt-5 px-5">
		<!-- Category -->
		<div class="row">

			<?php 
				foreach ($categories as $category) {
				
				$cid = $category['id'];
				$cname = $category['name'];
				$clogo = $category['logo'];

			?>

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 ">
				<div class="card categoryCard border-0 shadow-sm p-3 mb-5 rounded text-center">
				  	<img src="<?= $clogo ?>" class="card-img-top" alt="...">
				  	<div class="card-body">
				    	<p class="card-text font-weight-bold text-truncate"> <?= $cname; ?> </p>
				  	</div>
				</div>
			</div>

			<?php 
				}
			?>

		</div>

		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>
		
		<!-- Discount Item -->
		<div class="row mt-5">
			<h1> Discount Item </h1>
		</div>

	    <!-- Disocunt Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">

		            	<?php 
		            		foreach($discount_items as $discount_item){

		            		$di_id = $discount_item['id'];
		            		$di_name = $discount_item['name'];
		            		$di_price = $discount_item['price'];
		            		$di_discount = $discount_item['discount'];
		            		$di_photo = $discount_item['photo'];
		            		$di_codeno = $discount_item['codeno'];
		            	?>

		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $di_photo; ?>" class="img-fluid">
		                        <p class="text-truncate"> <?= $di_name ?> </p>
		                        <p class="item-price">
		                        	<strike> <?= $di_price ?> Ks </strike> 
		                        	<span class="d-block"> <?= $di_discount ?> Ks</span>
		                        </p>

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								<a href="javascript:void(0)" class="addtocartBtn text-decoration-none" data-id="<?= $di_id ?>" data-name="<?= $di_name ?>" data-codeno="<?= $di_codeno ?>" data-photo="<?= $di_photo ?>" data-price="<?= $di_price ?>" data-discount="<?= $di_discount ?>"> Add to Cart</a>

		                    </div>
		                </div>

		            	<?php } ?>
		                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Flash Sale Item -->
		<div class="row mt-5">
			<h1> Flash Sale </h1>
		</div>

	    <!-- Flash Sale Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">

		            	<?php 
		            		foreach($hot_items as $hot_item){
		            		$hi_id = $hot_item['id'];
		            		$hi_name = $hot_item['name'];
		            		$hi_price = $hot_item['price'];
		            		$hi_discount = $hot_item['discount'];
		            		$hi_photo = $hot_item['photo'];
		            		$hi_codeno = $hot_item['codeno'];

		            	?>
		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $hi_photo ?>" class="img-fluid">
		                        <p class="text-truncate"> <?= $hi_name ?> </p>
		                        <p class="item-price">
		                        	<?php 
		                        		if($hi_discount){
		                        	?>
		                        		<strike> <?= $hi_price ?> Ks </strike> 
		                        		<span class="d-block"> <?= $hi_discount ?> Ks</span>

		                        	<?php } else{ ?>
		                        		<span class="d-block"> <?= $hi_price ?> Ks</span>

		                        	<?php } ?>
		                        </p>

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								<a href="javascript:void(0)" class="addtocartBtn text-decoration-none" data-id="<?= $hi_id ?>" data-name="<?= $hi_name ?>" data-codeno="<?= $hi_codeno ?>" data-photo="<?= $hi_photo ?>" data-price="<?= $hi_price ?>" data-discount="<?= $hi_discount ?>">Add to Cart</a>

		                    </div>
		                </div>

		                <?php } ?>
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		<!-- Random Catgory ~ Item -->
		<div class="row mt-5">
			<h1> Fresh Picks </h1>
		</div>

	    <!-- Random Item -->
		<div class="row">
			<div class="col-12">
				<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
		            <div class="MultiCarousel-inner">

		            	<?php 
		            		foreach($radom_items as $radom_item){

		            		$ri_id = $radom_item['id'];
		            		$ri_name = $radom_item['name'];
		            		$ri_price = $radom_item['price'];
		            		$ri_discount = $radom_item['discount'];
		            		$ri_photo = $radom_item['photo'];
		            		$ri_codeno = $radom_item['codeno'];

		            	?>

		                <div class="item">
		                    <div class="pad15">
		                    	<img src="<?= $ri_photo ?>" class="img-fluid">
		                        <p class="text-truncate"> <?= $ri_name ?> </p>
		                        <p class="item-price">
		                        	<?php 
		                        		if($ri_discount){
		                        	?>
		                        	<strike> <?= $ri_price ?> Ks </strike> 
		                        	<span class="d-block"> <?= $ri_discount ?> Ks</span>

		                        	<?php } else{ ?>
		                        	<span class="d-block"> <?= $ri_price ?> Ks</span>

		                        	<?php } ?>
		                        </p>

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
									</ul>
								</div>

								<a href="javascript:void(0)" class="addtocartBtn text-decoration-none" data-id="<?= $ri_id ?>" data-name="<?= $ri_name ?>" data-codeno="<?= $ri_codeno ?>" data-photo="<?= $ri_photo ?>" data-price="<?= $ri_price ?>" data-discount="<?= $ri_discount ?>">Add to Cart</a>

		                    </div>
		                </div>

		            	<?php } ?>
		                
		            </div>
		            <button class="btn btnMain leftLst"><</button>
		            <button class="btn btnMain rightLst">></button>
		        </div>
		    </div>
		</div>

		
		<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	    <!-- Brand Store -->
	    <div class="row mt-5">
			<h1> Top Brand Stores </h1>
	    </div>

	    <!-- Brand Store Item -->
	    <section class="customer-logos slider mt-5">
	      	<div class="slide">
	      		<a href="">
		      		<img src="frontend/image/brand/loacker_logo.jpg">
		      	</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="frontend/image/brand/lockandlock_logo.png">
	      		</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="frontend/image/brand/apple_logo.png">
	      		</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="frontend/image/brand/giordano_logo.png">
	      		</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="frontend/image/brand/saisai_logo.png">
	      		</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="frontend/image/brand/brands_logo.png">
	      		</a>	
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="frontend/image/brand/acer_logo.png">
	      		</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="frontend/image/brand/bella_logo.png">
	      		</a>
	      	</div>
	      	
	      	<div class="slide">
	      		<a href="">
	      			<img src="frontend/image/brand/ariel_logo.png">
	      		</a>
	      	</div>
	   	</section>

	    <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

	</div>

<?php 
	require 'frontendfooter.php';
?>