<?php




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}



$sqlQuery = "SELECT * FROM products";
$resultSet = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
$developersData = array();
while( $developer = mysqli_fetch_assoc($resultSet) ) {
	$developersData[] = $developer;
}	



$fileName = "webdamn_export_".date('Ymd') . ".xls";			
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");	
$showColoumn = false;
if(!empty($developersData)) {
	foreach($developersData as $developerInfo) {
	if(!$showColoumn) {		 
		echo implode("\t", array_keys($developerInfo)) . "\n";
		$showColoumn = true;
	}
	echo implode("\t", array_values($developerInfo)) . "\n";
	}
}
exit; 























?>