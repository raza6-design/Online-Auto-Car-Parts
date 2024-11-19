<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM producttype WHERE productstypeid ='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('product type record deleted successfully..');</SCRIPT>";
	}
}
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1 ">
						<h4>View Product Type</h4>
						<p>
<table  id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<thead>
		<tr>
			<!-- <th>Icon</th> -->
			<th>Product type</th>
			<th>Discription</th>
			<th>Status</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql  = "SELECT * FROM producttype";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{

		echo "<tr>
			<td>$rs[producttype]</td>
			<td>$rs[discription]</td>
			<td>$rs[status]</td>
			<td><a href = 'producttype.php?editid=$rs[productstypeid]'> Edit </a> | <a href = 'viewprotype.php? delid = $rs[productstypeid]' onclick='return confirmmsg()'> Delete </a></td>
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
	if(confirm("Are you sure want to delete this record?") == true)
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