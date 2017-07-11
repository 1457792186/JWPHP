<?php

//PDO是数据库对象的简称,有了PDO就不必使用mysqli_*函数,也不必再将它们封装到数据库操作类,
//      只需要使用PDO接口中的方法就可以对不同的数据库进行操作
//      在选择不同的数据库时,只需修改PDO的DSN(数据源名称)即可
//在PHP6中默认使用PDO连接数据库,所有非PDO扩展将在PHP6中被移除
//      该扩展提供PHP内置类PDO来对数据库进行访问,不同的数据库使用相同的方法名,从而解决数据库连接不统一的问题


//1.安装PDO
//PDO默认包含在PHP5.1安装文件中,无法再PHP5.0之前的版本中使用
//默认情况下,PDO在PHP5.2为开启状态,但是要启用对某个数据库驱动程序的支持,仍需要相应配置

//Linux下使用MySQL,可以在configure命令添加如下选项
//–with-pdo-mysql=/path/to/mysql/installation
//–enable-pdo –with-pdo-sqlite –with-pdo-mysql=/usr/local/mysql/bin/mysql_config

//Windows:修改php.ini配置文件,使它支持pdo.（
//把extension=php_pdo.dll前面的分号去掉，分毫是php配置文件注释符号,这个扩展是必须的。
//往下还有
//;extension=php_pdo.dll
//;extension=php_pdo_firebird.dll
//;extension=php_pdo_informix.dll
//;extension=php_pdo_mssql.dll
//;extension=php_pdo_mysql.dll
//;extension=php_pdo_oci.dll
//;extension=php_pdo_oci8.dll
//;extension=php_pdo_odbc.dll
//;extension=php_pdo_pgsql.dll
//;extension=php_pdo_sqlite.dll
//若要支持MySQL数据库,需要开启extension=php_pdo_mysql.dll

//Mac:
/*
sudo find / -name php.ini
如果没找到
cd /Private/etc
可以找到php.ini.default
cp php.ini.default php.ini
复制一份
sudo vi php.ini

或者
cd命令进入php的源码包里，进入到ext/pdo_mysql目录
由于我的php的ext包在/usr/include/php目录下，php-config以及phpize在/usr/bin目录下，
所以下面会用到这些目录，可以改成你自己本地的对应的目录，具体的过程是：

cd /usr/include/php/ext/pdo_mysql
/usr/bin/phpize
./configure--with-php-config=/usr/bin/php-config--with-pdo-mysql=/usr/local/mysql(mysql的安装目录)
make
makeinstall

然后在你的php的扩展目录里会生成一个pdo_mysql.so的扩展包
最后修改php.ini，加入扩展语句：

extension=/usr/lib/php/extensions/no-debug-non-zts-20090626/pdo_mysql.so

然后sudoapachectl restart，重启apache，pdo_mysql扩展库就可以正常使用了
*/





//——————————————————————————————————PDO连接数据库——————————————————————
//1.PDO构造函数
//在PDO中,要建立与数据库连接需要实例化PDO的构造函数,语法如下
//__construct(string $dsn[,string $username[,string $password[,array $driver_options]]])
//参数说明:
//dsn:数据源名称,包括主机名端口号和数据库名称
//username:连接数据库的用户名
//password:连接数据库的密码
//driver_options:连接数据库的其他选项

//通过PDO连接MySQL数据库的代码
header("Content-Type:text/html;charset=utf-8");             //设置页面的编码格式
$dbms = 'mysql';                                            //数据库类型
$dbName = 'bd_database19';                                  //使用的数据库名称
$user = 'root';                                             //使用的数据库用户名
$pwd = '111';                                               //使用的数据库密码
$host = 'localhost';                                        //使用的主机名称
$dsn = "$dbms:host=$host;dbname=$dbName";
try{                                                        //捕获异常
    $pdo = new PDO($dsn,$user,$pwd);                        //实例化对象
    echo "PDO连接MySQL成功";
}catch (Exception $e){
    echo $e->getMessage()."\n";
}

