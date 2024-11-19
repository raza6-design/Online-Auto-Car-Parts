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
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1 ">
						<center><h4>View Customized Order</h4></center>
						<p>			
<?php
	$sql  = "SELECT * FROM product LEFT JOIN producttype ON product.productstypeid=producttype.productstypeid LEFT JOIN cutomer ON product.supplierid=cutomer.customer_id WHERE product.status='Customized'";
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
                            <h4><a href="viewcustomizedmore.php?productid=<?php echo $rs[0]; ?>"><?php echo $rs['title']; ?></a></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 post-header-line">
                            <span class="glyphicon glyphicon-user"></span>by <a href="#"><?php echo $rs['customername']; ?></a> | <span class="glyphicon glyphicon-comment"></span>
                                Product type: <a href="#"><?php echo $rs['producttype']; ?></a> |  <span class="glyphicon glyphicon-tags">
                                </span>Number of Quantities : <?php echo $rs['warranty']; ?> | <span class="glyphicon glyphicon-tags">
                                </span>Customer Budget : RS.<?php echo $rs['cost']; ?> 
                        </div>
                    </div>
                    <div class="row post-content">
                        <div class="col-md-3">
                            <a href="#">
                                <img src="<?php echo $imgname; ?>" alt="" class="img-responsive" style="width:100%;height:150px;">
                            </a>
                        </div>
                        <div class="col-md-9">
                            <p>
                                <?php echo substr($rs['description'], 0, 300); ?>
								
                            </p>
							
                            <p>
                                <a class="btn btn-read-more" href="viewcustomizedmore.php?productid=<?php echo $rs[0]; ?>">Read more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<?php
	}
?>

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