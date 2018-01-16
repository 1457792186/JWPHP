<?php

//SQL 对大小写不敏感

/*
SQL DML 和 DDL
可以把 SQL 分为两个部分：数据操作语言 (DML) 和 数据定义语言 (DDL)。

SQL (结构化查询语言)是用于执行查询的语法。但是 SQL 语言也包含用于更新、插入和删除记录的语法。
查询和更新指令构成了 SQL 的 DML 部分：
SELECT - 从数据库表中获取数据
UPDATE - 更新数据库表中的数据
DELETE - 从数据库表中删除数据
INSERT INTO - 向数据库表中插入数据

SQL 的数据定义语言 (DDL) 部分使我们有能力创建或删除表格。我们也可以定义索引（键），规定表之间的链接，以及施加表间的约束。
SQL 中最重要的 DDL 语句:
CREATE DATABASE - 创建新数据库
ALTER DATABASE - 修改数据库
CREATE TABLE - 创建新表
ALTER TABLE - 变更（改变）数据库表
DROP TABLE - 删除表
CREATE INDEX - 创建索引（搜索键）
DROP INDEX - 删除索引
*/





————————————————————————————————————————————————————
1.SQL SELECT 语法
//SELECT 列名称 FROM 表名称
//以及：
SELECT * FROM 表名称

//SQL SELECT 实例
//如需获取名为 "LastName" 和 "FirstName" 的列的内容（从名为 "Persons" 的数据库表），请使用类似这样的 SELECT 语句：
SELECT LastName,FirstName FROM Persons


//SQL SELECT * 实例
//现在希望从 "Persons" 表中选取所有的列。
//请使用符号 * 取代列的名称，就像这样：
SELECT * FROM Persons




————————————————————————————————————————————————————
2.SQL SELECT DISTINCT 语句
//在表中，可能会包含重复值。这并不成问题，不过，有时也许希望仅仅列出不同（distinct）的值。
//关键词 DISTINCT 用于返回唯一不同的值。

//语法：
SELECT DISTINCT 列名称 FROM 表名称


//使用 DISTINCT 关键词
//如果要从 "Company" 列中选取所有的值，需要使用 SELECT 语句：
SELECT Company FROM Orders
//如需从 Company" 列中仅选取唯一不同的值，需要使用 SELECT DISTINCT 语句：
SELECT DISTINCT Company FROM Orders







————————————————————————————————————————————————————
3.SQL WHERE 子句
//WHERE 子句
//如需有条件地从表中选取数据，可将 WHERE 子句添加到 SELECT 语句。
//语法
SELECT 列名称 FROM 表名称 WHERE 列 运算符 值

/*
下面的运算符可在 WHERE 子句中使用：
操作符	描述
=	    等于
<>	    不等于
>	    大于
<	    小于
>=	    大于等于
<=	    小于等于
BETWEEN	在某个范围内
LIKE	搜索某种模式
注释：在某些版本的 SQL 中，操作符 <> 可以写为 !=
*/


//使用 WHERE 子句
//如果只希望选取居住在城市 "Beijing" 中的人，我们需要向 SELECT 语句添加 WHERE 子句：
SELECT * FROM Persons WHERE City='Beijing'



//引号的使用
//请注意，在例子中的条件值周围使用的是单引号。
//SQL 使用单引号来环绕文本值（大部分数据库系统也接受双引号）。如果是数值，请不要使用引号

//文本值：
//这是正确的：
SELECT * FROM Persons WHERE FirstName='Bush'

//这是错误的：
//SELECT * FROM Persons WHERE FirstName=Bush

//数值：
//这是正确的：
SELECT * FROM Persons WHERE Year>1965

//这是错误的：
//SELECT * FROM Persons WHERE Year>'1965'





————————————————————————————————————————————————————
4.SQL AND & OR 运算符
//AND 和 OR 运算符用于基于一个以上的条件对记录进行过滤
//AND 和 OR 运算符
//AND 和 OR 可在 WHERE 子语句中把两个或多个条件结合起来。
//如果第一个条件和第二个条件都成立，则 AND 运算符显示一条记录。
//如果第一个条件和第二个条件中只要有一个成立，则 OR 运算符显示一条记录


