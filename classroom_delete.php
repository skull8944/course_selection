<?php 
  header("Content-Type: text/html; charset=utf-8");
  session_start();
  //刪除科目資料
  $conn = mysqli_connect("localhost","root","123456","a");
  $sql = 'DELETE FROM classroom WHERE classroom_id ='.$_GET["classroom_id"];
  $result = mysqli_query($conn, $sql);
  echo "<script>alert('教室刪除成功!');</script>";
  header("Refresh:0;url=admin_classroom.php");
?>
