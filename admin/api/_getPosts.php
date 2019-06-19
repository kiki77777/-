<?php
    //请求当前接口会返回文章数据
    header("Content-Type:application/json;charset=utf-8");
    require "../../public/common.php";

    //接收前端发送的参数：分类id，文章状态，页码，页号
    //假如前端发送的categoryId的值为all，说明我们不需要根据分类来筛选数据
    //假如前端发送的status的值为all，说明我们不需要根据状态来筛选数据
    $categoryId = $_GET["categoryId"];
    $status = $_GET["status"];
    $page = $_GET["page"];
    $pageSize = $_GET["pageSize"];

    //根据当前页码来计算偏移量
    $offset = ($page -1)*$pageSize;

    $sql = " select posts.id,title,created,posts.status,users.nickname,categories.name from posts
    left join users on users.id = posts.user_id
    left join categories on categories.id = posts.category_id 
    where 1=1 ";

    if($categoryId != "all"){
        $sql = $sql . " and category_id = {$categoryId} ";
    }
    if($status != "all"){
        $sql = $sql . " and posts.status = '{$status}' ";
    }

    $sql = $sql . "order by id desc limit $offset,$pageSize ";

    $res = query($sql);

    //根据用户查询的条件来获取查询到的数据总条数，要计数
    $countSql = " select count(posts.id) as count from posts
    left join users on users.id = posts.user_id
    left join categories on categories.id = posts.category_id 
    where 1=1 ";
    if($categoryId != "all"){
        $countSql = $countSql . " and category_id = {$categoryId} ";
    }
    if($status != "all"){
        $countSql = $countSql . " and posts.status = '{$status}' ";
    }

    $countRes = query($countSql);

    // print_r($countRes);
    //获取查询的总数据条数
    $count = $countRes["data"][0]["count"];
    //echo $count;
    //计算总页数
    $totalPages = ceil($count / $pageSize);

    $res["totalPage"] = $totalPages;

    echo json_encode($res);
?>