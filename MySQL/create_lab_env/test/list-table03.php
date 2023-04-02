<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>云端实验室</title>
    <style type="text/css">
        * {
            border: 0px;
            padding: 0px;
            background-color: rgb(238, 230, 219);
        }

        .header {
            background-color: #f3e8e8;
            color: rgb(47, 19, 204);
            padding: 0px;
            text-align: center;
            background-color: rgb(225, 228, 229);
            /*text-indent: 50px; */
        }

        table {
            //display: flex;
            flex-flow: row nowrap;
            justify-content: center;
        }



        #div01 {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            height: 50%;
            width: 100%;
            display: inline-block;
            font-size: small;
        }

        .p-tbl01 {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            height: 10%;
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
    <div class="header">
        <h2>纸上得来终觉浅，绝知此事要躬行 </h2>
        <p>开发阶段，黄色背景标出的实验可用，其他实验在开发中</p>
    </div>
    <div id="div01">
        <div class="p-tbl01">
            <p class="t-class">基础实验</p>
            <table id="tbl01" border="0">
                <tr>
                    <th>编号</th>
                    <th>实验内容</th>

                </tr>
                <tr>
                </tr>
            </table>
        </div>
        <div class="p-tbl01">
            <p class="t-class">IAAS</p>
            <table id="tbl02" border="0">
                <tr>
                    <th>编号</th>
                    <th>实验内容</th>

                </tr>
                <tr>
                </tr>
            </table>
        </div>
        <div class="p-tbl01">
            <p class="t-class">PAAS</p>
            <table id="tbl03" border="0">
                <tr>
                    <th>编号</th>
                    <th>实验内容</th>

                </tr>
                <tr>
                </tr>
            </table>
        </div>
        <div class="p-tbl01">
            <p class="t-class">软件展示</p>
            <table id="tbl04" border="0">
                <tr>
                    <th>编号</th>
                    <th>实验内容</th>

                </tr>
                <tr>
                </tr>
            </table>
        </div>

    </div>
<marquee scrollamount=20 scrolldelay=3 valign=middle behavior="scroll" align="texttop">
<img src="http://8.142.163.140:31656/img/0415/01.jpg" alt="" />
<img src="http://8.142.163.140:31656/img/0415/02.jpg" alt="" />
<img src="http://8.142.163.140:31656/img/0415/05.jpg" alt="" />
<img src="http://8.142.163.140:31656/img/0415/06.jpg" alt="" />
</marquee>

    <script>
        function loadDoc(table_id, lab_id) {
            var xhttp = new XMLHttpRequest();
            var str = "";
            var tbl01 = table_id;
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
                        //td_2.innerHTML = lab_id[i].lab_desc;
                        var myHref = document.createElement('a');
                        myHref.id = 'yourId';
                        myHref.href = 'http://8.142.163.140:31656/v03/lab_term.php?lab_id='+lab_id[i].lab_id;
                        //var text = document.createTextNode('this is my href');
                        myHref.innerHTML=lab_id[i].lab_desc;;
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
            xhttp.open("GET", "http://8.142.163.140:31656/MySQL/create_lab_env/test/list_lab.php?lab_id=" + lab_id, true);
            xhttp.send();
        }

        //var lab_id = <? php echo $_GET['lab_id']; ?> ;
        var tbl01 = document.getElementById("tbl01");
        loadDoc(tbl01, 1 );
        var tbl01 = document.getElementById("tbl02");
        loadDoc(tbl01, 2 );
        var tbl01 = document.getElementById("tbl03");
        loadDoc(tbl01, 3 );
        var tbl01 = document.getElementById("tbl04");
        loadDoc(tbl01, 4 );

    </script>

</body>
