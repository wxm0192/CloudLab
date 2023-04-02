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
                        myHref.id = lab_id[i].lab_id;
                        //myHref.id = 'LabId'+lab_id[i].lab_id;
                        myHref.href = 'http://8.142.163.140:31656/v03/lab_term.php?lab_id='+lab_id[i].lab_id;
                        myHref.className = 'lab_td';
			
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
            xhttp.open("GET", "http://8.142.163.140:31656/v03/list_lab.php?lab_id=" + lab_id, true);
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

