<?php
include("header.php");
$sqlproductdetail  = "SELECT * FROM product WHERE productid='$_GET[productid]'";
$qsqlproductdetail = mysqli_query($con,$sqlproductdetail);
$rsproductdetail  = mysqli_fetch_array($qsqlproductdetail);	
$sqlproductsupplier  = "SELECT * FROM product WHERE productid='$rsproductdetail[productstypeid]'";
$qsqlproductsupplier = mysqli_query($con,$sqlproductsupplier);
$rsproductsupplier  = mysqli_fetch_array($qsqlproductsupplier);
if(isset($_POST['submit']))
{
    $sqlb = "INSERT INTO billing(customerid,purchasedate,deliverystatus,address,city,state,contactno,pincode,note,status) VALUES ('$_SESSION[customer_id]','$dt','Pending','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[contactno]','$_POST[pincode]','Payment type - $_POST[paymenttype] |Card holder $_POST[cardholder] |Card no $_POST[cardno]|expiry Date- $_POST[expirydate]|CVV No $_POST[cvvno]','Active')";
	mysqli_query($con,$sqlb);
	$insid = mysqli_insert_id($con);
	if(mysqli_affected_rows($con) == 1)
	{
		if( $_POST['state'] !=  "Karnataka")
		{
			$igst = $taxamt[IGST];
		}
		else
		{
			$igst = 0;
		}
		$sql = "INSERT INTO purchase(billingid,customerid,productid,qty,cost,cgsttax,sgsttax,igsttax,status) VALUES ('$insid','$_SESSION[customer_id]','$rsproductdetail[productid]','$rsproductsupplier[warranty]','$rsproductdetail[cost]','$taxamt[CGST]','$taxamt[SGST]','$igst','Active')";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		echo "<script>alert('Customized order payment done successfully...');</script>";
		echo "<script>window.location='customizedorderbillreceipt.php?insid=$insid';</script>";
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
	$sql  = "SELECT * FROM product LEFT JOIN producttype ON product.productstypeid=producttype.productstypeid LEFT JOIN cutomer ON product.supplierid=cutomer.customer_id WHERE product.status='Customized' and product.productid='$rsproductdetail[1]' ";
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
                                product type: <a href="#"><?php echo $rs['producttype']; ?></a> |  <span class="glyphicon glyphicon-tags">
                                </span>Number of Quantities : <?php echo $rs['warranty']; ?>  | <span class="glyphicon glyphicon-tags">
                                </span>Customer Budget : RS.<?php echo $rs['cost']; ?> 
                        </div>
                    </div>
                    <div class="row post-content">
                        <div class="col-md-3">
                            <a href="#">
							<center>
                                <img src="<?php echo $imgname; ?>" alt="" class="img-responsive" >
								</center>
                            </a>

                        </div>
                        <div class="col-md-9">
                            <p>
                                <?php echo $rs['description']; ?>
                            </p>
<h3>Specifications</h3>							
<table  class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<tr><th>product type</th><td><?php echo $rs['producttype']; ?></td></tr>
	<tr><th>No. of quantities Required</th><td><?php echo $rs['warranty']; ?></td></tr>
	<tr><th>Customer pays</th><td>rs<?php echo $rs['cost']; ?></td></tr>
	<tr><th>Specifications</th><td><?php echo $rs['specifications']; ?></td></tr>
</table>
		
			<hr>
<h4>Delivery detail</h4>
<table  class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<tr><th>Customer name</th></tr>
	<tr><td><?php echo $rs['customername']; ?></td></tr>
	<tr><th>Address</th></tr>
	<tr><td><?php echo $rs['address']; ?>,<br><?php echo $rs['city']; ?>,<?php echo $rs['state']; ?>,<br>PIN:<?php echo $rs['pincode']; ?></td></tr>
	<tr><th>Contact No.</th></tr>
	<tr><td><?php echo $rs['contactno']; ?></td></tr>
</table>	


<hr>
<?php
if(isset($_SESSION['customer_id']))
{
	$sqlproductbudget ="SELECT * FROM product LEFT JOIN supplier on product.supplierid=supplier.supplierid WHERE product.productstypeid='$rsproductdetail[1]' AND product.supplierid='$_GET[supplierid]' AND product.status='CustomizedBudget' ORDER BY product.productid DESC";
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
			<h2>RS.<?php echo $rsproductbudget['cost']; ?></h2>
			<center>
		</p>
	</div>
</div>     
		   </div>
            </div>
        </div>
    </div>
</div>

<hr>

					
<table class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<Tr><th>Seller budget</th><td>RS.<?php echo $sellerbudget = $rsproductbudget['cost']; ?></td></tr>
	<Tr><th>CGST(<?php echo $taxamt["CGST"]; ?>%)</th><td>RS.<?php echo $totcgst = $rsproductbudget['cost']*$taxamt["CGST"]/100; ?></td></tr>
	<Tr><th>SGST(<?php echo $taxamt["SGST"]; ?>%)</th><td>RS.<?php echo $totsgst = $rsproductbudget['cost']*$taxamt["SGST"]/100; ?></td></tr>
	<?php
	if($rs['state'] != "Karnataka")
	{
	?>
	<Tr><th>IGST(<?php echo $taxamt["IGST"]; ?>%)</th><td>RS.<?php echo  $totigst =$rsproductbudget['cost']*$taxamt["IGST"]/100; ?></td></tr>
	<?php
	}
	?>
	<Tr><th>Grand Total</th><td>RS.<?php echo $rsproductbudget['cost'] + 	$totcgst + $totsgst + $totigst; ?></td></tr> 
</table>  

<hr>
<!-- special -->
	<div class="special">
			<div class="services-info">
				<h2>PAYMENT OPTIONS</h2>
			</div>
			<div class="special-grids">
				
				<div class="col-md-4 w3l-special-grid">
					<div class="col-md-12 w3ls-special-img" style="background-image: url(imgproducts/order3.jpg);>
					</div>
					<div class="clearfix"> </div>
				</div>
				<form action="" method="post" name="frmcusorder" onsubmit="return submitcusorder12()" class="form-agileits" style= "color:black">
				<div class="col-md-8 w3l-special-grid">				
				
					<div class="col-md-12 agileits-special-info w3-grid-2 ">
 
					
					<div class="col-md-12 w3l-special-grid">
					
						<label>Payment type</label><br> <span id="idcustomerpays" style="color:red"></span>
		<select class="form-data col-md-6" name="paymenttype" id="paymenttype" onchange="funpaymenttype(this.value)" ><br>
			<option value=''>Select</option>
			<!-- <option value='VISA'>VISA </option>
			<option value='Master card'>Master card</option>
			<option value='Debit card'>Debit card</option>
			<option value='Credit card'>Credit card</option> -->
			<option value='Cash on delivery'>Cash on delivery</option>
		</select>
			</div>

<div id="divpaymenttype">

</div>		

<input type="hidden" name="address" value="<?php echo $rs['address']; ?>" >
<input type="hidden" name="city" value="<?php echo $rs['city']; ?>" >
<input type="hidden" name="state" value="<?php echo $rs['state']; ?>" >
<input type="hidden" name="pincode" value="<?php echo $rs['pincode']; ?>" >
<input type="hidden" name="contactno" value="<?php echo $rs['contactno']; ?>" >
		
		
		
		<input type="submit" name="submit" id="submit" value="Make payment"  class="form-control">
		
				</center>		
				</form>

						</h3>
					</div>
					
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
	</div>
	<!-- //special -->

<?php
	}
}
?>
			
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
function funpaymenttype(paytype)
{	
	if(paytype == "Cash on delivery")
	{
		document.getElementById("divpaymenttype").innerHTML = '<div class="col-md-12 w3l-special-grid"><label><b>Cash on Delivery</b></label></div>';
	}
	else
	{
		document.getElementById("divpaymenttype").innerHTML = '<div class="col-md-6 w3l-special-grid"><label>Card holder</label><br>		<input type="text"  id="cardholder" name="cardholder" placeholder="Card holder "  required="" /><br></div><div class="col-md-6 w3l-special-grid"><label>Card No</label><br><input type="text"  id="cardno" name="cardno" placeholder="Card No "  required="" /><br></div>		<div class="col-md-6 w3l-special-grid"><label>Expiry date</label><br>		<input type="month"  id="expirydate" name="expirydate" min="<?php echo date("Y-m"); ?>" placeholder="Expiry date" style="height:40px;"/><br>		</div>			<div class="col-md-6 w3l-special-grid"><label>CVV No</label><br><input type="text"  id="cvvno" name="cvvno" placeholder="CVV No"  required="" /><br></div>';		
	}
	
}
function submitcusorder12()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	if(document.frmcusorder.paymenttype.value=="")
	{
		document.getElementById("idcustomerpays").innerHTML = "Please Select The Type Of Payment...";
		i=0;
	}
	if(i == 1)
	{
		return true;
	}
	if(i == 0)
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