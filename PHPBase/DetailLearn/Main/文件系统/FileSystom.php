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
//打开/关闭目录
//打开/关闭目录和打开/关闭文件类似,但打开的文件若不存在,就会自动创建一个新文件,而打开的目录不正确,则一定会报错

//1.1打开目录
//使用opendir()函数
//语法resource opendir(path)
//参数path是一个合法的目录路径,成功执行后返回指向该目录的指针:
//        如果path不合法或者因为权限或文件系统错误而不能打开目录,则返回false并产生一个E_WARNING级的错误信息
//        可在opendir()前加上"@"符号来屏蔽错误信息的输出

//1.2.关闭目录
//使用closedir()函数
//语法void closedir(reasource handle)
//参数handle是使用opendir()函数打开的一个目录指针

//打开和关闭目录的实例
$path = 'D:\\AppServ\\www\\tm\\sl\\12';
$dire = '';
if (is_dir($path)){                     //检测是否是一个目录
    if ($dire = opendir($path)){        //判断是否打开成功
        echo $dire;                     //输出目录指针
    }
}else{
    echo '路径错误';
    exit();
}

if ($dire !=''){
    closedir($dire);                        //关闭目录
}
//is_dir()函数判断当前路劲是否为一个合法的路劲,若合法,返回true,否则返回false





//2.浏览目录
//使用scandir()函数极限浏览目录中的文件
//语法array  scandir(string directory[,int sorting_order])
//该函数返回一个数组,包含directory中所有文件和目录。
//参数sorting_order指定排序顺序,默认按字母升序排序;若添加了sorting_order则变为降序排序

//实例:查看F:\AppServ\www\tm\sl\12下的所有文件
$path = 'F:\\AppServ\\www\\tm\\sl\\12';
$dire = '';
if (is_dir($path)){                     //检测是否是一个目录
    $dire = scandir($path);             //使用scandir()函数取得所有文件及目录
    foreach ($dire as $value){          //循环输出文件及目录名称
        echo $value."\n";
    }
}else{
    echo '路径错误';
    exit();
}




//3.操作目录
//目录是一种特殊文件,对文件的操作多数适用于目录。但是有一些函数专门针对目录
/*
常用目录操作系统
函数原型                                        函数说明                            实例
bool mkdir(string dirname)                     新建一个指定的目录                    mkdir('temp');

bool rmdir(string dirname)                     删除指定的目录,该目录需要是空的         rmdir('temp');

string getcwd(void)                            取得当前的工作目录                    getcwd();

bool chdir(string directory)                   改变当前目录为directory              echo getcwd()."\n";
                                                                                  chdir('../');
                                                                                  echo getcwd()."\n";

float disk_free_space(string directory)        返回目录中的可用空间(bytes)           diskfreespace('d:\\appserv');
                                               被检查的文件必须通过服务器的文件系统访问

float disk_total_space(string directory)       返回目录的总空间大小                  disk_total_space('d:\\appserv');

string readdir(resource handle)                返回目录下一个文件的文件名             while (false != ($path=readdir($handle))){
                                               (使用此函数时,目录必须是                   echo $path;
                                               使用opendir()打开的)                 }

void rewinddir(resource handle)                将指定的目录重新指定到目录的开头        rewinddir($handle);

*/






//4.文件处理的高级应用
//4.1远程文件的访问
//PHP支持URL格式的文件调用,只要在php.ini中设置一下即可。php.ini中找到allow_url_fopen,将该选项设为NO。重启服务器后即可使用HTTP或FTP的URL格式
//实例
fopen('http://127.0.0.1/tm/sl/index.php','rb');


//4.2文件指针
//PHP可以实现文件指针的定位和查询,从而实现所需信息的快速查询。文件指针函数有rewind()、fseek()、feof()和ftell()

//4.2.1rewind()函数
//该函数将文件handle的指针设为文件流的开头
//语法bool rewind(resource handle)
//如果将文件以追加("a")模式打开,写入文件的任何数据总是会被附加在文件已有内容的末尾,不论文件指针的位置在何处

//4.2.2fseek()函数
//实现文件指针的定位
//语法int fseek(resource handle,int offset[,int whence])
//参数handle为要打开的文件
//offset为指针位置或相对whence参数的偏移量,可以是负值
//whence的值包括以下3种:
//      SEEK_SET,位置等于offset字节
//      SEEK_CUR,位置等于当前位置加上offset字节
//      SEEK_END,位置等于文件尾加上offset字节
//如果忽略whence参数,系统默认为SEEK_SET

//4.2.3feof()函数
//该函数判断文件指针是否在文件尾
//语法bool feof(resource handle)
//如果文件指针到了文件结束的位置,就返回true,否则返回false

//4.2.4ftell()函数
//返回当前指针的位置
//语法int ftell(resource handle)

//实例:使用上述4个指针函数输出07.txt的内容
$filename = '07.txt';
if (is_file($filename)){                                //判断文件是否存在
    echo '文件总字节数'.filesize($filename)."\n";         //输出总字节数
    $fopen = fopen($filename,'rb');                     //打开文件
    echo '初始指针位置是'.ftell($fopen)."\n";             //输出指针位置
    fseek($fopen,33);                                   //移动指针
    echo '指针位移后的位置'.ftell($fopen)."\n";            //输出指针移动后位置
    echo '输出当前指针后面的内容'.fgetc($fopen)."\n";      //输出指针后面的内容
    if (feof($fopen)){                                  //判断指针是否指向文件末尾
        echo '当前指针指向文件末尾'.ftell($fopen)."\n";    //若指向了文件末尾,输出指针位置
    }
    rewind($fopen);                                     //重置指针位置到开头
    echo '重置到开头'.ftell($fopen)."\n";                //输出重置开头后指针位置
    echo '输出前33个字节的内容'.fgets($fopen,33);         //输出33个字节的内容
    fclose($fopen);
}else{
    echo '文件不存在';
}





