<?php

//命名规范
//属性命名m开头
//变量命名r开头
//全局变量g开头
//静态变量s开头
//以上可组合使用：如$msExam = 1;//即是属性又是静态变量


//PHP时间见AdvancedLearning/MoreLearn/PHPDate.php



//******************************1.定义方法&调用
//输出
echo "我的第一段 PHP 脚本！";

$x = 5;// 全局作用域
$y = 6;
$z = $x + $y;
echo $z,"\n";

function myTest(){//定义方法
    $a = 10;//局部作用域

//    echo "x = $x";//未取得全局
    echo "a = $a \n";

//    global 关键词用于访问函数内的全局变量
    global  $x,$y;
    echo "x = $x \n";//获取全局后输出全局变量
    $y = $x + $y;

//    PHP 同时在名为 $GLOBALS[index] 的数组中存储了所有的全局变量。下标存有变量名。
//    这个数组在函数内也可以访问，并能够用于直接更新全局变量
    $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];

    return $a;
}




//调用方法
myTest();
echo $y,"\n";





//static 关键词
//通常，当函数完成/执行后，会删除所有变量。不过，有时需要不删除某个局部变量。实现这一点需要更进一步的工作。
//要完成这一点，在首次声明变量时使用 static 关键词：
function myStatic(){
    static $b = 0;
    echo "b = $b \n";
    $b++;
}

myStatic();//输出0
myStatic();//输出1
myStatic();//输出2







//******************************2.echo&print
//echo 和 print 之间的差异：
//echo - 能够输出一个以上的字符串
//print - 只能输出一个字符串，并始终返回 1
echo "I'm about to learn PHP!\n";
echo "This", " string", " was", " made", " with multiple parameters.\n";

print "I'm about to learn PHP!\n";
print "This string was made with multiple parameters.\n";

//输出数组数据
$cars=array("Volvo","BMW","SAAB");
echo  "Cars is a {$cars[0]} \n";

print "My car is a {$cars[0]} \n";

//注意输出特殊字符(如符号""等,需要转义,使用"\")
echo "This\", \" string\", \" was\", \" made\", \" with multiple parameters.\n";

print "This\", \" string\", \" was\", \" made\", \" with multiple parameters.\n";

$A = "A";
$B = "B";
echo $A.$B;//输出AB
echo $A .= $B;//输出AB,A变为AB






//******************************3.数据类型
//字符串可以是引号内的任何文本,可以使用单引号或双引号

//PHP 整数
//整数是没有小数的数字。
//整数规则：
//整数必须有至少一个数字（0-9）
//整数不能包含逗号或空格
//整数不能有小数点
//整数正负均可
//可以用三种格式规定整数：十进制、十六进制（前缀是 0x）或八进制（前缀是 0）
//PHP var_dump() 会返回变量的数据类型和值
$x = 5985;
var_dump($x);
echo "\n";
$x = -345; // 负数
var_dump($x);
echo "\n";
$x = 0x8C; // 十六进制数
var_dump($x);
echo "\n";
$x = 047; // 八进制数
var_dump($x);
echo "\n";









//字符串
//双引号""与单引号''区别:双引号进行PHP语法解析,单引号不解析直接输出,所以单引号比较快
echo  "Cars is a {$cars[0]} \n";//输出Cars is a Volvo
echo  'Cars is a {$cars[0]} \n';//输出Cars is a {$cars[0]} \n

//自动转义
//使用addslashes()和stripslashes()实现自动转义
$addStr = "select * from tb_book where bookname = 'PHP5 Learn'";
echo $addStr;
$addAutoStr = addslashes($addStr);//对字符串进行转义
echo $addAutoStr."\n";//select * from tb_book where bookname = \'PHP5 Learn\'
$addAutoStr = stripslashes($addAutoStr);//对字符串进行转义还原
echo $addAutoStr."\n";//select * from tb_book where bookname = 'PHP5 Learn'
//所有数据插入数据库前,务必使用addslashes()函数进行字符串转义,避免发生错误

//使用addcslashes()和stripcslashes()实现指定字符串转义
$addStr = "select * from tb_book where bookname = 'PHP5 Learn'";
echo $addStr;
$addAutoStr = addcslashes($addStr,"'PHP5");//对字符串进行转义
echo $addAutoStr."\n";//select * from tb_book where bookname = \'\P\H\P\5 Learn\'
$addAutoStr = stripcslashes($addAutoStr);//对字符串进行转义还原
echo $addAutoStr."\n";//select * from tb_book where bookname = 'PHP5 Learn'


//获取字符串长度
//strlen()
echo strlen($addAutoStr);//输出$addAutoStr的字符串长度,汉字2字符,其余一个字符


//截取字符串
//substr()
echo substr($addAutoStr,0)."\n";//从第0个字符开始截取
echo substr($addAutoStr,4,10)."\n";//从第4个字符开始截取10个字符
echo substr($addAutoStr,-4,5)."\n";//从倒数第4个字符开始截取5个字符
echo substr($addAutoStr,0,-4)."\n";//从第0个字符开始截取,截取到倒数第4个字符


