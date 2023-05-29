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
    <?php

if(isset($_GET["id"]))
$_SESSION["id"] =$_GET["id"];

$i=$_SESSION["id"];

$d="";
$n ="";
$no ="";
$g="";
$ad="";
$la ="";
$im ="";

$conn = new mysqli("localhost","root","","zeyad");

$st = $conn -> query("select * from rq where id='$i'");

if ($st->num_rows>0){
    while ($row = $st->fetch_assoc()){

     $d= $row["id"];   
     $n =$row["name"];  
     $no =$row["comennt"];  
     $g =$row["gendr"];
     $ad =$row["city"];
     $la =$row["languages"];
     $lang1=explode(",", $la);
     $im =$row["imgname"];

} 
}


if(isset($_POST["btn"])){

    $ide=$_POST["idd"];
    $na=$_POST["name"];
    $note=$_POST["not"];
    $ge=$_POST["gender"];
    $adr=$_POST["sel"];
    $language=$_POST["language"]; 
    $language1= implode(",", $language);
    $amg =  $im;

    if (!empty(basename($_FILES["fileimg"]["name"])))
    {
    $amg = basename($_FILES["fileimg"]["name"]);
    move_uploaded_file($_FILES["fileimg"]["tmp_name"] , 'files/'.$amg);
    }

    $sql="UPDATE `rq` SET `id`='$ide', `name`='$na',`comennt`='$note',`gendr`='$ge',`city`='$adr',`languages`='$language1',`imgname`='$amg' WHERE id='$i' ";
    if($conn->query($sql)){

        echo "تم التعديل";
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
?>  
   
<h2>البيانات الجديدة</h2>
<form class = "form-signin" 
action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
         ?>"
          method = "post"
          enctype="multipart/form-data">  
          
<input type = "text" class = "form-control" 
name = "idd"  value="<?php echo $d; ?>"
required autofocus></br>


<input type = "text" class = "form-control" 
name = "name"  value="<?php echo $n; ?>"
required ></br>

<input type = "text" class = "form-control" 
name = "not"  value="<?php echo $no; ?>"
required ></br><br>

<label>ذكر<input type="radio" name="gender" value="ذكر" required
<?php  
  if ($g == "ذكر")
  {
    echo"checked";
  }
?>
> 
</label><br>

<label>أنثى<input type="radio" name="gender" value="انثى" required
<?php  
  if ($g == "انثى")
  {
    echo"checked";
  }
?>
>
</label><br><br>

<label for="sel1">اختر المحافظة:</label>
  <select name="sel">
    <option  
    <?php
     if($ad == 'الشمال')
     {
      echo "selected";
     }
    ?>
    >الشمال</option>
    <option 
    <?php
     if($ad == 'غزة')
     {
      echo "selected";
     }
    ?>
    >غزة</option>
    <option
    <?php
     if($ad == 'الوسطى')
     {
      echo "selected";
     }
    ?>
    >الوسطى</option>
    <option 
    <?php
     if($ad == 'خانيونس')
     {
      echo "selected";
     }
    ?>
    >خانيونس</option>
    <option
    <?php
     if($ad == 'رفح')
     {
      echo "selected";
     }
    ?>
    >رفح</option>
  </select><br><br>

  <div class="form-group">

<input type="checkbox" name="language[]" value="English"

<?php
if(in_array('English',$lang1))
{
  echo "checked";
}
?>
>
<label>English</label>
<input type="checkbox" name="language[]" value="Arabic"

<?php
if(in_array('Arabic',$lang1))
{
  echo "checked";
}
?>
>
<label>Arabic</label>
<input type="checkbox" name="language[]" value="Spain"

<?php
if(in_array('Spain',$lang1))
{
  echo "checked";
}
?>
>
<label>Spain</label>

</div><br>

<input type="file" name="fileimg" value=""></br> <?php echo $im; ?> <br><br>
         
<button class = "btn btn-lg btn-primary btn-block"
 type = "submit" 
name = "btn">updata</button>

      </form>
</body>
</html>