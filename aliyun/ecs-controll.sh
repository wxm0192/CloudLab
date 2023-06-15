./aliyun ecs CreateInstance  --RegionId=cn-zhangjiakou  --ImageId=m-8vbc0b59ttsucn9qfvxf  --InstanceType=ecs.s6-c1m2.small  --SecurityGroupId=sg-8vb87jnn7iq7gzp6d01q  --VSwitchId=vsw-8vbn0qdm4x187nnxcjadp  --InstanceName=Lab-vm03 --InstanceChargeType=PostPaid  --ResourceGroupId=rg-acfmznbbajghpaq --DryRun=true   

./aliyun ecs DescribeInstanceAttribute --InstanceId=" i-8vbc5lhgtc55hya7zuvq "

./aliyun ecs StartInstance  --InstanceId="i-8vbc5lhgtc55hya7zuvq"  

./aliyun ecs ModifyInstanceAutoReleaseTime  --InstanceId=" i-8vbc5lhgtc55hya7zuvq "     --AutoReleaseTime='2021-11-17T15:59:00Z'


aliyun ecs StopInstance –InstanceId="i-8vbc5lhgtc55hya7zuvq" –ForceStop=false –StoppedMode=StopCharging  --DryRun false 

./aliyun ecs ModifyInstanceSpec  --InstanceId="i-8vbc5lhgtc55hya7zuvq"  --InternetMaxBandwidthOut=1 

https://ecs.aliyuncs.com/?Action=AllocatePublicIpAddress&InstanceId="i-8vb5d9atcflvqbwuqn39"

./aliyun AllocatePublicIpAddress --InstanceId="i-8vb5d9atcflvqbwuqn39"

./aliyun ecs CreateInstance \
	 --RegionId=cn-zhangjiakou  \
	--ImageId=m-8vb35k67frag92hcy8pa  \
	--InstanceType=ecs.s6-c1m2.small  \
	--SecurityGroupId=sg-8vb87jnn7iq7gzp6d01q  \
	--VSwitchId=vsw-8vbn0qdm4x187nnxcjadp  \
	--InstanceName=Lab-vm03 \
	--InstanceChargeType=PostPaid  \
	--ResourceGroupId=rg-acfmznbbajghpaq \
	--DryRun=true   


./aliyun ecs ModifyInstanceSpec  --InstanceId="i-8vb5d9atcflvqbwuqn39"  --InternetMaxBandwidthOut=1


./aliyun ecs StopInstance –-InstanceId="i-8vb5d9atcflvqbwuqn39" –-ForceStop=false –-StoppedMode=StopCharging  --DryRun=false

 ./aliyun ecs DeleteInstances   --InstanceId.1="i-8vb5d9atcflvqbwuqn39" 

[root@iZ8vb6lulg39p8fky7eya0Z aliyun]# ./aliyun ecs StopInstance help
Alibaba Cloud Command Line Interface Version 3.0.99

Product: Ecs (Elastic Compute Service)

Parameters:
  --InstanceId  String  Required
  --ConfirmStop Boolean Optional
  --DryRun      Boolean Optional
  --ForceStop   Boolean Optional
  --Hibernate   Boolean Optional
  --StoppedMode String  Optional
