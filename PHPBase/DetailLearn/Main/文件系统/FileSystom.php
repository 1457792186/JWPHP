<?php


//文件系统
//文件处理包括:读取、关闭、重写等





//打开/关闭文件
//打开/关闭文件使用fopen()和fclose()函数

//打开文件
//语法:resourcce fopen(filename,mode[,use_include_path])
//参数filename是要打开的包含路径的文件名,可以是相对路径,也可以是绝对路径,若没有任何前缀表示打开的是本地文件;
//参数mode是打开文件的方式,可取值如下表
/*fopen()函数中mode取值说明
mode    模式名称        说明
r       只读          读模式——进行读取,文件指针位于文件的开头
r+      读写          读写模式——进行读写,文件指针位于文件开头。在现有文件内容末尾之前进行写入会覆盖原有内容
W       只写          写模式——进行写入文件,文件指向头文件。若文件存在,则所有文件内容被删除,否则函数将创建这个文件
w+      读写          读写模式——进行读写,文件指针指向头文件。若文件存在,则所有文件内容被删除,否则函数将创建这个文件
x       谨慎写        写模式打开文件,从文件头开始写。若文件已经存在,则不会被打开,函数返回false,PHP将产生一个警告
x+      谨慎写        读/写模式打开文件,从文件头开始写。若文件已经存在,则不会被打开,函数返回false,PHP将产生一个警告
a       追加          追加模式打开文件,文件指针指向尾文件。若文件已有内容,则将从文件末尾开始追加,否则函数将创建这个文件
a+      追加          追加模式打开文件,文件指针指向尾文件。若文件已有内容,则将从文件末尾开始追加或读取,否则函数将创建这个文件
b       二进制         二进制模式——用于与其他模式进行连接。如果文件系统能区分二进制文件与文本文件,可能使用。
                      Windows区分,UNIX不区分。推荐使用此选项,便于可移植性。是默认模式
t       文本          用于与其他模式的结合。此模式只是Windows下的一个选项
*/
//参数use_include_path是可选的,该参数在配置文件php.ini中指定一个路径,如:F:\AppServ\www\mess.php,
//                           若希望服务器在此路径打开所指定的文件,可将其值设置为1或true


//关闭文件
//对文件的操作结束后应该关闭这个文件,否则可能引起错误。在PHP中使用fclose()函数关闭文件
//语法:bool fclose(resource handle)
//该函数将参数handle指向的文件关闭,如果成功,返回true,否则返回false。其中的文件指针必须是有效的,并且是通过fopen()函数成功打开的文件
$f_open = fopen("../file.txt","rb");    //打开文件
//对文件进行操作
fclose($f_open);                        //关闭文件









//——————————————————————————————————读写文件

//1.从文件中读取数据
//从文件中读取数据,可以读取一个字符、一行字符或整个文件,还可以读取指定长度的字符串

//1.1读取整个文件readfile()、file()和file_get_contents()
//1.1.1readfile()函数
//readfile()函数用于读入一个文件并将其写入到输出缓冲。如果错误则返回false
//语法:int readfile(filename)
//使用readfile()函数,不需要打开/关闭文件,也不需要echo、print等输出语句,直接写出文件路径即可

//1.1.2file()函数
//file()函数也可以读取整个文件的内容,只是file()函数将文件内容按行存放到数组中,包括换行符在内。如果读取失败则返回false
//语法:array file(filename)

//1.1.3file_get_contents()函数
//该函数将文件内容(filename)读入到一个字符串。如果有offset和maxlen参数,将从参数offset所指定的位置开始读取长度为maxlen的一个字符串
//如果读取失败则返回false
//语法:string file_get_contents(filename[,offset[,maxlen]])
//该函数适用于二进制文件,是将整个文件的内容读入到一个字符串中的首选方式

//例子:使用readfile()、file()和file_get_contents()分别读取文件tm.txt的内容
//使用readfile()读取文件tm.txt的内容
readfile('tm.txt');
//使用file()读取文件tm.txt的内容
$f_arr = file('tm.txt');
foreach ($f_arr as $cont){
    echo $cont."\n";
}
//使用file_get_contents()读取文件tm.txt的内容
$f_str = file_get_contents('tm.txt');
echo $f_str;



//1.2读取一行数据
//1.2.1fgets()函数
//fgets()函数用于一次读取一行数据
//语法:string fgets(reasource handle[,int length])
//参数handle是被读取的文件;参数length是要读取的数据长度。
//函数能够实现从handle指定文件中读取一行并返回长度最大值为length-1个字节的字符串。在遇到换行符、EOF或者读取了length-1个字节后停止
//如果忽略了length参数,那么读取数据直到行结束

//1.2.2fgetss()函数
//fgetss()函数是fgets()函数的变体,用于读取一行数据。同时,fgetss()函数会过滤掉被读取内容中的html和php标记
//语法string fgetss(reasource handle[,int length[,string allowable_tags]])
//该函数能够从读取的文件中过滤掉任何html和php标记,可以使用allowable_tags参数来控制哪些标记不被过滤掉