/*
原始的表 (用在例子中的)：
LastName	FirstName	Address	        City
Adams	    John	    Oxford Street	London
Bush	    George	    Fifth Avenue	New York
Carter	    Thomas	    Changan Street	Beijing
Carter	    William	    Xuanwumen 10	Beijing
*/

//AND 运算符实例
//使用 AND 来显示所有姓为 "Carter" 并且名为 "Thomas" 的人：
SELECT * FROM Persons WHERE FirstName='Thomas' AND LastName='Carter'

/*
结果：
LastName	FirstName	Address	        City
Carter	    Thomas	    Changan Street	Beijing
*/


//OR 运算符实例
//使用 OR 来显示所有姓为 "Carter" 或者名为 "Thomas" 的人：
SELECT * FROM Persons WHERE firstname='Thomas' OR lastname='Carter'

/*
结果：
LastName	FirstName	Address	        City
Carter	    Thomas	    Changan Street	Beijing
Carter	    William	X   uanwumen 10	    Beijing
*/


//结合 AND 和 OR 运算符
//我们也可以把 AND 和 OR 结合起来（使用圆括号来组成复杂的表达式）:
SELECT * FROM Persons WHERE (FirstName='Thomas' OR FirstName='William')
AND LastName='Carter'
/*
结果：
LastName	FirstName	Address	        City
Carter	    Thomas	    Changan Street	Beijing
Carter	    William	    Xuanwumen 10	Beijing
*/





————————————————————————————————————————————————————
5.SQL ORDER BY 子句
//ORDER BY 语句用于对结果集进行排序。
//ORDER BY 语句
//ORDER BY 语句用于根据指定的列对结果集进行排序。
//ORDER BY 语句默认按照升序对记录进行排序。
//如果希望按照降序对记录进行排序，可以使用 DESC 关键字

//实例 1
//以字母顺序显示公司名称：
SELECT Company, OrderNumber FROM Orders ORDER BY Company


//实例 2
//以字母顺序显示公司名称（Company），并以数字顺序显示顺序号（OrderNumber）：
SELECT Company, OrderNumber FROM Orders ORDER BY Company, OrderNumber



//实例 3
//以逆字母顺序(倒序)显示公司名称：
SELECT Company, OrderNumber FROM Orders ORDER BY Company DESC


//实例 4
//以逆字母顺序显示公司名称，并以数字顺序显示顺序号：
SELECT Company, OrderNumber FROM Orders ORDER BY Company DESC, OrderNumber ASC


//在以上的结果中有两个名称时,在第一列中有相同的值时，ORDER BY则以第二个关键词为主,以此类推






————————————————————————————————————————————————————
6.SQL INSERT INTO 语句
//INSERT INTO 语句
//INSERT INTO 语句用于向表格中插入新的行。
//语法
INSERT INTO 表名称 VALUES (值1, 值2,....)
//也可以指定所要插入数据的列：
INSERT INTO table_name (列1, 列2,...) VALUES (值1, 值2,....)


//插入新的行
/*
"Persons" 表：
LastName	FirstName	Address	        City
Carter	    Thomas	    Changan Street	Beijing
*/
//SQL 语句：
INSERT INTO Persons VALUES ('Gates', 'Bill', 'Xuanwumen 10', 'Beijing')

//在指定的列中插入数据
//SQL 语句：
INSERT INTO Persons (LastName, Address) VALUES ('Wilson', 'Champs-Elysees')







————————————————————————————————————————————————————
7.SQL UPDATE 语句
//Update 语句
//Update 语句用于修改表中的数据。
//语法：
//UPDATE 表名称 SET 列名称 = 新值 WHERE 列名称 = 某值


//更新某一行中的一个列
//为 lastname 是 "Wilson" 的人添加 firstname：
UPDATE Person SET FirstName = 'Fred' WHERE LastName = 'Wilson'

