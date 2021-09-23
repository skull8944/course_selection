<?php 
  header("Content-Type: text/html; charset=utf-8");
  session_start();
  //刪除科目資料
  $conn = mysqli_connect("localhost","root","123456","a");
  $sql = 'DELETE FROM course WHERE course_id ='.$_GET["course_id"];
  $result = mysqli_query($conn, $sql);
  //刪除後，回到科目管理
    echo "<script>alert('課程刪除成功!');</script>";
    header("Refresh:0;url=admin.php");
?>
