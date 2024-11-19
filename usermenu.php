<div class="menu-wrap">
    <nav class="menu">
        <ul class="clearfix">

<?php
if(isset($_SESSION['supplierid']))
{
?>
				<li><a href="supplieraccount.php" >Supplier Account</a></li>
				
				<li>											
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Profile <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="supprofile.php">My Profile</a></li>
							<li><a href="supchangepassword.php">Change Password</a></li>
						</ul>
				</li>
				
				<li><a href="#" data-toggle="dropdown" class="dropdown-toggle">Products <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="product.php">Add Products</a></li>
							<li><a href="viewpro.php">View Products</a></li>
						</ul>
				</li>
				
				<li><a href="#" data-toggle="dropdown" class="dropdown-toggle">Customized Order <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="viewcustomized.php">View Customer Requirements</a></li>
						</ul>
				</li>
				<li><a href="offer.php">Add Offer</a></li>
				<li><a href="logout.php">Logout</a></li>

<?php
}
else if(isset($_SESSION['customer_id']))
{
?>	
	<li class="current-item"><a href="#">Account</a></li>
                <li>											
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Customized Order <b class="caret"></b></a>
						<ul class="dropdown-menu">
					    	<li><a href="customized.php">Add Customized Order</a></li>
							<li><a href="viewcustomized.php">View Customized Order</a></li>
							<li><a href="viewcustomizedconfirmed.php">Confirmed Order</a></li>
						</ul>
				</li>
				<li>											
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Profile <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="customerprofile.php">My Profile</a></li>
							<li><a href="changepassword.php">Change Password</a></li>
						</ul>
				</li>
<li>											
	<a href="#" data-toggle="dropdown" class="dropdown-toggle">Orders <b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li><a href="viewbill.php?st=Pending">Pending Orders</a></li>
			<li><a href="viewbill.php?st=Delivered">Delivered Orders</a></li>
		</ul>
</li>
				
				<li><a href="logout.php">Logout</a></li>
				
				<li style="float:right;" ><a href="productpurchase.php" style="background-color:red;color: yellow;">View Cart (
				<?php
				$sql  = "SELECT * FROM purchase LEFT JOIN product ON purchase.productid=product.productid LEFT JOIN billing ON purchase.billingid=billing.billingid WHERE purchase.status='Pending'";
				$qsql = mysqli_query($con,$sql);
				echo mysqli_num_rows($qsql);
				?>
				)</a></li>

<?php
}
else if(isset($_SESSION['employeeid']))
{
?> 
				<li><a href="empaccount.php" >Account</a></li>
				<li>											
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Profile <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="empprofile.php">My Profile</a></li>
							<li><a href="empchangepassword.php">Change Password</a></li>
							<li><a href="employee.php">Add Employee</a></li>
							<li><a href="viewemp.php">View Employee</a></li>
						</ul>
				</li>
				<li>											
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Seller <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="supplier.php">Add seller</a></li>
							<li><a href="viewsupplier.php">View seller</a></li>
						</ul>
				</li>
				<li>											
					<a href="#" data-toggle="dropdown" class="dropdown-toggle"> Products<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="product.php">Add Products</a></li>
							<li><a href="viewpro.php">View Products</a></li>
							<li><a href="stock.php">Add Stock</a></li>
							<li><a href="viewstock.php">View Stock</a></li>
						</ul>
				</li>
				<li>											
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b></a>
						<ul class="dropdown-menu">

							<li><a href="tax.php">Add Tax type</a></li>
							<li><a href="viewtax.php">View Tax type</a></li>
						</ul>
				</li>
				<li>											
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Offer <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="offer.php">Add Offer</a></li>
							<li><a href="viewoffer.php">View Offers</a></li>
						</ul>
				</li>
				<li>											
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Report <b class="caret"></b></a>
		<ul class="dropdown-menu">
				<li><a href="viewbill.php?st=Pending">Pending Orders</a></li>
				<li><a href="viewbill.php?st=Delivered">Delivered Orders</a></li>
				<li><a href="viewcustomer.php">Customer Report</a></li>
				<li><a href="viewpurchase.php">Purchase Report</a></li>
				<li><a href="viewfeedback.php">Feedbacks </a></li>
		</ul>
				</li>
				<li><a href="logout.php" >Logout</a></li>
<?php
}
else
{
?>
	<li><a href="#open-modal1" class="btn btn-info">Login Here</a></li>
	<li><a href="#open-modal" class="btn btn-info">Click here to Register</a></li>
<?php
}
?>
        </ul>
    </nav>
</div>
<style>

.clearfix:after {
    display:block;
    clear:both;
}
 
/*----- Menu Outline -----*/
.menu-wrap {
    width:100%;
    box-shadow:0px 1px 3px rgba(0,0,0,0.2);
    background:#ffffff;
}
 
.menu {
    margin:0px auto;
}
 
.menu li {
    margin:0px;
    list-style:none;
    font-family:'Ek Mukta';
}
 
.menu a {
    transition:all linear 0.15s;
    color:#919191;
}
 
.menu li:hover > a, .menu .current-item > a {
    text-decoration:none;
    color:#be5b70;
}
 
.menu .arrow {
    font-size:11px;
    line-height:0%;
}
 
/*----- Top Level -----*/
.menu > ul > li {
    float:left;
    display:inline-block;
    position:relative;
    font-size:19px;
}
 
.menu > ul > li > a {
    padding:10px 40px;
    display:inline-block;
    text-shadow:0px 1px 0px rgba(0,0,0,0.4);
}
 
.menu > ul > li:hover > a, .menu > ul > .current-item > a {
    background:#dcd9d9;
}
 
/*----- Bottom Level -----*/
.menu li:hover .sub-menu {
    z-index:1;
    opacity:1;
}
 
.sub-menu {
    width:160%;
    padding:5px 0px;
    position:absolute;
    top:100%;
    left:0px;
    z-index:-1;
    opacity:0;
    transition:opacity linear 0.15s;
    box-shadow:0px 2px 3px rgba(0,0,0,0.2);
    background:#2e2728;
}
 
.sub-menu li {
    display:block;
    font-size:16px;
}
 
.sub-menu li a {
    padding:10px 30px;
    display:block;
}
 
.sub-menu li a:hover, .sub-menu .current-item a {
    background:#3e3436;
}
</style>