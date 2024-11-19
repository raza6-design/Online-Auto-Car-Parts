<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE offer SET discountamt='$_POST[discountamt]',status='$_POST[status]' WHERE offerid='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Offer record Updated successfully...');</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO offer(productid,supplierid,discountamt,status) VALUES ('$_POST[productid]','$_POST[supplierid]','$_POST[discountamt]','$_POST[status]')";
		mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Offer record inserted successfully...');</script>";
		}
		else
		{
			echo mysqli_error();
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM offer WHERE offerid='$_GET[editid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
 
<!--/OFFER FORM-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="" method="post" name="frmoffer" onsubmit="return submitoffer()" class="form-agileits" style= "color:black">
		<h3 class="w3-contact-form-head">Offer form</h3>
		<label>Product </label><br><span id="idofffur" style="color:red"></span>
   <select class="form-data" name="productid" id="productid" >
	<option value=''>Select Product</option>
	<?php
	$sqlproduct = "SELECT product.*,supplier.companyname FROM  product LEFT JOIN supplier ON product.supplierid=supplier.supplierid where product.status='Active'";
	$qsqlproduct = mysqli_query($con,$sqlproduct);
	while($rsproduct = mysqli_fetch_array($qsqlproduct))
	{
		echo "<option value='$rsproduct[productid]'>$rsproduct[companyname] - $rsproduct[title]</option>";
	}
	?>
   </select><br>
<?php
if(isset($_SESSION['supplierid']))		
{
?>
<input type='hidden' name='supplierid' value="<?php echo $_SESSION['supplierid']; ?>">
<?php
}
else
{
?><br><br>
		<label>Supplier </label><br><span id="idoffsupp" style="color:red"></span>
<select class="form-data" name="supplierid" id="supplierid" >
	<option value=''>Select</option>
	<?php
	$sqlsupplier = "SELECT * FROM  supplier where status='Active'";
	$qsqlsupplier = mysqli_query($con,$sqlsupplier);
	while($rssupplier = mysqli_fetch_array($qsqlsupplier))
	{
		echo "<option value='$rssupplier[supplierid]'>$rssupplier[companyname]</option>";
	}
	?>
</select><br>
<?php
}
?><br>
		<label>Discount</label><br> <span id="idoffdis" style="color:red"></span>
		<input type="text"  id="discountamt" name="discountamt" placeholder="Discount amount" value="<?php echo $rsedit['discountamt'];?>" /><br>
		
<?php
if(isset($_SESSION['supplierid']))		
{
?>
<input type='hidden' name='status' value="Pending">
<?php
}
else
{
?>
		<label>Status</label><br> <span id="idoffstatus" style="color:red"></span>
		<select class="form-data" name="status" id="status" >
						<option value=''>Select</option>
			<?php
				$arr = array("Active","Inactive","Pending");
				foreach($arr as $val)
				{
					if($val == $rsedit['status'])
					{
					echo "<option value='$val' selected>$val</option>";
					}
					else
					{
					echo "<option value='$val'>$val</option>";
					}
				}
			?>
		</select>
<?php
}
?>
		<input type="submit" name="submit" class="sign-in" value="Submit">
	</form>
</div>
</div>
<!--//contact-->

<?php
include("footer.php");
?>
<script>
function submitoffer()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	
	if(document.frmoffer.productid.value=="")
	{
		document.getElementById("idofffur").innerHTML = "Please Select the product ...";
		i=0;
	}
	if(document.frmoffer.supplierid.value=="")
	{
		document.getElementById("idoffsupp").innerHTML = "Please Select the Supplier...";
		i=0;
	}
	
	if(!document.frmoffer.discountamt.value.match(numericExpression  ))
	{
		document.getElementById("idoffdis").innerHTML = " This field should contain only Numbers..";
		i=0;
	}
	if(document.frmoffer.discountamt.value=="")
	{
		document.getElementById("idoffdis").innerHTML = "Please enter the Discount amount...";
		i=0;
	}
	if(document.frmoffer.status.value=="")
	{
		document.getElementById("idoffstatus").innerHTML = "Please Select the Status type...";
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