//比较字符串
//strcmp()该函数区分大小写
//strcasecmp()该函数不区分大小写
$compareStr1 = "幻想乡赛高!";
$compareStr2 = "幻想乡赛高!";
$compareStr3 = "SCARLET";
$compareStr4 = "scarlet";

echo strcmp($compareStr1,$compareStr2);//输出1,字符相等
echo strcmp($compareStr3,$compareStr4);//输出0,字符不相等,区分大小写
echo strcasecmp($compareStr3,$compareStr4);//输出1,字符相等


//按自然排序比较字符串
//strcmp()该函数区分大小写
//strnatcmp()自然排序法排序
//2比10小,因为10的首位1比2小
//相等返回0,str1比str2大则返回值大于0,str1比str2小则返回值小于0
$compareStr1 = "幻想乡赛高!2";
$compareStr2 = "幻想乡赛高!10";
$compareStr3 = "SCARLET1";
$compareStr4 = "scarlet2";

echo strcmp($compareStr1,$compareStr2);//输出1,str1比str2大
echo strcmp($compareStr3,$compareStr4);//输出1,str1比str2大
echo strnatcmp($compareStr1,$compareStr2);//输出-1,因为区分大小str1比str2小
echo strnatcasecmp($compareStr1,$compareStr2);//输出0,因为不区分大小
//从指定源字符串的位置开始比较
echo strncmp($compareStr3,$compareStr4,5);//输出-1,比较两者前5个字符,由于compareStr4为小写,故比较小


//检索字符串
//strstr(haystack,needle)查找指定的关键字,haystack:指定从哪个字符串进行搜索,needle:指定搜索对象
$picture = "hxx.png";
$pictureType = strstr($picture,".");//截取字符串,获取"."之后的后缀
if ($pictureType == ".png"){
    echo "是图片\n";
}else{
    echo "不是图片\n";
}

//检索子串出现次数
//substr_count()
$subStr = "aabbbccccdd";
echo substr_count($subStr,"a");//计算子串a在subStr中出现的次数

//替换字符串
//使用str_ireplace() -不区分大小写 或者str_replace() -区分大小写 或者substr_replace()
//语法mixed str_ireplace(mixed search,mixed replace,mixed subject[,int &count])
//search:指定需要查找的字符串,replace:指定替换的值,subjecct:查找的范围,count:可选参数-执行替换的次数
$subStr = "aaBbccdd";//查找的范围
$searchStr = "b";//查找的字符串
$replaceStr = "a";//替换的字符串
echo str_ireplace($searchStr,$replaceStr,$subStr);//输出aaaaccdd
echo str_replace($searchStr,$replaceStr,$subStr);//输出aaBaccdd

//将查询信息颜色改为红色
echo str_ireplace($searchStr,"<font color='#FF0000'>".$replaceStr."</font>",$subStr);//输出aaaaccdd

//语法:substr_replace(str,repl,start[,length])
//str:需要操作的原字符串,repl:替换后的新字符串,start:起始位置正数表示从头开始负数表示结尾开始0表示其实为字符串第一个字符
//length:可选参数-指定替换的字符串长度,正数表示从头开始负数表示结尾开始0表示其实为插入而非替代
//若start设置为负数,并且length的值小于或等于start的值,则length的值自动为0
echo substr_replace($subStr,$replaceStr,2);

//格式化字符串
//number_format()用来将字符串格式化
//string number_format(float number[,int num_decimal_places,][string dec_seperator,string thousands_separayor])
//number_format()可以有一个两个四个参数,但是不能是三个参数
//一个参数-舍去小数
//两个参数-格式化到小数点后num_decimal_places位
//四个参数-格式化到小数点后num_decimal_places位,dec_seperator用来代替小数点(.),thousands_separayor用来代替千位数隔开的逗号(,)
//四个参数如将10,086.188变更为10.0860188
$numberStr = 10086.186;
echo number_format($numberStr);//定义数字字符串常量,输出10086
echo number_format($numberStr,2);//定义数字字符串常量,输出10086.18
$numberStr = 11008866.186655;
echo number_format($numberStr,2,".",".");//定义数字字符串常量,输出11.008.866.18

//分割字符串
//explode(separatoe,str[,limit])
//separtor表示分割参数,str为进行分割的字符串,limit为可选参数,表示数组最多个数,最后的元素包含str的剩余部分,若为负数,则返回除了最后的-limit个所有元素
$strArr = "@a@b@c";
$strArray = explode("@",$strArr);

//合成字符串
//implode(glue,pieces)
//glue为指定分隔符,pieces为要被合并的数组
$strArr = implode("@@",$strArray);







//PHP 浮点数
//浮点数是有小数点或指数形式的数字
$x = 10.365;
var_dump($x);
echo "\n";
$x = 2.4e3;
var_dump($x);
echo "\n";
$x = 8E-5;
var_dump($x);






