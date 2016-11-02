<?php

    // configuration
    require("../includes/config.php");
    require ('../aws-autoloader.php');
    use Aws\DynamoDb\Exception\DynamoDbException;
    date_default_timezone_set('America/New_York');
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

    $date = new DateTime();
    $date->getTimestamp();
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
    session_unset();
    session_destroy();
    $_SESSION = array();
    
    // redirect user
    redirect("/");

?>