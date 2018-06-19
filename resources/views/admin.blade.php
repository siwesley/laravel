<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Laravel</title>
    <!-- Piwik -->
    <script type="text/javascript">
        var _paq = _paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function () {
            var u = "//piwik.zhangxiaoyao.cn/";
            _paq.push(['setTrackerUrl', u + 'piwik.php']);
            _paq.push(['setSiteId', '1']);
            var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
            g.type = 'text/javascript';
            g.async = true;
            g.defer = true;
            g.src = u + 'piwik.js';
            s.parentNode.insertBefore(g, s);
        })();
    </script>
    <!-- End Piwik Code -->
</head>
<body style="margin-top: 200px">
<div class="col-md-4 col-md-offset-4">
    <form action="/" method="post">
        <div class="form-group">
            <label for="name" class="control-label">User:</label>
            <input id="name" name="name" type="text" class="form-control">
        </div>
        {!! Geetest::render() !!}
        <br>
        <button type="submit" class="btn btn-success form-control">提交</button>
    </form>
</div>
</body>
</html>
