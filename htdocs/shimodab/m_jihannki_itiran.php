<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>飲み物一覧</title>
	</head>
	<body>
		<?php
			require_once '_database_conf.php';
			require_once '_h.php';
			try
			{
				$pro_name=$_GET['proname'];

				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql='SELECT * FROM mst_vmachine LEFT OUTER JOIN mst_beverage ON 
				mst_vmachine.code_vmachine=mst_beverage.code_vmachine WHERE name_drink=:drink';
				$stmt=$db->prepare($sql);
				$stmt->bindValue(':drink', $pro_name, PDO::PARAM_INT);
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

					
					print h($rec['code_vmachine']).' ';
					//$pro_name = $rec['name_drink'];
					//$pro_price = $rec['code_drink'];
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
		?>
		
		<input type="button" onclick="history.back()" value="戻る"><br/><br/>
	</body>
</html>