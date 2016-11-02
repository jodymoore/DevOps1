<?php

    // configuration
    require("../includes/config.php"); 



    $idToken  = $_SESSION["id"];
            
    $table_name2 = 'rover_log_out';
    $dateTime =  (string)date('m/d/Y G:m:s'); 
    // update DynamoDB table with id and time()     
     $response = $dynamodb->putItem([
        'TableName' => $table_name2,
        'Item' => [
        'user_id' => ['S' => $idToken ],                   
        'log_out' =>['S' => $dateTime], 
                           ]
        ]);

    // log out current user, if any
    logout();
    session_destroy();
    // redirect user
    redirect("/");

?>