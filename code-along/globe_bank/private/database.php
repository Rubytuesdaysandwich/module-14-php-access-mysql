<?php

  require_once('db_credentials.php');//calling to db_credentials
//using constants from db_credentials passed to connect
  function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);//connect to mysqli with DB_SERVER, DB_USER, DB_PASS, DB_NAME
    confirm_db_connect();//confirm the connection
    return $connection;//return the $connection variable 
  }

  function db_disconnect($connection) {
    if(isset($connection)) {//if connection is set then disconnect
      mysqli_close($connection);//close the connection
    }
  }

  function confirm_db_connect() {//confirm the connection is good
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";//if the connection fails output this $msg
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

  function confirm_result_set($result_set) {
    if (!$result_set) {
    	exit("Database query failed.");//if database query fails then exit
    }
  }

?>
