<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>商品表示</title>
	</head>
	<body>
		<?php
			require_once '_database_conf.php';
			require_once '_h.php';
			session_start();
			try
			{
				$pro_code=$_GET['procode'];

				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql='SELECT * FROM dat_request2 WHERE code_request = :code_request';
				$stmt=$db->prepare($sql);
				$stmt->bindValue(':code_request', $pro_code, PDO::PARAM_INT);
				$stmt->execute();

				$rec=$stmt->fetch(PDO::FETCH_ASSOC);
				$dbh=null;

				if($rec==false)
				{
					print'商品かコードが正しくありません。';
					print'<a href="nmn2_add.php">戻る</a>';
					print '<br />';
					exit();
				}
			}
			catch(Exception$e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
			$_SESSION['name_request'] = $rec['name_request'];
			$_SESSION['code_request'] = $rec['code_request'];
			print '<form method="post" action="nmn2_add_done.php">';
				print '<input type="button" onclick="history.back()" value="戻る">';
				print '<input type="submit" value="登録">';
				print '</form>';
		?>

		
		商品コード<br />
		<?php print h($rec['code_request']); ?><br />
		商品名<br />
		<?php print h($rec['name_request']); ?><br />
		

	</body>
</html>
