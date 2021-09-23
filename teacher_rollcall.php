<?php
session_start();
if (!empty($_SESSION['login'])){
  switch ($_SESSION['login']) {
    case 'admin':
        header("Location: admin.php");
        break;
    case 'teacher':
        break;
    case 'student':
        header("Location: student.php");
        break;
    default:
        header("Location: index.php");
        break;
  }
}
  require_once("connect.php");
  $myQuery = 'SELECT * FROM 點名單 WHERE course_id ="'.$_GET['course_id'].'"';
  $conn = connectDB("localhost","root","123456","a");
  $myResult = execute($conn,$myQuery);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Teacher</title>
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
                <a href="teacher.php" class="navbar-brand text-white">教師頁面</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text">
                        <li class="nav-item dropdown" id="logout">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><?php echo $_SESSION['name'] ?></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="logout.php">登出</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
        <main class="py-4">
            <div class="container-fluid text-center">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <?php
                            echo '<table class="table table-bordered mt-4">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope="col">學生姓名</th>
                                </tr>
                            </thead>';   
                            while($row = mysqli_fetch_array($myResult)){
                                echo '<tr class="text-center">';
                                echo '<th scope="col">'.$row['name'].'</th>';
                                /*echo '<th scope="col"><a class="btn btn-info" href="teacher_rollcall.php?course_id=';
                                echo $row['course_id'];
                                echo '">點名</a>';*/
                            }
                        ?>
                    <div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


