<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sql="UPDATE employee SET empname='$_POST[empname]',loginid='$_POST[loginid]' WHERE employeeid='$_SESSION[employeeid]'";
	mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo"<script>alert('Employee profile updated successfully');</script>";
	}
}	
$sqledit = "SELECT * FROM employee WHERE employeeid='$_SESSION[employeeid]'";
$qsqledit  = mysqli_query($con,$sqledit);
$rsedit = mysqli_fetch_array($qsqledit);
?>
 
<!--/contact-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="#" method="post" name="formemprofile" onsubmit="return submitemprofile()" class="form-agileits">
		<h3 class="w3-contact-form-head">Employee Profile</h3>
		<label>Employee name</label><br><span id="idemoname" style="color:red"></span> 
		<input type="text" id="empname" name="empname" placeholder="employee name" value="<?php echo $rsedit['empname']; ?>"/><br>
		<label>Loginid </label><br><span id="idempin" style="color:red"></span> 
		<input type="text"  id="loginid" name="loginid" placeholder="Login id" value="<?php echo $rsedit['loginid']; ?>"/><br>
		
		
		<input type="submit" name="submit" class="sign-in" value="Update Profile">
	</form>
</div>
</div>
<!--//contact-->

<?php
include("footer.php");
?>
<script>
function submitemprofile()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	      
	$("span").html("");
	
	var i=1;
	if(!document.formemprofile.empname.value.match(alphaspaceExp))
	{
		document.getElementById("idemoname").innerHTML = "This field must contain only Alphabets..";
		i=0;
	}
	if(document.formemprofile.empname.value=="")
	{
		document.getElementById("idemoname").innerHTML = "Please enter the name...";
		i=0;
	}
	if(!document.formemprofile.loginid.value.match(emailpattern))
	{
		document.getElementById("idempin").innerHTML = "Kindly enter valid ID..";
		i=0;
	}
	if(document.formemprofile.loginid.value=="")
	{
		document.getElementById("idempin").innerHTML = "ID should not be empty..";
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