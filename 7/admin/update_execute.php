<?php 
session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
}

$id = $_POST["id"];
$news_title = $_POST["news_title"];
$news_detail = $_POST["news_detail"];


$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "UPDATE news set name = '" . $news_title . "', email = '" . $news_detail . "', update_date = sysdate() " . "WHERE id = " . $id;
var_dump($sql);
$stmt = $pdo->prepare($sql);
$result = $stmt->execute();
var_dump($result);
if($result) {
	echo "データが更新できました";
	echo "<a href=select.php>一覧へ</a>";
} else {
	echo "データの登録に失敗しました";
}
$pdo = null;
?>
<html>
<head>
</head>
<body>
</body>
</html>