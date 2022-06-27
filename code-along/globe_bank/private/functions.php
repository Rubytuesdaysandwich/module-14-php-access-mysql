<?php
function url_for($script_path){
  //add the leading '/' if not present
  if($script_path[0]!='/'){
    $script_path = "/" . $script_path;

  }
return WWW_ROOT . $script_path;
}

function u($string=""){
  return urlencode($string);//urlencode
}
function raw_u($string=""){
  return rawurlencode($string);//rawurlencode
}

function h($string=""){
  return htmlspecialchars($string);//htmlspecialchars
}
 function error_404(){
header($_server["server_protocol"]."404 Not found");//404 error page not found
exit;
 }
function error_500(){
  header($_server["server_protocol"]."500 Internal Server Error");//500 internal server error
  exit;
 }
 
function redirect_to($location){
  header("Location:". $location);
exit;
}

function is_post_request(){
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function is_get_request(){
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function display_errors($errors=array()) {//display errors
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}
?>