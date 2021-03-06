<?php
require 'dbConnection.php';
session_start();

//create variable names by getting values from submit
$eventName = $_POST["eventName"];
$eventLocation = $_POST["eventLocation"];
$eventTime = $_POST["eventTime"];
$eventDescription = $_POST["eventDescription"];
$companyName = $_POST["companyName"]


//Check if the event exist in the first place
// $stmt = $dbc->prepare('SELECT * FROM event WHERE eventName = ?');
// //s means string
// $stmt->bind_param('s', $eventName);
// //$query = "(SELECT * FROM accounts WHERE username= $username)";
// $stmt->execute();
// $response = $stmt->get_result();
// if (!$stmt->execute()) {
//     echo "the statement was not executed";
// }

$stmt = $dbc -> prepare('INSERT INTO event(eventName, eventLocation, eventTime, eventDescription) VALUES(?,?,?,?)');
if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
}

$stmt->bind_param('ssss', $eventName, $eventLocation, $eventTime, $eventDescription);

$event_created = true;
$stmt->execute();
if (!$stmt->execute()) {
    $event_created = True;
}
if ($event_created) {
    echo "Event created!";
} else {
    echo "Error occured during event creation";
}
echo ($row['companyName']);
// // insert event into company_event relationship

// $stmt = $dbc -> prepare('INSERT INTO company_event(companyName, eventName) VALUES(?,?)');
// $stmt -> bind_param('ss', $companyName, $eventName);
// if (!$stmt->execute()) {
//     $event_created = True;
// }
// if ($event_created) {
//     echo "Created";
// } else {
//     echo "ERRPADFJAKS";
// }
//    $phonenumber= $_POST["phonenumber"];
//    $city= $_POST["city"];
//    $state= $_POST["state"];
//    $accounttype= $_POST["accounttype"];

// //check if user exists//
// $stmt = $dbc->prepare('SELECT * FROM accounts WHERE username = ?');
// //s means string
// $stmt->bind_param('s', $username);
// //$query = "(SELECT * FROM accounts WHERE username= $username)";


//check length of response to see if there's a match
// if ($response->num_rows == 0) {
//     //Hash the password
//     $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

//     $user_created = true;

//     //Insert into into database
//     $stmt = $dbc -> prepare('INSERT INTO accounts(username, password, email, accountType) VALUES(?,?,?,?)');
//     $stmt->bind_param('ssss', $username, $hashed_pass, $email, $accountType);

//     if (!$stmt->execute()) {
//         $user_created = false;
//     }

//     $stmt = $dbc -> prepare('INSERT INTO users(username, firstName, lastName, points) VALUES(?,?,?,1)');
//     $stmt->bind_param('sss', $username, $firstname, $lastname);

//     if (!$stmt->execute()) {
//         $user_created = false;
//     }

//     if ($user_created) {
//         echo "Account created successfully!";
//     } else {
//         echo "An error occurred during account creation. If this issue persists, please contact the administrator.";
//     }

// } else {
//     echo "User already exists!";
// }

//Close prepared statement and result set
$stmt -> close();
// $response -> close();

//Close connection
$dbc -> close();

?> 