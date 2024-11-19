<form method="post" action="" name="frmregister" onsubmit="return submitregistration()" >
	<div class="form-group">
	Customer Name : <span id="idname" style="color:red"></span>
		<input class="form-control" style="color:black; border-color: black;width: 350px;" name="name" type="text" id="name"/>	
	</div>
	<div class="form-group">
		Email ID :  <span id="idemail" style="color:red"></span>
		<input class="form-control" style="color:black; border-color: black;width: 350px;" name="email" type="text" id="email"/>
	</div>
	<div class="form-group">
	Password : <span id="idpassword" style="color:red"></span>
	<input name="password" class="form-control" style="border-color: black;width: 350px;color: black;" type="password" id="password"/>
	</div>
	<div class="form-group">
	Confirm Password : <span id="idcpassword" style="color:red"></span>
	<input name="cpassword" class="form-control" style="border-color: black;width: 350px;color: black;" type="password" id="cpassword"/>
	</div>
	<div class="form-group"> 
		Mobile No. : <span id="idcontactno" style="color:red"></span>
		<input name="contactno" class="form-control" style="border-color: black;color:black;width: 350px;" type="text" id="contactno"/>
	</div>
	<div class="form-group">
	<center><input value="Register" type="submit" name='btnreg' style="border-color: coral;width: 200px;" class="form-control"/></center>
	</div>
</form>
<script>
function submitregistration()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	if(!document.frmregister.name.value.match(alphaspaceExp))
	{
		document.getElementById("idname").innerHTML = "Name should contain only alphabets..";
		i=0;
	}
	if(document.frmregister.name.value=="")
	{
		document.getElementById("idname").innerHTML = "Name should not be empty..";
		i=0;
	}
	
	if(!document.frmregister.email.value.match(emailpattern))
	{
		document.getElementById("idemail").innerHTML = "Kindly enter valid Email ID..";
		i=0;
	}
	if(document.frmregister.email.value=="")
	{
		document.getElementById("idemail").innerHTML = "Email should not be empty..";
		i=0;
	}
	if(document.frmregister.password.value.length < 2)
	{
		document.getElementById("idpassword").innerHTML = "Password should contain more than 2 characters...";
		i=0;
	}
	if(document.frmregister.password.value=="")
	{
		document.getElementById("idpassword").innerHTML = "Password should not be empty..";
		i=0;
	}
	if(document.frmregister.password.value != document.frmregister.cpassword.value)
	{
		document.getElementById("idcpassword").innerHTML = "Password and confirm password not matching...";
		i=0;		
	}
	if(document.frmregister.cpassword.value=="")
	{
		document.getElementById("idcpassword").innerHTML = "Confirm password should not be empty..";
		i=0;
	}
	if(document.frmregister.contactno.value.length != 10)
	{
		document.getElementById("idcontactno").innerHTML = "Kindly enter 10 digit Mobile number...";
		i=0;
	}
	if(!document.frmregister.contactno.value.match(numericExpression))
	{
		document.getElementById("idcontactno").innerHTML = "Mobile number is not valid..";
		i=0;
	}
	if(document.frmregister.contactno.value=="")
	{
		document.getElementById("idcontactno").innerHTML = "Contact number should not be empty..";
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