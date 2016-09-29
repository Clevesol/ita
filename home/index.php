<?php
$page_title = "Home";
$inced = true;
?>


<!doctype html>
<html lang="en">
	<?php include('tmpl/header.php')?>
	
	<body class="container-fluid">
	
		<?php include('tmpl/navigation.php')?>
		<div class="container-fluid">
		<div class="col-sm-12" id="main-form">
			<form action='product.php' method="POST">
				<div class="col-sm-9 col-sm-offset-2">
					<div class="input-inlilne">
						<input class="col-sm-10" name="ssterm" id="sbar_home" type="text"
							placeholder="Search"> <input class="col-sm-2" id="sbtn_home"
							type="submit" value="Search">
						<div id="pop" class="col-sm-10">
							<a class="col-sm-11 col-sm-offset-1" href="#"></a>
						</div>
					</div>
				</div>
				
				<?php if(!isset($_SESSION['uname']) || $_SESSION['uname']=='-1') :?>
				<div class="col-sm-12">
					<div class="col-sm-6 col-sm-offset-5">
						<h1 style="font-size: 40px;font-weight:bold;color:#cb8a51;">I am a</h1>
					</div>
				</div>
				<div style="padding-top:10px;" class="col-sm-8 col-sm-offset-2">
					<div class="form-group">
						<input onclick="window.location='/home/login.php'" class="col-sm-5 col-sm-offset-1 btn-custom" type="button"
							value="Tenant"> <input onclick="window.location='/home/login.php'"
							class="col-sm-5 col-sm-offset-1 btn-custom" type="button"
							value="Renter">
					</div>
				</div>
				<?php endif; ?>
			</form>
		</div>
		<div class="container-fluid">
			<hr class="default-ribbon" />
		</div>
		
		
		
		
	
	
	
	
	
	
		<div class="container-fluid">
			<div class="col-sm-5 ribbon-container">
				<hr class="thin-ribbon" />
			</div>
			<div class="col-sm-2">
				<h4 class="custom-h4">Top Ranked</h4>
			</div>
			<div class="col-sm-5 ribbon-container">
				<hr class="thin-ribbon" />
			</div>
		</div>	
		<!-- container for the top ranked homes -->

		<div style="background-color: #ebebeb"
			class="container-fluid">
			<div  class="col-sm-12">
				<!--<div class="col-sm-4 feature-box">
							<div class="col-sm-12  product">
								<div class="col-sm-12">
									<label>Colombo</label>
								</div>
								<div class="col-sm-12">
									<h3>2 Bedroom Apartment</h3>
								</div>
								<div class="col-sm-12">
									<h1 style="color: green;">LKR 24000 x 12</h1>
								</div>
								<div class="col-sm-12">
									<p>this is a small description about the above</p>
								</div>
							</div>
					</div>


					<div class="col-sm-4 feature-box">
						<div class="col-sm-12  product">
								<div class="col-sm-12">
									<label>Colombo</label>
								</div>
								<div class="col-sm-12">
									<h3>2 Bedroom Apartment</h3>
								</div>
								<div class="col-sm-12">
									<h1 style="color: green;">LKR 24000 x 12</h1>
								</div>
								<div class="col-sm-12">
									<p>this is a small description about the above</p>
								</div>
							</div>
					</div>
-->

				<!-- <div class="col-sm-4 feature-box">
					<a href="#">
						<div class="col-sm-12  product">
							<div class="col-sm-12">
								<figure>
									<img style="width: inherit" src="/public/res/w-south-beach.jpg"
										alt="">
									<figcaption>Colombo</figcaption>
								</figure>
							</div>
							<div class="col-sm-12">

								<h3>2 Bedroom Apartment</h3>
								<hr />
							</div>
							<div class="col-sm-12">
								<h1
									style="color: green; text-transform: uppercase; font-size: 14px; font-weight: bold;">LKR
									24000 x 12</h1>
							</div>
							<div class="col-sm-12">
								<p>this is a small description about the above</p>
							</div>
							<div class="col-sm-12 rating-bar">
								<span class="glyphicon glyphicon-star"></span> <span
									class="glyphicon glyphicon-star"></span> <span
									class="glyphicon glyphicon-star"></span> <span
									class="glyphicon glyphicon-star"></span> <span
									class="glyphicon glyphicon-star"></span>
							</div>
						</div>
					</a>
				</div>


				<div class="col-sm-4 feature-box">
					<a href="#">
						<div class="col-sm-12  product">
							<div class="col-sm-12">
								<img style="width: inherit" src="/public/res/w-south-beach.jpg"
									alt=""> <label>Colombo</label>
							</div>
							<div class="col-sm-12">

								<h3>2 Bedroom Apartment</h3>
								<hr />
							</div>
							<div class="col-sm-12">
								<h1 style="color: green;">LKR 24000 x 12</h1>
							</div>
							<div class="col-sm-12">
								<p>this is a small description about the above</p>
							</div>
							<div class="col-sm-12 rating-bar">
								<span class="glyphicon glyphicon-star"></span> <span
									class="glyphicon glyphicon-star"></span> <span
									class="glyphicon glyphicon-star"></span> <span
									class="glyphicon glyphicon-star"></span> <span
									class="glyphicon glyphicon-star"></span>
							</div>
						</div>
					</a>
				</div>

				<div class="col-sm-4 feature-box">
					<a href="#">
						<div class="col-sm-12  product">
							<div class="col-sm-12">
								<figure class="col-sm-12">
									<img style="padding: 0px 1px; width: inherit"
										src="/public/res/w-south-beach.jpg" alt="" />
									<figcaption>some text here</figcaption>
								</figure>
							</div>
							<div style="padding: 0px" class="col-sm-12">
								<h3>2 Bedroom Apartment herssdsd</h3>
								<hr />
							</div>
							<div style="padding: 0px;" class="col-sm-12">
								<h1 style="color: green; padding: 0px;">LKR 24000 x 12</h1>
							</div>
							<div class="col-sm-12">
								<p>this is a small description about the above</p>
							</div>
							<div class="col-sm-12 rating-bar">
								<span class="glyphicon glyphicon-star"></span> <span
									class="glyphicon glyphicon-star"></span> <span
									class="glyphicon glyphicon-star"></span> <span
									class="glyphicon glyphicon-star"></span> <span
									class="glyphicon glyphicon-star"></span>
							</div>
						</div>
					</a>
				</div>
				
			-->
			
			<!-- products go here -->
			
			<?php include 'product.php'; ?>

			</div>
		</div>

	</div>
	</div>
		
		<?php include('tmpl/footer.php');?>
	</body>
</html>



