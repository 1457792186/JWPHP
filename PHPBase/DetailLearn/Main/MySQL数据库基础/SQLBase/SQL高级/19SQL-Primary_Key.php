<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL PRIMARY KEY 约束

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