//更新某一行中的若干列
//会修改地址（address），并添加城市名称（city）：
UPDATE Person SET Address = 'Zhongshan 23', City = 'Nanjing'
WHERE LastName = 'Wilson'








————————————————————————————————————————————————————
8.SQL DELETE 语句

//DELETE 语句
//DELETE 语句用于删除表中的行。
//语法
//DELETE FROM 表名称 WHERE 列名称 = 值


//删除某行
//"Fred Wilson" 会被删除：
DELETE FROM Person WHERE LastName = 'Wilson'


//删除所有行
//可以在不删除表的情况下删除所有的行。这意味着表的结构、属性和索引都是完整的：
DELETE FROM table_name
//或者：
DELETE * FROM table_name









————————————————————————————————————————————————————
9.SQL TOP 子句

//TOP 子句
//TOP 子句用于规定要返回的记录的数目。
//对于拥有数千条记录的大型表来说，TOP 子句是非常有用的。
//注释：并非所有的数据库系统都支持 TOP 子句


//SQL Server 的语法：
SELECT TOP number|percent column_name(s) FROM table_name


//MySQL 和 Oracle 中的 SQL SELECT TOP 是等价的
//MySQL 语法
SELECT column_name(s)
FROM table_name
LIMIT number

//例子
SELECT *
FROM Persons
LIMIT 5



//Oracle 语法
SELECT column_name(s)
FROM table_name
WHERE ROWNUM <= number
//例子
SELECT *
FROM Persons
WHERE ROWNUM <= 5



//SQL TOP 实例
//现在，希望从上面的 "Persons" 表中选取头两条记录。
//可以使用下面的 SELECT 语句：
SELECT TOP 2 * FROM Persons



//SQL TOP PERCENT 实例
//现在，希望从上面的 "Persons" 表中选取 50% 的记录。
//可以使用下面的 SELECT 语句：
SELECT TOP 50 PERCENT * FROM Persons




————————————————————————————————————————————————————
10.SQL LIKE 操作符
//LIKE 操作符用于在 WHERE 子句中搜索列中的指定模式

//LIKE 操作符
//LIKE 操作符用于在 WHERE 子句中搜索列中的指定模式。
//SQL LIKE 操作符语法
SELECT column_name(s)
FROM table_name
WHERE column_name LIKE pattern


//LIKE 操作符实例
//例子 1
//现在，希望从上面的 "Persons" 表中选取居住在以 "N" 开始的城市里的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE City LIKE 'N%'
//提示："%" 可用于定义通配符（模式中缺少的字母）


//例子 2
//接下来，希望从 "Persons" 表中选取居住在以 "g" 结尾的城市里的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE City LIKE '%g'


//例子 3
//接下来，希望从 "Persons" 表中选取居住在包含 "lon" 的城市里的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE City LIKE '%lon%'


//例子 4
//通过使用 NOT 关键字，可以从 "Persons" 表中选取居住在不包含 "lon" 的城市里的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE City NOT LIKE '%lon%'










————————————————————————————————————————————————————
11.SQL 通配符
//在搜索数据库中的数据时，可以使用 SQL 通配符

//SQL 通配符
//在搜索数据库中的数据时，SQL 通配符可以替代一个或多个字符。
//SQL 通配符必须与 LIKE 运算符一起使用。
//在 SQL 中，可使用以下通配符：
/*
通配符	        描述
%	            替代一个或多个字符
_	            仅替代一个字符
[charlist]	    字符列中的任何单一字符
[^charlist]     不在字符列中的任何单一字符
或者
[!charlist]
*/


//使用 % 通配符
//例子 1
//现在，希望从上面的 "Persons" 表中选取居住在以 "Ne" 开始的城市里的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE City LIKE 'Ne%'


//例子 2
//接下来，希望从 "Persons" 表中选取居住在包含 "lond" 的城市里的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE City LIKE '%lond%'


