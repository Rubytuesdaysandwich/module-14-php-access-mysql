<?php
//* note to self make product page php and move update function to that page.
require_once('database.php');
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$categoryName = filter_input(INPUT_POST, 'categoryName');



$categories=select_all_categories($category_id);
//Get categories from the Database

?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>

<?php
$product = select_from_product_with_id($product_id);
//retrieve product from database by the id

$expire = time() + 60*60*24*365;//cookie expires
if(is_post_request()) {
    // Form was submitted
    $instrument= $_POST['category_id'] ?? '';
    $category_choice=$_POST['categoryName']?? '';
    setcookie('category_id', $instrument, $expire);//set cookies
    setcookie('categoryName', $category_choice, $expire);//set cookies
    
} else {
    // Read the stored value (if any)
    $instrument = $_COOKIE['category_id'] ?? '';
    $category_choice = $_COOKIE['categoryName'] ?? '';
}
var_dump($product);
var_dump($categories);
var_dump($_POST);
  var_dump($_COOKIE);
?>

    <header><h1>Product Manager</h1></header>

    <main>
        <h1>edit product</h1>
        <form action="edit_product.php"  method="post" id="add_product_form">
            <input type="hidden" name="productID"value=<?php echo $product_id;?>>
            <label>Category:</label>
            <select name="category_id">
            <?php 
            foreach($categories as $category_choice) {
                echo "<option value=\"{$category_choice['category_id']}\"";//start of option language choice
                if($instrument == $category_choice) {
                  echo " selected";//echo the selected instrument back to the user
                }
                echo ">{$category_choice['categoryName']}</option>";//end language choice out of choices
              }
              ?>
            <?php //endforeach; ?>
            </select><br>

            <label>Code:</label>
            <input type="text" name="code" value="<?php echo $product['productCode']; ?>"><br>

            <label>Name:</label>
            <input type="text" name="name"value="<?php echo $product['productName']; ?>"><br>

            <label>List Price:</label>
            <input type="text" name="price"value="<?php echo $product['listPrice'];  ?>"><br>

            <label>&nbsp;</label>
            <input type="submit" value="edit product" ><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>