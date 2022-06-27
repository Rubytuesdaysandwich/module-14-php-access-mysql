<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/subjects/index.php'));//if id is not set redirect
}
$id = $_GET['id'];

if(is_post_request()) {//if it is a post request process this code

  $result = delete_subject($id);//delete the subject
  redirect_to(url_for('/staff/subjects/index.php'));//redirect after deleting

} else {
  $subject = find_subject_by_id($id);//find the subject to be deleted by the id
}

?>

<?php $page_title = 'Delete Subject';//page title ?>
<?php include(SHARED_PATH . '/staff_header.php'); //path to staff header in shared?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject delete">
    <h1>Delete Subject</h1>
    <p>Are you sure you want to delete this subject?</p>
    <p class="item"><?php echo h($subject['menu_name']); ?></p>

    <form action="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Subject" /><!--submit button-->
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php');//path to staff footer in shared ?>
