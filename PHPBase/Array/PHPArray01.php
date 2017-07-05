<?php
//*********************************************array_change_key_case()	把数组中所有键更改为小写或大写


//*********************************************实例
//将数组的所有的键转换为大写字母：
$age=array("Bill"=>"60","Steve"=>"56","Mark"=>"31");
print_r(array_change_key_case($age,CASE_UPPER));

//*********************************************定义和用法
//array_change_key_case() 函数将数组的所有的键都转换为大写字母或小写字母。
//数组的数字索引不发生变化。如果未提供可选参数（即第二个参数），则默认转换为小写字母。
//如果在运行该函数时两个或多个键相同，则最后的元素会覆盖其他元素
/*
参数  	描述
array  	必需。规定要使用的数组。
case	可选。可能的值：
        CASE_LOWER - 默认值。将数组的键转换为小写字母。
        CASE_UPPER - 将数组的键转换为大写字母。
*/
//语法
array_change_key_case(array,case);
//技术细节(4.2+):返回键为大写或小写的数组，或者如果 array 非数组则返回 FALSE。


//*********************************************更多实例
//将数组的所有的键转换为小写字母：
$age=array("Bill"=>"60","Steve"=>"56","Mark"=>"31");
print_r(array_change_key_case($age,CASE_LOWER));

//如果运行 array_change_key_case() 之后有两个或者多个的键相等（比如 "b" 和 "B"），则最后的元素会覆盖其他元素：
$pets=array("a"=>"Cat","B"=>"Dog","c"=>"Horse","b"=>"Bird");
print_r(array_change_key_case($pets,CASE_UPPER));



?>