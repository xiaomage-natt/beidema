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
        <a class="button" id="button" data-id="点击按钮" href="form.php"></a>
    </div>
    <div class="footer"></div>
</div>
<?php require_once "share.php" ?>
</body>
</html>