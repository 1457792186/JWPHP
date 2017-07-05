<?php

//****************************************PHP 文件处理


//****************************************PHP 操作文件
//PHP 拥有的多种函数可供创建、读取、上传以及编辑文件。
//注意：请谨慎操作文件！
//当操作文件时必须非常小心。如果您操作失误，可能会造成非常严重的破坏。常见的错误是：
//编辑错误的文件
//被垃圾数据填满硬盘
//意外删除文件内容



//****************************************PHP readfile() 函数
//readfile() 函数读取文件，并把它写入输出缓冲
/*
AJAX = Asynchronous JavaScript and XML
CSS = Cascading Style Sheets
HTML = Hyper Text Markup Language
PHP = PHP Hypertext Preprocessor
SQL = Structured Query Language
SVG = Scalable Vector Graphics
XML = EXtensible Markup Language
*/
//读取此文件并写到输出流的 PHP 代码如下（如读取成功则 readfile() 函数返回字节数）
echo readfile("webdictionary.txt");

//如果想做的所有事情就是打开一个文件并读取器内容，那么 readfile() 函数很有用


?>