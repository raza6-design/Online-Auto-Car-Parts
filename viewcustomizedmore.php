<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM product WHERE productid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('product record deleted successfully..');</SCRIPT>";
	}
}
if(isset($_POST['submit']))
{
	$sql = "DELETE FROM product WHERE productstypeid='$_GET[productid]' AND supplierid='$_SESSION[supplierid]' ";
	mysqli_query($con,$sql);
	$sqlz = "INSERT INTO product(productstypeid,supplierid,title,description,cost,warranty,status) VALUES ('$_GET[productid]','$_SESSION[supplierid]','$_POST[title]','$_POST[description]','$_POST[budget]','$_POST[noofdays]','CustomizedBudget')";
	mysqli_query($con,$sqlz);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error();
	}
}

		
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1 ">
						<center><h4>View Customized Order</h4></center>
						<p>			
<?php
	$sql  = "SELECT * FROM product LEFT JOIN producttype ON product.productstypeid=producttype.productstypeid LEFT JOIN cutomer ON product.supplierid=cutomer.customer_id WHERE product.status='Customized' and product.productid='$_GET[productid]' ";
	if(isset($_SESSION['customer_id']))
	{
		$sql = $sql  . " AND product.supplierid='$_SESSION[customer_id]'";
	}
	$sql = $sql . " ORDER BY productid DESC";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		$sqlimg = "SELECT * FROM productimages where productid='$rs[productid]'";
		$qsqlimg = mysqli_query($con,$sqlimg);
		$rsimg = mysqli_fetch_array($qsqlimg);
		if(file_exists("imgcustomizedorder/".$rsimg['imgpath']))
		{
			$imgname = "imgcustomizedorder/".$rsimg['imgpath'];
		}
		else
		{
			$imgname = "images/No_Image_Available.jpg";
		}
?>		
<div class="container panel panel-default">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 post">
                    <div class="row">
                        <div class="col-md-12">
                            <h4><?php echo $rs['title']; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 post-header-line">
                            <span class="glyphicon glyphicon-user"></span>by <a href="#"><?php echo $rs['customername']; ?></a> | <span class="glyphicon glyphicon-comment"></span>
                                Product type: <a href="#"><?php echo $rs['producttype']; ?></a> |  <span class="glyphicon glyphicon-tags">
                                </span>Number of Quantities : <?php echo $rs['warranty']; ?>  | <span class="glyphicon glyphicon-tags">
                                </span>Customer Budget : RS <?php echo $rs['cost']; ?> 
                        </div>
                    </div>
                    <div class="row post-content">
                        <div class="col-md-3">
                            <a href="#">
							<center>
                                <img src="<?php echo $imgname; ?>" alt="" class="img-responsive" >
								</center>
                            </a>
<hr>
<h4>Customer detail</h4>
<table  class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<tr><th>Customer name</th></tr>
	<tr><td><?php echo $rs['customername']; ?></td></tr>
	<tr><th>Address</th></tr>
	<tr><td><?php echo $rs['address']; ?>,<br><?php echo $rs['city']; ?>,<?php echo $rs['state']; ?>,<br>PIN:<?php echo $rs['pincode']; ?></td></tr>
	<tr><th>Contact No.</th></tr>
	<tr><td><?php echo $rs['contactno']; ?></td></tr>
</table>
                        </div>
                        <div class="col-md-9">
                            <p>
                                <?php echo $rs['description']; ?>
								<hr>
                            </p>
<h3>Specifications</h3>							
<table  class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<tr><th>Product type</th><td><?php echo $rs['producttype']; ?></td></tr>
	<tr><th>No. of quantities Required</th><td><?php echo $rs['warranty']; ?></td></tr>
	<tr><th>Customer pays</th><td><?php echo $rs['cost']; ?></td></tr>
	<tr><th>Specifications</th><td><?php echo $rs['specifications']; ?></td></tr>
</table>
			
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	}
?>

