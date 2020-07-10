<?php
include "database.php";
//if (isset($_SESSION['name'] && isset($_POST['new']))){
    if (isset($_POST['setName']) && isset($_POST['username']) && isset($_POST['vocabulary']) && isset($_POST['meaning'])){
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
        $vocabulary = mysqli_real_escape_string($connect, $_POST['vocabulary']);
        $meaning = mysqli_real_escape_string($connect, $_POST['meaning']);

        $selectCardquery = "SELECT * FROM cards WHERE set_id='$set_id' AND vocabulary='$vocabulary' AND meaning='$meaning'";
        $results = mysqli_query($connect,$selectCardquery);
        while($row = mysqli_fetch_assoc($results)){
           
            $card_id = $row['card_id'];
        }

        $CardQuery = "SELECT * FROM progresses WHERE set_id='$set_id'";
        $results = mysqli_query($connect,$CardQuery);
        if (mysqli_num_rows($results) > 0){
            $updateProgressQuery = "UPDATE progresses SET card_id='$card_id' WHERE set_id = '$set_id'";
            $updateresults = mysqli_query($connect,$updateProgressQuery);
        }
        else{
            $insertProgressQuery = "INSERT INTO progresses (set_id, user_id, card_id) VALUES ('$set_id', '$user_id', '$card_id')";
            $insertResult = mysqli_query($connect, $insertProgressQuery);
        }
        http_response_code(200);
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