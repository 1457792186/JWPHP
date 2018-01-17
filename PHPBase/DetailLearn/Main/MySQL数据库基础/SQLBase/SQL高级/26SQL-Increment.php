<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */

SQL AUTO INCREMENT 字段
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