//PHP 逻辑
//逻辑是 true 或 false。
$x = true;
$x = false;





//表达式
$x = $x++;
$x = $x--;
$x = $x + 1;
$x += 1;
$x = $x?$x+10:$x+20;





//运算符
//加
$x = $x + $x;
//减
$x = $x - $x;
//乘
$x = $x * $x;
//除
$x = $x/$x;
//取模
$x = $x%$x;
//取反
$x = -$x;





//位运算符
//与
//$x&$x

//或
//$x|$x

//非
//~$x

//亦或
//$x^$x

//左移
//$x<<$x

//右移
//$x>>$x






//逻辑运算符
//与
//$x&&$x
//or
//$x and $x

//或
//$x||$x
//or
//$x or $x

//非
//!$x

//亦或:两边有一个为true时为真————一真一假则为真
//$x xor $x










//字符串强转
$str1 = "aa";//aa
$str1 = "a\"a";//a"a
//使用(string)或者strval()函数将一个值转换为字符串
$str1 = (1);//1
$str1 = strval(233);//233

//去除字符串首尾空格和特殊字符
//string trim(string str[,string charlist])
//charlist为可选参数,删除哪些字符,如\0空值,\t制表符,\n换行符
$str = "  \r\n(sad@46asdhfdba sfah @;)";
echo $str."\n";//输出字符串
echo trim($str)."\n";//去除左右两边空格
echo trim($str,"\r\n()");//去除左右两边的特殊字符\r\n()

//去除字符串左边空格和特殊字符
//string ltrim(string str[,string charlist])
$str = "  \r\n(sad@46asdhfdba sfah @;)";
echo $str."\n";//输出字符串
echo ltrim($str)."\n";//去除左边空格
echo ltrim($str,"\r\n()");//去除左边的特殊字符\r\n()

//去除字符串右边空格和特殊字符
//string rtrim(string str[,string charlist])
$str = "  \r\n(sad@46asdhfdba sfah @;)";
echo $str."\n";//输出字符串
echo rtrim($str)."\n";//去除右边空格
echo rtrim($str,"\r\n()");//去除右边的特殊字符\r\n()






//错误控制运算符@————忽略因表达式运算错误而产生的的错误信息
echo  @myTest();//忽略函数调用失败产生的错误信息





//执行运算符"``"
//在安全模式或者关闭了shell_exec()的情况下,执行运算符无效
$output = `dir`;
echo "$output";





//PHP NULL 值
//特殊的 NULL 值表示变量无值。NULL 是数据类型 NULL 唯一可能的值。
//NULL 值标示变量是否为空。也用于区分空字符串与空值数据库。
//可以通过把值设置为 NULL，将变量清空：
$x=null;
var_dump($x);
//测试变量是否为NULL
echo  is_null($x);//1,true
//赋值空格
$x = "";
echo  is_null($x);//0,flase
//删除变量
unset($x);
echo  is_null($x);//1,true






//PHP资源
//使用fopen()建立资源
$fp = fopen("peoples.xml","r");
//操作资源
//显示资源类型
echo get_resource_type($fp);
//关闭资源
fclose($fp);






//变量间转换
$number = "233";

//转成整型
$number = (int)$number;
//or
$number = (integer)$number;

//转成布尔型
$number = (bool)$number;
//or
$number = (boolean)$number;

//转成浮点型
$number = (float)$number;
//or
$number = (double)$number;
//or
$number = (real)$number;

//转成字符串
$number = (string)$number;

//转成数组
$number = (array)$number;

//转成对象
$number = (object)$number;







//可变变量
//普通变量
$normal = "17岁";
//在普通变量前加$,转变为可变变量
$$normal = "紫妈";
//输出测试——紫妈 17岁
echo "$normal ${$normal}";








//PHP 数组
//数组在一个变量中存储多个值
$cars = array("Vol","BMW","SAAB");
var_dump($cars);

//包含键名的数组
$fruitArr = array(
    "yellow"=>"banana",
    "red"=>"apple"
);
//向数组中添加一个没有键名的值
$fruitArr[] = "blue";
//向数组添加一个有键名的值
$fruitArr["orange"] = "oranges";
$fruitArr[5] = "watermanlan";
//改变数组中值
$fruitArr["orange"] = "mango";

//统计数组元素个数
//count()
//int count(mixed array[,int mode])      array:输入的数组;mode:可选,值为0或者COUNT_RECURSIVE(1),若选中此参数,本函数将递归地对数组计数,对计算多维数组的所有单元有用,默认值为0
echo count($fruitArr);

//查询数组中指定元素
//array_search()
//mixed array_search(mixed needle,array haystack[,bool strict])
//参数needle指定在数组中搜索的值,haystack为指定被搜索的数组,strict为可选参数,若值为true,还将在数组中检查给定值的类型
$fruitKey = array_search("red",$fruitArr);
echo $fruitKey."\n";//输出apple

