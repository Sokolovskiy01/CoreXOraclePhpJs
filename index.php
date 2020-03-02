<!DOCTYPE html>
<html>
<head>
	<title>CoreX</title>
	<meta charset="utf-8" />
	<link rel="icon" href="icon.ico" />
	<link rel="stylesheet" href="css_lib/header_main.css" />
	<link rel="stylesheet" href="css_lib/footer_main.css" />
	<link rel="stylesheet" href="css_lib/body_main.css" />
	<link rel="stylesheet" href="css_lib/user_log.css" />
	<link rel="stylesheet" href="css_lib/ProductStyleSheet.css" />
	<link rel="stylesheet" href="css_lib/animate.css" />
	<link rel="stylesheet" href="css_lib/fonts.css">
	<style type="text/css">
		body {
			margin: 0;
			background: #ffffff;
			position: relative;
			max-width: 1920px;
			min-width: 1240px;
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
	</style>
	<script type="text/javascript" src="js_lib/jquery.js"></script>
	<script type="text/javascript" src="js_lib/ProductCreateScriptPHP.js"></script>
	<script type="text/javascript">
		function hide_login() {
			document.getElementById('login_active').style.visibility = 'hidden';
			document.getElementById('login_nav').style.transform = 'translate(450px, 0px)';
			document.getElementById('dark_scr').style.width = '0px';
		};
		function unhide_login() {
			document.getElementById('login_active').style.visibility = 'visible';
			document.getElementById('login_nav').style.transform = 'translate(0px, 0px)';
			document.getElementById('dark_scr').style.width = '100%';
		};
		function but1(){
			window.location = "login.php";
		};
		function but2(){
			window.location = "signup.php";
		};
	</script>
</head>
<body vlink="none" alink="#0DAB76">
	<header id="top" >
		<div id="socials_block" style="height:100%; position: relative;">
			<div id="socials" style="width:auto; height:auto;">
				<a id="facebook_link" href="https://www.facebook.com/profile.php?id=100005001452596" target="_blank"></a>
				<a id="instagran_link" href="https://www.instagram.com/free_eagle.ds/" target="_blank"></a>
				<a id="telegram_link" href="https://web.telegram.org/#/im?p=@Sokolovskiy01" target="_blank"></a>
				<a id="twitter_link" href="https://twitter.com/Dima51205917" target="_blank"></a>
				<a id="youtube_link" href="https://www.youtube.com/channel/UCOvWpx5w5lOrVlNum4klhVg" target="_blank"></a>
				<a id="vk_link" href="https://vk.com/sokolovskiy01" target="_blank"></a>
			</div>
		</div>
		<div id="title_img">
			<img src="CoreX3.0.png" style="height: inherit;" />
		</div>
		<div id="user_name_pic">
			<p id="user_name"><?php session_start(); if(isset($_SESSION['display_name'])) echo $_SESSION['display_name'] . ' ' . $_SESSION['display_surname']; ?></p>
			<button id="user_pic" onclick="unhide_login();"></button>
		</div>

	</header>
	<nav id="underpass">
		<a id="underpass_link" href="phpinfo.php">
			<p class="underpass_link_text">Top Builds</p>
		</a>
		<a id="underpass_link" href="store">
			<p class="underpass_link_text">Store</p>
		</a>
		<a id="underpass_link" href="#">
			<p class="underpass_link_text">Build your own PC</p>
		</a>
	</nav>
	<div id="login_active">
		<div id="dark_scr" onclick="hide_login();">
			
		</div>
		<nav id="login_nav">

			<div id="logreg">
			<?php

// application.php

require_once('dbinfo.inc.php');

//session_start();

// Check the user is logged in according to our application authentication
if (!isset($_SESSION['username'])) {
  echo <<<EOD
<button class="button_user" onclick="but1();">Log in</button>
<button class="button_user" onclick="but2();">Sign up</button>
EOD;
}
else{

// Generate the application page

$c = oci_pconnect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
// Set the client identifier after every connection call
// using a value unique for the web end user.
oci_set_client_identifier($c, $_SESSION['username']);

$username = htmlentities($_SESSION['username'], ENT_QUOTES);
echo <<<EOD
<h2 style="color: #6247AA;">Welcome, $username </h2>
<p><a href="logout.php">Logout</a></p>
EOD;
}
?>          
			</div>
			<div>

			 </div>
		</nav>
	</div>
	<div id="main_page">
		<div id="why_us">
			<h1 style="text-align:center; font-family:'Header'; font-size:3em;">Why us?</h1>
			<!--А и вправду-->
			<div style="height:100%;width:80%;margin-left:auto;margin-right:auto;">
				<ul class="sections">
					<li>
						<img src="main_pics/gears.png" style="height:auto; width: 80%;" />
						<p>We have a huge team with big experience. Every day they improve stability of our servise for our users.</p>
					</li>
					<li>
						<img src="main_pics/chat.png" style="height:auto; width: 80%" />
						<p>Our 24/7 contact service will help you with any issues anytime.</p>
					</li>
					<li>
						<img src="main_pics/card.png" style="height:auto; width: 80%" />
						<p>Every day we're updating worldwide hardware list to sell you in the best price</p>
					</li>
				</ul>
			</div>
		</div>
		<div style="width:100%; height:70px; background: #202020; position:relative;">
			<h1 style="text-align:center; font-family:'Header'; font-size:3em;" class="underpass_link_text">Top weekly</h1>
		</div>
		<div id="top_weekly">

				<?php
//phpinfo();
$conn = oci_connect("Web_DB", "Web_DB", "//localhost:1521/xe");
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
   //print "Connected to Oracle!";
}

