<?php
//*********************************************natcasesort()	用“自然排序”算法对数组进行不区分大小写字母的排序。


//*********************************************定义和用法
//natcasesort() 函数用"自然排序"算法对数组进行排序。键值保留它们原始的键名。
//在自然排序算法中，数字 2 小于 数字 10。在计算机排序算法中，10 小于 2，因为 "10" 中的第一个数字小于 2。
//该函数对大小写不敏感。
//如果成功，该函数返回 TRUE，如果失败则返回 FALSE。
/*
参数	    描述
array	必需。规定要进行排序的数组。
*/
//语法
natcasesort(array)

//*********************************************实例
$temp_files = array("temp15.txt","Temp10.txt",
    "temp1.txt","Temp22.txt","temp2.txt");

natsort($temp_files);
echo "自然排序：";
print_r($temp_files);
echo "<br />";

natcasesort($temp_files);
echo "不区分大小写的自然排序：";
print_r($temp_files);
/*
以上代码的输出：
自然排序：

Array
(
[0] => Temp10.txt
[1] => Temp22.txt
[2] => temp1.txt
[4] => temp2.txt
[3] => temp15.txt
)

不区分大小写的自然顺序：

Array
(
[2] => temp1.txt
[4] => temp2.txt
[0] => Temp10.txt
[3] => temp15.txt
[1] => Temp22.txt
)
*/


?>