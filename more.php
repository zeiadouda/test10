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

    <!-- jQuery library -->

    <script src="jquery.min.js"></script>

<!-- Latest compiled JavaScript -->

<script src="bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

<table class="table table-bordered"  style="text-align: center;">
<thead>
<tr>
        <th style="text-align:center ;color: red;">رقم</th>
        <th style="text-align:center ;color: red;">الاسم</th>
        <th style="text-align:center ;color: red;">ملاحظة</th>
        <th style="text-align:center ;color: red;">الجنس</th>
        <th style="text-align:center ;color: red;">العنوان</th>
        <th style="text-align:center ;color: red;">الغة</th>
        <th style="text-align:center ;color: red;">الصورة</th>
    </tr>
    </thead>
<?php
   if(isset($_GET["id"]))
   $_SESSION["id"] =$_GET["id"];
   
   $i=$_SESSION["id"];
   
   $conn = new mysqli("localhost","root","","zeyad");

$st = $conn -> query("select * from rq where id=$i");

if ($st->num_rows > 0) {

    while ($row = $st->fetch_assoc()) {

        ?>
        <tr>
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["name"]?></td>
            <td><?php echo $row["comennt"]?></td>
            <td><?php echo $row["gendr"]?></td>
            <td><?php echo $row["city"]?></td>
            <td><?php echo $row["languages"]?></td>
            <td>
                <img src="<?php echo "files/".$row['imgname']; ?>" width="50px" height="50px" alt="Image">
            </td>
            
            
        </tr>
        <?php

    }
} else {
    echo "0 results";
}   
   $conn->close();
   ?>

   </table>
   <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"
         method="post"
         enctype="multipart/form-data"
  >
</body>
</html>