<?php

require '../db/_con.php';

$_conob = new _con();
if (isset($_POST['submit']) && $_POST['submit'] == 'add product') {
	


	$rs = $_conob -> exeQuery('select max(id) from product');

	while ($row = $rs -> fetch_assoc()) {
		$id = $row['max(id)'];
	}

	$pid = $id + 1;

	$name = $_POST['pname'];
	$rcount = $_POST['trooms'];
	$bcount = $_POST['tbrooms'];
	$owner = $_POST['owner'];
	$add1 = $_POST['add1'];
	$add2 = $_POST['add2'];
	$city = $_POST['city'];
	$description = $_POST['adec'];
	$price = $_POST['price'];

	$rs = $_conob -> exeQuery("insert into product(id,name,rcount,bcount,
				owner,add1,add2,city,description,price) 
				values('$pid','$name','$rcount','$bcount','$owner','$add1','$add2',
				'$city','$description','$price')");
	if (!$rs) {
		//die(' query 1' . mysqli_error($_conob));
	}


	if (isset($_FILES['fbrowser']) && count($_FILES['fbrowser']['tmp_name']) > 0) {
		for ($t = 0; $t < count($_FILES['fbroswer']['tmp_name']); $t++) {
			if(!empty($_FILES['fbroswer']['tmp_name'])){
			$image = addslashes(file_get_contents($_FILES['fbroswer']['tmp_name'][$t]));
			$rs = $_conob -> exeQuery("insert into gallery(image,pid) values('$image','$pid')");
			}
		}
	}
	//echo '<img src="data:image/jpeg;base64,'.base64_encode(file_get_contents($_FILES['fbrowser']['tmp_name'][0])).'"/>';

	if (!$rs) {
		//die(mysqli_error($_conob));
	}
	
	header('location:/home/product.php');
	
} else if (isset($_POST['submit']) && $_POST['submit'] == 'update product') {

	$pid = $_POST['uprdide'];
	$name = $_POST['pname'];
	$rcount = $_POST['trooms'];
	$bcount = $_POST['tbrooms'];
	$owner = $_POST['owner'];
	$add1 = $_POST['add1'];
	$add2 = $_POST['add2'];
	$city = $_POST['citys'];
	$description = $_POST['adec'];
	$price = $_POST['price'];

	$query = "update product set name='$name',rcount='$rcount',
	bcount='$bcount',add1='$add1',add2='$add2',city='$city',description='$description',price='$price'
	where id='$pid' and owner='$owner';
	";
	
	$_conob->exeQuery($query);
	header('location:/home/product.php');

}else if(isset($_POST['submit']) && $_POST['submit'] == 'delete product'){
	$pid = $_POST['uprdide'];
	$owner = $_POST['owner'];
	$query = "delete from gallery where pid='$pid'";
	$_conob->exeQuery($query);
	$query = "delete from product where id='$pid' and owner='$owner'";
	$_conob->exeQuery($query);
	header('location:/home/product.php');
}else{

	header('Location:/home/product.php');
}







