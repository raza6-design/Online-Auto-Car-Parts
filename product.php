<?php
include("header.php");
if(isset($_POST['submit']))
{
	$description = mysqli_real_escape_string($con,nl2br($_POST['description']));
	$specifications = mysqli_real_escape_string($con, nl2br($_POST['specifications']));
	$installationdemo = mysqli_real_escape_string($con,$_POST['installationdemo']);
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE product SET productstypeid='$_POST[productstypeid]',supplierid='$_POST[supplierid]', title='$_POST[title]' ,description='$description',cost='$_POST[cost]',specifications='$specifications',warranty='$_POST[warranty]',installationdemo='$installationdemo',status='$_POST[status]' WHERE productid='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Product record Updated successfully...');</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO product(productstypeid,supplierid,title,description,cost,specifications,warranty,installationdemo,status) VALUES ('$_POST[productstypeid]','$_POST[supplierid]','$_POST[title]','$description','$_POST[cost]','$specifications','$_POST[warranty]','$installationdemo','$_POST[status]')";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Product Record added successfully...');</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM product WHERE productid='$_GET[editid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
function br2nl($input) {
    return preg_replace('/<br\\s*?\/??>/i', '', $input);
}
?>
 
<!--/productForm-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="#" method="post" name="frmfur" onsubmit="return submitfur()" class="form-agileits">
		<h3 class="w3-contact-form-head">Products Form</h3>
		<label>Product type</label><br><span id="idfurnity" style="color:red"></span>
		<select class="form-data" name="productstypeid" id="productstypeid" ><br>
			<option value=''>Select</option>
			<?php
	$sqlfur = "SELECT * FROM  producttype WHERE status='Active'";
	$qsqlfur = mysqli_query($con,$sqlfur);
	while($rsfur = mysqli_fetch_array($qsqlfur))
	{
		if($rsfur['productstypeid'] == $rsedit['productstypeid'])
		{
			echo "<option value='$rsfur[productstypeid]' selected>$rsfur[producttype]</option>";
		}
		else
		{
			echo "<option value='$rsfur[productstypeid]'>$rsfur[producttype]</option>";
		}
	}
	?>
			</select><br>
<?php
if(isset($_SESSION['supplierid']))		
{
?>
<input type='hidden' name='supplierid' value="<?php echo $_SESSION['supplierid']; ?>">
<?php
}
else
{
?><br>
<label>Supplier</label><br><span id="idsuppl1" style="color:red"></span>
<select class="form-data" name="supplierid" id="supplierid" >
	<option value=''>Select Supplier</option>
	<?php
	$sqlfur = "SELECT * FROM  supplier WHERE status='Active'";
	$qsqlfur = mysqli_query($con,$sqlfur);
	while($rsfur = mysqli_fetch_array($qsqlfur))
	{
		if($rsfur['supplierid'] == $rsedit['supplierid'])
		{
		echo "<option value='$rsfur[supplierid]' selected>$rsfur[companyname]</option>";
		}
		else
		{
		echo "<option value='$rsfur[supplierid]'>$rsfur[companyname]</option>";
		}
	}
	?>
</select>
<?php
}
?>			
			
			<br>
		<label>Title </label><br> <span id="idtit" style="color:red"></span>
		<input type="text"  id="title" name="title"  value="<?php echo $rsedit['title'];?>"/><br>
		<label>Description </label><br> <span id="iddes" style="color:red"></span>
		<textarea name="description"  ><?php echo br2nl($rsedit['description']); ?></textarea>
		<br>
		<label>Cost </label><br> <span id="idcos" style="color:red"></span>
		<input type="text"  id="cost" name="cost" value="<?php echo intval($rsedit['cost']); ?>"/><br>
		<label>Specification </label><br> <span id="idspec" style="color:red"></span>
		<textarea name="specifications"  ><?php echo br2nl($rsedit['specifications']); ?></textarea>
		<br>
		<label>Warranty </label><br> <span id="idwar" style="color:red"></span>
		<input type="text"  id="warranty" name="warranty"  value="<?php echo $rsedit['warranty']; ?>"/><br>
		<label>Installation Demo </label><br> <span id="idinstall" style="color:red"></span>
		<textarea id="installationdemo" name="installationdemo"  ><?php echo br2nl($rsedit['installationdemo']); ?></textarea><br>
		
<?php
if(isset($_SESSION['supplierid']))		
{
?>
<input type='hidden' name='status' value="Pending">
<?php
}
else
{
?>
		<label>Status</label><br><span id="idistatus" style="color:red"></span>
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
<?php
}
?>		
		<input type="submit" name="submit" class="sign-in" value="Submit">
	</form>
</div>
</div>
<!--//contact-->

<?php
include("footer.php");
?>

<script>
function submitfur()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	if(document.frmfur.productstypeid.value=="")
	{
		document.getElementById("idfurnity").innerHTML = "Please select the product type...";
		i=0;
	}
	if(document.frmfur.supplierid.value=="")
	{
		document.getElementById("idsuppl1").innerHTML = "Please select the supplier...";
		i=0;
	}
	if(document.frmfur.title.value=="")
	{
		document.getElementById("idtit").innerHTML = "Please enter the title...";
		i=0;
	}
	if(!document.frmfur.cost.value.match(numericExpression))
	{
		document.getElementById("idcos").innerHTML = "This field should contain only Numbers..";
		i=0;
	}
	if(document.frmfur.cost.value=="")
	{
		document.getElementById("idcos").innerHTML = "Please enter the cost...";
		i=0;
	}
	if(document.frmfur.specifications.value=="")
	{
		document.getElementById("idspec").innerHTML = "Please enter the Specification for this product...";
		i=0;
	}
	if(document.frmfur.warranty.value=="")
	{
		document.getElementById("idwar").innerHTML = "Please enter the warranty for this product...";
		i=0;
	}
	if(document.frmfur.installationdemo.value=="")
	{
		document.getElementById("idinstall").innerHTML = "Please enter the Installation Demo...";
		i=0;
	}
	if(document.frmfur.status.value=="")
	{
		document.getElementById("idistatus").innerHTML = "Please select the status...";
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