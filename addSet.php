<?php
session_start();
include "database.php";
//if (isset($_SESSION['name'] && isset($_POST['new']))){
    $_SESSION['name'] = "kbd";
    $username = mysqli_real_escape_string($connect, $_SESSION['name']);
    $query = "SELECT * FROM users WHERE username='$username'";
    $results = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($results)){
        $user_id = $row['user_id'];
    }    
    $query = "INSERT INTO sets (user_id,name) VALUES ('$user_id',".$_POST["setName"].")";
    $insertresults = mysqli_query($connect, $query);
    /*
}
else{
    http_response_code(404);
}
*/