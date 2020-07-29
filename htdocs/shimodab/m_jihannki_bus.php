<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>自販機一覧</title>
	</head>
	<body>
		<?php
			//require_once '_database_conf.php';
			//require_once '_h.php';
				/*$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql='SELECT * FROM mst_vmachine';
//				$sql='SELECT code,name,price FROM mst_product WHERE price > 100';
//				$sql='SELECT code,name,price FROM mst_product ORDER BY price DESC';
				$prepare=$db->prepare($sql);
				$prepare->execute();

				$db=null;*/

				print '自販機一覧<br /><br />';

				print '1.左<br />';
				print '2.右<br />';
				

				
			
				print '<br />';
				print '<form method="get" action="jihannki.php">';
				print '自販機表示：番号';
				print '<input type="text" name="procode" style="width:20px">';
				print '<input type="submit" value="決定">';
				print '</form>';




          
		?><br/><br/>

	</body>
</html>

