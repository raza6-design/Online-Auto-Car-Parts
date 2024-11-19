<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM purchase WHERE purchaseid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Purchase record deleted successfully..');</SCRIPT>";
	}
}
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1 ">
						<h4>View purchase</h4>
						<p>

<table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<thead>
		<tr>
			<th>Billing</th>
			<th>Customer</th>
			<th>Products</th>
			<th>Quality</th>
			<th>Cost</th>
			<th>CGST Tax</th>
			<th>SGST Tax</th>
			<th>IGST Tax</th>
			<th>discount</th>
			<th>Status</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql  = "SELECT * FROM purchase LEFT JOIN billing ON purchase.billingid=billing.billingid LEFT JOIN cutomer ON cutomer.customer_id=purchase.customerid LEFT JOIN product ON purchase.productid=product.productid";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		
		echo "<tr>
			<td>$rs[deliverystatus]</td>
			<td>$rs[customername]</td>
			<td>$rs[title]</td>
			<td>$rs[qty]</td>
			<td>$rs[cost]</td>
			<td>$rs[cgsttax]</td>
			<td>$rs[sgsttax]</td>
			<td>$rs[igsttax]</td>
			<td>$rs[discount]</td>
			<td>$rs[status]</td>
			<td><a href='purchase.php?editid=$rs[purchaseid]'>Edit </a> |  <a href='viewpurchase.php?delid=$rs[purchaseid]' onclick='return confirmmsg()'>  Delete </a></td>
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