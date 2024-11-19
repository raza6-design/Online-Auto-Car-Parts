<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE purchase SET billingid='$_POST[billingid]',customerid='$_POST[customerid]',productid='$_POST[productid]',qty='$_POST[qty]',cost='$_POST[cost]',cgsttax='$_POST[cgsttax]',sgsttax='$_POST[sgsttax]' ,igsttax='$_POST[igsttax]',discount='$_POST[discount]',status='$_POST[status]'  WHERE purchaseid='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Purchase record Updated successfully...');</script>";
		}
	}
	else
	{
	$sql = "INSERT INTO purchase(billingid,customerid,productid,qty,cost,cgsttax,sgsttax,igsttax,discount,status) VALUES ('$_POST[billingid]','$_POST[customerid]','$_POST[productid]','$_POST[qty]','$_POST[cost]','$_POST[cgsttax]','$_POST[sgsttax]','$_POST[igsttax]','$_POST[discount]','$_POST[status]')";
	mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('purchase record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error();
	}
}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM purchase WHERE purchaseid='$_GET[editid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
 
<!--/purchase Form-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="#" method="post" name="frmpurch" onsubmit="return submitpurchase1()" class="form-agileits">
		<h3 class="w3-contact-form-head">purchase Form</h3>
		<label>Billingid</label><br> <span id="idpurbilling" style="color:red"></span>
		<select class="form-data" name="billingid" id="billingid" >
			<option value=''>Select</option>
			<?php
	$sqlpur = "SELECT * FROM  billing WHERE status='Active'";
	$qsqlpur = mysqli_query($con,$sqlpur);
	while($rspur = mysqli_fetch_array($qsqlpur))
	{
		if($rspur[billingid] == $rsedit[billingid])
		{
			echo "<option value='$rspur[billingid]' selected>$rspur[deliverystatus]</option>";
		}
		else
		{
			echo "<option value='$rspur[billingid]'>$rspur[deliverystatus]</option>";
		}
	}
	?>
		</select><br><br>
		<label>Customer</label><br> <span id="idpurcustomer" style="color:red"></span>
		<select class="form-data" name="customerid" id="customerid" >
			<option value=''>Select</option>
			<?php
	$sqlpur = "SELECT * FROM  cutomer WHERE status='Active'";
	$qsqlpur = mysqli_query($con,$sqlpur);
	while($rspur = mysqli_fetch_array($qsqlpur))
	{
		if($rspur[customer_id] == $rsedit[customerid])
		{
			echo "<option value='$rspur[customer_id]' selected>$rspur[customername]</option>";
		}
		else
		{
			echo "<option value='$rspur[customer_id]'>$rspur[customername]</option>";
		}
	}
	?>
		</select><br><br>
		<label>product</label><br> <span id="idpurproduct" style="color:red"></span>
		<select class="form-data" name="productid" id="productid" >
			<option value=''>Select</option>
			<?php
	$sqlpur = "SELECT * FROM  product WHERE status='Active'";
	$qsqlpur = mysqli_query($con,$sqlpur);
	while($rspur = mysqli_fetch_array($qsqlpur))
	{
		if($rspur[productid] == $rsedit[productid])
		{
			echo "<option value='$rspur[productid]' selected>$rspur[title]</option>";
		}
		else
		{
			echo "<option value='$rspur[productid]'>$rspur[title]</option>";
		}
	}
	?>
		</select><br><br>
		<label>Quality</label><br> <span id="idpurqty" style="color:red"></span>
		<input type="text"  id="qty" name="qty" placeholder="quality "  value="<?php echo $rsedit['qty']; ?>"/><br>
		<label> cost </label><br> <span id="idpurcost" style="color:red"></span>
		<input type="text" id="cost" name="cost" placeholder="cost " value="<?php echo $rsedit['cost']; ?>"/><br>
		<label> CGST tax </label><br> <span id="idpurcgsttax" style="color:red"></span>
		<input type="text" id="cgsttax" name="cgsttax" placeholder="CGST tax" value="<?php echo $rsedit['cgsttax']; ?>"/><br>
		<label> SGST tax</label><br> <span id="idpursgsttax" style="color:red"></span>
		<input type="text" id="sgsttax" name="sgsttax" placeholder=" SGST tax" value="<?php echo $rsedit['sgsttax']; ?>"/><br>
		<label> IGST tax</label><br> <span id="idpurigsttax" style="color:red"></span>
		<input type="text" id="igsttax" name="igsttax" placeholder=" IGST tax" value="<?php echo $rsedit['igsttax']; ?>"/><br>
		<label> Discount</label><br><span id="idpurdiscount" style="color:red"></span>
		<input type="text" id="discount" name="discount" placeholder="discount" value="<?php echo $rsedit[discount]; ?>"/><br>
		<label>Status</label><br><span id="idpurstatus" style="color:red"></span>
		<select class="form-data" name="status" id="status" >
			<option value=''>Select</option>
			<option value='Active'>Active</option>
			<option value='Inactive'>Inactive</option>
		</select>
		<input type="submit" name="submit" class="sign-in" value="Submit">
	</form>
