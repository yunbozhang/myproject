<?php 

/**
*	V3.1.6	 time:2014-06-12
**/

class wxsendmobile {
	
	public $error = '';
	public $v = '';
	
	private $mobile;
	private $config;
	private $op;
	private $access_token;

	
	/**
	*	短信配置总入口
	*	config  @设置要发送的短信数组
	*	mobiles @短信总配置文件
	*	key 	@手动指定开启的短信接口,不指定调用配置文件
	**/
	public function init($config=null,$mobiles=null,$key=null){
		if(!$config){
			return false;
		}
		
		if($config['mobile']==NULL)return false;
		if($config['content']==NULL)return false;
		$this->config = $config;
		
		if(!$mobiles){
			$this->mobile = System::load_sys_config('mobile');
		}
		if(intval($key) && isset($this->mobile['cfg_mobile_'.$key]) && method_exists($this,"cfg_seting_".$key)){
			$op = $key;
			$func = "cfg_seting_".$key;		
		}else{
			$op = $this->mobile['cfg_mobile_on'];
			$func = "cfg_seting_".$this->mobile['cfg_mobile_on'];		
		}	
		$this->op = $op; 
		return $this->$func();	
	}
	
	
	
	/**
	*	总发送入口	
	**/	
	public function send(){
		$func = "cfg_send_".$this->op;
		return $this->$func();	
	}
	
	
	
	
	/*互亿无线短信配置设置*/
	private function cfg_seting_3(){
		return true;
	}
	
   function http_request($url,$data=array()){
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
         // 我们在POST数据哦！
         curl_setopt($ch, CURLOPT_POST, 1);
         // 把post的变量加上
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         $output = curl_exec($ch);
         curl_close($ch);
         return $output;
     }


	/*互亿无线短信发送*/
	private function cfg_send_3($post_data=null,$target=null,$get_key=null){	
		//cf_tlwl
		//BPPKNes	
		$config = $this->config;
		//"您的验证码是：9707。请不要把验证码泄露给其他人。"
		$config['content'] = rawurlencode($config['content']);	

		$appid="wx88924a19d22f6ecd";
        $appsecret="6b1d29866e1011d5b007c417d4c613c2";
        $json_token=http_request("http://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret);
        $access_token=json_decode($json_token,true);
        //获得access_token
         $this->access_token=$access_token[access_token];
         echo $this->access_token;exit;

         //模板消息	
        $template=array(
        'touser'=>$_GET['wecha_id'],
        'template_id'=>"3g9YJap7HmPxpn24E_8R26xbdHaUw2yfB7ozGwaWC3k",
        'url'=>"http://weixin.qq.com/download",
        'topcolor'=>"#7B68EE",
        'data'=>array(
                   'first'=>array('value'=>urlencode("您好,您已购买成功"),'color'=>"#743A3A"),
                   'name'=>array('value'=>urlencode("商品信息:微时代电影票"),'color'=>'#EEEEEE'),
                   'remark'=>array('value'=>urlencode('永久有效!密码为:1231313'),'color'=>'#FFFFFF'),
          )
        );


        
		$json_template=json_encode($template);
        //echo $json_template;
        //echo $this->access_token;
        $url="http://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$this->access_token;
        $res=http_request($url,urldecode($json_template));
        if ($res[errcode]==0) echo '模板消息发送成功!';
        //print_r($res);
	
}