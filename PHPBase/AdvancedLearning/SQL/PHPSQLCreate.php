<?php
//*************************************PHP MySQL 创建数据库和表
//数据库存有一个或多个表


//*************************************创建数据库
//CREATE DATABASE 语句用于在 MySQL 中创建数据库。

//语法
CREATE DATABASE database_name
//为了让 PHP 执行上面的语句，必须使用 mysqli_query() 函数。此函数用于向 MySQL 连接发送查询或命令


//*************************************例子
//在下面的例子中，创建了一个名为 "my_db" 的数据库
$con = mysqli_connect("localhost","peter","abc123");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}

if (mysqli_query("CREATE DATABASE my_db",$con))
{
    echo "Database created";
}
else
{
    echo "Error creating database: " . mysqli_error();
}

mysqli_close($con);



//*************************************创建表
//CREATE TABLE 用于在 MySQL 中创建数据库表
//语法
CREATE TABLE table_name
(
    column_name1 data_type,
column_name2 data_type,
column_name3 data_type,
.......
)
//为了执行此命令，必须向 mysqli_query() 函数添加 CREATE TABLE 语句


//*************************************例子
//下面的例子展示了如何创建一个名为 "Persons" 的表，此表有三列。列名是 "FirstName", "LastName" 以及 "Age"
$con = mysqli_connect("localhost","peter","abc123");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}

// Create database
if (mysqli_query("CREATE DATABASE my_db",$con))
{
    echo "Database created";
}
else
{
    echo "Error creating database: " . mysqli_error();
}

// Create table in my_db database
mysqli_select_db("my_db", $con);
$sql = "CREATE TABLE Persons 
(
FirstName varchar(15),
LastName varchar(15),
Age int
)";
mysqli_query($sql,$con);

mysqli_close($con);

//重要事项：在创建表之前，必须首先选择数据库。通过 mysqli_select_db() 函数选取数据库。
//注释：当创建 varchar 类型的数据库字段时，必须规定该字段的最大长度，例如：varchar(15)。


//*************************************MySQL 数据类型
//下面的可使用的各种 MySQL 数据类型
/*
数值类型	                描述
int(size)
smallint(size)
tinyint(size)
mediumint(size)
bigint(size)            仅支持整数。在 size 参数中规定数字的最大值。

decimal(size,d)
double(size,d)
float(size,d)           支持带有小数的数字。
                        在 size 参数中规定数字的最大值。在 d 参数中规定小数点右侧的数字的最大值。
*/

/*
文本数据类型	            描述
char(size)	            支持固定长度的字符串。（可包含字母、数字以及特殊符号）。
                        在 size 参数中规定固定长度。
varchar(size)	        支持可变长度的字符串。（可包含字母、数字以及特殊符号）。
                        在 size 参数中规定最大长度。
tinytext	            支持可变长度的字符串，最大长度是 255 个字符。
text                    支持可变长度的字符串，最大长度是 65535 个字符。
blob                    支持可变长度的字符串，最大长度是 65535 个字符。
mediumtext              支持可变长度的字符串，最大长度是 16777215 个字符。
mediumblob              支持可变长度的字符串，最大长度是 16777215 个字符。
longtext                支持可变长度的字符串，最大长度是 4294967295 个字符。
longblob                支持可变长度的字符串，最大长度是 4294967295 个字符。
*/

/*
日期数据类型	                        描述
date(yyyy-mm-dd)
datetime(yyyy-mm-dd hh:mm:ss)
timestamp(yyyymmddhhmmss)
time(hh:mm:ss)                      支持日期或时间
*/

/*
杂项数据类型	                    描述
enum(value1,value2,ect)	        ENUM 是 ENUMERATED 列表的缩写。可以在括号中存放最多 65535 个值。
set	                            SET 与 ENUM 相似。但是，SET 可拥有最多 64 个列表项目，并可存放不止一个 choice
*/


//*************************************主键和自动递增字段
//每个表都应有一个主键字段。
//主键用于对表中的行进行唯一标识。每个主键值在表中必须是唯一的。此外，主键字段不能为空，这是由于数据库引擎需要一个值来对记录进行定位。
//主键字段永远要被编入索引。这条规则没有例外。必须对主键字段进行索引，这样数据库引擎才能快速定位给予该键值的行。

//下面的例子把 personID 字段设置为主键字段。
//主键字段通常是 ID 号，且通常使用 AUTO_INCREMENT 设置。
//AUTO_INCREMENT 会在新记录被添加时逐一增加该字段的值。要确保主键字段不为空，必须向该字段添加 NOT NULL 设置
$sql = "CREATE TABLE Persons 
(
personID int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(personID),
FirstName varchar(15),
LastName varchar(15),
Age int
)";

mysqli_query($sql,$con);


?>