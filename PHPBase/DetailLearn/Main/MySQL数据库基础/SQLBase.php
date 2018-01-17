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

//SQL SELECT INTO 语句可用于创建表的备份复件。
//SELECT INTO 语句
//SELECT INTO 语句从一个表中选取数据，然后把数据插入另一个表中。
//SELECT INTO 语句常用于创建表的备份复件或者用于对记录进行存档。
//SQL SELECT INTO 语法
//可以把所有的列插入新表：
SELECT *
INTO new_table_name [IN externaldatabase]
FROM old_tablename
//或者只把希望的列插入新表：
SELECT column_name(s)
INTO new_table_name [IN externaldatabase]
FROM old_tablename


//SQL SELECT INTO 实例 - 制作备份复件
//下面的例子会制作 "Persons" 表的备份复件：
SELECT *
INTO Persons_backup
FROM Persons
//IN 子句可用于向另一个数据库中拷贝表：
SELECT *
INTO Persons IN 'Backup.mdb'
FROM Persons
//如果希望拷贝某些域，可以在 SELECT 语句后列出这些域：
SELECT LastName,FirstName
INTO Persons_backup
FROM Persons


//SQL SELECT INTO 实例 - 带有 WHERE 子句
//也可以添加 WHERE 子句。
//下面的例子通过从 "Persons" 表中提取居住在 "Beijing" 的人的信息，创建了一个带有两个列的名为 "Persons_backup" 的表：
SELECT LastName,Firstname
INTO Persons_backup
FROM Persons
WHERE City='Beijing'


//SQL SELECT INTO 实例 - 被连接的表
//从一个以上的表中选取数据也是可以做到的。
//下面的例子会创建一个名为 "Persons_Order_Backup" 的新表，其中包含了从 Persons 和 Orders 两个表中取得的信息：
SELECT Persons.LastName,Orders.OrderNo
INTO Persons_Order_Backup
FROM Persons
INNER JOIN Orders
ON Persons.Id_P=Orders.Id_P




————————————————————————————————————————————————————
22.SQL CREATE DATABASE 语句

//CREATE DATABASE 语句
//CREATE DATABASE 用于创建数据库。
//SQL CREATE DATABASE 语法
CREATE DATABASE database_name


//SQL CREATE DATABASE 实例
//现在希望创建一个名为 "my_db" 的数据库。
//使用下面的 CREATE DATABASE 语句：
CREATE DATABASE my_db
//可以通过 CREATE TABLE 来添加数据库表







————————————————————————————————————————————————————
23.SQL CREATE TABLE 语句

//CREATE TABLE 语句
//CREATE TABLE 语句用于创建数据库中的表。
//SQL CREATE TABLE 语法
CREATE TABLE 表名称
(
    列名称1 数据类型,
列名称2 数据类型,
列名称3 数据类型,
....
)


//数据类型（data_type）规定了列可容纳何种数据类型。下面的表格包含了SQL中最常用的数据类型：
/*
数据类型	                描述
integer(size)           仅容纳整数。在括号内规定数字的最大位数。
int(size)               同上
smallint(size)          同上
tinyint(size)           同上

decimal(size,d)         容纳带有小数的数字。"size" 规定数字的最大位数。"d" 规定小数点右侧的最大位数。
numeric(size,d)         同上

char(size)              容纳固定长度的字符串（可容纳字母、数字以及特殊字符）。在括号中规定字符串的长度。
varchar(size)           容纳可变长度的字符串（可容纳字母、数字以及特殊的字符）。在括号中规定字符串的最大长度。
date(yyyymmdd)	        容纳日期。
*/


//SQL CREATE TABLE 实例
//本例演示如何创建名为 "Person" 的表。
//该表包含 5 个列，列名分别是："Id_P"、"LastName"、"FirstName"、"Address" 以及 "City"：
CREATE TABLE Persons
(
    Id_P int,
LastName varchar(255),
FirstName varchar(255),
Address varchar(255),
City varchar(255)
)
//Id_P 列的数据类型是 int，包含整数。其余 4 列的数据类型是 varchar，最大长度为 255 个字符。
//空的 "Persons" 表类似这样：
/*
Id_P	LastName	FirstName	Address	City

*/
//可使用 INSERT INTO 语句向空表写入数据。







————————————————————————————————————————————————————
24.SQL 约束 (Constraints)

