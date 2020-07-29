<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>カルピス</title>
	</head>
	<body>
		<?php
			require_once '_database_conf.php';
			require_once '_h.php';
			try
			{
				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql='SELECT * FROM dat_request2';
//				$sql='SELECT code,name,price FROM mst_product WHERE price > 100';
//				$sql='SELECT code,name,price FROM mst_product ORDER BY price DESC';
				$prepare=$db->prepare($sql);
				$prepare->execute();

				$db=null;

				print 'カルピス<br /><br />';

				while(true)
				{
					$rec=$prepare->fetch(PDO::FETCH_ASSOC);
					if($rec==false)
					{
						break;
					}
					
				}
//カウンタ
$count=$prepare->rowCount();
print '<br />';
print 'ヒット件数';
print '<br />';
print $count;
print '<br />';
				print '<br />';
				print '<a href="nmn2_add.php">リクエスト入力</a><br />';
				
				print '<a href="request_index.php">リクエスト画面</a><br />';


}
catch (Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
		?>
	</body>
</html>
