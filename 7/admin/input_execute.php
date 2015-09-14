<?php
$name = $_POST["name"];
$email = $_POST["email"];
$age = $_POST["age"];

$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "INSERT INTO enq (id, name, email, age, create_date, update_date) 
VALUES (NULL, '" . $name . "', '" . $email . "', " . $age . ", sysdate(), sysdate()) ";
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