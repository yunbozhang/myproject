$(function() {
    var a = function() {
        var g = $("#txtPasswordObj");
        var j = $("#txtPasswordObj2");
        //var h = $("#hidUserName").val().trim();
        var nn = $("#hidUserName");
        var h = nn.attr("value").trim(); 
        alert(h+"fdsafsdfsdfdsfsdf");
        var t = $("#hidKey").val().trim();
        var v = $("#isCheck");
        var c = $("#btnPostSet");
        var k = false;
        var f = function(x) {
            var w = function(A, B, y) {
                var z = new RegExp(B, "g");
                return A.replace(z, y)
            };
            var x = escape(x);
            x = w(x, "\\+", "%2B");
            x = w(x, "/", "%2F");
            return x
        };

        var q = function(x) {
            var w = /^([\x00-\xff])+$/;
            return w.test(x)
        };

        var p = function(x) {
            var w = /^(?![A-z]+$)(?!\d+$)(?![\W_]+$)^.{8,20}$/;
            return w.test(x)
        };

        var m = {
            empty: "请输入密码",
            txtStr: "8-20位字母,数字或符号两种或以上组合",
            error: "密码格式不正确，请检查",
            setok: "密码设置成功",
            seterror: "新密码设置失败"
        };

        var r = {
            txtStr: "设置密码",
            checkCode: "正在设置密码"
        };

        var u = function(w) {
            $.PageDialog.fail(w)
        };

        var d = function(x, w) {
            $.PageDialog.ok(x, w)
        };

        var e = function() {
            if (!isLoaded) {
                return
            }
            var w = s ? j.val().trim() : g.val().trim();
            alert(w+"sdfsfdsfdsfds");
            if (w == "" || w == m.txtStr) {
                u(m.empty);
                return
            } else {
                if (!p(w)) {
                    u(m.error)
                } else {
                    var x = function(y) {
                        if (y.state == 0) {
                            c.hide();
                            d(m.setok,
                            function() {
                                location.replace(Gobal.Webpath+"/mobile/user/login")
                            })
                        } else {
                            c.html(r.txtStr).removeClass("grayBtn").bind("click", e);
                            d(m.seterror)
                        }
                        isLoaded = true
                    };
                    isLoaded = false;
                    c.html(r.checkCode).addClass("grayBtn").unbind("click");
                             alert("OKKKK");

                   // GetJPData(Gobal.Webpath, "setuserpwd", "userName=" + h + "&pwd=" + f(w) + "&key=" + t, x)
                    GetJPData(Gobal.Webpath, "ajax", "modifyuserMobile/"+h+"/"+base64encode(utf16to8(f(w))), x)

                }
            }
        };
        var s = false;
        var o = function() {
            alert("false");

            if (s) {
                s = false;
                if (j.val() == m.txtStr) {
                    g.val("")
                } else {
                    g.val(j.val()).attr("style", "color:#666666");
                    j.hide();
                    g.show().focus()
                }
                v.addClass("noCheck")
            } else {
                alert("true");
                s = true;
                if (g.val() == "") {
                    j.val(m.txtStr)
                } else {
                    j.val(g.val()).attr("style", "color:#666666")
                }
                g.hide();
                j.show().focus();
                v.removeClass("noCheck")
            }
        };


        var l = "";
        var i;
        var n = function() {
            var w = i.val();
            if (l != w) {
                if (q(w) || w == "") {
                    l = w
                } else {
                    i.val(l).focus()
                }
            }
            if (k) {
                setTimeout(n, 200)
            }
        };

        g.bind("focus",
        function() {
            $(this).attr("style", "color:#666666");
            k = true;
            i = $(this);
            n()
        }).bind("blur",
        function() {
            k = false
        });

        j.bind("focus",
        function() {
            $(this).attr("style", "color:#666666");
            k = true;
            i = $(this);
            n()
        }).bind("blur",
        function() {
            k = false
        });
        c.bind("click", e);
        v.bind("click", o);
        isLoaded = true
    };
    //Base.getScript(Gobal.Skin + "/js/mobile/pageDialog.js", a);

var b = function() {
        Base.getScript(Gobal.Skin + "/js/mobile/pageDialog.js", a)
    };
    Base.getScript(Gobal.Skin + "/js/mobile/Comm.js", b);

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