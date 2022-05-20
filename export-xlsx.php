<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "test";

$conn = new mysqli($hostname, $username, $password, $database);
// Include SimpleXLSXGen library
include("SimpleXLSXGen.php");

$employees = [
  ['Sl', 'Id', 'Name']
];

$id = 0;
$sql = "SELECT * FROM products";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
  foreach ($res as $row) {
    $id++;
    $employees = array_merge($employees, array(array($id, $row['id'], $row['name'])));
  }
}

$xlsx = SimpleXLSXGen::fromArray($employees);
$xlsx->downloadAs('employees.xlsx'); // This will download the file to your local system

// $xlsx->saveAs('employees.xlsx'); // This will save the file to your server

echo "<pre>";
print_r($employees);
