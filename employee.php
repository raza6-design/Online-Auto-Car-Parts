<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE employee SET empname='$_POST[empname]',loginid='$_POST[loginid]',password='$_POST[password]',status='$_POST[status]' WHERE employeeid='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Employee record Updated successfully...');</script>";
		}
	}
else
{	
	$sql = "INSERT INTO employee(empname,loginid,password,status) VALUES ('$_POST[empname]','$_POST[loginid]','$_POST[password]','$_POST[status]')";
	mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Employee record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error();
	}
}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM employee WHERE employeeid='$_GET[editid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
 
<!--/Employee form-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="" method="post" name="frmemp" onsubmit="return submitemp()" class="form-agileits" style= "color:black">
		<h3 class="w3-contact-form-head">Employee form</h3>
		<label>Employee's name </label><br><span id="idempname" style="color:red"></span>
		<input type="text" id="empname" name="empname" placeholder="Employee's name " value="<?php echo $rsedit['empname'];?>" /><br>
		<label>Login ID </label><br><span id="idlogin" style="color:red"></span>
		<input type="text" id="loginid" name="loginid" placeholder="Login id" value="<?php echo $rsedit['loginid'];?>" /><br>
		<label>Password</label><br><span id="idpas" style="color:red"></span>
		<input type="password"  id="password" name="password" placeholder="Password" value="<?php echo $rsedit['password'];?>" /><br>
		<label>Status</label><br><span id="idsat" style="color:red"></span>
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
function submitemp()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	if(!document.frmemp.empname.value.match(alphaspaceExp))
	{
		document.getElementById("idempname").innerHTML = "Name should contain only alphabets..";
		i=0;
	}
	if(document.frmemp.empname.value=="")
	{
		document.getElementById("idempname").innerHTML = "Please enter the name...";
		i=0;
	}
	
	if(!document.frmemp.loginid.value.match(emailpattern))
	{
		document.getElementById("idlogin").innerHTML = "Kindly enter valid ..";
		i=0;
	}
	if(document.frmemp.loginid.value=="")
	{
		document.getElementById("idlogin").innerHTML = "Email should not be empty..";
		i=0;
	}
	if(document.frmemp.password.value.length < 2)
	{
		document.getElementById("idpas").innerHTML = "Password should contain 3 characters atleast...";
		i=0;
	}
	if(document.frmemp.password.value=="")
	{
		document.getElementById("idpas").innerHTML = "Password should not be empty..";
		i=0;
	}
	if(document.frmemp.status.value=="")
	{
		document.getElementById("idsat").innerHTML = "Status should not be empty..";
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




