<?php  
session_start();


if(!isset($_SESSION["login"])){
	header("Location: login.php");
}
?>

<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<ul>
<li><a href="input.php">ニュース新規追加</a></li>
<li><a href="select.php">ニュース一覧（更新はここから）</a></li>
<li><a href="search_ps.php">ニュース検索</a></li>
</ul>
</body>
</html>