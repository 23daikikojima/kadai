<?php 
session_start();

$_SESSION["login"] = "ログイン";
?>

<html>
<head>
</head>
<body>
<form action="login_execute.php" method="post">
	ログイン名: <input type="text" name="login" value="" />
	パスワード: <input type="password" name="password" value="" />
	<a href="session4.php"><input type="submit" /></a>
</form> 
</body>
</html>