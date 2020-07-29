<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>リクエスト画面</title>
	</head>
	<body>
		<?php
			try
			{
				

			print '新商品アンケート<br /><br />';
			
			
			print '<a href="nmn.php">オレンジ</a><br />';
			print '<a href="nmn2.php">カルピス</a><br /><br /><br />';
			
			


			print '<a href="index.php">トップページ</a><br />';
			


			}
			catch (Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
		?>
	</body>
</html>
