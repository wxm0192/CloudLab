#!/bin/bash
# author:菜鸟教程
# url:www.runoob.com

demoFun(){
    echo "这是我的第一个 shell 函数!"
	echo $1 ;
	echo $2 ;
}
echo "-----函数开始执行-----"
demoFun new  image01  ;
echo "-----函数执行完毕-----"
