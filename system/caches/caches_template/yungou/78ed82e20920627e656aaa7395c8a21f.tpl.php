<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>

<!DOCTYPE html>
<html>
<head><title>
	<?php echo _cfg('web_name_two'); ?>详情 - 触屏版
</title><meta content="app-id=518966501" name="apple-itunes-app" /><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" /><meta content="yes" name="apple-mobile-web-app-capable" /><meta content="black" name="apple-mobile-web-app-status-bar-style" /><meta content="telephone=no" name="format-detection" />
<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/member.css" rel="stylesheet" type="text/css" />
<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
</head>
<body>
<div class="h5-1yyg-v1" id="loadingPicBlock">

<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2><?php echo _cfg('web_name_two'); ?>详情</h2>
        <div class="head-r">
	        <a href="<?php echo WEB_PATH; ?>/mobile/home" class="z-Member"></a>
        </div>
    </header>

    <section class="clearfix g-Record-ct">
		<a class="fl z-Limg" href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $itemlist['0']['id']; ?>"><span class="z-Imgbg <?php echo $itemlist['0']['class']; ?>"></span><em class="z-Imgtxt"><?php echo $itemlist['0']['codeState']; ?></em><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $itemlist['0']['thumb']; ?>" border=0 /></a>

		<div class="u-Rcd-r gray9"><p class="z-Rcd-tt"><a href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $itemlist['0']['id']; ?>" class="gray6">(第<?php echo $itemlist['0']['qishu']; ?>期)<?php echo $itemlist['0']['title']; ?> <?php echo $itemlist['0']['title2']; ?> </a></p>
		<?php if($itemlist[0]['q_end_time']!=''): ?>

		<p>获得者：<em class="blue"><?php echo get_user_name($itemlist[0]['q_uid']); ?></em></p>
		<p>揭晓时间：<em class="gray6"><?php echo microt($itemlist[0]['q_end_time']); ?></em></p>
		<?php  else: ?>
		 <div class="Progress-bar">
			 <p class="u-progress">
			 <span style="width:<?php echo $bl; ?>%;" class="pgbar">
			 <span class="pging"></span>
			 </span>
			 </p>
				<ul class="Pro-bar-li">
				<li class="P-bar01"><em><?php echo $itemlist['0']['canyurenshu']; ?></em>已参与</li>
				<li class="P-bar02"><em><?php echo $itemlist['0']['zongrenshu']; ?></em>总需人次</li>
				<li class="P-bar03"><em><?php echo $itemlist['0']['zongrenshu']-$itemlist['0']['canyurenshu']; ?></em>剩余</li>
			 </ul>
		 </div>
		<?php endif; ?>
		 </div>
    </section>
    <section class="clearfix g-member g-Record-ctlst">
	    <b class="z-arrow"></b>
	    <article class="m-round">
		    <h3>本期商品您总共拥有<em class="orange"><?php echo $count; ?></em>个<?php echo _cfg('web_name_two'); ?>码</h3>
		    <ul>
			<?php $ln=1;if(is_array($itemlist)) foreach($itemlist AS $val): ?>
			    <li><p class="gray9"><?php echo microt($val['timego']); ?><span><?php echo $val['gonumber']; ?>人次</span></p><b><?php echo yunma($val['goucode'],"b"); ?></b></li>
			<?php  endforeach; $ln++; unset($ln); ?>
		    </ul>
	    </article>
    </section>

<?php include templates("mobile/index","footer");?>
<script language="javascript" type="text/javascript">
  var Path = new Object();
  Path.Skin="<?php echo G_TEMPLATES_STYLE; ?>";
  Path.Webpath = "<?php echo WEB_PATH; ?>";

var Base={head:document.getElementsByTagName("head")[0]||document.documentElement,Myload:function(B,A){this.done=false;B.onload=B.onreadystatechange=function(){if(!this.done&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){this.done=true;A();B.onload=B.onreadystatechange=null;if(this.head&&B.parentNode){this.head.removeChild(B)}}}},getScript:function(A,C){var B=function(){};if(C!=undefined){B=C}var D=document.createElement("script");D.setAttribute("language","javascript");D.setAttribute("type","text/javascript");D.setAttribute("src",A);this.head.appendChild(D);this.Myload(D,B)},getStyle:function(A,B){var B=function(){};if(callBack!=undefined){B=callBack}var C=document.createElement("link");C.setAttribute("type","text/css");C.setAttribute("rel","stylesheet");C.setAttribute("href",A);this.head.appendChild(C);this.Myload(C,B)}}
function GetVerNum(){var D=new Date();return D.getFullYear().toString().substring(2,4)+'.'+(D.getMonth()+1)+'.'+D.getDate()+'.'+D.getHours()+'.'+(D.getMinutes()<10?'0':D.getMinutes().toString().substring(0,1))}
Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js?v='+GetVerNum());
</script>

</div>
</body>
</html>
