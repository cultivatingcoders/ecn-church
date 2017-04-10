<?php
require_once(dirname(dirname(__DIR__)) . "/classes/autoload.php");
/**require_once(dirname(dirname(__DIR__)) . "/lib/xsrf.php");*/
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

    // sanitize the membersId
    $membersId = filter_input(INPUT_GET, "membersId", FILTER_VALIDATE_INT);

    // sanitize the email
    $email = filter_input(INPUT_GET, "email", FILTER_SANITIZE_EMAIL);

  /**  // grab the mySQL connection
    $pdo = establishConn("/etc/apache2/ecnchurch.ini");*/

    // handle all RESTful calls to Members today

    // get some or all Members
    if($method === "GET") {

        // set an XSRF cookie on GET requests
        setXsrfCookie("/");
        if(empty($membersId) === false) {
            $reply->data = Members::getMembersByMembersId($pdo, $membersId);
        } else if(empty($email) === false) {
            $reply->data = Members::getMembersByEmail($pdo, $email);

        } else {
            $reply->data = Members::getAllMembers($pdo);
        }

        // post to a new Members
    } else if($method === "POST") {

        // convert POSTed JSON to an object
        verifyXsrf();
        $requestContent = file_get_contents("php://input");
        $requestObject = json_decode($requestContent);
        if($requestObject->password !== $requestObject->passwordConfirm) {
            throw(new InvalidArgumentException("passwords do not match", 400));
        }
        $salt = bin2hex(openssl_random_pseudo_bytes(32));
        $hash = hash_pbkdf2("sha512", $requestObject->password, $salt, 262144, 128);

        // handle optional fields
        $attention = (empty($requestObject->attention) === true ? null : $requestObject->attention);
        $addressLineTwo = (empty($requestObject->addressLineTwo) === true ? null : $requestObject->addressLineTwo);
        $members = new Members($membersId, $requestObject->lastName, $requestObject->firstName, false, $attention,
            $requestObject->address1, $requestObject->address2, $requestObject->city, $requestObject->state,
            $requestObject->zip, $requestObject->email, $requestObject->phoneNumber, $salt, $hash);
        $members->insert($pdo);
        $_SESSION["members"] = $members;
        $reply->data = "Members created OK";

        // delete an existing Members
    } else if($method === "DELETE") {
        verifyXsrf();
        $members = Members::getMembersByMembersId($pdo, $membersId);
        $members->delete($pdo);
        $reply->data = "Members deleted OK";

        // put to an existing Members
    } else if($method === "PUT") {

        // convert PUTed JSON to an object
        verifyXsrf();
        $requestContent = file_get_contents("php://input");
        $requestObject = json_decode($requestContent);
        $salt = bin2hex(openssl_random_pseudo_bytes(32));
        $hash = hash_pbkdf2("sha512", $requestObject->password, $salt, 262144, 128);
        $members = new Members($membersId, $requestObject->lastName, $requestObject->firstName, $requestObject->activation,  $requestObject->email,
            $hash,$requestObject->phone, $requestObject->position, $requestObject->zip, $requestObject->state, $requestObject->city, $requestObject->address1,
            $requestObject->address2, $requestObject->gender, $requestObject->dob, $salt);
        $members->update($pdo);
        $reply->data = "Members updated OK";
    }

    // create an exception to pass back to the RESTful caller
} catch(Exception $exception) {
    $reply->status = $exception->getCode();
    $reply->message = $exception->getMessage();
    unset($reply->data);
}
header("Content-type: application/json");
echo json_encode($reply);
