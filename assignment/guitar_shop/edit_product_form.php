<?php
//* note to self make product page php and move update function to that page.
require('database.php');
$sql = "SELECT * FROM products ";
$sql .= " ORDER BY categoryID ASC ";
$categories= mysqli_query($db,$sql);
//Get products from the Database

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
        
 }

?>

    <header><h1>Product Manager</h1></header>

    <main>
        <h1>edit product</h1>
        <form action="edit_product.php?product_id=" method="post"
              id="add_product_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($products as $product) : ?>
                <option value="<?php echo $product['productID']; ?>">
                    <?php echo $product['categoryID'];?>
                
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