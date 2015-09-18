<?php
session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
}


$news_title = $_POST["news_title"];
$news_detail = $_POST["news_detail"];

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "INSERT INTO news (news_id, news_title, news_detail, create_date, update_date) 
VALUES (NULL, '" . $news_title . "', '" . $news_detail . "', sysdate(), sysdate()) ";
var_dump($sql);
$stmt = $pdo->prepare($sql);
$result = $stmt->execute();
var_dump($result);
if($result) {
	echo "データが登録できました";
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