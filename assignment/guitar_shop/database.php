<?php

define("DB_SERVER","localhost");
define("DB_USER","guitar_pro");
define("DB_PASS","passhere");
define("DB_NAME","my_guitar_shop");
$db=db_connect();
session_start();

//Create database connection
function db_connect(){
    $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);//mysqli connection establish
    confirm_db_connect();//confirm the connection
    return $connection;
}

function db_disconnect($connection){
if(isset($connection)){//if connection is set disconnect
mysqli_close($connection);//close the connection
}
}

function confirm_db_connect() {//confirm the connection is good
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";//if the connection fails output this $msg
      $msg .= mysqli_connect_error();//connection error
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

  function confirm_result_set($result_set) {
    if (!$result_set) {
      redirect('/guitar_shop/database_error.php');//should redirect the user to database_error.php if the result of the connection is not good.
    //	exit("Database query failed.");//if database query fails then exit
    }
  }
  //connect to database end
//protecting data sql injection

  function db_escape($connection, $string){
    return mysqli_real_escape_string($connection, $string);
  }
  //select all from categories should return instruments.
 function select_all_categories($categories){
  global $db;
  $sql = "SELECT * FROM categories ";
  $sql .= " ORDER BY categoryID ASC ";
   $categories= mysqli_query($db,$sql);

 return $categories;

 }
//select all items where product id eqauls the productID
function select_from_product_with_id($product_id){
global $db;
  $sql = "SELECT * FROM products ";
  $sql .= " WHERE productID='". $product_id .  "' ";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $products = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return$products;
}

//update products
function update_products($products){
  $sql = "UPDATE products SET  ";//update categories
  $sql .= "categoryID='" . $products['category_id'] .  "' , ";
  $sql .= "productCode ='" .$products['code'] .  "',";
  $sql .= "productName='". $products['name'] . "', ";
  $sql .= "listPrice='" .$products['price'].  "' ";
  $sql .= "WHERE productID='" . $products['productID'] . "' ";
  $sql .= "LIMIT 1";
  $products= mysqli_query($db,$sql);
}
?>