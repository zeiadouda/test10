<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="bootstrap.min.css">

  

<link rel="stylesheet" type="text/css" href="login-style.css">


  <title>Document</title>
</head>
<body>
<h2>هل تريد الحذف ؟</h2></br>

<form action="del.php" method="post">

<div class = "container">
<button class = "btn-lg btn-primary btn-block"
 type = "submit"
name = "btn1">نعم</button> <br>

<button class = "btn-lg btn-primary btn-block"
 type = "submit"
name = "btn2">لا</button>
</div>

</form>

<?php

if(isset($_GET["id"]))
$_SESSION["id"] =$_GET["id"];


if(isset($_POST["btn1"]))
{
$i=$_SESSION["id"];

$conn = new mysqli("localhost","root","","res");

$st = $conn -> query("delete from res1 where id=".$i);

if ($st > 0) {
  echo "تم الحذف";
}  
   else {
    echo "eroor";
}   
{
  session_unset();
  session_destroy();
  header("location:imgname.php");
}
 $conn->close();
  }
  else if (isset($_POST["btn2"]))
{
   header("location:imgname.php");
}
   ?>
   
</body>
</html>