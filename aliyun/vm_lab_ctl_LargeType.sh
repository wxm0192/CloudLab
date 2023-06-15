#/bin/sh

# For examples : ssh root@172.20.0.1 " /root/aliyun/vm_lab_ctl.sh new m-8vb35k67frag92hcy8pa 2110 biz_net 172.30.2.181 60"

PWD=/root/app/test/js
ECS_STATUS_FILE=${PWD}/ecs_status

vm_start(){
	if [ $# -lt  4 ] ; then
		echo ' usage : ./vm_start    Images-name  IP time_limit HostName'
		exit -1;
	fi
    	echo "This function to start the VM " ;
        echo $1 ;
        echo $2 ;

	cd /root/aliyun

	PWD=/root/app/test/js
	ECS_STATUS_FILE=${PWD}/ecs_status
	echo "Stopped" > $ECS_STATUS_FILE

	#IP=172.30.2.180
	#IMG_ID=m-8vb35k67frag92hcy8pa
	IMG_ID=$1                       
	IP=$2             
	time_limit=$3 
	HostName=$4
	Ecs_Type=ecs.t6-c1m2.large
	#Ecs_Type=ecs.t6-c1m1.large
	#Ecs_Type=ecs.c6.large

	a=`./aliyun ecs CreateInstance \
		--RegionId=cn-zhangjiakou  \
		--ImageId=$IMG_ID  \
		--InstanceType=$Ecs_Type  \
		--SecurityGroupId=sg-8vb87jnn7iq7gzp6d01q  \
		--VSwitchId=vsw-8vbn0qdm4x187nnxcjadp  \
		--InstanceName=$VM_Name \
		--InstanceChargeType=PostPaid  \
		--PrivateIpAddress=$IP   \
		--HostName=$HostName     \
		--ResourceGroupId=rg-aekzjpyto7dia5q `
		###--DryRun=true
	EID=`echo $a |  jq  '.InstanceId'`
	if [ -z "$EID" ]; then
 		echo "EID is empty" ; 
		echo " Cann't create the ECS" ; 
		exit -1 ;
	fi

	echo "This is the EID : "$EID
	echo ./aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'
	status=`echo ./aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'`
	while [ "$status" != \"Stopped\" ]   
	do   
		echo 1  ;
		echo "Creating ECS ...... " ;
		sleep 1 ;
		#status=\"Running\" ;
		echo "Creating ECS ...... " ;
		status=`echo ./aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
		echo ${EID}":"$status   > $ECS_STATUS_FILE ;
	done
	#Here to start the ECS
	echo ./aliyun ecs StartInstance  --InstanceId=$EID |sh ;

	while [ "$status" != \"Running\" ]   
	do   
		echo 1  ;
		echo "starting ECS ...... " ;
		sleep 1 ;
		#status=\"Running\" ;
		echo "starting ECS ...... " ;
		status=`echo ./aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
		echo $status ; 
		#echo $status   > $ECS_STATUS_FILE ;
		echo ${EID}":"$status   > $ECS_STATUS_FILE ;
	done

	status=`echo ./aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
	echo $status ; 
	echo ${EID}":"$status   > $ECS_STATUS_FILE ;

	#Allocate Public IP 
	echo ./aliyun ecs ModifyInstanceSpec  --InstanceId=$EID  --InternetMaxBandwidthOut=1 | sh
	#echo ./aliyun ecs AllocatePublicIpAddress --InstanceId=$EID | sh
	echo ./aliyun ecs AllocatePublicIpAddress --InstanceId=$EID | sh | jq '.IpAddress'

	#set autoreleasetime 
	#time_limit=60
	dd=` date -d @$(($(date +%s) + $time_limit*60 - 8*60*60)) +%Y-%m-%dT%TZ `
	echo "setting autorelease time "
	echo ./aliyun ecs ModifyInstanceAutoReleaseTime  --InstanceId=$EID   --AutoReleaseTime=$dd 
	echo ./aliyun ecs ModifyInstanceAutoReleaseTime  --InstanceId=$EID   --AutoReleaseTime=$dd | sh 


	
	#Get the EID attribute out file name 
	eid_out_file=`echo $EID | sed 's/\"//g' `
	eid_out_file=${PWD}/${eid_out_file}".out" 

	echo ./aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh  > $eid_out_file

	./aliyun ecs DescribeInstanceStatus
	sh list_ecs.sh
	sh list_ecs.sh > ecs_list.out 
	sleep 20 

} ##end of function start_vm


vm_stop(){
	cd /root/aliyun
	PWD=/root/app/test/js
	FILE=${PWD}/ecs_status
	#echo "Stopping" > $FILE

	EID=`sh ./ecs_list.sh | grep $2 | awk '{print $1}'`
	if [ -z $EID ] ; then 
		echo "The ECS not exist";
		return -1 ;
	fi

	#EID=$1
	echo $EID 
	EID=\"${EID}\"
	echo $EID 
	exist=`./aliyun ecs DescribeInstanceStatus | grep $EID | awk '{print $2}'` ;
	if [ -z $exist ] ; then 
		echo "The ECS not exist :"$EID ;
		exit -1 ;
	fi
	#echo ./aliyun ecs StopInstance --InstanceId=$EID  --ForceStop=false --StoppedMode=StopCharging | sh
	echo ./aliyun ecs StopInstance --InstanceId=$EID  --ForceStop=true --StoppedMode=StopCharging | sh
	status=`echo ./aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'`
	while [ "$status" != \"Stopped\" ]
	do
		echo 1  ;
		echo "stopping  ECS ...... " ;
		sleep 1 ;
		#status=\"Running\" ;
		status=`echo ./aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
		echo $status ;
		echo ${EID}":"$status > $FILE ;
	done
	sleep 5 
	while [ 1 ] 
	do 
		exist=`./aliyun ecs DescribeInstanceStatus | grep $EID | awk '{print $2}'` ;
		echo $exist ;
		if [ -z $exist ] ;  then
				echo "No requested ECS" ;
				break  ;
			else 
				echo ./aliyun ecs DeleteInstances   --InstanceId.1=$EID | sh  ;
				echo ./aliyun ecs DeleteInstances   --InstanceId.1=$EID  ;
				echo "The checking string is:"$exist ;
		fi
		sleep 5 ;
	done 
	echo ${EID}":""Deleted" > $FILE ;
} ##end of vm_stop function 

if [ $# -lt  7 ] ; then
        echo ' usage : ./vm_lab_ctl.sh  Operation_type(new, del )  Images-name  Tag   Net_work   IP time_limit HostName VM_Name'
        exit -1;
fi

echo ' usage : ./$0  $Operation_type $Images-name  $Tag   $Net_work $IP '
echo "Operation_Type (new: Create a lab ; del : delete a lab ) : " $1
echo "image name : " $2
echo "Tag : " $3
echo "Net_work :  : " $4
echo "IP_address :  : " $5
echo "time_limit :  : " $6
echo "HostName   :  : " $6
echo "$0 $1 $2 $3 $4 $5 $7 $8"
op_type=$1 
image=$2
ip=$5
time_limit=$6
HostName=$7
VM_Name=$8

	cd /root/aliyun

case $op_type in
    "new")  
	echo 'Start vm'
	echo "vm_start $image $ip $time_limit $HostName"  ;
	vm_exist=`sh ./list_ecs.sh | grep $ip | wc -l` ;
	#vm_start $image $ip $time_limit   ;
	if [ $vm_exist -gt  0 ] ; then
        	echo ' the required VM exist , The IP is : '$ip
        	exit  0 ;
	fi

	echo vm_start $image $ip $time_limit     ;
	vm_start $image $ip $time_limit $HostName    ;
    ;;
    "del")  
	echo 'Del vm'
	echo "vm_stop  $image $ip  "  ;
	echo vm_stop  $image $ip    ;
	vm_stop  $image $ip    ;
    ;;
    *)  
	echo 'Unsupported operation '
    ;;
esac

#IP=172.30.2.180
#IMG_ID=m-8vb35k67frag92hcy8pa


