<?php

// logout.php

session_start();
unset($_SESSION['username']);
unset($_SESSION['display_name']);
unset($_SESSION['display_surname']);

echo <<<EOD
<body style="font-family: Arial, sans-serif;">
<h2>Goodbye</h2>

<p>You are logged out.<p>

<p><a href="login.php">Login Page</a><p>
</body>
<script type="text/javascript">
	window.location = "/";
</script>
EOD;

?>