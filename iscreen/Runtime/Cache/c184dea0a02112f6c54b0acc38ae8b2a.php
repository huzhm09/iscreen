<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<head>
<meta  charset="UTF-8">
<title>iscreen - 大屏幕精灵</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/iscreen.css">
<script src="__PUBLIC__/Js/jquery.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/Js/jquery.slider.js" type="text/javascript"></script>
</head>

<body>
<!--轮播-->
<div class="l">
    <!--轮播区域-->
    <ul class="lpic">
        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fimg): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($fimg["link"]); ?>" target="_blank"><img src="__PUBLIC__/<?php echo ($fimg["img_path"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <!--按钮区域-->
    <a class="prev" href="javascript:void(0)"></a>
    <a class="next" href="javascript:void(0)"></a>
    <!--图片数量-->
    <div class="num">
    	<ul></ul>
    </div>
</div>
<!--底部页面按钮-->
<div class="big-box">
  <div class="unit">
    <a href="__URL__/appl" class="little-box appli" ></a><span>申请大屏幕</span>
  </div>
  <div class="unit">
    <a href="" class="little-box admin" ></a><span>登陆管理系统</span>
  </div>
  <div class="unit">
    <a href="__URL__/show" class="little-box show" ></a><span>查看大屏幕</span>
  </div>
</div>


<!--页面JS-->
<script>
/*鼠标移过，左右按钮显示*/
$(".l").hover(function(){
  $(this).find(".prev,.next").fadeTo("show",0.1);
},function(){
  $(this).find(".prev,.next").hide();
})
/*鼠标移过某个按钮 高亮显示*/
$(".prev,.next").hover(function(){
  $(this).fadeTo("show",0.7);
},function(){
  $(this).fadeTo("show",0.1);
})
$(".l").slide({ titCell:".num ul" , mainCell:".lpic" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });
</script>
</body>
</html>