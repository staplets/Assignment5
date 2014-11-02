<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
  //check for empty parameters
  if(empty($_GET)){
    echo "Nothing passed in URL.";
	exit();
  }//check if parameters are numeric
  foreach($_GET as $key=>$value){
    if(!is_numeric($value)){
	  echo $key . " must be an integer.<br>";
	}
  }//get min and max parameters
  if(isset($_GET['min-multiplicand'])){
    $min_multiplicand = intval($_GET['min-multiplicand']);
  }
  else{
    echo "Missing parameter min-multiplicand. <br>";
	exit();
  }
  if(isset($_GET['max-multiplicand'])){
    $max_multiplicand = intval($_GET['max-multiplicand']);
  }
  else{
    echo "Missing parameter max-multiplicand. <br>";
	exit();
  }
  if(isset($_GET['min-multiplier'])){
    $min_multiplier = intval($_GET['min-multiplier']);
  }
  else{
    echo "Missing parameter min-multiplier. <br>";
	exit();
  }
  if(isset($_GET['max-multiplier'])){
    $max_multiplier = intval($_GET['max-multiplier']);
  }
  else{
    echo "Missing parameter max-multiplier. <br>";
	exit();
  }
  //check if max is larger than min
  if($min_multiplicand > $max_multiplicand){
    echo "Minimum multiplicand larger than maximum multiplicand. <br>";
    exit();
  }
  if($min_multiplier > $max_multiplier){
    echo "Minimum multiplier larger than maximum multiplier. <br>";
    exit();
  }
  //assign variables for multidimensional array
  $minCanHolder = $min_multiplicand;
  $minPliHolder = $min_multiplier;
  $width = $max_multiplicand - $min_multiplicand + 2;
  $height = $max_multiplier - $min_multiplier + 2;
  //create array for multiplicands
  $candArray = array();
  while($min_multiplicand <= $max_multiplicand){
    $candArray[] = $min_multiplicand;
	$min_multiplicand++;
  }// creat array for multipliers
  $plierArray = array();
  while($min_multiplier <= $max_multiplier){
    $plierArray[] = $min_multiplier;
	$min_multiplier++;
  }
  //set up table
  echo '<html>
  <!DOCTYPE html>
  <html lang="en">
  <meta charset="utf=8" />
    <h2>My Multiplication table<h2>
    <body>';
  //create multidimensional array for output
  $tableArray = array();
  for($i = $minCanHolder; $i <= $max_multiplicand; $i++){
    $tableArray[] = array();
	$tableArray[0][0] = '';
	$tableArray[0][$i] = $i;
	
	for($k = $minPliHolder; $k <= $max_multiplier; $k++){
	  $tableArray[$k][0] = $k;
	  $tableArray[$k][$i] = $k * $i;
	}
  }
  
  echo '<p>
  <table>
  <table border="1">
  <tr>';
  //output table
  foreach($tableArray as $key => $value){
    echo '<tr>';
    foreach($value as $layerTwo => $twoVal){
	  echo"<td>$twoVal";
	}
  }
  echo '</body>
  </html>';
?>

