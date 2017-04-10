<?php
require_once(dirname(dirname(__DIR__)) . "classes/autoload.php");
require_once(dirname(dirname(__DIR__)) . "classes/xsrf.php");
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
    // sanitize the programsId
    $programsId = filter_input(INPUT_GET, "programsId", FILTER_VALIDATE_INT);
    // sanitize the missionsId
    $missionsId = filter_input(INPUT_GET, "missionsId", FILTER_SANITIZE_STRING);
    // grab the mySQL connection
    $pdo = establishConn("/etc/apache2/ecnchurch.ini");
    // handle all RESTful calls to Program today

    // get some or all Programs
    if ($method === "GET") {
        // set an XSRF cookie on GET requests
        setXsrfCookie("/");
        if (empty($programsId) === false) {
            $reply->data = Programs::getProgramsByProgramsId($pdo, $programsId);
        } else if (empty($missionsId) === false) {
            $reply->data = Programs::getProgramsByMissionsId($pdo, $missionsId);
        } else {
            $reply->data = Programs::getAllPrograms($pdo);
        }


        // post to a new Program
    } else if ($method === "POST") {
        // handle optional fields
        $program = new Programs($programsId, $requestObject->programsId, $requestObject->missionsId,
            $requestObject->date, $requestObject->description, $requestObject->location, $requestObject->programName, $requestObject->time);
        $program->insert($pdo);
        $_SESSION["program"] = $program;
        $reply->data = "Program created OK";
        // delete an existing Program
    } else if ($method === "DELETE") {
        verifyXsrf();
        $programs = Programs::getProgramsByProgramsId($pdo, $programsId);
        $programs->delete($pdo);
        $reply->data = "Program deleted OK";
        // put to an existing Program
    } else if ($method === "PUT") {
        // convert PUTed JSON to an object
        verifyXsrf();
        $requestContent = file_get_contents("php://input");
        $requestObject = json_decode($requestContent);
        $program = new Programs($programsId, $requestObject->programsId, $requestObject->missionsId, $requestObject->date, $requestObject->description,
            $requestObject->location, $requestObject->programName, $requestObject->Time);
        $program->update($pdo);
        $reply->data = "Program updated OK";
        // create an exception to pass back to the RESTful caller
    }
    }catch(Exception $exception) {
        $reply->status = $exception->getCode();
        $reply->message = $exception->getMessage();
        unset($reply->data);
    }

    header("Content-type: application/json");
    echo json_encode($reply);
