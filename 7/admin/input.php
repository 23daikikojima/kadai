<?php 
session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
}
 ?>

<html>
<head>
</head>
<body>
<form action="input_execute.php" method="post">
	タイトル: <input type="text" name="news_title" value="" />
	ニュース: <input type="text" name="news_detail" value="" />
	<input type="submit" />
</form>
</body>
</html>