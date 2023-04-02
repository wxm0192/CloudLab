#!/bin/sh
#This script is for K8S to create the required POD with image and tag
export n="-n product"
if [ $# -ne  3 ] ; then
        echo " usage : $0   Images-name  Tag   pod_name "
        exit 4;
fi

image=$1
tag=$2
pod_name=$3
#check if pod exist
pod_exist=`kubectl get pod $pod_name -o wide $n `

if [ -n "$pod_exist" ]; then
	echo "The pod already  exists"                                  
	echo "Creat POD  Failed"
	exit   4
fi

kubectl run $pod_name --image=$image:$tag  $n                   

