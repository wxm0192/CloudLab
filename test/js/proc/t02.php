<!DOCTYPE html>
<html>
<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
<META HTTP-EQUIV="expires" CONTENT="0">
<body>
<p>Checking ECS Status changing :</p>
<p id="count"></p>
<p >END flag : <span id="flag"></span></p>
<p >Returned string : <span id="return_str"></span></p>
<p >ECS ID     : <span id="eid"></span></p>
<p >Public IP  : <span id="pid"></span></p>
<p >ECS Status : <span id="ecs_status"></span></p>
<p >ECS Status in if : <span id="ecs_status1"></span></p>
<p >ECS Status out  if : <span id="ecs_status2"></span></p>
<button onclick="Start_ECS()">Click to start the ECS  </button>
<button onclick="Stop_ECS()">Click to stop the ECS  </button>
<br>
<br>
<button onclick="Stop_Checking()">Click to stop checking </button>
<button onclick="Start_Checking()">Click to start checking </button>
<br>
<p >Debug01  : <span id="debug1"></span></p>
<p >Debug  : <span id="debug"></span></p>


 <script>
var num = 0;
var flag = 0 ;
var ecs_status  = "Stopping" ;
var eid='"weoeireoirw29823989328-3ir3ui"' ;


var tmp_str = eid ;
        tmp_str=tmp_str.replace(/\"/g,"");
        eid=eid.replace(/\"/g,"");
 document.getElementById("eid").innerHTML = eid   ;
 document.getElementById("debug").innerHTML = tmp_str    ;

</script>

