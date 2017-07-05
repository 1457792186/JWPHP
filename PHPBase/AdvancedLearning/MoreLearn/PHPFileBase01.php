<?php

//****************************************PHP 文件打开/读取/读取
//如何在服务器上打开、读取以及关闭文件

//****************************************PHP Open File - fopen()
//打开文件的更好的方法是通过 fopen() 函数。此函数提供比 readfile() 函数更多的选项。
//将使用文本文件 "webdictionary.txt"
/*
AJAX = Asynchronous JavaScript and XML
CSS = Cascading Style Sheets
HTML = Hyper Text Markup Language
PHP = PHP Hypertext Preprocessor
SQL = Structured Query Language
SVG = Scalable Vector Graphics
XML = EXtensible Markup Language
*/
//fopen() 的第一个参数包含被打开的文件名，第二个参数规定打开文件的模式。如果 fopen() 函数未能打开指定的文件，下面的例子会生成一段消息
//实例
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("webdictionary.txt"));
fclose($myfile);

/*
文件会以如下模式之一打开：
模式	    描述
r	    打开文件为只读。文件指针在文件的开头开始。
w	    打开文件为只写。删除文件的内容或创建一个新的文件，如果它不存在。文件指针在文件的开头开始。
a	    打开文件为只写。文件中的现有数据会被保留。文件指针在文件结尾开始。创建新的文件，如果文件不存在。
x	    创建新文件为只写。返回 FALSE 和错误，如果文件已存在。
r+	    打开文件为读/写、文件指针在文件开头开始。
w+	    打开文件为读/写。删除文件内容或创建新文件，如果它不存在。文件指针在文件开头开始。
a+	    打开文件为读/写。文件中已有的数据会被保留。文件指针在文件结尾开始。创建新文件，如果它不存在。
x+	    创建新文件为读/写。返回 FALSE 和错误，如果文件已存在。
*/

//提示：接下来是 fread() 以及 fclose() 函数


//****************************************PHP 读取文件 - fread()
//fread() 函数读取打开的文件。
//fread() 的第一个参数包含待读取文件的文件名，第二个参数规定待读取的最大字节数。
//如下 PHP 代码把 "webdictionary.txt" 文件读至结尾：
fread($myfile,filesize("webdictionary.txt"));



//****************************************PHP 关闭文件 - fclose()
//fclose() 函数用于关闭打开的文件。
//注释：用完文件后把它们全部关闭是一个良好的编程习惯。您并不想打开的文件占用您的服务器资源。
//fclose() 需要待关闭文件的名称（或者存有文件名的变量）：
$myfile = fopen("webdictionary.txt", "r");
// some code to be executed....
fclose($myfile);



//****************************************PHP 读取单行文件 - fgets()
//fgets() 函数用于从文件读取单行。
//下例输出 "webdictionary.txt" 文件的首行
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fgets($myfile);
fclose($myfile);
//注释：调用 fgets() 函数之后，文件指针会移动到下一行。


//****************************************PHP 检查 End-Of-File - feof()
//feof() 函数检查是否已到达 "end-of-file" (EOF)。
//feof() 对于遍历未知长度的数据很有用。
//下例逐行读取 "webdictionary.txt" 文件，直到 end-of-file：
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
// 输出单行直到 end-of-file
while(!feof($myfile)) {
    echo fgets($myfile) . "<br>";
}
fclose($myfile);



//****************************************PHP 读取单字符 - fgetc()
//fgetc() 函数用于从文件中读取单个字符。
//下例逐字符读取 "webdictionary.txt" 文件，直到 end-of-file
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
// 输出单字符直到 end-of-file
while(!feof($myfile)) {
    echo fgetc($myfile);
}
fclose($myfile);
//注释：在调用 fgetc() 函数之后，文件指针会移动到下一个字符。

?>