<?php

    // configuration
    require("/includes/config.php"); 

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

        $params = [
            'TableName' => 'users',
            'ProjectionExpression' => 'id,username,hash',
            'FilterExpression' => 'username = '. $POST["username"] .' ',
        ];

        $rows = $result = $dynamodb->scan($params);

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

               // update DynamoDB table with id and time()       
               $result = $dynamodb->updateTable([
                 'TableName' => 'rover_log_in',
                 'id' => $_SESSION["id"]),                   
                 'log_in' => time(),    
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