<?php
//*********************************************array_keys()	返回数组中所有的键名。

//*********************************************实例
//返回包含数组中所有键名的一个新数组：
$a=array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");
print_r(array_keys($a));


//*********************************************定义和用法
//array_keys() 函数返回包含数组中所有键名的一个新数组。
//如果提供了第二个参数，则只返回键值为该值的键名。
//如果 strict 参数指定为 true，则 PHP 会使用全等比较 (===) 来严格检查键值的数据类型。
/*
参数	        描述
array	    必需。规定数组。
value	    可选。您可以指定键值，然后只有该键值对应的键名会被返回。
strict	    可选。与 value 参数一起使用。可能的值：
            true - 返回带有指定键值的键名。依赖类型，数字 5 与字符串 "5" 是不同的。
            false - 默认值。不依赖类型，数字 5 与字符串 "5" 是相同的。
*/
//语法
array_keys(array,value,strict)
//技术细节(4+):返回包含数组中所有键名的一个新数组。(strict 参数是在 PHP 5.0 中新增的)

//*********************************************更多实例
//使用 value 参数：
$a=array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");
print_r(array_keys($a,"Highlander"));


//使用 strict 参数（false）：
$a=array(10,20,30,"10");
print_r(array_keys($a,"10",false));

//使用 strict 参数（true）：
$a=array(10,20,30,"10");
print_r(array_keys($a,"10",true));



?>