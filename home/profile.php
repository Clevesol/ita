<?php 
	$page_title = "View Profile";
	include('opr/db/_con.php');
	$_conob = new _con();
?>


<html>
	<?php include 'tmpl/header.php';?>
	<body>
		<?php include 'tmpl/navigation.php';?>
		<?php if(isset($_GET['uname'])):?>
		<div class="container-fluid">
			<div style="padding-top:100px" class="col-sm-6 col-sm-offset-3">
					<form class="form-horizontal" action="opr/_ulog/_ulog.php" method="post">
						<input type="hidden" name="_logu" value="_logu">
						<?php 
							$rs = $_conob->exeQuery("select * from person where email_p='${_GET['uname']}'");
							if(mysqli_num_rows($rs)==1):
							while($row = $rs->fetch_assoc()):
						?>
						
						<div class="panel panel-default">
						
						
							<div class="panel-heading">
								<h3><?php echo $row['funame']?></h3>
							</div>
						
						
						<div class="panel-body">	
						<div class="form-group">
							<label for="email_p"  class="col-sm-4">Primary Email</label>
							<div class="col-sm-8">
								<input type="text" readonly="readonly" class="form-control" name="email_p" id="email_p" value="<?php echo $row['email_p']?>"> 
							</div>
						</div>
						
						<div class="form-group">
							<label for="add1"  class="col-sm-4">Address Line 1</label>
							<div class="col-sm-8">
								<input  type="text" class="form-control" id="add1" name="add1" value="<?php echo $row['add1']?>"> 
							</div>
						</div>
						
						<div class="form-group">
							<label for="add2"  class="col-sm-4">Address Line 2</label>
							<div class="col-sm-8">
								<input  type="text" class="form-control" id="add2" name="add2" value="<?php echo $row['add2']?>"> 
							</div>
						</div>
						
						<div class="form-group">
							<label for="city"  class="col-sm-4">City</label>
							<div class="col-sm-8">
								
								<select class="form-control" data-list="data" id="city" name="city">
												<option>select city</option>
												<?php 	
												$_conob = new _con();
												$rs = $_conob->exeQuery('select cid,cname from city');
												while($rowc = $rs->fetch_assoc()){
													
													$sel = '';
													if($rowc['cid']==$row['id']){
														$sel = 'selected';
													}
													echo "<option name='sCity' $sel value='${rowc['cid']}'>${rowc['cname']}</option>";
												}
												?>
								</select>
								
								
								<!--<input  type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']?>"> --> 
							</div>
						</div>
						
						<div class="form-group">
							<label for="phone_o"  class="col-sm-4">Phone Primary</label>
							<div class="col-sm-8">
								<input  type="tel" class="form-control" id="phone_p" name="phone_p" value="<?php echo $row['phone_p']?>"> 
							</div>
						</div>
						
						<div class="form-group">
							<label for="phone_s"  class="col-sm-4">Phone Secondary</label>
							<div class="col-sm-8">
								<input  type="tel" class="form-control" id="phone_s" name="phone_s" value="<?php echo $row['phone_s']?>"> 
							</div>
						</div>
						
						<div class="form-group">
							<label for="email_s"  class="col-sm-4">Email Secondary</label>
							<div class="col-sm-8">
								<input  type="email" class="form-control" name="email_s" id="email_s" value="<?php echo $row['email_s']?>"> 
							</div>
						</div>
						
						<input type="hidden" id="status" name="status" value="1"> 
						
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4">
								<input  type="submit" class="btn btn-default" id="btn-disable" value="update account"> 
								<input  type="submit" class="btn btn-default" id="btn-disablee" name="deactivate" value="deactivate account">
							</div>
						</div>
						
						
						</div>
						</div>
						<?php endwhile;
							else:
						?>
						<p>invalide user account</p>
						
						<?php endif; ?>
						</form>
			</div>
		</div>
		<?php else:
			header('Location:/home/login.php');
		?>
		
		<?php endif;?>
		<?php include 'tmpl/footer.php';?>
	</body>	
</html>

