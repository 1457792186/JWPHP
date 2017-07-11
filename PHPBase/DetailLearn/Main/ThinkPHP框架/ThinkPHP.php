<?php


//下载地址:http://thinkphp.cn
//GitHub： https://github.com/top-think/think.git
//说明:https://www.kancloud.cn/thinkphp/thinkphp5_quickstart/145249
/*
首先克隆下载应用项目仓库

git clone https://github.com/top-think/think tp5
然后切换到tp5目录(用户-用户名-tp5)下面，再克隆核心框架仓库：
git clone https://github.com/top-think/framework thinkphp
两个仓库克隆完成后，就完成了ThinkPHP5.0的Git方式下载，如果需要更新核心框架的时候，只需要切换到thinkphp核心目录下面，然后执行：
git pull https://github.com/top-think/framework
如果不熟悉git命令行，可以使用任何一个GIT客户端进行操作，在此不再详细说明。
无论你采用什么方式获取的ThinkPHP框架，现在只需要做最后一步来验证是否正常运行。
在浏览器中输入地址：

http://localhost/tp5/public/


Apache配置PHP
在使用之前还需要去吧httpd.conf文件中的#LoadModule php5_module libexec/apache2/libphp5.so
如果抛出以下异常

Fatal error: Uncaught exception 'think\exception\ErrorException' with message 'mkdir(): Permission denied' in /usr/local/apache2/htdocs/tp5/thinkphp/library/think/log/driver/File.php:44 Stack trace: #0 [internal function]: think\Error::appError(2, 'mkdir(): Permis...', '/usr/local/apac...', 44, Array) #1 /usr/local/apache2/htdocs/tp5/thinkphp/library/think/log/driver/File.php(44): mkdir('/usr/local/apac...', 493, true) #2 /usr/local/apache2/htdocs/tp5/thinkphp/library/think/Log.php(135): think\log\driver\File->save(Array) #3 /usr/local/apache2/htdocs/tp5/thinkphp/library/think/Error.php(84): think\Log::save() #4 [internal function]: think\Error::appShutdown() #5 {main} thrown in /usr/local/apache2/htdocs/tp5/thinkphp/library/think/log/driver/File.php on line 44
这里是当前项目的目录并没有权限去mkdir，所以通过终端找到根目录，即TestPorject目录
输入:
sudo chmod -R 777 路径
*/

//CURD
//是数据库操作的缩写词,C代表创建(Create)、U代表更新(Update)、R代表(Read)、D代表删除(Delete)。
//在具体应用中并非一定要使用create、update、read和delete,功能是一致的,如ThinkPHP就是使用add()、save()、select()和delete()



//————————————————————————————ThinkPHP架构————————————————————————————

//1.ThinkPHP的目录结构
/*
                系统目录
目录名称                     作用
Common                      包含框架的一些公共文件、系统定义和管理配置等
Lang                        目录语言文件夹,目前支持简体中文、繁体中文、英文
Lib                         系统的基类库目录
Tpl                         系统的模板目录
Mode                        框架模式扩展目录
Vendor                      第三方类库目录


                项目目录
目录名称                      作用
index.php                    项目入口文件
Common                       项目公共目录,放置项目公共函数
Lang                         项目语言包目录(可选)
Conf                         项目配置目录,放置配置文件
Lib                          项目基目录,通常包括Action和Model目录
Tpl                          项目模板目录
Runtime                      项目运行时目录,包括Cache、Temp、Data和Log
*/



//2.自动生成项目目录
//实例:创建名称为1的项目,自动生成项目目录,操作如下:
//(1)在网站根目录下创建文件夹,并命名为1
//(2)将ThinkPHP核心类库存储于1目录下
//(3)编写入口文件index.php,将其存储在1目录下。index.php文件代码如下:
define('THINK_PATH','ThinkPHP');            //定义ThinkPHP框架路径(相对于入口文件)
define('APP_NAME','1');                     //定义项目名称
define('APP_PATH','.');                     //定义项目路径
require(THINK_PATH."/ThinkPHP.php");        //加载框架入口文件
APP::run();                                 //实例化一个网站应用实例
//在运行此文件之前,需要查看1项目的文件夹架构。在浏览器中运行项目,成功后会看到项目根目录下自动生成项目目录



