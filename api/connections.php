<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "api";
 


 if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){

    die("failed to connect!");
 }