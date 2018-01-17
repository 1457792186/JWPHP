<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL 通配符
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
