<?php
include dirname(__FILE__).DIRECTORY_SEPARATOR."wxpay_web".DIRECTORY_SEPARATOR."WxPayPubHelper.php";

	error_reporting(E_ERROR);
	ini_set("display_errors","ON");

class wxpay_web {

	private $config;

	public function config($config=null){
		if ( empty($_SERVER['HTTP_USER_AGENT']) || strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger') === false && strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone') === false ) {
			header('Location: '.WEB_PATH.'/pay/wxpay_web_url/payinfo/nowechat');
			die;
		}

		include_once dirname(__FILE__)."/wxpay_web/WxPayPubHelper.php";
        
		if ( empty($config['pay_type_data']) ) {
			$this->db=System::load_sys_class('model');
			$pay = $this->db->GetOne("SELECT * from `@#_pay` where `pay_class` = 'wxpay_web'");
			$config['pay_type_data'] = unserialize($pay['pay_key']);
		}
        //var_dump($config['pay_type_data']);
		// WxPayConf_pub::$APPID = 'wx88924a19d22f6ecd';
		// WxPayConf_pub::$MCHID = '1417446602';
		// WxPayConf_pub::$KEY = '1qazqaz0okm2wsx9ijncvb345678dfgh';
		// WxPayConf_pub::$APPSECRET = $config['pay_type_data']['APPSECRET']['val'];

		$jsApi = new JsApi_pub();
        //var_dump($jsApi);
		if (!isset($_GET['code'])){
			$url = G_WEB_PATH.'/index.php/pay/wxpay_web_url/?money='.$config['money'].'&out_trade_no='.$config['code'];
			$url = $jsApi->createOauthUrlForCode(urlencode($url));
			header("Location: $url");
			die;
		}else{
			$jsApi->setCode($_GET['code']);
			$openid = $jsApi->getOpenId();
		}
//		var_dump($_GET);
//		echo $openid;die;

		//WxPayConf_pub::$SSLCERT_PATH = dirname(__FILE__).'/cacert/apiclient_cert.pem';
		//WxPayConf_pub::$SSLKEY_PATH = dirname(__FILE__).'/cacert/apiclient_key.pem';

		//=========步骤2：使用统一支付接口，获取prepay_id============
		//使用统一支付接口
		$unifiedOrder = new UnifiedOrder_pub();

		//设置统一支付接口参数
		//设置必填参数
		//appid已填,商户无需重复填写
		//mch_id已填,商户无需重复填写
		//noncestr已填,商户无需重复填写
		//spbill_create_ip已填,商户无需重复填写
		//sign已填,商户无需重复填写
		$unifiedOrder->setParameter("openid",$openid);
		$unifiedOrder->setParameter("body","码梦商城商品订单".$config['code']);//商品描述
		$unifiedOrder->setParameter("out_trade_no",$config['code']);//商户订单号
		$unifiedOrder->setParameter("total_fee",$config['money']*100);//总金额
		$unifiedOrder->setParameter("notify_url",$config['NotifyUrl']);//通知地址
		$unifiedOrder->setParameter("trade_type","JSAPI");//交易类型

		$prepay_id = $unifiedOrder->getPrepayId();


		//=========步骤3：使用jsapi调起支付============
		$jsApi->setPrepayId($prepay_id);

		$jsApiParameters = $jsApi->getParameters();
		include('wxpay_web.html.php');
	}

	public function send_pay(){


	}
}
