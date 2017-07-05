<?php
//*********************************************array() 创建数组


//*********************************************实例
//创建名为 $cars 的索引数组，向它赋三个元素，然后打印包含数组值的文本：
$cars=array("Volvo","BMW","Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";


//*********************************************定义和用法
/*
array() 函数用于创建数组。
在 PHP 中，有三种类型的数组：
索引数组 - 带有数字索引的数组
关联数组 - 带有指定的键的数组
多维数组 - 包含一个或多个数组的数组
说明
array() 创建数组，带有键和值。如果在规定数组时省略了键，则生成一个整数键，这个 key 从 0 开始，然后以 1 进行递增。
要用 array() 创建一个关联数组，可使用 => 来分隔键和值。
要创建一个空数组，则不传递参数给 array()：
*/
//语法
$new = array();
//技术细节(5.4+):可以使用短数组语法，用 [] 代替 array()。
//例如，用 $cars=["Volvo","BMW"]; 代替 $cars=array("Volvo","BMW");


//*********************************************语法
//索引数组的语法：
array(value1,value2,value3,etc.);


//关联数组的语法：
/*
参数  	描述
key	    规定键名（数值或字符串）。
value	规定键值。
*/
array(key=>value,key=>value,key=>value,etc.);



//*********************************************更多实例
//创建名为 $age 的关联数组：
$age2=array("Bill"=>"60","Steve"=>"56","Mark"=>"31");
echo "Bill is " . $age2['Bill'] . " years old.";

//遍历并打印索引数组的值：
$cars2=array("Volvo","BMW","Toyota");
$arrlength=count($cars2);

for($x=0;$x<$arrlength;$x++){
    echo $cars2[$x];
    echo "<br>";
}

//遍历并打印关联数组的所有值：
$age3=array("Bill"=>"60","Steve"=>"56","Mark"=>"31");

foreach($age3 as $x=>$x_value){
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

//创建多维数组：
$cars3=array(
    array("Volvo",100,96),
    array("BMW",60,59),
    array("Toyota",110,100)
);


//*********************************************常用方法
//获得数组的长度 - count() 函数
//count() 函数用于返回数组的长度（元素数）：
$cars=array("Volvo","BMW","SAAB");
echo count($cars);

//遍历索引数组
//如需遍历并输出索引数组的所有值，可以使用 for 循环，就像这样
$cars=array("Volvo","BMW","SAAB");
$arrlength=count($cars);

for($x=0;$x<$arrlength;$x++) {
    echo $cars[$x];
    echo "\n";
}

//PHP 关联数组
//关联数组是使用分配给数组的指定键的数组
$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
//或者
$age['Peter']="35";
$age['Ben']="37";
$age['Joe']="43";
//实例
$age=array("Bill"=>"35","Steve"=>"37","Peter"=>"43");
echo "Peter is " . $age['Peter'] . " years old.";


//遍历关联数组
//如需遍历并输出关联数组的所有值，可以使用 foreach 循环，就像这样
$age=array("Bill"=>"35","Steve"=>"37","Peter"=>"43");

foreach($age as $x=>$x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "\n";
}


//*********************************************常用排序
//PHP - 数组的排序函数
//sort() - 以升序对数组排序
//rsort() - 以降序对数组排序
//asort() - 根据值，以升序对关联数组进行排序
//ksort() - 根据键，以升序对关联数组进行排序
//arsort() - 根据值，以降序对关联数组进行排序
//krsort() - 根据键，以降序对关联数组进行排序

//对数组进行升序排序 - sort()
//下面的例子按照字母升序对数组 $cars 中的元素进行排序
$cars=array("Volvo","BMW","SAAB");
sort($cars);
//下面的例子按照数字升序对数组 $numbers 中的元素进行排序
$numbers=array(3,5,1,22,11);
sort($numbers);

//对数组进行降序排序 - rsort()
//下面的例子按照字母降序对数组 $cars 中的元素进行排序
$cars=array("Volvo","BMW","SAAB");
rsort($cars);
//下面的例子按照数字降序对数组 $numbers 中的元素进行排序
$numbers=array(3,5,1,22,11);
rsort($numbers);

//根据值对数组进行升序排序 - asort()
//下面的例子根据值对关联数组进行升序排序
$age=array("Bill"=>"35","Steve"=>"37","Peter"=>"43");
asort($age);
/*
Key=Bill, Value=35
Key=Steve, Value=37
Key=Peter, Value=43
*/

//根据键对数组进行升序排序 - ksort()
//下面的例子根据键对关联数组进行升序排序：
$age=array("Bill"=>"35","Steve"=>"37","Peter"=>"43");
ksort($age);
/*
Key=Bill, Value=35
Key=Peter, Value=43
Key=Steve, Value=37
*/

?>