<?php

//****************************************PHP 日期和时间
//PHP date() 函数用于对日期或时间进行格式化

//****************************************PHP Date() 函数
//PHP Date() 函数把时间戳格式化为更易读的日期和时间
/*
参数	        描述
format	    必需。规定时间戳的格式。
timestamp	可选。规定时间戳。默认是当前时间和日期。
*/
//注释：时间戳是一种字符序列，它表示具体事件发生的日期和事件。
//语法
date(format,timestamp)


//获得简单的日期
//date() 函数的格式参数是必需的，它们规定如何格式化日期或时间。
//下面列出了一些常用于日期的字符：
//d - 表示月里的某天（01-31）
//m - 表示月（01-12）
//Y - 表示年（四位数）
//1 - 表示周里的某天
//其他字符，比如 "/", "." 或 "-" 也可被插入字符中，以增加其他格式。
//下面的例子用三种不同方法格式今天的日期：
echo "今天是 " . date("Y/m/d") . "\n";
echo "今天是 " . date("Y.m.d") . "\n";
echo "今天是 " . date("Y-m-d") . "\n";
echo "今天是 " . date("l");

//获得简单的时间
//下面是常用于时间的字符：
//h - 带有首位零的 12 小时小时格式
//i - 带有首位零的分钟
//s - 带有首位零的秒（00 -59）
//a - 小写的午前和午后（am 或 pm）
//下面的例子以指定的格式输出当前时间
echo "现在时间是 " . date("h:i:sa")."\n";
//注释：请注意 PHP date() 函数会返回服务器的当前日期/时间！

//除此外还有
//T - 本机所在时区    等数值

//date()预定义常量
/*
DATE_ATOM           Y-m-d\TH:i:sP           原子钟格式
DATE_COOKIE         l, d-M-y H:i:s T        HTTP Cookies格式
DATE_ISO8601        Y-m-d\TH:i:sO           ISO-8601格式
DATE_RFC822         D, d M y H:i:s O        RFC822格式
DATE_RFC850         l, d-M-y H:i:s T        RFC850格式
DATE_RSS            D, d M Y H:i:s O        RSS格式
DATE_W3C            Y-m-d\TH:i:sP           World Wide Web Consortium格式
*/
echo "DATE_ATOM = ".date(DATE_ATOM);//输出原子钟格式的日期



//通过time()获取当前时间戳
echo "当前时间是:".time();//输出当前时间戳
//获取下周时间戳
$nextWeek = time() + (7*24*60*60);
echo "当前时间:".date('Y-m-d')."\n下周时间是:".date('Y-m-d',$nextWeek);





//设置时区
//如果从代码返回的不是正确的时间，有可能是因为服务器位于其他国家或者被设置为不同时区。
//因此，如果需要基于具体位置的准确时间，可以设置要用的时区。
//下面的例子把时区设置为 "Asia/Shanghai"，然后以指定格式输出当前时间：
date_default_timezone_set("Asia/Shanghai");
echo "当前时间是 " . date("h:i:sa");

//时区本地测试修改(不常用):或者修改php.ini文件中设置,在[date]下的";date.timezone ="选项,将其修改为"date.timezone =Asia/Hong_Kong",然后重启Apache服务器





//通过 PHP mktime() 创建日期
//date() 函数中可选的时间戳参数规定时间戳。如果未规定时间戳，将使用当前日期和时间（正如上例中那样）。
//mktime() 函数返回日期的 Unix 时间戳。Unix 时间戳包含 Unix 纪元（1970 年 1 月 1 日 00:00:00 GMT）与指定时间之间的秒数。内里无参数则与time()相同获取当前时间戳
//语法
mktime(hour,minute,second,month,day,year)

下面的例子使用 mktime() 函数中的一系列参数来创建日期和时间
$d=mktime(9, 12, 31, 6, 10, 2015);
echo "创建日期是 " . date("Y-m-d h:i:sa", $d);

echo "当前时间是:".mktime();//输出当前时间戳
echo "当前时间是:".date("Y-m-d h:i:sa",mktime());//输出当前时间
echo "当前时间是:".date("Y-m-d h:i:sa");//输出当前时间





//通过 PHP strtotime() 用字符串来创建日期
//PHP strtotime() 函数用于把人类可读的字符串转换为 Unix 时间
//语法
int strtotime(time[,now])
//若time为绝对时间,则now不起作用;若time为相对时间,其对应的时间就是参数now来提供;若未提供now,对应时间就是当前时间;解析失败返回false


