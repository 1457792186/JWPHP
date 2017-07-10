<?php
//见AdvancedLearning/SQL

//PHP访问MySQL数据库一般步骤如下:

//1.连接MySQL服务器
//使用mysqli_connect()函数建立与MySQL服务器的连接
mysqli_connect('hostname','username','password');
//'hostname'为MySQL服务器的主机名(或IP),若省略端口号,默认为3306
//'username'为登录MySQL服务器的用户名
//'password'为MySQL服务器的用户密码
//该函数的返回值表示这个数据库的连接。如果返回成功免责函数返回一个资源,为之后执行SQL指令做准备

//实例:使用mysqli_connect()函数在本地创建与MySQL服务器的连接
$link = mysqli_connect('localhost','root','123') or die('不能连接到数据库'.mysqli_connect_error()); //连接数据库
if ($link){         //连接成功显示,可省略
    echo '数据库连接成功';
}
//可以在mysqli_connect()函数前面添加符号"@",用于屏蔽函数出错信息
//die()函数表示向用户输出引号中的内容后,程序终止执行,为了方便用户查看出错信息防止难以找到问题




//2.选择MySQL服务器
//使用mysqli_select_db()函数选择MySQL服务器的数据库,并建立连接
//语法:mysqli_select_db(string 数据库名[,resource link_identifier])
//  或mysqli_query('use数据库名'[,resource link_identifier])
//参数link_identifier为MySQL数据库的连接标识
//如果没有指定连接标识符link_identifier,则使用上一个打开的链接,如果没有打开的链接将无参数调用musqli_connect函数尝试打开一个数据库
//    其后每个mysqli_query()函数调用都会作用于活动数据库

//实例:使用musqli_select_db()函数连接MySQL数据库db_database18
$link = mysqli_connect('localhost','root','123') or die('不能连接到数据库'.mysqli_connect_error()); //连接数据库
$db_select = mysqli_select_db($link,"db_database18");   //连接数据库db_database18
//或者
$db_select = mysqli_query($link,"use db_database18");   //连接数据库db_database18法2
//mysqli_query()函数是查询指令的专用函数,所有SQl语句都听过它执行,并返回结果集




//3.执行SQL语句
//使用mysqli_query()函数执行SQL语句,操作方式主要有:增、删、改、查、显示
//语法:mysqli_query(string query[,resource link_identifier])
//参数link_identifier为MySQL数据库的连接标识
//mysqli_query函数中执行的SQL语句不应以分号";"结尾
//如果SQL语句是查询指令是select,成功则返回结果集,失败返回false
//如果SQL语句是查询指令是insert、delete、update等操作,成功则返回true,失败返回false

//实例:以会员信息表tb_member为例,举例说明常见的SQL语句的用法
//添加一个会员记录
$result = mysqli_query($link,"insert into tb_member values('tm','111','tm@tmsoft.com')");
//修改一个会员记录
$result = mysqli_query($link,"update tb_member set user='纯净水',pwd='1025' where user='tm'");
//删除一个会员记录
$result = mysqli_query($link,"delete from tb_member where user='纯净水'");
//查询一个会员记录
$result = mysqli_query($link,"select * from tb_member");
//显示一个会员信息表结构
$result = mysqli_query($link,"DESC tb_member");
//PHP提供了一些函数来处理查询得到的结果$result,如mysqli_fetch_array()函数、mysqli_fetch_object()和mysqli_fetch_row()函数等




//4.关闭结果集
//数据库操作完成后,需要关闭结果集,以释放系统资源,语法如下
mysqli_free_result($result);
//如果在多个网页需要频繁进行数据库访问,可以考虑建立与数据库的持续连接
//      方式是在连接数据库时,调用函数mysqli_pconnect()代替mysqli_connect()函数。
//      建立的持续连接在本程序结束时,不需要调用mysqli_close()来关闭与数据库服务器的连接
//      下次执行musqli_pconnect()函数时,系统自动直接返回已经建立的持续连接ID号,而非真正连接数据库


//5.关闭MySQL服务器
//每次使用mysqli_connect()或mysqli_query()函数都会消耗系统资源
//      为了避免资源消耗过大而造成死机,在完成数据库操作后,应该使用mysqli_close()函数关闭与MySQL服务器的连接,以节省资源
mysqli_close($Link);
//PHP中与数据库连接非持久连接,系统会自动回收,一般不用设置关闭
//      但是如果一次性返回的结果集比较大,或网站访问量比较多最好使用mysqli_close()函数手动释放