//2.DSN详解
//DSN提供数据库需要的信息,PDO的DSN包括三部分:PDO驱动名称(如mysql、sqlite或者pgsql)、冒号和驱动特定的语法。每种数据库都有其特定的驱动语法
//  在使用不同数据库时,需要明确数据库服务器是完全独立于PHP的。
//  一个数据库服务器具有一个默认端口(MySQL是3306),但是可以进行修改。一个数据库服务器可能包含多个数据库,所以通过DSN连接时通常包括数据库名称




//——————————————————————————————————PDO中执行SQL语句——————————————————————
//PDO中可以使用exec()、query()、prepare()和execute()方法执行SQL语句

//1.exec()方法
//exec()方法返回执行SQL语句后受影响的行数,语法如下
int PDO::exec(string statement)
//参数statement是要执行的SQL语句,该方法返回执行SQL语句时受影响的行数,通常用于INSERT、DELETE和UPDATE语句中


//2.query()方法
//query()方法常用于返回执行查询后的结果集,语法如下
PDOStatement PDO::query(string statement)
//参数statement是要执行的SQL语句。返回的是一个PDOStatement对象


//3.预处理语句——prepare()和execute()方法
//预处理语句包括prepare()和execute()方法,首先,通过prepare()方法做查询的准备工作,然后通过execute()方法执行查询
//      同时还可以通过bindParam()方法来绑定参数提供给execute()方法,语法如下
PDOStatement PDO::prepare(string statement[,array driver_options])
bool PDOStatement PDO::execute(array input_parameters)




//——————————————————————————————————PDO中获取结果集——————————————————————

//1.fetch()方法
//fetch方法获取结果集中的下一行数据,语法如下
mixed PDOStatement::fetch(int fetch_style[,int cursor_orientation[,int cursor_offset]])
/*参数fetch_style:控制结果集的返回方式      可选值
值                           说明
PDO::FETCH_ASSOC            关联数组形式
PDO::FETCH_NUM              数字索引数组形式
PDO::FETCH_BOTH             关联数组和数字索引数组都有,这是默认的
PDO::FETCH_OBJ              按照对象的形式
PDO::FETCH_BOUND            以布尔值的形式返回结果,同时将获取的列值赋给bindParam()方法中指定的变量
PDO::FETCH_LAZY             以关联数组、数字索引数组和对象3种形式返回
*/
//参数cursor_orientation:PDOStatement对象的一个滚动坐标,可用于获取指定的一行
//参数cursor_offset:游标的偏移量

//实例:通过fetch()方法获取结果集中下一行的数据,进而应用while语句完成数据库中数据的循环输出
//创建index.php文件,设计网页页面。首先通过PDO连接MySQL数据库。然后,定义SELECT查询语句,应用prepare()和execute()方法执行查询操作
//      接着,通过fetch()方法获取结果集中下一行的数据,调试设置结果集以关联数组的形式返回。
//      最后通过while语句完成数据库中数据的循环输出。关键代码如下:
$dbms = 'mysql';                                            //数据库类型
$dbName = 'bd_database19';                                  //使用的数据库名称
$user = 'root';                                             //使用的数据库用户名
$pwd = '111';                                               //使用的数据库密码
$host = 'localhost';                                        //使用的主机名称
$dsn = "$dbms:host=$host;dbname=$dbName";
try{                                                        //捕获异常
    $pdo = new PDO($dsn,$user,$pwd);                        //实例化对象
    $query = "select * from tb_pdo_mysql";                  //定义SQL语句
    $result = $pdo->prepare($query);                        //准备查询语句
    $result->execute();                                     //执行查询语句,并返回结果集
    while ($res = $result->fetch(PDO::FETCH_ASSOC)){        //循环输出查询结果集,并且设置结果集为关联数组形式
        ?>
            <tr>
                <td height="22" align="center" valign="middle"><?php echo $res['id']; ?></td>
                <td align="center" valign="middle"><?php echo $res['pdo_type']; ?></td>
                <td align="center" valign="middle"><?php echo $res['database_name']; ?></td>
                <td align="center" valign="middle"><?php echo $res['dates']; ?></td>
                <td align="center" valign="middle"><a href="#">删除</a></td>
            </tr>
        <?php
    }
}catch (PDOException $e){
    die('Error!:'.$e->getMessage()."\n");
}



