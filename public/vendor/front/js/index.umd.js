! function (t, e) {
    "object" == typeof exports && "undefined" != typeof module ? e(exports, require("vue")) : "function" == typeof define && define.amd ? define(["exports", "vue"], e) : e((t = "undefined" != typeof globalThis ? globalThis : t || self)["vue-advanced-cropper"] = {}, t.Vue)
}(this, (function (t, e) {
    "use strict";

    function i(t) {
        return t && "object" == typeof t && "default" in t ? t : {
            default: t
        }
    }
    var n = i(e);

    function o(t, e, i) {
        return e in t ? Object.defineProperty(t, e, {
            value: i,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : t[e] = i, t
    }

    function s(t, e) {
        var i = Object.keys(t);
        if (Object.getOwnPropertySymbols) {
            var n = Object.getOwnPropertySymbols(t);
            e && (n = n.filter((function (e) {
                return Object.getOwnPropertyDescriptor(t, e).enumerable
            }))), i.push.apply(i, n)
        }
        return i
    }

    function r(t) {
        for (var e = 1; e < arguments.length; e++) {
            var i = null != arguments[e] ? arguments[e] : {};
            e % 2 ? s(Object(i), !0).forEach((function (e) {
                o(t, e, i[e])
            })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(t, Object.getOwnPropertyDescriptors(i)) : s(Object(i)).forEach((function (e) {
                Object.defineProperty(t, e, Object.getOwnPropertyDescriptor(i, e))
            }))
        }
        return t
    }

    function a(t, e) {
        if (null == t) return {};
        var i, n, o = function (t, e) {
            if (null == t) return {};
            var i, n, o = {},
                s = Object.keys(t);
            for (n = 0; n < s.length; n++) i = s[n], e.indexOf(i) >= 0 || (o[i] = t[i]);
            return o
        }(t, e);
        if (Object.getOwnPropertySymbols) {
            var s = Object.getOwnPropertySymbols(t);
            for (n = 0; n < s.length; n++) i = s[n], e.indexOf(i) >= 0 || Object.prototype.propertyIsEnumerable.call(t, i) && (o[i] = t[i])
        }
        return o
    }

    function h(t) {
        return function (t) {
            if (Array.isArray(t)) return c(t)
        }(t) || function (t) {
            if ("undefined" != typeof Symbol && Symbol.iterator in Object(t)) return Array.from(t)
        }(t) || function (t, e) {
            if (!t) return;
            if ("string" == typeof t) return c(t, e);
            var i = Object.prototype.toString.call(t).slice(8, -1);
            "Object" === i && t.constructor && (i = t.constructor.name);
            if ("Map" === i || "Set" === i) return Array.from(t);
            if ("Arguments" === i || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(i)) return c(t, e)
        }(t) || function () {
            throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function c(t, e) {
        (null == e || e > t.length) && (e = t.length);
        for (var i = 0, n = new Array(e); i < e; i++) n[i] = t[i];
        return n
    }
    var l = function (t, e, i) {
            return t(i = {
                path: e,
                exports: {},
                require: function (t, e) {
                    return function () {
                        throw new Error("Dynamic requires are not currently supported by @rollup/plugin-commonjs")
                    }(null == e && i.path)
                }
            }, i.exports), i.exports
        }((function (t) {
            /*!
                Copyright (c) 2017 Jed Watson.
                Licensed under the MIT License (MIT), see
                http://jedwatson.github.io/classnames
              */
            ! function () {
                var e = {}.hasOwnProperty;

                function i() {
                    for (var t = [], n = 0; n < arguments.length; n++) {
                        var o = arguments[n];
                        if (o) {
                            var s = typeof o;
                            if ("string" === s || "number" === s) t.push(o);
                            else if (Array.isArray(o) && o.length) {
                                var r = i.apply(null, o);
                                r && t.push(r)
                            } else if ("object" === s)
                                for (var a in o) e.call(o, a) && o[a] && t.push(a)
                        }
                    }
                    return t.join(" ")
                }
                t.exports ? (i.default = i, t.exports = i) : window.classNames = i
            }()
        })),
        d = function (t) {
            return function (e, i) {
                if (!e) return t;
                var n;
                "string" == typeof e ? n = e : i = e;
                var o = t;
                return n && (o += "__" + n), o + (i ? Object.keys(i).reduce((function (t, e) {
                    var n = i[e];
                    return n && (t += " " + ("boolean" == typeof n ? o + "--" + e : o + "--" + e + "_" + n)), t
                }), "") : "")
            }
        };

    function u(t, e, i) {
        var n, o, s, r, a;

        function h() {
            var c = Date.now() - r;
            c < e && c >= 0 ? n = setTimeout(h, e - c) : (n = null, i || (a = t.apply(s, o), s = o = null))
        }
        null == e && (e = 100);
        var c = function () {
            s = this, o = arguments, r = Date.now();
            var c = i && !n;
            return n || (n = setTimeout(h, e)), c && (a = t.apply(s, o), s = o = null), a
        };
        return c.clear = function () {
            n && (clearTimeout(n), n = null)
        }, c.flush = function () {
            n && (a = t.apply(s, o), s = o = null, clearTimeout(n), n = null)
        }, c
    }
    u.debounce = u;
    var f = u,
        p = function () {
            return (p = Object.assign || function (t) {
                for (var e, i = 1, n = arguments.length; i < n; i++)
                    for (var o in e = arguments[i]) Object.prototype.hasOwnProperty.call(e, o) && (t[o] = e[o]);
                return t
            }).apply(this, arguments)
        };
    /*! *****************************************************************************
      Copyright (c) Microsoft Corporation.

      Permission to use, copy, modify, and/or distribute this software for any
      purpose with or without fee is hereby granted.

      THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
      REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
      AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
      INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
      LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
      OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
      PERFORMANCE OF THIS SOFTWARE.
      ***************************************************************************** */
    function m(t, e) {
        var i, n;
        return t && e ? (i = "" + t + e[0].toUpperCase() + e.slice(1), n = t + "-" + e) : (i = t || e, n = t || e), {
            name: i,
            classname: n
        }
    }

    function g(t) {
        return /^data:/.test(t) || /^blob:/.test(t)
    }

    function v(t) {
        return !!(t && t.constructor && t.call && t.apply)
    }

    function b(t) {
        return void 0 === t
    }

    function w(t) {
        return "object" == typeof t && null !== t
    }

    function y(t, e, i) {
        var n = {};
        return w(t) ? (Object.keys(e).forEach((function (o) {
            b(t[o]) ? n[o] = e[o] : w(e[o]) ? w(t[o]) ? n[o] = y(t[o], e[o], i[o]) : n[o] = t[o] ? e[o] : i[o] : !0 === e[o] || !1 === e[o] ? n[o] = Boolean(t[o]) : n[o] = t[o]
        })), n) : t ? e : i
    }

    function z(t) {
        var e = Number(t);
        return Number.isNaN(e) ? t : e
    }

    function R(t) {
        return typeof ("number" == t || function (t) {
            return "object" == typeof t && null !== t
        }(t) && "[object Number]" == toString.call(t)) && !A(t)
    }

    function A(t) {
        return t != t
    }

    function x(t, e) {
        return Math.sqrt(Math.pow(t.x - e.x, 2) + Math.pow(t.y - e.y, 2))
    }
    var S = function (t, e) {
            void 0 === t && (t = {}), void 0 === e && (e = {}), this.type = "manipulateImage", this.move = t, this.scale = e
        },
        M = function (t, e) {
            void 0 === e && (e = {}), this.type = "resize", this.directions = t, this.params = e
        },
        C = function (t) {
            this.type = "move", this.directions = t
        },
        E = function () {
            function t(t, e, i, n, o) {
                this.type = "drag", this.nativeEvent = t, this.position = i, this.previousPosition = n, this.element = e, this.anchor = o
            }
            return t.prototype.shift = function () {
                var t = this,
                    e = t.element,
                    i = t.anchor,
                    n = t.position,
                    o = e.getBoundingClientRect(),
                    s = o.left,
                    r = o.top;
                return {
                    left: n.left - s - i.left,
                    top: n.top - r - i.top
                }
            }, t
        }();

    function W(t, e, i, n, o, s, r, a, h, c) {
        "boolean" != typeof r && (h = a, a = r, r = !1);
        const l = "function" == typeof i ? i.options : i;
        let d;
        if (t && t.render && (l.render = t.render, l.staticRenderFns = t.staticRenderFns, l._compiled = !0, o && (l.functional = !0)), n && (l._scopeId = n), s ? (d = function (t) {
                (t = t || this.$vnode && this.$vnode.ssrContext || this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) || "undefined" == typeof __VUE_SSR_CONTEXT__ || (t = __VUE_SSR_CONTEXT__), e && e.call(this, h(t)), t && t._registeredComponents && t._registeredComponents.add(s)
            }, l._ssrRegister = d) : e && (d = r ? function (t) {
                e.call(this, c(t, this.$root.$options.shadowRoot))
            } : function (t) {
                e.call(this, a(t))
            }), d)
            if (l.functional) {
                const t = l.render;
                l.render = function (e, i) {
                    return d.call(i), t(e, i)
                }
            } else {
                const t = l.beforeCreate;
                l.beforeCreate = t ? [].concat(t, d) : [d]
            } return i
    }
    var T = W({
            render: function () {
                var t = this,
                    e = t.$createElement;
                return (t._self._c || e)("div", {
                    ref: "draggable",
                    class: t.classname,
                    on: {
                        touchstart: t.onTouchStart,
                        mousedown: t.onMouseDown,
                        mouseover: t.onMouseOver,
                        mouseleave: t.onMouseLeave
                    }
                }, [t._t("default")], 2)
            },
            staticRenderFns: []
        }, undefined, {
            name: "DraggableElement",
            mixins: [{
                beforeMount: function () {
                    window.addEventListener("mouseup", this.onMouseUp, {
                        passive: !1
                    }), window.addEventListener("mousemove", this.onMouseMove, {
                        passive: !1
                    }), window.addEventListener("touchmove", this.onTouchMove, {
                        passive: !1
                    }), window.addEventListener("touchend", this.onTouchEnd, {
                        passive: !1
                    })
                },
                beforeDestroy: function () {
                    window.removeEventListener("mouseup", this.onMouseUp), window.removeEventListener("mousemove", this.onMouseMove), window.removeEventListener("touchmove", this.onTouchMove), window.removeEventListener("touchend", this.onTouchEnd)
                },
                mounted: function () {
                    if (!this.$refs.draggable) throw new Error('You should add ref "draggable" to your root element to use draggable mixin');
                    this.touches = [], this.hovered = !1
                },
                methods: {
                    onMouseOver: function () {
                        this.hovered || (this.hovered = !0, this.$emit("enter"))
                    },
                    onMouseLeave: function () {
                        this.hovered && !this.touches.length && (this.hovered = !1, this.$emit("leave"))
                    },
                    onTouchStart: function (t) {
                        t.cancelable && !this.disabled && 1 === t.touches.length && (this.touches = h(t.touches), this.hovered || (this.$emit("enter"), this.hovered = !0), t.touches.length && this.initAnchor(this.touches.reduce((function (e, i) {
                            return {
                                clientX: e.clientX + i.clientX / t.touches.length,
                                clientY: e.clientY + i.clientY / t.touches.length
                            }
                        }), {
                            clientX: 0,
                            clientY: 0
                        })), t.preventDefault && t.preventDefault(), t.stopPropagation())
                    },
                    onTouchEnd: function () {
                        this.processEnd()
                    },
                    onTouchMove: function (t) {
                        this.touches.length && (this.processMove(t, t.touches), t.preventDefault && t.preventDefault(), t.stopPropagation && t.stopPropagation())
                    },
                    onMouseDown: function (t) {
                        if (!this.disabled) {
                            var e = {
                                fake: !0,
                                clientX: t.clientX,
                                clientY: t.clientY
                            };
                            this.touches = [e], this.initAnchor(e), t.stopPropagation()
                        }
                    },
                    onMouseMove: function (t) {
                        this.touches.length && (this.processMove(t, [{
                            fake: !0,
                            clientX: t.clientX,
                            clientY: t.clientY
                        }]), t.preventDefault && t.preventDefault())
                    },
                    onMouseUp: function () {
                        this.processEnd()
                    },
                    initAnchor: function (t) {
                        var e = this.$refs.draggable.getBoundingClientRect(),
                            i = e.left,
                            n = e.right,
                            o = e.bottom,
                            s = e.top;
                        this.anchor = {
                            left: t.clientX - i,
                            top: t.clientY - s,
                            bottom: o - t.clientY,
                            right: n - t.clientX
                        }
                    },
                    processMove: function (t, e) {
                        var i = h(e);
                        if (this.touches.length) {
                            if (1 === this.touches.length && 1 === i.length) {
                                var n = this.$refs.draggable;
                                this.$emit("drag", new E(t, n, {
                                    left: i[0].clientX,
                                    top: i[0].clientY
                                }, {
                                    left: this.touches[0].clientX,
                                    top: this.touches[0].clientY
                                }, this.anchor))
                            }
                            this.touches = i
                        }
                    },
                    processEnd: function () {
                        this.touches.length && this.$emit("drag-end"), this.hovered && (this.$emit("leave"), this.hovered = !1), this.touches = []
                    }
                }
            }],
            props: {
                classname: {
                    type: String
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0),
        O = d("vue-handler-wrapper"),
        D = W({
            render: function () {
                var t = this,
                    e = t.$createElement,
                    i = t._self._c || e;
                return i("div", {
                    class: t.classes.root
                }, [i("DraggableElement", {
                    class: t.classes.draggable,
                    attrs: {
                        disabled: t.disabled
                    },
                    on: {
                        drag: function (e) {
                            return t.$emit("drag", e)
                        },
                        "drag-end": function (e) {
                            return t.$emit("drag-end")
                        },
                        leave: function (e) {
                            return t.$emit("leave")
                        },
                        enter: function (e) {
                            return t.$emit("enter")
                        }
                    }
                }, [t._t("default")], 2)], 1)
            },
            staticRenderFns: []
        }, undefined, {
            name: "HandlerWrapper",
            components: {
                DraggableElement: T
            },
            props: {
                horizontalPosition: {
                    type: String
                },
                verticalPosition: {
                    type: String
                },
                disabled: {
                    type: Boolean,
                    default: !1
                }
            },
            computed: {
                classes: function () {
                    var t;
                    if (this.horizontalPosition || this.verticalPosition) {
                        var e, i = m(this.horizontalPosition, this.verticalPosition);
                        t = l(this.classname, O((o(e = {}, i.classname, !0), o(e, "disabled", this.disabled), e)))
                    } else t = l(this.classname, O({
                        disabled: this.disabled
                    }));
                    return {
                        root: t,
                        draggable: O("draggable")
                    }
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0),
        P = d("vue-line-wrapper"),
        $ = W({
            render: function () {
                var t = this,
                    e = t.$createElement;
                return (t._self._c || e)("DraggableElement", {
                    class: t.classname,
                    attrs: {
                        disabled: t.disabled
                    },
                    on: {
                        drag: function (e) {
                            return t.$emit("drag", e)
                        },
                        "drag-end": function (e) {
                            return t.$emit("drag-end")
                        },
                        leave: function (e) {
                            return t.$emit("leave")
                        },
                        enter: function (e) {
                            return t.$emit("enter")
                        }
                    }
                }, [t._t("default")], 2)
            },
            staticRenderFns: []
        }, undefined, {
            name: "LineWrapper",
            components: {
                DraggableElement: T
            },
            props: {
                position: {
                    type: String,
                    required: !0
                },
                disabled: {
                    type: Boolean,
                    default: !1
                }
            },
            computed: {
                classname: function () {
                    var t;
                    return P((o(t = {}, this.position, !0), o(t, "disabled", this.disabled), t))
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0),
        H = ["left", "right", "top", "bottom"],
        j = ["left", "right"],
        I = ["top", "bottom"],
        L = ["left", "top"],
        B = ["fill-area", "fit-area", "stencil", "none"],
        _ = {
            left: 0,
            top: 0,
            width: 0,
            height: 0
        };

    function F(t, e, i) {
        return !(i = i || ["width", "height", "left", "top"]).some((function (i) {
            return t[i] !== e[i]
        }))
    }

    function X(t) {
        return {
            left: t.left,
            top: t.top,
            right: t.left + t.width,
            bottom: t.top + t.height
        }
    }

    function Y(t, e) {
        return {
            left: t.left - e.left,
            top: t.top - e.top
        }
    }

    function N(t) {
        return {
            left: t.left + t.width / 2,
            top: t.top + t.height / 2
        }
    }

    function k(t, e) {
        var i = {
            left: 0,
            top: 0,
            right: 0,
            bottom: 0
        };
        return H.forEach((function (n) {
            var o = e[n],
                s = X(t)[n];
            i[n] = void 0 !== o && void 0 !== s ? "left" === n || "top" === n ? Math.max(0, o - s) : Math.max(0, s - o) : 0
        })), i
    }

    function U(t, e) {
        return {
            left: t.left - e.left,
            top: t.top - e.top,
            width: t.width + e.left + e.right,
            height: t.height + e.top + e.bottom
        }
    }

    function Z(t) {
        return {
            left: -t.left,
            top: -t.top
        }
    }

    function V(t, e) {
        return p(p({}, t), {
            left: t.left + e.left,
            top: t.top + e.top
        })
    }

    function q(t, e, i, n) {
        if (1 !== e) {
            if (i) {
                var o = N(t);
                return {
                    width: t.width * e,
                    height: t.height * e,
                    left: t.left + t.width * (1 - e) / 2 + (i.left - o.left) * (n || 1 - e),
                    top: t.top + t.height * (1 - e) / 2 + (i.top - o.top) * (n || 1 - e)
                }
            }
            return {
                width: t.width * e,
                height: t.height * e,
                left: t.left + t.width * (1 - e) / 2,
                top: t.top + t.height * (1 - e) / 2
            }
        }
        return t
    }

    function G(t) {
        return t.width / t.height
    }

    function K(t, e) {
        return Math.min(void 0 !== e.right && void 0 !== e.left ? (e.right - e.left) / t.width : 1 / 0, void 0 !== e.bottom && void 0 !== e.top ? (e.bottom - e.top) / t.height : 1 / 0)
    }

    function J(t, e) {
        var i = {
                left: 0,
                top: 0
            },
            n = k(t, e);
        return n.left && n.left > 0 ? i.left = n.left : n.right && n.right > 0 && (i.left = -n.right), n.top && n.top > 0 ? i.top = n.top : n.bottom && n.bottom > 0 && (i.top = -n.bottom), i
    }

    function Q(t, e) {
        var i;
        return e.minimum && t < e.minimum ? i = e.minimum : e.maximum && t > e.maximum && (i = e.maximum), i
    }

    function tt(t, e) {
        var i = G(t),
            n = G(e);
        return e.width < 1 / 0 && e.height < 1 / 0 ? i > n ? {
            width: e.width,
            height: e.width / i
        } : {
            width: e.height * i,
            height: e.height
        } : e.width < 1 / 0 ? {
            width: e.width,
            height: e.width / i
        } : e.height < 1 / 0 ? {
            width: e.height * i,
            height: e.height
        } : t
    }

    function et(t, e) {
        var i = e * Math.PI / 180;
        return {
            width: Math.abs(t.width * Math.cos(i)) + Math.abs(t.height * Math.sin(i)),
            height: Math.abs(t.width * Math.sin(i)) + Math.abs(t.height * Math.cos(i))
        }
    }

    function it(t, e) {
        var i = e * Math.PI / 180;
        return {
            left: t.left * Math.cos(i) - t.top * Math.sin(i),
            top: t.left * Math.sin(i) + t.top * Math.cos(i)
        }
    }

    function nt(t, e) {
        var i = k(ot(t, e), e);
        return i.left + i.right + i.top + i.bottom ? i.left + i.right > i.top + i.bottom ? Math.min((t.width + i.left + i.right) / t.width, K(t, e)) : Math.min((t.height + i.top + i.bottom) / t.height, K(t, e)) : 1
    }

    function ot(t, e, i) {
        void 0 === i && (i = !1);
        var n = J(t, e);
        return V(t, i ? Z(n) : n)
    }

    function st(t) {
        return {
            width: void 0 !== t.right && void 0 !== t.left ? t.right - t.left : 1 / 0,
            height: void 0 !== t.bottom && void 0 !== t.top ? t.bottom - t.top : 1 / 0
        }
    }

    function rt(t, e) {
        return p(p({}, t), {
            minWidth: Math.min(e.width, t.minWidth),
            minHeight: Math.min(e.height, t.minHeight),
            maxWidth: Math.min(e.width, t.maxWidth),
            maxHeight: Math.min(e.height, t.maxHeight)
        })
    }

    function at(t, e, i) {
        void 0 === i && (i = !0);
        var n = {};
        return H.forEach((function (o) {
            var s = t[o],
                r = e[o];
            void 0 !== s && void 0 !== r ? n[o] = "left" === o || "top" === o ? i ? Math.max(s, r) : Math.min(s, r) : i ? Math.min(s, r) : Math.max(s, r) : void 0 !== r ? n[o] = r : void 0 !== s && (n[o] = s)
        })), n
    }

    function ht(t, e) {
        return at(t, e, !0)
    }

    function ct(t) {
        var e = t.size,
            i = t.aspectRatio,
            n = t.ignoreMinimum,
            o = t.sizeRestrictions;
        return Boolean((e.correctRatio || G(e) >= i.minimum && G(e) <= i.maximum) && e.height <= o.maxHeight && e.width <= o.maxWidth && e.width && e.height && (n || e.height >= o.minHeight && e.width >= o.minWidth))
    }

    function lt(t, e) {
        return Math.pow(t.width - e.width, 2) + Math.pow(t.height - e.height, 2)
    }

    function dt(t) {
        var e = t.width,
            i = t.height,
            n = t.sizeRestrictions,
            o = {
                minimum: t.aspectRatio && t.aspectRatio.minimum || 0,
                maximum: t.aspectRatio && t.aspectRatio.maximum || 1 / 0
            },
            s = {
                width: Math.max(n.minWidth, Math.min(n.maxWidth, e)),
                height: Math.max(n.minHeight, Math.min(n.maxHeight, i))
            };

        function r(t, s) {
            return void 0 === s && (s = !1), t.reduce((function (t, r) {
                return ct({
                    size: r,
                    aspectRatio: o,
                    sizeRestrictions: n,
                    ignoreMinimum: s
                }) && (!t || lt(r, {
                    width: e,
                    height: i
                }) < lt(t, {
                    width: e,
                    height: i
                })) ? r : t
            }), null)
        }
        var a = [];
        o && [o.minimum, o.maximum].forEach((function (t) {
            t && a.push({
                width: s.width,
                height: s.width / t,
                correctRatio: !0
            }, {
                width: s.height * t,
                height: s.height,
                correctRatio: !0
            })
        })), ct({
            size: s,
            aspectRatio: o,
            sizeRestrictions: n
        }) && a.push(s);
        var h = r(a) || r(a, !0);
        return h && {
            width: h.width,
            height: h.height
        }
    }

    function ut(t) {
        var e = t.event,
            i = t.coordinates,
            n = t.positionRestrictions,
            o = void 0 === n ? {} : n,
            s = V(i, e.directions);
        return V(s, J(s, o))
    }

    function ft(t) {
        var e = t.coordinates,
            i = t.transform,
            n = t.imageSize,
            o = t.sizeRestrictions,
            s = t.positionRestrictions,
            r = t.aspectRatio,
            a = t.visibleArea,
            h = function (t, e) {
                return ut({
                    coordinates: t,
                    positionRestrictions: s,
                    event: new C({
                        left: e.left - t.left,
                        top: e.top - t.top
                    })
                })
            },
            c = p({}, e);
        return (Array.isArray(i) ? i : [i]).forEach((function (t) {
            var e = {};
            b((e = "function" == typeof t ? t({
                coordinates: c,
                imageSize: n,
                visibleArea: a
            }) : t).width) && b(e.height) || (c = function (t, e) {
                var i = p(p(p({}, t), dt({
                    width: e.width,
                    height: e.height,
                    sizeRestrictions: o,
                    aspectRatio: r
                })), {
                    left: 0,
                    top: 0
                });
                return h(i, {
                    left: t.left,
                    top: t.top
                })
            }(c, p(p({}, c), e))), b(e.left) && b(e.top) || (c = h(c, p(p({}, c), e)))
        })), c
    }

    function pt(t) {
        t.event;
        var e, i, n, o = t.getAreaRestrictions,
            s = t.boundaries,
            r = t.coordinates,
            a = t.visibleArea,
            h = (t.aspectRatio, t.stencilSize),
            c = t.sizeRestrictions,
            l = t.positionRestrictions,
            d = (t.stencilReference, p({}, r)),
            u = p({}, a),
            f = p({}, h);
        e = G(f), i = G(d), void 0 === n && (n = .001), (0 === e || 0 === i ? Math.abs(i - e) < n : Math.abs(i / e) < 1 + n && Math.abs(i / e) > 1 - n) || (d = p(p({}, d), dt({
            sizeRestrictions: c,
            width: d.width,
            height: d.height,
            aspectRatio: {
                minimum: G(f),
                maximum: G(f)
            }
        })));
        var m = nt(u = q(u, d.width * s.width / (u.width * f.width)), o({
            visibleArea: u,
            type: "resize"
        }));
        return 1 !== m && (u = q(u, m), d = q(d, m)), u = ot(u = V(u, Y(N(d), N(u))), o({
            visibleArea: u,
            type: "move"
        })), {
            coordinates: d = ot(d, ht(X(u), l)),
            visibleArea: u
        }
    }

    function mt(t) {
        var e = t.event,
            i = t.getAreaRestrictions,
            n = t.boundaries,
            o = t.coordinates,
            s = t.visibleArea,
            r = (t.aspectRatio, t.stencilSize, t.sizeRestrictions, t.positionRestrictions),
            a = (t.stencilReference, p({}, o)),
            h = p({}, s);
        if (o && s && "manipulateImage" !== e.type) {
            var c = {
                width: 0,
                height: 0
            };
            h.width, n.width;
            G(n) > G(a) ? (c.height = .8 * n.height, c.width = c.height * G(a)) : (c.width = .8 * n.width, c.height = c.width * G(a));
            var l = nt(h = q(h, a.width * n.width / (h.width * c.width)), i({
                visibleArea: h,
                type: "resize"
            }));
            h = q(h, l), 1 !== l && (c.height /= l, c.width /= l), h = ot(h = V(h, Y(N(a), N(h))), i({
                visibleArea: h,
                type: "move"
            })), a = ot(a, ht(X(h), r))
        }
        return {
            coordinates: a,
            visibleArea: h
        }
    }

    function gt(t) {
        var e = t.event,
            i = t.coordinates,
            n = t.visibleArea,
            o = t.getAreaRestrictions,
            s = p({}, n),
            r = p({}, i);
        if ("setCoordinates" === e.type) {
            var a = Math.max(0, r.width - s.width),
                h = Math.max(0, r.height - s.height);
            a > h ? s = q(s, Math.min(r.width / s.width, K(s, o({
                visibleArea: s,
                type: "resize"
            })))) : h > a && (s = q(s, Math.min(r.height / s.height, K(s, o({
                visibleArea: s,
                type: "resize"
            }))))), s = ot(s = V(s, Z(J(r, X(s)))), o({
                visibleArea: s,
                type: "move"
            }))
        }
        return {
            visibleArea: s,
            coordinates: r
        }
    }

    function vt(t) {
        var e = t.imageSize,
            i = t.visibleArea,
            n = t.aspectRatio,
            o = t.sizeRestrictions,
            s = i || e,
            r = Math.min(n.maximum || 1 / 0, Math.max(n.minimum || 0, G(s))),
            a = s.width < s.height ? {
                width: .8 * s.width,
                height: .8 * s.width / r
            } : {
                height: .8 * s.height,
                width: .8 * s.height * r
            };
        return dt(p(p({}, a), {
            aspectRatio: n,
            sizeRestrictions: o
        }))
    }

    function bt(t) {
        var e, i, n = t.imageSize,
            o = t.visibleArea,
            s = t.boundaries,
            r = t.aspectRatio,
            a = t.sizeRestrictions,
            h = t.stencilSize,
            c = o || n;
        return G(c) > G(s) ? i = (e = h.height * c.height / s.height) * G(h) : e = (i = h.width * c.width / s.width) / G(h), dt({
            width: i,
            height: e,
            aspectRatio: r,
            sizeRestrictions: a
        })
    }

    function wt(t, e) {
        return at(t, X(e))
    }

    function yt(t) {
        var e = t.event,
            i = t.coordinates,
            n = t.visibleArea,
            o = t.sizeRestrictions,
            s = t.getAreaRestrictions,
            r = t.positionRestrictions,
            a = t.adjustStencil,
            h = e.scale,
            c = e.move,
            l = p({}, n),
            d = p({}, i),
            u = 1,
            f = 1,
            m = h.factor && Math.abs(h.factor - 1) > .001;
        l = V(l, {
            left: c.left || 0,
            top: c.top || 0
        });
        var g = {
            stencil: {
                minimum: Math.max(o.minWidth ? o.minWidth / d.width : 0, o.minHeight ? o.minHeight / d.height : 0),
                maximum: Math.min(o.maxWidth ? o.maxWidth / d.width : 1 / 0, o.maxHeight ? o.maxHeight / d.height : 1 / 0, K(d, r))
            },
            area: {
                maximum: K(l, s({
                    visibleArea: l,
                    type: "resize"
                }))
            }
        };
        h.factor && m && (h.factor < 1 ? (f = Math.max(h.factor, g.stencil.minimum)) > 1 && (f = 1) : h.factor > 1 && (f = Math.min(h.factor, Math.min(g.area.maximum, g.stencil.maximum))) < 1 && (f = 1)), f && (l = q(l, f, h.center));
        var v = i.left - n.left,
            b = n.width + n.left - (i.width + i.left),
            w = i.top - n.top,
            y = n.height + n.top - (i.height + i.top);
        return l = ot(l = V(l, J(l, {
            left: void 0 !== r.left ? r.left - v * f : void 0,
            top: void 0 !== r.top ? r.top - w * f : void 0,
            bottom: void 0 !== r.bottom ? r.bottom + y * f : void 0,
            right: void 0 !== r.right ? r.right + b * f : void 0
        })), s({
            visibleArea: l,
            type: "move"
        })), d.width = d.width * f, d.height = d.height * f, d.left = l.left + v * f, d.top = l.top + w * f, d = ot(d, ht(X(l), r)), h.factor && m && a && (h.factor > 1 ? u = Math.min(g.area.maximum, h.factor) / f : h.factor < 1 && (u = Math.max(d.height / l.height, h.factor / f)), 1 !== u && (l = V(l = ot(l = q(l, u, h.factor > 1 ? h.center : N(d)), s({
            visibleArea: l,
            type: "move"
        })), Z(J(d, X(l)))))), {
            coordinates: d,
            visibleArea: l
        }
    }

    function zt(t) {
        var e = t.aspectRatio,
            i = t.getAreaRestrictions,
            n = t.coordinates,
            o = t.visibleArea,
            s = t.sizeRestrictions,
            r = t.positionRestrictions,
            a = t.imageSize,
            h = t.previousImageSize,
            c = t.angle,
            l = p({}, n),
            d = p({}, o),
            u = it(N(p({
                left: 0,
                top: 0
            }, h)), c);
        return (l = p(p({}, dt({
            sizeRestrictions: s,
            aspectRatio: e,
            width: l.width,
            height: l.height
        })), it(N(l), c))).left -= u.left - a.width / 2 + l.width / 2, l.top -= u.top - a.height / 2 + l.height / 2, d = q(d, nt(d, i({
            visibleArea: d,
            type: "resize"
        }))), {
            coordinates: l = ot(l, r),
            visibleArea: d = ot(d = V(d, Y(N(l), N(n))), i({
                visibleArea: d,
                type: "move"
            }))
        }
    }

    function Rt(t) {
        var e = t.flip,
            i = t.previousFlip,
            n = t.rotate,
            o = (t.aspectRatio, t.getAreaRestrictions),
            s = t.coordinates,
            r = t.visibleArea,
            a = t.imageSize,
            h = p({}, s),
            c = p({}, r),
            l = i.horizontal !== e.horizontal,
            d = i.vertical !== e.vertical;
        if (l || d) {
            var u = it({
                    left: a.width / 2,
                    top: a.height / 2
                }, -n),
                f = it(N(h), -n),
                m = it({
                    left: l ? u.left - (f.left - u.left) : f.left,
                    top: d ? u.top - (f.top - u.top) : f.top
                }, n);
            h = V(h, Y(m, N(h))), f = it(N(c), -n), c = ot(c = V(c, Y(m = it({
                left: l ? u.left - (f.left - u.left) : f.left,
                top: d ? u.top - (f.top - u.top) : f.top
            }, n), N(c))), o({
                visibleArea: c,
                type: "move"
            }))
        }
        return {
            coordinates: h,
            visibleArea: c
        }
    }

    function At(t) {
        var e = t.directions,
            i = t.coordinates,
            n = t.positionRestrictions,
            o = void 0 === n ? {} : n,
            s = t.sizeRestrictions,
            r = t.preserveRatio,
            a = t.compensate,
            h = p({}, e),
            c = U(i, h).width,
            l = U(i, h).height;
        c < 0 && (h.left < 0 && h.right < 0 ? (h.left = -(i.width - s.minWidth) / (h.left / h.right), h.right = -(i.width - s.minWidth) / (h.right / h.left)) : h.left < 0 ? h.left = -(i.width - s.minWidth) : h.right < 0 && (h.right = -(i.width - s.minWidth))), l < 0 && (h.top < 0 && h.bottom < 0 ? (h.top = -(i.height - s.minHeight) / (h.top / h.bottom), h.bottom = -(i.height - s.minHeight) / (h.bottom / h.top)) : h.top < 0 ? h.top = -(i.height - s.minHeight) : h.bottom < 0 && (h.bottom = -(i.height - s.minHeight)));
        var d = k(U(i, h), o);
        a && (d.left && d.left > 0 && 0 === d.right ? (h.right += d.left, h.left -= d.left) : d.right && d.right > 0 && 0 === d.left && (h.left += d.right, h.right -= d.right), d.top && d.top > 0 && 0 === d.bottom ? (h.bottom += d.top, h.top -= d.top) : d.bottom && d.bottom > 0 && 0 === d.top && (h.top += d.bottom, h.bottom -= d.bottom), d = k(U(i, h), o));
        var u = {
            width: 1 / 0,
            height: 1 / 0,
            left: 1 / 0,
            right: 1 / 0,
            top: 1 / 0,
            bottom: 1 / 0
        };
        if (H.forEach((function (t) {
                var e = d[t];
                e && h[t] && (u[t] = Math.max(0, 1 - e / h[t]))
            })), r) {
            var f = Math.min.apply(Math, H.map((function (t) {
                return u[t]
            })));
            f !== 1 / 0 && H.forEach((function (t) {
                h[t] *= f
            }))
        } else H.forEach((function (t) {
            u[t] !== 1 / 0 && (h[t] *= u[t])
        }));
        if (c = U(i, h).width, l = U(i, h).height, h.right + h.left && (c > s.maxWidth ? u.width = (s.maxWidth - i.width) / (h.right + h.left) : c < s.minWidth && (u.width = (s.minWidth - i.width) / (h.right + h.left))), h.bottom + h.top && (l > s.maxHeight ? u.height = (s.maxHeight - i.height) / (h.bottom + h.top) : l < s.minHeight && (u.height = (s.minHeight - i.height) / (h.bottom + h.top))), r) {
            var m = Math.min(u.width, u.height);
            m !== 1 / 0 && H.forEach((function (t) {
                h[t] *= m
            }))
        } else u.width !== 1 / 0 && j.forEach((function (t) {
            h[t] *= u.width
        })), u.height !== 1 / 0 && I.forEach((function (t) {
            h[t] *= u.height
        }));
        return h
    }

    function xt(t, e, i) {
        return 0 == e && 0 == i ? t / 2 : 0 == e ? 0 : 0 == i ? t : t * Math.abs(e / (e + i))
    }
    var St = d("vue-simple-handler"),
        Mt = d("vue-simple-handler-wrapper"),
        Ct = W({
            render: function () {
                var t = this,
                    e = t.$createElement,
                    i = t._self._c || e;
                return i("HandlerWrapper", {
                    class: t.classes.wrapper,
                    attrs: {
                        "vertical-position": t.verticalPosition,
                        "horizontal-position": t.horizontalPosition,
                        disabled: t.disabled
                    },
                    on: {
                        drag: t.onDrag,
                        "drag-end": t.onDragEnd,
                        enter: t.onEnter,
                        leave: t.onLeave
                    }
                }, [i("div", {
                    class: t.classes.default
                })])
            },
            staticRenderFns: []
        }, undefined, {
            name: "SimpleHandler",
            components: {
                HandlerWrapper: D
            },
            props: {
                defaultClass: {
                    type: String
                },
                hoverClass: {
                    type: String
                },
                wrapperClass: {
                    type: String
                },
                horizontalPosition: {
                    type: String
                },
                verticalPosition: {
                    type: String
                },
                disabled: {
                    type: Boolean,
                    default: !1
                }
            },
            data: function () {
                return {
                    hover: !1
                }
            },
            computed: {
                classes: function () {
                    var t, e = (o(t = {}, this.horizontalPosition, Boolean(this.horizontalPosition)), o(t, this.verticalPosition, Boolean(this.verticalPosition)), o(t, "".concat(this.horizontalPosition, "-").concat(this.verticalPosition), Boolean(this.verticalPosition && this.horizontalPosition)), o(t, "hover", this.hover), t);
                    return {
                        default: l(St(e), this.defaultClass, this.hover && this.hoverClass),
                        wrapper: l(Mt(e), this.wrapperClass)
                    }
                }
            },
            methods: {
                onDrag: function (t) {
                    this.$emit("drag", t)
                },
                onEnter: function () {
                    this.hover = !0
                },
                onLeave: function () {
                    this.hover = !1
                },
                onDragEnd: function () {
                    this.$emit("drag-end")
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0),
        Et = d("vue-simple-line"),
        Wt = d("vue-simple-line-wrapper"),
        Tt = W({
            render: function () {
                var t = this,
                    e = t.$createElement,
                    i = t._self._c || e;
                return i("LineWrapper", {
                    class: t.classes.wrapper,
                    attrs: {
                        position: t.position,
                        disabled: t.disabled
                    },
                    on: {
                        drag: t.onDrag,
                        "drag-end": t.onDragEnd,
                        enter: t.onEnter,
                        leave: t.onLeave
                    }
                }, [i("div", {
                    class: t.classes.root
                })])
            },
            staticRenderFns: []
        }, undefined, {
            name: "SimpleLine",
            components: {
                LineWrapper: $
            },
            props: {
                defaultClass: {
                    type: String
                },
                hoverClass: {
                    type: String
                },
                wrapperClass: {
                    type: String
                },
                position: {
                    type: String
                },
                disabled: {
                    type: Boolean,
                    default: !1
                }
            },
            data: function () {
                return {
                    hover: !1
                }
            },
            computed: {
                classes: function () {
                    return {
                        root: l(Et(o({}, this.position, !0)), this.defaultClass, this.hover && this.hoverClass),
                        wrapper: l(Wt(o({}, this.position, !0)), this.wrapperClass)
                    }
                }
            },
            methods: {
                onDrag: function (t) {
                    this.$emit("drag", t)
                },
                onEnter: function () {
                    this.hover = !0
                },
                onLeave: function () {
                    this.hover = !1
                },
                onDragEnd: function () {
                    this.$emit("drag-end")
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0),
        Ot = d("vue-bounding-box"),
        Dt = ["east", "west", null],
        Pt = ["south", "north", null],
        $t = W({
            render: function () {
                var t = this,
                    e = t.$createElement,
                    i = t._self._c || e;
                return i("div", {
                    ref: "box",
                    class: t.classes.root
                }, [t._t("default"), t._v(" "), i("div", t._l(t.lineNodes, (function (e) {
                    return i(e.component, {
                        key: e.name,
                        tag: "component",
                        attrs: {
                            "default-class": e.class,
                            "hover-class": e.hoverClass,
                            "wrapper-class": e.wrapperClass,
                            position: e.name,
                            disabled: e.disabled
                        },
                        on: {
                            drag: function (i) {
                                return t.onHandlerDrag(i, e.horizontalDirection, e.verticalDirection)
                            },
                            "drag-end": function (e) {
                                return t.onEnd()
                            }
                        }
                    })
                })), 1), t._v(" "), i("div", t._l(t.handlerNodes, (function (e) {
                    return i(e.component, {
                        key: e.name,
                        tag: "component",
                        attrs: {
                            "default-class": e.class,
                            "hover-class": e.hoverClass,
                            "wrapper-class": e.wrapperClass,
                            "horizontal-position": e.horizontalDirection,
                            "vertical-position": e.verticalDirection,
                            disabled: e.disabled
                        },
                        on: {
                            drag: function (i) {
                                return t.onHandlerDrag(i, e.horizontalDirection, e.verticalDirection)
                            },
                            "drag-end": function (e) {
                                return t.onEnd()
                            }
                        }
                    })
                })), 1)], 2)
            },
            staticRenderFns: []
        }, undefined, {
            name: "BoundingBox",
            props: {
                handlers: {
                    type: Object,
                    default: function () {
                        return {
                            eastNorth: !0,
                            north: !0,
                            westNorth: !0,
                            west: !0,
                            westSouth: !0,
                            south: !0,
                            eastSouth: !0,
                            east: !0
                        }
                    }
                },
                handlersComponent: {
                    type: [Object, String],
                    default: function () {
                        return Ct
                    }
                },
                handlersClasses: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                },
                handlersWrappersClasses: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                },
                lines: {
                    type: Object,
                    default: function () {
                        return {
                            west: !0,
                            north: !0,
                            east: !0,
                            south: !0
                        }
                    }
                },
                linesComponent: {
                    type: [Object, String],
                    default: function () {
                        return Tt
                    }
                },
                linesClasses: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                },
                linesWrappersClasses: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                },
                resizable: {
                    type: Boolean,
                    default: !0
                }
            },
            data: function () {
                var t = [];
                return Dt.forEach((function (e) {
                    Pt.forEach((function (i) {
                        if (e !== i) {
                            var n = m(e, i),
                                o = n.name,
                                s = n.classname;
                            t.push({
                                name: o,
                                classname: s,
                                verticalDirection: i,
                                horizontalDirection: e
                            })
                        }
                    }))
                })), {
                    points: t
                }
            },
            computed: {
                classes: function () {
                    var t = this.handlersClasses,
                        e = this.handlersWrappersClasses,
                        i = this.linesClasses,
                        n = this.linesWrappersClasses;
                    return {
                        root: Ot(),
                        handlers: t,
                        handlersWrappers: e,
                        lines: i,
                        linesWrappers: n
                    }
                },
                lineNodes: function () {
                    var t = this,
                        e = [];
                    return this.points.forEach((function (i) {
                        i.horizontalDirection && i.verticalDirection || !t.lines[i.name] || e.push({
                            name: i.name,
                            component: t.linesComponent,
                            class: l(t.classes.lines.default, t.classes.lines[i.name], !t.resizable && t.classes.lines.disabled),
                            wrapperClass: l(t.classes.linesWrappers.default, t.classes.linesWrappers[i.name], !t.resizable && t.classes.linesWrappers.disabled),
                            hoverClass: t.classes.lines.hover,
                            verticalDirection: i.verticalDirection,
                            horizontalDirection: i.horizontalDirection,
                            disabled: !t.resizable
                        })
                    })), e
                },
                handlerNodes: function () {
                    var t = this,
                        e = [];
                    return this.points.forEach((function (i) {
                        t.handlers[i.name] && e.push({
                            name: i.name,
                            component: t.handlersComponent,
                            class: l(t.classes.handlers.default, t.classes.handlers[i.name]),
                            wrapperClass: l(t.classes.handlersWrappers.default, t.classes.handlersWrappers[i.name]),
                            hoverClass: t.classes.handlers.hover,
                            verticalDirection: i.verticalDirection,
                            horizontalDirection: i.horizontalDirection,
                            disabled: !t.resizable
                        })
                    })), e
                }
            },
            beforeMount: function () {
                window.addEventListener("mouseup", this.onMouseUp, {
                    passive: !1
                }), window.addEventListener("mousemove", this.onMouseMove, {
                    passive: !1
                }), window.addEventListener("touchmove", this.onTouchMove, {
                    passive: !1
                }), window.addEventListener("touchend", this.onTouchEnd, {
                    passive: !1
                })
            },
            beforeDestroy: function () {
                window.removeEventListener("mouseup", this.onMouseUp), window.removeEventListener("mousemove", this.onMouseMove), window.removeEventListener("touchmove", this.onTouchMove), window.removeEventListener("touchend", this.onTouchEnd)
            },
            mounted: function () {
                this.touches = []
            },
            methods: {
                onEnd: function () {
                    this.$emit("resize-end")
                },
                onHandlerDrag: function (t, e, i) {
                    var n, o = t.shift(),
                        s = o.left,
                        r = o.top,
                        a = {
                            left: 0,
                            right: 0,
                            top: 0,
                            bottom: 0
                        };
                    "west" === e ? a.left -= s : "east" === e && (a.right += s), "north" === i ? a.top -= r : "south" === i && (a.bottom += r), !i && e ? n = "width" : i && !e && (n = "height"), this.resizable && this.$emit("resize", new M(a, {
                        allowedDirections: {
                            left: "west" === e || !e,
                            right: "east" === e || !e,
                            bottom: "south" === i || !i,
                            top: "north" === i || !i
                        },
                        preserveAspectRatio: t.nativeEvent && t.nativeEvent.shiftKey,
                        respectDirection: n
                    }))
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0),
        Ht = function (t, e) {
            void 0 === t && (t = {}), void 0 === e && (e = {}), this.type = "manipulateImage", this.move = t, this.scale = e
        },
        jt = function (t) {
            this.type = "move", this.directions = t
        },
        It = d("vue-draggable-area"),
        Lt = W({
            render: function () {
                var t = this,
                    e = t.$createElement;
                return (t._self._c || e)("div", {
                    ref: "container",
                    on: {
                        touchstart: t.onTouchStart,
                        mousedown: t.onMouseDown
                    }
                }, [t._t("default")], 2)
            },
            staticRenderFns: []
        }, undefined, {
            name: "DraggableArea",
            props: {
                movable: {
                    type: Boolean,
                    default: !0
                },
                activationDistance: {
                    type: Number,
                    default: 20
                }
            },
            computed: {
                classnames: function () {
                    return {
                        default: l(It(), this.classname)
                    }
                }
            },
            beforeMount: function () {
                window.addEventListener("mouseup", this.onMouseUp, {
                    passive: !1
                }), window.addEventListener("mousemove", this.onMouseMove, {
                    passive: !1
                }), window.addEventListener("touchmove", this.onTouchMove, {
                    passive: !1
                }), window.addEventListener("touchend", this.onTouchEnd, {
                    passive: !1
                })
            },
            beforeDestroy: function () {
                window.removeEventListener("mouseup", this.onMouseUp), window.removeEventListener("mousemove", this.onMouseMove), window.removeEventListener("touchmove", this.onTouchMove), window.removeEventListener("touchend", this.onTouchEnd)
            },
            mounted: function () {
                this.touches = [], this.touchStarted = !1
            },
            methods: {
                onTouchStart: function (t) {
                    if (t.cancelable) {
                        var e = this.movable && 1 === t.touches.length;
                        e && (this.touches = h(t.touches)), (this.touchStarted || e) && (t.preventDefault(), t.stopPropagation())
                    }
                },
                onTouchEnd: function () {
                    this.touchStarted = !1, this.processEnd()
                },
                onTouchMove: function (t) {
                    this.touches.length >= 1 && (this.touchStarted ? (this.processMove(t, t.touches), t.preventDefault(), t.stopPropagation()) : x({
                        x: this.touches[0].clientX,
                        y: this.touches[0].clientY
                    }, {
                        x: t.touches[0].clientX,
                        y: t.touches[0].clientY
                    }) > this.activationDistance && (this.initAnchor({
                        clientX: t.touches[0].clientX,
                        clientY: t.touches[0].clientY
                    }), this.touchStarted = !0))
                },
                onMouseDown: function (t) {
                    if (this.movable) {
                        var e = {
                            fake: !0,
                            clientX: t.clientX,
                            clientY: t.clientY
                        };
                        this.touches = [e], this.initAnchor(e), t.stopPropagation()
                    }
                },
                onMouseMove: function (t) {
                    this.touches.length && (this.processMove(t, [{
                        fake: !0,
                        clientX: t.clientX,
                        clientY: t.clientY
                    }]), t.preventDefault && t.cancelable && t.preventDefault(), t.stopPropagation())
                },
                onMouseUp: function () {
                    this.processEnd()
                },
                initAnchor: function (t) {
                    var e = this.$refs.container.getBoundingClientRect(),
                        i = e.left,
                        n = e.top;
                    this.anchor = {
                        x: t.clientX - i,
                        y: t.clientY - n
                    }
                },
                processMove: function (t, e) {
                    var i = h(e);
                    if (this.touches.length) {
                        var n = this.$refs.container.getBoundingClientRect(),
                            o = n.left,
                            s = n.top;
                        1 === this.touches.length && 1 === i.length && this.$emit("move", new jt({
                            left: i[0].clientX - (o + this.anchor.x),
                            top: i[0].clientY - (s + this.anchor.y)
                        }))
                    }
                },
                processEnd: function () {
                    this.touches.length && this.$emit("move-end"), this.touches = []
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0);

    function Bt(t) {
        return new Promise((function (e, i) {
            try {
                if (t)
                    if (/^data:/i.test(t)) e(function (t) {
                        t = t.replace(/^data:([^;]+);base64,/gim, "");
                        for (var e = atob(t), i = e.length, n = new ArrayBuffer(i), o = new Uint8Array(n), s = 0; s < i; s++) o[s] = e.charCodeAt(s);
                        return n
                    }(t));
                    else if (/^blob:/i.test(t)) {
                    var n = new FileReader;
                    n.onload = function (t) {
                        e(t.target.result)
                    }, s = t, r = function (t) {
                        n.readAsArrayBuffer(t)
                    }, (a = new XMLHttpRequest).open("GET", s, !0), a.responseType = "blob", a.onload = function () {
                        200 != this.status && 0 !== this.status || r(this.response)
                    }, a.send()
                } else {
                    var o = new XMLHttpRequest;
                    o.onreadystatechange = function () {
                        4 === o.readyState && (200 === o.status || 0 === o.status ? e(o.response) : i("Warning: could not load an image to parse its orientation"), o = null)
                    }, o.onprogress = function () {
                        "image/jpeg" !== o.getResponseHeader("content-type") && o.abort()
                    }, o.withCredentials = !1, o.open("GET", t, !0), o.responseType = "arraybuffer", o.send(null)
                } else i("Error: the image is empty")
            } catch (t) {
                i(t)
            }
            var s, r, a
        }))
    }

    function _t(t) {
        var e = t.rotate,
            i = t.flip,
            n = "";
        return n += " rotate(" + e + "deg) ", n += " scaleX(" + (i.horizontal ? -1 : 1) + ") ", n += " scaleY(" + (i.vertical ? -1 : 1) + ") "
    }

    function Ft(t) {
        try {
            var e, i = new DataView(t),
                n = void 0,
                o = void 0,
                s = void 0,
                r = void 0;
            if (255 === i.getUint8(0) && 216 === i.getUint8(1))
                for (var a = i.byteLength, h = 2; h + 1 < a;) {
                    if (255 === i.getUint8(h) && 225 === i.getUint8(h + 1)) {
                        s = h;
                        break
                    }
                    h++
                }
            if (s && (n = s + 10, "Exif" === function (t, e, i) {
                    var n, o = "";
                    for (n = e, i += e; n < i; n++) o += String.fromCharCode(t.getUint8(n));
                    return o
                }(i, s + 4, 4))) {
                var c = i.getUint16(n);
                if (((o = 18761 === c) || 19789 === c) && 42 === i.getUint16(n + 2, o)) {
                    var l = i.getUint32(n + 4, o);
                    l >= 8 && (r = n + l)
                }
            }
            if (r)
                for (var d = i.getUint16(r, o), u = 0; u < d; u++) {
                    h = r + 12 * u + 2;
                    if (274 === i.getUint16(h, o)) {
                        h += 8, e = i.getUint16(h, o), i.setUint16(h, 1, o);
                        break
                    }
                }
            return e
        } catch (t) {
            return null
        }
    }
    var Xt = d("vue-preview-result"),
        Yt = W({
            render: function () {
                var t = this,
                    e = t.$createElement,
                    i = t._self._c || e;
                return i("div", {
                    class: t.classes.root
                }, [i("div", {
                    ref: "wrapper",
                    class: t.classes.wrapper,
                    style: t.wrapperStyle
                }, [i("img", {
                    ref: "image",
                    class: t.classes.image,
                    style: t.imageStyle,
                    attrs: {
                        src: t.image.src
                    }
                })])])
            },
            staticRenderFns: []
        }, undefined, {
            name: "PreviewResult",
            props: {
                image: {
                    type: Object
                },
                transitions: {
                    type: Object
                },
                stencilCoordinates: {
                    type: Object,
                    default: function () {
                        return {
                            width: 0,
                            height: 0,
                            left: 0,
                            top: 0
                        }
                    }
                },
                imageClass: {
                    type: String
                }
            },
            computed: {
                classes: function () {
                    return {
                        root: Xt(),
                        wrapper: Xt("wrapper"),
                        imageWrapper: Xt("image-wrapper"),
                        image: l(Xt("image"), this.imageClass)
                    }
                },
                wrapperStyle: function () {
                    var t = {
                        width: "".concat(this.stencilCoordinates.width, "px"),
                        height: "".concat(this.stencilCoordinates.height, "px"),
                        left: "calc(50% - ".concat(this.stencilCoordinates.width / 2, "px)"),
                        top: "calc(50% - ".concat(this.stencilCoordinates.height / 2, "px)")
                    };
                    return this.transitions && this.transitions.enabled && (t.transition = "".concat(this.transitions.time, "ms ").concat(this.transitions.timingFunction)), t
                },
                imageStyle: function () {
                    var t = this.image.transforms,
                        e = et({
                            width: this.image.width,
                            height: this.image.height
                        }, t.rotate),
                        i = {
                            width: "".concat(this.image.width, "px"),
                            height: "".concat(this.image.height, "px"),
                            left: "0px",
                            top: "0px"
                        };
                    return i.transform = "translate3d(\n\t\t\t\t".concat(-this.stencilCoordinates.left - t.translateX + (e.width - this.image.width) / 2, "px,").concat(-this.stencilCoordinates.top - t.translateY + (e.height - this.image.height) / 2, "px,0) ") + _t(t), this.transitions && this.transitions.enabled && (i.transition = "".concat(this.transitions.time, "ms ").concat(this.transitions.timingFunction)), i
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0);

    function Nt(t, e) {
        var i = e.getBoundingClientRect(),
            n = i.left,
            o = i.top,
            s = {
                left: 0,
                top: 0
            },
            r = 0;
        return t.forEach((function (e) {
            s.left += (e.clientX - n) / t.length, s.top += (e.clientY - o) / t.length
        })), t.forEach((function (t) {
            r += x({
                x: s.left,
                y: s.top
            }, {
                x: t.clientX - n,
                y: t.clientY - o
            })
        })), {
            centerMass: s,
            spread: r,
            count: t.length
        }
    }
    var kt = W({
            render: function () {
                var t = this,
                    e = t.$createElement;
                return (t._self._c || e)("div", {
                    ref: "container",
                    on: {
                        touchstart: t.onTouchStart,
                        mousedown: t.onMouseDown,
                        wheel: t.onWheel
                    }
                }, [t._t("default")], 2)
            },
            staticRenderFns: []
        }, undefined, {
            name: "CropperWrapper",
            props: {
                touchMove: {
                    type: Boolean,
                    required: !0
                },
                mouseMove: {
                    type: Boolean,
                    required: !0
                },
                touchResize: {
                    type: Boolean,
                    required: !0
                },
                wheelResize: {
                    type: [Boolean, Object],
                    required: !0
                }
            },
            beforeMount: function () {
                window.addEventListener("mouseup", this.onMouseUp, {
                    passive: !1
                }), window.addEventListener("mousemove", this.onMouseMove, {
                    passive: !1
                }), window.addEventListener("touchmove", this.onTouchMove, {
                    passive: !1
                }), window.addEventListener("touchend", this.onTouchEnd, {
                    passive: !1
                })
            },
            beforeDestroy: function () {
                window.removeEventListener("mouseup", this.onMouseUp), window.removeEventListener("mousemove", this.onMouseMove), window.removeEventListener("touchmove", this.onTouchMove), window.removeEventListener("touchend", this.onTouchEnd)
            },
            mounted: function () {
                this.touches = []
            },
            methods: {
                onTouchStart: function (t) {
                    if (t.cancelable && (this.touchMove || this.touchResize && t.touches.length > 1)) {
                        var e = this.$refs.container,
                            i = e.getBoundingClientRect(),
                            n = i.left,
                            o = i.top,
                            s = i.bottom,
                            r = i.right;
                        this.touches = h(t.touches).filter((function (t) {
                            return t.clientX > n && t.clientX < r && t.clientY > o && t.clientY < s
                        })), this.oldGeometricProperties = Nt(this.touches, e), t.preventDefault && t.preventDefault(), t.stopPropagation()
                    }
                },
                onTouchEnd: function (t) {
                    0 === t.touches.length && this.processEnd()
                },
                onTouchMove: function (t) {
                    var e = this;
                    if (this.touches.length) {
                        var i = h(t.touches).filter((function (t) {
                            return !t.identifier || e.touches.find((function (e) {
                                return e.identifier === t.identifier
                            }))
                        }));
                        this.processMove(t, i), t.preventDefault && t.preventDefault(), t.stopPropagation && t.stopPropagation()
                    }
                },
                onMouseDown: function (t) {
                    if (this.mouseMove && "buttons" in t && 1 === t.buttons) {
                        var e = {
                            fake: !0,
                            clientX: t.clientX,
                            clientY: t.clientY
                        };
                        this.touches = [e], t.stopPropagation()
                    }
                },
                onMouseMove: function (t) {
                    this.touches.length && (this.processMove(t, [{
                        fake: !0,
                        clientX: t.clientX,
                        clientY: t.clientY
                    }]), t.preventDefault && t.cancelable && t.preventDefault())
                },
                onMouseUp: function () {
                    this.touches = []
                },
                processMove: function (t, e) {
                    if (this.touches.length) {
                        if (1 === this.touches.length && 1 === e.length) this.$emit("move", new Ht({
                            left: this.touches[0].clientX - e[0].clientX,
                            top: this.touches[0].clientY - e[0].clientY
                        }));
                        else if (this.touches.length > 1 && this.touchResize) {
                            var i = Nt(e, this.$refs.container),
                                n = this.oldGeometricProperties;
                            n.count === i.count && n.count > 1 && this.$emit("resize", new Ht({
                                left: n.centerMass.left - i.centerMass.left,
                                top: n.centerMass.top - i.centerMass.top
                            }, {
                                factor: n.spread / i.spread,
                                center: i.centerMass
                            })), this.oldGeometricProperties = i
                        }
                        this.touches = e
                    }
                },
                processEnd: function () {
                    this.touches = []
                },
                onWheel: function (t) {
                    if (this.wheelResize) {
                        var e = this.$refs.container.getBoundingClientRect(),
                            i = e.left,
                            n = e.top,
                            o = 1 + this.wheelResize.ratio * (r = t.deltaY || t.detail || t.wheelDelta, 0 === (a = +r) || A(a) ? a : a > 0 ? 1 : -1),
                            s = {
                                left: t.clientX - i,
                                top: t.clientY - n
                            };
                        this.$emit("resize", new Ht({}, {
                            factor: o,
                            center: s
                        })), t.preventDefault(), t.stopPropagation()
                    }
                    var r, a
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0),
        Ut = d("vue-rectangle-stencil"),
        Zt = W({
            render: function () {
                var t = this,
                    e = t.$createElement,
                    i = t._self._c || e;
                return i("div", {
                    class: t.classes.stencil,
                    style: t.style
                }, [i("BoundingBox", {
                    class: t.classes.boundingBox,
                    attrs: {
                        handlers: t.handlers,
                        "handlers-component": t.handlersComponent,
                        "handlers-classes": t.handlersClasses,
                        "handlers-wrappers-classes": t.handlersWrappersClasses,
                        lines: t.lines,
                        "lines-component": t.linesComponent,
                        "lines-classes": t.linesClasses,
                        "lines-wrappers-classes": t.linesWrappersClasses,
                        resizable: t.resizable
                    },
                    on: {
                        resize: t.onResize,
                        "resize-end": t.onResizeEnd
                    }
                }, [i("DraggableArea", {
                    attrs: {
                        movable: t.movable
                    },
                    on: {
                        move: t.onMove,
                        "move-end": t.onMoveEnd
                    }
                }, [i("PreviewResult", {
                    class: t.classes.preview,
                    attrs: {
                        image: t.image,
                        transitions: t.transitions,
                        "stencil-coordinates": t.stencilCoordinates
                    }
                })], 1)], 1)], 1)
            },
            staticRenderFns: []
        }, undefined, {
            name: "RectangleStencil",
            components: {
                PreviewResult: Yt,
                BoundingBox: $t,
                DraggableArea: Lt
            },
            props: {
                image: {
                    type: Object
                },
                resultCoordinates: {
                    type: Object
                },
                stencilCoordinates: {
                    type: Object
                },
                handlers: {
                    type: Object
                },
                handlersComponent: {
                    type: [Object, String],
                    default: function () {
                        return Ct
                    }
                },
                lines: {
                    type: Object
                },
                linesComponent: {
                    type: [Object, String],
                    default: function () {
                        return Tt
                    }
                },
                aspectRatio: {
                    type: [Number, String]
                },
                minAspectRatio: {
                    type: [Number, String]
                },
                maxAspectRatio: {
                    type: [Number, String]
                },
                movable: {
                    type: Boolean,
                    default: !0
                },
                resizable: {
                    type: Boolean,
                    default: !0
                },
                transitions: {
                    type: Object
                },
                movingClass: {
                    type: String
                },
                resizingClass: {
                    type: String
                },
                previewClass: {
                    type: String
                },
                boundingBoxClass: {
                    type: String
                },
                linesClasses: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                },
                linesWrappersClasses: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                },
                handlersClasses: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                },
                handlersWrappersClasses: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                }
            },
            data: function () {
                return {
                    moving: !1,
                    resizing: !1
                }
            },
            computed: {
                classes: function () {
                    return {
                        stencil: l(Ut({
                            movable: this.movable,
                            moving: this.moving,
                            resizing: this.resizing
                        }), this.moving && this.movingClass, this.resizing && this.resizingClass),
                        preview: l(Ut("preview"), this.previewClass),
                        boundingBox: l(Ut("bounding-box"), this.boundingBoxClass)
                    }
                },
                style: function () {
                    var t = this.stencilCoordinates,
                        e = t.height,
                        i = t.width,
                        n = t.left,
                        o = t.top,
                        s = {
                            width: "".concat(i, "px"),
                            height: "".concat(e, "px"),
                            left: "".concat(0, "px"),
                            top: "".concat(0, "px"),
                            transform: "translate(".concat(n, "px, ").concat(o, "px)")
                        };
                    return this.transitions && this.transitions.enabled && (s.transition = "".concat(this.transitions.time, "ms ").concat(this.transitions.timingFunction)), s
                }
            },
            methods: {
                onMove: function (t) {
                    this.$emit("move", t), this.moving = !0
                },
                onMoveEnd: function () {
                    this.$emit("move-end"), this.moving = !1
                },
                onResize: function (t) {
                    this.$emit("resize", t), this.resizing = !0
                },
                onResizeEnd: function () {
                    this.$emit("resize-end"), this.resizing = !1
                },
                aspectRatios: function () {
                    return {
                        minimum: this.aspectRatio || this.minAspectRatio,
                        maximum: this.aspectRatio || this.maxAspectRatio
                    }
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0),
        Vt = d("vue-circle-stencil"),
        qt = W({
            render: function () {
                var t = this,
                    e = t.$createElement,
                    i = t._self._c || e;
                return i("div", {
                    class: t.classes.stencil,
                    style: t.style
                }, [i("BoundingBox", {
                    class: t.classes.boundingBox,
                    attrs: {
                        handlers: t.handlers,
                        "handlers-component": t.handlersComponent,
                        "handlers-classes": t.handlersClasses,
                        "handlers-wrappers-classes": t.handlersWrappersClasses,
                        lines: t.lines,
                        "lines-component": t.linesComponent,
                        "lines-classes": t.linesClasses,
                        "lines-wrappers-classes": t.linesWrappersClasses,
                        resizable: t.resizable
                    },
                    on: {
                        resize: t.onResize,
                        "resize-end": t.onResizeEnd
                    }
                }, [i("DraggableArea", {
                    attrs: {
                        movable: t.movable
                    },
                    on: {
                        move: t.onMove,
                        "move-end": t.onMoveEnd
                    }
                }, [i("PreviewResult", {
                    class: t.classes.preview,
                    attrs: {
                        image: t.image,
                        transitions: t.transitions,
                        "stencil-coordinates": t.stencilCoordinates
                    }
                })], 1)], 1)], 1)
            },
            staticRenderFns: []
        }, undefined, {
            name: "CircleStencil",
            components: {
                PreviewResult: Yt,
                BoundingBox: $t,
                DraggableArea: Lt
            },
            props: {
                image: {
                    type: Object
                },
                stencilCoordinates: {
                    type: Object
                },
                handlers: {
                    type: Object,
                    default: function () {
                        return {
                            eastNorth: !0,
                            westNorth: !0,
                            westSouth: !0,
                            eastSouth: !0
                        }
                    }
                },
                handlersComponent: {
                    type: [Object, String],
                    default: function () {
                        return Ct
                    }
                },
                handlersClasses: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                },
                handlersWrappersClasses: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                },
                lines: {
                    type: Object
                },
                linesComponent: {
                    type: [Object, String],
                    default: function () {
                        return Tt
                    }
                },
                linesClasses: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                },
                linesWrappersClasses: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                },
                movable: {
                    type: Boolean,
                    default: !0
                },
                resizable: {
                    type: Boolean,
                    default: !0
                },
                transitions: {
                    type: Object
                },
                movingClass: {
                    type: String
                },
                resizingClass: {
                    type: String
                },
                previewClass: {
                    type: String
                },
                boundingBoxClass: {
                    type: String
                }
            },
            data: function () {
                return {
                    moving: !1,
                    resizing: !1
                }
            },
            computed: {
                classes: function () {
                    return {
                        stencil: l(Vt({
                            movable: this.movable,
                            moving: this.moving,
                            resizing: this.resizing
                        }), this.moving && this.movingClass, this.resizing && this.resizingClass),
                        preview: l(Vt("preview"), this.previewClass),
                        boundingBox: l(Vt("bounding-box"), this.boundingBoxClass)
                    }
                },
                style: function () {
                    var t = this.stencilCoordinates,
                        e = t.height,
                        i = t.width,
                        n = t.left,
                        o = t.top,
                        s = {
                            width: "".concat(i, "px"),
                            height: "".concat(e, "px"),
                            left: "".concat(0, "px"),
                            top: "".concat(0, "px"),
                            transform: "translate(".concat(n, "px, ").concat(o, "px)")
                        };
                    return this.transitions && this.transitions.enabled && (s.transition = "".concat(this.transitions.time, "ms ").concat(this.transitions.timingFunction)), s
                }
            },
            methods: {
                onMove: function (t) {
                    this.$emit("move", t), this.moving = !0
                },
                onMoveEnd: function () {
                    this.$emit("move-end"), this.moving = !1
                },
                onResize: function (t) {
                    this.$emit("resize", t), this.resizing = !0
                },
                onResizeEnd: function () {
                    this.$emit("resize-end"), this.resizing = !1
                },
                aspectRatios: function () {
                    return {
                        minimum: 1,
                        maximum: 1
                    }
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0),
        Gt = d("vue-advanced-cropper"),
        Kt = W({
            render: function () {
                var t = this,
                    e = t.$createElement,
                    i = t._self._c || e;
                return i("div", {
                    ref: "cropper",
                    class: t.classes.cropper
                }, [i("div", {
                    ref: "stretcher",
                    class: t.classes.stretcher
                }), t._v(" "), i("div", {
                    class: t.classes.boundaries,
                    style: t.boundariesStyle
                }, [i("cropper-wrapper", {
                    class: t.classes.cropperWrapper,
                    attrs: {
                        "wheel-resize": t.settings.resizeImage.wheel,
                        "touch-resize": t.settings.resizeImage.touch,
                        "touch-move": t.settings.moveImage.touch,
                        "mouse-move": t.settings.moveImage.mouse
                    },
                    on: {
                        move: t.onManipulateImage,
                        resize: t.onManipulateImage
                    }
                }, [i("div", {
                    class: t.classes.background,
                    style: t.boundariesStyle
                }), t._v(" "), i("div", {
                    class: t.classes.imageWrapper
                }, [i("img", {
                    ref: "image",
                    class: t.classes.image,
                    style: t.imageStyle,
                    attrs: {
                        crossorigin: t.imageAttributes.crossOrigin,
                        src: t.imageAttributes.src
                    },
                    on: {
                        mousedown: function (t) {
                            t.preventDefault()
                        }
                    }
                })]), t._v(" "), i("div", {
                    class: t.classes.foreground,
                    style: t.boundariesStyle
                }), t._v(" "), i(t.stencilComponent, t._b({
                    directives: [{
                        name: "show",
                        rawName: "v-show",
                        value: t.imageLoaded,
                        expression: "imageLoaded"
                    }],
                    ref: "stencil",
                    tag: "component",
                    attrs: {
                        transitions: t.transitionsOptions,
                        "stencil-coordinates": t.stencilCoordinates,
                        image: {
                            src: t.imageAttributes.src,
                            width: t.imageAttributes.width / t.coefficient,
                            height: t.imageAttributes.height / t.coefficient,
                            transforms: t.imageTransforms,
                            loaded: t.imageLoaded
                        }
                    },
                    on: {
                        resize: t.onResize,
                        "resize-end": t.onResizeEnd,
                        move: t.onMove,
                        "move-end": t.onMoveEnd
                    }
                }, "component", t.stencilProps, !1)), t._v(" "), i("canvas", {
                    ref: "canvas",
                    style: {
                        display: "none"
                    }
                }), t._v(" "), i("canvas", {
                    ref: "sourceCanvas",
                    style: {
                        display: "none"
                    }
                })], 1)], 1)])
            },
            staticRenderFns: []
        }, undefined, {
            name: "Cropper",
            components: {
                CropperWrapper: kt
            },
            props: {
                src: {
                    type: String,
                    default: null
                },
                stencilComponent: {
                    type: [Object, String],
                    default: function () {
                        return Zt
                    }
                },
                stencilProps: {
                    type: Object,
                    default: function () {
                        return {}
                    }
                },
                autoZoom: {
                    type: Boolean,
                    default: !1
                },
                imageClass: {
                    type: String
                },
                boundariesClass: {
                    type: String
                },
                backgroundClass: {
                    type: String
                },
                foregroundClass: {
                    type: String
                },
                minWidth: {
                    type: [Number, String]
                },
                minHeight: {
                    type: [Number, String]
                },
                maxWidth: {
                    type: [Number, String]
                },
                maxHeight: {
                    type: [Number, String]
                },
                debounce: {
                    type: [Boolean, Number],
                    default: 500
                },
                transitions: {
                    type: Boolean,
                    default: !0
                },
                canvas: {
                    type: Boolean,
                    default: !0
                },
                checkOrientation: {
                    type: Boolean,
                    default: !0
                },
                crossOrigin: {
                    type: String,
                    default: "anonymous"
                },
                transitionTime: {
                    type: Number,
                    default: 300
                },
                imageRestriction: {
                    type: String,
                    default: "fit-area",
                    validator: function (t) {
                        return -1 !== B.indexOf(t)
                    }
                },
                roundResult: {
                    type: Boolean,
                    default: !0
                },
                defaultSize: {
                    type: [Function, Object]
                },
                defaultPosition: {
                    type: [Function, Object],
                    default: function (t) {
                        var e = t.imageSize,
                            i = t.visibleArea,
                            n = t.coordinates,
                            o = i || e;
                        return {
                            left: (i ? i.left : 0) + o.width / 2 - n.width / 2,
                            top: (i ? i.top : 0) + o.height / 2 - n.height / 2
                        }
                    }
                },
                defaultVisibleArea: {
                    type: [Function, Object],
                    default: function (t) {
                        var e = t.getAreaRestrictions,
                            i = t.coordinates,
                            n = t.imageSize,
                            o = G(t.boundaries);
                        if (i) {
                            var s = {
                                    height: Math.max(i.height, n.height),
                                    width: Math.max(i.width, n.width)
                                },
                                r = tt({
                                    width: G(s) > o ? s.width : s.height * o,
                                    height: G(s) > o ? s.width / o : s.height
                                }, st(e())),
                                a = {
                                    left: i.left + i.width / 2 - r.width / 2,
                                    top: i.top + i.height / 2 - r.height / 2,
                                    width: r.width,
                                    height: r.height
                                },
                                h = k(i, X(p({
                                    left: 0,
                                    top: 0
                                }, n))),
                                c = {};
                            return !h.left && !h.right && a.width <= n.width && (c.left = 0, c.right = n.width), !h.top && !h.bottom && a.height <= n.height && (c.top = 0, c.bottom = n.height), ot(a, c)
                        }
                        var l = G(n);
                        return r = {
                            height: l > o ? n.height : n.width / o,
                            width: l > o ? n.height * o : n.width
                        }, {
                            left: n.width / 2 - r.width / 2,
                            top: n.height / 2 - r.height / 2,
                            width: r.width,
                            height: r.height
                        }
                    }
                },
                defaultBoundaries: {
                    type: [Function, String],
                    validator: function (t) {
                        return !("string" == typeof t && "fill" !== t && "fit" !== t)
                    }
                },
                priority: {
                    type: String,
                    default: "coordinates"
                },
                stencilSize: {
                    type: [Object, Function]
                },
                resizeImage: {
                    type: [Boolean, Object],
                    default: !0
                },
                moveImage: {
                    type: [Boolean, Object],
                    default: !0
                },
                autoZoomAlgorithm: {
                    type: Function
                },
                resizeAlgorithm: {
                    type: Function,
                    default: function (t) {
                        var e = t.event,
                            i = t.coordinates,
                            n = t.aspectRatio,
                            o = t.positionRestrictions,
                            s = t.sizeRestrictions,
                            r = p(p({}, i), {
                                right: i.left + i.width,
                                bottom: i.top + i.height
                            }),
                            a = e.params || {},
                            h = p({}, e.directions),
                            c = a.allowedDirections || {
                                left: !0,
                                right: !0,
                                bottom: !0,
                                top: !0
                            };
                        s.widthFrozen && (h.left = 0, h.right = 0), s.heightFrozen && (h.top = 0, h.bottom = 0), H.forEach((function (t) {
                            c[t] || (h[t] = 0)
                        }));
                        var l = U(r, h = At({
                                coordinates: r,
                                directions: h,
                                sizeRestrictions: s,
                                positionRestrictions: o
                            })).width,
                            d = U(r, h).height,
                            u = a.preserveRatio ? G(r) : Q(l / d, n);
                        if (u) {
                            var f = a.respectDirection;
                            if (f || (f = r.width >= r.height || 1 === u ? "width" : "height"), "width" === f) {
                                var m = l / u - r.height;
                                if (c.top && c.bottom) {
                                    var g = h.top,
                                        v = h.bottom;
                                    h.bottom = xt(m, v, g), h.top = xt(m, g, v)
                                } else c.bottom ? h.bottom = m : c.top ? h.top = m : c.right ? h.right = 0 : c.left && (h.left = 0)
                            } else if ("height" === f) {
                                var b = r.width - d * u;
                                if (c.left && c.right) {
                                    var w = h.left,
                                        y = h.right;
                                    h.left = -xt(b, w, y), h.right = -xt(b, y, w)
                                } else c.left ? h.left = -b : c.right ? h.right = -b : c.top ? h.top = 0 : c.bottom && (h.bottom = 0)
                            }
                            h = At({
                                directions: h,
                                coordinates: r,
                                sizeRestrictions: s,
                                positionRestrictions: o,
                                preserveRatio: !0,
                                compensate: a.compensate
                            })
                        }
                        return l = U(r, h).width, d = U(r, h).height, (u = a.preserveRatio ? G(r) : Q(l / d, n)) && Math.abs(u - l / d) > .001 && H.forEach((function (t) {
                            c[t] || (h[t] = 0)
                        })), ut({
                            event: new C({
                                left: -h.left,
                                top: -h.top
                            }),
                            coordinates: {
                                width: i.width + h.right + h.left,
                                height: i.height + h.top + h.bottom,
                                left: i.left,
                                top: i.top
                            },
                            positionRestrictions: o
                        })
                    }
                },
                moveAlgorithm: {
                    type: Function,
                    default: ut
                },
                initStretcher: {
                    type: Function,
                    default: function (t) {
                        var e = t.stretcher,
                            i = t.imageSize,
                            n = G(i);
                        e.style.width = i.width + "px", e.style.height = e.clientWidth / n + "px", e.style.width = e.clientWidth + "px"
                    }
                },
                fitCoordinates: {
                    type: Function,
                    default: function (t) {
                        var e = t.visibleArea,
                            i = t.coordinates,
                            n = t.aspectRatio,
                            o = t.sizeRestrictions,
                            s = t.positionRestrictions,
                            r = p(p({}, i), dt({
                                width: i.width,
                                height: i.height,
                                aspectRatio: n,
                                sizeRestrictions: {
                                    maxWidth: e.width,
                                    maxHeight: e.height,
                                    minHeight: Math.min(e.height, o.minHeight),
                                    minWidth: Math.min(e.width, o.minWidth)
                                }
                            }));
                        return r = ot(r = V(r, Y(N(i), N(r))), ht(X(e), s))
                    }
                },
                fitVisibleArea: {
                    type: Function,
                    default: function (t) {
                        var e = t.visibleArea,
                            i = t.boundaries,
                            n = t.getAreaRestrictions,
                            o = t.coordinates,
                            s = p({}, e);
                        s.height = s.width / G(i), s.top += (e.height - s.height) / 2, (o.height - s.height > 0 || o.width - s.width > 0) && (s = q(s, Math.max(o.height / s.height, o.width / s.width)));
                        var r = Z(J(o, X(s = q(s, nt(s, n({
                            visibleArea: s,
                            type: "resize"
                        }))))));
                        return s.width < o.width && (r.left = 0), s.height < o.height && (r.top = 0), s = ot(s = V(s, r), n({
                            visibleArea: s,
                            type: "move"
                        }))
                    }
                },
                areaRestrictionsAlgorithm: {
                    type: Function,
                    default: function (t) {
                        var e = t.visibleArea,
                            i = t.boundaries,
                            n = t.imageSize,
                            o = t.imageRestriction,
                            s = t.type,
                            r = {};
                        return "fill-area" === o ? r = {
                            left: 0,
                            top: 0,
                            right: n.width,
                            bottom: n.height
                        } : "fit-area" === o && (G(i) > G(n) ? (r = {
                            top: 0,
                            bottom: n.height
                        }, e && "move" === s && (e.width > n.width ? (r.left = -(e.width - n.width) / 2, r.right = n.width - r.left) : (r.left = 0, r.right = n.width))) : (r = {
                            left: 0,
                            right: n.width
                        }, e && "move" === s && (e.height > n.height ? (r.top = -(e.height - n.height) / 2, r.bottom = n.height - r.top) : (r.top = 0, r.bottom = n.height)))), r
                    }
                },
                sizeRestrictionsAlgorithm: {
                    type: Function,
                    default: function (t) {
                        return {
                            minWidth: t.minWidth,
                            minHeight: t.minHeight,
                            maxWidth: t.maxWidth,
                            maxHeight: t.maxHeight
                        }
                    }
                },
                positionRestrictionsAlgorithm: {
                    type: Function,
                    default: function (t) {
                        var e = t.imageSize,
                            i = {};
                        return "none" !== t.imageRestriction && (i = {
                            left: 0,
                            top: 0,
                            right: e.width,
                            bottom: e.height
                        }), i
                    }
                }
            },
            data: function () {
                return {
                    transitionsActive: !1,
                    imageLoaded: !1,
                    imageAttributes: {
                        width: null,
                        height: null,
                        crossOrigin: !1,
                        src: null
                    },
                    customImageTransforms: {
                        rotate: 0,
                        flip: {
                            horizontal: !1,
                            vertical: !1
                        }
                    },
                    basicImageTransforms: {
                        rotate: 0,
                        flip: {
                            horizontal: !1,
                            vertical: !1
                        }
                    },
                    boundaries: {
                        width: 0,
                        height: 0
                    },
                    visibleArea: null,
                    coordinates: r({}, _)
                }
            },
            computed: {
                imageTransforms: function () {
                    return {
                        rotate: this.basicImageTransforms.rotate + this.customImageTransforms.rotate,
                        flip: {
                            horizontal: Boolean(this.basicImageTransforms.flip.horizontal ^ this.customImageTransforms.flip.horizontal),
                            vertical: Boolean(this.basicImageTransforms.flip.vertical ^ this.customImageTransforms.flip.vertical)
                        },
                        translateX: this.visibleArea ? this.visibleArea.left / this.coefficient : 0,
                        translateY: this.visibleArea ? this.visibleArea.top / this.coefficient : 0
                    }
                },
                imageSize: function () {
                    var t = function (t) {
                        return t * Math.PI / 180
                    }(this.imageTransforms.rotate);
                    return {
                        width: Math.abs(this.imageAttributes.width * Math.cos(t)) + Math.abs(this.imageAttributes.height * Math.sin(t)),
                        height: Math.abs(this.imageAttributes.width * Math.sin(t)) + Math.abs(this.imageAttributes.height * Math.cos(t))
                    }
                },
                initialized: function () {
                    return Boolean(this.visibleArea && this.imageLoaded)
                },
                settings: function () {
                    var t = y(this.resizeImage, {
                        touch: !0,
                        wheel: {
                            ratio: .1
                        },
                        adjustStencil: !0
                    }, {
                        touch: !1,
                        wheel: !1,
                        adjustStencil: !1
                    });
                    return {
                        moveImage: y(this.moveImage, {
                            touch: !0,
                            mouse: !0
                        }, {
                            touch: !1,
                            mouse: !1
                        }),
                        resizeImage: t
                    }
                },
                coefficient: function () {
                    return this.visibleArea ? this.visibleArea.width / this.boundaries.width : 0
                },
                areaRestrictions: function () {
                    return this.imageLoaded ? this.areaRestrictionsAlgorithm({
                        imageSize: this.imageSize,
                        imageRestriction: this.imageRestriction,
                        boundaries: this.boundaries
                    }) : {}
                },
                transitionsOptions: function () {
                    return {
                        enabled: this.transitionsActive,
                        timingFunction: "ease-in-out",
                        time: 350
                    }
                },
                sizeRestrictions: function () {
                    if (this.boundaries.width && this.boundaries.height) {
                        var t = this.sizeRestrictionsAlgorithm({
                            imageSize: this.imageSize,
                            minWidth: b(this.minWidth) ? 0 : z(this.minWidth),
                            minHeight: b(this.minHeight) ? 0 : z(this.minHeight),
                            maxWidth: b(this.maxWidth) ? 1 / 0 : z(this.maxWidth),
                            maxHeight: b(this.maxHeight) ? 1 / 0 : z(this.maxHeight)
                        });
                        if (t = function (t) {
                                var e = t.sizeRestrictions,
                                    i = t.imageSize,
                                    n = t.boundaries,
                                    o = t.positionRestrictions,
                                    s = t.imageRestriction,
                                    r = void 0 === s ? "none" : s,
                                    a = p(p({}, e), {
                                        minWidth: void 0 !== e.minWidth ? e.minWidth : 0,
                                        minHeight: void 0 !== e.minHeight ? e.minHeight : 0,
                                        maxWidth: void 0 !== e.maxWidth ? e.maxWidth : 1 / 0,
                                        maxHeight: void 0 !== e.maxHeight ? e.maxHeight : 1 / 0
                                    });
                                if (void 0 !== o.left && void 0 !== o.right && (a.maxWidth = Math.min(a.maxWidth, o.right - o.left)), void 0 !== o.bottom && void 0 !== o.top && (a.maxHeight = Math.min(a.maxHeight, o.bottom - o.top)), "none" !== r) {
                                    var h = tt(n, i),
                                        c = "fill-area" === r ? h.width : i.width,
                                        l = "fill-area" === r ? h.height : i.height;
                                    (!a.maxWidth || a.maxWidth > c) && (a.maxWidth = Math.min(a.maxWidth, c)), (!a.maxHeight || a.maxHeight > l) && (a.maxHeight = Math.min(a.maxHeight, l))
                                }
                                return a.minWidth > a.maxWidth && (a.minWidth = a.maxWidth, a.widthFrozen = !0), a.minHeight > a.maxHeight && (a.minHeight = a.maxHeight, a.heightFrozen = !0), a
                            }({
                                sizeRestrictions: t,
                                imageSize: this.imageSize,
                                boundaries: this.boundaries,
                                positionRestrictions: this.positionRestrictions,
                                imageRestriction: this.imageRestriction,
                                visibleArea: this.visibleArea,
                                stencilSize: this.getStencilSize()
                            }), this.visibleArea && this.stencilSize) {
                            var e = this.getStencilSize(),
                                i = st(this.getAreaRestrictions({
                                    visibleArea: this.visibleArea,
                                    type: "resize"
                                }));
                            t.maxWidth = Math.min(t.maxWidth, i.width * e.width / this.boundaries.width), t.maxHeight = Math.min(t.maxHeight, i.height * e.height / this.boundaries.height)
                        }
                        return t
                    }
                    return {
                        minWidth: 0,
                        minHeight: 0,
                        maxWidth: 0,
                        maxHeight: 0
                    }
                },
                positionRestrictions: function () {
                    return this.positionRestrictionsAlgorithm({
                        imageSize: this.imageSize,
                        imageRestriction: this.imageRestriction
                    })
                },
                classes: function () {
                    return {
                        cropper: l(Gt(), this.classname),
                        image: l(Gt("image"), this.imageClass),
                        boundaries: l(Gt("boundaries"), this.boundariesClass),
                        stretcher: l(Gt("stretcher")),
                        background: l(Gt("background"), this.backgroundClass),
                        foreground: l(Gt("foreground"), this.foregroundClass),
                        imageWrapper: l(Gt("image-wrapper")),
                        cropperWrapper: l(Gt("cropper-wrapper"))
                    }
                },
                stencilCoordinates: function () {
                    if (this.initialized) {
                        var t = this.coordinates,
                            e = t.width,
                            i = t.height,
                            n = t.left,
                            o = t.top;
                        return {
                            width: e / this.coefficient,
                            height: i / this.coefficient,
                            left: (n - this.visibleArea.left) / this.coefficient,
                            top: (o - this.visibleArea.top) / this.coefficient
                        }
                    }
                    return this.defaultCoordinates()
                },
                wrapperStyle: function () {
                    return {
                        width: "".concat(this.stencilCoordinates.width, "px"),
                        height: "".concat(this.stencilCoordinates.height, "px"),
                        left: "".concat(this.stencilCoordinates.left, "px"),
                        top: "".concat(this.stencilCoordinates.top, "px")
                    }
                },
                boundariesStyle: function () {
                    var t = {
                        width: this.boundaries.width ? "".concat(this.boundaries.width, "px") : "auto",
                        height: this.boundaries.height ? "".concat(this.boundaries.height, "px") : "auto",
                        transition: "opacity ".concat(this.transitionTime, "ms"),
                        pointerEvents: this.imageLoaded ? "all" : "none"
                    };
                    return this.imageLoaded || (t.opacity = "0"), t
                },
                imageStyle: function () {
                    var t = {
                        left: "0px",
                        top: "0px",
                        transform: "translate(".concat((this.imageSize.width - this.imageAttributes.width) / (2 * this.coefficient) - this.imageTransforms.translateX, "px, ").concat((this.imageSize.height - this.imageAttributes.height) / (2 * this.coefficient) - this.imageTransforms.translateY, "px)") + _t(this.imageTransforms)
                    };
                    return this.transitionsOptions.enabled && (t.transition = "".concat(this.transitionsOptions.time, "ms ").concat(this.transitionsOptions.timingFunction)), t.width = "".concat(this.imageAttributes.width / this.coefficient, "px"), t.height = "".concat(this.imageAttributes.height / this.coefficient, "px"), t
                }
            },
            watch: {
                src: function () {
                    this.onChangeImage()
                },
                stencilComponent: function () {
                    var t = this;
                    this.$nextTick((function () {
                        t.resetCoordinates(), t.runAutoZoom("setCoordinates"), t.onChange()
                    }))
                },
                minWidth: function () {
                    this.onPropsChange()
                },
                maxWidth: function () {
                    this.onPropsChange()
                },
                minHeight: function () {
                    this.onPropsChange()
                },
                maxHeight: function () {
                    this.onPropsChange()
                },
                imageRestriction: function () {
                    this.reset()
                },
                stencilProps: function (t, e) {
                    ["aspectRatio", "minAspectRatio", "maxAspectRatio"].find((function (i) {
                        return t[i] !== e[i]
                    })) && this.$nextTick(this.onPropsChange)
                }
            },
            created: function () {
                this.debouncedUpdate = f(this.update, this.debounce), this.debouncedDisableTransitions = f(this.disableTransitions, this.transitionsOptions.time)
            },
            mounted: function () {
                this.$refs.image.addEventListener("load", this.onSuccessLoadImage), this.$refs.image.addEventListener("error", this.onFailLoadImage), this.onChangeImage(), window.addEventListener("resize", this.refresh), window.addEventListener("orientationchange", this.refresh)
            },
            destroyed: function () {
                window.removeEventListener("resize", this.refresh), window.removeEventListener("orientationchange", this.refresh)
            },
            methods: {
                getResult: function (t) {
                    var e = this.initialized ? this.prepareResult(r({}, this.coordinates)) : this.defaultCoordinates(),
                        i = {
                            rotate: this.imageTransforms.rotate % 360,
                            flip: r({}, this.imageTransforms.flip)
                        };
                    return (t || this.canvas) && this.src && this.imageLoaded ? (this.updateCanvas(), {
                        coordinates: e,
                        visibleArea: this.visibleArea ? r({}, this.visibleArea) : null,
                        canvas: this.$refs.canvas,
                        imageTransforms: i
                    }) : {
                        coordinates: e,
                        visibleArea: this.visibleArea ? r({}, this.visibleArea) : null,
                        canvas: void 0,
                        imageTransforms: i
                    }
                },
                zoom: function (t, e) {
                    var i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {},
                        n = i.transitions,
                        o = void 0 === n || n;
                    this.onManipulateImage(new S({}, {
                        factor: 1 / t,
                        center: e
                    }), {
                        normalize: !1,
                        transitions: o
                    })
                },
                move: function (t, e) {
                    var i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {},
                        n = i.transitions,
                        o = void 0 === n || n;
                    this.onManipulateImage(new S({
                        left: t || 0,
                        top: e || 0
                    }), {
                        normalize: !1,
                        transitions: o
                    })
                },
                setCoordinates: function (t) {
                    var e = this,
                        i = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        n = i.autoZoom,
                        o = void 0 === n || n,
                        s = i.transitions,
                        r = void 0 === s || s;
                    this.$nextTick((function () {
                        e.imageLoaded ? e.transitionsActive || (r && e.enableTransitions(), e.coordinates = e.applyTransform(t), o && e.runAutoZoom("setCoordinates"), r && e.debouncedDisableTransitions()) : e.delayedTransforms = t
                    }))
                },
                refresh: function () {
                    var t = this.$refs.image;
                    if (this.src && t) return this.initialized ? this.updateVisibleArea() : this.reset()
                },
                reset: function () {
                    return this.resetVisibleArea()
                },
                prepareResult: function (t) {
                    return this.roundResult ? function (t) {
                        var e = t.coordinates,
                            i = t.sizeRestrictions,
                            n = t.positionRestrictions,
                            o = {
                                width: Math.round(e.width),
                                height: Math.round(e.height),
                                left: Math.round(e.left),
                                top: Math.round(e.top)
                            };
                        return o.width > i.maxWidth ? o.width = Math.floor(e.width) : o.width < i.minWidth && (o.width = Math.ceil(e.width)), o.height > i.maxHeight ? o.height = Math.floor(e.height) : o.height < i.minHeight && (o.height = Math.ceil(e.height)), void 0 !== n.left && (o.left < n.left || void 0 !== n.right && o.left + o.width > n.right) && (o.left = Math.floor(n.left)), void 0 !== n.top && (o.top < n.top || void 0 !== n.bottom && o.top + o.height > n.bottom) && (o.top = Math.floor(n.top)), o
                    }(r(r({}, this.getPublicProperties()), {}, {
                        positionRestrictions: wt(this.positionRestrictions, this.visibleArea),
                        coordinates: t
                    })) : t
                },
                processAutoZoom: function (t, e, i, n) {
                    var o = this.autoZoomAlgorithm;
                    o || (o = this.stencilSize ? pt : this.autoZoom ? mt : gt);
                    var s = o({
                        event: {
                            type: t,
                            params: n
                        },
                        visibleArea: e,
                        coordinates: i,
                        boundaries: this.boundaries,
                        aspectRatio: this.getAspectRatio(),
                        positionRestrictions: this.positionRestrictions,
                        getAreaRestrictions: this.getAreaRestrictions,
                        sizeRestrictions: this.sizeRestrictions,
                        stencilSize: this.getStencilSize()
                    });
                    return r(r({}, s), {}, {
                        changed: !F(s.visibleArea, e) || !F(s.coordinates, i)
                    })
                },
                runAutoZoom: function (t) {
                    var e = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        i = e.transitions,
                        n = void 0 !== i && i,
                        o = a(e, ["transitions"]),
                        s = this.processAutoZoom(t, this.visibleArea, this.coordinates, o),
                        r = s.visibleArea,
                        h = s.coordinates,
                        c = s.changed;
                    n && c && this.enableTransitions(), this.visibleArea = r, this.coordinates = h, n && c && this.debouncedDisableTransitions()
                },
                normalizeEvent: function (t) {
                    return function (t) {
                        var e = t.event,
                            i = t.visibleArea,
                            n = t.coefficient;
                        if ("manipulateImage" === e.type) return p(p({}, e), {
                            move: {
                                left: e.move && e.move.left ? n * e.move.left : 0,
                                top: e.move && e.move.top ? n * e.move.top : 0
                            },
                            scale: {
                                factor: e.scale && e.scale.factor ? e.scale.factor : 1,
                                center: e.scale && e.scale.center ? {
                                    left: e.scale.center.left * n + i.left,
                                    top: e.scale.center.top * n + i.top
                                } : null
                            }
                        });
                        if ("resize" === e.type) {
                            var o = p(p({}, e), {
                                directions: p({}, e.directions)
                            });
                            return H.forEach((function (t) {
                                o.directions[t] *= n
                            })), o
                        }
                        if ("move" === e.type) {
                            var s = p(p({}, e), {
                                directions: p({}, e.directions)
                            });
                            return L.forEach((function (t) {
                                s.directions[t] *= n
                            })), s
                        }
                        return e
                    }(r(r({}, this.getPublicProperties()), {}, {
                        event: t
                    }))
                },
                updateCanvas: function () {
                    if (this.$refs.canvas) {
                        var t = this.$refs.canvas,
                            e = this.$refs.image,
                            i = 0 !== this.imageTransforms.rotate || this.imageTransforms.flip.horizontal || this.imageTransforms.flip.vertical ? function (t, e, i) {
                                var n = i.rotate,
                                    o = i.flip,
                                    s = {
                                        width: e.naturalWidth,
                                        height: e.naturalHeight
                                    },
                                    r = et(s, n),
                                    a = t.getContext("2d");
                                t.height = r.height, t.width = r.width, a.save();
                                var h = it(N(p({
                                    left: 0,
                                    top: 0
                                }, s)), n);
                                return a.translate(-(h.left - r.width / 2), -(h.top - r.height / 2)), a.rotate(n * Math.PI / 180), a.translate(o.horizontal ? s.width : 0, o.vertical ? s.height : 0), a.scale(o.horizontal ? -1 : 1, o.vertical ? -1 : 1), a.drawImage(e, 0, 0, s.width, s.height), a.restore(), t
                            }(this.$refs.sourceCanvas, e, this.imageTransforms) : e;
                        ! function (t, e, i, n) {
                            t.width = n ? n.width : i.width, t.height = n ? n.height : i.height;
                            var o = t.getContext("2d");
                            o.clearRect(0, 0, t.width, t.height), o.drawImage(e, i.left, i.top, i.width, i.height, 0, 0, t.width, t.height)
                        }(t, i, this.coordinates)
                    }
                },
                update: function () {
                    this.$emit("change", this.getResult())
                },
                applyTransform: function (t) {
                    var e = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
                        i = this.visibleArea && e ? rt(this.sizeRestrictions, this.visibleArea) : this.sizeRestrictions,
                        n = this.visibleArea && e ? wt(this.positionRestrictions, this.visibleArea) : this.positionRestrictions;
                    return ft({
                        transform: t,
                        coordinates: this.coordinates,
                        imageSize: this.imageSize,
                        sizeRestrictions: i,
                        positionRestrictions: n,
                        aspectRatio: this.getAspectRatio(),
                        visibleArea: this.visibleArea
                    })
                },
                resetCoordinates: function () {
                    var t = this;
                    if (this.$refs.image) {
                        this.$refs.cropper, this.$refs.image;
                        var e = this.defaultSize;
                        e || (e = this.stencilSize ? bt : vt);
                        var i = this.sizeRestrictions,
                            n = (i.minWidth, i.minHeight, i.maxWidth, i.maxHeight, [v(e) ? e({
                                boundaries: this.boundaries,
                                imageSize: this.imageSize,
                                aspectRatio: this.getAspectRatio(),
                                sizeRestrictions: this.sizeRestrictions,
                                stencilSize: this.getStencilSize(),
                                visibleArea: this.visibleArea
                            }) : e, function (e) {
                                var i = e.coordinates;
                                return r({}, v(t.defaultPosition) ? t.defaultPosition({
                                    coordinates: i,
                                    imageSize: t.imageSize,
                                    visibleArea: t.visibleArea
                                }) : t.defaultPosition)
                            }]);
                        this.delayedTransforms && n.push.apply(n, h(Array.isArray(this.delayedTransforms) ? this.delayedTransforms : [this.delayedTransforms])), this.coordinates = this.applyTransform(n, !0), this.delayedTransforms = null
                    }
                },
                clearImage: function () {
                    var t = this;
                    this.imageLoaded = !1, setTimeout((function () {
                        var e = t.$refs.stretcher;
                        e && (e.style.height = "auto", e.style.width = "auto"), t.coordinates = t.defaultCoordinates(), t.boundaries = {
                            width: 0,
                            height: 0
                        }
                    }), this.transitionTime)
                },
                enableTransitions: function () {
                    this.transitions && (this.transitionsActive = !0)
                },
                disableTransitions: function () {
                    this.transitionsActive = !1
                },
                updateBoundaries: function () {
                    var t = this,
                        e = this.$refs.stretcher,
                        i = this.$refs.cropper;
                    return this.initStretcher({
                        cropper: i,
                        stretcher: e,
                        imageSize: this.imageSize
                    }), this.$nextTick().then((function () {
                        var e = {
                            cropper: i,
                            imageSize: t.imageSize
                        };
                        if (v(t.defaultBoundaries) ? t.boundaries = t.defaultBoundaries(e) : "fit" === t.defaultBoundaries ? t.boundaries = function (t) {
                                var e = t.cropper,
                                    i = t.imageSize,
                                    n = e.clientHeight,
                                    o = e.clientWidth,
                                    s = n,
                                    r = i.width * n / i.height;
                                return r > o && (r = o, s = i.height * o / i.width), {
                                    width: r,
                                    height: s
                                }
                            }(e) : t.boundaries = function (t) {
                                var e = t.cropper;
                                return {
                                    width: e.clientWidth,
                                    height: e.clientHeight
                                }
                            }(e), !t.boundaries.width || !t.boundaries.height) throw new Error("It's impossible to fit the cropper in the current container")
                    }))
                },
                resetVisibleArea: function () {
                    var t = this;
                    return this.updateBoundaries().then((function () {
                        var e, i, n, o, s, r;
                        "visible-area" !== t.priority && (t.visibleArea = null, t.resetCoordinates()), t.visibleArea = v(t.defaultVisibleArea) ? t.defaultVisibleArea({
                            imageSize: t.imageSize,
                            boundaries: t.boundaries,
                            coordinates: "visible-area" !== t.priority ? t.coordinates : null,
                            getAreaRestrictions: t.getAreaRestrictions,
                            stencilSize: t.getStencilSize()
                        }) : t.defaultVisibleArea, t.visibleArea = (e = {
                            visibleArea: t.visibleArea,
                            boundaries: t.boundaries,
                            getAreaRestrictions: t.getAreaRestrictions
                        }, i = e.visibleArea, n = e.boundaries, o = e.getAreaRestrictions, s = p({}, i), r = G(n), s.width / s.height !== r && (s.height = s.width / r), ot(s, o({
                            visibleArea: s,
                            type: "move"
                        }))), "visible-area" === t.priority ? t.resetCoordinates() : t.coordinates = t.fitCoordinates({
                            visibleArea: t.visibleArea,
                            coordinates: t.coordinates,
                            aspectRatio: t.getAspectRatio(),
                            positionRestrictions: t.positionRestrictions,
                            sizeRestrictions: t.sizeRestrictions
                        }), t.runAutoZoom("resetVisibleArea")
                    })).catch((function () {
                        t.visibleArea = null
                    }))
                },
                updateVisibleArea: function () {
                    var t = this;
                    return this.updateBoundaries().then((function () {
                        t.visibleArea = t.fitVisibleArea({
                            imageSize: t.imageSize,
                            boundaries: t.boundaries,
                            visibleArea: t.visibleArea,
                            coordinates: t.coordinates,
                            getAreaRestrictions: t.getAreaRestrictions
                        }), t.coordinates = t.fitCoordinates({
                            visibleArea: t.visibleArea,
                            coordinates: t.coordinates,
                            aspectRatio: t.getAspectRatio(),
                            positionRestrictions: t.positionRestrictions,
                            sizeRestrictions: t.sizeRestrictions
                        }), t.runAutoZoom("updateVisibleArea")
                    })).catch((function () {
                        t.visibleArea = null
                    }))
                },
                onChange: function () {
                    var t = !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0];
                    this.$listeners && this.$listeners.change && (t && this.debounce ? this.debouncedUpdate() : this.update())
                },
                onChangeImage: function () {
                    var t, e = this;
                    if (this.imageLoaded = !1, this.delayedTransforms = null, this.src) {
                        var i = (t = this.src, new Promise((function (e) {
                            Bt(t).then((function (i) {
                                e(i ? {
                                    source: t,
                                    arrayBuffer: i,
                                    orientation: Ft(i)
                                } : {
                                    source: t,
                                    arrayBuffer: null,
                                    orientation: null
                                })
                            })).catch((function (i) {
                                console.warn(i), e({
                                    source: t,
                                    arrayBuffer: null,
                                    orientation: null
                                })
                            }))
                        })));
                        (function (t) {
                            if (g(t)) return !1;
                            var e = window.location,
                                i = /(\w+:)?(?:\/\/)([\w.-]+)?(?::(\d+))?\/?/.exec(t) || [],
                                n = {
                                    protocol: i[1] || "",
                                    host: i[2] || "",
                                    port: i[3] || ""
                                },
                                o = function (t) {
                                    return t.port || ("http" === (t.protocol || e.protocol) ? 80 : 433)
                                };
                            return !(!n.protocol && !n.host && !n.port || Boolean(n.protocol && n.protocol == e.protocol && n.host && n.host == e.host && n.host && o(n) == o(e)))
                        })(this.src) && (this.imageAttributes.crossOrigin = this.crossOrigin), setTimeout((function () {
                            i.then(e.onParseImage)
                        }), this.transitionTime)
                    } else this.clearImage()
                },
                onFailLoadImage: function () {
                    this.clearImage(), this.$emit("error")
                },
                onSuccessLoadImage: function () {
                    var t = this,
                        e = this.$refs.image;
                    e && !this.imageLoaded && (this.imageAttributes.height = e.naturalHeight, this.imageAttributes.width = e.naturalWidth, this.imageLoaded = !0, this.reset().then((function () {
                        t.$emit("ready"), t.onChange(!1)
                    })))
                },
                onParseImage: function (t) {
                    var e = this,
                        i = t.source,
                        n = t.arrayBuffer,
                        o = t.orientation;
                    n && o && g(i) ? this.imageAttributes.src = function (t) {
                        for (var e = [], i = new Uint8Array(t); i.length > 0;) {
                            var n = i.subarray(0, 8192);
                            e.push(String.fromCharCode.apply(null, Array.from ? Array.from(n) : n.slice())), i = i.subarray(8192)
                        }
                        return "data:image/jpeg;base64," + btoa(e.join(""))
                    }(n) : this.imageAttributes.src = i, this.customImageTransforms = {
                        rotate: 0,
                        flip: {
                            horizontal: !1,
                            vertical: !1
                        }
                    }, this.basicImageTransforms = r(r({}, this.customImageTransforms), function (t) {
                        var e = {
                            flip: {
                                horizontal: !1,
                                vertical: !1
                            },
                            rotate: 0
                        };
                        if (t) switch (t) {
                            case 2:
                                e.flip.horizontal = !0;
                                break;
                            case 3:
                                e.rotate = -180;
                                break;
                            case 4:
                                e.flip.vertical = !0;
                                break;
                            case 5:
                                e.rotate = 90, e.flip.vertical = !0;
                                break;
                            case 6:
                                e.rotate = 90;
                                break;
                            case 7:
                                e.rotate = 90, e.flip.horizontal = !0;
                                break;
                            case 8:
                                e.rotate = -90
                        }
                        return e
                    }(o)), this.$nextTick((function () {
                        var t = e.$refs.image;
                        t && t.complete && (! function (t) {
                            return Boolean(t.naturalWidth)
                        }(t) ? e.onFailLoadImage() : e.onSuccessLoadImage())
                    }))
                },
                onResizeEnd: function () {
                    this.runAutoZoom("resize", {
                        transitions: !0
                    })
                },
                onMoveEnd: function () {
                    this.runAutoZoom("move", {
                        transitions: !0
                    })
                },
                onMove: function (t) {
                    this.transitionsOptions.enabled || (this.coordinates = this.moveAlgorithm(r(r({}, this.getPublicProperties()), {}, {
                        positionRestrictions: wt(this.positionRestrictions, this.visibleArea),
                        coordinates: this.coordinates,
                        event: this.normalizeEvent(t)
                    })), this.onChange())
                },
                onResize: function (t) {
                    if (!this.transitionsOptions.enabled && (!this.stencilSize || this.autoZoom)) {
                        var e = this.sizeRestrictions,
                            i = Math.min(this.coordinates.width, this.coordinates.height, 20 * this.coefficient);
                        this.coordinates = this.resizeAlgorithm(r(r({}, this.getPublicProperties()), {}, {
                            positionRestrictions: wt(this.positionRestrictions, this.visibleArea),
                            sizeRestrictions: {
                                maxWidth: Math.min(e.maxWidth, this.visibleArea.width),
                                maxHeight: Math.min(e.maxHeight, this.visibleArea.height),
                                minWidth: Math.max(e.minWidth, i),
                                minHeight: Math.max(e.minHeight, i)
                            },
                            event: this.normalizeEvent(t)
                        })), this.onChange()
                    }
                },
                onManipulateImage: function (t) {
                    var e = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                    if (!this.transitionsOptions.enabled) {
                        var i = e.transitions,
                            n = void 0 !== i && i,
                            o = e.normalize,
                            s = void 0 === o || o;
                        n && this.enableTransitions();
                        var a = yt(r(r({}, this.getPublicProperties()), {}, {
                                event: s ? this.normalizeEvent(t) : t,
                                getAreaRestrictions: this.getAreaRestrictions,
                                imageRestriction: this.imageRestriction,
                                adjustStencil: !this.stencilSize && this.settings.resizeImage.adjustStencil
                            })),
                            h = a.visibleArea,
                            c = a.coordinates;
                        this.visibleArea = h, this.coordinates = c, this.runAutoZoom("manipulateImage"), this.onChange(), n && this.debouncedDisableTransitions()
                    }
                },
                onPropsChange: function () {
                    this.coordinates = this.applyTransform(this.coordinates, !0)
                },
                getAreaRestrictions: function () {
                    var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                        e = t.visibleArea,
                        i = t.type,
                        n = void 0 === i ? "move" : i;
                    return this.areaRestrictionsAlgorithm({
                        boundaries: this.boundaries,
                        imageSize: this.imageSize,
                        imageRestriction: this.imageRestriction,
                        visibleArea: e,
                        type: n
                    })
                },
                getAspectRatio: function (t) {
                    var e, i, n = this.stencilProps,
                        o = n.aspectRatio,
                        s = n.minAspectRatio,
                        r = n.maxAspectRatio;
                    if (this.$refs.stencil.aspectRatios) {
                        var a = this.$refs.stencil.aspectRatios();
                        e = a.minimum, i = a.maximum
                    }
                    if (b(e) && (e = b(o) ? s : o), b(i) && (i = b(o) ? r : o), !t && (b(e) || b(i))) {
                        var h = this.getStencilSize(),
                            c = h ? G(h) : null;
                        b(e) && (e = R(c) ? c : void 0), b(i) && (i = R(c) ? c : void 0)
                    }
                    return {
                        minimum: e,
                        maximum: i
                    }
                },
                getStencilSize: function () {
                    if (this.stencilSize) return t = {
                        currentStencilSize: {
                            width: this.stencilCoordinates.width,
                            height: this.stencilCoordinates.height
                        },
                        stencilSize: this.stencilSize,
                        boundaries: this.boundaries,
                        coefficient: this.coefficient,
                        coordinates: this.coordinates,
                        aspectRatio: this.getAspectRatio(!0)
                    }, e = t.boundaries, i = t.stencilSize, n = t.aspectRatio, Q(G(o = v(i) ? i({
                        boundaries: e,
                        aspectRatio: n
                    }) : i), n) && (o = dt({
                        sizeRestrictions: {
                            maxWidth: e.width,
                            maxHeight: e.height,
                            minWidth: 0,
                            minHeight: 0
                        },
                        width: o.width,
                        height: o.height,
                        aspectRatio: {
                            minimum: n.minimum,
                            maximum: n.maximum
                        }
                    })), (o.width > e.width || o.height > e.height) && (o = dt({
                        sizeRestrictions: {
                            maxWidth: e.width,
                            maxHeight: e.height,
                            minWidth: 0,
                            minHeight: 0
                        },
                        width: o.width,
                        height: o.height,
                        aspectRatio: {
                            minimum: G(o),
                            maximum: G(o)
                        }
                    })), o;
                    var t, e, i, n, o
                },
                getPublicProperties: function () {
                    return {
                        coefficient: this.coefficient,
                        visibleArea: this.visibleArea,
                        coordinates: this.coordinates,
                        boundaries: this.boundaries,
                        sizeRestrictions: this.sizeRestrictions,
                        positionRestrictions: this.positionRestrictions,
                        aspectRatio: this.getAspectRatio(),
                        imageRestriction: this.imageRestriction
                    }
                },
                defaultCoordinates: function () {
                    return r({}, _)
                },
                flip: function (t, e) {
                    var i = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {},
                        n = i.transitions,
                        o = void 0 === n || n;
                    if (!this.transitionsActive) {
                        o && this.enableTransitions();
                        var s = r({}, this.imageTransforms.flip),
                            a = Rt({
                                flip: {
                                    horizontal: t ? !s.horizontal : s.horizontal,
                                    vertical: e ? !s.vertical : s.vertical
                                },
                                previousFlip: s,
                                rotate: this.imageTransforms.rotate,
                                visibleArea: this.visibleArea,
                                coordinates: this.coordinates,
                                imageSize: this.imageSize,
                                positionRestrictions: this.positionRestrictions,
                                sizeRestrictions: this.sizeRestrictions,
                                getAreaRestrictions: this.getAreaRestrictions,
                                aspectRatio: this.getAspectRatio()
                            }),
                            h = a.visibleArea,
                            c = a.coordinates;
                        t && (this.customImageTransforms.flip.horizontal = !this.customImageTransforms.flip.horizontal), e && (this.customImageTransforms.flip.vertical = !this.customImageTransforms.flip.vertical), this.visibleArea = h, this.coordinates = c, this.onChange(), o && this.debouncedDisableTransitions()
                    }
                },
                rotate: function (t) {
                    var e = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        i = e.transitions,
                        n = void 0 === i || i;
                    if (!this.transitionsActive) {
                        n && this.enableTransitions();
                        var o = r({}, this.imageSize);
                        this.customImageTransforms.rotate += t;
                        var s = zt({
                                visibleArea: this.visibleArea,
                                coordinates: this.coordinates,
                                previousImageSize: o,
                                imageSize: this.imageSize,
                                angle: t,
                                positionRestrictions: this.positionRestrictions,
                                sizeRestrictions: this.sizeRestrictions,
                                getAreaRestrictions: this.getAreaRestrictions,
                                aspectRatio: this.getAspectRatio()
                            }),
                            a = s.visibleArea,
                            h = s.coordinates,
                            c = this.processAutoZoom("rotateImage", a, h);
                        a = c.visibleArea, h = c.coordinates, this.visibleArea = a, this.coordinates = h, this.onChange(), n && this.debouncedDisableTransitions()
                    }
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0),
        Jt = d("vue-preview-image"),
        Qt = W({
            render: function () {
                var t = this,
                    e = t.$createElement,
                    i = t._self._c || e;
                return i("div", {
                    class: t.classes.root,
                    style: t.wrapperStyle
                }, [i("img", {
                    ref: "image",
                    class: t.classes.image,
                    style: t.imageStyle,
                    attrs: {
                        src: t.img
                    }
                })])
            },
            staticRenderFns: []
        }, undefined, {
            name: "PreviewImage",
            props: {
                img: {
                    type: String
                },
                imageClass: {
                    type: String
                },
                width: {
                    type: Number
                },
                height: {
                    type: Number
                },
                top: {
                    type: Number
                },
                left: {
                    type: Number
                },
                previewWidth: {
                    type: Number,
                    required: !0
                },
                previewHeight: {
                    type: Number,
                    required: !0
                }
            },
            data: function () {
                return {
                    imageSize: {
                        width: 0,
                        height: 0
                    }
                }
            },
            computed: {
                classes: function () {
                    return {
                        root: Jt(),
                        image: l(Jt("image"), this.imageClass)
                    }
                },
                wrapperStyle: function () {
                    return {
                        width: "".concat(this.previewWidth, "px"),
                        height: "".concat(this.previewHeight, "px")
                    }
                },
                imageStyle: function () {
                    var t = this.previewHeight / this.height;
                    return {
                        width: "".concat(this.imageSize.width * t, "px"),
                        height: "".concat(this.imageSize.height * t, "px"),
                        left: "".concat(-this.left * t, "px"),
                        top: "".concat(-this.top * t, "px")
                    }
                }
            },
            watch: {
                img: function () {
                    this.onChangeImage()
                }
            },
            mounted: function () {
                this.onChangeImage()
            },
            methods: {
                refreshImage: function () {
                    var t = this.$refs.image;
                    this.imageSize.height = t.naturalHeight, this.imageSize.width = t.naturalWidth
                },
                onChangeImage: function () {
                    var t = this,
                        e = this.$refs.image;
                    e.complete ? this.refreshImage() : e.addEventListener("load", (function () {
                        t.refreshImage()
                    }))
                }
            }
        }, undefined, false, undefined, !1, void 0, void 0, void 0);
    n.default.component("cropper", Kt), n.default.component("rectangle-stencil", Zt), n.default.component("circle-stencil", qt), n.default.component("simple-handler", Ct), n.default.component("simple-line", Tt), t.BoundingBox = $t, t.CircleStencil = qt, t.Cropper = Kt, t.DragEvent = E, t.DraggableArea = Lt, t.DraggableElement = T, t.HandlerWrapper = D, t.LineWrapper = $, t.MoveEvent = C, t.PreviewImage = Qt, t.PreviewResult = Yt, t.RectangleStencil = Zt, t.ResizeEvent = M, t.SimpleHandler = Ct, t.SimpleLine = Tt, Object.defineProperty(t, "__esModule", {
        value: !0
    })
}));
