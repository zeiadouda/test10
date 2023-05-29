<?php  include 'footer.php' ?>

<?php 
    session_start();
    ?>

<form action="<?php echo  $_SERVER["PHP_SELF"]; ?>" method ="post">

<button  type ="submit" name="log-out" style="color:White;background-color:Blue;"> log-out </button>

</form>
<?php
if(isset($_POST["log-out"]))
{
    session_unset();
    session_destroy();
    header("location:login.php");
}
?>
<?php

$_SESSION["tareq"];

if (isset($_SESSION["tareq"])) 
{
   
$conn = new mysqli("localhost","root","","tareq");

$st = $conn -> query("select * from  sequal");

if ($st->num_rows > 0) {

    while ($row = $st->fetch_assoc()) {

        echo $row["seq"] . "-" . $row["namee"] . "-" . $row["imgname"] . "<br>";

        echo "<img src='files/".$row["imgname"]."' width='100px' height='100px'>";

    }
} else {
    echo "0 results";
}           
   $conn->close();
}

   else{
    header ("location:login.php");
   }

   ?>

   