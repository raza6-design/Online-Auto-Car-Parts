<?php
include("header.php");
if(isset($_GET['btncart']))
{		
	$sqltax= "SELECT * FROM tax WHERE  status='Active'";
	$qsqltax  = mysqli_query($con,$sqltax);
	while($rstax = mysqli_fetch_array($qsqltax))
	{
		$taxamt[$rstax['taxtype']] = $rstax["taxpercentage"];
		$tottaxamt = $tottaxamt + $rstax["taxpercentage"];
	}
	$sqledit = "SELECT * FROM product WHERE  product.productid='$_GET[productid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
	
	$sqloffer= "SELECT * FROM offer WHERE  productid='$_GET[productid]'";
	$qsqloffer  = mysqli_query($con,$sqloffer);
	$rsoffer = mysqli_fetch_array($qsqloffer);
	$offeramt = $rsoffer["discountamt"];
		
	//$btaxamt = $rsedit['cost'] * $tottaxamt  / 100;
	
	$sql = "INSERT INTO purchase(billingid,productid,qty,status,customerid,cgsttax,sgsttax,igsttax,cost,discount) VALUES ('0','$_GET[productid]','1','Pending','$_SESSION[customer_id]','$taxamt[CGST]','$taxamt[SGST]','$taxamt[IGST]','$rsedit[cost]','$offeramt')";
	mysqli_query($con,$sql);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		if($_GET["buynow"] == "set")
		{
			echo "<script>window.location='productpurchase.php';</script>";
		}
		else
		{
			echo "<script>alert('Product added to the cart...');</script>";
		}
		//echo "<script>window.location='productdetail.php?productid=$_GET[productid]';</script>";
	}
}
if (isset($_POST['submit']))
{
	$sqlfeedback = "INSERT INTO feedback(productid,customer_id,ratings,title,feedback,fbdate,status) VALUES ('$_GET[productid]','$_SESSION[customer_id]','$_POST[rating]','$_POST[title]','$_POST[message]','$dttim','Active')";
	mysqli_query($con,$sqlfeedback);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('feedback published successfully...');</script>";
	}
}

	$sqledit = "SELECT * FROM product WHERE  product.productid='$_GET[productid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
	
	$sqlproductimages= "SELECT * FROM productimages WHERE  productid='$_GET[productid]' AND status='Primary'";
	$qsqlproductimages  = mysqli_query($con,$sqlproductimages);
	echo mysqli_error($con);
	$rsproductimages = mysqli_fetch_array($qsqlproductimages);
		
	$sqloffer= "SELECT * FROM offer WHERE  productid='$_GET[productid]'";
	$qsqloffer  = mysqli_query($con,$sqloffer);
	$rsoffer = mysqli_fetch_array($qsqloffer);
	$offeramt = $rsoffer["discountamt"];
	
	
	//$taxamt = $rsedit['cost'] * $tottaxamt  / 100;
	$taxamt=0;
	$productamt = $taxamt + $rsedit['cost']; 
	
	$sqlstock ="SELECT sum(qty) FROM stock WHERE productid='$_GET[productid]'";
	$qsqlstock  = mysqli_query($con,$sqlstock);
	$rsstock = mysqli_fetch_array($qsqlstock);
	$sqlpurchase ="SELECT sum(qty) FROM purchase WHERE productid='$_GET[productid]'";
	$qsqlpurchase  = mysqli_query($con,$sqlpurchase);
	$rspurchase = mysqli_fetch_array($qsqlpurchase);
	$totalavailable =  $rsstock[0] -$rspurchase[0] ;
?>
 <!--//main-header-->
	<!-- special -->
	<div class="special">
			<div class="services-info">
				<h2><?php echo $rsedit['title']; ?></h2>
			</div>
			<div class="special-grids">
				
				<div class="col-md-4 w3l-special-grid">
					<div class="col-md-12 w3ls-special-img" style="background-image: url(imgproducts/<?php echo $rsproductimages['imgpath']; ?>);">
					</div>
					<center>
	<?php
	if($totalavailable >=1 )
	{
		if(!isset($_SESSION["customer_id"]))
		{
		?>
		<input value="Login to Buy" type="button" name='btnbuynow' style="border-color: red;width: 300px;height:50px;background-color:red;color:yellow;" class="form-control" onclick="window.location='#open-modal1';" />
		<?php
		}
		else
		{
		?>
		<table>
			<tr>
				<td>
				<input value="Add to Cart" type="submit" name='btncart' style="border-color: red;width: 200px;height:50px;background-color:red;color:yellow;font-size:20px;" class="form-control" onclick="window.location='productdetail.php?productid=<?php echo  $rsedit[0]; ?>&btncart=set'" />
				</td>
				<td>
				<input value="buy now" type="submit" name='btnbuynow' style="border-color: red;width: 200px;height:50px;background-color:red;color:yellow;font-size:20px;" class="form-control" onclick="window.location='productdetail.php?productid=<?php echo  $rsedit[0]; ?>&btncart=set&buynow=set'" />
				</td>
			</tr>
		</table>
		<?php
		}
	}
	else
	{
	?>
	<input value="Out of Stock" type="submit" name='btnbuynow' style="border-color: red;width: 300px;height:50px;background-color:red;color:yellow;" onclick="alert('Out of stock..')" class="form-control" />
	<?php
	}
	?>
					</center>
					<div class="clearfix"> </div>
				</div>
				
				<div class="col-md-8 w3l-special-grid">
					<div class="col-md-12 agileits-special-info w3-grid-2 ">
						<h4><?php echo $rsedit['title']; ?></h4>
						<h3 style='background-color:yellow;padding:5px;'>
