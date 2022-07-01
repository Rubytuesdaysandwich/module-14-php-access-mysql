
<?php
 function find_name_selected_category() {//find all subjects from subjects database
     global $db;//grabbing db from the outside scop so it has access

    $sql = "SELECT categoryName FROM categories  ";//select categories
    $sql .= "WHERE categoryID='" . db_escape($db,$category_id) . "'";//by category name
    //*echo $sql; this can be used to trouble shoot connection
    $result = mysqli_query($db, $sql);//send the query to the database
    $row = $result -> fetch_assoc();//fetch assoc array assign to $row
    $category_name = $row['categoryName'];//get the row from the category name

     return $category_name;
   }
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