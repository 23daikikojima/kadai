<?php
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
$sql = "SELECT * FROM enq";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($results);
// HTML出力用の変数 $view を宣言
$view = "";

// $view に表示する文字列を追記していく
$view .= "<table>";
foreach($results as $row) {
//	var_dump($row);
	$view .= "<tr>";
	$view .= "<td><a href=update.php?id=" . $row["id"] . ">" . $row["id"] . "</a></td>";
	$view .=  "<td><a href=update.php?id=" . $row["id"] . ">" . $row["name"] . "</a></td>";
	$view .= "</tr>";
}
// table閉じタグで終了
$view .= "</table>";
$pdo = null;
?>
<html>
<head>
</head>
<body>
<?php echo $view ?>
<hr>
<!-- 省略形で下のような記述も可能 -->
<?= $view; ?>
<a href="index.php">index.php</a> 
</body>
</html>
