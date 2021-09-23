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
    $sql = 'SELECT * FROM classroom WHERE classroom_id ='.$_GET["classroom_id"];  
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><?php echo $_SESSION['name']; ?></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="logout.php" onclick="logout()">登出</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <!--教室代碼    位置    座位數      電腦教室-->
                <form action="classroom_update.php" method="post">
                    <div class="form-group">
                        <label>教室代碼:</label>
                        <input  class="form-control" name="classroom_id" readonly value="<?php echo $row['classroom_id']; ?>">
                    </div>
                    <div class="form-group">
                        <label>座位數:</label>
                        <input  class="form-control" name="classroom_seat"  value="<?php echo $row['classroom_seat'];  ?>">
                    </div>
                    <div class="form-group">
                        <label>教室設備:</label>
                        <input  class="form-control" name="classroom_spec"  value="<?php echo $row['classroom_spec']; ?>">
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



