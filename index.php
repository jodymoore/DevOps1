<?php
    // configuration
$region='%region%';
$bucket='%bucket%';
$tmp='';
$categories=NULL;
$table_name = 'AWS-Services';
require 'aws-autoloader.php';
date_default_timezone_set('UTC');
try {
   $sdk = new Aws\Sdk([
         'region' => $region,
      'version'   => 'latest'
   ]);

   $dynamodb = $sdk->createDynamoDb();
   $response = $dynamodb->describeTable(array('TableName' => $table_name));
   $categories = $dynamodb->scan(array(   'TableName' => $table_name, 
                  'AttributeValueList' => array(array('S' => 'Category'))
   ));
}
catch(Exception $e) {
   $tmp=$e->getMessage();
   $categories=NULL;
}

  
   echo '<html>';
   echo '<head>';
  
   echo '<link rel="stylesheet" href=http://' . $bucket  . '.s3.amazonaws.com/public/css/bootstrap.css" />';
   echo '<link  rel="stylesheet" href="http://' . $bucket  . '.s3.amazonaws.com/public/css/bootstrap.min.css" />';
   echo '<link rel="stylesheet" rel="stylesheet" href="http://' . $bucket  . '.s3.amazonaws.com/public/css/bootstrap-theme.min.css" />';
   echo '<link rel="stylesheet" href="http://' . $bucket  . '.s3.amazonaws.com/public/css/styles.css" />';
   echo '<link  rel="stylesheet" href="http://' . $bucket  . '.s3.amazonaws.com/public/css/bootstrap.theme.css" />';
   
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
