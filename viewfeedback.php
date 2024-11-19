<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM feedback WHERE feedbackid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Feedback deleted successfully..');</SCRIPT>";
	}
}
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1">
						<h4>View feedbacks</h4>
<p>			
<table  id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<thead>
		<tr>
			<th>Productid</th>
			<th>Customerid</th>
			<th>ratings</th>
			<th>title</th>
			<th>feedback</th>
			<th>date of feedback</th>
			<th>Status</th>
			<th>Active</th>
		</tr>
	</thead>
	
	<tbody>
	<?php
	$sql  = "SELECT * FROM feedback LEFT JOIN product ON feedback.productid=product.productid LEFT JOIN cutomer ON feedback.customer_id=cutomer.customer_id";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[title]</td>
			<td>$rs[customername]</td>
			<td>$rs[ratings]</td>
			<td>$rs[title]</td>
			<td>$rs[feedback]</td>
			<td>$rs[fbdate]</td>
			<td>$rs[status]</td>
			<td><a href='viewfeedback.php?delid=$rs[feedbackid]' onclick='return confirmmsg()'>Delete</a></td>
	
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