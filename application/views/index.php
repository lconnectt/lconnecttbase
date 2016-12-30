<?php
    $androidappurl = "http://lconnect.net.in/apk/app-debug.apk";
    $appleappurl = "http://lconnect.net.in/ipa/L-Connect.ipa";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<title>Login</title>
<link rel="icon" href="/PhpProject1/images/LConnectt Fevicon.png" type="image/png">
<link rel="shortcut icon" href="/PhpProject1/LConnectt Fevicon.png" type="image/png">
<link rel="stylesheet" href="/PhpProject1/css/style.css">
<link href="/PhpProject1/css/bootstrap.min.css" rel="stylesheet"/>
<script src="/PhpProject1/js/jquery-1.12.3.min.js" type="text/javascript"></script>
<script src="/PhpProject1/js/bootstrap.min.js"></script>
<script>
$(document).keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		showUser();
	}
});

function showUser() {
	if(document.getElementById("login__username").value==""){
		document.getElementById("valid").innerHTML="Required";   
	}
	if(document.getElementById("login__password").value==""){
		document.getElementById("valid1").innerHTML="Required";   
	}
	if((document.getElementById("login__username").value) && (document.getElementById("login__password").value)){
		var name=document.getElementById("login__username").value;
		var pswd=document.getElementById("login__password").value;
		if (name == "") {
			document.getElementById("txtHint").innerHTML = "";
			return;
		} else {
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var x=xmlhttp.responseText;
					if(x=="admin" || x=="manager"){
						window.location="home.php";
					}else if(x=="rep"){
						window.location="inside_sales_home.php";
					}else if(x=="Invalid User"){
						document.getElementById("txtHint").innerHTML = x;
					}else if(x=="notmanager"){
						document.getElementById("txtHint").innerHTML = "Can't login into the system";
					}   
				}
			}
			xmlhttp.open("GET","lconnectWelcome?q="+name+"&r="+pswd,true);
			xmlhttp.send();
		}
	}
}
$(document).ready(function(){
	$("body").css("overflow", "auto");
	$('#showPassword').click(function(){
		if($(this).is(':checked')){
			$('#login__password').prop('type','text');
		}else{
			$('#login__password').prop('type','password');
		}
	});
});
</script>  
</head>
<body class="align">
	<div class="container-fluid outerdiv">
		<div class="header">
			<span id="headerlogo">
				<img src="/PhpProject1/images/new/Logo Semi.png" alt="Logo"/>
			</span>
		</div>
		<div class="content-body">
			<div class="content-text">
				<h3>WELCOME ???</h3>
			</div>
			<form action="" method="POST" class="form form--login" >
				<center><div id="txtHint" style="color:red"></div></center>
				<div class="form__field">
				  <input id="login__username"  name="login__username" type="text" class="form__input"  placeholder="USER NAME"/><div id="valid" style="color:red;margin-top:10px;"></div>
				</div>
				<div class="form__field">
				  <input id="login__password" name="login__password" type="password" class="form__input" placeholder="**********"/><div id="valid1" style="color:red;margin-top:10px;"></div>
				</div>
				<div class="form__field">
					<span class="forgot"><input type="checkbox" id="showPassword" class="form__checkbox"/> <label for="showPassword" class="indexLabel">Show Password</label></span>
				</div>
				<div class="form__field">
				  <input type="button" value="SIGN IN" name="submit" onclick="showUser()">
				</div>
			</form>
			<div class="forgot-password"><a href="forgot_password.php">Forgot Password?</a></div>
		</div>
		<div class="footer">
			<div class="col-md-6 col-sm-6 col-xs-6" id="androidspan"><a href="<?php echo $androidappurl;?>"><img src="/PhpProject1/images/new/Android New.png"></a></div>
			<div class="col-md-6 col-sm-6 col-xs-6" id="applespan"><a href="<?php echo $appleappurl;?>"><img src="/PhpProject1/images/new/Apple New.png"></a></div>
		</div>
	</div>
</body>
</html>