//————————————————————————————mysqli_query语句结果处理扩充——————————————
//1.使用mysqli_fetch_array()函数从数组结果集中获取信息
//语法:array mysqli_fetch_array(resourcce result[,int result_type])
//result:资源类型参数,要传入的是由mysqli_query函数返回的数据指针
//result_type:可选项,整数型参数,
//           要传入的是MYSQLI_ASSOC(关联索引)、MYSQLI_NUM(数字索引)、MYSQLI_BOTH(关联和数字索引)3种索引,默认为MYSQLI_BOTH
//函数返回的字段区分大小写

//实现一个图书信息检索功能,首先使用mysqli_query()函数执行SQL函数查询图书信息,
//                      然后应用使用mysqli_fetch_array()函数获取查询结果,
//                      最后使用echo语句输出结果集$info[]中的图书信息

//1.1Html查询表单代码:
/*
<form name="myform" action="PHPSQL.php" method="post">
    <tr>
         <td width="150" height="30" align="right" valign="middle">请选择上传文件</td>
         <input type="text" name="txt_book" id="txt_book" size = 25>
         <input type="submit" name="submit" value="查询">

    </tr>
</form>
*/

//1.2连接到MySQL数据库服务器,选择数据库db_database18,设置MySQL服务器编码格式为GB2312
$link = mysqli_connect('localhost','root','123') or die('不能连接到数据库'.mysqli_connect_error()); //连接数据库
mysqli_select_db($link,'db_database18');
mysqli_query($link,"set names gb2312");         //设置MySQL数据库的编码格式为GB2312,防止发生乱码

//1.3使用if语句判断用户是否单击"查询"按钮,若为POST方法接收传递过来的图书名称信息,使用mysqli_query()函数执行SQL查询语句
//      该查询语句主要用来实现图书信息的模糊查询,结果被赋予变量$sql。然后,使用mysqli_fetch_array()函数从数组结果集中获取信息
$sql = mysqli_query($link,"select * from tb_book");   //执行查询语句
$info = mysqli_fetch_array($sql);           //获取查询结果,返回值为数组
if ($_POST["submit"] == "查询"){      //判断按钮submit的值是否为查询
    $txt_book = $_POST["txt_book"]; //获取文本框提交的值
    $sql = mysqli_query($link,"select * from tb_book where bookname like '%".trim($txt_book)."%'"); //执行模糊查询
    $info = mysqli_fetch_array($sql);       //获取查询结果
}
//实现迷糊查询时,使用了通配符"%","%"表示领个或任意多个字符

//1.4使用if语句对结果集变量$info进行判断,如果该值为假,则使用echo语句输出检索的图书信息不存在
if ($info == false){
    echo "<div align='center' style='color: #FF0000;font-size: 12px;'>检索的图书信息不存在</div>";
}

//1.5使用do...while语句以表格形式输出数组结果集$info[]中的图书信息,以字段名为索引,使用echo语句输出数组$info[]中的书籍
/*
<?php
do{             //do...while循环
?>
<tr align="left" bgcolor="#FFFFFF">
    <td height="20" align="center">
        <?php echo $info[id]; ?>
    </td>
    <td>
        &nbsp;<?php echo $info[bookname]; ?>
    </td>
    <td>
        &nbsp;<?php echo $info[ssuDate]; ?>
    </td>
    <td align="center">
        <?php echo $info[pric]; ?>
    </td>
    <td>
        &nbsp;<?php echo $info[maker]; ?>
    </td>
    <td>
        &nbsp;<?php echo $info[publisher]; ?>
    </td>
</tr>
<?php
}while($info=mysqli_fetch_array($sql));     //判断循环语句
?>
*/





//2.使用mysqli_fetch_object()函数从结果集中获取一行作为对象
//使用mysqli_fetch_object()函数可以获取查询结果集中的数据
//object mysqli_fetch_object(resource result)
//mysqli_fetch_object()函数与mysqli_fetch_array()函数类似,但是返回的是一个对象而不是数组,
//      该函数只能通过字段名来访问数组。使用下面的格式获取结果集中行的元素值
//$row->col_name        //col_name为列名,$row代表结果集

