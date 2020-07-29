
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>設定画面</title>
	</head>
	<body>
		<?php
			require'db.php';

//			session_cache_expire(30);// 有効期間30分
//			session_start();

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
					print'<a href="kannri_index.php">戻る</a>';
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
					$disp_gazou='<img src="./gazou/'.$rec['image_drink'].'">';
				}
                
			}
			catch(Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
		?>

	　設定画面<br />
		<br />
        商品修正<br />
		商品番号：<?php print $pro_drink; ?><br />
		<form method="post" action="kannri_edit_check.php">
		<fieldset style="border: 5px solid #ff6699; font-size: 90%;padding: 10px;width: 1000px;"><legend>商品名</legend>
        <input type="radio" name="name_drink" value="WONDA モーニングショット" >WONDA モーニングショット
		<input type="radio" name="name_drink"  value="WONDA 金の微糖">WONDA 金の微糖 
		<input type="radio" name="name_drink"  value="三ツ矢サイダー">三ツ矢サイダー
		<input type="radio" name="name_drink"  value="十六茶">十六茶
		<input type="radio" name="name_drink"  value="モンスターエナジー">モンスターエナジー
		<input type="radio" name="name_drink"  value="カルピスウォーター">カルピスウォーター</fieldset>
		<fieldset style="border: 5px solid #ff6699; font-size: 90%;padding: 10px;width: 1000px;"><legend>商品説明</legend>
		<input type="radio" name="data_drink" value="コーヒー。アサヒ飲料のWANDAシリーズの定番。 朝のスイッチをオンにする 朝専用 缶コーヒースッと飲めて、キリッと苦味。 “焼きたて・挽きたて・淹れたて”の目覚めるおいしさ。 毎朝のスタートにふさわしい朝専用缶コーヒーです。" >WONDA モーニングショット
		<input type="radio" name="data_drink" value="ブラジル最高等級高級豆100%に高級豆で抽出したエスプレッソをブレンドすることで、コク深い味わいとキレのよい後味を実現。 仕事に向かう前に、こだわりのひとときが愉しめるプレミアム微糖缶コーヒーです。 " >WONDA 金の微糖 
		<input type="radio" name="data_drink" value="ろ過を重ねた安心・安全な磨かれた水を使っています。 果実などから集めた香りにより、独自のおいしさがうまれます。 熱を加えていないので、さわやかな味わいが引き立ちます。 " >三ツ矢サイダー
		<input type="radio" name="data_drink" value="「十六茶」は「東洋健康思想」の考え方に基づき、カラダの内外にバランスよく刺激を与えることを目的として、16種類もの健康素材をブレンドしています。 " >十六茶
		<input type="radio" name="data_drink" value="アメリカで生まれ、世界中で一大ブームを巻き起こしているエナジードリンク、Monster! 誰もがハマる爽快感とパンチのあるテイスト。 " >モンスターエナジー
		<input type="radio" name="data_drink" value="すっきり爽やかな味わい、純水でおいしく仕上げた「カルピス」です。 乳酸菌と酵母、発酵という自然製法が生みだす独自のおいしさを、いつでもどこでも手軽に楽しめます。 " >カルピスウォーター</fieldset>
		<fieldset style="border: 5px solid #ff6699; font-size: 90%;padding: 10px;width: 1000px;"><legend>商品イメージ</legend>
		<input type="radio" name="image_drink" value="wonda_morning.jpg" >WONDA モーニングショット
		<input type="radio" name="image_drink" value="wonda_gold.jpg" >WONDA 金の微糖 
		<input type="radio" name="image_drink" value="mitsuya-cider.jpg " >三ツ矢サイダー
		<input type="radio" name="image_drink" value="sixteentea.jpg" >十六茶
		<input type="radio" name="image_drink" value="monster-energy.jpg" >モンスターエナジー
		<input type="radio" name="image_drink" value="calpis_water.jpg" >カルピスウォーター</fieldset>
		<fieldset style="border: 5px solid #ff6699; font-size: 90%;padding: 10px;width: 1000px;"><legend>価格</legend>
        <input type="radio" name="price" value="130" >WONDA モーニングショット
		<input type="radio" name="price" value="130" >WONDA 金の微糖 
		<input type="radio" name="price" value="120" >三ツ矢サイダー
		<input type="radio" name="price" value="150" >十六茶
		<input type="radio" name="price" value="210" >モンスターエナジー
		<input type="radio" name="price" value="150" >カルピスウォーター</fieldset><br /><br /><br />
		<input type="button" onclick="history.back()" value="戻る">
		<input type="submit" value="決定"><br/><br/>

       
	</body>
</html>