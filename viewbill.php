<?php
include("header.php");
include("calculatetotal.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM billing WHERE billingid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Billing record deleted successfully..');</SCRIPT>";
	}
}
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1 ">
						<center><h2><u>View Billing</u></h2></center>
						<p>
<table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<thead>
		<tr>
			<th>Bill No.</th>
			<th>Customer</th>
			<th>Purchase Date</th>
			<th>Address</th>
            <th>Delivery Status</th>
<?php			
	if(isset($_SESSION['employeeid']))
	{
	echo "<th>Note</th>";
	}
?>			
			<th>Total Cost</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php
		$sql  = "SELECT * FROM billing LEFT JOIN cutomer ON billing.customerid=cutomer.customer_id WHERE billing.billingid!= '0'";
	if(isset($_SESSION["customer_id"]))
	{
		$sql = $sql . " AND billing.customerid='$_SESSION[customer_id]'";
	}
	if($_GET['st'] == "Delivered")
	{
		$sql = $sql . " AND billing.deliverystatus='$_GET[st]'";
	}
	else
	{
		$sql = $sql . " AND billing.deliverystatus!='Delivered'";
	}	
	
		$sql = $sql . " ORDER BY billing.billingid DESC";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{		
		echo "<tr>
			<td>$rs[0]</td>
			<td>$rs[customername]</td>
			<td>$rs[purchasedate]</td>
			<td>$rs[4], $rs[5],<br>State:$rs[6],<br>PIN:$rs[8]<br>Contact No. $rs[7]</td>
			<td>$rs[deliverystatus]";	
		echo "</td>";
	if(isset($_SESSION['employeeid']))
	{
	echo "<td style='width:50px;'>$rs[note]</td>";
	}
	echo "<td>"; 
	calculatetotal($rs[0]);
	echo "</td>";
	echo "<td>";
	echo "<a href='bill.php?billno=$rs[billingid]' target='_blank'>view</a> ";
		
	if(isset($_SESSION['employeeid']))
	{
	echo "<Br><a href='viewbill.php?delid=$rs[billingid]' onclick='return confirmmsg()'> Delete </a>";
	}		

	echo "</td></tr>";
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