//获取数组中的最后一个元素
//array_pop()
echo array_pop($cars);

//向数组中添加元素
//array_push()
//int array_push(array array,mixed var[,mixed...])
//array为指定的数组,var参数为压入数组中的值
array_push($cars,"PHPCar");

//删除数组中的重复元素
//array_unique()
//语法:array array_unique(array array)
array_push($fruitArr,"red"["apple"]);
array_unique($fruitArr);

//数组遍历
//只取值
foreach ($cars as  $value){
    echo "car name is {$value}\n";
}
foreach ($fruitArr as $key => $value){
    echo "fruit value is {$value}\'s key is {$key} \n";
}

//多维数组
$myArr = array(
    "car" => $cars,
    "fruit" => $fruitArr
);
//遍历多维数组
foreach ($myArr as $arr){
    foreach ($arr as $key =>$value){
        echo "key is {$key} & value is {$value}\n";
    }
}

//联合两个数组:
$allArr = $cars+$fruitArr;
//比较两个数组是否相等$cars == $fruitArr
//比较两个数组是否全相等$cars === $fruitArr
//比较两个数组是否不相等$cars != $fruitArr
//比较两个数组是否不相等$cars <> $fruitArr
//比较两个数组是否不全相等$cars !== $fruitArr

//删除数组中的一个值
unset($fruitArr[5]);
//删除整个数组
unset($fruitArr);
//自动生成一个数组并赋值
$newFruitArr[] = 233;

//另外一种遍历方式
//list(mixed...)
while (list($name,$value)=each($_POST)){
    if ($name!="submit"){
        echo "$name=$value\n";
        break;
    }
}



//文件上传
//move_uploaded_file()
if (!is_dir("./upfile")){                               //判断服务器中是否存在指定文件夹
    mkdir("./upfile");                                  //如果不存在则创建文件夹
}
array_push($_FILES["picture"]["name"],"");              //向表单提交的数组中增加一个空元素
$array_up = array_unique($_FILES["picture"]["name"]);   //删除数组中重复的值
array_pop($array_up);                                   //删除数组中最后一个单元
for ($i=0;$i<count($array_up);$i++){                    //根据元素个数执行for循环
    $path = "upfield/".$_FILES["picture"]["name"][$i];  //定义上传文件存储位置
    if (move_uploaded_file($_FILES["picture"]["tmp_name"][$i],$path)){  //执行文件上传操作
        $result = true;
    }else{
        $result = false;
    }
}
if ($result==true){
    echo "文件上传成功";
    echo "<meta http-equiv=\"refresh\"content=\"3;url=index.php\">";
}else{
    echo "文件上传失败";
    echo "<meta http-equiv=\"refresh\"content=\"3;url=index.php\">";
}


//PHP 对象
//对象是存储数据和有关如何处理数据的信息的数据类型。
//在 PHP 中，必须明确地声明对象。
//首先必须声明对象的类。对此，使用 class 关键词。类是包含属性和方法的结构。
//然后在对象类中定义数据类型，然后在该类的实例中使用此数据类型：
//定义类
class Car{
    var  $color;
    function Car($color = "red"){
        $this->color = $color;
    }

    function  CarColor(){
        return $this->color;
    }
}
//调用类
$newCar = new Car("white");
//自定义输出方法
function print_cars($obj){
    foreach (get_object_vars($obj) as $prop => $val){
        echo  "\t &prop = $val \n";
    }
}
//调用输出
print_cars($newCar);

//类2
class person{
    var $age = 10;

