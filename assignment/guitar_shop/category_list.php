<?php
require_once('database.php');

// Get all categories
$sql = "SELECT * FROM categories ";
$sql .= " ORDER BY categoryID ASC ";
$categories= mysqli_query($db,$sql);




echo $sql;
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Product Manager</h1></header>
<main>
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        
        <!-- add code for the rest of the table here -->
<?php foreach($categories as $category) : ?>
        <!-- <td><?php //echo $category['categoryID']; ?></td> -->
        <td><?php echo $category['categoryName']; ?></td>


<?php endforeach;   ?>
    </table>

    <h2>Add Category</h2>
    
    <!-- add code for the form here -->
        <form action="add_category.php" method="post">
        <!-- <input type="text" name="categoryID" placeholder="ID"> -->
        <input type="text" name="categoryName"placeholder="Name">
        <input type="submit" value="add">
        </form>

    <br>
    <p><a href="index.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>