<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM tax WHERE taxid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Tax record deleted successfully..');</SCRIPT>";
	}
}
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1">
						<h4>View Tax</h4>
<p>			
<table  id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<thead>
		<tr>
			<th>Tax type</th>
			<th>Tax percentage</th>
			<th>Status</th>
			<th>Active</th>
		</tr>
	</thead>
	
	<tbody>
	<?php
	$sql  = "SELECT * FROM tax";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[taxtype]</td>
			<td>$rs[taxpercentage]</td>
			<td>$rs[status]</td>
			<td><a href='tax.php?editid=$rs[taxid]'>Edit</tax> |  <a href='viewtax.php?delid=$rs[taxid]' onclick='return confirmmsg()'>Delete</a></td>
	
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