//2.fetchAll()方法
//fetchAll()方法获取结果集中的所有行
array PDOStatement::fetchAll([int fetch_style[,int column_index]])
//参数fetch_style:控制结果集的返回方式
//参数column_index:字段的索引
//返回值是一个包含结果集中所有数据的二维数组

//实例:通过fetchAll()方法获取结果集中的所有行,进而应用for语句读取数组中数据,完成数据库中数据的循环输出
//创建index.php文件,设计网页页面。首先通过PDO连接MySQL数据库。然后,定义SELECT查询语句,应用prepare()和execute()方法执行查询操作
//      接着,通过fetchAll()方法获取结果集的所有行。
//      最后通过for语句完成结果集中数据的循环输出。关键代码如下:
$dbms = 'mysql';                                            //数据库类型
$dbName = 'bd_database19';                                  //使用的数据库名称
$user = 'root';                                             //使用的数据库用户名
$pwd = '111';                                               //使用的数据库密码
$host = 'localhost';                                        //使用的主机名称
$dsn = "$dbms:host=$host;dbname=$dbName";
try{                                                        //捕获异常
    $pdo = new PDO($dsn,$user,$pwd);                        //实例化对象
    $query = "select * from tb_pdo_mysql";                  //定义SQL语句
    $result = $pdo->prepare($query);                        //准备查询语句
    $result->execute();                                     //执行查询语句,并返回结果集
    $res = $result->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0;$i<count($res);$i++){                     //循环读取而我数组中的数据
        ?>
        <tr>
            <td height="22" align="center" valign="middle"><?php echo $res[$i]['id']; ?></td>
            <td align="center" valign="middle"><?php echo $res[$i]['pdo_type']; ?></td>
            <td align="center" valign="middle"><?php echo $res[$i]['database_name']; ?></td>
            <td align="center" valign="middle"><?php echo $res[$i]['dates']; ?></td>
            <td align="center" valign="middle"><a href="#">删除</a></td>
        </tr>
        <?php
    }
}catch (PDOException $e){
    die('Error!:'.$e->getMessage()."\n");
}



//3.fetchColumn()方法
//fetchColumn()方法获取结果集中下一行指定列的值
string PDOStatement::fetchColumn([int column_number]);
//可选参数column_number设置行中列的索引值,该值从0开始,若省略则从第一列开始取值
//可以通过fetchColumn()方法获取结果集中下一行中指定列的值

//实例:创建index.php文件,设计网页页面。首先通过PDO连接MySQL数据库。然后,定义SELECT查询语句,应用prepare()和execute()方法执行查询操作
//      接着,通过fetchColumn()方法获取结果集中第一列的值,即输出数据的ID值,关键代码如下:
$dbms = 'mysql';                                            //数据库类型
$dbName = 'bd_database19';                                  //使用的数据库名称
$user = 'root';                                             //使用的数据库用户名
$pwd = '111';                                               //使用的数据库密码
$host = 'localhost';                                        //使用的主机名称
$dsn = "$dbms:host=$host;dbname=$dbName";
try{                                                        //捕获异常
    $pdo = new PDO($dsn,$user,$pwd);                        //实例化对象
    $query = "select * from tb_pdo_mysql";                  //定义SQL语句
    $result = $pdo->prepare($query);                        //准备查询语句
    $result->execute();                                     //执行查询语句,并返回结果集
    ?>
    <tr>
        <td height="22" align="center" valign="middle"><?php echo $result->fetchColumn(0); ?></td>
        <td align="center" valign="middle"><?php echo $result->fetchColumn(0); ?></td>
        <td align="center" valign="middle"><?php echo $result->fetchColumn(0); ?></td>
        <td align="center" valign="middle"><?php echo $result->fetchColumn(0); ?></td>
        <td align="center" valign="middle"><a href="#">删除</a></td>
    </tr>
    <?php
}catch (PDOException $e){
    die('Error!:'.$e->getMessage()."\n");
}



