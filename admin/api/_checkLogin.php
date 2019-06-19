<?php
    header("Content-Type:application/json;charset=utf-8");
    //用来获取用户是否登录的状态

    //声明一个数组保存需要返回给前端的信息
    $result = [];
    session_start();
    if( isset($_SESSION["isLogin"]) && $_SESSION["isLogin"] === true){
        //用户已经登录了
        $result["code"] = "1";
        $result["msg"] = "用户已经登录了";
        $result["data"] = $_SESSION["userInfo"];
    }else{
        //用户没有登录
        $result["code"] = "0";
        $result["msg"] = "没有登录";
        $result["data"] = [];
    }
    echo json_encode($result);
?>