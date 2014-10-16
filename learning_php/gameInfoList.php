<html>l
<head>
<link href="css/style-test.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="./scripts/common.js"></script>
<title>ゲーム情報一覧</title>
</head>
<body>
<h2>18禁ゲーム情報一覧</h2>
<?php echo '本日日付：<b>' . date('Y年m月d日') . '</b>　';?>
<?php echo '現在時刻：<b>' . date('H時i分s秒') . '</b>';?>
<center>
<div style="width:400px; text-align:center;">
<div style="width:200px; float:left;">
<a href="./top.php">
<button class="link_button">トップページへ戻る</button>
</a>
</div>
<a href="./dbInsertTest.php">
<button class="link_button">ゲーム情報を登録する</button>
</a>
</div>
<div style="float:both;"></div>
<br>
<?php
require_once('db/cls_tblGameOfAdultInfo.inc');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $requestParameter = $_POST;
}else{
    $requestParameter = $_GET;
}
//テーブルアクセスクラス取得
$cls_tblGameOfAdultInfo = new cls_tblGameOfAdultInfo();
//DBからデータを取得
$arrBrandData = $cls_tblGameOfAdultInfo->selectBrandReleaseData();
if(array_key_exists('select_brand', $requestParameter) && !empty($requestParameter['select_brand'])){
    $arrGameInfo = $cls_tblGameOfAdultInfo->selectDataByBrandLvExactMatch($requestParameter['select_brand']);
}else{
    $arrGameInfo = $cls_tblGameOfAdultInfo->selectAllData();
}
?>
<form action="./gameInfoList.php" method="GET">
<select name="select_brand">
    <option value="0">全てのブランド</option>
    <?php
        if(!empty($arrBrandData) && is_array($arrBrandData)){
            foreach($arrBrandData as $key => $data){
                ($requestParameter['select_brand'] == $data['brand'])  ?$selected = 'selected' :$selected = '' ;
                echo '<option value="' . $data['brand'] . '"' . $selected . ' >' . $data['brand'] . '</option>';
            }
        }
    ?>
</select>
<input type="submit" onclick="" value="このブランドのゲームを表示する">
</form>
<br>
<?php if(!empty($arrGameInfo) && is_array($arrGameInfo)):?>
<div style="margin-left: 1.5%;">
<?php foreach($arrGameInfo as $key => $game_info):?>
<table style="margin:0 3% 15px 2%; border:2px solid black; float:left;">
<tr><td class="view_item">タイトル</td><td><?php echo $game_info['title'];?></td></tr>
<tr><td>メーカー</td><td><?php echo $game_info['brand'];?></td></tr>
<tr><td>発売日</td><td><?php echo date('Y/m/d', strtotime($game_info['release']));?></td></tr>
<tr style="height:100px;"><td>備考</td><td class="empty_show"><?php echo (empty($game_info['remarks'])) ?'&nbsp;':$game_info['remarks'];?></td></tr>
</table>
<?php endforeach;?>
</div>
<?php else:?>
<b>登録されているゲーム情報はありません</b>
<?php endif;?>
</center>
</body>
<script type="text/javascript">
    (function(){
       $('iframe') . attr('style', 'display:none;');
    });
</script>
</html>