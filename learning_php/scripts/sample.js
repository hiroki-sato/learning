// 1. マウスオーバーで画像を変更
$(function(){
    $('a img').hover(function(){
        $(this).attr('src', $(this).attr('src').replace('_off', '_on'));
    }, function(){
        if (!$(this).hasClass('currentPage')) {
            $(this).attr('src', $(this).attr('src').replace('_on', '_off'));
        }
    });
});



//2. 外部リンクを別タブで開く
$(function(){
    $("a[href^='http://']").attr("target","_blank");
});



//3. ページトップへスクロールする
$(function(){
    $("#toTop a").click(function(){
        $('html,body').animate({ scrollTop: $($(this).attr("href")).offset().top }, 'slow','swing');
        return false;
    })
});



//4. Div全体をクリックできるようにする
$(function(){
    $(".sampleBox").click(function(){
        window.location=$(this).find("a").attr("href");
        return false;
    });
});



//5. テーブルの偶数・奇数の行の色を変える
$(function(){
    $("tr:odd").addClass("odd");
});



//6. リンク切れ画像を差し替える
$(function () {
    $('img').error(function(){
        $(this).attr({src:'http://webcreatorbox.com/sample/images/missing.jpg',alt:'画像が見つかりません'});
    });
});



//7.CSSハックを使わずブラウザーごとにCSSを変更
$(function () {
    // IE（IE7以上）
    if ($.browser.msie && $.browser.version > 6 ) $(".browserBox").css("background", "#ff99cc" );

    // IE（IE6以下）
    if ($.browser.msie && $.browser.version <= 6 ) $(".browserBox").css("background", "#ffff99" );

    // Firefox
    if ($.browser.mozilla ) $(".browserBox").css("background", "#c8ffd0" );

    // Safari
    if( $.browser.webkit ) $(".browserBox").css("background", "#b1e1ff" );
});



//8. 画像のプリローダー
$(function () {
    $('.imgBox img').hide();//ページ上の画像を隠す
});

var i = 0;
var int_n=0;
$(window).bind("load", function() {//ページコンテンツのロードが完了後、機能させる
    var int_n = setInterval("doThis(i)",500);//フェードするスピード
});

function doThis() {
    var images = $('img').length;//画像の数を数える
    if (i >= images) {// ループ
        clearInterval(int_n);//最後の画像までいくとループ終了
    }
    $('img:hidden').eq(0).fadeIn(500);//一つずつ表示する
    i++;
}



//9. IE6以下ユーザーにメッセージを表示
$(function () {
    if ( $.browser.msie && $.browser.version <= 6 ) {
        $('body').prepend('<div class="error">あなたは旧式ブラウザをご利用中です。このウェブサイトを快適に閲覧するにはブラウザをアップグレードしてください。</div>');
    }
});



//10. Divを消す
$(function () {
    $(".deleteBox .delete").click(function(){
        $(this).parents(".deleteBox").animate({ opacity: "hide" }, "slow");
    });
});



//11. フォーカスしているフォームのラベルにクラスをつける
$(function () {
    $("form :input").focus(function() {
        $("label[for='" + this.id + "']").addClass("labelfocus");
    });

    $("form :input").blur(function() {
        $("label[for='" + this.id + "']").removeClass("labelfocus");
    });
});



//12. フォームにテキストを入れておき、フォーカスで消す（文字色も変更）

$(function(){
    $(".focus").focus(function(){
        if(this.value == "キーワードを入力"){
            $(this).val("").css("color","#f39");
        }
    });
    $(".focus").blur(function(){
        if(this.value == ""){
            $(this).val("キーワードを入力").css("color","#969696");
        }
    });
});



//13. 入力文字数をカウント
$(function () {
    $("textarea").keyup(function(){
        var counter = $(this).val().length;
        $("#countUp").text(counter);
        if(counter == 0){
            $("#countUp").text("0");
        }
        if(counter >= 10){
            $("#countUp").css("color","red");
        } else{$("#countUp").css("color","#666");}
    });
});



//14. ラジオボタンとチェックボックスを装飾する
$(function(){
    $(".checkbox").change(function(){
        if($(this).is(":checked")){
            $(this).next("label").addClass("LabelSelected");
        }else{
            $(this).next("label").removeClass("LabelSelected");
        }
    });
    $(".radio").change(function(){
        if($(this).is(":checked")){
            $(".RadioSelected:not(:checked)").removeClass("RadioSelected");
            $(this).next("label").addClass("RadioSelected");
        }
    });
});



//15. スライドパネル
$(function(){
    $(".open").click(function(){
        $("#slideBox").slideToggle("slow");
    });
});



//16. アコーディオン
$(function() {
    $('#accordion dd').hide();
    $('#accordion dt a').click(function(){
        $('#accordion dd').slideUp();
        $(this).parent().next().slideDown();
        return false;
    });
});



//17. ツールチップ
$(function(){
    $(".tooltip a").hover(function() {
        $(this).next("span").animate({opacity: "show", top: "-75"}, "slow");}, function() {
            $(this).next("span").animate({opacity: "hide", top: "-85"}, "fast");
        });
});



//18. プリントダイアログを表示
$(function(){
    $('a.print').click(function(){
        window.print();
        return false;
    });
});



//19. Twitter最新のTweetを表示
$(function(){
    $.getJSON("http://twitter.com/statuses/user_timeline/webcreatorbox.json?callback=?", function(data) {
        // $("#twitter").html(data[0].text);
        jQuery("#twitter").append($('<p>').html(data[i].text.replace(/(http:\/\/[^\s]+)\b/g, '<a href="$1">$1</a>')));
    });
});


//20. 効果音を入れる
$(function(){
    // クリック
    $('a.click').click(function(){
        $('embed').remove();
        $('body').append('<embed src="http://www.premiercabs.com.au/wp-content/themes/premier/images/click.wav" autostart="true" hidden="true" loop="false">');
    });
});

$(function(){
    // マウスオーバー
    $('a.hover').mouseover(function(){
        $('embed').remove();
        $('body').append('<embed src="http://www.premiercabs.com.au/wp-content/themes/premier/images/click.wav" autostart="true" hidden="true" loop="false">');
    });

});