    /**设置age的方法
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }
}
//初始化对象
$people = new  person();
//访问对象属性
echo $people->age;
//访问对象的方法
$people->setAge(23);
//调用方法后访问对象属性
echo $people->age;
//判断类别
if ($people instanceof person){
    echo  "是子类";
}


//for循环
//for (条件1,条件2,条件3)





//外部变量
//可以通过$_REQUEST,$_POST,$_GET获取外部变量

//POST:通过URL提交的变量或表单使用POST方法,会以数组形式保存在$_POST变量中
//使用print_r()函数或$_POST["变量名"]的方式单独访问$_POST中的变量值
/*下面的例子显示了一个简单的 HTML 表单，它包含两个输入字段和一个提交按钮：
<form action="welcome.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>
*/
//当用户填写此表单并点击提交按钮后，表单数据会发送到名为 "welcome.php" 的 PHP 文件供处理。表单数据是通过 HTTP POST 方法发送的
//如需显示出被提交的数据，可以简单地输出（echo）所有变量。"welcome.php" 文件是这样的
//输出显示
echo $_POST["name"];
echo $_POST["email"];
/*Html中代码:
Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>
*/
//输出
/*
输出：
Welcome John
Your email address is john.doe@example.com
*/

//GET:通过URL提交的变量或表单使用GET方法,会以数组形式保存在$_GET变量中
//使用print_r()函数或$_GET["变量名"]的方式单独访问$_GET中的变量值
/*表单示例
<form action="welcome_get.php" method="get">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>
*/
//输出显示
echo $_GET["name"];
echo $_GET["email"];
/*Html中代码:
Welcome <?php echo $_GET["name"]; ?><br>
Your email address is: <?php echo $_GET["email"]; ?>
*/






//HTTP文件上传变量:$_FILES
/*Html代码
<html>
<body>

<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>
*/
//留意如下有关此表单的信息：
//<form> 标签的 enctype 属性规定了在提交表单时要使用哪种内容类型。在表单需要二进制数据时，比如文件内容，请使用 "multipart/form-data"。
//<input> 标签的 type="file" 属性规定了应该把输入作为文件来处理。举例来说，当在浏览器中预览时，会看到输入框旁边有一个浏览按钮。
//注释：允许用户上传文件是一个巨大的安全风险。请仅仅允许可信的用户执行文件上传操作。
//要使表单产生文件变量,需要满足三个条件
//Html表单要使用POST方式传值
//表单的"enctyoe"参数需要设置为"multipart/form-data"
//表单中包含一个文件选择框

//创建上传脚本
//"upload_file.php" 文件含有供上传文件的代码
//通过使用 PHP 的全局数组 $_FILES，可以从客户计算机向远程服务器上传文件。

//第一个参数是表单的 input name，第二个下标可以是 "name", "type", "size", "tmp_name" 或 "error"。就像这样：
//$_FILES["file"]["name"] - 被上传文件的名称
//$_FILES["file"]["type"] - 被上传文件的类型
//$_FILES["file"]["size"] - 被上传文件的大小，以字节计
//$_FILES["file"]["tmp_name"] - 存储在服务器的文件的临时副本的名称
//$_FILES["file"]["error"] - 由文件上传导致的错误代码
if ($_FILES["file"]["error"] > 0) {
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
}
else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
}








//PHP $_REQUEST
//PHP $_REQUEST 用于收集 HTML 表单提交的数据。
//下面的例子展示了一个包含输入字段及提交按钮的表单。
//当用户通过点击提交按钮来提交表单数据时, 表单数据将发送到 <form> 标签的 action 属性中指定的脚本文件。
//在这个例子中，指定文件本身来处理表单数据。
//如果需要使用其他的 PHP 文件来处理表单数据，请修改为选择的文件名即可。
//然后，可以使用超级全局变量 $_REQUEST 来收集 input 字段的值：
/*
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Name: <input type="text" name="fname">
<input type="submit">
</form>
*/
$name = $_REQUEST['fname'];
echo $name;








//预定义变量
//是由PHP预设的一组数组,包括运行环境、用户输入数据等。作用范围全局生效,又称为超全局变量或自动全局变量
//$GLOBALS 这种全局变量用于在 PHP 脚本中的任意位置访问全局变量（从函数或方法中均可）。
//PHP 在名为 $GLOBALS[index] 的数组中存储了所有全局变量。变量的名字就是数组的键。
//下面的例子展示了如何使用超级全局变量 $GLOBALS：
$x = 75;
$y = 25;

function addition() {
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}







//服务器变量
//$_SERVER 这种超全局变量保存关于报头、路径和脚本位置的信息。
//下面的例子展示了如何使用 $_SERVER 中的某些元素：
echo $_SERVER['PHP_SELF'];
echo "\n";
echo $_SERVER['SERVER_NAME'];
echo "\n";
echo $_SERVER['HTTP_HOST'];
echo "\n";
echo $_SERVER['HTTP_REFERER'];
echo "\n";
echo $_SERVER['HTTP_USER_AGENT'];
echo "\n";
echo $_SERVER['SCRIPT_NAME'];
//下表列出了能够在 $_SERVER 中访问的最重要的元素：
/*
元素/代码	                                    描述
$_SERVER['PHP_SELF']	                    返回当前执行脚本的文件名。
$_SERVER['GATEWAY_INTERFACE']	            返回服务器使用的 CGI 规范的版本。
$_SERVER['SERVER_ADDR']	                    返回当前运行脚本所在的服务器的 IP 地址。
$_SERVER['SERVER_NAME']	                    返回当前运行脚本所在的服务器的主机名（比如 www.baidu.com.cn）。
$_SERVER['SERVER_SOFTWARE']	                返回服务器标识字符串（比如 Apache/2.2.24）。
$_SERVER['SERVER_PROTOCOL']	                返回请求页面时通信协议的名称和版本（例如，“HTTP/1.0”）。
$_SERVER['REQUEST_METHOD']	                返回访问页面使用的请求方法（例如 POST）。
$_SERVER['REQUEST_TIME']	                返回请求开始时的时间戳（例如 1577687494）。
$_SERVER['QUERY_STRING']                	返回查询字符串，如果是通过查询字符串访问此页面。
$_SERVER['HTTP_ACCEPT']                  	返回来自当前请求的请求头。
$_SERVER['HTTP_ACCEPT_CHARSET']	            返回来自当前请求的 Accept_Charset 头（ 例如 utf-8,ISO-8859-1）
$_SERVER['HTTP_HOST']	                    返回来自当前请求的 Host 头。
$_SERVER['HTTP_REFERER']	                返回当前页面的完整 URL（不可靠，因为不是所有用户代理都支持）。
$_SERVER['HTTPS']	                        是否通过安全 HTTP 协议查询脚本。
$_SERVER['REMOTE_ADDR']	                    返回浏览当前页面的用户的 IP 地址。
$_SERVER['REMOTE_HOST']	                    返回浏览当前页面的用户的主机名。
$_SERVER['REMOTE_PORT']                 	返回用户机器上连接到 Web 服务器所使用的端口号。
$_SERVER['SCRIPT_FILENAME']	                返回当前执行脚本的绝对路径。
$_SERVER['SERVER_ADMIN']                	该值指明了 Apache 服务器配置文件中的 SERVER_ADMIN 参数。
$_SERVER['SERVER_PORT']	Web                 服务器使用的端口。默认值为 “80”。
$_SERVER['SERVER_SIGNATURE']	            返回服务器版本和虚拟主机名。
$_SERVER['PATH_TRANSLATED']	                当前脚本所在文件系统（非文档根目录）的基本路径。
$_SERVER['SCRIPT_NAME']	                    返回当前脚本的路径。
$_SERVER['SCRIPT_URI']	                    返回当前页面的 URI。
*/







