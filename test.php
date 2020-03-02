<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		@font-face {
			font-family: 'Header';
			src: url(../12905.otf);
		}
		
		h1{
			font-family: 'Header';
			text-align:center;
		}
		

		img {
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
			pointer-events: none;
		}

.log_text{
	text-align: left;
}

.log_inp, .pas_inp {
	font-family: Consolas;
	font-size: 16px;
	width: 90%;
	padding: 12px 20px;
	box-sizing: border-box;
	border: 2px solid #202020;
	border-radius: 8px;
	background-color: #0DAB76;
	color: white;
	transition: 0.2s;
	-webkit-transition: 0.2s;
	-o-transition: 0.2s;
	-moz-transition: 0.2s;
	outline: none;
}

	.log_inp:focus, .pas_inp:focus {
		background-color: #FFFFFF;
		color: black;
	}

	textarea:focus .log_text{
		color: red;
	}
	
#corex_column {
	width: 500px;
	height: 100%;
	display: block;
	left: 50%;
	margin-right: -50%;
	transform: translate(-50%,0%);
	position: absolute;
}

		#login_form{
			width:100%;
			height:auto;
		}

		#form{
			font-size: 20px;
			text-align: center;
		}
	</style>
	<script type="text/javascript" src="js_lib/jquery.js"></script>
	<script type="text/javascript">
	  function checkForm(form)
	  {
		if(form.username.value == "") {
			$('#message').html("Username cannot be blank!");
			form.username.style.border = '1px solid red';
			return false;
		}
		re = /^\w+$/;
		if(!re.test(form.username.value)) {
			$('#message').html("Username must contain only letters, numbers and underscores!");
			form.username.style.border = '1px solid red';
			return false;
		}
		if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
			if(form.pwd1.value.length < 6) {
				$('#message').html("Password must contain at least six characters!");
				form.pwd1.style.border = '1px solid red';
				return false;
			}
			if(form.pwd1.value == form.username.value) {
				$('#message').html('Password must be different from Username!');
				form.pwd1.style.border = '1px solid red';
				return false;
			}
			re = /[0-9]/;
			if(!re.test(form.pwd1.value)) {
				$('#message').html('Password must contain at least one number (0-9)!');
				form.pwd1.style.border = '1px solid red';
				return false;
			}
		} else {
		  //alert("Error: Please check that you've entered and confirmed your password!");
		  $('#message').html("Please check that you've entered and confirmed your password!");
		  form.pwd2.style.border = '1px solid red';
		  return false;
		}
		alert("You entered a valid password: " + form.pwd1.value);
		return true;
	  }
</script>


</head>
<body style="margin:0; min-height:100vh;">
	<div id="corex_column">
		<img src="CoreX3.0.png" style="width:100%; user-select:none; " />
		<div id="login_form">
			<form ... onsubmit="return checkForm(this);">
				<p id="pidor">Username: </p><input  type="text" name="username">
				<p >Password: </p><input type="password" name="pwd1">
				<p >Confirm Password: </p><input type="password" name="pwd2">
				<p >Name: </p><input  type="text" name="display_name">
				<p >Surname: </p><input  type="text" name="display_surname">
				<select id="country">
					<option value ="null">None</option>
					<option value="Poland">Poland</option>
				</select>
				<p id="message" style="color: red";></p>
				<p><input type="submit"></p>
			</form>
		</div>
	</div>
</body>
</html>
