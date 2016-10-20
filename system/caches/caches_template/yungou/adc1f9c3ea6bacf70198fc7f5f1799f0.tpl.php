<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>结算支付 - <?php echo $webname; ?>触屏版</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" /><link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/cartList.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
	<script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/Payment.js" language="javascript" type="text/javascript"></script>
</head>
<body>
<div class="h5-1yyg-v1">
    
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
	        <a href="javascript:;" onclick="history.go(-1)" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2>结算支付</h2>
        <div class="head-r">
	        
        </div>
    </header>

    <input name="hidShopMoney" type="hidden" id="hidShopMoney" value="<?php echo $MoenyCount; ?>" />
    <input name="hidBalance" type="hidden" id="hidBalance" value="<?php echo $Money; ?>" />
    <input name="hidPoints" type="hidden" id="hidPoints" value="<?php echo $member['score']; ?>" />
    <input name="shopnum" type="hidden" id="shopnum" value="<?php echo $shopnum; ?>" />
    <input name="pointsbl" type="hidden" id="pointsbl" value="<?php echo $fufen_dikou; ?>" />
    <section class="clearfix g-pay-lst">
		<ul>
		 <?php $ln=1; if(is_array($shoplist)) foreach($shoplist AS $key => $val): ?>
		  
			<li>
			    <a href="<?php echo WEB_PATH; ?>/mobile/mobile/item/<?php echo $val['id']; ?>" class="gray6">(第<?php echo $val['qishu']; ?>期)<?php echo $val['title']; ?>  (<?php echo $val['title2']; ?>)</a>
			    <span>
			        <em class="orange arial"><?php echo $val['cart_xiaoji']; ?></em>人次
			    </span>
			</li>
		 <?php  endforeach; $ln++; unset($ln); ?>
		
		</ul>
		<p class="g-pay-Total gray9">合计：<span class="orange arial Fb F16"><?php echo $MoenyCount; ?></span> 元</p>
		<p class="g-pay-bline"></p>
    </section>
    <section class="clearfix g-Cart">
	    <article class="clearfix m-round g-pay-ment">
		    <ul id="ulPayway">
			<?php if($fufen_dikou >= $MoenyCount): ?>
			    <li class="gray9 z-pay-ff z-pay-grayC">
				<i id="spPoints" class="z-pay-ment" sel="0"></i>
				<span>您可以使用福分付款（您的福分：<?php echo $member['score']; ?>）</span>
				</li>
			<?php  else: ?>
			     <li class="gray6 z-pay-ff z-pay-grayC">
				<span>您的福分不足（您的福分：<?php echo $member['score']; ?>）</span>
				</li>
			<?php endif; ?>
			
			<?php if($Money >= $MoenyCount): ?>			
				<li class="gray9 z-pay-ye z-pay-grayC"> 
				<i id="spBalance" class="z-pay-ment" sel="0"></i>
				<span>您可以使用余额付款（账户余额：<?php echo $Money; ?> 元）</span>
				</li>
			<?php  else: ?>
			    <li class="gray6 z-pay-ye z-pay-grayC">
				<a href="<?php echo WEB_PATH; ?>/mobile/home/userrecharge" class="z-pay-Recharge">去充值</a>
				<span>您的余额不足（账户余额：<?php echo $Money; ?> 元）</span>
				</li> 
			<?php endif; ?>
		    </ul>
	    </article>
	    <article id="bankList" class="clearfix mt10 m-round g-pay-ment g-bank-ct">
		    <ul>
			    <li class="gray6 z-pay-grayC"><s class="z-arrow"></s>选择网银支付</li>
			    <li class="gray9" style="display:none;" umb='CMBCHINA'><i class="z-bank-Roundsel"><s></s></i>招商银行</li>
			    <li class="gray9" style="display:none;" umb='ICBC'><i class="z-bank-Round"><s></s></i>工商银行</li>
			    <li class="gray9" style="display:none;" umb='CCB'><i class="z-bank-Round"><s></s></i>建设银行</li>
		    </ul>
	    </article>
	    <div class="g-Total-bt">
		    <a id="btnPay" href="javascript:;" class="orgBtn">确认支付1</a>
	    </div>
    </section>
    
<?php include templates("mobile/index","footer");?>
<script language="javascript" type="text/javascript">
  var Path = new Object();
  Path.Skin="<?php echo G_TEMPLATES_STYLE; ?>";  
  Path.Webpath = "<?php echo WEB_PATH; ?>";
  Path.submitcode = '<?php echo $submitcode; ?>';
  
var Base={head:document.getElementsByTagName("head")[0]||document.documentElement,Myload:function(B,A){this.done=false;B.onload=B.onreadystatechange=function(){if(!this.done&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){this.done=true;A();B.onload=B.onreadystatechange=null;if(this.head&&B.parentNode){this.head.removeChild(B)}}}},getScript:function(A,C){var B=function(){};if(C!=undefined){B=C}var D=document.createElement("script");D.setAttribute("language","javascript");D.setAttribute("type","text/javascript");D.setAttribute("src",A);this.head.appendChild(D);this.Myload(D,B)},getStyle:function(A,B){var B=function(){};if(callBack!=undefined){B=callBack}var C=document.createElement("link");C.setAttribute("type","text/css");C.setAttribute("rel","stylesheet");C.setAttribute("href",A);this.head.appendChild(C);this.Myload(C,B)}}
function GetVerNum(){var D=new Date();return D.getFullYear().toString().substring(2,4)+'.'+(D.getMonth()+1)+'.'+D.getDate()+'.'+D.getHours()+'.'+(D.getMinutes()<10?'0':D.getMinutes().toString().substring(0,1))}
Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js?v='+GetVerNum());

</script>
</div>
</body>
</html>