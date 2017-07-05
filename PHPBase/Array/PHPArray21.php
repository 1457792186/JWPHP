<?php
//*********************************************array_map()	把数组中的每个值发送到用户自定义函数，返回新的值。

//*********************************************实例
//将函数作用到数组中的每个值上，每个值都乘以本身，并返回带有新值的数组：
function myfunction($v)
{
    return($v*$v);
}

$a=array(1,2,3,4,5);
print_r(array_map("myfunction",$a));


//*********************************************定义和用法
//array_map() 函数将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新值的数组。
//回调函数接受的参数数目应该和传递给 array_map() 函数的数组数目一致。
//提示：您可以向函数输入一个或者多个数组。
/*
参数      	描述
myfunction	必需。用户自定义函数的名称，或者是 null。
array1	    必需。规定数组。
array2	    可选。规定数组。
array3	    可选。规定数组。
*/
//语法
array_map(myfunction,array1,array2,array3...)
//技术细节(4.0.6+)返回包含 array1 的值的数组，在向每个值应用自定义函数后。

//*********************************************更多实例
//使用用户自定义函数来改变数组的值：
function myfunction($v)
{
    if ($v==="Dog")
    {
        return "Fido";
    }
    return $v;
}

$a=array("Horse","Dog","Cat");
print_r(array_map("myfunction",$a));

//使用两个数组：
function myfunction($v1,$v2)
{
    if ($v1===$v2)
    {
        return "same";
    }
    return "different";
}

$a1=array("Horse","Dog","Cat");
$a2=array("Cow","Dog","Rat");
print_r(array_map("myfunction",$a1,$a2));

//将数组中值的所有字母改为大写：
function myfunction($v)
{
    $v=strtoupper($v);
    return $v;
}

$a=array("Animal" => "horse", "Type" => "mammal");
print_r(array_map("myfunction",$a));


//将函数名赋值为 null 时：
$a1=array("Dog","Cat");
$a2=array("Puppy","Kitten");
print_r(array_map(null,$a1,$a2));

?>