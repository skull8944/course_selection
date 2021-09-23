<?php
session_start();
if (!empty($_SESSION['login'])){
  switch ($_SESSION['login']) {
    case 'admin':
        break;
    case 'teacher':
      header("Location: teacher.php");
      break;  
    case 'student':
      header("Location: student.php");
      break;
    default:
      header("Location: index.php");
      break;
  }
}
$conn = mysqli_connect("localhost","root","123456","a");
$sql = 'SELECT * FROM course WHERE course_id ='.$_GET["course_id"];  
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="iltbb+1.png" rel="icon">

        <style>
            body{
                background-color: #cdcdcd;
                font-family:微軟正黑體;
            }
        </style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background: #335D70;">
            <div class="container">
                <a class="navbar-brand text-white" href="admin.php">管理者頁面</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="admin_search.php">查詢</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="admin_classroom.php">教室</a>
                        </li>
                        <li class="nav-item dropdown" id="logout">
                            <a id="navbarDropdown"   class="nav-link dropdown-toggle text-white text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><?php echo $_SESSION['name']; ?></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="logout.php">登出</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<?php


?>
        <main class="py-4">
            <div class="container">
                <!--課程代碼	課程名稱	必修或選修	授課教師	開課系所	時間	人數上限	選課人數	學分	教室-->
                <form action="course_update.php" method="post">
                    <div class="form-group">
                        <label for="teacher">課程代碼:</label>
                        <input  class="form-control" id="course_id" name="course_id" readonly value="<?php echo $row['course_id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="teacher">課程名稱:</label>
                        <input  class="form-control" id="course_name" name="course_name" value="<?php echo $row['course_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="teacher">授課教師:</label>
                        <input  class="form-control" id="course_teacher" name="course_teacher" value="<?php echo $row['course_teacher']; ?>">
                    </div>
                    <div class="form-group">
                        <label>必修或選修:</label>
                        <input  class="form-control" id="course_required" name="course_required" value="<?php echo $row['course_required']; ?>">
                    </div>
                    <div class="form-group">
                        <label>時間:</label>
                        <input  class="form-control" id="course_time" name="course_time" value="<?php echo $row['course_time']; ?>">
                    </div>
                    <div class="form-group">
                        <label>人數上限:</label>
                        <input  class="form-control" id="course_max" name="course_max"  value="<?php echo $row['course_max']; ?>">
                    </div>
                    <div class="form-group">
                        <label>學分:</label>
                        <input  class="form-control" id="course_credit" name="course_credit"  value="<?php echo $row['course_credit']; ?>">
                    </div>
                    <div class="form-group">
                        <label>教室:</label>
                        <input  class="form-control" id="classroom_id" name="classroom_id"  value="<?php echo $row['classroom_id']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">更改</button>
                    <button type="reset" class="btn btn-secondary">重置 </button>
                </form>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