//环境变量:$_ENV
//环境变量是预定义的一个数组,记录着系统路径等信息。使用print_r()函数,可以查看具体的环境变量的数组成员
//单独访问环境变量的数组成员,可以通过"$_ENV"["成员变量名"]的方法来实现,如下:
echo  $_ENV["OS"];//输出Windows_NT









//HTTP Cookies变量:$_COOKIE
//使用PHP的COOKIE函数或其他产生的COOKIE值,保存在"$_COOKIE"数组中,print_r()函数,可以当前设置的COOKIE值的情况
//可以通过"$_COOKIE"["变量名"]的方法访问COOKIE值,如下:
//设置一个COOKIE值
setcookie("社团","幻想乡");
//显示设置的COOKIE值
echo  $_COOKIE["社团"];//输出 幻想乡






//Session变量:$_SESSION
//使用PHP的SESSION函数或其他产生的SESSION值,保存在"$_SESSION"数组中,print_r()函数,可以当前设置的SESSION值的情况
//可以通过"$_SESSION"["变量名"]的方法访问SESSION值,如下:
//设置一个SESSION值
session_start();
$address = "幻想乡";
$_SESSION["address"] = $address;
//显示设置的COOKIE值
echo  $_SESSION["address"];//输出 幻想乡






//设置 PHP 常量
//如需设置常量，使用 define() 函数 - 它使用三个参数：
//首个参数定义常量的名称
//第二个参数定义常量的值
//可选的第三个参数规定常量名是否对大小写敏感。默认是 false。

//对大小写敏感的常量
define("GREETING", "Welcome to W3School.com.cn!");
echo GREETING;

//对大小写不敏感的常量
define("GREETINGS", "Welcome to W3School.com.cn!", true);
echo greetings;






//包含运行文件操作:包括include ();require ();include_once ();require_once ();四种语句
//使用include()包含文件
include ("PHPBase.php");
//使用require ()包含文件
require ("PHPBase.php");
//使用include_once ()包含文件
include_once ("PHPBase.php");
//使用require_once ()包含文件
require_once ("PHPBase.php");





//引用
//新建一个变量名,指向一个已经存在的变量称谓引用,实际上就是为变量增加一个别名
//引用的变量发生了改变,则变量本省也会发生变化
//建立引用使用&取址符
$m = 233;
echo $m;//输出233
$n = &$m;//建立引用
echo $n;//输出233
$m++;
echo $m;//输出234
echo $n;//输出234
$n++;
echo $m;//输出235
echo $n;//输出235
//取消引用
unset($n);





//正则

//行定位符:^与$
//^表示行开始$表示行结尾
//^tm匹配tm开头,tm$匹配tm结尾
//匹配任意字符则直接写需要匹配的字符,如tm匹配tm

//单词定界符:\b与\B
//\b表示要查找的字符串为一个完整的单词,\B表示查找的字符串不能是一个完整的单词,是其他单词或子串的一部分
//\btm\b查找"tm",\Btm\B查找字符串包含"t"与"m"

