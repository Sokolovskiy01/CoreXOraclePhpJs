<html>
    <head>
        <script type="text/javascript" src="js_lib/jquery.js"></script>
        <script type="text/javascript" src="js_lib/ProductCreateScriptPHP.js"></script>
            <link rel="stylesheet" href="css_lib/ProductStyleSheet.css" />
    </head>
    <body id ="top_weekly" vlink="none" alink="#0DAB76">

    </body>
</html>
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

echo '<script>';
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