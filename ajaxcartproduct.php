<?php
include("dbconnection.php");
if(isset($_GET['qty']))
{
$sql = "UPDATE purchase SET qty='$_GET[qty]' WHERE purchaseid='$_GET[purchaseid]'";
$qsql = mysqli_query($con,$sql);
}
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM purchase WHERE purchaseid='$_GET[delid]'";
	$qsql  = mysqli_query($con,$sql);
	echo mysqli_error($con);
}
?>
<table  id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;background-color:white;">
	<thead>
		<tr>
			<th>Product  Name</th>
			<th>Product cost</th>
			<th>Quantity</th>
			<th>Total</th>
			<th>Del</th>
			
		</tr>
	</thead>
	<tbody>
	<?php
	$subtotal1=0;
	$sql  = "SELECT * FROM purchase LEFT JOIN product ON purchase.productid=product.productid LEFT JOIN billing ON purchase.billingid=billing.billingid WHERE purchase.status='Pending'";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
	$sqloffer= "SELECT * FROM offer WHERE  productid='$rs[productid]'";
	$qsqloffer  = mysqli_query($con,$sqloffer);
	$rsoffer = mysqli_fetch_array($qsqloffer);
	$offeramt = $rsoffer["discountamt"];
if(mysqli_num_rows($qsqloffer) ==0)
{						
	//echo "₹".$productamt;
	$totamt = $rs['cost'];
}
else
{
	//$productwithoffamt = $productamt - ($productamt * $offeramt/100);
	//echo "₹". $productwithoffamt  . " <strike>₹$productamt</strike> ($offeramt% off)";
	$totamt = $rs['cost'] - ($rs['cost']  * $offeramt/100);
}	

		$total = $rs['qty'] * $rs['cost'];
		$taxamt1 =  $total *$tottaxamt/100;
		$subtotal = $taxamt1 + $total;
		
		$taxtax = $taxamt['CGST']."% CGST  + ";
		$taxtax = $taxtax. $taxamt['SGST']."% SGST +";
		$taxtax = $taxtax. $taxamt['IGST']."% IGST ";
		
		echo "<tr>
			<td>$rs[title]";
			
if(mysqli_num_rows($qsqloffer) ==0)
{						
	//echo "₹".$productamt;
	//$totamt = $rs['cost'];
}
else
{
	echo "<br>";
	$productwithoffamt = $productamt - ($productamt * $offeramt/100);
	echo "<b>Offer - </b>$offeramt% off";
}	
		echo "</td>
			<td>Rs.  $totamt</td>
			<td><input type='number' name='qty[]' value='$rs[qty]' style='width:75px;' onkeyup='funpurchaseupdategrid($rs[0],this.value)' onchange='funpurchaseupdategrid($rs[0],this.value)' ></td>
			<td>Rs. " .  $totamt * $rs['qty'] . "</td>
			<td><input type='button' value='X' onclick='fundeletepurchaseitem($rs[0])'></td>
		
		</tr>";
		
		$subtotal1 = $subtotal1 + ($totamt * $rs['qty']);
	}
		?>
		
	</tbody>
		<tbody>
			<tr>
				<td></td>
				<th></th>
				<th><b>Sub total</b></th>
				<th>Rs. <?php echo $subtotal1; ?></th>
				<th></th>
				
			</tr>
		</tbody>
</table>