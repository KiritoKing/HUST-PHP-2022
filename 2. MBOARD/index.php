<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>陈梁子豪的留言板</h1>
<p>
    <a href="analyze.php">查看留言统计</a>
</p>
<form action="save.php" method="POST">
    <input type="text" name="message" value="">
    <input type="submit" value="提交" >
</form>

<ol>
    <!--展示留言的地方,可以使用php做一个分页功能-->
    <!--使用php中的foreach遍历从数据库得到的留言数组-->
    <?php
    include_once "query_message.ini.php";
    $message = getMessage();
    //var_dump($message) ;
    foreach($message as $i)
    {
        $i = $i['content'];
        echo "<li>$i</li>";
    }
    ?>
</ol>
</body>
</html>