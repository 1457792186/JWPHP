<?php
//*********************************************array_replace_recursive()	递归地使用后面数组的值替换第一个数组的值。

//*********************************************实例
//递归地使用第二个数组（$a2）的值替换第一个数组（$a1）的值：
$a1=array("a"=>array("red"),"b"=>array("green","blue"),);
$a2=array("a"=>array("yellow"),"b"=>array("black"));
print_r(array_replace_recursive($a1,$a2));


//*********************************************定义和用法
//array_replace_recursive() 函数递归地使用后面数组的值替换第一个数组的值。
//提示：您可以向函数传递一个数组，或者多个数组。
//如果一个键存在于第一个数组 array1 同时也存在于第二个数组 array2，第一个数组 array1 中的值将被第二个数组 array2 中的值替换。
//如果一个键仅存在于第一个数组 array1，它将保持不变。如果一个键存在于第二个数组 array2，但是不存在于第一个数组 array1，则会在第一个数组 array1 中创建这个元素。
//如果传递了多个替换数组，它们将被按顺序依次处理，后面数组的值将覆盖之前数组的值。
//注释：如果没有为每个数组指定一个键，该函数的行为将等同于 array_replace() 函数。
/*
参数	        描述
array1	    必需。规定数组。
array2	    可选。指定要替换 array1 的值的数组。
array3,...	可选。指定多个要替换 array1 和 array2, ... 的值的数组。后面数组的值将覆盖之前数组的值。
*/
//语法
array_replace_recursive(array1,array2,array3...)
//技术细节(5.3.0+):返回被替换的数组，如果发生错误则返回 NULL。

//*********************************************更多实例
//多个数组：
$a1=array("a"=>array("red"),"b"=>array("green","blue"));
$a2=array("a"=>array("yellow"),"b"=>array("black"));
$a3=array("a"=>array("orange"),"b"=>array("burgundy"));
print_r(array_replace_recursive($a1,$a2,$a3));


//array_replace() 与 array_replace_recursive() 的差别：
$a1=array("a"=>array("red"),"b"=>array("green","blue"),);
$a2=array("a"=>array("yellow"),"b"=>array("black"));

$result=array_replace_recursive($a1,$a2);
print_r($result);

$result=array_replace($a1,$a2);
print_r($result);


?>