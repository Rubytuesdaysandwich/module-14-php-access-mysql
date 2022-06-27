<?php 

require_once('../../../private/initialize.php');//!Header data requires there to be no spaces
//!white space like this is ok
//single page processing sends the information back to the user before submission so they can make sure it is correct submits it itself back to itself.

if(!isset($_GET['id'])){//makes the page go back to subject/new.php if there is no id present
    redirect_to(url_for('staff/subjects/new.php'));}

    $id=$_GET['id'];//set variable $id to $_GET['id']
    $menu_name='';//empty string assigned as default values to variables
    $position ='';//empty string assigned as default values to variables
    $visible= '';//empty string assigned as default values to variables

if(is_post_request()){//checking if it is a post request.
    // Handle form values sent by new.php
    
    $subject = [];
    $subject['id'] = $id;
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $result = update_subject($subject);
    if($result === true) {
    redirect_to(url_for('/staff/subjects/show.php?id=' . $id));
  } else {
    $errors = $result;
    //var_dump($errors);
  }

} else {

  $subject = find_subject_by_id($id);

}

$subject_set = find_all_subjects();
$subject_count = mysqli_num_rows($subject_set);
mysqli_free_result($subject_set);


?>
<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php');//header html ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a><!--send user back to index.php-->


<?php echo display_errors($errors);//display the errors at the top of them form?>

  <div class="subject edit">
    <h1>Edit Subject</h1>

    <form action="<?php echo url_for('/staff/subjects/edit.php?id='.h(u(($id))));?>" method="post"><!--start of form-->
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo $menu_name;?>" /></dd><!--gets the menu name back from the user-->
      </dl>
      <dl>
        <dt>Position</dt><!--get position-->
        <dd>
          <select name="position"><!--get the position-->
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" /><!--allows us to check  not visible-->
          <input type="checkbox" name="visible" value="1" /><!--allows us to check visible-->
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Subject" /><!--submit button submits the form to be edited-->
      </div>
    </form><!--end form-->

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php');//path to footer for page html ?>
