<form method="post" action="" name="frmlogin" onsubmit="return submitlogin()" >
	<div class="form-group">
	Email ID : <span id="idemail1" style="color:red"></span> 
	<input class="form-control" style="color:black; border-color: black;width: 350px;" name="email" type="text" id="email"/>
	</div>
	<div class="form-group">
	Password : <span id="idpassword1" style="color:red"></span> 
	<input name="password" class="form-control" style="border-color: black;width: 350px;color:black;" type="password" id="password"/>
	</div>
	<div class="form-group">
	<center><input value="Login" type="submit" name='btnlogin' style="border-color: black;width: 200px;" class="form-control"/></center>
	</div>
	<hr>
	<a href="#open-modal">Click here to Register</a>
</form>

<script>
function submitlogin()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	if(!document.frmlogin.email.value.match(emailpattern))
	{
		document.getElementById("idemail1").innerHTML = "Kindly enter valid Email ID..";
		i=0;
	}
	if(document.frmlogin.email.value=="")
	{
		document.getElementById("idemail1").innerHTML = "Email id should not be empty..";
		i=0;
	}

	if(document.frmlogin.password.value=="")
	{
		document.getElementById("idpassword1").innerHTML = "Email id should not be empty..";
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