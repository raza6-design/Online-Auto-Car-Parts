<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE billing SET customerid='$_POST[customerid]',purchasedate='$_POST[purchasedate]',deliverystatus='$_POST[deliverystatus]',address='$_POST[address]',city='$_POST[city]',state='$_POST[state]',contactno='$_POST[contactno]' ,pincode='$_POST[pincode]',note='$_POST[note]',status='$_POST[status]'  WHERE billingid='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Billing record Updated successfully...');</script>";
		}
	}
	else
	{
	$sql = "INSERT INTO billing(customerid,purchasedate,deliverystatus,address,city,state,contactno,pincode,note,status) VALUES ('$_POST[customerid]','$_POST[purchasedate]','$_POST[deliverystatus]','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[contactno]','$_POST[pincode]','$_POST[note]','$_POST[status]')";
	mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Billing record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error();
	}
}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM billing WHERE billingid='$_GET[editid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
 
<!--/contact-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="#" method="post" class="form-agileits">
		<h3 class="w3-contact-form-head">Billing Form</h3>
		<label>Customer</label><br>
		<select class="form-data" name="customerid" id="customerid" >
			<option value=''>Select</option>
			<?php
	$sqlcutomer = "SELECT * FROM  cutomer where status='Active'";
	$qsqlcutomer = mysqli_query($con,$sqlcutomer);
	while($rscutomer = mysqli_fetch_array($qsqlcutomer))
	{
		if($rscutomer[customer_id] == $rsedit[customerid])
		{
			echo "<option value='$rscutomer[customer_id]' selected>$rscutomer[customername]</option>";
		}
		else
		{
			echo "<option value='$rscutomer[customer_id]'>$rscutomer[customername]</option>";
		}
	}
	?>
		</select><br>
		<label>Purchase date</label><br>
		<input type="date"  id="purchasedate" name="purchasedate" placeholder="purchase date" value="<?php echo $rsedit['purchasedate']; ?>"/><br>
		<label> Delivery status </label><br>
		<input type="text" id="deliverystatus" name="deliverystatus" placeholder="delivery status" value="<?php echo $rsedit['deliverystatus']; ?>"/><br>
		<label> Address </label><br>
		<textarea name="address"  placeholder="address"><?php echo $rsedit['address']; ?></textarea>
		<br>
		<label> City</label><br>
		<input type="text" id="city" name="city" placeholder="city" value="<?php echo $rsedit['city']; ?>"/><br>
		<label> State</label><br>
		<input type="text" id="state" name="state" placeholder=" state" value="<?php echo $rsedit['state']; ?>" /><br>
		<label> Contact no </label><br>
		<input type="text" id="contactno" name="contactno" placeholder="contact no" value="<?php echo $rsedit['contactno']; ?>"/><br>
		<label> Pincode </label><br>
		<input type="text" id="pincode" name="pincode" placeholder="Pin code" value="<?php echo $rsedit['pincode']; ?>"/><br>
		<label>  Note </label><br>
		<input type="text" id="note" name="note" placeholder="note" value="<?php echo $rsedit[note]; ?>"/><br>
		<label>Status</label><br>
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
