#/bin/sh

# For examples : ssh root@172.20.0.1 " /root/aliyun/vm_lab_ctl.sh new m-8vb35k67frag92hcy8pa 2110 biz_net 172.30.2.181 60"

PWD=/root/app/v02/log
ECS_STATUS_FILE=${PWD}/ecs_status

vm_start(){
	if [ $# -lt  3 ] ; then
		echo ' usage : ./vm_start    Images-name  VM_NAME  time_limit'
		exit -1;
	fi
    	echo "This function to start the VM " ;
        echo $1 ;
        echo $2 ;

	PATH=$PATH:/root/app/v02/contoller

	PWD=/root/app/v02/log
	ECS_STATUS_FILE=${PWD}/ecs_status
	echo "Stopped" > $ECS_STATUS_FILE

	#IP=172.30.2.180
	#IMG_ID=m-8vb35k67frag92hcy8pa
	IMG_ID=$1                       
	VM_NAME=$2             
	time_limit=$3 

	a=`aliyun ecs CreateInstance \
		--RegionId=cn-zhangjiakou  \
		--ImageId=$IMG_ID  \
		--InstanceType=ecs.s6-c1m2.small  \
		--SecurityGroupId=sg-8vb87jnn7iq7gzp6d01q  \
		--VSwitchId=vsw-8vbn0qdm4x187nnxcjadp  \
		--InstanceName=$VM_NAME \
		--InstanceChargeType=PostPaid  \
#		--PrivateIpAddress=$IP   \
		--ResourceGroupId=rg-acfmznbbajghpaq `
		###--DryRun=true
	EID=`echo $a |  jq  '.InstanceId'`
	if [ -z "$EID" ]; then
 		echo "EID is empty" ; 
		echo " Cann't create the ECS" ; 
		exit -1 ;
	fi

	echo "This is the EID : "$EID
	echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'
	status=`echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'`
	while [ "$status" != \"Stopped\" ]   
	do   
		echo 1  ;
		echo "Creating ECS ...... " ;
		sleep 1 ;
		#status=\"Running\" ;
		echo "Creating ECS ...... " ;
		status=`echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
		echo ${EID}":"$status   > $ECS_STATUS_FILE ;
	done
	#Here to start the ECS
	echo aliyun ecs StartInstance  --InstanceId=$EID |sh ;

	while [ "$status" != \"Running\" ]   
	do   
		echo 1  ;
		echo "starting ECS ...... " ;
		sleep 1 ;
		#status=\"Running\" ;
		echo "starting ECS ...... " ;
		status=`echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
		echo $status ; 
		#echo $status   > $ECS_STATUS_FILE ;
		echo ${EID}":"$status   > $ECS_STATUS_FILE ;
	done

	status=`echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
	echo $status ; 
	echo ${EID}":"$status   > $ECS_STATUS_FILE ;

	#Allocate Public IP 
	echo aliyun ecs ModifyInstanceSpec  --InstanceId=$EID  --InternetMaxBandwidthOut=1 | sh
	echo "./aliyun ecs AllocatePublicIpAddress --InstanceId=$EID | sh"
	echo aliyun ecs AllocatePublicIpAddress --InstanceId=$EID | sh | jq '.IpAddress'

	#set autoreleasetime 
	#time_limit=60
	dd=` date -d @$(($(date +%s) + $time_limit*60 )) +%Y-%m-%dT%TZ `
	echo "setting autorelease time "
	echo aliyun ecs ModifyInstanceAutoReleaseTime  --InstanceId=$EID   --AutoReleaseTime=$dd 
	echo aliyun ecs ModifyInstanceAutoReleaseTime  --InstanceId=$EID   --AutoReleaseTime=$dd | sh 


	
	#Get the EID attribute out file name 
	eid_out_file=`echo $EID | sed 's/\"//g' `
	eid_out_file=${PWD}/${eid_out_file}".out" 

	echo aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh  > $eid_out_file

	#aliyun ecs DescribeInstanceStatus
	aliyun ecs DescribeInstances --output cols=InstanceId,InstanceName,PublicIpAddress.IpAddress,Status,NetworkInterfaces.NetworkInterface[0].PrimaryIpAddress rows=Instances.Instance 
	sleep 5 

} ##end of function start_vm


vm_stop(){
	PWD=/root/app/v02/log
	FILE=${PWD}/ecs_status
	#echo "Stopping" > $FILE
	VM_NAME=$1
	echo "VM is :"$VM_NAME

	EID=` aliyun ecs DescribeInstances --output cols=InstanceId,InstanceName,PublicIpAddress.IpAddress,Status,NetworkInterfaces.NetworkInterface[0].PrimaryIpAddress  rows=Instances.Instance | grep $VM_NAME | awk '{print $1}'`
	if [ -z $EID ] ; then 
		echo "The ECS not exist";
		return -1 ;
	fi

	#EID=$1
	echo $EID 
	EID=\"${EID}\"
	echo $EID 
	exist=`aliyun ecs DescribeInstanceStatus | grep $EID | awk '{print $2}'` ;
	if [ -z $exist ] ; then 
		echo "The ECS not exist :"$EID ;
		exit -1 ;
	fi
	#echo ./aliyun ecs StopInstance --InstanceId=$EID  --ForceStop=false --StoppedMode=StopCharging | sh
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
		echo ${EID}":"$status > $FILE ;
	done
	sleep 5 
	while [ 1 ] 
	do 
		exist=`aliyun ecs DescribeInstanceStatus | grep $EID | awk '{print $2}'` ;
		echo $exist ;
		if [ -z $exist ] ;  then
				echo "No requested ECS" ;
				break  ;
			else 
				echo aliyun ecs DeleteInstances   --InstanceId.1=$EID | sh  ;
				echo aliyun ecs DeleteInstances   --InstanceId.1=$EID  ;
				echo "The checking string is:"$exist ;
		fi
		sleep 5 ;
	done 
	echo ${EID}":""Deleted" > $FILE ;
} ##end of vm_stop function 

if [ $# -lt  4 ] ; then
        echo ' usage : ./vm_lab_ctl.sh  Operation_type(new, del )  Images-name  VM_NAME  time_limit'
        exit -1;
fi

echo ' usage : ./$0  $Operation_type $Images-name  $VM_NAME  $time_limit '
echo "Operation_Type (new: Create a lab ; del : delete a lab ) : " $1
echo "image name : " $2
echo "VM_NAME: " $3
echo "time_limit :  : " $4
echo "$0 $1 $2 $3 $4 $5  "
op_type=$1 
image=$2
VM_NAME=$3
time_limit=$4


case $op_type in
    "new")  
	echo 'Start vm'
	echo "vm_start $image $VM_NAME $time_limit "  ;
	vm_exist=` aliyun ecs DescribeInstances \
			 --output cols=InstanceId,InstanceName,PublicIpAddress.IpAddress,Status,NetworkInterfaces.NetworkInterface[0].PrimaryIpAddress  rows=Instances.Instance | grep $VM_NAME | wc -l` ;
	#vm_start $image $ip $time_limit   ;
	if [ $vm_exist -gt  0 ] ; then
        	echo ' the required VM exist , The VM is : '$VM_NAME
        	exit  0 ;
	fi

	echo vm_start $image $VM_NAME  $time_limit     ;
	vm_start $image $VM_NAME  $time_limit     ;
    ;;
    "del")  
	echo 'Del vm ,,,,,,'
	echo "vm_stop  $VM_NAME  "  ;
	vm_stop  $VM_NAME      ;
    ;;
    *)  
	echo 'Unsupported operation '
    ;;
esac

#IP=172.30.2.180
#IMG_ID=m-8vb35k67frag92hcy8pa


