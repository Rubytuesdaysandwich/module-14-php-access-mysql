<?php require_once('../private/initialize.php'); ?>

<?php

if(is_post_request()) {
  // Form was submitted
  $language = $_POST['language'] ?? 'Any';
  $expire = time() + 60*60*24*365;
  setcookie('language', $language, $expire);

} else {
  // Read the stored value (if any)
  $language = $_COOKIE['language'] ?? 'Any';
}

?>

<?php include(SHARED_PATH . '/public_header.php');//path to public header in the shared folder ?>

<div id="main">

  <?php include(SHARED_PATH . '/public_navigation.php');//path to public navigation in the shared folder ?>

  <div id="page">

    <div id="content">
      <h1>Set Language Preference</h1>

      <p>The currently selected language is: <?php echo $language; ?></p>

      <form action="<?php echo url_for('/language.php'); ?>" method="post"><!--Post method being used to browser to the language.php form single page submission-->

        <select name="language">
          <?php
            $language_choices = ['Any', 'English', 'Spanish', 'French', 'German'];//language selection
            foreach($language_choices as $language_choice) {
              echo "<option value=\"{$language_choice}\"";//start of option language choice
              if($language == $language_choice) {
                echo " selected";//echo the selected language back to the user
              }
              echo ">{$language_choice}</option>";//end language choice out of choices
            }
          ?>
        </select><br />
        <br />
        <input type="submit" value="Set Preference" /><!--submit the selected the language of their choice-->
      </form>
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php');//path to public footer in shared folder ?>
