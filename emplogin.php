<form method="post" action="" name="frmemplogin" onsubmit="return submitemplogin()" >
<div class="form-group">
Login ID : <span id="idadminloginid" style="color:red"></span>
<input class="form-control" style="color:black; border-color: coral;width: 350px;" name="adminloginid" type="text" id="idadminloginid"/>
</div>
<div class="form-group">
Password : <span id="idadminpassword" style="color:red"></span>
 <input name="adminpassword" class="form-control" style="border-color: coral;width: 350px;color:black;" type="password" id="adminpassword"/>
</div>
<div class="form-group">
<center><input value="Login" type="submit" name='btnemplogin' style="border-color: coral;width: 200px;" class="form-control"/></center>
</div>
</form>
<script>
function submitemplogin()
{
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	$("span").html("");
	var i=1;
	if(!document.frmemplogin.adminloginid.value.match(emailExp))
	{
		document.getElementById("idadminloginid").innerHTML = "Kindly enter a valid Admin Login ID..";
		i=0;
	}
	if(document.frmemplogin.adminloginid.value=="")
	{
		document.getElementById("idadminloginid").innerHTML = "Please Enter the Login ID ..";
		i=0;
	}
	if(document.frmemplogin.adminpassword.value.length < 6)
	{
		document.getElementById("idadminpassword").innerHTML = "Password should contain more than 6 characters...";
		i=0;
	}
	if(document.frmemplogin.adminpassword.value=="")
	{
		document.getElementById("idadminpassword").innerHTML = "Kindly enter the password..";
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