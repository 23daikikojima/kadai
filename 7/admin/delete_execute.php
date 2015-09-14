<?php
$id = $_POST["id"];

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "DELETE FROM enq WHERE id = " . $id;
var_dump($sql);
$stmt = $pdo->prepare($sql);
$result = $stmt->execute();
var_dump($result);
if($result) {
	echo "データが削除できました";
	echo "<a href=select.php>一覧へ</a>";
} else {
	echo "データの削除に失敗しました";
}
$pdo = null;
?>
<html>
<head>
</head>
<body>
</body>
</html>