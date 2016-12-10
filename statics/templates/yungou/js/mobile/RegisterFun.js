$(function() {


    //第一步先调用d
    //第二步用户名输入绑定  然后走s函数
    //第三步isLoaded赋值为true
    //第四步 a下一步按钮  绑定g函数  校验用户名
    //第五步 b勾选绑定p函数  
    //第六步 g中走o函数
    var useripsub = $("#aaa");
    var user_ip_sub = useripsub.attr("value").trim();
    var c = $("#userMobile");
    var ps = $("#txtPassword");
    var a = $("#btnNext");
    var b = $("#isCheck");



    // 定义一个d函数
    var d = function() {
        //k不知道代表什么
        var k = 0;
        //用户名为空
        var h = "";
        //密码为空
        var psv = "";
        
        //定义一个q函数
        var q = function(u) {

            var t = /^\d+$/;
            return t.test(u)
        };

        //定义一个m函数
        var m = function(u) {

            var t = /^1\d{10}$/;
            return t.test(u)
        };


        //定义一个l提示信息
        var l = {
            txtStr: "请输入您的手机号码",
            ishad: "已被注册，请更换手机号码",
            error: "请输入正确的手机号码",
            many: "验证码请求次数过多，请稍后再试",
            retry: "验证码发送失败，请重试",
            msgerror: "已注册,该账号需修改密码",
            ok: "该号码可以注册",
            iperror:"您位置不在山西晋城市无法注册",
            checkerror:"确认手机号,如无误请联系管理员处理"
        };


        //定义一个f状态
        var f = {
            txtStr: "下一步",
            checkNO: "正在验证手机号",
            sendCode: "正在发送验证码"
        };

        
        //定义一个i函数
        var i = function(t) {
            $.PageDialog.fail(t)
        };

        var ddd = function(x, w) {
            $.PageDialog.ok(x, w)
        };
//以上只是对子函数和变量的定义

        

        //定义一个n函数
        var n = function() {

            //如果未加载   或者  k不等于2   直接返回
            if (!isLoaded || k != 2) {
                return
            }

            //u为空
            var u = h;
            var pass = psv;

            //定义一个t函数在n内部
            var t = function(v) {
            //alert(v.state);

                //v的状态为0  跳转
                if (v.state == 0) {
                    GetJPData(Gobal.Webpath, "ajax", "sendmobile/"+u);
                    location.replace(Gobal.Webpath+"/mobile/user/mobilecheck/" + u);
                    return
                } else {
                    //v的状态为2   验证码请求次数过多，请稍后再试"
                    if (v.state == 2) {

                        i(l.many)
                    } else{//验证码发送失败，请重试
                        i(l.retry)
                    }
                }
                isLoaded = true;
                //下一步   
                a.html(f.txtStr).removeClass("grayBtn").bind("click", g)
            };


            isLoaded = false;
            //正在发送验证码  不绑定
            a.html(f.sendCode).addClass("grayBtn").unbind("click");
            GetJPData(Gobal.Webpath, "ajax", "userMobile/"+u+"/"+base64encode(utf16to8(pass)), t)
        };//代表n函数结束

        //定一个o的函数
        var o = function() {
            //未加载直接返回
            if (!isLoaded) {
                return
            }


            var u = h;
            var pass = psv;
            var t = function(v) {
            
                if (u == h) {
                    if (v.state == 1) {
                        k = 1;
                        //已被注册，请更换手机号码
                        i(l.ishad)
                    }else if(v.state == 2){
                       k = 1;
                       //系统短息配置不正确
                       ddd(l.msgerror,function(){
                        location.replace(Gobal.Webpath+"/mobile/user/findpassword/");
                       });
                    } else {
                        if (v.state == 0) {
                            k = 2;
                            isLoaded = true;
                            n()
                        } else {
                            k = 0
                            i(l.checkerror)
                        }
                    }
                }
            };
            GetJPData(Gobal.Webpath, "ajax", "checkname/"+ u, t)

        };//代表o结束

var checkip = function(){
        //console.log(user_ip_sub);
        //alert(user_ip_sub);
           if (user_ip_sub!="") {

           }


            if (user_ip_sub!="山西省晋城市")
             {
                ddd(l.iperror,
                            function() {
                                location.replace(Gobal.Webpath+"/mobile/mobile/")
                            });
                return 0;
             }else{
                return 1;
             }
}



        //定义一个g函数   校验用户名
        var g = function() {
            //调用检查地理位置
            if (checkip()) {
            //用户名
            h = c.val();
            //密码
            psv = ps.val();


            //j的值是假的直接返回
            if (j) {
                return
            }

            //假如用户名为空或者 用户名
            if (h == "" || h == l.txtStr) {
                i(l.txtStr)
            } else {

                //判断用户名长度
                if ((h.length < 11 || h.length >= 11) && !m(h)) {

                    //请输入正确的手机号码
                    i(l.error)
                } else {

                    //手机号正则表达式验证通过
                    if (m(h)) {

                        //走o函数
                        o()
                    }
                }
            }
            };
        };



        var r = "";

        var s = function() {

            //r和手机号的值不一样
            if (r != c.val()) {

                //用q函数进行校验  或者  手机号等于空
                if (q(c.val()) || c.val() == "") {
                    //用户名进行赋值
                    r = c.val()
                } else {

                    c.val(r)
                }
            }

            //校验开关
            if (checkSwitch) {
                setTimeout(s, 200)
            }
        };


        //用户手机号绑定   字体颜色为灰色
        c.bind("focus",function(){$(this).attr("style", "color:#666666");checkSwitch = true;s()}).bind("blur",function() {checkSwitch = false});

        var j = false;
        //定义一个p的函数  是否勾选
        var p = function() {

            //假如j是假的
            if (!j) {
                //不选中
                b.addClass("noCheck");
                //下一步按钮 添加灰色按钮不绑定  
                a.addClass("grayBtn").unbind("click")
            } else {
                //否则b移除
                b.removeClass("noCheck");

                var t = c.val();
                //下一步移除灰色按钮  绑定 函数g
                a.removeClass("grayBtn").bind("click", g)
            }
            j = !j
        };

        //下一步按钮绑定点击g
        a.bind("click", g);
        //勾选绑定点击p
        b.bind("click", p);
        isLoaded = true
    };//代表d函数结束


    Base.getScript(Gobal.Skin + "/js/mobile/pageDialog.js", d);

    var base64encodechars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
    var base64decodechars = new Array(
    -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 62, -1, -1, -1, 63,
    52, 53, 54, 55, 56, 57, 58, 59, 60, 61, -1, -1, -1, -1, -1, -1,
    -1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,
    15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, -1, -1, -1, -1, -1,
    -1, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40,
    41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, -1, -1, -1, -1, -1);
    //编码
    function base64encode(str) {
        var out, i, len;
        var c1, c2, c3;
        len = str.length;
        i = 0;
        out = "";
        while (i < len) {
            c1 = str.charCodeAt(i++) & 0xff;
            if (i == len) {
                out += base64encodechars.charAt(c1 >> 2);
                out += base64encodechars.charAt((c1 & 0x3) << 4);
                out += "==";
                break;
            }
            c2 = str.charCodeAt(i++);
            if (i == len) {
                out += base64encodechars.charAt(c1 >> 2);
                out += base64encodechars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xf0) >> 4));
                out += base64encodechars.charAt((c2 & 0xf) << 2);
                out += "=";
                break;
            }
            c3 = str.charCodeAt(i++);
            out += base64encodechars.charAt(c1 >> 2);
            out += base64encodechars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xf0) >> 4));
            out += base64encodechars.charAt(((c2 & 0xf) << 2) | ((c3 & 0xc0) >> 6));
            out += base64encodechars.charAt(c3 & 0x3f);
        }
        return out;
    }

    //解码
    function base64decode(str) {
        var c1, c2, c3, c4;
        var i, len, out;
        len = str.length;
        i = 0;
        out = "";
        while (i < len) {

            do {
                c1 = base64decodechars[str.charCodeAt(i++) & 0xff];
            } while (i < len && c1 == -1);
            if (c1 == -1)
                break;

            do {
                c2 = base64decodechars[str.charCodeAt(i++) & 0xff];
            } while (i < len && c2 == -1);
            if (c2 == -1)
                break;
            out += String.fromCharCode((c1 << 2) | ((c2 & 0x30) >> 4));

            do {
                c3 = str.charCodeAt(i++) & 0xff;
                if (c3 == 61)
                    return out;
                c3 = base64decodechars[c3];
            } while (i < len && c3 == -1);
            if (c3 == -1)
                break;
            out += String.fromCharCode(((c2 & 0xf) << 4) | ((c3 & 0x3c) >> 2));

            do {
                c4 = str.charCodeAt(i++) & 0xff;
                if (c4 == 61)
                    return out;
                c4 = base64decodechars[c4];
            } while (i < len && c4 == -1);
            if (c4 == -1)
                break;
            out += String.fromCharCode(((c3 & 0x03) << 6) | c4);
        }
        return out;
    }

    //16-8
    function utf16to8(str) {
        var out, i, len, c;
        out = "";
        len = str.length;
        for (i = 0; i < len; i++) {
            c = str.charCodeAt(i);
            if ((c >= 0x0001) && (c <= 0x007f)) {
                out += str.charAt(i);
            } else if (c > 0x07ff) {
                out += String.fromCharCode(0xe0 | ((c >> 12) & 0x0f));
                out += String.fromCharCode(0x80 | ((c >> 6) & 0x3f));
                out += String.fromCharCode(0x80 | ((c >> 0) & 0x3f));
            } else {
                out += String.fromCharCode(0xc0 | ((c >> 6) & 0x1f));

                out += String.fromCharCode(0x80 | ((c >> 0) & 0x3f));
            }
        }
        return out;
    }

    //8-16
    function utf8to16(str) {
        var out, i, len, c;
        var char2, char3;
        out = "";
        len = str.length;
        i = 0;
        while (i < len) {
            c = str.charCodeAt(i++);
            switch (c >> 4) {
                case 0: case 1: case 2: case 3: case 4: case 5: case 6: case 7:
                    // 0xxxxxxx
                    out += str.charAt(i - 1);
                    break;
                case 12: case 13:
                    // 110x xxxx   10xx xxxx
                    char2 = str.charCodeAt(i++);
                    out += String.fromCharCode(((c & 0x1f) << 6) | (char2 & 0x3f));
                    break;
                case 14:
                    // 1110 xxxx  10xx xxxx  10xx xxxx
                    char2 = str.charCodeAt(i++);
                    char3 = str.charCodeAt(i++);
                    out += String.fromCharCode(((c & 0x0f) << 12) |
                       ((char2 & 0x3f) << 6) |
                       ((char3 & 0x3f) << 0));
                    break;
            }
        }
        return out;
    }
    //base64 加密base64encode(utf16to8(value));
    //base64 解密utf8to16(base64decode(value));
});