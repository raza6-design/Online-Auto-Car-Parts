	<?php
include("header.php");
if(isset($_POST['submit']))
{
	$filename = rand(). $_FILES['companylogo']['name'];
	move_uploaded_file($_FILES["companylogo"]["tmp_name"],"imgsupplier/".$filename);
		$sql="UPDATE supplier SET companyname='$_POST[companyname]',loginid='$_POST[loginid]'";
		if($_FILES['companylogo']['name'] != "")
		{
		$sql  = $sql . ",companylogo='$filename'";
		}
		$sql = $sql . ",companydescription='$_POST[companydescription]',companyaddress='$_POST[companyaddress]',city='$_POST[city]',pincode='$_POST[pincode]',phonenumber='$_POST[phonenumber]' WHERE supplierid='$_SESSION[supplierid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo"<script>alert('Supplier profile updated successfully');</script>";
			echo"<script>window.location='supprofile.php';</script>";
		}
}	

	$sqledit = "SELECT * FROM supplier WHERE supplierid='$_SESSION[supplierid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);

?>
 
<!--/contact-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="#" method="post" name="frmsupqlogin" onsubmit="return submitsupqlogin()" class="form-agileits" enctype="multipart/form-data">
		<h3 class="w3-contact-form-head">Supplier Profile</h3>
		<label>company name</label><br><span id="idsupplire" style="color:red"></span> 
		<input type="text" id="companyname" name="companyname" placeholder="companyname" value="<?php echo $rsedit['companyname']; ?>"/><br>
		<label>loginid </label><br><span id="idloginsupplier" style="color:red"></span> 
		<input type="text"  id="loginid" name="loginid" placeholder="Login id"    value="<?php echo $rsedit['loginid']; ?>"/><br>
				<center>
				
<?php
		if($rsedit['companylogo'] == "")
		{
			$imgname = "images/No_Image_Available.jpg";
		}
		else
		{
			if(file_exists("imgsupplier/".$rsedit['companylogo']))
			{
				$imgname ="imgsupplier/".$rsedit['companylogo'];
			}
			else
			{
				$imgname = "images/No_Image_Available.jpg";
			}
		}
?>
				
		<input type="file"  id="companylogo" name="companylogo" placeholder="Company logo"  />
		<p align='left'><img src='<?php echo $imgname; ?>' width='150' height='150'></p>
		<br></center>
		
		<br>
		
		<label>Companydescription</label><br><span id="idcom12" style="color:red"></span> 
		<textarea name="companydescription" id="companydescription" placeholder="companydescription"><?php echo $rsedit['companydescription']; ?></textarea>
		<label>Companyaddress</label><br><span id="idcompaddress" style="color:red"></span> 
		<input type="text" id="companyaddress" name="companyaddress" placeholder="Company address"  value="<?php echo $rsedit['companyaddress']; ?>"/><br>
		<label>City </label><br><span id="idcitysupplier" style="color:red"></span> 
		<input type="text" id="city" name="city" placeholder="city" value="<?php echo $rsedit['city']; ?>"/><br>
		<label>pincode </label><br><span id="idp1ncode" style="color:red"></span> 
		<input type="text" id="pincode" name="pincode" placeholder="pincode"  value="<?php echo $rsedit['pincode']; ?>"/><br>
		<label>Phone Number </label><br><span id="idphonenumber" style="color:red"></span>
		<input type="text"  id="phonenumber" name="phonenumber" placeholder="Enter Phone Number" value="<?php echo $rsedit['phonenumber']; ?>"/><br>
		
		
		<input type="submit" name="submit" class="sign-in" value="Update Profile">
	</form>
</div>
</div>
<!--//contact-->

<?php
include("footer.php");
?>

<script>
function submitsupqlogin()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	if(!document.frmsupqlogin.companyname.value.match(alphaspaceExp))
	{
		document.getElementById("idsupplire").innerHTML = "Kindly enter valid Company name..";
		i=0;
	}
	if(document.frmsupqlogin.companyname.value=="")
	{
		document.getElementById("idsupplire").innerHTML = "Company name should not be empty..";
		i=0;
	}
	if(!document.frmsupqlogin.loginid.value.match(emailpattern))
	{
		document.getElementById("idloginsupplier").innerHTML = "Kindly enter valid Login-ID...";
		i=0;
	}
	if(document.frmsupqlogin.loginid.value=="")
	{
		document.getElementById("idloginsupplier").innerHTML = "Login-ID should not be empty..";
		i=0;
	}
	if(document.frmsupqlogin.companydescription.value=="")
	{
		document.getElementById("idcom12").innerHTML = "Company Description should not be empty..";
		i=0;
	}
	
	if(document.frmsupqlogin.Companyaddress.value=="")
	{
		document.getElementById("idcompaddress").innerHTML = "Company address should not be empty..";
		i=0;
	}
	if(!document.frmsupqlogin.city.value.match(alphaspaceExp))
	{
		document.getElementById("idcitysupplier").innerHTML = "Kindly enter valid City name..";
		i=0;
	}
	if(document.frmsupqlogin.city.value=="")
	{
		document.getElementById("idcitysupplier").innerHTML = "City should not be empty..";
		i=0;
	}
	if(!document.frmsupqlogin.pincode.value.match(numericExpression))
	{
		document.getElementById("idp1ncode").innerHTML = "Kindly enter valid Pincode..";
		i=0;
	}
	if(document.frmsupqlogin.pincode.value=="")
	{
		document.getElementById("idp1ncode").innerHTML = "Pincode should not be empty..";
		i=0;
	}
	if(document.frmsupqlogin.pincode.value.length != 6)
	{
		document.getElementById("idp1ncode").innerHTML = "Kindly enter 6 digit Pincode...";
		i=0;
	}
	if(document.frmsupqlogin.phonenumber.value.length != 10)
	{
		document.getElementById("idphonenumber").innerHTML = "Kindly enter 10 digit Mobile number...";
		i=0;
	}
	if(!document.frmsupqlogin.phonenumber.value.match(numericExpression))
	{
		document.getElementById("idphonenumber").innerHTML = "Mobile number is not valid..";
		i=0;
	}
	if(document.frmsupqlogin.phonenumber.value=="")
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