<?php

//GD库在PHP5中默认安装,但是需要激活,在php.ini文件中";extension=php_gd2.dll"选项前的分号";"删除,保存后重启服务器

//激活验证
//成功加载后,可以通过phpinfo()获取CG2函数库的安装信息,验证是否安装成功
//或者在浏览器输入127.0.0.1/phpinfo.php,在打开页面中检索到GD库的安装信息则说明安装成功


//Jpgraph安装
//可以在其官网http://www.aditus.nu/jpgraph/下载
//安装步骤:
//1.将压缩包解压文件解压到一个文件夹下
//2.打开PHP安装目录。打开php.ini,设置include_path参数,即include_path="压缩包解压文件绝对路径"
//3.重启Apache服务器

//Jpgraph的配置
//jpg-config.inc.php文件的配置需要修改两处:
//1.支持中文:
//          DEFINE('CHINESE_TTF_FONT','bkai00mp.ttf');
//2.默认图片格式设置(默认值按照PNG、GIF、JPEG的顺序检索系统支持的图片格式):
//          DEFINE("DEFINE_GFORMAT","auto");




//创建一个简单图像
$im = imagecreate(200,60);      //创建一个画布
$white = imagecolorallocate($im,225,66,159);    //设置画布背景色为粉色
imagegif($im);                  //输出画布



//使用GD2函数在照片上添加文字
//PHP中GD库支持中文,但是需要以UTF-8编码格式传递,若使用imageString()函数直接绘制会显示乱码,因为GD2对中文只能接收UTF-8编码格式,并且默认使用英文
//所以要输出中文字符,需要转码并且设置字体,否则输出乱码

//使用imagettftext()函数将文字"长白山天池"以TTF(True Type Fonts)字体输出到图像中
//步骤如下:
//1.通过header()函数输出图像类型
//2.通过imagecreatefromjpeg()函数载入照片
//3.通过imagecolorallocate()函数输出字体颜色
//4.定义输出的中文字符串所使用的字体
//5.通过iconv()函数对输出的滋味字符串编码格式进行转换
//6.通过imagettftext()函数向照片添加文字
//7.创建图像,之后释放资源
header("content-type:image/jpeg");                          //定义输出的图像类型
$im = imagecreatefromjpeg("image/photo.jpg");               //载入图片
$textcolor = imagecolorallocate($im,56,73,136);             //设置字体颜色为蓝色,值为RGB颜色值
$fnt = "c:/windows/fonts/simhei.ttf";                       //定义字体
$motto = iconv("gb2312","utf-8","长白山天池");               //定义输出字体串
imagettftext($im,220,0,480,340,$textcolor,$fnt,$motto);     //写TTF文字到图中
imagejpeg($im);                                             //建立JPEG图形
imagedestroy($im);                                          //结束图形,释放资源
//imagettftext方法中$im指图片,220是字体大小,0是文字的水平方向,480、380是文字的坐标值,$textcolor是文字颜色,$fnt是字体,$motto是照片文字




//使用图像处理生成验证码
//创建一个checks.php文件,使用GD2函数创建一个4位数验证码,并且存储到Session中,以下代码应该放在check.php中
session_start();                                            //初始化Session变量
header("content-type:image/png");                           //定义输出的图像类型
$image_width = 70;                                          //设置图像宽
$image_height = 18;                                         //设置图像高
srand(microtime()*100000);                                  //设置随机数的种子
$new_number = "";
for ($i=0;$i<4;$i++){                                       //循环输出一个思维随机数
    $new_number.= dechex(rand(0,15));
}
$_SESSION["check_checks"]=$new_number;                      //将随机验证码写入Session中
$num_img = imagecreate($image_width,$image_height);         //创建一个画布
imagecolorallocate($num_img,255,255,255);                   //设置画布颜色
for ($i=0;$i<strlen($_SESSION["check_checks"]);$i++){//循环读取Session中的验证码
    $font = mt_rand(3,5);                           //设置随机字体
    $x=mt_rand(1,8)+$image_width*$i/4;              //设置随机x坐标
    $y=mt_rand(1,$image_height/4);                  //设置随机y坐标
    $color = imagecolorallocate($num_img,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200)); //设置随机字符颜色
    imagestring($num_img,$font,$x,$y,$_SESSION["check_checks"][$i],$color); //水平输出字符
}
imagepng($num_img);                                             //建立PNG图形
imagedestroy($num_img);                                          //结束图形,释放资源


