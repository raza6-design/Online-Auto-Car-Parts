<div class="collapse navbar-collapse" style="opacity:11px;">						
	<ul class="nav navbar-nav">			
		<li class="active"><a href="index.php">Home</a></li>
		<li><a href="about.php">About</a></li>		
		<li>											
				<a href="products.php" data-toggle="dropdown" class="dropdown-toggle">Products<b class="caret"></b></a>
						<ul class="dropdown-menu">
						<?php
							$sqlproducttype ="SELECT * FROM producttype WHERE status='Active'";
							$qsqlproducttype = mysqli_query($con,$sqlproducttype);
							while($rsproducttype = mysqli_fetch_array($qsqlproducttype))
							{
							echo "<li><a href='products.php?productstypeid=$rsproducttype[productstypeid]'>$rsproducttype[producttype]</a></li>";
							}
						?>
						</ul>
		</li>
		<li><a href="contact.php" >Contact</a></li>		
	</ul>
</div>


<div id="open-modal" class="modal-window">
  <div>
    <a href="#modal-close" title="Close" class="modal-close">Close</a>
    <h1>Registration Panel</h1>
    <div>
		<?php  include("reg.php"); ?>
	</div>
  </div>
</div>


<div id="open-modal1" class="modal-window">
  <div>
    <a href="#modal-close" title="Close" class="modal-close">Close</a>
    <h1>Customer Login Panel</h1>
    <div>
		<?php  include("login.php"); ?>
	</div>
  </div>
</div>

<div id="open-modal3" class="modal-window">
  <div>
    <a href="#modal-close" title="Close" class="modal-close">Close</a>
    <h1>Employee Login Panel</h1>
    <div>
		<?php  include("emplogin.php"); ?>
	</div>
  </div>
</div>
</div>

<div id="open-modal4" class="modal-window">
  <div>
    <a href="#modal-close" title="Close" class="modal-close">Close</a>
    <h1>Supplier Login Panel</h1>
    <div>
		<?php  include("suplogin.php"); ?>
	</div>
  </div>
</div>


<style>

.container {
  display: table;
  width: 100%;
  height: 100%;
}

.interior {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
}

.btn {
  background-color: #fff;
  padding: 1em 3em;
  border-radius: 3px;
  text-decoration: none;
}

.modal-window {
  position: fixed;
  background-color: rgba(255, 255, 255, 0.15);
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 999;
  opacity: 0;
  pointer-events: none;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}

.modal-window:target {
  opacity: 1;
  pointer-events: auto;
}

.modal-window>div {
  width: 400px;
  position: relative;
  margin: 10% auto;
  padding: 2rem;
  background: #fff;
  color: #444;
}

.modal-window header {
  font-weight: bold;
}

.modal-close {
  color: #aaa;
  line-height: 50px;
  font-size: 80%;
  position: absolute;
  right: 0;
  text-align: center;
  top: 0;
  width: 70px;
  text-decoration: none;
}

.modal-close:hover {
  color: #000;
}

.modal-window h1 {
  font-size: 150%;
  margin: 0 0 15px;
}
</style>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>