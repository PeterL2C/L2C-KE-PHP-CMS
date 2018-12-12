<?php
require dirname(__FILE__)."/../framework/helpers.php";

$temp = db_query("SELECT * FROM users");

foreach($temp as $i => $hodnota){

var_dump($hodnota);
echo"<br>";

}
?>