// 公共的功能

// 定义一个全局变量,保存用户信息
var userInfo = null;

// 发送请求,检测用户是否登录
// ajax是异步请求,服务器并不会立即返回结果,页面就会继续加载和渲染,导致用户可以看到后台
// 解决方案:将ajax改成同步  async: false
$.ajax({
        url: "api/_checkLogin.php",
        dataType: "json",
        // 同步
        async: false,
        success: function(res) {
            console.log(res);
            if (res.code == 0) {
                // 没有登录,强制用户登录   
                location.href = "login.html";
                alert("你还没有登录,请先登录");

            } else if (res.code == 1) {
                // 已经登录过了
                // 定义一个全局变量,保存用户信息,当页面加载完之后再进行设置
                userInfo = res.data[0];
            }

        }
    })
    // 入口函数是在页面加载完毕之后再去执行
$(function() {
    if (userInfo) {
        $(".profile .avatar").attr("src", userInfo.avatar);
        $(".profile h3").html(userInfo.nickname);
    }
    // 退出功能
    $("#logout").on("click", function() {
        // alert(123);
        $.ajax({
            type: "get",
            url: "api/_logout.php",
            dataType: "json",
            success: function(res) {
                // console.log(res);
                if (res.code === 1) {
                    alert("退出成功");
                    location.href = "login.html";
                }
            }
        })
    })
})