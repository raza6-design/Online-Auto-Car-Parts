<?php
include("header.php");
if(isset($_POST['submit']))
{
	$filename = rand(). $_FILES['companylogo']['name'];
	move_uploaded_file($_FILES["companylogo"]["tmp_name"],"imgsupplier/".$filename);
	if(isset($_GET['editid']))
	{
		$sql="UPDATE supplier SET companyname='$_POST[companyname]',companylogo='$filename',loginid='$_POST[loginid]',password='$_POST[password]',companydescription='$_POST[companydescription]',companyaddress='$_POST[companyaddress]',city='$_POST[city]',pincode='$_POST[pincode]',status='$_POST[status]',phonenumber='$_POST[phonenumber]' WHERE supplierid='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo"<script>alert('Supplier record updated successfully');</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO supplier(companyname,companylogo,loginid,password,companydescription,companyaddress,city,pincode,phonenumber,status) VALUES ('$_POST[companyname]','$filename','$_POST[loginid]','$_POST[password]','$_POST[companydescription]','$_POST[companyaddress]','$_POST[city]','$_POST[pincode]','$_POST[phonenumber]','Pending')";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Supplier Registration done successfully. Your account will be manually verified by Admin.');</script>";
			echo "<script>window.location='index.php';</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM supplier WHERE supplierid='$_GET[editid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
<!--/FORM-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label" style="width:750px;">
	<form action="" method="post" name="formsupreg1" onsubmit="return submitformsupreg1()" class="form-agileits" enctype='multipart/form-data' >
		<h3 class="w3-contact-form-head">Supplier Registration Panel</h3>
		<label>Company name</label><br> <span id="idcompname1" style="color:red"></span> 
		<input type="text" id="companyname" name="companyname" placeholder="Company name" value="<?php echo $rsedit['companyname']; ?>"/><br>
		<label>Company logo</label><br><span id="idcomplogo1" style="color:red"></span>
		<center>
		<input type="file"  id="companylogo" name="companylogo" placeholder="Company logo" value="<?php echo $rsedit['companylogo']; ?>"/><br></center>
		<label>Login</label><br><span id="idlogin1" style="color:red"></span>
		<center>
		<input type="text"  id="loginid" name="loginid" placeholder="Login" value="<?php echo $rsedit['loginid']; ?>"/><br></center>
		<label>Password</label><br><span id="idpa11" style="color:red"></span>
		<center>
		<input type="password"  id="password" name="password" placeholder="Password"  value="<?php echo $rsedit['password']; ?>"/><br></center>
		<label>About company </label><br><span id="idabtcom1" style="color:red"></span>
		<textarea name="companydescription"  placeholder="Company description"><?php echo $rsedit['companydescription']; ?></textarea>
		<label>Company address </label><br><span id="idcomaddress1" style="color:red"></span>
		<textarea name="companyaddress"  placeholder="Company Address"><?php echo $rsedit['companydescription']; ?></textarea><br>
		<label>City </label><br><span id="idccity1" style="color:red"></span>
		<input type="text"  id="city" name="city" placeholder="City" value="<?php echo $rsedit['city']; ?>"/><br>
		<label>Pin code </label><br><span id="idspincode11" style="color:red"></span>
		<input type="text"  id="pincode" name="pincode" placeholder="Enter PIN Code" value="<?php echo $rsedit['pincode']; ?>"/><br>		
		<label>Phone Number </label><br><span id="idphonenumber" style="color:red"></span>
		<input type="text"  id="phonenumber" name="phonenumber" placeholder="Enter Phone Number" value="<?php echo $rsedit['phonenumber']; ?>"/><br>
		<input type="submit" name="submit" class="sign-in" value="Register">
	</form><br>
</div>
</div>
<!--//contact-->

<?php
include("footer.php");
?>

<script>
function submitformsupreg1()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	if(!document.formsupreg1.companyname.value.match(alphaspaceExp))
	{
		document.getElementById("idcompname1").innerHTML = "This field must contain only Alphabets..";
		i=0;
	}
	if(document.formsupreg1.companyname.value=="")
	{
		document.getElementById("idcompname1").innerHTML = "Please enter the Company name...";
		i=0;
	}
	
	if(document.formsupreg1.companylogo.value=="")
	{
		document.getElementById("idcomplogo1").innerHTML = "Please enter the Company logo...";
		i=0;
	}if(!document.formsupreg1.loginid.value.match(emailpattern))
	{
		document.getElementById("idlogin1").innerHTML = "This field must contain only Email-ID..";
		i=0;
	}
	if(document.formsupreg1.loginid.value=="")
	{
		document.getElementById("idlogin1").innerHTML = "Please enter the Login Id...";
		i=0;
	}
	if(document.formsupreg1.password.value.length < 2)
	{
		document.getElementById("idpa11").innerHTML = "Password should contain more than 2 characters...";
		i=0;
	}
	if(document.formsupreg1.password.value=="")
	{
		document.getElementById("idpa11").innerHTML = "Please enter the Password...";
		i=0;
	}
	if(document.formsupreg1.companydescription.value=="")
	{
		document.getElementById("idabtcom1").innerHTML = "Please enter the Company Description...";
		i=0;
	}
	
	if(document.formsupreg1.companyaddress.value=="")
	{
		document.getElementById("idcomaddress1").innerHTML = "Please enter the Company Address...";
		i=0;
	}
	if(!document.formsupreg1.city.value.match(alphaspaceExp))
	{
		document.getElementById("idccity1").innerHTML = "This field must contain only Alphabets..";
		i=0;
	}
	if(document.formsupreg1.city.value=="")
	{
		document.getElementById("idccity1").innerHTML = "Please enter the City...";
		i=0;
	}
	if(!document.formsupreg1.pincode.value.match(numericExpression))
	{
		document.getElementById("idspincode11").innerHTML = "This field must contain only Numbers..";
		i=0;
	}
	if(document.formsupreg1.pincode.value=="")
	{
		document.getElementById("idspincode11").innerHTML = "Please enter the Pincode...";
		i=0;
	}
	if(document.formsupreg1.pincode.value.length != 6)
	{
		document.getElementById("idspincode11").innerHTML = "Kindly enter 6 digit Pincode...";
		i=0;
	}
	if(document.formsupreg1.phonenumber.value.length != 10)
	{
		document.getElementById("idphonenumber").innerHTML = "Kindly enter 10 digit Mobile number...";
		i=0;
	}
	if(!document.formsupreg1.phonenumber.value.match(numericExpression))
	{
		document.getElementById("idphonenumber").innerHTML = "Mobile number is not valid..";
		i=0;
	}
	if(document.formsupreg1.phonenumber.value=="")
	{
		document.getElementById("idphonenumber").innerHTML = "Contact number should not be empty..";
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