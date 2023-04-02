#!/bin/sh
VM_NAME=$1
VM_NAME=\"$VM_NAME\"
vm_exist=`echo aliyun ecs DescribeInstances   --InstanceName $VM_NAME |sh |jq '.Instances.Instance[0].InstanceId'`
#echo "VM exist check :" $vm_exist
if [  "$vm_exist" ==  "null"  ]; then
        vm_exist=""
fi
if [ -z "$vm_exist" ]; then
        echo "The VM doesn't  exist"
        exit   4
fi
#echo aliyun ecs DescribeInstances  --InstanceIds   \'[$EID]\' |sh  | jq '.Instances.Instance[0].NetworkInterfaces.NetworkInterface[].PrimaryIpAddress'
echo aliyun ecs DescribeInstances  --InstanceName  $VM_NAME |sh  | jq '.Instances.Instance[0].NetworkInterfaces.NetworkInterface[].PrimaryIpAddress'
