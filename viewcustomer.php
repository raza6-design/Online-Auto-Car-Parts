<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM cutomer WHERE customer_id ='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('customer record deleted successfully..');</SCRIPT>";
	}
}
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1 ">
						<h4>View customer </h4>
						<p>
<table  id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<thead>
		<tr>
			<th>Customer name</th>
			<th>Email-Id</th>
			<th>Password</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Contact-No</th>
			<th>pincode</th>
			<th>Status</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql  = "SELECT * FROM cutomer";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[customername]</td>
			<td>$rs[emailid]</td>
			<td>$rs[password]</td>
			<td>$rs[address]</td>
			<td>$rs[city]</td>
			<td>$rs[state]</td>
			<td>$rs[contactno]</td>
			<td>$rs[pincode]</td>
			<td>$rs[status]</td>
			<td><a href='customer.php?editid=$rs[customer_id]'>Edit</a> |  <a href='viewcustomer.php?delid=$rs[customer_id]' onclick='return confirmmsg()'>Delete</a></td>
		</tr>";
		
	}
	?>
	</tbody>
</table>

					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
	<!-- //special -->
<script>
function confirmmsg()
{
	if(confirm("Are you sure you want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>	


<?php
include("datatable.php");
include("footer.php");
?>