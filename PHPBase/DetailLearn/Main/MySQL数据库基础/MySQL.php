<?php
//MySQL安装包下载
//mysql Community Server下载地址：http://dev.mysql.com/downloads/mysql/

//MySQL Workbench管理MySQL数据库
//MySQL Workbench下载地址：http://dev.mysql.com/downloads/workbench/





//启动MySQL
//1.通过系统服务器启动MySQL服务器——开始-管理工具-服务-找到mysql服务,右击启动
//2.使用命令行启动MySQL:
//      进入终端(开始-运行-输入cmd命令):输入\>net start mysql



//连接MySQL:
//终端输入:
//      \>mysql -uroot   -h127.0.0.1        -ppassword
//              用户名     MySQL服务器地址      用户密码
//连接MySQL服务器时MySQL服务器地址可不写
//MAC下:/usr/local/mysql/bin/mysql -u root -p



//断开MySQL服务器
//终端输入:
//      \>mysql quit;



//停止MySQL服务器
//1。通过系统服务器启动MySQL服务器——开始-管理工具-服务-找到mysql服务,右击停止
//2.使用命令行启动MySQL:
//      进入终端(开始-运行-输入cmd命令):输入\>net stop mysql





//————————————————————MySQL数据库&表操作
//用例详情详情见AdvancedLearning/SQL

//1.创建数据库
CREATE DATABASE 数据库名


//2.查看数据库
SHOW DATABASE


//3.选择数据库
USE 数据库名


//4.删除数据库
DROP DATABASE 数据库名



//—————————————————————表操作——————————————————————

//1.创建数据表
//语法:
CREATE[TEMPORARY] TABLE [IF NOT EXISTS] 数据表名 [(create_definition)][table_options][select_statement]
/*参数说明
参数                              说明
TEMPORARY                       若使用该关键字,表示创建一个临时表
IF NOT EXISTS                   该关键字用于避免表不存在时MySQL报告的错误
create_definition               表的列属性部分,MySQL要求在创建表时至少包含一列
table_options                   表的一些特性参数
select_statement                SELECT语句描述部分,用它可以快速地创建表
*/

//create_definition部分每一列定义的具体格式如下:
col_name type[NOT NULL|NULL][DEFAULT default_value][AUTO_INCREMENT][PRIMARY KEY][reference_definition]
/*参数说明
参数                              说明
col_name                        字段名
type                            字段类型
NOT NULL|NULL                   指出该列是否允许空值,系统一般默认允许为空值,所以当不允许为空值时,必须使用NOT NULL
DEFAULT default_value           表示默认值
AUTO_INCREMENT                  表示是否为自动编号,每个表都只能有一个AUTO_INCREMENT,并且必须被索引
PRIMARY KEY                     表示是否为主键,每一个表只能有一个主键。
                                若表中没有主键,而某些应用需要主键,MySQL将返回第一个没有NULL列的UNIQUE键作为主键
reference_definition            为字段添加注释
*/

//最基本的创建格式
create table table_name(列名1 属性,列名2 属性...)

//实例:在db_admin数据库中创建一个名为tb_admin的数据表,包含id、user、password和createtime等字段
use db_admin                        //选择数据库
create table tb_admin(                          //创建数据库表
    id int auto_increment prinary key,
    user varchar(30) not null,
    password varchar(30) not null,
    createtime datetime
);



//2.查看表结构
//SHOW COLUMNS或DESCRIBE
//对于创建成功的数据表,可以使用SHOW COLUMNS语句或DESCRIBE语句查看指定数据表的表结构

//SHOW COLUMNS语句
SHOW [FULL]COLUMNS FROM 数据表名 [FROM 数据库名]
或
SHOW [FULL]COLUMNS FROM 数据表名.数据库名

//如:使用SHOW COLUMNS语句查看数据表tb_admin表结构
show columns from the tb_admin from db_admin

