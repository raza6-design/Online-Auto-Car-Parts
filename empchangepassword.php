<?php
include("header.php");
if(isset($_POST['submit']))
{

		$sql="UPDATE employee SET password='$_POST[npassword]' WHERE employeeid='$_SESSION[employeeid]' AND  password='$_POST[opassword]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo"<script>alert('employee record updated successfully');</script>";
		}
}
	
?>
 
<!--/contact-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="#" method="post" name="frmpass" onsubmit="return submitpass()" class="form-agileits">
		<h3 class="w3-contact-form-head">Update Password</h3>

		<label>Existing Password </label><br> <span id="idep" style="color:red"></span>
		<input type="password"  id="opassword" name="opassword" placeholder="password" class="form-control"/><br>
		
		
		<label>New Password </label><br> <span id="idnp" style="color:red"></span>
		<input type="password"  id="npassword" name="npassword" placeholder="password" class="form-control"/><br>
		
		
		<label>Confirm Password</label><br><span id="idcp" style="color:red"></span>
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
function submitpass()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	if(document.frmpass.opassword.value.length < 2)
	{
		document.getElementById("idep").innerHTML = "Password should contain more than 6 characters...";
		i=0;
	}
	if(document.frmpass.opassword.value=="")
	{
		document.getElementById("idep").innerHTML = "Password should not be empty..";
		i=0;
	}
	if(document.frmpass.npassword.value.length < 2)
	{
		document.getElementById("idnp").innerHTML = "Password should contain more than 2 characters...";
		i=0;
	}
	if(document.frmpass.npassword.value=="")
	{
		document.getElementById("idnp").innerHTML = "Please enter the new password..";
		i=0;
	}
	if(document.frmpass.npassword.value != document.frmpass.cpassword.value)
	{
		document.getElementById("idcp").innerHTML = "Password and confirm password not matching...";
		i=0;		
	}
	if(document.frmpass.cpassword.value=="")
	{
		document.getElementById("idcp").innerHTML = "Confirm password should not be empty..";
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


