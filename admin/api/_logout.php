<?php
    //当用户发送请求到_logout.php,直接清除掉用户的session
    session_start();

    session_destroy();

    echo json_encode( ["code"=>1,"msg"=>"登出成功"] );
?>