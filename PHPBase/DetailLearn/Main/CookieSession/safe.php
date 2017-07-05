<?php

session_start();            //初始化Session
unset($_SESSION["user"]);   //删除用户名会话变量
unset($_SESSION["pwd"]);    //删除用户密码会话变量
session_destroy();          //删除所有会话变量
header("location:index.php");//跳转到首页

?>