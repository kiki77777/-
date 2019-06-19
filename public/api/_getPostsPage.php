<?php
    header("Content-Type:text/html;charset=utf-8");
    require "../common.php";
    //后续需要制作分页的功能
    //所以需要前端发送两个参数，一个参数是页码page，一个参数是每页的数据量pageSize
    $page = $_GET["page"];//2
    $pageSize = $_GET["pageSize"];//10
    $categoryId = $_GET["categoryId"];
    
    //如果要制作分页功能，就需要计算当前页的情况下，需要跳过多少条数据
    $offset = ($page - 1) * $pageSize;

    $sql = "select posts.id,title,feature,created,content,views,likes,nickname,categories.name ,
    (select count(id) from comments where comments.post_id = posts.id) as commentsCount
    from posts
    left join categories on categories.id = posts.category_id
    left join users on users.id = posts.user_id
    where category_id != 1 and category_id = $categoryId
    order by created desc limit $offset,$pageSize";

    $res = query($sql);
    //将php数组res转换成json格式的字符串然后输出
    echo json_encode($res);
?>