//SQL 约束
//约束用于限制加入表的数据的类型。
//可以在创建表时规定约束（通过 CREATE TABLE 语句），或者在表创建之后也可以（通过 ALTER TABLE 语句）。
//将主要探讨以下几种约束：
NOT NULL
UNIQUE
PRIMARY KEY
FOREIGN KEY
CHECK
DEFAULT
注释：在下面，会详细讲解每一种约束










————————————————————————————————————————————————————
25.SQL NOT NULL 约束

//SQL NOT NULL 约束
//NOT NULL 约束强制列不接受 NULL 值。
//NOT NULL 约束强制字段始终包含值。这意味着，如果不向字段添加值，就无法插入新记录或者更新记录。
//下面的 SQL 语句强制 "Id_P" 列和 "LastName" 列不接受 NULL 值：
CREATE TABLE Persons
(
    Id_P int NOT NULL,
LastName varchar(255) NOT NULL,
FirstName varchar(255),
Address varchar(255),
City varchar(255)
)







————————————————————————————————————————————————————
26.SQL UNIQUE 约束

//SQL UNIQUE 约束
//UNIQUE 约束唯一标识数据库表中的每条记录。
//UNIQUE 和 PRIMARY KEY 约束均为列或列集合提供了唯一性的保证。
//PRIMARY KEY 拥有自动定义的 UNIQUE 约束。
//注意，每个表可以有多个 UNIQUE 约束，但是每个表只能有一个 PRIMARY KEY 约束


//SQL UNIQUE Constraint on CREATE TABLE
//下面的 SQL 在 "Persons" 表创建时在 "Id_P" 列创建 UNIQUE 约束：


MySQL:
CREATE TABLE Persons
(
    Id_P int NOT NULL,
LastName varchar(255) NOT NULL,
FirstName varchar(255),
Address varchar(255),
City varchar(255),
UNIQUE (Id_P)
)


//SQL Server / Oracle / MS Access:
CREATE TABLE Persons
(
    Id_P int NOT NULL UNIQUE,
LastName varchar(255) NOT NULL,
FirstName varchar(255),
Address varchar(255),
City varchar(255)
)


//如果需要命名 UNIQUE 约束，以及为多个列定义 UNIQUE 约束，使用下面的 SQL 语法：
//MySQL / SQL Server / Oracle / MS Access:
CREATE TABLE Persons
(
    Id_P int NOT NULL,
LastName varchar(255) NOT NULL,
FirstName varchar(255),
Address varchar(255),
City varchar(255),
CONSTRAINT uc_PersonID UNIQUE (Id_P,LastName)
)



//SQL UNIQUE Constraint on ALTER TABLE
//当表已被创建时，如需在 "Id_P" 列创建 UNIQUE 约束，使用下列 SQL
//MySQL / SQL Server / Oracle / MS Access:
ALTER TABLE Persons
ADD UNIQUE (Id_P)
//如需命名 UNIQUE 约束，并定义多个列的 UNIQUE 约束，请使用下面的 SQL 语法：
//MySQL / SQL Server / Oracle / MS Access:
ALTER TABLE Persons
ADD CONSTRAINT uc_PersonID UNIQUE (Id_P,LastName)


//撤销 UNIQUE 约束
//如需撤销 UNIQUE 约束，请使用下面的 SQL：
//MySQL:
ALTER TABLE Persons
DROP INDEX uc_PersonID
//SQL Server / Oracle / MS Access:
ALTER TABLE Persons
DROP CONSTRAINT uc_PersonID







————————————————————————————————————————————————————
27.SQL PRIMARY KEY 约束

//SQL PRIMARY KEY 约束
//PRIMARY KEY 约束唯一标识数据库表中的每条记录。
//主键必须包含唯一的值。
//主键列不能包含 NULL 值。
//每个表都应该有一个主键，并且每个表只能有一个主键。

//SQL PRIMARY KEY Constraint on CREATE TABLE
//下面的 SQL 在 "Persons" 表创建时在 "Id_P" 列创建 PRIMARY KEY 约束


