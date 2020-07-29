<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>商品修正</title>
	</head>
	<body>
		<?php
			require'db.php';

			session_cache_expire(30);// 有効期間30分
			session_start();

			try
			{
				$pro_drink=$_GET['prodrink'];

				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql='SELECT * FROM mst_beverage WHERE code_drink = :drink';
				$stmt=$db->prepare($sql);
				$stmt->bindValue(':drink', $pro_drink, PDO::PARAM_INT);
				$stmt->execute();

				$rec=$stmt->fetch(PDO::FETCH_ASSOC);
				$dbh=null;

				if($rec==false)
				{
					print'商品がコードが正しくありません。';
					print'<a href="index.php">戻る</a>';
					print '<br />';
					exit();
				}
				$_SESSION['code_drink'] = "$pro_drink";

                $pro_name = $rec['name_drink'];
                $pro_data = $rec['data_drink'];
                $pro_price = $rec['price'];
                if($rec['image_drink']=='')
				{
					$disp_gazou='';
				}
				else
				{
					$disp_gazou='<img src="./gazou/'.$rec['image_drink'].'" height="100">';
				}
			
			}
			catch(Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
		?>

		商品修正<br />
		<br />
		商品コード<br />
		<?php print $pro_drink; ?><br />

		<form method="post" action="kannri_edit_check.php">
		商品名<br />
		<input type="text" name="name_drink" style="width:200px" value="<?php print $pro_name; ?>"><br />
		商品情報<br />
		<input type="text" name="data_drink" style="width:1000px" value="<?php print $pro_data; ?>"><br />
		商品画像<br />
		<input type="text" name="image_drink" style="width:200px"><br />
		価格<br />
		<input type="text" name="price" style="width:50px" value="<?php print $pro_price; ?>">円<br />
		
		<br />
		<input type="button" onclick="history.back()" value="戻る">
		<input type="submit" value="ＯＫ">
		</form>

	</body>
</html>