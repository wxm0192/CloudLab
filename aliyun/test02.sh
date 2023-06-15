#status=\"Running\" ;
#EID=\"i-8vb6whjybmakura3386p\" ;
#EID=\"i-8vb6whjybmakura3386p\" ;
IP=172.30.2.180

a=`./aliyun ecs CreateInstance \
         --RegionId=cn-zhangjiakou  \
        --ImageId=m-8vb35k67frag92hcy8pa  \
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
while [ "$status" != \"Running\" ]   
do   
	echo 1  ;
	echo "starting ECS ...... " ;
	sleep 3 ;
	#status=\"Running\" ;
	echo ./aliyun ecs StartInstance  --InstanceId=$EID |sh ;
	echo "starting ECS ...... " ;
	status=`echo ./aliyun ecs DescribeInstances --InstanceIds \'[${EID}]\' | sh | jq '.Instances.Instance[0].Status'` ;
	echo ./aliyun ecs DescribeInstances --InstanceIds=\'[${EID}]\' --waiter expr='Instances.Instance[0].Status' to=Running | sh 
	echo $status ; 
done
