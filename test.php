<?php
require("goo.php");

$goo = new gooGl(" YOUR_API_KEY ");

print_r(  $goo->url("https://site.com")->json(0)->get("short")  ); 

?>