//字符类:[]忽略大小写
//正则表达式区分大小写,若要忽略大小写可使用[],只要匹配字符出现在方括号内,则匹配成功,但一个方括号只能匹配一个字符
//[Tt][mM]
/*POSIX风格的预定义字符类
 * [:digit:]        十进制数字集合,等同于[0-9]
 * [[:alnum:]]      字母与数字的集合,等同于[a-zA-Z0-9]
 * [[:alpha:]]      字母集合,等同于[a-zA-Z]
 * [[:blank:]]      空格和制表符
 * [[:xdigit:]]     十六进制数字
 * [[:punct:]]      特殊字符集合,如!@#$?
 * [[:print:]]      所有可打印的字符(包括空白字符)
 * [[:space:]]      空白字符(空格、换行符、换页符、回车符、水平制表符)
 * [[:graph:]]      所有的可打印的字符(不包括空白字符)
 * [[:upper:]]      所有大写字母[A-Z]
 * [[:lower:]]      所有小写字母[a-z]
 * [[:cntrl:]]      控制字符
 * */


//选择字符:|        可理解为或
//T|tM|m    表达的意思是以字母T或t开头,后面接一个字母M或m
//[]与|的不同在于[]只能匹配单个字符而|可以匹配任意长度的字符
//T|tM|m    等价于   TM|tm|Tm|tM

//连字符:-
//[a,b,c...A,B,C...]等价于[a-zA-Z]    表达的意思是变量的命名规则是只能以字字母或下划线开头

//排除字符:[^]
//[^a-zA-Z]    表达的意思是变量的命名规则是不能以字字母或下划线开头

//限定符:?*+{n,m}
/*限定符的说明与举例
 *  ?       匹配前面的字符0次或1次            colou?r,该表达式可以匹配colour和color
 *  +       匹配前面的字符1次或多次           go+gle,该表达式可以匹配范围从gogle到goo...gle
 *  *       匹配前面的字符0次或多次           go*gle,该表达式可以匹配范围从ggle到goo...gle
 *  {n}     匹配前面的字符n次                go[2]gle,该表达式可以匹配google
 *  {n,}    匹配前面的字符最少n次            go{n,}gle,该表达式可以匹配范围从google到goo...gle
 *  {n,m}   匹配前面的字符最少n次最多m次      employe{0,2},该表达式可以匹配employ,employe和employee
 * */

//点号字符:.
//可以匹配除换行符外的任意一个字符
//^s.t$         表示以s开头t结尾中间包含一个字母的单词
//^r.s.*t$      表示第一个字母为r第三个字母为s最后一个字母为t的字母

//转义字符:\
//将特殊字符转换为普通的字符
//[0-9]{1,3}(\.[0-9]{1,3})){3}      表达式表示为开头0-9的1-3个数与三次"."+开头0-9的1-3个数 如192.168.22.2

//反斜线:\
//可以将不可打印的字符显示出来
/*反斜线可显示的不可打印的字符
 * \a   警报,即ASCII中的<BEL>字符
 * \b   退格,即ASCII中的<BS>字符
 * \e   Escape,即ASCII中的<ESC>字符
 * \f   换页符,即ASCII中的<FF>字符
 * \n   换行符,即ASCII中的<LF>字符
 * \r   回车符,即ASCII中的<CR>字符
 * \t   水平制表符,即ASCII中的<HT>字符
 * \xhh 十六进制代码
 * \ddd 八进制代码
 * \cx  即control-x的缩写,匹配由x指明的控制字符,x为任意字符
 * */

/*反斜线可指定的预定义字符集
 * \d       任意一个十进制数字,相当于[0-9]
 * \D       任意一个非十进制数字
 * \s       任意一个空白字符(空格,换行符,换页符,回车符,水平制表符),相当于[\f\n\r\t]
 * \S       任意一个非空白字符
 * \w       任意一个单词字符,相当于[a-zA-Z0-9]
 * \W       任意一个非单词字符
 * */

/*反斜线定义断言的限定符
 * \b   单词定界符,用来匹配字符串中的某些位置
 * \B   费单词定界符序列
 * \A   总是能够匹配待搜索文本的起始位置
 * \Z   表示在未指定任何模式下匹配的字符,通常是字符串的首位位置或者是在字符串末尾的换行符之前的位置
 * \z   只匹配字符串的末尾,而不考虑任何换行符
 * \G   当前匹配的起始位置
 * */

//括号字符:()
//括号字符的第一个作用是改变限定符的作用范围

//反向作用
//依靠子表达式的记忆功能匹配连续出现的字符串或字母
//如匹配连续两个it,首先将it作为分组,然后在后面加上"\1"即可
//(it)\1
//若匹配的字串不固定,那么就将括号内字串写成一个正则表达式,若使用了多个分组,可使用"\1","\2"(顺序是从左至右)来表示
//([a-z])([A-Z])\1\2
//除了可以使用数字来表示分组外,还可以自己来指定分组名称,语法格式如下:
//(?P<subname>)
//若想要反向引用该数组,使用以下语法
//(?P=subname)
//重写([a-z])([A-Z])\1\2,为这两个分组命名,并反向引用它们
//(?P<fir>[a-z])(?P<sec>[A-Z])(?P=fir)(?P=sec)

