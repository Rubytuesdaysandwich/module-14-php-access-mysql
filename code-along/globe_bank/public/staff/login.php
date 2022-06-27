<?php
require_once('../../private/initialize.php');

$errors = [];//default value set
$username = '';
$password = '';

if(is_post_request()) {//checks if it is post request if it is process the information entered

  $username = $_POST['username'] ?? '';//get username and post
  $password = $_POST['password'] ?? '';//get password and post

  $_SESSION['username'] = $username;//asks for the username

  redirect_to(url_for('/staff/index.php'));//redirect to staff page after login
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/staff_header.php');//path to staff header ?>

<div id="content">
  <h1>Log in</h1><!--login header-->

  <?php echo display_errors($errors);//if there are errors display them ?>

  <form action="login.php" method="post"><!--display login form-->
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Submit"  />
  </form><!--end form-->

</div>

<?php include(SHARED_PATH . '/staff_footer.php');//staff footer ?>
