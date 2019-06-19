<?php
    //用来新增分类
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";
    //获得前端发送的数据，完成分类数据更新的操作
    //前端发送的数据有 分类id，分类名称，分类别名，类名
    $id = $_POST["id"];
    $name = $_POST["name"];
    $slug = $_POST["slug"];
    $classname = $_POST["classname"];

    //定义sql语句
    $sql = "update categories set name='{$name}',slug='{$slug}',classname='{$classname}' where id='{$id}' ";

    $res = execute($sql);

    echo json_encode($res);
?>