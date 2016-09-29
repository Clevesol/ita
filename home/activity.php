<!doctype html>
<?php 

	session_start();
	$page_title = "Activity";
	include 'tmpl/header.php'; 
	include 'opr/db/_con.php';
	
	/*
	 * 	1 accept
	 * 	0 inprogress
	 * -1 deleted
	 *  2 declained
	 */

?>

<?php 
	$_conob = new _con();
	
	if(isset($_SESSION['uname']) && $_SESSION['uname'] != '-1'){
		$rs = $_conob->exeQuery("select id,utype from users where uname='{$_SESSION['uname']}'");
		while ($row = $rs->fetch_assoc()) {
			$utype = $row['utype'];
			$uid = $row['id'];
		}

	}else{
		echo "<div style='padding-top: 100px;' class='container'>
			<div class='col-sm-6 col-sm-offset-3'>
				<h3>invalid request.<a href='/'> click </a> here to continue</h3>
			</div>
		</div>
		";
		
	}
	
	


?>

<html>
	<body class="container-fluid">
		<?php include 'tmpl/navigation.php'; 
		
		
			if($utype == '1'):
		?>
			<div style='padding-top: 100px;' class="container">
				<div class="col-sm-10 col-sm-offset-1">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Requests</h3>
						</div>
						
						
						
						<div class="panel-body">
							
							<table class="col-sm-12 table" cols="4">
								<thead>
								<tr>
									<th>#Order</th>
									<th>desciption</th>
									<th>Cover Letter</th>
									<th>status</th>
								</tr>
								</thead>
							<?php
							
								$rs = $_conob->exeQuery("SELECT orders.cletter,orders.id,product.name,orders.status FROM `orders`,`product` WHERE `orders`.`product` = `product`.`id` and product.owner = '$uid' and orders.status !='1'");
								while($row = $rs->fetch_assoc()):
							 ?>
							 
							 <tr>
							 	<td><?php echo $row['id'] ?></td>
							 	<td><?php echo $row['name'] ?></td>
							 	<td><?php echo $row['cletter']?></td>
							 	<td>
							 	<span>
							 		<form action='t.php' method='POST' >
							 			<input type="hidden" value="<?php echo $row['id']?>" name="prod" />
							 			<input class="btn btn-default"  name="opr" id='opr' type="submit" value="accept" >
							 		</form>
							 	
							 		<!-- <a href='t.php?opr=accept' type="submit" name='prod' value="1" class="btn btn-default">Accept</a> -->
							 		
							 	</span>
							 	<span>
							 		<form action='t.php' method='POST' >
							 			<input class="btn btn-default" name="opr" id='opr' type="submit" value="reject" >
							 		</form>
							 		<!-- <a href='t.php?opr=reject' type="submit" name='prod' value="2" class="btn btn-default">Reject</a>-->
							 		</span> 
							 	</td>
							 </tr>
							 	
							 
							 <?php endwhile; ?>
							</table>
						</div>
						
						
						
					</div>
					
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Payment History</h3>
						</div>
					</div>
					
				</div>
			</div>
			
			<?php else :?>
				<div style="padding-top: 100px" class="container">
				<div class="col-sm-10 col-sm-offset-1">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Requests</h3>
						</div>
						
						
						
						<div class="panel-body">
							
							<table class="col-sm-12 table" cols="3">
								<thead>
								<tr>
									<th>#Order</th>
									<th>desciption</th>
									<th>status</th>
								</tr>
								</thead>
							<?php
							
								$rs = $_conob->exeQuery("SELECT orders.id as id,product.name as name,orders.status as status,orders.price as price FROM `orders`,`product` WHERE `orders`.`product` = `product`.`id` and orders.buyer = '$uid'");
								//print_r($rs->fetch_assoc()); die();
								while($row = $rs->fetch_assoc()):
							 ?>
							 
							 <tr>
							 	<td><?php echo $row['id'] ?></td>
							 	<td><?php echo $row['name'] ?></td>
							 	<td><?php 
							 	
							 			$sta =  $row['status'];
							 			$loc = '#';
							 			if($sta == '-1'){
							 				$cls = 'btn btn-danger';
											$txt = "REJECTED";
							 			}else if($sta == '0'){
							 				$cls = 'btn btn-warning';
											$txt = "INPROGRESS";
							 			}else if($sta == '1'){
							 				$cls = 'btn btn-success';
							 				$txt = "ACCEPTED";
											$loc = 'makePayment.php';
							 			}else if($sta == '3'){
							 				$cls = 'btn btn-success';
							 				$txt = "PAYED";
											$loc = '#';
							 			}else{
							 				$cls = 'btn btn-default';
							 				$txt = "ERROR";
							 			}
										
										echo "
										<form method='post' action='$loc'>
										<input type='hidden' id='uid' name='uid' value='$uid' />
										<input type='hidden' id='oid' name='oid' value='{$row['id']}' />
										<input type='hidden' id='amount' name='amount' value='{$row['price']}' />
										<input type='submit' style='width:100%;' class='$cls' value='$txt' />
										</form>
										";
							 		
							 		
							 		?></td>
							 </tr>
							 	
							 
							 <?php endwhile; ?>
							</table>
						</div>
					</div>
					
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Payment History</h3>
						</div>
					</div>
					
				</div>
			</div>
				
			
		<?php endif; include 'tmpl/footer.php'; ?>
	</body>
</html>