//——————————————————————————————————PDO中捕获SQL语句中的错误——————————————————————
//1.使用默认模式————PDO::ERRRMODE_SILENY
//在默认模式中设置PDOStatement对象的errorCode属性,但不进行其他任何操作
//通过prepare()和execute()方法向数据库中添加数据,设置PDOStatement对象的errorCode属性,手动检测代码中的错误

//实例:创建index.php文件,设计网页页面。首先通过PDO连接MySQL数据库。然后,定义SELECT查询语句,应用prepare()和execute()方法执行插入操作
//      向数据库添加数据,并设置PDOStatement对象的errorCode属性检查代码中的错误,关键代码如下:
$dbms = 'mysql';                                            //数据库类型
$dbName = 'bd_database19';                                  //使用的数据库名称
$user = 'root';                                             //使用的数据库用户名
$pwd = '111';                                               //使用的数据库密码
$host = 'localhost';                                        //使用的主机名称
$dsn = "$dbms:host=$host;dbname=$dbName";
$pdo = new PDO($dsn,$user,$pwd);                        //实例化对象
$query = "insert into tb_pdo_mysql(pdo_type,database_name,dates) values(".$_POST['pdo'].",".$_POST['databases'].",".$_POST['dates'].")";                  //定义SQL语句
$result = $pdo->prepare($query);                        //准备查询语句
$result->execute();                                     //执行查询语句,并返回结果集
$code = $result->errorCode();
if (empty($code)){
    echo '数据库添加成功'."\n";
}else{
    echo '数据库错误'."\n";
    echo 'SQL Query'.$query;
    echo '<pre>';
    var_dump($result->errorInfo());
    echo '</pre>';
}



//2.使用errorinfo()方法
//用于获取操作数据库句柄时发生的错误信息
array PDOStatement::errorinfo(void)

//实例:创建index.php文件,设计网页页面。首先通过PDO连接MySQL数据库。然后通过query()方法执行查询操作
//      接着,通过errorinfo()方法获取错误信息,最后通过foreach语句完成数据的循环输出,关键代码如下:
$dbms = 'mysql';                                            //数据库类型
$dbName = 'bd_database19';                                  //使用的数据库名称
$user = 'root';                                             //使用的数据库用户名
$pwd = '111';                                               //使用的数据库密码
$host = 'localhost';                                        //使用的主机名称
$dsn = "$dbms:host=$host;dbname=$dbName";
try{                                                        //捕获异常
    $pdo = new PDO($dsn,$user,$pwd);                        //实例化对象
    $query = "select * from tb_pdo_mysql";                  //定义SQL语句
    $result = $pdo->prepare($query);                        //准备查询语句
    print_r($pdo->errorInfo());
    foreach ($result as $item){
        ?>
        <tr>
            <td height="22" align="center" valign="middle"><?php echo $item['id']; ?></td>
            <td align="center" valign="middle"><?php echo $item['pdo_type']; ?></td>
            <td align="center" valign="middle"><?php echo $item['database_name']; ?></td>
            <td align="center" valign="middle"><?php echo $item['dates']); ?></td>
        </tr>
        <?php
    }
}catch (PDOException $e){
    die('Error!:'.$e->getMessage()."\n");
}







//——————————————————————————————————PDO中事务处理——————————————————————
//PDO中可以实现事务处理的功能,应用方法如下:
//1.开启事务————beginTransaction()方法
//beginTransaction()方法将关闭自动提交(autocommit)模式,直到事务提交或者回滚以后才恢复


//2.提交事务————commit()方法
//commit()方法完成事务的提交操作,成功返回true,失败会返回false


//3.事务滚回————rollBack()方法
//通过prepare()和execute()方法向数据库中添加数据,并且通过事务处理机制确保数据能够正确的添加到数据库中

