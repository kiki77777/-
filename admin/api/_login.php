<?php
    //获取到前端发送的账号和密码，根据账号和密码到数据库中查询
    //根据查询的结果来得知登录的情况，并把登录的结果返回给前端
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";

    //接收前端发送的参数(账号，密码)
    $acc = $_POST["account"];
    $pwd = $_POST["password"];

    //定义sql语句
    $sql = "select * from users where email='$acc' and `password`='$pwd'";

    $res = query($sql);

    // print_r($res);
    //声明一个变量保存返回给客户端的结果
    $result = [];
    if($res["code"] === 1){
        $result["code"] = 1;
        $result["msg"] = "登录成功";
        $result["data"] = $res["data"];
        //在session中记录登录成功的状态
        session_start();
        $_SESSION["isLogin"] = true;
        $_SESSION["userInfo"] = $res["data"];
    }else{
        $result["code"] = 0;
        $result["msg"] = "登录失败:".$res["msg"];
        $result["data"] = [];
    }

    echo json_encode($result);
?>