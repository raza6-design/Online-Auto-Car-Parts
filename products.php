<?php
include("header.php");
?>
 <!--//main-header-->

	<!-- gallery -->
	<div class="gallery team-bottom" id="gallery">
		<div class="container">
			<div class="w3l_head w3l_head1">
			<h3>Products Gallery</h3>
			</div>
			<div class="w3layouts_gallery_grids">
				<ul class="w3l_gallery_grid" >
					
					<?php
					$sql  = "SELECT * FROM product LEFT JOIN productimages ON product.productid=productimages.productid WHERE productimages.status='Primary' AND product.productstypeid='$_GET[productstypeid]' AND product.status='Active'";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		//$taxamt = $rs['cost'] * $tottaxamt  / 100;
		$taxamt = 0;
		$productamt = $taxamt + $rs['cost']; 
		
		$sqloffer= "SELECT * FROM offer WHERE  productid='$rs[productid]'";
		$qsqloffer  = mysqli_query($con,$sqloffer);
		$rsoffer = mysqli_fetch_array($qsqloffer);
		$offeramt = $rsoffer['discountamt'];
		?>
		<a href="productdetail.php?productid=<?php echo $rs[0]; ?>">
					<li > 
					<h3 style="font-size: 1.8em;color: #f3bad1;
    font-family: 'Ubuntu', sans-serif;text-align: center;letter-spacing: 5px;text-transform: uppercase; background-color:red;height: 55px;"><?php echo $rs['title']; ?></h3>
						<div class="w3layouts_gallery_grid1 box">
								<img style="width:100%;" src="imgproducts/<?php echo $rs['imgpath']; ?>" alt=" " class="img-responsive" />
								<div class="overbox">
									<h4 class="title overtext"><?php echo $rs['title']; ?></h4>
									<p class="title overtext" style="color:yellow">
<?php
if(mysqli_num_rows($qsqloffer) ==0)
{		
echo "Rs  ". intval($productamt);
}
else
{
	$productwithoffamt = $productamt - ($productamt * $offeramt/100);
echo "Rs  ". intval($productwithoffamt)  . " <strike>Rs  " . intval($productamt) . "</strike> ($offeramt% off)";
}
?>
								</p>
								</div>
						</div>
					</li>
		</a>
	<?php					
	}
	?>	
				</ul>
			</div>
		</div>
	</div>
	<!-- //gallery -->
<?php
include("footer.php");
?>
