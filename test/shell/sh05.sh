#!/bin/sh
if [ $# -lt 1  -o $1 -gt 9  ] ; then 
	echo "应该输入一个小于10 的正整数作为参数 "
	echo "usage :  "$0"   N "
	exit -1 
fi

echo "输入参数是 :"$1
echo ;

i=$1  ;
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

