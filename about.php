<?php
include("header.php");
?>
	<!-- about -->

<div class="about" id="about">
	<div class="container">
		<div class="w3-about-grid-top">
			<div class="w3-agileits-about-grids">
					<div class="col-md-3 agile-about-left">
						<div class="w3-about-border">
						<h3>About us</h3>
						
						</div>
					
					</div>
					<div class="col-md-9 agile-about-right">
							<div class="w3l-banner-grids">
								<div class="slider">
									<div class="callbacks_container">
										<ul class="rslides" id="slider4">
										<li>
											<div class="w3ls-text">
												<h3>ONLINE AUTOPARTS STORE </h3>
												<p>Pakistan no.1 Store for Car Accessories,car care and Modification Parts.Offer a comprehensive selection of car spare parts in Pakiistan to ensure your vehicle's safety on the road.<span>Shop conveniently with Nationwide Fast Shipping and 7 days Return Policy.</span></p>
												
											</div>
										</li>
										<li>
										<div class="w3ls-text">
											<h3>OUR STORE</h3>
											<p> In the business for years, this enterprise is one of the prominent points-of-sale in the city for buying Car Spare Parts.<span> It features a product range that is sync with the accepted trends and styles in interior décor and design.</span></p>
										</div>
										</li>
										<li>
										<div class="w3ls-text">
											<h3>Services offered by ONLINE AUTOPARTS STORE </h3>
											<p>We have a range of products, car interior and exterior accessories, all latest gadgets, car care online products,plus with quality. we also provide most reasonable rates country wise<span>Visit our online store now for the best online shopping experience and quality products.</span></p>
	
										</div>
										</li>
										
									</ul>
								</div>
								<script src="js/responsiveslides.min.js"></script>
								<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider4").responsiveSlides({
									auto: true,
									pager:true,
									nav:false,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>
							<!--banner Slider starts Here-->
								</div>
							</div>

					</div>
					<div class="clearfix"> </div>
			</div>
		</div>
	</div>
 </div>
	<!-- //about -->
<!-- services -->
 <div class="services" id="services">
		<div class="container">
			<div class="ser-top wthree-3 wow fadeInDown w3-service-head">
				<h3>Our Services </h3>
			</div>
			<div class="w3-service-grids set-6">
				<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon1 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-home hi-icon hi-icon-home" aria-hidden="true"></span>
					<h4>Fast Shipping</h4>
					<p>Fast home delivery service within 1 day</p>
				</div>
				<div class="col-md-4  services-w3-grid1 ser-left wow fadeInDown icon2 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-sort-by-attributes hi-icon hi-icon-sort-by-attributes" aria-hidden="true"></span>
					<h4>Free Returns</h4>
					<p>within 2 days after delivery</p>
				</div>
				<div class="col-md-4 services-w3-grid2 ser-left wow fadeInDown icon4 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-send hi-icon hi-icon-send" aria-hidden="true"></span>
					<h4>Customer Support</h4>
					<p>7 days a week.</p>
				</div>
				<div class="col-md-4 services-w3-grid1 ser-left wow fadeInDown icon3 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-object-align-vertical hi-icon hi-icon-object-align-vertical" aria-hidden="true"></span>
					<h4>Secure Payments</h4>
					<p>Multiple payments option.</p>
				</div>
				<div class="col-md-4 services-w3-grid2 ser-left wow fadeInDown icon5 hi-icon-wrap hi-icon-effect-6">
					<span class="glyphicon glyphicon-briefcase hi-icon hi-icon-briefcase" aria-hidden="true"></span>
					<h4>Discounted rates</h4>
					<p>Discounted rates of products are available.</p>
				</div>
				<div class="col-md-4 services-w3-grid2 ser-left wow fadeInDown icon6 hi-icon-wrap hi-icon-effect-6"  data-wow-duration=".8s" data-wow-delay=".2s">
					<span class="glyphicon glyphicon-time hi-icon hi-icon-time" aria-hidden="true"></span>
					<h4>100% Free Delivery</h4>
					<p>We also provide free delivery for every one of our customer orders and always put the comfort of the consumer first.</p>
				</div>
				<div class="clearfix"></div>
			</div>	
		</div>
	</div>
<!-- /services -->

<?php
include("footer.php");
?>