//创建一个用户登录的表单,并调用check.php文件,在表单页中输出图像的内容
//提交表单信息,使用if条件判断输入的语句是否正确,如果用户填写的验证码与随机产生的验证码相等,提示"登录成功"
session_start();
if ($_POST["submit"]!=""){
    $checks=$_POST["checks"];       //获取验证码文本框的值
    if ($checks==$_SESSION["check_checks"]){//验证码相等
        echo "<script language='javascript'>alert('用户登录成功');window.location.href='index.php';</script>";
    }else{
        echo "<script language='javascript'>alert('输入验证码不正确');window.location.href='index.php';</script>";
    }
}




//使用柱形图统计图书月销售量
//使用Jpgraph类库实现用柱状图统计图书月销售量情况,创建柱状分析图步骤如下:
//1.使用include语句引用jpgraph.php文件
//2.采用柱状图进行统计分析,需要创建BarPlot对象。BarPlot类在jpgraph_bar.php中定义,需要使用include语句引用
//3.定义一个12个元素的数组,表示12个月中的图书销量
//4.创建Graph对象,生成一个600x300像素大小的画布,设置统计图所在画布的位置以及画布的阴影、淡蓝色背景等
//5.创建一个矩形对象BarPlot,设置其柱状图的颜色,在柱状图上方显示图书销售数据,并将数据格式化为整形
//6.将绘制柱状图添加到画布中
//7.添加标题名称和X轴坐标,并分别设置其字体
//8.输出图像
include ("jpgraph/jpgraph.php");
include ("jpgraph/jpgraph_bar.php");                                //引用柱状图对象所在的文件
$datay = array(160,100,200,39,111,222,333,160,100,200,39,111);      //定义数组
$graph = new Graph(600,300,"auto");                                 //创建画布
$graph->SetScale("textlin");
$graph->yaxis->scale->SetGrace(20);
$graph->SetShadow();                                                //创建画布阴影
$graph->img->SetMargin(40,30,30,40);                                //设置统计图所在的画布位置,顺序为左右上下边距
$bplot = new BarPlot($datay);                                       //创建一个矩形的对象
$bplot->SetFillColor('red');                                        //显示柱状图颜色
$bplot->value->Show();                                              //设置显示数字
$bplot->value->SetFormat('%d');                                     //在柱状图显示格式化图书销量
$graph->Add($bplot);                                                //将柱状图添加到图像
$graph->SetMarginColor('lightblue');                                //设置画布背景色
$graph->title->Set('图书销量统计');                                   //创建标题
$bookSellArr = array("1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月");
$graph->xaxis->SetTick($bookSellArr);                               //设置x轴
$graph->title->SetFont(FF_SIMSUN);                                  //标题字体
$graph->xaxis->SetFont(FF_SIMSUN);                                  //设置x轴的字体
$graph->Stroke();                                                   //输出图像




