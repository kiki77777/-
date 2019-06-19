<?php
    //支持图片上传的接口
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";
    //接收前端上传的图片信息，需要使用$_FILES超全局变量
    // print_r($_FILES);
    //随机生成一个文件名
    $filename = uniqid() . strrchr( $_FILES["img"]["name"],"." );

    //将文件保存到服务器
    $res = move_uploaded_file( $_FILES["img"]["tmp_name"] , "../../static/uploads/{$filename}" );

    if($res){
        //上传成功
        $result["code"] = 1;
        $result["msg"] = "上传图片成功";
        $result["imgPath"] = "../static/uploads/{$filename}";
    }else{
        //上传失败
        $result["code"] = 0;
        $result["msg"] = "上传图片失败";
    }

    echo json_encode($result);
?>