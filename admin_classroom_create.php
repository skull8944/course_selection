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
                            <a class="nav-link text-white" href="admin_search.html">查詢</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="admin_classroom.html">教室</a>
                        </li>
                        <li class="nav-item dropdown" id="logout">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>使用者名稱</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#" onclick="logout()">登出</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <!--教室代碼    位置    座位數      電腦教室-->
                <form action="classroom_create.php" method="post" onSubmit="return checkform();">
                    <div class="form-group">
                        <label>教室代碼:</label>
                        <input  class="form-control" name="classroom_id" id="classroom_id">
                    </div>
                    <div class="form-group">
                        <label>座位數:</label>
                        <input  class="form-control" name="classroom_seat" id="classroom_seat">
                    </div>
                    <div class="form-group">
                        <label>設備:</label>
                        <input  class="form-control" name="classroom_spec" id="classroom_spec">
                    </div>
                    <button type="submit" class="btn btn-primary">新增教室</button>
                    <button type="reset" class="btn btn-secondary">重置</button>
                </form>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function checkform() {
            if($('#classroom_id').val()==""){
                alert("請填寫教室編號!");
                return false;
            }
            if($('#classroom_seat').val()=="") {
                alert("請填座位數!");
                return false;
            }
            if($('#classroom_seat').val()<=0) {
                alert("座位數必須大於0!");
                return false;
            }
            if($('#classroom_spec').val()=="") {
                alert("請填寫設備!");
                return false;
            }
            return confirm('確定送出嗎？');
        }
    </script>
</body>
</html>

