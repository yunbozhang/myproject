$(document).ready(function(){
    // var b="https://passport.1yyg.com";
    var a=function(){
        var e=$("#userAccount");var m=$("#btnGetCode");
        var p="";
        var j=0;
        var n=false;
        var r=function(s){
            vart=/^\w+([
                -+.
            ]\w+)*@\w+([
                -.
            ]\w+)*\.\w+([
                -.
            ]\w+)*$/;
        returnt.test(s)
        };var l=function(t){
            var s=/^1\d{
                10
            }$/;returns.test(t)
        };var g=function(t){
            vars=/^([
                \x00-\xff
            ])+$/;returns.test(t)
        };var d={
            empty: "请输入手机号/邮箱",
            avible: "该邮箱地址或手机号码未注册",
            error: "邮箱地址或手机号码不正确",
            many: "该帐号请求过于频繁，请稍后再试",
            mailFail: "发送邮件失败，请稍后再试",
            mobileFail: "验证码发送失败，请稍后再试"
        };var i={
            txtStr: "获取验证码",
            sending: "正在发送"
        };var h=function(s){
            $.PageDialog.fail(s)
        };var k=function(){
            if(!isLoaded){
                return
            }var s=function(t){
                if(t.state==0){
                    location.replace("findmobilecheck.html?str="+t.str);return
                }else{
                    if(t.state==2){
                        m.html(i.txtStr).removeClass("grayBtn").bind("click",
                        f);h(d.many)
                    }else{
                        m.html(i.txtStr).removeClass("grayBtn").bind("click",
                        f);h(d.mobileFail)
                    }
                }
            };GetJPData(b,
            "sendfindsms",
            "mobile="+e.val().trim()+"&sn="+p,
            s)
        };var c=function(){
            if(!isLoaded){
                return
            }var s=function(t){
                if(t.state==0){
                    location.replace("findemailcheck.html?str="+t.str);return
                }else{
                    m.html(i.txtStr).removeClass("grayBtn").bind("click",
                    f);h(d.mailFail)
                }
            };GetJPData(b,
            "emailgetbackpwd",
            "email="+e.val().trim()+"&sn="+p,
            s)
        };var f=function(){
            if(!isLoaded){
                return
            }var s=e.val().trim();if(s==""||s==d.empty){
                h(d.empty);return
            }else{
                if(!r(s)&&!l(s)){
                    h(d.error);return
                }
            }var t=function(u){
                if(u.state==1){
                    isLoaded=true;p=u.str;if(l(s)){
                        k()
                    }else{
                        c()
                    }
                }else{
                    m.html(i.txtStr).removeClass("grayBtn").bind("click",
                    f);h(d.avible)
                }
            };m.html(i.sending).addClass("grayBtn").unbind("click");GetJPData(b,
            "checknamesn",
            "name="+s,
            t)
        };var o="";var q=function(){
            vars=e.val();if(o!=s){
                if(g(s)||s==""){
                    o=s
                }else{
                    e.val(o).focus()
                }
            }if(n){
                setTimeout(q,
                200)
            }
        };e.bind("focus",
        function(){
            $(this).attr("style",
            "color:#666666");n=true;q()
        }).bind("blur",
        function(){
            n=false
        });m.bind("click",
        f);isLoaded=true
    };Base.getScript(Gobal.Skin+"/JS/pageDialog.js?v=130826",
    a)
});