<html>l
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="css/style-test.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="./scripts/common.js"></script>
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
<button class="sample3" onClick="button('./mail_from.php');">メール投稿フォーム</button>
<button class="sample3" onClick="button('./write_file_from.php');">ファイル書き込みテスト</button>
<button class="sample3" onClick="button('./js-test.php');">Javascript検証</button>
<br><br>
<button class="sample3" onClick="button('./dbInsertTest.php');">DB操作検証-データ挿入・更新・削除</button>
<button class="sample3" onClick="button('./gameInfoList.php');">DB操作検証-データ表示</button>
<button class="sample3" onClick="button('./ajax-test.php');">Ajax通信検証</button>
<br><br>
<?php
	echo "このファイルの最終更新日時は".date("Y 年 m 月 d 日 H 時 i 分 s 秒", filemtime("top.php"))."です。";
?>
</center>
</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50148530-1', 'atpages.jp');
  ga('send', 'pageview');

</script>
</html>