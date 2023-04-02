<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <p>
            计时器：
        </p>
        <p id="counter">

        </p>
	<iframe id="div03"> </iframe>
    </div>
    <script>
        var redo_counter = 0;
        var counter=document.getElementById("counter") ;
        var div03=document.getElementById("div03") ;
	var session_ip ;
	var term_url ;
	var lab_ready = 0 ;
	function is_ip(ip) {
            ip_arr = ip.split('.');
            if(ip_arr.length != 4){
                return false;
            }
            for (i = 0; i < ip_arr.length; i++) {
                if(ip_arr[i] < 0 || ip_arr[i] > 255){
                    return false;
                }
            }
            return true;
        }

	function get_session_ip() {
                    // 创建 XMLHttpRequest 对象
                    var request = new XMLHttpRequest();
                    // 实例化请求对象
                    request.onreadystatechange = function () {
                        if (this.readyState === 4 && this.status === 200) {
				session_ip  =   this.responseText ;
                                console.log(session_ip) ;
                                if(is_ip(session_ip)){
                                        term_url="http://8.142.163.140:31655/?hostname="+session_ip+"&username=root&password=V2FCQzI0ODA=";
                                        div03.src = term_url ;
					lab_ready = 1 ;
					return ;
				}
                        }
                    };
                    request.open("GET", "http://8.142.163.140:31656/v03/get_session_ip.php");
                    request.setRequestHeader("If-Modified-Since", "0");
                    request.setRequestHeader("Cache-Control", "no-cache");
                    request.send();
                }


        function check_ip() {
            redo_counter++;
            console.log(redo_counter);
            counter.innerHTML=redo_counter ;
		if(lab_ready == 1)
			return ;
            div03.src = "http://8.142.163.140:31656/v03/update_redo.php?redo="+redo_counter ;
            if (redo_counter > 5) {
            	div03.src = "http://8.142.163.140:31656/v03/return_to_home.php" ;
                return;
            }
		//Try to get Session IP and connect to lab env 
		get_session_ip() ;
		if(lab_ready == 1)
			return ;

            setTimeout(check_ip, 1000);
        }
        check_ip();
    </script>
</body>

</html>
