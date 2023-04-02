function getStyle(obj, attr) {
    if (obj.currentStyle) {
        return obj.currentStyle[attr];
    } else {
        return getComputedStyle(obj)[attr];
    }
}

var div01 = document.getElementById("iframeLeft");
var div02 = document.getElementById("seg");
var div03 = document.getElementById("iframeContent");

var div01_left = parseInt(getStyle(div01, "left"));
var div01_width = parseInt(getStyle(div01, "width"));
var div02_left = parseInt(getStyle(div02, "left"));
var div02_width = parseInt(getStyle(div02, "width"));
var div03_left = parseInt(getStyle(div03, "left"));
var div03_width = parseInt(getStyle(div03, "width"));

var ori_x;
var ori_y;
var offset_x;
var offset_y;

div02.ondragstart = function (ev) {
    console.log(ev.clientX);
    ori_x = ev.clientX;
    ori_y = ev.clientY;
}

div02.ondrag = function (ev) {
    console.log(ev.clientX);

    offset_x = ev.clientX - ori_x;
    offset_y = ev.clientY - ori_y;

    div01.style.width = div01_width + offset_x + "px";
    div02.style.left = div02_left + offset_x + "px";
    div03.style.left = div03_left + offset_x + "px";
    div03.style.width = div03_width - offset_x + "px";
    offset_x = ev.clientX - ori_x;
    offset_y = ev.clientY - ori_y;
}

div02.ondragend = function (ev) {
    /*
    document.ondragstart = function (ev) {
        ev.preventDefault();
    };
    document.ondragend = function (ev) {
        ev.preventDefault();
    };
    */
    console.log(ev.clientX);

    offset_x = ev.clientX - ori_x;
    div01.style.width = div01_width + offset_x + "px";
    div02.style.left = div02_left + offset_x + "px";
    div03.style.left = div03_left + offset_x + "px";
    div03.style.width = div03_width - offset_x + "px";
    div01_left = parseInt(getStyle(div01, "left"));
    div01_width = parseInt(getStyle(div01, "width"));
    div02_left = parseInt(getStyle(div02, "left"));
    div02_width = parseInt(getStyle(div02, "width"));
    div03_left = parseInt(getStyle(div03, "left"));
    div03_width = parseInt(getStyle(div03, "width"));
}

