<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM productimages WHERE productimgid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Product Image record deleted successfully..');</SCRIPT>";
	}
}
if(isset($_POST['submit']))
{
	$filename= rand() . $_FILES['imgpath']['name'] ; 
	move_uploaded_file($_FILES['imgpath']['tmp_name'],'imgproducts/'.$filename);
	
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE productimages SET productid='$_GET[furid]' ,description='$_POST[description]',status='$_POST[status]' WHERE productimgid='$_GET[editid]'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Product Image record Updated successfully...');</script>";
		}
	}
	else
	{
		if($_POST['status'] == "Primary")
		{
			 $sql = "UPDATE productimages SET status='Active' WHERE productid='$_GET[furid]' AND  status='Primary'";
			mysqli_query($con,$sql);
		}
		$sql = "INSERT INTO productimages(productid,imgpath,description,status) VALUES ('$_GET[furid]','$filename','$_POST[description]','$_POST[status]')";
		mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Product image record inserted successfully...');</script>";
		}
	}
}
?>
 <!--//main-header-->
	<!-- special -->
				<div class="col-md-12 w3l-special-grid">
				
					<div class="col-md-12 agileits-special-info w3-grid-1 ">
						<h4>Images of <?php echo $_GET['furname']; ?></h4>
						<p>
						<a  href="#open-modalimg">Click Here to Upload Image</a>
						</p>
						<p>
<table  id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
	<thead>
		<tr>
			<th>Image path</th>
			<th>Products</th>
			<th>Description</th>
			<th>Status</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql  = "SELECT * FROM productimages LEFT JOIN product  ON productimages.productid=product.productid WHERE productimages.productid='$_GET[furid]'";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		if(file_exists("imgproducts/".$rs['imgpath']))
		{
			$filename=  "imgproducts/".$rs['imgpath'];
		}
		else
		{
			$filename=  "images/No_Image_Available.jpg";
		}
		echo "<tr>
		    <td><img src='$filename' style='width:150px;height:150px;'/></td>
			<td>$rs[title]</td>
			<td>$rs[3]</td>
			<td>$rs[4]</td>
			<td>  <a href='viewfurimage.php?delid=$rs[productimgid]' onclick='return confirmmsg()'> Delete </a></td>
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
	if(confirm("Are you sure, you want to delete this record?") == true)
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

<div id="open-modalimg" class="modal-window">
  <div>
    <a href="#modal-close" title="Close" class="modal-close">Close</a>
    <h1>Upload image here</h1>
    <div>
		<?php  include("productimages.php"); ?>
	</div>
  </div>
</div>