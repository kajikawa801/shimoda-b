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

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>DB登録</title>
	</head>
	<body>
		<?php
			require'db.php';

//			session_start();
			if (isset($_SESSION['code_drink'])) {
				$pro_drink=$_SESSION['code_drink'];
			}
			else{
				print'商品コードが受信できません。';
				exit();
			}
			if (isset($_SESSION['name_drink'])) {
				$pro_name=$_SESSION['name_drink'];
			}
			else{
				print'名前が受信できません。';
				exit();
            }
            if (isset($_SESSION['data_drink'])) {
				$pro_data=$_SESSION['data_drink'];
			}
			else{
				print'情報が受信できません。';
				exit();
			}
			if (isset($_SESSION['price'])) {
				$pro_price=$_SESSION['price'];
			}
			else{
				print'価格が受信できません。';
				exit();
			}
			if (isset($_SESSION['image_drink'])) {
				$disp_gazou=$_SESSION['image_drink'];
			}
			else{
				print'画像が受信できません。';
				exit();
			}
			
//			session_unset();// セッション変数をすべて削除
//			session_destroy();// セッションIDおよびデータを破棄

			try
			{
				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql='UPDATE mst_beverage SET name_drink=:name,price=:price,image_drink=:gazou,data_drink=:data WHERE code_drink=:drink';
				$prepare=$db->prepare($sql);
                $prepare->bindValue(':name', $pro_name, PDO::PARAM_STR);
                $prepare->bindValue(':data', $pro_data, PDO::PARAM_STR);
                $prepare->bindValue(':price', $pro_price, PDO::PARAM_INT);
                $prepare->bindValue(':gazou', $disp_gazou, PDO::PARAM_STR);
				$prepare->bindValue(':drink', $pro_drink, PDO::PARAM_INT);
				$prepare->execute();

				$db=null;

				print '修正しました。<br />';

			}
			catch(Exception$e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
		?>
		<a href="kannri_index.php">戻る</a>
	</body>
</html>
