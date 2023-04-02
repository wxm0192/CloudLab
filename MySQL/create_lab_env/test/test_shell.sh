#!/bin/bash
 
if [ -n $str ];then
	echo "$str is not null"
else
	echo "$str is null"
fi
echo "-----------------------"
str=null
if [ -n "$str" ];then
	echo "$str is not null"
else
	echo "$str is null"
fi

if [  "$str"  = "null" ];then
	echo "$str is :" "null"
else
	echo "$str is :" $str
fi
