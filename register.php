<?php

    //configuration
    require("/includes/config.php");
  
    $tableName = 'users';

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if username is empty apologize
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        // if password is empty apologize
        if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        // if password doesnt match confimation apologize
        if ($_POST["password"] != $_POST["confirmation"])
        {
              apologize("Invalid username and/or password.");
        }
        // update Table DynamoDB with users info       
        $result = $dynamodb->updateTable([
            'TableName' => $tableName,
            'id' => uniqid(),
            'username' => $_POST["username"],
            'hash' => crypt($_POST["password"])),
        ]);

        if ($result === false )
        {
            render("register_form.php", ["title" => "Register"]); 
        }
        else
        {
            //$rows = query("SELECT LAST_INSERT_ID() AS id");

            $rows = $dynamodb->scan(['TableName' => 'users']);
            
             foreach ($row['Items'] as $key => $value) {  // ***** Debugging *****
                 print($value);
             }

            $id = $rows[0]["id"];
           
            // remember that user's now logged in by storing user's ID in session
            $_SESSION["id"] = $rows["id"];
              
            // redirect to portfolio
            redirect("/");
        }
                        
    }
    else
    {
        //else render form
        render("register_form.php", ["title" => "Register"]);
    }
    
?>