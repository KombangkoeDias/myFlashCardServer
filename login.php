<?php
include "database.php";
//LOGIN USER
    if (isset($_POST['username']) && isset($_POST['password'])){

    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    //$username = "kbd";
    //$password = "123";
    
    //$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  			
    $results = mysqli_query($connect, $query);
    /*
    while($row = mysqli_fetch_assoc($results)){
        echo "<p>".$row['username']."</p>";
        echo "<input id='".$row['username']."' value='".$row['username']."'>";
    }
    */
    var_dump($results);
    echo mysqli_num_rows($results);
    if(mysqli_num_rows($results) > 0)
    {
        //echo '<script> console.log("login successfully<script>");';
        echo 'login successfully';
        http_response_code(200);
    }
    else {
        //echo '<script> console.log("login failed<script>");';
        echo 'login failed';
        http_response_code(404);
    }
}

