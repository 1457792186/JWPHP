<?php
//*********************************************array_intersect_uassoc()	比较数组，返回交集（比较键名和键值，使用用户自定义的键名比较函数）。

//*********************************************实例
//比较两个数组的键名和键值（使用用户自定义函数比较键名），并返回交集：
function myfunction($a,$b)
{
    if ($a===$b)
    {
        return 0;
    }
    return ($a>$b)?1:-1;
}

$a1=array("a"=>"red","b"=>"green","c"=>"blue");
$a2=array("d"=>"red","b"=>"green","e"=>"blue");

$result=array_intersect_uassoc($a1,$a2,"myfunction");
print_r($result);


//*********************************************定义和用法
//array_intersect_uassoc() 函数用于比较两个（或更多个）数组的键名和键值 ，并返回交集。
//注释：该函数使用用户自定义函数比较键名！
//该函数比较两个（或更多个）数组的键名和键值，并返回交集数组，该数组包括了所有在被比较的数组（array1）中
//同时也在任何其他参数数组（array2 或 array3 等等）中的键名和键值。
//说明
//array_intersect_uassoc() 函数使用用户自定义的回调函数计算数组的交集，用回调函数比较索引。
//array_intersect_uassoc() 返回一个数组，该数组包含了所有在 array1 中也同时出现在所有其它参数数组中的值。返回的数组中键名保持不变。
//注意，与 array_intersect() 不同的是除了比较键值，还要比较键名。
//此比较是通过用户提供的回调函数来进行的。该函数带有两个参数，即两个要进行对比的键名。
//如果第一个参数小于第二个参数，则函数要返回一个负数，如果两个参数相等，则要返回 0，如果第一个参数大于第二个参数，则返回一个正数。
/*
参数	            描述
array1	        必需。与其他数组进行比较的第一个数组。
array2	        必需。与第一个数组进行比较的数组。
array3,...	    可选。与第一个数组进行比较的其他数组。
myfunction	    必需。定义可调用比较函数的字符串。如果第一个参数小于、等于或大于第二个参数，则该比较函数必须返回小于、等于或大于 0 的整数。
*/
//语法
array_intersect_uassoc(array1,array2,array3...,myfunction)
//技术细节(5+):返回交集数组，该数组包括了所有在被比较的数组（array1）中，同时也在任何其他参数数组（array2 或 array3 等等）中的键名和键值。

//*********************************************更多实例
//比较三个数组的键名和键值（使用用户自定义函数比较键名），并返回交集：
function myfunction($a,$b)
{
    if ($a===$b)
    {
        return 0;
    }
    return ($a>$b)?1:-1;
}

$a1=array("a"=>"red","b"=>"green","c"=>"blue");
$a2=array("a"=>"red","b"=>"green","d"=>"blue");
$a3=array("e"=>"yellow","a"=>"red","d"=>"blue");

$result=array_intersect_uassoc($a1,$a2,$a3,"myfunction");
print_r($result);

?>