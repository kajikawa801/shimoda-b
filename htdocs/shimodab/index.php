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
				

			print '自販機共有システム<br /><br />';
			
			print '<a href="kannri_login.html">管理画面</a><br />';
			print '<a href="m_index.php">マップ</a><br />';
			print '<a href="replenishment.php">飲物一覧</a><br />';
			print '<a href="request_index.php">リクエスト</a><br />';


			}
			catch (Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
		?>
	</body>
</html>
