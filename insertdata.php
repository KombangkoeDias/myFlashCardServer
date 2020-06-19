<?php 
include "config.php";
// REGISTER USER

    
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    
  
        $query = "INSERT INTO users (username, password)
  			  VALUES('$username', '$password')";
    $results = mysqli_query($connect, $query);
    if($results>0)
    {
        echo "user added successfully";
    }