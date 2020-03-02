<html>
	<head>
	</head>
	<body>
		<form method="post">
			<label for="primary_key">Primary key:</label>
			<input type="text" name="primary_key"><br/>
			<label for="word">Word:</label>
			<input type="text" name="word"><br/>
			<label for="number">Number:</label>
			<input type="text" name="number"><br/>
			<button type="submit" name="submit">insert data</button>
		</form>
	</body>
</html>
<?php
if (isset($_POST['submit'])) {
	$conn = oci_connect("Web_DB", "Web_DB", "//localhost:1521/xe");
	if (!$conn) {
	   $m = oci_error();
	   echo $m['message'], "\n";
	   exit;
	}
	else {
	   //print "Connected to Oracle!";
	}

	if (!empty($_POST['primary_key'])){
		$pk = $_POST['primary_key'];
		if (IS_NUMERIC($pk)){
			$word = $_POST['word'];
			$number = $_POST['number'];
			echo $pk;
				$sql = "INSERT INTO test VALUES( :prim , :wrd, :num)";
				$stid = oci_parse($conn, $sql);
			oci_bind_by_name($stid, ':prim', $pk);
			oci_bind_by_name($stid, ':wrd', $word);
			oci_bind_by_name($stid, ':num', $number);
	
			oci_execute($stid);
		}
		else 'primary key is not number';
	}
	else echo 'primary key is not set';
	//if($stid) echo 'success';
	oci_close($conn);
}
?>