$(function () {
    $(".bg").css("width", $(window).width() - 20);
    $(".bg").css("height", $(window).height() - 20);
    $(".shadow").css("width", $(window).width());
    $(".shadow").css("height", $(window).height());

    $(".buttom_logo").css("width", $(window).width() - 20);
    $(".page_bg").css("height", $(window).height() - $(".buttom_logo").height() - 20);
    $(".form").css("width", $(window).width() - 20);
    $(".button_img").bind("touchend", function () {
        doSave();
    });


    $("#marry").change(function () {
        if ($(this).val() == "请选择" || $(this).val() == "未婚") {
            $("#child").html("<option id='0' selected='selected'>请选择</option><option id='无' >无</option>");
        } else {
            $("#child").html("<option id='0' selected='selected'>请选择</option><option id='无' >无</option><option id='怀孕中' >怀孕中</option><option id='0-3岁'>0-3岁</option><option id='4-6岁'>4-6岁</option><option id='7-12岁'>7-12岁</option><option id='13岁以上'>13岁以上</option>");
        }
    });

});

function doSave() {

    if ($("#txtName").val().trim() == "") {
        $("#txtName").focus();
        alert("请输入您的姓名");
        return;
    }

    if ($("#txtAddress").val().trim() == "") {
        $("#txtAddress").focus();
        alert("请输入您的地址");
        return;
    }

    if ($("#txtPhone").val().trim() == "") {
        $("#txtPhone").focus();
        alert("请输入您的手机号");
        return;
    }
    else {
        if (!isMobile($("#txtPhone").val().trim())) {
            alert("您输入的手机号格式有误");
            return;
        }
    }

    if ($("#marry").val() == "0" || $("#marry").val() == "请选择") {
        alert("请选择婚姻状况");
        return;
    }

    if ($("#chlid").val() == "0" || $("#chlid").val() == "请选择") {
        alert("请选择孩子年龄");
        return;
    }


    var data = {};
    data.Name = $("#txtName").val().trim();
    data.Phone = $("#txtPhone").val().trim();
    data.Adrress = $("#txtAddress").val().trim();
    data.Child = $("#child").val();
    data.Marry = $("#marry").val();
    if (navigator.userAgent.length > 0 && navigator.userAgent.length <= 200) {
        data.UserAgent = navigator.userAgent;
    }
    else if (navigator.userAgent.length > 200) {
        data.UserAgent = navigator.userAgent.substring(0, 200);
    }
    else {
        data.UserAgent = "";
    }


    msg = "提交中...";
    $(".waring .content").html(msg);
    $(".shadow").fadeIn("100");
    $(".waring").fadeIn("100");

    $.ajax({
        type: "post",
        data: data,
        url: "ajax.php",
        beforeSend: function () {

        },
        complete: function () {
        },
        success: function (result, status) {
            if (result.substr(0, 4) == "err:") {
                msg = result.substr(4, result.length);
                $(".waring .content").html(msg);
                setTimeout("$('.shadow').fadeOut('100');", 1000);
                setTimeout("$('.waring').fadeOut('100');", 1000);
            }
            else {
                msg = "提交成功";
                $(".waring .content").html(msg);
                window.location.href = "end.php";
            }
        },
        error: function () {
            alert('Error,Please try again!');
        }
    });
}