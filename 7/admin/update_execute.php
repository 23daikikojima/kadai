<?php
$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$age = $_POST["age"];

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "UPDATE enq set name = '" . $name . "', email = '" . $email . "', age = " . $age . ", update_date = sysdate() " . "WHERE id = " . $id;
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