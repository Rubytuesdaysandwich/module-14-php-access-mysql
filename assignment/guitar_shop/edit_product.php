<?php
require_once('database.php');
//! note to self for edit 
// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'Code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

if(isset($_POST['category_id']) || isset($_POST['code']) || isset($_POST['name']) || isset($_POST['price'])){
    $category_id = $_POST['category_id']?? '';
    $code = $_POST['code']?? '';
    $name = $_POST['name']?? ''; 
    $price = $_POST['price']?? ''; 

}

    var_dump($category_id);
    var_dump($code);
    var_dump($name);
    var_dump($price);
    var_dump($_POST);
//Validate inputs
if ($category_id == null || $category_id == false ||
        $code == null || $name == null || $price == null || $price == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');
}



    //!Add the product to the database 
   //todo $products="";
   if(is_post_request()){
         $products=[];//assoc array
         $products['categoryID'] = $_POST['category_id']??'';//post to categoryID
         $products['productCode'] = $_POST['code']??'';//post to product code
         $products['productName'] = $_POST['name']??'';//post to productname
         $products['listPrice'] = $_POST['price']??'';//post to list price
   
         $result = update_products($products); 
         
        }
        
        
        //update items in the database.
//  $sql = "UPDATE products SET  ";//update categories
//  $sql .= "categoryID='" . $products['category_id'] .  "' , ";
//  $sql .= "productCode ='" .$products['code'] .  "',";
//  $sql .= "productName='". $products['name'] . "', ";
//  $sql .= "listPrice='" .$products['price'].  "' ";
//  $sql .= "WHERE productID='" . $products['productID'] . "' ";
//  $sql .= "LIMIT 1";
//  $products= mysqli_query($db,$sql);

var_dump($product);



if(!empty($category_id ||$code || $name ||$price )){
    header('location: index.php');
    
    }else {
        header("location: error.php");
    }
    // Display the Product List page
    
?>