//例如:从某数据表中检索id和name值,可以用$row->id和$row->name访问行中的元素值
//注:返回的字段名区分大小写

//实现一个图书信息检索功能,首先使用mysqli_query()函数执行SQL函数查询图书信息,
//                      然后应用使用mysqli_fetch_object()函数获取查询结果,
//                      最后使用echo语句输出结果集中以"结果集->列名"的形式输出各字段所对应的图书信息
//2.1Html查询表单代码:
/*
<form name="myform" action="PHPSQL.php" method="post">
    <tr>
         <td width="150" height="30" align="right" valign="middle">请选择上传文件</td>
         <input type="text" name="txt_book" id="txt_book" size = 25>
         <input type="submit" name="submit" value="查询">

    </tr>
</form>
*/

//2.2连接到MySQL数据库服务器,选择数据库db_database18,设置MySQL服务器编码格式为GB2312
$link = mysqli_connect('localhost','root','123') or die('不能连接到数据库'.mysqli_connect_error()); //连接数据库
mysqli_select_db($link,'db_database18');
mysqli_query($link,"set names gb2312");         //设置MySQL数据库的编码格式为GB2312,防止发生乱码

//2.3使用if语句判断用户是否单击"查询"按钮,若为POST方法接收传递过来的图书名称信息,使用mysqli_query()函数执行SQL查询语句
//      该查询语句主要用来实现图书信息的模糊查询,结果被赋予变量$sql。然后,使用mysqli_fetch_object()函数从数组结果集中获取信息
$sql = mysqli_query($link,"select * from tb_book");   //执行查询语句
$info = mysqli_fetch_object($sql);           //获取查询结果
if ($_POST["submit"] == "查询"){      //判断按钮submit的值是否为查询
    $txt_book = $_POST["txt_book"]; //获取文本框提交的值
    $sql = mysqli_query($link,"select * from tb_book where bookname like '%".trim($txt_book)."%'"); //执行模糊查询
    $info = mysqli_fetch_object($sql);       //获取查询结果
}

//2.4使用do...while语句以表格形式输出结果集中以"结果集->列名"的形式输出各字段所对应的图书信息
/*
<?php
do{             //do...while循环
?>
<tr align="left" bgcolor="#FFFFFF">
    <td height="20" align="center">
        <?php echo $info->id; ?>
    </td>
    <td>
        &nbsp;<?php echo $info->bookname; ?>
    </td>
    <td>
        &nbsp;<?php echo $info->ssuDate; ?>
    </td>
    <td align="center">
        <?php echo $info->pric; ?>
    </td>
    <td>
        &nbsp;<?php echo $info->maker; ?>
    </td>
    <td>
        &nbsp;<?php echo $info->publisher; ?>
    </td>
</tr>
<?php
}while($info=mysqli_fetch_object($sql));     //判断循环语句
?>
*/





//3.使用mysqli_fetch_row()函数逐行获取结果集中的每条记录
//使用mysqli_fetch_row()函数逐行获取结果集中的每条记录
//语法array mysqli_fetch_row(resource result)
//mysqli_fetch_row()函数从和指定的结果标识关联的结果集中获取一行数据并作为数组返回,
//      将此行赋予数组变量$row,每个结果的列存储在一个数组元素中,下标从0开始,即以$row[0]的形式访问第一个元素数组,
//      依次调用mysqli_fetch_row()函数将返回结果集中的下一行,直到没有更多行则返回false
//注:本字段返回的字段名区分大小写

//实现一个图书信息检索功能,首先使用mysqli_query()函数执行SQL函数查询图书信息,
//                      然后应用使用mysqli_fetch_row()函数逐行获取查询结果,
//                      最后使用echo语句从数组结果集中输出各字段所对应的图书信息
//3.1Html查询表单代码:
/*
<form name="myform" action="PHPSQL.php" method="post">
    <tr>
         <td width="150" height="30" align="right" valign="middle">请选择上传文件</td>
         <input type="text" name="txt_book" id="txt_book" size = 25>
         <input type="submit" name="submit" value="查询">

    </tr>
</form>
*/

