<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL DEFAULT 约束

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