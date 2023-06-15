#!/bin/sh
file_list=`ls *.php`
echo $file_list
for i in $file_list
do 
	echo $i
	#echo sed -i "s/MySQL\/create_lab_env\/test\//v03\//g" $i               
	#sed -i "s/MySQL\/create_lab_env\/test\//v03\//g" $i               
	echo sed -i "s/MySQL\/create_lab_env/v03/g" $i               
	sed -i "s/MySQL\/create_lab_env/v03/g" $i               
done
