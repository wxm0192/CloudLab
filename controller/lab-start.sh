#/bin/sh
echo ' usage : ./docker-lab-start.sh  $Operation_type $Images-name  $Tag   $Net_work $IP '
echo "Operation_Type (new: Create a lab ; del : delete a lab ) : " $1
echo "image name : " $2
echo "Tag : " $3
echo "Net_work :  : " $4
echo "IP_address :  : " $5
echo "$0 $1 $2 $3 $4 $5  "

if  [ $# != 5 ] ; then
	echo $# 
	return -1 
fi

a=`docker ps | awk '{print $1}' | grep -v CON `
#hostname_ip=`docker  container inspect --format='{{.Config.Hostname}}  {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $a `
ip_exist=`docker  container inspect --format='{{.Config.Hostname}}  {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $a|grep $5 `


STRING=ip_exist 
 
if [ -z "$STRING" ]; then
 	echo "STRING is empty"
fi
 
if [ -n "$STRING" ]; then
 	echo "STRING is not empty"
	echo $ip_exist 
 	con_id=`echo $ip_exist | awk '{print $1}'`
	echo $con_id   
fi

if ["$1" = "new"]  && [  -z "$STRING"] ; then 
	docker run -d   --network $4  --ip $5  "$2":"$3" 
fi 
	
if ["$1" = "new"]  && [  -n "$STRING"] ; then 
	echo docker stop $con_id   
	docker stop $con_id    
	docker run -d   --network $4  --ip $5  "$2":"$3" 
fi 


if ["$1" = "del"]  && [  -z "$STRING"] ; then 
	echo "The Docker doesn't exist "                 
fi 


if ["$1" = "del"]  && [  -n "$STRING"] ; then 
	echo docker stop $con_id   
	docker stop $con_id  && echo " docker $con_id deleted"
fi 



