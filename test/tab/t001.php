<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT type=text/javascript src="http://code.jquery.com/jquery-latest.js"></SCRIPT>
<script type="text/javascript">
$(document).ready(function(){
    /*$('.ct:gt(0)').hide();*/
    var hdw = $('.tab_title li');
	/* 注： tab_title 只能为class（即 class='tab_title'）才不会出现兼容性问题，使用id="tab_title" 在ie6、ie7下无法实现一个页面多个tab的切换控制，原因未知，谁要是知道留个言吧 */
    /*hdw.hover(function(){*/
    hdw.click(function(){
        $(this).addClass('one').siblings().removeClass();
        var hdw_index = hdw.index(this);
        $('.ct').eq(hdw.index(this)).show().siblings().hide();
    });
});
</script>
<title>Jquery实现一个页面多个tab切换</title>
<style type="text/css">
ul{
    list-style:none;
    margin:0px;
    padding:0px;
}
#mytabs{
    position:relative;
}
#mytabs ul.tab_title{
    height:30px;
    line-height:30px;
    font-size:14px;
}
#mytabs ul.tab_title li{
    float:left;
    padding:0 15px;
    border:1px solid #F00; 
    border-bottom:none; 
    position:relative;   
    cursor:pointer;  
    margin-right:5px;
}

#mytabs ul li.one{
    background:#6FF;
}

#mytabs ul li.two{
    background:url(../images/tab_bg_3.png) repeat-x;
}

#mytabs .content { 
    padding:5px;
    font-size:12px;
    width:330px; 
    border:1px solid #F00; 
    height:auto;
    position:absolute;
    top:30px;
    z-index:-1;
	background:#6FF;
}
</style>
</head>

<body>

<div id="mytabs">
    <ul class="tab_title">
        <li class="one">菜单一</li>
        <li>菜单二</li>
        <li>菜单三 </li>
    </ul>
    <div class="content">
        <div class="ct">1111中新网伦敦7月28日电  备受瞩目的伦敦奥运会男子400米自由泳比赛28日终于揭开“谜底”。中国名将孙杨在决赛中以3分40秒14的成绩击败此前经过申诉得以“重返”决赛的韩国名将朴泰桓，为中国代表团拿下第三枚金牌。</div>
        <div class="ct" style="display:none">2222今天的这场对决无疑充满戏剧性。在此前结束的预赛中，韩国人朴泰桓被判起跳犯规，并被取消了比赛成绩。而作为其最强劲对手，中国名将孙杨则以3分45秒07获得小组第一，顺利晋级决赛。</div>
        <div class="ct" style="display:none">3333对于对手的“出局”，期待与老对手对决的孙杨难掩遗憾：“我对朴泰桓的事情感到非常失望，我本来很期待和他在决赛中相遇，但现在不会发生了。”据了解，2010年亚运会和2011年世锦赛上，中国小伙儿两度负于对手。对此，憋了一口气的他在奥运前自信表示，自己目前的实力已经强于韩国人。</div>
    </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />


<div id="mytabs">
    <ul class="tab_title">
        <li class="one">菜单一</li>
        <li>菜单二</li>
        <li>菜单三 </li>
    </ul>
    <div class="content">
        <div class="ct">1111中新网伦敦7月28日电  备受瞩目的伦敦奥运会男子400米自由泳比赛28日终于揭开“谜底”。中国名将孙杨在决赛中以3分40秒14的成绩击败此前经过申诉得以“重返”决赛的韩国名将朴泰桓，为中国代表团拿下第三枚金牌。</div>
        <div class="ct" style="display:none">2222今天的这场对决无疑充满戏剧性。在此前结束的预赛中，韩国人朴泰桓被判起跳犯规，并被取消了比赛成绩。而作为其最强劲对手，中国名将孙杨则以3分45秒07获得小组第一，顺利晋级决赛。</div>
        <div class="ct" style="display:none">3333对于对手的“出局”，期待与老对手对决的孙杨难掩遗憾：“我对朴泰桓的事情感到非常失望，我本来很期待和他在决赛中相遇，但现在不会发生了。”据了解，2010年亚运会和2011年世锦赛上，中国小伙儿两度负于对手。对此，憋了一口气的他在奥运前自信表示，自己目前的实力已经强于韩国人。</div>
    </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />


