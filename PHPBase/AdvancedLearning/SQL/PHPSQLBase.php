<?php
//*************************************PHP MySQL 简介
//MySQL 是最流行的开源数据库服务器。


//*************************************数据库表
//数据库通常包含一个或多个表。每个表都一个名称（比如 "Customers" 或 "Orders"）。每个表包含带有数据的记录（行）。
//下面是一个名为 "Persons" 的表的例子
/*
LastName	FirstName	    Address	        City
Hansen	    Ola	            Timoteivn 10	Sandnes
Svendson	Tove	        Borgvn 23	    Sandnes
Pettersen	Kari	        Storgt 20	    Stavanger
*/
//上面的表含有三个记录（每个记录是一个人）和四个列（LastName, FirstName, Address 以及 City）


//*************************************查询
//查询是一种询问或请求。
//通过 MySQL，我们可以向数据库查询具体的信息，并得到返回的记录集。
//请看下面的查询：
SELECT LastName FROM Persons
//上面的查询选取了 Persons 表中 LastName 列的所有数据，并返回类似这样的记录集
/*
LastName
Hansen
Svendson
Pettersen
*/


//*************************************下载 MySQL 数据库
//如果PHP 服务器没有 MySQL 数据库，可以在此下载 MySQL：http://www.mysql.com/downloads/index.html


//*************************************Facts About MySQL Database
//关于 MySQL 的一点很棒的特性是，可以对它进行缩减，来支持嵌入的数据库应用程序。
//也许正因如此，许多人认为 MySQL 仅仅能处理中小型的系统。
//事实上，对于那些支持巨大数据和访问量的网站，MySQL 是事实上的标准数据库（比如 Friendster, Yahoo, Google）。
//这个地址提供了使用 MySQL 的公司的概览：http://www.mysql.com/customers/。





?>