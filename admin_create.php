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
                                <a class="dropdown-item" href="logout.php">登出</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <!--課程代碼	課程名稱	必修或選修	授課教師	開課系所	時間	人數上限	選課人數	學分	教室-->
                <form action="course_create.php" method="post" onSubmit="return checkform();">
                    <div class="form-group">
                        <label>課程代碼:</label>
                        <input  class="form-control" name="course_id" id="course_id">
                    </div>
                    <div class="form-group">
                        <label>課程名稱:</label>
                        <input  class="form-control" name="course_name" id="course_name">
                    </div>
                    <div class="form-group">
                        <label>必修或選修:</label>
                        <input  class="form-control" name="course_required" id="course_required">
                    </div>
                    <div class="form-group">
                        <label>授課教師:</label>
                        <input  class="form-control" name="course_teacher" id="course_teacher">
                    </div>
                    <div class="form-group">
                        <label>時間:</label>
                        <input  class="form-control"  name="course_time" id="course_time">
                    </div>
                    <div class="form-group">
                        <label>人數上限:</label>
                        <input  class="form-control" name="course_max" id="course_max">
                    </div>
                    <div class="form-group">
                        <label>學分:</label>
                        <input  class="form-control" name="course_credit" id="course_credit">
                    </div>
                    <div class="form-group">
                        <label>教室:</label>
                        <input  class="form-control" name="classroom_id" id="classroom_id">
                    </div>
                    <button type="submit" class="btn btn-primary">新增課程</button>
                    <button type="reset" class="btn btn-secondary">重置 </button>
                </form>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function checkform() {
            if($('#course_id').val()==""){
                alert("請填寫課程代碼!");
                return false;
            }
            if($('#course_name').val()=="") {
                alert("請填課程名稱!");
                return false;
            }
            if($('#course_required').val()=="") {
                alert("請填寫主修!");
                return false;
            }
            if($('#course_teacher').val()=="") {
                alert("請填寫授課教師!");
                return false;
            }
            if($('#course_time').val()=="") {
                alert("請填寫課程時間!");
                return false;
            }
            if($('#course_max').val()=="") {
                alert("請填寫人數上限!");
                return false;
            }
            if($('#course_credit').val()=="") {
                alert("請填寫課程學分!");
                return false;
            }
            if($('#classroom_id').val()=="") {
                alert("請填寫教室代號!");
                return false;
            }
            return confirm('確定送出嗎？');
        }
    </script>
</body>
</html>