<div id="mytabs">
    <ul class="tab_title">
        <li class="one">菜单一</li>
        <li>菜单二</li>
        <li>菜单三 </li>
    </ul>
    <div class="content">
        <div class="ct">1111中新网伦敦7月28日电  备受瞩目的伦敦奥运会男子400米自由泳比赛28日终于揭开“谜底”。中国名将孙杨在决赛中以3分40秒14的成绩击败此前经过申诉得以“重返”决赛的韩国名将朴泰桓，为中国代表团拿下第三枚金牌。</div>
        <div class="ct" style="display:none">2222今天的这场对决无疑充满戏剧性。在此前结束的预赛中，韩国人朴泰桓被判起跳犯规，并被取消了比赛成绩。而作为其最强劲对手，中国名将孙杨则以3分45秒07获得小组第一，顺利晋级决赛。</div>
        <div class="ct" style="display:none">3333对于对手的“出局”，期待与老对手对决的孙杨难掩遗憾：“我对朴泰桓的事情感到非常失望，我本来很期待和他在决赛中相遇，但现在不会发生了。”据了解，2010年亚运会和2011年世锦赛上，中国小伙儿两度负于对手。对此，憋了一口气的他在奥运前自信表示，自己目前的实力已经强于韩国人。</div>
    </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />


<div id="mytabs">
    <ul class="tab_title">
        <li class="one">菜单一</li>
        <li>菜单二</li>
        <li>菜单三 </li>
    </ul>
    <div class="content">
        <div class="ct">1111中新网伦敦7月28日电  备受瞩目的伦敦奥运会男子400米自由泳比赛28日终于揭开“谜底”。中国名将孙杨在决赛中以3分40秒14的成绩击败此前经过申诉得以“重返”决赛的韩国名将朴泰桓，为中国代表团拿下第三枚金牌。</div>
        <div class="ct" style="display:none">2222今天的这场对决无疑充满戏剧性。在此前结束的预赛中，韩国人朴泰桓被判起跳犯规，并被取消了比赛成绩。而作为其最强劲对手，中国名将孙杨则以3分45秒07获得小组第一，顺利晋级决赛。</div>
        <div class="ct" style="display:none">3333对于对手的“出局”，期待与老对手对决的孙杨难掩遗憾：“我对朴泰桓的事情感到非常失望，我本来很期待和他在决赛中相遇，但现在不会发生了。”据了解，2010年亚运会和2011年世锦赛上，中国小伙儿两度负于对手。对此，憋了一口气的他在奥运前自信表示，自己目前的实力已经强于韩国人。</div>
    </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />


<div id="mytabs">
    <ul class="tab_title">
        <li class="one">菜单一</li>
        <li>菜单二</li>
        <li>菜单三 </li>
    </ul>
    <div class="content">
        <div class="ct">1111中新网伦敦7月28日电  备受瞩目的伦敦奥运会男子400米自由泳比赛28日终于揭开“谜底”。中国名将孙杨在决赛中以3分40秒14的成绩击败此前经过申诉得以“重返”决赛的韩国名将朴泰桓，为中国代表团拿下第三枚金牌。</div>
        <div class="ct" style="display:none">2222今天的这场对决无疑充满戏剧性。在此前结束的预赛中，韩国人朴泰桓被判起跳犯规，并被取消了比赛成绩。而作为其最强劲对手，中国名将孙杨则以3分45秒07获得小组第一，顺利晋级决赛。</div>
        <div class="ct" style="display:none">3333对于对手的“出局”，期待与老对手对决的孙杨难掩遗憾：“我对朴泰桓的事情感到非常失望，我本来很期待和他在决赛中相遇，但现在不会发生了。”据了解，2010年亚运会和2011年世锦赛上，中国小伙儿两度负于对手。对此，憋了一口气的他在奥运前自信表示，自己目前的实力已经强于韩国人。</div>
    </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />


