<?php


//PHP类的定义
class People{

}


//成员方法
class Man{
    function info($name,$height,$weight,$age){  //声明成员方法
        echo '姓名:'.$name.'\n';          //输出姓名
        echo '身高:'.$height.'\n';          //输出身高
        echo '年龄:'.$age.'\n';          //输出年龄
        echo '体重:'.$weight.'\n';          //输出体重
    }

    function canSwim($height,$weight,$age){
        if ($height>120 && $weight<200 && $weight>100 && $age>10 && $age<60){   //判断是否适合游泳
            return '适合游泳';
        }else{
            return '不适合游泳';
        }
    }
}



//类的实例化
$men = new Man();
$men->info('BBA','168','100','17');     //调用信息输出方法,无返回值
echo $men->canSwim('180','120','18');   //调用判断是否适合游泳方法,有返回值




//成员变量&类常量
class Boys{
    public $name;               //成员变量
    public $height;
    public $weight;
    const BOY_SEX = '0';        //类常量

    public function info($name,$height,$weight){  //声明成员方法
        $this->name = $name;                                //赋值给类属性
        $this->height = $height;
        $this->weight = $weight;
        if ($height>120 && $weight<200){
            return $this->name."适合游泳";
        }else{
            return $this->name."不适合游泳";
        }
    }
}
//$this->是调用本类中的成员变量或成员方法
//const 字母大写   是类中的常量,静态方法和静态参数调用使用"::"
$boy = new Boys();
echo $boy->info('BYZ','168','98');
echo Boys::BOY_SEX;         //调用类常量(调用类方法类似)




//构造方法和折构方法
class Girls{
    public $name;               //成员变量
    public $height;
    public $weight;
    const BOY_SEX = '1';        //类常量

    public function __construct($name,$height,$weight){  //定义构造方法,初始化对象
        $this->name = $name;                                //赋值给类属性
        $this->height = $height;
        $this->weight = $weight;
    }

    public function __destruct(){
        echo '对象被销毁';// 定义折构方法,用于对象销毁,释放内存
    }

    public function info($name,$height,$weight){  //声明成员方法
        $this->name = $name;                                //赋值给类属性
        $this->height = $height;
        $this->weight = $weight;
        if ($height>120 && $weight<200){
            return $this->name."适合游泳";
        }else{
            return $this->name."不适合游泳";
        }
    }
}

//PHP中构造方法是在生成对象时自动调用的成员方法,作用是初始化对象,使用__construct()函数自定义
$girl = new Girls('BYZ','168','98');    //定义构造方法后,类对象创建时可直接赋值
//若未定义构造方法,自动默认生成一个构造方法,但是没有任何参数和操作
unset($girl);       //销毁对象
//折构方法,用于对象销毁,释放内存,在销毁时调用折构方法,一般不手动创建,使用__destruct()函数自定义





//继承与多态

//创建Boy类继承Man类,并重写父类info()方法
class Boy extends Man{
    public $name;               //成员变量
    public $height;
    public $weight;
    public $sex;
    const BOY_SEX = '1';        //类常量

    function info($name,$height,$weight,$age,$sex){  //声明成员方法
        if ($this->name == ''){                           //已有参数,修改属性
            $this->changeInfo($name,$height,$weight,$sex);
        }else{                                      //无参数,构造
            $this->__construct($name,$height,$weight,$age,$sex);
        }
    }

    public function __construct($name,$height,$weight,$age,$sex){
        $this->name = $name;                                //赋值给类属性
        $this->height = $height;
        $this->weight = $weight;
        $this->sex = $sex;
    }

    public function changeInfo($name,$height,$weight,$sex){
        $this->name = $name;                                //修改信息
        $this->height = $height;
        $this->weight = $weight;
        $this->sex = $sex;
    }

}



//::与$this->
//$this->为对象方法调用或输出

//::为类方法调用或类常量输出
/*
通用格式:   关键词::变量名/常量名/方法名
关键字分以下3种情况
parent::变量名/常量名/方法名             可以调用父类中的成员变量、成员方法和常量
self::变量名/常量名/方法名               可以调用当前类中的静态成员和常量
类名::变量名/常量名/方法名                可以调用本类的变量、常量和方法
*/
//静态变量(方法)
/*
静态变量(方法)格式为:关键字::静态成员
关键字可以是:
self
静态成员所在的类名
*/
class Book{
    const NAME = 'Computer';
    function __construct(){
        echo '书名:'.Book::NAME;
    }
}
//继承Book类
class BestBook extends Book{
    const NAME = 'PHPBook';
    static $num = 0;

