<?php
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";
    //根据前端发送分类id，来完成删除操作（只能删除一个分类）
    $id = $_POST["id"];

    $sql = "delete from categories where id = {$id}";

    $res = execute($sql);

    echo json_encode($res);
?>