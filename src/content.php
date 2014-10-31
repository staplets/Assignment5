<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
header('Content-Type: text/plain');

session_start();

  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    $path = explode('/', $_SERVER['PHP_SELF'], - 1);
    $path = implode('/', $path);
    $redirect = "http://" . $_SERVER['HTTP_HOST'] . $path;
    header("Location: {$redirect}/login.php?login=false");
    //die();
  }

if(isset($_GET['action']) && $_GET['action'] == 'logOut'){
  $_SESSION = array();
  session_destroy();
  $filePath = explode('/', $_SERVER['PHP_SELF'], -1);
  $filePath = implode('/', $filePath);
  $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
  header("Location: {redirect}/login.php", true);
  die();
}

if(session_status() == PHP_SESSION_ACTIVE){
  if(isset($_POST['userName'])){
    $_SESSION['userName'] = $_POST['userName'];
  }
  
  if(!isset($_SESSION['visits'])){
    $_SESSION['visits'] = 0;
  }
  
  $_SESSION['visits']++;
  echo "Hi $_SESSION[userName], you have visited this page $_SESSION[visits] times. \n";
  echo 'To log out click <a href='content.php?action=logOut'>here</a>.';
}
else{
  "You need to log in. Login <a href='login.php'>here</a>.";
}
?>