<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM employee WHERE employeeid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Employee record deleted successfully..');</SCRIPT>";
	}
}
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1 ">
						<h4>View Offer</h4>
						<p>


<table  id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<thead>
		<tr>
			<th>Employee name</th>
			<th> Login id</th>
			<th>Password</th>
			<th>Status</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql  = "SELECT * FROM employee";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[empname]</td>
			<td>$rs[loginid]</td>
			<td>$rs[password]</td>
			<td>$rs[status]</td>
			<td><a href='employee.php?editid=$rs[employeeid]'>Edit </a> | <a href='viewemp.php?delid=$rs[employeeid]' onclick='return confirmmsg()'> Delete </a></td>
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

<?php
include("datatable.php");
include("footer.php");
?>