<?php
//*********************************************array_reduce()	通过使用用户自定义函数，以字符串返回数组。

//*********************************************实例
//向用户自定义函数发送数组中的值，并返回一个字符串：
function myfunction($v1,$v2)
{
    return $v1 . "-" . $v2;
}
$a=array("Dog","Cat","Horse");
print_r(array_reduce($a,"myfunction"));


//*********************************************定义和用法
//array_reduce() 函数向用户自定义函数发送数组中的值，并返回一个字符串。
//注释：如果数组是空的且未传递 initial 参数，该函数返回 NULL。
//说明
//array_reduce() 函数用回调函数迭代地将数组简化为单一的值。
//如果指定第三个参数，则该参数将被当成是数组中的第一个值来处理，或者如果数组为空的话就作为最终返回值。
/*
参数	            描述
array	        必需。规定数组。
myfunction	    必需。规定函数的名称。
initial	        可选。规定发送到函数的初始值。
*/
//语法
array_reduce(array,myfunction,initial)
//技术细节(4.0.5+):返回结果值。


//*********************************************更多实例
//设置 initial 参数：
function myfunction($v1,$v2)
{
    return $v1 . "-" . $v2;
}
$a=array("Dog","Cat","Horse");
print_r(array_reduce($a,"myfunction",5));

//返回总和
function myfunction($v1,$v2)
{
    return $v1+$v2;
}
$a=array(10,15,20);
print_r(array_reduce($a,"myfunction",5));

?>