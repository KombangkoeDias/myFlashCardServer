<?php
include "database.php";
//if (isset($_SESSION['name'] && isset($_POST['new']))){
    if (isset($_POST['setName']) && isset($_POST['username'])){
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $setName = mysqli_real_escape_string($connect,$_POST['setName']);

        $userquery = "SELECT * FROM users WHERE username='$username'";
        $results = mysqli_query($connect, $userquery);
        while($row = mysqli_fetch_assoc($results)){
            $user_id = $row['user_id'];
        }
        
        $setquery = "SELECT * FROM sets WHERE user_id='$user_id' AND name='$setName'";
        $results = mysqli_query($connect,$setquery);
        while($row = mysqli_fetch_array($results)){
            $set_id = $row['set_id'];
        }

        $seeCardQuery = "SELECT * FROM progresses WHERE set_id = '$set_id' AND user_id = '$user_id'";
        $results = mysqli_query($connect,$seeCardQuery);
        if (mysqli_num_rows($results) > 0){
            while($row = mysqli_fetch_assoc($results)){
                $card_id = $row['card_id'];
             }
     
             $progressQuery = "SELECT * FROM cards WHERE card_id = '$card_id'";
             $results = mysqli_query($connect,$progressQuery);
     
             $mycard = Array();
         
             while($row = mysqli_fetch_assoc($results)){
                 array_push($mycard,$row['vocabulary']);
                 array_push($mycard,$row['meaning']);
             }
             echo(json_encode($myarray));
             http_response_code(200);
        }
        else{
            echo(json_encode(Array()));
            http_response_code(203);
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