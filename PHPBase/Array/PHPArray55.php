<?php
//*********************************************each()	返回数组中当前的键／值对。

//*********************************************实例
//返回当前元素的键名和键值，并将内部指针向前移动：
$people = array("Bill", "Steve", "Mark", "David");
print_r (each($people));


//*********************************************定义和用法
//each() 函数返回当前元素的键名和键值，并将内部指针向前移动。
//该元素的键名和键值会被返回带有四个元素的数组中。两个元素（1 和 Value）包含键值，两个元素（0 和 Key）包含键名。
//相关的方法：
//current() - 返回数组中的当前元素的值
//end() - 将内部指针指向数组中的最后一个元素，并输出
//next() - 将内部指针指向数组中的下一个元素，并输出
//prev() - 将内部指针指向数组中的上一个元素，并输出
//reset() - 将内部指针指向数组中的第一个元素，并输出
/*
参数  	描述
array	必需。规定要使用的数组。
*/
//说明
//each() 函数生成一个由数组当前内部指针所指向的元素的键名和键值组成的数组，并把内部指针向前移动。
//返回的数组中包括的四个元素：键名为 0，1，key 和 value。单元 0 和 key 包含有数组单元的键名，1 和 value 包含有数据。
//如果内部指针越过了数组范围，本函数将返回 FALSE。
//语法
each(array)
//技术细节(4+):返回当前元素的键名和键值。该元素的键名和键值返回到带有四个元素的数组中。
//两个元素（1 和 Value）包含键值，两个元素（0 和 Key）包含键名。
//如果没有更多的数组元素，则函数返回 FALSE。

//*********************************************更多实例
//与页面顶部的实例相同，但是本例通过循环输出整个数组：
$people = array("Bill", "Steve", "Mark", "David");

reset($people);

while (list($key, $val) = each($people))
{
    echo "$key => $val<br>";
}


//演示所有相关的方法：
$people = array("Bill", "Steve", "Mark", "David");

echo current($people) . "<br>"; // 当前元素是 Bill
echo next($people) . "<br>"; // Bill 的下一个元素是 Steve
echo current($people) . "<br>"; // 现在当前元素是 Steve
echo prev($people) . "<br>"; // Steve 的上一个元素是 Bill
echo end($people) . "<br>"; // 最后一个元素是 David
echo prev($people) . "<br>"; // David 之前的元素是 Mark
echo current($people) . "<br>"; // 目前的当前元素是 Mark
echo reset($people) . "<br>"; // 把内部指针移动到数组的首个元素，即 Bill
echo next($people) . "<br>"; // Bill 的下一个元素是 Steve

print_r (each($people)); // 返回当前元素的键名和键值（目前是 Steve），并向前移动内部指针


?>