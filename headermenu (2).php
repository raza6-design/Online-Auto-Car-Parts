<div class="menu-wrap">
    <nav class="menu">
        <ul class="clearfix">

<?php
if(isset($_SESSION[advertiserid]))
{
?>	
	<!--<li class="current-item"><a href="#">Account</a></li>-->
	
	<li><a href="advertiseraccount.php">Account</a></li>
	
  <li><a href="#">Profile <span class="arrow">&#9660;</span></a>
	<ul class="sub-menu">
	  <li><a href="advertiserprofile.php">Update Profile</a></li>
	  <li><a href="advertiserchangepassword.php">Change Password</a></li>
	</ul>
  </li>
  
  <li><a href="#">Advertisement <span class="arrow">&#9660;</span></a>
	<ul class="sub-menu">
	  <li><a href="#">Post Advertisement</a></li>
	  <li><a href="#">View Advertisement</a></li>
	</ul>
  </li>
  
	  <li><a href="#">Stage Program <span class="arrow">&#9660;</span></a>
        <ul class="sub-menu">
          <li><a href="#">Sponser Stage program</a></li>
          <li><a href="#">View Sponsered Detail</a></li>
        </ul>
      </li>
	  
	  <li><a href="#">Transaction<span class="arrow">&#9660;</span></a>
        <ul class="sub-menu">
          <li><a href="#">View payments</a></li>
        </ul>
      </li>
	  
	  <li><a href="#">News And Article <span class="caret"></span></a>
        <ul class="sub-menu">
          <li><a href="#">News</a></li>
          <li><a href="#">Article</a></li>
        </ul>
      </li>
	  
	  
	<li ><a href="logout.php">Logout</a></li>

<?php
}
else if(isset($_SESSION[advertiserid]))
{
?> 
	  <li><a href="#">DashBoard<span class="arrow">&#9660;</span></a>
        <ul class="sub-menu">
          <li><a href="#">News Broadcast Link</a></li>
        </ul>
      </li>
	  
	  <li><a href="#">Advertisement<span class="arrow">&#9660;</span></a>
        <ul class="sub-menu">
        <li><a href="#">View Advertisement</a></li>
        </ul>
      </li>
	  
	  <li><a href="#">Stage Program<span class="arrow">&#9660;</span></a>
        <ul class="sub-menu">
          <li><a href="#">Add Stage Program</a></li>
          <li><a href="#">View Stage Program</a></li>
		  <li><a href="#">View Sponsers</a></li>
        </ul>
      </li>
	  
	  <li><a href="#">News And Article<span class="arrow">&#9660;</span></a>
        <ul class="sub-menu">
          <li><a href="#">Publish News</a></li>
          <li><a href="#">View News</a></li>
        </ul>
      </li>
	  <li><a href="#">Settings<span class="arrow">&#9660;</span></a>
        <ul class="sub-menu">
          <li><a href="#">Add Tv Program</a></li>
          <li><a href="#">View Program</a></li>
		  <li><a href="#">Tax Settings</a></li>
        </ul>
      </li>
	  <li><a href="#">Transaction<span class="arrow">&#9660;</span></a>
        <ul class="sub-menu">
          <li><a href="#">Income</a></li>
          <li><a href="#">Expense</a></li>
		  <li><a href="#">Profit Loss Report</a></li>
        </ul>
      </li>

	<li ><a href="logout.php">Logout</a></li>

<?php
}
else
{
?>
	<li><a href="login.php">Advertiser Login</a></li>
	<li><a href="advertiserregistration.php">Register as Advertiser</a></li>
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
<?php
/*				
				<!-- Nav -->					
<nav id="nav" class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
	  
	  <li class="active"><a href="index.php">Account</a></li>
	  

	  <li><a href="#">Advertisement <span class="caret"></span></a>
        <ul class="sub-menu">
          <li><a href="#">Post Advertisement</a></li>
          <li><a href="#">View Advertisement</a></li>
        </ul>
      </li>
	  <li><a href="#">Stage Program <span class="caret"></span></a>
        <ul class="sub-menu">
          <li><a href="#">Sponser Stage program</a></li>
          <li><a href="#">View Sponsered Detail</a></li>
        </ul>
      </li>
	  <li><a href="#">Transaction<span class="caret"></span></a>
        <ul class="sub-menu">
          <li><a href="#">View payments</a></li>
        </ul>
      </li>
	  <li><a href="#">News And Article <span class="caret"></span></a>
        <ul class="sub-menu">
          <li><a href="#">News</a></li>
          <li><a href="#">Article</a></li>
        </ul>
      </li>
	  <li><a href="#">DashBoard<span class="caret"></span></a>
        <ul class="sub-menu">
          <li><a href="#">News Broadcast Link</a></li>
        </ul>
      </li>
	  
	  <li><a href="#">Advertisement<span class="caret"></span></a>
        <ul class="sub-menu">
        <li><a href="#">View Advertisement</a></li>
        </ul>
      </li>
	  <li><a href="#">Stage Program<span class="caret"></span></a>
        <ul class="sub-menu">
          <li><a href="#">Add Stage Program</a></li>
          <li><a href="#">View Stage Program</a></li>
		  <li><a href="#">View Sponsers</a></li>
        </ul>
      </li>
	  <li><a href="#">News And Article<span class="caret"></span></a>
        <ul class="sub-menu">
          <li><a href="#">Publish News</a></li>
          <li><a href="#">View News</a></li>
        </ul>
      </li>
	  <li><a href="#">Settings<span class="caret"></span></a>
        <ul class="sub-menu">
          <li><a href="#">Add Tv Program</a></li>
          <li><a href="#">View Program</a></li>
		  <li><a href="#">Tax Settings</a></li>
        </ul>
      </li>
	  <li><a href="#">Transaction<span class="caret"></span></a>
        <ul class="sub-menu">
          <li><a href="#">Income</a></li>
          <li><a href="#">Expense</a></li>
		  <li><a href="#">Profit Loss Report</a></li>
        </ul>
      </li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
*/
?>