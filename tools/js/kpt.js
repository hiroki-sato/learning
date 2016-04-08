
$(function(){
    var db;
    var indexedDB = window.indexedDB || window.mozIndexedDB || window.msIndexedDB;
    if (indexedDB) {
        // データベースを削除したい場合はコメントを外します。
        //indexedDB.deleteDatabase("mydb");
        var openRequest = indexedDB.open("mydb", 1.0);
        console.log(openRequest);
        openRequest.onupgradeneeded = function(event) {
            // データベースのバージョンに変更があった場合(初めての場合もここを通ります。)
            db = event.target.result;
            var store = db.createObjectStore("mystore", { keyPath: "mykey"});

            // インデックスを作成します。
            store.createIndex("myvalueIndex", "myvalue");
        }

        openRequest.onsuccess = function(event) {
            console.log(event.target.result);
            db = event.target.result;
        }
    } else {
        window.alert("このブラウザではIndexed DataBase API は使えません。");
    }
    console.log(db);
    var key = 'test1';
    var value = 'valuetest1';
    var transaction = db.transaction(["mystore"], "readwrite");
    var store = transaction.objectStore("mystore");
    for (var i = 1; i < 10; i++) {
        var request = store.put({ mykey: key + i, myvalue: value+1});
        request.onsuccess = function (event) {
            // 更新後の処理
        }
    }
});
$(document).ready(function(){
//    database.setDb('kptDb');
//    database.createDb(database.dbName);
//    console.log(database);
//    database.insert('kptData', 1, 'テスト');
    $('#sortable-ul-keep, #sortable-ul-problem, sortable-ul-try').sortable({
        connectWith: ".connectedSortable"
    }).disableSelection();
    $('textarea').autosize();
    $(document).on('click', 'input[name="add"]:button', function(){
        var that = this;
        var parentElem = $(that).parent().parent();
        parentElem.after(parentElem.clone(true));
    });
});