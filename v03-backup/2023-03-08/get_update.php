<!DOCTYPE html>
<html>
<body>

<h1>XMLHttpRequest 对象</h1>

<button type="button"  >请求数据</button>

<p id="demo">This show the counter :</p>
<p id="counter"></p>
<div>
  <iframe id="div03" src="" frameborder="1"></iframe>
</div>
 
<script>

function check_ip() {
            redo_counter = redo_counter + 2;
            console.log(redo_counter);
            counter.innerHTML=redo_counter ;
                if(lab_ready == 1)
                        return ;
            div03.src = "http://8.142.163.140:31656/v03/update_redo.php?redo="+redo_counter ;
            if (redo_counter > 20) {
                div03.src = "http://8.142.163.140:31656/v03/return_to_home.php" ;
                return;
            }
                //Try to get Session IP and connect to lab env
                //get_session_ip() ;
                if(lab_ready == 1)
                        return ;

            setTimeout(check_ip, 2000);
        }

        var redo_counter = 0 ;
        var counter = document.getElementById("counter") ;
        var div03 = document.getElementById("div03") ;
	var lab_ready = 0 ;

        setTimeout(check_ip, 2000);
</script>

</body>
</html>