//DESCRIBE语句
DESCRIBE 数据表名
//DESCRIBE可以简写成DESC,在查看表结构时,也可以只列出某一列的信息
DESCRIBE 数据表名 列名

//如:使用DESCRIBE语句的简写形式查看数据表tb_admin中的某一列信息
desc tb_admin user;




//3.修改表结构
//ALTER TABLE
//修改表结构使用ALTER TABLE语句。修改表结构指增加或者删除字段、修改字段或者字段类型、设置或取消主键外键、设置或取消索引以及修改表的注释等
ALTER[IGNORE] TABLE 数据表名 alter_spec[,alter_spec]...;
//当指定IGNORE时,如果出现重复关键的行,则只执行一行,其他重复的行被删除
//其中alter_spec子句定义要修改的内容,其语法如下:
/*alter_specification
  ADD [COLUMN]create_definition [FIRST|AFTER column_name]       //添加新字段
| ADD INDEX [index_name](index_col_name,...)                    //添加索引名称
| ADD PRIMARY KEY (index_col_name,...)                          //添加主键名称
| ADD UNIQUE [index_name](index_col_name,...)                   //唯一索引
| ALTER[COLUMN] col_name {SET DEFAULT literal|DROP DEFAULT}     //修改字段名称
| CHANGE[COLUMN] old_col_name create_definition                 //修改字段类型
| MODIFY[COLUMN]create_definition                               //修改子句定义字段
| DROP[COLUMN] col_name                                         //删除字段名称
| DROP PRIMARY KEY                                              //删除主键名称
| DROP INDEX index_name                                         //删除索引名称
| RENAME [AS] new_tbl_name                                      //更改表名
| table_options

*/
//ALTER TABLE语句允许指定多个alter_space子句,每个子句间使用逗号分隔,每个子句表示对表的一个修改

//例如:添加一个新的字段email,类型为varchar(50),not null,将字段user的类型由varchar(50)改为varchar(40)
alter table tb_admin add email varchar(50) not null,modify user varchar(40);
//通过alter修改表列的前提是必须将表中数据全部删除,然后才可以修改




//4.重命名表
//RENAME TABLE
RENAME TABLE 数据表名1 To 数据表名2;
//该语句可以同时对多个数据表进行重命名,多个表之间以逗号','分隔

//例如,对数据表tb_admin进行重命名,更名后的数据表为tb_user
rename table tb_admin to tb_user




//5.删除表
//DROP TABLE
DROP TABLE 数据库表名

//例如:删除数据表tb_user
drop table tb_user

//在删除数据表的操作时,若删除一个不存在的表将产生错误,如果在删除语句中加入IF EXISTS关键字就不会出错了
DROP TABLE IF EXISTS 数据库表名
//如:删除数据表tb_user
drop table if exists tb_user





//—————————————————————MySQL语句操作——————————————————————

//1.插入记录insert
//在建立一个空的数据库和数据表时,首先需要考虑的是如何向数据表中添加数据该操作可以使用insert语句来完成
//语法格式如下:
insert into 数据表名(column_name,column_name2,...) values(value1,value2)
//在MySQL中,一次可以同时插入多行数据,各行记录的值清单在VALUES关键字后以逗号','分隔,而标准的SQL语句一次只能插入一行记录
//如:向表tb_admin中插入一条数据信息
insert into tb_admin(user,password,email,createtime) values('tsoft','111','sadsa@qq.com','2017-07-09 09:00:00')




//2.查询数据库记录select
//select语句的语法格式如下
/*
select selection_list                   //要查询的内容,选择那些判断
from 数据表名                            //指定数据表
where primary_constraint                //查询时需要满足的条件,行必须满足的条件
group by grouping_columns               //如何对结果进行分组
order by sorting_cloumns                //如何对结果进行排序
having secondrary_constraint            //查询时满足的第二个结果
limit count                             //限定输出的查询结果
*/

//2.1使用select语句查询一个数据表
//使用select语句,查询所有列时,使用'*'代表
//例如,查询tb_admin中的所有数据
select * from tb_admin

