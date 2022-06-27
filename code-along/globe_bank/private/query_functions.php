<?php

  // Subjects

  function find_all_subjects() {//find all subjects from subjects database
    global $db;//grabbing db from the outside scop so it has access

    $sql = "SELECT * FROM subjects ";//select subjects//! the space after subjects is important to the query
    $sql .= "ORDER BY position ASC";//order by position
    //*echo $sql; this can be used to trouble shoot connection
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);//confirm the result
    return $result;
  }

  function find_subject_by_id($id) {// find a subject by id
    global $db;//pull $db from the global scope

    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" .  db_escape($db,$id) . "'";//db_escape helps to prevent sql injections
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);//fetch the subject
    mysqli_free_result($result);//free the result close it
    return $subject; // returns an assoc. array
  }

  function validate_subject($subject) {
    $errors = [];//error array gethers errors as it goes through the function dumps them all at the same time on return $errors

    // menu_name
    if(is_blank($subject['menu_name'])) {//if menu name is blank return error
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {//prevents an input of greater than 255
      $errors[] = "Name must be between 2 and 255 characters.";
    }

    // position
    // Make sure we are working with an integer
    $postion_int = (int) $subject['position'];//rquires position value to be greater than 1
    if($postion_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    }
    if($postion_int > 999) {
      $errors[] = "Position must be less than 999.";//position value must be less than 999
    }

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $subject['visible'];//visable must be selected true or false
    if(!has_inclusion_of($visible_str, ["0","1"])) {
      $errors[] = "Visible must be true or false.";
    }

    return $errors;
  }

  function insert_subject($subject) {//validate subject
    global $db;

    $errors = validate_subject($subject);
    if(!empty($errors)){//if not empty return errors
        return $errors;
    }

    $sql = "INSERT INTO subjects ";//insert into subjects
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $subject['menu_name']). "',";
    $sql .= "'" . db_escape($db, $subject['position']) . "',";
    $sql .= "'" . db_escape($db, $subject['visible']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;//succeed
    } else {
      // INSERT failed
      echo mysqli_error($db);//report back an error
      db_disconnect($db);
      exit;
    }
  }

  function update_subject($subject) {//update the subject
    global $db;

    $errors = validate_subject($subject);
    if(!empty($errors)){//validate if empty if not empty return errors
        return $errors;
    }

    $sql = "UPDATE subjects SET ";//update subjects
    $sql .= "menu_name='" .  db_escape($db,$subject['menu_name']) . "', ";
    $sql .= "position='" .  db_escape($db,$subject['position']) . "', ";
    $sql .= "visible='" .  db_escape($db,$subject['visible']) . "' ";
    $sql .= "WHERE id='" .  db_escape($db,$subject['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;//succeed
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function delete_subject($id) {//delete subject
    global $db;

    $sql = "DELETE FROM subjects ";//delete from subjects
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;//succeed
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  // Pages

  function find_all_pages() {//find all pages
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY subject_id ASC, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_page_by_id($id) {//find page by the id
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page; // returns an assoc. array
  }

  function insert_page($page) {//insert into database
    global $db;

    $sql = "INSERT INTO pages ";
    $sql .= "(subject_id, menu_name, position, visible, content) ";
    $sql .= "VALUES (";
    $sql .= "'" .  db_escape($db,$page['subject_id']) . "',";
    $sql .= "'" .  db_escape($db,$page['menu_name']) . "',";
    $sql .= "'" .  db_escape($db,$page['position']) . "',";
    $sql .= "'" .  db_escape($db,$page['visible']) . "',";
    $sql .= "'" .  db_escape($db,$page['content']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_page($page) {//update database
    global $db;

    $sql = "UPDATE pages SET ";//update pages
    $sql .= "subject_id='" .  db_escape($db,$page['subject_id']) . "', ";
    $sql .= "menu_name='" .  db_escape($db,$page['menu_name']) . "', ";
    $sql .= "position='" .  db_escape($db,$page['position']) . "', ";
    $sql .= "visible='" .  db_escape($db,$page['visible']) . "', ";
    $sql .= "content='" .  db_escape($db,$page['content']) . "' ";
    $sql .= "WHERE id='" .  db_escape($db,$page['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function delete_page($id) {//delete pages
    global $db;

    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id='" .  db_escape($db,$id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

?>
