<?php
require_once("../../ecnChurch.php");
require_once("autoload.php");

// setup dsn and options
$dsn = 'mysql:host=' . $config["hostname"] . ';dbname=' . $config["database"];
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");


// set up pdo connection with database and set error attributes
$pdo = new PDO($dsn, $config["username"], $config["password"], $options);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$salt = "c95b9c80eeb7aa08d327f24f8884e6c8dba171d88aa69f3b790ee93800f2a58a";
$hash = "865187f5ba94ed115719aab747fb32fa2243a826be809762a6588149029994622f745a3e8db6d19f27cd21f23f7e863034e33c48d0800a5d05d94db8ed7370c0";

$memb = new Members (null, 2, "activationmodel1", "water@greatvalue.com", "John", "$hash", "Doe", "505-456-9870", "Lay Pastor", "61215", "Alaska", "Anchorage", "address one", "address two", "Male", "1991-11-01", "$salt" );


try {
    $memb->insert($pdo);
}catch (PDOException $exception) {
    echo $exception->getMessage();
}


$memb->setFirstName("Michael");
var_dump($memb);

$memb->update($pdo);

$memb->delete($pdo);

try {
    $memb = Members::getMembersByMembersId($pdo, 31);
} catch (Exception $e) {
    echo $e->getMessage();
}

echo'<br>';
var_dump($memb);

$memb = Members::getMembersByMissionsId($pdo, 3);
var_dump($membs);

$membs = Members::getAllMembers($pdo);
var_dump($membs);



