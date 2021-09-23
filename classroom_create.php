<?php 
  header("Content-Type: text/html; charset=utf-8");
  $conn = mysqli_connect("localhost","root","123456","a"); 
  $sql = "SELECT classroom_id FROM classroom WHERE classroom_id='".$_POST["classroom_id"]."'";
  $record = mysqli_query($conn, $sql);
  if(mysqli_num_rows($record)>0) {
    echo "<script>alert('該教室已存在');</script>";
    header("Refresh:1;url=admin_classroom_create.php");
    //header("Location:admin_classroom_create.php");
  } else {
    //若此課程尚未輸入，則執行新增的動作
    $sql = "INSERT INTO classroom (classroom_id,classroom_seat, classroom_spec) VALUES (
    '".$_POST["classroom_id"]."',
	'".$_POST["classroom_seat"]."',
    '".$_POST["classroom_spec"]."')";
    mysqli_query($conn, $sql);
    echo "<script>alert('新教室加入成功。');</script>";
    header("Refresh:0;url=admin_classroom.php");
  }
?>