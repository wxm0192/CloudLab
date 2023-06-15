#!/bin/sh
if [ $# -lt 2  -o $1 -gt 9 -o $2 -gt 9 ] ; then 
	echo "应该输入两个小于10 的正整数 "
	echo "usage :  sho01  M N "
	exit -1 
fi

echo "第一个参数是 :"$1
echo "第二个参数是 :"$2
echo ;

i=$1  ;
j=$2 ; 
seperator="     " ;

for ((i=1; i<=$1; i++))
do
	out_string="" ;
	for ((j=1; j<=$i; j++))
	do
	
		value=$(($j*$i)) ;
		out_string=${out_string}${seperator}$value ;
	done
	echo "$out_string" ;
done

