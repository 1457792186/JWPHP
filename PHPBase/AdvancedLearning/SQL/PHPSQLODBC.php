<?php
//*************************************PHP Database ODBC
//ODBC 是一种应用程序编程接口（Application Programming Interface，API），使有能力连接到某个数据源（比如一个 MS Access 数据库）


//*************************************创建 ODBC 连接
//通过一个 ODBC 连接，可以连接到网络中的任何计算机上的任何数据库，只要 ODBC 连接是可用的。

//这是创建到达 MS Access 数据的 ODBC 连接的方法：
//1.在控制面板中打开管理工具
//2.双击其中的数据源 (ODBC) 图标
//3.选择系统 DSN 选项卡
//4.点击系统 DSN 选项卡中的“添加”按钮
//5.选择 Microsoft Access Driver。点击完成。
//6.在下一个界面，点击“选择”来定位数据库。
//7.为这个数据库取一个数据源名 (DSN)。
//8.点击确定。

//请注意，必须在网站所在的计算机上完成这个配置。
//如果计算机上正在运行 Internet 信息服务器 (IIS)，上面的指令会生效
//但是假如网站位于远程服务器，必须拥有对该服务器的物理访问权限，或者请主机提供商为建立 DSN。


//*************************************连接到 ODBC
//odbc_connect() 函数用于连接到 ODBC 数据源。
//该函数有四个参数：数据源名、用户名、密码以及可选的指针类型参数。
//odbc_exec() 函数用于执行 SQL 语句

//例子
//下面的例子创建了到达名为 northwind 的 DSN 的连接，没有用户名和密码。然后创建并执行一条 SQL 语句
$conn=odbc_connect('northwind','','');
$sql="SELECT * FROM customers";
$rs=odbc_exec($conn,$sql);


//*************************************取回记录
//odbc_fetch_row() 函数用于从结果集中返回记录。如果能够返回行，则返回 true，否则返回 false。
//该函数有两个参数：ODBC 结果标识符和可选的行号
odbc_fetch_row($rs)


//*************************************从记录中取回字段
//odbc_result() 函数用于从记录中读取字段。该函数有两个参数：ODBC 结果标识符和字段编号或名称。
//下面的代码行从记录中返回第一个字段的值
$compname=odbc_result($rs,1);
//The code line below returns the value of a field called "CompanyName":
$compname=odbc_result($rs,"CompanyName");


//*************************************关闭 ODBC 连接
//odbc_close()函数用于关闭 ODBC 连接
odbc_close($conn);


//*************************************ODBC 实例
//下面的例子展示了如何首先创建一个数据库连接，然后是结果集，然后在 HTML 表格中显示数据
$conn=odbc_connect('northwind','','');
if (!$conn)
{exit("Connection Failed: " . $conn);}
$sql="SELECT * FROM customers";
$rs=odbc_exec($conn,$sql);
if (!$rs)
{exit("Error in SQL");}
echo "<table><tr>";
echo "<th>Companyname</th>";
echo "<th>Contactname</th></tr>";
while (odbc_fetch_row($rs))
{
    $compname=odbc_result($rs,"CompanyName");
    $conname=odbc_result($rs,"ContactName");
    echo "<tr><td>$compname</td>";
    echo "<td>$conname</td></tr>";
}
odbc_close($conn);
echo "</table>";


?>