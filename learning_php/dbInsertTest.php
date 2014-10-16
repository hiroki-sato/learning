<html>
<head>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<link href="css/style-test.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="./scripts/common.js"></script>
<noscript>JavaScript対応ブラウザで表示してください。</noscript>
<title>ゲーム情報登録ページ</title>
</head>
<body>
<h2>ゲーム情報登録画面（18禁版）</h2>
<h3>データ登録</h3>
<br><br>
<form name="formGameInfoInput" action="insertGameInfoOfAdultData.php" type="post">
<label for="title">ゲームタイトル：</label><input type="text" value="" name="game_title"id="title">
<br><br>
<label for="title">ゲームメーカー：</label><input type="text" value="" name="game_brand">
<br><br>
<label for="title">ゲーム発売日：</label><input type="date" value="" name="game_release">
<br><br>
<label for="title">備考：</label><textarea name="game_remarks"></textarea>
<br><br>
<input type="submit" value="データ登録">
<input type="button" class="sample3" onclick="button('./top.php');" value="トップ画面へ戻る">
<br><br>
</form>
</body>
</html>