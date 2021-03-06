<?php
//*********************************************array_udiff()	比较数组，返回差集（只比较值，使用一个用户自定义的键名比较函数）

//*********************************************实例
//比较两个数组的键值（使用用户自定义函数比较键值），并返回差集：
function myfunction($a,$b)
{
    if ($a===$b)
    {
        return 0;
    }
    return ($a>$b)?1:-1;
}

$a1=array("a"=>"red","b"=>"green","c"=>"blue");
$a2=array("a"=>"blue","b"=>"black","e"=>"blue");

$result=array_udiff($a1,$a2,"myfunction");
print_r($result);


//*********************************************定义和用法
//array_udiff() 函数用于比较两个（或更多个）数组的键值 ，并返回差集。
//注释：该函数使用用户自定义函数来比较键值！
//该函数比较两个（或更多个）数组的键值，并返回一个差集数组，该数组包括了所有在被比较的数组（array1）中，但是不在任何其他参数数组（array2 或 array3 等等）中的键值。
//说明
//array_udiff() 函数返回一个数组，该数组包括了所有在被比较数组中，但是不在任何其它参数数组中的值，键名保留不变。
//array_udiff() 函数与 array_diff() 函数 的行为不同，后者用内部函数进行比较。
//数据的比较是用 array_udiff() 函数的 myfunction 进行的。myfunction 函数带有两个将进行比较的参数。
//如果第一个参数小于第二个参数，则函数返回一个负数，如果两个参数相等，则要返回 0，如果第一个参数大于第二个，则返回一个正数。
/*
参数	            描述
array1	        必需。与其他数组进行比较的第一个数组。
array2	        必需。与第一个数组进行比较的数组。
array3,...	    可选。与第一个数组进行比较的其他数组。
myfunction	    必需。字符串值，定义可调用的比较函数。
                如果第一个参数小于等于或大于第二个参数，则比较函数必须返回小于等于或大于 0 的整数。
*/
//语法
array_udiff(array1,array2,array3...,myfunction)
//技术细节(5.1.0+):返回差集数组，该数组包含所有在被比较的数组（array1）中，但是不在任何其他参数数组（array2 或 array3 等等）中的键值。

//*********************************************更多实例1
//比较三个数组的键值（使用用户自定义函数比较键值），并返回差集：
function myfunction($a,$b)
{
    if ($a===$b)
    {
        return 0;
    }
    return ($a>$b)?1:-1;
}

$a1=array("a"=>"red","b"=>"green","c"=>"blue","yellow");
$a2=array("A"=>"red","b"=>"GREEN","yellow","black");
$a3=array("a"=>"green","b"=>"red","yellow","black");

$result=array_udiff($a1,$a2,$a3,"myfunction");
print_r($result);


?>