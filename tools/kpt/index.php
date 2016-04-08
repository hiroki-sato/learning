<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/tools/css/jquery-ui.css">
    <link rel="stylesheet" href="/tools/css/demo.css">
    <link rel="stylesheet" href="/tools/css/kpt.css">
    <script src="/tools/js/jquery-1.11.2.min.js"></script>
    <script src="/tools/js/jquery.autosize.min.js"></script>
    <script src="/tools/js/jquery-ui.min.js"></script>
    <script src="/tools/js/kpt.js"></script>
    <title>jQuery UI sortable</title>
</head>
<body>
    <header>
        <h1>チームKPT<input type="button" name="save" value="保存"></h1>
    </header>
    <div class="demo-block float-left">
        <h2>Keep</h2>
        <ul id="sortable-ul-keep" class="connectedSortable">
            <li class="ui-state-default">
                <div>
                    <textarea></textarea><input type="button" name="add" value="追加">
                </div>
            </li>
        </ul>
    </div>
    <div class="demo-block float-left">
        <h2>Problem</h2>
        <ul id="sortable-ul-problem" class="connectedSortable">
            <li class="ui-state-default">
                <div>
                    <textarea></textarea><input type="button" name="add" value="追加">
                </div>
            </li>
        </ul>
    </div>
    <div class="demo-block float-left">
        <h2>Try</h2>
        <ul id="sortable-ul-try" class="connectedSortable">
            <li class="ui-state-default">
                <div>
                    <textarea></textarea><input type="button" name="add" value="追加">
                </div>
            </li>
        </ul>
    </div>
</body>
</html>

