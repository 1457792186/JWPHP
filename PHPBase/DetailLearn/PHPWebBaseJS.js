/**
* Created by apple on 2017/7/4.
*/


/*
* JavaScript数据类型
*
* 数据类型          说明                                      举例
* 字符串类型     使用单引号或双引号括起来的多字符                如"PHP"、"I like JS"等
* 数值型        包括整数或浮点数(包含小数或科学计数)             如-128、12.9、9.88e6等
* 布尔型        true或false                                 如envent.isSelected = flase
* 对象型        用于指定JavaScript中用到的对象                 如网页表单元素
* 空值          可以通过给一个变量赋null值来清除变量的内容       如a=null
* Undefined     表示该变量尚未被赋值                           如var = a;
* */



/*
 JavaScript事件
 类别             事件                       说明
 onclick                    鼠标单击时触发
 ondblclick                 鼠标双击时触发
 onmousedown                按下鼠标时触发
 onmouseup                  按下鼠标松开时触发
 鼠标点击事件      onmouseover                鼠标移动到某对象范围的上方时触发
 onmousemove                鼠标移动时触发
 onmouseout                 鼠标离开某对象范围时触发
 onkeypress                 键盘上某个按键被按下并释放时触发
 onkeydown                  键盘上某个按键被按下时触发
 onkeyup                    键盘上某个按键被按下后松开时触发

 onabort                    图片下载时被用户中断时触发
 页面相关事件      onload                     页面内容完成加载时触发
 onresize                   浏览器窗口大小改变时触发
 onunload                   页面将被改变时触发

 onblur                     元素失去焦点时触发
 onchange                   元素失去焦点并且元素的内容发生改变时触发
 表单相关事件      onfocus                    某个元素获得焦点时触发
 onreset                    表单中reset属性被激活时触发
 onsubmit                   一个表单被提交时触发此事件

 onbounce                   当Marquee内的内容移动至Marquee显示范围之外时触发此事件
 滚动字幕事件      onfinish                   当Marquee元素完成需要显示的内容后触发此事件
 onstart                    当Marquee元素开始显示内容时触发此事件
 */






//变量的声明与赋值
//所有的JavaScript变量由关键字var声明
//语法: var varrable;
// 在声明时可赋予初值
var variable = 1;

//声明多个变量:
var  a,b;

//声明多个变量的同时对其赋值,如:
var a1=1;b1=2;
//若只是声明了变量,未对其赋值,默认值为undefined;      JavaScript自动识别变量类型

//注释
// JavaScript可以识别//和/**/注释,同时也可以识别<!--的html注释,但是不能识别-->结束标识



//自定义函数
/*语法
 function 函数名([参数]) {
 returnvar;
 }
*/
//例子:自定义一个calculate()函数,实现两个数的乘积。然后在函数体外调用,同时传入两个参数,最后应用document.write()对象输出结果
function calculate(a,b) {   //自定义一个calculate()函数
    return a*b;             //返回两个参数的乘积
}
document.write(calculate(12,13));   //调用calculate()函数并传递参数,输出结果


//流程控制语句
if(a1==1){
    alert("值相等");
}else {
    alert("值不等");
}


/*
 switch (表达式或变量){
 case 常量表达式1:
 break;
 case 常量表达式2:
 break;
 default:
 break;
 }
*/
switch (a1){
    case 1:
        alert("是1");
        break;
    case 2:
        alert("是2");
        break;
    default:
        break;
}






/*
解决浏览器不支持JS的问题
1.打开浏览器,选择"工具"/"Internet选项",打开"Internet选项"对话框,选择"安全"选项卡,选择Internet安全设置项,单击"自定义级别"按钮
2.将对话框中的"Java小程序脚本"和"活动脚本"两个选项设置为启用状态,单击"确定",开启JS支持

开启浏览器对本地JS的支持:
可点击安全提示域,选择"允许阻止的内容(A)..."
若要永久消除安全提示,需要打开浏览器,选择"工具"/"Internet选项",打开"Internet选项"对话框,选择"高级"选项卡,
   在安全设置中,选中"允许活动内容在我的计算机文件中运行"和"允许来自CD的活动内容在我的计算机上运行"复选框(此选项仅适用于Win_XP操作系统),单击"确定"按钮;


*/








//Html调用JavaScript脚本
/*1.Html中调用JavaScript——————需要在body标记外使用

 <script language="javascript">
 代码
 </script>

 //在表单元素相应事件下调用自定义函数
 //如:按钮的单击事件调用check()函数
 <body>
 <input type="submit" name="submit" value="test" onClick="check();">
 </body>
 */


/*2.PHP动态网页中引用JS文件————可以使用src属性指定外部的javaScript文件的路径,从而引用
 language="javascript"可省略,因为引用文件有后缀默认使用javascript语言

 <script src="PHPWebBaseJS.js" language="javascript">

 </script>
 */


/*
应用注释符号验证浏览器是否支持JS
若用户不能确定浏览器是否支持JS,可使用Html注释符号进行验证,若在此注释符中编写,对不支持JS的浏览器会把JS脚本作为注释符处理

 <script src="PHPWebBaseJS.js" language="text/javascript">
        <!--
            document.write("浏览器支持JS脚本");
        -->
 </script>

*/

/*
应用<noscript>标记验证浏览器是否支持JS脚本

 <script src="PHPWebBaseJS.js" language="text/javascript">
 document.write("浏览器支持JS脚本");
 </script>

 <noscript src="PHPWebBaseJS.js" language="text/javascript">
 浏览器不支持JS脚本;
 </noscript>
*/






