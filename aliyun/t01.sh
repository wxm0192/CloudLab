cd /root/aliyun
PWD=/root/app/test/js
FILE=${PWD}/ecs_status
#echo "Stopping" > $FILE


EID=$1
echo $EID
EID=\"${EID}\"
echo $EID


while [ 1 ]
do
        exist=`./aliyun ecs DescribeInstanceStatus | grep $EID | awk '{print $2}'` ;
        echo "This is the string :"$exist ;
	echo "The string length is " 
	echo "abc" |wc -L
        if [ -n $exist ] ;  then
                        #echo ./aliyun ecs DeleteInstances   --InstanceId.1=$EID | sh  ;
                        echo ./aliyun ecs DeleteInstances   --InstanceId.1=$EID  ;
                        echo "The checking string is:"$exist ;
                else
                        echo "No requested ECS" ;
                        break  ;
        fi

        if [ -z $exist ] ;  then
                        echo "No requested ECS" ;
                        break  ;
                else
                        #echo ./aliyun ecs DeleteInstances   --InstanceId.1=$EID | sh  ;
                        echo ./aliyun ecs DeleteInstances   --InstanceId.1=$EID  ;
                        echo "The checking string is:"$exist ;
        fi
        sleep 5 ;
done

