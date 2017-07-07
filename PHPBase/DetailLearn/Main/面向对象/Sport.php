<?php

/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/7/7
 * Time: 下午3:18
 */
class Sport{
    public $name;               //成员变量
    public $height;
    public $weight;
    public $sex;

    function info($name,$height,$weight,$age,$sex){  //声明成员方法
        if ($this->name == ''){                           //已有参数,修改属性
            $this->changeInfo($name,$height,$weight,$sex);
        }else{                                      //无参数,构造
            $this->__construct($name,$height,$weight,$age,$sex);
        }
    }

    public function __construct($name,$height,$weight,$age,$sex){
        $this->name = $name;                                //赋值给类属性
        $this->height = $height;
        $this->weight = $weight;
        $this->sex = $sex;
    }

    public function changeInfo($name,$height,$weight,$sex){
        $this->name = $name;                                //修改信息
        $this->height = $height;
        $this->weight = $weight;
        $this->sex = $sex;
    }

    public function __toString(){
        return $this->name;
    }
}