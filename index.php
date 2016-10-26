<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxd27a5f656ac07627", "ccbd5e6eb5858adbb0839f706b844291");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>贝研贝问卷调查</title>
    <script>
        var phoneWidth = parseInt(window.screen.width);
        var phoneScale = phoneWidth / 640;
        var ua = navigator.userAgent;
        if (/Android (\d+\.\d+)/.test(ua)) {
            var version = parseFloat(RegExp.$1);

            var chromeVersion = 0;
            if (/Chrome\/(\d+\.\d+)/.test(ua)) {
                chromeVersion = parseFloat(RegExp.$1);
            }
            // andriod 2.3
            if (version > 2.3 && chromeVersion < 40.0) {
                document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
                // andriod 2.3以上
            }
            else {
                document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
            }
            // 其他系统
        } else if (/ImgoTV-iphone/.test(ua)) {
            document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
        } else {
            document.write('<meta name="viewport" content="width=640, user-scalable=no,target-densitydpi=device-dpi">');
        }
    </script>
    <script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="http://odhe92dpz.bkt.clouddn.com/js/jquery.min.js"></script>
    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body style="width: 640px; margin: 0 auto;">
<div class="container">
    <div class="banner"></div>
    <div class="bg">
        <a  class="button" id="button" data-id="点击按钮"></a>
    </div>
    <div class="footer"></div>
</div>

<script>
    var _title = "测试分享";
    var _dec = "测试分享";
    var _link = "http://beidema.foolbaicai.com/";
    var _image = "http://beidema.foolbaicai.com/images/button.png";

    /*
     * 注意：
     * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
     * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
     * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
     *
     * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
     * 邮箱地址：weixin-open@qq.com
     * 邮件主题：【微信JS-SDK反馈】具体问题
     * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
     */
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: <?php echo $signPackage["timestamp"];?>,
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
            "onMenuShareTimeline",
            "onMenuShareAppMessage",
            "onMenuShareWeibo",
            "onMenuShareQQ",
        ]
    });
    wx.ready(function () {
        wx.onMenuShareTimeline({
            title: _title, // 分享标题
            link: _link, // 分享链接
            imgUrl: _image, // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
        wx.onMenuShareAppMessage({
            title: _title, // 分享标题
            desc: _dec, // 分享描述
            link: _link, // 分享链接
            imgUrl: _image, // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
        wx.onMenuShareQQ({
            title: _title, // 分享标题
            desc: _dec, // 分享描述
            link: _link, // 分享链接
            imgUrl: _image, // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
        wx.onMenuShareWeibo({
            title: _title, // 分享标题
            desc: _dec, // 分享描述
            link: _link, // 分享链接
            imgUrl: _image, // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
    });
</script>

<script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function () {
        var u = "//webtracking.sysmart.cn/";
        _paq.push(['setTrackerUrl', u + 'webtracking.php']);
        _paq.push(['setSiteId', 10]);
        var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
        g.type = 'text/javascript';
        g.async = true;
        g.defer = true;
        g.src = u + 'webtracking.js';
        s.parentNode.insertBefore(g, s);
    })();
</script>
<img style="display:none;"
     src="http://218.244.145.245/mlog.php?campaign_id=kunchengxuyuan&fromkol=<?php echo isset($_REQUEST['fromkol']) ? $_REQUEST['fromkol'] : ''; ?>"/>
<noscript><p><img src="//webtracking.sysmart.cn/webtracking.php?idsite=10" style="border:0;" alt=""/></p></noscript>

<script>
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    Date.prototype.Format = function (fmt) { //author: meizz
        var o = {
            "M+": this.getMonth() + 1, //月份
            "d+": this.getDate(), //日
            "h+": this.getHours(), //小时
            "m+": this.getMinutes(), //分
            "s+": this.getSeconds(), //秒
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度
            "S": this.getMilliseconds() //毫秒
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    }


    $(function () {
        var fromkol = getParameterByName('fromkol');
        $("#button").click(function () {
            var self = $(this);
            $.ajax({
                url: "statistics.php",

                type: 'POST',

                // The name of the callback parameter, as specified by the YQL service
                //jsonp: "callback",

                // Tell jQuery we're expecting JSONP
                //dataType: "jsonp",

                // Tell YQL what we want and that we want JSON
                data: {
                    fromkol: fromkol,
                    email: "",
                    CZ_activity_name: self.data("id"),
                    CZ_created: new Date().Format("yyyy-MM-dd hh:mm:ss"),
                },
                // Work with the response
                success: function (response) {
                },
                error: function (response) {
                },
            });
        })
    })
</script>
</body>
</html>