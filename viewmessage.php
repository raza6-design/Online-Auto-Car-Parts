<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM message WHERE messageid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Message record deleted successfully..');</SCRIPT>";
	}
}
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1 ">
						<h4>View Message</h4>
						<p>


<table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<thead>
		<tr>
			<th>Customer</th>
			<th>Supplier</th>
			<th>Message</th>
			<th>Message Date and Time</th>
			<th>Status</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql  = "SELECT * FROM message LEFT JOIN cutomer ON message.customerid=cutomer.customer_id LEFT JOIN supplier ON message.supplierid=supplier.supplierid";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		
		echo "<tr>
			<td>$rs[customername]</td>
			<td>$rs[companyname]</td>
			<td>$rs[message]</td>
			<td>$rs[msgdttim]</td>
			<td>$rs[status]</td>
			<td> <a href='message.php?editid=$rs[messageid]'>Edit </a> |  <a href='viewmessage.php?delid=$rs[messageid]' onclick='return confirmmsg()'> Delete </a></td>
		</tr>";
	}
	?>
	</tbody>
</table>

						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
	<!-- //special -->
<script>
function confirmmsg()
{
	if(confirm("Are you sure,you want to delete this record?") == true)
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