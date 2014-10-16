<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $requestData = $_POST;
    }else{
        $requestData = $_GET;
    }
?>
<?xml version="1.0" encoding="euc-jp"?>
<?php if(!empty($requestData['display_type']) && $requestData['display_type'] >= 2):?>

<address>
    <addr>
        <pref_code>千葉県</pref_code>
        <city_town>船橋市</city_town>
        <towns>西船橋</towns>
    </addr>
    <addr>
        <pref_code>千葉県</pref_code>
        <city_town>習志野市</city_town>
        <towns>津田沼</towns>
    </addr>
</address>
<?php elseif(!empty($requestData['display_type']) && $requestData['display_type'] >= 1):?>
<address>
    <addr>
        <pref_code>千葉県</pref_code>
        <city_town>松戸市</city_town>
        <towns>田中新田</towns>
    </addr>
</address>
<?php else:?>
<not_data>お探しの郵便番号に一致する住所が見つかりませんでした</not_data>
<?php endif;?>