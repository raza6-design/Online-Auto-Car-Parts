<?php
include("header.php");
?>
	<!-- services -->
 <div class="services" id="services">
		<div class="container">
			<div class="ser-top wthree-3 wow fadeInDown w3-service-head">
				<h3>Supplier Account</h3>
			</div>
			<div class="w3-service-grids set-6">
				<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-home hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>You have received total <?php 
					$sqlorder = "SELECT * FROM `purchase` LEFT JOIN product ON purchase.productid=product.productid WHERE product.supplierid='" . $_SESSION['supplierid'] . "'";
					$qsqlorder = mysqli_query($con,$sqlorder);
					echo mysqli_num_rows($qsqlorder);
					?> orders.</h4>
				</div>
				<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon2 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-sort-by-attributes hi-icon hi-icon-sort-by-attributes" aria-hidden="true"></span>
					<h4><?php
					$sql  = "SELECT * FROM product LEFT JOIN producttype ON product.productstypeid=producttype.productstypeid LEFT JOIN cutomer ON product.supplierid=cutomer.customer_id WHERE product.status='Customized'";
	if(isset($_SESSION['customer_id']))
	{
		$sql = $sql  . " AND product.supplierid='$_SESSION[customer_id]'";
	}
	$sql = $sql . " ORDER BY productid DESC";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?> Customized orders available.</h4>
				</div>
				<div class="col-md-4 services-w3-grid1 ser-left wow fadeInDown icon3 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-object-align-vertical hi-icon hi-icon-object-align-vertical" aria-hidden="true"></span>
					<h4><?php
					$sqloffer ="SELECT * FROM offer WHERE supplierid='" . $_SESSION['supplierid'] . "'";
					$qslqoffer = mysqli_query($con,$sqloffer);
					echo mysqli_num_rows($qslqoffer);
					?> Offers has been set.</h4>
				</div>
				<div class="clearfix"></div>
			</div>	
		</div>
	</div>
<!-- /services -->



<?php
include("footer.php");
?>