//实例:创建index.php文件。首先,定义数据库连接的参数,创建try{...}catch{...}语句,在try{}语句中实例化PDO构造函数,完成与数据库的连接
//      并且通过beginTransaction()方法开启事务。然后定义INSERT添加语句,通过$_POST[]方法获取表单中提交的数据,
//      通过prepare()和execute()方法执行插入操作,向数据库添加数据,并且通过commit()方法完成事务的提交操作。
//      最后,在catch{}语句中返回错误信息,并且通过rollBack()方法执行事务的回滚操作,代码如下:
if ($_POST['submit']=='提交' && $_POST['pdo']!=''){
    $dbms = 'mysql';                                            //数据库类型
    $dbName = 'bd_database19';                                  //使用的数据库名称
    $user = 'root';                                             //使用的数据库用户名
    $pwd = '111';                                               //使用的数据库密码
    $host = 'localhost';                                        //使用的主机名称
    $dsn = "$dbms:host=$host;dbname=$dbName";

    try{                                                        //捕获异常
        $pdo = new PDO($dsn,$user,$pwd);                        //实例化对象
        $pdo->beginTransaction();                               //开启事务
        $query = "insert into tb_pdo_mysql(pdo_type,database_name) values(".$_POST['pdo'].",".$_POST['databases'].",".$_POST['dates'].")";
        $result = $pdo->prepare($query);
        if ($result->execute()){
            echo '数据添加成功';
        }else{
            echo '数据添加失败';
        }
        $pdo->commit();                                        //事务的提交
    }catch (PDOException $e){
        echo 'Error!:'.$e->getMessage()."\n";
        $pdo->rollBack();                                      //事务的回滚
    }
}







//——————————————————————————————————PDO中存储过程——————————————————————
//PDO中调用存储过程:
//首先创建一个存储过程,其SQL语句如下:
/*
drop procedure if exists pro_reg;
delimiter//
create procedure pro_reg (in nc varchar(80),int pwd varchar(80),in email varchar(80),in address varchar(50))
begin
insert into tb_reg(name,pwd,email.address) values(no,pwd,email,address);
end;
//
*/
//说明:"drop"语句是删除MySQL服务器中已经存在的存储过程pro_reg
//     "delimiter//"的作用是将语句结束符更改为//
//     "in nc varchar(80)...in address varchar(50)"表示要向存储过程中传入的参数
//     "begin...end"表示存储过程中的语句块,它的作用类似于PHP语句中的"{...}"
//存储过程创建成功后,下面调用该存储过程实现用户注册的功能

//实例:在PDO中通过CALL语句调用存储过程,实现用户注册信息的添加操作
//      创建index.php文件。首先,创建form表单,将用户注册信息通过POST方法提交到本页。
//      然后,在本页编写PHP脚本,通过PDO链接MySQL数据库,并且设置数据库编码格式为UTF8,
//      获取表单中提交的用户注册信息。接着,通过call语句调用存储过程pro_reg,将用户注册信息添加到数据表中。
//      最后,通过try{...}catch{...}语句块返回错误信息,代码如下:
if ($_POST['submit']!=''){
    $dbms = 'mysql';                                            //数据库类型
    $dbName = 'bd_database19';                                  //使用的数据库名称
    $user = 'root';                                             //使用的数据库用户名
    $pwd = '111';                                               //使用的数据库密码
    $host = 'localhost';                                        //使用的主机名称
    $dsn = "$dbms:host=$host;dbname=$dbName";

    try{                                                        //捕获异常
        $pdo = new PDO($dsn,$user,$pwd);                        //实例化对象
        $pdo->query("set names utf8");                          //设置数据库编码格式
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);   //定义错误异常模式
        $nc = $_POST['nc'];
        $pwd = md5($_POST['pwd']);
        $email = $_POST['email'];
        $address = $_POST['address'];
        $query = "call pro_reg('$nc','$pwd','$email','$address')";
        $result = $pdo->prepare($query);
        if ($result->execute()){
            echo '数据添加成功';
        }else{
            echo '数据添加失败';
        }
    }catch (PDOException $e){
        echo 'PDO Exception Caught';
        echo "Error with the database:\n";
        echo 'SQL Query:'.$query;
        echo '<pre>';
        echo 'Error!:'.$e->getMessage()."\n";
        echo 'Code:'.$e->getCode()."\n";
        echo 'File:'.$e->getFile()."\n";
        echo 'Line:'.$e->getLine()."\n";
        echo 'Trace:'.$e->getTraceAsString()."\n";
        echo '</pre>';
    }
}






























?>