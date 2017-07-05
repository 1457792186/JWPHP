<?php

//*********************************************array_column()	返回输入数组中某个单一列的值。


//*********************************************实例
//从记录集中取出 last_name 列：
// 表示由数据库返回的可能记录集的数组
$a = array(
    array(
        'id' => 5698,
        'first_name' => 'Bill',
        'last_name' => 'Gates',
    ),
    array(
        'id' => 4767,
        'first_name' => 'Steve',
        'last_name' => 'Jobs',
    )
     array(
        'id' => 3809,
         'first_name' => 'Mark',
        'last_name' => 'Zuckerberg',
  )
);

$last_names = array_column($a, 'last_name');
print_r($last_names);
//输出：
Array(
    [0] => Gates
    [1] => Jobs
    [2] => Zuckerberg
)


//*********************************************定义和用法
//array_column() 返回输入数组中某个单一列的值
/*
参数      	    描述
array	        必需。规定要使用的多维数组（记录集）。
column_key	    必需。需要返回值的列。
                可以是索引数组的列的整数索引，或者是关联数组的列的字符串键值。
                该参数也可以是 NULL，此时将返回整个数组（配合 index_key 参数来重置数组键的时候，非常有用）。
index_key   	可选。用作返回数组的索引/键的列。
*/
//语法
array_column(array,column_key,index_key);
//技术细节(5.5+):返回数组，此数组的值为输入数组中某个单一列的值


//*********************************************更多实例
//从记录集中取出 last_name 列，用相应的 "id" 列作为键值：
$a = array(
    array(
        'id' => 5698,
        'first_name' => 'Bill',
        'last_name' => 'Gates',
    ),
    array(
        'id' => 4767,
        'first_name' => 'Steve',
        'last_name' => 'Jobs',
    )
    array(
         'id' => 3809,
         'first_name' => 'Mark',
         'last_name' => 'Zuckerberg',
  )
);

$last_names = array_column($a, 'last_name', 'id');
print_r($last_names);
//输出：
Array(
    [5698] => Gates
    [4767] => Jobs
    [3809] => Zuckerberg
)

?>