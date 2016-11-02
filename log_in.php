<?php

    // configuration
    require("../includes/config.php"); 
    use Aws\DynamoDb\Marshaler;
    use Aws\DynamoDb\Exception\DynamoDbException;
    $region='us-east-1';
    $bucket='%bucket%';
    $tmp='';
     

    $table_name = 'users';
    require ('../aws-autoloader.php');
    date_default_timezone_set('America/New_York');
 
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }

	$sdk = new Aws\Sdk([
	    'region'   => 'us-east-1',
	    'version'  => 'latest'
	]);
	
	$dynamodb = $sdk->createDynamoDB();

	$tableName = 'users';

	$username = $_POST["username"];
         $response = $dynamodb->getItem ([
             'TableName' => $tableName,
             'ConsistentRead' => true,
             'Key' => [
             'username' => ['S' => $username]
              ],
             "AttributesToGet" => ["password", "id"] 
         ]);

        // if we found user, check password
       $resToken = $response["Item"]["password"]['S'];
       $idToken = $response["Item"]["id"]['S'];
      
        if (empty($resToken) == false)
        {
        
         //  print_r ($rows['Item']);
            // compare hash of user's input against hash that's in database
            if (crypt($_POST["password"],$resToken) == $resToken)
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $idToken;
            
                $table_name2 = 'rover_log_in';
                $dateTime =  (string)date.timezone_location_get(); 
                // update DynamoDB table with id and time()     
                $response = $dynamodb->putItem([
                    'TableName' => $table_name2,
                    'Item' => [
                    'user_id' => ['S' => $idToken ],                   
                    'log_in' =>['S' => $dateTime], 
                           ]
                ]);
               // redirect to select.php
               redirect("select.php");
            }

        }

        // else apologize
        apologize("Invalid username and/or password.");
    }
    else
    {

        // else render form
        render("login_form.php", ["title" => "Log In"]);
    }

?>