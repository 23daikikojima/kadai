<?php 
session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
}

$id = $_GET["id"];
$name;
$email;
$age;
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT * FROM news WHERE id = " . $id;
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($results);
foreach($results as $row) {
//	var_dump($row);
	$id = $row["news_id"];
	$news_title= $row["news_title"];
	$news_detail = $row["news_detail"];
}
$pdo = null;
?>
<html>
<head>
</head>
<body>
<form action="update_execute.php" method="post">
	名前: <input type="text" name="name" value="<?php echo $name ?>" />
	email: <input type="text" name="email" value="<?php echo $email ?>" />
	年齢: <input type="text" name="age" value="<?php echo $age ?>" />
	<input type="hidden" name="id" value="<?php echo $id ?>" />
	<input type="submit" value="更新" />
</form>
<form action="delete_execute.php" method="post">
	<input type="hidden" name="id" value="<?php echo $id ?>" />
	<input type="submit" value="削除" />
</form>
</body>
</html>