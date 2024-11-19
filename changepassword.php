<?php
include("header.php");
if(isset($_POST['submit']))
{

		$sql="UPDATE cutomer SET password='$_POST[npassword]' WHERE customer_id='$_SESSION[customer_id]' AND  password='$_POST[opassword]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo"<script>alert('Customer record updated successfully');</script>";
		}
}
	
?>
 
<!--/contact-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="#" method="post" name="frmchangepassword" onsubmit="return submitchangepassword()" class="form-agileits">
		<h3 class="w3-contact-form-head">Update Password</h3>

		<label>Existing Password </label><br> <span id="idexistingep" style="color:red"></span>
		<input type="password"  id="opassword" name="opassword" placeholder="password" class="form-control"/><br>
		
		
		<label>New Password </label><br> <span id="idnewp" style="color:red"></span>
		<input type="password"  id="npassword" name="npassword" placeholder="password" class="form-control"/><br>
		
		
		<label>Confirm Password </label><br> <span id="idconfirmep" style="color:red"></span>
		<input type="password"  id="cpassword" name="cpassword" placeholder="password" class="form-control" ><br>
		
		<input type="submit" name="submit" class="sign-in" value="Update password">
	</form>
</div>
</div>
<!--//contact-->

<?php
include("footer.php");
?>

<script>
function submitchangepassword()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	if(document.frmchangepassword.opassword.value.length < 2)
	{
		document.getElementById("idexistingep").innerHTML = "Password should contain more than 6 characters...";
		i=0;
	}
	if(document.frmchangepassword.opassword.value=="")
	{
		document.getElementById("idexistingep").innerHTML = "Password should not be empty..";
		i=0;
	}
	if(document.frmchangepassword.npassword.value.length < 2)
	{
		document.getElementById("idnewp").innerHTML = "Password should contain more than 2 characters...";
		i=0;
	}
	if(document.frmchangepassword.npassword.value=="")
	{
		document.getElementById("idnewp").innerHTML = "Please enter the new password..";
		i=0;
	}
	if(document.frmchangepassword.npassword.value != document.frmchangepassword.cpassword.value)
	{
		document.getElementById("idconfirmep").innerHTML = "Password and confirm password not matching...";
		i=0;		
	}
	if(document.frmchangepassword.cpassword.value=="")
	{
		document.getElementById("idconfirmep").innerHTML = "Confirm password should not be empty..";
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