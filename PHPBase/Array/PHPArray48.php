<?php
//*********************************************array_walk()	对数组中的每个成员应用用户函数。

//*********************************************实例
//对数组中的每个元素应用用户自定义函数：
function myfunction($value,$key)
{
    echo "The key $key has the value $value<br>";
}
$a=array("a"=>"red","b"=>"green","c"=>"blue");
array_walk($a,"myfunction");



//*********************************************定义和用法
//array_walk() 函数对数组中的每个元素应用用户自定义函数。在函数中，数组的键名和键值是参数。
//注释：您可以通过把用户自定义函数中的第一个参数指定为引用：&$value，来改变数组元素的值（参见实例 2）。
//提示：如需操作更深的数组（一个数组中包含另一个数组），请使用 array_walk_recursive() 函数。
/*
参数	            描述
array	        必需。规定数组。
myfunction	    必需。用户自定义函数的名称。
userdata,...	可选。规定用户自定义函数的参数。您能够向此函数传递任意多参数。
*/
//说明
//array_walk() 函数对数组中的每个元素应用回调函数。如果成功则返回 TRUE，否则返回 FALSE。
//典型情况下 myfunction 接受两个参数。array 参数的值作为第一个，键名作为第二个。如果提供了可选参数 userdata ，将被作为第三个参数传递给回调函数。
//如果 myfunction 函数需要的参数比给出的多，则每次 array_walk() 调用 myfunction 时都会产生一个 E_WARNING 级的错误。
//这些警告可以通过在 array_walk() 调用前加上 PHP 的错误操作符 @ 来抑制，或者用 error_reporting()。
//注释：如果回调函数需要直接作用于数组中的值，可以将回调函数的第一个参数指定为引用：&$value。（参见例子 3）
//注释：将键名和 userdata 传递到 myfunction 中是 PHP 4.0 新增加的。
//语法
array_walk(array,myfunction,userdata...)
//技术细节(4+):如果成功则返回 TRUE，否则返回 FALSE。


//*********************************************更多实例
//设置一个参数：
function myfunction($value,$key,$p)
{
    echo "$key $p $value<br>";
}
$a=array("a"=>"red","b"=>"green","c"=>"blue");
array_walk($a,"myfunction","has the value");


//更改一个数组元素的值（请注意 &$value）：
function myfunction(&$value,$key)
{
    $value="yellow";
}
$a=array("a"=>"red","b"=>"green","c"=>"blue");
array_walk($a,"myfunction");
print_r($a);

?>