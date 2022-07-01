<?php
require('database.php');
//Get Categories from the Database
$sql = "SELECT * FROM categories ";
$sql .= " ORDER BY categoryID ASC ";
$categories= mysqli_query($db,$sql);
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
        $categories=$_POST[''] ?? '';
        $=$_POST['']??'';
        $=$_POST['']??'';
        if it is a post request this will get value for the session
        $_SESSION[''] =$;
        $_SESSION[''] =$;
        $_SESSION[''] =$;

    }else{
        if not postrequest it will output them
        $=$_SESSION['investment'] ??'';
        $=$_SESSION['interest_rate'] ??'';
        $=$_SESSION['years'] ??'';
    }




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