    function __construct(){
        parent::__construct();//调用父类的构造方法,因为__construct为类方法且parent关键字,所以使用::
        echo '书名:'.self::NAME;//当前类静态常量输出,"PHPBook"

        self::$num++;   //静态变量加1
    }

    final static public function showInfo(){ //因为final关键字,所以类中showInfo方法不可被重写
                                            //因为static关键词,所以是静态方法
        echo BestBook::NAME.'sell'.self::$num;
    }
}




//public、private和protected
//public为公共成员,任何位置都可调用
//private为私有成员,只有本类可调用,子类也不可调用
//protected为保护成员,只有本类和子类可以调用




//对象的高级应用
//final关键字
//若类或方法添加final关键字,则说明是最终版本,不能再被继承或修改,也不能有子类
final class MyBook extends BestBook{

}
//MyBook类不可被继承
//BestBook类中showInfo方法不可修改





//抽象类
//抽象类是唯一不可实例化的类,只能作为其他类发父类使用
//抽象类不实现具体方法,只声明方法名,在子类具体实现
abstract class ClassName{       //定义抽象类
    abstract function functionName();       //定义抽象类方法
}





//接口使用实现多继承
//使用interface关键字声明,并且类中只能包含未实现的方法和一些成员变量
//格式:
interface interfaceName{
    function interfaceName1();
    function interfaceName2();
}
//不要使用public以外的关键字修饰接口中的类成员,对于方法,不写关键字也可以,是由接口类自身的属性决定的
//子类通过implements关键字实现接口,若要实现多个接口,每个接口间使用逗号","隔开,而且接口类所有未实现的方法都需要在子类中实现
//格式:
class SubClass implements interfaceName{
    function interfaceName1(){
        //功能实现
    }
    function interfaceName2(){

    }
}

//实例:声明两个接口,MPopedom和MPurview;接着声明两个类,Member和Manger,Member继承MPopedom接口,Manger继承MPopedom,MPurview接口
//接口MPopedom声明
interface MPopedom{
    function popedom();
}
//接口MPurview声明
interface MPurview{
    function purview();
}
//创建子类Member,实现一个接口MPopedom
class Member implements MPopedom{
    function popedom(){

    }
}
//创建子类Manger,实现一个接口MPopedom
class Manger implements MPopedom,MPurview{
    function popedom(){

    }
    function purview(){

    }
}
//可以看到,抽象类和接口实现功能相似,抽象类可以实现公共的方法,接口则可以实现多继承



//引用与克隆
//克隆对象使用clone关键字,克隆对象但是不引用
$book1 = new Book();//创建一个对象book1
$book2 = $book1;    //引用book1,在book2修改时book1也修改,与$book2 = &$book1;相等
$book2 = &$book1;   //引用book1,在book2修改时book1也修改
$book2 = clone $book1;//book2与book1内容相等,但在book2修改时book1不修改

//__clone方法:在对象克隆的过程中,调用__clone()方法,可以使克隆出来的对象保持一些方法和属性
class BookCopy{
    public $name;

    public function __clone(){
        $this->name = 'MySQLBook';
    }
}



//对象比较,==比较内容,===比较引用
if ($book1 == $book2){
    echo '对象内容相等';
}

if ($book1 === $book2){
    echo '对象引用相等,是一个对象,仅是不同别名';
}





//对象类型检测
//instanceof操作符可以检测当前对象是属于哪个类(包括父类)
//格式:对象 instanceof 类名
if ($book1 instanceof Book){
    echo '$book1属于Book类';
}




//魔术方法(__)
//PHP中有较多以两个下划线为开头的方法,如__construct()等,被称为魔术方法
//PHP魔术方法只能使用,不能自己创建,如果需要使用,必须在类中定义,否则不会执行
//1.__set()和__get()
//__set()当写入一个不存在或不可见的成员变量时会执行,包含两个参数,分别表示变量名称和变量值
//__get()当调用一个未定义或不可见的成员变量时通过__get()读取变量值,包含两个参数,分别表示变量名称和变量值
//实例:申明一个类Dogs,创建私有变量type和魔术方法__set()和__get(),再对未申明的变量name进行调用
class Dogs{
    private $type = '';

