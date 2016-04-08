var arrChgAddrItem = new Array('data[post1]','data[post2]','data[addr_cd]','data[city_town]','data[building]');
var changeBgColor = {"error":"#ffb6c1","disabled":"#e2e2e2"};
var defualtBgColor = new Object;
var itemCondition = new Object;
var arrLocalValidateItem = arrValidationItem;
var arrLocalChkEqualItem = arrChkEqualItem;

jQuery(document).ready(function() {
    initHisuItem();
    jQuery(window).bind('beforeunload',function(){
        dispMessage = setunloadMess();
        return(dispMessage);
    });
    jQuery('a').on('click',function(){
        jQuery(window).off('beforeunload');
    });

});

jQuery(window).load(function() {
    jQuery.each(arrChgAddrItem, function(key,value){
        setDefBgColor(value+'_parent', jQuery('[name="'+value+'"]').parent().css('background-color'));
    });
    changeAddress();
    jQuery('input[name="data[addr_check]"]').click(function (){
        changeAddress();
    });
});

function initHisuItem(){
    var blnFlg = true;
    setDefBgColor('gyoshaCheckBox', jQuery('[name="data[gyousha_ids][]"]').parent().parent().css('background-color'));
    blnFlg = clickGyoshaCheckBox();
    errChkGyoshaCheckBox(blnFlg);

    jQuery('[name="data[gyousha_ids][]"]').bind('change', function(){
        var blnFlg = true;
        if(!jQuery(this).attr('checked')){
            blnFlg = clickGyoshaCheckBox();
        }
        errChkGyoshaCheckBox(blnFlg);
    });
    jQuery.each(arrLocalValidateItem, function(itemKey, itemData) {
        setDefBgColor(itemKey, jQuery('[name="'+itemKey+'"]').css('background-color'));
        checkValueStart(itemKey);
        jQuery('[name="'+itemKey+'"]').bind('keydown keyup change click', function() {
            var blnFlg = checkValueStart(jQuery(this).attr('name'));
        });
    });

}

function requests_next() {
    var errorCount = 0;

    errorCount = checkAllTarget();

    if(errorCount > 0){
        alert('Ì¤ÆþÎÏ¡¦ÆþÎÏ¥¨¥é¡¼¹àÌÜ¤¬'+ errorCount +'¸Ä¤¢¤ê¤Þ¤¹¡£');
    }else{
        if (jQuery('[name="form1"]') && jQuery('[name="data[syori_flg]"]')) {
            jQuery('[name="data[syori_flg]"]').val(1);
            oElements1 = document.getElementsByName('form1');
            oElements1[0].onsubmit = function(){return false;};
            jQuery(window).off('beforeunload');
            document.form1.submit();
        }
    }
    return false;
}

function checkAllTarget(){
    var errorCount = 0;
    var chkRes = true;;

    chkRes = clickGyoshaCheckBox();
    if(!chkRes) errorCount++;
    jQuery.each(arrLocalValidateItem, function(key, data) {
        chkRes = checkValueStart(key);
        if(!chkRes) errorCount++;
    });

    return errorCount;
}

