<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        * {
            border: 0px;
            padding: 0px;
            background-color: rgb(238, 230, 219);
        }

        ul {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
        }


        ul li {
            list-style: none;
            text-align: center;
            line-height: 30px;
            padding: 10px;
            height: 30px;
            width: 100px;
            margin: 0 10px;
        }

        #div01 {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            height: 90%;
            width: 100%;
            display: inline-block;
            font-size: small;
        }

        table {
            //display: flex;
            flex-flow: row nowrap;
            justify-content: center;
        }

        .p-tbl01 {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            height: 90%;
            width: 24%;
            display: inline-block;
        }

        .t-class {
            display: flex;
            position: relative;
            justify-content: center;
            background-color: aqua;

        }
    </style>
</head>

<body>

    <h1>显示XMLHttpRequest 对象</h1>

    <button type="button" onclick="loadDoc()">请求数据</button>

    <p>显示Server返回数据</p>

    <p id="demo"></p>
    <div id="div01">
        <div class="p-tbl01">
            <p class="t-class">基础实验</p>
            <table id="tbl01" border="1">
                <tr>
                    <th>实验编号</th>
                    <th>实验内容</th>

                </tr>
                <tr>
                    <td>实验01</td>
                    <td>
                        <a href="t-div01.html"> Linux C complier installation</a>
                    </td>
                </tr>
                <tr>
                    <td>实验02</td>
                    <td>NFS testing</td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        function loadDoc(table_id , lab_id) {
            var xhttp = new XMLHttpRequest();
            var str = "";
            var tbl01 = table_id ;
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //var lab_id  = JSON.parse(this.responseText)[0].lab_id;
                    var lab_id = JSON.parse(this.responseText);
                    for (var i = 0; i < lab_id.length; i++) {
                        str = str + lab_id[i].lab_id.toString();
                        var tr = document.createElement("tr");
                        var td_1 = document.createElement("td");
                        td_1.innerHTML = lab_id[i].lab_id.toString();
                        var td_2 = document.createElement("td");
                        td_2.innerHTML = lab_id[i].lab_desc;
                        var myHref = document.createElement('a');
                        myHref.id = 'yourId';
                        myHref.href = 'http://8.142.163.140:31656/MySQL/create_lab_env/t-div01.html';
                        var text = document.createTextNode('this is my href');
                        myHref.appendChild(text);
                        td_2.appendChild(myHref);
                        tr.appendChild(td_1);
                        tr.appendChild(td_2);
                        tbl01.appendChild(tr);
                        console.log(str);
                    }
                    //docunment.write(str) ;
                    //document.getElementById("demo").innerHTML = lab_id;
                }
            };
            xhttp.open("GET", "http://8.142.163.140:31656/MySQL/create_lab_env/test/list_lab.php?lab_id="+lab_id , true);
            xhttp.send();
        }
	    	
		var lab_id = <?php echo $_GET['lab_id'] ; ?> ;
            	var tbl01 = document.getElementById("tbl01");
        	loadDoc(tbl01 , lab_id) ;

    </script>

</body>

</html>
