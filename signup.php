<?php 
session_start();
include "database.php";
// REGISTER USER

    
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $find = "SELECT FROM users WHERE username='$username'";
    $findresult = mysqli_query($connect, $find);
    if (findresult > 0){
        echo "This username is already taken";
        http_response_code(404);
    }
    else{
        $query = "INSERT INTO users (username, password)
                VALUES('$username', '$password')";
        $results = mysqli_query($connect, $query);
        if($results>0)
        {
            echo "user added successfully";
            http_response_code(200);
        }
    }