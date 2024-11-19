<?php
include("dbconnection.php");

if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM productimages WHERE productimgid='$_GET[editid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}

?>

<div class="w3-contact" id="contact">
	<form action="" method="post" class="form-agileits" enctype='multipart/form-data'>			
		<label>Upload Image</label><br>
		<input type="file"  id="imgpath" name="imgpath" placeholder="image path"   value="<?php echo $rsedit['imgpath']; ?>"/><br>
		
		<label>Description </label><br>
		<textarea name="description"  placeholder="description"><?php echo $rsedit['description']; ?></textarea>
		<br>
			<label>Status</label><br>
		<select class="form-data" name="status" id="status" >
			<option value=''>Select</option>
			<?php
			$arr  = array("Primary","Active","Inactive");
			foreach($arr as $val)
			{
				echo "<option value='$val'>$val</option>";
			}
			?>
		</select>
		<input type="submit" id="submit" name="submit" class="sign-in" value="Submit">
	</form>
</div>
<?php
include("footer.php");
?>