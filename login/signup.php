<?php

?>
<html>
<head><title>Login</title></head>
<link rel="stylesheet" href="entypo.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="Roboto.css" type="text/css" media="screen"/>

<style>

/* zocial */
[class*="entypo-"]:before {
  font-family: 'entypo', sans-serif;
}

*,
*:before,
*:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box; 
}


h2 {
  color:rgba(255,255,255,.8);
  margin-left:12px;
}

p {
  color:#FFFFFF;
}

body {
  background: #272125;
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
  
}

form {
  position:relative;
  margin: 0px auto;
  width: 380px;
  height: auto;
}

input {
  padding: 16px;
  border-radius:7px;
  border:0px;
  background: rgba(255,255,255,.2);
  display: block;
  margin: 15px;
  width: 300px;  
  color:white;
  font-size:18px;
  height: 54px;
}

input:focus {
  outline-color: rgba(0,0,0,0);
  background: rgba(255,255,255,.95);
  color: #e74c3c;
}

button {
  float:right;
  height: 261px;
  width: 50px;
  border: 0px;
  background: #e74c3c;
  border-radius:7px;
  padding: 10px;
  color:white;
  font-size:22px;
}

.inputUserIcon {
  position:absolute;
  top:68px;
  right: 80px;
  color:white;
}

.inputPassIcon {
  position:absolute;
  top:136px;
  right: 80px;
  color:white;
}

input::-webkit-input-placeholder {
  color: white;
}

input:focus::-webkit-input-placeholder {
  color: #e74c3c;
}

</style>
<body>
<?php 

if(isset($_GET['err']) and $_GET['err']==0)
		{
				echo "<p>Successfully Registered!<p>";
		}
		else
			echo '<form action="accept.php" method="POST">
			  <h2><span class="entypo-login"></span>LOGIN</h2>
			  <button class="submit" >S<BR>U<BR>B<BR>M<BR>I<BR>T</button>
				
			  <input type="text" class="user" name="name" placeholder="Username" maxlength="75" required/>

			  <input type="password" class="pass" name="pass" placeholder="Password" required"/>
			  
			  <input type="password" class="pass" name="repass" placeholder="Re-type Password" required"/>
			  
			  <input type="text" class="user" name="email" placeholder="Email" maxlength="175" required/>
			  
			  <input type="text" class="user" name="contact" placeholder="Contact" maxlength="15" required/>';
	
?>
	<?php
		if(isset($_GET['err']))
		{
			
			if($_GET['err']==1)
				echo "<p>Password does not match</p>";
			if($_GET['err']==2)
				echo "<p>Username already exists</p>";
			if($_GET['err']==3)
				echo "<p>Email ID already exists</p>";
		}
	?>

</form>


</body>

 <script>
 
$(".user").focusin(function(){
  $(".inputUserIcon").css("color", "#e74c3c");
}).focusout(function(){
  $(".inputUserIcon").css("color", "white");
});

$(".pass").focusin(function(){
  $(".inputPassIcon").css("color", "#e74c3c");
}).focusout(function(){
  $(".inputPassIcon").css("color", "white");
});
 </script>