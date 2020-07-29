<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>登録</title>
	</head>
	<body>
		<?php
			require'db.php';
			
			
			session_start();
			if (isset($_SESSION['code_request'])) {
				$pro_code=$_SESSION['code_request'];
			}
			else{
				print'商品コードが受信できません。';
				exit();
			}
			if (isset($_SESSION['name_request'])) {
				$pro_name=$_SESSION['name_request'];
			}
			else{
				print'名前が受信できません。';
				exit();
			}
			
			session_unset();// セッション変数をすべて削除
			session_destroy();// セッションIDおよびデータを破棄

			try
			{
				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql='INSERT INTO dat_request(name_request) VALUES (:name_request)';
				$prepare=$db->prepare($sql);
				$prepare->bindValue(':name_request', $pro_name, PDO::PARAM_STR);
				$prepare->execute();

				$db=null;

				print h($pro_name).' ';
				print 'を追加しました。<br />';

			}
			catch(Exception$e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
		?>
		<a href="nmn.php">戻る</a>
	</body>
</html>