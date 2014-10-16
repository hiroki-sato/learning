<html>l
<head>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<link href="css/style-test.css" rel="stylesheet" type="text/css">
<link href="css/showModalWindow.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="./scripts/common.js"></script>
<script type="text/javascript" src="./scripts/simpleModalWindow.js"></script>
<noscript>JavaScript対応ブラウザで表示してください。</noscript>
<title>Javascriptのテストページ</title>
</head>
<body>
<h2>jsファイルforテスト</h2>
このページはjs(Javascript)のテストページです。<br>
<h3>背景色の変更</h3>
<br>
下のボタンを押すと背景色が変化します。
<br><br>
<form name="form1">
<input type="text" class="" name="text1" value="" id="t1"><label for="t1">バリデートテスト入力フォーム１</label>
<br><br>
<input type="text" class="" name="text2" value="" id="t2"><label for="t2">バリデートテスト入力フォーム２</label>
<br><br>
<input type="button" class="changeBgcBtn" name="changeBgcBtnForRed" onclick="changeBackgroundColor('#FF0000'); changeButtonColor(this, '#FF0000');" value="背景を赤色に変更">
<br><br>
<input type="button" class="changeBgcBtn" name="changeBgcBtnForBlue" onclick="changeBackgroundColor('#0000FF'); changeButtonColor(this, '#0000FF');" value="背景を青色に変更">
<br><br>
<input type="button" class="changeBgcBtn" name="changeBgcBtnForGreen" onclick="changeBackgroundColor('#008000'); changeButtonColor(this, '#008000');" value="背景を緑色に変更">
<br><br>
<input type="button" class="changeBgcBtn" name="changeBgcBtnForDefault" onclick="changeBackgroundColor(''); changeButtonColor('', '');" value="背景色を元へ戻す">
<br><br>
<input type="button" class="sample3" onclick="button('./tinybox2/index.html');" value="モーダルウィンドウのデモ画面へ">
<br><br>
<input type="button" class="sample3" onclick="displayAnotherWindow('http://www.google.co.jp/');" value="別ウィンドウ（タブ）での表示">
<br><br>
<?php
    for($i=0; $i < 5; $i++){
        $arrTestData[$i] = array(
            'id'=>$i,
            'name'=>'hiroki_sato',
            'age'=>'24',
            'job'=>'programmer'
        );
    }
    $arrJson = json_encode($arrTestData);
    echo '-----------------------JSONデータの扱い--------------------<br>';
    echo '<script type="text/javascript">';
    echo "arrJsonData = '$arrJson';";
    echo '</script>';
    echo '-----------------------/JSONデータの扱い-------------------<br>';
    echo '<input type="button" class="sample3" onclick="editJsonDataSample();" value="JSONデータの編集">';
?>
<br><br>
<input type="button" class="sample3" onclick="checkFormValidate();" value="フォーム内入力フォームのバリデートチェック">
<br><br>
<input type="button" class="sample3" onclick="button('./top.php');" value="トップ画面へ戻る">
<br><br>
<div style="text-align:center;">
<ul id="slideUl">
    <li name="slidLi01">第1スライド
        <ul style="display:none;">
            <li name="childLi01">第1スライド子Liタグ1</li>
            <li name="childLi02">第1スライド子Liタグ2</li>
            <li name="childLi03">第1スライド子Liタグ3</li>
        </ul>
    </li>
    <li name="slidLi02">第2スライド
        <ul style="display:none;">
            <li name="childLi01">第2スライド子Liタグ1
                <ul style="display:none;">
                    <li name="child01Li01">第2スライド子01Liタグ1</li>
                </ul>
            </li>
        </ul>
    </li>
    <li name="slidLi03">第3スライド
        <ul style="display:none;">
            <li name="childLi01">第3スライド子Liタグ1</li>
            <li name="childLi02">第3スライド子Liタグ2</li>
            <li name="childLi03">第3スライド子Liタグ3</li>
            <li name="childLi04">第3スライド子Liタグ4</li>
        </ul>
    </li>
</ul>
</div>
<br><br>
</form>

<a class="modal" href="./images/black_abstract.jpg">
<img src="./images/black_abstract.jpg" id="modalImageArea">
</a>
<center>
<?php
	echo "このファイルの最終更新日時は".date("Y 年 m 月 d 日 H 時 i 分 s 秒", filemtime("js-test.php"))."です。";
?>
</center>
<input type="hidden" name="getTextId" value="12">
<input type="hidden" name="getTextId" value="10">
<input type="hidden" name="getTextId" value="1">
<div class="statusBar" name="bgColorDiv">
<span name="testBgColor" style="height:50px; background-color:#ff0000;">name属性テスト１</span>
<span name="testBgColor" style="height:80px; background-color:#ff6600;">name属性テスト２</span>
<span name="testBgColor" style="height:40px; background-color:#0000ff;">name属性テスト３</span>
</div>
<br><br>
<div class="statusBar" name="bgColorDiv">
<span name="testBgColor" style="height:50px; background-color:#ff0000;">name属性テスト４</span>
<span name="testBgColor" style="height:80px; background-color:#ff6600;">name属性テスト５</span>
<span name="testBgColor" style="height:40px; background-color:#0000ff;">name属性テスト６</span>
</div>
<br><br>
<div class="statusBar" name="bgColorDiv">
<span name="testBgColor" style="height:50px; background-color:#ff0000;">name属性テスト７</span>
<span name="testBgColor" style="height:80px; background-color:#ff6600;">name属性テスト８</span>
<span name="testBgColor" style="height:40px; background-color:#0000ff;">name属性テスト９</span>
</div>
<br><br>
<span id="testBgColor111" style="height:120px; background-color:#0000ff;">name属性テスト１０</span>

</body>
</html>