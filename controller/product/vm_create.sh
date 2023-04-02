#!/bin/sh
#This script is for aliyun CLI  to controll  the required VM with image VM_NAME and time_limit 
if [ $# -ne  2 ] ; then
        echo " usage : $0   Images-name  VM_NAME   "
        exit 4;
fi

IMG_ID=$1
VM_NAME=$2
#check if VM  exist
VM_NAME=$VM_NAME
echo $VM_NAME
vm_exist=`echo aliyun ecs DescribeInstances   --InstanceName $VM_NAME |sh |jq '.Instances.Instance[0].InstanceId'`
echo $vm_exist
if [ "${vm_exist}" =  "null"  ]; then
	vm_exist=""
fi
if [ -n "$vm_exist" ]; then
	echo "The VM already  exists"                                  
	echo "Creat VM   Failed"
	exit   4
fi

a=`aliyun ecs CreateInstance \
                --RegionId=cn-zhangjiakou  \
                --ImageId=$IMG_ID  \
                --InstanceType=ecs.s6-c1m2.small  \
                --SecurityGroupId=sg-8vb87jnn7iq7gzp6d01q  \
                --VSwitchId=vsw-8vbn0qdm4x187nnxcjadp  \
                --InstanceName=$VM_NAME \
                --InstanceChargeType=PostPaid  \
                --ResourceGroupId=rg-acfmznbbajghpaq `
EID=`echo $a |  jq  '.InstanceId'`
if [ -z "$EID" ]; then
	echo "EID is empty" ;
	echo " Cann't create the ECS" ;
	exit 4 ;
fi

