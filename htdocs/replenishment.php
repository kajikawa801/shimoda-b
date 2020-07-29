<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>飲料一覧</title>
	</head>
	<body>
		<?php
			require'db.php';
			try
			{
				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql='SELECT * FROM mst_beverage';
//				$sql='SELECT code,name,price FROM mst_product WHERE price > 100';
//				$sql='SELECT code,name,price FROM mst_product ORDER BY price DESC';
				$prepare=$db->prepare($sql);
				$prepare->execute();

				$db=null;

				print '商品一覧<br /><br />';

				while(true)
				{
					$rec=$prepare->fetch(PDO::FETCH_ASSOC);
					if($rec==false)
					{
						break;
					}
				
					print '<form method="get" action="n_syouhinn.php">';
					print h($rec['code_drink']).' ';
					print '<input type="text" name="procode" style="width:20px">';
					print '<input type="submit" value="決定">';
					print '</form>';
                    print '<br />';
                    //画像
					if($rec['image_drink']=='')
					{
						$disp_gazou='';
					}
					else{
						$disp_gazou='<img src="./gazou/'.$rec['image_drink'].'" height="150">';
					}
					print $disp_gazou;
					print '<br />';
					print h($rec['name_drink']).' ';
                    print '<br />';
                    print '<br />';
				}
				

				
			}
			catch (Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
		?>
        <a href="index.php">トップページへ</a><br><br>
	</body>
</html>
