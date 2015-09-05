<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<?php 
     $name=htmlspecialchars($_GET["name"],ENT_QUOTES);
     $email=htmlspecialchars($_GET['email'],ENT_QUOTES);
     $age=htmlspecialchars($_GET['age'],ENT_QUOTES);
     $gender=htmlspecialchars($_GET['gender'],ENT_QUOTES);
?>
<body>

<?php $name = $_GET["name"];
      echo $name;
 ?>


<br>
<?php $email = $_GET["email"];
      echo $email;
 ?>
<br>
<?php $age = $_GET["age"]; 
      echo $age;
?>
<br>
<?php $gender = $_GET["gender"];
      echo $gender;
 ?>
<br>

<?php foreach($_GET["hobby"] as $value){
    $content = "{$value}, ";
    echo $content; }
?>
<?php 
$str = $name.",".$email.",".$age.",".$gender.",".$content;
$file = fopen("../data.csv","w");
flock($file,LOCK_EX);
fputs($file,$str);
flock($file,LOCK_UN);
fclose($file);
 ?>




<form action="input_finish.php" method="get">
	<input type="submit">
</form>
</body>
</html>