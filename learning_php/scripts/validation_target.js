var arrValidationItem = {
        "data[town]"       :{
                "type"             :"text",
                "hisu_flg"         :1
            },
        "data[housenumber]":{
                "type"             :"text",
                "hisu_flg"         :1
            },
        "data[name1]"      :{
                "type"             :"text",
                "hisu_flg"         :1
            },
        "data[name2]"      :{
                "type"             :"text",
                "hisu_flg"         :1
            },
        "data[name1_kana]" :{
                "type"             :"text",
                "zen_katakana_flg" :1
            },
        "data[name2_kana]" :{
                "type"             :"text",
                "zen_katakana_flg" :1
            },
        "data[post1]"      :{
                "type"             :"text",
                "hisu_flg"         :1,
                "han_suuji_flg"    :1,
                "check_length"     :3
            },
        "data[post2]"      :{
                "type"             :"text",
                "hisu_flg"         :1,
                "han_suuji_flg"    :1,
                "check_length"     :4
            },
        "data[addr_cd]"    :{
                "type"             :"select",
                "hisu_flg"         :1
            },
        "data[city_town]"  :{
                "type"             :"text",
                "hisu_flg"         :1
            },
        "data[tel]"        :{
                "type"             :"text",
                "hisu_flg"         :1,
                "han_suuji_flg"    :1,
                "tel_number_flg"   :1
            },
        "data[mail]"       :{
                "type"             :"text",
                "check_input_flg"  :1,
                "mail_address_flg" :1,
                "check_equals_item":"mail"
            },
        "data[mail_cnf]"   :{
                "type"             :"text",
                "check_input_flg"  :1,
                "mail_address_flg" :1,
                "check_equals_item":"mail"
            }
    };

var arrChkEqualItem = {
        "mail":{
                "target"      :"data[mail]",
                "comparTarget":"data[mail_cnf]"
            }
    };