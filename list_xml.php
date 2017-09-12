<?php
require("mysql_login.php"); // 헤더 include
$doc = new DOMDocument("1.0"); // Start XML file, create parent node
$node = $doc->createElement("data");
$parnode = $doc->appendChild($node);

// Opens a connection to a MySQL server
$connection=mysqli_connect('localhost', $username, $password);
$connection2 =mysqli_connect('localhost', $username, $password);
if (!$connection) {
die('Not connected : ' . mysqli_error($connection));
}

if (!$connection2) {
die('Not connected : ' . mysqli_error($connection2));
}
/* 한글화 */
mysqli_query($connection, "set session character_set_connection=utf8;");
mysqli_query($connection, "set session character_set_results=utf8;");
mysqli_query($connection, "set session character_set_client=utf8;");

/* 한글화 */
mysqli_query($connection2, "set session character_set_connection=utf8;");
mysqli_query($connection2, "set session character_set_results=utf8;");
mysqli_query($connection2, "set session character_set_client=utf8;");

// Set the active MySQL database
$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
die ('Can\'t use db : ' . mysqli_error($connection));
}

$db_selected2 = mysqli_select_db($connection2, $database);
if (!$db_selected2) {
die ('Can\'t use db : ' . mysqli_error($connection2));
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
  if($row['name'] == "용산"){  // Table명 '용산구'이면 YoungsanGu로
    $name = "yongsan";
  }
  else if($row['name'] == "서초"){
    $name = "seocho";
  }
  else if($row['name'] == "마포"){
    $name = "mapo";
  }
  else if($row['name'] == "강남"){
    $name = "gangnam";
  }
  else if($row['name'] == "송파"){
    $name = "songpa";
  }
  else if($row['name'] == "관악"){
    $name = "gwanak";
  }
  else if($row['name'] == "동작"){
    $name = "dongjak";
  }
  else if($row['name'] == "영등포"){
    $name = "yeongdeungpo";
  }
  else if($row['name'] == "구로"){
    $name = "guro";
  }
  else if($row['name'] == "강서"){
    $name = "gangseo";
  }
  else if($row['name'] == "서래마을"){
    $name = "seorae";
  }
  else if($row['name'] == "이태원"){
    $name = "itaewon";
  }
  else if($row['name'] == "명동"){
    $name = "myeongdong";
  }
  else if($row['name'] == "은평"){
    $name = "eunpyeong";
  }
  else if($row['name'] == "종로"){
    $name = "jongro";
  }
  else if($row['name'] == "대학로"){
    $name = "daehakro";
  }
  else if($row['name'] == "삼청"){
    $name = "samcheongdong";
  }
  else if($row['name'] == "중구"){
    $name = "junggu";
  }
  else if($row['name'] == "건대"){
    $name = "kondae";
  }
  else if($row['name'] == "동대문"){
    $name = "dongdaemun";
  }
  else if($row['name'] == "강북"){
    $name = "kangbuksungbuk";
  }
  else if($row['name'] == "노원"){
    $name = "nowon";
  }
  else if($row['name'] == "강동"){
    $name = "kangdong";
  }
  else if($row['name'] == "도봉"){
    $name = "dobong";
  }
  else if($row['name'] == "신촌"){
    $name = "sinchon";
  }
  else if($row['name'] == "성동"){
    $name = "sungdong";
  }
  else if($row['name'] == "인사동"){
    $name = "insadong";
  }
  else if($row['name'] == "광진중랑"){
    $name = "kwangjinjungrang";
  }
  $query2 = "SELECT * FROM {$name} WHERE 1";
  $result2 = mysqli_query($connection2, $query2);


  if (!$result2) {
  die('Invalid query: ' . mysqli_error($connection2));
  }


  while($row2 = @mysqli_fetch_assoc($result2)){
    $node = $doc->createElement($name);
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("name", $row2['name']);
    $newnode->setAttribute("x", $row2['x']);
    $newnode->setAttribute("y", $row2['y']);
    $newnode->setAttribute("address", $row2['address']);
    $newnode->setAttribute("information", $row2['information']);
    $newnode->setAttribute("type", $row2['type']);
  }
}
echo $doc ->saveXML();
?>
