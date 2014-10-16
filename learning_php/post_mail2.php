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