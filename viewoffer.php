<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM offer WHERE offerid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Offer record deleted successfully..');</SCRIPT>";
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
			<th>product</th>
			<th> Supplier</th>
			<th>discount</th>
			<th>Status</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql  = "SELECT * FROM offer LEFT JOIN product ON offer.productid=product.productid LEFT JOIN supplier ON offer.supplierid=supplier.supplierid WHERE offer.offerid<>'' ";
	if(isset($_SESSION['supplierid']))
	{
		$sql = $sql  . " AND offer.supplierid='$_SESSION[supplierid]'";
	}
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[title]</td>
			<td>$rs[companyname]</td>
			<td>$rs[discountamt]%</td>
			<td>$rs[status]</td>
			<td><a href='offer.php?editid=$rs[offerid]'>Edit </a> | <a href='viewoffer.php?delid=$rs[offerid]' onclick='return confirmmsg()'> Delete </a></td>
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