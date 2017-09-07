<?php
require("mysql_login.php"); // 헤더 include
$doc = new DOMDocument("1.0"); // Start XML file, create parent node
$node = $doc->createElement("list");
$parnode = $doc->appendChild($node);

// Opens a connection to a MySQL server
$connection=mysqli_connect('localhost', $username, $password);
if (!$connection) {
die('Not connected : ' . mysqli_error($connection));
} 

/* 한글화 */
mysqli_query($connection, "set session character_set_connection=utf8;");
mysqli_query($connection, "set session character_set_results=utf8;");
mysqli_query($connection, "set session character_set_client=utf8;");

// Set the active MySQL database
$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
die ('Can\'t use db : ' . mysqli_error($connection));
}

// Select all the rows in the markers table
$query = "SELECT * FROM markers WHERE 1";
$result = mysqli_query($connection,$query);
if (!$result) {
die('Invalid query: ' . mysqli_error($connection));
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
// Add to XML document node
$node = $doc->createElement("marker");
$newnode = $parnode->appendChild($node);
$newnode->setAttribute("name", $row['name']);
$newnode->setAttribute("lat", $row['lat']);
$newnode->setAttribute("lng", $row['lng']);
}
echo $doc ->saveXML();
?>
