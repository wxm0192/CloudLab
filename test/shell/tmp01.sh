 #for ss in $a ; do  echo "$i    $ss"; i=$((i+1)); done

#!/bin/bash
i=1
seperator="      "
cat  sh07.sh  | while read line
do
out_string=$i$seperator"$line"
echo $out_string    
i=$((i+1))
done
