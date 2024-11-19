<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM stock WHERE stockid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Stock record deleted successfully..');</SCRIPT>";
	}
}
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">	
				
					<div class="col-md-12 agileits-special-info w3-grid-1">
					    <h4>View Stock</h4>
<p>			
<table  id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<thead>
		<tr>
			<th>Bill No.</th>
			<th>Products</th>
			<th>Purchase date</th>
			<th>Quantity</th>
			<th>Purchase amount</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	
	<tbody>
	<?php
	$sql  = "SELECT * FROM stock LEFT JOIN product ON stock.productid=product.productid LEFT JOIN supplier ON stock.supplierid=supplier.supplierid";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[billno]</td>
			<td>$rs[title] <br><b>Company:</b> $rs[companyname]</td>
			<td>$rs[stkdate]</td>
			<td>$rs[qty]</td>
			<td>Rs. $rs[cost]</td>
			<td>$rs[status]</td>
			<td> <a href='viewstock.php?delid=$rs[stockid]' onclick='return confirmmsg()'>Delete</a></td>
	
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