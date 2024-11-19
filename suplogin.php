<form method="post" action="" name="frmsuplogin" onsubmit="return submitsuplogin()" >
	<div class="form-group">
	Login ID : <span id="idlo1" style="color:red"></span>
	<input class="form-control" style="color:black; border-color: black;width: 350px;" name="loginid" type="text" id="loginid"/>
	</div>
	<div class="form-group">
	Password : <span id="idpa1" style="color:red"></span>
	<input name="password" class="form-control" style="border-color: black;width: 350px;color:black;" type="password" id="password"/>
	</div>
	<div class="form-group">
	<center><input value="Login" type="submit" name='btnsuplogin' style="border-color: coral;width: 200px;" class="form-control"/></center>
	</div>
</form>

<script>
function submitsuplogin()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	      
	$("span").html("");
	
	var i=1;
	
	if(!document.frmsuplogin.loginid.value.match(emailpattern))
	{
		document.getElementById("idlo1").innerHTML = "Kindly enter valid ID..";
		i=0;
	}
	if(document.frmsuplogin.loginid.value=="")
	{
		document.getElementById("idlo1").innerHTML = "Please fill this field..";
		i=0;
	}

	if(document.frmsuplogin.password.value=="")
	{
		document.getElementById("idpa1").innerHTML = "Password should not be empty..";
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