<!--/Supplier form-->
<?php
if(isset($_SESSION['supplierid']))
{
?>
<div class="col-md-12">
	<div  class="col-md-4">
		<div class="content-w3ls w3-agile w3-agileits agileinfo" style="width:100%;">
			<form action="" method="post">
				<h4 class="w3-contact-form-head" style="color:white;">Enter your budget</h4>
<?php
	$sqleditbudget  = "SELECT * FROM product WHERE productstypeid='$_GET[productid]' AND supplierid='$_SESSION[supplierid]' ";	
	$qsqleditbudget = mysqli_query($con,$sqleditbudget);
	$rseditbudget = mysqli_fetch_array($qsqleditbudget);
?>
				<label>Title</label><br> 
				<input type="text" id="title" name="title" value="<?php echo $rseditbudget['title']; ?>"/><br>
				<label>Description </label><br> 
				<textarea name="description"  ><?php echo $rseditbudget['description']; ?></textarea>
				<label>Budget </label><br>
				<input type="text" id="budget" name="budget"  value="<?php echo $rseditbudget['cost']; ?>"  /><br>
				<label>No of days </label><br> 
				<input type="text"  id="noofdays" name="noofdays"   value="<?php echo $rseditbudget['warranty']; ?>" /><br>
				
				
				<input type="submit" name="submit" class="sign-in" value="Submit">
			</form>
			<hr>
		</div>
	</div>
	
	<div  class="col-md-8">
	<?php
			echo "<h2><u>View other Sellers budget</u></h2>";
$sqlproductbudget ="SELECT * FROM product LEFT JOIN supplier on product.supplierid=supplier.supplierid WHERE product.productstypeid='$_GET[productid]' AND product.status='CustomizedBudget' ORDER BY product.productid DESC";
	$qsqlproductbudget = mysqli_query($con,$sqlproductbudget);
	echo mysqli_error($con);
	while($rsproductbudget = mysqli_fetch_array($qsqlproductbudget))
	{
		if($rsproductbudget['companylogo'] == "")
		{
			$imgname = "images/No_Image_Available.jpg";
		}
		else
		{
			if(file_exists("imgsupplier/".$rsproductbudget['companylogo']))
			{
				$imgname ="imgsupplier/".$rsproductbudget['companylogo'];
			}
			else
			{
				$imgname = "images/No_Image_Available.jpg";
			}
		}
?>
<hr>
<div class="container panel panel-default">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 post">
                    <div class="row">
                        <div class="col-md-12 post-header-line">
                            <span class="glyphicon glyphicon-user"></span>Company name: <a href="#"><?php echo $rsproductbudget['companyname']; ?></a>   | 
                            <span class="glyphicon  glyphicon-tags"></span>No. of days: <a href="#"><?php echo $rsproductbudget['warranty']; ?> days</a> 
                        </div>
                    </div>
<div class="row post-content">
	<div class="col-md-2">
		<a href="#">
		<?php  ?>
		<center>			
			<img src="<?php echo $imgname; ?>" alt="" class="img-responsive" >
			</center>
		</a>
	</div>
	<div class="col-md-7">
		<p><b ><?php echo $rsproductbudget['title']; ?></b><br><?php echo $rsproductbudget['description']; ?></p>
	</div>
	<div class="col-md-3  panel panel-default">
		<p>
			<center><b>Seller budget</b><br>
			<h2>RS <?php echo $rsproductbudget['cost']; ?></h2>
			<center>
		</p>
	</div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
	}
	?>
	</div>
	
</div>
<?php
}
if(isset($_SESSION['customer_id']))
{
	$sqlproductbudget ="SELECT * FROM product LEFT JOIN supplier on product.supplierid=supplier.supplierid WHERE product.productstypeid='$_GET[productid]' AND product.status='CustomizedBudget' ORDER BY product.productid DESC";
	$qsqlproductbudget = mysqli_query($con,$sqlproductbudget);
	echo mysqli_error($con);
	if(mysqli_num_rows($qsqlproductbudget) >=1)
	{
		echo "<h2><u>View Seller budget</u></h2>";
	}
	while($rsproductbudget = mysqli_fetch_array($qsqlproductbudget))
	{
		if($rsproductbudget['companylogo'] == "")
		{
			$imgname = "images/No_Image_Available.jpg";
		}
		else
		{
			if(file_exists("imgsupplier/".$rsproductbudget['companylogo']))
			{
				$imgname ="imgsupplier/".$rsproductbudget['companylogo'];
			}
			else
			{
				$imgname = "images/No_Image_Available.jpg";
			}
		}
?>
<hr>
<div class="container panel panel-default">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 post">
                    <div class="row">
                        <div class="col-md-12 post-header-line">
                            <span class="glyphicon glyphicon-user"></span>Company name: <a href="#"><?php echo $rsproductbudget['companyname']; ?></a>   | 
                            <span class="glyphicon  glyphicon-tags"></span>No. of days: <a href="#"><?php echo $rsproductbudget['warranty']; ?> days</a> 
                        </div>
                    </div>
<div class="row post-content">
	<div class="col-md-2">
		<a href="#">
		<?php  ?>
		<center>			
			<img src="<?php echo $imgname; ?>" alt="" class="img-responsive" >
			</center>
		</a>
	</div>
	<div class="col-md-8">
		<p><b ><?php echo $rsproductbudget['title']; ?></b><br><?php echo $rsproductbudget['description']; ?></p>
	</div>
	<div class="col-md-2  panel panel-default">
		<p>
			<center><b>Seller budget</b><br>
			<h2>RS <?php echo $rsproductbudget['cost']; ?></h2>
			<center>
			<input type="button" name="submit" value="Accept" class="form-control" onclick="window.location='customizedorderbill.php?productid=<?php echo $rsproductbudget[0]; ?>&supplierid=<?php echo $rsproductbudget['supplierid']; ?>'">
		</p>
	</div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
	}
}
?>
<!--//Supplier form ends-->



						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
	<!-- //special -->
<script>
function confirmmsg()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>	
<?php
include("datatable.php");
include("footer.php");
?>
<style>

a:hover { text-decoration:none; }
.btn
{
    transition: all .2s linear;
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -o-transition: all .2s linear;
}
.btn-read-more
{
    padding: 5px;
    text-align: center;
    border-radius: 0px;
    display: inline-block;
    border: 2px solid #662D91;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 12px;
    color:#662D91;
}

.btn-read-more:hover
{
    color: #FFF;
    background: #662D91;
}
.post { border-bottom:1px solid #DDD }
.post-title {  color:#662D91; }
.post .glyphicon { margin-right:5px; }
.post-header-line { border-top:1px solid #DDD;border-bottom:1px solid #DDD;padding:5px 0px 5px 15px;font-size: 12px; }
.post-content { padding-bottom: 15px;padding-top: 15px;}

</style>