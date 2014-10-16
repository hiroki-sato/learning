/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*
========================================================
    グローバル変数
========================================================
 */
var ajaxAddrPrefs = new Array();
var ajaxAddrCitys = new Array();
var ajaxAddrTowns = new Array();
/*
========================================================
    DOM読み込み時の処理
========================================================
 */
$(document).ready(function(){});

function requestAjax(type){
    $.ajax({
        url: 'testAjax.php',
        type: 'GET',
        data: {display_type:2},
        dataType: 'xml',
        async: false,
        success: resultSuccess,
        error: resultError
    });
}

function resultSuccess(resultData){
    console.log('ajax通信成功（・∇・）');
    console.log($(resultData) . find('addr')　. eq(0));
    console.log($(resultData) . find('addr')　. eq(1));
    if($(resultData) . find('addr') . length > 1){
        var loop = 0;
        var addHTML = '<p>下記より選択してください。</p>';
        addHTML += '<div>'
        $(resultData) . find('addr') . each(function(){
            ajaxAddrPrefs[loop] = $(this) . find('pref_code') . text();
            ajaxAddrCitys[loop] = $(this) . find('city_town') . text();
            ajaxAddrTowns[loop] = $(this) . find('towns') . text();
            var strInputHtml = '<input type="button" value="選択する" name="select_address" id="select_addr' + loop + '" onclick="selectSetLocation(' + loop + ');">';
            var strLabelHtml = '<label for="' + loop + '">' + ajaxAddrPrefs[loop] + ajaxAddrCitys[loop] + ajaxAddrTowns[loop] + '</label>';
            addHTML += strInputHtml + strLabelHtml + '<br><br>';
            loop++;
        });
        addHTML += '</div>';
        displaySelectLocation(addHTML);
//        $('#a_btn1') . parent() . append(addHTML);
    }else if($(resultData) . find('addr') . length == 1){
        var strSearchPref = $(resultData) . find('pref_code') . text();
        var strSearchCityTown = $(resultData) . find('city_town') . text();
        var strSearchTowns = $(resultData) . find('towns') . text();
        setLocation(strSearchPref, strSearchCityTown, strSearchTowns);
    }else{
        if($(resultData) . find('not_data') .text() != '' || $(resultData) . find('not_data') .text() != undefined){
            alert($(resultData) . find('not_data') .text());
        }else{
            alert('住所データの取得に失敗しました。もう一度やり直してください。');
        }
    }
}

function resultError(){
    alert('ajax通信失敗（・ω・；）');
}

function selectSetLocation(selectNumber){
    var strSearchPref = ajaxAddrPrefs[selectNumber];
    var strSearchCityTown = ajaxAddrCitys[selectNumber];
    var strSearchTowns = ajaxAddrTowns[selectNumber];
    setLocation(strSearchPref, strSearchCityTown, strSearchTowns);
}

function setLocation(strSetPref, strSetCityTown, strSetTowns){
    if(strSetPref != '' && strSetCityTown != '' && strSetTowns != ''){
        $('input[name="a_result_data1"]') . val(strSetPref);
        $('input[name="a_result_data2"]') . val(strSetCityTown);
        $('input[name="a_result_data3"]') . val(strSetTowns);
    }else{
        alert('住所データの一部が欠損しています。住所検索からやり直してください。');
    }
}

function createSubWindowOption(){
    // サブウインドウの設定
    var subw = 280;   // サブウインドウの横幅
    var subh = 480;   // サブウインドウの高さ
    var subx = ( screen.availWidth - subw ) / 2;
    var suby = ( screen.availHeight - subh ) / 2;
    // サブウインドウのオプション文字列を作る
    var subWinOpt = 'width=' + subw + ', height=' + subh + ', top=' + suby + ', left=' + subx +', location=no, menubar=no, resizable=no, toolbar=no, scrollbars=yes';
    return subWinOpt;
}

function displaySelectLocation(viewHTML){
    var subWinOpt = createSubWindowOption();
    nwin = window.open('', 'blank', subWinOpt);
    nwin = window.showModalDialog('', 'blank', subWinOpt);
    nwin.document.open();
    nwin.document.write('<html><head>');
    nwin.document.write('<title>New one</title>');
    nwin.document.write('</head>');
    nwin.document.writeln('<body onBlur="focus()">');
    nwin.document.writeln(viewHTML);
    nwin.document.write('</body></html>');
    nwin.document.close();
}