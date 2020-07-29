<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>飲み物一覧</title>
	</head>
	<body>
		<?php
			require'db.php';
			try
			{
				$pro_code=$_GET['procode'];

				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql='SELECT * FROM `mst_beverage` WHERE code_vmachine=:code';
				$stmt=$db->prepare($sql);
				$stmt->bindValue(':code', $pro_code, PDO::PARAM_INT);
				$stmt->execute();

				$db=null;

				print '飲み物一覧<br /><br />';
				

				while(true)
				{
					$rec=$stmt->fetch(PDO::FETCH_ASSOC);
					if($rec==false)
					{
						break;
					}
					//$_SESSION['code_vmachine'] = "$pro_code";

					
					print h($rec['code_drink']).' ';
					//$pro_name = $rec['name_drink'];
					//$pro_price = $rec['code_drink'];
					print h($rec['name_drink']).' ';
					if($rec['image_drink']=='')
					{
						$disp_gazou='';
					}
					else{
						$disp_gazou='<img src="./gazou/'.$rec['image_drink'].'" height="50">';
					}
					print $disp_gazou;
					print '<br /><br /><br />';
				}


				
			}
			catch (Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
				 exit();
				 
			}
		?>
		
		<input type="button" onclick="history.back()" value="戻る"><br/><br/>
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
