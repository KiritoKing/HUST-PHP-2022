<?php
    include_once "connect.inc.php";
    include_once "config.inc.php";


    //将post中的内容先保存到变量content中
    $content = $_POST;
    //提取用户的留言
    $time_id = time();
    $now_date = date('Y-m-d');
    $message = $content['message'];
    //测试查看 用户内容是否成功提取出来了
    //var_dump($content["message"]);
    //成功提取内容后，连接数据库
    //现在在数据库中保存数据需要连接数据库，
    //以后在数据库中查找数据也要连接数据库，所以写一个connect.inc.php的文件
    //封装一个连接数据库的函数connect()
    $link = connect();

    //var_dump($message);
    //var_dump($link);
    $add_message = "insert into ".TABLE_NAME."(content, id, date) values('$message', $time_id, '$now_date')";
    //$add_message = 'insert into message(message) values("$message")';
    var_dump($add_message);


    //保存执行sql语句的状态，如果执行失败提示
    $execute_sql = mysqli_query($link, $add_message);

    if($execute_sql===TRUE)
    {
        echo "插入SQL语句执行成功！";
        //留言成功后跳转到首页（刷新页面）
        header("location:index.php");
    }
    else
    {
        exit("SQL语句出错了");
    }