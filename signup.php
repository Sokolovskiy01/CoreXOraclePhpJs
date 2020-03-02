<html>
<head>
	<title>Sign up</title>
	<link rel="icon" href="icon.ico" />
	<link rel="stylesheet" href="css_lib/countrySelect.css">
	<link rel="stylesheet" href="css_lib/demo.css">
	<link rel="stylesheet" href="css_lib/fonts.css">
	<style type="text/css">
		h1{font-family: 'Header';text-align:center;}
		img {-webkit-user-select: none;-moz-user-select: none;user-select: none;pointer-events: none;}

		.log_text{font-family: Comfortaa;text-align: left;margin: 11px 5%;}
		.log_inp, .pas_inp {font-family: Comfortaa;font-size: 16px;width: 100%;padding: 12px 20px;box-sizing: border-box;border: 2px solid #202020;border-radius: 8px;background-color: #0DAB76;color: white;transition: 0.2s;-webkit-transition: 0.2s;-o-transition: 0.2s;-moz-transition: 0.2s;outline: none;}
			.log_inp:focus, .pas_inp:focus {background-color: #FFFFFF;color: black;}
		.submit_log{cursor: pointer;margin: 11px 0;font-family: 'Header';font-size: 20px;width: 40%;padding: 12px 20px;box-sizing: border-box;border: 2px solid #202020;border-radius: 8px;background-color: #0DAB76;color: white;transition: 0.2s;-webkit-transition: 0.2s;-o-transition: 0.2s;-moz-transition: 0.2s;outline: none;}
		.submit_log:hover{background: #6247AA;}
		#corex_column {width: 500px;display: block;left: 50%;margin-right: -50%;transform: translate(-50%,0%);position: absolute;}
		#login_block{width:100%;height:auto;}
		#form{font-size: 20px;text-align: center;}
		.suc_login_link{text-decoration: none;font-family: Comfortaa;font-size: 30px;color: #0DAB76;}
		.suc_login_link:hover{color: #6247AA;}

		#jquery-script-menu{position:absolute;height:90px;width:100%;top:0;left:0;border-top:5px solid #316594;background:#fff;-moz-box-shadow:0 2px 3px 0 rgba(0,0,0,.16);-webkit-box-shadow:0 2px 3px 0 rgba(0,0,0,.16);box-shadow:0 2px 3px 0 rgba(0,0,0,.16);z-index:999999;padding:10px 0;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box}
		.jquery-script-center{width:960px;margin:0 auto;}
		.jquery-script-center ul{width:212px;float:left;line-height:45px;margin:0;padding:0;list-style:none}
		.jquery-script-center a{text-decoration:none}
		.jquery-script-ads{width:728px;height:90px;float:right}
		.jquery-script-clear{clear:both;height:0}
		#carbonads{display:block;overflow:hidden;max-width:728px;position:relative;font-size:22px;box-sizing:content-box}
		#carbonads>span{display:block}
		#carbonads a{color:#4078c0;text-decoration:none}
		#carbonads a:hover{color:#3664A3}
		.carbon-wrap{display:flex;align-items:center}
		.carbon-img{display:block;margin:0;line-height:1}
		.carbon-img img{display:block;height:90px;width:auto}
		.carbon-text{display:block;padding:0 1em;line-height:1.35;text-align:left}
		.carbon-poweredby{display:block;position:absolute;bottom:0;right:0;padding:6px 10px;text-align:center;text-transform:uppercase;letter-spacing:.5px;font-weight:600;font-size:8px;border-top-left-radius:4px;line-height:1;color:#aaa!important}@media only screen and (min-width:320px) and (max-width:759px){.carbon-text{font-size:14px}}
	</style>
	<script type="text/javascript" src="js_lib/jquery.js"></script>
	<script src="js_lib/countrySelect.js"></script>
	<script type="text/javascript">
function checkForm(form) {
	form.password_check.style.border = form.password.style.border = form.username.style.border = form.display_name.style.border = form.display_surname.style.border = '2px solid #202020';
		if(form.username.value == "") {
			$('#message').html("Username can not be blank!");
			form.username.style.border = '2px solid red';
			return false;
		}
		re = /^\w+$/;
		if(!re.test(form.username.value)) {
			$('#message').html("Username must contain only letters, numbers and underscores!");
			form.username.style.border = '2px solid red';
			return false;
		}
		if(form.password.value != "" && form.password.value == form.password_check.value) {
			if(form.password.value.length < 6) {
				$('#message').html("Password must contain at least six characters!");
				form.password.style.border = '2px solid red';
				return false;
			}
			if(form.password.value == form.username.value) {
				$('#message').html('Password must be different from Username!');
				form.password.style.border = '2px solid red';
				return false;
			}
			re = /[0-9]/;
			if(!re.test(form.password.value)) {
				$('#message').html('Password must contain at least one number (0-9)!');
				form.password.style.border = '2px solid red';
				return false;
			}
		} else {
		  $('#message').html("Please check that you've entered and confirmed your password!");
		  form.password.style.border = '2px solid red';
		  form.password_check.style.border = '2px solid red';
		  return false;
		}
		//display_name check
		if(form.display_name.value == "") {
			$('#message').html("Your name can not be blank!");
			form.display_name.style.border = '2px solid red';
			return false;
		}
		if(form.display_name.value.length < 2) {
			$('#message').html("Your name must contain at least two characters!");
			form.display_name.style.border = '2px solid red';
			return false;
		}
		re = /^\w+$/;
		if(!re.test(form.display_name.value)) {
			$('#message').html("Your name must contain only letters, numbers and underscores!");
			form.display_name.style.border = '2px solid red';
			return false;
		}
		re = /[0-9]/;
		if(re.test(form.display_name.value)) {
			$('#message').html('Your name can not contain numbers (0-9)!');
			form.display_name.style.border = '2px solid red';
			return false;
		}
		//display_surname check
		if(form.display_surname.value == "") {
			$('#message').html("Your surname can not be blank!");
			form.display_surname.style.border = '2px solid red';
			return false;
		}
		if(form.display_surname.value.length < 2) {
			$('#message').html("Your surname must contain at least two characters!");
			form.display_surname.style.border = '2px solid red';
			return false;
		}
		re = /^\w+$/;
		if(!re.test(form.display_surname.value)) {
			$('#message').html("Your surname must contain only letters, numbers and underscores!");
			form.display_surname.style.border = '2px solid red';
			return false;
		}
		re = /[0-9]/;
		if(re.test(form.display_surname.value)) {
			$('#message').html('Your surname can not contain numbers (0-9)!');
			form.display_surname.style.border = '2px solid red';
			return false;
		}
		//email check
		if(form.email.value == "") {
			$('#message').html('You have entered an empty e-mail adress');
			form.email.style.border = '2px solid red';
			return false;
		}
		return true;
	  }
	</script>
</head>
<body style="margin:0;">
	<div id="corex_column">
		<img src="CoreX3.0.png" style="width:100%; user-select:none; margin-top: 20px;" />
		<div id="login_block">
<?php
// signup.php
// All connections to the database use these credentials

function singup_form($message)
{
  echo <<<EOD
  <h1>Sign up page</h1>
  <p style="font-family: Comfortaa; text-align: center;">Already have an account?<a href="login.php" class="suc_login_link" style="font-size: 16px;"> Log in.</a></p>
  <form action="signup.php" method="POST" id="form" style="padding: 0 5%;" onsubmit="return checkForm(this);">
	<p class="log_text">Username: </p><input class="log_inp" type="text" name="username">
	<div style="width:50%; display:inline-block; float: left; padding: 0 1% 0 0;">
		<p class="log_text">Password: </p><input class="pas_inp" type="password" name="password" >
	</div>
	<div style="width:50%; display: inline-block; padding: 0 0 0 1%;">
		<p class="log_text">Repeat password: </p><input class="pas_inp" type="password" name="password_check">
	</div>
	<div class="form-item" style="font-family: Comfortaa;">
		<p class="log_text">Select country: </p><input id="country_selector" class="log_inp" type="text" name="selected_country">
	</div>
	<p class="log_text">Name: </p><input class="log_inp" type="text" name="display_name">
	<p class="log_text">Surname: </p><input class="log_inp" type="text" name="display_surname">
	<p class="log_text">E-mail: </p><input class="log_inp" type="email" name="email">
	<p style="font-family: Comfortaa; color: red; font-size: 16px;" id="message">$message</p>
	<input class="submit_log" type="submit" value="Create account">
  </form>
EOD;
}

if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['selected_country']) || !isset($_POST['display_name']) || !isset($_POST['display_surname']) || !isset($_POST['email'])) {
  singup_form('');
} else {
define("ORA_CON_UN", "php_sec_admin");
define("ORA_CON_PW", "welcome");
define("ORA_CON_DB", "//localhost:1521/xe");

  // Check validity of the supplied username & password
  $c = oci_pconnect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
  // Use a "bootstrap" identifier for this administration page
  oci_set_client_identifier($c, 'admin');

  $s = oci_parse($c, 'SELECT app_username FROM WEB_AUTHENTICATION WHERE app_username = LOWER( :un_bv )');
  oci_bind_by_name($s, ":un_bv", $_POST['username']);
  oci_execute($s);
  $r = oci_fetch_array($s, OCI_ASSOC);

  if (!$r) {
	// The password matches: the user can use the application

	// Set the user name to be used as the client identifier in
	// future HTTP requests:
	$stmt = oci_parse($c,'INSERT INTO WEB_AUTHENTICATION VALUES( LOVER( :un_bv ), :un_pv , :un_dn , :un_ds , :un_coun , :un_em ,SYSDATE)');
	oci_bind_by_name($stmt,":un_bv", $_POST['username']);
	oci_bind_by_name($stmt,":un_pv", $_POST['password']);
	oci_bind_by_name($stmt,":un_dn", $_POST['display_name']);
	oci_bind_by_name($stmt,":un_ds", $_POST['display_surname']);
	oci_bind_by_name($stmt,":un_coun", $_POST['selected_country']);
	oci_bind_by_name($stmt,":un_em", $_POST['email']);
	if(oci_execute($stmt)){
			echo <<<EOD
	<body style="font-family: Arial, sans-serif;">

	<h1 id="form" style="font-size: 35px;">You have succesfully created an account</h1>
	<p style="text-align: center;"><a class="suc_login_link" href="login.php">Log in</a></p>
	</body>
EOD;
	}
	exit;
  }
  else {
	// No rows matched so login failed
	singup_form('This username is already taken.');
  }
}
?>
		</div>
	</div>
		<script>
			$("#country_selector").countrySelect({
				preferredCountries: ['pl', 'ua', 'ru']
			});
		</script>
</body>
</html>