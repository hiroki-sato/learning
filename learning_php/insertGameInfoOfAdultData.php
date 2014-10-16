<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('db/cls_tblGameOfAdultInfo.inc');

//パラメータを取得
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $params = $_GET;
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $params = $_POST;
}

//登録データセット
$arrInsertData = array();
$arrInsertData['title'] = $params['game_title'];
$arrInsertData['brand'] = $params['game_brand'];
$arrInsertData['release'] = $params['game_release'];
$arrInsertData['remarks'] = $params['game_remarks'];
//テーブルアクセスクラス取得
$cls_tblGameOfAdultInfo = new cls_tblGameOfAdultInfo();
//DBへデータを登録
$result = $cls_tblGameOfAdultInfo->insertDataToDb($arrInsertData);
//DB接続を切断
$cls_tblGameOfAdultInfo->closeDb();
if($result){
    header("Location: ./gameInfoList.php");
}else{
    header("Location: ./dbInsertError.php");
}
exit;
