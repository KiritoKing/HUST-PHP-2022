<?php
$file = fopen("./SH600000.csv", "r");
$line_num = 0;
$dates = []; // index=1
$kaipan = []; // index=2
$highest = []; // index=3
$lowest = []; // index=4
$shoupan = []; // index=5
$junxian = [];
while($line_data = fgetcsv($file)) {
    if($line_num == 0) {
        $line_num++;
        continue;
    }
    array_push($dates, $line_data[1]);
    array_push($kaipan, $line_data[2]);
    array_push($highest, $line_data[3]);
    array_push($lowest, $line_data[4]);
    array_push($shoupan, $line_data[5]);
    if($line_num < 10) {
        array_push($junxian, 0);
    } else {
        $srjx = 0;
        for($i = $line_num - 10; $i<$line_num; $i++) {
            $srjx += $shoupan[$i];
        }
        $srjx /= 10;
        array_push($junxian, $srjx);
    }
    $line_num++;
}

var_dump($srjx);