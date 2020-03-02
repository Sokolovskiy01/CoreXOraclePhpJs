<html>
<head>
    <title>Log in</title>
	<link rel="icon" href="icon.ico" />
	<link rel="stylesheet" href="css_lib/fonts.css">
    <style type="text/css">
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
            font-family: Comfortaa;
            text-align: left;
            margin: 11px 5%;
        }

        .log_inp, .pas_inp {
            font-family: Comfortaa;
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

        .submit_log{
            cursor: pointer;
            margin: 11px 0;
            font-family: 'Header';
            font-size: 20px;
            width: 40%;
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

        .submit_log:hover{
            background: #6247AA;
		}

        #corex_column {
            width: 500px;
            display: block;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%,0%);
            position: absolute;
        }

        #login_block{
            width:100%;
            height:auto;
        }

        #form{
            font-size: 20px;
            text-align: center;
        }

        .suc_login_link{
          text-decoration: none;
          font-family: Comfortaa;
          font-size: 30px;
          color: #0DAB76;
		}

        .suc_login_link:hover{
            color: #6247AA;
		}
    </style>
    <script type="text/javascript" src="js_lib/jquery.js"></script>
</head>
<body style="margin:0;">
    <div id="corex_column">
        <img src="CoreX3.0.png" style="width:100%; user-select:none; margin-top: 20px;" />
        <div id="login_block">
<?php

// login.php

require_once('dbinfo.inc.php');

session_start();

function login_form($message)
{
  echo <<<EOD
  <h1>Log in page</h1>
  <p style="font-family: Comfortaa; text-align: center;">Don't have an account?<a href="signup.php" class="suc_login_link" style="font-size: 16px;"> Sign up.</a></p>
  <form action="login.php" method="POST" id="form">
    <p class="log_text">Username: </p><input class="log_inp" type="text" name="username">
    <p class="log_text">Password: </p><input class="pas_inp" type="password" name="password" >
      <p style="font-family: Comfortaa; color: red; font-size: 16px;">$message</p>
    <input class="submit_log" type="submit" value="Log in">
  </form>
EOD;
}

if (!isset($_POST['username']) || !isset($_POST['password'])) {
  login_form('');
} else {
  // Check validity of the supplied username & password
  $c = oci_pconnect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
  // Use a "bootstrap" identifier for this administration page
  oci_set_client_identifier($c, 'admin');

  $s = oci_parse($c, 'select app_username
                      from   php_sec_admin.WEB_AUTHENTICATION
                      where  app_username = LOWER( :un_bv )
                      and    app_password = :pw_bv');
  oci_bind_by_name($s, ":un_bv", $_POST['username']);
  oci_bind_by_name($s, ":pw_bv", $_POST['password']);
  oci_execute($s);
  $r = oci_fetch_array($s, OCI_ASSOC);

  if ($r) {
    // The password matches: the user can use the application

    // Set the user name to be used as the client identifier in
    // future HTTP requests:
    $_SESSION['username'] = $_POST['username'];
    $stmt = oci_parse($c,'SELECT DISPLAY_NAME, DISPLAY_SURNAME FROM php_sec_admin.WEB_AUTHENTICATION WHERE APP_USERNAME = LOWER( :un_bv )');
    oci_bind_by_name($stmt,":un_bv", $_POST['username']);
    oci_execute($stmt);
    if(oci_fetch($stmt)){
        $_SESSION['display_name'] = oci_result($stmt, 'DISPLAY_NAME');
        $_SESSION['display_surname'] = oci_result($stmt, 'DISPLAY_SURNAME');
            echo <<<EOD
    <body style="font-family: Arial, sans-serif;">

    <h1 id="form" style="font-size: 35px;">Login was successful</h1>
    <p style="text-align: center;"><a class="suc_login_link" href="../">Go to website</a></p>
    </body>
EOD;
    }
    exit;
  }
  else {
    // No rows matched so login failed
    login_form('Login failed. Username or password does not match.');
  }
}

?>
        </div>
    </div>
    <script type="text/javascript">
        //$('#corex_column').height($(window).height());
    </script>
</body>
</html>