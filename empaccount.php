<?php
include("header.php");
?>

<!-- services -->
 <div class="services" id="services">
		<div class="container">
			<div class="ser-top wthree-3 wow fadeInDown w3-service-head">
				<h3>Employee Account</h3>
			</div>
			<div class="w3-service-grids set-6">
			
			
			
				<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-calendar hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Number of billing records </h4>
					<p>
					<?php
					$sql = "SELECT * FROM billing";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</p>
				</div>
								<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-user hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Number of customer records  </h4>
					<p>
					<?php
					$sql = "SELECT * FROM cutomer";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</p>
				</div>
				
								<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-lock hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Number of employee  records  </h4>
					<p>
					<?php
					$sql = "SELECT * FROM employee";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</p>
				</div>
								<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-bed hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Number of Car Parts records  </h4>
					<p>
					<?php
					$sql = "SELECT * FROM product";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</p>
				</div>
					<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="	glyphicon glyphicon-picture hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Number of Car Parts Images records  </h4>
					<p>
					<?php
					$sql = "SELECT * FROM productimages";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</p>
				</div>
					<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-folder-open hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Number of Car Parts type records  </h4>
					<p>
					<?php
					$sql = "SELECT * FROM producttype";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</p>
				</div>
					<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-comment hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Number of Message records  </h4>
					<p>
					<?php
					$sql = "SELECT * FROM message";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</p>
				</div>
					<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-fire hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Number of Offer records  </h4>
					<p>
					<?php
					$sql = "SELECT * FROM offer";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</p>
				</div>
					<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-shopping-cart hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Number of Purchase records  </h4>
					<p>
					<?php
					$sql = "SELECT * FROM purchase";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</p>
				</div>
					<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-book hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Number of Supplier records  </h4>
					<p>
					<?php
					$sql = "SELECT * FROM supplier";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</p>
				</div>
					<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-briefcase hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Number of Tax records  </h4>
					<p>
					<?php
					$sql = "SELECT * FROM tax";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</p>
				</div>
				
				<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-comment hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Number of feedback messages  </h4>
					<p>
					<?php
					$sql = "SELECT * FROM feedback";
					$qsql = mysqli_query($con,$sql);
					echo mysqli_num_rows($qsql);
					?>
					</p>
				</div>
				
				
				
				<div class="clearfix"></div>
			</div>	
		</div>
	</div>
<!-- /services -->


<?php
include("footer.php");
?>