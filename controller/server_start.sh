 ################docker run -p 80:80 -v /root/app:/app --network mgt_net --ip 172.20.0.2  webdevops/php-nginx:latest a

#Docker Network create
docker  network create --driver=bridge --subnet=169.10.0.0/24 --gateway=169.10.0.1 biz_net 
docker  network create --driver=bridge --subnet=172.20.0.0/24 --gateway=172.20.0.1 mgt_net 

#the following command useing the keyed docker , which can ssh directly to the host server 
docker run -d  -p 80:80 -v /root/app:/app --network mgt_net --ip 172.20.0.2  nginx-php-keyed:09.02

docker run -p 8033:8888 --network biz_net --ip 169.10.0.2  webssh-with-sshserver:0906-02

Steps to start webssh :     

docker run -it -p 8033:8888 --network biz_net --ip 169.10.0.2  webssh-with-sshserver:0906-02 /bin/sh 
docker exec -it 
find / -name wssh -print 
 nohup /usr/bin/wssh & 


Steps to start Lab backgroud process :

docker exec -it Ngix_PHP_Docker_id /bin/sh 
su - application 
#cd /app/test/msg
cd /app/v02
nohup php lab_session_ip_b.php  &


