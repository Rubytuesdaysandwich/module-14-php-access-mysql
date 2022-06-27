<?php
if (!isset($page_title)){$page_title='staff Area';}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GBI<?php echo $page_title;?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href=<?php echo url_for('/stylesheets/staff.css');//pulling css from stylesheets staff.css?>>
  </head>
  <body>
  <header> 
      <h1>GBI staff Area</h1> 
</header>   
<navigation>
    <ul>
      <li>user:<?php echo $_SESSION['username']??'';?></li><!--show who the current logged in person is for the session-->
        <li> <a href =" <?php echo url_for('/staff/index.php');//for menu button in the header?>">Menu</a></li>
        <li> <a href =" <?php echo url_for('/staff/logout.php');//for logout button in the header?>">Logout</a></li>
    </ul>
</navigation>