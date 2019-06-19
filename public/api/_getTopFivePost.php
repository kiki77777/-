<?php
    //_getTopFivePost接口可以获取最新发布的五篇文章
    header("Content-Type:text/html;charset=utf-8");
    require "../common.php";

    //定义sql语句
    $sql = "select posts.id,title,feature,created,content,views,likes,nickname,categories.name ,
    (select count(id) from comments where comments.post_id = posts.id) as commentsCount
    from posts
    left join categories on categories.id = posts.category_id
    left join users on users.id = posts.user_id
    where category_id != 1
    order by created desc limit 5";
    $res = query($sql);
    //将php数组res转换成json格式的字符串然后输出
    echo json_encode($res);
?>