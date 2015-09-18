<?php 

session_start();

$_SESSION["login"] = "ログイン";

$loginname = $_POST["login"];
$password = $_POST["password"];
$admin = "admin";
$pass = "password";

if($loginname != $admin || $password != $pass) {
	echo "パスワードが間違っています";
	echo "<a href=login.php>戻る</a>";
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