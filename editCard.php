<?php
include "database.php";
//if (isset($_SESSION['name'] && isset($_POST['new']))){
    if (isset($_POST['setName']) && isset($_POST['username']) && isset($_POST['vocabulary']) 
    && isset($_POST['meaning']) && isset($_POST['newvocabulary']) && isset($_POST['newmeaning'])){
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

        $newVocabulary = mysqli_real_escape_string($connect, $_POST['newvocabulary']);
        $newMeaning = mysqli_real_escape_string($connect, $_POST['newmeaning']);

        $selectquery = "SELECT * FROM cards WHERE set_id='$set_id' AND vocabulary='$vocabulary' AND meaning='$meaning'";
        $selectresult = mysqli_query($connect,$selectquery);

        $checkquery = "SELECT * FROM cards WHERE set_id='$set_id' AND vocabulary='$newVocabulary'";
        $checkresult = mysqli_query($connect,$checkquery);

        if (mysqli_num_rows($checkresult) > 0){
            http_response_code(404);
        }
        else{
            if (mysqli_num_rows($selectresult) > 0){
                $updateCardQuery = "UPDATE cards SET vocabulary='$newVocabulary', meaning='$newMeaning' WHERE vocabulary='$vocabulary' AND meaning='$meaning'";
                $results = mysqli_query($connect,$updateCardQuery);
                http_response_code(200);
            }
            else{
                http_response_code(404);
            }
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