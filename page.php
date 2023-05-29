<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   $s= $_GET["id"];
   echo "<h2> $s </h2>";
   

   $conn = new mysqli("localhost","root","","zeyad");

$st = $conn -> query("select * from news where id=$s");

if ($st->num_rows > 0) {

    while ($row = $st->fetch_assoc()) {

        echo $row["id"] . "-" . $row["txt"].   "<br>"; 

    }
} else {
    echo "0 results";
}   
   $conn->close();
   ?>
</body>
</html>