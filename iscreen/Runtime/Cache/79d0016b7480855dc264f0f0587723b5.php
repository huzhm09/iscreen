<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>|-线上大屏幕展示</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="format-detection" content="telephone=no">
  <!--bootstrap css-->
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Bootstrap/css/bootstrap.css">
  <!--jquery js-->
  <script type="text/javascript" src="__PUBLIC__/Js/jquery.min.js"></script>
  <!--bootstrap js-->
  <script type="text/javascript" src="__PUBLIC__/Bootstrap/js/bootstrap.js"></script>
  <!--page css-->
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/iscreen.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/show.css">
</head>


<body>

<div class="container">
  <!--导航栏目-->
  <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
      <a class="navbar-brand" href="__URL__/index">大屏幕精灵</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
          <li><a href="__URL__/appl">申请大屏幕</a></li>
          <li class="active"><a href="#">查看大屏幕</a></li>
          <li><a href="">管理大屏幕</a></a></li>
        </ul>
    </div>
  </nav>
  <!--show topic-->
  <div id="wb"></div>
  <script type="text/javascript">
  (function(){
    var key = encodeURI('<?php echo ($key); ?>');
    document.getElementById('wb').innerHTML = '<iframe src="http://v.t.sina.com.cn/widget/widget_topic_width.php?tags=' + key + '&rightwidth=250&height=700&width=960&widgetcolor=f2f2f2&leftcolor=333&leftbgcolor=fff&leftlinkcolor=013979&rightcolor=333&rightbgcolor=fafafa&rightlinkcolor=013979" width="960" height="700" scrolling="no" frameborder="0"></iframe>';

  })();
  </script></div>
  <p style="clear:both"></p>
</div>
</body>
</html>