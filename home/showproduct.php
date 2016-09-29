<?php $page_title = "Products";?>


<html>


<?php include('tmpl/header.php');
	  include('opr/db/_con.php');
?>

<body>
	<div class="container-fluid">
	
	
		<?php include('tmpl/navigation.php')?>
		<div style="padding-top: 100px;">
		<?php 
		
			$_conob = new _con();
			
			$rs = $_conob->exequery("select * from iq_db.questions;");
			
			echo "<ul>";
			while($row = $rs->fetch_assoc()){
				echo "<li>${row['answers']}</li>";
			}
			echo "</ul>";
		
		?>
			content for the prodcut page
		</div>
		<?php include('tmpl/footer.php');
		?>
	</div>
</body>
	
</html>