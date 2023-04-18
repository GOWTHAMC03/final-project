<?php
session_start();
require_once "gg1.html";
  if(isset($_SESSION['login'])!="") {
  header("Location: dashboard.php");
}
?>
<?php
if (isset($_POST['login'])) {
$email = mysqli_real_escape_string($conn, $_POST['email']);
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  $email_error = "Please Enter Valid Email ID";
}
  if(strlen($password) < 6) {
  $password_error = "Password must be minimum of 6 characters";
}  
$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and pass = '" . md5($password). "'");
if(!empty($result)){
if ($row = mysqli_fetch_array($result)) {
$_SESSION['user_id'] = $row['uid'];
$_SESSION['user_name'] = $row['name'];
$_SESSION['user_email'] = $row['email'];
$_SESSION['user_mobile'] = $row['mobile'];
header("Location: dashboard.php");
} 
}else {
$error_message = "Incorrect Email or Password!!!";
}
}
?>