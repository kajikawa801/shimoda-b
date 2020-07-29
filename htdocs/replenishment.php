<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>飲料一覧</title>
	</head>
	<body>
		<?php
			require'db.php';
			require_once '_common.php';
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

				print '飲物一覧<br /><br />';

//検索処理に入れ替えるためコメントアウト
/*
				while(true)
				{
					$rec=$prepare->fetch(PDO::FETCH_ASSOC);
					if($rec==false)
					{
						break;
					}
					print h($rec['code']).' ';
					print h($rec['name']).' ';
					print h($rec['price']);
					print '<br />';
				}
*/

//検索処理（はじめ）
				//検索キーワード入力
				print '<form method="post" action="">';
				print '検索キーワード';
				print '<input type="text" name="keyword">';
				print '<input type="submit" value="検索">';
				print '</form>';

				//検索キーワード空チェック
				if (isset($_POST['keyword'])){
					$keyword=$_POST['keyword'];
				}
				else{
					$keyword='';
				}
				print '<br />';

				//検索キーワード表示
				if ($keyword!==''){
					print $keyword.'が含まれる商品';
					print '<br />';
				}

				while(true)
				{
					$rec=$prepare->fetch(PDO::FETCH_ASSOC);
					if($rec==false)
					{
						break;
					}
					//検索処理
					if (($keyword==='')||(strpos($rec['name_drink'],$keyword)!==false)){
						
						print h($rec['code_drink']).' ';
						
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
				print '<form method="get" action="m_jihannki_itiran.php">';
						print '商品表示：名前';
						pulldown_disp();
						print '<input type="submit" value="決定">';
						print '</form>';
						print '<br />';
//検索処理（おわり）
			}
			catch (Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
		?>
        <a href="index.php">トップページへ</a><br><br>
		<a href="#" onclick="window.history.back(); return false;">直前のページに戻る</a>
		
	</body>
</html>

