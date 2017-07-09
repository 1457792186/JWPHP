<?php


//使用crypt()函数进行加密
//crypt()可以实现单向加密功能
//语法string crypt(str[,salt])
//参数str是需要加密的字符串,参数salt是加密时使用的干扰串。若使用第二个参数salt,则会随机生成一个干扰串
//crypt()函数支持4种算法和salt参数的长度
/*
crypt()函数支持4种算法和salt参数的长度
算法                                  salt长度
CRYPT_STD_DES                       2-character(默认)
CRYPT_EXT_DES                       9-character
CRYPT_MD5                           12-character(以$1$开头)
CRYPT_BLOWFISH                      16-character(以$2$开头)
*/
//默认情况下,PHP使用一个或两个字符的DES干扰串,若系统使用的是MD5,则会使用12个字符。可以通过CRYPT_SALT_LENGTH变量来查看当前所使用的干扰串的长度

$str = 'This is an example';            //声明字符串变量$str
$crypttostr = crypt($str);              //对变量加密
echo '加密后$str:'.$crypttostr;          //输出加密后的变量
//未添加salt参数每次加密结果不同

$crypttostr = crypt($str,'tm');              //使用salt对变量加密
echo '加密后$str:'.$crypttostr;          //输出加密后的变量
//判断时对输出信息再次使用相同的salt参数进行加密,两者加密后结果相同





//使用md5()进行加密
//将不同长度的数据计算成一个128位的数值
//语法string md5(string str[,bool raw_output])
//参数str为要加密的明文,raw_output参数如果设为true,则函数返回一个二进制密文,参数默认为false
echo md5($str);             //输出md5加密




//使用sha1()进行加密
//将不同长度的数据计算成一个40位的十六位进制数
//语法string sha1(string str[,bool raw_output])
//参数str为要加密的明文,raw_output参数如果设为true,则函数返回一个20位的二进制密文,参数默认为false
echo sha1($str);             //输出sha1加密








//Mcrypt扩展库
//Mcrypt库安装:在PHP的主目录下包含了libmcrypt.dll(Mcrypt扩展库)和libmhash.dll文件(Mhash扩展库),在这里一起安装上。
//          首先将文件复制到系统目录windows\system32下,然后在php.ini中找到";extension=php_mcrypy.dll"和";extension=php_mhash.dll"
//          将前面的分号";"去掉,最后重启服务器


//Mcrypt库常量:
//支持20多种加密算法和8种加密模式可以通过mcrypt_list_algorithms()和mcrypt_list_modes()查看
$en_dir = mcrypt_list_algorithms();     //返回Mcrypt库支持的加密算法数组
echo 'Mcrypt库支持的加密算法数组:'.$en_dir;
$mo_dir = mcrypt_list_modes();     //返回Mcrypt库支持的加密模式数组
echo 'Mcrypt库支持的加密模式数组:'.$mo_dir;
//这些加密算法和加密模式在实际应用中要用常量表示,要加上前缀'MCRYPT_'和'MCRYPT_MODE_'
//如TWOFISH算法表示为MCRYPT_TWOFISH
//  CBC加密模式表示为MCRYPT_MODE_CBC

//实例:
$str = 'This is an example';                    //加密文本
$key = 'key:11';                                //密钥
$cipher = MCRYPT_DES;                           //密码类型
$modes = MCRYPT_MODE_ECB;                       //密码模式
$iv = mcrypt_create_iv(mcrypt_get_iv_size($cipher,$modes),MCRYPT_RAND); //初始化向量
echo '加密前:'.$str;
$str_encrypt = mcrypt_encrypt($cipher,$key,$str,$modes,$iv);        //加密函数
echo '加密后:'.$str_encrypt;
$str_decrypt = mcrypt_decrypt($cipher,$key,$str_encrypt,$modes,$iv);    //解密函数
echo '还原:'.$str_decrypt;

//说明:
//1.进行加密解密前需要创建一个初始化向量iv,向量iv需要两个参数,size指定iv的大小,source为iv的源。source可以取以下三个值
//MCRYPT_RAND:系统随机数
//MCRYPT_DEV_RANDOM:读取目录/dev/random中的数据(UNIX系统)
//MCRYPT_DEV_URANDOM:读取目录/dev/urandom中的数据(UNIX系统)
//2.int mcrypt_get_iv_size(cipher,modes)函数返回初始化向量的大小$cipher是加密算法,$modes是加密模式
//3.mcrypt_encrypt($cipher,$key,$str,$mode,$iv)函数是加密算法
//  参数$cipher是加密算法,$key是密钥,$str是加密数据,$mode是加密模式,$iv是初始化向量
//4.mcrypt_decrypt($cipher,$key,$str_encrypt,$modes,$iv)是解密算法,参数与加密算法参数相同







//Mhash扩展库
//Mhash库支持MD5、SHA、CRC32等多种散列算法,可以使用mhash_count()和mhash_get_hash_name()函数输出支持的算法名称
$num = mhash_count();     //函数返回最大的hash id
echo 'Mhash库支持的加密算法:';
for ($i=0;$i<$num;$i++){
    echo $i."=>".mhash_get_hash_name($i);       //输出每个hash id的名称
}
//这些加密算法在实际应用中要用常量表示,要加上前缀'MHASH_'
//如CRC32加密模式表示为MHASH_CRC32
//Mhash总共有5个函数,其他3个函数:

//mhash_get_block_size()
//语法:int mhash_get_block_size(int hash)
//用来获取参数hash的区块大小,如mhash_get_block_size(MHASH_CRC32)

//mhash()
//语法:string mhash(int hash,string data[,string key])
//该函数返回一个哈希值,参数hash为要使用的算法,参数data是要加密的数据,参数key是加密使用的密钥

//mhash_keygen_s2k()
//string mhash_keygen_s2k(int hash,string password,string salt,int bytes)
//该函数将根据参数password和salt返回一个单位为字节的key值,参数hash为要使用的算法
//      其中salt为一个固定8字节的值,若给出数值小于8个字节,将用0补齐

//实例:使用mhash_keygen_s2k()函数生成一个校验码,并使用bin2hex()函数将二进制转换为十六进制
$filename = '08.txt';                       //文件路径
$str = file_get_contents($filename);        //读取文件内容到变量$str中
$hash= 2;                                   //设置hash值
$password = '111';                          //设置变量$password
$salt = '1234';                             //设置变量$salt
$key = mhash_keygen_s2k(1,$password,$salt,10);  //生成key值
$str_mhash = bin2hex(mhash($hash,$str,$key));   //使用$key值、$hash值对字符串$str加密
echo '校验码:'.$str_mhash;                     //输出校验码



?>