<?php

$db_user = "root";
$db_password = "";
$dsn = "mysql:host=localhost;port=3306;dbname=addtocart;";

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

try {
    $dbc = new PDO($dsn, $db_user, $db_password, $options);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

?>