<?php
//*********************************************rsort()	对数组逆向排序。


//*********************************************实例
//对数组 $cars 中的元素按字母进行降序排序：
$cars=array("Volvo","BMW","Toyota");
rsort($cars);


//*********************************************定义和用法
//rsort() 函数对数值数组进行降序排序。
//提示：请使用 sort() 函数对数值数组进行升序排序。
/*
参数          	描述
array	        必需。规定要进行排序的数组。
sortingtype	    可选。规定如何比较数组的元素/项目。可能的值：
                0 = SORT_REGULAR - 默认。把每一项按常规顺序排列（Standard ASCII，不改变类型）
                1 = SORT_NUMERIC - 把每一项作为数字来处理。
                2 = SORT_STRING - 把每一项作为字符串来处理。
                3 = SORT_LOCALE_STRING - 把每一项作为字符串来处理，基于当前区域设置（可通过 setlocale() 进行更改）。
                4 = SORT_NATURAL - 把每一项作为字符串来处理，使用类似 natsort() 的自然排序。
                5 = SORT_FLAG_CASE - 可以结合（按位或）SORT_STRING 或 SORT_NATURAL 对字符串进行排序，不区分大小写。
*/
//说明
//rsort() 函数对数组的元素按照键值进行逆向排序。与 arsort() 的功能基本相同。
//注释：该函数为 array 中的单元赋予新的键名。这将删除原有的键名而不仅是重新排序。
//如果成功则返回 TRUE，否则返回 FALSE。
//可选的第二个参数包含另外的排序标志。
//语法
rsort(array,sortingtype);
//技术细节(4+):TRUE on success. FALSE on failure


//*********************************************更多实例
//对数组 $numbers 中的元素按数字进行降序排序：
$numbers=array(4,6,2,22,11);
rsort($numbers);


//*********************************************把项目作为数字来比较，并对数组 $cars 中的元素进行降序排序：
$cars=array("Volvo","BMW","Toyota");
rsort($cars,SORT_NUMERIC);


?>