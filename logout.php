<?php

    // configuration
    require("../includes/config.php"); 

    date_default_timezone_set('America/NewYork');
    $region='us-east-1';
    $bucket='%bucket%';
    $tmp='';

    	$sdk = new Aws\Sdk([
	    'region'   => 'us-east-1',
	    'version'  => 'latest'
	]);

    $dynamodb = $sdk->createDynamoDB();

    $idToken  = $_SESSION["id"];
            
    $table_name2 = 'rover_log_out';
    
    $dateTime =  (string)date.timezone_location_get(); 
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