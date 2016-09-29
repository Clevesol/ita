<!-- Navigation -->

<?php 
	session_start();
	//if(isset($_SESSION['uname'])){
	// $user = $_SESSION['uname'];
	//}

?>

    <nav  class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://www.kedella.com">
                	<img style="max-height: 100%;" src='res/k_logo.png' alt="copyright protected kedella logo">
                </a>
				
				
				
				
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
						
                        <a href="http://www.kedella.com/"><span class="icon"><img src="/home/res/icons/home.png"></span>Home</a>
                    </li>
                    <li>
                        <a href="product.php"><span class="icon"><img src="/home/res/icons/about.png"></span>Browse Homes</a>
                    </li>
                    <li>
                     <!--  <a style="background-image: url('/home/res/icons/about.png'); background-repeat: no-repeat; " href="#">Perent</a>-->   
                    </li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin<span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<li><a href="/home/activity.php">Activities</a></li>
						</ul>
					</li>
                </ul>
                
                
                <?php if(!isset($_SESSION['uname']) || $_SESSION['uname'] == '-1'): ?>
                	<form class="navbar-form navbar-right" action="/home/login.php">
                	<input class="btn btn-default" type="submit" value="login/signup">
                	</form>
                	<?php else:?>
                		
                	<ul class='nav navbar-right'>
    							<li class='dropdown'>
									<a href='' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><?php echo $_SESSION['uname'] ?><span class='caret'></span></a>
									<ul class='dropdown-menu' aria-labelledby='about-us'>
										<li><a href='profile.php?uname=<?php echo $_SESSION['uname']?>'>profile</a></li>
										<li><a href='log'>Delete Account</a></li>
										<li><a href='opr/_ulog/_ulog.php?_logo'>Logout</a></li>
									</ul>
								</li>
	    			</ul>
                		
                	<?php  endif;?>
                
                

				<!--<ul class="nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ranushnn@mysliit.lk<span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<li><a href="#">Payments</a></li>
							<li><a href="#">Additional Activity</a></li>
							<li><a href="#">Student Progress</a></li>
						</ul>
					</li>
                </ul> -->
            </div>
        </div>
        <!-- /.container -->
    </nav>