//模式修饰符
//作用是设定模式,也就是规定正则表达式该如何解释和应用,不同的语言都有自己的模式设置
/*PHP中的主要模式修饰符
 * i    (?i)...(?-i)、(?i...)    忽略大小写模式
 * m    (?m)...(?-m)、(?m...)    多文本模式,即字串内部有多个换行符时,影响"^"和"$"匹配
 * s    (?s)...(?-s)、(?s...)    单位本迷失,此模式下元字符点号"."可以匹配换行符,其他模式不能匹配换行符
 * x    (?x)...(?-x)、(?x...)    忽略空白字符
 * */





//POSIX扩展正则表达式函数

//验证变量是否合法
//ereg()区分大小写和eregi()不区分大小写
//ereg(pattern,string[,regs])
//字符串str匹配表达式pattern,成功返回true失败返回false,若有第三个参数数组regs,则将成功匹配的字串按子串(子表达式)划分,并存储到regs数组中
$eregStr = '^[$][[:alpha:]_][[:alnum:]]';//要匹配的字串
ereg($eregStr,'$_name',$register);//使用ereg()函数匹配变量名
var_dump($register);//显示数据结构

//匹配替换
//ereg_replace()和eregi_replace()
//ereg_replace(pattern,replacement,string)
//在字符串string中匹配表达式pattern,匹配成功则使用replacement来替换字符串,并返回替换后的string。若未在string中找到匹配项,则string原样返回
$eregReplaceStr = 'tm';//要匹配的字串
$replaceStr = 'hello,tm,Tm,TM';//要查找的文本
$rep_str = ereg_replace($eregReplaceStr,'TM',$replaceStr);//ereg_replace替换
echo $rep_str;//hello,TM,Tm,TM
$repi_str = eregi_replace($eregReplaceStr,'TM',$replaceStr);//eregi_replace替换
echo $repi_str;//hello,TM,TM,TM


//split()和spliti()
//语法array split(string pattern,string string[,int limit])
//使用pattern来分割字符串string,若有参数limit,则最多有limit个元素,剩余部分都写到最后一个数组元素中。若函数错误,则返回flase
$eregReplaceStr = 'tm';//要匹配的字串
$replaceStr = 'hello,tm,Tm,TM';//要查找的文本
$spl_arr = split($eregReplaceStr,'TM',$replaceStr);//使用split拆分
var_dump($spl_arr);




//PCRE兼容正则表达式函数

//preg_grep()
//array preg_grep(string pattern,array input)
//使用数组input中的元素一一匹配表达式pattem,最后返回由所有相匹配的元素所组成的数组
$preg = '^d{3,4}-?\d{7,8}/';        //国内电话格式表达式
$phoneArr = array("12345678","9876543","56778989");
$preg_arr = preg_grep($preg,$phoneArr);//使用preg_grep查找匹配元素
var_dump($preg_arr);

//preg_match()和preg_match_all()
//int preg_grep(string pattern,string subject[,array matches])
//在字符串subject中匹配表达式partterm,函数返回匹配的次数,如果有数组matches,那么每次匹配结果存储到matches数组中
//返回值为0或1
$matchStr= "This is an example";
$match_preg = '^b\w{2}\b/';
$num1 = preg_match($preg,$matchStr,$str1);
echo $num1."\n";
var_dump($str1);
$num2 = preg_match_all($preg,$matchStr,$str2);
echo $num2."\n";
var_dump($str2);

//preg_quote()
//自动转义
//preg_quote(str[,delimiter])
//若有参数字符delimiter,则此参数也将被转义,函数返回转义后的字串
$matchOneStr = "@#$%^asdfghjk&";
$matchTwoStr = "a";
$matchOneStr = preg_quote($matchOneStr,$matchTwoStr);
echo $matchOneStr;


//preg_replace()
//preg_replace(pattern,replacement,subject[,limit])
//函数功能:该函数在字符串subject中匹配表达式pattern,并且将匹配项替换成字串replacement,若有参数limit则替换limit次
$repStr = "[b]粗体字[/b]";
$b_rst = preg_replace('^[\b](.*)\[\/b\]/i','<b>$1</b>',$repStr);
echo $b_rst;//粗体字


//preg_replace_callback()
//preg_replace_callback(pattern,callback,subject[limit])
//preg_replace_callback与preg_replace功能相同,都用于查找和替换字符串,不同的是preg_replace_callback使用callback回调函数来代替replacement参数
function c_back($str){
    $str = "<font color=$str[1]>$str[2]</font>";
    return $str;
}
$stringReplace = '[color=blue]字体颜色[/color]';
echo  preg_replace_callback('^color=(.*)\[\/color\]/U',"c_back",$stringReplace);


//preg_split()
//preg_split(patten,subject[,limit])
//使用表达式pattern来分割字符串subject,若有参数limit,则数组最多有limit个元素
//用法与split()函数方法相同











?>



