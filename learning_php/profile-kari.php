<?php
	$testArray = array(
		'comp_01_num' => 7,
		'comp_02_num' => 3,
		'comp_03_num' => 3,
		'comp_04_num' => 7,
		'exerices' => 60,
	);

	$testArray['comp_01_num'] = percentCaluculate($testArray['comp_01_num'], $testArray['exerices']);
	$testArray['comp_02_num'] = percentCaluculate($testArray['comp_02_num'], $testArray['exerices']);
	$testArray['comp_03_num'] = percentCaluculate($testArray['comp_03_num'], $testArray['exerices']);
	$testArray['comp_04_num'] = percentCaluculate($testArray['comp_04_num'], $testArray['exerices']);

	$totalPercent =
		$testArray['comp_01_num']
		+ $testArray['comp_02_num']
		+ $testArray['comp_03_num']
		+ $testArray['comp_04_num'];

	var_dump($testArray);

	$preKey;
	echo '<br>合計値'.$totalPercent;
	foreach ($testArray as $key => $value) {
		if ( strstr($key, 'comp_')) {
			// 同じ要素を持つ配列のキー値を取得
			$preKey = getLastKey($key, $value, $testArray);
			if ( ($key === $preKey) && ($totalPercent <= 100) ) {
				$testArray[$key] = round($testArray[$key]);
			} else {
				$testArray[$key] = floor($testArray[$key]);
			}
		}
	}
	var_dump($testArray);
	var_dump($preKey);
	var_dump('load');

	//
	function getLastKey($key, $value, $testArray)
	{
		$pre = null;
		if ($value === $testArray['comp_01_num']) {
			$pre = 'comp_01_num';
		}
		if ($value === $testArray['comp_02_num']) {
			$pre = 'comp_02_num';
		}
		if ($value === $testArray['comp_03_num']) {
			$pre = 'comp_03_num';
		}
		if ($value === $testArray['comp_04_num']) {
			$pre = 'comp_04_num';
		}
		var_dump($pre);
		return $pre;
	}

	function percentCaluculate($value, $exerices)
	{
		if (!empty($exerices) && !empty($value)) {
			return $value / $exerices * 100;
		} else {
			return 0;
		}
	}
?>
<html>
<head>
<link href="css/style-test.css" rel="stylesheet" type="text/css">
<script type="text/javascript" async="" src="scripts/common.js">
<title>hiroの駄作サイト</title>
</head>
<body>
<h2>管理人プロフィールforテスト</h2>
<br><br>
<center>
<table style="width:400px;">
<tr><td style="width:25%;">管理者名</td><td><?php echo"名無し" ;?></td></tr>
<tr><td>生年月日</td><td><?php echo "○/○/○";?></td></tr>
<tr><td>住所</td><td><?php echo "千葉県某所";?></td></tr>
<tr><td>趣味</td><td><?php echo "・・・・特に無いですw";?></td></tr>
</table>
<br>
<center>
<div style="width:400px; text-align:center;">
<div style="width:200px; float:left;">
<button class="link_button" onClick="button('http://www18.atpages.jp/hirokisato1988/learning_php/top.php');">前のページへ戻る</button>
</div>
<a href="http://www18.atpages.jp/hirokisato1988/learning_php/top.php">
<button class="link_button">前のページへ戻る</button>
</a>
</div>
</center>
</center>
</body>
</html>