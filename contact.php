<?php
include("header.php");
?>
 
<!--/contact-->
<div class="w3-contact" id="contact">
<div class="content-w3ls agileits w3 wthree w3-agile w3-agileits agileinfo agile">
	<form action="#" method="post" name="frmcontact" onsubmit="return submitcontact1()" class="form-agileits">
		<h3 class="w3-contact-form-head">Contact Us</h3>
		<span id="idusercontact" style="color:red"></span>
		<input type="text" id="username" name="username" placeholder="USERNAME">
		<span id="idemailcontact" style="color:red"></span>
		<input type="text" id="email" name="email" placeholder="MAIL@EXAMPLE.COM">
		<span id="idphonecontact" style="color:red"></span>
		<input type="text" id="phone" name="phone" placeholder="TELEPHONE">
		<span id="idsubjectcontact" style="color:red"></span>
		<input type="text" id="subject" name="subject" placeholder="SUBJECT" >
		<span id="idmessagecontact" style="color:red"></span>		
		<textarea id="message" name="message" placeholder="YOUR MESSAGE"></textarea>
		<input type="submit" class="sign-in" value="Submit">
	</form>
</div>
</div>
<!--//contact-->
<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387142.84010033106!2d-74.25819252532891!3d40.70583163828471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1475140387172" style="border:0"></iframe>

		<div class="agile_map_grid">
			<div class="agile_map_grid1">
				<h3>Auto Car Parts</h3>
				<ul>
					<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><span>address :</span> Auto Car Parts Store</li>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><span>email :</span> <a href="mailto:creativeworld9179@gmail.com">creativeworld9179@gmail.com</a></li>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><span>call to us :</span> 0304 0999904</li>
				</ul>
			</div>
		</div>
	</div>


<?php
include("footer.php");
?>
<script>
function submitcontact1()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = ; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	if(!document.frmcontact.username.value.match(alphaspaceExp))
	{
		document.getElementById("idusercontact").innerHTML = " This field should contain only Alphabet..";
		i=0;
	}
	if(document.frmcontact.username.value=="")
	{
		document.getElementById("idusercontact").innerHTML = "Please Enter the Name ...";
		i=0;
	}
	if(!document.frmcontact.email.value.match(emailpattern))
	{
		document.getElementById("idemailcontact").innerHTML = " This field should contain only Email-ID..";
		i=0;
	}
	if(document.frmcontact.email.value=="")
	{
		document.getElementById("idemailcontact").innerHTML = "Please enter your Email-ID ...";
		i=0;
	}
	if(document.frmcontact.phone.value.length != 10)
	{
		document.getElementById("idphonecontact").innerHTML = "Kindly enter 10 digit Mobile number...";
		i=0;
	}
	if(!document.frmcontact.phone.value.match(emailpattern))
	{
		document.getElementById("idphonecontact").innerHTML = " This field should contain only Mobile number..";
		i=0;
	}
	if(document.frmcontact.phone.value=="")
	{
		document.getElementById("idphonecontact").innerHTML = "Please enter your Mobile number ...";
		i=0;
	}
	if(!document.frmcontact.subject.value.match(alphaspaceExp))
	{
		document.getElementById("idsubjectcontact").innerHTML = " This field should contain only alphabets..";
		i=0;
	}
	if(document.frmcontact.subject.value=="")
	{
		document.getElementById("idsubjectcontact").innerHTML = "Please enter the subject ...";
		i=0;
	}
	
	if(document.frmcontact.message.value=="")
	{
		document.getElementById("idmessagecontact").innerHTML = "Please enter your Message ...";
		i=0;
	}
	if(i == 1)
	{
		return true;
	}
	if(i == 0)
	{
		return false;
	}
}
</script>