    private function __get($name){
        if (isset($this->$name)){
            echo '变量name变为'.$this->$name;
        }else{
            echo '变量name未定义,初始化';
            $this->$name = '0';
        }
    }

    private function __set($name,$value){
        if (isset($this->$name)){
            $this->$name = $value;
            echo '变量name赋值为'.$this->$name;
        }else{
            $this->$name = $value;
            echo '变量name赋值,初始化为'.$value;
        }
    }
}

$dog = new Dogs();
$dog->type = 'DIY';
$dog->type;
$dog->name;
/*
输出结果:
变量name赋值为DIY
变量name变为DIY
变量name未定义,初始化
变量name赋值,初始化为0
*/


//2.__call()方法,当程序调用不存在或不可见的成员方法时,会先调用__call()方法来存储方法名和其他参数
//              有两个参数即方法名和方法参数,方法参数是数组格式
class Cats{
    public function show(){
        echo 'Cat';
    }

    public function __call($name, $arguments){
        echo '方法名不存在';
    }
}
$cat = new Cats();
$cat->show();       //调用方法
$cat->showName('1','233');      //调用不存在方法,执行__call方法



//3.__sleep()和__wakeup()方法
//使用serialize()可以实现序列化对象,在使用serialize()函数时,若对象包含__sleep()方法会先执行__sleep()方法
//__sleep()方法可以清除对象并返回一个包含该对象中所有变量的数组,所以__sleep()的目的是关闭对象可能具有的类似数据库连接等后续操作
//unserialize()函数可以还原一个被serialize()序列化的对象,__wakeup()方法恢复在序列化中可能丢失的数据库连接及相关工作
class Monkey{
    public function __sleep(){
        echo '序列化时操作';
        return $this;
    }
    public function __wakeup(){
        echo '反序列化时操作';
    }
}
$monkey = new Monkey();
$monkeyData = serialize($monkey);           //序列化对象
echo '序列化数据:'.$monkeyData;              //输出序列化数据
$monkeyBack = unserialize($monkeyData);     //反序列化



//4.__toString()
//当使用echo或print输出对象时,将对象转化为字符串
//若没有__toString()方法,直接输出对象会导致错误;输出对象时,使用echo或print后面直接跟要输出的对象,中间不要加多余字符
class Fishs{
    public $type = 'fish';

    public function __toString(){
        return $this->type;
    }
}




//5.__autoload()
//__autoload()可以自动实例化需要使用的类,当程序需要用到一个类,但是还没被实例化,将调用__autoload方法在指定路径下查找与该类同名的文件,找到则继续执行,否则报错
//实例:先创建一个类文件Sport.class.php,在需要使用的文件中创建__autoload()方法,实现手动查找,若查找成功,则动态引入文件
function __autoload($class_name){               //创建__autoload()方法
    $class_path = $class_name.'class.php';      //类文件路径
    if (file_exists($class_path)){              //判断类文件是否存在
        include_once ($class_path);         //动态引入类文件
    }else{
        echo '类路径错误';
    }
}
$sport = new Sport('Ball','168','100','17','1');        //实例化对象
echo $sport;            //输出对象,Sport中需要写入__toString()方法








//中文截取类
//英文字符串使用substr()截取,但是中文是由两个字节组成,若使用substr()函数,可能出现乱码,所以当截取的字符数为奇数时,可能将汉字拆分,出现乱码
//实例:自定义类,解决中文乱码
class MsubStr{
    function csubstr($str,$start,$len){     //$str为指定字符串,$start为开始截取位置,$len为长度
        $strLen = $start + $len;
        $tmpstr = '';
        for ($i = 0;$i<$strLen;$i++){
            if (ord(substr($str,$i,1)) > 0xa0){ //若字符串首字符ASCll值大于0xa0,表示为汉字
                $tmpstr.=substr($str,$i,2);     //取出前2个字符(一个汉字)给变量$tmpstr
                $i++;                           //变量自加1
            }else{
                $tmpstr.=substr($str,$i,1);
            }
        }
        return $tmpstr;
    }



}







?>