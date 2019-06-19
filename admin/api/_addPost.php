<?php
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";
    //接收前端发送的数据完成文章添加的操作
    $slug = $_POST["slug"];
    $title = $_POST["title"];
    $feature = $_POST["feature"];
    $created = $_POST["created"];
    $content = $_POST["content"];
    $status = $_POST["status"];
    $user_id = $_POST["user_id"];
    $category_id = $_POST["category_id"];

    // print_r($_POST);

    // //定义sql语句
    $sql = " insert into posts values(null,'{$slug}','{$title}','{$feature}','{$created}'
    ,'{$content}',0,0,'{$status}','{$user_id}','{$category_id}') ";

    //执行sql语句完成新增操作
    $res = execute($sql);

    echo json_encode($res);
?>