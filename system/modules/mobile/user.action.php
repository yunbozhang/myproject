<?php

defined('G_IN_SYSTEM')or exit('No permission resources.');
System::load_app_class('memberbase',null,'no');
System::load_app_fun('user','go');
System::load_app_fun('my','go');
System::load_sys_fun('send');
class user extends memberbase {
	public function __construct(){
		parent::__construct();
		$this->db = System::load_sys_class("model");
	}

	public function cook_end(){
		_setcookie("uid","",time()-3600);
		_setcookie("ushell","",time()-3600);
		//_message("退出成功",WEB_PATH."/mobile/mobile/");
		header("location: ".WEB_PATH."/mobile/mobile/");
	}
	//返回登录页面
	public function login(){
		 $webname=$this->_cfg['web_name'];
		$user = $this->userinfo;
		if($user){
			header("Location:".WEB_PATH."/mobile/home/");exit;
		}

		include templates("mobile/user","login");

	}
    //找到密码
	public function findpassword(){
	  $webname=$this->_cfg['web_name'];
		include templates("mobile/user","findpassword");
	}



	//返回注册页面
	public function register(){
		$user_ip1 = _get_ip_dizhi();

        //测试
		//$user_ip1 = _get_ip_dizhi("124.164.193.77");
		if ($user_ip1=="") {
		$user_ip1 = _get_ip_dizhi();
		}

		$arr =explode(",",$user_ip1);
		$useripsub = $arr[0];
		// var_dump($user_ip1);
		// var_dump($arr);
		// var_dump($arr[0]);
        
         $webname=$this->_cfg['web_name'];
		include templates("mobile/user","register");        


	  
	}

	//返回发送验证码页面
	public function mobilecode(){
	    $webname=$this->_cfg['web_name'];
	    $mobilename=$this->segment(4);

		include templates("mobile/user","mobilecheck");
	}
   //手机校验
	public function mobilecheck(){
	    $webname=$this->_cfg['web_name'];
		$title="验证手机";
		$time=3000;
		//??????  电话号码如何取过来
		$name=$this->segment(4);
		$member=$this->db->GetOne("SELECT * FROM `@#_member` WHERE `mobile` = '$name' LIMIT 1");
		 // var_dump($member);exit;
		if(!$member)_message("参数不正确!");
		if($member['mobilecode']==1){
			//_message("该账号验证成功",WEB_PATH."/mobile/mobile");
			$sendok = send_mobile_reg_code($name,$member['uid']);
			if($sendok[0]!=1){
					_message($sendok[1]);
			}
			header("location:".WEB_PATH."/mobile/user/mobilecheck/".$member['mobile']);
			exit;
		}
		include templates("mobile/user","mobilecheck");
	}


//查找手机校验
	public function findmobilecheck(){
	    $webname=$this->_cfg['web_name'];
		$title="验证手机";
		$time=3000;
		//??????  电话号码如何取过来
		$name=$this->segment(4);
		$member=$this->db->GetOne("SELECT * FROM `@#_member` WHERE `mobile` = '$name' LIMIT 1");
		 // var_dump($member);exit;
		if(!$member)_message("参数不正确!");
		if($member['mobilecode']==1){
			//_message("该账号验证成功",WEB_PATH."/mobile/mobile");
			$sendok = send_mobile_reg_code($name,$member['uid']);
			if($sendok[0]!=1){
					_message($sendok[1]);
			}
			header("location:".WEB_PATH."/mobile/user/findmobilecheck/".$member['mobile']);
			exit;
		}
		include templates("mobile/user","findmobilecheck");
	}
   //密码修改
	public function modifypassword(){
		//判断是否来自上一个页面
		if ($_SERVER['HTTP_REFERER']=='') {
					include templates("mobile/user","login");

		}else{
			$webname=$this->_cfg['web_name'];
	    $name=$this->segment(4);
	    

		include templates("mobile/user","modifypassword");
		}



	    
	}

	public function buyDetail(){
	 $webname=$this->_cfg['web_name'];
	 $member=$this->userinfo;
	 $itemid=intval($this->segment(4));

	 $itemlist=$this->db->GetList("select *,a.time as timego,sum(gonumber) as gonumber from `@#_member_go_record` a left join `@#_shoplist` b on a.shopid=b.id where a.uid='$member[uid]' and b.id='$itemid' group by a.id order by a.time" );

	 if(!empty($itemlist)){
		 if($itemlist[0]['q_end_time']!=''){
	   //商品已揭晓
			$itemlist[0]['codeState']='已揭晓...';
			$itemlist[0]['class']='z-ImgbgC02';
	    }elseif($itemlist[0]['shenyurenshu']==0){
		//商品购买次数已满
			$itemlist[0]['codeState']='已满员...';
			$itemlist[0]['class']='z-ImgbgC01';
		}else{
		//进行中
			$itemlist[0]['codeState']='进行中...';
			$itemlist[0]['class']='z-ImgbgC01';

		}
		$bl=($itemlist[0]['canyurenshu']/$itemlist[0]['zongrenshu'])*100;

		foreach ($itemlist as $k => $v) {
			$count += $v['gonumber'];
		}
	}
	$count = $count ? $count : 0;
     //echo "<pre>";
	 //print_r($itemlist);
	 include templates("mobile/user","userbuyDetail");
	}

}//

?>