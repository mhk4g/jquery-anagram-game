<?php

 $dbuser = "mhk4g";
 $dbpass = "password";

 $db = new mysqli('localhost', $dbuser, $dbpass, "AnagramDictionary");
 if ($db->connect_error) {
     die("Could not connect to database: " . $db->connect_error);
   }
   
   $ans = "error";

// There are 54556 entries in the dictionary
$randomID = rand(1, 54556);
 
$result = $db->query("SELECT * FROM Words WHERE ID='$randomID'");
 
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

?>
<?
/*
 $query = "select word from Words order by rand() limit 1";
 $result = $db->query($query);
 $rows = $result->num_rows;
 if ($rows >= 1):
    header('Content-type: text/xml');
    echo "<?xml version='1.0' encoding='utf-8'?>";
    echo "<Word>";
    $row = $result->fetch_array();
    $ans = $row["word"];
    echo "<value>$ans</value>";
    echo "</Word>";
 else:
    die ("DB Error");
 endif;
 */
?>