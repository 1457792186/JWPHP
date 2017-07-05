<?php
//用户定义的函数声明以关单 "function" 开头：
//语法
//function functionName() {
//    被执行的代码;
//}
//注释：函数名能够以字母或下划线开头（而非数字）。
//注释：函数名对大小写不敏感。
//提示：函数名应该能够反映函数所执行的任务。
//在下面的例子中，创建名为 "writeMsg()" 的函数。
//打开的花括号（{）指示函数代码的开始，而关闭的花括号（}）指示函数的结束。
//此函数输出 "Hello world!"。如需调用该函数，只要使用函数名即可：
function writeMsg() {
    echo "Hello world!";
}

writeMsg(); // 调用函数


//PHP 函数参数
//可以通过参数向函数传递信息。参数类似变量。
//参数被定义在函数名之后，括号内部。可以添加任意多参数，只要用逗号隔开即可。
//下面的例子中的函数有一个参数（$fname）。当调用 familyName() 函数时，同时要传递一个名字（例如 Bill），这样会输出不同的名字，但是姓氏相同
function familyName($fname) {
    echo "$fname Zhang.\n";
}

familyName("Li");
familyName("Hong");
familyName("Tao");
familyName("Xiao Mei");
familyName("Jian");

//两个参数（$fname 和 $year）
function familyName($fname,$year) {
    echo "$fname Zhang. Born in $year \n";
}

familyName("Li","1975");
familyName("Hong","1978");
familyName("Tao","1983");


//PHP 默认参数值
//下面的例子展示了如何使用默认参数。如果调用没有参数的 setHeight() 函数，它的参数会取默认值
function setHeight($minheight=50) {
    echo "The height is : $minheight \n";
}

setHeight(350);
setHeight(); // 将使用默认值 50
setHeight(135);
setHeight(80);


//PHP 函数 - 返回值
//如需使函数返回值，使用 return 语句：
function sum($x,$y) {
    $z=$x+$y;
    return $z;
}

echo "5 + 10 = " . sum(5,10) . "\n";
echo "7 + 13 = " . sum(7,13) . "\n";
echo "2 + 4 = " . sum(2,4);

?>