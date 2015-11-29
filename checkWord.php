<?php

 $dbuser = "mhk4g";
 $dbpass = "password";

 $db = new mysqli('localhost', $dbuser, $dbpass, "AnagramDictionary");
 if ($db->connect_error) {
     die("Could not connect to database: " . $db->connect_error);
   }
   
   $ans = "error";

$guess = $_POST["guess"];
 
$result = $db->query("SELECT * FROM Words WHERE string='$guess'");
 
$rows = $result->num_rows;
 
if ($rows >= 1):
   header('Content-type: text/xml');
   echo "<?xml version='1.0' encoding='utf-8'?>";
   echo "<Word>";
   $row = $result->fetch_array();
   $ans = $row["string"];
   echo "<value>$ans</value>";
   echo "</Word>";
else:
   print_r($row);
   die ("Something went horribly wrong");
   
endif;