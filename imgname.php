<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">

<!-- jQuery library -->
<script src="jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="bootstrap.min.js"></script>
</head>
<body>
<?php  include 'footer.php' ?><br>
<table class="table table-bordered"  style="text-align: center;">
    <tr>
        <th style="text-align:center ;color: red;">رقم</th>
        <th style="text-align:center ;color: red;">الاسم</th>
        <th style="text-align:center ;color: red;">الصورة</th>
        <th style="text-align:center ;color: red;">العرض</th>
        <th style="text-align:center ;color: red;">التحديث</th>
        <th style="text-align:center ;color: red;">الحذف</th>
    </tr>
    </thead>
<?php
$conn = new mysqli("localhost","root","","zeyad");

$st = $conn -> query("select * from  rq");

if ($st->num_rows > 0) {

    while ($row = $st->fetch_assoc()) {

        ?>
        <tr>
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["name"]?></td>
            <td>
                <img src="<?php echo "files/".$row['imgname']; ?>" width="50px" height="50px" alt="Image">
            </td>
            <td><a href="more.php?id=<?php echo $row['id']; ?>" class="btn btn-info"><li> عرض المزيد </li></a></td>
            <td><a href="up.php?id=<?php echo $row['id']; ?>" class="btn btn-info"><li>تحديث البيانات</li></a></td>
            <td><a href="del.php?id=<?php echo $row['id']; ?>" class="btn btn-info"><li>حذف</li></a></td>
        </tr>
        <?php

        //echo "<h3>".$row["id"] . "-" . $row["namee"] . "</h3>";

        //echo "<img src='files/".$row["imgname"]."' width='100px' height='100px'>";

        //echo "<a href='more.php?id=".$row["id"]."'><li> عرض المزيد </li></a>";

        //echo "<a href='up.php?id=".$row["id"]."'><li>تحديث البيانات</li></a>";

        //echo "<a href='del.php?id=".$row["id"]."'><li>حذف</li></a>";
    }
} else {
    echo "0 results";
}           
   $conn->close();
   ?>  
   </table>
   <?php  include 'foot.php' ?>
</body>
</html>

