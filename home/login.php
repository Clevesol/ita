<?php

include 'opr/db/_con.php';
$page_title = "Login/Signup";
?>

<!doctype html>
<html lang="en">
	<?php include('tmpl/header.php') ?>
	<body class="container-fluid">
		
		<script type="text/javascript">
			
		</script>
		
		<?php include('tmpl/navigation.php');
		?>
		<div class="container-fluid">
			<div style="padding-top: 100px;" class="col-sm-6 col-sm-offset-3">
				<div class="panel with-nav-tabs panel-default	">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab1primary" data-toggle="tab">Login</a>
							</li>
							<li>
								<a href="#tab2default" data-toggle="tab">Signup</a>
							</li>

						</ul>
					</div>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1primary">
								<form name="_login" method="POST" class="form-horizontal" action="opr/_ulog/_ulog.php">
									<input type="hidden" name="_log" value="1"/> 
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
										<div class="col-sm-10">
											<input  type="email" class="form-control emTxt" name="uname" id="inputEmail3"
											placeholder="Email">
										</div>
									</div>
									<div class="form-group">
										<label for="pword" class="col-sm-2 control-label">Password</label>
										<div class="col-sm-10">
											<input name="pword" type="password" class="form-control"
											id="pword" placeholder="Password">
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-1">
											<input  type="submit" class="btn btn-default" value="Sign
											In">

										</div>
									</div>

									<div class="form-group"></div>
								</form>
							</div>
							<div class="tab-pane fade" id="tab2default">
								<form  method="POST" action="opr/_ulog/_ulog.php" name="signup" class="form-horizontal">
									<input type="hidden" name="_sup" value="1"/> 
									<div class="form-group">
										<label for="uname" class="col-sm-4 control-label">Username</label>
										<div class="col-sm-6">
											<input type="email" class="form-control" id="uname2"
											placeholder="Email" name="uname2">
										</div>
										<label id="err-message"  style="visibility:hidden;padding-left:20px;color: red">username excist please choose a different username</label>
									</div>
									<div class="form-group">
										<label for="pword" class="col-sm-4 control-label">Password</label>
										<div class="col-sm-6">
											<input  type="password" class="form-control"
											id="pword2" name="pword2" placeholder="Password">
										</div>
									</div>

									<div class="form-group">
										<label for="pword3" class="col-sm-4 control-label">Confirm Password</label>
										<div class="col-sm-6">
											<input type="password" class="form-control"
											id="pword3" name="pword3" placeholder="Password">
										</div>
										<label id="err-messagep"  style="visibility:hidden;padding-left:20px;color: red">Password unmatches, please type it again</label>
									</div>
									
									<div class="form-group">
										<div class="col-sm-4">
											<hr/>
										</div>
										<div class="col-sm-4">
											<label class="control-label header">Personal Details</label>
										</div>
										<div class="col-sm-4">
											<hr/>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label" for="fname">Full Name</label>
										<div class="col-sm-6">
											<input type="text" id="fname" name="funame" placeholder="Full Name" class="form-control">
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label" for="add1">Address Line 1</label>
										<div class="col-sm-6">
											<input class="form-control" type="text" id="add1" name="add1" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-4 control-label" for="add2">Address Line 2</label>
										<div class="col-sm-6">
											<input class="form-control" type="text" id="add2" name="add2" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label" for="city">City</label>
										<div class="col-sm-6">
											<select class="form-control" data-list="data" id="city" name="city">
												<option>select city</option>
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
										<label class="col-sm-4 control-label" for="phone_p">Phone Primary(req)</label>
										<div class="col-sm-6">
											<input class="form-control" type="tel" id="phone_p" name="phone_p" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label" for="phone_s">Phone Secondary(opt)</label>
										<div class="col-sm-6">
											<input class="form-control" type="text" id="phone_s" name="phone_s" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label" for="email_p">Email Primary(req)</label>
										<div class="col-sm-6">
											<input class="form-control emTxt" type="email" id="email_p" name="email_p" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label" for="email_s">Email Secondary(opt)</label>
										<div class="col-sm-6">
											<input  class="form-control" type="email" id="email_s" name="email_s" />
										</div>
									</div>
									

									<div class="form-group">
										<label class="col-sm-4 control-label" for="utype">Signup as</label>
										<div class="col-sm-3">
										<span class="input-inline">
											<input type="radio" value="0" id="u1" name="utype"/>
											<label for="u1" class="control-label">Tenant</label>
										</span>
										</div>
										<div class="col-sm-3">
										<span style="text-align: left;" class="input-inline">
											<input type="radio" value="1" id="u0" name="utype"/>
											<label for="u0" class="control-label">Renter</label>
										</span>
										</div>
									</div>									

									<div class="form-group">
										<div class="col-sm-offset-4 col-sm-4">
											<input   type="submit" class="btn btn-default" value="Sign
											Up">

										</div>
									</div>
									
									

									<div class="form-group">
										
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
	</body>

</html>

