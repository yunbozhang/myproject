<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>


<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>设置新密码 - 1元云购触屏版</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />

    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/login.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
    <script id="pageJS" data="<?php echo G_TEMPLATES_JS; ?>/mobile/ModifyPassword.js" language="javascript" type="text/javascript"></script>
</head>
<body>
    <div class="h5-1yyg-v1" id="content">
        
<!-- 栏目页面顶部 -->


<!-- 内页顶部 -->

    <header class="g-header">
        <div class="head-l">
            <a href="<?php echo WEB_PATH; ?>/mobile/mobile" class="z-HReturn"><s></s><b>返回</b></a>
        </div>
        <h2>设置新密码</h2>
        <div class="fr head-r">
            
        </div>
    </header>

        <section>
            <div class="registerCon">
                <ul>
                    <li>
                        <input type="password" id="txtPasswordObj" maxlength="20" placeholder="8-20位字母,数字或符号两种或以上组合">
                        <input type="text" id="txtPasswordObj2" maxlength="20" placeholder="8-20位字母,数字或符号两种或以上组合" style="display:none">
                    </li>
                    <li><span id="isCheck" class="noCheck"><em></em>显示密码</span></li>
                    <li><a id="btnPostSet" href="javascript:;" class="nextBtn  orgBtn">下一步</a></li>
                    <li>密码由8-20位字母、数字或符号两种或以上组合</li>
                </ul>
                <input name="hidUserName" type="hidden" id="hidUserName" value="18910403461" />
                <input name="hidKey" type="hidden" id="hidKey" value="xHsZDZn*3kNaYF4ZsiAdaYdjCGH5MDdrMgdbz29*y7TQzVdNKFco6IS5LUsjNNGb" />
            </div>
        </section>
        
<input id="hidIsHttps" type="hidden" value="1" />
<footer id="pageBottom_footer" class="footer">
    <div class="u-ft-nav" id="fLoginInfo">
        <span><a href="http://m.1yyg.com/">首页</a><b></b></span>
        <span><a href="http://m.1yyg.com/about.html">新手指南</a><b></b></span>
        <span><a href="https://m.1yyg.com/passport/login.html?forward=rego">登录</a><b></b></span>
        <span><a href="https://m.1yyg.com/passport/register.html?forward=rego">注册</a></span>
    </div>
    
        <p class="m-ftA">
            <a href="http://m.1yyg.com/">触屏版</a><a href="http://www.1yyg.com/?dev=1">电脑版</a><a href="http://app.1yyg.com/down1yygapk.do" target="_blank">下载客户端</a>
        </p>
        <p class="grayc">
            客服热线<span class="orange">4000-588-688</span>粤ICP备09213115号-1
        </p>
        <a id="btnTop" href="javascript:;" class="z-top" style="display: none;">
            <b class="z-arrow"></b>
        </a>
    
</footer>
<script language="javascript" type="text/javascript">
    var Base =
                {
                    head: document.getElementsByTagName("head")[0] || document.documentElement,
                    Myload: function (B, A) {
                        this.done = false;
                        B.onload = B.onreadystatechange = function () {
                            if (!this.done && (!this.readyState || this.readyState === "loaded" || this.readyState === "complete")) {
                                this.done = true;
                                A();
                                B.onload = B.onreadystatechange = null;
                                if (this.head && B.parentNode) {
                                    this.head.removeChild(B);
                                }
                            }
                        };
                    },
                    getScript: function (A, C) {
                        var B = function () { };
                        if (C != undefined) {
                            B = C;
                        }
                        var D = document.createElement("script");
                        D.setAttribute("language", "javascript");
                        D.setAttribute("type", "text/javascript");
                        D.setAttribute("src", A);
                        this.head.appendChild(D);
                        this.Myload(D, B);
                    },
                    getStyle: function (A, B) {
                        var B = function () { };
                        if (callBack != undefined) {
                            B = callBack;
                        }
                        var C = document.createElement("link");
                        C.setAttribute("type", "text/css");
                        C.setAttribute("rel", "stylesheet");
                        C.setAttribute("href", A);
                        this.head.appendChild(C);
                        this.Myload(C, B);
                    }
                };

    function GetVerNum() {
        var D = new Date();
        return D.getFullYear().toString().substring(2, 4) + '.' + (D.getMonth() + 1) + '.' + D.getDate() + '.' + D.getHours() + '.' + (D.getMinutes() < 10 ? '0' : D.getMinutes().toString().substring(0, 1));
    }

    Base.getScript(($("#hidIsHttps").val() == "1" ? "https://mskin.1yyg.com" : "http://mskin.1yyg.com")+'/JS/Bottom.js?v=' + GetVerNum());

</script>
<div style="display: none;">
    
    <script type="text/javascript" language="JavaScript" src="https://s22.cnzz.com/stat.php?id=3362429&web_id=3362429"></script>
</div>

    </div>
</body>
</html>