<div id="mytabs">
    <ul class="tab_title">
        <li class="one">菜单一</li>
        <li>菜单二</li>
        <li>菜单三 </li>
    </ul>
    <div class="content">
        <div class="ct">1111中新网伦敦7月28日电  备受瞩目的伦敦奥运会男子400米自由泳比赛28日终于揭开“谜底”。中国名将孙杨在决赛中以3分40秒14的成绩击败此前经过申诉得以“重返”决赛的韩国名将朴泰桓，为中国代表团拿下第三枚金牌。</div>
        <div class="ct" style="display:none">2222今天的这场对决无疑充满戏剧性。在此前结束的预赛中，韩国人朴泰桓被判起跳犯规，并被取消了比赛成绩。而作为其最强劲对手，中国名将孙杨则以3分45秒07获得小组第一，顺利晋级决赛。</div>
        <div class="ct" style="display:none">3333对于对手的“出局”，期待与老对手对决的孙杨难掩遗憾：“我对朴泰桓的事情感到非常失望，我本来很期待和他在决赛中相遇，但现在不会发生了。”据了解，2010年亚运会和2011年世锦赛上，中国小伙儿两度负于对手。对此，憋了一口气的他在奥运前自信表示，自己目前的实力已经强于韩国人。</div>
    </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />


<div id="mytabs">
    <ul class="tab_title">
        <li class="one">菜单一</li>
        <li>菜单二</li>
        <li>菜单三 </li>
    </ul>
    <div class="content">
        <div class="ct">1111中新网伦敦7月28日电  备受瞩目的伦敦奥运会男子400米自由泳比赛28日终于揭开“谜底”。中国名将孙杨在决赛中以3分40秒14的成绩击败此前经过申诉得以“重返”决赛的韩国名将朴泰桓，为中国代表团拿下第三枚金牌。</div>
        <div class="ct" style="display:none">2222今天的这场对决无疑充满戏剧性。在此前结束的预赛中，韩国人朴泰桓被判起跳犯规，并被取消了比赛成绩。而作为其最强劲对手，中国名将孙杨则以3分45秒07获得小组第一，顺利晋级决赛。</div>
        <div class="ct" style="display:none">3333对于对手的“出局”，期待与老对手对决的孙杨难掩遗憾：“我对朴泰桓的事情感到非常失望，我本来很期待和他在决赛中相遇，但现在不会发生了。”据了解，2010年亚运会和2011年世锦赛上，中国小伙儿两度负于对手。对此，憋了一口气的他在奥运前自信表示，自己目前的实力已经强于韩国人。</div>
    </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />


<div id="mytabs">
    <ul class="tab_title">
        <li class="one">菜单一</li>
        <li>菜单二</li>
        <li>菜单三 </li>
    </ul>
    <div class="content">
        <div class="ct">1111中新网伦敦7月28日电  备受瞩目的伦敦奥运会男子400米自由泳比赛28日终于揭开“谜底”。中国名将孙杨在决赛中以3分40秒14的成绩击败此前经过申诉得以“重返”决赛的韩国名将朴泰桓，为中国代表团拿下第三枚金牌。</div>
        <div class="ct" style="display:none">2222今天的这场对决无疑充满戏剧性。在此前结束的预赛中，韩国人朴泰桓被判起跳犯规，并被取消了比赛成绩。而作为其最强劲对手，中国名将孙杨则以3分45秒07获得小组第一，顺利晋级决赛。</div>
        <div class="ct" style="display:none">3333对于对手的“出局”，期待与老对手对决的孙杨难掩遗憾：“我对朴泰桓的事情感到非常失望，我本来很期待和他在决赛中相遇，但现在不会发生了。”据了解，2010年亚运会和2011年世锦赛上，中国小伙儿两度负于对手。对此，憋了一口气的他在奥运前自信表示，自己目前的实力已经强于韩国人。</div>
    </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />


</body>
</html>
