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
		<title>内容確認画面</title>
	</head>
	<body>
		<?php
			require'db.php';

//			session_start();

            $pro_name=$_POST['name_drink'];
            $pro_data=$_POST['data_drink'];
            $pro_price=$_POST['price'];
            $disp_gazou=$_POST['image_drink'];
			if($pro_name=='')
			{
				print '名前が入力されていません。<br />';
			}
			else
			{
				print '名前:';
				print  h($pro_name);
				print '<br />';
            }
            if($pro_data=='')
			{
				print '情報が入力されていません。<br />';
			}
			else
			{
				print '情報:<br/>';
				print  h($pro_data);
				print '<br />';
			}

			if($pro_price=='')
			{
				print '価格が入力されていません。<br />';
			}
			else
			{
				print '価格:';
				print h($pro_price);
				print '<br />';
            }
            if($disp_gazou=='')
			{
				print '画像が入力されていません。<br />';
			}
			else
			{
				print '画像:';
				print  h($disp_gazou);
				print '<br />';
			}

			if($pro_name=='' || $pro_price==''|| $pro_data==''|| $disp_gazou=='')
			{
				print '<form>';
				print '<input type="button" onclick="history.back()" value="戻る">';
				print '</form>';
			}
			else
			{
				print '上記の内容に修正します。<br />';
				print '<br />';

				$_SESSION['name_drink'] = "$pro_name";
                $_SESSION['data_drink'] = "$pro_data";
                $_SESSION['price'] = "$pro_price";
                $_SESSION['image_drink'] = "$disp_gazou";

				print '<form method="post" action="kannri_edit_done.php">';
				print '<input type="button" onclick="history.back()" value="戻る">';
				print '<input type="submit" value="登録">';
				print '</form>';

			}
		?>
	</body>
</html>
