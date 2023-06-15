#exist="test"
exist="i"
EID=\"dkjfdskjkl\"
while [ 1 ]
do

if [  -n $exist ]; then
			echo "Not empty string " ;
                        echo ./aliyun ecs DeleteInstances   --InstanceId.1=$EID  ;
			echo "The checking string is:"$exist ;
                else
			echo "empty string " ;
                        echo "No requested ECS" ;
			echo "The checking string is:"$exist ;
                        break  ;
 fi

sleep 3 
done
