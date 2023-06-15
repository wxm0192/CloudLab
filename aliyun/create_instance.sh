./aliyun ecs CreateInstance  --RegionId=cn-zhangjiakou  --ImageId=m-8vbc0b59ttsucn9qfvxf  --InstanceType=ecs.s6-c1m2.small  --SecurityGroupId=sg-8vb87jnn7iq7gzp6d01q  --VSwitchId=vsw-8vbn0qdm4x187nnxcjadp  --InstanceName=Lab-vm03 --InstanceChargeType=PostPaid  --ResourceGroupId=rg-acfmznbbajghpaq --DryRun=true   



./aliyun ecs CreateInstance  \
	--RegionId=cn-zhangjiakou  \
	--ImageId=m-8vbc0b59ttsucn9qfvxf  \
	--InstanceType=ecs.s6-c1m2.small  \
	--SecurityGroupId=sg-8vb87jnn7iq7gzp6d01q  \
	--VSwitchId=vsw-8vbn0qdm4x187nnxcjadp  \
	--InstanceName=Lab-vm03  \
	--InstanceChargeType=PostPaid   \
	--ResourceGroupId=rg-acfmznbbajghpaq --DryRun=true   
