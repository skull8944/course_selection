<?php
  header("Content-Type: text/html; charset=utf-8");
  session_start();
  //刪除科目資料
  include_once("connect.php");
  $conn = mysqli_connect("localhost","root","123456","a");
  $sql = 'DELETE FROM enrollment WHERE id = '.$_SESSION['id'].' AND course_id = '.$_GET['course_id'];
  $result = mysqli_query($conn, $sql);
  echo "<script>alert('退選成功!');</script>";
  $sql = 'UPDATE course SET course_people = course_people - 1 WHERE course_id = '.$_GET['course_id'];
  $conn = mysqli_connect("localhost","root","123456","a");
  $result = mysqli_query($conn,$sql);
  header("Refresh:0;url=student_timetable.php");
?>
