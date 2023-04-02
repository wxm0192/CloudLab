
function d_load() {
	var iidd = "intro"+this.id ;
	var obj=document.getElementById(iidd);
	$(obj).show();
}
function d_unload() {
	var iidd = "intro"+this.id ;
	var obj=document.getElementById(iidd);
	$(obj).hide();
}

function show_intro() {
	var btns = document.getElementsByClassName("lab_td");
	console.log("btns length:"+btns.length);
	var mid_X = $(window).width() / 2;
	var i;
	for (i = 0; i < btns.length; i++) {
		btns[i].onmouseover = d_load;
		btns[i].onmouseout = d_unload;
		console.log(i);

		//var txt3 = document.createElement("frame");
		var txt3 = document.createElement("div");
		$(txt3).load('intro/lab'+btns[i].id);
		//$(txt3).text('demo_test.txt');
		$(txt3).attr('id', 'intro'+ btns[i].id);
		if ( btns[i].offsetLeft > mid_X) {
			x = document.body.clientWidth -  btns[i].offsetLeft + 20 + 'px';
			txt3.style.right = x;
			txt3.style.position = "absolute";
			txt3.style.zIndex="4" ;
			console.log("offsetRight: " + x);
		}
		else {
			x =  btns[i].offsetLeft +  btns[i].clientWidth + 5 + 'px';
			txt3.style.left = x;
			txt3.style.position = "absolute";
			console.log("offsetLeft: " + x);
		}
		$( btns[i]).after(txt3);
		$(txt3).hide() ;
	}
}

 setTimeout(show_intro , 2000);
