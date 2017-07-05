<?php
//*********************************************prev()	将数组的内部指针倒回一位。


//*********************************************实例
//输出数组中的当前元素、下一个元素和上一个元素的值：
$people = array("Bill", "Steve", "Mark", "David");

echo current($people) . "<br>";
echo next($people) . "<br>";
echo prev($people);

//*********************************************定义和用法
//prev() 函数将内部指针指向数组中的上一个元素，并输出。
//相关的方法：
//next() - 将内部指针指向数组中的下一个元素，并输出
//current() - 返回数组中的当前元素的值
//end() - 将内部指针指向数组中的最后一个元素，并输出
//reset() - 将内部指针指向数组中的第一个元素，并输出
//each() - 返回当前元素的键名和键值，并将内部指针向前移动
/*
参数	    描述
array	必需。Specifies the array to use
*/
//说明
//prev() 和 next() 的行为类似，不过它将内部指针倒回一位而不是前移一位。
//注意：如果数组包含空的单元，或者单元的值是 0 则该函数碰到这些单元也返回 FALSE。要正确遍历可能含有空单元或者单元值为 0 的数组，请参见 each() 函数。
//语法
prev(array)
//技术细节(4+):如果成功则返回数组中上一个元素的值，如果没有更多的数组元素则返回 FALSE。


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