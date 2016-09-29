<?php
	$items = array('item 1','item 2','item 3','item 4','item 5','item 6','item 1','item 2','item 3','item 4','item 5','item 6');
?>


<!DOCTYPE html>
<html>
<head>
	<title>static page</title>
</head>

<style type="text/css">
	ul{
		display: block;
	}

	ul>li{
		display: block;
		text-decoration: none;
		color:green;
		float: left;
		padding-left:20px;
	}
</style>


<body>
	<ul>
		<?php
			foreach($items as $val){
				echo "<li >$val</li>";
			}
		?>
	</ul>
</body>
</html>