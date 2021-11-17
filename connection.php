<?php
   $host        = "host = ec2-107-23-213-65.compute-1.amazonaws.com";
   $port        = "port = 5432";
   $dbname      = "dbname = d30qjptk3irl05";
   $username    = "user = fczrmmypkpyvvr";
   $password    = "password = 579033bc5ba73829b4cd6921b19fc6f9141d7c098c9bc71c2adb507b87e8510d";

   $db = pg_connect( "$host $port $dbname $username $password" );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
?>
