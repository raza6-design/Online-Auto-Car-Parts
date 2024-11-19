<?php
include("header.php");
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
	
	
	//$btaxamt = $rsedit['cost'] * $tottaxamt  / 100;
	$btaxamt=0;
	$productamt = $btaxamt + $rsedit['cost']; 
	
if(isset($_POST['submit']))
{
    $sql = "INSERT INTO billing(customerid,purchasedate,deliverystatus,address,city,state,contactno,pincode,note,status) VALUES ('$_SESSION[customer_id]','$dt','Pending','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[contactno]','$_POST[pincode]','Payment type - $_POST[paymenttype] |Your Name $_POST[yourname] |Phone no $_POST[phoneno]|Product name- $_POST[productname]|Attach file $_POST[attachfile]','Active')";
	mysqli_query($con,$sql);	
	$insid = mysqli_insert_id($con);
	
	$sql = "UPDATE purchase SET status='Active',billingid='$insid' WHERE status='Pending'";
	$qsql = mysqli_query($con,$sql);
	
		echo "<script>alert('Billing  done successfully...');</script>";
		echo "<script>window.location='bill.php?billno=$insid';</script>";
	
}
//$taxamt = $taxamt[CGST] + $taxamt[SGST] + $taxamt[IGST];
//echo $tottaxamt;

function br2nl($input) {
    return preg_replace('/<br\\s*?\/??>/i', '', $input);
}
?>
 <!--//main-header-->
<form method="post" action="" name="frmfurpur" onsubmit="return submitfurpur()" >

<!--special-->
<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1">
	
	<!-- special -->
	<div class="special">
			<div class="services-info">
				<h2>Product Cart</h2>
			</div>
			<div class="special-grids">
				
				
				<div class="col-md-12 w3l-special-grid">
<div class="col-md-12 agileits-special-info w3-grid-2" id="divpurchasegrid">
<?php
include("ajaxcartproduct.php");
?>						
</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<hr>
			<div class="services-info">
				<h2>DELIVERY ADDRESS</h2>
			</div>
			<div class="special-grids">
<?php
$sqledit1 = "SELECT * FROM cutomer WHERE customer_id='$_SESSION[customer_id]'";		
$qsqledit1  = mysqli_query($con,$sqledit1);
$rsedit1 = mysqli_fetch_array($qsqledit1);
?>
				<div class="col-md-12 w3l-special-grid">
					<div class="col-md-4 agileits-special-info w3-grid-2 ">
						<img src="imgproducts/delivery.jpg" style="height: 275px;width: 400px;">
					</div>
					<div class="col-md-8 agileits-special-info w3-grid-2 ">
					
		<div class="col-md-12 w3l-special-grid">
			<label> Address </label><br><span id="idpurchaseadd" style="color:red"></span>
			<textarea style="height: 100px;" name="address"  placeholder="address"><?php echo br2nl($rsedit1['address']); ?></textarea>
		</div>
		
		<div class="col-md-6 w3l-special-grid">
			<label> City</label><br><span id="idpurcity" style="color:red"></span>
			<input class="form-control" type="text" id="city" name="city" placeholder="city" value="<?php echo $rsedit1['city']; ?>"/>
		</div>
		
		<div class="col-md-6 w3l-special-grid">
			<label> State</label><br><span id="idpurstate" style="color:red"></span>
			<input class="form-control" type="text" id="state" name="state" placeholder="state" value="<?php echo $rsedit1['state']; ?>"/>
		<br>
		</div>
		
		<div class="col-md-6 w3l-special-grid">
			<label> PIN code </label><br> <span id="idpurpin" style="color:red"></span>
			<input type="text" id="pincode" name="pincode" placeholder="Pin code" value="<?php echo $rsedit1['pincode']; ?>"/><br>
		</div>
		
		<div class="col-md-6 w3l-special-grid">
			<label> Contact no </label><br> <span id="idpurcon" style="color:red"></span>
			<input type="text" id="contactno" name="contactno" placeholder="contact no" value="<?php echo $rsedit1['contactno']; ?>"/><br>
		</div>
		
	
					</div>
					
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
       <hr>
            <div class="services-info">
            <h2>Note! </h2>
			
            <div class="services-info" style = "display:flex;align-items:center;justify-content:space-between;padding:3px 215px;color:White;background:#08d3e0;">
			
			
			
			<p style="font-size:20px;text-align:justify;font-weight:600;color:white;font-style:italic;"> <b style = "color:black;font:20px;">Befor payment read it carefully...</b> <br>"Please jazz cash or Easy Paisa Your amount at <br> this Account "0304-0999904" <br>"Account Title Abdur Razzaq"<br> And Take The Secreen Shot of Your Payment <br> And attach below".</p>
			
			<div class="col-md-4 agileits-special-info w3-grid-2 ">
						<img src="images/paymentgateway.png" style="height: 275px;width: 400px;">
					</div>
			
			</div>

			</div>

			<div class="services-info" style="margin-top:30px;">
				<h2>PAYMENT OPTIONS</h2>
				
			<div class="special-grids">
								
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-4 agileits-special-info w3-grid-2 ">
						<img src="images/paymentgateway.png" style="height: 275px;width: 400px;">
					</div>
					<div class="col-md-8 agileits-special-info w3-grid-2 ">
					<div class="col-md-12 w3l-special-grid">
						<label>Payment type</label><span id="idpurpay" style="color:red"></span>
		<select class="form-data col-md-6" name="paymenttype" id="paymenttype" onchange="funpaymenttype(this.value)" ><br>
			<option value=''>Select</option>
			<option value='Jazzcaash'>Jazzcaash</option>
			<option value='Easypaisa'>Easypaisa</option>
			<!-- <option value='Debit card'>Debit card</option>
			<option value='Credit card'>Credit card</option>  -->
			<option value='Cash on delivery'>Cash on delivery</option>
			</select>
			</div>
