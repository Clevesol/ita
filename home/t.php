<!DOCTYPE  html>

<html>

<?php 

	$page_title = 'accept';
	ini_set('display_errors', 1);

	include ('tmpl/header.php');
	include ('opr/db/_con.php'); 
?>
<body>
<?php 
include 'tmpl/navigation.php';	
	if(isset($_POST['opr'])){
		
		$_conob = new _con();
		
		if($_POST['opr']=='accept'){
			
			
			$rs = $_conob->exeQuery("update orders set status='1' where id='{$_POST['prod']}' ");
			
			echo "
				<div style='padding-top: 100px' class='container-fluid'>
				<!--	<div clas='col-sm-6 col-sm-offset-3'> -->
						<h3 class='col-sm-6 col-sm-offset-3'>success your tenat will recieve a notification . click <a href='/'>here </a> to continue.</h3>
				<!--	</div> --->
				</div>
			
			";
			
			
		}else if($_POST['opr']=='reject'){
			
		}else{
			echo "
				<div style='padding-top: 100px' class='container-fluid'>
					<div clas='col-sm-6 col-sm-offset-3'>
						<h3>invalid operation or request click <a href='/'>here </a> to continue.</h3>
					</div>
				</div>
			
			";
		}
	}else{
		echo "
				<div style='padding-top: 100px' class='container-fluid'>
				<!--	<div clas='col-sm-6 col-sm-offset-3'> -->
						<h3 class='col-sm-6 col-sm-offset-3'>invalid operation or request click <a href='/'>here </a> to continue.</h3>
				<!--	</div> --->
				</div>
			
			";
	}

?>

</body>

</html>