//2.2查询表中的一列或多列
//针对表中的多列进行查询,只要在select后面指定要查询的列名即可,多列之间使用','分隔
//例如:查询管理员信息表tb_admin中的id、user、password和email字段,并指定查询条件为用户ID为编号1
select id,user,password,email from tb_admin where id=1;


//2.3多表查询
//针对多个数据表进行查询,关键是where子句中查询条件的设置
//  要查找的字段名最好用'表名.字段名'表示,这样可以防止因表之间字段重名而无法获知该字段属于哪个表
//  在where子句中多个表所形成的联动关系应按如下形式书写:
//      表1.字段=表2.字段 and 其他查询条件

//多表查询的SQL语句格式如下
select 字段名 from 表1,表2... where 表1.字段=表2.字段 and 其他查询条件
//例如:查询学生表和成绩表,当两表的userid相等,并且学生的userid等于0001时
select * from tb_student,tb_sscore where tb_student.userid=tb_sscore.userid and tb_student.userid=0001



//3.修改记录update
//要执行修改的操作可以使用update语句,该语句的格式如下:
update 数据表名 set column_name = new_value1,column_name2 = new_value2,...[where condition]
//其中,set子句指出要修改的列和它们给定的值,where子句是可选的,如果给出它将指定记录中哪行应该被更新,否则所有记录都将更新

//例如:下面将管理员表tb_damin中用户名为tsoft的管理员密码111改为896552
update tb_admin set password = '896552' where user = 'tsoft'




//4.删除记录delete
//在数据库中,需要删除数据时,使用delete语句
delete from 数据表名 where condition
//该语句在执行过程中,如果没有指定where条件,将删除所有记录,如果指定了where条件,将按照指定的推荐进行删除;
//  实际应用中,删除条件一般为数据的id,以防止错误

//例如:删除管理员数据表tb_admin中用户名为'小欣'的记录信息
delete from tb_admin where user='小欣'






//——————————————————————————数据库的备份和恢复

//数据库的备份
//在命令行模式下完成对数据库的备份,使用的是MYSQLDUMP命令。通过该命令可以将数据以文本文件的形式存储到指定的文件夹下
//说明:要在命令行模式下操作MySQL数据库,必须要对电脑的环境变量进行设置,右击'我的电脑',在弹出的快捷菜单中选择'属性'命令,
//      在弹出的"属性"对话框中选择"高级"->"环境变量",在用户变量的列表框中找到变量PATH并选中,
//      单击"编辑"按钮,在变量PATH的变量值文本框中添加"D:\webpage\AppSerc\MyDQL\bin"(MySQL数据库中bin文件夹的安装路径)
//      然后单击"确定"按钮即可。其中添加的bin文件夹路径根据自己安装MySQL数据库的位置而定

//通过MYSQLDUMP命令备份整个数据库的操作步骤
//1.选择"开始"->"运行"->输入cmd,进入命令行模式
//2.直接输入"mysqldump -uroot -ptoot db_database16 >F:\db_database16.txt"
mysqldump -uroot -ptoot db_database16 >F:\db_database16.txt
//其中,-uroot中的"root"为用户名,-proot中的"root"是密码,db_database16是数据库名,F:\db_database16.txt是数据库备份位置
//  -uroot输入中间没有空格,也没有结束符,直接Enter



//数据库的恢复
//命令格式如下:
mysql -uroot -proot db_database <F:\db_database16.txt
//其中mysql是使用的命令,-u后的root是用户名,-p后的root是密码,db_database代表的是数据库名或者表名,<后的F:\db_database16.txt是备份文件存储位置
//  在进行数据库的恢复时,在MySQL数据库中必须存在一个空的、将要恢复的数据库,否则就会出现错误






//——————————————————————————————————触发器
//触发器(trigger)：监视某种情况，并触发某种操作。
//触发器创建语法四要素：
//1.监视地点(table)
//2.监视事件(insert/update/delete)
//3.触发时间(after/before)
//4.触发事件(insert/update/delete)

