<?php
require_once('database.php');

$categories = array("categoryID"=>"","categoryName"=>"");
$products = array("productCode"=>"","productName"=>"","listPrice"=>"","productID"=>"","categoryID"=>"");
// $category_name="";


// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}
// Get name for selected category

// function find_name_selected_category() {//find all subjects from subjects database
    // global $db;//grabbing db from the outside scop so it has access

    $sql = "SELECT categoryName FROM categories  ";//select categories
    $sql .= "WHERE categoryID='" . $category_id . "'";//by category name
    //*echo $sql; this can be used to trouble shoot connection
    $result = mysqli_query($db, $sql);//send the query to the database
    $row = $result -> fetch_assoc();//fetch assoc array assign to $row
    $category_name = $row['categoryName'];//get the row from the category name

    // return $category_name;
//   }
// Get all categories,
// function find_all_categories() {//find categories from database
    // global $db;//grabbing db from the outside scop so it has access

    $sql = "SELECT * FROM categories ";//select categories
    $sql .= "ORDER BY categoryID  ASC";//order by position
    //*echo $sql; this can be used to trouble shoot connection
    $categories = mysqli_query($db, $sql);
    // confirm_result_set($result);//confirm the result
    // return $result;
//   }

// Get products for selected category
//function find_products() {//find all products from my guitar database
    //global $db;//grabbing db from the outside scop so it has access

    $sql = "SELECT * FROM products ";//select subjects
    //$sql .= "ORDER BY productID ASC";//order by position
    //*echo $sql; this can be used to trouble shoot connection
    $products = mysqli_query($db, $sql);
    //confirm_result_set($result);//confirm the result
    //return $result;
  //}

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
    <h1>Product List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <nav>
        <ul>
            <?php foreach ($categories as $category) : ?>
            <li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>          
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th class="right">Price</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['productName']; ?></td>
                <td class="right"><?php echo $product['listPrice']; ?></td>
                <td><form action="delete_product.php" method="post">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['productID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_product_form.php">Add Product</a></p>
        <p><a href="category_list.php">List Categories</a></p>        
    </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
</footer>
</body>
</html>