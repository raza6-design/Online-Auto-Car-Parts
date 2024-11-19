<?php
function calculatetotal($billingid)
{
	include("dbconnection.php");
			$sqlbilling  = "SELECT * FROM billing LEFT JOIN cutomer ON billing.customerid=cutomer.customer_id LEFT JOIN purchase ON purchase.billingid=billing.billingid LEFT JOIN product ON  product.productid=purchase.productid WHERE billing.billingid='$billingid'";
			$sqlbilling  = "SELECT * FROM billing LEFT JOIN cutomer ON billing.customerid=cutomer.customer_id LEFT JOIN purchase ON purchase.billingid=billing.billingid LEFT JOIN product ON  product.productid=purchase.productid WHERE billing.billingid='$billingid'";
		$qsqlbilling = mysqli_query($con,$sqlbilling);
		$rsbilling = mysqli_fetch_array($qsqlbilling);
	?>
	<!--/bill form s-->

		<?php
		$subtotal1=0;
		$sql  = "SELECT * FROM purchase LEFT JOIN product ON purchase.productid=product.productid LEFT JOIN billing ON purchase.billingid=billing.billingid WHERE purchase.billingid='$billingid'";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			
		$sqloffer= "SELECT * FROM offer WHERE  productid='$rs[productid]'";
		$qsqloffer  = mysqli_query($con,$sqloffer);
		$rsoffer = mysqli_fetch_array($qsqloffer);
		$offeramt = $rsoffer["discountamt"];
		
	if(mysqli_num_rows($qsqloffer) ==0)
	{						
		//echo "Rs".$productamt;
		$totamt = $rs['cost'];
	}
	else
	{
		//$productwithoffamt = $productamt - ($productamt * $offeramt/100);
		//echo "Rs". $productwithoffamt  . " <strike>Rs$productamt</strike> ($offeramt% off)";
		$totamt = $rs['cost'] - ($rs['cost']  * $offeramt/100);
	}	

			$total = $rs['qty'] * $rs['cost'];
			$taxamt1 =  $total *$tottaxamt/100;
			$subtotal = $taxamt1 + $total;
			
			$taxtax = $taxamt['CGST']."% CGST  + ";
			$taxtax = $taxtax. $taxamt['SGST']."% SGST +";
			$taxtax = $taxtax. $taxamt['IGST']."% IGST ";
			
				
	if(mysqli_num_rows($qsqloffer) ==0)
	{						
		//echo "Rs".$productamt;
		//$totamt = $rs['cost'];
	}
	else
	{
		$productwithoffamt = $productamt - ($productamt * $offeramt/100);
	}	

			
			$subtotal1 = $subtotal1 + ($totamt * $rs['qty']);
		}
			?>
			<?php 
		 $subtotal = $subtotal1; 
		?><?php  $cgst =  $subtotal * $rsbilling['cgsttax']/100; 
		?>
		<?php  $sgst = $subtotal * $rsbilling['sgsttax']/100; 
		?>
	<?php
			if($rsbilling[6] == "Karnataka")
			{
				$igst=0;
			}
			else
			{
	?> <?php  $igst =  $subtotal * $rsbilling['igsttax']/100; 
	
		?>
	<?php
			}
	?>
<?php $total  =  $subtotal + $cgst + $sgst + $igst; ?>
<?php echo "Rs" .  $grandtotal =  $total - $discamt ; ?>
	<!--//contact-->
<?php
}
?>