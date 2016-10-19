<?php
    // configuration
   require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         $_POST["ipAddress"]; 
         redirect("hud.php");
    } 
   else
    {
        // else render form
        render("select_form.php");
    }
?> 