<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */

SQL ORDER BY 子句
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