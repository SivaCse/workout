<?php
$dbhost   = 'localhost';
$dbuser   = 'root';
$dbpass   = 'siva098';
$dbname   = 'restangular';
$dbmethod = 'mysql:dbname=';

$db = new PDO("mysql:host=localhost;dbname=$dbname", $dbuser, $dbpass);

?>