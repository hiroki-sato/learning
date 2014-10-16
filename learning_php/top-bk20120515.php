<html>l
<head>
<script type="text/javascript" async="" src="./common.js">
<script type="text/javascript">
<!--
function jikoku() {
    dd = new Date();
    document.F1.T1.value = dd.toLocaleString();
    window.setTimeout("jikoku()", 1000);
}
// -->
</script>
<noscript>
JavaScript対応ブラウザで表示してください。
</noscript>
<link href="style-test.css" rel="stylesheet" type="text/css">
<title>クライドの駄作サイト</title>
</head>
<body onLoad="jikoku()">
<form name="F1" action="#">
現在時刻：<input type="text" name="T1" size="50" disabled="disabled">
</form>
<h2>TOPページforテスト</h2>
<div id="visitTimes">（ここに表示されます）</div>
<script language="JavaScript"><!--
var key="freekeyword";
var n=getCookie(key);
n++;
if(n==1)
{
   document.getElementById("visitTimes").innerHTML="はじめまして！ようこそ クライドの駄作サイトへ♪"+n;
}else{
	document.getElementById("visitTimes").innerHTML="まいどおおきに！"+n+"回目の訪問ありがとうございます";
}

setCookie(key,n);

function getCookie(key)
{
   var s,e;
   var c=document.cookie+";";
   var b=c.indexOf(key,0);
   if(b!=-1)
   {
     c=c.substring(b,c.length);
     s=c.indexOf("=",0)+1
     e=c.indexOf(";",s);
     return(unescape(c.substring(s,e)));
   }
   return("");
}
function setCookie(key,n)
{
   var myDate=new Date();
   myDate.setTime(myDate.getTime()+6*30*24*60*60*1000);
   document.cookie=" "+key+"="+escape(n)+"; expires="+myDate.toGMTString();
}
// --></script>
<br><br>

<br><br>

このページはテストで作成したページです。<br>

<?php
  $week[0] = "日";
  $week[1] = "月";
  $week[2] = "火";
  $week[3] = "水";
  $week[4] = "木";
  $week[5] = "金";
  $week[6] = "土";
  date_default_timezone_set('Asia/Tokyo');
  echo "日付".date("Y")."年".date("m")."月".date("d")."日";
  echo "<br>";
  echo "現在時刻".date("H 時 i 分 s 秒");
  echo "<br>";
  echo "本日は".$week[date("w")]."曜日です。";
?>
<br><br>
<center>
<button class="sample3" onClick="button('./profile.php');">テストリンクボタン</button>
<button class="sample3" onClick="button('http://www18.atpages.jp/hirokisato1988/learning_php/mail_from.php');">メール投稿フォーム</button>
<button class="sample3" onClick="button('http://www18.atpages.jp/hirokisato1988/learning_php/write_file_from.php');">ファイル書き込みテスト</button>
<br><br>
<?php
	echo "このファイルの最終更新日時は".date("Y 年 m 月 d 日 H 時 i 分 s 秒", filemtime("top.php"))."です。";
?>
</center>
</body>
</html>