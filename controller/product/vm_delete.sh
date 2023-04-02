#!/bin/sh
#This script is for aliyun CLI  to controll  the required VM with image VM_NAME and time_limit 
if [ $# -ne  1 ] ; then
        echo " usage : $0     VM_NAME   "
        exit 4;
fi

VM_NAME=$1
#check if VM  exist
VM_NAME=\"$VM_NAME\"
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
if [ -z "$EID" ]; then
	echo "EID is empty" ;
	echo " Cann't delete  the ECS" ;
	exit 4 ;
fi
#EID=\"$EID\"
echo aliyun ecs StopInstance --InstanceId=$EID  --ForceStop=true --StoppedMode=StopCharging | sh
status=`echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'`
while [ "$status" != \"Stopped\" ]
do
	echo 1  ;
	echo "stopping  ECS ...... " ;
	sleep 1 ;
	#status=\"Running\" ;
	status=`echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
	echo $status ;
	echo ${EID}":"$status         ;
done
sleep 1
while [ 1 ]
do
	exist=`aliyun ecs DescribeInstanceStatus | grep $EID ` ;
	echo $exist ;
	if [ -z "${exist}" ] ;  then
			echo "No requested ECS" ;
			break  ;
		else
			echo aliyun ecs DeleteInstance   --InstanceId $EID | sh  ;
			echo aliyun ecs DeleteInstance   --InstanceId $EID  ;
			echo "The checking string is:"$exist ;
	fi
	sleep 2 ;
done


