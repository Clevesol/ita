<html>
<?php 

	$page_title = "Order";
	include 'opr/db/_con.php';
	include 'tmpl/header.php';?>
<body class="container-fluid">
<?php include 'tmpl/navigation.php';?>

<?php 

	$_conob = new _con();
	
	if(isset($_SESSION['uname']) && $_SESSION['uname'] != '-1'){
		$uname = $_SESSION['uname'];
		$uset = $_conob->exeQuery("select id,utype from users where uname='$uname'");
		while($row = $uset->fetch_assoc()){
			$user = $row['id'];	
			$utype = $row['utype'];
		}
	
	}else{
		echo "<div class='container'><div class='col-sm-6 col-sm-offset-3'><p style='padding-top:100px'>please login to continue. <a href='/home/login.php'>click here</a> to login</p></div></div>";
		
	}
	if(isset($_GET['pid'])){
		$pid = $_GET['pid'];
		$rs = $_conob->exeQuery("select name,price,description from product where id='$pid'");
		
		while($row = $rs->fetch_assoc()){
			$pname = $row['name'];
			$pprice = $row['price'];
			$pdesciption = $row['description'];
		}
		
		$rs = $_conob->exeQuery("select image from gallery where pid='$pid'");
		
		
		if(!$rs) die(mysqli_error($_conob));
		
		while($row = $rs->fetch_assoc()){
			$image = $row['image'];
		}
		//echo '<img src="data:image/png;base64,'.base64_encode($image).'"/>';
//		echo "<img src='data:image/jpeg;base64,'.base64_encode(file_get_contents($_FILES['fbrowser']['tmp_name'][0]))'/>";
	}else{
		if(isset($_SESSION['uname']) && $_SESSION['uname'] != '-1')
		echo "<p style='padding-top:100px;'>please select a <a href='/home/product.php'>procuct</a> to continue</p>";
		//die();
	}

?>

<?php if(!empty($user) && $utype != 1) : ?>


	<div style="padding-top: 100px;" class="container-fluid">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Rent Home</h3>
				</div>
				
				<div class="panel-body">
					<div class="col-sm-12">
						<form method="POST" action="opr/_plog/_rlog.php" class="form-horizontal" role="form">
							<input type="hidden" id="user" name="user" value="<?php echo $user;?>"/>
							
							<div class="form-group">
								<div class="col-sm-12">
									<!-- <a href="#"> -->
									<div class="panel panel-default">
										<div style="padding:0px;background-color:#ebebeb;" class="panel-body">
											<input type="hidden" id="pid" name="pid" value='<?php echo $pid; ?>' />
											<div style="padding: 0px;" class="col-sm-4">
												<img class="img-responsive" style="padding:0px;margin:0px;" src="res/w-south-beach.jpg">
											</div>
											<div style="max-height: 60px;" class="col-sm-8">
												<h3 class="row" style="padding-left: 10px;padding-right:20px;max-height: 20px;padding-bottom: 5px;"><?php echo $pname;?></h3>
												<h5 class="row Ellipsis" style="padding-left: 10px;"><?php echo $pdesciption; ?></h5>
												<h3 class="row" style="color:green;padding-left: 10px;max-height: 20px"><?php echo "LKR " . $pprice . "m";?><span class="pull-right"><a href="#" class="btn btn-default">Change Product</a></span></h3>
												
											</div>
										</div>
									</div>
									<!-- </a> -->
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4">from </label>
								<div class="col-sm-8">
									<input type="date" class="form-control" id="date" name="date" />
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="mcountr" class="col-sm-4">for(months) </label>
								<div class="col-sm-8">
									<div class="col-sm-8">
									<input style="width: 100%;" type="range" id="mcountr" name="mcountr" min="3" max="18"/>
									</div>
									<div class="col-sm-4">
										<input class="form-control" style="margin: 0px;" type="text" id="mcount" name="mcount">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4" for="cletter">Cover Letter :</label>
								<div class="col-sm-8">
									<textarea class="form-control" name="cletter" id="cletter" placeholder="min 50 max 450 charecters"></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<hr>
								<label class="col-sm-2" for="total">Total : </label>
								<div id="total" class="col-sm-10">
									<span id='priceD' style="text-align: right;" class="pull-right">
										<div class="col-sm-12">
											<label for='amount' class="col-sm-4">amount</label>
											<div class="col-sm-8">
												<input value="<?php echo 'LKR ' . $pprice . ' X 6';?>" type="text" class="form-control" id="amount" readonly="readonly">
											</div>
										</div>
										
										<div class="col-sm-12">
											<label for='kf' class="col-sm-4">kedella fees</label>
											<div class="col-sm-8">
												<input value="LKR 2500" type="text" class="form-control" id="kf" readonly="readonly">
											</div>
										</div>
										
										<div class="col-sm-12">
											<label for='totprice' class="col-sm-4">total(LKR)</label>
											<div class="col-sm-8">
												<input value="<?php echo ($pprice * 6) + 2500; ?>" style="color:green; font-size: 20px;" type="text" class="form-control" name="totprice" id="totprice" readonly="readonly" />
											</div>
										</div>
										
									</span>
									
									
								</div>
								<hr>
							</div>
						
							
							
							<div class="form-group">
								
								<div class="col-sm-8 col-sm-offset-4">
								<hr>	
									<input type="submit" value="order" id="submit" name="submit" class="btn btn-defaultl">
									<input type="submit" value="cancel" id="cancel" name="cancel" class="btn btn-defaultl">
								</div>
							</div>
							

						</form>
					</div>
					<!--  <div class="col-sm-6">
					
					
						<div class="col-sm-12 feature-box">
					<a href="#">
						<div class="col-sm-12  product">
							<div class="col-sm-12">
								<figure>
									<img style="width: inherit" src=" res/w-south-beach.jpg"
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
								
					
					</div> -->
				</div>
			</div>
			
		</div>
	</div>
	
	
		
	<?php endif; ?>
