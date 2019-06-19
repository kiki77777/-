<?php
    //在这里准备封装三个函数
    //一个函数用来连接数据库
    function connect(){
        $conn = mysqli_connect("127.0.0.1","root","root","db_baixiu");
        if(!$conn){ die("数据库连接失败，结束程序"); }
        //返回数据库连接对象即可
        return $conn;
    }
    //一个函数用来执行增删改语句，返回一个执行结果
    function execute($sql){
        $conn = connect();
        $res = mysqli_query($conn,$sql);
        if($res){
            // 执行成功
            $result=["code"=>1,"msg"=>"执行成功"];
        }else{
            // 执行失败
            $result=["code"=>0,"msg"=>"执行失败:".mysqli_error($conn)];
        }
        mysqli_close($conn);
        return $result;
    }
    //一个函数用来执行查询语句并返回查询的结果
    function query($sql){
        $conn = connect();
        $res = mysqli_query($conn,$sql);
        //使用result数组保存需要返回给客户的信息
        $result = [];
        if(!$res){
            $result = ["code"=>0, "msg"=>"查询失败:".mysqli_error($conn) , "data"=>[] ];
        }else if( mysqli_num_rows($res)===0 ){
            $result = ["code"=>0,  "msg"=>"没有查询到相关的数据" , "data"=>[] ];
        }else{
            //循环读取数据
            while( $row = mysqli_fetch_assoc($res) ){
                //将读取到的每一行数据添加到$data数组
                $data[] = $row;
            }
            $result = ["code"=>1,  "msg"=>"查询成功", "data"=>$data ];
        }
        mysqli_close($conn);
        return $result;
    }
?>