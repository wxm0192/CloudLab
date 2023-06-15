#!/bin/sh

a=10
b=30
#if [  $a -gt 9 ] || [  $b -gt 9 ] ; then 
if [  $a -gt 9 -o   $b -gt 9 ] ; then 
	echo "应该输入两个小于10 的正整数 "
	echo "usage :  sho01  M N "
	exit -1 
fi


