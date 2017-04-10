<?php
require_once("../../ecnChurch.php");
require_once("autoload.php");

// setup dsn and options
$dsn = 'mysql:host=' . $config["hostname"] . ';dbname=' . $config["database"];
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");


// set up pdo connection with database and set error attributes
$pdo = new PDO($dsn, $config["username"], $config["password"], $options);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/*
$bull = new Bulletin(null, 5, 2, "VBS", "this is a message", null );
try {
    $bull->insert($pdo);
}catch (Exception $e){
    echo $e->getMessage();
}

$bull->setCategory("Youth");
$bull->setMessage("this is a replacement message");
$bull->update($pdo);

$bull->delete($pdo);

*/

/*
try {
    $bulls = Bulletin::getAllBulletins($pdo);
}catch(Exception $e) {
    echo $e->getMessage();
}
*/

//$bulls = Bulletin::getBulletinByCategory($pdo, "VBS");

$bull = Bulletin::getBulletinByBulletinId($pdo, 9);

var_dump($bull);






