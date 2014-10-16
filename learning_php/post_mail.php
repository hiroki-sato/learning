<head>
<!--HEADタグにはさむ-->
<meta http-equiv="refresh" content="3;URL=http://www18.atpages.jp/hirokisato1988/learning_php/top.php">
<!--ここまで-->
</HEAD>

<?php
//文字コード定義(phpソースやHTMLのソースに合わせて設定してください)
//以下の定義しないと、文字化けの原因になります。
mb_language("Japanese");
mb_internal_encoding("UTF-8");

//宛先
$to = "hirogx9900@ezweb.ne.jp";
//差出人
$header = "From: "."fate-nextplus091222@ac.auone-net.jp";
//件名
$subject = "お問い合わせ";
//本文
$body .= $_POST["content"];

if(mb_send_mail($to,$subject,$body,$header)){
   echo "メール送信成功しました。";
}else{
   echo "メール送信失敗しました。";
}
?>
/*
<?php
function redirect($controller_and_query) {

  $controller_and_query = htmlspecialchars($controller_and_query, ENT_QUOTES, 'UTF-8'); //など

  $url = 'http://'.$_SERVER['HTTP_HOST'].$controller_and_query;

  $contents = <<<END
5秒後に <a href="$url">$url</a> に移動します。<br />
<script type="text/javascript">
<!--
setTimeout(function(){
  location.replace('$url');
}, 5000);
-->
</script>
END;

  //必要なら
  //$contents = mb_convert_encoding($contents, 'EUC-JP', 'auto');

  echo $contents; //これを return して応用する
  exit;
}
?>
*/