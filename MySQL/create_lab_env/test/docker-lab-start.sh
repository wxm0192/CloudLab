#!/bin/sh
#This script is for K8S to control  the required POD with image and tag 
alias "k8=kubectl"
# export n="-n product"
LOG_DIR=/usr/share/nginx/www/log/
LOG_FILE=${LOG_DIR}/sh_log

if [ $# -lt  5 ] ; then
	echo ' usage : ./docker-lab-start.sh  Operation_type(new, del )  Images-name  Tag   lab_id  session_id '
	echo ' usage : ./docker-lab-start.sh  Operation_type(new, del )  Images-name  Tag   lab_id  session_id ' > $LOG_FILE
	exit -1;
fi

echo "Operation_Type (new: Create a lab ; del : delete a lab ; get : Get POD IP ) : " $1
echo "image name : " $2
echo "Tag : " $3
echo "Lab ID : " $4
echo "Session ID : " $5
echo "$0 $1 $2 $3 $4 $5   "
pod_name="labpod"-$4-$5
echo "Pod Name:" $pod_name

if  [ $# != 5 ] ; then
	echo $# 
	exit   -1 
fi

#check image name and id 
image_exist=`docker images $2:$3|  grep -v EPOSITORY `


STRING=$image_exist

if [ -z "$image_exist" ]; then
        echo "The required image( $2:$3 ) does not exist  "
	exit   -1 
fi

if [ -n "$image_exist" ]; then
        #echo "STRING is not empty"
        #echo $2:$3
        echo "This is the image : " $2:$3   
fi

#check if pod exist      
        pod_exist=`k8 get pod $pod_name -o wide $n 2>/dev/null`

if [ "$1" = "new" ]; then 
	if [ -n "$pod_exist" ]; then
		echo "The pod already  exists"
		exit   -1 
	fi
	k8 run $pod_name --image=$2:$3  $n 
        k8 get pod $pod_name -o wide $n
	pod_ip=` k8 get pod -o wide $n |  grep -v NAME |grep $pod_name| awk '{print $6}' `
	pod_status=` k8 get pod -o wide  $n|  grep -v NAME |grep $pod_name| awk '{print $3}' `
        time_count=0 
        while (( $time_count < 30 ))
	do 
		if [ $pod_status != "Running" ]; then 
			sleep 2 
        		k8 get pod $pod_name -o wide  $n
			pod_ip=` k8 get pod -o wide $n|  grep -v NAME |grep $pod_name| awk '{print $6}' `
			pod_status=` k8 get pod -o wide $n|  grep -v NAME |grep $pod_name| awk '{print $3}' `
			echo $time_count
			echo $pod_status
		else
			#exit  $pod_ip
			echo "POD IP is : "  $pod_ip   

			exit  0  
		fi
		time_count=$((time_count+2))
        done
        echo "Failed to creat the pod "
	exit -1
fi 


if [ "$1" = "del" ]; then 
	if [ -z "$pod_exist" ]; then
		echo "The pod doesn't exist"
		exit   -1 
	fi
        k8 delete pod $pod_name $n  --force 
	echo "The lab pod is deleted   "                 
	exit 0
fi 


if [ "$1" = "get" ]; then 
	if [ -z "$pod_exist" ]; then
		echo "The pod doesn't exist"
		exit   -1 
	fi
	pod_ip=` k8 get pod -o wide $n|  grep -v NAME |grep $pod_name| awk '{print $6}' `
	pod_status=` k8 get pod -o wide $n|  grep -v NAME |grep $pod_name| awk '{print $3}' `
	if [ $pod_status != "Running" ]; then 
		echo "This POD ststus is not running : $pod_status  , can't get POD ID"
		exit -1 
	else
		#exit  $pod_ip

		echo -e "POD IP is : \n$pod_ip"   

		exit  0  
	fi
fi 
