<?php
    // configuration
   require 'aws-autoloader.php';

   $region='%region%';
   $bucket='%bucket%';

   echo '<!DOCTYPE html>';
   echo '<html>';
   echo '<head>';
   echo '<link href="href="http://' . $bucket  . '.s3.amazonaws.com/public/css/bootstrap.css" rel="stylesheet"/>';
   echo '<link href="http://' . $bucket  . '.s3.amazonaws.com/public/css/bootstrap.min.css" rel="stylesheet"/>';
   echo '<link href="http://' . $bucket  . '.s3.amazonaws.com/public/css/bootstrap-theme.min.css" rel="stylesheet"/>';
   echo '<link href="http://' . $bucket  . '.s3.amazonaws.com/public/css/styles.css" rel="stylesheet"/>';
   echo '<link href="http://' . $bucket  . '.s3.amazonaws.com/public/css/bootstrap.theme.css" rel="stylesheet"/>';

 if (isset($title)): 
            <title>Rover1: = htmlspecialchars($title) </title>
         else: 
            <title>Rover1</title>
         endif 

   echo '<script src="http://' . $bucket  . '.s3.amazonaws.com/public/js/jquery-1.10.2.min.js"></script>';
   echo '<script src="http://' . $bucket  . '.s3.amazonaws.com/public/js/bootstrap.min.js"></script>';
   echo '<script src="http://' . $bucket  . '.s3.amazonaws.com/public/js/bootstrap.js"></script>';
   echo '<script src="http://' . $bucket  . '.s3.amazonaws.com/public/js/scripts.js"></script>';
   echo '</head>';

   echo '<body>';
   echo '<div class="container">';
   echo '<div id="top">';
   echo '<a><img alt="Rover1" src="http://' . $bucket  . '.s3.amazonaws.com/public/img/Rover-1.gif"/></a>';
   echo '</div>';         
   echo '<div id="middle">';
   echo '<form action="select.php" method="post">';
   echo '<a  align="center"><img id="img2"alt="Rover" width="500" height="400" src="http://' . $bucket  . '.s3.amazonaws.com/public/img/rover_img5.jpg"/></a>';
   echo '<fieldset>';
   echo '<ul  class="nav nav-pills ">';
   echo '<div>';
   echo '<li><a href="demo.php">Demo</a></li>';
   echo '</div> ';
   echo '<li><a href="hud.php">With WiFi Camera</a></li>';
   echo '<li><a href="hud2.php">With Out WiFi Camera</a></li>';
   echo '</ul>';
   echo '</fieldset>';
   echo '</form>';
   echo '</div>';
   echo '</body></html>';

?> 
