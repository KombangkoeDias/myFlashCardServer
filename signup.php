<?php 
session_start();
include "database.php";
// REGISTER USER
    if (isset($_POST['username']) && isset($_POST['password'])){

    
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    //$username = "kombangkoe";
    //$password = "123";

    $find = "SELECT * FROM users WHERE username = '$username'";
    $findresult = mysqli_query($connect, $find);
    
    echo mysqli_num_rows($findresult);
    if (mysqli_num_rows($findresult) > 0){
        echo "This username is already taken";
        http_response_code(404);
    }
    else{
        $query = "INSERT INTO users (username, password)
                VALUES('$username', '$password')";
        $results = mysqli_query($connect, $query);
        echo "user added successfully";
        http_response_code(200);
    }
}