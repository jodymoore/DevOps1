<?php

    //configuration
    require("../includes/config.php");
    
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
        // query sql database for info       
        $result = query("INSERT INTO users (username, hash) VALUES(?, ?)", $_POST["username"],crypt($_POST["password"])); 
        if ($result === false )
        {
            render("register_form.php", ["title" => "Register"]); 
        }
        else
        {
            $rows = query("SELECT LAST_INSERT_ID() AS id");
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