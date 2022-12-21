<?php
include_once "config.inc.php";
include_once "connect.inc.php";
function getMessage()
{
    //连接数据库
    $link = connect();
    //SQL语句
    $qurey_message = "select * from simple_mb";
    //保存解析结果
    $result = mysqli_query($link,$qurey_message);
    //将从数据库获取的留言保存在message中
    $message = mysqli_fetch_all($result,MYSQLI_ASSOC);
    //把从数据中得到的留言数组返回
    return $message;

}

