
#This section is used to start a ECS VM , allocate a Public IP , and show the ECS status 
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
 ./aliyun ecs DescribeInstances --InstanceIds '["i-8vb6lulg39p8fky7eya0"]' | jq '.Instances.Instance[0].Status'
echo ./aliyun ecs StartInstance  --InstanceId=$EID |sh
echo ./aliyun ecs ModifyInstanceSpec  --InstanceId=$EID  --InternetMaxBandwidthOut=1 | sh
#echo ./aliyun ecs AllocatePublicIpAddress --InstanceId=$EID | sh  
echo ./aliyun ecs AllocatePublicIpAddress --InstanceId=$EID | sh | jq '.IpAddress'
./aliyun ecs DescribeInstanceStatus
echo ./aliyun ecs StopInstance --InstanceId=$EID  --ForceStop=false --StoppedMode=StopCharging | sh
echo ./aliyun ecs DeleteInstances   --InstanceId.1=$EID | sh 

#########

aliyun ecs DescribeInstances --InstanceIds '["i-12345678912345678123"]' --waiter expr='Instances.Instance[0].Status' to=Running 

./aliyun ecs DescribeInstances --InstanceIds '["i-8vb6lulg39p8fky7eya0"]' | jq .'Instances.Instance[0].Status'
echo ./aliyun ecs DescribeInstances --InstanceIds='[$EID]' --waiter expr='Instances.Instance[0].Status' to=Running 

./aliyun ecs DescribeInstances --output  cols=InstanceId,InstanceName,PublicIpAddress.IpAddress,EipAddress.IpAddress,NetworkInterfaces.NetworkInterface[0].PrimaryIpAddress  rows=Instances.Instance  --PageNumber=1

 ./aliyun ecs DescribeInstances --InstanceIds '["i-8vb6lulg39p8fky7eya0"]' --output  cols=InstanceId,InstanceName,PublicIpAddress.IpAddress,Status,NetworkInterfaces.NetworkInterface[0].PrimaryIpAddress  rows=Instances.Instance  --PageNumber=1

./aliyun ecs DescribeInstances --InstanceIds '["i-8vb6lulg39p8fky7eya0"]' --output  cols=Status  rows=Instances.Instance  --PageNumber=1 

echo ./aliyun ecs StopInstance --InstanceId=$EID  --ForceStop=false --StoppedMode=StopCharging | sh
echo ./aliyun ecs DeleteInstances   --InstanceId.1=$EID | sh 




echo ./aliyun AllocatePublicIpAddress --InstanceId=$EID | sh  



#./aliyun ecs StartInstance  --InstanceId="i-8vbc5lhgtc55hya7zuvq"

#./aliyun AllocatePublicIpAddress --InstanceId= 

./aliyun ecs DescribeInstanceStatus

 ./aliyun ecs StopInstance --InstanceId="i-8vbd9vtahdg110g5k6s2" --ForceStop=false --StoppedMode=StopCharging



 echo ./aliyun ecs StartInstance  --InstanceId=$EID |sh

 echo ./aliyun ecs StopInstance --InstanceId=$EID  --ForceStop=false --StoppedMode=StopCharging | sh

 echo ./aliyun ecs DeleteInstances   --InstanceId.1=$EID | sh


# ./aliyun ecs DeleteInstances   --InstanceId.1="i-8vb5d9atcflvqbwuqn39"

./aliyun ecs DescribeInstances \
	--output \
	cols=InstanceId,InstanceName,PublicIpAddress.IpAddress,EipAddress.IpAddress,NetworkInterfaces.NetworkInterface[0].PrimaryIpAddress \
	rows=Instances.Instance --PageNumber=1