<div id="divpaymenttype">

</div>		
		<center>
		<input type="submit" name="submit" value="Make payment" class="form-control">
		
				</center>		
				</form>

						</h3>
					</div>
					
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
	</div><br><br>
	<!-- //special -->
<?php
include("footer.php");
?>
<script>
function calculatetotalcost(hiddencost,qty)
{
		document.getElementById("totcost").value = "RS"+parseFloat(hiddencost) * parseFloat(qty);
}
function funpaymenttype(paytype)
{	
	if(paytype == "Cash on delivery")
	{
		document.getElementById("divpaymenttype").innerHTML = '<div class="col-md-12 w3l-special-grid"><label><b>Cash on Delivery</b></label></div>';
	}
	else
	{
		document.getElementById("divpaymenttype").innerHTML = '<div class="col-md-6 w3l-special-grid"><label>Your Name</label><br>		<input type="text"  id="yourname" name="yourname" placeholder="Your Name "  required="" /><br></div><div class="col-md-6 w3l-special-grid"><label>Phone no</label><br><input type="text"  id="phoneno" name="phoneno" placeholder="Phone no "  required="" /><br></div>		<div class="col-md-6 w3l-special-grid"><label>Product name</label><br>		<input type="text"  id="productname" name="productname" placeholder="Product name" style="height:40px;"/><br>		</div>			<div class="col-md-6 w3l-special-grid"><label>Attach file</label><br><input type="file"  id="attachfile" name="attachfile" placeholder="Attach file"  required="" /><br></div>';		
	}
	
}
function funpurchaseupdategrid(purchaseid,qty)
{
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("divpurchasegrid").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxcartproduct.php?purchaseid="+purchaseid+"&qty="+qty,true);
        xmlhttp.send();
}
function fundeletepurchaseitem(delid)
{
	        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("divpurchasegrid").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxcartproduct.php?delid="+delid,true);
        xmlhttp.send();
}
function submitfurpur()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	if(document.frmfurpur.address.value=="")
	{
		document.getElementById("idpurchaseadd").innerHTML = "Please enter the Address..";
		i=0;
	}
	if(!document.frmfurpur.city.value.match(alphaExp))
	{
		document.getElementById("idpurcity").innerHTML = " This field should contain only alphabets..";
		i=0;
	}
	if(document.frmfurpur.city.value=="")
	{
		document.getElementById("idpurcity").innerHTML = "Please enter the City..";
		i=0;
	}
	if(document.frmfurpur.state.value=="")
	{
		document.getElementById("idpurstate").innerHTML = "Please Select The State..";
		i=0;
	}
	if(!document.frmfurpur.pincode.value.match(numericExpression))
	{
		document.getElementById("idpurpin").innerHTML = " This field should contain only numbers..";
		i=0;
	}
	if(document.frmfurpur.pincode.value=="")
	{
		document.getElementById("idpurpin").innerHTML = "Please enter the Pin Code..";
		i=0;
	}
	if(document.frmfurpur.contactno.value.length != 10)
	{
		document.getElementById("idpurcon").innerHTML = "Kindly enter 10 digit Mobile number...";
		i=0;
	}
	if(!document.frmfurpur.contactno.value.match(numericExpression))
	{
		document.getElementById("idpurcon").innerHTML = " This field should contain only numbers..";
		i=0;
	}
	if(document.frmfurpur.contactno.value=="")
	{
		document.getElementById("idpurcon").innerHTML = "Please enter the Mobile No..";
		i=0;
	}
	
	if(document.frmfurpur.paymenttype.value=="")
	{
		document.getElementById("idpurpay").innerHTML = "Please Select The Type Of Payment...";
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