//下面的例子通过 strtotime() 函数创建日期和时间：
$d=strtotime("10:38pm April 15 2015");
echo "创建日期是 " . date("Y-m-d h:i:sa", $d);


//PHP 在将字符串转换为日期这方面非常聪明，所以能够使用各种值
$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "\n";

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "\n";

$d=strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "\n";
//不过，strtotime() 并不完美，所以记得检查放入其中的字符串


//****************************************更多日期实例
//下例输出下周六的日期：
$startdate = strtotime("Saturday");
$enddate = strtotime("+6 weeks",$startdate);

while ($startdate < $enddate) {
    echo date("M d", $startdate),"\n";
    $startdate = strtotime("+1 week", $startdate);
}


//输出七月四日之前的天数
$d1=strtotime("December 31");
$d2=ceil(($d1-time())/60/60/24);
echo "距离十二月三十一日还有：" . $d2 ." 天。";

//输出上周一
echo strtotime("last Monday");


//获取日期信息
//语法array getdate(timestamp)
//以数组形式返回日期和时间信息,若无参数timestamp则以当前时间为准,返回关联数组说明如下
/*
seconds         秒,0~59
minutes         分钟,0~59
hours           小时,0~23
mday            月份中的第几天,1~31
wday            星期中的第几天,0(周日)~6(周六)
mon             月份,1~12
year            年份,4位数,如2017
yday            一年中的第几天,0~365
weekday         周几,Sunday~Staturday
month           月份,January~December
0               到当前时间的秒数
*/

$dateArr = getdate();
echo "今天是本月第".$dateArr["mday"]."天";//输出今天是本月第几天


//检验日期有效性
//语法:bool checkdate(month,day,year);
$year = 2016;
$month = 2;
$day1 = 29;
$day2 = 30;//2016年2月无30日

var_dump(checkdate($month,$day1,$year));//查看2016-2-29时间是否正确
var_dump(checkdate($month,$day2,$year));//查看2016-2-30时间是否正确




//显示本地化的日期和时间
//string setlocale(category[,string locale])
/*
category选项
LC_ALL          包含以下所有设置本地化规则
LC_COLLATE      字符串比较
LC_CTYPE        字符串分类和转换,如大小写
LC_MONETARY     本地化环境的货币形式
LC_NUMERIC      本地化环境的数值形式
LC_TIME         本地化环境的时间形式
*/
//locale参数为空则会使用系统环境变量的locale或lang值,否则使用locale参数指定的本地化环境。如en_US为美国本地化环境,chs为简体中文,cht为繁体中文


//strftime()函数,根据本地化环境设置来格式化输出日期和时间
//string strftime(format,timestamp)
//timestamp未给则使用本地时间,参数format识别转换标记如下
/*
%a  星期的简写
%A  星期的全称
%b  月份的简写
%B  月份的全称
...
*/
setlocale(LC_ALL,"en_US");
echo "美国周几:".strftime("%A");
setlocale(LC_ALL,"chs");
echo "简体中文周几:".strftime("%A");
setlocale(LC_ALL,"cht");
echo "繁体中文周几:".strftime("%A");





//时间的实际应用

//比较两个时间的大小
$time1 = date("Y-m-d H:i:s");//获取当前时间
$time2 = "2017-06-06";//设置一个时间
if (strftime($time1)<strftime($time2)){//比较两个时间
    echo $time1."早于".$time2;
}else{
    echo $time1."晚于".$time2;
}



//实现倒计时功能
$subTime = ceil(($time2 - $time1)/3600);//time2固定时间-当前时间,获得小时数
if ($subTime>=0){
    echo "离放假还有".$subTime."小时";
}else{
    echo "已放假";
}




//计算页面脚本运行时间
//string microtime(void)        获取当前时间戳及微秒数,返回格式为msec sec的字符串,msec为微秒数,sec为当前UNIX时间戳
function run_time(){
    list($msec,$sec) = explode(" ",microtime());     //使用explode返回两个变量
    return ((float)$msec + (float)$sec);            //返回两个变量的和
}

$start_time = run_time();//首次运行run_time()函数

//PHP代码

$end_time = run_time();//再次运行run_time()函数

echo ($end_time - $start_time);//输出运行时间的差值


//explode()函数   可见PHPBase.php中数组
//array explode(separator,string[,limit])
//作用是将字符串string按照指定字符separator切开,若separator为空""则返回false

//list()函数
//void list(mixed,...)
//作用是将数组中的值赋值给一些变量mixed

?>