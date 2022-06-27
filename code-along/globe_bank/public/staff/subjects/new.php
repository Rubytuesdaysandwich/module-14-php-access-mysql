<?php require_once('../../../private/initialize.php');//!Header data requires there to be no spaces
//!white space like this is ok
$test = $_GET['test']?? '';

//find subject count
$subject_set = find_all_subjects();//find all subjects in the database
$subject_count = mysqli_num_rows($subject_set) + 1;//get the number of rows + 1
mysqli_free_result($subject_set);
//end find subject count

 $subject =[];
 $subject["position"] = $subject_count;

if(is_post_request()){//checking to see if it is a post request. If it is a get request we get redirected to staff/subjects/new.php'
  // Handle form values sent by new.php
  
  $subject = [];
  $subject['menu_name'] = $_POST['menu_name'] ?? '';//post to menu_name
  $subject['position'] = $_POST['position'] ?? '';//post to position
  $subject['visible'] = $_POST['visible'] ?? '';//post to visible
  
  $result = insert_subject($subject);//insert subject
  if($result===true){
    $new_id = mysqli_insert_id($db);//create a new id
    redirect_to(url_for('/staff/subjects/show.php?id='.$new_id));
  } else{
    $errors = $result;//if not it will return errors to the user
  }
  
  }else {
  //display the blank form
  }
  ?>

<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php');//path to header html ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a><!--send user back to index.php home-->

  <div class="subject new">
    <h1>Create Subject</h1>

  <?php echo display_errors($errors);?>

    <form action="<?php echo url_for('staff/subjects/new.php')?>" method="post"><!--start form for new create form-->
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="" /></dd><!--input for menu name-->
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position"><!--get position-->
          <?php
            for($i=1; $i <= $subject_count; $i++){//options from $subject count
              echo "<option value=\"{$i}\"";
              if($subject["position"]=== $i){
                echo "selected";
              }
              echo "> {$i}</option>";

            }
            ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" /><!--allows to choose not visible-->
          <input type="checkbox" name="visible" value="1" /><!--allows to choose visible -->
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Subject" /><!--submit button-->
      </div>
    </form><!--end form-->

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php');//path to footer for page html ?>

