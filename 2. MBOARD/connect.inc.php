<?php
//引入配置文件，用于连接数据库
include_once "config.inc.php";

function connect()
{
    //1.与mysql数据库连接
    $link = @mysqli_connect(DB_ADDRESS, ACCOUNT_NAME, PASSWORD, DB_NAME);

    //连接错误时提示
    $error = mysqli_connect_error();
    //如果有错误的话，输出提示消息,结束程序
    if(!$link)
    {
        echo "数据库连接失败：";
        exit($error);
    }
    else
    {
        //echo "数据库连接成功";
        //var_dump($link);
        //设置字符编码
        mysqli_set_charset ( $link , "utf8" );

        //选择数据库,只用到一个所以不用切换
        // mysqli_select_db ( $link , $DB );
    }

    return $link;
}