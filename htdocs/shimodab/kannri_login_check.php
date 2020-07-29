<?php
	require_once '_database_conf.php';
	require_once '_h.php';
	try
	{
		//データ受取
		$login_name=$_POST['name'];
		$login_pass=$_POST['password'];

		$db = new PDO($dsn, $dbUser, $dbPass);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql='SELECT * FROM login_data WHERE name=:name AND password=:password';
		$prepare=$db->prepare($sql);
		$prepare->bindValue(':name', $login_name, PDO::PARAM_STR);
		$prepare->bindValue(':password', $login_pass, PDO::PARAM_STR);
		$prepare->execute();

		$db=null;

		//ログイン判定
		$rec=$prepare->fetch(PDO::FETCH_ASSOC);

		if($rec==false)
		{
			print 'IDかパスワードが間違っています。<br />';
			print '<a href="kannri_login.html"> 戻る</a>';
		}
		else
		{
			//セッションの開始
			session_start();
			$_SESSION['login']=1;
			$_SESSION['login_code']=$rec['code'];
			$_SESSION['login_name']=$login_name;

			//リダイレクト処理
			header('Location:kannri_index.php');
			exit();
		}
	}
	catch (Exception $e)
	{
		echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 	exit();
	}
?>
