<?php
require_once('database.php');
$categoryName = filter_input(INPUT_POST, 'categoryName');

var_dump($categoryName);
// Validate inputs
if ($categoryName == null || $categoryName == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else{
    require_once('category_list.php');
}

$sql = "INSERT INTO categories (categoryName) ";
$sql .= " VALUES('".$categoryName."') ";
$categories= mysqli_query($db,$sql);


if(!empty($categories)){
header('location: index.php');

}else {
    header("location: error.php");
}
?>