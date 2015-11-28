<?php 

$dbuser = "mhk4g";
$dbpass = "password";

$db = new mysqli('localhost', $dbuser, $dbpass, "AnagramDictionary");
if ($db->connect_error) {
    die("Could not connect to database: " . $db->connect_error);
  }

$db->query("TRUNCATE TABLE Words");
$counter = 0;

$fileptr = fopen("dictionary.txt", "r");
if (flock($fileptr, LOCK_SH)):
  while($currentline = rtrim(fgetss($fileptr,100))):
    $result = $db->query("INSERT INTO Words(string) VALUES('$currentline')");
    $counter++;
  endwhile;
  echo($counter);
endif;
  
  ?>