//使用 _ 通配符
//例子 1
//现在，希望从上面的 "Persons" 表中选取名字的第一个字符之后是 "eorge" 的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE FirstName LIKE '_eorge'



//例子 2
//接下来，希望从 "Persons" 表中选取的这条记录的姓氏以 "C" 开头，然后是一个任意字符，然后是 "r"，然后是任意字符，然后是 "er"：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE LastName LIKE 'C_r_er'



//使用 [charlist] 通配符
//例子 1
//现在，希望从上面的 "Persons" 表中选取居住的城市以 "A" 或 "L" 或 "N" 开头的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE City LIKE '[ALN]%'



//例子 2
//现在，希望从上面的 "Persons" 表中选取居住的城市不以 "A" 或 "L" 或 "N" 开头的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE City LIKE '[!ALN]%'







————————————————————————————————————————————————————
12.SQL IN 操作符

//IN 操作符
//IN 操作符允许我们在 WHERE 子句中规定多个值

//SQL IN 语法
SELECT column_name(s)
FROM table_name
WHERE column_name IN (value1,value2,...)



//IN 操作符实例
//现在，希望从上表中选取姓氏为 Adams 和 Carter 的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE LastName IN ('Adams','Carter')









————————————————————————————————————————————————————
13.SQL BETWEEN 操作符

//BETWEEN 操作符在 WHERE 子句中使用，作用是选取介于两个值之间的数据范围。

//BETWEEN 操作符
//操作符 BETWEEN ... AND 会选取介于两个值之间的数据范围。这些值可以是数值、文本或者日期。

//SQL BETWEEN 语法
SELECT column_name(s)
FROM table_name
WHERE column_name
BETWEEN value1 AND value2


//BETWEEN 操作符实例
//如需以字母顺序显示介于 "Adams"（包括）和 "Carter"（不包括）之间的人，请使用下面的 SQL：
SELECT * FROM Persons
WHERE LastName
BETWEEN 'Adams' AND 'Carter'

//重要事项：不同的数据库对 BETWEEN...AND 操作符的处理方式是有差异的。
//某些数据库会列出介于 "Adams" 和 "Carter" 之间的人，但不包括 "Adams" 和 "Carter" ；
//某些数据库会列出介于 "Adams" 和 "Carter" 之间并包括 "Adams" 和 "Carter" 的人；
//而另一些数据库会列出介于 "Adams" 和 "Carter" 之间的人，包括 "Adams" ，但不包括 "Carter" 。
//所以，请检查数据库是如何处理 BETWEEN....AND 操作符的


//实例 2
//如需使用上面的例子显示范围之外的人，使用 NOT 操作符：
SELECT * FROM Persons
WHERE LastName
NOT BETWEEN 'Adams' AND 'Carter'









————————————————————————————————————————————————————
14.SQL Alias（别名）
//通过使用 SQL，可以为列名称和表名称指定别名（Alias）

//SQL Alias
//表的 SQL Alias 语法
SELECT column_name(s)
FROM table_name
AS alias_name

//列的 SQL Alias 语法
SELECT column_name AS alias_name
FROM table_name


//Alias 实例: 使用表名称别名
//假设有两个表分别是："Persons" 和 "Product_Orders"。我们分别为它们指定别名 "p" 和 "po"。
//现在，希望列出 "John Adams" 的所有定单。
//可以使用下面的 SELECT 语句：
SELECT po.OrderID, p.LastName, p.FirstName
FROM Persons AS p, Product_Orders AS po
WHERE p.LastName='Adams' AND p.FirstName='John'

//不使用别名的 SELECT 语句：
SELECT Product_Orders.OrderID, Persons.LastName, Persons.FirstName
FROM Persons, Product_Orders
WHERE Persons.LastName='Adams' AND Persons.FirstName='John'


//Alias 实例: 使用一个列名别名
//SQL:
SELECT LastName AS Family, FirstName AS Name
FROM Persons





————————————————————————————————————————————————————
15.SQL JOIN
//SQL join 用于根据两个或多个表中的列之间的关系，从这些表中查询数据