</div>
</div>
<!--//contact-->

<?php
include("footer.php");
?>

<script>
function submitpurchase1()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	
	if(document.frmpurch.billingid.value=="")
	{
		document.getElementById("idpurbilling").innerHTML = "Please Select the billingid ...";
		i=0;
	}
	if(document.frmpurch.customerid.value=="")
	{
		document.getElementById("idpurcustomer").innerHTML = "Please Select the product ...";
		i=0;
	}
	if(document.frmpurch.productid.value=="")
	{
		document.getElementById("idpurproduct").innerHTML = "Please Select the product ...";
		i=0;
	}
	if(!document.frmpurch.qty.value.match(numericExpression  ))
	{
		document.getElementById("idpurqty").innerHTML = " This field should contain only Numbers..";
		i=0;
	}
	if(document.frmpurch.qty.value=="")
	{
		document.getElementById("idpurqty").innerHTML = "Please enter the quantity...";
		i=0;
	}
	if(!document.frmpurch.cost.value.match(numericExpression  ))
	{
		document.getElementById("idpurcost").innerHTML = " This field should contain only Numbers..";
		i=0;
	}
	if(document.frmpurch.cost.value=="")
	{
		document.getElementById("idpurcost").innerHTML = "Please enter the Cost...";
		i=0;
	}
	if(!document.frmpurch.cgsttax.value.match(numericExpression  ))
	{
		document.getElementById("idpurcgsttax").innerHTML = " This field should contain only Numbers..";
		i=0;
	}
	if(document.frmpurch.cgsttax.value=="")
	{
		document.getElementById("idpurcgsttax").innerHTML = "Please enter the CGST...";
		i=0;
	}
	if(!document.frmpurch.sgsttax.value.match(numericExpression  ))
	{
		document.getElementById("idpursgsttax").innerHTML = " This field should contain only Numbers..";
		i=0;
	}
	if(document.frmpurch.sgsttax.value=="")
	{
		document.getElementById("idpursgsttax").innerHTML = "Please enter the SGST...";
		i=0;
	}
	if(!document.frmpurch.igsttax.value.match(numericExpression  ))
	{
		document.getElementById("idpurigsttax").innerHTML = " This field should contain only Numbers..";
		i=0;
	}
	if(document.frmpurch.igsttax.value=="")
	{
		document.getElementById("idpurigsttax").innerHTML = "Please enter the IGST...";
		i=0;
	}
	if(!document.frmpurch.discount.value.match(numericExpression  ))
	{
		document.getElementById("idpurdiscount").innerHTML = " This field should contain only Numbers..";
		i=0;
	}
	if(document.frmpurch.discount.value=="")
	{
		document.getElementById("idpurdiscount").innerHTML = "Please enter the Discount amount...";
		i=0;
	}

	if(document.frmpurch.status.value=="")
	{
		document.getElementById("idpurstatus").innerHTML = "Please select the status..";
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