<?php
include "database.php";
//if (isset($_SESSION['name'] && isset($_POST['new']))){
    if (isset($_POST['setName']) && isset($_POST['username'])){
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $query = "SELECT * FROM users WHERE username='$username'";
        $results = mysqli_query($connect, $query);
        while($row = mysqli_fetch_assoc($results)){
            $user_id = $row['user_id'];
        }    
        $setName = $_POST['setName'];

        $checkquery = "SELECT * FROM sets WHERE user_id='$user_id' AND name='$setName'";
        $checkresult = mysqli_query($connect,$checkquery);
        if (mysqli_num_rows($checkresult) > 0){
            http_response_code(404);
        }
        else{
            $query = "INSERT INTO sets (user_id,name) VALUES ('$user_id','$setName')";
            $insertresults = mysqli_query($connect, $query);
            http_response_code(200);
        }
    }
    else {
        http_response_code(404);
    }
    /*
}
else{
    http_response_code(404);
}
*/