//MySQL:
CREATE TABLE Persons
(
    Id_P int NOT NULL,
LastName varchar(255) NOT NULL,
FirstName varchar(255),
Address varchar(255),
City varchar(255),
PRIMARY KEY (Id_P)
)
//SQL Server / Oracle / MS Access:
CREATE TABLE Persons
(
    Id_P int NOT NULL PRIMARY KEY,
LastName varchar(255) NOT NULL,
FirstName varchar(255),
Address varchar(255),
City varchar(255)
)
//如果需要命名 PRIMARY KEY 约束，以及为多个列定义 PRIMARY KEY 约束，使用下面的 SQL 语法：
//MySQL / SQL Server / Oracle / MS Access:
CREATE TABLE Persons
(
    Id_P int NOT NULL,
LastName varchar(255) NOT NULL,
FirstName varchar(255),
Address varchar(255),
City varchar(255),
CONSTRAINT pk_PersonID PRIMARY KEY (Id_P,LastName)
)



//SQL PRIMARY KEY Constraint on ALTER TABLE
//如果在表已存在的情况下为 "Id_P" 列创建 PRIMARY KEY 约束，请使用下面的 SQL：
//MySQL / SQL Server / Oracle / MS Access:
ALTER TABLE Persons
ADD PRIMARY KEY (Id_P)
//如果需要命名 PRIMARY KEY 约束，以及为多个列定义 PRIMARY KEY 约束，请使用下面的 SQL 语法：
//MySQL / SQL Server / Oracle / MS Access:
ALTER TABLE Persons
ADD CONSTRAINT pk_PersonID PRIMARY KEY (Id_P,LastName)
//注释：如果使用 ALTER TABLE 语句添加主键，必须把主键列声明为不包含 NULL 值（在表首次创建时）。


//撤销 PRIMARY KEY 约束
//如需撤销 PRIMARY KEY 约束，请使用下面的 SQL：
//MySQL:
ALTER TABLE Persons
DROP PRIMARY KEY
//SQL Server / Oracle / MS Access:
ALTER TABLE Persons
DROP CONSTRAINT pk_PersonID









————————————————————————————————————————————————————
28.SQL FOREIGN KEY 约束
//SQL FOREIGN KEY 约束
//一个表中的 FOREIGN KEY 指向另一个表中的 PRIMARY KEY。

//通过一个例子来解释外键。请看下面两个表：
/*
"Persons" 表：
Id_P	LastName	FirstName	Address	        City
1	    Adams	    John	    Oxford Street	London
2	    Bush	    George	    Fifth Avenue	New York
3	    Carter	    Thomas	    Changan Street	Beijing

"Orders" 表：
Id_O	OrderNo	Id_P
1	    77895	3
2	    44678	3
3	    22456	1
4	    24562	1

请注意，"Orders" 中的 "Id_P" 列指向 "Persons" 表中的 "Id_P" 列。
"Persons" 表中的 "Id_P" 列是 "Persons" 表中的 PRIMARY KEY。
"Orders" 表中的 "Id_P" 列是 "Orders" 表中的 FOREIGN KEY。
FOREIGN KEY 约束用于预防破坏表之间连接的动作。
FOREIGN KEY 约束也能防止非法数据插入外键列，因为它必须是它指向的那个表中的值之一

*/


//SQL FOREIGN KEY Constraint on CREATE TABLE
//下面的 SQL 在 "Orders" 表创建时为 "Id_P" 列创建 FOREIGN KEY：
//MySQL:
CREATE TABLE Orders
(
    Id_O int NOT NULL,
    OrderNo int NOT NULL,
    Id_P int,
    PRIMARY KEY (Id_O),
    FOREIGN KEY (Id_P) REFERENCES Persons(Id_P)
)
//SQL Server / Oracle / MS Access:
CREATE TABLE Orders
(
    Id_O int NOT NULL PRIMARY KEY,
    OrderNo int NOT NULL,
    Id_P int FOREIGN KEY REFERENCES Persons(Id_P)
)

//如果需要命名 FOREIGN KEY 约束，以及为多个列定义 FOREIGN KEY 约束，请使用下面的 SQL 语法：
//MySQL / SQL Server / Oracle / MS Access:

CREATE TABLE Orders
(
    Id_O int NOT NULL,
    OrderNo int NOT NULL,
    Id_P int,
    PRIMARY KEY (Id_O),
    CONSTRAINT fk_PerOrders FOREIGN KEY (Id_P) REFERENCES Persons(Id_P)
)


//SQL FOREIGN KEY Constraint on ALTER TABLE
//如果在 "Orders" 表已存在的情况下为 "Id_P" 列创建 FOREIGN KEY 约束，请使用下面的 SQL：
//MySQL / SQL Server / Oracle / MS Access:
ALTER TABLE Orders
ADD FOREIGN KEY (Id_P)
REFERENCES Persons(Id_P)