$sql = 'SELECT PRODUCT_NAME, PRODUCT_ICON, PRODUCT_IMAGE, PRODUCT_DESC_A1, PRODUCT_DESC_A2, PRODUCT_DESC_B1, PRODUCT_DESC_B2, PRODUCT_DESC_C1, PRODUCT_DESC_C2, PRODUCT_PRICE FROM PRODUCT';
$stid = oci_parse($conn, $sql);
oci_execute($stid);

/*echo '<script> tester("' . oci_result($stid, 'PRODUCT_NAME') . '  ");</script>';
echo '<script> tester("lolec");</script>';*/

echo '<script id="delete">';
while (oci_fetch($stid)){
    echo 'createbox(document.getElementById("top_weekly"),"' . oci_result($stid, 'PRODUCT_NAME') . '","'
    . oci_result($stid, 'PRODUCT_ICON') . '","'
    . oci_result($stid, 'PRODUCT_IMAGE') . '","'
    . oci_result($stid, 'PRODUCT_DESC_A1') . '","'
    . oci_result($stid, 'PRODUCT_DESC_A2') . '","'
    . oci_result($stid, 'PRODUCT_DESC_B1') . '","'
    . oci_result($stid, 'PRODUCT_DESC_B2') . '","'
    . oci_result($stid, 'PRODUCT_DESC_C1') . '","'
    . oci_result($stid, 'PRODUCT_DESC_C2'). '","'
    . oci_result($stid, 'PRODUCT_PRICE') . '");';
}
echo '</script>';

/*while (oci_fetch($stid)) {
    echo '<p style="margin:0;">' . oci_result($stid, 'IMIE') . ' ';
    echo oci_result($stid, 'NAZ') . "</p>";
}*/

// Displays:
//   1000 is Roma
//   1100 is Venice

oci_free_statement($stid);

// Close the Oracle connection

oci_close($conn);
?>

		</div>
		<div style="width:100%; height:70px; background: #202020; position:relative;">
			<h1 style="text-align:center; font-family:'Header'; font-size:3em;" class="underpass_link_text">Top PC builds</h1>
		</div>
		<div id="top_builds">

		</div>
	</div>
	<footer class="fttr">
		<div style="height: 100%;width: 25%;display: block;float:left; position: relative;">
			<div id="links">
				<a id="github" href="https://github.com/Sokolovskiy01" target="_blank"></a>
				<a id="mail" href="mailto:sokolovskiy01@gmail.com"></a>
			</div>
		</div>
		<div class="copyright">
			<nav style="height:70%;width:100%;">

			</nav>
			<div style="height:30%;width: 100%;text-align:center; color: #494949; font-family: Consolas;">
				<p style="margin:0px;">Copyright &copy CoreX inc. 2001 - 2020. No rights reserved</p>
			</div>
		</div>
		<div class="authors">
			<ul class="authors_list">
				<li>Dima Sokolovskyi</li>
				<li>Alexis Nearonska</li>
			</ul>
		</div>
	</footer>
		<script type="text/javascript">
			$('#socials_block').width(document.getElementById('title_img').getBoundingClientRect().left);
			$(document).ready(function () {	$('#user_name_pic').width($('#user_name').width() + 70); });
			$('#delete').remove();
			//(function(a,b){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))window.location=b})(navigator.userAgent||navigator.vendor||window.opera,'mobile.html');
		</script>
</body>
</html>