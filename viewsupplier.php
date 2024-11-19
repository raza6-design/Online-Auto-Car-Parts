<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM supplier WHERE supplierid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Supplier record deleted successfully..');</SCRIPT>";
	}
}
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1 ">
						<h4>View Supplier</h4>


<table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<thead>
		<tr>
		
			<th>Logo</th>
			<th>Company Name</th>
			<th>Login Id</th>
			<th>Company Address</th>
			<th>City</th>
			<th>Pincode</th>
			<th>Mobile No.</th>
			<th>Status</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql  = "SELECT * FROM supplier";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
		    <td><img src='imgsupplier/$rs[companylogo]' width='50' height='50'></td>
			<td>$rs[companyname]</td>
			<td>$rs[loginid]</td>
			<td>$rs[companyaddress]</td>
			<td>$rs[city]</td>
			<td>$rs[pincode]</td>
			<td>$rs[phonenumber]</td>
			<td>$rs[status]</td>
			<td><a href='supplier.php?editid=$rs[supplierid]'>Edit </a> |  <a href='viewsupplier.php?delid=$rs[supplierid]' onclick='return confirmmsg()'> Delete </a></td>
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