<?php 
  header("Content-Type: text/html; charset=utf-8");
  session_start();
  //刪除科目資料<!--課程代碼	課程名稱	必修或選修	授課教師	時間	人數上限	學分	教室-->
  $conn = mysqli_connect("localhost","root","123456","a"); 

  

  $sql = sprintf(
    "UPDATE course SET 
    course_name = '%s',
    course_required ='%s',
    course_teacher = '%s',
    course_time = '%s',
    course_max = '%s',
    course_credit = '%s',
    classroom_id = '%s'
    WHERE
    course_id = '%s'",
     $_POST["course_name"],
     $_POST["course_required"],
     $_POST["course_teacher"],
     $_POST["course_time"],
     $_POST["course_max"],
     $_POST["course_credit"],
     $_POST["classroom_id"],
     $_POST["course_id"]
    );

  if (mysqli_query($conn, $sql) == true){
     echo "<script>alert('新課更新成功。');</script>";
     header("Refresh:0;url=admin.php");
  }else{
    echo "<script>alert('更新失敗，輸入的值不合法。');history.back();</script>";  
  }
?>
