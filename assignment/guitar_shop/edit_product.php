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

    // var_dump($category_id);
    // var_dump($code);
    // var_dump($name);
    // var_dump($price);
    // var_dump($_POST);
//Validate inputs
if ($category_id == null || $category_id == false ||
        $code == null || $name == null || $price == null || $price == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');
}



    //update the product to the database 
   if(is_post_request()){
         $products=[];//assoc array
         $products['categoryID'] = $_POST['category_id']??'';//post to categoryID
         $products['productCode'] = $_POST['code']??'';//post to product code
         $products['productName'] = $_POST['name']??'';//post to productname
         $products['listPrice'] = $_POST['price']??'';//post to list price
        $products['productID']= $_POST['productID']??'';//post to product id
         $result = update_products($products); 
         
        }
        
        
//todo delete         $expire = time() + 60*60*24*365;//cookie expires
// if(is_post_request()) {
//     // Form was submitted
//     $instrument= $_POST['categoryID'] ?? '';
//     $category_choice=$_POST['categoryName']?? '';
//     setcookie('categoryID', $instrument, $expire);//set cookies
//     setcookie('categoryName', $instrument, $expire);//set cookies
  
//   } else {
//     // Read the stored value (if any)
//     $instrument = $_COOKIE['categoryID'] ?? '';
//     $category_choice=$_COOKIE['categoryName']??'';
//todo delete   }




if(!empty($category_id ||$code || $name ||$price )){
    header('location: index.php');
    
    }else {
        header("location: error.php");
    }
    // Display the Product List page
    
?>