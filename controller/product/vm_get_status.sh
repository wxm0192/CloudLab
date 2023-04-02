#!/bin/sh
if [ $# -ne  1 ] ; then
        echo " usage : $0     VM_NAME   "
        exit 4;
fi

VM_NAME=$1
VM_NAME=\"$VM_NAME\"
vm_exist=`echo aliyun ecs DescribeInstances   --InstanceName $VM_NAME |sh |jq '.Instances.Instance[0].InstanceId'`
if [  "$vm_exist" =  "null"  ]; then
        vm_exist=""
fi
if [ -z "$vm_exist" ]; then
        echo "The VM doesn't  exist"
        exit   4
fi
#sleep 20;
echo aliyun ecs DescribeInstances  --InstanceName  $VM_NAME |sh  | jq '.Instances.Instance[0].Status'                                                       

