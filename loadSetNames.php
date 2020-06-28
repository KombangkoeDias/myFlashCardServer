<?php
include "database.php";

if (isset($_POST['username'])){
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $query = "SELECT * FROM users WHERE username='$username'";
    $results = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($results)){
        $user_id = $row['user_id'];
    }    
    $query = "SELECT * FROM sets WHERE user_id='$user_id'";
    $selectresult = mysqli_query($connect, $query);
    $myarray = array();
    while($row = mysqli_fetch_assoc($selectresult)){
        array_push($myarray, $row['name']);
    }
    echo(json_encode($myarray));
    http_response_code(200);
}
else {
    http_response_code(404);
}
