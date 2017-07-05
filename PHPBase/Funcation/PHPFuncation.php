<?php
//    PHP - if...else 语句
$t=date("H");

if ($t<"10") {
    echo "Have a good morning!";
} elseif ($t<"20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}




//Switch 语句
switch ($t)
{
    case 1:
        echo "Number 1";
        break;
    case 2:
        echo "Number 2";
        break;
    case 3:
        echo "Number 3";
        break;
    default:
        echo "No number between 1 and 3";
}



//while 循环
$x=1;

while($x<=5) {
    echo "这个数字是：$x \n";
    $x++;
}



//PHP do...while 循环
$x=1;

do {
    echo "这个数字是：$x <br>";
    $x++;
} while ($x<=5);
//do while 循环只在执行循环内的语句之后才对条件进行测试。这意味着 do while 循环至少会执行一次语句，即使条件测试在第一次就失败了




//PHP for 循环
for ($x=0; $x<=10; $x++) {
    echo "数字是：$x \n";
}




//PHP foreach 循环
//foreach 循环只适用于数组，并用于遍历数组中的每个键/值对
//语法
foreach ($array as $value) {
    code to be executed;
}
//每进行一次循环迭代，当前数组元素的值就会被赋值给 $value 变量，并且数组指针会逐一地移动，直到到达最后一个数组元素。
//下面的例子演示的循环将输出给定数组（$colors）的值：
$colors = array("red","green","blue","yellow");

foreach ($colors as $value) {
    echo "$value \n";
}

?>