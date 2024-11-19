<?php
include("header.php");
if(isset($_POST['submit']))
{
	$filename= rand() . $_FILES['icon']['name'] ; 
	move_uploaded_file($_FILES['icon']['tmp_name'],'imgproducts/'.$filename);
	
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE producttype SET producttype='$_POST[producttype]' ,icon='$filename',discription='$_POST[discription]',status='$_POST[status]' WHERE producttypeid='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('product Type record Updated successfully...');</script>";
		}
	}
else
{	
	$sql = "INSERT INTO producttype(producttype,icon,discription,status) VALUES ('$_POST[producttype]','$filename','$_POST[discription]','$_POST[status]')";
	mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('product type record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error();
	}
}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM producttype WHERE producttypeid='$_GET[editid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
 
<!--/form-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="" method="post" name="formftype" onsubmit="return submitftype()" class="form-agileits" enctype='multipart/form-data'>
		<h3 class="w3-contact-form-head">
			product type Form</h3>
		<label>Product type</label><br> <span id="idftype1" style="color:red"></span>
		<input type="text" id="producttype" name="producttype" placeholder="product type" value="<?php echo $rsedit['producttype'];?>"/><br>
		<label>Icon </label><br><center> <span id="idiconftype1" style="color:red"></span>
		<input type="file"  id="icon" name="icon" placeholder="icon" value="<?php echo $rsedit[icon];?>"/><br></center>
		<label>Discription </label><br><span id="iddescftype1" style="color:red"></span> 
		<textarea name="discription" id="discription"  placeholder="discription"><?php echo $rsedit[discription]; ?></textarea>
		<br>
		<label>Status</label><br> <span id="idstatusftype1" style="color:red"></span>
		<select class="form-data" name="status" id="status" >
			<option value=''>Select</option>
			<option value='Active'>Active</option>
			<option value='Inactive'>Inactive</option>
		</select>
		<input type="submit" name="submit" class="sign-in" value="Submit">
	</form>
</div>
</div>
<!--//form-->

<?php
include("footer.php");
?>

<script>
function submitftype()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	if(!document.formftype.producttype.value.match(alphaspaceExp))
	{
		document.getElementById("idftype1").innerHTML = "This field must contain only alphabets..";
		i=0;
	}
	if(document.formftype.producttype.value=="")
	{
		document.getElementById("idftype1").innerHTML = "Please enter the product type...";
		i=0;
	}
	if(document.formftype.icon.value=="")
	{
		document.getElementById("idiconftype1").innerHTML = "Please choose an icon...";
		i=0;
	}
	if(document.formftype.discription.value=="")
	{
		document.getElementById("iddescftype1").innerHTML = "Please enter the description...";
		i=0;
	}
	if(document.formftype.status.value=="")
	{
		document.getElementById("idstatusftype1").innerHTML = "Please select the status...";
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
