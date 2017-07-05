<?php
//*********************************************array_reverse()	以相反的顺序返回数组。

//*********************************************实例
//以相反的元素顺序返回数组
$a=array("a"=>"Volvo","b"=>"BMW","c"=>"Toyota");
print_r(array_reverse($a));


//*********************************************定义和用法
//array_reverse() 函数以相反的元素顺序返回数组。
//说明
//array_reverse() 函数将原数组中的元素顺序翻转，创建新的数组并返回。
//如果第二个参数指定为 true，则元素的键名保持不变，否则键名将丢失。
/*
参数	        描述
array	    必需。规定数组。
preserve	可选。规定是否保留原始数组的键名。
            这个参数是 PHP 4.0.3 中新加的。
            可能的值：
                    true
                    false
*/
//语法
array_reverse(array,preserve)
//技术细节(4+):返回反转后的数组。(在 PHP 4.0.3 中新增了 preserve 参数)


//*********************************************更多实例
//返回原始数组、反转数组、保留原始数组键名的翻转数组：
$a=array("Volvo","XC90",array("BMW","Toyota"));
$reverse=array_reverse($a);
$preserve=array_reverse($a,true);

print_r($a);
print_r($reverse);
print_r($preserve);


?>