//如果需要命名 FOREIGN KEY 约束，以及为多个列定义 FOREIGN KEY 约束，请使用下面的 SQL 语法：
//MySQL / SQL Server / Oracle / MS Access:
ALTER TABLE Orders
ADD CONSTRAINT fk_PerOrders
FOREIGN KEY (Id_P)
REFERENCES Persons(Id_P)


//撤销 FOREIGN KEY 约束
//如需撤销 FOREIGN KEY 约束，请使用下面的 SQL：
//MySQL:
ALTER TABLE Orders
DROP FOREIGN KEY fk_PerOrders
//SQL Server / Oracle / MS Access:
ALTER TABLE Orders
DROP CONSTRAINT fk_PerOrders






————————————————————————————————————————————————————
29.SQL CHECK 约束

//SQL CHECK 约束
//CHECK 约束用于限制列中的值的范围。
//如果对单个列定义 CHECK 约束，那么该列只允许特定的值。
//如果对一个表定义 CHECK 约束，那么此约束会在特定的列中对值进行限制。

//SQL CHECK Constraint on CREATE TABLE
//下面的 SQL 在 "Persons" 表创建时为 "Id_P" 列创建 CHECK 约束。CHECK 约束规定 "Id_P" 列必须只包含大于 0 的整数。
//My SQL:
CREATE TABLE Persons
(
    Id_P int NOT NULL,
LastName varchar(255) NOT NULL,
FirstName varchar(255),
Address varchar(255),
City varchar(255),
CHECK (Id_P>0)
)
//SQL Server / Oracle / MS Access:
CREATE TABLE Persons
(
    Id_P int NOT NULL CHECK (Id_P>0),
LastName varchar(255) NOT NULL,
FirstName varchar(255),
Address varchar(255),
City varchar(255)
)

//如果需要命名 CHECK 约束，以及为多个列定义 CHECK 约束，请使用下面的 SQL 语法：
//MySQL / SQL Server / Oracle / MS Access:
CREATE TABLE Persons
(
    Id_P int NOT NULL,
LastName varchar(255) NOT NULL,
FirstName varchar(255),
Address varchar(255),
City varchar(255),
CONSTRAINT chk_Person CHECK (Id_P>0 AND City='Sandnes')
)

//SQL CHECK Constraint on ALTER TABLE
//如果在表已存在的情况下为 "Id_P" 列创建 CHECK 约束，请使用下面的 SQL：
//MySQL / SQL Server / Oracle / MS Access:
ALTER TABLE Persons
ADD CHECK (Id_P>0)

//如果需要命名 CHECK 约束，以及为多个列定义 CHECK 约束，请使用下面的 SQL 语法：
//MySQL / SQL Server / Oracle / MS Access:
ALTER TABLE Persons
ADD CONSTRAINT chk_Person CHECK (Id_P>0 AND City='Sandnes')


//撤销 CHECK 约束
//如需撤销 CHECK 约束，请使用下面的 SQL：
//MySQL:
ALTER TABLE Persons
DROP CHECK chk_Person
//SQL Server / Oracle / MS Access:
ALTER TABLE Persons
DROP CONSTRAINT chk_Person







————————————————————————————————————————————————————
30.SQL DEFAULT 约束

//SQL DEFAULT 约束
//DEFAULT 约束用于向列中插入默认值。
//如果没有规定其他的值，那么会将默认值添加到所有的新记录

//SQL DEFAULT Constraint on CREATE TABLE
//下面的 SQL 在 "Persons" 表创建时为 "City" 列创建 DEFAULT 约束：
//My SQL / SQL Server / Oracle / MS Access:
CREATE TABLE Persons
(
    Id_P int NOT NULL,
LastName varchar(255) NOT NULL,
FirstName varchar(255),
Address varchar(255),
City varchar(255) DEFAULT 'Sandnes'
)
//通过使用类似 GETDATE() 这样的函数，DEFAULT 约束也可以用于插入系统值：
CREATE TABLE Orders
(
    Id_O int NOT NULL,
OrderNo int NOT NULL,
Id_P int,
OrderDate date DEFAULT GETDATE()
)


//SQL DEFAULT Constraint on ALTER TABLE
//如果在表已存在的情况下为 "City" 列创建 DEFAULT 约束，请使用下面的 SQL：
//MySQL:
ALTER TABLE Persons
ALTER City SET DEFAULT 'SANDNES'
//SQL Server / Oracle / MS Access:
ALTER TABLE Persons
ALTER COLUMN City SET DEFAULT 'SANDNES'