<?php
if(mysqli_num_rows($qsqloffer) ==0)
{						
echo "Rs".$productamt;
}
else
{
	$productwithoffamt = $productamt - ($productamt * $offeramt/100);
echo "Rs". $productwithoffamt  . " <strike>Rss$productamt</strike> ($offeramt% off)";
}	
?>
						</h3>
						<h3 style='background-color:gold;padding:5px;'><b>Number of items available:</b>
						<?php echo $totalavailable; ?>
						
						</h3>
						<p><?php echo $rsedit['description']; ?></p>
					</div>
					
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
	</div>
	<!-- //special -->
<!-- about -->
<div class="about" id="about">
	<div class="container">
		<div class="w3-about-grid-top">
			<div class="w3-agileits-about-grids">
					<div class="col-md-4 agile-about-left">
						<div class="w3-about-border">
						<h3>Specification</h3>
						
						</div>
					
					</div>
					<div class="col-md-8 agile-about-right">
							<div class="w3l-banner-grids">
								<div class="slider">
									<div class="callbacks_container">
										<ul class="rslides" id="slider4">
										<li>
											<div class="w3ls-text">
	<p><?php echo $rsedit['specifications']; ?></p>
	

											</div>
										</li>
										

									</ul>
								</div>
								<script src="js/responsiveslides.min.js"></script>
								<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider4").responsiveSlides({
									auto: true,
									pager:true,
									nav:false,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>
							<!--banner Slider starts Here-->
								</div>
							</div>

					</div>
					<div class="clearfix"> </div>
			</div>
		</div>
	</div>
 </div>
	<!-- //about -->
	<!-- gallery -->
	<div class="gallery team-bottom" id="gallery">
		<div class="container">
			<div class="w3l_head w3l_head1">
			<h3>Photos of <?php echo $rsedit['title']; ?></h3>
			</div>
			<div class="w3layouts_gallery_grids">
				<ul class="w3l_gallery_grid" id="lightGallery">
					
					<?php
	$sqlproductimages  = "SELECT * FROM productimages WHERE status='Active' AND productid='$_GET[productid]'"; 
	$qsqlproductimages = mysqli_query($con,$sqlproductimages);
	while($rsproductimages = mysqli_fetch_array($qsqlproductimages))
	{
		?>
		<li data-title="<?php echo $rsedit['title']; ?>" data-desc="<?php echo $rsedit['description']; ?>" data-src="imgproducts/<?php echo $rsproductimages['imgpath']; ?>" data-responsive-src="imgproducts/<?php echo $rsproductimages['imgpath']; ?>"> 
			<div class="w3layouts_gallery_grid1 box">
				<a href="#">
					<img src="imgproducts/<?php echo $rsproductimages['imgpath']; ?>" alt=" " class="img-responsive" style="width:100%;height:100%;" />
					<div class="overbox">
						<h4 class="title overtext"><?php echo $rsproductimages['description']; ?></h4>
						
					</div>
				</a>
			</div>
		</li>
	<?php					
	}
	?>	
				</ul>
			</div>
		</div>
	</div>
	<!-- //gallery -->
	
	
<!-- View feedback -->
	<div class="testimonials">
		<div class="container">
		<div class="w3-test-heading">
			<h3> Customer Feedback</h3>
			</div>
			<div class="w3_testimonials_grids">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
<?php
	$sqlfeedback = "SELECT * FROM feedback LEFT JOIN cutomer ON cutomer.customer_id = feedback.customer_id WHERE productid='$_GET[productid]'";
	$qsqlfeedback  = mysqli_query($con,$sqlfeedback);
	while($rsfeedback = mysqli_fetch_array($qsqlfeedback))
	{
?>
		<li>	
			<div class="w3_testimonials_grid">
				<h3><?php echo $rsfeedback['title']; ?></h3>
				
				<b>Ratings : <?php echo $rsfeedback['ratings']; ?></b>		
				
				<h4><i><?php echo $rsfeedback['feedback']; ?></i></h4>
				<h5><?php echo $rsfeedback['customername']; ?></h5>
				<p>Published on <?php echo date("d M Y",strtotime($rsfeedback['fbdate'])); ?></p>
			</div>
		</li>
<?php
	}
?>
						</ul>
					</div>
				</section>
				<!-- flexSlider -->
					<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
					<script defer src="js/jquery.flexslider.js"></script>
					<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				  </script>
				<!-- //flexSlider -->
			</div>
		</div>
	</div>
<!-- //View feedback  -->

<!--/contact-->
<?php
if(isset($_SESSION['customer_id']))
{
?>
<div class="w3-contact" id="contact" method="post" action>
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile">
	<form action="" method="post" class="form-agileits">
		<h3 class="w3-contact-form-head">Post Feedbacks here..</h3>
		<input type="text" id="title" name="title" placeholder="Title" title="Please enter a title" required="">
		
		
		
		<textarea id="message" name="message" placeholder="YOUR MESSAGE" title="Please enter Your Comments"></textarea>
		
		
<h1>Rate for this product</h1>
<fieldset class="rating">    
    <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset>
<style>

fieldset, label { margin: 0; padding: 0; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
		<input type="submit" name="submit" class="sign-in" value="Submit">
	</form>
</div>
</div>
<?php
}
else
{
?>
<div class="w3-contact" id="contact" method="post" action>
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile">
<a href="#open-modal1" class="sign-in">
<form action="" method="post" class="form-agileits">
		<h3 class="w3-contact-form-head">Login to Post comment..</h3>
			
	</form>
</a>
</div>
</div>
<?php
}
?>
<!--//contact-->

<?php
include("footer.php");
?>