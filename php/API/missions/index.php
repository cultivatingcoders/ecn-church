<?php
require_once(dirname(dirname(__DIR__)) . "/classes/autoload.php");
require_once("/etc/apache2/data-design/encrypted-config.php");
require_once(dirname(dirname(__DIR__)) . "/classes/dbconnect.php");

// start the session and create a XSRF token
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {
    // determine which HTTP method was used
    $method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

    // sanitize the missionId
    $missionId = filter_input(INPUT_GET, "missionId", FILTER_VALIDATE_INT);

    // sanitize the email
    $email = filter_input(INPUT_GET, "email", FILTER_SANITIZE_EMAIL);


    // grab the mySQL connection
    $pdo = establishConn("/etc/apache2/ecnchurch.ini");

    // handle all RESTful calls to Mission today
    // get some or all Missions
    if($method === "GET") {
        // set an XSRF cookie on GET requests
        setXsrfCookie("/");
        if(empty($missionId) === false) {
            $reply->data = Missions::getMissionsByMissionsId($pdo, $missionId);
        } else if(empty($email) === false) {
            $reply->data = Missions::getMissionsByEmail($pdo, $email);
        } else {
            $reply->data = Missions::getAllMissions($pdo);
        }

        // post to a new Mission
    } else if($method === "POST") {
        // convert POSTed JSON to an object
        verifyXsrf();
        $requestContent = file_get_contents("php://input");
        $requestObject = json_decode($requestContent);

        if($requestObject->password !== $requestObject->passwordConfirm) {
            throw(new InvalidArgumentException("passwords do not match", 400));
        }

        // handle optional fields
        $attention = (empty($requestObject->attention) === true ? null : $requestObject->attention);
        $address2 = (empty($requestObject->address2) === true ? null : $requestObject->address2);

        $missions = new Missions($missionsId, $requestObject->address1,$requestObject->address2, $requestObject->city, $requestObject->state,
            $requestObject->zipCode, $requestObject->email, $requestObject->phone, $requestObject->pic, $requestObject->serviceTime);
        $missions->insert($pdo);
        $_SESSION["missions"] = $missions;
        $reply->data = "Mission created OK";

        // delete an existing Mission
    } else if($method === "DELETE") {
        verifyXsrf();
        $missions = Missions::getMissionsByMissionsId($pdo, $missionsId);
        $missions->delete($pdo);
        $reply->data = "Missions deleted OK";

        // put to an existing Mission
    } else if($method === "PUT") {
        // convert PUTed JSON to an object
        verifyXsrf();
        $requestContent = file_get_contents("php://input");
        $requestObject = json_decode($requestContent);


        $missions = new Missions($missionsId, $requestObject->address1,  $requestObject->address2,
             $requestObject->city, $requestObject->state,
            $requestObject->zipCode, $requestObject->email, $requestObject->phone, $requestObject->pic,
            $requestObject->serviceTime);
        $missions->update($pdo);
        $reply->data = "Missions updated OK";
    }
    // create an exception to pass back to the RESTful caller
} catch(Exception $exception) {
    $reply->status = $exception->getCode();
    $reply->message = $exception->getMessage();
    unset($reply->data);
}

header("Content-type: application/json");
echo json_encode($reply);