//例子:使用fgets()函数和fgetss()函数分别读取fun.php文件并显示出来,观察它们有什么区别
//使用fgets()函数读取.php文件
$fopen= fopen('fun.php','rb');
while (!feof($fopen)){          //feof()函数测试指针是否到了文件结束的位置
    echo fgets($fopen);         //输出当前行
}
fclose($fopen);
//使用fgets()函数读取.php文件
$fopen= fopen('fun.php','rb');
while (!feof($fopen)){          //feof()函数测试指针是否到了文件结束的位置
    echo fgetss($fopen);         //输出当前行
}
fclose($fopen);



//1.3读取一个字符:fgetc()
//在对文件的某一个字符进行查找、替换时,需要有针对性的对某个字符进行读取,在PHP中可以使用fgetc()函数实现此功能
//语法:string fgetc(resource handle)
//该函数返回一个字符,该字符从handle指向的文件中得到,遇到EOF则返回false

//例子:使用fgetc()函数逐个字符读取文件03.txt的内容并输出
$fopen = fopen('03.txt','rb');          //创建文件资源
while (false !== ($chr = fgetc($fopen))){        //使用fgetc()函数取得一个字符,判断是否为false
    echo $chr;                                  //如果不是flase,输出该字符
}
fclose($fopen);                         //关闭文件资源


//1.4读取指定长度的字符串:fread()
//fread()可以从文件中读取指定长度的数据
//语法:string fread(resource handle,int length)
//参数handle是被读取的文件;参数length是要读取的数据长度。当函数读取length个字节或遇到EOF则停止

//使用fread()函数读取文件04.txt的内容
$filename = '04.txt';
$fp = fopen($filename,'rb');         //打开文件
echo fread($fp,32);                 //读取文件内容前32个字节
echo fread($fp,filesize($fp));      //读取文件全部内容




//2.将数据写入文件
//写入文件在PHP常用fwrite()和file_put_contents()函数向文件中写入数据
//2.1fwrite()函数也成为fputs(),用法相同
//语法:int fwrite(reasource handle,string string[,int length])
//该函数把内容string写入指针handle所指向的文件。如果指定了参数length,则写入length个字节后停止,如果文件内容小于length则输出全部内容

//2.2file_put_contents()函数
//语法:int file_put_contents(string filename,string data[,int flags])
//filename为写入数据的文件
//data为要写入的数据
//flags可以是FILE_USE_INCLUDE_PATH、FILE_APPEND或LOCK_EX,其中LOCK_EX为独占锁定
//file_put_contents函数和依次使用fopen()、fwrite()、fclose()函数所实现的功能一样

//例子:先使用fwrite()函数向05.txt文件写入数据,再使用file_put_contents函数写入
$filepath = '05.txt';
$str = '此生无悔入东方,来世愿生幻想乡';
//使用fwrite()函数向05.txt文件写入数据
$fopen = fopen($filepath,'wb') or die('文件不存在');
fwrite($fopen,$str);
fclose($fopen);
readfile($filepath);
//使用file_put_contents()函数向05.txt文件写入数据
file_put_contents($filepath,$str);
readfile($filepath);




//3.操作文件
//PHP除了可以对文件内容进行读写,对文件本身也可以进行操作,如复制、重命名、查看修改日期等
/*常用的文件操作函数
函数原型                                函数说明                                 举例
bool copy(path1,path2)              将文件从path1复制到path2                   copy('tm.txt','./tm.txt')

bool rename(filename1,filename2)    把filename1重命名为filename2               rename('1.txt','tm.txt')

bool unlink(filename)               删除文件,成功返回true,失败返回false          unlink('../tm.txt')

int fileatime(filename)             返回文件最后一次被访问的时间,以时间戳返回      fileatime('1.txt')

int filemtime(filename)             返回文件最后一次被修改的时间,以时间戳返回      date('Y-m-d H:i:s',fileatime('1.txt'))

int filesize(filename)              取得文件大小(bytes)                        filesize('1.txt')

array pathinfo(name[,int options])  返回一个数组,包含文件name的路径信息           $arr = pathinfo('/tm/sl/12/5/1.txt')
                                    有dirname、basename和extension             foreach ($arr as $method=>$value){
                                    可以通过options设置要返回的信息                   echo  $method.":".$value."\n";
                                    有PATHINFO_DIRNAME、PATHINFO_BASENAME          }
                                    和PATHINFO_EXTENSION。默认返回全部

string realpath(filename)           返回文件的绝对路径,如'c:\tmp\..\1.txt'       readfile('1.txt')

array stat(filename)                返回一个数组,包括文件的相关信息,如上面的       $arr = stat('1.txt')
                                    文件大小、最后修改时间等                     foreach ($arr as $method=>$value){
                                                                                    echo  $method.":".$value."\n";
                                                                              }
*/
//写入文件时,除了file()、readfile()等少数几个函数外,其他操作必须先使用fopen()打开函数打开文件,最后用fclose()函数关闭文件
//文件的信息函数,如(filesize、filetime等)则都不需要打开文件,只要文件存在即可








//——————————————————————————————————-——目录处理

























?>