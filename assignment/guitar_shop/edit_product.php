<?php
require_once('database.php');
//! note to self for edit 
// Get the product data

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    var_dump($category_id);
    var_dump($code);
    var_dump($name);
    var_dump($price);
//Validate inputs
if ($category_id == null || $category_id == false ||
        $code == null || $name == null || $price == null || $price == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    //!Add the product to the database  
$products['productID'] = $_POST['product_id']??'';
$products['categoryID'] = $_POST['category_id']??'';
$products['productCode'] = $_POST['code']??'';
$products['productName'] = $_POST['name']??'';
$products['listPrice'] = $_POST['price']??'';


   

 //update items in the database.
//  $sql = "UPDATE products SET  ";//update categories
//  $sql .= "categoryID='" . $products['category_id'] .  "' , ";
//  $sql .= "productCode ='" .$products['code'] .  "',";
//  $sql .= "productName='". $products['name'] . "', ";
//  $sql .= "listPrice='" .$products['price'].  "' ";
//  $sql .= "WHERE productID='" . $products['productID'] . "' ";
//  $sql .= "LIMIT 1";
//  $products= mysqli_query($db,$sql);
update_products($products);


if(!empty($category_id ||$code || $name ||$price )){
    header('location: index.php');
    
    }else {
        header("location: error.php");
    }
    // Display the Product List page
    
}
?>