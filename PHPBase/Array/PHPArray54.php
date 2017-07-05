<?php
//*********************************************current()	返回数组中的当前元素。

//*********************************************实例
//输出数组中的当前元素的值：
$people = array("Bill", "Steve", "Mark", "David");

echo current($people) . "<br>";


//*********************************************定义和用法
//current() 函数返回数组中的当前元素的值。
//每个数组中都有一个内部的指针指向它的"当前"元素，初始指向插入到数组中的第一个元素。
//提示：该函数不会移动数组内部指针。要做到这一点，请使用 next() 和 prev() 函数。
//相关的方法：
//end() - 将内部指针指向数组中的最后一个元素，并输出
//next() - 将内部指针指向数组中的下一个元素，并输出
//prev() - 将内部指针指向数组中的上一个元素，并输出
//reset() - 将内部指针指向数组中的第一个元素，并输出
//each() - 返回当前元素的键名和键值，并将内部指针向前移动
/*
参数	    描述
array	必需。规定要使用的数组。
*/
//说明
//current() 函数返回数组中的当前元素（单元）。
//每个数组中都有一个内部的指针指向它“当前的”元素，初始指向插入到数组中的第一个元素。
//current() 函数返回当前被内部指针指向的数组元素的值，并不移动指针。如果内部指针指向超出了单元列表的末端，current() 返回 FALSE。
//语法
current(array)
//技术细节(4+):返回数组中的当前元素的值，如果当前元素为空或者当前元素没有值则返回 FALSE。

//*********************************************更多实例
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