//语法：
create trigger triggerName

after/before insert/update/delete on 表名

for each row   #这句话在mysql是固定的

    begin

sql语句;

end;

//注：各自对应上面的四要素。

//实例:首先来创建两张表：
#商品表
create table g(
    id int primary key auto_increment,
    name varchar(20),
    num int
);

#订单表
create table o(
    oid int primary key auto_increment,
    gid int,
    much int
);

insert into g(name,num) values('商品1',10),('商品2',10),('商品3',10);

//如果在没使用触发器之前：假设现在卖了3个商品1，需要做两件事
//1.往订单表插入一条记录
insert into o(gid,much) values(1,3);
//2.更新商品表商品1的剩余数量
update g set num=num-3 where id=1;


//现在，来创建一个触发器：
//需要先执行该语句：delimiter $(意思是告诉mysql语句的结尾换成以$结束)

create trigger tg1
after insert on o
for each row
    begin
update g set num=num-3 where id=1;
end$

//这时候只要执行：

insert into o(gid,much) values(1,3)$

//会发现商品1的数量变为7了，说明在插入一条订单的时候，触发器自动做了更新操作。


//但现在会有一个问题，因为触发器里面num和id都是写死的
//  所以不管买哪个商品，最终更新的都是商品1的数量。
//  比如：往订单表再插入一条记录：
//       insert into o(gid,much) values(2,3),执行完后会发现商品1的数量变4了，而商品2的数量没变
//       这样显然不是想要的结果。需要改之前创建的触发器。

//如何在触发器引用行的值，也就是说要得到新插入的订单记录中的gid或much的值。

//对于insert而言，新插入的行用new来表示，行中的每一列的值用new.列名来表示。
//  所以现在可以这样来改触发器

create trigger tg2
after insert on o
for each row
    begin
update g set num=num-new.much where id=new.gid;(注意此处和第一个触发器的不同)
end$

//第二个触发器创建完毕，先把第一个触发器删掉

drop trigger tg1$

//再来测试一下，插入一条订单记录：insert into o(gid,much) values(2,3)$
//执行完发现商品2的数量变为7了，现在就对了。

//现在还存在两种情况：
//1.当用户撤销一个订单的时候，这边直接删除一个订单，是不是需要把对应的商品数量再加回去呢？
//2.当用户修改一个订单的数量时，触发器修改怎么写?

//先分析一下第一种情况：
//  监视地点：o表
//  监视事件：delete
//  触发时间：after
//  触发事件：update

//对于delete而言：原本有一行,后来被删除，想引用被删除的这一行，用old来表示，old.列名可以引用被删除的行的值。
//  那触发器就该这样写：

create trigger tg3
after delete on o
for each row
    begin
update g set num = num + old.much where id = old.gid;(注意这边的变化)
end$

//创建完毕
//  再执行delete from o where oid = 2$
//  会发现商品2的数量又变为10了。


//第二种情况：
//  监视地点：o表
//  监视事件：update
//  触发时间：after

//触发事件：update
//  对于update而言：被修改的行，修改前的数据，用old来表示，old.列名引用被修改之前行中的值；
//  修改的后的数据，用new来表示，new.列名引用被修改之后行中的值。
//  那触发器就该这样写：

create trigger tg4
after update on o
for each row
    begin
update g set num = num+old.much-new.much where id = old/new.gid;
end$

//先把旧的数量恢复再减去新的数量就是修改后的数量了。
//  测试下：先把商品表和订单表的数据都清掉，易于测试。
//  假设往商品表插入三个商品，数量都是10，
//  买3个商品1：
insert into o(gid,much) values(1,3)$
//  这时候商品1的数量变为7；

//  我们再修改插入的订单记录:
update o set much = 5 where oid = 1$

//变为买5个商品1，这时候再查询商品表就会发现商品1的数量只剩5了，说明触发器发挥作用了





?>