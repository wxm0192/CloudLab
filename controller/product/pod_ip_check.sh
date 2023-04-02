
#!/bin/sh
#This script is for K8S to create the required POD with image and tag
export n="-n product"
if [ $# -ne  1 ] ; then
        echo " usage : $0      pod_name "
        exit 4;
fi

pod_name=$1
#check if pod exist
pod_exist=`kubectl get pod $pod_name -o wide $n `

if [ -z "$pod_exist" ]; then
	echo "The pod doesn't  exist"                                  
	exit   4
fi

pod_ip=` kubectl get pod -o wide $n|  grep -v NAME |grep $pod_name| awk '{print $6}' `
echo $pod_ip    
