

#!/bin/sh
# wsq 20190218
# 计算N分钟前或后的时间

datecol(){
	date -d @$(($(date +%s)$1*$2)) +%H:%M:%S
}

case $1 in
	-*|+*) datecol $1 60;;
	*) datecol +0 60;;
esac

