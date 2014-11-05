<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="./scripts/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="./scripts/input_auto_create_sql.js"></script>
    <body>
        <form id="createSqlForm1" action="createSql.php" method="post">
            <p>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;ループ：&emsp;<input type="text" name="roop_cnt" value="" /></p>
            <p>&emsp;&emsp;&emsp;領域コード：&emsp;<input type="text" name="se" value="" /></p>
            <p>&emsp;都道府県コード：&emsp;<input type="text" name="tf" value="" /></p>
            <p>&emsp;&emsp;市区群コード：&emsp;<input type="text" name="sc" value="" /></p>
            <input type="submit" value="SQL自動生成開始">
        </form>
        <div id="sqlViewArea" style="display:none;"></div>
    </body>
</html>