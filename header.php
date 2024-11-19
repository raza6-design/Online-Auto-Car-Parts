<?php
if(!isset($_SESSION)) { session_start(); }
// error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
$currentpagename = "http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$dt = date("Y-m-d");
$dttim = date("Y-m-d H:i:s");
include("dbconnection.php");
$sqltax= "SELECT * FROM tax WHERE  status='Active'";
$qsqltax  = mysqli_query($con,$sqltax);
echo mysqli_error($con);
while($rstax = mysqli_fetch_array($qsqltax))
{
	$taxamt[$rstax['taxtype']] = $rstax["taxpercentage"];
	$tottaxamt = $tottaxamt + $rstax["taxpercentage"];
}
if(isset($_POST['btnlogin']))
{
	$sqlcutomer = "SELECT * FROM cutomer WHERE emailid='$_POST[email]' AND password='$_POST[password]' AND status='Active'";
	$qsqlcutomer = mysqli_query($con,$sqlcutomer);
	echo mysqli_error($con);
	if(mysqli_num_rows($qsqlcutomer) == 1)
	{
		$rscutomer  = mysqli_fetch_array($qsqlcutomer);
		$_SESSION['customer_id'] = $rscutomer["customer_id"];
		echo "<script>alert('You have logged in Successfully..'); </script>";
		echo "<script>window.location='$currentpagename';</script>";	
	}
	else
	{
		echo "<script>alert('Invalid login credentials...'); </script>";
	}
}
if(isset($_POST['btnemplogin']))
{
	$sqlemployee="SELECT * FROM employee WHERE loginid='$_POST[adminloginid]' AND password='$_POST[adminpassword]' AND status='Active'";
    $qsqlemployee = mysqli_query($con,$sqlemployee);
	echo mysqli_error($con);
	if(mysqli_num_rows($qsqlemployee) == 1)
	{
		$rsemployee  = mysqli_fetch_array($qsqlemployee);
		$_SESSION['employeeid'] = $rsemployee['employeeid'];
		echo "<script>alert('You have logged in Successfully..'); </script>";
		echo "<script>window.location='empaccount.php';</script>";	
	}
	else
	{
		echo "<script>alert('Invalid login credentials...'); </script>";
	}
}
if(isset($_POST['btnsuplogin']))
{
	$sqlemployee="SELECT * FROM supplier WHERE loginid='$_POST[loginid]' AND password='$_POST[password]' AND status='Active'";
    $qsqlemployee = mysqli_query($con,$sqlemployee);
	echo mysqli_error($con);
	if(mysqli_num_rows($qsqlemployee) == 1)
	{
		$rsemployee  = mysqli_fetch_array($qsqlemployee);
		$_SESSION['supplierid'] = $rsemployee['supplierid'];
		echo "<script>alert('You have logged in Successfully..'); </script>";
		echo "<script>window.location='supplieraccount.php';</script>";	
	}
	else
	{
		echo "<script>alert('Invalid login credentials...'); </script>";
	}
}

if(isset($_POST['btnreg']))
{
	$sqlcutomer = "INSERT INTO cutomer (customername,emailid,password,contactno,status) VALUES ('$_POST[name]','$_POST[email]','$_POST[password]','$_POST[contactno]','Active')";
	$qsqlcutomer = mysqli_query($con,$sqlcutomer);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Registered successfully...');</script>";
		echo "<script>window.location='index.php';</script>";		
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>Online Auto Car Parts Store</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<!-- default-css-files -->
<!-- font -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="css/zoomslider.css" />
<!-- default-css-files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- gallery -->
<link rel="stylesheet" href="css/lightGallery.css" type="text/css" media="all" />
<!-- //gallery -->

<!-- Online fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Ubuntu+Condensed&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext" rel="stylesheet">
<!-- //Online fonts -->
<!-- js -->
	<script src="js/jquery.min.js"></script>
<!-- //js -->
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!-- style.css-file-->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- //style.css-file -->

<!-- Script-for-nav-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //Script-for-nav-scrolling -->

</head>
<body>
<?php
include("usermenu.php");
if(basename($_SERVER['PHP_SELF']) ==  'index.php' || basename($_SERVER['PHP_SELF']) ==  'contact.php' || basename($_SERVER['PHP_SELF']) ==  'about.php')
{
?>
<!--/main-header-->
	<div id="demo-1" data-zs-src='["images/ban8.jpg", "images/itri.png", "images/ban11.webp","images/auto2.jpg"]' data-zs-overlay="dots">
		<div class="demo-inner-content">
		<!--/header-w3l-->
			   <div class="header-w3-agileits" id="home">
			     <div class="inner-header-agile">	
								<nav class="navbar navbar-default">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
										<h1><i class="fa fa-car" aria-hidden="true"></i><a  href="index.php">Auto <span>Car Parts</span></a>
										 
										</h1>
									</div>
									<!-- navbar-header -->
									<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
										
<?php
include("menu.php");
?>


									</div>
									<div class="clearfix"> </div>	
								</nav>
									
					
							</div> 

			
		<!--//header-w3l-->
			<!--/banner-info-->
			<div class="w3-banner-head-info">
					<div class="w3-border-banner">
					 </div>
					<div class="baner-info">   
						<h3>Wel<span>Come </span>To   <span>Auto</span>car part.pk</h3>
						<h4>Innovation <span>and</span> you</h4>
						<p>Bringing any part that you want </p>
					</div>
			</div>
			<!--/banner-ingo-->
			
		</div>
	</div>
 </div>
  <!--/banner-section-->
<?php
}
else
{
?>
<!--/main-header-->
		<div class="demo-inner-content" style="background-color:black;">
		<!--/header-w3l-->
			   <div class="header-w3-agileits" id="home">
			     <div class="inner-header-agile">	
								<nav class="navbar navbar-default">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
										<h1><i class="fa fa-car" aria-hidden="true"></i><a  href="index.php">Auto<span>Car Parts</span></a>
										 
										</h1>
									</div>
									<!-- navbar-header -->
									<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
										
<?php
include("menu.php");
?>


									</div>
									<div class="clearfix"> </div>	
								</nav>
									
					
							</div> 

			
		<!--//header-w3l-->

			
		</div>
	</div>
  <!--/banner-section-->
<?php
}
?>