//撤销 DEFAULT 约束
//如需撤销 DEFAULT 约束，请使用下面的 SQL：
//MySQL:
ALTER TABLE Persons
ALTER City DROP DEFAULT
//SQL Server / Oracle / MS Access:
ALTER TABLE Persons
ALTER COLUMN City DROP DEFAULT






————————————————————————————————————————————————————
31.SQL CREATE INDEX 语句

//CREATE INDEX 语句用于在表中创建索引。
//在不读取整个表的情况下，索引使数据库应用程序可以更快地查找数据

//索引
//可以在表中创建索引，以便更加快速高效地查询数据。
//用户无法看到索引，它们只能被用来加速搜索/查询。
//注释：更新一个包含索引的表需要比更新一个没有索引的表更多的时间，这是由于索引本身也需要更新。因此，理想的做法是仅仅在常常被搜索的列（以及表）上面创建索引。

//SQL CREATE INDEX 语法
//在表上创建一个简单的索引。允许使用重复的值：
CREATE INDEX index_name
ON table_name (column_name)
//注释："column_name" 规定需要索引的列。


//SQL CREATE UNIQUE INDEX 语法
//在表上创建一个唯一的索引。唯一的索引意味着两个行不能拥有相同的索引值。
CREATE UNIQUE INDEX index_name
ON table_name (column_name)


//CREATE INDEX 实例
//本例会创建一个简单的索引，名为 "PersonIndex"，在 Person 表的 LastName 列：
CREATE INDEX PersonIndex
ON Person (LastName)
//如果希望以降序索引某个列中的值，您可以在列名称之后添加保留字 DESC：
CREATE INDEX PersonIndex
ON Person (LastName DESC)
//假如希望索引不止一个列，您可以在括号中列出这些列的名称，用逗号隔开：
CREATE INDEX PersonIndex
ON Person (LastName, FirstName)








————————————————————————————————————————————————————
32.SQL 撤销索引、表以及数据库(SQL DROP语句)

//通过使用 DROP 语句，可以轻松地删除索引、表和数据库。
//SQL DROP INDEX 语句
//可以使用 DROP INDEX 命令删除表格中的索引

//用于 Microsoft SQLJet (以及 Microsoft Access) 的语法:
DROP INDEX index_name ON table_name
//用于 MS SQL Server 的语法:
DROP INDEX table_name.index_name
//用于 IBM DB2 和 Oracle 语法:
DROP INDEX index_name
//用于 MySQL 的语法:
ALTER TABLE table_name DROP INDEX index_name


//SQL DROP TABLE 语句
//DROP TABLE 语句用于删除表（表的结构、属性以及索引也会被删除）：
DROP TABLE 表名称

//SQL DROP DATABASE 语句
//DROP DATABASE 语句用于删除数据库：
DROP DATABASE 数据库名称

//SQL TRUNCATE TABLE 语句
//如果仅仅需要除去表内的数据，但并不删除表本身，那么我们该如何做呢？
//使用 TRUNCATE TABLE 命令（仅仅删除表格中的数据）：
TRUNCATE TABLE 表名称





————————————————————————————————————————————————————
33.SQL ALTER TABLE 语句

//ALTER TABLE 语句
//ALTER TABLE 语句用于在已有的表中添加、修改或删除列


//SQL ALTER TABLE 语法
//如需在表中添加列，请使用下列语法:
ALTER TABLE table_name
ADD column_name datatype
//要删除表中的列，请使用下列语法：
ALTER TABLE table_name
DROP COLUMN column_name
//注释：某些数据库系统不允许这种在数据库表中删除列的方式 (DROP COLUMN column_name)。
//要改变表中列的数据类型，请使用下列语法：
ALTER TABLE table_name
ALTER COLUMN column_name datatype


/*
原始的表 (用在例子中的)：
Persons 表:
Id	LastName	FirstName	Address	        City
1	Adams	    John	    Oxford Street	London
2	Bush	    George	    Fifth Avenue	New York
3	Carter	    Thomas	    Changan Street	Beijing
*/

//SQL ALTER TABLE 实例
//现在，希望在表 "Persons" 中添加一个名为 "Birthday" 的新列。
//使用下列 SQL 语句：
ALTER TABLE Persons
ADD Birthday date

