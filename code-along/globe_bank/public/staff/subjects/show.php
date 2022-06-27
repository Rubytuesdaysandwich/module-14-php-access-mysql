<?php require('../../../private/initialize.php');?>
<?php
//$id = isset($_GET['id']) ? $_GET['id']:'1';// this is the older way.
$id =$_GET['id'] ??'1';//php 7.0//special global variable
//sending $id to the browser
echo h($id);
?>

<a href="show.php?name=<?php echo u('John Doe');?>">Link</a><br/>
<a href="show.php?company=<?php echo u('Widgets&More');?>">Link</a><br/>
<a href="show.php?query=<?php echo u('!#*?');?>">Link</a><br/>