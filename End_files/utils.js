
function onClose() {
    WeixinJSBridge.call('closeWindow');
}

function inputFocus(e) {
    if (e.value == e.getAttribute("data-hint")) {
        e.value = "";
    }
}

function inputBlur(e) {
    if (e.value == "") {
        e.value = e.getAttribute("data-hint");
    }
}

function isMobile(sMobile) {
    var reg = /^(1[3-9][0-9])[0-9]{8}$/;
    return reg.test(sMobile)

}

function isEmail(strEmail) {
    var reg = /^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
    return reg.test(strEmail);
}

function isPostcode(str) {
    var reg = /^[1-9][0-9]{5}$/;
    return reg.test(str);
}

function val(strId) {
    return document.getElementById(strId).value;
}

function attrValue(strId, attrName) {
    return document.getElementById(strId).getAttribute(attrName);
}

//校验是否为日期格式
function IsDate(year, month, day) {
    var nYear = parseInt(year);
    var nMonth = parseInt(month);
    var nDay = parseInt(day);
    var dtDate = new Date(nYear, nMonth - 1, nDay);
    if (nYear != dtDate.getFullYear() || nMonth - 1 != dtDate.getMonth() || nDay != dtDate.getDate()) {
        return false;
    }
    return true;
}

// 获取URL参数
function getUrlParam(name) {
    var c = name + "=";
    var s = window.location.href;
    if (s.indexOf(c) > 0) {
        var p = s.substr(s.indexOf(name + "=") + c.length);

        if (p.indexOf("&") >= 0) {
            p = p.substr(0, p.indexOf("&"));
        }

        return p;
    } else {
        return "";
    }
}