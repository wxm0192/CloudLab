 <script>

var i = 1900;
var count = 0; //计数闰年的个数
while (i <= 2020) {
    //判断是否是闰年
    if (i % 4 == 0 && i % 100 != 0 || i % 400 == 0) {
        document.write(i + "&nbsp;&nbsp;");
        count++;
        if (count % 6 == 0) {
            document.write("<br/>");
        }
    }
    i++;
}
 </script>