//5.锁定文件
//在向一个文本文件写入内容时,需要先锁定该文件,以防止其他用户同时修改此文件内容
//PHP中锁定文件的函数是flock()
//语法bool flock(resource handle,int operation)
//参数handle为一个已经打开的文件指针,operation的参数如下表
/*
operation的参数值
参数值               说明
LOCK_SH             取得各项锁定(读取文件)
LOCK_EX             取得独占锁定(写入文件)
LOCK_UN             释放锁定
LOCK_NB             防止flock()在锁定时堵塞
*/
//实例:使用flock()锁定文件,之后再写入数据,最后解除锁定,关闭文件
$filename = '08.txt';
$fd = fopen($filename,'w');         //以w模式打开文件
flock($fd,LOCK_EX);                 //锁定文件,独占共享
fwrite($fd,'hightman');             //向文件中写入数据
flock($fd,LOCK_UN);                 //解除锁定
fclose($fd);                        //关闭文件指针
readfile($filename);                //输出文件内容






//——————————————————————————————文件上传——————————————————————————————
//文件上传可以通过HTTP协议来实现。要使用文件上传功能,首先要在php.ini配置文件中对上传做一些设置
//       然后了解预定义变量$_FILES,通过$_FILES的值对上传文件做一些限制和判断,最后用move_uploaded_file()函数上传文件

//1.配置php.ini文件
//要使用文件上传功能,首先要在php.ini配置文件中对上传做一些设置。找到File Uploads项,可以看到下面3个属性,含义如下
//file_uploads:如果值为on,说明服务器支持文件上传,如果为off则不支持
//upload_tmp_dir:上传文件临时目录。在文件被成功上传之前,文件首先存放到服务器的临时目录中。如果想要指定位置,可在这里设置,否则使用系统默认目录
//upload_max_filesize:服务器允许上传的文件的最大值,以MB为单位。系统默认为2MB,用户可以自行设置
//除了File Uploads项还有几个属性也会影响到上传文件的功能
//max_execution_time:PHP中一个指令所能执行的最长时间,单位是秒
//menory_limit:PHP中一个指令所分配的内存空间。单位是MB

//如果要上传超大的文件,需要对php.ini的一些参数进行修改。
//其中包括upload_max_filesize:服务器允许上传的文件的最大值,max_execution_time:PHP中一个指令所能执行的最长时间和menory_limit:PHP中一个指令所分配的内存空间



//2.预定义变量$_FILES
//$_FILES变量存储的是上传文件的相关信息,这些信息对于上传功能有很大作用。该变量的一个二维数组。预定义变量$_FILES说明如下表
/*
预定义变量$_FILES说明
元素名                             说明
$_FILES[filename][name]           存储了上传文件的文件名
$_FILES[filename][size]           存储了文件大小,单位为字节
$_FILES[filename][tmp_name]       文件上传时,首先在临时目录中被保存成一个临时文件。该变量为临时文件名
$_FILES[filename][type]           上传文件的类型
$_FILES[filename][error]          存储了上传文件的结果。如果值为0,说明文件上传成功
*/
//实例:创建一个上传文件域,通过$_FILES变量输出上传文件的文件资料
//HTML代码见FileUpLoad.html文件
if (!empty($_FILES)){                                       //判断$_FILES是否为空
    foreach ($_FILES['upfile'] as $name => $value){         //使用循环,输出上传文件的名称和值
        echo $name.'='.$value."\n";
    }
}



//3.文件上传函数
//PHP中使用move_uploaded_file()函数上传文件
//语法bool move_uploaded_file(filename,destination)
//move_uploaded_file()函数将上传文件存储到指定位置。如果成功,则返回true,否则返回false
//参数filename是上传文件的临时文件名,即$_FILES[tmp_name]:参数destination是上传后保存的新的路径和名称
//实例:创建一个上传文件域,允许上传大小为1MB以下的文件
//HTML代码见FileUpLoad.html文件
if (!empty($_FILES['upfile']['name'])){             //判断是否有上传文件
    $fileInfo = $_FILES['up_file'];                 //将文件信息赋值给fileInfo
    if ($fileInfo['size'] < 1000000 && $fileInfo['size']>0){    //判断文件大小
        move_uploaded_file($fileInfo['tmp_name'],$fileInfo['name']);    //上传文件
        echo '上传成功';
    }else{
        echo '文件太大或未知';
    }
}
//使用move_uploaded_file()上传文件时,在创建form表单时,必须设置form表单的enctype="multipart/form-data"




//4.多文件上传
//PHP支持同时上传多个文件,只需要在表单中对文件上传域使用数组命名即可
//实例:创建4个上传文件域,文件域的名字为u_file[],提交后上传的文件信息都被保存到$_FILES[u_file]中,生成多维数组。读取数组信息,并上传文件
//HTML代码见FileUpLoad.html文件---多文件上传
if (!empty($_FILES['u_file']['name'])){                     //判断是否有上传文件
    $filename = $_FILES['u_file']['name'];                 //将上传的文件名另存为数组
    $file_tmp_name = $_FILES['u_file']['tmp_name'];         //将上传的临时文件名另存为数组
    for ($i=0;$i<count($filename);$i++){                             //循环上传文件
        if ($filename[$i] != ''){                                    //判断上传文件名是否为空
            move_uploaded_file($file_tmp_name[$i],$filename[$i]);    //上传文件
            echo '文件'.$filename[$i].'上传成功。更名为'.$i.$filename[$i]."\n";
        }
    }
}













?>