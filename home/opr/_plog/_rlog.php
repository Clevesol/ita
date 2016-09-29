<?php
    include '../db/_con.php';
	
	$_conob = new _con();
	if(isset($_POST['submit']) && $_POST['submit'] == 'order'){
		$pid = $_POST['pid'];
		$date = $_POST['date'];
		$cletter = $_POST['cletter'];
		$count = $_POST['mcount'];
		$price = $_POST['totprice'];
		$buyer = $_POST['user'];
		
		
		$query = "insert into orders(product,count,price,date,cletter,status,buyer)
				  values('$pid','$count','$price','$date','$cletter','0','$buyer')
		";
		
		
		//echo $query;
		
		$_conob->exeQuery($query);
		echo "
		<div class='container'>
			<div class='col-sm-6 col-sm-offset-3'>
				<p>your order palced successfully. you will be notified for payment when request accepted.<a href='/'> click </a> here to continue</p>
			</div>
		</div>
		
		";
		
	}else{

		if(isset($_POST['cancel'])){
			header("location:/home/product.php");
		}else{
		header("location:/");
		}
	}
?>