<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */

SQL UNIQUE 约束

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