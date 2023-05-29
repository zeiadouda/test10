<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">   
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         
         h2{
            text-align: center;
            color: #017572;
         }
        
      </style>
</head>
<body>

<?php

if (isset($_POST["btn"]))
{
  if((empty($_POST["title"])) || (empty($_POST["txt"])))
{
    echo "ادخل المعلومات اولا";
}
else
{
  $tit = htmlspecialchars ($_POST["title"]);
  $tx = htmlspecialchars ($_POST["txt"]);
  $se =$_POST["sel"];
  
$conn = new mysqli("localhost","root","","zeyad");
$st = $conn -> query("insert into news (title ,txt,tno) values('$tit' ,'$tx' ,'$se')");

if ($st > 0) {

       echo "تم الحفظ بنجاح";
}

    else
{
        echo "يوجد مشكلة دخيلك ي راجل" . $conn->error;

    }

$conn->close();
header("location:q1.php");
  }
}

   ?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>"
         method="post"
  >

<div class = "container">
      
      <form class = "form-signin" 
action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
         ?>"
          method = "post">   

          <label for="usr">العنوان</label>
<input type = "text" class = "form-control" 
name = "title" placeholder = "العنوان" 
required autofocus></br>

<label for="usr">النص</label>
<input type = "txt" class = "form-control"
name = "txt" placeholder = "النص" 
required></br>

  <label for="sel">نوع النص</label>
  <select class="form-control" id="sel" name="sel">
    <option value="1">الاخبار</option>
    <option value="2">الاعلانات</option>
  </select></br>

         
<button class = "btn btn-lg btn-primary btn-block"
 type = "submit" 
name = "btn">ادخال</button>
      </form>
         
            
   </div> 
</body>
</html>