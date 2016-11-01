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
    date_default_timezone_set('UTC');
  
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

        
    date_default_timezone_set('UTC');

    $sdk = new Aws\Sdk([
        'region'   => 'us-east-1',
        'version'  => 'latest'
    ]);
    
    $dynamodb = $sdk->createDynamoDb();
    $marshaler = new Marshaler();

    $tableName = 'users';

    $username = (string)$_POST["username"];
         $rows = $dynamodb->getItem ([
         'TableName' => $tableName,
          'ConsistentRead' => true,
           'Key' => [
                  'username' => [
                        'S' => $username 
                 ] 
            ],
            'ProjectionExpression' => 'username, hashV, id' 
         ] );
        print_r ( $response ['Item'] );
        // if we found user, check password
       
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];
            
                $table_name2 = 'rover_log_in';
             
             require ('../aws-autoloader.php'); 
             date_default_timezone_set('UTC');
             try {
                 $sdk = new Aws\Sdk([
                    'region'    => $region,
                    'version'   => 'latest'
             ]);

             $dynamodb = $sdk->createDynamoDb();

             }
             catch(Exception $e) {
                   $tmp=$e->getMessage();
              }
              

                // update DynamoDB table with id and time()     
                $response = $dynamodb->putItem([
                    'TableName' => $table_name2,
                    'Item' => [
                    'id' => ['N' => $_SESSION["id"]],                   
                    'log_in' =>['N' => time()], 
                           ]
                ]);
          
               // redirect to select.php
                redirect("select.php");
            }

        }

        // else apologize
     //   apologize("Invalid username and/or password.");
    }
    else
    {

        // else render form
        render("login_form.php", ["title" => "Log In"]);
    }

?>