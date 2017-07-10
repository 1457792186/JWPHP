<?php
require "Template.php";

$data = array(
	"header" => array(
		"title" => "page title"
	),
	"footer" => array(
		"copyright" => "page end"
	),
	"books" => array(
		array("id" => 1, "name" => "java", "price" => 45, "cover" => "java.png"),
		array("id" => 2, "name" => ".net", "price" => 40, "cover" => "net.png"),
		array("id" => 3, "name" => "php", "price" => 60, "cover" => "php.png")
	),
	"books_length" => 3
);

$tpl = new Template("./templates", "./templates");
$tpl->builds();
$tpl->render("view", $data);