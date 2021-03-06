<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL CHECK 约束

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