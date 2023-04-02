#!/bin/sh
#This script is for K8S to control  the required POD with image and tag 
#alias "kubectl=kubectl"
# export n="-n product"
LOG_DIR=/usr/share/nginx/www/MySQL/create_lab_env
LOG_FILE=${LOG_DIR}/sh_log
date >>$LOG_FILE
if [ $# -lt  5 ] ; then
	echo ' usage : ./docker-lab-start.sh  Operation_type(new, del , get)  Images-name  Tag   lab_id  session_id ' >>$LOG_FILE
	exit 4;
fi

echo "Operation_Type (new: Create a lab ; del : delete a lab ; get : Get POD IP ) : " $1   >> $LOG_FILE
echo "image name : " $2 >>$LOG_FILE
echo "Tag : " $3 >>$LOG_FILE
echo "Lab ID : " $4 >>$LOG_FILE
echo "Session ID : " $5 >>$LOG_FILE
echo "$0 $1 $2 $3 $4 $5   " >>$LOG_FILE
pod_name="labpod"-$4-$5
echo "Pod Name:" $pod_name >>$LOG_FILE

if  [ $# != 5 ] ; then
	echo "argus:"$# >>$LOG_FILE
	echo "argus:"$# 
	exit   4 
fi

#check image name and id 
#image_exist=`docker images $2:$3|  grep -v EPOSITORY `


#check if pod exist      
        pod_exist=`kubectl get pod $pod_name -o wide $n `

if [ "$1" = "new" ]; then 
	if [ -n "$pod_exist" ]; then
		echo "The pod already  exists"                  >>$LOG_FILE
		echo "New Failed"  
		exit   4 
	fi
	kubectl run $pod_name --image=$2:$3  $n   >>$LOG_FILE
        kubectl get pod $pod_name -o wide $n   >>$LOG_FILE
	pod_ip=` kubectl get pod -o wide $n |  grep -v NAME |grep $pod_name| awk '{print $6}' `
	pod_status=` kubectl get pod -o wide  $n|  grep -v NAME |grep $pod_name| awk '{print $3}' `
        time_count=0 
        #while (( $time_count < 30 ))
	while [ $time_count -lt 30 ]
	do 
		if [ $pod_status != "Running" ]; then 
			sleep 2 
        		kubectl get pod $pod_name -o wide  $n  >>$LOG_FILE        
			pod_ip=` kubectl get pod -o wide $n|  grep -v NAME |grep $pod_name| awk '{print $6}' `
			pod_status=` kubectl get pod -o wide $n|  grep -v NAME |grep $pod_name| awk '{print $3}' `
			echo $time_count  >> $LOG_FILE
			echo $pod_status   >> $LOG_FILE
		else
			#exit  $pod_ip
			echo  ${pod_name}":"$pod_ip":"$pod_status   >>$LOG_FILE
			echo  ${pod_name}":"$pod_ip":"$pod_status   
			exit  0  
		fi
		time_count=$((time_count+2))
        done
        kubectl delete pod $pod_name $n  --force                           >>$LOG_FILE
        echo "Failed to creat the pod "                 
	exit 4
fi 


if [ "$1" = "del" ]; then 
	if [ -z "$pod_exist" ]; then
		echo "The pod doesn't exist"          >>$LOG_FILE
		echo "Del Failed"             
		exit   4 
	fi
        kubectl delete pod $pod_name $n  --force                           >>$LOG_FILE
	echo "Pod:Deleted "   
	exit 0
fi 


if [ "$1" = "get" ]; then 
	if [ -z "$pod_exist" ]; then
		echo "The pod doesn't exist" >> $LOG_FILE
		echo "Get Failed" 
		exit   4 
	fi
	pod_infor=`kubectl  get pod -o wide | grep $pod_name | awk '{print $1":"$3":"$6":"$7}'`
	echo $pod_infor 
	exit 0
fi 
