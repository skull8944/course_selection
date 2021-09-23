<?php
session_start();
if (!empty($_SESSION['login'])){
  switch ($_SESSION['login']) {
    case 'admin':
        header("Location: admin.php");
        break;
    case 'teacher':
      header("Location: teacher.php");
      break;  
    case 'student':
      break;
    default:
      header("Location: index.php");
      break;
  }
}
include_once("connect.php");

$sql = 'SELECT * FROM `課表_教師` WHERE name = "'.$_POST['name'].'"';
$conn = mysqli_connect("localhost","root","123456","a");
$result = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student</title>
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
                <a class="navbar-brand text-white" href="student_search.php">學生頁面</a>
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
                            <a class="nav-link text-white" href="student_search.php">查詢</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="student_timetable.php">個人課表</a>
                        </li>
                        <li class="nav-item dropdown" id="logout">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><?php echo $_SESSION['name']; ?></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="logout.php">登出</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container text-center">
                <?php
                    echo '<table class="table table-bordered mt-4">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">課程代碼</th>
                            <th scope="col">課程名稱</th>
                            <th scope="col">教師</th>
                            <th scope="col">教室</th>
                            <th scope="col">必修/選修</th>
                            <th scope="col">時間</th>
                            <th scope="col">學分</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>';   
                    while($row=mysqli_fetch_array($result)){
                        echo '<tr>';
                        echo '<th scope="col">'.$row['course_id'].'</th>';
                        echo '<th scope="col">'.$row['course_name'].'</th>';
                        echo '<th scope="col">'.$row['name'].'</th>';
                        echo '<th scope="col">'.$row['classroom_id'].'</th>';
                        echo '<th scope="col">'.$row['course_required'].'</th>';
                        echo '<th scope="col">'.$row['course_time'].'</th>';
                        echo '<th scope="col">'.$row['course_credit'].'</th>';
                        echo '<th scope="col"><a class="btn btn-primary" href="student_addcourse.php?course_id=';
                        echo $row['course_id'];
                        echo '">加選</a>';
                        echo '<tr>';
                    }
               ?>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

