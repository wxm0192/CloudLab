#!/bin/sh 
#su application
cd /usr/share/nginx/www/v03/

nohup /usr/bin/php  /usr/share/nginx/www/v03/check_session_time_out.php >> /usr/share/nginx/www/log/log &
sleep 1 
nohup /usr/bin/php  /usr/share/nginx/www/v03/test_msg_r.php  >> /usr/share/nginx/www/log/log &


#runuser application nohup php  /usr/share/nginx/www/v03/check_session_time_out.php >> /usr/share/nginx/www/log/log &
#sleep 1 
#runuser application nohup php  /usr/share/nginx/www/v03/test_msg_r.php  >> /usr/share/nginx/www/log/log &
