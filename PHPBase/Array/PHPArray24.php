<?php
//*********************************************array_multisort()	对多个数组或多维数组进行排序。

//*********************************************实例
//返回一个升序排列的数组：
$a=array("Dog","Cat","Horse","Bear","Zebra");
array_multisort($a);
print_r($a);


//*********************************************定义和用法
//array_multisort() 函数返回排序数组。您可以输入一个或多个数组。函数先对第一个数组进行排序，接着是其他数组，如果两个或多个值相同，它将对下一个数组进行排序。
//注释：字符串键名将被保留，但是数字键名将被重新索引，从 0 开始，并以 1 递增。
//注释：您可以在每个数组后设置排序顺序和排序类型参数。如果没有设置，每个数组参数会使用默认值。
/*
参数	            描述
array1	        必需。规定数组。
sorting order	可选。规定排列顺序。可能的值：
                SORT_ASC - 默认。按升序排列 (A-Z)。
                SORT_DESC - 按降序排列 (Z-A)。
sorting type	可选。规定排序类型。可能的值：
                SORT_REGULAR - 默认。把每一项按常规顺序排列（Standard ASCII，不改变类型）。
                SORT_NUMERIC - 把每一项作为数字来处理。
                SORT_STRING - 把每一项作为字符串来处理。
                SORT_LOCALE_STRING - 把每一项作为字符串来处理，基于当前区域设置（可通过 setlocale() 进行更改）。
                SORT_NATURAL - 把每一项作为字符串来处理，使用类似 natsort() 的自然排序。
                SORT_FLAG_CASE - 可以结合（按位或）SORT_STRING 或 SORT_NATURAL 对字符串进行排序，不区分大小写。
array2	        可选。规定数组。
array3	        可选。规定数组。
*/
/*
说明
array_multisort() 函数对多个数组或多维数组进行排序。
参数中的数组被当成一个表的列并以行来进行排序 - 这类似 SQL 的 ORDER BY 子句的功能。
第一个数组是要排序的主要数组。数组中的行（值）比较为相同的话，就会按照下一个输入数组中相应值的大小进行排序，依此类推。
第一个参数是数组，随后的每一个参数可能是数组，也可能是下面的排序顺序标志（排序标志用于更改默认的排列顺序）之一：
SORT_ASC - 默认，按升序排列。(A-Z)
SORT_DESC - 按降序排列。(Z-A)
随后可以指定排序的类型：
SORT_REGULAR - 默认。将每一项按常规顺序排列。
SORT_NUMERIC - 将每一项按数字顺序排列。
SORT_STRING - 将每一项按字母顺序排列。
*/
//语法
array_multisort(array1,sorting order,sorting type,array2,array3...)
//技术细节(4+):如果成功则返回 TRUE，如果失败则返回 FALSE。(排序类型 SORT_NATURAL 和 SORT_FLAG_CASE 是在 PHP 5.4 中新增的。
//排序类型 SORT_LOCALE_STRING 是在 PHP 5.3 中新增的)


//*********************************************更多实例
//返回一个升序排列的数组：
$a1=array("Dog","Cat");
$a2=array("Fido","Missy");
array_multisort($a1,$a2);
print_r($a1);
print_r($a2);


//当两个值相同时如何排序：
$a1=array("Dog","Dog","Cat");
$a2=array("Pluto","Fido","Missy");
array_multisort($a1,$a2);
print_r($a1);
print_r($a2);


//使用排序参数：
$a1=array("Dog","Dog","Cat");
$a2=array("Pluto","Fido","Missy");
array_multisort($a1,SORT_ASC,$a2,SORT_DESC);
print_r($a1);
print_r($a2);

//合并两个数组，并按数字降序排列：
$a1=array(1,30,15,7,25);
$a2=array(4,30,20,41,66);
$num=array_merge($a1,$a2);
array_multisort($num,SORT_DESC,SORT_NUMERIC);
print_r($num);

?>