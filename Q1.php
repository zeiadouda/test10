<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
    <title>Untitled Page</title>

    <link rel="stylesheet" href="bootstrap.min.css">

<!-- jQuery library -->
<script src="jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="bootstrap.min.js"></script>

</head>
<body>
  
<div class="container-fluid text-right" style="background-color:Silver;">
<div style="float:right;">
<img src="AUG.png" />
</div>
<h1>جامعة الأزهر - غزة  Al azhar University</h1>
</div>

<div class="container-fluid text-right" style="color:Blue;">

<h3><a href="Q1.php"> الرئيسية </a> |  <a href="c.htm"> اتصل بنا</a></h3>

<h1 style="color:Black;">عنوان الخبر عنوان الخبر عنوان الخبرعنوان الخبر عنوان الخبر عنوان الخبر
</h1>

</div>


<div class="container-fluid">

<div class="row">

<div class="col-sm-3" style="background-color:Silver;">

<h2>اعلانات</h2>

<ul style="list-style-type: none;text-align:right;    padding-right: 0;margin-bottom: 10px;" >



<?php

$conn = new mysqli("localhost","root","","zeyad");

$st = $conn -> query("select * from news where tno=2");

if ($st->num_rows > 0) {

    while ($row = $st->fetch_assoc()) {

        ///echo "<a href='page.php?id=".$row["id"]."'><li><h3>". $row["title"] . "</h3></li></a>";

        echo "<li><h3>" .$row["title"]. "</h3></li>";

        echo "<a href='page.php?id=".$row["id"]."'><li> عرض المزيد </li></a>";

    }
} else {
    echo "0 results";
}   
   $conn->close();

   ?>


</ul>

</div>

<div class="col-sm-6">

<strong><p style="font-size: 20px">
يرجى تعبئة النموذج :
</p></strong>

<?php

if (isset($_POST["btn"]))
{
  if((empty($_POST["username"])) || (empty($_POST["notes"])))
{
    echo "ادخل المعلومات اولا";
}
else
{
  $nam = htmlspecialchars ($_POST["username"]);
  $nt = htmlspecialchars ($_POST["notes"]);
  $opt =$_POST["optradio"];
  $se =$_POST["sel1"];
  $lan =$_POST["language"];
  $lan1 =implode(",",$lan);
  
$nameex = basename($_FILES["fileimg"]["name"]);
move_uploaded_file($_FILES["fileimg"]["tmp_name"] , 'files/'.$nameex);
echo $_FILES["fileimg"]["tmp_name"];
echo $_FILES["fileimg"]["size"];

$conn = new mysqli("localhost","root","","zeyad");
$st = $conn -> query("insert into rq(name ,comennt,gendr,city,languages,imgname) values('$nam' ,'$nt' ,$opt,'$se','$lan1','$nameex')");

if ($st < 0) {

       echo "<center><h2>تمت التعبئة بنجاح اضغط على رزnextلرؤية البيانات</h2></center>";
}

    else
{
        echo "يوجد مشكلة" . $conn->error;

    }

$conn->close();
header("location:Q1.php");
  }
}

else if (isset($_POST["btn2"]))
{
   header("location:imgname.php");
}
else if (isset($_POST["btn3"]))
{
   header("location:news.php");
}

   ?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>"
         method="post"
         enctype="multipart/form-data"
  >
    <div class="form-group">
      <label for="usr">الاسم:</label>
      <input type="text" class="form-control" id="usr" name ="username"autofocus>
    </div>
    
    <div class="form-group">
  <label for="comment">ملاحظات:</label>
  <textarea class="form-control" rows="5" id="comment" name="notes"></textarea>
</div>



<div class="radio-inline">
  <label>ذكر<input type="radio" name="optradio" value="1" checked> </label>
</div>
<div class="radio-inline">
  <label>أنثى<input type="radio" name="optradio" value="2"></label>
</div>




<div class="form-group">
  <label for="sel1">اختر المحافظة:</label>
  <select class="form-control" id="sel1" name="sel1">
    <option value="الشمال">الشمال</option>
    <option value="غزة">غزة</option>
    <option value="الوسطى">الوسطى</option>
    <option value="خانيونس">خانيونس</option>
    <option value="رفح">رفح</option>
  </select>
</div>


<div class="form-group">
<label>language :</label><br>
<input type="checkbox" name="language[]" value="English"><label>English</label>
<input type="checkbox" name="language[]" value="Arabic"><label>Arabic</label>
<input type="checkbox" name="language[]" value="Spain"><label>Spain</label>

</div>


<div class="form-group">

<input type="file" name="fileimg">

</div>

<div class="form-group"> 
    
      <button type="submit" class="btn btn-default" name="btn">Submit</button>
      <button type="Reset" class="btn btn-default">Reset</button>
      <button type="submit" class="btn btn-default" name="btn2">next</button>
      <button type="submit" class="btn btn-default" name="btn3">insert news</button>
</div>

  </form>



</div>


<div class="col-sm-3" style="background-color:Silver;">

<h2>اخبار</h2>

<ul style="list-style-type: none;text-align:right;    padding-right: 0;margin-bottom: 10px;" >

<?php

$conn = new mysqli("localhost","root","","zeyad");

$st = $conn -> query("select * from news where tno=1");

if ($st->num_rows > 0) {

    while ($row = $st->fetch_assoc()) {

        ///echo "<a href='page.php?id=".$row["id"]."'><li><h3>". $row["title"] . "</h3></li></a>";

        echo "<li><h3>" .$row["title"]. "</h3></li>";

        echo "<a href='page.php?id=".$row["id"]."'><li> عرض المزيد </li></a>";

    }
} else {
    echo "0 results";
}   
   $conn->close();

   ?>


</ul>

</div>

</div>



</div>


<div class="container-fluid text-center" style="color:White;background-color:gray;">

<h3>جميع الحقوق محفوظة</h3>

</div>



</body>
</html>
