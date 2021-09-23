<?php 
  header("Content-Type: text/html; charset=utf-8");
  session_start();
  //刪除科目資料
  $conn = mysqli_connect("localhost","root","123456","a"); 
  $sql = "UPDATE classroom SET classroom_id= '{$_POST["classroom_id"]}',classroom_seat='{$_POST["classroom_seat"]}', classroom_spec='{$_POST["classroom_spec"]}' WHERE classroom_id='{$_POST["classroom_id"]}'";
  $sql = "UPDATE classroom SET 
  classroom_id= '{$_POST["classroom_id"]}',
  classroom_seat='{$_POST["classroom_seat"]}', 
  classroom_spec='{$_POST["classroom_spec"]}'
   WHERE 
   classroom_id='{$_POST["classroom_id"]}'";



  $result = mysqli_query($conn, $sql);
  echo "<script>alert('教室更新成功!');</script>";
  header("Refresh:0;url=admin_classroom.php");
?>