//注意，新列 "Birthday" 的类型是 date，可以存放日期。数据类型规定列中可以存放的数据的类型。
//新的 "Persons" 表类似这样：
/*
Id	LastName	FirstName	Address	City	Birthday
1	Adams	    John	    Oxford Street	London
2	Bush	    George	    Fifth Avenue	New York
3	Carter	    Thomas	    Changan Street	Beijing
*/


//改变数据类型实例
//现在希望改变 "Persons" 表中 "Birthday" 列的数据类型。
//使用下列 SQL 语句：
ALTER TABLE Persons
ALTER COLUMN Birthday year
//请注意，"Birthday" 列的数据类型是 year，可以存放 2 位或 4 位格式的年份


//DROP COLUMN 实例
//接下来，删除 "Person" 表中的 "Birthday" 列：
ALTER TABLE Person
DROP COLUMN Birthday
/*
Persons 表会成为这样:
Id	LastName	FirstName	Address	        City
1	Adams	    John	    Oxford Street	London
2	Bush	    George	    Fifth Avenue	New York
3	Carter	    Thomas	    Changan Street	Beijing
*/







————————————————————————————————————————————————————
34.SQL AUTO INCREMENT 字段
//Auto-increment 会在新记录插入表中时生成一个唯一的数字

//AUTO INCREMENT 字段
//通常希望在每次插入新记录时，自动地创建主键字段的值。
//可以在表中创建一个 auto-increment 字段。

//用于 MySQL 的语法
//下列 SQL 语句把 "Persons" 表中的 "P_Id" 列定义为 auto-increment 主键：
CREATE TABLE Persons
(
    P_Id int NOT NULL AUTO_INCREMENT,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255),
    PRIMARY KEY (P_Id)
)
//MySQL 使用 AUTO_INCREMENT 关键字来执行 auto-increment 任务。
//默认地，AUTO_INCREMENT 的开始值是 1，每条新记录递增 1。
//要让 AUTO_INCREMENT 序列以其他的值起始，请使用下列 SQL 语法：
ALTER TABLE Persons AUTO_INCREMENT=100

//要在 "Persons" 表中插入新记录，不必为 "P_Id" 列规定值（会自动添加一个唯一的值）
INSERT INTO Persons (FirstName,LastName)
VALUES ('Bill','Gates')
//上面的 SQL 语句会在 "Persons" 表中插入一条新记录。"P_Id" 会被赋予一个唯一的值。"FirstName" 会被设置为 "Bill"，"LastName" 列会被设置为 "Gates"。



//用于 SQL Server 的语法
//下列 SQL 语句把 "Persons" 表中的 "P_Id" 列定义为 auto-increment 主键：
CREATE TABLE Persons
(
    P_Id int PRIMARY KEY IDENTITY,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255)
)
//MS SQL 使用 IDENTITY 关键字来执行 auto-increment 任务。
//默认地，IDENTITY 的开始值是 1，每条新记录递增 1。
//要规定 "P_Id" 列以 20 起始且递增 10，请把 identity 改为 IDENTITY(20,10)
//要在 "Persons" 表中插入新记录，不必为 "P_Id" 列规定值（会自动添加一个唯一的值）：
INSERT INTO Persons (FirstName,LastName)
VALUES ('Bill','Gates')
//上面的 SQL 语句会在 "Persons" 表中插入一条新记录。"P_Id" 会被赋予一个唯一的值。"FirstName" 会被设置为 "Bill"，"LastName" 列会被设置为 "Gates"。



//用于 Access 的语法
//下列 SQL 语句把 "Persons" 表中的 "P_Id" 列定义为 auto-increment 主键：
CREATE TABLE Persons
(
    P_Id int PRIMARY KEY AUTOINCREMENT,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255)
)
//MS Access 使用 AUTOINCREMENT 关键字来执行 auto-increment 任务。
//默认地，AUTOINCREMENT 的开始值是 1，每条新记录递增 1。
//要规定 "P_Id" 列以 20 起始且递增 10，请把 autoincrement 改为 AUTOINCREMENT(20,10)
//要在 "Persons" 表中插入新记录，不必为 "P_Id" 列规定值（会自动添加一个唯一的值）：
INSERT INTO Persons (FirstName,LastName)
VALUES ('Bill','Gates')
//上面的 SQL 语句会在 "Persons" 表中插入一条新记录。"P_Id" 会被赋予一个唯一的值。"FirstName" 会被设置为 "Bill"，"LastName" 列会被设置为 "Gates"。



