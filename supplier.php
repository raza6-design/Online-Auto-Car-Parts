<?php
include("header.php");
if(isset($_POST['submit']))
{
	$filename = rand(). $_FILES['companylogo']['name'];
	move_uploaded_file($_FILES["companylogo"]["tmp_name"],"imgsupplier/".$filename);
	if(isset($_GET['editid']))
	{
		$sql="UPDATE supplier SET companyname='$_POST[companyname]',";
		if($_FILES['companylogo']['name'] != "")
		{
		$sql = $sql . "companylogo='$filename',";
		}
		$sql = $sql . "companydescription='$_POST[companydescription]',loginid='$_POST[loginid]',companyaddress='$_POST[companyaddress]',city='$_POST[city]',pincode='$_POST[pincode]',password='$_POST[password]',status='$_POST[status]' WHERE supplierid='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo"<script>alert('Supplier record updated successfully');</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO supplier(companyname,companylogo,loginid,companydescription,companyaddress,city,pincode,status,password) VALUES ('$_POST[companyname]','$filename','$_POST[loginid]','$_POST[companydescription]','$_POST[companyaddress]','$_POST[city]','$_POST[pincode]','$_POST[status]','$_POST[password]')";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('supplier Account created successfully...');</script>";
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
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="" method="post" name="formsup" onsubmit="return sumitsup1()" class="form-agileits" enctype='multipart/form-data' >
		<h3 class="w3-contact-form-head">supplier Form</h3>
		<label>Company name</label><br> <span id="idcomname" style="color:red"></span>  
		<input type="text" id="companyname" name="companyname" placeholder="Company name"  value="<?php echo $rsedit['companyname']; ?>"/><br>
		
		<label>Login</label><br><span id="idlogin1" style="color:red"></span>
		<center>
		<input type="text"  id="loginid" name="loginid" placeholder="Login" value="<?php echo $rsedit['loginid']; ?>"/><br></center>
		
		
		<label>Password</label><br><span id="idpa11" style="color:red"></span>
		<center>
		<input type="password"  id="password" name="password" placeholder="Password"  value="<?php echo $rsedit['password']; ?>"/><br></center>
		
		<label>Company logo</label><br> <span id="idcomlogo" style="color:red"></span>  
		<center>
		<input type="file"  id="companylogo" name="companylogo" placeholder="Company logo"  />
		<p align='left'><img src='imgsupplier/<?php echo $rsedit['companylogo']; ?>' width='150' height='150'></p>
		<br></center>
		<label>Company description </label><br> <span id="idcomdesc" style="color:red"></span> 
		<textarea name="companydescription" id="companydescription" placeholder="companydescription"><?php echo $rsedit['companydescription']; ?></textarea>
		<label>Company address </label><br> <span id="idcomadd" style="color:red"></span>
		<input type="text"  id="companyaddress" name="companyaddress" placeholder="Company Address"  value="<?php echo $rsedit['companyaddress']; ?>"/><br>
		<label>City </label><br> <span id="idcomcity" style="color:red"></span>
		<input type="text"  id="city" name="city" placeholder="City"  value="<?php echo $rsedit['city']; ?>"/><br>
		<label>PIN Code </label><br> <span id="idpin" style="color:red"></span>
		<input type="text"  id="pincode" name="pincode" placeholder="pincode" value="<?php echo $rsedit['pincode']; ?>"/><br>
		<label>Status</label><br><span id="idccstatus" style="color:red"></span>
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
		<input type="submit" name="submit" class="sign-in" value="Submit">
	</form>
</div>
</div>
<!--//FORM ENDS-->

<?php
include("footer.php");
?>

<script>
function sumitsup1()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	if(!document.formsup.companyname.value.match(alphaspaceExp))
	{
		document.getElementById("idcomname").innerHTML = "This field must contain only alphabets..";
		i=0;
	}
	if(document.formsup.companyname.value=="")
	{
		document.getElementById("idcomname").innerHTML = "Please enter the company name...";
		i=0;
	}
	/*
	if(document.formsup.companylogo.value=="")
	{
		document.getElementById("idcomlogo").innerHTML = "Please enter the company logo...";
		i=0;
	}
	*/
	if(document.formsup.companydescription.value=="")
	{
		document.getElementById("idcomdesc").innerHTML = "Please enter the company description...";
		i=0;
	}
	if(document.formsup.companyaddress.value=="")
	{
		document.getElementById("idcomadd").innerHTML = "Please enter the company address...";
		i=0;
	}
	if(!document.formsup.city.value.match(alphaspaceExp))
	{
		document.getElementById("idcomcity").innerHTML = "This field must contain only alphabets..";
		i=0;
	}
	if(document.formsup.city.value=="")
	{
		document.getElementById("idcomcity").innerHTML = "Please enter the city...";
		i=0;
	}
	
if(!document.formsup.pincode.value.match(numericExpression))
	{
		document.getElementById("idpin").innerHTML = "This field must contain only Numbers..";
		i=0;
	}
	if(document.formsup.pincode.value=="")
	{
		document.getElementById("idpin").innerHTML = "Please enter the pincode...";
		i=0;
	}
	if(document.formsup.status.value=="")
	{
		document.getElementById("idccstatus").innerHTML = "Please enter the Status...";
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




