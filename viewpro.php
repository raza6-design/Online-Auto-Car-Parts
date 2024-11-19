<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM product WHERE productid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Product record deleted successfully..');</SCRIPT>";
	}
}
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1 ">
						<h4>View Products</h4>
						<p>			
<table  id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<thead>
		<tr>
			<th>Product Type</th>
			<th>Supplier</th>
			<th>Title </th>
			<th style='text-align: right;'>Cost</th>
			<th>Stock</th>
			<th>Warranty </th>
			<th>Status</th>
			<th>Images</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql  = "SELECT * FROM product LEFT JOIN producttype ON product.productstypeid=producttype.productstypeid LEFT JOIN supplier ON product.supplierid=supplier.supplierid WHERE product.productid<>'' ";
	if(isset($_SESSION['supplierid']))
	{
		$sql = $sql  . " AND product.supplierid='$_SESSION[supplierid]'";
	}
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		$sqlstock ="SELECT sum(qty) FROM stock WHERE productid='$rs[productid]'";
		$qsqlstock  = mysqli_query($con,$sqlstock);
		$rsstock = mysqli_fetch_array($qsqlstock);
		$sqlpurchase ="SELECT sum(qty) FROM purchase WHERE productid='$rs[productid]'";
		$qsqlpurchase  = mysqli_query($con,$sqlpurchase);
		$rspurchase = mysqli_fetch_array($qsqlpurchase);
		$totalavailable =  $rsstock[0] -$rspurchase[0] ;
		$sqlproductimages  = "SELECT * FROM productimages LEFT JOIN product  ON productimages.productid=product.productid WHERE productimages.productid='$_GET[furid]'";
		$qsqlproductimages = mysqli_query($con,$sqlproductimages);
		echo "<tr>
			<td>$rs[producttype]</td>
			<td>$rs[companyname]</td>
			<td>$rs[title]</td>
			<td style='text-align: right;'>Rs $rs[cost]</td>
			<td>$totalavailable</td>
			<td>$rs[warranty]</td>
			<td>$rs[9]</td>
			<td><a href='viewproimage.php?furid=$rs[productid]&furname=$rs[title]'>Upload Images (" . mysqli_num_rows($qsqlproductimages) . ") </a></td>
			<td><a href='product.php?editid=$rs[productid]'>Edit</a>  | <a href='viewpro.php?delid=$rs[productid]' onclick='return confirmmsg()'>Delete</a> |<a href='productdetail.php?productid=$rs[productid]' target='_blank'>View</a> </td>
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