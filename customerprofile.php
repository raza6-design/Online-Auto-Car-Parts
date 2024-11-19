<?php
include("header.php");
if(isset($_POST['submit']))
{
	$addr = nl2br($_POST['address']);
		$sql="UPDATE cutomer SET customername='$_POST[customername]',emailid='$_POST[emailid]',address='$addr',city='$_POST[city]',state='$_POST[state]',contactno='$_POST[contactno]',pincode='$_POST[pincode]' WHERE customer_id='$_SESSION[customer_id]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo"<script>alert('Customer profile updated successfully');</script>";
		}
}	

	$sqledit = "SELECT * FROM cutomer WHERE customer_id='$_SESSION[customer_id]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);

function br2nl($input) {
    return preg_replace('/<br\\s*?\/??>/i', '', $input);
}
?>
 
<!--/Customer profile-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="#" method="post" name="cpform" onsubmit="return submitcp()" class="form-agileits">
		<h3 class="w3-contact-form-head">Customer Profile</h3>
		<label>Customer</label><br><span id="idcpname" style="color:red"></span>  
		<input type="text" id="customername" name="customername" placeholder="customer name" value="<?php echo $rsedit['customername']; ?>"/><br>
		<label>Email id </label><br><span id="idcpemail" style="color:red"></span>  
		<input type="text"  id="emailid" name="emailid" placeholder="Email id" value="<?php echo $rsedit['emailid']; ?>"/><br>
		<label>Address </label><br> <span id="idcpaddress" style="color:red"></span>  
		<textarea id="address" name="address" placeholder="Address" ><?php echo br2nl($rsedit['address']); ?></textarea>
		<br>
		<label>City </label><br> <span id="idcpcity" style="color:red"></span>  
		<input type="text"  id="city" name="city" placeholder="City" value="<?php echo $rsedit['city']; ?>"/><br>
		<label>State </label><br> <span id="idcpstate" style="color:red"></span>  
		<input type="text"  id="state" name="state" placeholder="State"  value="<?php echo $rsedit['state']; ?>"/><br>
		<label>Contact number</label><br> <span id="idcpmbl" style="color:red"></span>  
		<input type="text"  id="contactno" name="contactno" placeholder="Contact No"   value="<?php echo $rsedit['contactno']; ?>"/><br>
		<label>Pincode </label><br> <span id="idcppin" style="color:red"></span>  
		<input type="text"  id="pincode" name="pincode" placeholder="Pincode"  value="<?php echo $rsedit['pincode']; ?>"/><br>
		
		<input type="submit" name="submit" class="sign-in" value="Update Profile">
	</form>
</div>
</div>
<!--//Customer Profile-->

<?php
include("footer.php");
?>

<script>
function submitcp()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	if(!document.cpform.customername.value.match(alphaspaceExp))
	{
		document.getElementById("idcpname").innerHTML = "This field must contain only alphabets..";
		i=0;
	}
	if(document.cpform.customername.value=="")
	{
		document.getElementById("idcpname").innerHTML = "Please enter the your Name...";
		i=0;
	}
	if(!document.cpform.emailid.value.match(emailpattern))
	{
		document.getElementById("idcpemail").innerHTML = "This field must contain only emailid..";
		i=0;
	}
	if(document.cpform.emailid.value=="")
	{
		document.getElementById("idcpemail").innerHTML = "Please enter the your Email ID...";
		i=0;
	}
	if(document.cpform.address.value=="")
	{
		document.getElementById("idcpaddress").innerHTML = "Please enter the your Address...";
		i=0;
	}
	if(!document.cpform.city.value.match(alphaspaceExp))
	{
		document.getElementById("idcpcity").innerHTML = "This field must contain only alphabets..";
		i=0;
	}
	if(document.cpform.city.value=="")
	{
		document.getElementById("idcpcity").innerHTML = "Please enter the your City...";
		i=0;
	}
	if(!document.cpform.state.value.match(alphaspaceExp))
	{
		document.getElementById("idcpstate").innerHTML = "This field must contain only alphabets..";
		i=0;
	}
	if(document.cpform.state.value=="")
	{
		document.getElementById("idcpstate").innerHTML = "Please enter the your State...";
		i=0;
	}
	if(document.cpform.contactno.value.length != 10)
	{
		document.getElementById("idcpmbl").innerHTML = "Kindly enter 10 digit Mobile number...";
		i=0;
	}
	if(!document.cpform.contactno.value.match(numericExpression))
	{
		document.getElementById("idcpmbl").innerHTML = "This field must contain only Number..";
		i=0;
	}
	if(document.cpform.contactno.value=="")
	{
		document.getElementById("idcpmbl").innerHTML = "Please enter the your Mobile Number...";
		i=0;
	}
	if(!document.cpform.pincode.value.match(numericExpression))
	{
		document.getElementById("idcppin").innerHTML = "This field must contain only Number..";
		i=0;
	}
	if(document.cpform.pincode.value=="")
	{
		document.getElementById("idcppin").innerHTML = "Please enter the your pincode...";
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