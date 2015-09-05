<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<form action="confirm_enq.php" method="get">
	<p>名前: <input type="text" name="name" /></p>
	<p>Email: <input type="text" name="email" /></p>
	
	<p>年齢: <input type="text" name="age"></p>
	<p>性別: 
		男<input type="radio" name="gender" value="男">
		女<input type="radio" name="gender" value="女">
	</p>

	<p>趣味:</p>
	<p>
		    料理<input type="checkbox" name="hobby[]" value="料理">
		    旅行<input type="checkbox" name="hobby[]" value="旅行">
		    プログラミング<input type="checkbox" name="hobby[]" value="プログラミング">
		    野球観戦<input type="checkbox" name="hobby[]" value="野球観戦">
		    ダンス<input type="checkbox" name="hobby[]" value="ダンス">
		    カメラ<input type="checkbox" name="hobby[]" value="カメラ">
		    カフェ巡り<input type="checkbox" name="hobby[]" value="カフェ巡り">
		    読書<input type="checkbox" name="hobby[]" value="読書">
		    ゲーム<input type="checkbox" name="hobby[]" value="ゲーム">
		    カラオケ<input type="checkbox" name="hobby[]" value="カラオケ">
		    

	</p>
    <input type="submit" />
</form>

</body>
</html>