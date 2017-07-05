<?php
//*********************************************array_diff_assoc()	比较数组，返回差集（比较键名和键值）。

//*********************************************实例
//比较两个数组的键和值，并返回差集：
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("a"=>"red","b"=>"green","c"=>"blue");

$result=array_diff_assoc($a1,$a2);
print_r($result);

//*********************************************定义和用法
//array_diff_assoc() 函数用于比较两个（或更多个）数组的键名和键值 ，并返回差集。
//该函数比较两个（或更多个）数组的键名和键值，并返回一个差集数组，该数组包括了所有在被比较的数组（array1）中
//但是不在任何其他参数数组（array2 或 array3 等等）中的键名和键值。
/*
参数      	描述
array1	    必需。与其他数组进行比较的第一个数组。
array2	    必需。与第一个数组进行比较的数组。
array3,...	可选。与第一个数组进行比较的其他数组。
*/
//语法
array_diff_assoc(array1,array2,array3...);
//技术细节(4.3+):返回数组，该数组包含所有在 array1 中，但是不在任何其他参数数组（array2 或 array3 等等）中的键名和键值。


//*********************************************更多实例
//比较两个数组的键和值，并返回差集
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"green","g"=>"blue");

$result=array_diff_assoc($a1,$a2);
print_r($result);

//比较三个数组的键和值，并返回差集：
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("a"=>"red","f"=>"green","g"=>"blue");
$a3=array("h"=>"red","b"=>"green","g"=>"blue");

$result=array_diff_assoc($a1,$a2,$a3);
print_r($result);

?>