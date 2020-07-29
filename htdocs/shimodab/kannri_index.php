
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>自販機選択画面</title>
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

				$sql='SELECT * FROM mst_vmachine';
//				$sql='SELECT code,name,price FROM mst_product WHERE price > 100';
//				$sql='SELECT code,name,price FROM mst_product ORDER BY price DESC';
				$prepare=$db->prepare($sql);
				$prepare->execute();

				$db=null;

				print '自販機選択画面<br /><br />';

				while(true)
				{
					$rec=$prepare->fetch(PDO::FETCH_ASSOC);
					if($rec==false)
					{
						break;
					}
					print '<br />';
				print '<form method="get" action="kannri_index2.php">';
				print '商品修正：番号';
				print '<input type="text" name="procode" style="width:20px">';
				print '<input type="submit" value="決定">';
				print '</form>';
					print h($rec['code_vmachine']).' ';
					print h($rec['name_vmachine']).' ';
					if($rec['image']=='')
					{
						$disp_image='';
					}
					else{
						$disp_image='<img src="./gazou/'.$rec['image'].'" height="50">';
					}
					print $disp_image;
					print '<br /><br /><br />';
				}
			
				


				
			}
			catch (Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
		?><br/><br/>
		<input type="button" onclick="history.back()" value="戻る"><br/><br/><br/><br/>
		<?php
	session_start();
	session_regenerate_id(true);
	if(isset($_SESSION['login'])==false)
	{
		print 'ログインされていません。<br />';
		print '<a href="./kannri_login.html">ログイン画面へ</a>';
		exit();
	}
	else
	{
		print $_SESSION['login_name'];
		print 'さんログイン中<br />';
		print '<a href="kannri_logout.php">ログアウト</a><br />';
		print '<br />';
	}
?>


	</body>
</html>
