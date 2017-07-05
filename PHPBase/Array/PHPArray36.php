<?php
//*********************************************array_slice()	返回数组中被选定的部分。

//*********************************************实例
//从数组的第三个元素开始取出，并返回数组中的其余元素：
$a=array("red","green","blue","yellow","brown");
print_r(array_slice($a,2));


//*********************************************定义和用法
//array_slice() 函数在数组中根据条件取出一段值，并返回。
//注释：如果数组有字符串键，所返回的数组将保留键名。
/*
参数	            描述
array	        必需。规定数组。
start	        必需。数值。规定取出元素的开始位置。 0 = 第一个元素。
                如果该值设置为正数，则从前往后开始取。
                如果该值设置为负数，则从后向前取 start 绝对值。 -2 意味着从数组的倒数第二个元素开始。
length	        可选。数值。规定被返回数组的长度。
                如果该值设置为整数，则返回该数量的元素。
                如果该值设置为负数，则函数将在举例数组末端这么远的地方终止取出。
                如果该值未设置，则返回从 start 参数设置的位置开始直到数组末端的所有元素。
preserve	    可选。规定函数是保留键名还是重置键名。可能的值：
                    true - 保留键名
                    false - 默认。重置键名
*/
//语法
array_slice(array,start,length,preserve)
//技术细节(4+):返回数组中的选定部分。(在 PHP 5.0.2 中新增了 preserve 参数)


//*********************************************更多实例
//从数组的第二个元素开始取出，并仅返回两个元素
$a=array("red","green","blue","yellow","brown");
print_r(array_slice($a,1,2));


//使用负的 start 参数：
$a=array("red","green","blue","yellow","brown");
print_r(array_slice($a,-2,1));

//把 preserve 参数设置为 true：
$a=array("red","green","blue","yellow","brown");
print_r(array_slice($a,1,2,true));


//处理字符串键名和整数键名：
$a=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow","e"=>"brown");
print_r(array_slice($a,1,2));

$a=array("0"=>"red","1"=>"green","2"=>"blue","3"=>"yellow","4"=>"brown");
print_r(array_slice($a,1,2));


?>