//Join 和 Key
//有时为了得到完整的结果，需要从两个或更多的表中获取结果。就需要执行 join。
//    数据库中的表可通过键将彼此联系起来。
//主键（Primary Key）是一个列，在这个列中的每一行的值都是唯一的。
//    在表中，每个主键的值都是唯一的。
//    这样做的目的是在不重复每个表中的所有数据的情况下，把表间的数据交叉捆绑在一起



/*
请看 "Persons" 表：
Id_P	LastName	FirstName	Address	        City
1	    Adams	    John	    Oxford Street	London
2	    Bush	    George	    Fifth Avenue	New York
3	    Carter	    Thomas	    Changan Street	Beijing
*/

//注意，"Id_P" 列是 Persons 表中的的主键。这意味着没有两行能够拥有相同的 Id_P。
//  即使两个人的姓名完全相同，Id_P 也可以区分他们

/*
接下来请看 "Orders" 表：
Id_O	OrderNo	Id_P
1	    77895	3
2	    44678	3
3	    22456	1
4	    24562	1
5	    34764	65
*/
//注意，"Id_O" 列是 Orders 表中的的主键，同时，"Orders" 表中的 "Id_P" 列用于引用 "Persons" 表中的人，而无需使用他们的确切姓名
//留意，"Id_P" 列把上面的两个表联系了起来


//引用两个表
//可以通过引用两个表的方式，从两个表中获取数据：
//谁订购了产品，并且他们订购了什么产品？
SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons, Orders
WHERE Persons.Id_P = Orders.Id_P
/*
结果集：
LastName	FirstName	OrderNo
Adams	    John	    22456
Adams	    John	    24562
Carter	    Thomas	    77895
Carter	    Thomas	    44678
*/



//SQL JOIN - 使用 Join
//除了上面的方法，也可以使用关键词 JOIN 来从两个表中获取数据。
//如果希望列出所有人的定购，可以使用下面的 SELECT 语句：
SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons
INNER JOIN Orders
ON Persons.Id_P = Orders.Id_P
ORDER BY Persons.LastName
/*
结果集：
LastName	FirstName	OrderNo
Adams	    John	    22456
Adams	    John	    24562
Carter	    Thomas	    77895
Carter	    Thomas	    44678
*/


/*
不同的 SQL JOIN
除了在上面的例子中使用的 INNER JOIN（内连接），还可以使用其他几种连接。
下面列出了可以使用的 JOIN 类型，以及它们之间的差异。
JOIN: 如果表中有至少一个匹配，则返回行
LEFT JOIN: 即使右表中没有匹配，也从左表返回所有的行
RIGHT JOIN: 即使左表中没有匹配，也从右表返回所有的行
FULL JOIN: 只要其中一个表中存在匹配，就返回行
*/




————————————————————————————————————————————————————
16.SQL INNER JOIN 关键字

//SQL INNER JOIN 关键字
//在表中存在至少一个匹配时，INNER JOIN 关键字返回行

//INNER JOIN 关键字语法
SELECT column_name(s)
FROM table_name1
INNER JOIN table_name2
ON table_name1.column_name=table_name2.column_name

//注释：INNER JOIN 与 JOIN 是相同的

//内连接（INNER JOIN）实例
//现在，希望列出所有人的定购。
//可以使用下面的 SELECT 语句：
SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons
INNER JOIN Orders
ON Persons.Id_P=Orders.Id_P
ORDER BY Persons.LastName

//INNER JOIN 关键字在表中存在至少一个匹配时返回行。如果 "Persons" 中的行在 "Orders" 中没有匹配，就不会列出这些行。






————————————————————————————————————————————————————
17.SQL LEFT JOIN 关键字

//SQL LEFT JOIN 关键字
//LEFT JOIN 关键字会从左表 (table_name1) 那里返回所有的行，即使在右表 (table_name2) 中没有匹配的行

