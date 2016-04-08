
var database = {
    db:{},
    dbName:'',
    indexedDB:window.indexedDB || window.mozIndexedDB || window.msIndexedDB,
    setDb:function(dbName) {
        this.dbName = dbName;
    },
    deleteDb:function(dbName) {
        this.indexedDB.deleteDatabase(dbName);
    },
    createTbl:function(tblName, keyPath) {
        var store = this.db.createObjectStore(tblName, { keyPath: keyPath});
        // インデックスを作成します。
        store.createIndex("myvalueIndex", "myvalue");
    },
    insert:function(tblName, key, value) {
        var transaction = this.db.transaction([tblName], "readwrite");
        var store = transaction.objectStore("mystore");
        var request = store.put({ mykey: key, myvalue: value});
        request.onsuccess = function (event) {
            // 更新後の処理
        }
    },
    createDb:function(dbName) {
        console.log(dbName);
        if (this.indexedDB) {
            var openRequest = this.indexedDB.open(dbName, 1.0);

            openRequest.onupgradeneeded = function(event) {
                // データベースのバージョンに変更があった場合(初めての場合もここを通ります。)
                this.db = event.target.result;
                var store = this.db.createObjectStore('kptData', { keyPath: 'mykey'});
                // インデックスを作成します。
                store.createIndex("myvalueIndex", "myvalue");
            }

            openRequest.onsuccess = function(event) {
                this.db = event.target.result;
            }
        } else {
            window.alert("このブラウザではIndexed DataBase API は使えません。");
        }
    }
}

$(document).ready(function(){
    database.setDb('kptDb');
    database.createDb(database.dbName);
    console.log(database);
    database.insert('kptData', 1, 'テスト');
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