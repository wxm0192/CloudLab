cd /root/aliyun
PWD=/root/app/test/js
FILE=${PWD}/ecs_status
#echo "Stopping" > $FILE


EID=$1
echo $EID 
EID=\"${EID}\"
echo $EID 
exist=`./aliyun ecs DescribeInstanceStatus | grep $EID | awk '{print $2}'` ;
if [ -z $exist ] ; then 
	echo "The ECS not exist :"$EID ;
	exit 1 ;
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