//LEFT JOIN 关键字语法
SELECT column_name(s)
FROM table_name1
LEFT JOIN table_name2
ON table_name1.column_name=table_name2.column_name
//注释：在某些数据库中， LEFT JOIN 称为 LEFT OUTER JOIN


//左连接（LEFT JOIN）实例
//现在，希望列出所有的人，以及他们的定购 - 如果有的话。
//可以使用下面的 SELECT 语句：
SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons
LEFT JOIN Orders
ON Persons.Id_P=Orders.Id_P
ORDER BY Persons.LastName
//LEFT JOIN 关键字会从左表 (Persons) 那里返回所有的行，即使在右表 (Orders) 中没有匹配的行

/*
结果集：
LastName	FirstName	OrderNo
Adams	    John	    22456
Adams	    John	    24562
Carter	    Thomas	    77895
Carter	    Thomas	    44678
Bush	    George
*/





————————————————————————————————————————————————————
18.SQL RIGHT JOIN 关键字

//SQL RIGHT JOIN 关键字
//RIGHT JOIN 关键字会右表 (table_name2) 那里返回所有的行，即使在左表 (table_name1) 中没有匹配的行

//RIGHT JOIN 关键字语法
SELECT column_name(s)
FROM table_name1
RIGHT JOIN table_name2
ON table_name1.column_name=table_name2.column_name
//注释：在某些数据库中， RIGHT JOIN 称为 RIGHT OUTER JOIN

//右连接（RIGHT JOIN）实例
//现在，希望列出所有的定单，以及定购它们的人 - 如果有的话。
//可以使用下面的 SELECT 语句：
SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons
RIGHT JOIN Orders
ON Persons.Id_P=Orders.Id_P
ORDER BY Persons.LastName
//RIGHT JOIN 关键字会从右表 (Orders) 那里返回所有的行，即使在左表 (Persons) 中没有匹配的行

/*
结果集：
LastName	FirstName	OrderNo
Adams	    John	    22456
Adams	    John	    24562
Carter	    Thomas	    77895
Carter	    Thomas	    44678
 	 	                34764
*/





————————————————————————————————————————————————————
19.SQL FULL JOIN 关键字

//SQL FULL JOIN 关键字
//只要其中某个表存在匹配，FULL JOIN 关键字就会返回行

//FULL JOIN 关键字语法
SELECT column_name(s)
FROM table_name1
FULL JOIN table_name2
ON table_name1.column_name=table_name2.column_name
//注释：在某些数据库中， FULL JOIN 称为 FULL OUTER JOIN


//全连接（FULL JOIN）实例
//现在，希望列出所有的人，以及他们的定单，以及所有的定单，以及定购它们的人。
//可以使用下面的 SELECT 语句：
SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons
FULL JOIN Orders
ON Persons.Id_P=Orders.Id_P
ORDER BY Persons.LastName
//FULL JOIN 关键字会从左表 (Persons) 和右表 (Orders) 那里返回所有的行。
//如果 "Persons" 中的行在表 "Orders" 中没有匹配，或者如果 "Orders" 中的行在表 "Persons" 中没有匹配，这些行同样会列出

/*
结果集：
LastName	FirstName	OrderNo
Adams	    John	    22456
Adams	    John	    24562
Carter	    Thomas	    77895
Carter	    Thomas	    44678
Bush	    George
 	 	                34764
*/








————————————————————————————————————————————————————
20.SQL UNION 和 UNION ALL 操作符
//SQL UNION 操作符
//UNION 操作符用于合并两个或多个 SELECT 语句的结果集。
//请注意，UNION 内部的 SELECT 语句必须拥有相同数量的列。列也必须拥有相似的数据类型。同时，每条 SELECT 语句中的列的顺序必须相同。


//SQL UNION 语法
SELECT column_name(s) FROM table_name1
UNION
SELECT column_name(s) FROM table_name2
//注释：默认地，UNION 操作符选取不同的值。如果允许重复的值，请使用 UNION ALL。

