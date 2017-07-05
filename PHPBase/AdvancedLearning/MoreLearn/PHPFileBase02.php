<?php

//****************************************PHP 文件创建/写入
//如何在服务器上创建并写入文件

//****************************************PHP 创建文件 - fopen()
//fopen() 函数也用于创建文件。也许有点混乱，但是在 PHP 中，创建文件所用的函数与打开文件的相同。
//如果您用 fopen() 打开并不存在的文件，此函数会创建文件，假定文件被打开为写入（w）或增加（a）。
//下面的例子创建名为 "testfile.txt" 的新文件。此文件将被创建于 PHP 代码所在的相同目录中

//实例
$myfile = fopen("testfile.txt", "w")


//****************************************PHP 文件权限
//如果试图运行这段代码时发生错误，请检查是否有向硬盘写入信息的 PHP 文件访问权限。


//****************************************PHP 写入文件 - fwrite()
//fwrite() 函数用于写入文件。
//fwrite() 的第一个参数包含要写入的文件的文件名，第二个参数是被写的字符串。
//下面的例子把姓名写入名为 "newfile.txt" 的新文件中：
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Bill Gates\n";
fwrite($myfile, $txt);
$txt = "Steve Jobs\n";
fwrite($myfile, $txt);
fclose($myfile);
//请注意，向文件 "newfile.txt" 写了两次。
//在每次向文件写入时，在发送的字符串 $txt 中，第一次包含 "Bill Gates"，第二次包含 "Steve Jobs"。
//在写入完成后，使用 fclose() 函数来关闭文件
/*
如果打开 "newfile.txt" 文件，它应该是这样的：
Bill Gates
Steve Jobs
*/

//****************************************PHP 覆盖（Overwriting）
//如果现在 "newfile.txt" 包含了一些数据，可以展示在写入已有文件时发生的的事情。所有已存在的数据会被擦除并以一个新文件开始。
//在下面的例子中，打开一个已存在的文件 "newfile.txt"，并向其中写入了一些新数据

//实例
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);
/*
如果现在打开这个 "newfile.txt" 文件，Bill 和 Steve 都已消失，只剩下刚写入的数据：
Mickey Mouse
Minnie Mouse
*/


//****************************************




//****************************************



?>