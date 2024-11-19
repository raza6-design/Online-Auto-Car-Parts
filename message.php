<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE message SET customerid='$_POST[customerid]',supplierid='$_POST[supplierid]',message='$_POST[message]',msgdttim='$_POST[msgdttim]',status='$_POST[status]' WHERE messageid='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Message record Updated successfully...');</script>";
		}
	}
	else
	{
	$sql = "INSERT INTO message(customerid,supplierid,message,msgdttim,status) VALUES ('$_POST[customerid]','$_POST[supplierid]','$_POST[message]','$_POST[msgdttim]','$_POST[status]')";
	mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('message record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error();
	}
}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM message WHERE messageid='$_GET[editid]'";
	$qsqledit  = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
 
<!--/contact-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label">
	<form action="#" method="post" name="frmmessage" onsubmit="return submitmessage14()" class="form-agileits">
		<h3 class="w3-contact-form-head">Message Form</h3>
		<label>Customer </label><br> <span id="idcustomsg" style="color:red"></span>
		<select class="form-data" name="customerid" id="customerid" >
			<option value=''>Select</option>
			<?php
	$sqlmsg = "SELECT * FROM  cutomer WHERE status='Active'";
	$qsqlmsg = mysqli_query($con,$sqlmsg);
	while($rsmsg = mysqli_fetch_array($qsqlmsg))
	{
		if($rsmsg[customer_id] == $rsedit[customerid])
		{
			echo "<option value='$rsmsg[customer_id]' selected>$rsmsg[customername]</option>";
		}
		else
		{
			echo "<option value='$rsmsg[customer_id]'>$rsmsg[customername]</option>";
		}
	}
	?>
		</select><br>
		<label>Supplier </label><br> <span id="idsupmsg" style="color:red"></span>
		<select class="form-data" name="supplierid" id="supplierid" >
			<option value=''>Select</option>
			<?php
	$sqlmsg = "SELECT * FROM  supplier WHERE status='Active'";
	$qsqlmsg = mysqli_query($con,$sqlmsg);
	while($rsmsg = mysqli_fetch_array($qsqlmsg))
	{
		if($rsmsg['supplierid'] == $rsedit['supplierid'])
		{
			echo "<option value='$rsmsg[supplierid]'>$rsmsg[companyname]</option>";
		}
		else
		{
			echo "<option value='$rsmsg[supplierid]'>$rsmsg[companyname]</option>";
		}
	}
	?>
		</select><br>
		<label>Message </label><br> <span id="idmessage14" style="color:red"></span>
		<input type="text" id="message" name="message" placeholder="message" value="<?php echo $rsedit[message]; ?>" /><br>
		<label>Message time </label><br> <span id="idmsgdttim" style="color:red"></span>
		<input type="date"  id="msgdttim" name="msgdttim" placeholder=" Message time"  value="<?php echo $rsedit[msgdttim]; ?>" /><br>
		<label>Status</label><br> <span id="idmsgstatus" style="color:red"></span>
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
function submitmessage14()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	if(document.frmmessage.customerid.value=="")
	{
		document.getElementById("idcustomsg").innerHTML = "Please select the name...";
		i=0;
	}
	
	if(document.frmmessage.supplierid.value=="")
	{
		document.getElementById("idsupmsg").innerHTML = "Please select the supplier...";
		i=0;
	}
	
	if(document.frmmessage.message.value=="")
	{
		document.getElementById("idmessage14").innerHTML = "Please enter the message...";
		i=0;
	}
	
	if(document.frmmessage.msgdttim.value=="")
	{
		document.getElementById("idmsgdttim").innerHTML = "Please enter the date...";
		i=0;
	}
	if(document.frmmessage.status.value=="")
	{
		document.getElementById("idmsgstatus").innerHTML = "Please enter the status...";
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
