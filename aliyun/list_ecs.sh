cd /root/aliyun
./aliyun ecs DescribeInstances --output cols=InstanceId,InstanceName,PublicIpAddress.IpAddress,EipAddress.IpAddress,NetworkInterfaces.NetworkInterface[0].PrimaryIpAddress rows=Instances.Instance --PageNumber=1
