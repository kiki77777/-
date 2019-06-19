<?php
    //用来新增分类
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";
    //要求前端发送分类名称，别名，类名
    $name = $_POST["name"];
    $slug = $_POST["slug"];
    $classname = $_POST["classname"];

    //定义sql语句
    $sql = " insert into categories values(null,'{$slug}','{$name}','{$classname}') ";

    //执行sql语句完成新增操作
    $res = execute($sql);

    echo json_encode($res);
?>