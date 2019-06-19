<?php
    header("Content-Type:application/json;charset=utf-8");
    require "../common.php";
    //前端发送一个文章id的参数，后台根据文章id来查询文章并返回文章信息
    $postId = $_GET["postId"];


    $sql = "select title,created,content,views,likes,nickname,name,
    (select count(id) from comments where comments.post_id = posts.id) as commentsCount
     from posts
    left join categories on categories.id = posts.category_id
    left join users on users.id = posts.user_id
    where posts.id = $postId";

    $res = query($sql);
    //将php数组res转换成json格式的字符串然后输出
    echo json_encode($res);
?>