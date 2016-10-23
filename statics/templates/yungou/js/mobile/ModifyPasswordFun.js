$(document).ready(function(){
    // var b="https://passport.1yyg.com";
    var a=function(){
        var g=$("#txtPasswordObj");
        var j=$("#txtPasswordObj2");
        var h=$("#hidUserName").val().trim();
        var t=$("#hidKey").val().trim();
        var v=$("#isCheck");
        var c=$("#btnPostSet");
        var k=false;
        var f=function(x){
            var w=function(A,
            B,
            y){
                var z=newRegExp(B,
                "g");returnA.replace(z,
                y)
            };var x=escape(x);x=w(x,
            "\\+",
            "%2B");x=w(x,
            "/",
            "%2F");returnx
        };var q=function(x){
            varw=/^([
                \x00-\xff
            ])+$/;returnw.test(x)
        };var p=function(x){
            var w=/^(?![
                A-z
            ]+$)(?!\d+$)(?![
                \W_
            ]+$)^.{
                8,
                20
            }$/;returnw.test(x)
        };var m={
            empty: "请输入密码",
            txtStr: "8-20位字母,数字或符号两种或以上组合",
            error: "密码格式不正确，请检查",
            setok: "密码设置成功",
            seterror: "新密码设置失败"
        };var r={
            txtStr: "设置密码",
            checkCode: "正在设置密码"
        };var u=function(w){
            $.PageDialog.fail(w)
        };var d=function(x,
        w){
            $.PageDialog.ok(x,
            w)
        };var e=function(){
            if(!isLoaded){
                return
            }var w=s?j.val().trim(): g.val().trim();if(w==""||w==m.txtStr){
                u(m.empty);return
            }else{
                if(!p(w)){
                    u(m.error)
                }else{
                    var x=function(y){
                        if(y.state==0){
                            c.hide();d(m.setok,
                            function(){
                                location.replace("login.html")
                            })
                        }else{
                            c.html(r.txtStr).removeClass("grayBtn").bind("click",
                            e);d(m.seterror)
                        }isLoaded=true
                    };isLoaded=false;c.html(r.checkCode).addClass("grayBtn").unbind("click");GetJPData(b,
                    "setuserpwd",
                    "userName="+h+"&pwd="+f(w)+"&key="+t,
                    x)
                }
            }
        };var s=false;var o=function(){
            if(s){
                s=false;if(j.val()==m.txtStr){
                    g.val("")
                }else{
                    g.val(j.val()).attr("style",
                    "color:#666666");j.hide();g.show().focus()
                }v.addClass("noCheck")
            }else{
                s=true;if(g.val()==""){
                    j.val(m.txtStr)
                }else{
                    j.val(g.val()).attr("style",
                    "color:#666666")
                }g.hide();j.show().focus();v.removeClass("noCheck")
            }
        };var l="";vari;var n=function(){
            var w=i.val();if(l!=w){
                if(q(w)||w==""){
                    l=w
                }else{
                    i.val(l).focus()
                }
            }if(k){
                setTimeout(n,
                200)
            }
        };g.bind("focus",
        function(){
            $(this).attr("style",
            "color:#666666");k=true;i=$(this);n()
        }).bind("blur",
        function(){
            k=false
        });j.bind("focus",
        function(){
            $(this).attr("style",
            "color:#666666");k=true;i=$(this);n()
        }).bind("blur",
        function(){
            k=false
        });c.bind("click",
        e);v.bind("click",
        o);isLoaded=true
    };Base.getScript(Gobal.Skin+"/JS/pageDialog.js?v=130826",
    a)
});