function checkValueStart(t_name) {
    if(isEmpty(t_name) == true) return false;
    var chkRes = true;
    var addrCheck = jQuery('input[name="data[addr_check]"]').attr('checked');
    var validationItem = arrLocalValidateItem[t_name];
    var tValue = jQuery('[name="' + t_name + '"]').val();

    if(arrChgAddrItem.contains(t_name)){
        if(addrCheck) return true;
    }

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
    if(chkRes && validationItem['zen_katakana_flg'] == 1){
        if(isEmpty(tValue) == false && tValue.match( /[^¥¡-¥ó¡¡]/g )){
            chkRes = false;
        }
    }
    if(chkRes && validationItem['mail_address_flg'] == 1){
        if(isEmpty(tValue) == false && !tValue.match(/^[a-zA-Z0-9!$&*.=^`|~#%\'+\/?_{}-]+@([a-zA-Z0-9_-]+\.)+[a-zA-Z]{2,63}$/)){
            chkRes = false;
        }
        var chkEqualsItem = validationItem['check_equals_item'];
        if(isEmpty(chkEqualsItem) == false){
            var chkResTmp = true;
            var chkEqualItem = arrLocalChkEqualItem[chkEqualsItem];
            var target = chkEqualItem['target'];
            var comparTarget = chkEqualItem['comparTarget'];
            var targetVal = jQuery('[name="'+target+'"]').val();
            var comparTargetVal = jQuery('[name="'+comparTarget+'"]').val();

            if(isEmpty(comparTargetVal) == false){
                if(targetVal == comparTargetVal){
                    var bgColor = defualtBgColor[comparTarget];
                    if(isEmpty(bgColor)) bgColor = '#ffffff';
                    jQuery('[name="'+comparTarget+'"]').css('background',bgColor);
                }else{
                    jQuery('[name="'+comparTarget+'"]').css('background',changeBgColor['error']);
                    chkResTmp = false;
                }
            }
            if(t_name == chkEqualItem['comparTarget']) chkRes = chkResTmp;
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

function clickGyoshaCheckBox(){
    var checkGyosha = false;
    jQuery.each(jQuery('[name="data[gyousha_ids][]"]'), function (){
        if(jQuery(this).attr('checked')){
            checkGyosha = true;
        }
    });

    return checkGyosha;
}

function errChkGyoshaCheckBox(blnFlg){
    if(blnFlg){
        var bgColor = defualtBgColor['gyoshaCheckBox'];
        if(isEmpty(bgColor)) bgColor = '#ffffff';
        jQuery('[name="data[gyousha_ids][]"]').parent().parent().css('background-color',bgColor);
        jQuery('#form1').prev('div').remove('.input_error');
    }else{
        jQuery('[name="data[gyousha_ids][]"]').parent().parent().css('background-color',changeBgColor['error']);
        jQuery('#form1').before('<div class="input_error"><p>ÁêÃÌ¤¹¤ë²ñ¼Ò¤òÁªÂò¤·¤Æ¤¯¤À¤µ¤¤¡£</p></div>');
    }
}

function setunloadMess(){
    errorCount = checkAllTarget();
    var dispMess = null;
    if(errorCount > 0){
        dispMess = "ÆþÎÏ¤¬´°Î»¤·¤Æ¤ª¤ê¤Þ¤»¤ó¡£";
    }else{
        dispMess = "ÆþÎÏÆâÍÆ¤ÏÊÝ»ý¤µ¤ì¤Þ¤»¤ó¡£";
    }
    dispMess = dispMess + "\n¥¨¥é¡¼¹àÌÜ¿ô¡§"+errorCount+"¸Ä\n";
    return dispMess;
}

function changeAddress() {
    if(jQuery('input[name="data[addr_check]"]').attr('checked')){
        var post1 = jQuery('input[name="data[post1]"]');
        jQuery(post1).css('background',changeBgColor['disabled']).attr('disabled','disabled');
        jQuery(post1).parent().css('background',changeBgColor['disabled']);
        jQuery(post1).parent().prev().find('img').css('display','none');
        itemCondition['data[post1]'] = null;

        var post2 = jQuery('input[name="data[post2]"]');
        jQuery(post2).css('background',changeBgColor['disabled']).attr('disabled','disabled');
        jQuery(post2).parent().css('background',changeBgColor['disabled']);
        jQuery(post2).parent().prev().find('img').css('display','none');
        itemCondition['data[post2]'] = null;

        var addr_cd = jQuery('select[name="data[addr_cd]"]');
        jQuery(addr_cd).css('background',changeBgColor['disabled']).attr('disabled','disabled');
        jQuery(addr_cd).parent().css('background',changeBgColor['disabled']);
        jQuery(addr_cd).parent().prev().find('img').css('display','none');
        itemCondition['data[addr_cd]'] = null;

        var city_town = jQuery('input[name="data[city_town]"]');
        jQuery(city_town).css('background',changeBgColor['disabled']).attr('disabled','disabled');
        jQuery(city_town).parent().css('background',changeBgColor['disabled']);
        jQuery(city_town).parent().prev().find('img').css('display','none');
        itemCondition['data[city_town]'] = null;

        var building = jQuery('input[name="data[building]"]');
        jQuery(building).css('background',changeBgColor['disabled']).attr('disabled','disabled');
        jQuery(building).parent().css('background',changeBgColor['disabled']);
        jQuery(building).parent().prev().find('img').css('display','none');
        itemCondition['data[building]'] = null;
    }else{
        var arrTargetObj = new Object;
        var arrParentBgColor = new Object;
        jQuery.each(arrChgAddrItem, function(key, value){
            arrTargetObj[value] = jQuery('[name="'+value+'"]');
            arrParentBgColor[value] = defualtBgColor[value+'_parent'];
            if(arrParentBgColor[value] == "" || arrParentBgColor[value] == null || arrParentBgColor[value] == undefined) arrParentBgColor[value] = '#ffffff';

        });

        checkValueStart('data[post1]');
        var post1Parent = jQuery(arrTargetObj['data[post1]']).parent();
        jQuery(post1Parent).css('background',arrParentBgColor['data[post1]']);
        jQuery(arrTargetObj['data[post1]']).removeAttr('disabled');
        jQuery(post1Parent).prev().find('img').css('display','block');

        checkValueStart('data[post2]');
        var post2Parent = jQuery(arrTargetObj['data[post2]']).parent();
        jQuery(post2Parent).css('background',arrParentBgColor['data[post2]']);
        jQuery(arrTargetObj['data[post2]']).removeAttr('disabled');
        jQuery(post2Parent).prev().find('img').css('display','block');

        checkValueStart('data[addr_cd]');
        var addrCdParent = jQuery(arrTargetObj['data[addr_cd]']).parent();
        jQuery(addrCdParent).css('background',arrParentBgColor['data[addr_cd]']);
        jQuery(arrTargetObj['data[addr_cd]']).removeAttr('disabled');
        jQuery(addrCdParent).prev().find('img').css('display','block');

        checkValueStart('data[city_town]');
        var cityTownParent = jQuery(arrTargetObj['data[city_town]']).parent();
        jQuery(cityTownParent).css('background',arrParentBgColor['data[city_town]']);
        jQuery(arrTargetObj['data[city_town]']).removeAttr('disabled');
        jQuery(cityTownParent).prev().find('img').css('display','block');

        var bgColor = defualtBgColor['data[building]'];
        if(bgColor == "" || bgColor == null || bgColor == undefined) bgColor = '#ffffff';
        var buildingParent = jQuery(arrTargetObj['data[building]']).parent();
        jQuery(arrTargetObj['data[building]']).css('background',bgColor);
        jQuery(buildingParent).css('background',arrParentBgColor['data[building]']);
        jQuery(arrTargetObj['data[building]']).removeAttr('disabled');
        jQuery(buildingParent).prev().find('img').css('display','block');
    }
}

function setDefBgColor(itemName, bgColor){
    defualtBgColor[itemName] = bgColor;
}

Array.prototype.contains = function(value) {
    for (var i in this){
        if (this.hasOwnProperty(i) && this[i].toString() === value.toString()){
            return true;
        }
    }
    return false;
};