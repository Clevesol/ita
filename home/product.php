<?php
$page_title = "Browse Homes";
include 'opr/db/_con.php';
session_start();
$_conob = new _con ();

if (isset($_SESSION ['uname'] ) && $_SESSION ['uname'] != '-1') {
	$rs = $_conob->exeQuery ( "select utype,id from users where uname='${_SESSION['uname']}'" );
	
	$tuna = mysqli_num_rows($rs);
	if ($row = $rs->fetch_assoc()) {
		$utype = $row['utype'];
		$uid = $row['utype']=='1' ? $row['id'] : '';
	}
} else {
	$utype = 0;
	$uid = '';
}


if(isset($_POST['ssterm'])){
	$term = $_POST['ssterm'];
}else{
	$term = '';
}


//die(); 

?>
<html>

	<?php if(!$inced) include 'tmpl/header.php'?>

	<body>
	
	<script type="text/javascript">

	var products = new Array();

	</script>
	<?php if(!$inced){include_once 'tmpl/navigation.php';}?>
	 
		<div style="padding-top: 60px" class="container-fluid">
			<div class="container-fluid">
				
				<div class="panel panel-default">

					
					<div class="panel-heading">
						<div class="container-fluid">
						<div  class="col-sm-2">
							<h2>Products</h2>
						</div>
						
						<div style="padding-top: 20px;" class="col-sm-9">
							<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
							<span class='col-sm-10'><input placeholder="search" value="<?php echo $term;?>" id="ssterm" name="ssterm" class="form-control" type="text" /></span>
							<span class='col-sm-1'><input  class='btn btn-default' type="submit" value='search' "></span>
							<?php if(!empty($term)) :?> <span class='col-sm-1'><input onclick="window.location='<?php echo $_SERVER['PHP_SELF']?>';"  class='btn btn-default' onsubmit="alert('asd')" type="button" value='cancel' "></span> <?php  endif; ?>
							</form>
						</div>
						
						<div style="padding-top: 22px;" class='col-sm-1'>
							<?php if($utype == '1' && !$inced)  : ?>  <span class="pull-right" >	<a class="btn btn-default" href="#adddata"><span class="glyphicon glyphicon-plus"></span> Add Product</a> </span> <?php endif; ?>
						</div>
						
					<!--	<h3>Products
						 
					<?php if($utype == '1') : ?>  <span class="pull-right" >	<button class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add Product</button> </span> <?php endif; ?>
						
					</h3> -->	
						
					</div>
					</div>
					
					</div>
					
					<div class="panel-body">
						<?php
						$rs = $_conob->exeQuery("SELECT * FROM `product` where `rcount` like '%$term%'  or `bcount` like '%$term%'  or `add1` like '%$term%' or  `add2` like '%$term%' or `city` like '%$term%' or  `description` like 
						'%$term%'  or `price` like '%$term'  or `id` like '%$term%'  or `name` like '%$term%' and `owner` like '%$uid%' ");
						
						//echo "$ssterm";
						
						while($row = $rs->fetch_assoc()):
							
						?>
						
						
						
						<script type ="text/javascript">
							
							var prod = new Object;
					<?php foreach ($row as $key => $value): ?>
							
							prod.<?php echo $key ; ?> = "<?php echo $value; ?>";		
					
					<?php endforeach;?> 	
					
							products[<?php echo $row['id']?>] = prod;
							
						</script>
						
						
						
						<?php
						
					//	echo $row['id'] . '<br/>';
						//die();
						
							$qu = "select image from gallery where id=(select min(id) from gallery where pid='${row['id']}')";
							//echo $qu;//die();
							$imagers = $_conob->exeQuery($qu);
							while($rowimage = $imagers->fetch_assoc()){
								$image = $rowimage['image'];
							}

						
						?>
						
						
						
						
			<!--	<div data-prdid="<?php echo $row['id'] ?>" class="col-sm-4 feature-box">
					<a href="#">
						<div class="col-sm-12  product">
							<div class="col-sm-12">
								<figure>
									<?php echo '<img src="data:image/png;base64,'.base64_encode($image).'"/>'; ?>
											<figcaption><?php echo $row['city'] ?></figcaption>
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
				
				
						
						
					-->
						
							<div style="padding-top:20px" data-prdid="<?php echo $row['id'] ?>" class="col-sm-4 feature-box">
							<a class="prod" href="#form-update">
								<div class="col-sm-12  product">
									<div class="col-sm-12">
										<figure>
											<?php echo '<img src="data:image/png;base64,'.base64_encode($image).'"/>';?>
											<figcaption>colombo</figcaption>
										</figure>
									</div>
									<div style="padding: 0px" class="col-sm-12">
										<h3 id="prname"><?php echo $row['name']?></h3>
										<hr />
									</div>
									<div style="padding: 0px;" class="col-sm-12">
										<h1 id="prprice" style="color: green; padding: 0px;"><?php echo 'LKR ' . $row['price']?></h1>
									</div>
									<div class="col-sm-12">
										<p><?php echo $row['description']?></p>
									</div>
									
									
									
									<?php if($utype == 0) : ?>
									<div class="col-sm-12">
										<hr/>
										<div >
										<button onclick="location.href='rent_p.php?pid=<?php echo $row['id'];?>'" class="btn btn-default"><span class="glyphicon glyphicon-check"></span> Rent</button>
										<button class="btn btn-default"><span class="glyphicon glyphicon-heart"></span> Add to Wish List</button>
										<button class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up"></span> Like</button>
										</div>
										<hr class="col-sm-12"/>
										
									</div>
									
									<?php endif; ?>
									
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
						<?php 
						endwhile;
						?>
						
					</div>
					
		
				</div>
				

	<?php if($utype == 1 && !$inced) : ?>

				
				<div id="endata" class="panel panel-default">
					<div class="panel-heading">
						<h3 id="adddata">Add Product</h3>
					</div>
					<div  class="panel-body">
						<form  action="opr/_plog/_plog.php" method="post" class="form-horizontal" rol="form" enctype="multipart/form-data">
						<div class="col-sm-6">
							<input type="hidden" value='<?php echo $uid?>' name='owner' id="owner" >
							<div class="form-group">
								<label for="pname" class="col-sm-4 control-label">Title</label>
								<div class="col-sm-8">
									<input id="pname" name="pname" type="text" class="form-control">
								</div>
							</div>
							
							<div class="form-group">
								<label for="trooms" class="col-sm-4 control-label">Total Rooms</label>
								<div class="col-sm-8">
									<input id="trooms" name="trooms" type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="tbrooms" class="col-sm-4 control-label">Total Bathrooms</label>
								<div class="col-sm-8">
									<input id="tbrooms" name="tbrooms" type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="add1" class="col-sm-4 control-label">Address Line 1</label>
								<div class="col-sm-8">
									<input id="add1" name="add1" type="text" class="form-control">
								</div>
							</div>
							
							<div class="form-group">
								<label for="add2" class="col-sm-4 control-label">Address Line 2</label>
								<div class="col-sm-8">
									<input id="add2" name="add2" type="text" class="form-control">
								</div>
							</div>
							
							<div class="form-group">
								<label for="city" class="col-sm-4 control-label">City</label>
								<div class="col-sm-8">
								<select class="form-control" data-list="data" id="city" name="city">
												<option name="sCity" value="0">select city</option>
												<?php 	
												$_conob = new _con();
												$rs = $_conob->exeQuery('select cid,cname from city');
												while($row = $rs->fetch_assoc()){
													echo "<option name='sCity' value='${row['cid']}'>${row['cname']}</option>";
												}
												?>
								</select>
								</div>
							</div>
							
							<div class="form-group">
								<label for="price" class="col-sm-4 control-label">Rental(Rs.)</label>
								<div class="col-sm-8">
									<input id="price" name="price" type="number" class="form-control">
								</div>
							</div>
							
							<div class="form-group">
								<label for="adec" class="col-sm-4 control-label">Addtional Description</label>
								<div class="col-sm-8">
									<textarea col="40" row="150" resizable="false" name="adec" id="adec" type="text" class="form-control"></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-8 col-sm-offset-4">
									<input name="submit" id="submit" type="submit" class="btn btn-default" value="add product">
								</div>
							</div>
							
						
						</div>
						
						<div class="col-sm-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>Gallery</h3>
								</div>
								<div style="height: 30%" class="panel-body">
									<div class="col-sm-12" id="image-pane">
										<center style="padding-top: 10%;">
											<p>no images found</br>
												<span>
												<button id="ofile" type="file" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add</button> 
												<input  type="file" id="fbrowser" name="fbroswer[]" multiple style="display: none">
												</span>
											</p>
										</center>
									</div>
								</div>
							</div>
						</div>
						</form>
						
						
					</div>
				</div>
				
				
				
				
				
					<div style="" id="form-update" class="panel panel-default">
						<div class="panel-heading">
							<h3 id="pr">Update Product: $<span id="uprdid">3453</span></h3>
						</div>
						
					<div class="panel-heading">
					</div>
					<div  class="panel-body">
						<form id="endata2" action="opr/_plog/_plog.php" method="post" class="form-horizontal" rol="form" enctype="multipart/form-data">
						<input type="hidden" id="uprdide" name="uprdide" value="NaN">
						<div class="col-sm-6">
							<input type="hidden" value='<?php echo $uid?>' name='owner' id="owner" >
							<div class="form-group">
								<label for="upname" class="col-sm-4 control-label">Title</label>
								<div class="col-sm-8">
									<input id="upname" name="pname" type="text" class="form-control">
								</div>
							</div>
							
							<div class="form-group">
								<label for="utrooms" class="col-sm-4 control-label">Total Rooms</label>
								<div class="col-sm-8">
									<input id="utrooms" name="trooms" type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="utbrooms" class="col-sm-4 control-label">Total Bathrooms</label>
								<div class="col-sm-8">
									<input id="utbrooms" name="tbrooms" type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="uadd1" class="col-sm-4 control-label">Address Line 1</label>
								<div class="col-sm-8">
									<input id="uadd1" name="add1" type="text" class="form-control">
								</div>
							</div>
							
							<div class="form-group">
								<label for="uadd2" class="col-sm-4 control-label">Address Line 2</label>
								<div class="col-sm-8">
									<input id="uadd2" name="add2" type="text" class="form-control">
								</div>
							</div>
							
							<div class="form-group">
								<label for="city" class="col-sm-4 control-label">City</label>
								<div class="col-sm-8">
								<select class="form-control" data-list="data" id="citys" name="citys">
												<option name="sCity" value="0">select city</option>
												<?php 	
												$_conob = new _con();
												$rs = $_conob->exeQuery('select cid,cname from city');
												while($row = $rs->fetch_assoc()){
													echo "<option name='sCity' value='${row['cid']}'>${row['cname']}</option>";
												}
												?>
								</select>
								</div>
							</div>
							
							<div class="form-group">
								<label for="price" class="col-sm-4 control-label">Rental(Rs.)</label>
								<div class="col-sm-8">
									<input id="upprice" name="price" type="number" class="form-control">
								</div>
							</div>
							
							<div class="form-group">
								<label for="adec" class="col-sm-4 control-label">Addtional Description</label>
								<div class="col-sm-8">
									<textarea col="40" row="150" resizable="false" name="adec" id="uadec" type="text" class="form-control"></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-8 col-sm-offset-4">
									<input name="submit" id="submit" type="submit" class="btn btn-default" value="update product">
									<input name="submit" id="submit" type="submit" class="btn btn-default" value="delete product">
								</div>
							</div>
							
						
						</div>
						
						<div class="col-sm-6">
						 <!--	<div class="panel panel-default">
								<div class="panel-heading">
									<h3>Gallery</h3>
								</div>
								
								<div style="height: 30%" class="panel-body">
									<div class="col-sm-12" id="image-pane">
										<center style="padding-top: 10%;">
											<p>no images found</br>
												<span>
												<button id="ofile" type="file" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add</button> 
												<input type="file" id="fbrowser" name="fbroswer[]" multiple style="display: none">
												</span>
											</p>
										</center>
									</div>
								</div> 
							</div> -->
						</div>
						</form>
						
						
					</div>
				</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<?php endif;?>
				
			</div>

	</div>
	
	<?php if(!$inced) include 'tmpl/footer.php';?>
	
	
	<script type="text/javascript">


		

		$(document).ready(function(){
			$('#ofile').click(function(event){
				  event.preventDefault();
				  var elem = document.getElementById('fbrowser');
				  var evt = document.createEvent("MouseEvents");
			      evt.initEvent("click", true, false);
			      elem.dispatchEvent(evt);
				
			});

			$('.feature-box').click(function(event){
				//changing the values to feature box value
				var index = parseInt($(this).data('prdid'));
				$('#upname').val(products[$(this).data('prdid')].name);
				$('#utrooms').val(products[$(this).data('prdid')].rcount);
				$('#utbrooms').val(products[$(this).data('prdid')].bcount);
				$('#uadd1').val(products[$(this).data('prdid')].add1);
				$('#uadd2').val(products[$(this).data('prdid')].add2);
				$('#upprice').val(products[$(this).data('prdid')].price);
				$('#uprdid').text(index);
				$('#uprdide').val(index);
				$('#uadec').val(products[$(this).data('prdid')].description);
				$('#citys').val(products[index].city).change();
			});	
		});

		

	</script>
	
	<style type="text/css">
	
		.feature-box a{
			text-decoration:none;
		}
		
	</style>
	
	</body>

</html>