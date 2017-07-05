<?php

/*
PHP         算数运算符
运算符	    名称	        例子      	结果
+	        加法        $x + $y	    $x 与 $y 求和
-	        减法	        $x - $y	    $x 与 $y 的差数
*	        乘法      	$x * $y	    $x 与 $y 的乘积
/	        除法	        $x / $y	    $x 与 $y 的商数
%	        模数	        $x % $y	    $x 除 $y 的余数
*/
$x=10;
$y=6;
echo ($x + $y); // 输出 16
echo ($x - $y); // 输出 4
echo ($x * $y); // 输出 60
echo ($x / $y); // 输出 1.6666666666667
echo ($x % $y); // 输出 4


//PHP 赋值运算符用于向变量写值。
//PHP 中基础的赋值运算符是 "="。这意味着右侧赋值表达式会为左侧运算数设置值
/*
赋值	        等同于	        描述
x = y	    x = y	        右侧表达式为左侧运算数设置值。
x += y	    x = x + y	    加
x -= y  	x = x - y	    减
x *= y	    x = x * y	    乘
x /= y	    x = x / y	    除
x %= y	    x = x % y	    模数
*/
$x=10;
echo $x; // 输出 10

$y=20;
$y += 100;
echo $y; // 输出 120

$z=50;
$z -= 25;
echo $z; // 输出 25

$i=5;
$i *= 6;
echo $i; // 输出 30

$j=10;
$j /= 5;
echo $j; // 输出 2

$k=15;
$k %= 4;
echo $k; // 输出 3




//PHP 字符串运算符
/*
运算符	名称	        例子	                                            结果
.	    串接	        $txt1 = "Hello"; $txt2 = $txt1 . " world!"	    现在 $txt2 包含 "Hello world!"
.=	    串接赋值	    $txt1 = "Hello"; $txt1 .= " world!"	            现在 $txt1 包含 "Hello world!"
*/
$a = "Hello";
$b = $a . " world!";
echo $b; // 输出 Hello world!

$x="Hello";
$x .= " world!";
echo $x; // 输出 Hello world!


//PHP 递增/递减运算符
/*
运算符	名称	    描述
++$x	前递增	$x 加一递增，然后返回 $x
$x++	后递增	返回 $x，然后 $x 加一递增
--$x	前递减	$x 减一递减，然后返回 $x
$x--	后递减	返回 $x，然后 $x 减一递减
*/
$x=10;
echo ++$x; // 输出 11

$y=10;
echo $y++; // 输出 10

$z=5;
echo --$z; // 输出 4

$i=5;
echo $i--; // 输出 5



//PHP 比较运算符
//PHP 比较运算符用于比较两个值（数字或字符串）：
/*
运算符	名称	             例子	        结果
==	    等于	            $x == $y	    如果 $x 等于 $y，则返回 true。
===	    全等（完全相同）	$x === $y	    如果 $x 等于 $y，且它们类型相同，则返回 true。
!=	    不等于	        $x != $y	    如果 $x 不等于 $y，则返回 true。
<>	    不等于	        $x <> $y	    如果 $x 不等于 $y，则返回 true。
!==	    不全等（完全不同）	$x !== $y	    如果 $x 不等于 $y，且它们类型不相同，则返回 true。
>	    大于	            $x > $y     	如果 $x 大于 $y，则返回 true。
<	    大于          	$x < $y	        如果 $x 小于 $y，则返回 true。
>=	    大于或等于	    $x >= $y	    如果 $x 大于或者等于 $y，则返回 true.
<=	    小于或等于	    $x <= $y	    如果 $x 小于或者等于 $y，则返回 true。
*/
$x=100;
$y="100";

var_dump($x == $y);
echo "\n";
var_dump($x === $y);
echo "\n";
var_dump($x != $y);
echo "\n";
var_dump($x !== $y);
echo "\n";

$a=50;
$b=90;

var_dump($a > $b);
echo "\n";
var_dump($a < $b);


//PHP 逻辑运算符
/*
运算符	名称	        例子      	结果
and	    与	        $x and $y	如果 $x 和 $y 都为 true，则返回 true。
or	    或	        $x or $y	如果 $x 和 $y 至少有一个为 true，则返回 true。
xor	    异或	        $x xor $y	如果 $x 和 $y 有且仅有一个为 true，则返回 true。
&&	    与	        $x && $y	如果 $x 和 $y 都为 true，则返回 true。
||	    或	        $x || $y	如果 $x 和 $y 至少有一个为 true，则返回 true。
!	    非	        !$x	        如果 $x 不为 true，则返回 true。
*/



//PHP 数组运算符
//PHP 数组运算符用于比较数组：
/*
运算符	名称	    例子      	结果
+	    联合	    $x + $y	    $x 和 $y 的联合（但不覆盖重复的键）
==	    相等	    $x == $y	如果 $x 和 $y 拥有相同的键/值对，则返回 true。
===	    全等	    $x === $y	如果 $x 和 $y 拥有相同的键/值对，且顺序相同类型相同，则返回 true。
!=	    不相等	$x != $y	如果 $x 不等于 $y，则返回 true。
<>	    不相等	$x <> $y	如果 $x 不等于 $y，则返回 true。
!==	    不全等	$x !== $y	如果 $x 与 $y 完全不同，则返回 true。
*/
$x = array("a" => "red", "b" => "green");
$y = array("c" => "blue", "d" => "yellow");
$z = $x + $y; // $x 与 $y 的联合
var_dump($z);
var_dump($x == $y);
var_dump($x === $y);
var_dump($x != $y);
var_dump($x <> $y);
var_dump($x !== $y);

?>