<!DOCTYPE html>
<html lang ="ja">
	<head>
		<meta charset="UTF-8">
		<title>ログインフォーム</title>
	</head>
	<body>
		ログインが必要です。
		<form action="login_execute.php" method="post">
			<label for="key">パスワード:</label>
			<input type="password" name="password" id="key" />
			<input type="submit">
		</form>
	</body>
	<?php 
	if(!empty($_POST['password'])){
		$password = "hoge";
		$input_pass= $_POST['password'];

		if($password == $input_pass){
			echo "ログイン成功";
		}else{
			echo "パスワードが間違っています";
		}
	}else{
		echo "パスワードを入力してください";
	}
	 ?>
</html>