//使用Jpgraph类库实现用折线图统计图书月销售量情况,创建折线分析图步骤如下:
//1.使用include语句引用jpgraph.php文件
//2.采用柱状图进行统计分析,需要创建LinePlot对象。LinePlot类在jpgraph_line.php中定义,需要使用include语句引用
//3.定义一个12个元素的数组,表示12个月中的图书销量
//4.创建Graph对象,生成一个600x300像素大小的画布,设置统计图所在画布的位置以及画布的阴影、淡蓝色背景等
//5.创建一个折线图对象LinePlot,设置折线图的颜色
//6.将绘制折线图添加到画布中
//7.添加标题名称和X轴坐标,并分别设置其字体
//8.输出图像
include ("jpgraph/jpgraph.php");
include ("jpgraph/jpgraph_line.php");                               //引用折线图对象所在的文件
$datay = array(160,100,200,39,111,222,333,160,100,200,39,111);      //定义数组
$graph = new Graph(600,300,"auto");                                 //创建画布
$graph->SetScale("textlin");
$graph->yaxis->scale->SetGrace(20);
$graph->SetShadow();                                                //创建画布阴影
$graph->title->Set('图书销量统计');                                   //创建标题
$graph->title->SetFont(FF_SIMSUN,FS_BOLD);                          //设置标题字体
$graph->img->SetAntiAliasing();                                     //设置折线图的平滑状态
$graph->img->SetMargin(40,30,30,40);                                //设置统计图所在的画布位置,顺序为左右上下边距
$graph->SetMarginColor('lightblue');                                //设置画布背景色
$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD);                  //设置x轴的字体
$graph->xaxis->SetPos("min");
$graph->yaxis->HideZerolabel();
$graph->ygrid->SetFill(true,'#EFEFEF@0.5','#BBCCFF@0.5');
$bookSellArr = array("1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月");
$graph->xaxis->SetTick($bookSellArr);                               //设置x轴
$graph->title->SetFont(FF_SIMSUN);                                  //标题字体
$graph->xaxis->SetFont(FF_SIMSUN);                                  //设置x轴的字体

$lplot = new LinePlot($datay);                                       //创建折线图对象
$lplot->mark->SetType(MARK_FILEDCIRCLE);                            //设置数据坐标点为圆形标记
$lplot->mark->SetWidth(4);                                           //设置圆形标记直径为4像素
$lplot->mark->SetFillColor('red');                                  //显示填充颜色
$lplot->SetColor('blue'));                                          //设置折线颜色
$lplot->SetCenter();                                                 //在x轴坐标点中心位置绘制折线
$graph->Add($lplot);                                                //将折线图添加到图像
$graph->Stroke();                                                   //输出图像







//使用Jpgraph类库实现用3D饼状图统计图书月销售量情况,创建3D饼状分析图步骤如下:
//1.使用include语句引用jpgraph.php文件和jpgraph_pie.php
//2.采用柱状图进行统计分析,需要创建PiePlot3D对象。PiePlot3D类在jpgraph_pie3d.php中定义,需要使用include语句引用
//3.定义一个6个元素的数组,表示6个商品销量
//4.创建Graph对象,生成一个600x300像素大小的画布,设置统计图所在画布的位置以及画布的阴影
//5.添加标题字体和图例的字体
//6.设置饼状图所在画布位置
//7.将绘制饼状图添加到画布中
//8.输出图像
include_once ("jpgraph/jpgraph.php");
include_once ("jpgraph/jpgraph_pie.php");
include_once ("jpgraph/jpgraph_pie3d.php");                               //引用3D饼状图对象所在的文件
$datay = array(160,100,200,39,111,222);      //定义数组
$graph = new Graph(600,300,"auto");                                 //创建画布
$graph->SetShadow();                                                //创建画布阴影
$graph->title->Set('商品销量统计');                                   //创建标题
$graph->title->SetFont(FF_SIMSUN,FS_BOLD);                          //设置标题字体
$graph->legend->SetFont(FF_SIMSUN,FS_BOLD);                          //设置图例字体
$tplot = new PiePlot3D($datay);                                       //创建3D饼状图对象
$tplot->Setlegends(array("电脑","烟酒","美食","衣物","家具","化妆"));
$targ = array("pie3d_csimex.php?v=1","pie3d_csimex.php?v=2","pie3d_csimex.php?v=3","pie3d_csimex.php?v=4","pie3d_csimex.php?v=5","pie3d_csimex.php?v=6");
$alts = array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
$tplot->SetCSIMTargets($targ,$alts);
$lplot->SetCenter(0.4,0.5);                                          //设置饼状图所在画布的位置
$graph->Add($tplot);                                                //将3D饼状图添加到图像
$graph->Stroke();                                                   //输出图像




?>