//SQL UNION ALL 语法
SELECT column_name(s) FROM table_name1
UNION ALL
SELECT column_name(s) FROM table_name2

//另外，UNION 结果集中的列名总是等于 UNION 中第一个 SELECT 语句中的列名。


/*
下面的例子中使用的原始表：

Employees_China:

E_ID	E_Name
01	    Zhang, Hua
02	    Wang, Wei
03	    Carter, Thomas
04	    Yang, Ming
----------------------
Employees_USA:

E_ID	E_Name
01	    Adams, John
02	    Bush, George
03	    Carter, Thomas
04	    Gates, Bill
*/

//使用 UNION 命令
//实例
//列出所有在中国和美国的不同的雇员名：
SELECT E_Name FROM Employees_China
UNION
SELECT E_Name FROM Employees_USA
//注释：这个命令无法列出在中国和美国的所有雇员。
//      在上面的例子中，有两个名字相同的雇员，他们当中只有一个人被列出来了。UNION 命令只会选取不同的值
/*
结果
E_Name
Zhang, Hua
Wang, Wei
Carter, Thomas
Yang, Ming
Adams, John
Bush, George
Gates, Bill
*/


//UNION ALL
//UNION ALL 命令和 UNION 命令几乎是等效的，不过 UNION ALL 命令会列出所有的值。
SQL Statement 1
UNION ALL
SQL Statement 2

//使用 UNION ALL 命令
//实例：
//列出在中国和美国的所有的雇员：
SELECT E_Name FROM Employees_China
UNION ALL
SELECT E_Name FROM Employees_USA

/*
结果
E_Name
Zhang, Hua
Wang, Wei
Carter, Thomas
Yang, Ming
Adams, John
Bush, George
Carter, Thomas
Gates, Bill
*/






————————————————————————————————————————————————————
21.SQL SELECT INTO 语句
















————————————————————————————————————————————————————
22.


















————————————————————————————————————————————————————
23.


















————————————————————————————————————————————————————
24.


















————————————————————————————————————————————————————
25.
















————————————————————————————————————————————————————
26.


















————————————————————————————————————————————————————
27.
















————————————————————————————————————————————————————
28.


















————————————————————————————————————————————————————
29.
















————————————————————————————————————————————————————
30.


















————————————————————————————————————————————————————
31.
















————————————————————————————————————————————————————
32.


















————————————————————————————————————————————————————
33.


















————————————————————————————————————————————————————
34.


















————————————————————————————————————————————————————
35.
















————————————————————————————————————————————————————
36.


















————————————————————————————————————————————————————
37.
















————————————————————————————————————————————————————
38.


















————————————————————————————————————————————————————
39.










————————————————————————————————————————————————————
40.


















————————————————————————————————————————————————————
41.
















————————————————————————————————————————————————————
42.


















————————————————————————————————————————————————————
43.


















————————————————————————————————————————————————————
44.


















————————————————————————————————————————————————————
45.
















————————————————————————————————————————————————————
46.


















————————————————————————————————————————————————————
47.
















————————————————————————————————————————————————————
48.


















————————————————————————————————————————————————————
49.










————————————————————————————————————————————————————
50.


















————————————————————————————————————————————————————
51.
















————————————————————————————————————————————————————
52.


















————————————————————————————————————————————————————
53.


















————————————————————————————————————————————————————
54.


















————————————————————————————————————————————————————
55.
















————————————————————————————————————————————————————
56.


















————————————————————————————————————————————————————
57.
















————————————————————————————————————————————————————
58.


















————————————————————————————————————————————————————
59.










————————————————————————————————————————————————————
60.


















————————————————————————————————————————————————————
61.
















————————————————————————————————————————————————————
62.


















————————————————————————————————————————————————————
63.


















————————————————————————————————————————————————————
64.


















————————————————————————————————————————————————————
65.
















————————————————————————————————————————————————————
66.


















————————————————————————————————————————————————————
67.
















————————————————————————————————————————————————————
68.


















————————————————————————————————————————————————————
69.
































































































































































































































































































































































































































