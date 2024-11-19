<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE tax SET taxtype='$_POST[taxtype]',taxpercentage='$_POST[taxpercentage]',status='$_POST[status]' WHERE taxid='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Tax record Updated successfully...');</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO tax(taxtype,taxpercentage,status) VALUES ('$_POST[taxtype]','$_POST[taxpercentage]','$_POST[status]')";
		mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Tax record inserted successfully...');</script>";
		}
		else
		{
			echo mysqli_error();
		}
	}
}

if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM tax WHERE taxid='$_GET[editid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
 
<!--/TAX FORM-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="#" method="post" name="frmtax" onsubmit="return submittax()" class="form-agileits">
		<h3 class="w3-contact-form-head">Tax Form</h3>
		<label>Tax Type</label><br> <span id="idtaxtype" style="color:red"></span>
		<input type="text" id="taxtype" name="taxtype" placeholder="Tax type"  value="<?php echo $rsedit['taxtype']; ?>"/><br>
		<label>Tax percentage</label><br><span id="idtaxper" style="color:red"></span>
		<input type="text"  id="taxpercentage" name="taxpercentage" placeholder="Tax percentage"  value="<?php echo $rsedit['taxpercentage']; ?>"/ ><br>
		<label>Status</label><br><span id="idts" style="color:red"></span>
		<select class="form-data" name="status" id="status" >
			<option value=''>Select</option>
			<?php
			$arr = array("Active","Inactive");
			foreach($arr as $val)
			{
				if($rsedit['status'] == $val)
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
		<input type="submit" name="submit" class="sign-in" value="Submit">
	</form>
</div>
</div>
<!--//TAX FORM ENDS HERE-->

<?php
include("footer.php");
?>
<script>
function submittax()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	if(!document.frmtax.taxtype.value.match(alphaspaceExp))
	{
		document.getElementById("idtaxtype").innerHTML = " This field should contain only alphabets..";
		i=0;
	}
	if(document.frmtax.taxtype.value=="")
	{
		document.getElementById("idtaxtype").innerHTML = "Please enter the Tax type...";
		i=0;
	}
	if(!document.frmtax.taxpercentage.value.match(numericExpression))
	{
		document.getElementById("idtaxper").innerHTML = "This field should contain only numbers..";
		i=0;
	}
	if(document.frmtax.taxpercentage.value=="")
	{
		document.getElementById("idtaxper").innerHTML = "Please enter the Tax percentage...";
		i=0;
	}
	if(document.frmtax.status.value=="")
	{
		document.getElementById("idts").innerHTML = "Please select the status...";
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


