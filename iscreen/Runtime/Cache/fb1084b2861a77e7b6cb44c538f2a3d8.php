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
  <!--大屏幕展示-->
  <div class="row">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dpm): $mod = ($i % 2 );++$i; if($dpm['eid']!=''){ $url = "http://screen.weibo.com/eventdetail.php?eid=".$dpm['eid']; }else{ $url = "__URL__/action/t/".urlencode($dpm['topic']); } ?>
    <div class="col-md-4">
      <p class='titles'><?php echo (msubstr($dpm["title"],0,16)); ?> </p>
        <ul class="list-unstyled">
          <li>关键字：
            <a href='<?php echo ($url); ?>' target="_blank"><?php echo ($dpm["topic"]); ?></a>
          </li>
          <li>学校： <a href="__URL__/school/s/<?php echo ($dpm["area"]); ?>"><?php echo ($dpm["area"]); ?></a></li>
          <li>SP号码：<?php echo ($dpm["sp"]); ?></li>
          <li>开始时间：<?php echo ($dpm["stime"]); ?></li>
          <li>结束时间：<?php echo ($dpm["ttime"]); ?></li>
        </ul>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <p style="clear:both"></p>
    <!--输出page页面-->
    <?php echo ($show); ?>
  </div>
  <!--box over-->
</div>
</body>
</html>