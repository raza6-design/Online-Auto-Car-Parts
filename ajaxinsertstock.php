<?php
if(!isset($_SESSION)) { session_start(); }
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
include("dbconnection.php");
if(isset($_GET['delstockid']))
{
	$sql = "DELETE FROM stock WHERE stockid='$_GET[delstockid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Stock deleted successfully..');</SCRIPT>";
	}
}

if(isset($_GET['billno']))
{
	$sql = "INSERT INTO stock(productid,supplierid,billno,stkdate,qty,cost,status) VALUES ('$_GET[productid]','$_GET[supplierid]','$_GET[billno]','$_GET[purchasedate]','$_GET[qty]','$_GET[cost]','Pending')";
	mysqli_query($con,$sql);
	echo mysqli_error($con);
}
$sql= "SELECT * FROM stock LEFT JOIN product ON stock.productid = product.productid WHERE stock.status='Pending'  ORDER BY stock.stockid DESC ";
$qsql = mysqli_query($con,$sql);
$totalamt = 0;
while($rs = mysqli_fetch_array($qsql))
{
	$amt = $rs[6] * $rs['qty'];
	echo "<tr style='background-color:rgba(0,0,0,0.5);color:white;'><td>$rs[title]</td><td>Rs. $rs[6]</td><td>$rs[qty]</td><td>Rs. $amt</td><td><input type='button' value='X' onclick='deleterow($rs[stockid])'  style='color:black;'></td></tr>";
	$totalamt = $totalamt + $rs[6] * $rs['qty'];
}
?>

<tr style='background-color:blue;color:white;'>
	<td></td>
	<td></td>
	<td>Total Amount</td>
	<td>Rs. <?php echo $totalamt ; ?></td>	
	<td></td>
</tr>