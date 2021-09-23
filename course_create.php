<?php 
  header("Content-Type: text/html; charset=utf-8");
  $conn = mysqli_connect("localhost","root","123456","a"); 
  $sql = "SELECT course_id FROM course WHERE course_id='".$_POST["course_id"]."'";
  $record = mysqli_query($conn, $sql);

  function collision(){
    $sql = 'SELECT course_time FROM 課表_教師 WHERE id = "'.$_POST["course_teacher"].'"';
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
    //echo '<br>';
    $time_new = str_split($_POST["course_time"],2);
    //print_r($time_new);
    if( !empty( array_intersect($time_new,$time_old) ) ){
      echo "<script>alert('課程衝堂!');</script>";
      header("Refresh:0;url=student.php");
    }else{
      return true; //通過 
    }
  }
  if(mysqli_num_rows($record)>0) {
    echo "<script>alert('該課程已存在');</script>";
    header("Refresh:1;url=admin_create.php");
  } elseif(collision() == true){
    //若此課程尚未輸入，則執行新增的動作
    $sql = sprintf(
      "INSERT INTO course (course_id, course_name, course_required, course_teacher, course_time, course_max, course_credit, classroom_id) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
      $_POST["course_id"],
      $_POST["course_name"],
      $_POST["course_required"],
      $_POST["course_teacher"],
      $_POST["course_time"],
      $_POST["course_max"],
      $_POST["course_credit"],
      $_POST["classroom_id"] );
      $sql2 = "INSERT INTO enrollment (id, course_id) VALUES(
        '".$_POST['course_teacher']."',
        '".$_POST['course_id']."'    
      )";
    if (mysqli_query($conn, $sql) == true && mysqli_query($conn,$sql2) == true ){
      echo "<script>alert('新課程加入成功。');</script>";
      header("Refresh:0;url=admin.php");
    }else{
      echo "<script>alert('加入失敗，輸入的值不合法。');</script>";
      header("Refresh:0;url=admin_create.php");
    }
  }

?>