//3.2连接到MySQL数据库服务器,选择数据库db_database18,设置MySQL服务器编码格式为GB2312
$link = mysqli_connect('localhost','root','123') or die('不能连接到数据库'.mysqli_connect_error()); //连接数据库
mysqli_select_db($link,'db_database18');
mysqli_query($link,"set names gb2312");         //设置MySQL数据库的编码格式为GB2312,防止发生乱码

//3.3使用if语句判断用户是否单击"查询"按钮,若为POST方法接收传递过来的图书名称信息,使用mysqli_query()函数执行SQL查询语句
//      该查询语句主要用来实现图书信息的模糊查询,结果被赋予变量$sql。然后,使用mysqli_fetch_object()函数从数组结果集中获取信息
$sql = mysqli_query($link,"select * from tb_book");   //执行查询语句
$row = mysqli_fetch_row($sql);           //获取查询结果
if ($_POST["submit"] == "查询"){      //判断按钮submit的值是否为查询
    $txt_book = $_POST["txt_book"]; //获取文本框提交的值
    $sql = mysqli_query($link,"select * from tb_book where bookname like '%".trim($txt_book)."%'"); //执行模糊查询
    $row = mysqli_fetch_object($sql);       //获取查询结果,返回值为数组
}

//3.4使用if语句对结果集变量$info进行判断,如果该值为假,则使用echo语句输出检索的图书信息不存在
if ($row == false){
    echo "<div align='center' style='color: #FF0000;font-size: 12px;'>检索的图书信息不存在</div>";
}

//3.5使用do...while语句以数组形式输出对应的图书信息
/*
<?php
do{             //do...while循环
?>
<tr align="left" bgcolor="#FFFFFF">
    <td height="20" align="center">
        <?php echo $info[0]; ?>
    </td>
    <td>
        &nbsp;<?php echo $info[1]; ?>
    </td>
    <td>
        &nbsp;<?php echo $info[2]; ?>
    </td>
    <td align="center">
        <?php echo $info[3]; ?>
    </td>
    <td>
        &nbsp;<?php echo $info[4]; ?>
    </td>
    <td>
        &nbsp;<?php echo $info[5]; ?>
    </td>
</tr>
<?php
}while($info=mysqli_fetch_object($sql));     //判断循环语句
?>
*/




//4.使用mysqli_num_rows()函数逐行获取结果集中的每条记录
//要获取由select语句查询到的结果集中行的数目,则必须使用mysqli_num_rows()
//语法:int mysqli_num_rows(source redult)
//若要获取由insert、update、delete语句所影响到的数据行数,则必须使用mysqli_affected_rows()函数来实现

//实现一个图书信息检索功能,首先使用mysqli_query()函数执行SQL函数查询图书信息,
//                      然后应用使用mysqli_num_rows()函数获取查询结果集中的记录数
//4.1使用3.3中获取的查询结果$sql
//4.2输出由mysqli_num_rows()函数获取SQL查询语句结果集中的行数
$nums = mysqli_num_rows($sql);
echo $nums;






//————————————————————————————PHP操作MySQL数据库
//1.使用insert语句动态添加公告信息

//1.1实现动态添加公告信息前,需要明确数据表结构。创建数据表结构有两种方式:命令提示符下创建,或者通过phpMyAdmin创建
//1.1.1代码创建数据表结构:
//在命令提示符下,在db_database18数据库下创建tb_affiche公告信息表结构:
CREATE TABLE 'tb_affiche'{
    'id' INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    'title' VARVHAR(200) CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NOT NULL,
    'content' TEXT CHARACTER SET gb2312 COLLATE gb2312_chinese_ci NOT NULL,
    'createtime' DATETIME NOT NULL
}ENGINE = MYISAM;

//1.1.2phpMyAdmin创建表

