<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('const/def_CommonConst.inc');

class cls_tblGameOfAdultInfo{
    private $db;
    private $dbUrl;
    private $dbName;
    private $userId;
    private $passwd;
    private $connect;
    private $dbChar;

    public function cls_tblGameOfAdultInfo(){
        $this->dbUrl = GAMEINFO_DBURL;
        $this->dbName = GAMEINFO_DBNAME;
        $this->userId = GAMEINFO_DB_USERID;
        $this->passwd = GAMEINFO_DB_PASSWD;
        // MySQLへ接続する
        $this->connect = mysql_connect($this->dbUrl,$this->userId,$this->passwd) or die("MySQLへの接続に失敗しました。");
        mysql_set_charset("utf8");
        // データベースを選択する
        $this->db = mysql_select_db($this->dbName,$this->connect) or die("データベースの選択に失敗しました。");
    }//end function

    public function insertDataToDb($saveData){
        $blnErrorFlg = false;
        if(!empty($saveData) && is_array($saveData)){
            $arrInsertItemName = $this->getInsertItem();
            $arrNullItem = $this->getNullItem();
            //挿入データチェック-NULL値許容
            foreach($arrNullItem as $item){
                unset($arrInsertItemName[$item]);
                ${$item} = $saveData[$item];
            }
            //挿入データチェック-必須項目
            foreach($arrInsertItemName as $item){
                if(array_key_exists($item, $saveData) && !empty($saveData[$item])){
                     ${$item} = $saveData[$item];
                 }else{
                    $blnErrorFlg = true;
                    break;
                }
            }
        }
        //エラーがある場合は処理を終了
        if($blnErrorFlg) return false;
        $created = date("Y-m-d H:i:s");
        $modified = date("Y-m-d H:i:s");

        // クエリを送信する
//		mysql_query("SET NAMES UTF-8");

        $insertSql = "INSERT INTO game_of_adult_info (`title`, `brand`, `release`, `remarks`, `created`, `modified`) VALUES ('$title', '$brand', '$release', '$remarks', '$created', '$modified')";
        $result = mysql_query($insertSql);
        if(!$result){
            $errorMessage = $this->createErrorMessage(mysql_errno(), mysql_error(), $insertSql);
            $errorMessage .= '<br />';
            $errorMessage .= '<a href="./dbInsertTest.php"><input type="button" value="データ登録画面へ戻る"></a>';
            echo $errorMessage;
            exit ;
        } else{
            return $result;
        }
    }//end function

    public function selectAllData(){
        // クエリを送信する
        $selectSql = "SELECT * FROM game_of_adult_info ORDER BY `release` ASC";
        $result = mysql_query($selectSql) or die("クエリの送信に失敗しました。<br />SQL:".$selectSql);

        $arrResult = array();
        $index = 0;
        while ($row = mysql_fetch_assoc($result)) {
            $arrResult[$index] = $row;
            $index++;
        }
        //結果保持用メモリを開放する
        mysql_free_result($result);

        return $arrResult;
    }//end function

    public function selectBrandReleaseData(){
        // クエリを送信する
        $selectSql = "SELECT `brand`, `release` FROM game_of_adult_info GROUP BY `brand`";
        $result = mysql_query($selectSql) or die("クエリの送信に失敗しました。<br />SQL:".$selectSql);

        $arrResult = array();
        $index = 0;
        while ($row = mysql_fetch_assoc($result)) {
            $arrResult[$index] = $row;
            $index++;
        }
        //結果保持用メモリを開放する
        mysql_free_result($result);

        return $arrResult;
    }//end function

    public function selectDataByBrandLvExactMatch($selectBrand){
        // クエリを送信する
        $selectSql = "SELECT * FROM game_of_adult_info WHERE `brand` = '" . $selectBrand . "' ORDER BY `release` ASC";
        $result = mysql_query($selectSql) or die("クエリの送信に失敗しました。<br />SQL:".$selectSql);

        $arrResult = array();
        $index = 0;
        while ($row = mysql_fetch_assoc($result)) {
            $arrResult[$index] = $row;
            $index++;
        }
        //結果保持用メモリを開放する
        mysql_free_result($result);

        return $arrResult;
    }//end function

    public function selectDataById($selectId){
        // クエリを送信する
        $selectSql = "SELECT * FROM game_of_adult_info";
		$selectSql .= "WHERE";
		// IDが複数で渡されたら、条件式を複数選択にする
		if(!empty($selectId)){
			if(is_array($selectId)){
				$roopCount = 0;
				foreach($selectId as $key => $data){
					if($roopCount >= 1){
						$selectSql .= " AND ";
					}
					$selectSql .= " `id` = " . $data;
					$roopCount++;
				}
			}else{
				$selectSql .= " `id` = " . $selectId;
			}
		}
		$selectSql .= " ORDER BY `id` ASC";
        $result = mysql_query($selectSql) or die("クエリの送信に失敗しました。<br />SQL:".$selectSql);

        $arrResult = array();
        $index = 0;
        while ($row = mysql_fetch_assoc($result)) {
            $arrResult[$index] = $row;
            $index++;
        }
        //結果保持用メモリを開放する
        mysql_free_result($result);

        return $arrResult;
    }//end function

    public function closeDb(){
        // MySQLへの接続を閉じる
        return mysql_close($this->connect) or die("MySQL切断に失敗しました。");
    }//end function

    private function getInsertItem(){
        $itemName = array(
            'title'=>'title',
            'brand'=>'brand',
            'release'=>'release',
            'remarks'=>'remarks',
        );
        return $itemName;
    }//end function

    private function getNullItem(){
        $itemName = array(
            'remarks'=>'remarks'
        );
        return $itemName;
    }//end function

    private function createErrorMessage($errorNo, $error, $useSql){
        $returnMessage = '';
        $returnMessage .= "エラー番号 : $errorNo,<br />メッセージ : $error,<br />";
        $returnMessage .= "クエリの送信に失敗しました。<br />SQL : $useSql";
        return $returnMessage;
    }//end function
}
?>
