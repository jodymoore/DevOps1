<?php
    // configuration
$region='%region%';
$bucket='%bucket%';
$tmp='';
$categories=NULL;
$table_name = 'AWS-Services';
require 'aws-autoloader.php';
require("../includes/config.php");
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
    // configuration
   
   render("/public/select_form.php");
  
?> 
