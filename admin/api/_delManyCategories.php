<?php
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";
    //根据前端发送分类id数组，来完成删除操作（根据数组中包含的id来删除多个分类）
    $ids = $_POST["ids"];
    //将数组拼接形成“1,2,3”
    $values = implode(",",$ids);

    $sql = "delete from categories where id in ({$values})";

    $res = execute($sql);

    echo json_encode($res);
?>