#/bin/sh
# usage : ./docker-start.sh $Images-name  $Tag $IP
echo "image name : " $1
echo "Tag : " $2
echo "IP Address :  : " $3
a=`docker ps | awk '{print $1}' | grep -v CON `
#hostname_ip=`docker  container inspect --format='{{.Config.Hostname}}  {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $a `
ip_exist=`docker  container inspect --format='{{.Config.Hostname}}  {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $a|grep $3 `

STRING=$ip_exist 
 
if [ -z "$STRING" ]; then
 echo "STRING is empty"
fi
 
if [ -n "$STRING" ]; then
 echo "STRING is not empty"
	echo $ip_exist 
 	host_name=`echo $ip_exist | awk '{print $1}'`
	echo docker stop $host_name
	docker stop $host_name
fi

echo docker run -d   --network biz_net --ip $3  "$1":"$2" 
docker run -d --privileged=true  --network biz_net --ip $3  "$1":"$2" 

