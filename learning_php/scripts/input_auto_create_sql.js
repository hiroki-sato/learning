
var changeBgColor = {"error":"#ffb6c1","disabled":"#e2e2e2"};

var defualtBgColor = new Object;

var itemCondition = new Object;

var arrValidationItem = {
    "se"      :{
        "type"             :"text",
        "hisu_flg"         :1,
        "han_suuji_flg"    :1,
        "check_length"     :3
    },
    "tf"      :{
        "type"             :"text",
        "hisu_flg"         :1,
        "han_suuji_flg"    :1,
        "check_length"     :2
    },
    "sc"      :{
        "type"             :"text",
        "hisu_flg"         :1,
        "han_suuji_flg"    :1,
        "check_length"     :5
    }
};

var setDefBgColor = function (){
    jQuery.each(arrValidationItem, function(itemKey, itemData) {
        defualtBgColor[itemKey] = jQuery('[name="'+itemKey+'"]').css('background-color');
    });
}

var inputCheck = function() {
    var blnFlg = false;
    jQuery.each(arrValidationItem, function(itemKey, itemData) {
        blnFlg = checkValueStart(itemKey);
    });
    return blnFlg;
};

function checkValueStart(t_name) {
    if(isEmpty(t_name) == true) return false;
    var chkRes = true;
    var validationItem = arrValidationItem[t_name];
    var tValue = jQuery('[name="' + t_name + '"]').val();

    if(validationItem['hisu_flg'] == 1){
        if(isEmpty(tValue) == true){
            chkRes = false;
        }else if(validationItem['type'] == 'select' && tValue == '0'){
            chkRes = false;
        }
    }
    if(chkRes && isEmpty(tValue) == false){
        var valLength = tValue.length;
        var minLen = validationItem['min_length'];
        var maxLen = validationItem['max_length'];
        var chkLen = validationItem['check_length'];

        if(minLen > 0 && valLength < minLen){
            chkRes = false;
        }else if(maxLen > 0 && valLength > maxLen){
            chkRes = false;
        }else if(chkLen > 0 && valLength != chkLen){
            chkRes = false;
        }
    }
    if(chkRes && validationItem['han_suuji_flg'] == 1){
        if(isEmpty(tValue) == false && tValue.match(/[^0-9]/g)){
            if((validationItem['tel_number_flg'] == 1 && !tValue.match(/[^0-9-]/g)) == false){
                chkRes = false;
            }
        }
    }

    if(itemCondition[t_name] != chkRes && chkRes){
        var bgColor = defualtBgColor[t_name];
        if(isEmpty(bgColor)) bgColor = '#ffffff';
        jQuery('[name="'+t_name+'"]').css('background',bgColor);
        itemCondition[t_name] = chkRes;
    }else if(itemCondition[t_name] != chkRes){
        jQuery('[name="'+t_name+'"]').css('background',changeBgColor['error']);
        itemCondition[t_name] = chkRes;
    }

    return chkRes;
}

function isEmpty(checkValue){
    if(checkValue == ""){
        return true;
    }else if(checkValue == null){
        return true;
    }else if(checkValue == undefined){
        return true;
    }else{
        return false;
    }
}

jQuery(document).ready(function(){
    setDefBgColor();
    jQuery('#createSqlForm1').submit(function(){
        var result = inputCheck();
        console.log(result);
        if (result) {
            return true;
        } else {
            alert('入力項目が正しくありません')
            return false;
        }
    });
});
