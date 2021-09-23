<?php 
  session_start();
  header("Content-Type: text/html; charset=utf-8");
  include_once("connect.php");

    $sql = 'SELECT * FROM enrollment WHERE id = '.$_SESSION['id'].' AND course_id = '.$_GET['course_id'];
    $conn = mysqli_connect("localhost","root","123456","a");
    $result = mysqli_query($conn,$sql);

    if( mysqli_num_rows($result) > 0 ){
      echo "<script>alert('已有該課程!!');</script>";
      header("Refresh:0;url=admin_create.php");
    }elseif( collision() == true ){

      $sql = "INSERT INTO enrollment (id, course_id) VALUES(
        '".$_SESSION['id']."',
        '".$_GET['course_id']."'    
      )";
      $result = mysqli_query($conn,$sql);
      $sql = 'UPDATE course SET course_people = course_people + 1 WHERE course_id = '.$_GET['course_id'];
      $conn = mysqli_connect("localhost","root","123456","a");
      $result = mysqli_query($conn,$sql);
      echo "<script>alert('成功選課!!');</script>";
      header("Refresh:0;url=admin_create.php");
    
  }

function collision(){
  $sql = 'SELECT course_time FROM 課表_學生 WHERE id = "'.$_SESSION['id'].'"';
  $conn = mysqli_connect("localhost","root","123456","a");
  $result = mysqli_query($conn,$sql);
  $time_old = array();
  while( $row = mysqli_fetch_array($result) ){
    //echo $row['course_time'].'<br>';
    $temp = str_split($row['course_time'],2);
    foreach($temp as $t){
      array_push($time_old,$t);
    }
  }
  $sql = 'SELECT course_time FROM course WHERE course_id = "'.$_GET['course_id'].'"';
  $conn = mysqli_connect("localhost","root","123456","a");
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  //echo '<br>';
  $time_new = str_split($row['course_time'],2);
  //print_r($time_new);
  if( !empty( array_intersect($time_new,$time_old) ) ){
    echo "<script>alert('課程衝堂!');</script>";
    header("Refresh:0;url=student.php");
  }else{
    return true; //通過
  }
  
}
?>