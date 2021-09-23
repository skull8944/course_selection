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
      header("Location: student.php");
      break;
    default:
      header("Location: index.php");
      break;
  }
}

$errorMsg = '';
if( isset($_POST["account"]) && isset($_POST["password"]) ){
  include_once('connect.php');
  $myQuery = "SELECT * FROM user WHERE account = '" . $_POST["account"]. "' and password = '" . $_POST["password"] . "'" ;
  $myConnection = connectDB("localhost","root","123456","a");
  $myResult = execute($myConnection,$myQuery);
  $userData = getRecordsArray($myResult);
  $_SESSION['login'] = $userData[0][3]; //admin, student,teacher
  $_SESSION['name'] = $userData[0][4]; //
  $_SESSION['id'] = $userData[0][0];
  echo '</h2>'.$_SESSION['login'].'</h2>';
  echo '</h2>'.$_SESSION['name'].'</h2>';

  header('Location: login.php');


}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>登入</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style type="text/css">
    body{ 
      font: 1em sans-serif; 
      }
    .wrapper{ 
      width: 350px; padding: 20px; 
    }
  </style>
</head>
<body>
  <div class="wrapper" style="margin: 0 auto;">
    <h2>登入</h2>
    <form method="post" action="login.php">
      <div class;="form-group">
        <label>帳號</label>
        <input type="text" name="account" placeholder="輸入帳號" class="form-control">
      </div>    
      <div class="form-group">
        <label>密碼</label>
        <input type="password" name="password" placeholder="輸入密碼" required class="form-control">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="登入">
      </div>
    </form>
  </div>    

</body>
</html>