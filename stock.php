<?php
include("header.php");
if(isset($_POST['submit']))
{
		$sql="UPDATE stock SET billno='$_POST[billno]',stkdate='$_POST[purchasedate]',status='Active' WHERE status='Pending'";
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) >= 1)
		{
			echo"<script>alert('Stock record updated successfully');</script>";
		}
}
?>
<!--/STOCK FORM-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile w3-label" style="width:75%;">
	<form action="" method="post" name="frmstock" onsubmit="return submitstock()" class="form-agileits" style= "color:black">
<table    style="width: 100%;">
	<tr>	
		<th><label>Supplier </label><br><span id="supid1" style="color:red"></span>
		   <select class="form-data" name="supplierid" id="supplierid" onchange="window.location='stock.php?supplierid='+this.value" >
			<option value=''>Select</option>
			<?php
			$sqlsupplier = "SELECT * FROM  supplier where status='Active'";
			$qsqlsupplier = mysqli_query($con,$sqlsupplier);
			while($rssupplier = mysqli_fetch_array($qsqlsupplier))
			{
				if($rssupplier['supplierid'] == $_GET['supplierid'])
				{
					echo "<option value='$rssupplier[supplierid]' selected>$rssupplier[companyname]</option>";
				}
				else
				{
					echo "<option value='$rssupplier[supplierid]'>$rssupplier[companyname]</option>";
				}
			}
			?>
		   </select></th>	
		<th><label>Bill No</label><br> <span id="idbil" style="color:red"></span>
			<input type="text"  id="billno" name="billno" placeholder="Bill No" clas="form-control"  /></th>
		<th><label>Purchase date</label><br> <span id="idstockpurdate" style="color:red"></span>
			<input type="date"  id="purchasedate" name="purchasedate" placeholder="purchase date" style="height:40px;" max="<?php echo date("Y-m-d"); ?>" /></th>
	</tr>
</table>
			
			
			
		
<table    class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">

	<thead>
		<tr style="background-color:green;color:white;">
			<th><b>Product :</b></th>	
			<th><b>Amount:</b></th> 	
			<th><b>Quantity:</b></th> 	
			<th><b>Total Amount:</b></th> 
			<th><b>Add</b></th>
		</tr>

		<tr style="background-color:grey;">
			<td><span id="fur1id" style="color:black"></span>
				<select class="form-data" name="productid" id="productid" >
					<option value=''>Select</option>
					<?php
					$sqlproduct = "SELECT * FROM  product where status='Active' AND supplierid='$_GET[supplierid]'";
					$qsqlproduct = mysqli_query($con,$sqlproduct);
					while($rsproduct = mysqli_fetch_array($qsqlproduct))
					{
			echo "<option value='$rsproduct[productid]'>$rsproduct[title]</option>";
					}
					?>
			   </select>
			</td>
			<td><span id="idamo" style="color:black"></span><input type="text" id="cost" name="cost" placeholder="Cost" onkeyup="calculatepurchaseamt(cost.value,qty.value)" onchange="calculatepurchaseamt(cost.value,qty.value)" /></td>
			<td><span id="id1quantity" style="color:black"></span><input type="text" id="qty" name="qty" value='1' placeholder="Quantity"  onkeyup="calculatepurchaseamt(cost.value,qty.value)" onchange="calculatepurchaseamt(cost.value,qty.value)"/></td>
			
			<td><input type="text" id="purchaseamt" name="purchaseamt" placeholder="Purchase Amount" readonly />
			</td>	
			<td><input type='button' value='Add' onclick='insertrow(supplierid.value,billno.value,purchasedate.value,productid.value,cost.value,qty.value)'></td>
		</tr>
		</thead>
		<tbody id='divadd'>
		<?php
		$sql= "SELECT * FROM stock LEFT JOIN product ON stock.productid = product.productid WHERE stock.status='Pending'  ORDER BY stock.stockid DESC ";
		$qsql = mysqli_query($con,$sql);
		$totalamt = 0;
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "<tr style='background-color:rgba(0,0,0,0.5);color:white;'  align='right'><td>$rs[title]</td><td>Rs.$rs[6]</td><td>$rs[qty]</td><td>Rs." . $rs['cost'] * $rs['qty']  ."</td><td><input type='button' value='X' onclick='deleterow($rs[stockid])'  style='color:black;'></td></tr>";
			$totalamt = $totalamt + $rs['cost'] * $rs['qty'];
		}
		?>

	</tbody>

</table>
			<br>
			
			<center><input type='submit' name="submit" id="submit" value="Submit" style='width:25%;' class='form-control'></center>
			<br>
	</form>
</div>
</div>
<!--//contact-->

<?php
include("footer.php");
?>
<script>
function calculatepurchaseamt(cost,qty)
{
	document.getElementById("purchaseamt").value=cost*qty;
}
function insertrow(supplierid,billno,purchasedate,productid,cost,qty)
{
	    if (window.XMLHttpRequest) 
		{
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } 
		else 
		{
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() 
		{
            if (this.readyState == 4 && this.status == 200) {
				//alert(this.responseText);
                document.getElementById("divadd").innerHTML = this.responseText;
                document.getElementById("productid").value = "Select";
                document.getElementById("cost").value = "0";
                document.getElementById("qty").value = "1";
                document.getElementById("purchaseamt").value = "0";
            }
        };
        xmlhttp.open("GET","ajaxinsertstock.php?supplierid="+supplierid+"&billno="+billno+"&purchasedate=" + purchasedate + "&productid="+productid+"&cost="+cost+"&qty="+qty,true);
        xmlhttp.send();
}
function deleterow(stockid)
{
	if(confirm("Are you sure you want to delete this record?") == true)
	{

	    if (window.XMLHttpRequest) 
		{
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } 
		else 
		{
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() 
		{
            if (this.readyState == 4 && this.status == 200) {
				//alert(this.responseText);
                document.getElementById("divadd").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxinsertstock.php?delstockid="+stockid,true);
        xmlhttp.send();
		
	}
}

</script>