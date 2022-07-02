<?php
require('database.php');
//Get Categories from the Database
function update_products($products){
global $db;

    $sql = "UPDATE * categories SET  ";
    $sql .= "categoryID='" . $products['category_id'] .  "'  ";
    $sql .= "productCode ='" .$products['code'].  "' ";
    $sql .= "productName='". $products['name']. "' ";
    $sql .= "listPrice='" .$products['price'].  "' ";
    $sql .= "WHERE productID='" . $products['productID'] . "' ";
    $sql .= "LIMIT 1";
    $result= mysqli_query($db,$sql);

}


if($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }

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
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //tracking if form is submitted
        $category_id =$_POST['category_id'] ?? '';
        $code =$_POST['code']??'';
        $name =$_POST['name']??'';
        $price =$_POST['price']??'';
        
       // if it is a post request this will get value for the session
        $_SESSION['category_id'] =$category_id;
        $_SESSION['code'] =$code;
        $_SESSION['name'] =$name;
        $_SESSION['price'] =$price;
        
        update_products($products);
    }else{
        //if not post request it will output them
        $category_id=$_SESSION['category_id'] ??'';
        $code=$_SESSION['code'] ??'';
        $name=$_SESSION['name'] ??'';
        $price=$_SESSION['price'] ??'';
    }

    // $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    // $code = filter_input(INPUT_POST, 'code');
    // $name = filter_input(INPUT_POST, 'name');
    // $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);


?>

    <header><h1>Product Manager</h1></header>

    <main>
        <h1>edit product</h1>
        <form action="edit_product.php" method="post"
              id="add_product_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Code:</label>
            <input type="text" name="code"><br>

            <label>Name:</label>
            <input type="text" name="name"><br>

            <label>List Price:</label>
            <input type="text" name="price"><br>

            <label>&nbsp;</label>
            <input type="submit" value="edit product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>