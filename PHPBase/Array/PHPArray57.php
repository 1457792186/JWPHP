<?php
//*********************************************extract()	从数组中将变量导入到当前的符号表。


//*********************************************实例
//将键值 "Cat"、"Dog" 和 "Horse" 赋值给变量 $a、$b 和 $c：
$a = "Original";
$my_array = array("a" => "Cat","b" => "Dog", "c" => "Horse");
extract($my_array);
echo "\$a = $a; \$b = $b; \$c = $c";


//*********************************************定义和用法
//extract() 函数从数组中将变量导入到当前的符号表。
//该函数使用数组键名作为变量名，使用数组键值作为变量值。针对数组中的每个元素，将在当前符号表中创建对应的一个变量。
//第二个参数 type 用于指定当某个变量已经存在，而数组中又有同名元素时，extract() 函数如何对待这样的冲突。
//该函数返回成功导入到符号表中的变量数目。
/*
参数	                描述
array	            必需。规定要使用的数组。
extract_rules	    可选。extract() 函数将检查每个键名是否为合法的变量名，同时也检查和符号表中已存在的变量名是否冲突。对不合法和冲突的键名的处理将根据此参数决定。
                    可能的值：
                    EXTR_OVERWRITE - 默认。如果有冲突，则覆盖已有的变量。
                    EXTR_SKIP - 如果有冲突，不覆盖已有的变量。
                    EXTR_PREFIX_SAME - 如果有冲突，在变量名前加上前缀 prefix。
                    EXTR_PREFIX_ALL - 给所有变量名加上前缀 prefix。
                    EXTR_PREFIX_INVALID - 仅在不合法或数字变量名前加上前缀 prefix。
                    EXTR_IF_EXISTS - 仅在当前符号表中已有同名变量时，覆盖它们的值。其它的都不处理。
                    EXTR_PREFIX_IF_EXISTS - 仅在当前符号表中已有同名变量时，建立附加了前缀的变量名，其它的都不处理。
                    EXTR_REFS - 将变量作为引用提取。导入的变量仍然引用了数组参数的值。
prefix	            可选。请注意 prefix 仅在 extract_type 的值是 EXTR_PREFIX_SAME，EXTR_PREFIX_ALL，EXTR_PREFIX_INVALID 或 EXTR_PREFIX_IF_EXISTS 时需要。
                    如果附加了前缀后的结果不是合法的变量名，将不会导入到符号表中。
                    前缀和数组键名之间会自动加上一个下划线。
*/
//语法
extract(array,extract_rules,prefix)
//技术细节(4+):返回成功导入到符号表中的变量数目。
//更新日志：
//extract_rules 的值 EXTR_REFS 是在 PHP 4.3 中新增的。
//extract_rules 的值 EXTR_IF_EXISTS 和 EXTR_PREFIX_IF_EXISTS 是在 PHP 4.2 中新增的。
//自 PHP 4.0.5 起，该函数返回成功导入到符号表中的变量数目。
//extract_rules 的值 EXTR_PREFIX_INVALID 是在 PHP 4.0.5 中新增的。
//自 PHP 4.0.5 起，extract_rules 的值 EXTR_PREFIX_ALL 也包含数字变量。

//*********************************************更多实例
//使用所有参数：
$a = "Original";
$my_array = array("a" => "Cat", "b" => "Dog", "c" => "Horse");

extract($my_array, EXTR_PREFIX_SAME, "dup");

echo "\$a = $a; \$b = $b; \$c = $c; \$dup_a = $dup_a";



?>