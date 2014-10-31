<?PHP
  error_reporting(E_ALL);
  ini_set('display_errors','On');
  header('Content-Type: text/plain; charset=utf-8');
  
  //create two arrays to hold parameters and type
  $parameterArray = array();
  $returnValues = array('Key' => '');
  
  //if no get or post then output
  //parameters:null
  if(empty($_GET) && empty($_POST)){
    echo "Nothing passed in URL. \n\n";
	$parameterArray['Parameters'] = null;
  }//if method is get
  else if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $returnValues['Key'] = 'GET';
	//assign paramets
	foreach($_GET as $key => $value){
	  $parameterArray[$key] = $value;
	}
  }//if method is post
  else if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $returnValues['Key'] = 'POST';
	//assign parameters
	foreach($_POST as $key => $value){
	  $parameterArray[$key] = $value;
	}
  }
  //attach parameters to type array
  $returnValues['Parameters'] = $parameterArray;
  //output json object to client
  echo json_encode($returnValues);
?>