//实例:使用insert语句动态地向数据库中添加公告信息,使用mysqli_query()函数执行insert语句,完成将数据动态添加到数据库的操作
//(1)HTML代码——创建页面,在添加公告信息的图片上添加热区,创建一个超链接,链接到PHPSQL.php文件
/*
<img src="images/image09.jpg" width="202" height="310" border="0" usemap="#Map">
<map>
    <area shape="rect" coords="30,45,112,63" href="PHPSQL.php">
</map>

//上面代码中,coords="30,45,112,63"为热区的坐标
*/
//(2)添加一个表单、一个文本框、一个编辑框、一个提交(保存)按钮和一个重置按钮,设置表单的action属性值为check_add_affiche.php
//在PHP文件<?php ?外添加>
<form name="form1" method="post" action="check_add_affiche.php">
    <table width="520" height="212" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
            <td width="87" align="center">公告主题:</td>
            <td width="433" height="31">
                <input name="txt_tittle" type="text" id="txt_title" size="40">
            </td>
        </tr>
        <tr>
            <td width="124" align="center">公告内容:</td>
            <td>
                <textarea name="txt_content" cols="50" rows="8" id="txt_content"></textarea>
            </td>
        </tr>
        <tr>
            <td width="40" colspan="2" align="center">
                <input name="submit" type="submit" class="btn_grey" value="保存" onclick="return check(form1)">
                <input type="reset" name="submit2" value="重置">
            </td>
        </tr>
    </table>
</form>
//在保存按钮的onclick事件下调用一个由JS脚本自定义的check()函数,用来限制表单信息不能为空
<script language="javascript">
    //验证表单元素为空
    function check(form){
        if (form.txt_tittle.value==""){
            alert("请输入公告标题");
            form.txt_tittle.onfocus();  //返回表单元素位置
            return false;
        }
        if (form.txt_content.value==""){
            alert("请输入公告内容");
            myform.txt_content.onfocus();  //返回表单元素位置
            return false;
        }
    }
</script>
//(3)创建check_add_affiche.php文件,对表单信息进行处理,首先,连接MySQL数据库服务器,选择数据库,设置数据库编码格式为GB2312
//          然后,通过POST方法获取表单提供的数据。最后,定义insert语句将表单数据添加到数据表,通过musql_query()函数执行添加语句
//          完成公告信息添加,弹出提示信息,并定位到页面add_affiche.php
$conn = mysqli_connect('localhost','root','123') or die('不能连接到数据库'.mysqli_connect_error()); //连接数据库
mysqli_select_db($conn,"db_database18") or die('数据库访问错误'.mysqli_connect_error());
mysqli_query($conn,"set names gb2312");     //选择编码格式为GB2312
$title = $_POST["txt_title"];       //获取公告标题信息
$content = $_POST["txt_content"];   //获取公告内容
$createtime = date("Y-m-d H:i:s");      //获取当前系统的时间
//*************应用mysqli_query()函数执行insert ...into语句发送到服务器
$sql = mysqli_query($conn,"insert into tb_affiche(title,content,createtime) values('$title','$content','$createtime')")
echo "<script>alert('公告信息添加成功');window.location.href=add_affiche.php;</script>";
mysqli_free_result($sql);           //关闭结果集
mysqli_close($conn);                //关闭MySQL数据库服务器




//2.使用select语句查询公告信息
//使用mysqli_query()执行select查询语句,使用mysqli_fetch_object()函数获取查询结果集,通过do...while循环语句输出查询结果
//流程与插入类似,查询主要代码:
$conn = mysqli_connect('localhost','root','123') or die('不能连接到数据库'.mysqli_connect_error()); //连接数据库
mysqli_select_db($conn,"db_database18") or die('数据库访问错误'.mysqli_connect_error());
mysqli_query($conn,"set names gb2312");     //选择编码格式为GB2312
$keyword = $_POST["txt_keyword"];       //获取查询关键字
$sql = mysqli_query($conn,"select * from tb_affiche where title like '%keyword%' or content like '%keyword%')")
$row = mysqli_fetch_object($sql);//获取查询结果集
if (!$row){
    echo "<font color='red'>搜索信息不存在</font>";
}
do{
?>
<tr bgcolor="#FFFFFF">
    <td>
        <?php echo $row->title; ?>
    </td>
    <td>
        <?php echo $row->content; ?>
    </td>
</tr>
<?php
}while($row=mysqli_fetch_object($sql));
mysqli_free_result($sql);           //关闭结果集
mysqli_close($conn);                //关闭MySQL数据库服务器




//3.使用update动态编辑公告信息
//使用select语句查询全部的公告信息,通过表格输出公告信息时添加一列,在这个单元格插入一个图标,并设置超链接,链接到modify.php页面,
//      并将公告ID作为超链接参数传入modify.php页面
//流程与插入类似,更新主要代码
//(1)Html关键代码
<a href="modify.php?id=<?php echo $row->id;?>">
    <img src="imges/update.png" width="20" height="18" border="0">
