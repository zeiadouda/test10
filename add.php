<?php
$nam =$_GET["username"];

$nt =$_GET["notes"];

$opt =$_GET["optradio"];

$se =$_GET["sel1"];

if (isset($_GET["btn"]))

if((empty($nam)) || empty($nt))
{
    echo "ادخل المعلومات اولا";
}
else
{

$conn = new mysqli("localhost","root","","zeyad");

$st = $conn -> query("insert into sequal(namee ,notes,gender,address) values('$nam' ,'$nt' ,'$opt' , $se)");

if ($st > 0) {

       echo "تم الحفظ بنجاح";
}

    else
{
        echo "يوجد مشكلة دخيلك ي رجل" . $conn->error;

    }

   $conn->close();
}
else if (isset($_GET["btn2"]))
{
   header("location:hh.php");
}

   ?>