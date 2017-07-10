<?php
// 构建参数
$_SERVER["REQUEST_URI"] = "/news.php?cid=3";

// 引入Page类
require "Page.php";

// 创建对象
$pagebar = new Page(100, 9, 5);

// 显示分页
echo $pagebar->show(), "\n";

// 显示伪静态分页
$pagebar->setStatic(2, "/news-%d-%d.html", 3, 0);
echo $pagebar->show(), "\n";