//————————————————————————————ThinkPHP项目构建流程————————————————————————————
/*
5.0版本采用模块化的设计架构，默认的应用目录下面只有一个index模块目录，如果我要添加新的模块可以使用控制台命令来生成。
切换到命令行模式下，进入到应用根目录并执行如下指令：

php think build --module demo
就会生成一个默认的demo模块，包括如下目录结构：

├─demo
│  ├─controller      控制器目录
│  ├─model           模型目录
│  ├─view            视图目录
│  ├─config.php      模块配置文件
│  └─common.php      模块公共文件
*/
//1.项目构建流程
//实例:创建一个名称为2的项目,读取db_study数据库中的数据
define('THINK_PATH','../ThinkPHP/');            //定义ThinkPHP框架路径
define('APP_NAME','2');                     //定义项目名称
define('APP_PATH','.');                     //定义项目路径
require(THINK_PATH."/ThinkPHP.php");        //加载框架入口文件
APP::run();                                 //实例化一个网站应用实例



//2.在运行完后,自动生成的项目目录中已经创建了一个空的项目配置文件,位于项目的Conf目录下面,名称是config.php。
//          重新编辑此文件,完成数据库的配置。config.php文件的代码如下:
return array(
    'APP_DEBUG'=>true,                      //开启调试模式
    'DB_TYPE'=>'mysql',                     //数据库类型
    'DB_HOST'=>'localhost',                 //数据库服务器地址
    'DB_NAME'=>'demo',                      //数据库名称
    'DB_USER'=>'root',                      //数据库用户名
    'DB_PWD'=>'111',                        //数据库密码
    'DB_PORT'=>'3306',                      //数据库端口
    'DB_PREFIX'=>'think_',                  //数据表前缀
)


//3.在项目的Lib\Action目录下,定位到自动生成的IndexAction.class.php文件,这是ThinkPHP的控制器,即Index模块
//      重新编辑控制器的index()方法,查询指定数据表中的数据并且完成数据的循环输出
class indexAction extends Action{
    public function index(){
        $db = new Model('user');                //实例化模型类,参数数据表名称,不包含前缀
        $select = $db->select();                //查询数据
        $this->assign('select',$select);        //模板变量赋值
        $this->display();                       //输出模板
    }
}


//4.在项目的Tpl\defult目录下,创建Index目录,存储Index模板的模板文件index.html。完成数据库中数据的循环输出
<volist name='select' id='user'>
    ID:{$user.id}<br/>
    地址:{$user.address}<hr>
</volist>


//5.在浏览器中输入文件地址





//————————————————————————————ThinkPHP配置————————————————————————————

//1.配置格式:ThinkPHP框架中所有配置文件的定义格式均采用返回PHP数组的格式
//如:
return array(
    'APP_DEBUG'=>true,                      //开启调试模式
    'DB_TYPE'=>'mysql',                     //数据库类型
    'DB_HOST'=>'localhost',                 //数据库服务器地址
    'DB_NAME'=>'demo',                      //数据库名称
    'DB_USER'=>'root',                      //数据库用户名
    'DB_PWD'=>'111',                        //数据库密码
    'DB_PORT'=>'3306',                      //数据库端口
    'DB_PREFIX'=>'think_',                  //数据表前缀
)
//说明:配置参数不区分大小写,但是习惯上保持大写原则。可以使用二维数组来配置更多信息,但是最多支持二维数组的配置级别


//2.调试配置
//默认调试配置文件位于Think\Common\debug.php
//调试配置文件位于项目配置目录下面,文件名是debug.php,系统默认调试文件中设置如下内容:
/*
开启日志记录
关闭模板缓存
记录SQL日志
关闭字段缓存
开启运行时间详细显示(包括内存、缓存情况)
开启页面Trace信息显示
严格检查文件大小写
*/






//————————————————————————————ThinkPHP的控制器————————————————————————————




































?>

