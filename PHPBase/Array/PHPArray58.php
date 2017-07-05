<?php
//*********************************************in_array()	检查数组中是否存在指定的值。


//*********************************************实例
//在数组中搜索值 "Glenn" ，并输出一些文本：
$people = array("Bill", "Steve", "Mark", "David");

if (in_array("Mark", $people))
{
    echo "匹配已找到";
}
else
{
    echo "匹配未找到";
}


//*********************************************定义和用法
//in_array() 函数搜索数组中是否存在指定的值。
//注释：如果 search 参数是字符串且 type 参数被设置为 TRUE，则搜索区分大小写。
/*
参数	    描述
search	必需。规定要在数组搜索的值。
array	必需。规定要搜索的数组。
type	可选。如果设置该参数为 true，则检查搜索的数据与数组的值的类型是否相同。
*/
//说明
//如果给定的值 search 存在于数组 array 中则返回 true。如果第三个参数设置为 true，函数只有在元素存在于数组中且数据类型与给定值相同时才返回 true。
//如果没有在数组中找到参数，函数返回 false。
//注释：如果 search 参数是字符串，且 type 参数设置为 true，则搜索区分大小写。
//语法
in_array(search,array,type)
//技术细节(4+):如果在数组中找到值则返回 TRUE，否则返回 FALSE。(自 PHP 4.2 起，search 参数现在也可能是数组。)


//*********************************************更多实例
//使用所有参数：
$people = array("Bill", "Steve", "Mark", "David");

if (in_array("23", $people, TRUE))
{
    echo "匹配已找到<br>";
}
else
{
    echo "匹配未找到<br>";
}
if (in_array("Mark",$people, TRUE))
{
    echo "匹配已找到<br>";
}
else
{
    echo "匹配未找到<br>";
}

if (in_array(23,$people, TRUE))
{
    echo "匹配已找到<br>";
}
else
{
    echo "匹配未找到<br>";
}



?>