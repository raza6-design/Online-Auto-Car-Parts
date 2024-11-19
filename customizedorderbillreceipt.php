<?php
include("header.php");
if(isset($_GET['st']))
{
	$sqlbill = "UPDATE billing SET deliverystatus='$_GET[st]' WHERE billingid='$_GET[billno]'";
	mysqli_query($con,$sqlbill);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Delivery status Updated successfully...');</script>";
	}
}

	 	$sqlbilling1  = "SELECT * FROM billing LEFT JOIN cutomer ON billing.customerid=cutomer.customer_id LEFT JOIN purchase ON purchase.billingid=billing.billingid LEFT JOIN product ON  product.productid=purchase.productid WHERE billing.billingid='$_GET[insid]'";
	$qsqlbilling1 = mysqli_query($con,$sqlbilling1);
	$rsbilling1 = mysqli_fetch_array($qsqlbilling1);
?>
<!--/bill form s-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile" style="width:1050px;background-color:white;color:black;">
	<form action="" method="post" >
<div id="printarea"	>
<table    class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
<tr>
	<th colspan="3"><center><img src='images/goodwillproductshop.png' ></center></th>
</tr>
<tr>
	<td colspan="3"><center>SHIRVA,Bangalore</center></td>
</tr>

<tr>
	<td colspan="2"><b>Customer:</b>  <?php echo $rsbilling1['customername']; ?></td>
	<td><b>Date:</b>  <?php echo $rsbilling1['purchasedate']; ?> </td>
</tr>

<tr>
	<td colspan="2"><b>Address:</b> <?php echo $rsbilling1[4]; ?>,<?php echo $rsbilling1[5]; ?>,<br>State: <?php echo $rsbilling1[6]; ?>,<br>PIN: <?php echo $rsbilling1[8]; ?> </td>
	<td><b>Bill No:</b> <?php echo $rsbilling1['billingid']; ?></td>
</tr>

<tr>
	<td colspan="2"><b>Contact No:</b><?php echo $rsbilling1[7]; ?> </td>
	<td></td>
</tr>
</table>

<table   class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;background-color:white;">
	<thead>
		<tr>
			<th>Product  Name</th>
			<th>Quantity</th>
			<th>Total</th>
			
		</tr>
	</thead>
	<tbody>
	<?php
	$subtotal1=0;
	$sql  = "SELECT * FROM purchase LEFT JOIN product ON purchase.productid=product.productid LEFT JOIN billing ON purchase.billingid=billing.billingid WHERE purchase.billingid='$_GET[insid]'";
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
			<td>$rs[qty]</td>
			<td  align='right'>₹ " .  $totamt. "</td>
		
		</tr>";
		
		$subtotal1 = $subtotal1 + ($totamt );
	}
		?>
</table>
<table class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;background-color:white;">
<tr>
	<th colspan="2"><b>Sub total:</b> </th>
	<td align="right">₹ <?php 
	 $subtotal = $subtotal1; 
	echo number_format($subtotal,2);
	?></td>
</tr>
<tr>
	<th colspan="2">CGST : (<?php echo $rsbilling1['cgsttax']; ?>% )</th>
	<td align="right">₹ <?php  $cgst =  $subtotal * $rsbilling1['cgsttax']/100; 
	
	echo number_format($cgst,2);
	?></td>
</tr>
<tr>
	<th colspan="2">SGST : (<?php echo $rsbilling1['sgsttax']; ?>%)</th>
	<td align="right">₹ <?php  $sgst = $subtotal * $rsbilling1['sgsttax']/100; 
	
	echo number_format($sgst,2);
	?></td>
</tr>
<?php
		if($rsbilling1[6] == "Karnataka")
		{
			$igst=0;
		}
		else
		{
?>
<tr>
	<th colspan="2">IGST:(<?php echo $rsbilling1['igsttax']; ?>% )</th>
	<td align="right"> ₹ <?php  $igst =  $subtotal * $rsbilling1['igsttax']/100; 
		echo number_format($igst,2);
	?></td>
</tr>
<?php
		}
?>
<tr>
	<th colspan="2"><b>Grand Total:</b> </th>
	<td align="right">₹ <?php echo $total  =  $subtotal + $cgst + $sgst + $igst; ?></td>
</tr>

 </table>
 </div>
 <table    class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
<tr>
	<th colspan="3"><center><input type='button' name="btnPrint" id="btnPrint" value="Print" style='width:25%;' class='form-control'></center></th>
</tr>
</table>

<?php
if(isset($_SESSION['employeeid']))
{
?>
<hr>
 <table    class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
<tr>
	<th>
	Update Delivery status:
	</th>
	<th>
	<?php echo $rsbilling1['deliverystatus']; ?>
	</th>
	<th>
	<a href='bill.php?st=Under process&billno=<?php echo $_GET['billno']; ?>'>Under process</a> | 
	<a href='bill.php?st=Under transit&billno=<?php echo $_GET['billno']; ?>'>Under transit</a> | 
	<a href='bill.php?st=Delivered&billno=<?php echo $_GET['billno']; ?>'>Delivered</a>
	</th>
</tr>
</table>		
<?php
}
else
{
?>
<table    class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
<tr>
	<th>
	Delivery status:
	</th>
	<th>
	<?php echo $rsbilling1['deliverystatus']; ?>
	</th>
</tr>
</table>
<?php
}
?>
	</form>
	<br>
</div>
</div>
<!--//contact-->

<?php
include("footer.php");
?>
<script type="text/javascript">
$(function () {
    $("#btnPrint").click(function () {
        var contents = $("#printarea").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title>DIV Contents</title>');
        frameDoc.document.write('</head><body>');
        //Append the external CSS file.
        frameDoc.document.write('<link href="style.css" rel="stylesheet" type="text/css" />');
        //Append the DIV contents.
        frameDoc.document.write(contents);
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
    });
});
</script>