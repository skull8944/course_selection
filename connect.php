<?php 
function connectDB($servername, $username, $password, $dbname)
{
  $tempConnection = mysqli_connect($servername, $username, $password, $dbname);
  if (!$tempConnection) {
    die("Connection failed: " . mysqli_connect_error()); 
    return mysqli_connect_error();
  }else{
    return $tempConnection;
  }
}
function disconnectDB($inputConnection)
{
  mysqli_close($inputConnection);
}
function freeResult($inputResult)
{
  mysqli_free_result($inputResult);
  return $inputResult;
}
function execute($selectConnection,$inputSQL)
{
  $tempResult = mysqli_query($selectConnection, $inputSQL);
  return $tempResult;
}
function getFieldName($inputResult)
{
  $tempArr = array();
  $fieldinfo = mysqli_fetch_fields($inputResult);
  foreach ($fieldinfo as $field){
    array_push($tempArr,$field->name);
  }
  return $tempArr;
}
function getRecordsArray($inputResult)
{
  $tempDataArr = array();
  while( $row = mysqli_fetch_assoc($inputResult) )
  {  
    $tempArr = array();
    foreach($row as $key=>$value){ 
      array_push($tempArr, $value);
    }
    array_push($tempDataArr, $tempArr);
  }
  return $tempDataArr;
}
function getNumRows($inputResult)
{
  return mysqli_num_rows($inputResult);
}
//使用方式
//$myConnection = connectDB("localhost","root","123456","a");
//$myQuery = "SELECT * FROM 'table' ";
//$myResult = execute($myConnection,$myQuery);
//$FieldName = getFieldName($myResult);
//$RecordsArray = getRecordsArray($myResult);
//disconnectDB($myConnection);
?>