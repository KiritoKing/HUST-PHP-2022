<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once "query_message.ini.php";
    $message = getMessage();
    $total = 0;
    $now = date("Y-m-d");
    foreach($message as $i)
    {
        if($i['date'] == $now) {
            $total++;
        }
    }
    echo "<h1>今天发言共 $total 条</h1>"
    ?>
</body>