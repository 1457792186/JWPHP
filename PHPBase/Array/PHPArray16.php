<?php
//*********************************************array_intersect_key()	比较数组，返回交集（只比较键名）。

//*********************************************实例
//比较两个数组的键名，并返回交集：
$a1=array("a"=>"red","b"=>"green","c"=>"blue");
$a2=array("a"=>"red","c"=>"blue","d"=>"pink");

$result=array_intersect_key($a1,$a2);
print_r($result);


//*********************************************定义和用法
//array_intersect_key() 函数用于比较两个（或更多个）数组的键名 ，并返回交集。
//该函数比较两个（或更多个）数组的键名，并返回交集数组，该数组包括了所有在被比较的数组（array1）中
//同时也在任何其他参数数组（array2 或 array3 等等）中的键名。
//说明
//array_intersect_key() 函数使用键名比较计算数组的交集。
//array_intersect_key() 返回一个数组，该数组包含了所有出现在被比较的数组中并同时出现在所有其它参数数组中的键名的值。
//注释：仅有键名用于比较。
/*
参数          	描述
array1	        必需。与其他数组进行比较的第一个数组。
array2	        必需。与第一个数组进行比较的数组。
array3,...	    可选。与第一个数组进行比较的其他数组。
*/
//语法
array_intersect_key(array1,array2,array3...)
//技术细节(5.1.0+):返回一个交集数组，该数组包括了所有在被比较的数组（array1）中，同时也在任何其他参数数组（array2 或 array3 等等）中的键名。

//*********************************************更多实例
//比较两个索引数组的键名，并返回交集：
$a1=array("red","green","blue","yellow");
$a2=array("red","green","blue");

$result=array_intersect_key($a1,$a2);
print_r($result);

//比较三个数组的键名，并返回交集：
$a1=array("a"=>"red","b"=>"green","c"=>"blue");
$a2=array("c"=>"yellow","d"=>"black","e"=>"brown");
$a3=array("f"=>"green","c"=>"purple","g"=>"red");

$result=array_intersect_key($a1,$a2,$a3);
print_r($result);


?>