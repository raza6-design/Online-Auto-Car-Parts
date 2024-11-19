<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql="UPDATE cutomer SET customername='$_POST[customername]',emailid='$_POST[emailid]',password='$_POST[password]',address='$_POST[address]',city='$_POST[city]',state='$_POST[state]',contactno='$_POST[contactno]',pincode='$_POST[pincode]',status='$_POST[status]' WHERE customer_id='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo"<script>alert('Customer record updated successfully');</script>";
		}
	}
		else
		{
	$sql = "INSERT INTO cutomer(customername,emailid,password,address,city,state,contactno,pincode,status) VALUES ('$_POST[customername]','$_POST[emailid]','$_POST[password]','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[contactno]','$_POST[pincode]','$_POST[status]')";
	mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Customer record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error();
	}
		}
	}	

if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM cutomer WHERE customer_id='$_GET[editid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
	
?>
 
<!--/Customer form-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="#" method="post" name="customerrform" onsubmit="return submitcustomerr()" class="form-agileits">
		<h3 class="w3-contact-form-head">Customer Form</h3>
		<label>Customer</label><br> <span id="idcustomerk" style="color:red"></span>  
		<input type="text" id="customername" name="customername" placeholder="customer name"  value="<?php echo $rsedit['customername']; ?>"/><br>
		<label>Email id </label><br> <span id="email1id" style="color:red"></span> 
		<input type="text"  id="emailid" name="emailid" placeholder="Email id"  value="<?php echo $rsedit['emailid']; ?>"/><br>
		<label>Password </label><br> <span id="pass1id" style="color:red"></span> 
		<input type="password"  id="password" name="password" placeholder="password"  value="<?php echo $rsedit['password']; ?>"/><br>
		<label>Address </label><br><span id="address1id" style="color:red"></span>  
		<input type="text"  id="address" name="address" placeholder="Address" value="<?php echo $rsedit['address']; ?>"/><br>
		<label>City </label><br> <span id="cityid" style="color:red"></span> 
		<input type="text"  id="city" name="city" placeholder="City" value="<?php echo $rsedit['city']; ?>"/><br>
		<label>State </label><br> <span id="stateid" style="color:red"></span> 
		<input type="text"  id="state" name="state" placeholder="State" value="<?php echo $rsedit['state']; ?>"/><br>
		<label>Contact number</label><br><span id="mblid" style="color:red"></span> 
		<input type="text"  id="contactno" name="contactno" placeholder="Contact No"   value="<?php echo $rsedit['contactno']; ?>"/><br>
		<label>Pincode </label><br> <span id="pincodeid1" style="color:red"></span> 
		<input type="text"  id="pincode" name="pincode" placeholder="Pincode" value="<?php echo $rsedit['pincode']; ?>"/><br>
		<label>Status</label><br> <span id="idcustatus1" style="color:red"></span> 
		<select class="form-data" name="status" id="status" >
			<option value=''>Select</option>
			<option value='Active'>Active</option>
			<option value='Inactive'>Inactive</option>
		</select><br>
		
		<input type="submit" name="submit" class="sign-in" value="Submit">
	</form>
</div>
</div>
<!--//customer form ends-->

<?php
include("footer.php");
?>

<script>
function submitcustomerr()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	if(!document.customerrform.customername.value.match(alphaspaceExp))
	{
		document.getElementById("idcustomerk").innerHTML = "This field must contain only alphabets..";
		i=0;
	}
	if(document.customerrform.customername.value=="")
	{
		document.getElementById("idcustomerk").innerHTML = "Please enter the your Name...";
		i=0;
	}
	if(!document.customerrform.emailid.value.match(emailpattern))
	{
		document.getElementById("email1id").innerHTML = "This field must contain only email id..";
		i=0;
	}
	if(document.customerrform.emailid.value=="")
	{
		document.getElementById("email1id").innerHTML = "Please enter the Email id...";
		i=0;
	}
if(document.customerrform.password.value.length < 2)
	{
		document.getElementById("pass1id").innerHTML = "Password should contain more than 2 characters...";
		i=0;
	}
	if(document.customerrform.password.value=="")
	{
		document.getElementById("pass1id").innerHTML = "Please enter a Password...";
		i=0;
	}
	
	if(document.customerrform.address.value=="")
	{
		document.getElementById("address1id").innerHTML = "Please enter the Address...";
		i=0;
	}
	if(!document.customerrform.city.value.match(alphaspaceExp))
	{
		document.getElementById("cityid").innerHTML = "This field must contain only alphabets..";
		i=0;
	}
	if(document.customerrform.city.value=="")
	{
		document.getElementById("cityid").innerHTML = "Please enter the City...";
		i=0;
	}
	if(!document.customerrform.state.value.match(alphaspaceExp))
	{
		document.getElementById("stateid").innerHTML = "This field must contain only alphabets..";
		i=0;
	}
	if(document.customerrform.state.value=="")
	{
		document.getElementById("stateid").innerHTML = "Please enter the state...";
		i=0;
	}
	if(document.customerrform.contactno.value.length != 10)
	{
		document.getElementById("mblid").innerHTML = "Kindly enter 10 digit Mobile number...";
		i=0;
	}
	if(!document.customerrform.contactno.value.match(numericExpression))
	{
		document.getElementById("mblid").innerHTML = "This field must contain only Numbers..";
		i=0;
	}
	if(document.customerrform.contactno.value=="")
	{
		document.getElementById("mblid").innerHTML = "Please enter the Mobile number...";
		i=0;
	}
	
	if(!document.customerrform.pincode.value.match(numericExpression))
	{
		document.getElementById("pincodeid1").innerHTML = "This field must contain only Numbers..";
		i=0;
	}
	if(document.customerrform.pincode.value=="")
	{
		document.getElementById("pincodeid1").innerHTML = "Please enter the pincode...";
		i=0;
	}
	if(document.customerrform.pincode.value.length != 6)
	{
		document.getElementById("pincodeid1").innerHTML = "Kindly enter 6 digit Pincode...";
		i=0;
	}
	if(document.customerrform.status.value=="")
	{
		document.getElementById("idcustatus1").innerHTML = "Please Enter the Status...";
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
