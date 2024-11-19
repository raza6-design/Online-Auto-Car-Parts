<?php
include("header.php");
if(isset($_POST['submit']))
{
	$filename = rand().$_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]["tmp_name"],"imgcustomizedorder/".$filename);
	
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE product SET productstypeid='$_POST[productstypeid]',supplierid='$_POST[supplierid]', title='$_POST[title]' ,description='$_POST[description]',cost='$_POST[cost]',specifications='$_POST[specifications]',warranty='$_POST[warranty]',installationdemo='$_POST[installationdemo]',status='$_POST[status]' WHERE productid='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('product record Updated successfully...');</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO product(productstypeid,supplierid,title,description,cost,specifications,warranty,installationdemo,status) VALUES ('$_POST[productstypeid]','$_SESSION[customer_id]','$_POST[title]','$_POST[description]','$_POST[cost]','$_POST[specifications]','$_POST[warranty]','$_POST[installationdemo]','Customized')";
		mysqli_query($con,$sql);
		$insid = mysqli_insert_id($con);
		if(mysqli_affected_rows($con) == 1)
		{
			$sql = "INSERT INTO productimages(productid,imgpath,description,status) VALUES ('$insid','$filename','$_POST[imagedescription]','Active')";
			mysqli_query($con,$sql);
			echo mysqli_error($con);
			echo "<script>alert('Customized Order Request sent successfully...');</script>";
		}
		else
		{
			echo mysqli_error();
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM product WHERE productid='$_GET[editid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
 
<!--/Customized form-->
<div class="w3-contact" id="contact">
	<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label" style="width:90%;">
		
			<form action="" method="post"  name="formcustomized" onsubmit="return submitcustomized()" class="form-agileits" enctype="multipart/form-data">
			<div class="col-md-12"><h3 class="w3-contact-form-head">Customized Order </h3></div>
			<div class="col-md-8"> 
				<label>Product type</label><br><span id="idcusfuritype" style="color:red"></span> 
				<select class="form-data" name="productstypeid" id="productstypeid" >
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
					</select>
							<br>	
							
						<label>Title </label><br><span id="idcustomizedtitle" style="color:red"></span> 
						<input type="text"  id="title" name="title" placeholder="title"  value="<?php echo $rsedit['title'];?>"/><br>
						<label>Enter detailed requirements here </label><br><span id="iddescicus" style="color:red"></span> 
						<textarea name="description" id="description" placeholder="description"><?php echo $rsedit['description']; ?></textarea>
						<br>
						<label>My budget </label><br><span id="idbudgetcus" style="color:red"></span> 
						<input type="text"  id="cost" name="cost" placeholder="cost"  value="<?php echo $rsedit['cost']; ?>"/><br>
						<label>Any Note </label><br><span id="idcusnote" style="color:red"></span> 
						<textarea name="specifications"  placeholder="specifications"><?php echo $rsedit['specifications']; ?></textarea>
						<br>
						<label>Quantity </label><br><span id="idcusquantity" style="color:red"></span> 
						<input type="text"  id="warranty" name="warranty" placeholder="Enter Quantity"  value="<?php echo $rsedit['warranty']; ?>"/><br>
			</div>
			<div class="col-md-4"> 
				Upload Image <br><span id="iduploadimage" style="color:red"></span> 
				<input type="file" name="file" id="file">
				<img src="" id="img" name="img" style="width:100%"><br>
				Image Description <br><span id="idimagedescription" style="color:red"></span> 
				<textarea name="imagedescription" id="imagedescription" ></textarea>
			</div>
				<input type="submit" name="submit" class="sign-in" value="Submit">
			</form>
	</div>
		</div>
	</div>
</div>
<!--//contact-->

<?php
include("footer.php");
?>
<script>
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#file").change(function() {
  readURL(this);
});

function submitcustomized()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	if(document.formcustomized.productstypeid.value=="")
	{
		document.getElementById("idcusfuritype").innerHTML = "Please Select a product type...";
		i=0;
	}
	if(!document.formcustomized.title.value.match(alphaspaceExp))
	{
		document.getElementById("idcustomizedtitle").innerHTML = "This field must contain only Alphabets..";
		i=0;
	}
	if(document.formcustomized.title.value=="")
	{
		document.getElementById("idcustomizedtitle").innerHTML = "Please enter the Title...";
		i=0;
	}
	
	if(document.formcustomized.description.value=="")
	{
		document.getElementById("iddescicus").innerHTML = "Please enter the Description...";
		i=0;
	}
	if(!document.formcustomized.cost.value.match(numericExpression))
	{
		document.getElementById("idbudgetcus").innerHTML = "This field must contain only Numbers..";
		i=0;
	}
	if(document.formcustomized.cost.value=="")
	{
		document.getElementById("idbudgetcus").innerHTML = "Please enter the Cost...";
		i=0;
	}
	if(document.formcustomized.specifications.value=="")
	{
		document.getElementById("idcusnote").innerHTML = "Please enter the Specifications...";
		i=0;
	}
	if(!document.formcustomized.warranty.value.match(numericExpression))
	{
		document.getElementById("idcusquantity").innerHTML = "This field must contain only Numbers..";
		i=0;
	}
	if(document.formcustomized.warranty.value=="")
	{
		document.getElementById("idcusquantity").innerHTML = "Please enter the Quantity...";
		i=0;
	}
	if(document.formcustomized.file.value=="")
	{
		document.getElementById("iduploadimage").innerHTML = "Please enter the sample image...";
		i=0;
	}
	if(document.formcustomized.imagedescription.value=="")
	{
		document.getElementById("idimagedescription").innerHTML = "Please enter the Description for this image...";
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
 