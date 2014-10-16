/**
================================================================================
    グローバル変数
================================================================================
 */
// 背景色の初期値
var defaultBgColor = '#FFA500';
// 配列
var arrJsonData;

/**
================================================================================
    処理
================================================================================
 */
$(document).ready(function () {
    getWindowSize();
    getByIdTest();
    slideDefaultSetting();
    $('#slideUl') . children('li') . click(chgSlide);
    delIframe();
});


// ボタン押下による遷移処理
function button(url) {
	location.href = url;
	return false;
}


/*
    ボタン押下による背景色の変更
*/
function changeBackgroundColor(color)
{
	if (color != '') {
		// 背景色を変更
		document.body.style.backgroundColor = color;
	} else {
		// 背景色を初期化
		document.body.style.backgroundColor = defaultBgColor;
	}
}


/*
    画面リサイズ時の処理
*/
$(window).resize(function(){
    getWindowSize();
});


/*
    押下されたボタンの色を変更
*/
function changeButtonColor(obj, changeColor)
{
	// ボタンの色を初期化
	document.form1.changeBgcBtnForRed.style.backgroundColor = null;
	document.form1.changeBgcBtnForBlue.style.backgroundColor = null;
	document.form1.changeBgcBtnForGreen.style.backgroundColor = null;
	if (obj != '') {
		// クリックしたボタンの色を変更
		obj.style.backgroundColor = changeColor;
	}
}


/*
    サーバとのajax通信
*/
function serverAccess()
{
	console.log('load');
}

/*
    現在時刻
*/
function jikoku() {
    dd = new Date();
    document.F1.T1.value = dd.toLocaleString();
    window.setTimeout("jikoku()", 1000);
}


//var key="freekeyword";
//var n=getCookie(key);
//n++;
//if(n==1) {
//	document.getElementById("visitTimes").innerHTML="はじめまして！ようこそ クライドの駄作サイトへ♪"+n;
//}else{
//	document.getElementById("visitTimes").innerHTML="まいどおおきに！"+n+"回目の訪問ありがとうございます";
//}

//setCookie(key,n);
//
//function getCookie(key)
//{
//   var s,e;
//   var c=document.cookie+";";
//   var b=c.indexOf(key,0);
//   if(b!=-1)
//   {
//     c=c.substring(b,c.length);
//     s=c.indexOf("=",0)+1
//     e=c.indexOf(";",s);
//     return(unescape(c.substring(s,e)));
//   }
//   return("");
//}
//function setCookie(key,n)
//{
//   var myDate=new Date();
//   myDate.setTime(myDate.getTime()+6*30*24*60*60*1000);
//   document.cookie=" "+key+"="+escape(n)+"; expires="+myDate.toGMTString();
//}


/*
    ウィンドウサイズ取得
*/
function getWindowSize(){
    var imgChildren = $('.modal').children('img');
    var w = parseInt(imgChildren.css('width'));
    var h = parseInt(imgChildren.css('height'));
    var total = w + h;
    console.log('幅：' + w);
    console.log('高さ：' + h);
    console.log('合計：' + total);
    if (parseInt(w) <= 240) {
        $('#modalImageArea').attr('width', '240');
    } else if (parseInt(w) <= 320) {
        $('#modalImageArea').attr('width', '320');
    } else if (parseInt(w) <= 480) {
        $('#modalImageArea').attr('width', '480');
    } else if (parseInt(w) <= 720) {
        $('#modalImageArea').attr('width', '720');
    } else if (parseInt(w) <= 960) {
        $('#modalImageArea').attr('width', '960');
    } else if (parseInt(w) <= 1280) {
        $('#modalImageArea').attr('width', '1280');
    } else {
        $('#modalImageArea').attr('width', w);
    }
}


/*
    id属性テスト
*/
function getByIdTest() {

    var element= $('div[name=bgColorDiv]');
    console.log(element[0]);
    for (i = 0; i < element.length; i++) {
        if (i == 1) {
            console.log(element[i].style);
            element[i].style.background = '#ffffff';
            console.log(element[i].style);
        }
    }
}


/*
    スライド箇所の初期設定
*/
function slideDefaultSetting() {
//    $('#slideUl') . children('li') . children('ul') . attr('style', 'display:none;');
}

/*
    スライド機能実行
 */
function chgSlide(){
    var obj_Element = $(this) . children();
    if(obj_Element . css('display') != 'none'){
        obj_Element . slideToggle('slow');
        obj_Element . children('ul') . attr('style', 'display:none;');
    }else{
        obj_Element . slideDown("slow");
        obj_Element . children('ul') . attr('style', 'display:block;');
    }
}

/*
    別ウィンドウでの表示
    @param url：表示先URL
    @return false
 */
function displayAnotherWindow(url){
    window.open(url, '_blank');
    return false;
}

/*
    JSONデータ編集-サンプル
    @param  jsonData：JSONデータ
    @return なし
 */
function editJsonDataSample(){
    var editJsonData = JSON.parse(arrJsonData);
    var arrTest = new Array();
    for(i = 0; i < 5; i++){
        arrTest['testArr' + i] = Array('test' + i,'test' + i);
    }
//    for(key in editJsonData){
//        document.write(editJsonData[key].id + '&nbsp;' + editJsonData[key].name + '&nbsp;' + editJsonData[key].age + '&nbsp;' + editJsonData[key].job + '<br><br>');
//    }
    console.log(arrTest);
    console.log(editJsonData);
}

/*
    フォーム項目バリデートチェック
    @param  なし
    @return なし
 */
function checkFormValidate(){
    var arrFormValue = $('form[name="form1"]') . children('input');
//    var arrNull = { mess:'', count: 0 }; 
    var arrNull = {mess:'', count:0};
    for(i = 0; i < arrFormValue.length; i++){
        if(arrFormValue[i].value == ""){
            arrNull['mess'] += $('label[for="' + arrFormValue[i].id + '"]') . text() + '\n';
            arrNull['count']++;
        }
    }
    if(arrNull['count'] > 0) alert('以下の必須項目が入力されていません。ご確認ください。\n' + arrNull['mess']);
}

/*
    iframe削除
    @param
    @return
 */
function delIframe(){
    $('iframe') . attr('style', 'display:none;');
}