//用于 Oracle 的语法
//在 Oracle 中，代码稍微复杂一点。
//必须通过 sequence 对创建 auto-increment 字段（该对象生成数字序列）。
//请使用下面的 CREATE SEQUENCE 语法：
CREATE SEQUENCE seq_person
MINVALUE 1
START WITH 1
INCREMENT BY 1
CACHE 10
//上面的代码创建名为 seq_person 的序列对象，它以 1 起始且以 1 递增。该对象缓存 10 个值以提高性能。CACHE 选项规定了为了提高访问速度要存储多少个序列值。
//要在 "Persons" 表中插入新记录，我们必须使用 nextval 函数（该函数从 seq_person 序列中取回下一个值）：
INSERT INTO Persons (P_Id,FirstName,LastName)
VALUES (seq_person.nextval,'Lars','Monsen')
//上面的 SQL 语句会在 "Persons" 表中插入一条新记录。"P_Id" 的赋值是来自 seq_person 序列的下一个数字。"FirstName" 会被设置为 "Bill"，"LastName" 列会被设置为 "Gates"。





————————————————————————————————————————————————————
35.SQL VIEW（视图）

//视图是可视化的表。
//讲解如何创建、更新和删除视图

//SQL CREATE VIEW 语句
//什么是视图？
//在 SQL 中，视图是基于 SQL 语句的结果集的可视化的表。
//视图包含行和列，就像一个真实的表。视图中的字段就是来自一个或多个数据库中的真实的表中的字段。
//  可以向视图添加 SQL 函数、WHERE 以及 JOIN 语句，也可以提交数据，就像这些来自于某个单一的表。
//注释：数据库的设计和结构不会受到视图中的函数、where 或 join 语句的影响。


//SQL CREATE VIEW 语法
CREATE VIEW view_name AS
SELECT column_name(s)
FROM table_name
WHERE condition
//注释：视图总是显示最近的数据。每当用户查询视图时，数据库引擎通过使用 SQL 语句来重建数据

//SQL CREATE VIEW 实例
//可以从某个查询内部、某个存储过程内部，或者从另一个视图内部来使用视图。通过向视图添加函数、join 等等，可以向用户精确地提交希望提交的数据。
//样本数据库 Northwind 拥有一些被默认安装的视图。视图 "Current Product List" 会从 Products 表列出所有正在使用的产品。这个视图使用下列 SQL 创建：
CREATE VIEW [Current Product List] AS
SELECT ProductID,ProductName
FROM Products
WHERE Discontinued=No
//可以查询上面这个视图：
SELECT * FROM [Current Product List]

//Northwind 样本数据库的另一个视图会选取 Products 表中所有单位价格高于平均单位价格的产品：
CREATE VIEW [Products Above Average Price] AS
SELECT ProductName,UnitPrice
FROM Products
WHERE UnitPrice>(SELECT AVG(UnitPrice) FROM Products)
//可以像这样查询上面这个视图：
SELECT * FROM [Products Above Average Price]


//另一个来自 Northwind 数据库的视图实例会计算在 1997 年每个种类的销售总数。请注意，这个视图会从另一个名为 "Product Sales for 1997" 的视图那里选取数据：
CREATE VIEW [Category Sales For 1997] AS
SELECT DISTINCT CategoryName,Sum(ProductSales) AS CategorySales
FROM [Product Sales for 1997]
GROUP BY CategoryName

//可以像这样查询上面这个视图：
SELECT * FROM [Category Sales For 1997]
//也可以向查询添加条件。现在，仅仅需要查看 "Beverages" 类的全部销量：
SELECT * FROM [Category Sales For 1997]
WHERE CategoryName='Beverages'


//SQL 更新视图
//可以使用下面的语法来更新视图：
SQL CREATE OR REPLACE VIEW Syntax
CREATE OR REPLACE VIEW view_name AS
SELECT column_name(s)
FROM table_name
WHERE condition

//现在，希望向 "Current Product List" 视图添加 "Category" 列。将通过下列 SQL 更新视图：
CREATE VIEW [Current Product List] AS
SELECT ProductID,ProductName,Category
FROM Products
WHERE Discontinued=No


//SQL 撤销视图
//可以通过 DROP VIEW 命令来删除视图。
SQL DROP VIEW Syntax
DROP VIEW view_name



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
































































































































































































































































































































































































































