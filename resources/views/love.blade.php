<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>陆珍 我爱你</title>

    <style type="text/css">
        @font-face {
            font-family: digit;
        }
    </style>

    <link href="{{  asset('css/default.css') }}" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="{{  asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{  asset('js/garden.js') }}"></script>
    <script type="text/javascript" src="{{  asset('js/functions.js') }}"></script>
</head>

<body>
<div id="mainDiv">
    <div id="content">
        <div id="code">
            <span class="comments">/**</span><br/>
            <span class="space"/><span class="comments">2015-01-23 我们正式在一起</span><br/>
            <span class="space"/><span class="comments">**/</span><br/>
            女孩的名字 = <span class="keyword">陆</span> 珍<br/>
            <!--男孩的名字 = <span class="keyword">张</span> 效垚<br />-->
            <span class="comments">// 你是信基督的. </span><br/>
            要忌血;<br/>
            <span class="comments">// 超爱黏人的.</span><br/>
            喜欢吃糖;<br/>
            <span class="comments">// 生日是三月四日.</span><br/>
            喜欢的数字是七;<br/>
            <span class="comments">// 每天要对你说晚安.</span><br/>
            每次见面要给你一个大大的拥抱;<br/>
            <span class="comments">// 不能轻易承诺.</span><br/>
            答应的事情一定要做到;<br/>
            要替她洗毛毛的桃子~;<br/>
            <span class="comments">// 以前的单位在迎泽区双塔西街50号安业商务C座 四层412.</span><br/>
            <span class="comments">// 现在的单位在新建路学府街口皇冠大厦19层.</span><br/>
            以前的我做的不好~ <br/>
            我只想在以后的时光里,能更好的待你;<br/>
            <br>
            <br>
            I want to say:<br/>
            陆珍, I love you forever;<br/>
        </div>
        <div id="loveHeart">
            <canvas id="garden"></canvas>
            <div id="words">
                <div id="messages">
                    亲爱的，这是我陪伴你走过的时光
                    <div id="elapseClock"></div>
                </div>
                <div id="loveu">
                    希望我永远是你喜欢的样子<br/>
                    <div class="signature">- 张效垚</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var offsetX = $("#loveHeart").width() / 2;
    var offsetY = $("#loveHeart").height() / 2 - 55;
    var together = new Date();
    together.setFullYear(2015, 0, 23);
    together.setHours(0);
    together.setMinutes(0);
    together.setSeconds(0);
    together.setMilliseconds(0);

    if (!document.createElement('canvas').getContext) {
        var msg = document.createElement("div");
        msg.id = "errorMsg";
        msg.innerHTML = "Your browser doesn't support HTML5!<br/>Recommend use Chrome 14+/IE 9+/Firefox 7+/Safari 4+";
        document.body.appendChild(msg);
        $("#code").css("display", "none")
        $("#copyright").css("position", "absolute");
        $("#copyright").css("bottom", "10px");
        document.execCommand("stop");
    } else {
        setTimeout(function () {
            startHeartAnimation();
        }, 5000);

        timeElapse(together);
        setInterval(function () {
            timeElapse(together);
        }, 500);

        adjustCodePosition();
        $("#code").typewriter();
    }
</script>
</body>
</html>