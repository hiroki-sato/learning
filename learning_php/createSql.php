<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $params = $_POST;
} else {
    $params = $_GET;
}
// ファイル出力フラグ
$output_file_flg = (isset($params['output_file_flg']) && !empty($params['output_file_flg']) && $params['output_file_flg'] === "1") ? true: false;
// 繰り返し設定
$roop_cnt = (isset($params['roop_cnt']) && !empty($params['roop_cnt'])) ? $params['roop_cnt']: 1;
// 領域コード
$se = (isset($params['se']) && !empty($params['se'])) ? $params['se']: '';
// 都道府県コード
$tf = (isset($params['tf']) && !empty($params['tf'])) ? $params['tf']: '';
// 市区群コード
$sc = (isset($params['sc']) && !empty($params['sc'])) ? $params['sc']: '';

if ($output_file_flg) {
    outputFile($roop_cnt, $se, $tf, $sc);
} else {
    viewData($roop_cnt, $se, $tf, $sc);
}

function viewData ($roop_cnt, $se, $tf, $sc) {
    ini_set('memory_limit', '512M');

    $kensaku_joken_datas = generateData($roop_cnt, $se, $tf, $sc);

    echo "<form action='createSql.php' method='post'>";
    echo "<input type='hidden' name='output_file_flg' value='1' />";
    echo "<input type='hidden' name='roop_cnt' value='$roop_cnt'' />";
    echo "<input type='hidden' name='se' value='$se'' />";
    echo "<input type='hidden' name='tf' value='$tf'' />";
    echo "<input type='hidden' name='sc' value='$sc'' />";
    echo "<input type='submit' value='Insert文としてSQLファイルへ出力' />";
    $output_string = "";
    if (count($kensaku_joken_datas) >= 1) {
        $insert_data = array();
        $insert_sql_string = "INSERT INTO kensaku_joken VALUES \n";
        $roop = 0;
        foreach ($kensaku_joken_datas as $key => $data) {
            $roop += 1;
            $insert_data[] = "('$data[id]', '$data[json]')";
            if ($roop >= 1000) {
                $output_string .= $insert_sql_string;
                $output_string .= implode(",\n", $insert_data);
                $output_string .= ";\n";
                $output_string = nl2br($output_string);
                echo "<p>$output_string</p>";
                $insert_data = array();
                $output_string = '';
                $roop = 0;
            }
        }
        $output_string .= $insert_sql_string;
        $output_string .= implode(",\n", $insert_data);
        $output_string .= ";";
        $output_string = nl2br($output_string);
        echo "<p> $output_string</p>";
    }
    echo "</form>";
}

function outputFile ($roop_cnt, $se, $tf, $sc) {
    ini_set('memory_limit', '512M');
    $kensaku_joken_datas = generateData($roop_cnt, $se, $tf, $sc);

    $text_file   = 'insertSQL.sql';
    $output_string = "";
    if (count($kensaku_joken_datas) >= 1) {
//         $fp = fopen('insertSQL.sql', 'a+');
        $insert_data = array();
        $insert_sql_string = "INSERT INTO kensaku_joken VALUES \n";
        $roop = 0;
        foreach ($kensaku_joken_datas as $key => $data) {
            $roop += 1;
            $insert_data[] = "('$data[id]', '$data[json]')";
            if ($key >= 1000) {
                $output_string .= $insert_sql_string;
                $output_string .= implode(",\n", $insert_data);
                $output_string .= ";\n";
                $insert_data = array();
                $roop = 0;
            }
        }
        $output_string .= $insert_sql_string;
        $output_string .= implode(",\n", $insert_data);
        $output_string .= ";";
//         fwrite($fp, $output_string);
//         fclose($fp);
    }

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $text_file);
    header('Content-Length:' . strlen($output_string));
    header('Pragma: no-cache');
    header('Cache-Control: no-cache');
    echo $output_string;
    exit;
}

function generateData ($roop_cnt, $se, $tf, $sc) {
    $kensaku_joken_datas = array();

    $roop = 0;
    while ($roop < $roop_cnt) {
        $roop += 1;

        if ($roop >= 2) {
            if (intVal($tf) >= 1000) {
                $tf = 100;
            }
            if (intVal($sc) >= 1000) {
                $tf += 1;
                $sc = 100;
            }
            if (intVal($sc) < 1000) {
                $sc += 1;
            }
        }

        $kensaku_joken = array('SE'=>$se, 'TF'=>$tf, 'SC'=>$tf.$sc);
        $json_value = json_encode($kensaku_joken);
        $hash_value = md5($json_value);

        $kensaku_joken_datas[] = array('id'=>$hash_value, 'json'=>$json_value);
    }

    return $kensaku_joken_datas;
}