</a>
//(2)创建modify.php编辑首页,首先完成与数据库的连接,之后根据超链接传递的ID值读取指定数据。
//      然后在该页面添加录入数据的表单(略),最后,将从数据库中读取的数据在表单中输出
$conn = mysqli_connect('localhost','root','123') or die('不能连接到数据库'.mysqli_connect_error()); //连接数据库
mysqli_select_db($conn,"db_database18") or die('数据库访问错误'.mysqli_connect_error());
mysqli_query($conn,"set names gb2312");     //选择编码格式为GB2312
$id = $_POST["id"];       //获取查询关键字
$sql = mysqli_query($conn,"select * from tb_affiche where id = $id)");
$row = mysqli_fetch_object($sql);//获取查询结果集
/*添加数据的表单代码(略),核心代码:
    <input name="txt_title" type="text" id="txt_title" size="40" value="<?php echo $row->title;?>">
    <input name="id" type="hidden" value="<?php echo $row->id;?>">
    <textarea name="txt_content"><?php echo $row->content;?></textarea>
*/
//(3)创建表单数据处理页,执行update更新语句(连接数据库方法可封装成独立页,后使用include语句调用,以提升效率)
$conn = mysqli_connect('localhost','root','123') or die('不能连接到数据库'.mysqli_connect_error()); //连接数据库
mysqli_select_db($conn,"db_database18") or die('数据库访问错误'.mysqli_connect_error());
mysqli_query($conn,"set names gb2312");     //选择编码格式为GB2312
$title = $_POST["txt_title"];       //获取更改公告标题信息
$content = $_POST["txt_content"];   //获取更改公告内容
$id = $_POST["id"];       //获取查询关键字
$sql = mysqli_query($conn,"update tb_affiche set title='$title',content='$content' where id=$id");
if ($sql){
    echo "<script>alert('公告信息编辑成功');history.back();window.location.href=add_affiche.php;</script>";
}else{
    echo "<script>alert('公告信息编辑失败');history.back();window.location.href=add_affiche.php;</script>";
}





//4.使用delete语句动态删除公告信息
//使用delete语句,根据指定ID,动态删除数据表中指定的公告信息
//流程与插入类似,删除主要代码
$conn = mysqli_connect('localhost','root','123') or die('不能连接到数据库'.mysqli_connect_error()); //连接数据库
mysqli_select_db($conn,"db_database18") or die('数据库访问错误'.mysqli_connect_error());
mysqli_query($conn,"set names gb2312");     //选择编码格式为GB2312
$id = $_POST["id"];       //获取查询关键字
$sql = mysqli_query($conn,"delete from tb_affiche where id = $id)");//删除查询结果集







//5.分页显示
//使用select语句检索数据库中的公告信息,并通过分页技术完成对数据库中公告信息的分页输出
$conn = mysqli_connect('localhost','root','123') or die('不能连接到数据库'.mysqli_connect_error()); //连接数据库
mysqli_select_db($conn,"db_database18") or die('数据库访问错误'.mysqli_connect_error());
mysqli_query($conn,"set names gb2312");     //选择编码格式为GB2312
//$page为当前页,如果$page为空,则初始化为1
if ($page==""){
    $page =1;
}
if (is_numeric($page)){     //判断变量$page是否为数字
    $page_size = 4;         //每页显示4条数据
    $query = "select count(*) as total from tb_dffiche order by id desc";
    $result = mysqli_query($conn,$query);           //查询符合条件的记录总条数
    $message_count = mysqli_num_rows($result);      //要显示的总记录数
    //根据记录总数除以每页显示的记录数求出所分的页数
    $page_count = ceil($message_count/$page_count);
    $offset = ($page - 1)*$page_size;           //计算下一页从第几条数据开始循环,若page初始为0则不需要减1
    $sql = mysqli_query($conn,"select * from tb_affiche order by id desc limit $offset,$page_size");
    $row=mysqli_fetch_object($sql);     //获取查询结果集
    if (!$row){
        echo "<font color='red'>暂无公告信息</font>>";
    }
}



//可以将数据库连接、操作、分页、字符串截取等方法封装到类中



?>

