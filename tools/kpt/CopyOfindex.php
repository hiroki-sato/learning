<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.css">
    <link rel="stylesheet" href="/tools/css/demo.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="/js/demo.js"></script>
    <title>jQuery UI sortable</title>
    <style type="text/css">
    #sortable-li {
        padding: 0;
        list-style-type: none;
        width: 50%;
    }
    #sortable-div {
    width: 50%;
    }
</style>
</head>
<body>
<script>
$(function(){
	$('#sortable-div, #sortable-li').sortable();
});
</script>
<div class="demo-block">
	<h2>シンプルな使い方(div)</h2>
	<div id="sortable-div">
		<div class="ui-state-default">ブロック1</div>
		<div class="ui-state-default">ブロック2</div>
		<div class="ui-state-default">ブロック3</div>
		<div class="ui-state-default">ブロック4</div>
		<div class="ui-state-default">ブロック5</div>
	</div>
</div>

<div class="demo-block">
	<h2>シンプルな使い方(li)</h2>
	<ul id="sortable-li">
		<li class="ui-state-default">項目 1</li>
		<li class="ui-state-default">項目 2</li>
		<li class="ui-state-default">項目 3</li>
		<li class="ui-state-default">項目 4</li>
		<li class="ui-state-default">項目 5</li>
	</ul>
</div>

</body>

<script>
$(function(){
	initDemoPage($);
});
</script>
</html>