<?php include 'tmpl/footer.php';?>

<!--
<style type="text/css">
		.Ellipsis
		{
	    white-space: nowrap;
	    overflow: hidden;
	    text-overflow: ellipsis;
	    padding-left: 20px;
	    padding-right:20px;
		}
		
		
		
		input[type=range] {
  -webkit-appearance: none; /* Hides the slider so that custom slider can be made */
  width: 100%; /* Specific width is required for Firefox. */
  background: transparent; /* Otherwise white in Chrome */
}

input[type=range]::-webkit-slider-thumb {
  -webkit-appearance: none;
}

input[type=range]:focus {
  outline: none; /* Removes the blue border. You should probably do some kind of focus styling for accessibility reasons though. */
}

input[type=range]::-ms-track {
  width: 100%;
  cursor: pointer;

  /* Hides the slider so custom styles can be added */
  background: transparent; 
  border-color: transparent;
  color: transparent;
}


</style> -->
	

	
	<script type="text/javascript">
		
		$('#mcountr').attr('value',6);
		$('#mcount').attr('value',6	);
		
		
		
		$('#mcountr').change(function(){
			var va = $('#mcountr').val();
			$('#mcount').attr('value',va);
			resolveTotal();
		});
		
		$('#mcount').keyup(function(e){
			var t = $('#mcount').val();
			if(t.length>2){
				$('#mcount').attr('style','border : 1px solid red;outline : none;');
			}else{
				$('#mcount').attr('style','border : none;outline : none;');
				$('#mcountr').attr('value',t);
				resolveTotal();
			}
		});


		function resolveTotal(){
			var t = <?php echo $pprice ?>;
			var m = $('#mcount').val();
			
			$('#amount').attr('value','LKR ' + t + ' X ' + m);
			$('#totprice').attr('value',(parseInt(t)*parseInt(m))+ 2500);
			
		}
		
		
	</script>

	</body>
</html>
















