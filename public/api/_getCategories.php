<?php
    //作为一个接口来说，接口应该返回json格式的字符串作为结果
    //不应该直接打印一个php数组
    header("Content-Type:text/html;charset=utf-8");
    require "../common.php";

    //定义sql语句
    $sql = "select * from categories where id != 1";
    $res = query($sql);
    //将php数组res转换成json格式的字符串然后输出
    echo json_encode($res);
?>