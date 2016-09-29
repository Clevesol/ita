<?php
	include '../db/_con.php';
	
	$_conob = new _con();
	session_start();
	
	
	if(isset($_GET['_logo'])){
		$_SESSION['uname'] = '-1';
		header('Location:/');
	}
	
	if(isset($_POST['_logu'])){
		if(isset($_SESSION['uname']) && $_SESSION['uname'] != '-1'){
			$uname = $_POST['email_p'];
			if($uname!=$_SESSION['uname']){
				echo "invalid user profile";
				die();
			}else{
				
				if(isset($_POST['deactivate']) && $_POST['deactivate'] =='deactivate account'){
					$_conob->exeQuery("update person set status='0' where email_p='$uname'");
				}else{
				$add1 = $_POST['add1'];
				$add2 = $_POST['add2'];
				$city = $_POST['city'];
				$phone_p = $_POST['phone_p'];
				$phone_s = $_POST['phone_s'];
				$email_s = $_POST['email_s'];
				$status = $_POST['status'];
				
				$_conob->exeQuery("update person set add1='$add1',add2='$add2',city='$city',phone_s='$phone_s',phone_p='$phone_p',status='$status',email_s='$email_s' where email_p='$uname'");
				}
				header('Location:/');
			}
		}else{
			echo "please login to continue. click here to go to ". "<a href='/home/login.php'>login page</a>";
		}
	}
	
	
	if(isset($_POST['_log'])){
		$uname = $_POST['uname'];
		$pass = $_POST['pword'];
		$rs = $_conob->exeQuery("select uname from users where uname='$uname' and pword='$pass' and status='1' ");
		$rsU = $rs->fetch_assoc();
		$_SESSION['uname'] = $rsU['uname'];
		header('Location: http://www.kedella.com');
	}else if(isset($_POST['_sup'])){
		
		
		//person_details
		$rs = $_conob->exeQuery('select max(id) from person');
		$rsId = $rs->fetch_assoc();
		$pid = $rsId['max(id)'] + 1;
		$funame = $_POST['funame'];
		$city = $_POST['city'];
		$add1 = $_POST['add1'];
		$add2 = $_POST['add2'];
		$phone_p = $_POST['phone_p'];
		$phone_s = $_POST['phone_s'];
		$email_p = $_POST['email_p'];
		$email_s = $_POST['email_s'];
		$status = '1';
		$utype = $_POST['utype'];
		//user_details
		$username = $_POST['uname2'];
		$password = $_POST['pword2'];
		
		
		$query = "insert into person(id,funame,city,add1,add2,phone_p,phone_s,email_p,email_s,status) 
				  values('$pid','$funame','$city','$add1','$add2','$phone_p','$phone_s','$email_p','$email_s','$status')";
		
		$rs = $_conob->exeQuery($query);
		if(!$rs){
			die("something went wrong user could'nt be created");
		}
		
		
		
		$query = "insert into users(uname,pword,pid,status,utype) values('$username','$password','$pid','$status','$utype')";
		$rs = $_conob->exeQuery($query);
		
		if(!$rs){
			die("something went wrong, user couldn't be created");
		}
		
		
		header('Location:/');
		
		
	}