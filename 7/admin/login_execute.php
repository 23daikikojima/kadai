<?php 
session_start(); 		// セッションを使うときは宣言
// 商品をカートに入れた
$loginname = $_POST["login"];
$password = $_POST["password"];
$admin = "admin";
$pass = "password";

if($loginname != $admin || $password != $pass) {
	echo "パスワードが間違っています";
} else {
	echo "ログインできました";
	echo "<a href=index.php>一覧へ</a>";
}
?>
<html>
<head>
</head>
<body>
</body>
</html>