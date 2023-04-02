#!/bin/sh
#This script is for aliyun CLI  to controll  the required VM with image VM_NAME and time_limit 
if [ $# -ne  2 ] ; then
        echo " usage : $0     VM_NAME time_limit  "
        exit 4;
fi

VM_NAME=$1
time_limit=$2
#check if VM  exist
#VM_NAME=\"$VM_NAME\"
echo $VM_NAME
vm_exist=`echo aliyun ecs DescribeInstances   --InstanceName $VM_NAME |sh |jq '.Instances.Instance[0].InstanceId'`
echo $vm_exist
if [  "$vm_exist" =  "null"  ]; then
	vm_exist=""
fi
if [ -z "$vm_exist" ]; then
	echo "The VM doesn't  exist" 
	exit   4
fi

EID=`echo aliyun ecs DescribeInstances   --InstanceName $VM_NAME |sh |jq '.Instances.Instance[0].InstanceId'`
echo $EID
echo "This is the EID : "$EID
if [ -z "$EID" ]; then
	echo "EID is empty" ;
	echo " Cann't activate the ECS" ;
	exit 4 ;
fi
status=`echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'`
if [ "$status" = \"Running\" ]; then 
	echo "This VM is already activated " ;
	exit 4 ;
fi

#Here to wait the ECS finish initialization  
echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'
status=`echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'`
while [ "$status" != \"Stopped\" ]
do
	echo 1  ;
	echo "Creating ECS ...... " ;
	sleep 1 ;
	echo "Creating ECS ...... " ;
	status=`echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
	echo ${EID}":"$status    ;
done
#Here to start the ECS
echo aliyun ecs StartInstance  --InstanceId=$EID |sh ;

while [ "$status" != \"Running\" ]
do
	echo 1  ;
	echo "starting ECS ...... " ;
	sleep 1 ;
	echo "starting ECS ...... " ;
	status=`echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
	echo $status ;
	echo ${EID}":"$status   ;
done

status=`echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
echo $status ;

#Allocate Public IP
echo aliyun ecs ModifyInstanceSpec  --InstanceId=$EID  --InternetMaxBandwidthOut=1 | sh
echo "aliyun ecs AllocatePublicIpAddress --InstanceId=$EID | sh"
echo aliyun ecs AllocatePublicIpAddress --InstanceId=$EID | sh | jq '.IpAddress'

#set autoreleasetime
dd=` date -u  -d @$(($(date +%s) + $time_limit*60 + 60 )) +%Y-%m-%dT%TZ `
echo "setting autorelease time "
echo aliyun ecs ModifyInstanceAutoReleaseTime  --InstanceId=$EID   --AutoReleaseTime=$dd
echo aliyun ecs ModifyInstanceAutoReleaseTime  --InstanceId=$EID   --AutoReleaseTime=$dd | sh

