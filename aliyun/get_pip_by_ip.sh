#/bin/sh
if [ -z $1 ] ; then 
	echo "IP should be assigned . " ;
	exit -1 ;
fi
cd /root/aliyun

./list_ecs.sh | grep $1  | awk '{print $5}'

