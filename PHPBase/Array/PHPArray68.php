<?php
//*********************************************reset()	将数组的内部指针指向第一个元素。


//*********************************************实例
//输出数组中的当前元素和下一个元素的值，然后把数组的内部指针重置到数组中的第一个元素：
$people = array("Bill", "Steve", "Mark", "David");

echo current($people) . "<br>";
echo next($people) . "<br>";

echo reset($people);


//*********************************************定义和用法
//reset() 函数将内部指针指向数组中的第一个元素，并输出。
//相关的方法：
//current() - 返回数组中的当前元素的值
//end() - 将内部指针指向数组中的最后一个元素，并输出
//next() - 将内部指针指向数组中的下一个元素，并输出
//prev() - 将内部指针指向数组中的上一个元素，并输出
//each() - 返回当前元素的键名和键值，并将内部指针向前移动
/*
参数	    描述
array	必需。规定要使用的数组。
*/
//语法
reset(array)
//技术细节(4+):若成功则返回数组中第一个元素的值，若数组为空则返回 FALSE。


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