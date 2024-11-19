<!-- footer section -->
<!-- Footer -->
	<div class="footer">
		<div class="container"> 
			<div class="footer-info">
				<div class="col-md-4 col-sm-4 footer-info-grid address">
					<h4>ADDRESS</h4>
					<address>
						<ul>
							<li>Auto Car-Parts Store</li>
							<li>Pakistan</li>
							<li>Telephone :0304 0999904</li>
							<li>Email : <a class="mail" href="mailto:creativeworld9179@gmail.com">creativeworld9179@gmail.com</a></li>
						</ul>
					</address>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-4 col-sm-4 footer-info-grid links">
					<h4>Supplier login</h4>
					<div class="connect-social">  
					<input type="button" name="submit" id="submit" value="Login" class="form-control" style=" width:200px;"  onclick="window.location='#open-modal4'">
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-4 col-sm-4 footer-info-grid email">
					<h4>Supplier registration</h4>
					<div class="connect-social">  
					<input type="button" name="submit" id="submit" value="Register" class="form-control" style="width:200px;" onclick="window.location='supplierregistration.php'">
					</div>
				</div>
				<div class="clearfix"></div>
			</div> 
			<div class="copyright">
				<p>&copy; <?php echo date('Y'); ?> Auto Car Parts. All Rights Reserved | 
				<?php
if(isset($_SESSION['employeeid']))
{
?>
<a href="empaccount.php" >My account</a>
<?php
}
else
{
?>
<a  href="#open-modal3">Employee Login Panel</a>
<?php
}
?>
				</p>
			</div> 
		</div>
	</div>
	<!-- //Footer --> 

<script src="js/lightGallery.js"></script>
	<script>
    	 $(document).ready(function() {
			$("#lightGallery").lightGallery({
				mode:"fade",
				speed:800,
				caption:true,
				desc:true,
				mobileSrc:true
			});
		});
    </script>
<!-- footer section -->
 <script type="text/javascript" src="js/jquery.zoomslider.min.js"></script>
		
					
				  <!-- start-smoth-scrolling -->
				<script type="text/javascript" src="js/move-top.js"></script>
				<script type="text/javascript" src="js/easing.js"></script>
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
				</script>
		<!-- start-smoth-scrolling -->
		<!-- smooth scrolling-bottom-to-top -->
				<script type="text/javascript">
					$(document).ready(function() {
					/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear' 
						};
					*/								
					$().UItoTop({ easingType: 'easeOutQuart' });
					});
				</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
				<script src="js/SmoothScroll.min.js"></script>

		<!-- //smooth scrolling-bottom-to-top -->
	<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>
