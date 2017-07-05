<?php
//*********************************************array_replace()	使用后面数组的值替换第一个数组的值。


//*********************************************实例
//使用第二个数组（$a2）的值替换第一个数组（$a1）的值：
$a1=array("red","green");
$a2=array("blue","yellow");
print_r(array_replace($a1,$a2));


//*********************************************定义和用法
//array_replace() 函数使用后面数组的值替换第一个数组的值。
//提示：您可以向函数传递一个数组，或者多个数组。
//如果一个键存在于第一个数组 array1 同时也存在于第二个数组 array2，第一个数组 array1 中的值将被第二个数组 array2 中的值替换。
//如果一个键仅存在于第一个数组 array1，它将保持不变。（详见下面的实例 1）
//如果一个键存在于第二个数组 array2，但是不存在于第一个数组 array1，则会在第一个数组 array1 中创建这个元素。（详见下面的实例 2）
//如果传递了多个替换数组，它们将被按顺序依次处理，后面数组的值将覆盖之前数组的值。（详见下面的实例 3）
//提示：请使用 array_replace_recursive() 来递归地使用后面数组的值替换第一个数组的值。
/*
参数	        描述
array1	    必需。规定数组。
array2	    可选。指定要替换 array1 的值的数组。
array3,...	可选。指定多个要替换 array1 和 array2, ... 的值的数组。后面数组的值将覆盖之前数组的值。
*/
//语法
array_replace(array1,array2,array3...)
//技术细节(5.3.0+):返回被替换的数组，如果发生错误则返回 NULL。

//*********************************************更多实例
//如果一个键存在于 array1 中同时也存在于 array2 中，第一个数组的值将被第二个数组中的值替换：
$a1=array("a"=>"red","b"=>"green");
$a2=array("a"=>"orange","burgundy");
print_r(array_replace($a1,$a2));


//如果一个键仅存在于第二个数组中：
$a1=array("a"=>"red","green");
$a2=array("a"=>"orange","b"=>"burgundy");
print_r(array_replace($a1,$a2));


//使用三个数组 - 最后一个数组（$a3）会覆盖之前的数组（$a1 和 $a2）：
$a1=array("red","green");
$a2=array("blue","yellow");
$a3=array("orange","burgundy");
print_r(array_replace($a1,$a2,$a3));


//使用数值键 - 如果一个键存在于第二个数组中单不在第一个数组中：
$a1=array("red","green","blue","yellow");
$a2=array(0=>"orange",3=>"burgundy");
print_r(array_replace($a1,$a2));

?>