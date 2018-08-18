webpackJsonp([0], {
    513 : function(e, t, a) {
        "use strict";
        function o(e) {
            return e && e.__esModule ? e: {
            default:
                e
            }
        }
        function n(e, t, a) {
            return t in e ? Object.defineProperty(e, t, {
                value: a,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : e[t] = a,
            e
        }
        function l(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function i(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function s(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var r = function() {
            function e(e, t) {
                for (var a = 0; a < t.length; a++) {
                    var o = t[a];
                    o.enumerable = o.enumerable || !1,
                    o.configurable = !0,
                    "value" in o && (o.writable = !0),
                    Object.defineProperty(e, o.key, o)
                }
            }
            return function(t, a, o) {
                return a && e(t.prototype, a),
                o && e(t, o),
                t
            }
        } (),
        d = a(24),
        c = o(d),
        u = a(66),
        h = o(u),
        f = a(60),
        g = o(f),
        C = a(115),
        m = o(C),
        v = a(116),
        p = o(v),
        b = a(514),
        A = o(b),
        y = a(117),
        w = o(y),
        k = a(118),
        E = o(k),
        T = a(119),
        N = o(T);
        a(95),
        a(96);
        var S = {
            ACCOUNT: "ACCOUNT",
            PHONE: "PHONE"
        },
        M = {
            ACCOUNT: "短信快捷登录",
            PHONE: "账号密码登录"
        },
        _ = {
            ACCOUNT: "重置密码",
            PHONE: "未绑定手机号?"
        },
        x = function(e) {
            function t(e) {
                l(this, t);
                var a = i(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e));
                a.$DATA = window.$DATA,
                console.log(a.$DATA),
                a.defaultSelectArea = "86",
                a.nextUrl = a.$DATA.nextUrl;
                var o = !!a.$DATA.securityLoginSwitch,
                n = !!a.$DATA.validCodeLoginSwitch;
                a.isLoginByPhoneAndAccount = o && n;
                var s = a.isLoginByPhoneAndAccount || n ? S.PHONE: S.ACCOUNT;
                return a.state = {
                    isShowAlert: !1,
                    btnDisabled: !0,
                    isShowToast: !1,
                    isValidateCodeDisabled: !0,
                    toastMsg: "",
                    securityShowVC: !!a.$DATA.securityShowVC,
                    validCodeShowVC: !0,
                    loginMode: s,
                    loginModeText: M[s],
                    loginModeTipText: _[s],
                    isShowArea: !1,
                    areaData: a.$DATA.areaCode,
                    selectAreaIndex: 0,
                    selectArea: a.$DATA.areaCode[0],
                    passwordAddonIcon: !1,
                    codeText: "获取验证码",
                    mobile: "",
                    M_imgCode: "",
                    M_imgCodeUrl: "/login/getdloginvcode/",
                    smsCode: "",
                    account: "",
                    password: "",
                    A_imgCode: "",
                    A_imgCodeUrl: "",
                    level: a.$DATA.loginLevel || 1,
                    token: window.fingerPrintToken || ""
                },
                a.imgCodeUrl = "/login/imgcode?url=",
                a.M_imgCodeUrl = "/login/getdloginvcode/",
                a.A_imgCodeUrl = "",
                a.loginHandle = a.loginHandle.bind(a),
                a.changeLoginMode = a.changeLoginMode.bind(a),
                a.tipClick = a.tipClick.bind(a),
                a.areaClick = a.areaClick.bind(a),
                a.selectAreaHandle = a.selectAreaHandle.bind(a),
                a.goRegister = a.goRegister.bind(a),
                a.getValidCode = a.getValidCode.bind(a),
                a.textChange = a.textChange.bind(a),
                a.checkNeedVerifyCode = a.checkNeedVerifyCode.bind(a),
                a.backClickHandle = a.backClickHandle.bind(a),
                a.changeAImgCode = a.changeAImgCode.bind(a),
                a.changeMImgCode = a.changeMImgCode.bind(a),
                a.checkedHandle = a.checkedHandle.bind(a),
                a.countdown = !1,
                a
            }
            return s(t, e),
            r(t, [{
                key: "componentWillUnmount",
                value: function() {
                    this.intervalRef && clearInterval(this.intervalRef),
                    this.loginCancelable && this.loginCancelable.cancel(),
                    this.checkNeedVerifyCodeCancelable && this.checkNeedVerifyCodeCancelable.cancel(),
                    this.validCodeGetCancelable && this.validCodeGetCancelable.cancel()
                }
            },
            {
                key: "backClickHandle",
                value: function() {
                    history.go( - 1)
                }
            },
            {
                key: "checkedHandle",
                value: function() {
                    this.setState({
                        isSelectCheckbox: !this.state.isSelectCheckbox
                    })
                }
            },
            {
                key: "loginHandle",
                value: function() {
                    var e = this;
                    if (!this.state.btnDisabled) {
                        if (this.state.loginMode === S.PHONE && !this.validPhone()) return void this.showToast("请输入正确的手机号");
                        var t = this.state,
                        a = t.mobile,
                        o = t.smsCode,
                        n = t.account,
                        l = t.password,
                        i = t.A_imgCode,
                        s = t.selectArea,
                        r = (t.M_imgCode, t.token),
                        d = t.level,
                        c = "",
                        u = "";
                        this.state.loginMode === S.PHONE ? (a = s.acCode + a, u = "mobile=" + a + "&verifyCode=" + o + "&token=" + r, c = "validCodeLogin") : (u = "userName=" + n + "&passWord=" + l + "&verifyCode=" + i + "&RedirectUrl=" + this.nextUrl + "&token=" + r + "&loginLevel=" + d, c = "securityLogin"),
                        this.loginCancelable = N.
                    default.post(c, {
                            body: u
                        }).then(function(t) {
                            if (console.log(t), t.error) {
                                switch (t.ErrorCode) {
                                case "402":
                                    e.setState({
                                        securityShowVC:
                                        !0,
                                        level: 2
                                    }),
                                    console.log(1);
                                    break;
                                case "403":
                                    e.setState({
                                        level:
                                        3
                                    }),
                                    e.changeLoginMode()
                                }
                                e.showToast(t.ErrorMessage),
                                e.setState({
                                    securityShowVC: t.needVerifyCode,
                                    A_imgCodeUrl: e.imgCodeUrl + t.verifyCodeUrl
                                }),
                                e.A_imgCodeUrl = e.imgCodeUrl + t.verifyCodeUrl,
                                e.state.loginMode === S.ACCOUNT && e.changeAImgCode()
                            } else location.href = decodeURIComponent("" + e.nextUrl)
                        })
                    }
                }
            },
            {
                key: "checkNeedVerifyCode",
                value: function() {
                    var e = this;
                    if (this.state.account) {
                        var t = "userName=" + this.state.account + "&loginLevel=" + this.$DATA.loginLevel;
                        this.checkNeedVerifyCodeCancelable = N.
                    default.post("checkNeedVerifyCode", {
                            body: t
                        }).then(function(t) {
                            t.error ? e.showToast(t.ErrorMessage) : (e.setState({
                                securityShowVC: t.needVerifyCode,
                                A_imgCodeUrl: e.imgCodeUrl + t.verifyCodeUrl
                            }), e.A_imgCodeUrl = e.imgCodeUrl + t.verifyCodeUrl)
                        })
                    }
                }
            },
            {
                key: "selectAreaHandle",
                value: function(e, t) {
                    this.setState({
                        selectAreaIndex: e,
                        selectArea: t
                    })
                }
            },
            {
                key: "changeLoginMode",
                value: function() {
                    this.setState({
                        loginMode: this.state.loginMode === S.ACCOUNT ? S.PHONE: S.ACCOUNT,
                        loginModeText: this.state.loginModeText === M.PHONE ? M.ACCOUNT: M.PHONE,
                        loginModeTipText: this.state.loginModeTipText === _.ACCOUNT ? _.PHONE: _.ACCOUNT
                    })
                }
            },
            {
                key: "tipClick",
                value: function() {
                    this.state.loginMode === S.PHONE ? this.setState({
                        isShowAlert: !this.state.isShowAlert
                    }) : location.href = "/login/resetpwd/?nextUrl=" + this.nextUrl
                }
            },
            {
                key: "areaClick",
                value: function() {
                    this.setState({
                        isShowArea: !this.state.isShowArea
                    })
                }
            },
            {
                key: "goRegister",
                value: function() {
                    location.href = "/login/reg/"
                }
            },
            {
                key: "validPhone",
                value: function() {
                    var e = this.state,
                    t = e.mobile,
                    a = e.selectArea;
                    return t = "" + a.acCode + t,
                    new RegExp(a.regRule).test(t)
                }
            },
            {
                key: "getValidCode",
                value: function() {
                    var e = this;
                    if (!this.state.isValidateCodeDisabled) {
                        if (!this.validPhone()) return void this.showToast("请输入正确的手机号");
                        if (!this.state.M_imgCode || 4 !== this.state.M_imgCode.length) return void this.showToast("请输入图形验证码");
                        this.setState({
                            isValidateCodeDisabled: !0
                        }),
                        this.countdown = !0;
                        var t = 61;
                        this.intervalRef = setInterval(function() {
                            if (0 === --t) return e.countdown = !1,
                            t = 61,
                            e.setState({
                                codeText: "获取验证码",
                                isValidateCodeDisabled: !1
                            }),
                            void clearInterval(e.intervalRef);
                            e.setState({
                                codeText: t + "秒"
                            })
                        },
                        1e3);
                        var a = this.state,
                        o = a.selectArea,
                        n = a.mobile,
                        l = a.M_imgCode;
                        n = o.acCode + n;
                        var i = "mobile=" + n + "&code=" + l;
                        this.validCodeGetCancelable = N.
                    default.post("validCodeGet", {
                            body: i
                        }).then(function(t) {
                            console.log(t),
                            t.error && (e.countdown = !1, e.setState({
                                codeText: "获取验证码",
                                isValidateCodeDisabled: !1
                            }), clearInterval(e.intervalRef), e.state.loginMode === S.ACCOUNT ? e.changeAImgCode() : e.changeMImgCode());
                            var a = t.error && t.ErrorMessage || "验证码已发送,请查收";
                            e.showToast(a)
                        })
                    }
                }
            },
            {
                key: "textChange",
                value: function(e, t) {
                    var a = this;
                    this.setState(n({},
                    e, t),
                    function() {
                        "mobile" !== e || a.countdown || a.setState({
                            isValidateCodeDisabled: !a.validPhone()
                        });
                        var t = !0;
                        if (a.state.loginMode === S.PHONE) {
                            var o = !0;
                            o = !!a.state.validCodeShowVC && !a.state.M_imgCode,
                            t = !(a.state.mobile && a.state.smsCode),
                            a.setState({
                                btnDisabled: t || o
                            })
                        } else {
                            var n = !0;
                            n = !!a.state.securityShowVC && !a.state.A_imgCode,
                            t = !(a.state.account && a.state.password),
                            a.setState({
                                btnDisabled: t || n
                            })
                        }
                    })
                }
            },
            {
                key: "showToast",
                value: function(e) {
                    var t = this;
                    this.setState({
                        isShowToast: !0,
                        toastMsg: e
                    },
                    function() {
                        setTimeout(function() {
                            t.setState({
                                isShowToast: !1,
                                toastMsg: ""
                            })
                        },
                        1500)
                    })
                }
            },
            {
                key: "changeAImgCode",
                value: function() {
                    var e = this.A_imgCodeUrl + "&t=" + Date.now();
                    this.setState({
                        A_imgCodeUrl: e
                    })
                }
            },
            {
                key: "changeMImgCode",
                value: function() {
                    var e = this.M_imgCodeUrl + "?t=" + Date.now();
                    this.setState({
                        M_imgCodeUrl: e
                    })
                }
            },
            {
                key: "render",
                value: function() {
                    var e = this,
                    t = (0, g.
                default)({
                        "form-button":
                        !0,
                        disabled: this.state.btnDisabled
                    }),
                    a = (0, g.
                default)({
                        "eye-close":
                        this.state.passwordAddonIcon
                    }),
                    o = (0, g.
                default)({
                        "validate-code":
                        !0,
                        disabled: this.state.isValidateCodeDisabled
                    });
                    return c.
                default.createElement("div", {
                        className: "page-layout"
                    },
                    c.
                default.createElement(m.
                default, {
                        onLeftClick: this.backClickHandle,
                        rightText: "注册",
                        onRightClick: this.goRegister
                    }), c.
                default.createElement("div", {
                        className: "page-content"
                    },
                    c.
                default.createElement("div", {
                        className: "page-title"
                    },
                    "欢迎来到92农家乐"), c.
                default.createElement("div", {
                        className: "page-form"
                    },
                    this.state.loginMode === S.PHONE ? c.
                default.createElement("div", null, c.
                default.createElement(p.
                default, {
                        type: "tel",
                        placeholder: "请输入手机号",
                        value: this.state.mobile,
                        onChange: function(t) {
                            e.textChange("mobile", t.target.value)
                        },
                        label: c.
                    default.createElement("div", null, c.
                    default.createElement("span", {
                            className: "text"
                        },
                        "+", this.state.selectArea.acCode || this.defaultSelectArea), c.
                    default.createElement("i", {
                            className: "icon arrow-bottom"
                        })),
                        labelClick: this.areaClick
                    }), this.state.validCodeShowVC ? c.
                default.createElement(p.
                default, {
                        type: "text",
                        placeholder: "输入图形验证码",
                        value: this.state.M_imgCode,
                        onChange: function(t) {
                            e.textChange("M_imgCode", t.target.value)
                        },
                        rightAddons: c.
                    default.createElement("img", {
                            src: this.state.M_imgCodeUrl,
                            className: "validate-img-code"
                        }),
                        addonsClick: this.changeMImgCode
                    }) : null, c.
                default.createElement(p.
                default, )) : c.
                default.createElement("div", null, c.
                default.createElement(p.
                default, {
                        type: "text",
                        placeholder: "手机号/邮箱/卡号",
                        maxLength: 64,
                        value: this.state.account,
                        onChange: function(t) {
                            e.textChange("account", t.target.value)
                        },
                        onBlur: this.checkNeedVerifyCode
                    }), c.
                default.createElement(p.
                default, {
                        type: this.state.passwordAddonIcon ? "text": "password",
                        placeholder: "请输入密码",
                        maxLength: 30,
                        value: this.state.password,
                        onChange: function(t) {
                            e.textChange("password", t.target.value)
                        },
                        rightAddons: c.
                    default.createElement("i", {
                            className: a
                        }),
                        addonsClick: function() {
                            e.setState({
                                passwordAddonIcon: !e.state.passwordAddonIcon
                            })
                        }
                    }), this.state.securityShowVC ? c.
                default.createElement(p.
                default, {
                        type: "text",
                        placeholder: "输入图形验证码",
                        value: this.state.A_imgCode,
                        onChange: function(t) {
                            e.textChange("A_imgCode", t.target.value)
                        },
                        rightAddons: c.
                    default.createElement("img", {
                            src: this.state.A_imgCodeUrl,
                            className: "validate-img-code"
                        }),
                        addonsClick: this.changeAImgCode
                    }) : null), c.
                default.createElement("div", {
                        className: t,
                        onClick: this.loginHandle
                    },
                    c.
                default.createElement("button", null, "登录")), c.
                default.createElement("div", {
                        className: "form-addons"
                    },
                    c.
                default.createElement("a", {
                        onClick: this.tipClick
                    },
                    this.state.loginModeTipText), this.isLoginByPhoneAndAccount && 3 != this.state.level ? c.
                default.createElement("a", {
                        onClick: this.changeLoginMode
                    },
                    this.state.loginModeText) : c.
                default.createElement("div", null)))), this.state.isShowAlert ? c.
                default.createElement(A.
                default, {
                        onOK: this.tipClick,
                        title: "用户提示",
                        content: c.
                    default.createElement("div", null, c.
                    default.createElement("div", {
                            className: "text"
                        },
                        c.
                    default.createElement("span", null, "1"), ".未注册的用户，请点击右上角按钮", c.
                    default.createElement("a", {
                            href: "/login/reg/"
                        },
                        "注册")), c.
                    default.createElement("div", {
                            className: "text"
                        },
                        c.
                    default.createElement("span", null, "2"), ".已注册但未绑定手机号的用户，请拨打", c.
                    default.createElement("a", {
                            href: "tel:400-666-1166"
                        },
                        "400-666-1166"), "联系客服转会员服务项绑定手机号"))
                    }) : null, this.state.isShowArea ? c.
                default.createElement(w.
                default, {
                        close: this.areaClick,
                        selectHandle: this.selectAreaHandle,
                        index: this.state.selectAreaIndex,
                        data: this.state.areaData
                    }) : null, this.state.isShowToast ? c.
                default.createElement(E.
                default, {
                        message: this.state.toastMsg
                    }) : null)
                }
            }]),
            t
        } (c.
    default.Component);
        h.
    default.render(c.
    default.createElement(x, null), document.getElementById("root"))
    },
    514 : function(e, t, a) {
        "use strict";
        function o(e, t) {
            if (! (e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        function n(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return ! t || "object" != typeof t && "function" != typeof t ? e: t
        }
        function l(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }),
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var i = function() {
            function e(e, t) {
                for (var a = 0; a < t.length; a++) {
                    var o = t[a];
                    o.enumerable = o.enumerable || !1,
                    o.configurable = !0,
                    "value" in o && (o.writable = !0),
                    Object.defineProperty(e, o.key, o)
                }
            }
            return function(t, a, o) {
                return a && e(t.prototype, a),
                o && e(t, o),
                t
            }
        } (),
        s = a(24),
        r = function(e) {
            return e && e.__esModule ? e: {
            default:
                e
            }
        } (s);
        a(515),
        a(177);
        var d = function(e) {
            function t(e) {
                return o(this, t),
                n(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e))
            }
            return l(t, e),
            i(t, [{
                key: "render",
                value: function() {
                    return r.
                default.createElement("div", {
                        className: "page-mask page-mask-center",
                        onClick: this.props.onOK
                    },
                    r.
                default.createElement("div", {
                        className: "alert"
                    },
                    r.
                default.createElement("div", {
                        className: "alert-title"
                    },
                    this.props.title), r.
                default.createElement("div", {
                        className: "alert-content"
                    },
                    this.props.content), r.
                default.createElement("div", {
                        className: "alert-actions",
                        onClick: this.props.onOK
                    },
                    r.
                default.createElement("span", null, "确定"))))
                }
            }]),
            t
        } (r.
    default.Component);
        t.
    default = d
    },
    515 : function(e, t) {}
},
[513]);