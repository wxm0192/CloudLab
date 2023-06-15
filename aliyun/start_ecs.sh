#/bin/sh
if [ $# -lt  2 ] ; then
        echo ' usage : ./start_ecs.sh    Images-name     IP '
        exit -1;
fi


#status=\"Running\" ;
#EID=\"i-8vb6whjybmakura3386p\" ;
#EID=\"i-8vb6whjybmakura3386p\" ;

cd /root/aliyun

PWD=/root/app/test/js
FILE=${PWD}/ecs_status
echo "Stopped" > $FILE

#IP=172.30.2.180
#IMG_ID=m-8vb35k67frag92hcy8pa
IMG_ID=$1                       
IP=$2             

a=`./aliyun ecs CreateInstance \
         --RegionId=cn-zhangjiakou  \
        --ImageId=$IMG_ID  \
        --InstanceType=ecs.s6-c1m2.small  \
        --SecurityGroupId=sg-8vb87jnn7iq7gzp6d01q  \
        --VSwitchId=vsw-8vbn0qdm4x187nnxcjadp  \
        --InstanceName=Lab-vm03 \
        --InstanceChargeType=PostPaid  \
        --PrivateIpAddress=$IP   \
        --ResourceGroupId=rg-acfmznbbajghpaq `
        ###--DryRun=true
EID=`echo $a |  jq  '.InstanceId'`

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
	echo ${EID}":"$status   > $FILE ;
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
	#echo $status   > $FILE ;
	echo ${EID}":"$status   > $FILE ;
done

status=`echo ./aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
echo $status ; 
echo ${EID}":"$status   > $FILE ;
echo ./aliyun ecs ModifyInstanceSpec  --InstanceId=$EID  --InternetMaxBandwidthOut=1 | sh
#echo ./aliyun ecs AllocatePublicIpAddress --InstanceId=$EID | sh
echo ./aliyun ecs AllocatePublicIpAddress --InstanceId=$EID | sh | jq '.IpAddress'
#Get the EID attribute out file name 
eid_out_file=`echo $EID | sed 's/\"//g' `
eid_out_file=${PWD}/${eid_out_file}".out" 

echo ./aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh  > $eid_out_file

./aliyun ecs DescribeInstanceStatus
sh list_ecs.sh
sh list_ecs.sh > ecs_list.out 

