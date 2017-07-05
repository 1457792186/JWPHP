<?php

//PHP与Web表单的综合运用
if ($_POST[submit] != ""){//如果提交了表单
    echo "简历内容是:";
    echo "姓名:".$_POST[user];
    echo "性别:".$_POST[sex];
    echo "密码:".$_POST[pwd];
    echo "学历:".$_POST[select];
//    获取"爱好"复选框
    echo "爱好:";
    for ($i=0;$i<count($_POST[fond]);$i++){
        echo $_POST[fond][$i]."&nbsp;&nbsp;";
//        实现文件上传功能,将上传的文件存储在upfiles文件夹中
        $path = './upfiles/'.$_FILES['photo']['name'];//指定上传的路径及文件名
        move_uploaded_file($_FILES['photo']['tmp_name'],$path);//上传文件
        echo "照片:".$path;//输出照片路径
    }
    echo "个人简介:",$_POST[intro];//输出个人简历
}






































?>