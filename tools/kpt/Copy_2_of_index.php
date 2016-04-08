<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.css">
    <link rel="stylesheet" href="/tools/css/demo.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="/tools/js/demo.js"></script>
    <title>jQuery UI sortable</title>
    <style type="text/css">
    #sortable-div,
    #sortable-li {
        padding: 0;
        list-style-type: none;
        width: 50%;
    }
</style>
</head>
<body>
<script>
$(function() {
    $('#sortable-div, #sortable-li').sortable({
        connectWith: ".connectedSortable"
    }).disableSelection();
});
$(function(){
    initDemoPage($);
});
</script>
<div class="demo-block">
    <h2>シンプルな使い方(div)</h2>
    <ul id="sortable-div" class="connectedSortable">
        <li class="ui-state-default">Item 1</li>
        <li class="ui-state-default">Item 2</li>
        <li class="ui-state-default">Item 3</li>
        <li class="ui-state-default">Item 4</li>
        <li class="ui-state-default">Item 5</li>
    </ul>
</div>
<div class="demo-block">
    <h2>シンプルな使い方(li)</h2>
    <ul id="sortable-li" class="connectedSortable">
        <li class="ui-state-default">Item 1</li>
        <li class="ui-state-default">Item 2</li>
        <li class="ui-state-default">Item 3</li>
        <li class="ui-state-default">Item 4</li>
        <li class="ui-state-default">Item 5</li>
    </ul>
</div>
</body>

<script>
</script>
</html>

