[root@Tang-6 ~]# docker container inspect -f {{.NetworkSettings.Networks.bridge.IPAddress}} mybox1
172.17.0.2
[root@Tang-6 ~]# docker container inspect -f {{.NetworkSettings.Networks.bridge.Gateway}} mybox1
172.17.0.1

