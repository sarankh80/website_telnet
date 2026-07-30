var e = Object.create,
    t = Object.defineProperty,
    n = Object.getOwnPropertyDescriptor,
    r = Object.getOwnPropertyNames,
    i = Object.getPrototypeOf,
    a = Object.prototype.hasOwnProperty,
    o = (e, t) => () => (
        t || (e((t = { exports: {} }).exports, t), (e = null)),
        t.exports
    ),
    s = (e, n) => {
        let r = {};
        for (var i in e) t(r, i, { get: e[i], enumerable: !0 });
        return (n || t(r, Symbol.toStringTag, { value: `Module` }), r);
    },
    c = (e, i, o, s) => {
        if ((i && typeof i == `object`) || typeof i == `function`)
            for (var c = r(i), l = 0, u = c.length, d; l < u; l++)
                ((d = c[l]),
                    !a.call(e, d) &&
                        d !== o &&
                        t(e, d, {
                            get: ((e) => i[e]).bind(null, d),
                            enumerable: !(s = n(i, d)) || s.enumerable,
                        }));
        return e;
    },
    l = (n, r, a) => (
        (a = n == null ? {} : e(i(n))),
        c(
            r || !n || !n.__esModule
                ? t(a, `default`, { value: n, enumerable: !0 })
                : a,
            n,
        )
    ),
    u = !1,
    d = !1,
    f = [],
    p = -1,
    m = !1;
function h(e) {
    v(e);
}
function g() {
    m = !0;
}
function _() {
    ((m = !1), b());
}
function v(e) {
    (f.includes(e) || f.push(e), b());
}
function y(e) {
    let t = f.indexOf(e);
    t !== -1 && t > p && f.splice(t, 1);
}
function b() {
    if (!d && !u) {
        if (m) return;
        ((u = !0), queueMicrotask(x));
    }
}
function x() {
    ((u = !1), (d = !0));
    for (let e = 0; e < f.length; e++) (f[e](), (p = e));
    ((f.length = 0), (p = -1), (d = !1));
}
var S,
    C,
    w,
    T,
    E = !0;
function ee(e) {
    ((E = !1), e(), (E = !0));
}
function te(e) {
    ((S = e.reactive),
        (w = e.release),
        (C = (t) =>
            e.effect(t, {
                scheduler: (e) => {
                    E ? h(e) : e();
                },
            })),
        (T = e.raw));
}
function ne(e) {
    C = e;
}
function re(e) {
    let t = () => {};
    return [
        (n) => {
            let r = C(n);
            return (
                e._x_effects ||
                    ((e._x_effects = new Set()),
                    (e._x_runEffects = () => {
                        e._x_effects.forEach((e) => e());
                    })),
                e._x_effects.add(r),
                (t = () => {
                    r !== void 0 && (e._x_effects.delete(r), w(r));
                }),
                r
            );
        },
        () => {
            t();
        },
    ];
}
function ie(e, t) {
    let n = !0,
        r,
        i,
        a = C(() => {
            let a = e(),
                o = JSON.stringify(a);
            if (!n && (typeof a == `object` || a !== r)) {
                let e = typeof r == `object` ? JSON.parse(i) : r;
                queueMicrotask(() => {
                    t(a, e);
                });
            }
            ((r = a), (i = o), (n = !1));
        });
    return () => w(a);
}
async function D(e) {
    g();
    try {
        (await e(), await Promise.resolve());
    } finally {
        _();
    }
}
var ae = [],
    oe = [],
    O = [];
function se(e) {
    O.push(e);
}
function ce(e, t) {
    typeof t == `function`
        ? ((e._x_cleanups ||= []), e._x_cleanups.push(t))
        : ((t = e), oe.push(t));
}
function k(e) {
    ae.push(e);
}
function le(e, t, n) {
    ((e._x_attributeCleanups ||= {}),
        e._x_attributeCleanups[t] || (e._x_attributeCleanups[t] = []),
        e._x_attributeCleanups[t].push(n));
}
function ue(e, t) {
    e._x_attributeCleanups &&
        Object.entries(e._x_attributeCleanups).forEach(([n, r]) => {
            (t === void 0 || t.includes(n)) &&
                (r.forEach((e) => e()), delete e._x_attributeCleanups[n]);
        });
}
function de(e) {
    for (e._x_effects?.forEach(y); e._x_cleanups?.length; )
        e._x_cleanups.pop()();
}
var fe = new MutationObserver(Se),
    pe = !1;
function me() {
    (fe.observe(document, {
        subtree: !0,
        childList: !0,
        attributes: !0,
        attributeOldValue: !0,
    }),
        (pe = !0));
}
function he() {
    (_e(), fe.disconnect(), (pe = !1));
}
var ge = [];
function _e() {
    let e = fe.takeRecords();
    ge.push(() => e.length > 0 && Se(e));
    let t = ge.length;
    queueMicrotask(() => {
        if (ge.length === t) for (; ge.length > 0; ) ge.shift()();
    });
}
function A(e) {
    if (!pe) return e();
    he();
    let t = e();
    return (me(), t);
}
var ve = !1,
    ye = [];
function be() {
    ve = !0;
}
function xe() {
    ((ve = !1), Se(ye), (ye = []));
}
function Se(e) {
    if (ve) {
        ye = ye.concat(e);
        return;
    }
    let t = [],
        n = new Set(),
        r = new Map(),
        i = new Map();
    for (let a = 0; a < e.length; a++)
        if (
            !e[a].target._x_ignoreMutationObserver &&
            (e[a].type === `childList` &&
                (e[a].removedNodes.forEach((e) => {
                    e.nodeType === 1 && e._x_marker && n.add(e);
                }),
                e[a].addedNodes.forEach((e) => {
                    if (e.nodeType === 1) {
                        if (n.has(e)) {
                            n.delete(e);
                            return;
                        }
                        e._x_marker || t.push(e);
                    }
                })),
            e[a].type === `attributes`)
        ) {
            let t = e[a].target,
                n = e[a].attributeName,
                o = e[a].oldValue,
                s = () => {
                    (r.has(t) || r.set(t, []),
                        r.get(t).push({ name: n, value: t.getAttribute(n) }));
                },
                c = () => {
                    (i.has(t) || i.set(t, []), i.get(t).push(n));
                };
            t.hasAttribute(n) && o === null
                ? s()
                : t.hasAttribute(n)
                  ? (c(), s())
                  : c();
        }
    (i.forEach((e, t) => {
        ue(t, e);
    }),
        r.forEach((e, t) => {
            ae.forEach((n) => n(t, e));
        }));
    for (let e of n) t.some((t) => t.contains(e)) || oe.forEach((t) => t(e));
    for (let e of t) e.isConnected && O.forEach((t) => t(e));
    ((t = null), (n = null), (r = null), (i = null));
}
function Ce(e) {
    return N(M(e));
}
function j(e, t, n) {
    return (
        (e._x_dataStack = [t, ...M(n || e)]),
        () => {
            e._x_dataStack = e._x_dataStack.filter((e) => e !== t);
        }
    );
}
function M(e) {
    return e._x_dataStack
        ? e._x_dataStack
        : typeof ShadowRoot == `function` && e instanceof ShadowRoot
          ? M(e.host)
          : e.parentNode
            ? M(e.parentNode)
            : [];
}
function N(e) {
    return new Proxy({ objects: e }, Te);
}
function we(e, t) {
    return e === null || e === Object.prototype
        ? null
        : Object.prototype.hasOwnProperty.call(e, t)
          ? e
          : we(Object.getPrototypeOf(e), t);
}
var Te = {
    ownKeys({ objects: e }) {
        return Array.from(new Set(e.flatMap((e) => Object.keys(e))));
    },
    has({ objects: e }, t) {
        return (
            t != Symbol.unscopables &&
            e.some(
                (e) =>
                    Object.prototype.hasOwnProperty.call(e, t) ||
                    Reflect.has(e, t),
            )
        );
    },
    get({ objects: e }, t, n) {
        return t == `toJSON`
            ? Ee
            : Reflect.get(e.find((e) => Reflect.has(e, t)) || {}, t, n);
    },
    set({ objects: e }, t, n, r) {
        let i;
        for (let n of e) if (((i = we(n, t)), i)) break;
        i ||= e[e.length - 1];
        let a = Object.getOwnPropertyDescriptor(i, t);
        return a?.set && a?.get ? a.set.call(r, n) || !0 : Reflect.set(i, t, n);
    },
};
function Ee() {
    return Reflect.ownKeys(this).reduce(
        (e, t) => ((e[t] = Reflect.get(this, t)), e),
        {},
    );
}
function De(e) {
    let t = (e) => typeof e == `object` && !Array.isArray(e) && e !== null,
        n = (r, i = ``) => {
            Object.entries(Object.getOwnPropertyDescriptors(r)).forEach(
                ([a, { value: o, enumerable: s }]) => {
                    if (
                        s === !1 ||
                        o === void 0 ||
                        (typeof o == `object` && o && o.__v_skip)
                    )
                        return;
                    let c = i === `` ? a : `${i}.${a}`;
                    typeof o == `object` && o && o._x_interceptor
                        ? (r[a] = o.initialize(e, c, a))
                        : t(o) && o !== r && !(o instanceof Element) && n(o, c);
                },
            );
        };
    return n(e);
}
function Oe(e, t = () => {}) {
    let n = {
        initialValue: void 0,
        _x_interceptor: !0,
        initialize(t, n, r) {
            return e(
                this.initialValue,
                () => ke(t, n),
                (e) => Ae(t, n, e),
                n,
                r,
            );
        },
    };
    return (
        t(n),
        (e) => {
            if (typeof e == `object` && e && e._x_interceptor) {
                let t = n.initialize.bind(n);
                n.initialize = (r, i, a) => {
                    let o = e.initialize(r, i, a);
                    return ((n.initialValue = o), t(r, i, a));
                };
            } else n.initialValue = e;
            return n;
        }
    );
}
function ke(e, t) {
    return t.split(`.`).reduce((e, t) => e[t], e);
}
function Ae(e, t, n) {
    if ((typeof t == `string` && (t = t.split(`.`)), t.length === 1))
        e[t[0]] = n;
    else if (t.length === 0) throw error;
    else if (e[t[0]]) return Ae(e[t[0]], t.slice(1), n);
    else return ((e[t[0]] = {}), Ae(e[t[0]], t.slice(1), n));
}
var je = {};
function P(e, t) {
    je[e] = t;
}
function Me(e, t) {
    let n = Ne(t);
    return (
        Object.entries(je).forEach(([r, i]) => {
            Object.defineProperty(e, `$${r}`, {
                get() {
                    return i(t, n);
                },
                enumerable: !1,
            });
        }),
        e
    );
}
function Ne(e) {
    let [t, n] = lt(e),
        r = { interceptor: Oe, ...t };
    return (ce(e, n), r);
}
function Pe(e, t, n, ...r) {
    try {
        return n(...r);
    } catch (n) {
        Fe(n, e, t);
    }
}
function Fe(...e) {
    return Ie(...e);
}
var Ie = Re;
function Le(e) {
    Ie = e;
}
function Re(e, t, n = void 0) {
    ((e = Object.assign(e ?? { message: `No error message given.` }, {
        el: t,
        expression: n,
    })),
        console.warn(
            `Alpine Expression Error: ${e.message}

${
    n
        ? `Expression: "` +
          n +
          `"

`
        : ``
}`,
            t,
        ),
        setTimeout(() => {
            throw e;
        }, 0));
}
var F = !0;
function ze(e) {
    let t = F;
    F = !1;
    let n = e();
    return ((F = t), n);
}
function Be(e, t, n = {}) {
    let r;
    return (I(e, t)((e) => (r = e), n), r);
}
function I(...e) {
    return Ve(...e);
}
var Ve = () => {};
function He(e) {
    Ve = e;
}
var Ue;
function We(e) {
    Ue = e;
}
function Ge(e, t) {
    let n = {};
    Me(n, e);
    let r = [n, ...M(e)],
        i = typeof t == `function` ? Ke(r, t) : Ye(r, t, e);
    return Pe.bind(null, e, t, i);
}
function Ke(e, t) {
    return (
        n = () => {},
        { scope: r = {}, params: i = [], context: a } = {},
    ) => {
        if (!F) {
            Xe(n, t, N([r, ...e]), i);
            return;
        }
        Xe(n, t.apply(N([r, ...e]), i));
    };
}
var qe = {};
function Je(e, t) {
    if (qe[e]) return qe[e];
    let n = Object.getPrototypeOf(async function () {}).constructor,
        r =
            /^[\n\s]*if.*\(.*\)/.test(e.trim()) ||
            /^(let|const)\s/.test(e.trim())
                ? `(async()=>{ ${e} })()`
                : e,
        i = (() => {
            try {
                let t = new n(
                    [`__self`, `scope`],
                    `with (scope) { __self.result = ${r} }; __self.finished = true; return __self.result;`,
                );
                return (
                    Object.defineProperty(t, "name", {
                        value: `[Alpine] ${e}`,
                    }),
                    t
                );
            } catch (n) {
                return (Fe(n, t, e), Promise.resolve());
            }
        })();
    return ((qe[e] = i), i);
}
function Ye(e, t, n) {
    let r = Je(t, n);
    return (
        i = () => {},
        { scope: a = {}, params: o = [], context: s } = {},
    ) => {
        ((r.result = void 0), (r.finished = !1));
        let c = N([a, ...e]);
        if (typeof r == `function`) {
            let e = r.call(s, r, c).catch((e) => Fe(e, n, t));
            r.finished
                ? (Xe(i, r.result, c, o, n), (r.result = void 0))
                : e
                      .then((e) => {
                          Xe(i, e, c, o, n);
                      })
                      .catch((e) => Fe(e, n, t))
                      .finally(() => (r.result = void 0));
        }
    };
}
function Xe(e, t, n, r, i) {
    if (F && typeof t == `function`) {
        let a = t.apply(n, r);
        a instanceof Promise
            ? a.then((t) => Xe(e, t, n, r)).catch((e) => Fe(e, i, t))
            : e(a);
    } else
        typeof t == `object` && t instanceof Promise
            ? t.then((t) => e(t))
            : e(t);
}
function Ze(...e) {
    return Ue(...e);
}
function Qe(e, t, n = {}) {
    let r = {};
    Me(r, e);
    let i = [r, ...M(e)],
        a = N([n.scope ?? {}, ...i]),
        o = n.params ?? [];
    if (t.includes(`await`)) {
        let e = Object.getPrototypeOf(async function () {}).constructor;
        return new e(
            [`scope`],
            `with (scope) { let __result = ${/^[\n\s]*if.*\(.*\)/.test(t.trim()) || /^(let|const)\s/.test(t.trim()) ? `(async()=>{ ${t} })()` : t}; return __result }`,
        ).call(n.context, a);
    } else {
        let e =
                /^[\n\s]*if.*\(.*\)/.test(t.trim()) ||
                /^(let|const)\s/.test(t.trim())
                    ? `(()=>{ ${t} })()`
                    : t,
            r = Function(
                [`scope`],
                `with (scope) { let __result = ${e}; return __result }`,
            ).call(n.context, a);
        return typeof r == `function` && F ? r.apply(a, o) : r;
    }
}
var $e = `x-`;
function L(e = ``) {
    return $e + e;
}
function et(e) {
    $e = e;
}
var tt = {};
function R(e, t) {
    return (
        (tt[e] = t),
        {
            before(t) {
                if (!tt[t]) {
                    console.warn(
                        String.raw`Cannot find directive \`${t}\`. \`${e}\` will use the default order of execution`,
                    );
                    return;
                }
                let n = z.indexOf(t);
                z.splice(n >= 0 ? n : z.indexOf(`DEFAULT`), 0, e);
            },
        }
    );
}
function nt(e) {
    return Object.keys(tt).includes(e);
}
function rt(e, t, n) {
    if (((t = Array.from(t)), e._x_virtualDirectives)) {
        let n = Object.entries(e._x_virtualDirectives).map(([e, t]) => ({
                name: e,
                value: t,
            })),
            r = it(n);
        ((n = n.map((e) =>
            r.find((t) => t.name === e.name)
                ? { name: `x-bind:${e.name}`, value: `"${e.value}"` }
                : e,
        )),
            (t = t.concat(n)));
    }
    let r = {};
    return t
        .map(pt((e, t) => (r[e] = t)))
        .filter(gt)
        .map(vt(r, n))
        .sort(bt)
        .map((t) => ut(e, t));
}
function it(e) {
    return Array.from(e)
        .map(pt())
        .filter((e) => !gt(e));
}
var at = !1,
    ot = new Map(),
    st = Symbol();
function ct(e) {
    at = !0;
    let t = Symbol();
    ((st = t), ot.set(t, []));
    let n = () => {
        for (; ot.get(t).length; ) ot.get(t).shift()();
        ot.delete(t);
    };
    (e(n), (at = !1), n());
}
function lt(e) {
    let t = [],
        n = (e) => t.push(e),
        [r, i] = re(e);
    return (
        t.push(i),
        [
            {
                Alpine: $n,
                effect: r,
                cleanup: n,
                evaluateLater: I.bind(I, e),
                evaluate: Be.bind(Be, e),
            },
            () => t.forEach((e) => e()),
        ]
    );
}
function ut(e, t) {
    let n = tt[t.type] || (() => {}),
        [r, i] = lt(e);
    le(e, t.original, i);
    let a = () => {
        e._x_ignore ||
            e._x_ignoreSelf ||
            (n.inline && n.inline(e, t, r),
            (n = n.bind(n, e, t, r)),
            at ? ot.get(st).push(n) : n());
    };
    return ((a.runCleanups = i), a);
}
var dt =
        (e, t) =>
        ({ name: n, value: r }) => (
            n.startsWith(e) && (n = n.replace(e, t)),
            { name: n, value: r }
        ),
    ft = (e) => e;
function pt(e = () => {}) {
    return ({ name: t, value: n }) => {
        let { name: r, value: i } = mt.reduce((e, t) => t(e), {
            name: t,
            value: n,
        });
        return (r !== t && e(r, t), { name: r, value: i });
    };
}
var mt = [];
function ht(e) {
    mt.push(e);
}
function gt({ name: e }) {
    return _t().test(e);
}
var _t = () => RegExp(`^${$e}([^:^.]+)\\b`);
function vt(e, t) {
    return ({ name: n, value: r }) => {
        n === r && (r = ``);
        let i = n.match(_t()),
            a = n.match(/:([a-zA-Z0-9\-_:]+)/),
            o = n.match(/\.[^.\]]+(?=[^\]]*$)/g) || [],
            s = t || e[n] || n;
        return {
            type: i ? i[1] : null,
            value: a ? a[1] : null,
            modifiers: o.map((e) => e.replace(`.`, ``)),
            expression: r,
            original: s,
        };
    };
}
var yt = `DEFAULT`,
    z = [
        `ignore`,
        `ref`,
        `id`,
        `data`,
        `anchor`,
        `bind`,
        `init`,
        `for`,
        `model`,
        `modelable`,
        `transition`,
        `show`,
        `if`,
        yt,
        `teleport`,
    ];
function bt(e, t) {
    let n = z.indexOf(e.type) === -1 ? yt : e.type,
        r = z.indexOf(t.type) === -1 ? yt : t.type;
    return z.indexOf(n) - z.indexOf(r);
}
function xt(e, t, n = {}, r = {}) {
    return e.dispatchEvent(
        new CustomEvent(t, {
            detail: n,
            bubbles: !0,
            composed: !0,
            cancelable: !0,
            ...r,
        }),
    );
}
function St(e, t) {
    if (typeof ShadowRoot == `function` && e instanceof ShadowRoot) {
        Array.from(e.children).forEach((e) => St(e, t));
        return;
    }
    let n = !1;
    if ((t(e, () => (n = !0)), n)) return;
    let r = e.firstElementChild;
    for (; r; ) (St(r, t, !1), (r = r.nextElementSibling));
}
function Ct(e, ...t) {
    console.warn(`Alpine Warning: ${e}`, ...t);
}
var wt = !1;
function Tt() {
    (wt &&
        Ct(
            `Alpine has already been initialized on this page. Calling Alpine.start() more than once can cause problems.`,
        ),
        (wt = !0),
        document.body ||
            Ct(
                "Unable to initialize. Trying to load Alpine before `<body>` is available. Did you forget to add `defer` in Alpine's `<script>` tag?",
            ),
        xt(document, `alpine:init`),
        xt(document, `alpine:initializing`),
        me(),
        se((e) => B(e, St)),
        ce((e) => Rt(e)),
        k((e, t) => {
            rt(e, t).forEach((e) => e());
        }),
        Array.from(document.querySelectorAll(kt().join(`,`)))
            .filter((e) => !Mt(e.parentElement, !0))
            .forEach((e) => {
                B(e);
            }),
        xt(document, `alpine:initialized`),
        setTimeout(() => {
            V();
        }));
}
var Et = [],
    Dt = [];
function Ot() {
    return Et.map((e) => e());
}
function kt() {
    return Et.concat(Dt).map((e) => e());
}
function At(e) {
    Et.push(e);
}
function jt(e) {
    Dt.push(e);
}
function Mt(e, t = !1) {
    return Nt(e, (e) => {
        if ((t ? kt() : Ot()).some((t) => e.matches(t))) return !0;
    });
}
function Nt(e, t) {
    if (e) {
        if (t(e)) return e;
        if (e._x_teleportBack) return Nt(e._x_teleportBack, t);
        if (e.parentNode instanceof ShadowRoot) return Nt(e.parentNode.host, t);
        if (e.parentElement) return Nt(e.parentElement, t);
    }
}
function Pt(e) {
    return Ot().some((t) => e.matches(t));
}
var Ft = [];
function It(e) {
    Ft.push(e);
}
var Lt = 1;
function B(e, t = St, n = () => {}) {
    Nt(e, (e) => e._x_ignore) ||
        ct(() => {
            t(e, (e, t) => {
                e._x_marker ||
                    (n(e, t),
                    Ft.forEach((n) => n(e, t)),
                    rt(e, e.attributes).forEach((e) => e()),
                    e._x_ignore || (e._x_marker = Lt++),
                    e._x_ignore && t());
            });
        });
}
function Rt(e, t = St) {
    t(e, (e) => {
        (de(e), ue(e), delete e._x_marker);
    });
}
function V() {
    [
        [`ui`, `dialog`, [`[x-dialog], [x-popover]`]],
        [`anchor`, `anchor`, [`[x-anchor]`]],
        [`sort`, `sort`, [`[x-sort]`]],
    ].forEach(([e, t, n]) => {
        nt(t) ||
            n.some((t) => {
                if (document.querySelector(t))
                    return (Ct(`found "${t}", but missing ${e} plugin`), !0);
            });
    });
}
var zt = [],
    Bt = !1;
function Vt(e = () => {}) {
    return (
        queueMicrotask(() => {
            Bt ||
                setTimeout(() => {
                    Ht();
                });
        }),
        new Promise((t) => {
            zt.push(() => {
                (e(), t());
            });
        })
    );
}
function Ht() {
    for (Bt = !1; zt.length; ) zt.shift()();
}
function Ut() {
    Bt = !0;
}
function Wt(e, t) {
    return Array.isArray(t)
        ? Kt(e, t.join(` `))
        : typeof t == `object` && t
          ? qt(e, t)
          : typeof t == `function`
            ? Wt(e, t())
            : Kt(e, t);
}
function Gt(e) {
    return e.split(/\s/).filter(Boolean);
}
function Kt(e, t) {
    return (
        (t = t === !0 ? (t = ``) : t || ``),
        ((t) => (
            e.classList.add(...t),
            () => {
                e.classList.remove(...t);
            }
        ))(
            ((t) =>
                Gt(t)
                    .filter((t) => !e.classList.contains(t))
                    .filter(Boolean))(t),
        )
    );
}
function qt(e, t) {
    let n = Object.entries(t)
            .flatMap(([e, t]) => (t ? Gt(e) : !1))
            .filter(Boolean),
        r = Object.entries(t)
            .flatMap(([e, t]) => !t && Gt(e))
            .filter(Boolean),
        i = [],
        a = [];
    return (
        r.forEach((t) => {
            e.classList.contains(t) && (e.classList.remove(t), a.push(t));
        }),
        n.forEach((t) => {
            e.classList.contains(t) || (e.classList.add(t), i.push(t));
        }),
        () => {
            (a.forEach((t) => e.classList.add(t)),
                i.forEach((t) => e.classList.remove(t)));
        }
    );
}
function Jt(e, t) {
    return typeof t == `object` && t ? Yt(e, t) : Xt(e, t);
}
function Yt(e, t) {
    let n = {};
    return (
        Object.entries(t).forEach(([t, r]) => {
            ((n[t] = e.style[t]),
                t.startsWith(`--`) || (t = Zt(t)),
                e.style.setProperty(t, r));
        }),
        setTimeout(() => {
            e.style.length === 0 && e.removeAttribute(`style`);
        }),
        () => {
            Jt(e, n);
        }
    );
}
function Xt(e, t) {
    let n = e.getAttribute(`style`, t);
    return (
        e.setAttribute(`style`, t),
        () => {
            e.setAttribute(`style`, n || ``);
        }
    );
}
function Zt(e) {
    return e.replace(/([a-z])([A-Z])/g, `$1-$2`).toLowerCase();
}
function Qt(e, t = () => {}) {
    let n = !1;
    return function () {
        n ? t.apply(this, arguments) : ((n = !0), e.apply(this, arguments));
    };
}
R(
    `transition`,
    (e, { value: t, modifiers: n, expression: r }, { evaluate: i }) => {
        (typeof r == `function` && (r = i(r)),
            r !== !1 &&
                (!r || typeof r == `boolean` ? en(e, n, t) : $t(e, r, t)));
    },
);
function $t(e, t, n) {
    (tn(e, Wt, ``),
        {
            enter: (t) => {
                e._x_transition.enter.during = t;
            },
            "enter-start": (t) => {
                e._x_transition.enter.start = t;
            },
            "enter-end": (t) => {
                e._x_transition.enter.end = t;
            },
            leave: (t) => {
                e._x_transition.leave.during = t;
            },
            "leave-start": (t) => {
                e._x_transition.leave.start = t;
            },
            "leave-end": (t) => {
                e._x_transition.leave.end = t;
            },
        }[n](t));
}
function en(e, t, n) {
    tn(e, Jt);
    let r = !t.includes(`in`) && !t.includes(`out`) && !n,
        i = r || t.includes(`in`) || [`enter`].includes(n),
        a = r || t.includes(`out`) || [`leave`].includes(n);
    (t.includes(`in`) && !r && (t = t.filter((e, n) => n < t.indexOf(`out`))),
        t.includes(`out`) &&
            !r &&
            (t = t.filter((e, n) => n > t.indexOf(`out`))));
    let o = !t.includes(`opacity`) && !t.includes(`scale`),
        s = o || t.includes(`opacity`),
        c = o || t.includes(`scale`),
        l = +!s,
        u = c ? on(t, `scale`, 95) / 100 : 1,
        d = on(t, `delay`, 0) / 1e3,
        f = on(t, `origin`, `center`),
        p = `opacity, transform`,
        m = on(t, `duration`, 150) / 1e3,
        h = on(t, `duration`, 75) / 1e3,
        g = `cubic-bezier(0.4, 0.0, 0.2, 1)`;
    (i &&
        ((e._x_transition.enter.during = {
            transformOrigin: f,
            transitionDelay: `${d}s`,
            transitionProperty: p,
            transitionDuration: `${m}s`,
            transitionTimingFunction: g,
        }),
        (e._x_transition.enter.start = {
            opacity: l,
            transform: `scale(${u})`,
        }),
        (e._x_transition.enter.end = { opacity: 1, transform: `scale(1)` })),
        a &&
            ((e._x_transition.leave.during = {
                transformOrigin: f,
                transitionDelay: `${d}s`,
                transitionProperty: p,
                transitionDuration: `${h}s`,
                transitionTimingFunction: g,
            }),
            (e._x_transition.leave.start = {
                opacity: 1,
                transform: `scale(1)`,
            }),
            (e._x_transition.leave.end = {
                opacity: l,
                transform: `scale(${u})`,
            })));
}
function tn(e, t, n = {}) {
    e._x_transition ||= {
        enter: { during: n, start: n, end: n },
        leave: { during: n, start: n, end: n },
        in(n = () => {}, r = () => {}) {
            rn(
                e,
                t,
                {
                    during: this.enter.during,
                    start: this.enter.start,
                    end: this.enter.end,
                },
                n,
                r,
            );
        },
        out(n = () => {}, r = () => {}) {
            rn(
                e,
                t,
                {
                    during: this.leave.during,
                    start: this.leave.start,
                    end: this.leave.end,
                },
                n,
                r,
            );
        },
    };
}
window.Element.prototype._x_toggleAndCascadeWithTransitions = function (
    e,
    t,
    n,
    r,
) {
    let i =
            document.visibilityState === `visible`
                ? requestAnimationFrame
                : setTimeout,
        a = () => i(n);
    if (t) {
        e._x_transition && (e._x_transition.enter || e._x_transition.leave)
            ? e._x_transition.enter &&
              (Object.entries(e._x_transition.enter.during).length ||
                  Object.entries(e._x_transition.enter.start).length ||
                  Object.entries(e._x_transition.enter.end).length)
                ? e._x_transition.in(n)
                : a()
            : e._x_transition
              ? e._x_transition.in(n)
              : a();
        return;
    }
    ((e._x_hidePromise = e._x_transition
        ? new Promise((t, n) => {
              (e._x_transition.out(
                  () => {},
                  () => t(r),
              ),
                  e._x_transitioning &&
                      e._x_transitioning.beforeCancel(() =>
                          n({ isFromCancelledTransition: !0 }),
                      ));
          })
        : Promise.resolve(r)),
        queueMicrotask(() => {
            let t = nn(e);
            t
                ? ((t._x_hideChildren ||= []), t._x_hideChildren.push(e))
                : i(() => {
                      let t = (e) => {
                          let n = Promise.all([
                              e._x_hidePromise,
                              ...(e._x_hideChildren || []).map(t),
                          ]).then(([e]) => e?.());
                          return (
                              delete e._x_hidePromise,
                              delete e._x_hideChildren,
                              n
                          );
                      };
                      t(e).catch((e) => {
                          if (!e.isFromCancelledTransition) throw e;
                      });
                  });
        }));
};
function nn(e) {
    let t = e.parentNode;
    if (t) return t._x_hidePromise ? t : nn(t);
}
function rn(
    e,
    t,
    { during: n, start: r, end: i } = {},
    a = () => {},
    o = () => {},
) {
    if (
        (e._x_transitioning && e._x_transitioning.cancel(),
        Object.keys(n).length === 0 &&
            Object.keys(r).length === 0 &&
            Object.keys(i).length === 0)
    ) {
        (a(), o());
        return;
    }
    let s, c, l;
    an(e, {
        start() {
            s = t(e, r);
        },
        during() {
            c = t(e, n);
        },
        before: a,
        end() {
            (s(), (l = t(e, i)));
        },
        after: o,
        cleanup() {
            (c(), l());
        },
    });
}
function an(e, t) {
    let n,
        r,
        i,
        a = Qt(() => {
            A(() => {
                ((n = !0),
                    r || t.before(),
                    i || (t.end(), Ht()),
                    t.after(),
                    e.isConnected && t.cleanup(),
                    delete e._x_transitioning);
            });
        });
    ((e._x_transitioning = {
        beforeCancels: [],
        beforeCancel(e) {
            this.beforeCancels.push(e);
        },
        cancel: Qt(function () {
            for (; this.beforeCancels.length; ) this.beforeCancels.shift()();
            a();
        }),
        finish: a,
    }),
        A(() => {
            (t.start(), t.during());
        }),
        Ut(),
        requestAnimationFrame(() => {
            if (n) return;
            let a =
                    Number(
                        getComputedStyle(e)
                            .transitionDuration.replace(/,.*/, ``)
                            .replace(`s`, ``),
                    ) * 1e3,
                o =
                    Number(
                        getComputedStyle(e)
                            .transitionDelay.replace(/,.*/, ``)
                            .replace(`s`, ``),
                    ) * 1e3;
            (a === 0 &&
                (a =
                    Number(
                        getComputedStyle(e).animationDuration.replace(`s`, ``),
                    ) * 1e3),
                A(() => {
                    t.before();
                }),
                (r = !0),
                requestAnimationFrame(() => {
                    n ||
                        (A(() => {
                            t.end();
                        }),
                        Ht(),
                        setTimeout(e._x_transitioning.finish, a + o),
                        (i = !0));
                }));
        }));
}
function on(e, t, n) {
    if (e.indexOf(t) === -1) return n;
    let r = e[e.indexOf(t) + 1];
    if (!r || (t === `scale` && isNaN(r))) return n;
    if (t === `duration` || t === `delay`) {
        let e = r.match(/([0-9]+)ms/);
        if (e) return e[1];
    }
    return t === `origin` &&
        [`top`, `right`, `left`, `center`, `bottom`].includes(
            e[e.indexOf(t) + 2],
        )
        ? [r, e[e.indexOf(t) + 2]].join(` `)
        : r;
}
var sn = !1;
function cn(e, t = () => {}) {
    return (...n) => (sn ? t(...n) : e(...n));
}
function ln(e) {
    return (...t) => sn && e(...t);
}
var un = [];
function dn(e) {
    un.push(e);
}
function fn(e, t) {
    (un.forEach((n) => n(e, t)),
        (sn = !0),
        gn(() => {
            B(t, (e, t) => {
                t(e, () => {});
            });
        }),
        (sn = !1));
}
var pn = !1;
function mn(e, t) {
    ((t._x_dataStack ||= e._x_dataStack),
        (sn = !0),
        (pn = !0),
        gn(() => {
            hn(t);
        }),
        (sn = !1),
        (pn = !1));
}
function hn(e) {
    let t = !1;
    B(e, (e, n) => {
        St(e, (e, r) => {
            if (t && Pt(e)) return r();
            ((t = !0), n(e, r));
        });
    });
}
function gn(e) {
    let t = C;
    (ne((e, n) => {
        let r = t(e);
        return (w(r), () => {});
    }),
        e(),
        ne(t));
}
function _n(e, t, n, r = []) {
    switch (
        ((e._x_bindings ||= S({})),
        (e._x_bindings[t] = n),
        (t = r.includes(`camel`) ? En(t) : t),
        t)
    ) {
        case `value`:
            vn(e, n);
            break;
        case `style`:
            bn(e, n);
            break;
        case `class`:
            yn(e, n);
            break;
        case `selected`:
        case `checked`:
            xn(e, t, n);
            break;
        default:
            Sn(e, t, n);
            break;
    }
}
function vn(e, t) {
    if (In(e)) e.attributes.value === void 0 && (e.value = t);
    else if (Fn(e))
        Number.isInteger(t)
            ? (e.value = t)
            : !Array.isArray(t) &&
                typeof t != `boolean` &&
                ![null, void 0].includes(t)
              ? (e.value = String(t))
              : Array.isArray(t)
                ? (e.checked = t.some((t) => Dn(t, e.value)))
                : (e.checked = !!t);
    else if (e.tagName === `SELECT`) Tn(e, t);
    else {
        if (e.value === t) return;
        e.value = t === void 0 ? `` : t;
    }
}
function yn(e, t) {
    (e._x_undoAddedClasses && e._x_undoAddedClasses(),
        (e._x_undoAddedClasses = Wt(e, t)));
}
function bn(e, t) {
    (e._x_undoAddedStyles && e._x_undoAddedStyles(),
        (e._x_undoAddedStyles = Jt(e, t)));
}
function xn(e, t, n) {
    (Sn(e, t, n), wn(e, t, n));
}
function Sn(e, t, n) {
    [null, void 0, !1].includes(n) && jn(t)
        ? e.removeAttribute(t)
        : (An(t) && (n = t), Cn(e, t, n));
}
function Cn(e, t, n) {
    e.getAttribute(t) != n && e.setAttribute(t, n);
}
function wn(e, t, n) {
    e[t] !== n && (e[t] = n);
}
function Tn(e, t) {
    let n = [].concat(t).map((e) => e + ``);
    Array.from(e.options).forEach((e) => {
        e.selected = n.includes(e.value);
    });
}
function En(e) {
    return e.toLowerCase().replace(/-(\w)/g, (e, t) => t.toUpperCase());
}
function Dn(e, t) {
    return e == t;
}
function On(e) {
    return [1, `1`, `true`, `on`, `yes`, !0].includes(e)
        ? !0
        : [0, `0`, `false`, `off`, `no`, !1].includes(e)
          ? !1
          : e
            ? !!e
            : null;
}
var kn = new Set(
    `allowfullscreen.async.autofocus.autoplay.checked.controls.default.defer.disabled.formnovalidate.inert.ismap.itemscope.loop.multiple.muted.nomodule.novalidate.open.playsinline.readonly.required.reversed.selected.shadowrootclonable.shadowrootdelegatesfocus.shadowrootserializable`.split(
        `.`,
    ),
);
function An(e) {
    return kn.has(e);
}
function jn(e) {
    return ![
        `aria-pressed`,
        `aria-checked`,
        `aria-expanded`,
        `aria-selected`,
    ].includes(e);
}
function Mn(e, t, n) {
    return e._x_bindings && e._x_bindings[t] !== void 0
        ? e._x_bindings[t]
        : Pn(e, t, n);
}
function Nn(e, t, n, r = !0) {
    if (e._x_bindings && e._x_bindings[t] !== void 0) return e._x_bindings[t];
    if (e._x_inlineBindings && e._x_inlineBindings[t] !== void 0) {
        let n = e._x_inlineBindings[t];
        return ((n.extract = r), ze(() => Be(e, n.expression)));
    }
    return Pn(e, t, n);
}
function Pn(e, t, n) {
    let r = e.getAttribute(t);
    return r === null
        ? typeof n == `function`
            ? n()
            : n
        : r === ``
          ? !0
          : An(t)
            ? !![t, `true`].includes(r)
            : r;
}
function Fn(e) {
    return (
        e.type === `checkbox` ||
        e.localName === `ui-checkbox` ||
        e.localName === `ui-switch`
    );
}
function In(e) {
    return e.type === `radio` || e.localName === `ui-radio`;
}
function Ln(e, t) {
    let n;
    return function () {
        let r = this,
            i = arguments;
        (clearTimeout(n),
            (n = setTimeout(function () {
                ((n = null), e.apply(r, i));
            }, t)));
    };
}
function Rn(e, t) {
    let n;
    return function () {
        let r = this,
            i = arguments;
        n || (e.apply(r, i), (n = !0), setTimeout(() => (n = !1), t));
    };
}
function zn({ get: e, set: t }, { get: n, set: r }) {
    let i = !0,
        a,
        o = C(() => {
            let o = e(),
                s = n();
            if (i) (r(Bn(o)), (i = !1));
            else {
                let e = JSON.stringify(o),
                    n = JSON.stringify(s);
                e === a ? e !== n && t(Bn(s)) : r(Bn(o));
            }
            ((a = JSON.stringify(e())), JSON.stringify(n()));
        });
    return () => {
        w(o);
    };
}
function Bn(e) {
    return typeof e == `object` ? JSON.parse(JSON.stringify(e)) : e;
}
function Vn(e) {
    (Array.isArray(e) ? e : [e]).forEach((e) => e($n));
}
var Hn = {},
    Un = !1;
function Wn(e, t) {
    if (((Un ||= ((Hn = S(Hn)), !0)), t === void 0)) return Hn[e];
    ((Hn[e] = t),
        De(Hn[e]),
        typeof t == `object` &&
            t &&
            t.hasOwnProperty(`init`) &&
            typeof t.init == `function` &&
            Hn[e].init());
}
function Gn() {
    return Hn;
}
var Kn = {};
function qn(e, t) {
    let n = typeof t == `function` ? t : () => t;
    return e instanceof Element ? Yn(e, n()) : ((Kn[e] = n), () => {});
}
function Jn(e) {
    return (
        Object.entries(Kn).forEach(([t, n]) => {
            Object.defineProperty(e, t, {
                get() {
                    return (...e) => n(...e);
                },
            });
        }),
        e
    );
}
function Yn(e, t, n) {
    let r = [];
    for (; r.length; ) r.pop()();
    let i = Object.entries(t).map(([e, t]) => ({ name: e, value: t })),
        a = it(i);
    return (
        (i = i.map((e) =>
            a.find((t) => t.name === e.name)
                ? { name: `x-bind:${e.name}`, value: `"${e.value}"` }
                : e,
        )),
        rt(e, i, n).map((e) => {
            (r.push(e.runCleanups), e());
        }),
        () => {
            for (; r.length; ) r.pop()();
        }
    );
}
var Xn = {};
function Zn(e, t) {
    Xn[e] = t;
}
function Qn(e, t) {
    return (
        Object.entries(Xn).forEach(([n, r]) => {
            Object.defineProperty(e, n, {
                get() {
                    return (...e) => r.bind(t)(...e);
                },
                enumerable: !1,
            });
        }),
        e
    );
}
var $n = {
    get reactive() {
        return S;
    },
    get release() {
        return w;
    },
    get effect() {
        return C;
    },
    get raw() {
        return T;
    },
    get transaction() {
        return D;
    },
    version: `3.15.12`,
    flushAndStopDeferringMutations: xe,
    dontAutoEvaluateFunctions: ze,
    disableEffectScheduling: ee,
    startObservingMutations: me,
    stopObservingMutations: he,
    setReactivityEngine: te,
    onAttributeRemoved: le,
    onAttributesAdded: k,
    closestDataStack: M,
    skipDuringClone: cn,
    onlyDuringClone: ln,
    addRootSelector: At,
    addInitSelector: jt,
    setErrorHandler: Le,
    interceptClone: dn,
    addScopeToNode: j,
    deferMutations: be,
    mapAttributes: ht,
    evaluateLater: I,
    interceptInit: It,
    initInterceptors: De,
    injectMagics: Me,
    setEvaluator: He,
    setRawEvaluator: We,
    mergeProxies: N,
    extractProp: Nn,
    findClosest: Nt,
    onElRemoved: ce,
    closestRoot: Mt,
    destroyTree: Rt,
    interceptor: Oe,
    transition: rn,
    setStyles: Jt,
    mutateDom: A,
    directive: R,
    entangle: zn,
    throttle: Rn,
    debounce: Ln,
    evaluate: Be,
    evaluateRaw: Ze,
    initTree: B,
    nextTick: Vt,
    prefixed: L,
    prefix: et,
    plugin: Vn,
    magic: P,
    store: Wn,
    start: Tt,
    clone: mn,
    cloneNode: fn,
    bound: Mn,
    $data: Ce,
    watch: ie,
    walk: St,
    data: Zn,
    bind: qn,
};
function er(e, t) {
    let n = Object.create(null),
        r = e.split(`,`);
    for (let e = 0; e < r.length; e++) n[r[e]] = !0;
    return t ? (e) => !!n[e.toLowerCase()] : (e) => !!n[e];
}
var tr = Object.freeze({});
Object.freeze([]);
var nr = Object.prototype.hasOwnProperty,
    rr = (e, t) => nr.call(e, t),
    ir = Array.isArray,
    ar = (e) => ur(e) === `[object Map]`,
    or = (e) => typeof e == `string`,
    sr = (e) => typeof e == `symbol`,
    cr = (e) => typeof e == `object` && !!e,
    lr = Object.prototype.toString,
    ur = (e) => lr.call(e),
    dr = (e) => ur(e).slice(8, -1),
    fr = (e) =>
        or(e) && e !== `NaN` && e[0] !== `-` && `` + parseInt(e, 10) === e,
    pr = ((e) => {
        let t = Object.create(null);
        return (n) => t[n] || (t[n] = e(n));
    })((e) => e.charAt(0).toUpperCase() + e.slice(1)),
    mr = (e, t) => e !== t && (e === e || t === t),
    hr = new WeakMap(),
    gr = [],
    _r,
    vr = Symbol(`iterate`),
    yr = Symbol(`Map key iterate`);
function br(e) {
    return e && e._isEffect === !0;
}
function xr(e, t = tr) {
    br(e) && (e = e.raw);
    let n = wr(e, t);
    return (t.lazy || n(), n);
}
function Sr(e) {
    e.active &&= (Tr(e), e.options.onStop && e.options.onStop(), !1);
}
var Cr = 0;
function wr(e, t) {
    let n = function () {
        if (!n.active) return e();
        if (!gr.includes(n)) {
            Tr(n);
            try {
                return (kr(), gr.push(n), (_r = n), e());
            } finally {
                (gr.pop(), Ar(), (_r = gr[gr.length - 1]));
            }
        }
    };
    return (
        (n.id = Cr++),
        (n.allowRecurse = !!t.allowRecurse),
        (n._isEffect = !0),
        (n.active = !0),
        (n.raw = e),
        (n.deps = []),
        (n.options = t),
        n
    );
}
function Tr(e) {
    let { deps: t } = e;
    if (t.length) {
        for (let n = 0; n < t.length; n++) t[n].delete(e);
        t.length = 0;
    }
}
var Er = !0,
    Dr = [];
function Or() {
    (Dr.push(Er), (Er = !1));
}
function kr() {
    (Dr.push(Er), (Er = !0));
}
function Ar() {
    let e = Dr.pop();
    Er = e === void 0 || e;
}
function jr(e, t, n) {
    if (!Er || _r === void 0) return;
    let r = hr.get(e);
    r || hr.set(e, (r = new Map()));
    let i = r.get(n);
    (i || r.set(n, (i = new Set())),
        i.has(_r) ||
            (i.add(_r),
            _r.deps.push(i),
            _r.options.onTrack &&
                _r.options.onTrack({
                    effect: _r,
                    target: e,
                    type: t,
                    key: n,
                })));
}
function Mr(e, t, n, r, i, a) {
    let o = hr.get(e);
    if (!o) return;
    let s = new Set(),
        c = (e) => {
            e &&
                e.forEach((e) => {
                    (e !== _r || e.allowRecurse) && s.add(e);
                });
        };
    if (t === `clear`) o.forEach(c);
    else if (n === `length` && ir(e))
        o.forEach((e, t) => {
            (t === `length` || t >= r) && c(e);
        });
    else
        switch ((n !== void 0 && c(o.get(n)), t)) {
            case `add`:
                ir(e)
                    ? fr(n) && c(o.get(`length`))
                    : (c(o.get(vr)), ar(e) && c(o.get(yr)));
                break;
            case `delete`:
                ir(e) || (c(o.get(vr)), ar(e) && c(o.get(yr)));
                break;
            case `set`:
                ar(e) && c(o.get(vr));
                break;
        }
    s.forEach((o) => {
        (o.options.onTrigger &&
            o.options.onTrigger({
                effect: o,
                target: e,
                key: n,
                type: t,
                newValue: r,
                oldValue: i,
                oldTarget: a,
            }),
            o.options.scheduler ? o.options.scheduler(o) : o());
    });
}
var Nr = er(`__proto__,__v_isRef,__isVue`),
    Pr = new Set(
        Object.getOwnPropertyNames(Symbol)
            .map((e) => Symbol[e])
            .filter(sr),
    ),
    Fr = zr(),
    Ir = zr(!0),
    Lr = Rr();
function Rr() {
    let e = {};
    return (
        [`includes`, `indexOf`, `lastIndexOf`].forEach((t) => {
            e[t] = function (...e) {
                let n = H(this);
                for (let e = 0, t = this.length; e < t; e++)
                    jr(n, `get`, e + ``);
                let r = n[t](...e);
                return r === -1 || r === !1 ? n[t](...e.map(H)) : r;
            };
        }),
        [`push`, `pop`, `shift`, `unshift`, `splice`].forEach((t) => {
            e[t] = function (...e) {
                Or();
                let n = H(this)[t].apply(this, e);
                return (Ar(), n);
            };
        }),
        e
    );
}
function zr(e = !1, t = !1) {
    return function (n, r, i) {
        if (r === `__v_isReactive`) return !e;
        if (r === `__v_isReadonly`) return e;
        if (r === `__v_raw` && i === (e ? (t ? yi : vi) : t ? _i : gi).get(n))
            return n;
        let a = ir(n);
        if (!e && a && rr(Lr, r)) return Reflect.get(Lr, r, i);
        let o = Reflect.get(n, r, i);
        return (sr(r) ? Pr.has(r) : Nr(r)) || (e || jr(n, `get`, r), t)
            ? o
            : Ti(o)
              ? !a || !fr(r)
                  ? o.value
                  : o
              : cr(o)
                ? e
                    ? Ci(o)
                    : Si(o)
                : o;
    };
}
var Br = Vr();
function Vr(e = !1) {
    return function (t, n, r, i) {
        let a = t[n];
        if (!e && ((r = H(r)), (a = H(a)), !ir(t) && Ti(a) && !Ti(r)))
            return ((a.value = r), !0);
        let o = ir(t) && fr(n) ? Number(n) < t.length : rr(t, n),
            s = Reflect.set(t, n, r, i);
        return (
            t === H(i) &&
                (o ? mr(r, a) && Mr(t, `set`, n, r, a) : Mr(t, `add`, n, r)),
            s
        );
    };
}
function Hr(e, t) {
    let n = rr(e, t),
        r = e[t],
        i = Reflect.deleteProperty(e, t);
    return (i && n && Mr(e, `delete`, t, void 0, r), i);
}
function Ur(e, t) {
    let n = Reflect.has(e, t);
    return ((!sr(t) || !Pr.has(t)) && jr(e, `has`, t), n);
}
function Wr(e) {
    return (jr(e, `iterate`, ir(e) ? `length` : vr), Reflect.ownKeys(e));
}
var Gr = { get: Fr, set: Br, deleteProperty: Hr, has: Ur, ownKeys: Wr },
    Kr = {
        get: Ir,
        set(e, t) {
            return (
                console.warn(
                    `Set operation on key "${String(t)}" failed: target is readonly.`,
                    e,
                ),
                !0
            );
        },
        deleteProperty(e, t) {
            return (
                console.warn(
                    `Delete operation on key "${String(t)}" failed: target is readonly.`,
                    e,
                ),
                !0
            );
        },
    },
    qr = (e) => (cr(e) ? Si(e) : e),
    Jr = (e) => (cr(e) ? Ci(e) : e),
    Yr = (e) => e,
    Xr = (e) => Reflect.getPrototypeOf(e);
function Zr(e, t, n = !1, r = !1) {
    e = e.__v_raw;
    let i = H(e),
        a = H(t);
    (t !== a && !n && jr(i, `get`, t), !n && jr(i, `get`, a));
    let { has: o } = Xr(i),
        s = r ? Yr : n ? Jr : qr;
    if (o.call(i, t)) return s(e.get(t));
    if (o.call(i, a)) return s(e.get(a));
    e !== i && e.get(t);
}
function Qr(e, t = !1) {
    let n = this.__v_raw,
        r = H(n),
        i = H(e);
    return (
        e !== i && !t && jr(r, `has`, e),
        !t && jr(r, `has`, i),
        e === i ? n.has(e) : n.has(e) || n.has(i)
    );
}
function $r(e, t = !1) {
    return (
        (e = e.__v_raw),
        !t && jr(H(e), `iterate`, vr),
        Reflect.get(e, `size`, e)
    );
}
function ei(e) {
    e = H(e);
    let t = H(this);
    return (Xr(t).has.call(t, e) || (t.add(e), Mr(t, `add`, e, e)), this);
}
function ti(e, t) {
    t = H(t);
    let n = H(this),
        { has: r, get: i } = Xr(n),
        a = r.call(n, e);
    a ? hi(n, r, e) : ((e = H(e)), (a = r.call(n, e)));
    let o = i.call(n, e);
    return (
        n.set(e, t),
        a ? mr(t, o) && Mr(n, `set`, e, t, o) : Mr(n, `add`, e, t),
        this
    );
}
function ni(e) {
    let t = H(this),
        { has: n, get: r } = Xr(t),
        i = n.call(t, e);
    i ? hi(t, n, e) : ((e = H(e)), (i = n.call(t, e)));
    let a = r ? r.call(t, e) : void 0,
        o = t.delete(e);
    return (i && Mr(t, `delete`, e, void 0, a), o);
}
function ri() {
    let e = H(this),
        t = e.size !== 0,
        n = ar(e) ? new Map(e) : new Set(e),
        r = e.clear();
    return (t && Mr(e, `clear`, void 0, void 0, n), r);
}
function ii(e, t) {
    return function (n, r) {
        let i = this,
            a = i.__v_raw,
            o = H(a),
            s = t ? Yr : e ? Jr : qr;
        return (
            !e && jr(o, `iterate`, vr),
            a.forEach((e, t) => n.call(r, s(e), s(t), i))
        );
    };
}
function ai(e, t, n) {
    return function (...r) {
        let i = this.__v_raw,
            a = H(i),
            o = ar(a),
            s = e === `entries` || (e === Symbol.iterator && o),
            c = e === `keys` && o,
            l = i[e](...r),
            u = n ? Yr : t ? Jr : qr;
        return (
            !t && jr(a, `iterate`, c ? yr : vr),
            {
                next() {
                    let { value: e, done: t } = l.next();
                    return t
                        ? { value: e, done: t }
                        : { value: s ? [u(e[0]), u(e[1])] : u(e), done: t };
                },
                [Symbol.iterator]() {
                    return this;
                },
            }
        );
    };
}
function oi(e) {
    return function (...t) {
        {
            let n = t[0] ? `on key "${t[0]}" ` : ``;
            console.warn(
                `${pr(e)} operation ${n}failed: target is readonly.`,
                H(this),
            );
        }
        return e !== `delete` && this;
    };
}
function si() {
    let e = {
            get(e) {
                return Zr(this, e);
            },
            get size() {
                return $r(this);
            },
            has: Qr,
            add: ei,
            set: ti,
            delete: ni,
            clear: ri,
            forEach: ii(!1, !1),
        },
        t = {
            get(e) {
                return Zr(this, e, !1, !0);
            },
            get size() {
                return $r(this);
            },
            has: Qr,
            add: ei,
            set: ti,
            delete: ni,
            clear: ri,
            forEach: ii(!1, !0),
        },
        n = {
            get(e) {
                return Zr(this, e, !0);
            },
            get size() {
                return $r(this, !0);
            },
            has(e) {
                return Qr.call(this, e, !0);
            },
            add: oi(`add`),
            set: oi(`set`),
            delete: oi(`delete`),
            clear: oi(`clear`),
            forEach: ii(!0, !1),
        },
        r = {
            get(e) {
                return Zr(this, e, !0, !0);
            },
            get size() {
                return $r(this, !0);
            },
            has(e) {
                return Qr.call(this, e, !0);
            },
            add: oi(`add`),
            set: oi(`set`),
            delete: oi(`delete`),
            clear: oi(`clear`),
            forEach: ii(!0, !0),
        };
    return (
        [`keys`, `values`, `entries`, Symbol.iterator].forEach((i) => {
            ((e[i] = ai(i, !1, !1)),
                (n[i] = ai(i, !0, !1)),
                (t[i] = ai(i, !1, !0)),
                (r[i] = ai(i, !0, !0)));
        }),
        [e, n, t, r]
    );
}
var [ci, li, ui, di] = si();
function fi(e, t) {
    let n = t ? (e ? di : ui) : e ? li : ci;
    return (t, r, i) =>
        r === `__v_isReactive`
            ? !e
            : r === `__v_isReadonly`
              ? e
              : r === `__v_raw`
                ? t
                : Reflect.get(rr(n, r) && r in t ? n : t, r, i);
}
var pi = { get: fi(!1, !1) },
    mi = { get: fi(!0, !1) };
function hi(e, t, n) {
    let r = H(n);
    if (r !== n && t.call(e, r)) {
        let t = dr(e);
        console.warn(
            `Reactive ${t} contains both the raw and reactive versions of the same object${t === `Map` ? ` as keys` : ``}, which can lead to inconsistencies. Avoid differentiating between the raw and reactive versions of an object and only use the reactive version if possible.`,
        );
    }
}
var gi = new WeakMap(),
    _i = new WeakMap(),
    vi = new WeakMap(),
    yi = new WeakMap();
function bi(e) {
    switch (e) {
        case `Object`:
        case `Array`:
            return 1;
        case `Map`:
        case `Set`:
        case `WeakMap`:
        case `WeakSet`:
            return 2;
        default:
            return 0;
    }
}
function xi(e) {
    return e.__v_skip || !Object.isExtensible(e) ? 0 : bi(dr(e));
}
function Si(e) {
    return e && e.__v_isReadonly ? e : wi(e, !1, Gr, pi, gi);
}
function Ci(e) {
    return wi(e, !0, Kr, mi, vi);
}
function wi(e, t, n, r, i) {
    if (!cr(e))
        return (console.warn(`value cannot be made reactive: ${String(e)}`), e);
    if (e.__v_raw && !(t && e.__v_isReactive)) return e;
    let a = i.get(e);
    if (a) return a;
    let o = xi(e);
    if (o === 0) return e;
    let s = new Proxy(e, o === 2 ? r : n);
    return (i.set(e, s), s);
}
function H(e) {
    return (e && H(e.__v_raw)) || e;
}
function Ti(e) {
    return !!(e && e.__v_isRef === !0);
}
(P(`nextTick`, () => Vt),
    P(`dispatch`, (e) => xt.bind(xt, e)),
    P(`watch`, (e, { evaluateLater: t, cleanup: n }) => (e, r) => {
        let i = t(e);
        n(
            ie(() => {
                let e;
                return (i((t) => (e = t)), e);
            }, r),
        );
    }),
    P(`store`, Gn),
    P(`data`, (e) => Ce(e)),
    P(`root`, (e) => Mt(e)),
    P(`refs`, (e) => ((e._x_refs_proxy ||= N(Ei(e))), e._x_refs_proxy)));
function Ei(e) {
    let t = [];
    return (
        Nt(e, (e) => {
            e._x_refs && t.push(e._x_refs);
        }),
        t
    );
}
var Di = {};
function Oi(e) {
    return (Di[e] || (Di[e] = 0), ++Di[e]);
}
function ki(e, t) {
    return Nt(e, (e) => {
        if (e._x_ids && e._x_ids[t]) return !0;
    });
}
function Ai(e, t) {
    ((e._x_ids ||= {}), e._x_ids[t] || (e._x_ids[t] = Oi(t)));
}
(P(
    `id`,
    (e, { cleanup: t }) =>
        (n, r = null) =>
            ji(e, `${n}${r ? `-${r}` : ``}`, t, () => {
                let t = ki(e, n),
                    i = t ? t._x_ids[n] : Oi(n);
                return r ? `${n}-${i}-${r}` : `${n}-${i}`;
            }),
),
    dn((e, t) => {
        e._x_id && (t._x_id = e._x_id);
    }));
function ji(e, t, n, r) {
    if (((e._x_id ||= {}), e._x_id[t])) return e._x_id[t];
    let i = r();
    return (
        (e._x_id[t] = i),
        n(() => {
            delete e._x_id[t];
        }),
        i
    );
}
(P(`el`, (e) => e),
    Mi(`Focus`, `focus`, `focus`),
    Mi(`Persist`, `persist`, `persist`));
function Mi(e, t, n) {
    P(t, (r) =>
        Ct(
            `You can't use [$${t}] without first installing the "${e}" plugin here: https://alpinejs.dev/plugins/${n}`,
            r,
        ),
    );
}
(R(
    `modelable`,
    (e, { expression: t }, { effect: n, evaluateLater: r, cleanup: i }) => {
        let a = r(t),
            o = () => {
                let e;
                return (a((t) => (e = t)), e);
            },
            s = r(`${t} = __placeholder`),
            c = (e) => s(() => {}, { scope: { __placeholder: e } });
        (c(o()),
            queueMicrotask(() => {
                if (!e._x_model) return;
                e._x_removeModelListeners.default();
                let t = e._x_model.get,
                    n = e._x_model.setWithModifiers;
                i(
                    zn(
                        {
                            get() {
                                return t();
                            },
                            set(e) {
                                n(e);
                            },
                        },
                        {
                            get() {
                                return o();
                            },
                            set(e) {
                                c(e);
                            },
                        },
                    ),
                );
            }));
    },
),
    R(`teleport`, (e, { modifiers: t, expression: n }, { cleanup: r }) => {
        e.tagName.toLowerCase() !== `template` &&
            Ct(`x-teleport can only be used on a <template> tag`, e);
        let i = Pi(n),
            a = e.content.cloneNode(!0).firstElementChild;
        ((e._x_teleport = a),
            (a._x_teleportBack = e),
            e.setAttribute(`data-teleport-template`, !0),
            a.setAttribute(`data-teleport-target`, !0),
            e._x_forwardEvents &&
                e._x_forwardEvents.forEach((t) => {
                    a.addEventListener(t, (t) => {
                        (t.stopPropagation(),
                            e.dispatchEvent(new t.constructor(t.type, t)));
                    });
                }),
            j(a, {}, e));
        let o = (e, t, n) => {
            n.includes(`prepend`)
                ? t.parentNode.insertBefore(e, t)
                : n.includes(`append`)
                  ? t.parentNode.insertBefore(e, t.nextSibling)
                  : t.appendChild(e);
        };
        (A(() => {
            cn(() => {
                (o(a, i, t), B(a));
            })();
        }),
            (e._x_teleportPutBack = () => {
                let r = Pi(n);
                A(() => {
                    o(e._x_teleport, r, t);
                });
            }),
            r(() =>
                A(() => {
                    (a.remove(), Rt(a));
                }),
            ));
    }));
var Ni = document.createElement(`div`);
function Pi(e) {
    let t = cn(
        () => document.querySelector(e),
        () => Ni,
    )();
    return (t || Ct(`Cannot find x-teleport element for selector: "${e}"`), t);
}
var Fi = () => {};
((Fi.inline = (e, { modifiers: t }, { cleanup: n }) => {
    (t.includes(`self`) ? (e._x_ignoreSelf = !0) : (e._x_ignore = !0),
        n(() => {
            t.includes(`self`) ? delete e._x_ignoreSelf : delete e._x_ignore;
        }));
}),
    R(`ignore`, Fi),
    R(
        `effect`,
        cn((e, { expression: t }, { effect: n }) => {
            n(I(e, t));
        }),
    ));
function Ii(e, t, n, r) {
    let i = e,
        a = (e) => r(e),
        o = {},
        s = (e, t) => (n) => t(e, n);
    return (
        n.includes(`dot`) && (t = Ri(t)),
        n.includes(`camel`) && (t = zi(t)),
        n.includes(`capture`) && (o.capture = !0),
        n.includes(`window`) && (i = window),
        n.includes(`document`) && (i = document),
        n.includes(`passive`) &&
            (o.passive = n[n.indexOf(`passive`) + 1] !== `false`),
        (a = Li(n, a)),
        n.includes(`prevent`) &&
            (a = s(a, (e, t) => {
                (t.preventDefault(), e(t));
            })),
        n.includes(`stop`) &&
            (a = s(a, (e, t) => {
                (t.stopPropagation(), e(t));
            })),
        n.includes(`once`) &&
            (a = s(a, (e, n) => {
                (e(n), i.removeEventListener(t, a, o));
            })),
        (n.includes(`away`) || n.includes(`outside`)) &&
            ((i = document),
            (a = s(a, (t, n) => {
                e.contains(n.target) ||
                    (n.target.isConnected !== !1 &&
                        ((e.offsetWidth < 1 && e.offsetHeight < 1) ||
                            (e._x_isShown !== !1 && t(n))));
            }))),
        n.includes(`self`) &&
            (a = s(a, (t, n) => {
                n.target === e && t(n);
            })),
        t === `submit` &&
            (a = s(a, (e, t) => {
                (t.target._x_pendingModelUpdates &&
                    t.target._x_pendingModelUpdates.forEach((e) => e()),
                    e(t));
            })),
        (Hi(t) || Ui(t)) &&
            (a = s(a, (e, t) => {
                Wi(t, n) || e(t);
            })),
        i.addEventListener(t, a, o),
        () => {
            i.removeEventListener(t, a, o);
        }
    );
}
function Li(e, t) {
    if (e.includes(`debounce`)) {
        let n = e[e.indexOf(`debounce`) + 1] || `invalid-wait`,
            r = Bi(n.split(`ms`)[0]) ? Number(n.split(`ms`)[0]) : 250;
        t = Ln(t, r);
    }
    if (e.includes(`throttle`)) {
        let n = e[e.indexOf(`throttle`) + 1] || `invalid-wait`,
            r = Bi(n.split(`ms`)[0]) ? Number(n.split(`ms`)[0]) : 250;
        t = Rn(t, r);
    }
    return t;
}
function Ri(e) {
    return e.replace(/-/g, `.`);
}
function zi(e) {
    return e.toLowerCase().replace(/-(\w)/g, (e, t) => t.toUpperCase());
}
function Bi(e) {
    return !Array.isArray(e) && !isNaN(e);
}
function Vi(e) {
    return [` `, `_`].includes(e)
        ? e
        : e
              .replace(/([a-z])([A-Z])/g, `$1-$2`)
              .replace(/[_\s]/, `-`)
              .toLowerCase();
}
function Hi(e) {
    return [`keydown`, `keyup`].includes(e);
}
function Ui(e) {
    return [`contextmenu`, `click`, `mouse`].some((t) => e.includes(t));
}
function Wi(e, t) {
    let n = t.filter(
        (e) =>
            ![
                `window`,
                `document`,
                `prevent`,
                `stop`,
                `once`,
                `capture`,
                `self`,
                `away`,
                `outside`,
                `passive`,
                `preserve-scroll`,
                `blur`,
                `change`,
                `lazy`,
            ].includes(e),
    );
    if (n.includes(`debounce`)) {
        let e = n.indexOf(`debounce`);
        n.splice(e, Bi((n[e + 1] || `invalid-wait`).split(`ms`)[0]) ? 2 : 1);
    }
    if (n.includes(`throttle`)) {
        let e = n.indexOf(`throttle`);
        n.splice(e, Bi((n[e + 1] || `invalid-wait`).split(`ms`)[0]) ? 2 : 1);
    }
    if (n.length === 0 || (n.length === 1 && Gi(e.key).includes(n[0])))
        return !1;
    let r = [`ctrl`, `shift`, `alt`, `meta`, `cmd`, `super`].filter((e) =>
        n.includes(e),
    );
    return (
        (n = n.filter((e) => !r.includes(e))),
        !(
            r.length > 0 &&
            r.filter(
                (t) => (
                    (t === `cmd` || t === `super`) && (t = `meta`),
                    e[`${t}Key`]
                ),
            ).length === r.length &&
            (Ui(e.type) || Gi(e.key).includes(n[0]))
        )
    );
}
function Gi(e) {
    if (!e) return [];
    e = Vi(e);
    let t = {
        ctrl: `control`,
        slash: `/`,
        space: ` `,
        spacebar: ` `,
        cmd: `meta`,
        esc: `escape`,
        up: `arrow-up`,
        down: `arrow-down`,
        left: `arrow-left`,
        right: `arrow-right`,
        period: `.`,
        comma: `,`,
        equal: `=`,
        minus: `-`,
        underscore: `_`,
    };
    return (
        (t[e] = e),
        Object.keys(t)
            .map((n) => {
                if (t[n] === e) return n;
            })
            .filter((e) => e)
    );
}
R(`model`, (e, { modifiers: t, expression: n }, { effect: r, cleanup: i }) => {
    let a = e;
    t.includes(`parent`) && (a = Nt(e, (t) => t !== e));
    let o = I(a, n),
        s;
    s =
        typeof n == `string`
            ? I(a, `${n} = __placeholder`)
            : typeof n == `function` && typeof n() == `string`
              ? I(a, `${n()} = __placeholder`)
              : () => {};
    let c = () => {
            let e;
            return (o((t) => (e = t)), Xi(e) ? e.get() : e);
        },
        l = (e) => {
            let t;
            (o((e) => (t = e)),
                Xi(t)
                    ? t.set(e)
                    : s(() => {}, { scope: { __placeholder: e } }));
        };
    typeof n == `string` &&
        e.type === `radio` &&
        A(() => {
            e.hasAttribute(`name`) || e.setAttribute(`name`, n);
        });
    let u = t.includes(`change`) || t.includes(`lazy`),
        d = t.includes(`blur`),
        f = t.includes(`enter`),
        p = u || d || f,
        m;
    if (sn) m = () => {};
    else if (p) {
        let n = [],
            r = (n) => l(Ki(e, t, n, c()));
        if (
            (u && n.push(Ii(e, `change`, t, r)),
            d && (n.push(Ii(e, `blur`, t, r)), e.form))
        ) {
            let t = e.form,
                n = () => r({ target: e });
            ((t._x_pendingModelUpdates ||= []),
                t._x_pendingModelUpdates.push(n),
                i(() => {
                    t._x_pendingModelUpdates &&
                        t._x_pendingModelUpdates.splice(
                            t._x_pendingModelUpdates.indexOf(n),
                            1,
                        );
                }));
        }
        (f &&
            n.push(
                Ii(e, `keydown`, t, (e) => {
                    e.key === `Enter` && r(e);
                }),
            ),
            (m = () => n.forEach((e) => e())));
    } else
        m = Ii(
            e,
            e.tagName.toLowerCase() === `select` ||
                [`checkbox`, `radio`].includes(e.type)
                ? `change`
                : `input`,
            t,
            (n) => {
                l(Ki(e, t, n, c()));
            },
        );
    if (
        (t.includes(`fill`) &&
            ([void 0, null, ``].includes(c()) ||
                (Fn(e) && Array.isArray(c())) ||
                (e.tagName.toLowerCase() === `select` && e.multiple)) &&
            l(Ki(e, t, { target: e }, c())),
        (e._x_removeModelListeners ||= {}),
        (e._x_removeModelListeners.default = m),
        i(() => e._x_removeModelListeners.default()),
        e.form)
    ) {
        let n = Ii(e.form, `reset`, [], (n) => {
            Vt(
                () =>
                    e._x_model && e._x_model.set(Ki(e, t, { target: e }, c())),
            );
        });
        i(() => n());
    }
    ((e._x_model = {
        get() {
            return c();
        },
        set(e) {
            l(e);
        },
        setWithModifiers: Li(t, l),
    }),
        (e._x_forceModelUpdate = (t) => {
            (t === void 0 && typeof n == `string` && n.match(/\./) && (t = ``),
                A(() => {
                    Fn(e)
                        ? Array.isArray(t)
                            ? (e.checked = t.some((t) => t == e.value))
                            : (e.checked = !!t)
                        : In(e)
                          ? typeof t == `boolean`
                              ? (e.checked = On(e.value) === t)
                              : (e.checked = e.value == t)
                          : _n(e, `value`, t);
                }));
        }),
        r(() => {
            let n = c();
            (t.includes(`unintrusive`) &&
                document.activeElement.isSameNode(e)) ||
                e._x_forceModelUpdate(n);
        }));
});
function Ki(e, t, n, r) {
    return A(() => {
        if (n instanceof CustomEvent && n.detail !== void 0)
            return n.detail !== null && n.detail !== void 0
                ? n.detail
                : n.target.value;
        if (Fn(e))
            if (Array.isArray(r)) {
                let e = null;
                return (
                    (e = t.includes(`number`)
                        ? qi(n.target.value)
                        : t.includes(`boolean`)
                          ? On(n.target.value)
                          : n.target.value),
                    n.target.checked
                        ? r.includes(e)
                            ? r
                            : r.concat([e])
                        : r.filter((t) => !Ji(t, e))
                );
            } else return n.target.checked;
        else if (e.tagName.toLowerCase() === `select` && e.multiple)
            return t.includes(`number`)
                ? Array.from(n.target.selectedOptions).map((e) =>
                      qi(e.value || e.text),
                  )
                : t.includes(`boolean`)
                  ? Array.from(n.target.selectedOptions).map((e) =>
                        On(e.value || e.text),
                    )
                  : Array.from(n.target.selectedOptions).map(
                        (e) => e.value || e.text,
                    );
        else {
            let i;
            return (
                (i = In(e)
                    ? n.target.checked
                        ? n.target.value
                        : r
                    : n.target.value),
                t.includes(`number`)
                    ? qi(i)
                    : t.includes(`boolean`)
                      ? On(i)
                      : t.includes(`trim`)
                        ? i.trim()
                        : i
            );
        }
    });
}
function qi(e) {
    let t = e ? parseFloat(e) : null;
    return Yi(t) ? t : e;
}
function Ji(e, t) {
    return e == t;
}
function Yi(e) {
    return !Array.isArray(e) && !isNaN(e);
}
function Xi(e) {
    return (
        typeof e == `object` &&
        !!e &&
        typeof e.get == `function` &&
        typeof e.set == `function`
    );
}
(R(`cloak`, (e) =>
    queueMicrotask(() => A(() => e.removeAttribute(L(`cloak`)))),
),
    jt(() => `[${L(`init`)}]`),
    R(
        `init`,
        cn((e, { expression: t }, { evaluate: n }) =>
            typeof t == `string` ? !!t.trim() && n(t, {}, !1) : n(t, {}, !1),
        ),
    ),
    R(`text`, (e, { expression: t }, { effect: n, evaluateLater: r }) => {
        let i = r(t);
        n(() => {
            i((t) => {
                A(() => {
                    e.textContent = t;
                });
            });
        });
    }),
    R(`html`, (e, { expression: t }, { effect: n, evaluateLater: r }) => {
        let i = r(t);
        n(() => {
            i((t) => {
                A(() => {
                    ((e.innerHTML = t ?? ``),
                        (e._x_ignoreSelf = !0),
                        B(e),
                        delete e._x_ignoreSelf);
                });
            });
        });
    }),
    ht(dt(`:`, ft(L(`bind:`)))));
var Zi = (
    e,
    { value: t, modifiers: n, expression: r, original: i },
    { effect: a, cleanup: o },
) => {
    if (!t) {
        let t = {};
        (Jn(t),
            I(e, r)(
                (t) => {
                    Yn(e, t, i);
                },
                { scope: t },
            ));
        return;
    }
    if (t === `key`) return Qi(e, r);
    if (
        e._x_inlineBindings &&
        e._x_inlineBindings[t] &&
        e._x_inlineBindings[t].extract
    )
        return;
    let s = I(e, r);
    (a(() =>
        s((i) => {
            (i === void 0 && typeof r == `string` && r.match(/\./) && (i = ``),
                A(() => _n(e, t, i, n)));
        }),
    ),
        o(() => {
            (e._x_undoAddedClasses && e._x_undoAddedClasses(),
                e._x_undoAddedStyles && e._x_undoAddedStyles());
        }));
};
((Zi.inline = (e, { value: t, modifiers: n, expression: r }) => {
    t &&
        ((e._x_inlineBindings ||= {}),
        (e._x_inlineBindings[t] = { expression: r, extract: !1 }));
}),
    R(`bind`, Zi));
function Qi(e, t) {
    e._x_keyExpression = t;
}
(At(() => `[${L(`data`)}]`),
    R(`data`, (e, { expression: t }, { cleanup: n }) => {
        if ($i(e)) return;
        t = t === `` ? `{}` : t;
        let r = {};
        Me(r, e);
        let i = {};
        Qn(i, r);
        let a = Be(e, t, { scope: i });
        ((a === void 0 || a === !0) && (a = {}), Me(a, e));
        let o = S(a);
        De(o);
        let s = j(e, o);
        (o.init && Be(e, o.init),
            n(() => {
                (o.destroy && Be(e, o.destroy), s());
            }));
    }),
    dn((e, t) => {
        e._x_dataStack &&
            ((t._x_dataStack = e._x_dataStack),
            t.setAttribute(`data-has-alpine-state`, !0));
    }));
function $i(e) {
    return sn ? (pn ? !0 : e.hasAttribute(`data-has-alpine-state`)) : !1;
}
(R(`show`, (e, { modifiers: t, expression: n }, { effect: r }) => {
    let i = I(e, n);
    ((e._x_doHide ||= () => {
        A(() => {
            e.style.setProperty(
                `display`,
                `none`,
                t.includes(`important`) ? `important` : void 0,
            );
        });
    }),
        (e._x_doShow ||= () => {
            A(() => {
                e.style.length === 1 && e.style.display === `none`
                    ? e.removeAttribute(`style`)
                    : e.style.removeProperty(`display`);
            });
        }));
    let a = () => {
            (e._x_doHide(), (e._x_isShown = !1));
        },
        o = () => {
            (e._x_doShow(), (e._x_isShown = !0));
        },
        s = () => setTimeout(o),
        c = Qt(
            (e) => (e ? o() : a()),
            (t) => {
                typeof e._x_toggleAndCascadeWithTransitions == `function`
                    ? e._x_toggleAndCascadeWithTransitions(e, t, o, a)
                    : t
                      ? s()
                      : a();
            },
        ),
        l,
        u = !0;
    r(() =>
        i((e) => {
            (!u && e === l) ||
                (t.includes(`immediate`) && (e ? s() : a()),
                c(e),
                (l = e),
                (u = !1));
        }),
    );
}),
    R(`for`, (e, { expression: t }, { effect: n, cleanup: r }) => {
        let i = na(t),
            a = I(e, i.items),
            o = I(e, e._x_keyExpression || `index`);
        ((e._x_lookup = new Map()),
            n(() => ta(e, i, a, o)),
            r(() => {
                (e._x_lookup.forEach((e) =>
                    A(() => {
                        (Rt(e), e.remove());
                    }),
                ),
                    delete e._x_lookup);
            }));
    }));
function ea(e) {
    return (t) => {
        Object.entries(t).forEach(([t, n]) => {
            e[t] = n;
        });
    };
}
function ta(e, t, n, r) {
    n((n) => {
        (ia(n) && (n = Array.from({ length: n }, (e, t) => t + 1)),
            (n ??= []),
            n instanceof Set && (n = Array.from(n)),
            n instanceof Map && (n = Array.from(n)));
        let i = e._x_lookup,
            a = new Map();
        e._x_lookup = a;
        let o = aa(n),
            s = Object.entries(n).map(([s, c]) => {
                o || (s = parseInt(s));
                let l = ra(t, c, s, n),
                    u;
                return (
                    r(
                        (t) => {
                            (typeof t == `object` &&
                                Ct(
                                    `x-for key cannot be an object, it must be a string or an integer`,
                                    e,
                                ),
                                i.has(t) && (a.set(t, i.get(t)), i.delete(t)),
                                (u = t));
                        },
                        { scope: { index: s, ...l } },
                    ),
                    [u, l]
                );
            });
        A(() => {
            i.forEach((e) => {
                (Rt(e), e.remove());
            });
            let t = new Set(),
                n = e;
            (s.forEach(([r, i]) => {
                if (a.has(r)) {
                    let e = a.get(r);
                    (e._x_refreshXForScope(i),
                        n.nextElementSibling !== e &&
                            (n.nextElementSibling &&
                                e.replaceWith(n.nextElementSibling),
                            n.after(e)),
                        (n = e),
                        e._x_currentIfEl &&
                            (e.nextElementSibling !== e._x_currentIfEl &&
                                n.after(e._x_currentIfEl),
                            (n = e._x_currentIfEl)));
                    return;
                }
                e.content.children.length > 1 &&
                    Ct(
                        `x-for templates require a single root element, additional elements will be ignored.`,
                        e,
                    );
                let o = document.importNode(e.content, !0).firstElementChild,
                    s = S(i);
                (j(o, s, e),
                    (o._x_refreshXForScope = ea(s)),
                    a.set(r, o),
                    t.add(o),
                    n.after(o),
                    (n = o));
            }),
                cn(() => t.forEach((e) => B(e)))());
        });
    });
}
function na(e) {
    let t = /,([^,\}\]]*)(?:,([^,\}\]]*))?$/,
        n = /^\s*\(|\)\s*$/g,
        r = e.match(/([\s\S]*?)\s+(?:in|of)\s+([\s\S]*)/);
    if (!r) return;
    let i = {};
    i.items = r[2].trim();
    let a = r[1].replace(n, ``).trim(),
        o = a.match(t);
    return (
        o
            ? ((i.item = a.replace(t, ``).trim()),
              (i.index = o[1].trim()),
              o[2] && (i.collection = o[2].trim()))
            : (i.item = a),
        i
    );
}
function ra(e, t, n, r) {
    let i = {};
    return (
        /^\[.*\]$/.test(e.item) && Array.isArray(t)
            ? e.item
                  .replace(`[`, ``)
                  .replace(`]`, ``)
                  .split(`,`)
                  .map((e) => e.trim())
                  .forEach((e, n) => {
                      i[e] = t[n];
                  })
            : /^\{.*\}$/.test(e.item) &&
                !Array.isArray(t) &&
                typeof t == `object`
              ? e.item
                    .replace(`{`, ``)
                    .replace(`}`, ``)
                    .split(`,`)
                    .map((e) => e.trim())
                    .forEach((e) => {
                        i[e] = t[e];
                    })
              : (i[e.item] = t),
        e.index && (i[e.index] = n),
        e.collection && (i[e.collection] = r),
        i
    );
}
function ia(e) {
    return typeof e != `object` && !isNaN(e);
}
function aa(e) {
    return typeof e == `object` && !Array.isArray(e);
}
function oa() {}
((oa.inline = (e, { expression: t }, { cleanup: n }) => {
    let r = Mt(e);
    r && ((r._x_refs ||= {}), (r._x_refs[t] = e), n(() => delete r._x_refs[t]));
}),
    R(`ref`, oa),
    R(`if`, (e, { expression: t }, { effect: n, cleanup: r }) => {
        e.tagName.toLowerCase() !== `template` &&
            Ct(`x-if can only be used on a <template> tag`, e);
        let i = I(e, t),
            a = () => {
                if (e._x_currentIfEl) return e._x_currentIfEl;
                let t = e.content.cloneNode(!0).firstElementChild;
                return (
                    j(t, {}, e),
                    A(() => {
                        (e.after(t), cn(() => B(t))());
                    }),
                    (e._x_currentIfEl = t),
                    (e._x_undoIf = () => {
                        (A(() => {
                            (Rt(t), t.remove());
                        }),
                            delete e._x_currentIfEl);
                    }),
                    t
                );
            },
            o = () => {
                e._x_undoIf && (e._x_undoIf(), delete e._x_undoIf);
            };
        (n(() =>
            i((e) => {
                e ? a() : o();
            }),
        ),
            r(() => e._x_undoIf && e._x_undoIf()));
    }),
    R(`id`, (e, { expression: t }, { evaluate: n }) => {
        n(t).forEach((t) => Ai(e, t));
    }),
    dn((e, t) => {
        e._x_ids && (t._x_ids = e._x_ids);
    }),
    ht(dt(`@`, ft(L(`on:`)))),
    R(
        `on`,
        cn((e, { value: t, modifiers: n, expression: r }, { cleanup: i }) => {
            let a = r ? I(e, r) : () => {};
            e.tagName.toLowerCase() === `template` &&
                ((e._x_forwardEvents ||= []),
                e._x_forwardEvents.includes(t) || e._x_forwardEvents.push(t));
            let o = Ii(e, t, n, (e) => {
                a(() => {}, { scope: { $event: e }, params: [e] });
            });
            i(() => o());
        }),
    ),
    sa(`Collapse`, `collapse`, `collapse`),
    sa(`Intersect`, `intersect`, `intersect`),
    sa(`Focus`, `trap`, `focus`),
    sa(`Mask`, `mask`, `mask`));
function sa(e, t, n) {
    R(t, (r) =>
        Ct(
            `You can't use [x-${t}] without first installing the "${e}" plugin here: https://alpinejs.dev/plugins/${n}`,
            r,
        ),
    );
}
($n.setEvaluator(Ge),
    $n.setRawEvaluator(Qe),
    $n.setReactivityEngine({ reactive: Si, effect: xr, release: Sr, raw: H }));
var ca = $n,
    la = [
        `input:not([inert]):not([inert] *)`,
        `select:not([inert]):not([inert] *)`,
        `textarea:not([inert]):not([inert] *)`,
        `a[href]:not([inert]):not([inert] *)`,
        `button:not([inert]):not([inert] *)`,
        `[tabindex]:not(slot):not([inert]):not([inert] *)`,
        `audio[controls]:not([inert]):not([inert] *)`,
        `video[controls]:not([inert]):not([inert] *)`,
        `[contenteditable]:not([contenteditable="false"]):not([inert]):not([inert] *)`,
        `details>summary:first-of-type:not([inert]):not([inert] *)`,
        `details:not([inert]):not([inert] *)`,
    ],
    ua = la.join(`,`),
    da = typeof Element > `u`,
    fa = da
        ? function () {}
        : Element.prototype.matches ||
          Element.prototype.msMatchesSelector ||
          Element.prototype.webkitMatchesSelector,
    pa =
        !da && Element.prototype.getRootNode
            ? function (e) {
                  return e?.getRootNode?.call(e);
              }
            : function (e) {
                  return e?.ownerDocument;
              },
    ma = function (e, t) {
        t === void 0 && (t = !0);
        var n = e?.getAttribute?.call(e, `inert`);
        return (
            n === `` ||
            n === `true` ||
            (t &&
                e &&
                (typeof e.closest == `function`
                    ? e.closest(`[inert]`)
                    : ma(e.parentNode)))
        );
    },
    ha = function (e) {
        var t = e?.getAttribute?.call(e, `contenteditable`);
        return t === `` || t === `true`;
    },
    ga = function (e, t, n) {
        if (ma(e)) return [];
        var r = Array.prototype.slice.apply(e.querySelectorAll(ua));
        return (t && fa.call(e, ua) && r.unshift(e), (r = r.filter(n)), r);
    },
    _a = function (e, t, n) {
        for (var r = [], i = Array.from(e); i.length; ) {
            var a = i.shift();
            if (!ma(a, !1))
                if (a.tagName === `SLOT`) {
                    var o = a.assignedElements(),
                        s = _a(o.length ? o : a.children, !0, n);
                    n.flatten
                        ? r.push.apply(r, s)
                        : r.push({ scopeParent: a, candidates: s });
                } else {
                    fa.call(a, ua) &&
                        n.filter(a) &&
                        (t || !e.includes(a)) &&
                        r.push(a);
                    var c =
                            a.shadowRoot ||
                            (typeof n.getShadowRoot == `function` &&
                                n.getShadowRoot(a)),
                        l =
                            !ma(c, !1) &&
                            (!n.shadowRootFilter || n.shadowRootFilter(a));
                    if (c && l) {
                        var u = _a(c === !0 ? a.children : c.children, !0, n);
                        n.flatten
                            ? r.push.apply(r, u)
                            : r.push({ scopeParent: a, candidates: u });
                    } else i.unshift.apply(i, a.children);
                }
        }
        return r;
    },
    va = function (e) {
        return !isNaN(parseInt(e.getAttribute(`tabindex`), 10));
    },
    ya = function (e) {
        if (!e) throw Error(`No node provided`);
        return e.tabIndex < 0 &&
            (/^(AUDIO|VIDEO|DETAILS)$/.test(e.tagName) || ha(e)) &&
            !va(e)
            ? 0
            : e.tabIndex;
    },
    ba = function (e, t) {
        var n = ya(e);
        return n < 0 && t && !va(e) ? 0 : n;
    },
    xa = function (e, t) {
        return e.tabIndex === t.tabIndex
            ? e.documentOrder - t.documentOrder
            : e.tabIndex - t.tabIndex;
    },
    Sa = function (e) {
        return e.tagName === `INPUT`;
    },
    Ca = function (e) {
        return Sa(e) && e.type === `hidden`;
    },
    wa = function (e) {
        return (
            e.tagName === `DETAILS` &&
            Array.prototype.slice.apply(e.children).some(function (e) {
                return e.tagName === `SUMMARY`;
            })
        );
    },
    Ta = function (e, t) {
        for (var n = 0; n < e.length; n++)
            if (e[n].checked && e[n].form === t) return e[n];
    },
    Ea = function (e) {
        if (!e.name) return !0;
        var t = e.form || pa(e),
            n = function (e) {
                return t.querySelectorAll(
                    `input[type="radio"][name="` + e + `"]`,
                );
            },
            r;
        if (
            typeof window < `u` &&
            window.CSS !== void 0 &&
            typeof window.CSS.escape == `function`
        )
            r = n(window.CSS.escape(e.name));
        else
            try {
                r = n(e.name);
            } catch (e) {
                return (
                    console.error(
                        `Looks like you have a radio button with a name attribute containing invalid CSS selector characters and need the CSS.escape polyfill: %s`,
                        e.message,
                    ),
                    !1
                );
            }
        var i = Ta(r, e.form);
        return !i || i === e;
    },
    Da = function (e) {
        return Sa(e) && e.type === `radio`;
    },
    Oa = function (e) {
        return Da(e) && !Ea(e);
    },
    ka = function (e) {
        var t = e && pa(e),
            n = t?.host,
            r = !1;
        if (t && t !== e) {
            var i, a, o;
            for (
                r = !!(
                    ((i = n) != null &&
                        (a = i.ownerDocument) != null &&
                        a.contains(n)) ||
                    (e != null &&
                        (o = e.ownerDocument) != null &&
                        o.contains(e))
                );
                !r && n;
            ) {
                var s, c;
                ((t = pa(n)),
                    (n = t?.host),
                    (r = !!(
                        (s = n) != null &&
                        (c = s.ownerDocument) != null &&
                        c.contains(n)
                    )));
            }
        }
        return r;
    },
    Aa = function (e) {
        var t = e.getBoundingClientRect(),
            n = t.width,
            r = t.height;
        return n === 0 && r === 0;
    },
    ja = function (e, t) {
        var n = t.displayCheck,
            r = t.getShadowRoot;
        if (n === `full-native` && `checkVisibility` in e)
            return !e.checkVisibility({
                checkOpacity: !1,
                opacityProperty: !1,
                contentVisibilityAuto: !0,
                visibilityProperty: !0,
                checkVisibilityCSS: !0,
            });
        if (getComputedStyle(e).visibility === `hidden`) return !0;
        var i = fa.call(e, `details>summary:first-of-type`)
            ? e.parentElement
            : e;
        if (fa.call(i, `details:not([open]) *`)) return !0;
        if (!n || n === `full` || n === `full-native` || n === `legacy-full`) {
            if (typeof r == `function`) {
                for (var a = e; e; ) {
                    var o = e.parentElement,
                        s = pa(e);
                    if (o && !o.shadowRoot && r(o) === !0) return Aa(e);
                    e = e.assignedSlot
                        ? e.assignedSlot
                        : !o && s !== e.ownerDocument
                          ? s.host
                          : o;
                }
                e = a;
            }
            if (ka(e)) return !e.getClientRects().length;
            if (n !== `legacy-full`) return !0;
        } else if (n === `non-zero-area`) return Aa(e);
        return !1;
    },
    Ma = function (e) {
        if (/^(INPUT|BUTTON|SELECT|TEXTAREA)$/.test(e.tagName))
            for (var t = e.parentElement; t; ) {
                if (t.tagName === `FIELDSET` && t.disabled) {
                    for (var n = 0; n < t.children.length; n++) {
                        var r = t.children.item(n);
                        if (r.tagName === `LEGEND`)
                            return fa.call(t, `fieldset[disabled] *`)
                                ? !0
                                : !r.contains(e);
                    }
                    return !0;
                }
                t = t.parentElement;
            }
        return !1;
    },
    Na = function (e, t) {
        return !(t.disabled || Ca(t) || ja(t, e) || wa(t) || Ma(t));
    },
    Pa = function (e, t) {
        return !(Oa(t) || ya(t) < 0 || !Na(e, t));
    },
    Fa = function (e) {
        var t = parseInt(e.getAttribute(`tabindex`), 10);
        return !!(isNaN(t) || t >= 0);
    },
    Ia = function (e) {
        var t = [],
            n = [];
        return (
            e.forEach(function (e, r) {
                var i = !!e.scopeParent,
                    a = i ? e.scopeParent : e,
                    o = ba(a, i),
                    s = i ? Ia(e.candidates) : a;
                o === 0
                    ? i
                        ? t.push.apply(t, s)
                        : t.push(a)
                    : n.push({
                          documentOrder: r,
                          tabIndex: o,
                          item: e,
                          isScope: i,
                          content: s,
                      });
            }),
            n
                .sort(xa)
                .reduce(function (e, t) {
                    return (
                        t.isScope
                            ? e.push.apply(e, t.content)
                            : e.push(t.content),
                        e
                    );
                }, [])
                .concat(t)
        );
    },
    La = function (e, t) {
        return (
            (t ||= {}),
            Ia(
                t.getShadowRoot
                    ? _a([e], t.includeContainer, {
                          filter: Pa.bind(null, t),
                          flatten: !1,
                          getShadowRoot: t.getShadowRoot,
                          shadowRootFilter: Fa,
                      })
                    : ga(e, t.includeContainer, Pa.bind(null, t)),
            )
        );
    },
    Ra = function (e, t) {
        return (
            (t ||= {}),
            t.getShadowRoot
                ? _a([e], t.includeContainer, {
                      filter: Na.bind(null, t),
                      flatten: !0,
                      getShadowRoot: t.getShadowRoot,
                  })
                : ga(e, t.includeContainer, Na.bind(null, t))
        );
    },
    za = function (e, t) {
        if (((t ||= {}), !e)) throw Error(`No node provided`);
        return fa.call(e, ua) !== !1 && Pa(t, e);
    },
    Ba = la.concat(`iframe:not([inert]):not([inert] *)`).join(`,`),
    Va = function (e, t) {
        if (((t ||= {}), !e)) throw Error(`No node provided`);
        return fa.call(e, Ba) !== !1 && Na(t, e);
    };
function Ha(e, t) {
    (t == null || t > e.length) && (t = e.length);
    for (var n = 0, r = Array(t); n < t; n++) r[n] = e[n];
    return r;
}
function Ua(e) {
    if (Array.isArray(e)) return Ha(e);
}
function Wa(e, t, n, r, i, a, o) {
    try {
        var s = e[a](o),
            c = s.value;
    } catch (e) {
        n(e);
        return;
    }
    s.done ? t(c) : Promise.resolve(c).then(r, i);
}
function Ga(e) {
    return function () {
        var t = this,
            n = arguments;
        return new Promise(function (r, i) {
            var a = e.apply(t, n);
            function o(e) {
                Wa(a, r, i, o, s, `next`, e);
            }
            function s(e) {
                Wa(a, r, i, o, s, `throw`, e);
            }
            o(void 0);
        });
    };
}
function Ka(e, t) {
    var n = (typeof Symbol < `u` && e[Symbol.iterator]) || e[`@@iterator`];
    if (!n) {
        if (Array.isArray(e) || (n = no(e)) || t) {
            n && (e = n);
            var r = 0,
                i = function () {};
            return {
                s: i,
                n: function () {
                    return r >= e.length
                        ? { done: !0 }
                        : { done: !1, value: e[r++] };
                },
                e: function (e) {
                    throw e;
                },
                f: i,
            };
        }
        throw TypeError(`Invalid attempt to iterate non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
    }
    var a,
        o = !0,
        s = !1;
    return {
        s: function () {
            n = n.call(e);
        },
        n: function () {
            var e = n.next();
            return ((o = e.done), e);
        },
        e: function (e) {
            ((s = !0), (a = e));
        },
        f: function () {
            try {
                o || n.return == null || n.return();
            } finally {
                if (s) throw a;
            }
        },
    };
}
function qa(e, t, n) {
    return (
        (t = to(t)) in e
            ? Object.defineProperty(e, t, {
                  value: n,
                  enumerable: !0,
                  configurable: !0,
                  writable: !0,
              })
            : (e[t] = n),
        e
    );
}
function Ja(e) {
    if (
        (typeof Symbol < `u` && e[Symbol.iterator] != null) ||
        e[`@@iterator`] != null
    )
        return Array.from(e);
}
function Ya() {
    throw TypeError(`Invalid attempt to spread non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
}
function Xa(e, t) {
    var n = Object.keys(e);
    if (Object.getOwnPropertySymbols) {
        var r = Object.getOwnPropertySymbols(e);
        (t &&
            (r = r.filter(function (t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable;
            })),
            n.push.apply(n, r));
    }
    return n;
}
function Za(e) {
    for (var t = 1; t < arguments.length; t++) {
        var n = arguments[t] == null ? {} : arguments[t];
        t % 2
            ? Xa(Object(n), !0).forEach(function (t) {
                  qa(e, t, n[t]);
              })
            : Object.getOwnPropertyDescriptors
              ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n))
              : Xa(Object(n)).forEach(function (t) {
                    Object.defineProperty(
                        e,
                        t,
                        Object.getOwnPropertyDescriptor(n, t),
                    );
                });
    }
    return e;
}
function Qa() {
    var e,
        t,
        n = typeof Symbol == `function` ? Symbol : {},
        r = n.iterator || `@@iterator`,
        i = n.toStringTag || `@@toStringTag`;
    function a(n, r, i, a) {
        var c = r && r.prototype instanceof s ? r : s,
            l = Object.create(c.prototype);
        return (
            U(
                l,
                `_invoke`,
                (function (n, r, i) {
                    var a,
                        s,
                        c,
                        l = 0,
                        u = i || [],
                        d = !1,
                        f = {
                            p: 0,
                            n: 0,
                            v: e,
                            a: p,
                            f: p.bind(e, 4),
                            d: function (t, n) {
                                return (
                                    (a = t),
                                    (s = 0),
                                    (c = e),
                                    (f.n = n),
                                    o
                                );
                            },
                        };
                    function p(n, r) {
                        for (
                            s = n, c = r, t = 0;
                            !d && l && !i && t < u.length;
                            t++
                        ) {
                            var i,
                                a = u[t],
                                p = f.p,
                                m = a[2];
                            n > 3
                                ? (i = m === r) &&
                                  ((c = a[(s = a[4]) ? 5 : ((s = 3), 3)]),
                                  (a[4] = a[5] = e))
                                : a[0] <= p &&
                                  ((i = n < 2 && p < a[1])
                                      ? ((s = 0), (f.v = r), (f.n = a[1]))
                                      : p < m &&
                                        (i = n < 3 || a[0] > r || r > m) &&
                                        ((a[4] = n),
                                        (a[5] = r),
                                        (f.n = m),
                                        (s = 0)));
                        }
                        if (i || n > 1) return o;
                        throw ((d = !0), r);
                    }
                    return function (i, u, m) {
                        if (l > 1)
                            throw TypeError(`Generator is already running`);
                        for (
                            d && u === 1 && p(u, m), s = u, c = m;
                            (t = s < 2 ? e : c) || !d;
                        ) {
                            a ||
                                (s
                                    ? s < 3
                                        ? (s > 1 && (f.n = -1), p(s, c))
                                        : (f.n = c)
                                    : (f.v = c));
                            try {
                                if (((l = 2), a)) {
                                    if ((s || (i = `next`), (t = a[i]))) {
                                        if (!(t = t.call(a, c)))
                                            throw TypeError(
                                                `iterator result is not an object`,
                                            );
                                        if (!t.done) return t;
                                        ((c = t.value), s < 2 && (s = 0));
                                    } else
                                        (s === 1 && (t = a.return) && t.call(a),
                                            s < 2 &&
                                                ((c = TypeError(
                                                    `The iterator does not provide a '` +
                                                        i +
                                                        `' method`,
                                                )),
                                                (s = 1)));
                                    a = e;
                                } else if (
                                    (t = (d = f.n < 0) ? c : n.call(r, f)) !== o
                                )
                                    break;
                            } catch (t) {
                                ((a = e), (s = 1), (c = t));
                            } finally {
                                l = 1;
                            }
                        }
                        return { value: t, done: d };
                    };
                })(n, i, a),
                !0,
            ),
            l
        );
    }
    var o = {};
    function s() {}
    function c() {}
    function l() {}
    t = Object.getPrototypeOf;
    var u = [][r]
            ? t(t([][r]()))
            : (U((t = {}), r, function () {
                  return this;
              }),
              t),
        d = (l.prototype = s.prototype = Object.create(u));
    function f(e) {
        return (
            Object.setPrototypeOf
                ? Object.setPrototypeOf(e, l)
                : ((e.__proto__ = l), U(e, i, `GeneratorFunction`)),
            (e.prototype = Object.create(d)),
            e
        );
    }
    return (
        (c.prototype = l),
        U(d, `constructor`, l),
        U(l, `constructor`, c),
        (c.displayName = `GeneratorFunction`),
        U(l, i, `GeneratorFunction`),
        U(d),
        U(d, i, `Generator`),
        U(d, r, function () {
            return this;
        }),
        U(d, `toString`, function () {
            return `[object Generator]`;
        }),
        (Qa = function () {
            return { w: a, m: f };
        })()
    );
}
function U(e, t, n, r) {
    var i = Object.defineProperty;
    try {
        i({}, ``, {});
    } catch {
        i = 0;
    }
    ((U = function (e, t, n, r) {
        function a(t, n) {
            U(e, t, function (e) {
                return this._invoke(t, n, e);
            });
        }
        t
            ? i
                ? i(e, t, {
                      value: n,
                      enumerable: !r,
                      configurable: !r,
                      writable: !r,
                  })
                : (e[t] = n)
            : (a(`next`, 0), a(`throw`, 1), a(`return`, 2));
    }),
        U(e, t, n, r));
}
function $a(e) {
    return Ua(e) || Ja(e) || no(e) || Ya();
}
function eo(e, t) {
    if (typeof e != `object` || !e) return e;
    var n = e[Symbol.toPrimitive];
    if (n !== void 0) {
        var r = n.call(e, t);
        if (typeof r != `object`) return r;
        throw TypeError(`@@toPrimitive must return a primitive value.`);
    }
    return (t === `string` ? String : Number)(e);
}
function to(e) {
    var t = eo(e, `string`);
    return typeof t == `symbol` ? t : t + ``;
}
function no(e, t) {
    if (e) {
        if (typeof e == `string`) return Ha(e, t);
        var n = {}.toString.call(e).slice(8, -1);
        return (
            n === `Object` && e.constructor && (n = e.constructor.name),
            n === `Map` || n === `Set`
                ? Array.from(e)
                : n === `Arguments` ||
                    /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)
                  ? Ha(e, t)
                  : void 0
        );
    }
}
var ro = {
        getActiveTrap: function (e) {
            return e?.length > 0 ? e[e.length - 1] : null;
        },
        activateTrap: function (e, t) {
            t !== ro.getActiveTrap(e) && ro.pauseTrap(e);
            var n = e.indexOf(t);
            (n === -1 || e.splice(n, 1), e.push(t));
        },
        deactivateTrap: function (e, t) {
            var n = e.indexOf(t);
            (n !== -1 && e.splice(n, 1), ro.unpauseTrap(e));
        },
        pauseTrap: function (e) {
            ro.getActiveTrap(e)?._setPausedState(!0);
        },
        unpauseTrap: function (e) {
            var t = ro.getActiveTrap(e);
            t && !t._isManuallyPaused() && t._setPausedState(!1);
        },
    },
    io = function (e) {
        return (
            e.tagName &&
            e.tagName.toLowerCase() === `input` &&
            typeof e.select == `function`
        );
    },
    ao = function (e) {
        return e?.key === `Escape` || e?.key === `Esc` || e?.keyCode === 27;
    },
    oo = function (e) {
        return e?.key === `Tab` || e?.keyCode === 9;
    },
    so = function (e) {
        return oo(e) && !e.shiftKey;
    },
    co = function (e) {
        return oo(e) && e.shiftKey;
    },
    lo = function (e) {
        return setTimeout(e, 0);
    },
    uo = function (e) {
        var t = [...arguments].slice(1);
        return typeof e == `function` ? e.apply(void 0, t) : e;
    },
    fo = function (e) {
        return e.target.shadowRoot && typeof e.composedPath == `function`
            ? e.composedPath()[0]
            : e.target;
    },
    po = [],
    mo = function (e, t) {
        var n = t?.document || document,
            r = t?.trapStack || po,
            i = Za(
                {
                    returnFocusOnDeactivate: !0,
                    escapeDeactivates: !0,
                    delayInitialFocus: !0,
                    isolateSubtrees: !1,
                    isKeyForward: so,
                    isKeyBackward: co,
                },
                t,
            ),
            a = {
                containers: [],
                containerGroups: [],
                tabbableGroups: [],
                adjacentElements: new Set(),
                alreadySilent: new Set(),
                nodeFocusedBeforeActivation: null,
                mostRecentlyFocusedNode: null,
                active: !1,
                paused: !1,
                manuallyPaused: !1,
                delayInitialFocusTimer: void 0,
                recentNavEvent: void 0,
            },
            o,
            s = function (e, t, n) {
                return e && e[t] !== void 0 ? e[t] : i[n || t];
            },
            c = function (e, t) {
                var n =
                    typeof t?.composedPath == `function`
                        ? t.composedPath()
                        : void 0;
                return a.containerGroups.findIndex(function (t) {
                    var r = t.container,
                        i = t.tabbableNodes;
                    return (
                        r.contains(e) ||
                        n?.includes(r) ||
                        i.find(function (t) {
                            return t === e;
                        })
                    );
                });
            },
            l = function (e) {
                var t =
                        arguments.length > 1 && arguments[1] !== void 0
                            ? arguments[1]
                            : {},
                    r = t.hasFallback,
                    a = r !== void 0 && r,
                    o = t.params,
                    s = o === void 0 ? [] : o,
                    c = i[e];
                if (
                    (typeof c == `function` && (c = c.apply(void 0, $a(s))),
                    c === !0 && (c = void 0),
                    !c)
                ) {
                    if (c === void 0 || c === !1) return c;
                    throw Error(
                        `\`${e}\` was specified but was not a node, or did not return a node`,
                    );
                }
                var l = c;
                if (typeof c == `string`) {
                    try {
                        l = n.querySelector(c);
                    } catch (t) {
                        throw Error(
                            `\`${e}\` appears to be an invalid selector; error="${t.message}"`,
                        );
                    }
                    if (!l && !a)
                        throw Error(
                            `\`${e}\` as selector refers to no known node`,
                        );
                }
                return l;
            },
            u = function () {
                var e = l(`initialFocus`, { hasFallback: !0 });
                if (e === !1) return !1;
                if (e === void 0 || (e && !Va(e, i.tabbableOptions)))
                    if (c(n.activeElement) >= 0) e = n.activeElement;
                    else {
                        var t = a.tabbableGroups[0];
                        e = (t && t.firstTabbableNode) || l(`fallbackFocus`);
                    }
                else e === null && (e = l(`fallbackFocus`));
                if (!e)
                    throw Error(
                        `Your focus-trap needs to have at least one focusable element`,
                    );
                return e;
            },
            d = function () {
                if (
                    ((a.containerGroups = a.containers.map(function (e) {
                        var t = La(e, i.tabbableOptions),
                            n = Ra(e, i.tabbableOptions),
                            r = t.length > 0 ? t[0] : void 0,
                            a = t.length > 0 ? t[t.length - 1] : void 0,
                            o = n.find(function (e) {
                                return za(e);
                            }),
                            s = n
                                .slice()
                                .reverse()
                                .find(function (e) {
                                    return za(e);
                                });
                        return {
                            container: e,
                            tabbableNodes: t,
                            focusableNodes: n,
                            posTabIndexesFound: !!t.find(function (e) {
                                return ya(e) > 0;
                            }),
                            firstTabbableNode: r,
                            lastTabbableNode: a,
                            firstDomTabbableNode: o,
                            lastDomTabbableNode: s,
                            nextTabbableNode: function (e) {
                                var r =
                                        arguments.length > 1 &&
                                        arguments[1] !== void 0
                                            ? arguments[1]
                                            : !0,
                                    i = t.indexOf(e);
                                return i < 0
                                    ? r
                                        ? n
                                              .slice(n.indexOf(e) + 1)
                                              .find(function (e) {
                                                  return za(e);
                                              })
                                        : n
                                              .slice(0, n.indexOf(e))
                                              .reverse()
                                              .find(function (e) {
                                                  return za(e);
                                              })
                                    : t[i + (r ? 1 : -1)];
                            },
                        };
                    })),
                    (a.tabbableGroups = a.containerGroups.filter(function (e) {
                        return e.tabbableNodes.length > 0;
                    })),
                    a.tabbableGroups.length <= 0 && !l(`fallbackFocus`))
                )
                    throw Error(
                        `Your focus-trap must have at least one container with at least one tabbable node in it at all times`,
                    );
                if (
                    a.containerGroups.find(function (e) {
                        return e.posTabIndexesFound;
                    }) &&
                    a.containerGroups.length > 1
                )
                    throw Error(
                        `At least one node with a positive tabindex was found in one of your focus-trap's multiple containers. Positive tabindexes are only supported in single-container focus-traps.`,
                    );
            },
            f = function (e) {
                var t = e.activeElement;
                if (t)
                    return t.shadowRoot && t.shadowRoot.activeElement !== null
                        ? f(t.shadowRoot)
                        : t;
            },
            p = function (e) {
                if (e !== !1 && e !== f(document)) {
                    if (!e || !e.focus) {
                        p(u());
                        return;
                    }
                    (e.focus({ preventScroll: !!i.preventScroll }),
                        (a.mostRecentlyFocusedNode = e),
                        io(e) && e.select());
                }
            },
            m = function (e) {
                var t = l(`setReturnFocus`, { params: [e] });
                return t || (t !== !1 && e);
            },
            h = function (e) {
                var t = e.target,
                    n = e.event,
                    r = e.isBackward,
                    o = r !== void 0 && r;
                ((t ||= fo(n)), d());
                var s = null;
                if (a.tabbableGroups.length > 0) {
                    var u = c(t, n),
                        f = u >= 0 ? a.containerGroups[u] : void 0;
                    if (u < 0)
                        s = o
                            ? a.tabbableGroups[a.tabbableGroups.length - 1]
                                  .lastTabbableNode
                            : a.tabbableGroups[0].firstTabbableNode;
                    else if (o) {
                        var p = a.tabbableGroups.findIndex(function (e) {
                            var n = e.firstTabbableNode;
                            return t === n;
                        });
                        if (
                            (p < 0 &&
                                (f.container === t ||
                                    (Va(t, i.tabbableOptions) &&
                                        !za(t, i.tabbableOptions) &&
                                        !f.nextTabbableNode(t, !1))) &&
                                (p = u),
                            p >= 0)
                        ) {
                            var m =
                                    p === 0
                                        ? a.tabbableGroups.length - 1
                                        : p - 1,
                                h = a.tabbableGroups[m];
                            s =
                                ya(t) >= 0
                                    ? h.lastTabbableNode
                                    : h.lastDomTabbableNode;
                        } else oo(n) || (s = f.nextTabbableNode(t, !1));
                    } else {
                        var g = a.tabbableGroups.findIndex(function (e) {
                            var n = e.lastTabbableNode;
                            return t === n;
                        });
                        if (
                            (g < 0 &&
                                (f.container === t ||
                                    (Va(t, i.tabbableOptions) &&
                                        !za(t, i.tabbableOptions) &&
                                        !f.nextTabbableNode(t))) &&
                                (g = u),
                            g >= 0)
                        ) {
                            var _ =
                                    g === a.tabbableGroups.length - 1
                                        ? 0
                                        : g + 1,
                                v = a.tabbableGroups[_];
                            s =
                                ya(t) >= 0
                                    ? v.firstTabbableNode
                                    : v.firstDomTabbableNode;
                        } else oo(n) || (s = f.nextTabbableNode(t));
                    }
                } else s = l(`fallbackFocus`);
                return s;
            },
            g = function (e) {
                if (!(c(fo(e), e) >= 0)) {
                    if (uo(i.clickOutsideDeactivates, e)) {
                        o.deactivate({
                            returnFocus: i.returnFocusOnDeactivate,
                        });
                        return;
                    }
                    uo(i.allowOutsideClick, e) || e.preventDefault();
                }
            },
            _ = function (e) {
                var t = fo(e),
                    n = c(t, e) >= 0;
                if (n || t instanceof Document)
                    n && (a.mostRecentlyFocusedNode = t);
                else {
                    e.stopImmediatePropagation();
                    var r,
                        o = !0;
                    if (a.mostRecentlyFocusedNode)
                        if (ya(a.mostRecentlyFocusedNode) > 0) {
                            var s = c(a.mostRecentlyFocusedNode),
                                l = a.containerGroups[s].tabbableNodes;
                            if (l.length > 0) {
                                var d = l.findIndex(function (e) {
                                    return e === a.mostRecentlyFocusedNode;
                                });
                                d >= 0 &&
                                    (i.isKeyForward(a.recentNavEvent)
                                        ? d + 1 < l.length &&
                                          ((r = l[d + 1]), (o = !1))
                                        : d - 1 >= 0 &&
                                          ((r = l[d - 1]), (o = !1)));
                            }
                        } else
                            a.containerGroups.some(function (e) {
                                return e.tabbableNodes.some(function (e) {
                                    return ya(e) > 0;
                                });
                            }) || (o = !1);
                    else o = !1;
                    (o &&
                        (r = h({
                            target: a.mostRecentlyFocusedNode,
                            isBackward: i.isKeyBackward(a.recentNavEvent),
                        })),
                        p(r || a.mostRecentlyFocusedNode || u()));
                }
                a.recentNavEvent = void 0;
            },
            v = function (e) {
                var t =
                    arguments.length > 1 &&
                    arguments[1] !== void 0 &&
                    arguments[1];
                a.recentNavEvent = e;
                var n = h({ event: e, isBackward: t });
                n && (oo(e) && e.preventDefault(), p(n));
            },
            y = function (e) {
                (i.isKeyForward(e) || i.isKeyBackward(e)) &&
                    v(e, i.isKeyBackward(e));
            },
            b = function (e) {
                ao(e) &&
                    uo(i.escapeDeactivates, e) !== !1 &&
                    (e.preventDefault(), o.deactivate());
            },
            x = function (e) {
                c(fo(e), e) >= 0 ||
                    uo(i.clickOutsideDeactivates, e) ||
                    uo(i.allowOutsideClick, e) ||
                    (e.preventDefault(), e.stopImmediatePropagation());
            },
            S = function () {
                if (!a.active) return Promise.resolve();
                ro.activateTrap(r, o);
                var e;
                return (
                    i.delayInitialFocus
                        ? (e = new Promise(function (e) {
                              a.delayInitialFocusTimer = lo(function () {
                                  (p(u()), e());
                              });
                          }))
                        : ((e = Promise.resolve()), p(u())),
                    n.addEventListener(`focusin`, _, !0),
                    n.addEventListener(`mousedown`, g, {
                        capture: !0,
                        passive: !1,
                    }),
                    n.addEventListener(`touchstart`, g, {
                        capture: !0,
                        passive: !1,
                    }),
                    n.addEventListener(`click`, x, {
                        capture: !0,
                        passive: !1,
                    }),
                    n.addEventListener(`keydown`, y, {
                        capture: !0,
                        passive: !1,
                    }),
                    n.addEventListener(`keydown`, b),
                    e
                );
            },
            C = function (e) {
                (a.active && !a.paused && o._setSubtreeIsolation(!1),
                    a.adjacentElements.clear(),
                    a.alreadySilent.clear());
                var t = new Set(),
                    n = new Set(),
                    r = Ka(e),
                    i;
                try {
                    for (r.s(); !(i = r.n()).done; ) {
                        var s = i.value;
                        t.add(s);
                        for (
                            var c =
                                    typeof ShadowRoot < `u` &&
                                    s.getRootNode() instanceof ShadowRoot,
                                l = s;
                            l;
                        ) {
                            t.add(l);
                            var u = l.parentElement,
                                d = [];
                            u
                                ? (d = u.children)
                                : !u &&
                                  c &&
                                  ((d = l.getRootNode().children),
                                  (u = l.getRootNode().host),
                                  (c =
                                      typeof ShadowRoot < `u` &&
                                      u.getRootNode() instanceof ShadowRoot));
                            var f = Ka(d),
                                p;
                            try {
                                for (f.s(); !(p = f.n()).done; ) {
                                    var m = p.value;
                                    n.add(m);
                                }
                            } catch (e) {
                                f.e(e);
                            } finally {
                                f.f();
                            }
                            l = u;
                        }
                    }
                } catch (e) {
                    r.e(e);
                } finally {
                    r.f();
                }
                (t.forEach(function (e) {
                    n.delete(e);
                }),
                    (a.adjacentElements = n));
            },
            w = function () {
                if (a.active)
                    return (
                        n.removeEventListener(`focusin`, _, !0),
                        n.removeEventListener(`mousedown`, g, !0),
                        n.removeEventListener(`touchstart`, g, !0),
                        n.removeEventListener(`click`, x, !0),
                        n.removeEventListener(`keydown`, y, !0),
                        n.removeEventListener(`keydown`, b),
                        o
                    );
            },
            T =
                typeof window < `u` && `MutationObserver` in window
                    ? new MutationObserver(function (e) {
                          e.some(function (e) {
                              return Array.from(e.removedNodes).some(
                                  function (e) {
                                      return e === a.mostRecentlyFocusedNode;
                                  },
                              );
                          }) && p(u());
                      })
                    : void 0,
            E = function () {
                T &&
                    (T.disconnect(),
                    a.active &&
                        !a.paused &&
                        a.containers.map(function (e) {
                            T.observe(e, { subtree: !0, childList: !0 });
                        }));
            };
        return (
            (o = {
                get active() {
                    return a.active;
                },
                get paused() {
                    return a.paused;
                },
                activate: function (e) {
                    if (a.active) return this;
                    var t = s(e, `onActivate`),
                        i = s(e, `onPostActivate`),
                        c = s(e, `checkCanFocusTrap`),
                        l = ro.getActiveTrap(r),
                        u = !1;
                    if (l && !l.paused) {
                        var p;
                        ((p = l._setSubtreeIsolation) == null || p.call(l, !1),
                            (u = !0));
                    }
                    try {
                        (c || d(),
                            (a.active = !0),
                            (a.paused = !1),
                            (a.nodeFocusedBeforeActivation = f(n)),
                            t?.());
                        var m = (function () {
                            var e = Ga(
                                Qa().m(function e() {
                                    return Qa().w(function (e) {
                                        for (;;)
                                            switch (e.n) {
                                                case 0:
                                                    return (
                                                        c && d(),
                                                        (e.n = 1),
                                                        S()
                                                    );
                                                case 1:
                                                    (o._setSubtreeIsolation(!0),
                                                        E(),
                                                        i?.());
                                                case 2:
                                                    return e.a(2);
                                            }
                                    }, e);
                                }),
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })();
                        if (c)
                            return (c(a.containers.concat()).then(m, m), this);
                        m();
                    } catch (e) {
                        if (l === ro.getActiveTrap(r) && u) {
                            var h;
                            (h = l._setSubtreeIsolation) == null ||
                                h.call(l, !0);
                        }
                        throw e;
                    }
                    return this;
                },
                deactivate: function (e) {
                    if (!a.active) return this;
                    var t = Za(
                        {
                            onDeactivate: i.onDeactivate,
                            onPostDeactivate: i.onPostDeactivate,
                            checkCanReturnFocus: i.checkCanReturnFocus,
                        },
                        e,
                    );
                    (clearTimeout(a.delayInitialFocusTimer),
                        (a.delayInitialFocusTimer = void 0),
                        a.paused || o._setSubtreeIsolation(!1),
                        a.alreadySilent.clear(),
                        w(),
                        (a.active = !1),
                        (a.paused = !1),
                        E(),
                        ro.deactivateTrap(r, o));
                    var n = s(t, `onDeactivate`),
                        c = s(t, `onPostDeactivate`),
                        l = s(t, `checkCanReturnFocus`),
                        u = s(t, `returnFocus`, `returnFocusOnDeactivate`);
                    n?.();
                    var d = function () {
                        lo(function () {
                            (u && p(m(a.nodeFocusedBeforeActivation)), c?.());
                        });
                    };
                    return u && l
                        ? (l(m(a.nodeFocusedBeforeActivation)).then(d, d), this)
                        : (d(), this);
                },
                pause: function (e) {
                    return a.active
                        ? ((a.manuallyPaused = !0), this._setPausedState(!0, e))
                        : this;
                },
                unpause: function (e) {
                    return !a.active ||
                        ((a.manuallyPaused = !1), r[r.length - 1] !== this)
                        ? this
                        : this._setPausedState(!1, e);
                },
                updateContainerElements: function (e) {
                    return (
                        (a.containers = []
                            .concat(e)
                            .filter(Boolean)
                            .map(function (e) {
                                return typeof e == `string`
                                    ? n.querySelector(e)
                                    : e;
                            })),
                        i.isolateSubtrees && C(a.containers),
                        a.active &&
                            (d(), a.paused || o._setSubtreeIsolation(!0)),
                        E(),
                        this
                    );
                },
            }),
            Object.defineProperties(o, {
                _isManuallyPaused: {
                    value: function () {
                        return a.manuallyPaused;
                    },
                },
                _setPausedState: {
                    value: function (e, t) {
                        if (a.paused === e) return this;
                        if (((a.paused = e), e)) {
                            var n = s(t, `onPause`),
                                r = s(t, `onPostPause`);
                            (n?.(),
                                w(),
                                o._setSubtreeIsolation(!1),
                                E(),
                                r?.());
                        } else {
                            var i = s(t, `onUnpause`),
                                c = s(t, `onPostUnpause`);
                            (i?.(),
                                (function () {
                                    var e = Ga(
                                        Qa().m(function e() {
                                            return Qa().w(function (e) {
                                                for (;;)
                                                    switch (e.n) {
                                                        case 0:
                                                            return (
                                                                d(),
                                                                (e.n = 1),
                                                                S()
                                                            );
                                                        case 1:
                                                            (o._setSubtreeIsolation(
                                                                !0,
                                                            ),
                                                                E(),
                                                                c?.());
                                                        case 2:
                                                            return e.a(2);
                                                    }
                                            }, e);
                                        }),
                                    );
                                    return function () {
                                        return e.apply(this, arguments);
                                    };
                                })()());
                        }
                        return this;
                    },
                },
                _setSubtreeIsolation: {
                    value: function (e) {
                        i.isolateSubtrees &&
                            a.adjacentElements.forEach(function (t) {
                                if (e)
                                    switch (i.isolateSubtrees) {
                                        case `aria-hidden`:
                                            ((t.ariaHidden === `true` ||
                                                t
                                                    .getAttribute(`aria-hidden`)
                                                    ?.toLowerCase() ===
                                                    `true`) &&
                                                a.alreadySilent.add(t),
                                                t.setAttribute(
                                                    `aria-hidden`,
                                                    `true`,
                                                ));
                                            break;
                                        default:
                                            ((t.inert ||
                                                t.hasAttribute(`inert`)) &&
                                                a.alreadySilent.add(t),
                                                t.setAttribute(`inert`, !0));
                                            break;
                                    }
                                else if (!a.alreadySilent.has(t))
                                    switch (i.isolateSubtrees) {
                                        case `aria-hidden`:
                                            t.removeAttribute(`aria-hidden`);
                                            break;
                                        default:
                                            t.removeAttribute(`inert`);
                                            break;
                                    }
                            });
                    },
                },
            }),
            o.updateContainerElements(e),
            o
        );
    };
function ho(e) {
    let t, n;
    (window.addEventListener(`focusin`, () => {
        ((t = n), (n = document.activeElement));
    }),
        e.magic(`focus`, (e) => {
            let r = e;
            return {
                __noscroll: !1,
                __wrapAround: !1,
                within(e) {
                    return ((r = e), this);
                },
                withoutScrolling() {
                    return ((this.__noscroll = !0), this);
                },
                noscroll() {
                    return ((this.__noscroll = !0), this);
                },
                withWrapAround() {
                    return ((this.__wrapAround = !0), this);
                },
                wrap() {
                    return this.withWrapAround();
                },
                focusable(e) {
                    return Va(e);
                },
                previouslyFocused() {
                    return t;
                },
                lastFocused() {
                    return t;
                },
                focused() {
                    return n;
                },
                focusables() {
                    return Array.isArray(r)
                        ? r
                        : Ra(r, { displayCheck: `none` });
                },
                all() {
                    return this.focusables();
                },
                isFirst(e) {
                    let t = this.all();
                    return t[0] && t[0].isSameNode(e);
                },
                isLast(e) {
                    let t = this.all();
                    return t.length && t.slice(-1)[0].isSameNode(e);
                },
                getFirst() {
                    return this.all()[0];
                },
                getLast() {
                    return this.all().slice(-1)[0];
                },
                getNext() {
                    let e = this.all(),
                        t = document.activeElement;
                    if (e.indexOf(t) !== -1)
                        return this.__wrapAround &&
                            e.indexOf(t) === e.length - 1
                            ? e[0]
                            : e[e.indexOf(t) + 1];
                },
                getPrevious() {
                    let e = this.all(),
                        t = document.activeElement;
                    if (e.indexOf(t) !== -1)
                        return this.__wrapAround && e.indexOf(t) === 0
                            ? e.slice(-1)[0]
                            : e[e.indexOf(t) - 1];
                },
                first() {
                    this.focus(this.getFirst());
                },
                last() {
                    this.focus(this.getLast());
                },
                next() {
                    this.focus(this.getNext());
                },
                previous() {
                    this.focus(this.getPrevious());
                },
                prev() {
                    return this.previous();
                },
                focus(e) {
                    e &&
                        setTimeout(() => {
                            (e.hasAttribute(`tabindex`) ||
                                e.setAttribute(`tabindex`, `0`),
                                e.focus({ preventScroll: this.__noscroll }));
                        });
                },
            };
        }),
        e.directive(
            `trap`,
            e.skipDuringClone(
                (
                    t,
                    { expression: n, modifiers: r },
                    { effect: i, evaluateLater: a, cleanup: o },
                ) => {
                    let s = a(n),
                        c = !1,
                        l = {
                            escapeDeactivates: !1,
                            allowOutsideClick: !0,
                            fallbackFocus: () => t,
                        },
                        u = () => {};
                    if (r.includes(`noautofocus`)) l.initialFocus = !1;
                    else {
                        let e = t.querySelector(`[autofocus]`);
                        e && (l.initialFocus = e);
                    }
                    r.includes(`inert`) &&
                        (l.onPostActivate = () => {
                            e.nextTick(() => {
                                u = go(t);
                            });
                        });
                    let d = mo(t, l),
                        f = () => {},
                        p = () => {
                            (u(),
                                (u = () => {}),
                                f(),
                                (f = () => {}),
                                d.deactivate({
                                    returnFocus: !r.includes(`noreturn`),
                                }));
                        };
                    (i(() =>
                        s((e) => {
                            c !== e &&
                                (e &&
                                    !c &&
                                    (r.includes(`noscroll`) && (f = vo()),
                                    setTimeout(() => {
                                        d.activate();
                                    }, 15)),
                                !e && c && p(),
                                (c = !!e));
                        }),
                    ),
                        o(p));
                },
                (e, { expression: t, modifiers: n }, { evaluate: r }) => {
                    n.includes(`inert`) && r(t) && go(e);
                },
            ),
        ));
}
function go(e) {
    let t = [];
    return (
        _o(e, (e) => {
            let n = e.hasAttribute(`aria-hidden`);
            (e.setAttribute(`aria-hidden`, `true`),
                t.push(() => n || e.removeAttribute(`aria-hidden`)));
        }),
        () => {
            for (; t.length; ) t.pop()();
        }
    );
}
function _o(e, t) {
    e.isSameNode(document.body) ||
        !e.parentNode ||
        Array.from(e.parentNode.children).forEach((n) => {
            n.isSameNode(e) ? _o(e.parentNode, t) : t(n);
        });
}
function vo() {
    let e = document.documentElement.style.overflow,
        t = document.documentElement.style.paddingRight,
        n = window.innerWidth - document.documentElement.clientWidth,
        r = window.getComputedStyle(document.documentElement).scrollbarGutter;
    return (
        (document.documentElement.style.overflow = `hidden`),
        r && r !== `auto`
            ? () => {
                  document.documentElement.style.overflow = e;
              }
            : ((document.documentElement.style.paddingRight = `${n}px`),
              () => {
                  ((document.documentElement.style.overflow = e),
                      (document.documentElement.style.paddingRight = t));
              })
    );
}
var yo = ho,
    bo =
        typeof global == `object` &&
        global &&
        global.Object === Object &&
        global,
    xo = typeof self == `object` && self && self.Object === Object && self,
    So = bo || xo || Function(`return this`)(),
    Co = So.Symbol,
    wo = Object.prototype,
    To = wo.hasOwnProperty,
    Eo = wo.toString,
    Do = Co ? Co.toStringTag : void 0;
function Oo(e) {
    var t = To.call(e, Do),
        n = e[Do];
    try {
        e[Do] = void 0;
        var r = !0;
    } catch {}
    var i = Eo.call(e);
    return (r && (t ? (e[Do] = n) : delete e[Do]), i);
}
var ko = Object.prototype.toString;
function Ao(e) {
    return ko.call(e);
}
var jo = `[object Null]`,
    Mo = `[object Undefined]`,
    No = Co ? Co.toStringTag : void 0;
function Po(e) {
    return e == null
        ? e === void 0
            ? Mo
            : jo
        : No && No in Object(e)
          ? Oo(e)
          : Ao(e);
}
function Fo(e) {
    return typeof e == `object` && !!e;
}
var Io = Array.isArray;
function Lo(e) {
    var t = typeof e;
    return e != null && (t == `object` || t == `function`);
}
function Ro(e) {
    return e;
}
var zo = `[object AsyncFunction]`,
    Bo = `[object Function]`,
    Vo = `[object GeneratorFunction]`,
    Ho = `[object Proxy]`;
function Uo(e) {
    if (!Lo(e)) return !1;
    var t = Po(e);
    return t == Bo || t == Vo || t == zo || t == Ho;
}
var Wo = So[`__core-js_shared__`],
    Go = (function () {
        var e = /[^.]+$/.exec((Wo && Wo.keys && Wo.keys.IE_PROTO) || ``);
        return e ? `Symbol(src)_1.` + e : ``;
    })();
function Ko(e) {
    return !!Go && Go in e;
}
var qo = Function.prototype.toString;
function Jo(e) {
    if (e != null) {
        try {
            return qo.call(e);
        } catch {}
        try {
            return e + ``;
        } catch {}
    }
    return ``;
}
var Yo = /[\\^$.*+?()[\]{}|]/g,
    Xo = /^\[object .+?Constructor\]$/,
    Zo = Function.prototype,
    Qo = Object.prototype,
    $o = Zo.toString,
    es = Qo.hasOwnProperty,
    ts = RegExp(
        `^` +
            $o
                .call(es)
                .replace(Yo, `\\$&`)
                .replace(
                    /hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g,
                    `$1.*?`,
                ) +
            `$`,
    );
function ns(e) {
    return !Lo(e) || Ko(e) ? !1 : (Uo(e) ? ts : Xo).test(Jo(e));
}
function rs(e, t) {
    return e?.[t];
}
function is(e, t) {
    var n = rs(e, t);
    return ns(n) ? n : void 0;
}
var as = is(So, `WeakMap`),
    os = Object.create,
    ss = (function () {
        function e() {}
        return function (t) {
            if (!Lo(t)) return {};
            if (os) return os(t);
            e.prototype = t;
            var n = new e();
            return ((e.prototype = void 0), n);
        };
    })();
function cs(e, t, n) {
    switch (n.length) {
        case 0:
            return e.call(t);
        case 1:
            return e.call(t, n[0]);
        case 2:
            return e.call(t, n[0], n[1]);
        case 3:
            return e.call(t, n[0], n[1], n[2]);
    }
    return e.apply(t, n);
}
function ls(e, t) {
    var n = -1,
        r = e.length;
    for (t ||= Array(r); ++n < r; ) t[n] = e[n];
    return t;
}
var us = 800,
    ds = 16,
    fs = Date.now;
function ps(e) {
    var t = 0,
        n = 0;
    return function () {
        var r = fs(),
            i = ds - (r - n);
        if (((n = r), i > 0)) {
            if (++t >= us) return arguments[0];
        } else t = 0;
        return e.apply(void 0, arguments);
    };
}
function ms(e) {
    return function () {
        return e;
    };
}
var hs = (function () {
        try {
            var e = is(Object, `defineProperty`);
            return (e({}, ``, {}), e);
        } catch {}
    })(),
    gs = ps(
        hs
            ? function (e, t) {
                  return hs(e, `toString`, {
                      configurable: !0,
                      enumerable: !1,
                      value: ms(t),
                      writable: !0,
                  });
              }
            : Ro,
    );
function _s(e, t) {
    for (
        var n = -1, r = e == null ? 0 : e.length;
        ++n < r && t(e[n], n, e) !== !1;
    );
    return e;
}
var vs = 9007199254740991,
    ys = /^(?:0|[1-9]\d*)$/;
function bs(e, t) {
    var n = typeof e;
    return (
        (t ??= vs),
        !!t &&
            (n == `number` || (n != `symbol` && ys.test(e))) &&
            e > -1 &&
            e % 1 == 0 &&
            e < t
    );
}
function xs(e, t, n) {
    t == `__proto__` && hs
        ? hs(e, t, { configurable: !0, enumerable: !0, value: n, writable: !0 })
        : (e[t] = n);
}
function Ss(e, t) {
    return e === t || (e !== e && t !== t);
}
var Cs = Object.prototype.hasOwnProperty;
function ws(e, t, n) {
    var r = e[t];
    (!(Cs.call(e, t) && Ss(r, n)) || (n === void 0 && !(t in e))) &&
        xs(e, t, n);
}
function Ts(e, t, n, r) {
    var i = !n;
    n ||= {};
    for (var a = -1, o = t.length; ++a < o; ) {
        var s = t[a],
            c = r ? r(n[s], e[s], s, n, e) : void 0;
        (c === void 0 && (c = e[s]), i ? xs(n, s, c) : ws(n, s, c));
    }
    return n;
}
var Es = Math.max;
function Ds(e, t, n) {
    return (
        (t = Es(t === void 0 ? e.length - 1 : t, 0)),
        function () {
            for (
                var r = arguments,
                    i = -1,
                    a = Es(r.length - t, 0),
                    o = Array(a);
                ++i < a;
            )
                o[i] = r[t + i];
            i = -1;
            for (var s = Array(t + 1); ++i < t; ) s[i] = r[i];
            return ((s[t] = n(o)), cs(e, this, s));
        }
    );
}
function Os(e, t) {
    return gs(Ds(e, t, Ro), e + ``);
}
var ks = 9007199254740991;
function As(e) {
    return typeof e == `number` && e > -1 && e % 1 == 0 && e <= ks;
}
function js(e) {
    return e != null && As(e.length) && !Uo(e);
}
function Ms(e, t, n) {
    if (!Lo(n)) return !1;
    var r = typeof t;
    return (r == `number` ? js(n) && bs(t, n.length) : r == `string` && t in n)
        ? Ss(n[t], e)
        : !1;
}
function Ns(e) {
    return Os(function (t, n) {
        var r = -1,
            i = n.length,
            a = i > 1 ? n[i - 1] : void 0,
            o = i > 2 ? n[2] : void 0;
        for (
            a = e.length > 3 && typeof a == `function` ? (i--, a) : void 0,
                o && Ms(n[0], n[1], o) && ((a = i < 3 ? void 0 : a), (i = 1)),
                t = Object(t);
            ++r < i;
        ) {
            var s = n[r];
            s && e(t, s, r, a);
        }
        return t;
    });
}
var Ps = Object.prototype;
function Fs(e) {
    var t = e && e.constructor;
    return e === ((typeof t == `function` && t.prototype) || Ps);
}
function Is(e, t) {
    for (var n = -1, r = Array(e); ++n < e; ) r[n] = t(n);
    return r;
}
var Ls = `[object Arguments]`;
function Rs(e) {
    return Fo(e) && Po(e) == Ls;
}
var zs = Object.prototype,
    Bs = zs.hasOwnProperty,
    Vs = zs.propertyIsEnumerable,
    Hs = Rs(
        (function () {
            return arguments;
        })(),
    )
        ? Rs
        : function (e) {
              return Fo(e) && Bs.call(e, `callee`) && !Vs.call(e, `callee`);
          };
function Us() {
    return !1;
}
var Ws = typeof exports == `object` && exports && !exports.nodeType && exports,
    Gs =
        Ws && typeof module == `object` && module && !module.nodeType && module,
    Ks = Gs && Gs.exports === Ws ? So.Buffer : void 0,
    qs = (Ks ? Ks.isBuffer : void 0) || Us,
    Js = `[object Arguments]`,
    Ys = `[object Array]`,
    Xs = `[object Boolean]`,
    Zs = `[object Date]`,
    Qs = `[object Error]`,
    $s = `[object Function]`,
    ec = `[object Map]`,
    tc = `[object Number]`,
    nc = `[object Object]`,
    rc = `[object RegExp]`,
    ic = `[object Set]`,
    ac = `[object String]`,
    oc = `[object WeakMap]`,
    sc = `[object ArrayBuffer]`,
    cc = `[object DataView]`,
    lc = `[object Float32Array]`,
    uc = `[object Float64Array]`,
    dc = `[object Int8Array]`,
    fc = `[object Int16Array]`,
    pc = `[object Int32Array]`,
    mc = `[object Uint8Array]`,
    hc = `[object Uint8ClampedArray]`,
    gc = `[object Uint16Array]`,
    _c = `[object Uint32Array]`,
    W = {};
((W[lc] = W[uc] = W[dc] = W[fc] = W[pc] = W[mc] = W[hc] = W[gc] = W[_c] = !0),
    (W[Js] =
        W[Ys] =
        W[sc] =
        W[Xs] =
        W[cc] =
        W[Zs] =
        W[Qs] =
        W[$s] =
        W[ec] =
        W[tc] =
        W[nc] =
        W[rc] =
        W[ic] =
        W[ac] =
        W[oc] =
            !1));
function vc(e) {
    return Fo(e) && As(e.length) && !!W[Po(e)];
}
function yc(e) {
    return function (t) {
        return e(t);
    };
}
var bc = typeof exports == `object` && exports && !exports.nodeType && exports,
    xc =
        bc && typeof module == `object` && module && !module.nodeType && module,
    Sc = xc && xc.exports === bc && bo.process,
    Cc = (function () {
        try {
            return (
                (xc && xc.require && xc.require(`util`).types) ||
                (Sc && Sc.binding && Sc.binding(`util`))
            );
        } catch {}
    })(),
    wc = Cc && Cc.isTypedArray,
    Tc = wc ? yc(wc) : vc,
    Ec = Object.prototype.hasOwnProperty;
function Dc(e, t) {
    var n = Io(e),
        r = !n && Hs(e),
        i = !n && !r && qs(e),
        a = !n && !r && !i && Tc(e),
        o = n || r || i || a,
        s = o ? Is(e.length, String) : [],
        c = s.length;
    for (var l in e)
        (t || Ec.call(e, l)) &&
            !(
                o &&
                (l == `length` ||
                    (i && (l == `offset` || l == `parent`)) ||
                    (a &&
                        (l == `buffer` ||
                            l == `byteLength` ||
                            l == `byteOffset`)) ||
                    bs(l, c))
            ) &&
            s.push(l);
    return s;
}
function Oc(e, t) {
    return function (n) {
        return e(t(n));
    };
}
var kc = Oc(Object.keys, Object),
    Ac = Object.prototype.hasOwnProperty;
function jc(e) {
    if (!Fs(e)) return kc(e);
    var t = [];
    for (var n in Object(e)) Ac.call(e, n) && n != `constructor` && t.push(n);
    return t;
}
function Mc(e) {
    return js(e) ? Dc(e) : jc(e);
}
function Nc(e) {
    var t = [];
    if (e != null) for (var n in Object(e)) t.push(n);
    return t;
}
var Pc = Object.prototype.hasOwnProperty;
function Fc(e) {
    if (!Lo(e)) return Nc(e);
    var t = Fs(e),
        n = [];
    for (var r in e) (r == `constructor` && (t || !Pc.call(e, r))) || n.push(r);
    return n;
}
function Ic(e) {
    return js(e) ? Dc(e, !0) : Fc(e);
}
var Lc = is(Object, `create`);
function Rc() {
    ((this.__data__ = Lc ? Lc(null) : {}), (this.size = 0));
}
function zc(e) {
    var t = this.has(e) && delete this.__data__[e];
    return ((this.size -= +!!t), t);
}
var Bc = `__lodash_hash_undefined__`,
    Vc = Object.prototype.hasOwnProperty;
function Hc(e) {
    var t = this.__data__;
    if (Lc) {
        var n = t[e];
        return n === Bc ? void 0 : n;
    }
    return Vc.call(t, e) ? t[e] : void 0;
}
var Uc = Object.prototype.hasOwnProperty;
function Wc(e) {
    var t = this.__data__;
    return Lc ? t[e] !== void 0 : Uc.call(t, e);
}
var Gc = `__lodash_hash_undefined__`;
function Kc(e, t) {
    var n = this.__data__;
    return (
        (this.size += +!this.has(e)),
        (n[e] = Lc && t === void 0 ? Gc : t),
        this
    );
}
function qc(e) {
    var t = -1,
        n = e == null ? 0 : e.length;
    for (this.clear(); ++t < n; ) {
        var r = e[t];
        this.set(r[0], r[1]);
    }
}
((qc.prototype.clear = Rc),
    (qc.prototype.delete = zc),
    (qc.prototype.get = Hc),
    (qc.prototype.has = Wc),
    (qc.prototype.set = Kc));
function Jc() {
    ((this.__data__ = []), (this.size = 0));
}
function Yc(e, t) {
    for (var n = e.length; n--; ) if (Ss(e[n][0], t)) return n;
    return -1;
}
var Xc = Array.prototype.splice;
function Zc(e) {
    var t = this.__data__,
        n = Yc(t, e);
    return n < 0
        ? !1
        : (n == t.length - 1 ? t.pop() : Xc.call(t, n, 1), --this.size, !0);
}
function Qc(e) {
    var t = this.__data__,
        n = Yc(t, e);
    return n < 0 ? void 0 : t[n][1];
}
function $c(e) {
    return Yc(this.__data__, e) > -1;
}
function el(e, t) {
    var n = this.__data__,
        r = Yc(n, e);
    return (r < 0 ? (++this.size, n.push([e, t])) : (n[r][1] = t), this);
}
function tl(e) {
    var t = -1,
        n = e == null ? 0 : e.length;
    for (this.clear(); ++t < n; ) {
        var r = e[t];
        this.set(r[0], r[1]);
    }
}
((tl.prototype.clear = Jc),
    (tl.prototype.delete = Zc),
    (tl.prototype.get = Qc),
    (tl.prototype.has = $c),
    (tl.prototype.set = el));
var nl = is(So, `Map`);
function rl() {
    ((this.size = 0),
        (this.__data__ = {
            hash: new qc(),
            map: new (nl || tl)(),
            string: new qc(),
        }));
}
function il(e) {
    var t = typeof e;
    return t == `string` || t == `number` || t == `symbol` || t == `boolean`
        ? e !== `__proto__`
        : e === null;
}
function al(e, t) {
    var n = e.__data__;
    return il(t) ? n[typeof t == `string` ? `string` : `hash`] : n.map;
}
function ol(e) {
    var t = al(this, e).delete(e);
    return ((this.size -= +!!t), t);
}
function sl(e) {
    return al(this, e).get(e);
}
function cl(e) {
    return al(this, e).has(e);
}
function ll(e, t) {
    var n = al(this, e),
        r = n.size;
    return (n.set(e, t), (this.size += n.size == r ? 0 : 1), this);
}
function ul(e) {
    var t = -1,
        n = e == null ? 0 : e.length;
    for (this.clear(); ++t < n; ) {
        var r = e[t];
        this.set(r[0], r[1]);
    }
}
((ul.prototype.clear = rl),
    (ul.prototype.delete = ol),
    (ul.prototype.get = sl),
    (ul.prototype.has = cl),
    (ul.prototype.set = ll));
function dl(e, t) {
    for (var n = -1, r = t.length, i = e.length; ++n < r; ) e[i + n] = t[n];
    return e;
}
var fl = Oc(Object.getPrototypeOf, Object),
    pl = `[object Object]`,
    ml = Function.prototype,
    hl = Object.prototype,
    gl = ml.toString,
    _l = hl.hasOwnProperty,
    vl = gl.call(Object);
function yl(e) {
    if (!Fo(e) || Po(e) != pl) return !1;
    var t = fl(e);
    if (t === null) return !0;
    var n = _l.call(t, `constructor`) && t.constructor;
    return typeof n == `function` && n instanceof n && gl.call(n) == vl;
}
function bl() {
    ((this.__data__ = new tl()), (this.size = 0));
}
function xl(e) {
    var t = this.__data__,
        n = t.delete(e);
    return ((this.size = t.size), n);
}
function Sl(e) {
    return this.__data__.get(e);
}
function Cl(e) {
    return this.__data__.has(e);
}
var wl = 200;
function Tl(e, t) {
    var n = this.__data__;
    if (n instanceof tl) {
        var r = n.__data__;
        if (!nl || r.length < wl - 1)
            return (r.push([e, t]), (this.size = ++n.size), this);
        n = this.__data__ = new ul(r);
    }
    return (n.set(e, t), (this.size = n.size), this);
}
function El(e) {
    var t = (this.__data__ = new tl(e));
    this.size = t.size;
}
((El.prototype.clear = bl),
    (El.prototype.delete = xl),
    (El.prototype.get = Sl),
    (El.prototype.has = Cl),
    (El.prototype.set = Tl));
function Dl(e, t) {
    return e && Ts(t, Mc(t), e);
}
function Ol(e, t) {
    return e && Ts(t, Ic(t), e);
}
var kl = typeof exports == `object` && exports && !exports.nodeType && exports,
    Al =
        kl && typeof module == `object` && module && !module.nodeType && module,
    jl = Al && Al.exports === kl ? So.Buffer : void 0,
    Ml = jl ? jl.allocUnsafe : void 0;
function Nl(e, t) {
    if (t) return e.slice();
    var n = e.length,
        r = Ml ? Ml(n) : new e.constructor(n);
    return (e.copy(r), r);
}
function Pl(e, t) {
    for (var n = -1, r = e == null ? 0 : e.length, i = 0, a = []; ++n < r; ) {
        var o = e[n];
        t(o, n, e) && (a[i++] = o);
    }
    return a;
}
function Fl() {
    return [];
}
var Il = Object.prototype.propertyIsEnumerable,
    Ll = Object.getOwnPropertySymbols,
    Rl = Ll
        ? function (e) {
              return e == null
                  ? []
                  : ((e = Object(e)),
                    Pl(Ll(e), function (t) {
                        return Il.call(e, t);
                    }));
          }
        : Fl;
function zl(e, t) {
    return Ts(e, Rl(e), t);
}
var Bl = Object.getOwnPropertySymbols
    ? function (e) {
          for (var t = []; e; ) (dl(t, Rl(e)), (e = fl(e)));
          return t;
      }
    : Fl;
function Vl(e, t) {
    return Ts(e, Bl(e), t);
}
function Hl(e, t, n) {
    var r = t(e);
    return Io(e) ? r : dl(r, n(e));
}
function Ul(e) {
    return Hl(e, Mc, Rl);
}
function Wl(e) {
    return Hl(e, Ic, Bl);
}
var Gl = is(So, `DataView`),
    Kl = is(So, `Promise`),
    ql = is(So, `Set`),
    Jl = `[object Map]`,
    Yl = `[object Object]`,
    Xl = `[object Promise]`,
    Zl = `[object Set]`,
    Ql = `[object WeakMap]`,
    $l = `[object DataView]`,
    eu = Jo(Gl),
    tu = Jo(nl),
    nu = Jo(Kl),
    ru = Jo(ql),
    iu = Jo(as),
    au = Po;
((Gl && au(new Gl(new ArrayBuffer(1))) != $l) ||
    (nl && au(new nl()) != Jl) ||
    (Kl && au(Kl.resolve()) != Xl) ||
    (ql && au(new ql()) != Zl) ||
    (as && au(new as()) != Ql)) &&
    (au = function (e) {
        var t = Po(e),
            n = t == Yl ? e.constructor : void 0,
            r = n ? Jo(n) : ``;
        if (r)
            switch (r) {
                case eu:
                    return $l;
                case tu:
                    return Jl;
                case nu:
                    return Xl;
                case ru:
                    return Zl;
                case iu:
                    return Ql;
            }
        return t;
    });
var ou = au,
    su = Object.prototype.hasOwnProperty;
function cu(e) {
    var t = e.length,
        n = new e.constructor(t);
    return (
        t &&
            typeof e[0] == `string` &&
            su.call(e, `index`) &&
            ((n.index = e.index), (n.input = e.input)),
        n
    );
}
var lu = So.Uint8Array;
function uu(e) {
    var t = new e.constructor(e.byteLength);
    return (new lu(t).set(new lu(e)), t);
}
function du(e, t) {
    var n = t ? uu(e.buffer) : e.buffer;
    return new e.constructor(n, e.byteOffset, e.byteLength);
}
var fu = /\w*$/;
function pu(e) {
    var t = new e.constructor(e.source, fu.exec(e));
    return ((t.lastIndex = e.lastIndex), t);
}
var mu = Co ? Co.prototype : void 0,
    hu = mu ? mu.valueOf : void 0;
function gu(e) {
    return hu ? Object(hu.call(e)) : {};
}
function _u(e, t) {
    var n = t ? uu(e.buffer) : e.buffer;
    return new e.constructor(n, e.byteOffset, e.length);
}
var vu = `[object Boolean]`,
    yu = `[object Date]`,
    bu = `[object Map]`,
    xu = `[object Number]`,
    Su = `[object RegExp]`,
    Cu = `[object Set]`,
    wu = `[object String]`,
    Tu = `[object Symbol]`,
    Eu = `[object ArrayBuffer]`,
    Du = `[object DataView]`,
    Ou = `[object Float32Array]`,
    ku = `[object Float64Array]`,
    Au = `[object Int8Array]`,
    ju = `[object Int16Array]`,
    Mu = `[object Int32Array]`,
    Nu = `[object Uint8Array]`,
    Pu = `[object Uint8ClampedArray]`,
    Fu = `[object Uint16Array]`,
    Iu = `[object Uint32Array]`;
function Lu(e, t, n) {
    var r = e.constructor;
    switch (t) {
        case Eu:
            return uu(e);
        case vu:
        case yu:
            return new r(+e);
        case Du:
            return du(e, n);
        case Ou:
        case ku:
        case Au:
        case ju:
        case Mu:
        case Nu:
        case Pu:
        case Fu:
        case Iu:
            return _u(e, n);
        case bu:
            return new r();
        case xu:
        case wu:
            return new r(e);
        case Su:
            return pu(e);
        case Cu:
            return new r();
        case Tu:
            return gu(e);
    }
}
function Ru(e) {
    return typeof e.constructor == `function` && !Fs(e) ? ss(fl(e)) : {};
}
var zu = `[object Map]`;
function Bu(e) {
    return Fo(e) && ou(e) == zu;
}
var Vu = Cc && Cc.isMap,
    Hu = Vu ? yc(Vu) : Bu,
    Uu = `[object Set]`;
function Wu(e) {
    return Fo(e) && ou(e) == Uu;
}
var Gu = Cc && Cc.isSet,
    Ku = Gu ? yc(Gu) : Wu,
    qu = 1,
    Ju = 2,
    Yu = 4,
    Xu = `[object Arguments]`,
    Zu = `[object Array]`,
    Qu = `[object Boolean]`,
    $u = `[object Date]`,
    ed = `[object Error]`,
    td = `[object Function]`,
    nd = `[object GeneratorFunction]`,
    rd = `[object Map]`,
    id = `[object Number]`,
    ad = `[object Object]`,
    od = `[object RegExp]`,
    sd = `[object Set]`,
    cd = `[object String]`,
    ld = `[object Symbol]`,
    ud = `[object WeakMap]`,
    dd = `[object ArrayBuffer]`,
    fd = `[object DataView]`,
    pd = `[object Float32Array]`,
    md = `[object Float64Array]`,
    hd = `[object Int8Array]`,
    gd = `[object Int16Array]`,
    _d = `[object Int32Array]`,
    vd = `[object Uint8Array]`,
    yd = `[object Uint8ClampedArray]`,
    bd = `[object Uint16Array]`,
    xd = `[object Uint32Array]`,
    G = {};
((G[Xu] =
    G[Zu] =
    G[dd] =
    G[fd] =
    G[Qu] =
    G[$u] =
    G[pd] =
    G[md] =
    G[hd] =
    G[gd] =
    G[_d] =
    G[rd] =
    G[id] =
    G[ad] =
    G[od] =
    G[sd] =
    G[cd] =
    G[ld] =
    G[vd] =
    G[yd] =
    G[bd] =
    G[xd] =
        !0),
    (G[ed] = G[td] = G[ud] = !1));
function Sd(e, t, n, r, i, a) {
    var o,
        s = t & qu,
        c = t & Ju,
        l = t & Yu;
    if ((n && (o = i ? n(e, r, i, a) : n(e)), o !== void 0)) return o;
    if (!Lo(e)) return e;
    var u = Io(e);
    if (u) {
        if (((o = cu(e)), !s)) return ls(e, o);
    } else {
        var d = ou(e),
            f = d == td || d == nd;
        if (qs(e)) return Nl(e, s);
        if (d == ad || d == Xu || (f && !i)) {
            if (((o = c || f ? {} : Ru(e)), !s))
                return c ? Vl(e, Ol(o, e)) : zl(e, Dl(o, e));
        } else {
            if (!G[d]) return i ? e : {};
            o = Lu(e, d, s);
        }
    }
    a ||= new El();
    var p = a.get(e);
    if (p) return p;
    (a.set(e, o),
        Ku(e)
            ? e.forEach(function (r) {
                  o.add(Sd(r, t, n, r, e, a));
              })
            : Hu(e) &&
              e.forEach(function (r, i) {
                  o.set(i, Sd(r, t, n, i, e, a));
              }));
    var m = u ? void 0 : (l ? (c ? Wl : Ul) : c ? Ic : Mc)(e);
    return (
        _s(m || e, function (r, i) {
            (m && ((i = r), (r = e[i])), ws(o, i, Sd(r, t, n, i, e, a)));
        }),
        o
    );
}
var Cd = 1,
    wd = 4;
function Td(e) {
    return Sd(e, Cd | wd);
}
var Ed = `__lodash_hash_undefined__`;
function Dd(e) {
    return (this.__data__.set(e, Ed), this);
}
function Od(e) {
    return this.__data__.has(e);
}
function kd(e) {
    var t = -1,
        n = e == null ? 0 : e.length;
    for (this.__data__ = new ul(); ++t < n; ) this.add(e[t]);
}
((kd.prototype.add = kd.prototype.push = Dd), (kd.prototype.has = Od));
function Ad(e, t) {
    for (var n = -1, r = e == null ? 0 : e.length; ++n < r; )
        if (t(e[n], n, e)) return !0;
    return !1;
}
function jd(e, t) {
    return e.has(t);
}
var Md = 1,
    Nd = 2;
function Pd(e, t, n, r, i, a) {
    var o = n & Md,
        s = e.length,
        c = t.length;
    if (s != c && !(o && c > s)) return !1;
    var l = a.get(e),
        u = a.get(t);
    if (l && u) return l == t && u == e;
    var d = -1,
        f = !0,
        p = n & Nd ? new kd() : void 0;
    for (a.set(e, t), a.set(t, e); ++d < s; ) {
        var m = e[d],
            h = t[d];
        if (r) var g = o ? r(h, m, d, t, e, a) : r(m, h, d, e, t, a);
        if (g !== void 0) {
            if (g) continue;
            f = !1;
            break;
        }
        if (p) {
            if (
                !Ad(t, function (e, t) {
                    if (!jd(p, t) && (m === e || i(m, e, n, r, a)))
                        return p.push(t);
                })
            ) {
                f = !1;
                break;
            }
        } else if (!(m === h || i(m, h, n, r, a))) {
            f = !1;
            break;
        }
    }
    return (a.delete(e), a.delete(t), f);
}
function Fd(e) {
    var t = -1,
        n = Array(e.size);
    return (
        e.forEach(function (e, r) {
            n[++t] = [r, e];
        }),
        n
    );
}
function Id(e) {
    var t = -1,
        n = Array(e.size);
    return (
        e.forEach(function (e) {
            n[++t] = e;
        }),
        n
    );
}
var Ld = 1,
    Rd = 2,
    zd = `[object Boolean]`,
    Bd = `[object Date]`,
    Vd = `[object Error]`,
    Hd = `[object Map]`,
    Ud = `[object Number]`,
    Wd = `[object RegExp]`,
    Gd = `[object Set]`,
    Kd = `[object String]`,
    qd = `[object Symbol]`,
    Jd = `[object ArrayBuffer]`,
    Yd = `[object DataView]`,
    Xd = Co ? Co.prototype : void 0,
    Zd = Xd ? Xd.valueOf : void 0;
function Qd(e, t, n, r, i, a, o) {
    switch (n) {
        case Yd:
            if (e.byteLength != t.byteLength || e.byteOffset != t.byteOffset)
                return !1;
            ((e = e.buffer), (t = t.buffer));
        case Jd:
            return !(e.byteLength != t.byteLength || !a(new lu(e), new lu(t)));
        case zd:
        case Bd:
        case Ud:
            return Ss(+e, +t);
        case Vd:
            return e.name == t.name && e.message == t.message;
        case Wd:
        case Kd:
            return e == t + ``;
        case Hd:
            var s = Fd;
        case Gd:
            var c = r & Ld;
            if (((s ||= Id), e.size != t.size && !c)) return !1;
            var l = o.get(e);
            if (l) return l == t;
            ((r |= Rd), o.set(e, t));
            var u = Pd(s(e), s(t), r, i, a, o);
            return (o.delete(e), u);
        case qd:
            if (Zd) return Zd.call(e) == Zd.call(t);
    }
    return !1;
}
var $d = 1,
    ef = Object.prototype.hasOwnProperty;
function tf(e, t, n, r, i, a) {
    var o = n & $d,
        s = Ul(e),
        c = s.length;
    if (c != Ul(t).length && !o) return !1;
    for (var l = c; l--; ) {
        var u = s[l];
        if (!(o ? u in t : ef.call(t, u))) return !1;
    }
    var d = a.get(e),
        f = a.get(t);
    if (d && f) return d == t && f == e;
    var p = !0;
    (a.set(e, t), a.set(t, e));
    for (var m = o; ++l < c; ) {
        u = s[l];
        var h = e[u],
            g = t[u];
        if (r) var _ = o ? r(g, h, u, t, e, a) : r(h, g, u, e, t, a);
        if (!(_ === void 0 ? h === g || i(h, g, n, r, a) : _)) {
            p = !1;
            break;
        }
        m ||= u == `constructor`;
    }
    if (p && !m) {
        var v = e.constructor,
            y = t.constructor;
        v != y &&
            `constructor` in e &&
            `constructor` in t &&
            !(
                typeof v == `function` &&
                v instanceof v &&
                typeof y == `function` &&
                y instanceof y
            ) &&
            (p = !1);
    }
    return (a.delete(e), a.delete(t), p);
}
var nf = 1,
    rf = `[object Arguments]`,
    af = `[object Array]`,
    of = `[object Object]`,
    sf = Object.prototype.hasOwnProperty;
function cf(e, t, n, r, i, a) {
    var o = Io(e),
        s = Io(t),
        c = o ? af : ou(e),
        l = s ? af : ou(t);
    ((c = c == rf ? of : c), (l = l == rf ? of : l));
    var u = c == of,
        d = l == of,
        f = c == l;
    if (f && qs(e)) {
        if (!qs(t)) return !1;
        ((o = !0), (u = !1));
    }
    if (f && !u)
        return (
            (a ||= new El()),
            o || Tc(e) ? Pd(e, t, n, r, i, a) : Qd(e, t, c, n, r, i, a)
        );
    if (!(n & nf)) {
        var p = u && sf.call(e, `__wrapped__`),
            m = d && sf.call(t, `__wrapped__`);
        if (p || m) {
            var h = p ? e.value() : e,
                g = m ? t.value() : t;
            return ((a ||= new El()), i(h, g, n, r, a));
        }
    }
    return f ? ((a ||= new El()), tf(e, t, n, r, i, a)) : !1;
}
function lf(e, t, n, r, i) {
    return e === t
        ? !0
        : e == null || t == null || (!Fo(e) && !Fo(t))
          ? e !== e && t !== t
          : cf(e, t, n, r, lf, i);
}
function uf(e) {
    return function (t, n, r) {
        for (var i = -1, a = Object(t), o = r(t), s = o.length; s--; ) {
            var c = o[e ? s : ++i];
            if (n(a[c], c, a) === !1) break;
        }
        return t;
    };
}
var df = uf();
function ff(e, t, n) {
    ((n !== void 0 && !Ss(e[t], n)) || (n === void 0 && !(t in e))) &&
        xs(e, t, n);
}
function pf(e) {
    return Fo(e) && js(e);
}
function mf(e, t) {
    if (!(t === `constructor` && typeof e[t] == `function`) && t != `__proto__`)
        return e[t];
}
function hf(e) {
    return Ts(e, Ic(e));
}
function gf(e, t, n, r, i, a, o) {
    var s = mf(e, n),
        c = mf(t, n),
        l = o.get(c);
    if (l) {
        ff(e, n, l);
        return;
    }
    var u = a ? a(s, c, n + ``, e, t, o) : void 0,
        d = u === void 0;
    if (d) {
        var f = Io(c),
            p = !f && qs(c),
            m = !f && !p && Tc(c);
        ((u = c),
            f || p || m
                ? Io(s)
                    ? (u = s)
                    : pf(s)
                      ? (u = ls(s))
                      : p
                        ? ((d = !1), (u = Nl(c, !0)))
                        : m
                          ? ((d = !1), (u = _u(c, !0)))
                          : (u = [])
                : yl(c) || Hs(c)
                  ? ((u = s),
                    Hs(s) ? (u = hf(s)) : (!Lo(s) || Uo(s)) && (u = Ru(c)))
                  : (d = !1));
    }
    (d && (o.set(c, u), i(u, c, r, a, o), o.delete(c)), ff(e, n, u));
}
function _f(e, t, n, r, i) {
    e !== t &&
        df(
            t,
            function (a, o) {
                if (((i ||= new El()), Lo(a))) gf(e, t, o, n, _f, r, i);
                else {
                    var s = r ? r(mf(e, o), a, o + ``, e, t, i) : void 0;
                    (s === void 0 && (s = a), ff(e, o, s));
                }
            },
            Ic,
        );
}
function vf(e, t) {
    return lf(e, t);
}
var yf = Ns(function (e, t, n) {
        _f(e, t, n);
    }),
    bf = s({
        Attributor: () => xf,
        AttributorStore: () => kf,
        BlockBlot: () => Vf,
        ClassAttributor: () => Ef,
        ContainerBlot: () => Uf,
        EmbedBlot: () => J,
        InlineBlot: () => zf,
        LeafBlot: () => q,
        ParentBlot: () => If,
        Registry: () => wf,
        Scope: () => K,
        ScrollBlot: () => qf,
        StyleAttributor: () => Of,
        TextBlot: () => Yf,
    }),
    K = ((e) => (
        (e[(e.TYPE = 3)] = `TYPE`),
        (e[(e.LEVEL = 12)] = `LEVEL`),
        (e[(e.ATTRIBUTE = 13)] = `ATTRIBUTE`),
        (e[(e.BLOT = 14)] = `BLOT`),
        (e[(e.INLINE = 7)] = `INLINE`),
        (e[(e.BLOCK = 11)] = `BLOCK`),
        (e[(e.BLOCK_BLOT = 10)] = `BLOCK_BLOT`),
        (e[(e.INLINE_BLOT = 6)] = `INLINE_BLOT`),
        (e[(e.BLOCK_ATTRIBUTE = 9)] = `BLOCK_ATTRIBUTE`),
        (e[(e.INLINE_ATTRIBUTE = 5)] = `INLINE_ATTRIBUTE`),
        (e[(e.ANY = 15)] = `ANY`),
        e
    ))(K || {}),
    xf = class {
        constructor(e, t, n = {}) {
            ((this.attrName = e), (this.keyName = t));
            let r = K.TYPE & K.ATTRIBUTE;
            ((this.scope =
                n.scope == null ? K.ATTRIBUTE : (n.scope & K.LEVEL) | r),
                n.whitelist != null && (this.whitelist = n.whitelist));
        }
        static keys(e) {
            return Array.from(e.attributes).map((e) => e.name);
        }
        add(e, t) {
            return this.canAdd(e, t)
                ? (e.setAttribute(this.keyName, t), !0)
                : !1;
        }
        canAdd(e, t) {
            return this.whitelist == null
                ? !0
                : typeof t == `string`
                  ? this.whitelist.indexOf(t.replace(/["']/g, ``)) > -1
                  : this.whitelist.indexOf(t) > -1;
        }
        remove(e) {
            e.removeAttribute(this.keyName);
        }
        value(e) {
            let t = e.getAttribute(this.keyName);
            return this.canAdd(e, t) && t ? t : ``;
        }
    },
    Sf = class extends Error {
        constructor(e) {
            ((e = `[Parchment] ` + e),
                super(e),
                (this.message = e),
                (this.name = this.constructor.name));
        }
    },
    Cf = class e {
        constructor() {
            ((this.attributes = {}),
                (this.classes = {}),
                (this.tags = {}),
                (this.types = {}));
        }
        static find(e, t = !1) {
            if (e == null) return null;
            if (this.blots.has(e)) return this.blots.get(e) || null;
            if (t) {
                let n = null;
                try {
                    n = e.parentNode;
                } catch {
                    return null;
                }
                return this.find(n, t);
            }
            return null;
        }
        create(t, n, r) {
            let i = this.query(n);
            if (i == null) throw new Sf(`Unable to create ${n} blot`);
            let a = i,
                o = new a(
                    t,
                    n instanceof Node || n.nodeType === Node.TEXT_NODE
                        ? n
                        : a.create(r),
                    r,
                );
            return (e.blots.set(o.domNode, o), o);
        }
        find(t, n = !1) {
            return e.find(t, n);
        }
        query(e, t = K.ANY) {
            let n;
            return (
                typeof e == `string`
                    ? (n = this.types[e] || this.attributes[e])
                    : e instanceof Text || e.nodeType === Node.TEXT_NODE
                      ? (n = this.types.text)
                      : typeof e == `number`
                        ? e & K.LEVEL & K.BLOCK
                            ? (n = this.types.block)
                            : e & K.LEVEL & K.INLINE && (n = this.types.inline)
                        : e instanceof Element &&
                          ((e.getAttribute(`class`) || ``)
                              .split(/\s+/)
                              .some((e) => ((n = this.classes[e]), !!n)),
                          (n ||= this.tags[e.tagName])),
                n == null
                    ? null
                    : `scope` in n &&
                        t & K.LEVEL & n.scope &&
                        t & K.TYPE & n.scope
                      ? n
                      : null
            );
        }
        register(...e) {
            return e.map((e) => {
                let t = `blotName` in e,
                    n = `attrName` in e;
                if (!t && !n) throw new Sf(`Invalid definition`);
                if (t && e.blotName === `abstract`)
                    throw new Sf(`Cannot register abstract class`);
                let r = t ? e.blotName : n ? e.attrName : void 0;
                return (
                    (this.types[r] = e),
                    n
                        ? typeof e.keyName == `string` &&
                          (this.attributes[e.keyName] = e)
                        : t &&
                          (e.className && (this.classes[e.className] = e),
                          e.tagName &&
                              (Array.isArray(e.tagName)
                                  ? (e.tagName = e.tagName.map((e) =>
                                        e.toUpperCase(),
                                    ))
                                  : (e.tagName = e.tagName.toUpperCase()),
                              (Array.isArray(e.tagName)
                                  ? e.tagName
                                  : [e.tagName]
                              ).forEach((t) => {
                                  (this.tags[t] == null ||
                                      e.className == null) &&
                                      (this.tags[t] = e);
                              }))),
                    e
                );
            });
        }
    };
Cf.blots = new WeakMap();
var wf = Cf;
function Tf(e, t) {
    return (e.getAttribute(`class`) || ``)
        .split(/\s+/)
        .filter((e) => e.indexOf(`${t}-`) === 0);
}
var Ef = class extends xf {
    static keys(e) {
        return (e.getAttribute(`class`) || ``)
            .split(/\s+/)
            .map((e) => e.split(`-`).slice(0, -1).join(`-`));
    }
    add(e, t) {
        return this.canAdd(e, t)
            ? (this.remove(e), e.classList.add(`${this.keyName}-${t}`), !0)
            : !1;
    }
    remove(e) {
        (Tf(e, this.keyName).forEach((t) => {
            e.classList.remove(t);
        }),
            e.classList.length === 0 && e.removeAttribute(`class`));
    }
    value(e) {
        let t = (Tf(e, this.keyName)[0] || ``).slice(this.keyName.length + 1);
        return this.canAdd(e, t) ? t : ``;
    }
};
function Df(e) {
    let t = e.split(`-`),
        n = t
            .slice(1)
            .map((e) => e[0].toUpperCase() + e.slice(1))
            .join(``);
    return t[0] + n;
}
var Of = class extends xf {
        static keys(e) {
            return (e.getAttribute(`style`) || ``)
                .split(`;`)
                .map((e) => e.split(`:`)[0].trim());
        }
        add(e, t) {
            return this.canAdd(e, t)
                ? ((e.style[Df(this.keyName)] = t), !0)
                : !1;
        }
        remove(e) {
            ((e.style[Df(this.keyName)] = ``),
                e.getAttribute(`style`) || e.removeAttribute(`style`));
        }
        value(e) {
            let t = e.style[Df(this.keyName)];
            return this.canAdd(e, t) ? t : ``;
        }
    },
    kf = class {
        constructor(e) {
            ((this.attributes = {}), (this.domNode = e), this.build());
        }
        attribute(e, t) {
            t
                ? e.add(this.domNode, t) &&
                  (e.value(this.domNode) == null
                      ? delete this.attributes[e.attrName]
                      : (this.attributes[e.attrName] = e))
                : (e.remove(this.domNode), delete this.attributes[e.attrName]);
        }
        build() {
            this.attributes = {};
            let e = wf.find(this.domNode);
            if (e == null) return;
            let t = xf.keys(this.domNode),
                n = Ef.keys(this.domNode),
                r = Of.keys(this.domNode);
            t.concat(n)
                .concat(r)
                .forEach((t) => {
                    let n = e.scroll.query(t, K.ATTRIBUTE);
                    n instanceof xf && (this.attributes[n.attrName] = n);
                });
        }
        copy(e) {
            Object.keys(this.attributes).forEach((t) => {
                let n = this.attributes[t].value(this.domNode);
                e.format(t, n);
            });
        }
        move(e) {
            (this.copy(e),
                Object.keys(this.attributes).forEach((e) => {
                    this.attributes[e].remove(this.domNode);
                }),
                (this.attributes = {}));
        }
        values() {
            return Object.keys(this.attributes).reduce(
                (e, t) => ((e[t] = this.attributes[t].value(this.domNode)), e),
                {},
            );
        }
    },
    Af = class {
        constructor(e, t) {
            ((this.scroll = e),
                (this.domNode = t),
                wf.blots.set(t, this),
                (this.prev = null),
                (this.next = null));
        }
        static create(e) {
            if (this.tagName == null)
                throw new Sf(`Blot definition missing tagName`);
            let t, n;
            return (
                Array.isArray(this.tagName)
                    ? (typeof e == `string`
                          ? ((n = e.toUpperCase()),
                            parseInt(n, 10).toString() === n &&
                                (n = parseInt(n, 10)))
                          : typeof e == `number` && (n = e),
                      (t =
                          typeof n == `number`
                              ? document.createElement(this.tagName[n - 1])
                              : n && this.tagName.indexOf(n) > -1
                                ? document.createElement(n)
                                : document.createElement(this.tagName[0])))
                    : (t = document.createElement(this.tagName)),
                this.className && t.classList.add(this.className),
                t
            );
        }
        get statics() {
            return this.constructor;
        }
        attach() {}
        clone() {
            let e = this.domNode.cloneNode(!1);
            return this.scroll.create(e);
        }
        detach() {
            (this.parent != null && this.parent.removeChild(this),
                wf.blots.delete(this.domNode));
        }
        deleteAt(e, t) {
            this.isolate(e, t).remove();
        }
        formatAt(e, t, n, r) {
            let i = this.isolate(e, t);
            if (this.scroll.query(n, K.BLOT) != null && r) i.wrap(n, r);
            else if (this.scroll.query(n, K.ATTRIBUTE) != null) {
                let e = this.scroll.create(this.statics.scope);
                (i.wrap(e), e.format(n, r));
            }
        }
        insertAt(e, t, n) {
            let r =
                    n == null
                        ? this.scroll.create(`text`, t)
                        : this.scroll.create(t, n),
                i = this.split(e);
            this.parent.insertBefore(r, i || void 0);
        }
        isolate(e, t) {
            let n = this.split(e);
            if (n == null) throw Error(`Attempt to isolate at end`);
            return (n.split(t), n);
        }
        length() {
            return 1;
        }
        offset(e = this.parent) {
            return this.parent == null || this === e
                ? 0
                : this.parent.children.offset(this) + this.parent.offset(e);
        }
        optimize(e) {
            this.statics.requiredContainer &&
                !(this.parent instanceof this.statics.requiredContainer) &&
                this.wrap(this.statics.requiredContainer.blotName);
        }
        remove() {
            (this.domNode.parentNode != null &&
                this.domNode.parentNode.removeChild(this.domNode),
                this.detach());
        }
        replaceWith(e, t) {
            let n = typeof e == `string` ? this.scroll.create(e, t) : e;
            return (
                this.parent != null &&
                    (this.parent.insertBefore(n, this.next || void 0),
                    this.remove()),
                n
            );
        }
        split(e, t) {
            return e === 0 ? this : this.next;
        }
        update(e, t) {}
        wrap(e, t) {
            let n = typeof e == `string` ? this.scroll.create(e, t) : e;
            if (
                (this.parent != null &&
                    this.parent.insertBefore(n, this.next || void 0),
                typeof n.appendChild != `function`)
            )
                throw new Sf(`Cannot wrap ${e}`);
            return (n.appendChild(this), n);
        }
    };
Af.blotName = `abstract`;
var jf = Af,
    Mf = class extends jf {
        static value(e) {
            return !0;
        }
        index(e, t) {
            return this.domNode === e ||
                this.domNode.compareDocumentPosition(e) &
                    Node.DOCUMENT_POSITION_CONTAINED_BY
                ? Math.min(t, 1)
                : -1;
        }
        position(e, t) {
            let n = Array.from(this.parent.domNode.childNodes).indexOf(
                this.domNode,
            );
            return (e > 0 && (n += 1), [this.parent.domNode, n]);
        }
        value() {
            return {
                [this.statics.blotName]: this.statics.value(this.domNode) || !0,
            };
        }
    };
Mf.scope = K.INLINE_BLOT;
var q = Mf,
    Nf = class {
        constructor() {
            ((this.head = null), (this.tail = null), (this.length = 0));
        }
        append(...e) {
            if ((this.insertBefore(e[0], null), e.length > 1)) {
                let t = e.slice(1);
                this.append(...t);
            }
        }
        at(e) {
            let t = this.iterator(),
                n = t();
            for (; n && e > 0; ) (--e, (n = t()));
            return n;
        }
        contains(e) {
            let t = this.iterator(),
                n = t();
            for (; n; ) {
                if (n === e) return !0;
                n = t();
            }
            return !1;
        }
        indexOf(e) {
            let t = this.iterator(),
                n = t(),
                r = 0;
            for (; n; ) {
                if (n === e) return r;
                ((r += 1), (n = t()));
            }
            return -1;
        }
        insertBefore(e, t) {
            e != null &&
                (this.remove(e),
                (e.next = t),
                t == null
                    ? this.tail == null
                        ? ((e.prev = null), (this.head = this.tail = e))
                        : ((this.tail.next = e),
                          (e.prev = this.tail),
                          (this.tail = e))
                    : ((e.prev = t.prev),
                      t.prev != null && (t.prev.next = e),
                      (t.prev = e),
                      t === this.head && (this.head = e)),
                (this.length += 1));
        }
        offset(e) {
            let t = 0,
                n = this.head;
            for (; n != null; ) {
                if (n === e) return t;
                ((t += n.length()), (n = n.next));
            }
            return -1;
        }
        remove(e) {
            this.contains(e) &&
                (e.prev != null && (e.prev.next = e.next),
                e.next != null && (e.next.prev = e.prev),
                e === this.head && (this.head = e.next),
                e === this.tail && (this.tail = e.prev),
                --this.length);
        }
        iterator(e = this.head) {
            return () => {
                let t = e;
                return (e != null && (e = e.next), t);
            };
        }
        find(e, t = !1) {
            let n = this.iterator(),
                r = n();
            for (; r; ) {
                let i = r.length();
                if (
                    e < i ||
                    (t && e === i && (r.next == null || r.next.length() !== 0))
                )
                    return [r, e];
                ((e -= i), (r = n()));
            }
            return [null, 0];
        }
        forEach(e) {
            let t = this.iterator(),
                n = t();
            for (; n; ) (e(n), (n = t()));
        }
        forEachAt(e, t, n) {
            if (t <= 0) return;
            let [r, i] = this.find(e),
                a = e - i,
                o = this.iterator(r),
                s = o();
            for (; s && a < e + t; ) {
                let r = s.length();
                (e > a
                    ? n(s, e - a, Math.min(t, a + r - e))
                    : n(s, 0, Math.min(r, e + t - a)),
                    (a += r),
                    (s = o()));
            }
        }
        map(e) {
            return this.reduce((t, n) => (t.push(e(n)), t), []);
        }
        reduce(e, t) {
            let n = this.iterator(),
                r = n();
            for (; r; ) ((t = e(t, r)), (r = n()));
            return t;
        }
    };
function Pf(e, t) {
    let n = t.find(e);
    if (n) return n;
    try {
        return t.create(e);
    } catch {
        let n = t.create(K.INLINE);
        return (
            Array.from(e.childNodes).forEach((e) => {
                n.domNode.appendChild(e);
            }),
            e.parentNode && e.parentNode.replaceChild(n.domNode, e),
            n.attach(),
            n
        );
    }
}
var Ff = class e extends jf {
    constructor(e, t) {
        (super(e, t), (this.uiNode = null), this.build());
    }
    appendChild(e) {
        this.insertBefore(e);
    }
    attach() {
        (super.attach(),
            this.children.forEach((e) => {
                e.attach();
            }));
    }
    attachUI(t) {
        (this.uiNode != null && this.uiNode.remove(),
            (this.uiNode = t),
            e.uiClass && this.uiNode.classList.add(e.uiClass),
            this.uiNode.setAttribute(`contenteditable`, `false`),
            this.domNode.insertBefore(this.uiNode, this.domNode.firstChild));
    }
    build() {
        ((this.children = new Nf()),
            Array.from(this.domNode.childNodes)
                .filter((e) => e !== this.uiNode)
                .reverse()
                .forEach((e) => {
                    try {
                        let t = Pf(e, this.scroll);
                        this.insertBefore(t, this.children.head || void 0);
                    } catch (e) {
                        if (e instanceof Sf) return;
                        throw e;
                    }
                }));
    }
    deleteAt(e, t) {
        if (e === 0 && t === this.length()) return this.remove();
        this.children.forEachAt(e, t, (e, t, n) => {
            e.deleteAt(t, n);
        });
    }
    descendant(t, n = 0) {
        let [r, i] = this.children.find(n);
        return (t.blotName == null && t(r)) ||
            (t.blotName != null && r instanceof t)
            ? [r, i]
            : r instanceof e
              ? r.descendant(t, i)
              : [null, -1];
    }
    descendants(t, n = 0, r = Number.MAX_VALUE) {
        let i = [],
            a = r;
        return (
            this.children.forEachAt(n, r, (n, r, o) => {
                (((t.blotName == null && t(n)) ||
                    (t.blotName != null && n instanceof t)) &&
                    i.push(n),
                    n instanceof e && (i = i.concat(n.descendants(t, r, a))),
                    (a -= o));
            }),
            i
        );
    }
    detach() {
        (this.children.forEach((e) => {
            e.detach();
        }),
            super.detach());
    }
    enforceAllowedChildren() {
        let t = !1;
        this.children.forEach((n) => {
            t ||
                this.statics.allowedChildren.some((e) => n instanceof e) ||
                (n.statics.scope === K.BLOCK_BLOT
                    ? (n.next != null && this.splitAfter(n),
                      n.prev != null && this.splitAfter(n.prev),
                      n.parent.unwrap(),
                      (t = !0))
                    : n instanceof e
                      ? n.unwrap()
                      : n.remove());
        });
    }
    formatAt(e, t, n, r) {
        this.children.forEachAt(e, t, (e, t, i) => {
            e.formatAt(t, i, n, r);
        });
    }
    insertAt(e, t, n) {
        let [r, i] = this.children.find(e);
        if (r) r.insertAt(i, t, n);
        else {
            let e =
                n == null
                    ? this.scroll.create(`text`, t)
                    : this.scroll.create(t, n);
            this.appendChild(e);
        }
    }
    insertBefore(e, t) {
        e.parent != null && e.parent.children.remove(e);
        let n = null;
        (this.children.insertBefore(e, t || null),
            (e.parent = this),
            t != null && (n = t.domNode),
            (this.domNode.parentNode !== e.domNode ||
                this.domNode.nextSibling !== n) &&
                this.domNode.insertBefore(e.domNode, n),
            e.attach());
    }
    length() {
        return this.children.reduce((e, t) => e + t.length(), 0);
    }
    moveChildren(e, t) {
        this.children.forEach((n) => {
            e.insertBefore(n, t);
        });
    }
    optimize(e) {
        if (
            (super.optimize(e),
            this.enforceAllowedChildren(),
            this.uiNode != null &&
                this.uiNode !== this.domNode.firstChild &&
                this.domNode.insertBefore(this.uiNode, this.domNode.firstChild),
            this.children.length === 0)
        )
            if (this.statics.defaultChild != null) {
                let e = this.scroll.create(this.statics.defaultChild.blotName);
                this.appendChild(e);
            } else this.remove();
    }
    path(t, n = !1) {
        let [r, i] = this.children.find(t, n),
            a = [[this, t]];
        return r instanceof e
            ? a.concat(r.path(i, n))
            : (r != null && a.push([r, i]), a);
    }
    removeChild(e) {
        this.children.remove(e);
    }
    replaceWith(t, n) {
        let r = typeof t == `string` ? this.scroll.create(t, n) : t;
        return (r instanceof e && this.moveChildren(r), super.replaceWith(r));
    }
    split(e, t = !1) {
        if (!t) {
            if (e === 0) return this;
            if (e === this.length()) return this.next;
        }
        let n = this.clone();
        return (
            this.parent && this.parent.insertBefore(n, this.next || void 0),
            this.children.forEachAt(e, this.length(), (e, r, i) => {
                let a = e.split(r, t);
                a != null && n.appendChild(a);
            }),
            n
        );
    }
    splitAfter(e) {
        let t = this.clone();
        for (; e.next != null; ) t.appendChild(e.next);
        return (
            this.parent && this.parent.insertBefore(t, this.next || void 0),
            t
        );
    }
    unwrap() {
        (this.parent && this.moveChildren(this.parent, this.next || void 0),
            this.remove());
    }
    update(e, t) {
        let n = [],
            r = [];
        (e.forEach((e) => {
            e.target === this.domNode &&
                e.type === `childList` &&
                (n.push(...e.addedNodes), r.push(...e.removedNodes));
        }),
            r.forEach((e) => {
                if (
                    e.parentNode != null &&
                    e.tagName !== `IFRAME` &&
                    document.body.compareDocumentPosition(e) &
                        Node.DOCUMENT_POSITION_CONTAINED_BY
                )
                    return;
                let t = this.scroll.find(e);
                t != null &&
                    (t.domNode.parentNode == null ||
                        t.domNode.parentNode === this.domNode) &&
                    t.detach();
            }),
            n
                .filter(
                    (e) => e.parentNode === this.domNode && e !== this.uiNode,
                )
                .sort((e, t) =>
                    e === t
                        ? 0
                        : e.compareDocumentPosition(t) &
                            Node.DOCUMENT_POSITION_FOLLOWING
                          ? 1
                          : -1,
                )
                .forEach((e) => {
                    let t = null;
                    e.nextSibling != null &&
                        (t = this.scroll.find(e.nextSibling));
                    let n = Pf(e, this.scroll);
                    (n.next !== t || n.next == null) &&
                        (n.parent != null && n.parent.removeChild(this),
                        this.insertBefore(n, t || void 0));
                }),
            this.enforceAllowedChildren());
    }
};
Ff.uiClass = ``;
var If = Ff;
function Lf(e, t) {
    if (Object.keys(e).length !== Object.keys(t).length) return !1;
    for (let n in e) if (e[n] !== t[n]) return !1;
    return !0;
}
var Rf = class e extends If {
    static create(e) {
        return super.create(e);
    }
    static formats(t, n) {
        let r = n.query(e.blotName);
        if (!(r != null && t.tagName === r.tagName)) {
            if (typeof this.tagName == `string`) return !0;
            if (Array.isArray(this.tagName)) return t.tagName.toLowerCase();
        }
    }
    constructor(e, t) {
        (super(e, t), (this.attributes = new kf(this.domNode)));
    }
    format(t, n) {
        if (t === this.statics.blotName && !n)
            (this.children.forEach((t) => {
                (t instanceof e || (t = t.wrap(e.blotName, !0)),
                    this.attributes.copy(t));
            }),
                this.unwrap());
        else {
            let e = this.scroll.query(t, K.INLINE);
            if (e == null) return;
            e instanceof xf
                ? this.attributes.attribute(e, n)
                : n &&
                  (t !== this.statics.blotName || this.formats()[t] !== n) &&
                  this.replaceWith(t, n);
        }
    }
    formats() {
        let e = this.attributes.values(),
            t = this.statics.formats(this.domNode, this.scroll);
        return (t != null && (e[this.statics.blotName] = t), e);
    }
    formatAt(e, t, n, r) {
        this.formats()[n] != null || this.scroll.query(n, K.ATTRIBUTE)
            ? this.isolate(e, t).format(n, r)
            : super.formatAt(e, t, n, r);
    }
    optimize(t) {
        super.optimize(t);
        let n = this.formats();
        if (Object.keys(n).length === 0) return this.unwrap();
        let r = this.next;
        r instanceof e &&
            r.prev === this &&
            Lf(n, r.formats()) &&
            (r.moveChildren(this), r.remove());
    }
    replaceWith(e, t) {
        let n = super.replaceWith(e, t);
        return (this.attributes.copy(n), n);
    }
    update(e, t) {
        (super.update(e, t),
            e.some(
                (e) => e.target === this.domNode && e.type === `attributes`,
            ) && this.attributes.build());
    }
    wrap(t, n) {
        let r = super.wrap(t, n);
        return (r instanceof e && this.attributes.move(r), r);
    }
};
((Rf.allowedChildren = [Rf, q]),
    (Rf.blotName = `inline`),
    (Rf.scope = K.INLINE_BLOT),
    (Rf.tagName = `SPAN`));
var zf = Rf,
    Bf = class e extends If {
        static create(e) {
            return super.create(e);
        }
        static formats(t, n) {
            let r = n.query(e.blotName);
            if (!(r != null && t.tagName === r.tagName)) {
                if (typeof this.tagName == `string`) return !0;
                if (Array.isArray(this.tagName)) return t.tagName.toLowerCase();
            }
        }
        constructor(e, t) {
            (super(e, t), (this.attributes = new kf(this.domNode)));
        }
        format(t, n) {
            let r = this.scroll.query(t, K.BLOCK);
            r != null &&
                (r instanceof xf
                    ? this.attributes.attribute(r, n)
                    : t === this.statics.blotName && !n
                      ? this.replaceWith(e.blotName)
                      : n &&
                        (t !== this.statics.blotName ||
                            this.formats()[t] !== n) &&
                        this.replaceWith(t, n));
        }
        formats() {
            let e = this.attributes.values(),
                t = this.statics.formats(this.domNode, this.scroll);
            return (t != null && (e[this.statics.blotName] = t), e);
        }
        formatAt(e, t, n, r) {
            this.scroll.query(n, K.BLOCK) == null
                ? super.formatAt(e, t, n, r)
                : this.format(n, r);
        }
        insertAt(e, t, n) {
            if (n == null || this.scroll.query(t, K.INLINE) != null)
                super.insertAt(e, t, n);
            else {
                let r = this.split(e);
                if (r != null) {
                    let e = this.scroll.create(t, n);
                    r.parent.insertBefore(e, r);
                } else
                    throw Error(`Attempt to insertAt after block boundaries`);
            }
        }
        replaceWith(e, t) {
            let n = super.replaceWith(e, t);
            return (this.attributes.copy(n), n);
        }
        update(e, t) {
            (super.update(e, t),
                e.some(
                    (e) => e.target === this.domNode && e.type === `attributes`,
                ) && this.attributes.build());
        }
    };
((Bf.blotName = `block`),
    (Bf.scope = K.BLOCK_BLOT),
    (Bf.tagName = `P`),
    (Bf.allowedChildren = [zf, Bf, q]));
var Vf = Bf,
    Hf = class extends If {
        checkMerge() {
            return (
                this.next !== null &&
                this.next.statics.blotName === this.statics.blotName
            );
        }
        deleteAt(e, t) {
            (super.deleteAt(e, t), this.enforceAllowedChildren());
        }
        formatAt(e, t, n, r) {
            (super.formatAt(e, t, n, r), this.enforceAllowedChildren());
        }
        insertAt(e, t, n) {
            (super.insertAt(e, t, n), this.enforceAllowedChildren());
        }
        optimize(e) {
            (super.optimize(e),
                this.children.length > 0 &&
                    this.next != null &&
                    this.checkMerge() &&
                    (this.next.moveChildren(this), this.next.remove()));
        }
    };
((Hf.blotName = `container`), (Hf.scope = K.BLOCK_BLOT));
var Uf = Hf,
    J = class extends q {
        static formats(e, t) {}
        format(e, t) {
            super.formatAt(0, this.length(), e, t);
        }
        formatAt(e, t, n, r) {
            e === 0 && t === this.length()
                ? this.format(n, r)
                : super.formatAt(e, t, n, r);
        }
        formats() {
            return this.statics.formats(this.domNode, this.scroll);
        }
    },
    Wf = {
        attributes: !0,
        characterData: !0,
        characterDataOldValue: !0,
        childList: !0,
        subtree: !0,
    },
    Gf = 100,
    Kf = class extends If {
        constructor(e, t) {
            (super(null, t),
                (this.registry = e),
                (this.scroll = this),
                this.build(),
                (this.observer = new MutationObserver((e) => {
                    this.update(e);
                })),
                this.observer.observe(this.domNode, Wf),
                this.attach());
        }
        create(e, t) {
            return this.registry.create(this, e, t);
        }
        find(e, t = !1) {
            let n = this.registry.find(e, t);
            return n
                ? n.scroll === this
                    ? n
                    : t
                      ? this.find(n.scroll.domNode.parentNode, !0)
                      : null
                : null;
        }
        query(e, t = K.ANY) {
            return this.registry.query(e, t);
        }
        register(...e) {
            return this.registry.register(...e);
        }
        build() {
            this.scroll != null && super.build();
        }
        detach() {
            (super.detach(), this.observer.disconnect());
        }
        deleteAt(e, t) {
            (this.update(),
                e === 0 && t === this.length()
                    ? this.children.forEach((e) => {
                          e.remove();
                      })
                    : super.deleteAt(e, t));
        }
        formatAt(e, t, n, r) {
            (this.update(), super.formatAt(e, t, n, r));
        }
        insertAt(e, t, n) {
            (this.update(), super.insertAt(e, t, n));
        }
        optimize(e = [], t = {}) {
            super.optimize(t);
            let n = t.mutationsMap || new WeakMap(),
                r = Array.from(this.observer.takeRecords());
            for (; r.length > 0; ) e.push(r.pop());
            let i = (e, t = !0) => {
                    e == null ||
                        e === this ||
                        (e.domNode.parentNode != null &&
                            (n.has(e.domNode) || n.set(e.domNode, []),
                            t && i(e.parent)));
                },
                a = (e) => {
                    n.has(e.domNode) &&
                        (e instanceof If && e.children.forEach(a),
                        n.delete(e.domNode),
                        e.optimize(t));
                },
                o = e;
            for (let t = 0; o.length > 0; t += 1) {
                if (t >= Gf)
                    throw Error(
                        `[Parchment] Maximum optimize iterations reached`,
                    );
                for (
                    o.forEach((e) => {
                        let t = this.find(e.target, !0);
                        t != null &&
                            (t.domNode === e.target &&
                                (e.type === `childList`
                                    ? (i(this.find(e.previousSibling, !1)),
                                      Array.from(e.addedNodes).forEach((e) => {
                                          let t = this.find(e, !1);
                                          (i(t, !1),
                                              t instanceof If &&
                                                  t.children.forEach((e) => {
                                                      i(e, !1);
                                                  }));
                                      }))
                                    : e.type === `attributes` && i(t.prev)),
                            i(t));
                    }),
                        this.children.forEach(a),
                        o = Array.from(this.observer.takeRecords()),
                        r = o.slice();
                    r.length > 0;
                )
                    e.push(r.pop());
            }
        }
        update(e, t = {}) {
            e ||= this.observer.takeRecords();
            let n = new WeakMap();
            (e
                .map((e) => {
                    let t = this.find(e.target, !0);
                    return t == null
                        ? null
                        : n.has(t.domNode)
                          ? (n.get(t.domNode).push(e), null)
                          : (n.set(t.domNode, [e]), t);
                })
                .forEach((e) => {
                    e != null &&
                        e !== this &&
                        n.has(e.domNode) &&
                        e.update(n.get(e.domNode) || [], t);
                }),
                (t.mutationsMap = n),
                n.has(this.domNode) && super.update(n.get(this.domNode), t),
                this.optimize(e, t));
        }
    };
((Kf.blotName = `scroll`),
    (Kf.defaultChild = Vf),
    (Kf.allowedChildren = [Vf, Uf]),
    (Kf.scope = K.BLOCK_BLOT),
    (Kf.tagName = `DIV`));
var qf = Kf,
    Jf = class e extends q {
        static create(e) {
            return document.createTextNode(e);
        }
        static value(e) {
            return e.data;
        }
        constructor(e, t) {
            (super(e, t), (this.text = this.statics.value(this.domNode)));
        }
        deleteAt(e, t) {
            this.domNode.data = this.text =
                this.text.slice(0, e) + this.text.slice(e + t);
        }
        index(e, t) {
            return this.domNode === e ? t : -1;
        }
        insertAt(e, t, n) {
            n == null
                ? ((this.text = this.text.slice(0, e) + t + this.text.slice(e)),
                  (this.domNode.data = this.text))
                : super.insertAt(e, t, n);
        }
        length() {
            return this.text.length;
        }
        optimize(t) {
            (super.optimize(t),
                (this.text = this.statics.value(this.domNode)),
                this.text.length === 0
                    ? this.remove()
                    : this.next instanceof e &&
                      this.next.prev === this &&
                      (this.insertAt(this.length(), this.next.value()),
                      this.next.remove()));
        }
        position(e, t = !1) {
            return [this.domNode, e];
        }
        split(e, t = !1) {
            if (!t) {
                if (e === 0) return this;
                if (e === this.length()) return this.next;
            }
            let n = this.scroll.create(this.domNode.splitText(e));
            return (
                this.parent.insertBefore(n, this.next || void 0),
                (this.text = this.statics.value(this.domNode)),
                n
            );
        }
        update(e, t) {
            e.some(
                (e) => e.type === `characterData` && e.target === this.domNode,
            ) && (this.text = this.statics.value(this.domNode));
        }
        value() {
            return this.text;
        }
    };
((Jf.blotName = `text`), (Jf.scope = K.INLINE_BLOT));
var Yf = Jf,
    Xf = o((e, t) => {
        var n = -1,
            r = 1,
            i = 0;
        function a(e, t, n, r, a) {
            if (e === t) return e ? [[i, e]] : [];
            if (n != null) {
                var s = ee(e, t, n);
                if (s) return s;
            }
            var c = l(e, t),
                u = e.substring(0, c);
            ((e = e.substring(c)), (t = t.substring(c)), (c = d(e, t)));
            var f = e.substring(e.length - c);
            ((e = e.substring(0, e.length - c)),
                (t = t.substring(0, t.length - c)));
            var m = o(e, t);
            return (
                u && m.unshift([i, u]),
                f && m.push([i, f]),
                b(m, a),
                r && p(m),
                m
            );
        }
        function o(e, t) {
            var o;
            if (!e) return [[r, t]];
            if (!t) return [[n, e]];
            var c = e.length > t.length ? e : t,
                l = e.length > t.length ? t : e,
                u = c.indexOf(l);
            if (u !== -1)
                return (
                    (o = [
                        [r, c.substring(0, u)],
                        [i, l],
                        [r, c.substring(u + l.length)],
                    ]),
                    e.length > t.length && (o[0][0] = o[2][0] = n),
                    o
                );
            if (l.length === 1)
                return [
                    [n, e],
                    [r, t],
                ];
            var d = f(e, t);
            if (d) {
                var p = d[0],
                    m = d[1],
                    h = d[2],
                    g = d[3],
                    _ = d[4],
                    v = a(p, h),
                    y = a(m, g);
                return v.concat([[i, _]], y);
            }
            return s(e, t);
        }
        function s(e, t) {
            for (
                var i = e.length,
                    a = t.length,
                    o = Math.ceil((i + a) / 2),
                    s = o,
                    l = 2 * o,
                    u = Array(l),
                    d = Array(l),
                    f = 0;
                f < l;
                f++
            )
                ((u[f] = -1), (d[f] = -1));
            ((u[s + 1] = 0), (d[s + 1] = 0));
            for (
                var p = i - a,
                    m = p % 2 != 0,
                    h = 0,
                    g = 0,
                    _ = 0,
                    v = 0,
                    y = 0;
                y < o;
                y++
            ) {
                for (var b = -y + h; b <= y - g; b += 2) {
                    for (
                        var x = s + b,
                            S =
                                b === -y || (b !== y && u[x - 1] < u[x + 1])
                                    ? u[x + 1]
                                    : u[x - 1] + 1,
                            C = S - b;
                        S < i && C < a && e.charAt(S) === t.charAt(C);
                    )
                        (S++, C++);
                    if (((u[x] = S), S > i)) g += 2;
                    else if (C > a) h += 2;
                    else if (m) {
                        var w = s + p - b;
                        if (w >= 0 && w < l && d[w] !== -1) {
                            var T = i - d[w];
                            if (S >= T) return c(e, t, S, C);
                        }
                    }
                }
                for (var E = -y + _; E <= y - v; E += 2) {
                    for (
                        var w = s + E,
                            T =
                                E === -y || (E !== y && d[w - 1] < d[w + 1])
                                    ? d[w + 1]
                                    : d[w - 1] + 1,
                            ee = T - E;
                        T < i &&
                        ee < a &&
                        e.charAt(i - T - 1) === t.charAt(a - ee - 1);
                    )
                        (T++, ee++);
                    if (((d[w] = T), T > i)) v += 2;
                    else if (ee > a) _ += 2;
                    else if (!m) {
                        var x = s + p - E;
                        if (x >= 0 && x < l && u[x] !== -1) {
                            var S = u[x],
                                C = s + S - x;
                            if (((T = i - T), S >= T)) return c(e, t, S, C);
                        }
                    }
                }
            }
            return [
                [n, e],
                [r, t],
            ];
        }
        function c(e, t, n, r) {
            var i = e.substring(0, n),
                o = t.substring(0, r),
                s = e.substring(n),
                c = t.substring(r),
                l = a(i, o),
                u = a(s, c);
            return l.concat(u);
        }
        function l(e, t) {
            if (!e || !t || e.charAt(0) !== t.charAt(0)) return 0;
            for (
                var n = 0, r = Math.min(e.length, t.length), i = r, a = 0;
                n < i;
            )
                (e.substring(a, i) == t.substring(a, i)
                    ? ((n = i), (a = n))
                    : (r = i),
                    (i = Math.floor((r - n) / 2 + n)));
            return (x(e.charCodeAt(i - 1)) && i--, i);
        }
        function u(e, t) {
            var n = e.length,
                r = t.length;
            if (n == 0 || r == 0) return 0;
            n > r ? (e = e.substring(n - r)) : n < r && (t = t.substring(0, n));
            var i = Math.min(n, r);
            if (e == t) return i;
            for (var a = 0, o = 1; ; ) {
                var s = e.substring(i - o),
                    c = t.indexOf(s);
                if (c == -1) return a;
                ((o += c),
                    (c == 0 || e.substring(i - o) == t.substring(0, o)) &&
                        ((a = o), o++));
            }
        }
        function d(e, t) {
            if (!e || !t || e.slice(-1) !== t.slice(-1)) return 0;
            for (
                var n = 0, r = Math.min(e.length, t.length), i = r, a = 0;
                n < i;
            )
                (e.substring(e.length - i, e.length - a) ==
                t.substring(t.length - i, t.length - a)
                    ? ((n = i), (a = n))
                    : (r = i),
                    (i = Math.floor((r - n) / 2 + n)));
            return (S(e.charCodeAt(e.length - i)) && i--, i);
        }
        function f(e, t) {
            var n = e.length > t.length ? e : t,
                r = e.length > t.length ? t : e;
            if (n.length < 4 || r.length * 2 < n.length) return null;
            function i(e, t, n) {
                for (
                    var r = e.substring(n, n + Math.floor(e.length / 4)),
                        i = -1,
                        a = ``,
                        o,
                        s,
                        c,
                        u;
                    (i = t.indexOf(r, i + 1)) !== -1;
                ) {
                    var f = l(e.substring(n), t.substring(i)),
                        p = d(e.substring(0, n), t.substring(0, i));
                    a.length < p + f &&
                        ((a = t.substring(i - p, i) + t.substring(i, i + f)),
                        (o = e.substring(0, n - p)),
                        (s = e.substring(n + f)),
                        (c = t.substring(0, i - p)),
                        (u = t.substring(i + f)));
                }
                return a.length * 2 >= e.length ? [o, s, c, u, a] : null;
            }
            var a = i(n, r, Math.ceil(n.length / 4)),
                o = i(n, r, Math.ceil(n.length / 2)),
                s;
            if (!a && !o) return null;
            s = o ? (a && a[4].length > o[4].length ? a : o) : a;
            var c, u, f, p;
            e.length > t.length
                ? ((c = s[0]), (u = s[1]), (f = s[2]), (p = s[3]))
                : ((f = s[0]), (p = s[1]), (c = s[2]), (u = s[3]));
            var m = s[4];
            return [c, u, f, p, m];
        }
        function p(e) {
            for (
                var t = !1,
                    a = [],
                    o = 0,
                    s = null,
                    c = 0,
                    l = 0,
                    d = 0,
                    f = 0,
                    p = 0;
                c < e.length;
            )
                (e[c][0] == i
                    ? ((a[o++] = c),
                      (l = f),
                      (d = p),
                      (f = 0),
                      (p = 0),
                      (s = e[c][1]))
                    : (e[c][0] == r
                          ? (f += e[c][1].length)
                          : (p += e[c][1].length),
                      s &&
                          s.length <= Math.max(l, d) &&
                          s.length <= Math.max(f, p) &&
                          (e.splice(a[o - 1], 0, [n, s]),
                          (e[a[o - 1] + 1][0] = r),
                          o--,
                          o--,
                          (c = o > 0 ? a[o - 1] : -1),
                          (l = 0),
                          (d = 0),
                          (f = 0),
                          (p = 0),
                          (s = null),
                          (t = !0))),
                    c++);
            for (t && b(e), y(e), c = 1; c < e.length; ) {
                if (e[c - 1][0] == n && e[c][0] == r) {
                    var m = e[c - 1][1],
                        h = e[c][1],
                        g = u(m, h),
                        _ = u(h, m);
                    (g >= _
                        ? (g >= m.length / 2 || g >= h.length / 2) &&
                          (e.splice(c, 0, [i, h.substring(0, g)]),
                          (e[c - 1][1] = m.substring(0, m.length - g)),
                          (e[c + 1][1] = h.substring(g)),
                          c++)
                        : (_ >= m.length / 2 || _ >= h.length / 2) &&
                          (e.splice(c, 0, [i, m.substring(0, _)]),
                          (e[c - 1][0] = r),
                          (e[c - 1][1] = h.substring(0, h.length - _)),
                          (e[c + 1][0] = n),
                          (e[c + 1][1] = m.substring(_)),
                          c++),
                        c++);
                }
                c++;
            }
        }
        var m = /[^a-zA-Z0-9]/,
            h = /\s/,
            g = /[\r\n]/,
            _ = /\n\r?\n$/,
            v = /^\r?\n\r?\n/;
        function y(e) {
            function t(e, t) {
                if (!e || !t) return 6;
                var n = e.charAt(e.length - 1),
                    r = t.charAt(0),
                    i = n.match(m),
                    a = r.match(m),
                    o = i && n.match(h),
                    s = a && r.match(h),
                    c = o && n.match(g),
                    l = s && r.match(g),
                    u = c && e.match(_),
                    d = l && t.match(v);
                return u || d
                    ? 5
                    : c || l
                      ? 4
                      : i && !o && s
                        ? 3
                        : o || s
                          ? 2
                          : i || a
                            ? 1
                            : 0;
            }
            for (var n = 1; n < e.length - 1; ) {
                if (e[n - 1][0] == i && e[n + 1][0] == i) {
                    var r = e[n - 1][1],
                        a = e[n][1],
                        o = e[n + 1][1],
                        s = d(r, a);
                    if (s) {
                        var c = a.substring(a.length - s);
                        ((r = r.substring(0, r.length - s)),
                            (a = c + a.substring(0, a.length - s)),
                            (o = c + o));
                    }
                    for (
                        var l = r, u = a, f = o, p = t(r, a) + t(a, o);
                        a.charAt(0) === o.charAt(0);
                    ) {
                        ((r += a.charAt(0)),
                            (a = a.substring(1) + o.charAt(0)),
                            (o = o.substring(1)));
                        var y = t(r, a) + t(a, o);
                        y >= p && ((p = y), (l = r), (u = a), (f = o));
                    }
                    e[n - 1][1] != l &&
                        (l ? (e[n - 1][1] = l) : (e.splice(n - 1, 1), n--),
                        (e[n][1] = u),
                        f ? (e[n + 1][1] = f) : (e.splice(n + 1, 1), n--));
                }
                n++;
            }
        }
        function b(e, t) {
            e.push([i, ``]);
            for (var a = 0, o = 0, s = 0, c = ``, u = ``, f; a < e.length; ) {
                if (a < e.length - 1 && !e[a][1]) {
                    e.splice(a, 1);
                    continue;
                }
                switch (e[a][0]) {
                    case r:
                        (s++, (u += e[a][1]), a++);
                        break;
                    case n:
                        (o++, (c += e[a][1]), a++);
                        break;
                    case i:
                        var p = a - s - o - 1;
                        if (t) {
                            if (p >= 0 && w(e[p][1])) {
                                var m = e[p][1].slice(-1);
                                if (
                                    ((e[p][1] = e[p][1].slice(0, -1)),
                                    (c = m + c),
                                    (u = m + u),
                                    !e[p][1])
                                ) {
                                    (e.splice(p, 1), a--);
                                    var h = p - 1;
                                    (e[h] &&
                                        e[h][0] === r &&
                                        (s++, (u = e[h][1] + u), h--),
                                        e[h] &&
                                            e[h][0] === n &&
                                            (o++, (c = e[h][1] + c), h--),
                                        (p = h));
                                }
                            }
                            if (C(e[a][1])) {
                                var m = e[a][1].charAt(0);
                                ((e[a][1] = e[a][1].slice(1)),
                                    (c += m),
                                    (u += m));
                            }
                        }
                        if (a < e.length - 1 && !e[a][1]) {
                            e.splice(a, 1);
                            break;
                        }
                        if (c.length > 0 || u.length > 0) {
                            c.length > 0 &&
                                u.length > 0 &&
                                ((f = l(u, c)),
                                f !== 0 &&
                                    (p >= 0
                                        ? (e[p][1] += u.substring(0, f))
                                        : (e.splice(0, 0, [
                                              i,
                                              u.substring(0, f),
                                          ]),
                                          a++),
                                    (u = u.substring(f)),
                                    (c = c.substring(f))),
                                (f = d(u, c)),
                                f !== 0 &&
                                    ((e[a][1] =
                                        u.substring(u.length - f) + e[a][1]),
                                    (u = u.substring(0, u.length - f)),
                                    (c = c.substring(0, c.length - f))));
                            var g = s + o;
                            c.length === 0 && u.length === 0
                                ? (e.splice(a - g, g), (a -= g))
                                : c.length === 0
                                  ? (e.splice(a - g, g, [r, u]),
                                    (a = a - g + 1))
                                  : u.length === 0
                                    ? (e.splice(a - g, g, [n, c]),
                                      (a = a - g + 1))
                                    : (e.splice(a - g, g, [n, c], [r, u]),
                                      (a = a - g + 2));
                        }
                        (a !== 0 && e[a - 1][0] === i
                            ? ((e[a - 1][1] += e[a][1]), e.splice(a, 1))
                            : a++,
                            (s = 0),
                            (o = 0),
                            (c = ``),
                            (u = ``));
                        break;
                }
            }
            e[e.length - 1][1] === `` && e.pop();
            var _ = !1;
            for (a = 1; a < e.length - 1; )
                (e[a - 1][0] === i &&
                    e[a + 1][0] === i &&
                    (e[a][1].substring(e[a][1].length - e[a - 1][1].length) ===
                    e[a - 1][1]
                        ? ((e[a][1] =
                              e[a - 1][1] +
                              e[a][1].substring(
                                  0,
                                  e[a][1].length - e[a - 1][1].length,
                              )),
                          (e[a + 1][1] = e[a - 1][1] + e[a + 1][1]),
                          e.splice(a - 1, 1),
                          (_ = !0))
                        : e[a][1].substring(0, e[a + 1][1].length) ==
                              e[a + 1][1] &&
                          ((e[a - 1][1] += e[a + 1][1]),
                          (e[a][1] =
                              e[a][1].substring(e[a + 1][1].length) +
                              e[a + 1][1]),
                          e.splice(a + 1, 1),
                          (_ = !0))),
                    a++);
            _ && b(e, t);
        }
        function x(e) {
            return e >= 55296 && e <= 56319;
        }
        function S(e) {
            return e >= 56320 && e <= 57343;
        }
        function C(e) {
            return S(e.charCodeAt(0));
        }
        function w(e) {
            return x(e.charCodeAt(e.length - 1));
        }
        function T(e) {
            for (var t = [], n = 0; n < e.length; n++)
                e[n][1].length > 0 && t.push(e[n]);
            return t;
        }
        function E(e, t, a, o) {
            return w(e) || C(o)
                ? null
                : T([
                      [i, e],
                      [n, t],
                      [r, a],
                      [i, o],
                  ]);
        }
        function ee(e, t, n) {
            var r = typeof n == `number` ? { index: n, length: 0 } : n.oldRange,
                i = typeof n == `number` ? null : n.newRange,
                a = e.length,
                o = t.length;
            if (r.length === 0 && (i === null || i.length === 0)) {
                var s = r.index,
                    c = e.slice(0, s),
                    l = e.slice(s),
                    u = i ? i.index : null;
                editBefore: {
                    var d = s + o - a;
                    if ((u !== null && u !== d) || d < 0 || d > o)
                        break editBefore;
                    var f = t.slice(0, d),
                        p = t.slice(d);
                    if (p !== l) break editBefore;
                    var m = Math.min(s, d),
                        h = c.slice(0, m),
                        g = f.slice(0, m);
                    if (h !== g) break editBefore;
                    var _ = c.slice(m),
                        v = f.slice(m);
                    return E(h, _, v, l);
                }
                editAfter: {
                    if (u !== null && u !== s) break editAfter;
                    var y = s,
                        f = t.slice(0, y),
                        p = t.slice(y);
                    if (f !== c) break editAfter;
                    var b = Math.min(a - y, o - y),
                        x = l.slice(l.length - b),
                        S = p.slice(p.length - b);
                    if (x !== S) break editAfter;
                    var _ = l.slice(0, l.length - b),
                        v = p.slice(0, p.length - b);
                    return E(c, _, v, x);
                }
            }
            if (r.length > 0 && i && i.length === 0)
                replaceRange: {
                    var h = e.slice(0, r.index),
                        x = e.slice(r.index + r.length),
                        m = h.length,
                        b = x.length;
                    if (o < m + b) break replaceRange;
                    var g = t.slice(0, m),
                        S = t.slice(o - b);
                    if (h !== g || x !== S) break replaceRange;
                    var _ = e.slice(m, a - b),
                        v = t.slice(m, o - b);
                    return E(h, _, v, x);
                }
            return null;
        }
        function te(e, t, n, r) {
            return a(e, t, n, r, !0);
        }
        ((te.INSERT = r), (te.DELETE = n), (te.EQUAL = i), (t.exports = te));
    }),
    Zf = o((e, t) => {
        var n = `__lodash_hash_undefined__`,
            r = 9007199254740991,
            i = `[object Arguments]`,
            a = `[object Array]`,
            o = `[object Boolean]`,
            s = `[object Date]`,
            c = `[object Error]`,
            l = `[object Function]`,
            u = `[object GeneratorFunction]`,
            d = `[object Map]`,
            f = `[object Number]`,
            p = `[object Object]`,
            m = `[object Promise]`,
            h = `[object RegExp]`,
            g = `[object Set]`,
            _ = `[object String]`,
            v = `[object Symbol]`,
            y = `[object WeakMap]`,
            b = `[object ArrayBuffer]`,
            x = `[object DataView]`,
            S = `[object Float32Array]`,
            C = `[object Float64Array]`,
            w = `[object Int8Array]`,
            T = `[object Int16Array]`,
            E = `[object Int32Array]`,
            ee = `[object Uint8Array]`,
            te = `[object Uint8ClampedArray]`,
            ne = `[object Uint16Array]`,
            re = `[object Uint32Array]`,
            ie = /[\\^$.*+?()[\]{}|]/g,
            D = /\w*$/,
            ae = /^\[object .+?Constructor\]$/,
            oe = /^(?:0|[1-9]\d*)$/,
            O = {};
        ((O[i] =
            O[a] =
            O[b] =
            O[x] =
            O[o] =
            O[s] =
            O[S] =
            O[C] =
            O[w] =
            O[T] =
            O[E] =
            O[d] =
            O[f] =
            O[p] =
            O[h] =
            O[g] =
            O[_] =
            O[v] =
            O[ee] =
            O[te] =
            O[ne] =
            O[re] =
                !0),
            (O[c] = O[l] = O[y] = !1));
        var se =
                typeof global == `object` &&
                global &&
                global.Object === Object &&
                global,
            ce =
                typeof self == `object` &&
                self &&
                self.Object === Object &&
                self,
            k = se || ce || Function(`return this`)(),
            le = typeof e == `object` && e && !e.nodeType && e,
            ue = le && typeof t == `object` && t && !t.nodeType && t,
            de = ue && ue.exports === le;
        function fe(e, t) {
            return (e.set(t[0], t[1]), e);
        }
        function pe(e, t) {
            return (e.add(t), e);
        }
        function me(e, t) {
            for (
                var n = -1, r = e ? e.length : 0;
                ++n < r && t(e[n], n, e) !== !1;
            );
            return e;
        }
        function he(e, t) {
            for (var n = -1, r = t.length, i = e.length; ++n < r; )
                e[i + n] = t[n];
            return e;
        }
        function ge(e, t, n, r) {
            var i = -1,
                a = e ? e.length : 0;
            for (r && a && (n = e[++i]); ++i < a; ) n = t(n, e[i], i, e);
            return n;
        }
        function _e(e, t) {
            for (var n = -1, r = Array(e); ++n < e; ) r[n] = t(n);
            return r;
        }
        function A(e, t) {
            return e?.[t];
        }
        function ve(e) {
            var t = !1;
            if (e != null && typeof e.toString != `function`)
                try {
                    t = !!(e + ``);
                } catch {}
            return t;
        }
        function ye(e) {
            var t = -1,
                n = Array(e.size);
            return (
                e.forEach(function (e, r) {
                    n[++t] = [r, e];
                }),
                n
            );
        }
        function be(e, t) {
            return function (n) {
                return e(t(n));
            };
        }
        function xe(e) {
            var t = -1,
                n = Array(e.size);
            return (
                e.forEach(function (e) {
                    n[++t] = e;
                }),
                n
            );
        }
        var Se = Array.prototype,
            Ce = Function.prototype,
            j = Object.prototype,
            M = k[`__core-js_shared__`],
            N = (function () {
                var e = /[^.]+$/.exec((M && M.keys && M.keys.IE_PROTO) || ``);
                return e ? `Symbol(src)_1.` + e : ``;
            })(),
            we = Ce.toString,
            Te = j.hasOwnProperty,
            Ee = j.toString,
            De = RegExp(
                `^` +
                    we
                        .call(Te)
                        .replace(ie, `\\$&`)
                        .replace(
                            /hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g,
                            `$1.*?`,
                        ) +
                    `$`,
            ),
            Oe = de ? k.Buffer : void 0,
            ke = k.Symbol,
            Ae = k.Uint8Array,
            je = be(Object.getPrototypeOf, Object),
            P = Object.create,
            Me = j.propertyIsEnumerable,
            Ne = Se.splice,
            Pe = Object.getOwnPropertySymbols,
            Fe = Oe ? Oe.isBuffer : void 0,
            Ie = be(Object.keys, Object),
            Le = B(k, `DataView`),
            Re = B(k, `Map`),
            F = B(k, `Promise`),
            ze = B(k, `Set`),
            Be = B(k, `WeakMap`),
            I = B(Object, `create`),
            Ve = Kt(Le),
            He = Kt(Re),
            Ue = Kt(F),
            We = Kt(ze),
            Ge = Kt(Be),
            Ke = ke ? ke.prototype : void 0,
            qe = Ke ? Ke.valueOf : void 0;
        function Je(e) {
            var t = -1,
                n = e ? e.length : 0;
            for (this.clear(); ++t < n; ) {
                var r = e[t];
                this.set(r[0], r[1]);
            }
        }
        function Ye() {
            this.__data__ = I ? I(null) : {};
        }
        function Xe(e) {
            return this.has(e) && delete this.__data__[e];
        }
        function Ze(e) {
            var t = this.__data__;
            if (I) {
                var r = t[e];
                return r === n ? void 0 : r;
            }
            return Te.call(t, e) ? t[e] : void 0;
        }
        function Qe(e) {
            var t = this.__data__;
            return I ? t[e] !== void 0 : Te.call(t, e);
        }
        function $e(e, t) {
            var r = this.__data__;
            return ((r[e] = I && t === void 0 ? n : t), this);
        }
        ((Je.prototype.clear = Ye),
            (Je.prototype.delete = Xe),
            (Je.prototype.get = Ze),
            (Je.prototype.has = Qe),
            (Je.prototype.set = $e));
        function L(e) {
            var t = -1,
                n = e ? e.length : 0;
            for (this.clear(); ++t < n; ) {
                var r = e[t];
                this.set(r[0], r[1]);
            }
        }
        function et() {
            this.__data__ = [];
        }
        function tt(e) {
            var t = this.__data__,
                n = vt(t, e);
            return n < 0
                ? !1
                : (n == t.length - 1 ? t.pop() : Ne.call(t, n, 1), !0);
        }
        function R(e) {
            var t = this.__data__,
                n = vt(t, e);
            return n < 0 ? void 0 : t[n][1];
        }
        function nt(e) {
            return vt(this.__data__, e) > -1;
        }
        function rt(e, t) {
            var n = this.__data__,
                r = vt(n, e);
            return (r < 0 ? n.push([e, t]) : (n[r][1] = t), this);
        }
        ((L.prototype.clear = et),
            (L.prototype.delete = tt),
            (L.prototype.get = R),
            (L.prototype.has = nt),
            (L.prototype.set = rt));
        function it(e) {
            var t = -1,
                n = e ? e.length : 0;
            for (this.clear(); ++t < n; ) {
                var r = e[t];
                this.set(r[0], r[1]);
            }
        }
        function at() {
            this.__data__ = {
                hash: new Je(),
                map: new (Re || L)(),
                string: new Je(),
            };
        }
        function ot(e) {
            return Lt(this, e).delete(e);
        }
        function st(e) {
            return Lt(this, e).get(e);
        }
        function ct(e) {
            return Lt(this, e).has(e);
        }
        function lt(e, t) {
            return (Lt(this, e).set(e, t), this);
        }
        ((it.prototype.clear = at),
            (it.prototype.delete = ot),
            (it.prototype.get = st),
            (it.prototype.has = ct),
            (it.prototype.set = lt));
        function ut(e) {
            this.__data__ = new L(e);
        }
        function dt() {
            this.__data__ = new L();
        }
        function ft(e) {
            return this.__data__.delete(e);
        }
        function pt(e) {
            return this.__data__.get(e);
        }
        function mt(e) {
            return this.__data__.has(e);
        }
        function ht(e, t) {
            var n = this.__data__;
            if (n instanceof L) {
                var r = n.__data__;
                if (!Re || r.length < 199) return (r.push([e, t]), this);
                n = this.__data__ = new it(r);
            }
            return (n.set(e, t), this);
        }
        ((ut.prototype.clear = dt),
            (ut.prototype.delete = ft),
            (ut.prototype.get = pt),
            (ut.prototype.has = mt),
            (ut.prototype.set = ht));
        function gt(e, t) {
            var n = Xt(e) || Yt(e) ? _e(e.length, String) : [],
                r = n.length,
                i = !!r;
            for (var a in e)
                (t || Te.call(e, a)) &&
                    !(i && (a == `length` || Ht(a, r))) &&
                    n.push(a);
            return n;
        }
        function _t(e, t, n) {
            var r = e[t];
            (!(Te.call(e, t) && Jt(r, n)) || (n === void 0 && !(t in e))) &&
                (e[t] = n);
        }
        function vt(e, t) {
            for (var n = e.length; n--; ) if (Jt(e[n][0], t)) return n;
            return -1;
        }
        function yt(e, t) {
            return e && Pt(t, an(t), e);
        }
        function z(e, t, n, r, a, o, s) {
            var c;
            if ((r && (c = o ? r(e, a, o, s) : r(e)), c !== void 0)) return c;
            if (!nn(e)) return e;
            var d = Xt(e);
            if (d) {
                if (((c = zt(e)), !t)) return Nt(e, c);
            } else {
                var f = V(e),
                    m = f == l || f == u;
                if ($t(e)) return Tt(e, t);
                if (f == p || f == i || (m && !o)) {
                    if (ve(e)) return o ? e : {};
                    if (((c = Bt(m ? {} : e)), !t)) return Ft(e, yt(c, e));
                } else {
                    if (!O[f]) return o ? e : {};
                    c = Vt(e, f, z, t);
                }
            }
            s ||= new ut();
            var h = s.get(e);
            if (h) return h;
            if ((s.set(e, c), !d)) var g = n ? It(e) : an(e);
            return (
                me(g || e, function (i, a) {
                    (g && ((a = i), (i = e[a])),
                        _t(c, a, z(i, t, n, r, a, e, s)));
                }),
                c
            );
        }
        function bt(e) {
            return nn(e) ? P(e) : {};
        }
        function xt(e, t, n) {
            var r = t(e);
            return Xt(e) ? r : he(r, n(e));
        }
        function St(e) {
            return Ee.call(e);
        }
        function Ct(e) {
            return !nn(e) || Wt(e)
                ? !1
                : (en(e) || ve(e) ? De : ae).test(Kt(e));
        }
        function wt(e) {
            if (!Gt(e)) return Ie(e);
            var t = [];
            for (var n in Object(e))
                Te.call(e, n) && n != `constructor` && t.push(n);
            return t;
        }
        function Tt(e, t) {
            if (t) return e.slice();
            var n = new e.constructor(e.length);
            return (e.copy(n), n);
        }
        function Et(e) {
            var t = new e.constructor(e.byteLength);
            return (new Ae(t).set(new Ae(e)), t);
        }
        function Dt(e, t) {
            var n = t ? Et(e.buffer) : e.buffer;
            return new e.constructor(n, e.byteOffset, e.byteLength);
        }
        function Ot(e, t, n) {
            return ge(t ? n(ye(e), !0) : ye(e), fe, new e.constructor());
        }
        function kt(e) {
            var t = new e.constructor(e.source, D.exec(e));
            return ((t.lastIndex = e.lastIndex), t);
        }
        function At(e, t, n) {
            return ge(t ? n(xe(e), !0) : xe(e), pe, new e.constructor());
        }
        function jt(e) {
            return qe ? Object(qe.call(e)) : {};
        }
        function Mt(e, t) {
            var n = t ? Et(e.buffer) : e.buffer;
            return new e.constructor(n, e.byteOffset, e.length);
        }
        function Nt(e, t) {
            var n = -1,
                r = e.length;
            for (t ||= Array(r); ++n < r; ) t[n] = e[n];
            return t;
        }
        function Pt(e, t, n, r) {
            n ||= {};
            for (var i = -1, a = t.length; ++i < a; ) {
                var o = t[i],
                    s = r ? r(n[o], e[o], o, n, e) : void 0;
                _t(n, o, s === void 0 ? e[o] : s);
            }
            return n;
        }
        function Ft(e, t) {
            return Pt(e, Rt(e), t);
        }
        function It(e) {
            return xt(e, an, Rt);
        }
        function Lt(e, t) {
            var n = e.__data__;
            return Ut(t) ? n[typeof t == `string` ? `string` : `hash`] : n.map;
        }
        function B(e, t) {
            var n = A(e, t);
            return Ct(n) ? n : void 0;
        }
        var Rt = Pe ? be(Pe, Object) : on,
            V = St;
        ((Le && V(new Le(new ArrayBuffer(1))) != x) ||
            (Re && V(new Re()) != d) ||
            (F && V(F.resolve()) != m) ||
            (ze && V(new ze()) != g) ||
            (Be && V(new Be()) != y)) &&
            (V = function (e) {
                var t = Ee.call(e),
                    n = t == p ? e.constructor : void 0,
                    r = n ? Kt(n) : void 0;
                if (r)
                    switch (r) {
                        case Ve:
                            return x;
                        case He:
                            return d;
                        case Ue:
                            return m;
                        case We:
                            return g;
                        case Ge:
                            return y;
                    }
                return t;
            });
        function zt(e) {
            var t = e.length,
                n = e.constructor(t);
            return (
                t &&
                    typeof e[0] == `string` &&
                    Te.call(e, `index`) &&
                    ((n.index = e.index), (n.input = e.input)),
                n
            );
        }
        function Bt(e) {
            return typeof e.constructor == `function` && !Gt(e)
                ? bt(je(e))
                : {};
        }
        function Vt(e, t, n, r) {
            var i = e.constructor;
            switch (t) {
                case b:
                    return Et(e);
                case o:
                case s:
                    return new i(+e);
                case x:
                    return Dt(e, r);
                case S:
                case C:
                case w:
                case T:
                case E:
                case ee:
                case te:
                case ne:
                case re:
                    return Mt(e, r);
                case d:
                    return Ot(e, r, n);
                case f:
                case _:
                    return new i(e);
                case h:
                    return kt(e);
                case g:
                    return At(e, r, n);
                case v:
                    return jt(e);
            }
        }
        function Ht(e, t) {
            return (
                (t ??= r),
                !!t &&
                    (typeof e == `number` || oe.test(e)) &&
                    e > -1 &&
                    e % 1 == 0 &&
                    e < t
            );
        }
        function Ut(e) {
            var t = typeof e;
            return t == `string` ||
                t == `number` ||
                t == `symbol` ||
                t == `boolean`
                ? e !== `__proto__`
                : e === null;
        }
        function Wt(e) {
            return !!N && N in e;
        }
        function Gt(e) {
            var t = e && e.constructor;
            return e === ((typeof t == `function` && t.prototype) || j);
        }
        function Kt(e) {
            if (e != null) {
                try {
                    return we.call(e);
                } catch {}
                try {
                    return e + ``;
                } catch {}
            }
            return ``;
        }
        function qt(e) {
            return z(e, !0, !0);
        }
        function Jt(e, t) {
            return e === t || (e !== e && t !== t);
        }
        function Yt(e) {
            return (
                Qt(e) &&
                Te.call(e, `callee`) &&
                (!Me.call(e, `callee`) || Ee.call(e) == i)
            );
        }
        var Xt = Array.isArray;
        function Zt(e) {
            return e != null && tn(e.length) && !en(e);
        }
        function Qt(e) {
            return rn(e) && Zt(e);
        }
        var $t = Fe || sn;
        function en(e) {
            var t = nn(e) ? Ee.call(e) : ``;
            return t == l || t == u;
        }
        function tn(e) {
            return typeof e == `number` && e > -1 && e % 1 == 0 && e <= r;
        }
        function nn(e) {
            var t = typeof e;
            return !!e && (t == `object` || t == `function`);
        }
        function rn(e) {
            return !!e && typeof e == `object`;
        }
        function an(e) {
            return Zt(e) ? gt(e) : wt(e);
        }
        function on() {
            return [];
        }
        function sn() {
            return !1;
        }
        t.exports = qt;
    }),
    Qf = o((e, t) => {
        var n = `__lodash_hash_undefined__`,
            r = 9007199254740991,
            i = `[object Arguments]`,
            a = `[object Array]`,
            o = `[object Boolean]`,
            s = `[object Date]`,
            c = `[object Error]`,
            l = `[object Function]`,
            u = `[object Map]`,
            d = `[object Number]`,
            f = `[object Object]`,
            p = `[object Promise]`,
            m = `[object RegExp]`,
            h = `[object Set]`,
            g = `[object String]`,
            _ = `[object WeakMap]`,
            v = `[object ArrayBuffer]`,
            y = `[object DataView]`,
            b = `[object Float32Array]`,
            x = `[object Float64Array]`,
            S = `[object Int8Array]`,
            C = `[object Int16Array]`,
            w = `[object Int32Array]`,
            T = `[object Uint8Array]`,
            E = `[object Uint8ClampedArray]`,
            ee = `[object Uint16Array]`,
            te = `[object Uint32Array]`,
            ne = /[\\^$.*+?()[\]{}|]/g,
            re = /^\[object .+?Constructor\]$/,
            ie = /^(?:0|[1-9]\d*)$/,
            D = {};
        ((D[b] = D[x] = D[S] = D[C] = D[w] = D[T] = D[E] = D[ee] = D[te] = !0),
            (D[i] =
                D[a] =
                D[v] =
                D[o] =
                D[y] =
                D[s] =
                D[c] =
                D[l] =
                D[u] =
                D[d] =
                D[f] =
                D[m] =
                D[h] =
                D[g] =
                D[_] =
                    !1));
        var ae =
                typeof global == `object` &&
                global &&
                global.Object === Object &&
                global,
            oe =
                typeof self == `object` &&
                self &&
                self.Object === Object &&
                self,
            O = ae || oe || Function(`return this`)(),
            se = typeof e == `object` && e && !e.nodeType && e,
            ce = se && typeof t == `object` && t && !t.nodeType && t,
            k = ce && ce.exports === se,
            le = k && ae.process,
            ue = (function () {
                try {
                    return le && le.binding && le.binding(`util`);
                } catch {}
            })(),
            de = ue && ue.isTypedArray;
        function fe(e, t) {
            for (
                var n = -1, r = e == null ? 0 : e.length, i = 0, a = [];
                ++n < r;
            ) {
                var o = e[n];
                t(o, n, e) && (a[i++] = o);
            }
            return a;
        }
        function pe(e, t) {
            for (var n = -1, r = t.length, i = e.length; ++n < r; )
                e[i + n] = t[n];
            return e;
        }
        function me(e, t) {
            for (var n = -1, r = e == null ? 0 : e.length; ++n < r; )
                if (t(e[n], n, e)) return !0;
            return !1;
        }
        function he(e, t) {
            for (var n = -1, r = Array(e); ++n < e; ) r[n] = t(n);
            return r;
        }
        function ge(e) {
            return function (t) {
                return e(t);
            };
        }
        function _e(e, t) {
            return e.has(t);
        }
        function A(e, t) {
            return e?.[t];
        }
        function ve(e) {
            var t = -1,
                n = Array(e.size);
            return (
                e.forEach(function (e, r) {
                    n[++t] = [r, e];
                }),
                n
            );
        }
        function ye(e, t) {
            return function (n) {
                return e(t(n));
            };
        }
        function be(e) {
            var t = -1,
                n = Array(e.size);
            return (
                e.forEach(function (e) {
                    n[++t] = e;
                }),
                n
            );
        }
        var xe = Array.prototype,
            Se = Function.prototype,
            Ce = Object.prototype,
            j = O[`__core-js_shared__`],
            M = Se.toString,
            N = Ce.hasOwnProperty,
            we = (function () {
                var e = /[^.]+$/.exec((j && j.keys && j.keys.IE_PROTO) || ``);
                return e ? `Symbol(src)_1.` + e : ``;
            })(),
            Te = Ce.toString,
            Ee = RegExp(
                `^` +
                    M.call(N)
                        .replace(ne, `\\$&`)
                        .replace(
                            /hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g,
                            `$1.*?`,
                        ) +
                    `$`,
            ),
            De = k ? O.Buffer : void 0,
            Oe = O.Symbol,
            ke = O.Uint8Array,
            Ae = Ce.propertyIsEnumerable,
            je = xe.splice,
            P = Oe ? Oe.toStringTag : void 0,
            Me = Object.getOwnPropertySymbols,
            Ne = De ? De.isBuffer : void 0,
            Pe = ye(Object.keys, Object),
            Fe = jt(O, `DataView`),
            Ie = jt(O, `Map`),
            Le = jt(O, `Promise`),
            Re = jt(O, `Set`),
            F = jt(O, `WeakMap`),
            ze = jt(Object, `create`),
            Be = V(Fe),
            I = V(Ie),
            Ve = V(Le),
            He = V(Re),
            Ue = V(F),
            We = Oe ? Oe.prototype : void 0,
            Ge = We ? We.valueOf : void 0;
        function Ke(e) {
            var t = -1,
                n = e == null ? 0 : e.length;
            for (this.clear(); ++t < n; ) {
                var r = e[t];
                this.set(r[0], r[1]);
            }
        }
        function qe() {
            ((this.__data__ = ze ? ze(null) : {}), (this.size = 0));
        }
        function Je(e) {
            var t = this.has(e) && delete this.__data__[e];
            return ((this.size -= +!!t), t);
        }
        function Ye(e) {
            var t = this.__data__;
            if (ze) {
                var r = t[e];
                return r === n ? void 0 : r;
            }
            return N.call(t, e) ? t[e] : void 0;
        }
        function Xe(e) {
            var t = this.__data__;
            return ze ? t[e] !== void 0 : N.call(t, e);
        }
        function Ze(e, t) {
            var r = this.__data__;
            return (
                (this.size += +!this.has(e)),
                (r[e] = ze && t === void 0 ? n : t),
                this
            );
        }
        ((Ke.prototype.clear = qe),
            (Ke.prototype.delete = Je),
            (Ke.prototype.get = Ye),
            (Ke.prototype.has = Xe),
            (Ke.prototype.set = Ze));
        function Qe(e) {
            var t = -1,
                n = e == null ? 0 : e.length;
            for (this.clear(); ++t < n; ) {
                var r = e[t];
                this.set(r[0], r[1]);
            }
        }
        function $e() {
            ((this.__data__ = []), (this.size = 0));
        }
        function L(e) {
            var t = this.__data__,
                n = vt(t, e);
            return n < 0
                ? !1
                : (n == t.length - 1 ? t.pop() : je.call(t, n, 1),
                  --this.size,
                  !0);
        }
        function et(e) {
            var t = this.__data__,
                n = vt(t, e);
            return n < 0 ? void 0 : t[n][1];
        }
        function tt(e) {
            return vt(this.__data__, e) > -1;
        }
        function R(e, t) {
            var n = this.__data__,
                r = vt(n, e);
            return (
                r < 0 ? (++this.size, n.push([e, t])) : (n[r][1] = t),
                this
            );
        }
        ((Qe.prototype.clear = $e),
            (Qe.prototype.delete = L),
            (Qe.prototype.get = et),
            (Qe.prototype.has = tt),
            (Qe.prototype.set = R));
        function nt(e) {
            var t = -1,
                n = e == null ? 0 : e.length;
            for (this.clear(); ++t < n; ) {
                var r = e[t];
                this.set(r[0], r[1]);
            }
        }
        function rt() {
            ((this.size = 0),
                (this.__data__ = {
                    hash: new Ke(),
                    map: new (Ie || Qe)(),
                    string: new Ke(),
                }));
        }
        function it(e) {
            var t = At(this, e).delete(e);
            return ((this.size -= +!!t), t);
        }
        function at(e) {
            return At(this, e).get(e);
        }
        function ot(e) {
            return At(this, e).has(e);
        }
        function st(e, t) {
            var n = At(this, e),
                r = n.size;
            return (n.set(e, t), (this.size += n.size == r ? 0 : 1), this);
        }
        ((nt.prototype.clear = rt),
            (nt.prototype.delete = it),
            (nt.prototype.get = at),
            (nt.prototype.has = ot),
            (nt.prototype.set = st));
        function ct(e) {
            var t = -1,
                n = e == null ? 0 : e.length;
            for (this.__data__ = new nt(); ++t < n; ) this.add(e[t]);
        }
        function lt(e) {
            return (this.__data__.set(e, n), this);
        }
        function ut(e) {
            return this.__data__.has(e);
        }
        ((ct.prototype.add = ct.prototype.push = lt), (ct.prototype.has = ut));
        function dt(e) {
            var t = (this.__data__ = new Qe(e));
            this.size = t.size;
        }
        function ft() {
            ((this.__data__ = new Qe()), (this.size = 0));
        }
        function pt(e) {
            var t = this.__data__,
                n = t.delete(e);
            return ((this.size = t.size), n);
        }
        function mt(e) {
            return this.__data__.get(e);
        }
        function ht(e) {
            return this.__data__.has(e);
        }
        function gt(e, t) {
            var n = this.__data__;
            if (n instanceof Qe) {
                var r = n.__data__;
                if (!Ie || r.length < 199)
                    return (r.push([e, t]), (this.size = ++n.size), this);
                n = this.__data__ = new nt(r);
            }
            return (n.set(e, t), (this.size = n.size), this);
        }
        ((dt.prototype.clear = ft),
            (dt.prototype.delete = pt),
            (dt.prototype.get = mt),
            (dt.prototype.has = ht),
            (dt.prototype.set = gt));
        function _t(e, t) {
            var n = Vt(e),
                r = !n && Bt(e),
                i = !n && !r && Ut(e),
                a = !n && !r && !i && Yt(e),
                o = n || r || i || a,
                s = o ? he(e.length, String) : [],
                c = s.length;
            for (var l in e)
                (t || N.call(e, l)) &&
                    !(
                        o &&
                        (l == `length` ||
                            (i && (l == `offset` || l == `parent`)) ||
                            (a &&
                                (l == `buffer` ||
                                    l == `byteLength` ||
                                    l == `byteOffset`)) ||
                            Ft(l, c))
                    ) &&
                    s.push(l);
            return s;
        }
        function vt(e, t) {
            for (var n = e.length; n--; ) if (zt(e[n][0], t)) return n;
            return -1;
        }
        function yt(e, t, n) {
            var r = t(e);
            return Vt(e) ? r : pe(r, n(e));
        }
        function z(e) {
            return e == null
                ? e === void 0
                    ? `[object Undefined]`
                    : `[object Null]`
                : P && P in Object(e)
                  ? Mt(e)
                  : Rt(e);
        }
        function bt(e) {
            return Jt(e) && z(e) == i;
        }
        function xt(e, t, n, r, i) {
            return e === t
                ? !0
                : e == null || t == null || (!Jt(e) && !Jt(t))
                  ? e !== e && t !== t
                  : St(e, t, n, r, xt, i);
        }
        function St(e, t, n, r, o, s) {
            var c = Vt(e),
                l = Vt(t),
                u = c ? a : Pt(e),
                d = l ? a : Pt(t);
            ((u = u == i ? f : u), (d = d == i ? f : d));
            var p = u == f,
                m = d == f,
                h = u == d;
            if (h && Ut(e)) {
                if (!Ut(t)) return !1;
                ((c = !0), (p = !1));
            }
            if (h && !p)
                return (
                    (s ||= new dt()),
                    c || Yt(e) ? Et(e, t, n, r, o, s) : Dt(e, t, u, n, r, o, s)
                );
            if (!(n & 1)) {
                var g = p && N.call(e, `__wrapped__`),
                    _ = m && N.call(t, `__wrapped__`);
                if (g || _) {
                    var v = g ? e.value() : e,
                        y = _ ? t.value() : t;
                    return ((s ||= new dt()), o(v, y, n, r, s));
                }
            }
            return h ? ((s ||= new dt()), Ot(e, t, n, r, o, s)) : !1;
        }
        function Ct(e) {
            return !qt(e) || Lt(e) ? !1 : (Gt(e) ? Ee : re).test(V(e));
        }
        function wt(e) {
            return Jt(e) && Kt(e.length) && !!D[z(e)];
        }
        function Tt(e) {
            if (!B(e)) return Pe(e);
            var t = [];
            for (var n in Object(e))
                N.call(e, n) && n != `constructor` && t.push(n);
            return t;
        }
        function Et(e, t, n, r, i, a) {
            var o = n & 1,
                s = e.length,
                c = t.length;
            if (s != c && !(o && c > s)) return !1;
            var l = a.get(e);
            if (l && a.get(t)) return l == t;
            var u = -1,
                d = !0,
                f = n & 2 ? new ct() : void 0;
            for (a.set(e, t), a.set(t, e); ++u < s; ) {
                var p = e[u],
                    m = t[u];
                if (r) var h = o ? r(m, p, u, t, e, a) : r(p, m, u, e, t, a);
                if (h !== void 0) {
                    if (h) continue;
                    d = !1;
                    break;
                }
                if (f) {
                    if (
                        !me(t, function (e, t) {
                            if (!_e(f, t) && (p === e || i(p, e, n, r, a)))
                                return f.push(t);
                        })
                    ) {
                        d = !1;
                        break;
                    }
                } else if (!(p === m || i(p, m, n, r, a))) {
                    d = !1;
                    break;
                }
            }
            return (a.delete(e), a.delete(t), d);
        }
        function Dt(e, t, n, r, i, a, l) {
            switch (n) {
                case y:
                    if (
                        e.byteLength != t.byteLength ||
                        e.byteOffset != t.byteOffset
                    )
                        return !1;
                    ((e = e.buffer), (t = t.buffer));
                case v:
                    return !(
                        e.byteLength != t.byteLength || !a(new ke(e), new ke(t))
                    );
                case o:
                case s:
                case d:
                    return zt(+e, +t);
                case c:
                    return e.name == t.name && e.message == t.message;
                case m:
                case g:
                    return e == t + ``;
                case u:
                    var f = ve;
                case h:
                    var p = r & 1;
                    if (((f ||= be), e.size != t.size && !p)) return !1;
                    var _ = l.get(e);
                    if (_) return _ == t;
                    ((r |= 2), l.set(e, t));
                    var b = Et(f(e), f(t), r, i, a, l);
                    return (l.delete(e), b);
                case `[object Symbol]`:
                    if (Ge) return Ge.call(e) == Ge.call(t);
            }
            return !1;
        }
        function Ot(e, t, n, r, i, a) {
            var o = n & 1,
                s = kt(e),
                c = s.length;
            if (c != kt(t).length && !o) return !1;
            for (var l = c; l--; ) {
                var u = s[l];
                if (!(o ? u in t : N.call(t, u))) return !1;
            }
            var d = a.get(e);
            if (d && a.get(t)) return d == t;
            var f = !0;
            (a.set(e, t), a.set(t, e));
            for (var p = o; ++l < c; ) {
                u = s[l];
                var m = e[u],
                    h = t[u];
                if (r) var g = o ? r(h, m, u, t, e, a) : r(m, h, u, e, t, a);
                if (!(g === void 0 ? m === h || i(m, h, n, r, a) : g)) {
                    f = !1;
                    break;
                }
                p ||= u == `constructor`;
            }
            if (f && !p) {
                var _ = e.constructor,
                    v = t.constructor;
                _ != v &&
                    `constructor` in e &&
                    `constructor` in t &&
                    !(
                        typeof _ == `function` &&
                        _ instanceof _ &&
                        typeof v == `function` &&
                        v instanceof v
                    ) &&
                    (f = !1);
            }
            return (a.delete(e), a.delete(t), f);
        }
        function kt(e) {
            return yt(e, Xt, Nt);
        }
        function At(e, t) {
            var n = e.__data__;
            return It(t) ? n[typeof t == `string` ? `string` : `hash`] : n.map;
        }
        function jt(e, t) {
            var n = A(e, t);
            return Ct(n) ? n : void 0;
        }
        function Mt(e) {
            var t = N.call(e, P),
                n = e[P];
            try {
                e[P] = void 0;
                var r = !0;
            } catch {}
            var i = Te.call(e);
            return (r && (t ? (e[P] = n) : delete e[P]), i);
        }
        var Nt = Me
                ? function (e) {
                      return e == null
                          ? []
                          : ((e = Object(e)),
                            fe(Me(e), function (t) {
                                return Ae.call(e, t);
                            }));
                  }
                : Zt,
            Pt = z;
        ((Fe && Pt(new Fe(new ArrayBuffer(1))) != y) ||
            (Ie && Pt(new Ie()) != u) ||
            (Le && Pt(Le.resolve()) != p) ||
            (Re && Pt(new Re()) != h) ||
            (F && Pt(new F()) != _)) &&
            (Pt = function (e) {
                var t = z(e),
                    n = t == f ? e.constructor : void 0,
                    r = n ? V(n) : ``;
                if (r)
                    switch (r) {
                        case Be:
                            return y;
                        case I:
                            return u;
                        case Ve:
                            return p;
                        case He:
                            return h;
                        case Ue:
                            return _;
                    }
                return t;
            });
        function Ft(e, t) {
            return (
                (t ??= r),
                !!t &&
                    (typeof e == `number` || ie.test(e)) &&
                    e > -1 &&
                    e % 1 == 0 &&
                    e < t
            );
        }
        function It(e) {
            var t = typeof e;
            return t == `string` ||
                t == `number` ||
                t == `symbol` ||
                t == `boolean`
                ? e !== `__proto__`
                : e === null;
        }
        function Lt(e) {
            return !!we && we in e;
        }
        function B(e) {
            var t = e && e.constructor;
            return e === ((typeof t == `function` && t.prototype) || Ce);
        }
        function Rt(e) {
            return Te.call(e);
        }
        function V(e) {
            if (e != null) {
                try {
                    return M.call(e);
                } catch {}
                try {
                    return e + ``;
                } catch {}
            }
            return ``;
        }
        function zt(e, t) {
            return e === t || (e !== e && t !== t);
        }
        var Bt = bt(
                (function () {
                    return arguments;
                })(),
            )
                ? bt
                : function (e) {
                      return (
                          Jt(e) && N.call(e, `callee`) && !Ae.call(e, `callee`)
                      );
                  },
            Vt = Array.isArray;
        function Ht(e) {
            return e != null && Kt(e.length) && !Gt(e);
        }
        var Ut = Ne || Qt;
        function Wt(e, t) {
            return xt(e, t);
        }
        function Gt(e) {
            if (!qt(e)) return !1;
            var t = z(e);
            return (
                t == l ||
                t == `[object GeneratorFunction]` ||
                t == `[object AsyncFunction]` ||
                t == `[object Proxy]`
            );
        }
        function Kt(e) {
            return typeof e == `number` && e > -1 && e % 1 == 0 && e <= r;
        }
        function qt(e) {
            var t = typeof e;
            return e != null && (t == `object` || t == `function`);
        }
        function Jt(e) {
            return typeof e == `object` && !!e;
        }
        var Yt = de ? ge(de) : wt;
        function Xt(e) {
            return Ht(e) ? _t(e) : Tt(e);
        }
        function Zt() {
            return [];
        }
        function Qt() {
            return !1;
        }
        t.exports = Wt;
    }),
    $f = o((e) => {
        Object.defineProperty(e, "__esModule", { value: !0 });
        var t = Zf(),
            n = Qf(),
            r;
        ((function (e) {
            function r(e = {}, n = {}, r = !1) {
                (typeof e != `object` && (e = {}),
                    typeof n != `object` && (n = {}));
                let i = t(n);
                r ||
                    (i = Object.keys(i).reduce(
                        (e, t) => (i[t] != null && (e[t] = i[t]), e),
                        {},
                    ));
                for (let t in e)
                    e[t] !== void 0 && n[t] === void 0 && (i[t] = e[t]);
                return Object.keys(i).length > 0 ? i : void 0;
            }
            e.compose = r;
            function i(e = {}, t = {}) {
                (typeof e != `object` && (e = {}),
                    typeof t != `object` && (t = {}));
                let r = Object.keys(e)
                    .concat(Object.keys(t))
                    .reduce(
                        (r, i) => (
                            n(e[i], t[i]) ||
                                (r[i] = t[i] === void 0 ? null : t[i]),
                            r
                        ),
                        {},
                    );
                return Object.keys(r).length > 0 ? r : void 0;
            }
            e.diff = i;
            function a(e = {}, t = {}) {
                e ||= {};
                let n = Object.keys(t).reduce(
                    (n, r) => (
                        t[r] !== e[r] && e[r] !== void 0 && (n[r] = t[r]),
                        n
                    ),
                    {},
                );
                return Object.keys(e).reduce(
                    (n, r) => (
                        e[r] !== t[r] && t[r] === void 0 && (n[r] = null),
                        n
                    ),
                    n,
                );
            }
            e.invert = a;
            function o(e, t, n = !1) {
                if (typeof e != `object`) return t;
                if (typeof t != `object`) return;
                if (!n) return t;
                let r = Object.keys(t).reduce(
                    (n, r) => (e[r] === void 0 && (n[r] = t[r]), n),
                    {},
                );
                return Object.keys(r).length > 0 ? r : void 0;
            }
            e.transform = o;
        })((r ||= {})),
            (e.default = r));
    }),
    ep = o((e) => {
        Object.defineProperty(e, "__esModule", { value: !0 });
        var t;
        ((function (e) {
            function t(e) {
                return typeof e.delete == `number`
                    ? e.delete
                    : typeof e.retain == `number`
                      ? e.retain
                      : typeof e.retain == `object` && e.retain !== null
                        ? 1
                        : typeof e.insert == `string`
                          ? e.insert.length
                          : 1;
            }
            e.length = t;
        })((t ||= {})),
            (e.default = t));
    }),
    tp = o((e) => {
        Object.defineProperty(e, "__esModule", { value: !0 });
        var t = ep();
        e.default = class {
            constructor(e) {
                ((this.ops = e), (this.index = 0), (this.offset = 0));
            }
            hasNext() {
                return this.peekLength() < 1 / 0;
            }
            next(e) {
                e ||= 1 / 0;
                let n = this.ops[this.index];
                if (n) {
                    let r = this.offset,
                        i = t.default.length(n);
                    if (
                        (e >= i - r
                            ? ((e = i - r),
                              (this.index += 1),
                              (this.offset = 0))
                            : (this.offset += e),
                        typeof n.delete == `number`)
                    )
                        return { delete: e };
                    {
                        let t = {};
                        return (
                            n.attributes && (t.attributes = n.attributes),
                            typeof n.retain == `number`
                                ? (t.retain = e)
                                : typeof n.retain == `object` &&
                                    n.retain !== null
                                  ? (t.retain = n.retain)
                                  : typeof n.insert == `string`
                                    ? (t.insert = n.insert.substr(r, e))
                                    : (t.insert = n.insert),
                            t
                        );
                    }
                } else return { retain: 1 / 0 };
            }
            peek() {
                return this.ops[this.index];
            }
            peekLength() {
                return this.ops[this.index]
                    ? t.default.length(this.ops[this.index]) - this.offset
                    : 1 / 0;
            }
            peekType() {
                let e = this.ops[this.index];
                return e
                    ? typeof e.delete == `number`
                        ? `delete`
                        : typeof e.retain == `number` ||
                            (typeof e.retain == `object` && e.retain !== null)
                          ? `retain`
                          : `insert`
                    : `retain`;
            }
            rest() {
                if (!this.hasNext()) return [];
                if (this.offset === 0) return this.ops.slice(this.index);
                {
                    let e = this.offset,
                        t = this.index,
                        n = this.next(),
                        r = this.ops.slice(this.index);
                    return ((this.offset = e), (this.index = t), [n].concat(r));
                }
            }
        };
    }),
    Y = l(
        o((e, t) => {
            (Object.defineProperty(e, "__esModule", { value: !0 }),
                (e.AttributeMap = e.OpIterator = e.Op = void 0));
            var n = Xf(),
                r = Zf(),
                i = Qf(),
                a = $f();
            e.AttributeMap = a.default;
            var o = ep();
            e.Op = o.default;
            var s = tp();
            e.OpIterator = s.default;
            var c = `\0`,
                l = (e, t) => {
                    if (typeof e != `object` || !e)
                        throw Error(`cannot retain a ${typeof e}`);
                    if (typeof t != `object` || !t)
                        throw Error(`cannot retain a ${typeof t}`);
                    let n = Object.keys(e)[0];
                    if (!n || n !== Object.keys(t)[0])
                        throw Error(
                            `embed types not matched: ${n} != ${Object.keys(t)[0]}`,
                        );
                    return [n, e[n], t[n]];
                },
                u = class e {
                    constructor(e) {
                        Array.isArray(e)
                            ? (this.ops = e)
                            : e != null && Array.isArray(e.ops)
                              ? (this.ops = e.ops)
                              : (this.ops = []);
                    }
                    static registerEmbed(e, t) {
                        this.handlers[e] = t;
                    }
                    static unregisterEmbed(e) {
                        delete this.handlers[e];
                    }
                    static getHandler(e) {
                        let t = this.handlers[e];
                        if (!t)
                            throw Error(`no handlers for embed type "${e}"`);
                        return t;
                    }
                    insert(e, t) {
                        let n = {};
                        return typeof e == `string` && e.length === 0
                            ? this
                            : ((n.insert = e),
                              typeof t == `object` &&
                                  t &&
                                  Object.keys(t).length > 0 &&
                                  (n.attributes = t),
                              this.push(n));
                    }
                    delete(e) {
                        return e <= 0 ? this : this.push({ delete: e });
                    }
                    retain(e, t) {
                        if (typeof e == `number` && e <= 0) return this;
                        let n = { retain: e };
                        return (
                            typeof t == `object` &&
                                t &&
                                Object.keys(t).length > 0 &&
                                (n.attributes = t),
                            this.push(n)
                        );
                    }
                    push(e) {
                        let t = this.ops.length,
                            n = this.ops[t - 1];
                        if (((e = r(e)), typeof n == `object`)) {
                            if (
                                typeof e.delete == `number` &&
                                typeof n.delete == `number`
                            )
                                return (
                                    (this.ops[t - 1] = {
                                        delete: n.delete + e.delete,
                                    }),
                                    this
                                );
                            if (
                                typeof n.delete == `number` &&
                                e.insert != null &&
                                (--t,
                                (n = this.ops[t - 1]),
                                typeof n != `object`)
                            )
                                return (this.ops.unshift(e), this);
                            if (i(e.attributes, n.attributes)) {
                                if (
                                    typeof e.insert == `string` &&
                                    typeof n.insert == `string`
                                )
                                    return (
                                        (this.ops[t - 1] = {
                                            insert: n.insert + e.insert,
                                        }),
                                        typeof e.attributes == `object` &&
                                            (this.ops[t - 1].attributes =
                                                e.attributes),
                                        this
                                    );
                                if (
                                    typeof e.retain == `number` &&
                                    typeof n.retain == `number`
                                )
                                    return (
                                        (this.ops[t - 1] = {
                                            retain: n.retain + e.retain,
                                        }),
                                        typeof e.attributes == `object` &&
                                            (this.ops[t - 1].attributes =
                                                e.attributes),
                                        this
                                    );
                            }
                        }
                        return (
                            t === this.ops.length
                                ? this.ops.push(e)
                                : this.ops.splice(t, 0, e),
                            this
                        );
                    }
                    chop() {
                        let e = this.ops[this.ops.length - 1];
                        return (
                            e &&
                                typeof e.retain == `number` &&
                                !e.attributes &&
                                this.ops.pop(),
                            this
                        );
                    }
                    filter(e) {
                        return this.ops.filter(e);
                    }
                    forEach(e) {
                        this.ops.forEach(e);
                    }
                    map(e) {
                        return this.ops.map(e);
                    }
                    partition(e) {
                        let t = [],
                            n = [];
                        return (
                            this.forEach((r) => {
                                (e(r) ? t : n).push(r);
                            }),
                            [t, n]
                        );
                    }
                    reduce(e, t) {
                        return this.ops.reduce(e, t);
                    }
                    changeLength() {
                        return this.reduce(
                            (e, t) =>
                                t.insert
                                    ? e + o.default.length(t)
                                    : t.delete
                                      ? e - t.delete
                                      : e,
                            0,
                        );
                    }
                    length() {
                        return this.reduce(
                            (e, t) => e + o.default.length(t),
                            0,
                        );
                    }
                    slice(t = 0, n = 1 / 0) {
                        let r = [],
                            i = new s.default(this.ops),
                            a = 0;
                        for (; a < n && i.hasNext(); ) {
                            let e;
                            (a < t
                                ? (e = i.next(t - a))
                                : ((e = i.next(n - a)), r.push(e)),
                                (a += o.default.length(e)));
                        }
                        return new e(r);
                    }
                    compose(t) {
                        let n = new s.default(this.ops),
                            r = new s.default(t.ops),
                            o = [],
                            c = r.peek();
                        if (
                            c != null &&
                            typeof c.retain == `number` &&
                            c.attributes == null
                        ) {
                            let e = c.retain;
                            for (
                                ;
                                n.peekType() === `insert` &&
                                n.peekLength() <= e;
                            )
                                ((e -= n.peekLength()), o.push(n.next()));
                            c.retain - e > 0 && r.next(c.retain - e);
                        }
                        let u = new e(o);
                        for (; n.hasNext() || r.hasNext(); )
                            if (r.peekType() === `insert`) u.push(r.next());
                            else if (n.peekType() === `delete`)
                                u.push(n.next());
                            else {
                                let t = Math.min(
                                        n.peekLength(),
                                        r.peekLength(),
                                    ),
                                    o = n.next(t),
                                    s = r.next(t);
                                if (s.retain) {
                                    let c = {};
                                    if (typeof o.retain == `number`)
                                        c.retain =
                                            typeof s.retain == `number`
                                                ? t
                                                : s.retain;
                                    else if (typeof s.retain == `number`)
                                        o.retain == null
                                            ? (c.insert = o.insert)
                                            : (c.retain = o.retain);
                                    else {
                                        let t =
                                                o.retain == null
                                                    ? `insert`
                                                    : `retain`,
                                            [n, r, i] = l(o[t], s.retain),
                                            a = e.getHandler(n);
                                        c[t] = {
                                            [n]: a.compose(
                                                r,
                                                i,
                                                t === `retain`,
                                            ),
                                        };
                                    }
                                    let d = a.default.compose(
                                        o.attributes,
                                        s.attributes,
                                        typeof o.retain == `number`,
                                    );
                                    if (
                                        (d && (c.attributes = d),
                                        u.push(c),
                                        !r.hasNext() &&
                                            i(u.ops[u.ops.length - 1], c))
                                    ) {
                                        let t = new e(n.rest());
                                        return u.concat(t).chop();
                                    }
                                } else
                                    typeof s.delete == `number` &&
                                        (typeof o.retain == `number` ||
                                            (typeof o.retain == `object` &&
                                                o.retain !== null)) &&
                                        u.push(s);
                            }
                        return u.chop();
                    }
                    concat(t) {
                        let n = new e(this.ops.slice());
                        return (
                            t.ops.length > 0 &&
                                (n.push(t.ops[0]),
                                (n.ops = n.ops.concat(t.ops.slice(1)))),
                            n
                        );
                    }
                    diff(t, r) {
                        if (this.ops === t.ops) return new e();
                        let o = [this, t].map((e) =>
                                e
                                    .map((n) => {
                                        if (n.insert != null)
                                            return typeof n.insert == `string`
                                                ? n.insert
                                                : c;
                                        throw Error(
                                            `diff() called ` +
                                                (e === t ? `on` : `with`) +
                                                ` non-document`,
                                        );
                                    })
                                    .join(``),
                            ),
                            l = new e(),
                            u = n(o[0], o[1], r, !0),
                            d = new s.default(this.ops),
                            f = new s.default(t.ops);
                        return (
                            u.forEach((e) => {
                                let t = e[1].length;
                                for (; t > 0; ) {
                                    let r = 0;
                                    switch (e[0]) {
                                        case n.INSERT:
                                            ((r = Math.min(f.peekLength(), t)),
                                                l.push(f.next(r)));
                                            break;
                                        case n.DELETE:
                                            ((r = Math.min(t, d.peekLength())),
                                                d.next(r),
                                                l.delete(r));
                                            break;
                                        case n.EQUAL:
                                            r = Math.min(
                                                d.peekLength(),
                                                f.peekLength(),
                                                t,
                                            );
                                            let e = d.next(r),
                                                o = f.next(r);
                                            i(e.insert, o.insert)
                                                ? l.retain(
                                                      r,
                                                      a.default.diff(
                                                          e.attributes,
                                                          o.attributes,
                                                      ),
                                                  )
                                                : l.push(o).delete(r);
                                            break;
                                    }
                                    t -= r;
                                }
                            }),
                            l.chop()
                        );
                    }
                    eachLine(
                        t,
                        n = `
`,
                    ) {
                        let r = new s.default(this.ops),
                            i = new e(),
                            a = 0;
                        for (; r.hasNext(); ) {
                            if (r.peekType() !== `insert`) return;
                            let s = r.peek(),
                                c = o.default.length(s) - r.peekLength(),
                                l =
                                    typeof s.insert == `string`
                                        ? s.insert.indexOf(n, c) - c
                                        : -1;
                            if (l < 0) i.push(r.next());
                            else if (l > 0) i.push(r.next(l));
                            else {
                                if (t(i, r.next(1).attributes || {}, a) === !1)
                                    return;
                                ((a += 1), (i = new e()));
                            }
                        }
                        i.length() > 0 && t(i, {}, a);
                    }
                    invert(t) {
                        let n = new e();
                        return (
                            this.reduce((r, i) => {
                                if (i.insert) n.delete(o.default.length(i));
                                else if (
                                    typeof i.retain == `number` &&
                                    i.attributes == null
                                )
                                    return (n.retain(i.retain), r + i.retain);
                                else if (
                                    i.delete ||
                                    typeof i.retain == `number`
                                ) {
                                    let e = i.delete || i.retain;
                                    return (
                                        t.slice(r, r + e).forEach((e) => {
                                            i.delete
                                                ? n.push(e)
                                                : i.retain &&
                                                  i.attributes &&
                                                  n.retain(
                                                      o.default.length(e),
                                                      a.default.invert(
                                                          i.attributes,
                                                          e.attributes,
                                                      ),
                                                  );
                                        }),
                                        r + e
                                    );
                                } else if (
                                    typeof i.retain == `object` &&
                                    i.retain !== null
                                ) {
                                    let o = t.slice(r, r + 1),
                                        c = new s.default(o.ops).next(),
                                        [u, d, f] = l(i.retain, c.insert),
                                        p = e.getHandler(u);
                                    return (
                                        n.retain(
                                            { [u]: p.invert(d, f) },
                                            a.default.invert(
                                                i.attributes,
                                                c.attributes,
                                            ),
                                        ),
                                        r + 1
                                    );
                                }
                                return r;
                            }, 0),
                            n.chop()
                        );
                    }
                    transform(t, n = !1) {
                        if (((n = !!n), typeof t == `number`))
                            return this.transformPosition(t, n);
                        let r = t,
                            i = new s.default(this.ops),
                            c = new s.default(r.ops),
                            l = new e();
                        for (; i.hasNext() || c.hasNext(); )
                            if (
                                i.peekType() === `insert` &&
                                (n || c.peekType() !== `insert`)
                            )
                                l.retain(o.default.length(i.next()));
                            else if (c.peekType() === `insert`)
                                l.push(c.next());
                            else {
                                let t = Math.min(
                                        i.peekLength(),
                                        c.peekLength(),
                                    ),
                                    r = i.next(t),
                                    o = c.next(t);
                                if (r.delete) continue;
                                if (o.delete) l.push(o);
                                else {
                                    let i = r.retain,
                                        s = o.retain,
                                        c = typeof s == `object` && s ? s : t;
                                    if (
                                        typeof i == `object` &&
                                        i &&
                                        typeof s == `object` &&
                                        s
                                    ) {
                                        let t = Object.keys(i)[0];
                                        if (t === Object.keys(s)[0]) {
                                            let r = e.getHandler(t);
                                            r &&
                                                (c = {
                                                    [t]: r.transform(
                                                        i[t],
                                                        s[t],
                                                        n,
                                                    ),
                                                });
                                        }
                                    }
                                    l.retain(
                                        c,
                                        a.default.transform(
                                            r.attributes,
                                            o.attributes,
                                            n,
                                        ),
                                    );
                                }
                            }
                        return l.chop();
                    }
                    transformPosition(e, t = !1) {
                        t = !!t;
                        let n = new s.default(this.ops),
                            r = 0;
                        for (; n.hasNext() && r <= e; ) {
                            let i = n.peekLength(),
                                a = n.peekType();
                            if ((n.next(), a === `delete`)) {
                                e -= Math.min(i, e - r);
                                continue;
                            } else a === `insert` && (r < e || !t) && (e += i);
                            r += i;
                        }
                        return e;
                    }
                };
            ((u.Op = o.default),
                (u.OpIterator = s.default),
                (u.AttributeMap = a.default),
                (u.handlers = {}),
                (e.default = u),
                typeof t == `object` &&
                    ((t.exports = u), (t.exports.default = u)));
        })(),
        1,
    ),
    np = class extends J {
        static value() {}
        optimize() {
            (this.prev || this.next) && this.remove();
        }
        length() {
            return 0;
        }
        value() {
            return ``;
        }
    };
((np.blotName = `break`), (np.tagName = `BR`));
var rp = class extends Yf {},
    ip = {
        "&": `&amp;`,
        "<": `&lt;`,
        ">": `&gt;`,
        '"': `&quot;`,
        "'": `&#39;`,
    };
function ap(e) {
    return e.replace(/[&<>"']/g, (e) => ip[e]);
}
var op = class e extends zf {
        static allowedChildren = [e, np, J, rp];
        static order = [
            `cursor`,
            `inline`,
            `link`,
            `underline`,
            `strike`,
            `italic`,
            `bold`,
            `script`,
            `code`,
        ];
        static compare(t, n) {
            let r = e.order.indexOf(t),
                i = e.order.indexOf(n);
            return r >= 0 || i >= 0 ? r - i : t === n ? 0 : t < n ? -1 : 1;
        }
        formatAt(t, n, r, i) {
            if (
                e.compare(this.statics.blotName, r) < 0 &&
                this.scroll.query(r, K.BLOT)
            ) {
                let e = this.isolate(t, n);
                i && e.wrap(r, i);
            } else super.formatAt(t, n, r, i);
        }
        optimize(t) {
            if (
                (super.optimize(t),
                this.parent instanceof e &&
                    e.compare(
                        this.statics.blotName,
                        this.parent.statics.blotName,
                    ) > 0)
            ) {
                let e = this.parent.isolate(this.offset(), this.length());
                (this.moveChildren(e), e.wrap(this));
            }
        }
    },
    sp = 1,
    X = class extends Vf {
        cache = {};
        delta() {
            return (
                this.cache.delta ?? (this.cache.delta = lp(this)),
                this.cache.delta
            );
        }
        deleteAt(e, t) {
            (super.deleteAt(e, t), (this.cache = {}));
        }
        formatAt(e, t, n, r) {
            t <= 0 ||
                (this.scroll.query(n, K.BLOCK)
                    ? e + t === this.length() && this.format(n, r)
                    : super.formatAt(
                          e,
                          Math.min(t, this.length() - e - 1),
                          n,
                          r,
                      ),
                (this.cache = {}));
        }
        insertAt(e, t, n) {
            if (n != null) {
                (super.insertAt(e, t, n), (this.cache = {}));
                return;
            }
            if (t.length === 0) return;
            let r = t.split(`
`),
                i = r.shift();
            i.length > 0 &&
                (e < this.length() - 1 || this.children.tail == null
                    ? super.insertAt(Math.min(e, this.length() - 1), i)
                    : this.children.tail.insertAt(
                          this.children.tail.length(),
                          i,
                      ),
                (this.cache = {}));
            let a = this;
            r.reduce(
                (e, t) => ((a = a.split(e, !0)), a.insertAt(0, t), t.length),
                e + i.length,
            );
        }
        insertBefore(e, t) {
            let { head: n } = this.children;
            (super.insertBefore(e, t),
                n instanceof np && n.remove(),
                (this.cache = {}));
        }
        length() {
            return (
                this.cache.length ?? (this.cache.length = super.length() + sp),
                this.cache.length
            );
        }
        moveChildren(e, t) {
            (super.moveChildren(e, t), (this.cache = {}));
        }
        optimize(e) {
            (super.optimize(e), (this.cache = {}));
        }
        path(e) {
            return super.path(e, !0);
        }
        removeChild(e) {
            (super.removeChild(e), (this.cache = {}));
        }
        split(e) {
            let t =
                arguments.length > 1 && arguments[1] !== void 0 && arguments[1];
            if (t && (e === 0 || e >= this.length() - sp)) {
                let t = this.clone();
                return e === 0
                    ? (this.parent.insertBefore(t, this), this)
                    : (this.parent.insertBefore(t, this.next), t);
            }
            let n = super.split(e, t);
            return ((this.cache = {}), n);
        }
    };
((X.blotName = `block`),
    (X.tagName = `P`),
    (X.defaultChild = np),
    (X.allowedChildren = [np, op, J, rp]));
var cp = class extends J {
    attach() {
        (super.attach(), (this.attributes = new kf(this.domNode)));
    }
    delta() {
        return new Y.default().insert(this.value(), {
            ...this.formats(),
            ...this.attributes.values(),
        });
    }
    format(e, t) {
        let n = this.scroll.query(e, K.BLOCK_ATTRIBUTE);
        n != null && this.attributes.attribute(n, t);
    }
    formatAt(e, t, n, r) {
        this.format(n, r);
    }
    insertAt(e, t, n) {
        if (n != null) {
            super.insertAt(e, t, n);
            return;
        }
        let r = t.split(`
`),
            i = r.pop(),
            a = r.map((e) => {
                let t = this.scroll.create(X.blotName);
                return (t.insertAt(0, e), t);
            }),
            o = this.split(e);
        (a.forEach((e) => {
            this.parent.insertBefore(e, o);
        }),
            i && this.parent.insertBefore(this.scroll.create(`text`, i), o));
    }
};
cp.scope = K.BLOCK_BLOT;
function lp(e) {
    let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : !0;
    return e
        .descendants(q)
        .reduce(
            (e, n) =>
                n.length() === 0 ? e : e.insert(n.value(), up(n, {}, t)),
            new Y.default(),
        )
        .insert(
            `
`,
            up(e),
        );
}
function up(e) {
    let t = arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {},
        n = arguments.length > 2 && arguments[2] !== void 0 ? arguments[2] : !0;
    return e == null ||
        (`formats` in e &&
            typeof e.formats == `function` &&
            ((t = { ...t, ...e.formats() }), n && delete t[`code-token`]),
        e.parent == null ||
            e.parent.statics.blotName === `scroll` ||
            e.parent.statics.scope !== e.statics.scope)
        ? t
        : up(e.parent, t, n);
}
var dp = class e extends J {
        static blotName = `cursor`;
        static className = `ql-cursor`;
        static tagName = `span`;
        static CONTENTS = `﻿`;
        static value() {}
        constructor(t, n, r) {
            (super(t, n),
                (this.selection = r),
                (this.textNode = document.createTextNode(e.CONTENTS)),
                this.domNode.appendChild(this.textNode),
                (this.savedLength = 0));
        }
        detach() {
            this.parent != null && this.parent.removeChild(this);
        }
        format(t, n) {
            if (this.savedLength !== 0) {
                super.format(t, n);
                return;
            }
            let r = this,
                i = 0;
            for (; r != null && r.statics.scope !== K.BLOCK_BLOT; )
                ((i += r.offset(r.parent)), (r = r.parent));
            r != null &&
                ((this.savedLength = e.CONTENTS.length),
                r.optimize(),
                r.formatAt(i, e.CONTENTS.length, t, n),
                (this.savedLength = 0));
        }
        index(e, t) {
            return e === this.textNode ? 0 : super.index(e, t);
        }
        length() {
            return this.savedLength;
        }
        position() {
            return [this.textNode, this.textNode.data.length];
        }
        remove() {
            (super.remove(), (this.parent = null));
        }
        restore() {
            if (this.selection.composing || this.parent == null) return null;
            let t = this.selection.getNativeRange();
            for (
                ;
                this.domNode.lastChild != null &&
                this.domNode.lastChild !== this.textNode;
            )
                this.domNode.parentNode.insertBefore(
                    this.domNode.lastChild,
                    this.domNode,
                );
            let n = this.prev instanceof rp ? this.prev : null,
                r = n ? n.length() : 0,
                i = this.next instanceof rp ? this.next : null,
                a = i ? i.text : ``,
                { textNode: o } = this,
                s = o.data.split(e.CONTENTS).join(``);
            o.data = e.CONTENTS;
            let c;
            if (n)
                ((c = n),
                    (s || i) &&
                        (n.insertAt(n.length(), s + a), i && i.remove()));
            else if (i) ((c = i), i.insertAt(0, s));
            else {
                let e = document.createTextNode(s);
                ((c = this.scroll.create(e)),
                    this.parent.insertBefore(c, this));
            }
            if ((this.remove(), t)) {
                let e = (e, t) =>
                        n && e === n.domNode
                            ? t
                            : e === o
                              ? r + t - 1
                              : i && e === i.domNode
                                ? r + s.length + t
                                : null,
                    a = e(t.start.node, t.start.offset),
                    l = e(t.end.node, t.end.offset);
                if (a !== null && l !== null)
                    return {
                        startNode: c.domNode,
                        startOffset: a,
                        endNode: c.domNode,
                        endOffset: l,
                    };
            }
            return null;
        }
        update(e, t) {
            if (
                e.some(
                    (e) =>
                        e.type === `characterData` &&
                        e.target === this.textNode,
                )
            ) {
                let e = this.restore();
                e && (t.range = e);
            }
        }
        optimize(t) {
            super.optimize(t);
            let { parent: n } = this;
            for (; n; ) {
                if (n.domNode.tagName === `A`) {
                    ((this.savedLength = e.CONTENTS.length),
                        n.isolate(this.offset(n), this.length()).unwrap(),
                        (this.savedLength = 0));
                    break;
                }
                n = n.parent;
            }
        }
        value() {
            return ``;
        }
    },
    fp = l(
        o((e, t) => {
            var n = Object.prototype.hasOwnProperty,
                r = `~`;
            function i() {}
            Object.create &&
                ((i.prototype = Object.create(null)),
                new i().__proto__ || (r = !1));
            function a(e, t, n) {
                ((this.fn = e), (this.context = t), (this.once = n || !1));
            }
            function o(e, t, n, i, o) {
                if (typeof n != `function`)
                    throw TypeError(`The listener must be a function`);
                var s = new a(n, i || e, o),
                    c = r ? r + t : t;
                return (
                    e._events[c]
                        ? e._events[c].fn
                            ? (e._events[c] = [e._events[c], s])
                            : e._events[c].push(s)
                        : ((e._events[c] = s), e._eventsCount++),
                    e
                );
            }
            function s(e, t) {
                --e._eventsCount === 0
                    ? (e._events = new i())
                    : delete e._events[t];
            }
            function c() {
                ((this._events = new i()), (this._eventsCount = 0));
            }
            ((c.prototype.eventNames = function () {
                var e = [],
                    t,
                    i;
                if (this._eventsCount === 0) return e;
                for (i in (t = this._events))
                    n.call(t, i) && e.push(r ? i.slice(1) : i);
                return Object.getOwnPropertySymbols
                    ? e.concat(Object.getOwnPropertySymbols(t))
                    : e;
            }),
                (c.prototype.listeners = function (e) {
                    var t = r ? r + e : e,
                        n = this._events[t];
                    if (!n) return [];
                    if (n.fn) return [n.fn];
                    for (var i = 0, a = n.length, o = Array(a); i < a; i++)
                        o[i] = n[i].fn;
                    return o;
                }),
                (c.prototype.listenerCount = function (e) {
                    var t = r ? r + e : e,
                        n = this._events[t];
                    return n ? (n.fn ? 1 : n.length) : 0;
                }),
                (c.prototype.emit = function (e, t, n, i, a, o) {
                    var s = r ? r + e : e;
                    if (!this._events[s]) return !1;
                    var c = this._events[s],
                        l = arguments.length,
                        u,
                        d;
                    if (c.fn) {
                        switch (
                            (c.once && this.removeListener(e, c.fn, void 0, !0),
                            l)
                        ) {
                            case 1:
                                return (c.fn.call(c.context), !0);
                            case 2:
                                return (c.fn.call(c.context, t), !0);
                            case 3:
                                return (c.fn.call(c.context, t, n), !0);
                            case 4:
                                return (c.fn.call(c.context, t, n, i), !0);
                            case 5:
                                return (c.fn.call(c.context, t, n, i, a), !0);
                            case 6:
                                return (
                                    c.fn.call(c.context, t, n, i, a, o),
                                    !0
                                );
                        }
                        for (d = 1, u = Array(l - 1); d < l; d++)
                            u[d - 1] = arguments[d];
                        c.fn.apply(c.context, u);
                    } else {
                        var f = c.length,
                            p;
                        for (d = 0; d < f; d++)
                            switch (
                                (c[d].once &&
                                    this.removeListener(e, c[d].fn, void 0, !0),
                                l)
                            ) {
                                case 1:
                                    c[d].fn.call(c[d].context);
                                    break;
                                case 2:
                                    c[d].fn.call(c[d].context, t);
                                    break;
                                case 3:
                                    c[d].fn.call(c[d].context, t, n);
                                    break;
                                case 4:
                                    c[d].fn.call(c[d].context, t, n, i);
                                    break;
                                default:
                                    if (!u)
                                        for (
                                            p = 1, u = Array(l - 1);
                                            p < l;
                                            p++
                                        )
                                            u[p - 1] = arguments[p];
                                    c[d].fn.apply(c[d].context, u);
                            }
                    }
                    return !0;
                }),
                (c.prototype.on = function (e, t, n) {
                    return o(this, e, t, n, !1);
                }),
                (c.prototype.once = function (e, t, n) {
                    return o(this, e, t, n, !0);
                }),
                (c.prototype.removeListener = function (e, t, n, i) {
                    var a = r ? r + e : e;
                    if (!this._events[a]) return this;
                    if (!t) return (s(this, a), this);
                    var o = this._events[a];
                    if (o.fn)
                        o.fn === t &&
                            (!i || o.once) &&
                            (!n || o.context === n) &&
                            s(this, a);
                    else {
                        for (var c = 0, l = [], u = o.length; c < u; c++)
                            (o[c].fn !== t ||
                                (i && !o[c].once) ||
                                (n && o[c].context !== n)) &&
                                l.push(o[c]);
                        l.length
                            ? (this._events[a] = l.length === 1 ? l[0] : l)
                            : s(this, a);
                    }
                    return this;
                }),
                (c.prototype.removeAllListeners = function (e) {
                    var t;
                    return (
                        e
                            ? ((t = r ? r + e : e),
                              this._events[t] && s(this, t))
                            : ((this._events = new i()),
                              (this._eventsCount = 0)),
                        this
                    );
                }),
                (c.prototype.off = c.prototype.removeListener),
                (c.prototype.addListener = c.prototype.on),
                (c.prefixed = r),
                (c.EventEmitter = c),
                t !== void 0 && (t.exports = c));
        })(),
        1,
    ),
    pp = new WeakMap(),
    mp = [`error`, `warn`, `log`, `info`],
    hp = `warn`;
function gp(e) {
    if (hp && mp.indexOf(e) <= mp.indexOf(hp)) {
        var t = [...arguments].slice(1);
        console[e](...t);
    }
}
function _p(e) {
    return mp.reduce((t, n) => ((t[n] = gp.bind(console, n, e)), t), {});
}
((_p.level = (e) => {
    hp = e;
}),
    (gp.level = _p.level));
var vp = _p(`quill:events`);
[`selectionchange`, `mousedown`, `mouseup`, `click`].forEach((e) => {
    document.addEventListener(e, function () {
        var e = [...arguments];
        Array.from(document.querySelectorAll(`.ql-container`)).forEach((t) => {
            let n = pp.get(t);
            n && n.emitter && n.emitter.handleDOM(...e);
        });
    });
});
var Z = class extends fp.default {
        static events = {
            EDITOR_CHANGE: `editor-change`,
            SCROLL_BEFORE_UPDATE: `scroll-before-update`,
            SCROLL_BLOT_MOUNT: `scroll-blot-mount`,
            SCROLL_BLOT_UNMOUNT: `scroll-blot-unmount`,
            SCROLL_OPTIMIZE: `scroll-optimize`,
            SCROLL_UPDATE: `scroll-update`,
            SCROLL_EMBED_UPDATE: `scroll-embed-update`,
            SELECTION_CHANGE: `selection-change`,
            TEXT_CHANGE: `text-change`,
            COMPOSITION_BEFORE_START: `composition-before-start`,
            COMPOSITION_START: `composition-start`,
            COMPOSITION_BEFORE_END: `composition-before-end`,
            COMPOSITION_END: `composition-end`,
        };
        static sources = { API: `api`, SILENT: `silent`, USER: `user` };
        constructor() {
            (super(), (this.domListeners = {}), this.on(`error`, vp.error));
        }
        emit() {
            var e = [...arguments];
            return (vp.log.call(vp, ...e), super.emit(...e));
        }
        handleDOM(e) {
            var t = [...arguments].slice(1);
            (this.domListeners[e.type] || []).forEach((n) => {
                let { node: r, handler: i } = n;
                (e.target === r || r.contains(e.target)) && i(e, ...t);
            });
        }
        listenDOM(e, t, n) {
            (this.domListeners[e] || (this.domListeners[e] = []),
                this.domListeners[e].push({ node: t, handler: n }));
        }
    },
    yp = _p(`quill:selection`),
    bp = class {
        constructor(e) {
            let t =
                arguments.length > 1 && arguments[1] !== void 0
                    ? arguments[1]
                    : 0;
            ((this.index = e), (this.length = t));
        }
    },
    xp = class {
        constructor(e, t) {
            ((this.emitter = t),
                (this.scroll = e),
                (this.composing = !1),
                (this.mouseDown = !1),
                (this.root = this.scroll.domNode),
                (this.cursor = this.scroll.create(`cursor`, this)),
                (this.savedRange = new bp(0, 0)),
                (this.lastRange = this.savedRange),
                (this.lastNative = null),
                this.handleComposition(),
                this.handleDragging(),
                this.emitter.listenDOM(`selectionchange`, document, () => {
                    !this.mouseDown &&
                        !this.composing &&
                        setTimeout(this.update.bind(this, Z.sources.USER), 1);
                }),
                this.emitter.on(Z.events.SCROLL_BEFORE_UPDATE, () => {
                    if (!this.hasFocus()) return;
                    let e = this.getNativeRange();
                    e != null &&
                        e.start.node !== this.cursor.textNode &&
                        this.emitter.once(Z.events.SCROLL_UPDATE, (t, n) => {
                            try {
                                this.root.contains(e.start.node) &&
                                    this.root.contains(e.end.node) &&
                                    this.setNativeRange(
                                        e.start.node,
                                        e.start.offset,
                                        e.end.node,
                                        e.end.offset,
                                    );
                                let r = n.some(
                                    (e) =>
                                        e.type === `characterData` ||
                                        e.type === `childList` ||
                                        (e.type === `attributes` &&
                                            e.target === this.root),
                                );
                                this.update(r ? Z.sources.SILENT : t);
                            } catch {}
                        });
                }),
                this.emitter.on(Z.events.SCROLL_OPTIMIZE, (e, t) => {
                    if (t.range) {
                        let {
                            startNode: e,
                            startOffset: n,
                            endNode: r,
                            endOffset: i,
                        } = t.range;
                        (this.setNativeRange(e, n, r, i),
                            this.update(Z.sources.SILENT));
                    }
                }),
                this.update(Z.sources.SILENT));
        }
        handleComposition() {
            (this.emitter.on(Z.events.COMPOSITION_BEFORE_START, () => {
                this.composing = !0;
            }),
                this.emitter.on(Z.events.COMPOSITION_END, () => {
                    if (((this.composing = !1), this.cursor.parent)) {
                        let e = this.cursor.restore();
                        if (!e) return;
                        setTimeout(() => {
                            this.setNativeRange(
                                e.startNode,
                                e.startOffset,
                                e.endNode,
                                e.endOffset,
                            );
                        }, 1);
                    }
                }));
        }
        handleDragging() {
            (this.emitter.listenDOM(`mousedown`, document.body, () => {
                this.mouseDown = !0;
            }),
                this.emitter.listenDOM(`mouseup`, document.body, () => {
                    ((this.mouseDown = !1), this.update(Z.sources.USER));
                }));
        }
        focus() {
            this.hasFocus() ||
                (this.root.focus({ preventScroll: !0 }),
                this.setRange(this.savedRange));
        }
        format(e, t) {
            this.scroll.update();
            let n = this.getNativeRange();
            if (
                !(
                    n == null ||
                    !n.native.collapsed ||
                    this.scroll.query(e, K.BLOCK)
                )
            ) {
                if (n.start.node !== this.cursor.textNode) {
                    let e = this.scroll.find(n.start.node, !1);
                    if (e == null) return;
                    if (e instanceof q) {
                        let t = e.split(n.start.offset);
                        e.parent.insertBefore(this.cursor, t);
                    } else e.insertBefore(this.cursor, n.start.node);
                    this.cursor.attach();
                }
                (this.cursor.format(e, t),
                    this.scroll.optimize(),
                    this.setNativeRange(
                        this.cursor.textNode,
                        this.cursor.textNode.data.length,
                    ),
                    this.update());
            }
        }
        getBounds(e) {
            let t =
                    arguments.length > 1 && arguments[1] !== void 0
                        ? arguments[1]
                        : 0,
                n = this.scroll.length();
            ((e = Math.min(e, n - 1)), (t = Math.min(e + t, n - 1) - e));
            let r,
                [i, a] = this.scroll.leaf(e);
            if (i == null) return null;
            if (t > 0 && a === i.length()) {
                let [t] = this.scroll.leaf(e + 1);
                if (t) {
                    let [n] = this.scroll.line(e),
                        [r] = this.scroll.line(e + 1);
                    n === r && ((i = t), (a = 0));
                }
            }
            [r, a] = i.position(a, !0);
            let o = document.createRange();
            if (t > 0)
                return (
                    o.setStart(r, a),
                    ([i, a] = this.scroll.leaf(e + t)),
                    i == null
                        ? null
                        : (([r, a] = i.position(a, !0)),
                          o.setEnd(r, a),
                          o.getBoundingClientRect())
                );
            let s = `left`,
                c;
            if (r instanceof Text) {
                if (!r.data.length) return null;
                (a < r.data.length
                    ? (o.setStart(r, a), o.setEnd(r, a + 1))
                    : (o.setStart(r, a - 1), o.setEnd(r, a), (s = `right`)),
                    (c = o.getBoundingClientRect()));
            } else {
                if (!(i.domNode instanceof Element)) return null;
                ((c = i.domNode.getBoundingClientRect()),
                    a > 0 && (s = `right`));
            }
            return {
                bottom: c.top + c.height,
                height: c.height,
                left: c[s],
                right: c[s],
                top: c.top,
                width: 0,
            };
        }
        getNativeRange() {
            let e = document.getSelection();
            if (e == null || e.rangeCount <= 0) return null;
            let t = e.getRangeAt(0);
            if (t == null) return null;
            let n = this.normalizeNative(t);
            return (yp.info(`getNativeRange`, n), n);
        }
        getRange() {
            let e = this.scroll.domNode;
            if (`isConnected` in e && !e.isConnected) return [null, null];
            let t = this.getNativeRange();
            return t == null ? [null, null] : [this.normalizedToRange(t), t];
        }
        hasFocus() {
            return (
                document.activeElement === this.root ||
                (document.activeElement != null &&
                    Sp(this.root, document.activeElement))
            );
        }
        normalizedToRange(e) {
            let t = [[e.start.node, e.start.offset]];
            e.native.collapsed || t.push([e.end.node, e.end.offset]);
            let n = t.map((e) => {
                    let [t, n] = e,
                        r = this.scroll.find(t, !0),
                        i = r.offset(this.scroll);
                    return n === 0
                        ? i
                        : r instanceof q
                          ? i + r.index(t, n)
                          : i + r.length();
                }),
                r = Math.min(Math.max(...n), this.scroll.length() - 1),
                i = Math.min(r, ...n);
            return new bp(i, r - i);
        }
        normalizeNative(e) {
            if (
                !Sp(this.root, e.startContainer) ||
                (!e.collapsed && !Sp(this.root, e.endContainer))
            )
                return null;
            let t = {
                start: { node: e.startContainer, offset: e.startOffset },
                end: { node: e.endContainer, offset: e.endOffset },
                native: e,
            };
            return (
                [t.start, t.end].forEach((e) => {
                    let { node: t, offset: n } = e;
                    for (; !(t instanceof Text) && t.childNodes.length > 0; )
                        if (t.childNodes.length > n)
                            ((t = t.childNodes[n]), (n = 0));
                        else if (t.childNodes.length === n)
                            ((t = t.lastChild),
                                (n =
                                    t instanceof Text
                                        ? t.data.length
                                        : t.childNodes.length > 0
                                          ? t.childNodes.length
                                          : t.childNodes.length + 1));
                        else break;
                    ((e.node = t), (e.offset = n));
                }),
                t
            );
        }
        rangeToNative(e) {
            let t = this.scroll.length(),
                n = (e, n) => {
                    e = Math.min(t - 1, e);
                    let [r, i] = this.scroll.leaf(e);
                    return r ? r.position(i, n) : [null, -1];
                };
            return [...n(e.index, !1), ...n(e.index + e.length, !0)];
        }
        setNativeRange(e, t) {
            let n =
                    arguments.length > 2 && arguments[2] !== void 0
                        ? arguments[2]
                        : e,
                r =
                    arguments.length > 3 && arguments[3] !== void 0
                        ? arguments[3]
                        : t,
                i =
                    arguments.length > 4 &&
                    arguments[4] !== void 0 &&
                    arguments[4];
            if (
                (yp.info(`setNativeRange`, e, t, n, r),
                e != null &&
                    (this.root.parentNode == null ||
                        e.parentNode == null ||
                        n.parentNode == null))
            )
                return;
            let a = document.getSelection();
            if (a != null)
                if (e != null) {
                    this.hasFocus() || this.root.focus({ preventScroll: !0 });
                    let { native: o } = this.getNativeRange() || {};
                    if (
                        o == null ||
                        i ||
                        e !== o.startContainer ||
                        t !== o.startOffset ||
                        n !== o.endContainer ||
                        r !== o.endOffset
                    ) {
                        (e instanceof Element &&
                            e.tagName === `BR` &&
                            ((t = Array.from(e.parentNode.childNodes).indexOf(
                                e,
                            )),
                            (e = e.parentNode)),
                            n instanceof Element &&
                                n.tagName === `BR` &&
                                ((r = Array.from(
                                    n.parentNode.childNodes,
                                ).indexOf(n)),
                                (n = n.parentNode)));
                        let i = document.createRange();
                        (i.setStart(e, t),
                            i.setEnd(n, r),
                            a.removeAllRanges(),
                            a.addRange(i));
                    }
                } else (a.removeAllRanges(), this.root.blur());
        }
        setRange(e) {
            let t =
                    arguments.length > 1 &&
                    arguments[1] !== void 0 &&
                    arguments[1],
                n =
                    arguments.length > 2 && arguments[2] !== void 0
                        ? arguments[2]
                        : Z.sources.API;
            if (
                (typeof t == `string` && ((n = t), (t = !1)),
                yp.info(`setRange`, e),
                e != null)
            ) {
                let n = this.rangeToNative(e);
                this.setNativeRange(...n, t);
            } else this.setNativeRange(null);
            this.update(n);
        }
        update() {
            let e =
                    arguments.length > 0 && arguments[0] !== void 0
                        ? arguments[0]
                        : Z.sources.USER,
                t = this.lastRange,
                [n, r] = this.getRange();
            if (
                ((this.lastRange = n),
                (this.lastNative = r),
                this.lastRange != null && (this.savedRange = this.lastRange),
                !vf(t, this.lastRange))
            ) {
                if (
                    !this.composing &&
                    r != null &&
                    r.native.collapsed &&
                    r.start.node !== this.cursor.textNode
                ) {
                    let e = this.cursor.restore();
                    e &&
                        this.setNativeRange(
                            e.startNode,
                            e.startOffset,
                            e.endNode,
                            e.endOffset,
                        );
                }
                let n = [
                    Z.events.SELECTION_CHANGE,
                    Td(this.lastRange),
                    Td(t),
                    e,
                ];
                (this.emitter.emit(Z.events.EDITOR_CHANGE, ...n),
                    e !== Z.sources.SILENT && this.emitter.emit(...n));
            }
        }
    };
function Sp(e, t) {
    try {
        t.parentNode;
    } catch {
        return !1;
    }
    return e.contains(t);
}
var Cp = /^[ -~]*$/,
    wp = class {
        constructor(e) {
            ((this.scroll = e), (this.delta = this.getDelta()));
        }
        applyDelta(e) {
            this.scroll.update();
            let t = this.scroll.length();
            this.scroll.batchStart();
            let n = kp(e),
                r = new Y.default();
            return (
                jp(n.ops.slice()).reduce((e, n) => {
                    let i = Y.Op.length(n),
                        a = n.attributes || {},
                        o = !1,
                        s = !1;
                    if (n.insert != null) {
                        if ((r.retain(i), typeof n.insert == `string`)) {
                            let r = n.insert;
                            ((s =
                                !r.endsWith(`
`) &&
                                (t <= e || !!this.scroll.descendant(cp, e)[0])),
                                this.scroll.insertAt(e, r));
                            let [i, o] = this.scroll.line(e),
                                c = yf({}, up(i));
                            if (i instanceof X) {
                                let [e] = i.descendant(q, o);
                                e && (c = yf(c, up(e)));
                            }
                            a = Y.AttributeMap.diff(c, a) || {};
                        } else if (typeof n.insert == `object`) {
                            let r = Object.keys(n.insert)[0];
                            if (r == null) return e;
                            let i = this.scroll.query(r, K.INLINE) != null;
                            if (i)
                                (t <= e || this.scroll.descendant(cp, e)[0]) &&
                                    (s = !0);
                            else if (e > 0) {
                                let [t, n] = this.scroll.descendant(q, e - 1);
                                t instanceof rp
                                    ? t.value()[n] !==
                                          `
` && (o = !0)
                                    : t instanceof J &&
                                      t.statics.scope === K.INLINE_BLOT &&
                                      (o = !0);
                            }
                            if ((this.scroll.insertAt(e, r, n.insert[r]), i)) {
                                let [t] = this.scroll.descendant(q, e);
                                if (t) {
                                    let e = yf({}, up(t));
                                    a = Y.AttributeMap.diff(e, a) || {};
                                }
                            }
                        }
                        t += i;
                    } else if (
                        (r.push(n),
                        n.retain !== null && typeof n.retain == `object`)
                    ) {
                        let t = Object.keys(n.retain)[0];
                        if (t == null) return e;
                        this.scroll.updateEmbedAt(e, t, n.retain[t]);
                    }
                    Object.keys(a).forEach((t) => {
                        this.scroll.formatAt(e, i, t, a[t]);
                    });
                    let c = +!!o,
                        l = +!!s;
                    return (
                        (t += c + l),
                        r.retain(c),
                        r.delete(l),
                        e + i + c + l
                    );
                }, 0),
                r.reduce(
                    (e, t) =>
                        typeof t.delete == `number`
                            ? (this.scroll.deleteAt(e, t.delete), e)
                            : e + Y.Op.length(t),
                    0,
                ),
                this.scroll.batchEnd(),
                this.scroll.optimize(),
                this.update(n)
            );
        }
        deleteText(e, t) {
            return (
                this.scroll.deleteAt(e, t),
                this.update(new Y.default().retain(e).delete(t))
            );
        }
        formatLine(e, t) {
            let n =
                arguments.length > 2 && arguments[2] !== void 0
                    ? arguments[2]
                    : {};
            (this.scroll.update(),
                Object.keys(n).forEach((r) => {
                    this.scroll.lines(e, Math.max(t, 1)).forEach((e) => {
                        e.format(r, n[r]);
                    });
                }),
                this.scroll.optimize());
            let r = new Y.default().retain(e).retain(t, Td(n));
            return this.update(r);
        }
        formatText(e, t) {
            let n =
                arguments.length > 2 && arguments[2] !== void 0
                    ? arguments[2]
                    : {};
            Object.keys(n).forEach((r) => {
                this.scroll.formatAt(e, t, r, n[r]);
            });
            let r = new Y.default().retain(e).retain(t, Td(n));
            return this.update(r);
        }
        getContents(e, t) {
            return this.delta.slice(e, e + t);
        }
        getDelta() {
            return this.scroll
                .lines()
                .reduce((e, t) => e.concat(t.delta()), new Y.default());
        }
        getFormat(e) {
            let t =
                    arguments.length > 1 && arguments[1] !== void 0
                        ? arguments[1]
                        : 0,
                n = [],
                r = [];
            t === 0
                ? this.scroll.path(e).forEach((e) => {
                      let [t] = e;
                      t instanceof X ? n.push(t) : t instanceof q && r.push(t);
                  })
                : ((n = this.scroll.lines(e, t)),
                  (r = this.scroll.descendants(q, e, t)));
            let [i, a] = [n, r].map((e) => {
                let t = e.shift();
                if (t == null) return {};
                let n = up(t);
                for (; Object.keys(n).length > 0; ) {
                    let t = e.shift();
                    if (t == null) return n;
                    n = Dp(up(t), n);
                }
                return n;
            });
            return { ...i, ...a };
        }
        getHTML(e, t) {
            let [n, r] = this.scroll.line(e);
            if (n) {
                let i = n.length();
                return n.length() >= r + t && !(r === 0 && t === i)
                    ? Ep(n, r, t, !0)
                    : Ep(this.scroll, e, t, !0);
            }
            return ``;
        }
        getText(e, t) {
            return this.getContents(e, t)
                .filter((e) => typeof e.insert == `string`)
                .map((e) => e.insert)
                .join(``);
        }
        insertContents(e, t) {
            let n = kp(t),
                r = new Y.default().retain(e).concat(n);
            return (this.scroll.insertContents(e, n), this.update(r));
        }
        insertEmbed(e, t, n) {
            return (
                this.scroll.insertAt(e, t, n),
                this.update(new Y.default().retain(e).insert({ [t]: n }))
            );
        }
        insertText(e, t) {
            let n =
                arguments.length > 2 && arguments[2] !== void 0
                    ? arguments[2]
                    : {};
            return (
                (t = t
                    .replace(
                        /\r\n/g,
                        `
`,
                    )
                    .replace(
                        /\r/g,
                        `
`,
                    )),
                this.scroll.insertAt(e, t),
                Object.keys(n).forEach((r) => {
                    this.scroll.formatAt(e, t.length, r, n[r]);
                }),
                this.update(new Y.default().retain(e).insert(t, Td(n)))
            );
        }
        isBlank() {
            if (this.scroll.children.length === 0) return !0;
            if (this.scroll.children.length > 1) return !1;
            let e = this.scroll.children.head;
            if (e?.statics.blotName !== X.blotName) return !1;
            let t = e;
            return t.children.length > 1 ? !1 : t.children.head instanceof np;
        }
        removeFormat(e, t) {
            let n = this.getText(e, t),
                [r, i] = this.scroll.line(e + t),
                a = 0,
                o = new Y.default();
            r != null &&
                ((a = r.length() - i),
                (o = r.delta().slice(i, i + a - 1).insert(`
`)));
            let s = this.getContents(e, t + a).diff(
                    new Y.default().insert(n).concat(o),
                ),
                c = new Y.default().retain(e).concat(s);
            return this.applyDelta(c);
        }
        update(e) {
            let t =
                    arguments.length > 1 && arguments[1] !== void 0
                        ? arguments[1]
                        : [],
                n =
                    arguments.length > 2 && arguments[2] !== void 0
                        ? arguments[2]
                        : void 0,
                r = this.delta;
            if (
                t.length === 1 &&
                t[0].type === `characterData` &&
                t[0].target.data.match(Cp) &&
                this.scroll.find(t[0].target)
            ) {
                let i = this.scroll.find(t[0].target),
                    a = up(i),
                    o = i.offset(this.scroll),
                    s = t[0].oldValue.replace(dp.CONTENTS, ``),
                    c = new Y.default().insert(s),
                    l = new Y.default().insert(i.value()),
                    u = n && {
                        oldRange: Ap(n.oldRange, -o),
                        newRange: Ap(n.newRange, -o),
                    };
                ((e = new Y.default()
                    .retain(o)
                    .concat(c.diff(l, u))
                    .reduce(
                        (e, t) =>
                            t.insert ? e.insert(t.insert, a) : e.push(t),
                        new Y.default(),
                    )),
                    (this.delta = r.compose(e)));
            } else
                ((this.delta = this.getDelta()),
                    (!e || !vf(r.compose(e), this.delta)) &&
                        (e = r.diff(this.delta, n)));
            return e;
        }
    };
function Tp(e, t, n) {
    if (e.length === 0) {
        let [e] = Op(n.pop());
        return t <= 0 ? `</li></${e}>` : `</li></${e}>${Tp([], t - 1, n)}`;
    }
    let [{ child: r, offset: i, length: a, indent: o, type: s }, ...c] = e,
        [l, u] = Op(s);
    if (o > t)
        return (
            n.push(s),
            o === t + 1
                ? `<${l}><li${u}>${Ep(r, i, a)}${Tp(c, o, n)}`
                : `<${l}><li>${Tp(e, t + 1, n)}`
        );
    let d = n[n.length - 1];
    if (o === t && s === d) return `</li><li${u}>${Ep(r, i, a)}${Tp(c, o, n)}`;
    let [f] = Op(n.pop());
    return `</li></${f}>${Tp(e, t - 1, n)}`;
}
function Ep(e, t, n) {
    let r = arguments.length > 3 && arguments[3] !== void 0 && arguments[3];
    if (`html` in e && typeof e.html == `function`) return e.html(t, n);
    if (e instanceof rp)
        return ap(e.value().slice(t, t + n)).replaceAll(` `, `&nbsp;`);
    if (e instanceof If) {
        if (e.statics.blotName === `list-container`) {
            let r = [];
            return (
                e.children.forEachAt(t, n, (e, t, n) => {
                    let i =
                        `formats` in e && typeof e.formats == `function`
                            ? e.formats()
                            : {};
                    r.push({
                        child: e,
                        offset: t,
                        length: n,
                        indent: i.indent || 0,
                        type: i.list,
                    });
                }),
                Tp(r, -1, [])
            );
        }
        let i = [];
        if (
            (e.children.forEachAt(t, n, (e, t, n) => {
                i.push(Ep(e, t, n));
            }),
            r || e.statics.blotName === `list`)
        )
            return i.join(``);
        let { outerHTML: a, innerHTML: o } = e.domNode,
            [s, c] = a.split(`>${o}<`);
        return s === `<table`
            ? `<table style="border: 1px solid #000;">${i.join(``)}<${c}`
            : `${s}>${i.join(``)}<${c}`;
    }
    return e.domNode instanceof Element ? e.domNode.outerHTML : ``;
}
function Dp(e, t) {
    return Object.keys(t).reduce((n, r) => {
        if (e[r] == null) return n;
        let i = t[r];
        return (
            i === e[r]
                ? (n[r] = i)
                : Array.isArray(i)
                  ? i.indexOf(e[r]) < 0
                      ? (n[r] = i.concat([e[r]]))
                      : (n[r] = i)
                  : (n[r] = [i, e[r]]),
            n
        );
    }, {});
}
function Op(e) {
    let t = e === `ordered` ? `ol` : `ul`;
    switch (e) {
        case `checked`:
            return [t, ` data-list="checked"`];
        case `unchecked`:
            return [t, ` data-list="unchecked"`];
        default:
            return [t, ``];
    }
}
function kp(e) {
    return e.reduce((e, t) => {
        if (typeof t.insert == `string`) {
            let n = t.insert
                .replace(
                    /\r\n/g,
                    `
`,
                )
                .replace(
                    /\r/g,
                    `
`,
                );
            return e.insert(n, t.attributes);
        }
        return e.push(t);
    }, new Y.default());
}
function Ap(e, t) {
    let { index: n, length: r } = e;
    return new bp(n + t, r);
}
function jp(e) {
    let t = [];
    return (
        e.forEach((e) => {
            typeof e.insert == `string`
                ? e.insert
                      .split(
                          `
`,
                      )
                      .forEach((n, r) => {
                          (r &&
                              t.push({
                                  insert: `
`,
                                  attributes: e.attributes,
                              }),
                              n &&
                                  t.push({
                                      insert: n,
                                      attributes: e.attributes,
                                  }));
                      })
                : t.push(e);
        }),
        t
    );
}
var Mp = class {
        static DEFAULTS = {};
        constructor(e) {
            let t =
                arguments.length > 1 && arguments[1] !== void 0
                    ? arguments[1]
                    : {};
            ((this.quill = e), (this.options = t));
        }
    },
    Np = `﻿`,
    Pp = class extends J {
        constructor(e, t) {
            (super(e, t),
                (this.contentNode = document.createElement(`span`)),
                this.contentNode.setAttribute(`contenteditable`, `false`),
                Array.from(this.domNode.childNodes).forEach((e) => {
                    this.contentNode.appendChild(e);
                }),
                (this.leftGuard = document.createTextNode(Np)),
                (this.rightGuard = document.createTextNode(Np)),
                this.domNode.appendChild(this.leftGuard),
                this.domNode.appendChild(this.contentNode),
                this.domNode.appendChild(this.rightGuard));
        }
        index(e, t) {
            return e === this.leftGuard
                ? 0
                : e === this.rightGuard
                  ? 1
                  : super.index(e, t);
        }
        restore(e) {
            let t = null,
                n,
                r = e.data.split(Np).join(``);
            if (e === this.leftGuard)
                if (this.prev instanceof rp) {
                    let e = this.prev.length();
                    (this.prev.insertAt(e, r),
                        (t = {
                            startNode: this.prev.domNode,
                            startOffset: e + r.length,
                        }));
                } else
                    ((n = document.createTextNode(r)),
                        this.parent.insertBefore(this.scroll.create(n), this),
                        (t = { startNode: n, startOffset: r.length }));
            else
                e === this.rightGuard &&
                    (this.next instanceof rp
                        ? (this.next.insertAt(0, r),
                          (t = {
                              startNode: this.next.domNode,
                              startOffset: r.length,
                          }))
                        : ((n = document.createTextNode(r)),
                          this.parent.insertBefore(
                              this.scroll.create(n),
                              this.next,
                          ),
                          (t = { startNode: n, startOffset: r.length })));
            return ((e.data = Np), t);
        }
        update(e, t) {
            e.forEach((e) => {
                if (
                    e.type === `characterData` &&
                    (e.target === this.leftGuard ||
                        e.target === this.rightGuard)
                ) {
                    let n = this.restore(e.target);
                    n && (t.range = n);
                }
            });
        }
    },
    Fp = class {
        isComposing = !1;
        constructor(e, t) {
            ((this.scroll = e), (this.emitter = t), this.setupListeners());
        }
        setupListeners() {
            (this.scroll.domNode.addEventListener(`compositionstart`, (e) => {
                this.isComposing || this.handleCompositionStart(e);
            }),
                this.scroll.domNode.addEventListener(`compositionend`, (e) => {
                    this.isComposing &&
                        queueMicrotask(() => {
                            this.handleCompositionEnd(e);
                        });
                }));
        }
        handleCompositionStart(e) {
            let t =
                e.target instanceof Node
                    ? this.scroll.find(e.target, !0)
                    : null;
            t &&
                !(t instanceof Pp) &&
                (this.emitter.emit(Z.events.COMPOSITION_BEFORE_START, e),
                this.scroll.batchStart(),
                this.emitter.emit(Z.events.COMPOSITION_START, e),
                (this.isComposing = !0));
        }
        handleCompositionEnd(e) {
            (this.emitter.emit(Z.events.COMPOSITION_BEFORE_END, e),
                this.scroll.batchEnd(),
                this.emitter.emit(Z.events.COMPOSITION_END, e),
                (this.isComposing = !1));
        }
    },
    Ip = class e {
        static DEFAULTS = { modules: {} };
        static themes = { default: e };
        modules = {};
        constructor(e, t) {
            ((this.quill = e), (this.options = t));
        }
        init() {
            Object.keys(this.options.modules).forEach((e) => {
                this.modules[e] ?? this.addModule(e);
            });
        }
        addModule(e) {
            let t = this.quill.constructor.import(`modules/${e}`);
            return (
                (this.modules[e] = new t(
                    this.quill,
                    this.options.modules[e] || {},
                )),
                this.modules[e]
            );
        }
    },
    Lp = (e) => e.parentElement || e.getRootNode().host || null,
    Rp = (e) => {
        let t = e.getBoundingClientRect(),
            n = (`offsetWidth` in e && Math.abs(t.width) / e.offsetWidth) || 1,
            r =
                (`offsetHeight` in e && Math.abs(t.height) / e.offsetHeight) ||
                1;
        return {
            top: t.top,
            right: t.left + e.clientWidth * n,
            bottom: t.top + e.clientHeight * r,
            left: t.left,
        };
    },
    zp = (e) => {
        let t = parseInt(e, 10);
        return Number.isNaN(t) ? 0 : t;
    },
    Bp = (e, t, n, r, i, a) =>
        e < n && t > r
            ? 0
            : e < n
              ? -(n - e + i)
              : t > r
                ? t - e > r - n
                    ? e + i - n
                    : t - r + a
                : 0,
    Vp = (e, t) => {
        let n = e.ownerDocument,
            r = t,
            i = e;
        for (; i; ) {
            let e = i === n.body,
                t = e
                    ? {
                          top: 0,
                          right:
                              window.visualViewport?.width ??
                              n.documentElement.clientWidth,
                          bottom:
                              window.visualViewport?.height ??
                              n.documentElement.clientHeight,
                          left: 0,
                      }
                    : Rp(i),
                a = getComputedStyle(i),
                o = Bp(
                    r.left,
                    r.right,
                    t.left,
                    t.right,
                    zp(a.scrollPaddingLeft),
                    zp(a.scrollPaddingRight),
                ),
                s = Bp(
                    r.top,
                    r.bottom,
                    t.top,
                    t.bottom,
                    zp(a.scrollPaddingTop),
                    zp(a.scrollPaddingBottom),
                );
            if (o || s)
                if (e) n.defaultView?.scrollBy(o, s);
                else {
                    let { scrollLeft: e, scrollTop: t } = i;
                    (s && (i.scrollTop += s), o && (i.scrollLeft += o));
                    let n = i.scrollLeft - e,
                        a = i.scrollTop - t;
                    r = {
                        left: r.left - n,
                        top: r.top - a,
                        right: r.right - n,
                        bottom: r.bottom - a,
                    };
                }
            i = e || a.position === `fixed` ? null : Lp(i);
        }
    },
    Hp = 100,
    Up = [`block`, `break`, `cursor`, `inline`, `scroll`, `text`],
    Wp = (e, t, n) => {
        let r = new wf();
        return (
            Up.forEach((e) => {
                let n = t.query(e);
                n && r.register(n);
            }),
            e.forEach((e) => {
                let i = t.query(e);
                i ||
                    n.error(
                        `Cannot register "${e}" specified in "formats" config. Are you sure it was registered?`,
                    );
                let a = 0;
                for (; i; )
                    if (
                        (r.register(i),
                        (i =
                            `blotName` in i
                                ? (i.requiredContainer ?? null)
                                : null),
                        (a += 1),
                        a > Hp)
                    ) {
                        n.error(
                            `Cycle detected in registering blot requiredContainer: "${e}"`,
                        );
                        break;
                    }
            }),
            r
        );
    },
    Gp = _p(`quill`),
    Kp = new wf();
If.uiClass = `ql-ui`;
var Q = class e {
    static DEFAULTS = {
        bounds: null,
        modules: { clipboard: !0, keyboard: !0, history: !0, uploader: !0 },
        placeholder: ``,
        readOnly: !1,
        registry: Kp,
        theme: `default`,
    };
    static events = Z.events;
    static sources = Z.sources;
    static version = `2.0.3`;
    static imports = {
        delta: Y.default,
        parchment: bf,
        "core/module": Mp,
        "core/theme": Ip,
    };
    static debug(e) {
        (e === !0 && (e = `log`), _p.level(e));
    }
    static find(e) {
        let t = arguments.length > 1 && arguments[1] !== void 0 && arguments[1];
        return pp.get(e) || Kp.find(e, t);
    }
    static import(e) {
        return (
            this.imports[e] ??
                Gp.error(`Cannot import ${e}. Are you sure it was registered?`),
            this.imports[e]
        );
    }
    static register() {
        if (
            typeof (arguments.length <= 0 ? void 0 : arguments[0]) != `string`
        ) {
            let e = arguments.length <= 0 ? void 0 : arguments[0],
                t = !!(!(arguments.length <= 1) && arguments[1]),
                n = `attrName` in e ? e.attrName : e.blotName;
            typeof n == `string`
                ? this.register(`formats/${n}`, e, t)
                : Object.keys(e).forEach((n) => {
                      this.register(n, e[n], t);
                  });
        } else {
            let e = arguments.length <= 0 ? void 0 : arguments[0],
                t = arguments.length <= 1 ? void 0 : arguments[1],
                n = !!(!(arguments.length <= 2) && arguments[2]);
            (this.imports[e] != null &&
                !n &&
                Gp.warn(`Overwriting ${e} with`, t),
                (this.imports[e] = t),
                (e.startsWith(`blots/`) || e.startsWith(`formats/`)) &&
                    t &&
                    typeof t != `boolean` &&
                    t.blotName !== `abstract` &&
                    Kp.register(t),
                typeof t.register == `function` && t.register(Kp));
        }
    }
    constructor(t) {
        let n =
            arguments.length > 1 && arguments[1] !== void 0 ? arguments[1] : {};
        if (
            ((this.options = Xp(t, n)),
            (this.container = this.options.container),
            this.container == null)
        ) {
            Gp.error(`Invalid Quill container`, t);
            return;
        }
        this.options.debug && e.debug(this.options.debug);
        let r = this.container.innerHTML.trim();
        (this.container.classList.add(`ql-container`),
            (this.container.innerHTML = ``),
            pp.set(this.container, this),
            (this.root = this.addContainer(`ql-editor`)),
            this.root.classList.add(`ql-blank`),
            (this.emitter = new Z()));
        let i = qf.blotName,
            a = this.options.registry.query(i);
        if (!a || !(`blotName` in a))
            throw Error(`Cannot initialize Quill without "${i}" blot`);
        if (
            ((this.scroll = new a(this.options.registry, this.root, {
                emitter: this.emitter,
            })),
            (this.editor = new wp(this.scroll)),
            (this.selection = new xp(this.scroll, this.emitter)),
            (this.composition = new Fp(this.scroll, this.emitter)),
            (this.theme = new this.options.theme(this, this.options)),
            (this.keyboard = this.theme.addModule(`keyboard`)),
            (this.clipboard = this.theme.addModule(`clipboard`)),
            (this.history = this.theme.addModule(`history`)),
            (this.uploader = this.theme.addModule(`uploader`)),
            this.theme.addModule(`input`),
            this.theme.addModule(`uiNode`),
            this.theme.init(),
            this.emitter.on(Z.events.EDITOR_CHANGE, (e) => {
                e === Z.events.TEXT_CHANGE &&
                    this.root.classList.toggle(
                        `ql-blank`,
                        this.editor.isBlank(),
                    );
            }),
            this.emitter.on(Z.events.SCROLL_UPDATE, (e, t) => {
                let n = this.selection.lastRange,
                    [r] = this.selection.getRange(),
                    i = n && r ? { oldRange: n, newRange: r } : void 0;
                Zp.call(this, () => this.editor.update(null, t, i), e);
            }),
            this.emitter.on(Z.events.SCROLL_EMBED_UPDATE, (t, n) => {
                let r = this.selection.lastRange,
                    [i] = this.selection.getRange(),
                    a = r && i ? { oldRange: r, newRange: i } : void 0;
                Zp.call(
                    this,
                    () => {
                        let e = new Y.default()
                            .retain(t.offset(this))
                            .retain({ [t.statics.blotName]: n });
                        return this.editor.update(e, [], a);
                    },
                    e.sources.USER,
                );
            }),
            r)
        ) {
            let e = this.clipboard.convert({
                html: `${r}<p><br></p>`,
                text: `
`,
            });
            this.setContents(e);
        }
        (this.history.clear(),
            this.options.placeholder &&
                this.root.setAttribute(
                    `data-placeholder`,
                    this.options.placeholder,
                ),
            this.options.readOnly && this.disable(),
            (this.allowReadOnlyEdits = !1));
    }
    addContainer(e) {
        let t =
            arguments.length > 1 && arguments[1] !== void 0
                ? arguments[1]
                : null;
        if (typeof e == `string`) {
            let t = e;
            ((e = document.createElement(`div`)), e.classList.add(t));
        }
        return (this.container.insertBefore(e, t), e);
    }
    blur() {
        this.selection.setRange(null);
    }
    deleteText(e, t, n) {
        return (
            ([e, t, , n] = Qp(e, t, n)),
            Zp.call(this, () => this.editor.deleteText(e, t), n, e, -1 * t)
        );
    }
    disable() {
        this.enable(!1);
    }
    editReadOnly(e) {
        this.allowReadOnlyEdits = !0;
        let t = e();
        return ((this.allowReadOnlyEdits = !1), t);
    }
    enable() {
        let e =
            arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : !0;
        (this.scroll.enable(e),
            this.container.classList.toggle(`ql-disabled`, !e));
    }
    focus() {
        let e =
            arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : {};
        (this.selection.focus(),
            e.preventScroll || this.scrollSelectionIntoView());
    }
    format(e, t) {
        let n =
            arguments.length > 2 && arguments[2] !== void 0
                ? arguments[2]
                : Z.sources.API;
        return Zp.call(
            this,
            () => {
                let n = this.getSelection(!0),
                    r = new Y.default();
                if (n == null) return r;
                if (this.scroll.query(e, K.BLOCK))
                    r = this.editor.formatLine(n.index, n.length, { [e]: t });
                else if (n.length === 0)
                    return (this.selection.format(e, t), r);
                else r = this.editor.formatText(n.index, n.length, { [e]: t });
                return (this.setSelection(n, Z.sources.SILENT), r);
            },
            n,
        );
    }
    formatLine(e, t, n, r, i) {
        let a;
        return (
            ([e, t, a, i] = Qp(e, t, n, r, i)),
            Zp.call(this, () => this.editor.formatLine(e, t, a), i, e, 0)
        );
    }
    formatText(e, t, n, r, i) {
        let a;
        return (
            ([e, t, a, i] = Qp(e, t, n, r, i)),
            Zp.call(this, () => this.editor.formatText(e, t, a), i, e, 0)
        );
    }
    getBounds(e) {
        let t =
                arguments.length > 1 && arguments[1] !== void 0
                    ? arguments[1]
                    : 0,
            n = null;
        if (
            ((n =
                typeof e == `number`
                    ? this.selection.getBounds(e, t)
                    : this.selection.getBounds(e.index, e.length)),
            !n)
        )
            return null;
        let r = this.container.getBoundingClientRect();
        return {
            bottom: n.bottom - r.top,
            height: n.height,
            left: n.left - r.left,
            right: n.right - r.left,
            top: n.top - r.top,
            width: n.width,
        };
    }
    getContents() {
        let e =
                arguments.length > 0 && arguments[0] !== void 0
                    ? arguments[0]
                    : 0,
            t =
                arguments.length > 1 && arguments[1] !== void 0
                    ? arguments[1]
                    : this.getLength() - e;
        return (([e, t] = Qp(e, t)), this.editor.getContents(e, t));
    }
    getFormat() {
        let e =
                arguments.length > 0 && arguments[0] !== void 0
                    ? arguments[0]
                    : this.getSelection(!0),
            t =
                arguments.length > 1 && arguments[1] !== void 0
                    ? arguments[1]
                    : 0;
        return typeof e == `number`
            ? this.editor.getFormat(e, t)
            : this.editor.getFormat(e.index, e.length);
    }
    getIndex(e) {
        return e.offset(this.scroll);
    }
    getLength() {
        return this.scroll.length();
    }
    getLeaf(e) {
        return this.scroll.leaf(e);
    }
    getLine(e) {
        return this.scroll.line(e);
    }
    getLines() {
        let e =
                arguments.length > 0 && arguments[0] !== void 0
                    ? arguments[0]
                    : 0,
            t =
                arguments.length > 1 && arguments[1] !== void 0
                    ? arguments[1]
                    : Number.MAX_VALUE;
        return typeof e == `number`
            ? this.scroll.lines(e, t)
            : this.scroll.lines(e.index, e.length);
    }
    getModule(e) {
        return this.theme.modules[e];
    }
    getSelection() {
        return (
            arguments.length > 0 &&
                arguments[0] !== void 0 &&
                arguments[0] &&
                this.focus(),
            this.update(),
            this.selection.getRange()[0]
        );
    }
    getSemanticHTML() {
        let e =
                arguments.length > 0 && arguments[0] !== void 0
                    ? arguments[0]
                    : 0,
            t = arguments.length > 1 ? arguments[1] : void 0;
        return (
            typeof e == `number` && (t ??= this.getLength() - e),
            ([e, t] = Qp(e, t)),
            this.editor.getHTML(e, t)
        );
    }
    getText() {
        let e =
                arguments.length > 0 && arguments[0] !== void 0
                    ? arguments[0]
                    : 0,
            t = arguments.length > 1 ? arguments[1] : void 0;
        return (
            typeof e == `number` && (t ??= this.getLength() - e),
            ([e, t] = Qp(e, t)),
            this.editor.getText(e, t)
        );
    }
    hasFocus() {
        return this.selection.hasFocus();
    }
    insertEmbed(t, n, r) {
        let i =
            arguments.length > 3 && arguments[3] !== void 0
                ? arguments[3]
                : e.sources.API;
        return Zp.call(this, () => this.editor.insertEmbed(t, n, r), i, t);
    }
    insertText(e, t, n, r, i) {
        let a;
        return (
            ([e, , a, i] = Qp(e, 0, n, r, i)),
            Zp.call(this, () => this.editor.insertText(e, t, a), i, e, t.length)
        );
    }
    isEnabled() {
        return this.scroll.isEnabled();
    }
    off() {
        return this.emitter.off(...arguments);
    }
    on() {
        return this.emitter.on(...arguments);
    }
    once() {
        return this.emitter.once(...arguments);
    }
    removeFormat(e, t, n) {
        return (
            ([e, t, , n] = Qp(e, t, n)),
            Zp.call(this, () => this.editor.removeFormat(e, t), n, e)
        );
    }
    scrollRectIntoView(e) {
        Vp(this.root, e);
    }
    scrollIntoView() {
        (console.warn(
            `Quill#scrollIntoView() has been deprecated and will be removed in the near future. Please use Quill#scrollSelectionIntoView() instead.`,
        ),
            this.scrollSelectionIntoView());
    }
    scrollSelectionIntoView() {
        let e = this.selection.lastRange,
            t = e && this.selection.getBounds(e.index, e.length);
        t && this.scrollRectIntoView(t);
    }
    setContents(e) {
        let t =
            arguments.length > 1 && arguments[1] !== void 0
                ? arguments[1]
                : Z.sources.API;
        return Zp.call(
            this,
            () => {
                e = new Y.default(e);
                let t = this.getLength(),
                    n = this.editor.deleteText(0, t),
                    r = this.editor.insertContents(0, e),
                    i = this.editor.deleteText(this.getLength() - 1, 1);
                return n.compose(r).compose(i);
            },
            t,
        );
    }
    setSelection(t, n, r) {
        t == null
            ? this.selection.setRange(null, n || e.sources.API)
            : (([t, n, , r] = Qp(t, n, r)),
              this.selection.setRange(new bp(Math.max(0, t), n), r),
              r !== Z.sources.SILENT && this.scrollSelectionIntoView());
    }
    setText(e) {
        let t =
                arguments.length > 1 && arguments[1] !== void 0
                    ? arguments[1]
                    : Z.sources.API,
            n = new Y.default().insert(e);
        return this.setContents(n, t);
    }
    update() {
        let e =
                arguments.length > 0 && arguments[0] !== void 0
                    ? arguments[0]
                    : Z.sources.USER,
            t = this.scroll.update(e);
        return (this.selection.update(e), t);
    }
    updateContents(e) {
        let t =
            arguments.length > 1 && arguments[1] !== void 0
                ? arguments[1]
                : Z.sources.API;
        return Zp.call(
            this,
            () => ((e = new Y.default(e)), this.editor.applyDelta(e)),
            t,
            !0,
        );
    }
};
function qp(e) {
    return typeof e == `string` ? document.querySelector(e) : e;
}
function Jp(e) {
    return Object.entries(e ?? {}).reduce((e, t) => {
        let [n, r] = t;
        return { ...e, [n]: r === !0 ? {} : r };
    }, {});
}
function Yp(e) {
    return Object.fromEntries(Object.entries(e).filter((e) => e[1] !== void 0));
}
function Xp(e, t) {
    let n = qp(e);
    if (!n) throw Error(`Invalid Quill container`);
    let r =
        !t.theme || t.theme === Q.DEFAULTS.theme
            ? Ip
            : Q.import(`themes/${t.theme}`);
    if (!r) throw Error(`Invalid theme ${t.theme}. Did you register it?`);
    let { modules: i, ...a } = Q.DEFAULTS,
        { modules: o, ...s } = r.DEFAULTS,
        c = Jp(t.modules);
    c != null &&
        c.toolbar &&
        c.toolbar.constructor !== Object &&
        (c = { ...c, toolbar: { container: c.toolbar } });
    let l = yf({}, Jp(i), Jp(o), c),
        u = { ...a, ...Yp(s), ...Yp(t) },
        d = t.registry;
    return (
        d
            ? t.formats &&
              Gp.warn(
                  `Ignoring "formats" option because "registry" is specified`,
              )
            : (d = t.formats ? Wp(t.formats, u.registry, Gp) : u.registry),
        {
            ...u,
            registry: d,
            container: n,
            theme: r,
            modules: Object.entries(l).reduce((e, t) => {
                let [n, r] = t;
                if (!r) return e;
                let i = Q.import(`modules/${n}`);
                return i == null
                    ? (Gp.error(
                          `Cannot load ${n} module. Are you sure you registered it?`,
                      ),
                      e)
                    : { ...e, [n]: yf({}, i.DEFAULTS || {}, r) };
            }, {}),
            bounds: qp(u.bounds),
        }
    );
}
function Zp(e, t, n, r) {
    if (!this.isEnabled() && t === Z.sources.USER && !this.allowReadOnlyEdits)
        return new Y.default();
    let i = n == null ? null : this.getSelection(),
        a = this.editor.delta,
        o = e();
    if (
        (i != null &&
            (n === !0 && (n = i.index),
            r == null ? (i = $p(i, o, t)) : r !== 0 && (i = $p(i, n, r, t)),
            this.setSelection(i, Z.sources.SILENT)),
        o.length() > 0)
    ) {
        let e = [Z.events.TEXT_CHANGE, o, a, t];
        (this.emitter.emit(Z.events.EDITOR_CHANGE, ...e),
            t !== Z.sources.SILENT && this.emitter.emit(...e));
    }
    return o;
}
function Qp(e, t, n, r, i) {
    let a = {};
    return (
        typeof e.index == `number` && typeof e.length == `number`
            ? typeof t == `number`
                ? ((t = e.length), (e = e.index))
                : ((i = r), (r = n), (n = t), (t = e.length), (e = e.index))
            : typeof t != `number` && ((i = r), (r = n), (n = t), (t = 0)),
        typeof n == `object`
            ? ((a = n), (i = r))
            : typeof n == `string` && (r == null ? (i = n) : (a[n] = r)),
        (i ||= Z.sources.API),
        [e, t, a, i]
    );
}
function $p(e, t, n, r) {
    let i = typeof n == `number` ? n : 0;
    if (e == null) return null;
    let a, o;
    return (
        t && typeof t.transformPosition == `function`
            ? ([a, o] = [e.index, e.index + e.length].map((e) =>
                  t.transformPosition(e, r !== Z.sources.USER),
              ))
            : ([a, o] = [e.index, e.index + e.length].map((e) =>
                  e < t || (e === t && r === Z.sources.USER)
                      ? e
                      : i >= 0
                        ? e + i
                        : Math.max(t, e + i),
              )),
        new bp(a, o - a)
    );
}
var em = class extends Uf {};
function tm(e) {
    return e instanceof X || e instanceof cp;
}
function nm(e) {
    return typeof e.updateContent == `function`;
}
var rm = class extends qf {
    static blotName = `scroll`;
    static className = `ql-editor`;
    static tagName = `DIV`;
    static defaultChild = X;
    static allowedChildren = [X, cp, em];
    constructor(e, t, n) {
        let { emitter: r } = n;
        (super(e, t),
            (this.emitter = r),
            (this.batch = !1),
            this.optimize(),
            this.enable(),
            this.domNode.addEventListener(`dragstart`, (e) =>
                this.handleDragStart(e),
            ));
    }
    batchStart() {
        Array.isArray(this.batch) || (this.batch = []);
    }
    batchEnd() {
        if (!this.batch) return;
        let e = this.batch;
        ((this.batch = !1), this.update(e));
    }
    emitMount(e) {
        this.emitter.emit(Z.events.SCROLL_BLOT_MOUNT, e);
    }
    emitUnmount(e) {
        this.emitter.emit(Z.events.SCROLL_BLOT_UNMOUNT, e);
    }
    emitEmbedUpdate(e, t) {
        this.emitter.emit(Z.events.SCROLL_EMBED_UPDATE, e, t);
    }
    deleteAt(e, t) {
        let [n, r] = this.line(e),
            [i] = this.line(e + t);
        if ((super.deleteAt(e, t), i != null && n !== i && r > 0)) {
            if (n instanceof cp || i instanceof cp) {
                this.optimize();
                return;
            }
            let e = i.children.head instanceof np ? null : i.children.head;
            (n.moveChildren(i, e), n.remove());
        }
        this.optimize();
    }
    enable() {
        let e =
            arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : !0;
        this.domNode.setAttribute(`contenteditable`, e ? `true` : `false`);
    }
    formatAt(e, t, n, r) {
        (super.formatAt(e, t, n, r), this.optimize());
    }
    insertAt(e, t, n) {
        if (e >= this.length())
            if (n == null || this.scroll.query(t, K.BLOCK) == null) {
                let e = this.scroll.create(this.statics.defaultChild.blotName);
                (this.appendChild(e),
                    n == null &&
                    t.endsWith(`
`)
                        ? e.insertAt(0, t.slice(0, -1), n)
                        : e.insertAt(0, t, n));
            } else {
                let e = this.scroll.create(t, n);
                this.appendChild(e);
            }
        else super.insertAt(e, t, n);
        this.optimize();
    }
    insertBefore(e, t) {
        if (e.statics.scope === K.INLINE_BLOT) {
            let n = this.scroll.create(this.statics.defaultChild.blotName);
            (n.appendChild(e), super.insertBefore(n, t));
        } else super.insertBefore(e, t);
    }
    insertContents(e, t) {
        let n = this.deltaToRenderBlocks(
                t.concat(
                    new Y.default().insert(`
`),
                ),
            ),
            r = n.pop();
        if (r == null) return;
        this.batchStart();
        let i = n.shift();
        if (i) {
            let t =
                    i.type === `block` &&
                    (i.delta.length() === 0 ||
                        (!this.descendant(cp, e)[0] && e < this.length())),
                n =
                    i.type === `block`
                        ? i.delta
                        : new Y.default().insert({ [i.key]: i.value });
            im(this, e, n);
            let r = +(i.type === `block`),
                a = e + n.length() + r;
            t &&
                this.insertAt(
                    a - 1,
                    `
`,
                );
            let o = up(this.line(e)[0]),
                s = Y.AttributeMap.diff(o, i.attributes) || {};
            (Object.keys(s).forEach((e) => {
                this.formatAt(a - 1, 1, e, s[e]);
            }),
                (e = a));
        }
        let [a, o] = this.children.find(e);
        if (
            (n.length &&
                (a && ((a = a.split(o)), (o = 0)),
                n.forEach((e) => {
                    if (e.type === `block`)
                        im(
                            this.createBlock(e.attributes, a || void 0),
                            0,
                            e.delta,
                        );
                    else {
                        let t = this.create(e.key, e.value);
                        (this.insertBefore(t, a || void 0),
                            Object.keys(e.attributes).forEach((n) => {
                                t.format(n, e.attributes[n]);
                            }));
                    }
                })),
            r.type === `block` && r.delta.length())
        ) {
            let e = a ? a.offset(a.scroll) + o : this.length();
            im(this, e, r.delta);
        }
        (this.batchEnd(), this.optimize());
    }
    isEnabled() {
        return this.domNode.getAttribute(`contenteditable`) === `true`;
    }
    leaf(e) {
        let t = this.path(e).pop();
        if (!t) return [null, -1];
        let [n, r] = t;
        return n instanceof q ? [n, r] : [null, -1];
    }
    line(e) {
        return e === this.length() ? this.line(e - 1) : this.descendant(tm, e);
    }
    lines() {
        let e =
                arguments.length > 0 && arguments[0] !== void 0
                    ? arguments[0]
                    : 0,
            t =
                arguments.length > 1 && arguments[1] !== void 0
                    ? arguments[1]
                    : Number.MAX_VALUE,
            n = (e, t, r) => {
                let i = [],
                    a = r;
                return (
                    e.children.forEachAt(t, r, (e, t, r) => {
                        (tm(e)
                            ? i.push(e)
                            : e instanceof Uf && (i = i.concat(n(e, t, a))),
                            (a -= r));
                    }),
                    i
                );
            };
        return n(this, e, t);
    }
    optimize() {
        let e =
                arguments.length > 0 && arguments[0] !== void 0
                    ? arguments[0]
                    : [],
            t =
                arguments.length > 1 && arguments[1] !== void 0
                    ? arguments[1]
                    : {};
        this.batch ||
            (super.optimize(e, t),
            e.length > 0 && this.emitter.emit(Z.events.SCROLL_OPTIMIZE, e, t));
    }
    path(e) {
        return super.path(e).slice(1);
    }
    remove() {}
    update(e) {
        if (this.batch) {
            Array.isArray(e) && (this.batch = this.batch.concat(e));
            return;
        }
        let t = Z.sources.USER;
        (typeof e == `string` && (t = e),
            Array.isArray(e) || (e = this.observer.takeRecords()),
            (e = e.filter((e) => {
                let { target: t } = e,
                    n = this.find(t, !0);
                return n && !nm(n);
            })),
            e.length > 0 &&
                this.emitter.emit(Z.events.SCROLL_BEFORE_UPDATE, t, e),
            super.update(e.concat([])),
            e.length > 0 && this.emitter.emit(Z.events.SCROLL_UPDATE, t, e));
    }
    updateEmbedAt(e, t, n) {
        let [r] = this.descendant((e) => e instanceof cp, e);
        r && r.statics.blotName === t && nm(r) && r.updateContent(n);
    }
    handleDragStart(e) {
        e.preventDefault();
    }
    deltaToRenderBlocks(e) {
        let t = [],
            n = new Y.default();
        return (
            e.forEach((e) => {
                let r = e?.insert;
                if (r)
                    if (typeof r == `string`) {
                        let i = r.split(`
`);
                        i.slice(0, -1).forEach((r) => {
                            (n.insert(r, e.attributes),
                                t.push({
                                    type: `block`,
                                    delta: n,
                                    attributes: e.attributes ?? {},
                                }),
                                (n = new Y.default()));
                        });
                        let a = i[i.length - 1];
                        a && n.insert(a, e.attributes);
                    } else {
                        let i = Object.keys(r)[0];
                        if (!i) return;
                        this.query(i, K.INLINE)
                            ? n.push(e)
                            : (n.length() &&
                                  t.push({
                                      type: `block`,
                                      delta: n,
                                      attributes: {},
                                  }),
                              (n = new Y.default()),
                              t.push({
                                  type: `blockEmbed`,
                                  key: i,
                                  value: r[i],
                                  attributes: e.attributes ?? {},
                              }));
                    }
            }),
            n.length() && t.push({ type: `block`, delta: n, attributes: {} }),
            t
        );
    }
    createBlock(e, t) {
        let n,
            r = {};
        Object.entries(e).forEach((e) => {
            let [t, i] = e;
            this.query(t, K.BLOCK & K.BLOT) == null ? (r[t] = i) : (n = t);
        });
        let i = this.create(
            n || this.statics.defaultChild.blotName,
            n ? e[n] : void 0,
        );
        this.insertBefore(i, t || void 0);
        let a = i.length();
        return (
            Object.entries(r).forEach((e) => {
                let [t, n] = e;
                i.formatAt(0, a, t, n);
            }),
            i
        );
    }
};
function im(e, t, n) {
    n.reduce((t, n) => {
        let r = Y.Op.length(n),
            i = n.attributes || {};
        if (n.insert != null) {
            if (typeof n.insert == `string`) {
                let r = n.insert;
                e.insertAt(t, r);
                let [a] = e.descendant(q, t),
                    o = up(a);
                i = Y.AttributeMap.diff(o, i) || {};
            } else if (typeof n.insert == `object`) {
                let r = Object.keys(n.insert)[0];
                if (r == null) return t;
                if (
                    (e.insertAt(t, r, n.insert[r]),
                    e.scroll.query(r, K.INLINE) != null)
                ) {
                    let [n] = e.descendant(q, t),
                        r = up(n);
                    i = Y.AttributeMap.diff(r, i) || {};
                }
            }
        }
        return (
            Object.keys(i).forEach((n) => {
                e.formatAt(t, r, n, i[n]);
            }),
            t + r
        );
    }, t);
}
var am = { scope: K.BLOCK, whitelist: [`right`, `center`, `justify`] },
    om = new xf(`align`, `align`, am),
    sm = new Ef(`align`, `ql-align`, am),
    cm = new Of(`align`, `text-align`, am),
    lm = class extends Of {
        value(e) {
            let t = super.value(e);
            return t.startsWith(`rgb(`)
                ? ((t = t.replace(/^[^\d]+/, ``).replace(/[^\d]+$/, ``)),
                  `#${t
                      .split(`,`)
                      .map((e) => `00${parseInt(e, 10).toString(16)}`.slice(-2))
                      .join(``)}`)
                : t;
        }
    },
    um = new Ef(`color`, `ql-color`, { scope: K.INLINE }),
    dm = new lm(`color`, `color`, { scope: K.INLINE }),
    fm = new Ef(`background`, `ql-bg`, { scope: K.INLINE }),
    pm = new lm(`background`, `background-color`, { scope: K.INLINE }),
    mm = class extends em {
        static create(e) {
            let t = super.create(e);
            return (t.setAttribute(`spellcheck`, `false`), t);
        }
        code(e, t) {
            return this.children
                .map((e) => (e.length() <= 1 ? `` : e.domNode.innerText))
                .join(
                    `
`,
                )
                .slice(e, e + t);
        }
        html(e, t) {
            return `<pre>\n${ap(this.code(e, t))}\n</pre>`;
        }
    },
    $ = class extends X {
        static TAB = `  `;
        static register() {
            Q.register(mm);
        }
    },
    hm = class extends op {};
((hm.blotName = `code`),
    (hm.tagName = `CODE`),
    ($.blotName = `code-block`),
    ($.className = `ql-code-block`),
    ($.tagName = `DIV`),
    (mm.blotName = `code-block-container`),
    (mm.className = `ql-code-block-container`),
    (mm.tagName = `DIV`),
    (mm.allowedChildren = [$]),
    ($.allowedChildren = [rp, np, dp]),
    ($.requiredContainer = mm));
var gm = { scope: K.BLOCK, whitelist: [`rtl`] },
    _m = new xf(`direction`, `dir`, gm),
    vm = new Ef(`direction`, `ql-direction`, gm),
    ym = new Of(`direction`, `direction`, gm),
    bm = { scope: K.INLINE, whitelist: [`serif`, `monospace`] },
    xm = new Ef(`font`, `ql-font`, bm),
    Sm = new (class extends Of {
        value(e) {
            return super.value(e).replace(/["']/g, ``);
        }
    })(`font`, `font-family`, bm),
    Cm = new Ef(`size`, `ql-size`, {
        scope: K.INLINE,
        whitelist: [`small`, `large`, `huge`],
    }),
    wm = new Of(`size`, `font-size`, {
        scope: K.INLINE,
        whitelist: [`10px`, `18px`, `32px`],
    }),
    Tm = _p(`quill:keyboard`),
    Em = /Mac/i.test(navigator.platform) ? `metaKey` : `ctrlKey`,
    Dm = class e extends Mp {
        static match(e, t) {
            return [`altKey`, `ctrlKey`, `metaKey`, `shiftKey`].some(
                (n) => !!t[n] !== e[n] && t[n] !== null,
            )
                ? !1
                : t.key === e.key || t.key === e.which;
        }
        constructor(e, t) {
            (super(e, t),
                (this.bindings = {}),
                Object.keys(this.options.bindings).forEach((e) => {
                    this.options.bindings[e] &&
                        this.addBinding(this.options.bindings[e]);
                }),
                this.addBinding(
                    { key: `Enter`, shiftKey: null },
                    this.handleEnter,
                ),
                this.addBinding(
                    {
                        key: `Enter`,
                        metaKey: null,
                        ctrlKey: null,
                        altKey: null,
                    },
                    () => {},
                ),
                /Firefox/i.test(navigator.userAgent)
                    ? (this.addBinding(
                          { key: `Backspace` },
                          { collapsed: !0 },
                          this.handleBackspace,
                      ),
                      this.addBinding(
                          { key: `Delete` },
                          { collapsed: !0 },
                          this.handleDelete,
                      ))
                    : (this.addBinding(
                          { key: `Backspace` },
                          { collapsed: !0, prefix: /^.?$/ },
                          this.handleBackspace,
                      ),
                      this.addBinding(
                          { key: `Delete` },
                          { collapsed: !0, suffix: /^.?$/ },
                          this.handleDelete,
                      )),
                this.addBinding(
                    { key: `Backspace` },
                    { collapsed: !1 },
                    this.handleDeleteRange,
                ),
                this.addBinding(
                    { key: `Delete` },
                    { collapsed: !1 },
                    this.handleDeleteRange,
                ),
                this.addBinding(
                    {
                        key: `Backspace`,
                        altKey: null,
                        ctrlKey: null,
                        metaKey: null,
                        shiftKey: null,
                    },
                    { collapsed: !0, offset: 0 },
                    this.handleBackspace,
                ),
                this.listen());
        }
        addBinding(e) {
            let t =
                    arguments.length > 1 && arguments[1] !== void 0
                        ? arguments[1]
                        : {},
                n =
                    arguments.length > 2 && arguments[2] !== void 0
                        ? arguments[2]
                        : {},
                r = Mm(e);
            if (r == null) {
                Tm.warn(`Attempted to add invalid keyboard binding`, r);
                return;
            }
            (typeof t == `function` && (t = { handler: t }),
                typeof n == `function` && (n = { handler: n }),
                (Array.isArray(r.key) ? r.key : [r.key]).forEach((e) => {
                    let i = { ...r, key: e, ...t, ...n };
                    ((this.bindings[i.key] = this.bindings[i.key] || []),
                        this.bindings[i.key].push(i));
                }));
        }
        listen() {
            this.quill.root.addEventListener(`keydown`, (t) => {
                if (
                    t.defaultPrevented ||
                    t.isComposing ||
                    (t.keyCode === 229 &&
                        (t.key === `Enter` || t.key === `Backspace`))
                )
                    return;
                let n = (this.bindings[t.key] || [])
                    .concat(this.bindings[t.which] || [])
                    .filter((n) => e.match(t, n));
                if (n.length === 0) return;
                let r = Q.find(t.target, !0);
                if (r && r.scroll !== this.quill.scroll) return;
                let i = this.quill.getSelection();
                if (i == null || !this.quill.hasFocus()) return;
                let [a, o] = this.quill.getLine(i.index),
                    [s, c] = this.quill.getLeaf(i.index),
                    [l, u] =
                        i.length === 0
                            ? [s, c]
                            : this.quill.getLeaf(i.index + i.length),
                    d = s instanceof Yf ? s.value().slice(0, c) : ``,
                    f = l instanceof Yf ? l.value().slice(u) : ``,
                    p = {
                        collapsed: i.length === 0,
                        empty: i.length === 0 && a.length() <= 1,
                        format: this.quill.getFormat(i),
                        line: a,
                        offset: o,
                        prefix: d,
                        suffix: f,
                        event: t,
                    };
                n.some((e) => {
                    if (
                        (e.collapsed != null && e.collapsed !== p.collapsed) ||
                        (e.empty != null && e.empty !== p.empty) ||
                        (e.offset != null && e.offset !== p.offset)
                    )
                        return !1;
                    if (Array.isArray(e.format)) {
                        if (e.format.every((e) => p.format[e] == null))
                            return !1;
                    } else if (
                        typeof e.format == `object` &&
                        !Object.keys(e.format).every((t) =>
                            e.format[t] === !0
                                ? p.format[t] != null
                                : e.format[t] === !1
                                  ? p.format[t] == null
                                  : vf(e.format[t], p.format[t]),
                        )
                    )
                        return !1;
                    return (e.prefix != null && !e.prefix.test(p.prefix)) ||
                        (e.suffix != null && !e.suffix.test(p.suffix))
                        ? !1
                        : e.handler.call(this, i, p, e) !== !0;
                }) && t.preventDefault();
            });
        }
        handleBackspace(e, t) {
            let n = /[\uD800-\uDBFF][\uDC00-\uDFFF]$/.test(t.prefix) ? 2 : 1;
            if (e.index === 0 || this.quill.getLength() <= 1) return;
            let r = {},
                [i] = this.quill.getLine(e.index),
                a = new Y.default().retain(e.index - n).delete(n);
            if (t.offset === 0) {
                let [t] = this.quill.getLine(e.index - 1);
                if (t && !(t.statics.blotName === `block` && t.length() <= 1)) {
                    let t = i.formats(),
                        n = this.quill.getFormat(e.index - 1, 1);
                    if (
                        ((r = Y.AttributeMap.diff(t, n) || {}),
                        Object.keys(r).length > 0)
                    ) {
                        let t = new Y.default()
                            .retain(e.index + i.length() - 2)
                            .retain(1, r);
                        a = a.compose(t);
                    }
                }
            }
            (this.quill.updateContents(a, Q.sources.USER), this.quill.focus());
        }
        handleDelete(e, t) {
            let n = /^[\uD800-\uDBFF][\uDC00-\uDFFF]/.test(t.suffix) ? 2 : 1;
            if (e.index >= this.quill.getLength() - n) return;
            let r = {},
                [i] = this.quill.getLine(e.index),
                a = new Y.default().retain(e.index).delete(n);
            if (t.offset >= i.length() - 1) {
                let [t] = this.quill.getLine(e.index + 1);
                if (t) {
                    let n = i.formats(),
                        o = this.quill.getFormat(e.index, 1);
                    ((r = Y.AttributeMap.diff(n, o) || {}),
                        Object.keys(r).length > 0 &&
                            (a = a.retain(t.length() - 1).retain(1, r)));
                }
            }
            (this.quill.updateContents(a, Q.sources.USER), this.quill.focus());
        }
        handleDeleteRange(e) {
            (Nm({ range: e, quill: this.quill }), this.quill.focus());
        }
        handleEnter(e, t) {
            let n = Object.keys(t.format).reduce(
                    (e, n) => (
                        this.quill.scroll.query(n, K.BLOCK) &&
                            !Array.isArray(t.format[n]) &&
                            (e[n] = t.format[n]),
                        e
                    ),
                    {},
                ),
                r = new Y.default()
                    .retain(e.index)
                    .delete(e.length)
                    .insert(
                        `
`,
                        n,
                    );
            (this.quill.updateContents(r, Q.sources.USER),
                this.quill.setSelection(e.index + 1, Q.sources.SILENT),
                this.quill.focus());
        }
    };
Dm.DEFAULTS = {
    bindings: {
        bold: Am(`bold`),
        italic: Am(`italic`),
        underline: Am(`underline`),
        indent: {
            key: `Tab`,
            format: [`blockquote`, `indent`, `list`],
            handler(e, t) {
                return t.collapsed && t.offset !== 0
                    ? !0
                    : (this.quill.format(`indent`, `+1`, Q.sources.USER), !1);
            },
        },
        outdent: {
            key: `Tab`,
            shiftKey: !0,
            format: [`blockquote`, `indent`, `list`],
            handler(e, t) {
                return t.collapsed && t.offset !== 0
                    ? !0
                    : (this.quill.format(`indent`, `-1`, Q.sources.USER), !1);
            },
        },
        "outdent backspace": {
            key: `Backspace`,
            collapsed: !0,
            shiftKey: null,
            metaKey: null,
            ctrlKey: null,
            altKey: null,
            format: [`indent`, `list`],
            offset: 0,
            handler(e, t) {
                t.format.indent == null
                    ? t.format.list != null &&
                      this.quill.format(`list`, !1, Q.sources.USER)
                    : this.quill.format(`indent`, `-1`, Q.sources.USER);
            },
        },
        "indent code-block": Om(!0),
        "outdent code-block": Om(!1),
        "remove tab": {
            key: `Tab`,
            shiftKey: !0,
            collapsed: !0,
            prefix: /\t$/,
            handler(e) {
                this.quill.deleteText(e.index - 1, 1, Q.sources.USER);
            },
        },
        tab: {
            key: `Tab`,
            handler(e, t) {
                if (t.format.table) return !0;
                this.quill.history.cutoff();
                let n = new Y.default()
                    .retain(e.index)
                    .delete(e.length)
                    .insert(`	`);
                return (
                    this.quill.updateContents(n, Q.sources.USER),
                    this.quill.history.cutoff(),
                    this.quill.setSelection(e.index + 1, Q.sources.SILENT),
                    !1
                );
            },
        },
        "blockquote empty enter": {
            key: `Enter`,
            collapsed: !0,
            format: [`blockquote`],
            empty: !0,
            handler() {
                this.quill.format(`blockquote`, !1, Q.sources.USER);
            },
        },
        "list empty enter": {
            key: `Enter`,
            collapsed: !0,
            format: [`list`],
            empty: !0,
            handler(e, t) {
                let n = { list: !1 };
                (t.format.indent && (n.indent = !1),
                    this.quill.formatLine(
                        e.index,
                        e.length,
                        n,
                        Q.sources.USER,
                    ));
            },
        },
        "checklist enter": {
            key: `Enter`,
            collapsed: !0,
            format: { list: `checked` },
            handler(e) {
                let [t, n] = this.quill.getLine(e.index),
                    r = { ...t.formats(), list: `checked` },
                    i = new Y.default()
                        .retain(e.index)
                        .insert(
                            `
`,
                            r,
                        )
                        .retain(t.length() - n - 1)
                        .retain(1, { list: `unchecked` });
                (this.quill.updateContents(i, Q.sources.USER),
                    this.quill.setSelection(e.index + 1, Q.sources.SILENT),
                    this.quill.scrollSelectionIntoView());
            },
        },
        "header enter": {
            key: `Enter`,
            collapsed: !0,
            format: [`header`],
            suffix: /^$/,
            handler(e, t) {
                let [n, r] = this.quill.getLine(e.index),
                    i = new Y.default()
                        .retain(e.index)
                        .insert(
                            `
`,
                            t.format,
                        )
                        .retain(n.length() - r - 1)
                        .retain(1, { header: null });
                (this.quill.updateContents(i, Q.sources.USER),
                    this.quill.setSelection(e.index + 1, Q.sources.SILENT),
                    this.quill.scrollSelectionIntoView());
            },
        },
        "table backspace": {
            key: `Backspace`,
            format: [`table`],
            collapsed: !0,
            offset: 0,
            handler() {},
        },
        "table delete": {
            key: `Delete`,
            format: [`table`],
            collapsed: !0,
            suffix: /^$/,
            handler() {},
        },
        "table enter": {
            key: `Enter`,
            shiftKey: null,
            format: [`table`],
            handler(e) {
                let t = this.quill.getModule(`table`);
                if (t) {
                    let [n, r, i, a] = t.getTable(e),
                        o = Pm(n, r, i, a);
                    if (o == null) return;
                    let s = n.offset();
                    if (o < 0) {
                        let t = new Y.default().retain(s).insert(`
`);
                        (this.quill.updateContents(t, Q.sources.USER),
                            this.quill.setSelection(
                                e.index + 1,
                                e.length,
                                Q.sources.SILENT,
                            ));
                    } else if (o > 0) {
                        s += n.length();
                        let e = new Y.default().retain(s).insert(`
`);
                        (this.quill.updateContents(e, Q.sources.USER),
                            this.quill.setSelection(s, Q.sources.USER));
                    }
                }
            },
        },
        "table tab": {
            key: `Tab`,
            shiftKey: null,
            format: [`table`],
            handler(e, t) {
                let { event: n, line: r } = t,
                    i = r.offset(this.quill.scroll);
                n.shiftKey
                    ? this.quill.setSelection(i - 1, Q.sources.USER)
                    : this.quill.setSelection(i + r.length(), Q.sources.USER);
            },
        },
        "list autofill": {
            key: ` `,
            shiftKey: null,
            collapsed: !0,
            format: { "code-block": !1, blockquote: !1, table: !1 },
            prefix: /^\s*?(\d+\.|-|\*|\[ ?\]|\[x\])$/,
            handler(e, t) {
                if (this.quill.scroll.query(`list`) == null) return !0;
                let { length: n } = t.prefix,
                    [r, i] = this.quill.getLine(e.index);
                if (i > n) return !0;
                let a;
                switch (t.prefix.trim()) {
                    case `[]`:
                    case `[ ]`:
                        a = `unchecked`;
                        break;
                    case `[x]`:
                        a = `checked`;
                        break;
                    case `-`:
                    case `*`:
                        a = `bullet`;
                        break;
                    default:
                        a = `ordered`;
                }
                (this.quill.insertText(e.index, ` `, Q.sources.USER),
                    this.quill.history.cutoff());
                let o = new Y.default()
                    .retain(e.index - i)
                    .delete(n + 1)
                    .retain(r.length() - 2 - i)
                    .retain(1, { list: a });
                return (
                    this.quill.updateContents(o, Q.sources.USER),
                    this.quill.history.cutoff(),
                    this.quill.setSelection(e.index - n, Q.sources.SILENT),
                    !1
                );
            },
        },
        "code exit": {
            key: `Enter`,
            collapsed: !0,
            format: [`code-block`],
            prefix: /^$/,
            suffix: /^\s*$/,
            handler(e) {
                let [t, n] = this.quill.getLine(e.index),
                    r = 2,
                    i = t;
                for (
                    ;
                    i != null && i.length() <= 1 && i.formats()[`code-block`];
                )
                    if (((i = i.prev), --r, r <= 0)) {
                        let r = new Y.default()
                            .retain(e.index + t.length() - n - 2)
                            .retain(1, { "code-block": null })
                            .delete(1);
                        return (
                            this.quill.updateContents(r, Q.sources.USER),
                            this.quill.setSelection(
                                e.index - 1,
                                Q.sources.SILENT,
                            ),
                            !1
                        );
                    }
                return !0;
            },
        },
        "embed left": km(`ArrowLeft`, !1),
        "embed left shift": km(`ArrowLeft`, !0),
        "embed right": km(`ArrowRight`, !1),
        "embed right shift": km(`ArrowRight`, !0),
        "table down": jm(!1),
        "table up": jm(!0),
    },
};
function Om(e) {
    return {
        key: `Tab`,
        shiftKey: !e,
        format: { "code-block": !0 },
        handler(t, n) {
            let { event: r } = n,
                { TAB: i } = this.quill.scroll.query(`code-block`);
            if (t.length === 0 && !r.shiftKey) {
                (this.quill.insertText(t.index, i, Q.sources.USER),
                    this.quill.setSelection(
                        t.index + i.length,
                        Q.sources.SILENT,
                    ));
                return;
            }
            let a =
                    t.length === 0
                        ? this.quill.getLines(t.index, 1)
                        : this.quill.getLines(t),
                { index: o, length: s } = t;
            (a.forEach((t, n) => {
                e
                    ? (t.insertAt(0, i),
                      n === 0 ? (o += i.length) : (s += i.length))
                    : t.domNode.textContent.startsWith(i) &&
                      (t.deleteAt(0, i.length),
                      n === 0 ? (o -= i.length) : (s -= i.length));
            }),
                this.quill.update(Q.sources.USER),
                this.quill.setSelection(o, s, Q.sources.SILENT));
        },
    };
}
function km(e, t) {
    return {
        key: e,
        shiftKey: t,
        altKey: null,
        [e === `ArrowLeft` ? `prefix` : `suffix`]: /^$/,
        handler(n) {
            let { index: r } = n;
            e === `ArrowRight` && (r += n.length + 1);
            let [i] = this.quill.getLeaf(r);
            return i instanceof J
                ? (e === `ArrowLeft`
                      ? t
                          ? this.quill.setSelection(
                                n.index - 1,
                                n.length + 1,
                                Q.sources.USER,
                            )
                          : this.quill.setSelection(n.index - 1, Q.sources.USER)
                      : t
                        ? this.quill.setSelection(
                              n.index,
                              n.length + 1,
                              Q.sources.USER,
                          )
                        : this.quill.setSelection(
                              n.index + n.length + 1,
                              Q.sources.USER,
                          ),
                  !1)
                : !0;
        },
    };
}
function Am(e) {
    return {
        key: e[0],
        shortKey: !0,
        handler(t, n) {
            this.quill.format(e, !n.format[e], Q.sources.USER);
        },
    };
}
function jm(e) {
    return {
        key: e ? `ArrowUp` : `ArrowDown`,
        collapsed: !0,
        format: [`table`],
        handler(t, n) {
            let r = e ? `prev` : `next`,
                i = n.line,
                a = i.parent[r];
            if (a != null) {
                if (a.statics.blotName === `table-row`) {
                    let e = a.children.head,
                        t = i;
                    for (; t.prev != null; ) ((t = t.prev), (e = e.next));
                    let r =
                        e.offset(this.quill.scroll) +
                        Math.min(n.offset, e.length() - 1);
                    this.quill.setSelection(r, 0, Q.sources.USER);
                }
            } else {
                let t = i.table()[r];
                t != null &&
                    (e
                        ? this.quill.setSelection(
                              t.offset(this.quill.scroll) + t.length() - 1,
                              0,
                              Q.sources.USER,
                          )
                        : this.quill.setSelection(
                              t.offset(this.quill.scroll),
                              0,
                              Q.sources.USER,
                          ));
            }
            return !1;
        },
    };
}
function Mm(e) {
    if (typeof e == `string` || typeof e == `number`) e = { key: e };
    else if (typeof e == `object`) e = Td(e);
    else return null;
    return (e.shortKey && ((e[Em] = e.shortKey), delete e.shortKey), e);
}
function Nm(e) {
    let { quill: t, range: n } = e,
        r = t.getLines(n),
        i = {};
    if (r.length > 1) {
        let e = r[0].formats(),
            t = r[r.length - 1].formats();
        i = Y.AttributeMap.diff(t, e) || {};
    }
    (t.deleteText(n, Q.sources.USER),
        Object.keys(i).length > 0 &&
            t.formatLine(n.index, 1, i, Q.sources.USER),
        t.setSelection(n.index, Q.sources.SILENT));
}
function Pm(e, t, n, r) {
    return t.prev == null && t.next == null
        ? n.prev == null && n.next == null
            ? r === 0
                ? -1
                : 1
            : n.prev == null
              ? -1
              : 1
        : t.prev == null
          ? -1
          : t.next == null
            ? 1
            : null;
}
var Fm = /font-weight:\s*normal/,
    Im = [`P`, `OL`, `UL`],
    Lm = (e) => e && Im.includes(e.tagName),
    Rm = (e) => {
        Array.from(e.querySelectorAll(`br`))
            .filter(
                (e) => Lm(e.previousElementSibling) && Lm(e.nextElementSibling),
            )
            .forEach((e) => {
                e.parentNode?.removeChild(e);
            });
    },
    zm = (e) => {
        Array.from(e.querySelectorAll(`b[style*="font-weight"]`))
            .filter((e) => e.getAttribute(`style`)?.match(Fm))
            .forEach((t) => {
                let n = e.createDocumentFragment();
                (n.append(...t.childNodes), t.parentNode?.replaceChild(n, t));
            });
    };
function Bm(e) {
    e.querySelector(`[id^="docs-internal-guid-"]`) && (zm(e), Rm(e));
}
var Vm = /\bmso-list:[^;]*ignore/i,
    Hm = /\bmso-list:[^;]*\bl(\d+)/i,
    Um = /\bmso-list:[^;]*\blevel(\d+)/i,
    Wm = (e, t) => {
        let n = e.getAttribute(`style`),
            r = n?.match(Hm);
        if (!r) return null;
        let i = Number(r[1]),
            a = n?.match(Um),
            o = a ? Number(a[1]) : 1,
            s = RegExp(
                `@list l${i}:level${o}\\s*\\{[^\\}]*mso-level-number-format:\\s*([\\w-]+)`,
                `i`,
            ),
            c = t.match(s);
        return {
            id: i,
            indent: o,
            type: c && c[1] === `bullet` ? `bullet` : `ordered`,
            element: e,
        };
    },
    Gm = (e) => {
        let t = Array.from(e.querySelectorAll(`[style*=mso-list]`)),
            n = [],
            r = [];
        (t.forEach((e) => {
            (e.getAttribute(`style`) || ``).match(Vm) ? n.push(e) : r.push(e);
        }),
            n.forEach((e) => e.parentNode?.removeChild(e)));
        let i = e.documentElement.innerHTML,
            a = r.map((e) => Wm(e, i)).filter((e) => e);
        for (; a.length; ) {
            let e = [],
                t = a.shift();
            for (; t; )
                (e.push(t),
                    (t =
                        a.length &&
                        a[0]?.element === t.element.nextElementSibling &&
                        a[0].id === t.id
                            ? a.shift()
                            : null));
            let n = document.createElement(`ul`);
            e.forEach((e) => {
                let t = document.createElement(`li`);
                (t.setAttribute(`data-list`, e.type),
                    e.indent > 1 &&
                        t.setAttribute(`class`, `ql-indent-${e.indent - 1}`),
                    (t.innerHTML = e.element.innerHTML),
                    n.appendChild(t));
            });
            let r = e[0]?.element,
                { parentNode: i } = r ?? {};
            (r && i?.replaceChild(n, r),
                e.slice(1).forEach((e) => {
                    let { element: t } = e;
                    i?.removeChild(t);
                }));
        }
    };
function Km(e) {
    e.documentElement.getAttribute(`xmlns:w`) ===
        `urn:schemas-microsoft-com:office:word` && Gm(e);
}
var qm = [Km, Bm],
    Jm = (e) => {
        e.documentElement &&
            qm.forEach((t) => {
                t(e);
            });
    },
    Ym = _p(`quill:clipboard`),
    Xm = [
        [Node.TEXT_NODE, vh],
        [Node.TEXT_NODE, hh],
        [`br`, uh],
        [Node.ELEMENT_NODE, hh],
        [Node.ELEMENT_NODE, lh],
        [Node.ELEMENT_NODE, ch],
        [Node.ELEMENT_NODE, gh],
        [`li`, ph],
        [`ol, ul`, mh],
        [`pre`, dh],
        [`tr`, _h],
        [`b`, sh(`bold`)],
        [`i`, sh(`italic`)],
        [`strike`, sh(`strike`)],
        [`style`, fh],
    ],
    Zm = [om, _m].reduce((e, t) => ((e[t.keyName] = t), e), {}),
    Qm = [cm, pm, dm, ym, Sm, wm].reduce((e, t) => ((e[t.keyName] = t), e), {}),
    $m = class extends Mp {
        static DEFAULTS = { matchers: [] };
        constructor(e, t) {
            (super(e, t),
                this.quill.root.addEventListener(`copy`, (e) =>
                    this.onCaptureCopy(e, !1),
                ),
                this.quill.root.addEventListener(`cut`, (e) =>
                    this.onCaptureCopy(e, !0),
                ),
                this.quill.root.addEventListener(
                    `paste`,
                    this.onCapturePaste.bind(this),
                ),
                (this.matchers = []),
                Xm.concat(this.options.matchers ?? []).forEach((e) => {
                    let [t, n] = e;
                    this.addMatcher(t, n);
                }));
        }
        addMatcher(e, t) {
            this.matchers.push([e, t]);
        }
        convert(e) {
            let { html: t, text: n } = e,
                r =
                    arguments.length > 1 && arguments[1] !== void 0
                        ? arguments[1]
                        : {};
            if (r[$.blotName])
                return new Y.default().insert(n || ``, {
                    [$.blotName]: r[$.blotName],
                });
            if (!t) return new Y.default().insert(n || ``, r);
            let i = this.convertHTML(t);
            return th(
                i,
                `
`,
            ) &&
                (i.ops[i.ops.length - 1].attributes == null || r.table)
                ? i.compose(new Y.default().retain(i.length() - 1).delete(1))
                : i;
        }
        normalizeHTML(e) {
            Jm(e);
        }
        convertHTML(e) {
            let t = new DOMParser().parseFromString(e, `text/html`);
            this.normalizeHTML(t);
            let n = t.body,
                r = new WeakMap(),
                [i, a] = this.prepareMatching(n, r);
            return oh(this.quill.scroll, n, i, a, r);
        }
        dangerouslyPasteHTML(e, t) {
            let n =
                arguments.length > 2 && arguments[2] !== void 0
                    ? arguments[2]
                    : Q.sources.API;
            if (typeof e == `string`) {
                let n = this.convert({ html: e, text: `` });
                (this.quill.setContents(n, t),
                    this.quill.setSelection(0, Q.sources.SILENT));
            } else {
                let r = this.convert({ html: t, text: `` });
                (this.quill.updateContents(
                    new Y.default().retain(e).concat(r),
                    n,
                ),
                    this.quill.setSelection(e + r.length(), Q.sources.SILENT));
            }
        }
        onCaptureCopy(e) {
            let t =
                arguments.length > 1 && arguments[1] !== void 0 && arguments[1];
            if (e.defaultPrevented) return;
            e.preventDefault();
            let [n] = this.quill.selection.getRange();
            if (n == null) return;
            let { html: r, text: i } = this.onCopy(n, t);
            (e.clipboardData?.setData(`text/plain`, i),
                e.clipboardData?.setData(`text/html`, r),
                t && Nm({ range: n, quill: this.quill }));
        }
        normalizeURIList(e) {
            return e.split(/\r?\n/).filter((e) => e[0] !== `#`).join(`
`);
        }
        onCapturePaste(e) {
            if (e.defaultPrevented || !this.quill.isEnabled()) return;
            e.preventDefault();
            let t = this.quill.getSelection(!0);
            if (t == null) return;
            let n = e.clipboardData?.getData(`text/html`),
                r = e.clipboardData?.getData(`text/plain`);
            if (!n && !r) {
                let t = e.clipboardData?.getData(`text/uri-list`);
                t && (r = this.normalizeURIList(t));
            }
            let i = Array.from(e.clipboardData?.files || []);
            if (!n && i.length > 0) {
                this.quill.uploader.upload(t, i);
                return;
            }
            if (n && i.length > 0) {
                let e = new DOMParser().parseFromString(n, `text/html`);
                if (
                    e.body.childElementCount === 1 &&
                    e.body.firstElementChild?.tagName === `IMG`
                ) {
                    this.quill.uploader.upload(t, i);
                    return;
                }
            }
            this.onPaste(t, { html: n, text: r });
        }
        onCopy(e) {
            let t = this.quill.getText(e);
            return { html: this.quill.getSemanticHTML(e), text: t };
        }
        onPaste(e, t) {
            let { text: n, html: r } = t,
                i = this.quill.getFormat(e.index),
                a = this.convert({ text: n, html: r }, i);
            Ym.log(`onPaste`, a, { text: n, html: r });
            let o = new Y.default().retain(e.index).delete(e.length).concat(a);
            (this.quill.updateContents(o, Q.sources.USER),
                this.quill.setSelection(
                    o.length() - e.length,
                    Q.sources.SILENT,
                ),
                this.quill.scrollSelectionIntoView());
        }
        prepareMatching(e, t) {
            let n = [],
                r = [];
            return (
                this.matchers.forEach((i) => {
                    let [a, o] = i;
                    switch (a) {
                        case Node.TEXT_NODE:
                            r.push(o);
                            break;
                        case Node.ELEMENT_NODE:
                            n.push(o);
                            break;
                        default:
                            Array.from(e.querySelectorAll(a)).forEach((e) => {
                                t.has(e) ? t.get(e)?.push(o) : t.set(e, [o]);
                            });
                            break;
                    }
                }),
                [n, r]
            );
        }
    };
function eh(e, t, n, r) {
    return r.query(t)
        ? e.reduce((e, r) => {
              if (!r.insert) return e;
              if (r.attributes && r.attributes[t]) return e.push(r);
              let i = n ? { [t]: n } : {};
              return e.insert(r.insert, { ...i, ...r.attributes });
          }, new Y.default())
        : e;
}
function th(e, t) {
    let n = ``;
    for (let r = e.ops.length - 1; r >= 0 && n.length < t.length; --r) {
        let t = e.ops[r];
        if (typeof t.insert != `string`) break;
        n = t.insert + n;
    }
    return n.slice(-1 * t.length) === t;
}
function nh(e, t) {
    if (!(e instanceof Element)) return !1;
    let n = t.query(e);
    return n && n.prototype instanceof J
        ? !1
        : `address.article.blockquote.canvas.dd.div.dl.dt.fieldset.figcaption.figure.footer.form.h1.h2.h3.h4.h5.h6.header.iframe.li.main.nav.ol.output.p.pre.section.table.td.tr.ul.video`
              .split(`.`)
              .includes(e.tagName.toLowerCase());
}
function rh(e, t) {
    return (
        e.previousElementSibling &&
        e.nextElementSibling &&
        !nh(e.previousElementSibling, t) &&
        !nh(e.nextElementSibling, t)
    );
}
var ih = new WeakMap();
function ah(e) {
    return e == null
        ? !1
        : (ih.has(e) ||
              (e.tagName === `PRE`
                  ? ih.set(e, !0)
                  : ih.set(e, ah(e.parentNode))),
          ih.get(e));
}
function oh(e, t, n, r, i) {
    return t.nodeType === t.TEXT_NODE
        ? r.reduce((n, r) => r(t, n, e), new Y.default())
        : t.nodeType === t.ELEMENT_NODE
          ? Array.from(t.childNodes || []).reduce((a, o) => {
                let s = oh(e, o, n, r, i);
                return (
                    o.nodeType === t.ELEMENT_NODE &&
                        ((s = n.reduce((t, n) => n(o, t, e), s)),
                        (s = (i.get(o) || []).reduce((t, n) => n(o, t, e), s))),
                    a.concat(s)
                );
            }, new Y.default())
          : new Y.default();
}
function sh(e) {
    return (t, n, r) => eh(n, e, !0, r);
}
function ch(e, t, n) {
    let r = xf.keys(e),
        i = Ef.keys(e),
        a = Of.keys(e),
        o = {};
    return (
        r
            .concat(i)
            .concat(a)
            .forEach((t) => {
                let r = n.query(t, K.ATTRIBUTE);
                (r != null && ((o[r.attrName] = r.value(e)), o[r.attrName])) ||
                    ((r = Zm[t]),
                    r != null &&
                        (r.attrName === t || r.keyName === t) &&
                        (o[r.attrName] = r.value(e) || void 0),
                    (r = Qm[t]),
                    r != null &&
                        (r.attrName === t || r.keyName === t) &&
                        ((r = Qm[t]), (o[r.attrName] = r.value(e) || void 0)));
            }),
        Object.entries(o).reduce((e, t) => {
            let [r, i] = t;
            return eh(e, r, i, n);
        }, t)
    );
}
function lh(e, t, n) {
    let r = n.query(e);
    if (r == null) return t;
    if (r.prototype instanceof J) {
        let t = {},
            i = r.value(e);
        if (i != null)
            return (
                (t[r.blotName] = i),
                new Y.default().insert(t, r.formats(e, n))
            );
    } else if (
        (r.prototype instanceof Vf &&
            !th(
                t,
                `
`,
            ) &&
            t.insert(`
`),
        `blotName` in r && `formats` in r && typeof r.formats == `function`)
    )
        return eh(t, r.blotName, r.formats(e, n), n);
    return t;
}
function uh(e, t) {
    return (
        th(
            t,
            `
`,
        ) ||
            t.insert(`
`),
        t
    );
}
function dh(e, t, n) {
    let r = n.query(`code-block`);
    return eh(
        t,
        `code-block`,
        r && `formats` in r && typeof r.formats == `function`
            ? r.formats(e, n)
            : !0,
        n,
    );
}
function fh() {
    return new Y.default();
}
function ph(e, t, n) {
    let r = n.query(e);
    if (
        r == null ||
        r.blotName !== `list` ||
        !th(
            t,
            `
`,
        )
    )
        return t;
    let i = -1,
        a = e.parentNode;
    for (; a != null; )
        ([`OL`, `UL`].includes(a.tagName) && (i += 1), (a = a.parentNode));
    return i <= 0
        ? t
        : t.reduce(
              (e, t) =>
                  t.insert
                      ? t.attributes && typeof t.attributes.indent == `number`
                          ? e.push(t)
                          : e.insert(t.insert, {
                                indent: i,
                                ...(t.attributes || {}),
                            })
                      : e,
              new Y.default(),
          );
}
function mh(e, t, n) {
    let r = e,
        i = r.tagName === `OL` ? `ordered` : `bullet`,
        a = r.getAttribute(`data-checked`);
    return (
        a && (i = a === `true` ? `checked` : `unchecked`),
        eh(t, `list`, i, n)
    );
}
function hh(e, t, n) {
    if (
        !th(
            t,
            `
`,
        )
    ) {
        if (
            nh(e, n) &&
            (e.childNodes.length > 0 || e instanceof HTMLParagraphElement)
        )
            return t.insert(`
`);
        if (t.length() > 0 && e.nextSibling) {
            let r = e.nextSibling;
            for (; r != null; ) {
                if (nh(r, n))
                    return t.insert(`
`);
                let e = n.query(r);
                if (e && e.prototype instanceof cp)
                    return t.insert(`
`);
                r = r.firstChild;
            }
        }
    }
    return t;
}
function gh(e, t, n) {
    let r = {},
        i = e.style || {};
    return (
        i.fontStyle === `italic` && (r.italic = !0),
        i.textDecoration === `underline` && (r.underline = !0),
        i.textDecoration === `line-through` && (r.strike = !0),
        (i.fontWeight?.startsWith(`bold`) ||
            parseInt(i.fontWeight, 10) >= 700) &&
            (r.bold = !0),
        (t = Object.entries(r).reduce((e, t) => {
            let [r, i] = t;
            return eh(e, r, i, n);
        }, t)),
        parseFloat(i.textIndent || 0) > 0
            ? new Y.default().insert(`	`).concat(t)
            : t
    );
}
function _h(e, t, n) {
    let r =
        e.parentElement?.tagName === `TABLE`
            ? e.parentElement
            : e.parentElement?.parentElement;
    return r == null
        ? t
        : eh(
              t,
              `table`,
              Array.from(r.querySelectorAll(`tr`)).indexOf(e) + 1,
              n,
          );
}
function vh(e, t, n) {
    let r = e.data;
    if (e.parentElement?.tagName === `O:P`) return t.insert(r.trim());
    if (!ah(e)) {
        if (
            r.trim().length === 0 &&
            r.includes(`
`) &&
            !rh(e, n)
        )
            return t;
        ((r = r.replace(/[^\S\u00a0]/g, ` `)),
            (r = r.replace(/ {2,}/g, ` `)),
            ((e.previousSibling == null &&
                e.parentElement != null &&
                nh(e.parentElement, n)) ||
                (e.previousSibling instanceof Element &&
                    nh(e.previousSibling, n))) &&
                (r = r.replace(/^ /, ``)),
            ((e.nextSibling == null &&
                e.parentElement != null &&
                nh(e.parentElement, n)) ||
                (e.nextSibling instanceof Element && nh(e.nextSibling, n))) &&
                (r = r.replace(/ $/, ``)),
            (r = r.replaceAll(`\xA0`, ` `)));
    }
    return t.insert(r);
}
var yh = class extends Mp {
    static DEFAULTS = { delay: 1e3, maxStack: 100, userOnly: !1 };
    lastRecorded = 0;
    ignoreChange = !1;
    stack = { undo: [], redo: [] };
    currentRange = null;
    constructor(e, t) {
        (super(e, t),
            this.quill.on(Q.events.EDITOR_CHANGE, (e, t, n, r) => {
                e === Q.events.SELECTION_CHANGE
                    ? t && r !== Q.sources.SILENT && (this.currentRange = t)
                    : e === Q.events.TEXT_CHANGE &&
                      (this.ignoreChange ||
                          (!this.options.userOnly || r === Q.sources.USER
                              ? this.record(t, n)
                              : this.transform(t)),
                      (this.currentRange = Ch(this.currentRange, t)));
            }),
            this.quill.keyboard.addBinding(
                { key: `z`, shortKey: !0 },
                this.undo.bind(this),
            ),
            this.quill.keyboard.addBinding(
                { key: [`z`, `Z`], shortKey: !0, shiftKey: !0 },
                this.redo.bind(this),
            ),
            /Win/i.test(navigator.platform) &&
                this.quill.keyboard.addBinding(
                    { key: `y`, shortKey: !0 },
                    this.redo.bind(this),
                ),
            this.quill.root.addEventListener(`beforeinput`, (e) => {
                e.inputType === `historyUndo`
                    ? (this.undo(), e.preventDefault())
                    : e.inputType === `historyRedo` &&
                      (this.redo(), e.preventDefault());
            }));
    }
    change(e, t) {
        if (this.stack[e].length === 0) return;
        let n = this.stack[e].pop();
        if (!n) return;
        let r = this.quill.getContents(),
            i = n.delta.invert(r);
        (this.stack[t].push({ delta: i, range: Ch(n.range, i) }),
            (this.lastRecorded = 0),
            (this.ignoreChange = !0),
            this.quill.updateContents(n.delta, Q.sources.USER),
            (this.ignoreChange = !1),
            this.restoreSelection(n));
    }
    clear() {
        this.stack = { undo: [], redo: [] };
    }
    cutoff() {
        this.lastRecorded = 0;
    }
    record(e, t) {
        if (e.ops.length === 0) return;
        this.stack.redo = [];
        let n = e.invert(t),
            r = this.currentRange,
            i = Date.now();
        if (
            this.lastRecorded + this.options.delay > i &&
            this.stack.undo.length > 0
        ) {
            let e = this.stack.undo.pop();
            e && ((n = n.compose(e.delta)), (r = e.range));
        } else this.lastRecorded = i;
        n.length() !== 0 &&
            (this.stack.undo.push({ delta: n, range: r }),
            this.stack.undo.length > this.options.maxStack &&
                this.stack.undo.shift());
    }
    redo() {
        this.change(`redo`, `undo`);
    }
    transform(e) {
        (bh(this.stack.undo, e), bh(this.stack.redo, e));
    }
    undo() {
        this.change(`undo`, `redo`);
    }
    restoreSelection(e) {
        if (e.range) this.quill.setSelection(e.range, Q.sources.USER);
        else {
            let t = Sh(this.quill.scroll, e.delta);
            this.quill.setSelection(t, Q.sources.USER);
        }
    }
};
function bh(e, t) {
    let n = t;
    for (let t = e.length - 1; t >= 0; --t) {
        let r = e[t];
        ((e[t] = {
            delta: n.transform(r.delta, !0),
            range: r.range && Ch(r.range, n),
        }),
            (n = r.delta.transform(n)),
            e[t].delta.length() === 0 && e.splice(t, 1));
    }
}
function xh(e, t) {
    let n = t.ops[t.ops.length - 1];
    return n == null
        ? !1
        : n.insert == null
          ? n.attributes != null &&
            Object.keys(n.attributes).some((t) => e.query(t, K.BLOCK) != null)
          : typeof n.insert == `string` &&
            n.insert.endsWith(`
`);
}
function Sh(e, t) {
    let n = t.reduce((e, t) => e + (t.delete || 0), 0),
        r = t.length() - n;
    return (xh(e, t) && --r, r);
}
function Ch(e, t) {
    if (!e) return e;
    let n = t.transformPosition(e.index);
    return { index: n, length: t.transformPosition(e.index + e.length) - n };
}
var wh = class extends Mp {
    constructor(e, t) {
        (super(e, t),
            e.root.addEventListener(`drop`, (t) => {
                t.preventDefault();
                let n = null;
                if (document.caretRangeFromPoint)
                    n = document.caretRangeFromPoint(t.clientX, t.clientY);
                else if (document.caretPositionFromPoint) {
                    let e = document.caretPositionFromPoint(
                        t.clientX,
                        t.clientY,
                    );
                    ((n = document.createRange()),
                        n.setStart(e.offsetNode, e.offset),
                        n.setEnd(e.offsetNode, e.offset));
                }
                let r = n && e.selection.normalizeNative(n);
                if (r) {
                    let n = e.selection.normalizedToRange(r);
                    t.dataTransfer?.files &&
                        this.upload(n, t.dataTransfer.files);
                }
            }));
    }
    upload(e, t) {
        let n = [];
        (Array.from(t).forEach((e) => {
            e && this.options.mimetypes?.includes(e.type) && n.push(e);
        }),
            n.length > 0 && this.options.handler.call(this, e, n));
    }
};
wh.DEFAULTS = {
    mimetypes: [`image/png`, `image/jpeg`],
    handler(e, t) {
        if (!this.quill.scroll.query(`image`)) return;
        let n = t.map(
            (e) =>
                new Promise((t) => {
                    let n = new FileReader();
                    ((n.onload = () => {
                        t(n.result);
                    }),
                        n.readAsDataURL(e));
                }),
        );
        Promise.all(n).then((t) => {
            let n = t.reduce(
                (e, t) => e.insert({ image: t }),
                new Y.default().retain(e.index).delete(e.length),
            );
            (this.quill.updateContents(n, Z.sources.USER),
                this.quill.setSelection(e.index + t.length, Z.sources.SILENT));
        });
    },
};
var Th = [`insertText`, `insertReplacementText`],
    Eh = class extends Mp {
        constructor(e, t) {
            (super(e, t),
                e.root.addEventListener(`beforeinput`, (e) => {
                    this.handleBeforeInput(e);
                }),
                /Android/i.test(navigator.userAgent) ||
                    e.on(Q.events.COMPOSITION_BEFORE_START, () => {
                        this.handleCompositionStart();
                    }));
        }
        deleteRange(e) {
            Nm({ range: e, quill: this.quill });
        }
        replaceText(e) {
            let t =
                arguments.length > 1 && arguments[1] !== void 0
                    ? arguments[1]
                    : ``;
            if (e.length === 0) return !1;
            if (t) {
                let n = this.quill.getFormat(e.index, 1);
                (this.deleteRange(e),
                    this.quill.updateContents(
                        new Y.default().retain(e.index).insert(t, n),
                        Q.sources.USER,
                    ));
            } else this.deleteRange(e);
            return (
                this.quill.setSelection(
                    e.index + t.length,
                    0,
                    Q.sources.SILENT,
                ),
                !0
            );
        }
        handleBeforeInput(e) {
            if (
                this.quill.composition.isComposing ||
                e.defaultPrevented ||
                !Th.includes(e.inputType)
            )
                return;
            let t = e.getTargetRanges ? e.getTargetRanges()[0] : null;
            if (!t || t.collapsed === !0) return;
            let n = Dh(e);
            if (n == null) return;
            let r = this.quill.selection.normalizeNative(t),
                i = r ? this.quill.selection.normalizedToRange(r) : null;
            i && this.replaceText(i, n) && e.preventDefault();
        }
        handleCompositionStart() {
            let e = this.quill.getSelection();
            e && this.replaceText(e);
        }
    };
function Dh(e) {
    return typeof e.data == `string`
        ? e.data
        : e.dataTransfer?.types.includes(`text/plain`)
          ? e.dataTransfer.getData(`text/plain`)
          : null;
}
var Oh = /Mac/i.test(navigator.platform),
    kh = (e) =>
        !!(
            e.key === `ArrowLeft` ||
            e.key === `ArrowRight` ||
            e.key === `ArrowUp` ||
            e.key === `ArrowDown` ||
            e.key === `Home` ||
            (Oh && e.key === `a` && e.ctrlKey === !0)
        ),
    Ah = class extends Mp {
        isListening = !1;
        selectionChangeDeadline = 0;
        constructor(e, t) {
            (super(e, t),
                this.handleArrowKeys(),
                this.handleNavigationShortcuts());
        }
        handleArrowKeys() {
            this.quill.keyboard.addBinding({
                key: [`ArrowLeft`, `ArrowRight`],
                offset: 0,
                shiftKey: null,
                handler(e, t) {
                    let { line: n, event: r } = t;
                    if (!(n instanceof If) || !n.uiNode) return !0;
                    let i = getComputedStyle(n.domNode).direction === `rtl`;
                    return (i && r.key !== `ArrowRight`) ||
                        (!i && r.key !== `ArrowLeft`)
                        ? !0
                        : (this.quill.setSelection(
                              e.index - 1,
                              e.length + +!!r.shiftKey,
                              Q.sources.USER,
                          ),
                          !1);
                },
            });
        }
        handleNavigationShortcuts() {
            this.quill.root.addEventListener(`keydown`, (e) => {
                !e.defaultPrevented &&
                    kh(e) &&
                    this.ensureListeningToSelectionChange();
            });
        }
        ensureListeningToSelectionChange() {
            ((this.selectionChangeDeadline = Date.now() + 100),
                !this.isListening &&
                    ((this.isListening = !0),
                    document.addEventListener(
                        `selectionchange`,
                        () => {
                            ((this.isListening = !1),
                                Date.now() <= this.selectionChangeDeadline &&
                                    this.handleSelectionChange());
                        },
                        { once: !0 },
                    )));
        }
        handleSelectionChange() {
            let e = document.getSelection();
            if (!e) return;
            let t = e.getRangeAt(0);
            if (t.collapsed !== !0 || t.startOffset !== 0) return;
            let n = this.quill.scroll.find(t.startContainer);
            if (!(n instanceof If) || !n.uiNode) return;
            let r = document.createRange();
            (r.setStartAfter(n.uiNode),
                r.setEndAfter(n.uiNode),
                e.removeAllRanges(),
                e.addRange(r));
        }
    };
Q.register({
    "blots/block": X,
    "blots/block/embed": cp,
    "blots/break": np,
    "blots/container": em,
    "blots/cursor": dp,
    "blots/embed": Pp,
    "blots/inline": op,
    "blots/scroll": rm,
    "blots/text": rp,
    "modules/clipboard": $m,
    "modules/history": yh,
    "modules/keyboard": Dm,
    "modules/uploader": wh,
    "modules/input": Eh,
    "modules/uiNode": Ah,
});
var jh = Q,
    Mh = new (class extends Ef {
        add(e, t) {
            let n = 0;
            if (t === `+1` || t === `-1`) {
                let r = this.value(e) || 0;
                n = t === `+1` ? r + 1 : r - 1;
            } else typeof t == `number` && (n = t);
            return n === 0 ? (this.remove(e), !0) : super.add(e, n.toString());
        }
        canAdd(e, t) {
            return super.canAdd(e, t) || super.canAdd(e, parseInt(t, 10));
        }
        value(e) {
            return parseInt(super.value(e), 10) || void 0;
        }
    })(`indent`, `ql-indent`, {
        scope: K.BLOCK,
        whitelist: [1, 2, 3, 4, 5, 6, 7, 8],
    }),
    Nh = class extends X {
        static blotName = `blockquote`;
        static tagName = `blockquote`;
    },
    Ph = class extends X {
        static blotName = `header`;
        static tagName = [`H1`, `H2`, `H3`, `H4`, `H5`, `H6`];
        static formats(e) {
            return this.tagName.indexOf(e.tagName) + 1;
        }
    },
    Fh = class extends em {};
((Fh.blotName = `list-container`), (Fh.tagName = `OL`));
var Ih = class extends X {
    static create(e) {
        let t = super.create();
        return (t.setAttribute(`data-list`, e), t);
    }
    static formats(e) {
        return e.getAttribute(`data-list`) || void 0;
    }
    static register() {
        Q.register(Fh);
    }
    constructor(e, t) {
        super(e, t);
        let n = t.ownerDocument.createElement(`span`),
            r = (n) => {
                if (!e.isEnabled()) return;
                let r = this.statics.formats(t, e);
                r === `checked`
                    ? (this.format(`list`, `unchecked`), n.preventDefault())
                    : r === `unchecked` &&
                      (this.format(`list`, `checked`), n.preventDefault());
            };
        (n.addEventListener(`mousedown`, r),
            n.addEventListener(`touchstart`, r),
            this.attachUI(n));
    }
    format(e, t) {
        e === this.statics.blotName && t
            ? this.domNode.setAttribute(`data-list`, t)
            : super.format(e, t);
    }
};
((Ih.blotName = `list`),
    (Ih.tagName = `LI`),
    (Fh.allowedChildren = [Ih]),
    (Ih.requiredContainer = Fh));
var Lh = class extends op {
        static blotName = `bold`;
        static tagName = [`STRONG`, `B`];
        static create() {
            return super.create();
        }
        static formats() {
            return !0;
        }
        optimize(e) {
            (super.optimize(e),
                this.domNode.tagName !== this.statics.tagName[0] &&
                    this.replaceWith(this.statics.blotName));
        }
    },
    Rh = class extends Lh {
        static blotName = `italic`;
        static tagName = [`EM`, `I`];
    },
    zh = class extends op {
        static blotName = `link`;
        static tagName = `A`;
        static SANITIZED_URL = `about:blank`;
        static PROTOCOL_WHITELIST = [`http`, `https`, `mailto`, `tel`, `sms`];
        static create(e) {
            let t = super.create(e);
            return (
                t.setAttribute(`href`, this.sanitize(e)),
                t.setAttribute(`rel`, `noopener noreferrer`),
                t.setAttribute(`target`, `_blank`),
                t
            );
        }
        static formats(e) {
            return e.getAttribute(`href`);
        }
        static sanitize(e) {
            return Bh(e, this.PROTOCOL_WHITELIST) ? e : this.SANITIZED_URL;
        }
        format(e, t) {
            e !== this.statics.blotName || !t
                ? super.format(e, t)
                : this.domNode.setAttribute(
                      `href`,
                      this.constructor.sanitize(t),
                  );
        }
    };
function Bh(e, t) {
    let n = document.createElement(`a`);
    n.href = e;
    let r = n.href.slice(0, n.href.indexOf(`:`));
    return t.indexOf(r) > -1;
}
var Vh = class extends op {
        static blotName = `script`;
        static tagName = [`SUB`, `SUP`];
        static create(e) {
            return e === `super`
                ? document.createElement(`sup`)
                : e === `sub`
                  ? document.createElement(`sub`)
                  : super.create(e);
        }
        static formats(e) {
            if (e.tagName === `SUB`) return `sub`;
            if (e.tagName === `SUP`) return `super`;
        }
    },
    Hh = class extends Lh {
        static blotName = `strike`;
        static tagName = [`S`, `STRIKE`];
    },
    Uh = class extends op {
        static blotName = `underline`;
        static tagName = `U`;
    },
    Wh = class extends Pp {
        static blotName = `formula`;
        static className = `ql-formula`;
        static tagName = `SPAN`;
        static create(e) {
            if (window.katex == null)
                throw Error(`Formula module requires KaTeX.`);
            let t = super.create(e);
            return (
                typeof e == `string` &&
                    (window.katex.render(e, t, {
                        throwOnError: !1,
                        errorColor: `#f00`,
                    }),
                    t.setAttribute(`data-value`, e)),
                t
            );
        }
        static value(e) {
            return e.getAttribute(`data-value`);
        }
        html() {
            let { formula: e } = this.value();
            return `<span>${e}</span>`;
        }
    },
    Gh = [`alt`, `height`, `width`],
    Kh = class extends J {
        static blotName = `image`;
        static tagName = `IMG`;
        static create(e) {
            let t = super.create(e);
            return (
                typeof e == `string` && t.setAttribute(`src`, this.sanitize(e)),
                t
            );
        }
        static formats(e) {
            return Gh.reduce(
                (t, n) => (e.hasAttribute(n) && (t[n] = e.getAttribute(n)), t),
                {},
            );
        }
        static match(e) {
            return (
                /\.(jpe?g|gif|png)$/.test(e) || /^data:image\/.+;base64/.test(e)
            );
        }
        static sanitize(e) {
            return Bh(e, [`http`, `https`, `data`]) ? e : `//:0`;
        }
        static value(e) {
            return e.getAttribute(`src`);
        }
        format(e, t) {
            Gh.indexOf(e) > -1
                ? t
                    ? this.domNode.setAttribute(e, t)
                    : this.domNode.removeAttribute(e)
                : super.format(e, t);
        }
    },
    qh = [`height`, `width`],
    Jh = class extends cp {
        static blotName = `video`;
        static className = `ql-video`;
        static tagName = `IFRAME`;
        static create(e) {
            let t = super.create(e);
            return (
                t.setAttribute(`frameborder`, `0`),
                t.setAttribute(`allowfullscreen`, `true`),
                t.setAttribute(`src`, this.sanitize(e)),
                t
            );
        }
        static formats(e) {
            return qh.reduce(
                (t, n) => (e.hasAttribute(n) && (t[n] = e.getAttribute(n)), t),
                {},
            );
        }
        static sanitize(e) {
            return zh.sanitize(e);
        }
        static value(e) {
            return e.getAttribute(`src`);
        }
        format(e, t) {
            qh.indexOf(e) > -1
                ? t
                    ? this.domNode.setAttribute(e, t)
                    : this.domNode.removeAttribute(e)
                : super.format(e, t);
        }
        html() {
            let { video: e } = this.value();
            return `<a href="${e}">${e}</a>`;
        }
    },
    Yh = new Ef(`code-token`, `hljs`, { scope: K.INLINE }),
    Xh = class e extends op {
        static formats(e, t) {
            for (; e != null && e !== t.domNode; ) {
                if (e.classList && e.classList.contains($.className))
                    return super.formats(e, t);
                e = e.parentNode;
            }
        }
        constructor(e, t, n) {
            (super(e, t, n), Yh.add(this.domNode, n));
        }
        format(t, n) {
            t === e.blotName
                ? n
                    ? Yh.add(this.domNode, n)
                    : (Yh.remove(this.domNode),
                      this.domNode.classList.remove(this.statics.className))
                : super.format(t, n);
        }
        optimize() {
            (super.optimize(...arguments),
                Yh.value(this.domNode) || this.unwrap());
        }
    };
((Xh.blotName = `code-token`), (Xh.className = `ql-token`));
var Zh = class extends $ {
        static create(e) {
            let t = super.create(e);
            return (
                typeof e == `string` && t.setAttribute(`data-language`, e),
                t
            );
        }
        static formats(e) {
            return e.getAttribute(`data-language`) || `plain`;
        }
        static register() {}
        format(e, t) {
            e === this.statics.blotName && t
                ? this.domNode.setAttribute(`data-language`, t)
                : super.format(e, t);
        }
        replaceWith(e, t) {
            return (
                this.formatAt(0, this.length(), Xh.blotName, !1),
                super.replaceWith(e, t)
            );
        }
    },
    Qh = class extends mm {
        attach() {
            (super.attach(),
                (this.forceNext = !1),
                this.scroll.emitMount(this));
        }
        format(e, t) {
            e === Zh.blotName &&
                ((this.forceNext = !0),
                this.children.forEach((n) => {
                    n.format(e, t);
                }));
        }
        formatAt(e, t, n, r) {
            (n === Zh.blotName && (this.forceNext = !0),
                super.formatAt(e, t, n, r));
        }
        highlight(e) {
            let t =
                arguments.length > 1 && arguments[1] !== void 0 && arguments[1];
            if (this.children.head == null) return;
            let n = `${Array.from(this.domNode.childNodes)
                    .filter((e) => e !== this.uiNode)
                    .map((e) => e.textContent).join(`
`)}\n`,
                r = Zh.formats(this.children.head.domNode);
            if (t || this.forceNext || this.cachedText !== n) {
                if (n.trim().length > 0 || this.cachedText == null) {
                    let t = this.children.reduce(
                            (e, t) => e.concat(lp(t, !1)),
                            new Y.default(),
                        ),
                        i = e(n, r);
                    t.diff(i).reduce((e, t) => {
                        let { retain: n, attributes: r } = t;
                        return n
                            ? (r &&
                                  Object.keys(r).forEach((t) => {
                                      [Zh.blotName, Xh.blotName].includes(t) &&
                                          this.formatAt(e, n, t, r[t]);
                                  }),
                              e + n)
                            : e;
                    }, 0);
                }
                ((this.cachedText = n), (this.forceNext = !1));
            }
        }
        html(e, t) {
            let [n] = this.children.find(e);
            return `<pre data-language="${n ? Zh.formats(n.domNode) : `plain`}">\n${ap(this.code(e, t))}\n</pre>`;
        }
        optimize(e) {
            if (
                (super.optimize(e),
                this.parent != null &&
                    this.children.head != null &&
                    this.uiNode != null)
            ) {
                let e = Zh.formats(this.children.head.domNode);
                e !== this.uiNode.value && (this.uiNode.value = e);
            }
        }
    };
((Qh.allowedChildren = [Zh]),
    (Zh.requiredContainer = Qh),
    (Zh.allowedChildren = [Xh, dp, rp, np]));
var $h = (e, t, n) => {
        if (typeof e.versionString == `string`) {
            let r = e.versionString.split(`.`)[0];
            if (parseInt(r, 10) >= 11)
                return e.highlight(n, { language: t }).value;
        }
        return e.highlight(t, n).value;
    },
    eg = class extends Mp {
        static register() {
            (Q.register(Xh, !0), Q.register(Zh, !0), Q.register(Qh, !0));
        }
        constructor(e, t) {
            if ((super(e, t), this.options.hljs == null))
                throw Error(
                    `Syntax module requires highlight.js. Please include the library on the page before Quill.`,
                );
            ((this.languages = this.options.languages.reduce((e, t) => {
                let { key: n } = t;
                return ((e[n] = !0), e);
            }, {})),
                (this.highlightBlot = this.highlightBlot.bind(this)),
                this.initListener(),
                this.initTimer());
        }
        initListener() {
            this.quill.on(Q.events.SCROLL_BLOT_MOUNT, (e) => {
                if (!(e instanceof Qh)) return;
                let t = this.quill.root.ownerDocument.createElement(`select`);
                (this.options.languages.forEach((e) => {
                    let { key: n, label: r } = e,
                        i = t.ownerDocument.createElement(`option`);
                    ((i.textContent = r),
                        i.setAttribute(`value`, n),
                        t.appendChild(i));
                }),
                    t.addEventListener(`change`, () => {
                        (e.format(Zh.blotName, t.value),
                            this.quill.root.focus(),
                            this.highlight(e, !0));
                    }),
                    e.uiNode ??
                        (e.attachUI(t),
                        e.children.head &&
                            (t.value = Zh.formats(e.children.head.domNode))));
            });
        }
        initTimer() {
            let e = null;
            this.quill.on(Q.events.SCROLL_OPTIMIZE, () => {
                (e && clearTimeout(e),
                    (e = setTimeout(() => {
                        (this.highlight(), (e = null));
                    }, this.options.interval)));
            });
        }
        highlight() {
            let e =
                    arguments.length > 0 && arguments[0] !== void 0
                        ? arguments[0]
                        : null,
                t =
                    arguments.length > 1 &&
                    arguments[1] !== void 0 &&
                    arguments[1];
            if (this.quill.selection.composing) return;
            this.quill.update(Q.sources.USER);
            let n = this.quill.getSelection();
            ((e == null ? this.quill.scroll.descendants(Qh) : [e]).forEach(
                (e) => {
                    e.highlight(this.highlightBlot, t);
                },
            ),
                this.quill.update(Q.sources.SILENT),
                n != null && this.quill.setSelection(n, Q.sources.SILENT));
        }
        highlightBlot(e) {
            let t =
                arguments.length > 1 && arguments[1] !== void 0
                    ? arguments[1]
                    : `plain`;
            if (((t = this.languages[t] ? t : `plain`), t === `plain`))
                return ap(e)
                    .split(
                        `
`,
                    )
                    .reduce(
                        (e, n, r) => (
                            r !== 0 &&
                                e.insert(
                                    `
`,
                                    { [$.blotName]: t },
                                ),
                            e.insert(n)
                        ),
                        new Y.default(),
                    );
            let n = this.quill.root.ownerDocument.createElement(`div`);
            return (
                n.classList.add($.className),
                (n.innerHTML = $h(this.options.hljs, t, e)),
                oh(
                    this.quill.scroll,
                    n,
                    [
                        (e, t) => {
                            let n = Yh.value(e);
                            return n
                                ? t.compose(
                                      new Y.default().retain(t.length(), {
                                          [Xh.blotName]: n,
                                      }),
                                  )
                                : t;
                        },
                    ],
                    [
                        (e, n) =>
                            e.data
                                .split(
                                    `
`,
                                )
                                .reduce(
                                    (e, n, r) => (
                                        r !== 0 &&
                                            e.insert(
                                                `
`,
                                                { [$.blotName]: t },
                                            ),
                                        e.insert(n)
                                    ),
                                    n,
                                ),
                    ],
                    new WeakMap(),
                )
            );
        }
    };
eg.DEFAULTS = {
    hljs: window.hljs,
    interval: 1e3,
    languages: [
        { key: `plain`, label: `Plain` },
        { key: `bash`, label: `Bash` },
        { key: `cpp`, label: `C++` },
        { key: `cs`, label: `C#` },
        { key: `css`, label: `CSS` },
        { key: `diff`, label: `Diff` },
        { key: `xml`, label: `HTML/XML` },
        { key: `java`, label: `Java` },
        { key: `javascript`, label: `JavaScript` },
        { key: `markdown`, label: `Markdown` },
        { key: `php`, label: `PHP` },
        { key: `python`, label: `Python` },
        { key: `ruby`, label: `Ruby` },
        { key: `sql`, label: `SQL` },
    ],
};
var tg = class e extends X {
        static blotName = `table`;
        static tagName = `TD`;
        static create(e) {
            let t = super.create();
            return (
                e
                    ? t.setAttribute(`data-row`, e)
                    : t.setAttribute(`data-row`, ag()),
                t
            );
        }
        static formats(e) {
            if (e.hasAttribute(`data-row`)) return e.getAttribute(`data-row`);
        }
        cellOffset() {
            return this.parent ? this.parent.children.indexOf(this) : -1;
        }
        format(t, n) {
            t === e.blotName && n
                ? this.domNode.setAttribute(`data-row`, n)
                : super.format(t, n);
        }
        row() {
            return this.parent;
        }
        rowOffset() {
            return this.row() ? this.row().rowOffset() : -1;
        }
        table() {
            return this.row() && this.row().table();
        }
    },
    ng = class extends em {
        static blotName = `table-row`;
        static tagName = `TR`;
        checkMerge() {
            if (super.checkMerge() && this.next.children.head != null) {
                let e = this.children.head.formats(),
                    t = this.children.tail.formats(),
                    n = this.next.children.head.formats(),
                    r = this.next.children.tail.formats();
                return (
                    e.table === t.table &&
                    e.table === n.table &&
                    e.table === r.table
                );
            }
            return !1;
        }
        optimize(e) {
            (super.optimize(e),
                this.children.forEach((e) => {
                    if (e.next == null) return;
                    let t = e.formats(),
                        n = e.next.formats();
                    if (t.table !== n.table) {
                        let t = this.splitAfter(e);
                        (t && t.optimize(), this.prev && this.prev.optimize());
                    }
                }));
        }
        rowOffset() {
            return this.parent ? this.parent.children.indexOf(this) : -1;
        }
        table() {
            return this.parent && this.parent.parent;
        }
    },
    rg = class extends em {
        static blotName = `table-body`;
        static tagName = `TBODY`;
    },
    ig = class extends em {
        static blotName = `table-container`;
        static tagName = `TABLE`;
        balanceCells() {
            let e = this.descendants(ng),
                t = e.reduce((e, t) => Math.max(t.children.length, e), 0);
            e.forEach((e) => {
                Array(t - e.children.length)
                    .fill(0)
                    .forEach(() => {
                        let t;
                        e.children.head != null &&
                            (t = tg.formats(e.children.head.domNode));
                        let n = this.scroll.create(tg.blotName, t);
                        (e.appendChild(n), n.optimize());
                    });
            });
        }
        cells(e) {
            return this.rows().map((t) => t.children.at(e));
        }
        deleteColumn(e) {
            let [t] = this.descendant(rg);
            t == null ||
                t.children.head == null ||
                t.children.forEach((t) => {
                    t.children.at(e)?.remove();
                });
        }
        insertColumn(e) {
            let [t] = this.descendant(rg);
            t == null ||
                t.children.head == null ||
                t.children.forEach((t) => {
                    let n = t.children.at(e),
                        r = tg.formats(t.children.head.domNode),
                        i = this.scroll.create(tg.blotName, r);
                    t.insertBefore(i, n);
                });
        }
        insertRow(e) {
            let [t] = this.descendant(rg);
            if (t == null || t.children.head == null) return;
            let n = ag(),
                r = this.scroll.create(ng.blotName);
            t.children.head.children.forEach(() => {
                let e = this.scroll.create(tg.blotName, n);
                r.appendChild(e);
            });
            let i = t.children.at(e);
            t.insertBefore(r, i);
        }
        rows() {
            let e = this.children.head;
            return e == null ? [] : e.children.map((e) => e);
        }
    };
((ig.allowedChildren = [rg]),
    (rg.requiredContainer = ig),
    (rg.allowedChildren = [ng]),
    (ng.requiredContainer = rg),
    (ng.allowedChildren = [tg]),
    (tg.requiredContainer = ng));
function ag() {
    return `row-${Math.random().toString(36).slice(2, 6)}`;
}
var og = class extends Mp {
        static register() {
            (Q.register(tg), Q.register(ng), Q.register(rg), Q.register(ig));
        }
        constructor() {
            (super(...arguments), this.listenBalanceCells());
        }
        balanceTables() {
            this.quill.scroll.descendants(ig).forEach((e) => {
                e.balanceCells();
            });
        }
        deleteColumn() {
            let [e, , t] = this.getTable();
            t != null &&
                (e.deleteColumn(t.cellOffset()),
                this.quill.update(Q.sources.USER));
        }
        deleteRow() {
            let [, e] = this.getTable();
            e != null && (e.remove(), this.quill.update(Q.sources.USER));
        }
        deleteTable() {
            let [e] = this.getTable();
            if (e == null) return;
            let t = e.offset();
            (e.remove(),
                this.quill.update(Q.sources.USER),
                this.quill.setSelection(t, Q.sources.SILENT));
        }
        getTable() {
            let e =
                arguments.length > 0 && arguments[0] !== void 0
                    ? arguments[0]
                    : this.quill.getSelection();
            if (e == null) return [null, null, null, -1];
            let [t, n] = this.quill.getLine(e.index);
            if (t == null || t.statics.blotName !== tg.blotName)
                return [null, null, null, -1];
            let r = t.parent;
            return [r.parent.parent, r, t, n];
        }
        insertColumn(e) {
            let t = this.quill.getSelection();
            if (!t) return;
            let [n, r, i] = this.getTable(t);
            if (i == null) return;
            let a = i.cellOffset();
            (n.insertColumn(a + e), this.quill.update(Q.sources.USER));
            let o = r.rowOffset();
            (e === 0 && (o += 1),
                this.quill.setSelection(
                    t.index + o,
                    t.length,
                    Q.sources.SILENT,
                ));
        }
        insertColumnLeft() {
            this.insertColumn(0);
        }
        insertColumnRight() {
            this.insertColumn(1);
        }
        insertRow(e) {
            let t = this.quill.getSelection();
            if (!t) return;
            let [n, r, i] = this.getTable(t);
            if (i == null) return;
            let a = r.rowOffset();
            (n.insertRow(a + e),
                this.quill.update(Q.sources.USER),
                e > 0
                    ? this.quill.setSelection(t, Q.sources.SILENT)
                    : this.quill.setSelection(
                          t.index + r.children.length,
                          t.length,
                          Q.sources.SILENT,
                      ));
        }
        insertRowAbove() {
            this.insertRow(0);
        }
        insertRowBelow() {
            this.insertRow(1);
        }
        insertTable(e, t) {
            let n = this.quill.getSelection();
            if (n == null) return;
            let r = Array(e)
                .fill(0)
                .reduce((e) => {
                    let n = Array(t)
                        .fill(
                            `
`,
                        )
                        .join(``);
                    return e.insert(n, { table: ag() });
                }, new Y.default().retain(n.index));
            (this.quill.updateContents(r, Q.sources.USER),
                this.quill.setSelection(n.index, Q.sources.SILENT),
                this.balanceTables());
        }
        listenBalanceCells() {
            this.quill.on(Q.events.SCROLL_OPTIMIZE, (e) => {
                e.some((e) =>
                    [`TD`, `TR`, `TBODY`, `TABLE`].includes(e.target.tagName)
                        ? (this.quill.once(Q.events.TEXT_CHANGE, (e, t, n) => {
                              n === Q.sources.USER && this.balanceTables();
                          }),
                          !0)
                        : !1,
                );
            });
        }
    },
    sg = _p(`quill:toolbar`),
    cg = class extends Mp {
        constructor(e, t) {
            if ((super(e, t), Array.isArray(this.options.container))) {
                let t = document.createElement(`div`);
                (t.setAttribute(`role`, `toolbar`),
                    ug(t, this.options.container),
                    e.container?.parentNode?.insertBefore(t, e.container),
                    (this.container = t));
            } else
                typeof this.options.container == `string`
                    ? (this.container = document.querySelector(
                          this.options.container,
                      ))
                    : (this.container = this.options.container);
            if (!(this.container instanceof HTMLElement)) {
                sg.error(`Container required for toolbar`, this.options);
                return;
            }
            (this.container.classList.add(`ql-toolbar`),
                (this.controls = []),
                (this.handlers = {}),
                this.options.handlers &&
                    Object.keys(this.options.handlers).forEach((e) => {
                        let t = this.options.handlers?.[e];
                        t && this.addHandler(e, t);
                    }),
                Array.from(
                    this.container.querySelectorAll(`button, select`),
                ).forEach((e) => {
                    this.attach(e);
                }),
                this.quill.on(Q.events.EDITOR_CHANGE, () => {
                    let [e] = this.quill.selection.getRange();
                    this.update(e);
                }));
        }
        addHandler(e, t) {
            this.handlers[e] = t;
        }
        attach(e) {
            let t = Array.from(e.classList).find((e) => e.indexOf(`ql-`) === 0);
            if (!t) return;
            if (
                ((t = t.slice(3)),
                e.tagName === `BUTTON` && e.setAttribute(`type`, `button`),
                this.handlers[t] == null && this.quill.scroll.query(t) == null)
            ) {
                sg.warn(`ignoring attaching to nonexistent format`, t, e);
                return;
            }
            let n = e.tagName === `SELECT` ? `change` : `click`;
            (e.addEventListener(n, (n) => {
                let r;
                if (e.tagName === `SELECT`) {
                    if (e.selectedIndex < 0) return;
                    let t = e.options[e.selectedIndex];
                    r = t.hasAttribute(`selected`) ? !1 : t.value || !1;
                } else
                    ((r = e.classList.contains(`ql-active`)
                        ? !1
                        : e.value || !e.hasAttribute(`value`)),
                        n.preventDefault());
                this.quill.focus();
                let [i] = this.quill.selection.getRange();
                if (this.handlers[t] != null) this.handlers[t].call(this, r);
                else if (this.quill.scroll.query(t).prototype instanceof J) {
                    if (((r = prompt(`Enter ${t}`)), !r)) return;
                    this.quill.updateContents(
                        new Y.default()
                            .retain(i.index)
                            .delete(i.length)
                            .insert({ [t]: r }),
                        Q.sources.USER,
                    );
                } else this.quill.format(t, r, Q.sources.USER);
                this.update(i);
            }),
                this.controls.push([t, e]));
        }
        update(e) {
            let t = e == null ? {} : this.quill.getFormat(e);
            this.controls.forEach((n) => {
                let [r, i] = n;
                if (i.tagName === `SELECT`) {
                    let n = null;
                    if (e == null) n = null;
                    else if (t[r] == null)
                        n = i.querySelector(`option[selected]`);
                    else if (!Array.isArray(t[r])) {
                        let e = t[r];
                        (typeof e == `string` && (e = e.replace(/"/g, `\\"`)),
                            (n = i.querySelector(`option[value="${e}"]`)));
                    }
                    n == null
                        ? ((i.value = ``), (i.selectedIndex = -1))
                        : (n.selected = !0);
                } else if (e == null)
                    (i.classList.remove(`ql-active`),
                        i.setAttribute(`aria-pressed`, `false`));
                else if (i.hasAttribute(`value`)) {
                    let e = t[r],
                        n =
                            e === i.getAttribute(`value`) ||
                            (e != null &&
                                e.toString() === i.getAttribute(`value`)) ||
                            (e == null && !i.getAttribute(`value`));
                    (i.classList.toggle(`ql-active`, n),
                        i.setAttribute(`aria-pressed`, n.toString()));
                } else {
                    let e = t[r] != null;
                    (i.classList.toggle(`ql-active`, e),
                        i.setAttribute(`aria-pressed`, e.toString()));
                }
            });
        }
    };
cg.DEFAULTS = {};
function lg(e, t, n) {
    let r = document.createElement(`button`);
    (r.setAttribute(`type`, `button`),
        r.classList.add(`ql-${t}`),
        r.setAttribute(`aria-pressed`, `false`),
        n == null
            ? r.setAttribute(`aria-label`, t)
            : ((r.value = n), r.setAttribute(`aria-label`, `${t}: ${n}`)),
        e.appendChild(r));
}
function ug(e, t) {
    (Array.isArray(t[0]) || (t = [t]),
        t.forEach((t) => {
            let n = document.createElement(`span`);
            (n.classList.add(`ql-formats`),
                t.forEach((e) => {
                    if (typeof e == `string`) lg(n, e);
                    else {
                        let t = Object.keys(e)[0],
                            r = e[t];
                        Array.isArray(r) ? dg(n, t, r) : lg(n, t, r);
                    }
                }),
                e.appendChild(n));
        }));
}
function dg(e, t, n) {
    let r = document.createElement(`select`);
    (r.classList.add(`ql-${t}`),
        n.forEach((e) => {
            let t = document.createElement(`option`);
            (e === !1
                ? t.setAttribute(`selected`, `selected`)
                : t.setAttribute(`value`, String(e)),
                r.appendChild(t));
        }),
        e.appendChild(r));
}
cg.DEFAULTS = {
    container: null,
    handlers: {
        clean() {
            let e = this.quill.getSelection();
            if (e != null)
                if (e.length === 0) {
                    let e = this.quill.getFormat();
                    Object.keys(e).forEach((e) => {
                        this.quill.scroll.query(e, K.INLINE) != null &&
                            this.quill.format(e, !1, Q.sources.USER);
                    });
                } else
                    this.quill.removeFormat(e.index, e.length, Q.sources.USER);
        },
        direction(e) {
            let { align: t } = this.quill.getFormat();
            (e === `rtl` && t == null
                ? this.quill.format(`align`, `right`, Q.sources.USER)
                : !e &&
                  t === `right` &&
                  this.quill.format(`align`, !1, Q.sources.USER),
                this.quill.format(`direction`, e, Q.sources.USER));
        },
        indent(e) {
            let t = this.quill.getSelection(),
                n = this.quill.getFormat(t),
                r = parseInt(n.indent || 0, 10);
            if (e === `+1` || e === `-1`) {
                let t = e === `+1` ? 1 : -1;
                (n.direction === `rtl` && (t *= -1),
                    this.quill.format(`indent`, r + t, Q.sources.USER));
            }
        },
        link(e) {
            (e === !0 && (e = prompt(`Enter link URL:`)),
                this.quill.format(`link`, e, Q.sources.USER));
        },
        list(e) {
            let t = this.quill.getSelection(),
                n = this.quill.getFormat(t);
            e === `check`
                ? n.list === `checked` || n.list === `unchecked`
                    ? this.quill.format(`list`, !1, Q.sources.USER)
                    : this.quill.format(`list`, `unchecked`, Q.sources.USER)
                : this.quill.format(`list`, e, Q.sources.USER);
        },
    },
};
var fg = `<svg viewbox="0 0 18 18"><line class="ql-stroke" x1="3" x2="15" y1="9" y2="9"/><line class="ql-stroke" x1="3" x2="13" y1="14" y2="14"/><line class="ql-stroke" x1="3" x2="9" y1="4" y2="4"/></svg>`,
    pg = `<svg viewbox="0 0 18 18"><line class="ql-stroke" x1="15" x2="3" y1="9" y2="9"/><line class="ql-stroke" x1="14" x2="4" y1="14" y2="14"/><line class="ql-stroke" x1="12" x2="6" y1="4" y2="4"/></svg>`,
    mg = `<svg viewbox="0 0 18 18"><line class="ql-stroke" x1="15" x2="3" y1="9" y2="9"/><line class="ql-stroke" x1="15" x2="5" y1="14" y2="14"/><line class="ql-stroke" x1="15" x2="9" y1="4" y2="4"/></svg>`,
    hg = `<svg viewbox="0 0 18 18"><line class="ql-stroke" x1="15" x2="3" y1="9" y2="9"/><line class="ql-stroke" x1="15" x2="3" y1="14" y2="14"/><line class="ql-stroke" x1="15" x2="3" y1="4" y2="4"/></svg>`,
    gg = `<svg viewbox="0 0 18 18"><g class="ql-fill ql-color-label"><polygon points="6 6.868 6 6 5 6 5 7 5.942 7 6 6.868"/><rect height="1" width="1" x="4" y="4"/><polygon points="6.817 5 6 5 6 6 6.38 6 6.817 5"/><rect height="1" width="1" x="2" y="6"/><rect height="1" width="1" x="3" y="5"/><rect height="1" width="1" x="4" y="7"/><polygon points="4 11.439 4 11 3 11 3 12 3.755 12 4 11.439"/><rect height="1" width="1" x="2" y="12"/><rect height="1" width="1" x="2" y="9"/><rect height="1" width="1" x="2" y="15"/><polygon points="4.63 10 4 10 4 11 4.192 11 4.63 10"/><rect height="1" width="1" x="3" y="8"/><path d="M10.832,4.2L11,4.582V4H10.708A1.948,1.948,0,0,1,10.832,4.2Z"/><path d="M7,4.582L7.168,4.2A1.929,1.929,0,0,1,7.292,4H7V4.582Z"/><path d="M8,13H7.683l-0.351.8a1.933,1.933,0,0,1-.124.2H8V13Z"/><rect height="1" width="1" x="12" y="2"/><rect height="1" width="1" x="11" y="3"/><path d="M9,3H8V3.282A1.985,1.985,0,0,1,9,3Z"/><rect height="1" width="1" x="2" y="3"/><rect height="1" width="1" x="6" y="2"/><rect height="1" width="1" x="3" y="2"/><rect height="1" width="1" x="5" y="3"/><rect height="1" width="1" x="9" y="2"/><rect height="1" width="1" x="15" y="14"/><polygon points="13.447 10.174 13.469 10.225 13.472 10.232 13.808 11 14 11 14 10 13.37 10 13.447 10.174"/><rect height="1" width="1" x="13" y="7"/><rect height="1" width="1" x="15" y="5"/><rect height="1" width="1" x="14" y="6"/><rect height="1" width="1" x="15" y="8"/><rect height="1" width="1" x="14" y="9"/><path d="M3.775,14H3v1H4V14.314A1.97,1.97,0,0,1,3.775,14Z"/><rect height="1" width="1" x="14" y="3"/><polygon points="12 6.868 12 6 11.62 6 12 6.868"/><rect height="1" width="1" x="15" y="2"/><rect height="1" width="1" x="12" y="5"/><rect height="1" width="1" x="13" y="4"/><polygon points="12.933 9 13 9 13 8 12.495 8 12.933 9"/><rect height="1" width="1" x="9" y="14"/><rect height="1" width="1" x="8" y="15"/><path d="M6,14.926V15H7V14.316A1.993,1.993,0,0,1,6,14.926Z"/><rect height="1" width="1" x="5" y="15"/><path d="M10.668,13.8L10.317,13H10v1h0.792A1.947,1.947,0,0,1,10.668,13.8Z"/><rect height="1" width="1" x="11" y="15"/><path d="M14.332,12.2a1.99,1.99,0,0,1,.166.8H15V12H14.245Z"/><rect height="1" width="1" x="14" y="15"/><rect height="1" width="1" x="15" y="11"/></g><polyline class="ql-stroke" points="5.5 13 9 5 12.5 13"/><line class="ql-stroke" x1="11.63" x2="6.38" y1="11" y2="11"/></svg>`,
    _g = `<svg viewbox="0 0 18 18"><rect class="ql-fill ql-stroke" height="3" width="3" x="4" y="5"/><rect class="ql-fill ql-stroke" height="3" width="3" x="11" y="5"/><path class="ql-even ql-fill ql-stroke" d="M7,8c0,4.031-3,5-3,5"/><path class="ql-even ql-fill ql-stroke" d="M14,8c0,4.031-3,5-3,5"/></svg>`,
    vg = `<svg viewbox="0 0 18 18"><path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"/><path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"/></svg>`,
    yg = `<svg class="" viewbox="0 0 18 18"><line class="ql-stroke" x1="5" x2="13" y1="3" y2="3"/><line class="ql-stroke" x1="6" x2="9.35" y1="12" y2="3"/><line class="ql-stroke" x1="11" x2="15" y1="11" y2="15"/><line class="ql-stroke" x1="15" x2="11" y1="11" y2="15"/><rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="7" x="2" y="14"/></svg>`,
    bg = `<svg viewbox="0 0 18 18"><polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"/><polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"/><line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"/></svg>`,
    xg = {
        align: { "": fg, center: pg, right: mg, justify: hg },
        background: gg,
        blockquote: _g,
        bold: vg,
        clean: yg,
        code: bg,
        "code-block": bg,
        color: `<svg viewbox="0 0 18 18"><line class="ql-color-label ql-stroke ql-transparent" x1="3" x2="15" y1="15" y2="15"/><polyline class="ql-stroke" points="5.5 11 9 3 12.5 11"/><line class="ql-stroke" x1="11.63" x2="6.38" y1="9" y2="9"/></svg>`,
        direction: {
            "": `<svg viewbox="0 0 18 18"><polygon class="ql-stroke ql-fill" points="3 11 5 9 3 7 3 11"/><line class="ql-stroke ql-fill" x1="15" x2="11" y1="4" y2="4"/><path class="ql-fill" d="M11,3a3,3,0,0,0,0,6h1V3H11Z"/><rect class="ql-fill" height="11" width="1" x="11" y="4"/><rect class="ql-fill" height="11" width="1" x="13" y="4"/></svg>`,
            rtl: `<svg viewbox="0 0 18 18"><polygon class="ql-stroke ql-fill" points="15 12 13 10 15 8 15 12"/><line class="ql-stroke ql-fill" x1="9" x2="5" y1="4" y2="4"/><path class="ql-fill" d="M5,3A3,3,0,0,0,5,9H6V3H5Z"/><rect class="ql-fill" height="11" width="1" x="5" y="4"/><rect class="ql-fill" height="11" width="1" x="7" y="4"/></svg>`,
        },
        formula: `<svg viewbox="0 0 18 18"><path class="ql-fill" d="M11.759,2.482a2.561,2.561,0,0,0-3.53.607A7.656,7.656,0,0,0,6.8,6.2C6.109,9.188,5.275,14.677,4.15,14.927a1.545,1.545,0,0,0-1.3-.933A0.922,0.922,0,0,0,2,15.036S1.954,16,4.119,16s3.091-2.691,3.7-5.553c0.177-.826.36-1.726,0.554-2.6L8.775,6.2c0.381-1.421.807-2.521,1.306-2.676a1.014,1.014,0,0,0,1.02.56A0.966,0.966,0,0,0,11.759,2.482Z"/><rect class="ql-fill" height="1.6" rx="0.8" ry="0.8" width="5" x="5.15" y="6.2"/><path class="ql-fill" d="M13.663,12.027a1.662,1.662,0,0,1,.266-0.276q0.193,0.069.456,0.138a2.1,2.1,0,0,0,.535.069,1.075,1.075,0,0,0,.767-0.3,1.044,1.044,0,0,0,.314-0.8,0.84,0.84,0,0,0-.238-0.619,0.8,0.8,0,0,0-.594-0.239,1.154,1.154,0,0,0-.781.3,4.607,4.607,0,0,0-.781,1q-0.091.15-.218,0.346l-0.246.38c-0.068-.288-0.137-0.582-0.212-0.885-0.459-1.847-2.494-.984-2.941-0.8-0.482.2-.353,0.647-0.094,0.529a0.869,0.869,0,0,1,1.281.585c0.217,0.751.377,1.436,0.527,2.038a5.688,5.688,0,0,1-.362.467,2.69,2.69,0,0,1-.264.271q-0.221-.08-0.471-0.147a2.029,2.029,0,0,0-.522-0.066,1.079,1.079,0,0,0-.768.3A1.058,1.058,0,0,0,9,15.131a0.82,0.82,0,0,0,.832.852,1.134,1.134,0,0,0,.787-0.3,5.11,5.11,0,0,0,.776-0.993q0.141-.219.215-0.34c0.046-.076.122-0.194,0.223-0.346a2.786,2.786,0,0,0,.918,1.726,2.582,2.582,0,0,0,2.376-.185c0.317-.181.212-0.565,0-0.494A0.807,0.807,0,0,1,14.176,15a5.159,5.159,0,0,1-.913-2.446l0,0Q13.487,12.24,13.663,12.027Z"/></svg>`,
        header: {
            1: `<svg viewBox="0 0 18 18"><path class="ql-fill" d="M10,4V14a1,1,0,0,1-2,0V10H3v4a1,1,0,0,1-2,0V4A1,1,0,0,1,3,4V8H8V4a1,1,0,0,1,2,0Zm6.06787,9.209H14.98975V7.59863a.54085.54085,0,0,0-.605-.60547h-.62744a1.01119,1.01119,0,0,0-.748.29688L11.645,8.56641a.5435.5435,0,0,0-.022.8584l.28613.30762a.53861.53861,0,0,0,.84717.0332l.09912-.08789a1.2137,1.2137,0,0,0,.2417-.35254h.02246s-.01123.30859-.01123.60547V13.209H12.041a.54085.54085,0,0,0-.605.60547v.43945a.54085.54085,0,0,0,.605.60547h4.02686a.54085.54085,0,0,0,.605-.60547v-.43945A.54085.54085,0,0,0,16.06787,13.209Z"/></svg>`,
            2: `<svg viewBox="0 0 18 18"><path class="ql-fill" d="M16.73975,13.81445v.43945a.54085.54085,0,0,1-.605.60547H11.855a.58392.58392,0,0,1-.64893-.60547V14.0127c0-2.90527,3.39941-3.42187,3.39941-4.55469a.77675.77675,0,0,0-.84717-.78125,1.17684,1.17684,0,0,0-.83594.38477c-.2749.26367-.561.374-.85791.13184l-.4292-.34082c-.30811-.24219-.38525-.51758-.1543-.81445a2.97155,2.97155,0,0,1,2.45361-1.17676,2.45393,2.45393,0,0,1,2.68408,2.40918c0,2.45312-3.1792,2.92676-3.27832,3.93848h2.79443A.54085.54085,0,0,1,16.73975,13.81445ZM9,3A.99974.99974,0,0,0,8,4V8H3V4A1,1,0,0,0,1,4V14a1,1,0,0,0,2,0V10H8v4a1,1,0,0,0,2,0V4A.99974.99974,0,0,0,9,3Z"/></svg>`,
            3: `<svg viewBox="0 0 18 18"><path class="ql-fill" d="M16.65186,12.30664a2.6742,2.6742,0,0,1-2.915,2.68457,3.96592,3.96592,0,0,1-2.25537-.6709.56007.56007,0,0,1-.13232-.83594L11.64648,13c.209-.34082.48389-.36328.82471-.1543a2.32654,2.32654,0,0,0,1.12256.33008c.71484,0,1.12207-.35156,1.12207-.78125,0-.61523-.61621-.86816-1.46338-.86816H13.2085a.65159.65159,0,0,1-.68213-.41895l-.05518-.10937a.67114.67114,0,0,1,.14307-.78125l.71533-.86914a8.55289,8.55289,0,0,1,.68213-.7373V8.58887a3.93913,3.93913,0,0,1-.748.05469H11.9873a.54085.54085,0,0,1-.605-.60547V7.59863a.54085.54085,0,0,1,.605-.60547h3.75146a.53773.53773,0,0,1,.60547.59375v.17676a1.03723,1.03723,0,0,1-.27539.748L14.74854,10.0293A2.31132,2.31132,0,0,1,16.65186,12.30664ZM9,3A.99974.99974,0,0,0,8,4V8H3V4A1,1,0,0,0,1,4V14a1,1,0,0,0,2,0V10H8v4a1,1,0,0,0,2,0V4A.99974.99974,0,0,0,9,3Z"/></svg>`,
            4: `<svg viewBox="0 0 18 18"><path class="ql-fill" d="M10,4V14a1,1,0,0,1-2,0V10H3v4a1,1,0,0,1-2,0V4A1,1,0,0,1,3,4V8H8V4a1,1,0,0,1,2,0Zm7.05371,7.96582v.38477c0,.39648-.165.60547-.46191.60547h-.47314v1.29785a.54085.54085,0,0,1-.605.60547h-.69336a.54085.54085,0,0,1-.605-.60547V12.95605H11.333a.5412.5412,0,0,1-.60547-.60547v-.15332a1.199,1.199,0,0,1,.22021-.748l2.56348-4.05957a.7819.7819,0,0,1,.72607-.39648h1.27637a.54085.54085,0,0,1,.605.60547v3.7627h.33008A.54055.54055,0,0,1,17.05371,11.96582ZM14.28125,8.7207h-.022a4.18969,4.18969,0,0,1-.38525.81348l-1.188,1.80469v.02246h1.5293V9.60059A7.04058,7.04058,0,0,1,14.28125,8.7207Z"/></svg>`,
            5: `<svg viewBox="0 0 18 18"><path class="ql-fill" d="M16.74023,12.18555a2.75131,2.75131,0,0,1-2.91553,2.80566,3.908,3.908,0,0,1-2.25537-.68164.54809.54809,0,0,1-.13184-.8252L11.73438,13c.209-.34082.48389-.36328.8252-.1543a2.23757,2.23757,0,0,0,1.1001.33008,1.01827,1.01827,0,0,0,1.1001-.96777c0-.61621-.53906-.97949-1.25439-.97949a2.15554,2.15554,0,0,0-.64893.09961,1.15209,1.15209,0,0,1-.814.01074l-.12109-.04395a.64116.64116,0,0,1-.45117-.71484l.231-3.00391a.56666.56666,0,0,1,.62744-.583H15.541a.54085.54085,0,0,1,.605.60547v.43945a.54085.54085,0,0,1-.605.60547H13.41748l-.04395.72559a1.29306,1.29306,0,0,1-.04395.30859h.022a2.39776,2.39776,0,0,1,.57227-.07715A2.53266,2.53266,0,0,1,16.74023,12.18555ZM9,3A.99974.99974,0,0,0,8,4V8H3V4A1,1,0,0,0,1,4V14a1,1,0,0,0,2,0V10H8v4a1,1,0,0,0,2,0V4A.99974.99974,0,0,0,9,3Z"/></svg>`,
            6: `<svg viewBox="0 0 18 18"><path class="ql-fill" d="M14.51758,9.64453a1.85627,1.85627,0,0,0-1.24316.38477H13.252a1.73532,1.73532,0,0,1,1.72754-1.4082,2.66491,2.66491,0,0,1,.5498.06641c.35254.05469.57227.01074.70508-.40723l.16406-.5166a.53393.53393,0,0,0-.373-.75977,4.83723,4.83723,0,0,0-1.17773-.14258c-2.43164,0-3.7627,2.17773-3.7627,4.43359,0,2.47559,1.60645,3.69629,3.19043,3.69629A2.70585,2.70585,0,0,0,16.96,12.19727,2.43861,2.43861,0,0,0,14.51758,9.64453Zm-.23047,3.58691c-.67187,0-1.22168-.81445-1.22168-1.45215,0-.47363.30762-.583.72559-.583.96875,0,1.27734.59375,1.27734,1.12207A.82182.82182,0,0,1,14.28711,13.23145ZM10,4V14a1,1,0,0,1-2,0V10H3v4a1,1,0,0,1-2,0V4A1,1,0,0,1,3,4V8H8V4a1,1,0,0,1,2,0Z"/></svg>`,
        },
        italic: `<svg viewbox="0 0 18 18"><line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"/><line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"/><line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"/></svg>`,
        image: `<svg viewbox="0 0 18 18"><rect class="ql-stroke" height="10" width="12" x="3" y="4"/><circle class="ql-fill" cx="6" cy="7" r="1"/><polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"/></svg>`,
        indent: {
            "+1": `<svg viewbox="0 0 18 18"><line class="ql-stroke" x1="3" x2="15" y1="14" y2="14"/><line class="ql-stroke" x1="3" x2="15" y1="4" y2="4"/><line class="ql-stroke" x1="9" x2="15" y1="9" y2="9"/><polyline class="ql-fill ql-stroke" points="3 7 3 11 5 9 3 7"/></svg>`,
            "-1": `<svg viewbox="0 0 18 18"><line class="ql-stroke" x1="3" x2="15" y1="14" y2="14"/><line class="ql-stroke" x1="3" x2="15" y1="4" y2="4"/><line class="ql-stroke" x1="9" x2="15" y1="9" y2="9"/><polyline class="ql-stroke" points="5 7 5 11 3 9 5 7"/></svg>`,
        },
        link: `<svg viewbox="0 0 18 18"><line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"/><path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"/><path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"/></svg>`,
        list: {
            bullet: `<svg viewbox="0 0 18 18"><line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"/><line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"/><line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"/><line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"/><line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"/><line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"/></svg>`,
            check: `<svg class="" viewbox="0 0 18 18"><line class="ql-stroke" x1="9" x2="15" y1="4" y2="4"/><polyline class="ql-stroke" points="3 4 4 5 6 3"/><line class="ql-stroke" x1="9" x2="15" y1="14" y2="14"/><polyline class="ql-stroke" points="3 14 4 15 6 13"/><line class="ql-stroke" x1="9" x2="15" y1="9" y2="9"/><polyline class="ql-stroke" points="3 9 4 10 6 8"/></svg>`,
            ordered: `<svg viewbox="0 0 18 18"><line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"/><line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"/><line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"/><line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"/><path class="ql-fill" d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"/><path class="ql-stroke ql-thin" d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"/><path class="ql-stroke ql-thin" d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"/></svg>`,
        },
        script: {
            sub: `<svg viewbox="0 0 18 18"><path class="ql-fill" d="M15.5,15H13.861a3.858,3.858,0,0,0,1.914-2.975,1.8,1.8,0,0,0-1.6-1.751A1.921,1.921,0,0,0,12.021,11.7a0.50013,0.50013,0,1,0,.957.291h0a0.914,0.914,0,0,1,1.053-.725,0.81,0.81,0,0,1,.744.762c0,1.076-1.16971,1.86982-1.93971,2.43082A1.45639,1.45639,0,0,0,12,15.5a0.5,0.5,0,0,0,.5.5h3A0.5,0.5,0,0,0,15.5,15Z"/><path class="ql-fill" d="M9.65,5.241a1,1,0,0,0-1.409.108L6,7.964,3.759,5.349A1,1,0,0,0,2.192,6.59178Q2.21541,6.6213,2.241,6.649L4.684,9.5,2.241,12.35A1,1,0,0,0,3.71,13.70722q0.02557-.02768.049-0.05722L6,11.036,8.241,13.65a1,1,0,1,0,1.567-1.24277Q9.78459,12.3777,9.759,12.35L7.316,9.5,9.759,6.651A1,1,0,0,0,9.65,5.241Z"/></svg>`,
            super: `<svg viewbox="0 0 18 18"><path class="ql-fill" d="M15.5,7H13.861a4.015,4.015,0,0,0,1.914-2.975,1.8,1.8,0,0,0-1.6-1.751A1.922,1.922,0,0,0,12.021,3.7a0.5,0.5,0,1,0,.957.291,0.917,0.917,0,0,1,1.053-.725,0.81,0.81,0,0,1,.744.762c0,1.077-1.164,1.925-1.934,2.486A1.423,1.423,0,0,0,12,7.5a0.5,0.5,0,0,0,.5.5h3A0.5,0.5,0,0,0,15.5,7Z"/><path class="ql-fill" d="M9.651,5.241a1,1,0,0,0-1.41.108L6,7.964,3.759,5.349a1,1,0,1,0-1.519,1.3L4.683,9.5,2.241,12.35a1,1,0,1,0,1.519,1.3L6,11.036,8.241,13.65a1,1,0,0,0,1.519-1.3L7.317,9.5,9.759,6.651A1,1,0,0,0,9.651,5.241Z"/></svg>`,
        },
        strike: `<svg viewbox="0 0 18 18"><line class="ql-stroke ql-thin" x1="15.5" x2="2.5" y1="8.5" y2="9.5"/><path class="ql-fill" d="M9.007,8C6.542,7.791,6,7.519,6,6.5,6,5.792,7.283,5,9,5c1.571,0,2.765.679,2.969,1.309a1,1,0,0,0,1.9-.617C13.356,4.106,11.354,3,9,3,6.2,3,4,4.538,4,6.5a3.2,3.2,0,0,0,.5,1.843Z"/><path class="ql-fill" d="M8.984,10C11.457,10.208,12,10.479,12,11.5c0,0.708-1.283,1.5-3,1.5-1.571,0-2.765-.679-2.969-1.309a1,1,0,1,0-1.9.617C4.644,13.894,6.646,15,9,15c2.8,0,5-1.538,5-3.5a3.2,3.2,0,0,0-.5-1.843Z"/></svg>`,
        table: `<svg viewbox="0 0 18 18"><rect class="ql-stroke" height="12" width="12" x="3" y="3"/><rect class="ql-fill" height="2" width="3" x="5" y="5"/><rect class="ql-fill" height="2" width="4" x="9" y="5"/><g class="ql-fill ql-transparent"><rect height="2" width="3" x="5" y="8"/><rect height="2" width="4" x="9" y="8"/><rect height="2" width="3" x="5" y="11"/><rect height="2" width="4" x="9" y="11"/></g></svg>`,
        underline: `<svg viewbox="0 0 18 18"><path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"/><rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"/></svg>`,
        video: `<svg viewbox="0 0 18 18"><rect class="ql-stroke" height="12" width="12" x="3" y="3"/><rect class="ql-fill" height="12" width="1" x="5" y="3"/><rect class="ql-fill" height="12" width="1" x="12" y="3"/><rect class="ql-fill" height="2" width="8" x="5" y="8"/><rect class="ql-fill" height="1" width="3" x="3" y="5"/><rect class="ql-fill" height="1" width="3" x="3" y="7"/><rect class="ql-fill" height="1" width="3" x="3" y="10"/><rect class="ql-fill" height="1" width="3" x="3" y="12"/><rect class="ql-fill" height="1" width="3" x="12" y="5"/><rect class="ql-fill" height="1" width="3" x="12" y="7"/><rect class="ql-fill" height="1" width="3" x="12" y="10"/><rect class="ql-fill" height="1" width="3" x="12" y="12"/></svg>`,
    },
    Sg = `<svg viewbox="0 0 18 18"><polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"/><polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"/></svg>`,
    Cg = 0;
function wg(e, t) {
    e.setAttribute(t, `${e.getAttribute(t) !== `true`}`);
}
var Tg = class {
        constructor(e) {
            ((this.select = e),
                (this.container = document.createElement(`span`)),
                this.buildPicker(),
                (this.select.style.display = `none`),
                this.select.parentNode.insertBefore(
                    this.container,
                    this.select,
                ),
                this.label.addEventListener(`mousedown`, () => {
                    this.togglePicker();
                }),
                this.label.addEventListener(`keydown`, (e) => {
                    switch (e.key) {
                        case `Enter`:
                            this.togglePicker();
                            break;
                        case `Escape`:
                            (this.escape(), e.preventDefault());
                            break;
                        default:
                    }
                }),
                this.select.addEventListener(`change`, this.update.bind(this)));
        }
        togglePicker() {
            (this.container.classList.toggle(`ql-expanded`),
                wg(this.label, `aria-expanded`),
                wg(this.options, `aria-hidden`));
        }
        buildItem(e) {
            let t = document.createElement(`span`);
            ((t.tabIndex = `0`),
                t.setAttribute(`role`, `button`),
                t.classList.add(`ql-picker-item`));
            let n = e.getAttribute(`value`);
            return (
                n && t.setAttribute(`data-value`, n),
                e.textContent && t.setAttribute(`data-label`, e.textContent),
                t.addEventListener(`click`, () => {
                    this.selectItem(t, !0);
                }),
                t.addEventListener(`keydown`, (e) => {
                    switch (e.key) {
                        case `Enter`:
                            (this.selectItem(t, !0), e.preventDefault());
                            break;
                        case `Escape`:
                            (this.escape(), e.preventDefault());
                            break;
                        default:
                    }
                }),
                t
            );
        }
        buildLabel() {
            let e = document.createElement(`span`);
            return (
                e.classList.add(`ql-picker-label`),
                (e.innerHTML = Sg),
                (e.tabIndex = `0`),
                e.setAttribute(`role`, `button`),
                e.setAttribute(`aria-expanded`, `false`),
                this.container.appendChild(e),
                e
            );
        }
        buildOptions() {
            let e = document.createElement(`span`);
            (e.classList.add(`ql-picker-options`),
                e.setAttribute(`aria-hidden`, `true`),
                (e.tabIndex = `-1`),
                (e.id = `ql-picker-options-${Cg}`),
                (Cg += 1),
                this.label.setAttribute(`aria-controls`, e.id),
                (this.options = e),
                Array.from(this.select.options).forEach((t) => {
                    let n = this.buildItem(t);
                    (e.appendChild(n), t.selected === !0 && this.selectItem(n));
                }),
                this.container.appendChild(e));
        }
        buildPicker() {
            (Array.from(this.select.attributes).forEach((e) => {
                this.container.setAttribute(e.name, e.value);
            }),
                this.container.classList.add(`ql-picker`),
                (this.label = this.buildLabel()),
                this.buildOptions());
        }
        escape() {
            (this.close(), setTimeout(() => this.label.focus(), 1));
        }
        close() {
            (this.container.classList.remove(`ql-expanded`),
                this.label.setAttribute(`aria-expanded`, `false`),
                this.options.setAttribute(`aria-hidden`, `true`));
        }
        selectItem(e) {
            let t =
                    arguments.length > 1 &&
                    arguments[1] !== void 0 &&
                    arguments[1],
                n = this.container.querySelector(`.ql-selected`);
            e !== n &&
                (n?.classList.remove(`ql-selected`),
                e != null &&
                    (e.classList.add(`ql-selected`),
                    (this.select.selectedIndex = Array.from(
                        e.parentNode.children,
                    ).indexOf(e)),
                    e.hasAttribute(`data-value`)
                        ? this.label.setAttribute(
                              `data-value`,
                              e.getAttribute(`data-value`),
                          )
                        : this.label.removeAttribute(`data-value`),
                    e.hasAttribute(`data-label`)
                        ? this.label.setAttribute(
                              `data-label`,
                              e.getAttribute(`data-label`),
                          )
                        : this.label.removeAttribute(`data-label`),
                    t &&
                        (this.select.dispatchEvent(new Event(`change`)),
                        this.close())));
        }
        update() {
            let e;
            if (this.select.selectedIndex > -1) {
                let t =
                    this.container.querySelector(`.ql-picker-options`).children[
                        this.select.selectedIndex
                    ];
                ((e = this.select.options[this.select.selectedIndex]),
                    this.selectItem(t));
            } else this.selectItem(null);
            let t =
                e != null &&
                e !== this.select.querySelector(`option[selected]`);
            this.label.classList.toggle(`ql-active`, t);
        }
    },
    Eg = class extends Tg {
        constructor(e, t) {
            (super(e),
                (this.label.innerHTML = t),
                this.container.classList.add(`ql-color-picker`),
                Array.from(this.container.querySelectorAll(`.ql-picker-item`))
                    .slice(0, 7)
                    .forEach((e) => {
                        e.classList.add(`ql-primary`);
                    }));
        }
        buildItem(e) {
            let t = super.buildItem(e);
            return (
                (t.style.backgroundColor = e.getAttribute(`value`) || ``),
                t
            );
        }
        selectItem(e, t) {
            super.selectItem(e, t);
            let n = this.label.querySelector(`.ql-color-label`),
                r = (e && e.getAttribute(`data-value`)) || ``;
            n &&
                (n.tagName === `line`
                    ? (n.style.stroke = r)
                    : (n.style.fill = r));
        }
    },
    Dg = class extends Tg {
        constructor(e, t) {
            (super(e),
                this.container.classList.add(`ql-icon-picker`),
                Array.from(
                    this.container.querySelectorAll(`.ql-picker-item`),
                ).forEach((e) => {
                    e.innerHTML = t[e.getAttribute(`data-value`) || ``];
                }),
                (this.defaultItem =
                    this.container.querySelector(`.ql-selected`)),
                this.selectItem(this.defaultItem));
        }
        selectItem(e, t) {
            super.selectItem(e, t);
            let n = e || this.defaultItem;
            if (n != null) {
                if (this.label.innerHTML === n.innerHTML) return;
                this.label.innerHTML = n.innerHTML;
            }
        }
    },
    Og = (e) => {
        let { overflowY: t } = getComputedStyle(e, null);
        return t !== `visible` && t !== `clip`;
    },
    kg = class {
        constructor(e, t) {
            ((this.quill = e),
                (this.boundsContainer = t || document.body),
                (this.root = e.addContainer(`ql-tooltip`)),
                (this.root.innerHTML = this.constructor.TEMPLATE),
                Og(this.quill.root) &&
                    this.quill.root.addEventListener(`scroll`, () => {
                        this.root.style.marginTop = `${-1 * this.quill.root.scrollTop}px`;
                    }),
                this.hide());
        }
        hide() {
            this.root.classList.add(`ql-hidden`);
        }
        position(e) {
            let t = e.left + e.width / 2 - this.root.offsetWidth / 2,
                n = e.bottom + this.quill.root.scrollTop;
            ((this.root.style.left = `${t}px`),
                (this.root.style.top = `${n}px`),
                this.root.classList.remove(`ql-flip`));
            let r = this.boundsContainer.getBoundingClientRect(),
                i = this.root.getBoundingClientRect(),
                a = 0;
            if (
                (i.right > r.right &&
                    ((a = r.right - i.right),
                    (this.root.style.left = `${t + a}px`)),
                i.left < r.left &&
                    ((a = r.left - i.left),
                    (this.root.style.left = `${t + a}px`)),
                i.bottom > r.bottom)
            ) {
                let t = i.bottom - i.top,
                    r = e.bottom - e.top + t;
                ((this.root.style.top = `${n - r}px`),
                    this.root.classList.add(`ql-flip`));
            }
            return a;
        }
        show() {
            (this.root.classList.remove(`ql-editing`),
                this.root.classList.remove(`ql-hidden`));
        }
    },
    Ag = [!1, `center`, `right`, `justify`],
    jg =
        `#000000.#e60000.#ff9900.#ffff00.#008a00.#0066cc.#9933ff.#ffffff.#facccc.#ffebcc.#ffffcc.#cce8cc.#cce0f5.#ebd6ff.#bbbbbb.#f06666.#ffc266.#ffff66.#66b966.#66a3e0.#c285ff.#888888.#a10000.#b26b00.#b2b200.#006100.#0047b2.#6b24b2.#444444.#5c0000.#663d00.#666600.#003700.#002966.#3d1466`.split(
            `.`,
        ),
    Mg = [!1, `serif`, `monospace`],
    Ng = [`1`, `2`, `3`, !1],
    Pg = [`small`, !1, `large`, `huge`],
    Fg = class extends Ip {
        constructor(e, t) {
            super(e, t);
            let n = (t) => {
                if (!document.body.contains(e.root)) {
                    document.body.removeEventListener(`click`, n);
                    return;
                }
                (this.tooltip != null &&
                    !this.tooltip.root.contains(t.target) &&
                    document.activeElement !== this.tooltip.textbox &&
                    !this.quill.hasFocus() &&
                    this.tooltip.hide(),
                    this.pickers != null &&
                        this.pickers.forEach((e) => {
                            e.container.contains(t.target) || e.close();
                        }));
            };
            e.emitter.listenDOM(`click`, document.body, n);
        }
        addModule(e) {
            let t = super.addModule(e);
            return (e === `toolbar` && this.extendToolbar(t), t);
        }
        buildButtons(e, t) {
            Array.from(e).forEach((e) => {
                (e.getAttribute(`class`) || ``).split(/\s+/).forEach((n) => {
                    if (n.startsWith(`ql-`) && ((n = n.slice(3)), t[n] != null))
                        if (n === `direction`)
                            e.innerHTML = t[n][``] + t[n].rtl;
                        else if (typeof t[n] == `string`) e.innerHTML = t[n];
                        else {
                            let r = e.value || ``;
                            r != null && t[n][r] && (e.innerHTML = t[n][r]);
                        }
                });
            });
        }
        buildPickers(e, t) {
            ((this.pickers = Array.from(e).map((e) => {
                if (
                    e.classList.contains(`ql-align`) &&
                    (e.querySelector(`option`) ?? Rg(e, Ag),
                    typeof t.align == `object`)
                )
                    return new Dg(e, t.align);
                if (
                    e.classList.contains(`ql-background`) ||
                    e.classList.contains(`ql-color`)
                ) {
                    let n = e.classList.contains(`ql-background`)
                        ? `background`
                        : `color`;
                    return (
                        e.querySelector(`option`) ??
                            Rg(
                                e,
                                jg,
                                n === `background` ? `#ffffff` : `#000000`,
                            ),
                        new Eg(e, t[n])
                    );
                }
                return (
                    e.querySelector(`option`) ??
                        (e.classList.contains(`ql-font`)
                            ? Rg(e, Mg)
                            : e.classList.contains(`ql-header`)
                              ? Rg(e, Ng)
                              : e.classList.contains(`ql-size`) && Rg(e, Pg)),
                    new Tg(e)
                );
            })),
                this.quill.on(Z.events.EDITOR_CHANGE, () => {
                    this.pickers.forEach((e) => {
                        e.update();
                    });
                }));
        }
    };
Fg.DEFAULTS = yf({}, Ip.DEFAULTS, {
    modules: {
        toolbar: {
            handlers: {
                formula() {
                    this.quill.theme.tooltip.edit(`formula`);
                },
                image() {
                    let e = this.container.querySelector(
                        `input.ql-image[type=file]`,
                    );
                    (e ??
                        ((e = document.createElement(`input`)),
                        e.setAttribute(`type`, `file`),
                        e.setAttribute(
                            `accept`,
                            this.quill.uploader.options.mimetypes.join(`, `),
                        ),
                        e.classList.add(`ql-image`),
                        e.addEventListener(`change`, () => {
                            let t = this.quill.getSelection(!0);
                            (this.quill.uploader.upload(t, e.files),
                                (e.value = ``));
                        }),
                        this.container.appendChild(e)),
                        e.click());
                },
                video() {
                    this.quill.theme.tooltip.edit(`video`);
                },
            },
        },
    },
});
var Ig = class extends kg {
    constructor(e, t) {
        (super(e, t),
            (this.textbox = this.root.querySelector(`input[type="text"]`)),
            this.listen());
    }
    listen() {
        this.textbox.addEventListener(`keydown`, (e) => {
            e.key === `Enter`
                ? (this.save(), e.preventDefault())
                : e.key === `Escape` && (this.cancel(), e.preventDefault());
        });
    }
    cancel() {
        (this.hide(), this.restoreFocus());
    }
    edit() {
        let e =
                arguments.length > 0 && arguments[0] !== void 0
                    ? arguments[0]
                    : `link`,
            t =
                arguments.length > 1 && arguments[1] !== void 0
                    ? arguments[1]
                    : null;
        if (
            (this.root.classList.remove(`ql-hidden`),
            this.root.classList.add(`ql-editing`),
            this.textbox == null)
        )
            return;
        t == null
            ? e !== this.root.getAttribute(`data-mode`) &&
              (this.textbox.value = ``)
            : (this.textbox.value = t);
        let n = this.quill.getBounds(this.quill.selection.savedRange);
        (n != null && this.position(n),
            this.textbox.select(),
            this.textbox.setAttribute(
                `placeholder`,
                this.textbox.getAttribute(`data-${e}`) || ``,
            ),
            this.root.setAttribute(`data-mode`, e));
    }
    restoreFocus() {
        this.quill.focus({ preventScroll: !0 });
    }
    save() {
        let { value: e } = this.textbox;
        switch (this.root.getAttribute(`data-mode`)) {
            case `link`: {
                let { scrollTop: t } = this.quill.root;
                (this.linkRange
                    ? (this.quill.formatText(
                          this.linkRange,
                          `link`,
                          e,
                          Z.sources.USER,
                      ),
                      delete this.linkRange)
                    : (this.restoreFocus(),
                      this.quill.format(`link`, e, Z.sources.USER)),
                    (this.quill.root.scrollTop = t));
                break;
            }
            case `video`:
                e = Lg(e);
            case `formula`: {
                if (!e) break;
                let t = this.quill.getSelection(!0);
                if (t != null) {
                    let n = t.index + t.length;
                    (this.quill.insertEmbed(
                        n,
                        this.root.getAttribute(`data-mode`),
                        e,
                        Z.sources.USER,
                    ),
                        this.root.getAttribute(`data-mode`) === `formula` &&
                            this.quill.insertText(n + 1, ` `, Z.sources.USER),
                        this.quill.setSelection(n + 2, Z.sources.USER));
                }
                break;
            }
            default:
        }
        ((this.textbox.value = ``), this.hide());
    }
};
function Lg(e) {
    let t =
        e.match(
            /^(?:(https?):\/\/)?(?:(?:www|m)\.)?youtube\.com\/watch.*v=([a-zA-Z0-9_-]+)/,
        ) ||
        e.match(
            /^(?:(https?):\/\/)?(?:(?:www|m)\.)?youtu\.be\/([a-zA-Z0-9_-]+)/,
        );
    return t
        ? `${t[1] || `https`}://www.youtube.com/embed/${t[2]}?showinfo=0`
        : (t = e.match(/^(?:(https?):\/\/)?(?:www\.)?vimeo\.com\/(\d+)/))
          ? `${t[1] || `https`}://player.vimeo.com/video/${t[2]}/`
          : e;
}
function Rg(e, t) {
    let n = arguments.length > 2 && arguments[2] !== void 0 && arguments[2];
    t.forEach((t) => {
        let r = document.createElement(`option`);
        (t === n
            ? r.setAttribute(`selected`, `selected`)
            : r.setAttribute(`value`, String(t)),
            e.appendChild(r));
    });
}
var zg = [
        [`bold`, `italic`, `link`],
        [{ header: 1 }, { header: 2 }, `blockquote`],
    ],
    Bg = class extends Ig {
        static TEMPLATE = [
            `<span class="ql-tooltip-arrow"></span>`,
            `<div class="ql-tooltip-editor">`,
            `<input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL">`,
            `<a class="ql-close"></a>`,
            `</div>`,
        ].join(``);
        constructor(e, t) {
            (super(e, t),
                this.quill.on(Z.events.EDITOR_CHANGE, (e, t, n, r) => {
                    if (e === Z.events.SELECTION_CHANGE)
                        if (t != null && t.length > 0 && r === Z.sources.USER) {
                            (this.show(),
                                (this.root.style.left = `0px`),
                                (this.root.style.width = ``),
                                (this.root.style.width = `${this.root.offsetWidth}px`));
                            let e = this.quill.getLines(t.index, t.length);
                            if (e.length === 1) {
                                let e = this.quill.getBounds(t);
                                e != null && this.position(e);
                            } else {
                                let n = e[e.length - 1],
                                    r = this.quill.getIndex(n),
                                    i = Math.min(
                                        n.length() - 1,
                                        t.index + t.length - r,
                                    ),
                                    a = this.quill.getBounds(new bp(r, i));
                                a != null && this.position(a);
                            }
                        } else
                            document.activeElement !== this.textbox &&
                                this.quill.hasFocus() &&
                                this.hide();
                }));
        }
        listen() {
            (super.listen(),
                this.root
                    .querySelector(`.ql-close`)
                    .addEventListener(`click`, () => {
                        this.root.classList.remove(`ql-editing`);
                    }),
                this.quill.on(Z.events.SCROLL_OPTIMIZE, () => {
                    setTimeout(() => {
                        if (this.root.classList.contains(`ql-hidden`)) return;
                        let e = this.quill.getSelection();
                        if (e != null) {
                            let t = this.quill.getBounds(e);
                            t != null && this.position(t);
                        }
                    }, 1);
                }));
        }
        cancel() {
            this.show();
        }
        position(e) {
            let t = super.position(e),
                n = this.root.querySelector(`.ql-tooltip-arrow`);
            return (
                (n.style.marginLeft = ``),
                t !== 0 &&
                    (n.style.marginLeft = `${-1 * t - n.offsetWidth / 2}px`),
                t
            );
        }
    },
    Vg = class extends Fg {
        constructor(e, t) {
            (t.modules.toolbar != null &&
                t.modules.toolbar.container == null &&
                (t.modules.toolbar.container = zg),
                super(e, t),
                this.quill.container.classList.add(`ql-bubble`));
        }
        extendToolbar(e) {
            ((this.tooltip = new Bg(this.quill, this.options.bounds)),
                e.container != null &&
                    (this.tooltip.root.appendChild(e.container),
                    this.buildButtons(
                        e.container.querySelectorAll(`button`),
                        xg,
                    ),
                    this.buildPickers(
                        e.container.querySelectorAll(`select`),
                        xg,
                    )));
        }
    };
Vg.DEFAULTS = yf({}, Fg.DEFAULTS, {
    modules: {
        toolbar: {
            handlers: {
                link(e) {
                    e
                        ? this.quill.theme.tooltip.edit()
                        : this.quill.format(`link`, !1, Q.sources.USER);
                },
            },
        },
    },
});
var Hg = [
        [{ header: [`1`, `2`, `3`, !1] }],
        [`bold`, `italic`, `underline`, `link`],
        [{ list: `ordered` }, { list: `bullet` }],
        [`clean`],
    ],
    Ug = class extends Ig {
        static TEMPLATE = [
            `<a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a>`,
            `<input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL">`,
            `<a class="ql-action"></a>`,
            `<a class="ql-remove"></a>`,
        ].join(``);
        preview = this.root.querySelector(`a.ql-preview`);
        listen() {
            (super.listen(),
                this.root
                    .querySelector(`a.ql-action`)
                    .addEventListener(`click`, (e) => {
                        (this.root.classList.contains(`ql-editing`)
                            ? this.save()
                            : this.edit(`link`, this.preview.textContent),
                            e.preventDefault());
                    }),
                this.root
                    .querySelector(`a.ql-remove`)
                    .addEventListener(`click`, (e) => {
                        if (this.linkRange != null) {
                            let e = this.linkRange;
                            (this.restoreFocus(),
                                this.quill.formatText(
                                    e,
                                    `link`,
                                    !1,
                                    Z.sources.USER,
                                ),
                                delete this.linkRange);
                        }
                        (e.preventDefault(), this.hide());
                    }),
                this.quill.on(Z.events.SELECTION_CHANGE, (e, t, n) => {
                    if (e != null) {
                        if (e.length === 0 && n === Z.sources.USER) {
                            let [t, n] = this.quill.scroll.descendant(
                                zh,
                                e.index,
                            );
                            if (t != null) {
                                this.linkRange = new bp(
                                    e.index - n,
                                    t.length(),
                                );
                                let r = zh.formats(t.domNode);
                                ((this.preview.textContent = r),
                                    this.preview.setAttribute(`href`, r),
                                    this.show());
                                let i = this.quill.getBounds(this.linkRange);
                                i != null && this.position(i);
                                return;
                            }
                        } else delete this.linkRange;
                        this.hide();
                    }
                }));
        }
        show() {
            (super.show(), this.root.removeAttribute(`data-mode`));
        }
    },
    Wg = class extends Fg {
        constructor(e, t) {
            (t.modules.toolbar != null &&
                t.modules.toolbar.container == null &&
                (t.modules.toolbar.container = Hg),
                super(e, t),
                this.quill.container.classList.add(`ql-snow`));
        }
        extendToolbar(e) {
            e.container != null &&
                (e.container.classList.add(`ql-snow`),
                this.buildButtons(e.container.querySelectorAll(`button`), xg),
                this.buildPickers(e.container.querySelectorAll(`select`), xg),
                (this.tooltip = new Ug(this.quill, this.options.bounds)),
                e.container.querySelector(`.ql-link`) &&
                    this.quill.keyboard.addBinding(
                        { key: `k`, shortKey: !0 },
                        (t, n) => {
                            e.handlers.link.call(e, !n.format.link);
                        },
                    ));
        }
    };
((Wg.DEFAULTS = yf({}, Fg.DEFAULTS, {
    modules: {
        toolbar: {
            handlers: {
                link(e) {
                    if (e) {
                        let e = this.quill.getSelection();
                        if (e == null || e.length === 0) return;
                        let t = this.quill.getText(e);
                        /^\S+@\S+\.\S+$/.test(t) &&
                            t.indexOf(`mailto:`) !== 0 &&
                            (t = `mailto:${t}`);
                        let { tooltip: n } = this.quill.theme;
                        n.edit(`link`, t);
                    } else this.quill.format(`link`, !1, Q.sources.USER);
                },
            },
        },
    },
})),
    jh.register(
        {
            "attributors/attribute/direction": _m,
            "attributors/class/align": sm,
            "attributors/class/background": fm,
            "attributors/class/color": um,
            "attributors/class/direction": vm,
            "attributors/class/font": xm,
            "attributors/class/size": Cm,
            "attributors/style/align": cm,
            "attributors/style/background": pm,
            "attributors/style/color": dm,
            "attributors/style/direction": ym,
            "attributors/style/font": Sm,
            "attributors/style/size": wm,
        },
        !0,
    ),
    jh.register(
        {
            "formats/align": sm,
            "formats/direction": vm,
            "formats/indent": Mh,
            "formats/background": pm,
            "formats/color": dm,
            "formats/font": xm,
            "formats/size": Cm,
            "formats/blockquote": Nh,
            "formats/code-block": $,
            "formats/header": Ph,
            "formats/list": Ih,
            "formats/bold": Lh,
            "formats/code": hm,
            "formats/italic": Rh,
            "formats/link": zh,
            "formats/script": Vh,
            "formats/strike": Hh,
            "formats/underline": Uh,
            "formats/formula": Wh,
            "formats/image": Kh,
            "formats/video": Jh,
            "modules/syntax": eg,
            "modules/table": og,
            "modules/toolbar": cg,
            "themes/bubble": Vg,
            "themes/snow": Wg,
            "ui/icons": xg,
            "ui/picker": Tg,
            "ui/icon-picker": Dg,
            "ui/color-picker": Eg,
            "ui/tooltip": kg,
        },
        !0,
    ));
var Gg = jh;
(ca.plugin(yo),
    (window.Alpine = ca),
    (window.Quill = Gg),
    (function () {
        try {
            var e = document.querySelectorAll(
                `.quill-editor[data-quill-input]`,
            );
            if (!e.length) return;
            var t = [
                [{ header: [2, 3, !1] }],
                [`bold`, `italic`, `underline`],
                [{ list: `ordered` }, { list: `bullet` }],
                [`link`],
                [`clean`],
            ];
            ((window._quillMap = window._quillMap || {}),
                e.forEach(function (e) {
                    var n = e.getAttribute(`data-quill-input`),
                        r = document.getElementById(n);
                    if (r) {
                        var i = new Gg(e, {
                                theme: `snow`,
                                modules: { toolbar: t },
                                placeholder: `Enter content…`,
                            }),
                            a = r.value.trim();
                        if (a)
                            try {
                                i.root.innerHTML = a;
                            } catch {}
                        window._quillMap[e.id] = i;
                        var o = e.closest(`form`);
                        o &&
                            !o._quillHandlerAttached &&
                            ((o._quillHandlerAttached = !0),
                            o.addEventListener(`submit`, function () {
                                o.querySelectorAll(
                                    `.ql-container[data-quill-input]`,
                                ).forEach(function (e) {
                                    var t = document.getElementById(
                                        e.getAttribute(`data-quill-input`),
                                    );
                                    if (t) {
                                        var n = window._quillMap[e.id];
                                        if (n) {
                                            var r = n.root.innerHTML;
                                            t.value =
                                                r === `<p><br></p>` ||
                                                r === `<p></p>`
                                                    ? ``
                                                    : r;
                                        }
                                    }
                                });
                            }));
                    }
                }));
        } catch (e) {
            console.error(`[Quill] init failed:`, e);
        }
    })(),
    ca.start());
function Kg(e) {
    let t = document.getElementById(`theme-toggle-dark-icon`),
        n = document.getElementById(`theme-toggle-light-icon`),
        r = document.getElementById(`mobile-theme-icon`);
    e
        ? (document.documentElement.classList.add(`dark`),
          document.body.classList.add(`dark`),
          document.body.classList.remove(`light`),
          t && t.classList.add(`hidden`),
          n && n.classList.remove(`hidden`),
          r && (r.classList.remove(`fa-moon`), r.classList.add(`fa-sun`)),
          localStorage.setItem(`theme`, `dark`))
        : (document.documentElement.classList.remove(`dark`),
          document.body.classList.remove(`dark`),
          document.body.classList.add(`light`),
          t && t.classList.remove(`hidden`),
          n && n.classList.add(`hidden`),
          r && (r.classList.remove(`fa-sun`), r.classList.add(`fa-moon`)),
          localStorage.setItem(`theme`, `light`));
}
((window.toggleTheme = function () {
    Kg(!document.documentElement.classList.contains(`dark`));
}),
    (window.openModal = function (e) {
        (document.getElementById(e).classList.remove(`hidden`),
            (document.body.style.overflow = `hidden`));
    }),
    (window.closeModal = function (e) {
        (document.getElementById(e).classList.add(`hidden`),
            (document.body.style.overflow = ``));
        let t = document.getElementById(`formNotification`);
        t && t.classList.add(`hidden`);
    }),
    (window.closeMobileMenu = function () {
        let e = document.getElementById(`mobile-menu`);
        e && e.classList.add(`hidden`);
    }),
    (window.handleFormSubmit = function (e) {
        e.preventDefault();
        let t = e.target,
            n = new FormData(t),
            r = document.getElementById(`formNotification`);
        fetch(t.action, {
            method: `POST`,
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    `meta[name="csrf-token"]`,
                ).content,
            },
            body: n,
        })
            .then((e) => e.json())
            .then(() => {
                (r && r.classList.remove(`hidden`),
                    setTimeout(() => {
                        (closeModal(`serviceModal`), t.reset());
                    }, 2500));
            })
            .catch(() => {
                (r && r.classList.remove(`hidden`),
                    setTimeout(() => {
                        (closeModal(`serviceModal`), t.reset());
                    }, 2500));
            });
    }));
function qg() {
    Kg(localStorage.getItem(`theme`) !== `light`);
    let e = document.getElementById(`mobile-menu-btn`),
        t = document.getElementById(`mobile-menu`);
    (e && t && e.addEventListener(`click`, () => t.classList.toggle(`hidden`)),
        document.querySelectorAll(`[id$="Modal"]`).forEach((e) => {
            e.addEventListener(`click`, (t) => {
                t.target === e && closeModal(e.id);
            });
        }));
}
document.readyState === `loading`
    ? document.addEventListener(`DOMContentLoaded`, qg)
    : qg();
