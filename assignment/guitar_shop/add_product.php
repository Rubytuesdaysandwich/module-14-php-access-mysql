<?php
// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
var_dump($category_id);
var_dump($code);
var_dump($name);
var_dump($price);
// Validate inputs
if ($category_id == null || $category_id == false ||
        $code == null || $name == null || $price == null || $price == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $sql = "INSERT INTO products (categoryID) ";
$sql .= " VALUES('".$category_id."','".$code."','".$name."','".$price."') ";
$products= mysqli_query($db,$sql);

if(!empty($category_id ||$code || $name ||$price )){
    header('location: index.php');
    
    }else {
        header("location: error.php");
    }
    // Display the Product List page
    
}
?>