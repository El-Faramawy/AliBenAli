var _self = "undefined" != typeof window ? window : "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? self : {},
    Prism = function (e) {
        var t = /\blang(?:uage)?-([\w-]+)\b/i, n = 0, a = {
            manual: e.Prism && e.Prism.manual,
            disableWorkerMessageHandler: e.Prism && e.Prism.disableWorkerMessageHandler,
            util: {
                encode: function e(t) {
                    return t instanceof s ? new s(t.type, e(t.content), t.alias) : Array.isArray(t) ? t.map(e) : t.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/\u00a0/g, " ")
                }, type: function (e) {
                    return Object.prototype.toString.call(e).slice(8, -1)
                }, objId: function (e) {
                    return e.__id || Object.defineProperty(e, "__id", {value: ++n}), e.__id
                }, clone: function e(t, n) {
                    var s, r;
                    switch (n = n || {}, a.util.type(t)) {
                        case"Object":
                            if (r = a.util.objId(t), n[r]) return n[r];
                            for (var i in s = {}, n[r] = s, t) t.hasOwnProperty(i) && (s[i] = e(t[i], n));
                            return s;
                        case"Array":
                            return r = a.util.objId(t), n[r] ? n[r] : (s = [], n[r] = s, t.forEach((function (t, a) {
                                s[a] = e(t, n)
                            })), s);
                        default:
                            return t
                    }
                }, getLanguage: function (e) {
                    for (; e && !t.test(e.className);) e = e.parentElement;
                    return e ? (e.className.match(t) || [, "none"])[1].toLowerCase() : "none"
                }, currentScript: function () {
                    if ("undefined" == typeof document) return null;
                    if ("currentScript" in document) return document.currentScript;
                    try {
                        throw new Error
                    } catch (a) {
                        var e = (/at [^(\r\n]*\((.*):.+:.+\)$/i.exec(a.stack) || [])[1];
                        if (e) {
                            var t = document.getElementsByTagName("script");
                            for (var n in t) if (t[n].src == e) return t[n]
                        }
                        return null
                    }
                }, isActive: function (e, t, n) {
                    for (var a = "no-" + t; e;) {
                        var s = e.classList;
                        if (s.contains(t)) return !0;
                        if (s.contains(a)) return !1;
                        e = e.parentElement
                    }
                    return !!n
                }
            },
            languages: {
                extend: function (e, t) {
                    var n = a.util.clone(a.languages[e]);
                    for (var s in t) n[s] = t[s];
                    return n
                }, insertBefore: function (e, t, n, s) {
                    var r = (s = s || a.languages)[e], i = {};
                    for (var o in r) if (r.hasOwnProperty(o)) {
                        if (o == t) for (var l in n) n.hasOwnProperty(l) && (i[l] = n[l]);
                        n.hasOwnProperty(o) || (i[o] = r[o])
                    }
                    var u = s[e];
                    return s[e] = i, a.languages.DFS(a.languages, (function (t, n) {
                        n === u && t != e && (this[t] = i)
                    })), i
                }, DFS: function e(t, n, s, r) {
                    r = r || {};
                    var i = a.util.objId;
                    for (var o in t) if (t.hasOwnProperty(o)) {
                        n.call(t, o, t[o], s || o);
                        var l = t[o], u = a.util.type(l);
                        "Object" !== u || r[i(l)] ? "Array" !== u || r[i(l)] || (r[i(l)] = !0, e(l, n, o, r)) : (r[i(l)] = !0, e(l, n, null, r))
                    }
                }
            },
            plugins: {},
            highlightAll: function (e, t) {
                a.highlightAllUnder(document, e, t)
            },
            highlightAllUnder: function (e, t, n) {
                var s = {
                    callback: n,
                    container: e,
                    selector: 'code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code'
                };
                a.hooks.run("before-highlightall", s), s.elements = Array.prototype.slice.apply(s.container.querySelectorAll(s.selector)), a.hooks.run("before-all-elements-highlight", s);
                for (var r, i = 0; r = s.elements[i++];) a.highlightElement(r, !0 === t, s.callback)
            },
            highlightElement: function (n, s, r) {
                var i = a.util.getLanguage(n), o = a.languages[i];
                n.className = n.className.replace(t, "").replace(/\s+/g, " ") + " language-" + i;
                var l = n.parentElement;
                l && "pre" === l.nodeName.toLowerCase() && (l.className = l.className.replace(t, "").replace(/\s+/g, " ") + " language-" + i);
                var u = {element: n, language: i, grammar: o, code: n.textContent};

                function c(e) {
                    u.highlightedCode = e, a.hooks.run("before-insert", u), u.element.innerHTML = u.highlightedCode, a.hooks.run("after-highlight", u), a.hooks.run("complete", u), r && r.call(u.element)
                }

                if (a.hooks.run("before-sanity-check", u), !u.code) return a.hooks.run("complete", u), void (r && r.call(u.element));
                if (a.hooks.run("before-highlight", u), u.grammar) if (s && e.Worker) {
                    var d = new Worker(a.filename);
                    d.onmessage = function (e) {
                        c(e.data)
                    }, d.postMessage(JSON.stringify({language: u.language, code: u.code, immediateClose: !0}))
                } else c(a.highlight(u.code, u.grammar, u.language)); else c(a.util.encode(u.code))
            },
            highlight: function (e, t, n) {
                var r = {code: e, grammar: t, language: n};
                return a.hooks.run("before-tokenize", r), r.tokens = a.tokenize(r.code, r.grammar), a.hooks.run("after-tokenize", r), s.stringify(a.util.encode(r.tokens), r.language)
            },
            tokenize: function (e, t) {
                var n = t.rest;
                if (n) {
                    for (var a in n) t[a] = n[a];
                    delete t.rest
                }
                var s = new o;
                return l(s, s.head, e), i(e, s, t, s.head, 0), function (e) {
                    var t = [], n = e.head.next;
                    for (; n !== e.tail;) t.push(n.value), n = n.next;
                    return t
                }(s)
            },
            hooks: {
                all: {}, add: function (e, t) {
                    var n = a.hooks.all;
                    n[e] = n[e] || [], n[e].push(t)
                }, run: function (e, t) {
                    var n = a.hooks.all[e];
                    if (n && n.length) for (var s, r = 0; s = n[r++];) s(t)
                }
            },
            Token: s
        };

        function s(e, t, n, a) {
            this.type = e, this.content = t, this.alias = n, this.length = 0 | (a || "").length
        }

        function r(e, t, n, a) {
            e.lastIndex = t;
            var s = e.exec(n);
            if (s && a && s[1]) {
                var r = s[1].length;
                s.index += r, s[0] = s[0].slice(r)
            }
            return s
        }

        function i(e, t, n, o, c, d) {
            for (var g in n) if (n.hasOwnProperty(g) && n[g]) {
                var p = n[g];
                p = Array.isArray(p) ? p : [p];
                for (var m = 0; m < p.length; ++m) {
                    if (d && d.cause == g + "," + m) return;
                    var f = p[m], h = f.inside, b = !!f.lookbehind, v = !!f.greedy, F = f.alias;
                    if (v && !f.pattern.global) {
                        var y = f.pattern.toString().match(/[imsuy]*$/)[0];
                        f.pattern = RegExp(f.pattern.source, y + "g")
                    }
                    for (var A = f.pattern || f, w = o.next, S = c; w !== t.tail && !(d && S >= d.reach); S += w.value.length, w = w.next) {
                        var k = w.value;
                        if (t.length > e.length) return;
                        if (!(k instanceof s)) {
                            var x, P = 1;
                            if (v) {
                                if (!(x = r(A, S, e, b))) break;
                                var E = x.index, _ = x.index + x[0].length, $ = S;
                                for ($ += w.value.length; E >= $;) $ += (w = w.next).value.length;
                                if (S = $ -= w.value.length, w.value instanceof s) continue;
                                for (var T = w; T !== t.tail && ($ < _ || "string" == typeof T.value); T = T.next) P++, $ += T.value.length;
                                P--, k = e.slice(S, $), x.index -= S
                            } else if (!(x = r(A, 0, k, b))) continue;
                            E = x.index;
                            var O = x[0], N = k.slice(0, E), I = k.slice(E + O.length), D = S + k.length;
                            d && D > d.reach && (d.reach = D);
                            var R = w.prev;
                            N && (R = l(t, R, N), S += N.length), u(t, R, P), w = l(t, R, new s(g, h ? a.tokenize(O, h) : O, F, O)), I && l(t, w, I), P > 1 && i(e, t, n, w.prev, S, {
                                cause: g + "," + m,
                                reach: D
                            })
                        }
                    }
                }
            }
        }

        function o() {
            var e = {value: null, prev: null, next: null}, t = {value: null, prev: e, next: null};
            e.next = t, this.head = e, this.tail = t, this.length = 0
        }

        function l(e, t, n) {
            var a = t.next, s = {value: n, prev: t, next: a};
            return t.next = s, a.prev = s, e.length++, s
        }

        function u(e, t, n) {
            for (var a = t.next, s = 0; s < n && a !== e.tail; s++) a = a.next;
            t.next = a, a.prev = t, e.length -= s
        }

        if (e.Prism = a, s.stringify = function e(t, n) {
            if ("string" == typeof t) return t;
            if (Array.isArray(t)) {
                var s = "";
                return t.forEach((function (t) {
                    s += e(t, n)
                })), s
            }
            var r = {
                type: t.type,
                content: e(t.content, n),
                tag: "span",
                classes: ["token", t.type],
                attributes: {},
                language: n
            }, i = t.alias;
            i && (Array.isArray(i) ? Array.prototype.push.apply(r.classes, i) : r.classes.push(i)), a.hooks.run("wrap", r);
            var o = "";
            for (var l in r.attributes) o += " " + l + '="' + (r.attributes[l] || "").replace(/"/g, "&quot;") + '"';
            return "<" + r.tag + ' class="' + r.classes.join(" ") + '"' + o + ">" + r.content + "</" + r.tag + ">"
        }, !e.document) return e.addEventListener ? (a.disableWorkerMessageHandler || e.addEventListener("message", (function (t) {
            var n = JSON.parse(t.data), s = n.language, r = n.code, i = n.immediateClose;
            e.postMessage(a.highlight(r, a.languages[s], s)), i && e.close()
        }), !1), a) : a;
        var c = a.util.currentScript();

        function d() {
            a.manual || a.highlightAll()
        }

        if (c && (a.filename = c.src, c.hasAttribute("data-manual") && (a.manual = !0)), !a.manual) {
            var g = document.readyState;
            "loading" === g || "interactive" === g && c && c.defer ? document.addEventListener("DOMContentLoaded", d) : window.requestAnimationFrame ? window.requestAnimationFrame(d) : window.setTimeout(d, 16)
        }
        return a
    }(_self);
/**
 * Prism: Lightweight, robust, elegant syntax highlighting
 *
 * @license MIT <https://opensource.org/licenses/MIT>
 * @author Lea Verou <https://lea.verou.me>
 * @namespace
 * @public
 */"undefined" != typeof module && module.exports && (module.exports = Prism), "undefined" != typeof global && (global.Prism = Prism), Prism.languages.markup = {
    comment: /<!--[\s\S]*?-->/,
    prolog: /<\?[\s\S]+?\?>/,
    doctype: {
        pattern: /<!DOCTYPE(?:[^>"'[\]]|"[^"]*"|'[^']*')+(?:\[(?:[^<"'\]]|"[^"]*"|'[^']*'|<(?!!--)|<!--(?:[^-]|-(?!->))*-->)*\]\s*)?>/i,
        greedy: !0,
        inside: {
            "internal-subset": {pattern: /(\[)[\s\S]+(?=\]>$)/, lookbehind: !0, greedy: !0, inside: null},
            string: {pattern: /"[^"]*"|'[^']*'/, greedy: !0},
            punctuation: /^<!|>$|[[\]]/,
            "doctype-tag": /^DOCTYPE/,
            name: /[^\s<>'"]+/
        }
    },
    cdata: /<!\[CDATA\[[\s\S]*?]]>/i,
    tag: {
        pattern: /<\/?(?!\d)[^\s>\/=$<%]+(?:\s(?:\s*[^\s>\/=]+(?:\s*=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+(?=[\s>]))|(?=[\s/>])))+)?\s*\/?>/,
        greedy: !0,
        inside: {
            tag: {pattern: /^<\/?[^\s>\/]+/, inside: {punctuation: /^<\/?/, namespace: /^[^\s>\/:]+:/}},
            "attr-value": {
                pattern: /=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+)/,
                inside: {punctuation: [{pattern: /^=/, alias: "attr-equals"}, /"|'/]}
            },
            punctuation: /\/?>/,
            "attr-name": {pattern: /[^\s>\/]+/, inside: {namespace: /^[^\s>\/:]+:/}}
        }
    },
    entity: [{pattern: /&[\da-z]{1,8};/i, alias: "named-entity"}, /&#x?[\da-f]{1,8};/i]
}, Prism.languages.markup.tag.inside["attr-value"].inside.entity = Prism.languages.markup.entity, Prism.languages.markup.doctype.inside["internal-subset"].inside = Prism.languages.markup, Prism.hooks.add("wrap", (function (e) {
    "entity" === e.type && (e.attributes.title = e.content.replace(/&amp;/, "&"))
})), Object.defineProperty(Prism.languages.markup.tag, "addInlined", {
    value: function (e, t) {
        var n = {};
        n["language-" + t] = {
            pattern: /(^<!\[CDATA\[)[\s\S]+?(?=\]\]>$)/i,
            lookbehind: !0,
            inside: Prism.languages[t]
        }, n.cdata = /^<!\[CDATA\[|\]\]>$/i;
        var a = {"included-cdata": {pattern: /<!\[CDATA\[[\s\S]*?\]\]>/i, inside: n}};
        a["language-" + t] = {pattern: /[\s\S]+/, inside: Prism.languages[t]};
        var s = {};
        s[e] = {
            pattern: RegExp(/(<__[^>]*>)(?:<!\[CDATA\[(?:[^\]]|\](?!\]>))*\]\]>|(?!<!\[CDATA\[)[\s\S])*?(?=<\/__>)/.source.replace(/__/g, (function () {
                return e
            })), "i"), lookbehind: !0, greedy: !0, inside: a
        }, Prism.languages.insertBefore("markup", "cdata", s)
    }
}), Prism.languages.html = Prism.languages.markup, Prism.languages.mathml = Prism.languages.markup, Prism.languages.svg = Prism.languages.markup, Prism.languages.xml = Prism.languages.extend("markup", {}), Prism.languages.ssml = Prism.languages.xml, Prism.languages.atom = Prism.languages.xml, Prism.languages.rss = Prism.languages.xml, function (e) {
    var t = /("|')(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/;
    e.languages.css = {
        comment: /\/\*[\s\S]*?\*\//,
        atrule: {
            pattern: /@[\w-](?:[^;{\s]|\s+(?![\s{]))*(?:;|(?=\s*\{))/,
            inside: {
                rule: /^@[\w-]+/,
                "selector-function-argument": {
                    pattern: /(\bselector\s*\(\s*(?![\s)]))(?:[^()\s]|\s+(?![\s)])|\((?:[^()]|\([^()]*\))*\))+(?=\s*\))/,
                    lookbehind: !0,
                    alias: "selector"
                },
                keyword: {pattern: /(^|[^\w-])(?:and|not|only|or)(?![\w-])/, lookbehind: !0}
            }
        },
        url: {
            pattern: RegExp("\\burl\\((?:" + t.source + "|" + /(?:[^\\\r\n()"']|\\[\s\S])*/.source + ")\\)", "i"),
            greedy: !0,
            inside: {
                function: /^url/i,
                punctuation: /^\(|\)$/,
                string: {pattern: RegExp("^" + t.source + "$"), alias: "url"}
            }
        },
        selector: RegExp("[^{}\\s](?:[^{};\"'\\s]|\\s+(?![\\s{])|" + t.source + ")*(?=\\s*\\{)"),
        string: {pattern: t, greedy: !0},
        property: /(?!\s)[-_a-z\xA0-\uFFFF](?:(?!\s)[-\w\xA0-\uFFFF])*(?=\s*:)/i,
        important: /!important\b/i,
        function: /[-a-z0-9]+(?=\()/i,
        punctuation: /[(){};:,]/
    }, e.languages.css.atrule.inside.rest = e.languages.css;
    var n = e.languages.markup;
    n && (n.tag.addInlined("style", "css"), e.languages.insertBefore("inside", "attr-value", {
        "style-attr": {
            pattern: /(^|["'\s])style\s*=\s*(?:"[^"]*"|'[^']*')/i,
            lookbehind: !0,
            inside: {
                "attr-value": {
                    pattern: /=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+)/,
                    inside: {
                        style: {
                            pattern: /(["'])[\s\S]+(?=["']$)/,
                            lookbehind: !0,
                            alias: "language-css",
                            inside: e.languages.css
                        }, punctuation: [{pattern: /^=/, alias: "attr-equals"}, /"|'/]
                    }
                }, "attr-name": /^style/i
            }
        }
    }, n.tag))
}(Prism), Prism.languages.clike = {
    comment: [{
        pattern: /(^|[^\\])\/\*[\s\S]*?(?:\*\/|$)/,
        lookbehind: !0,
        greedy: !0
    }, {pattern: /(^|[^\\:])\/\/.*/, lookbehind: !0, greedy: !0}],
    string: {pattern: /(["'])(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/, greedy: !0},
    "class-name": {
        pattern: /(\b(?:class|interface|extends|implements|trait|instanceof|new)\s+|\bcatch\s+\()[\w.\\]+/i,
        lookbehind: !0,
        inside: {punctuation: /[.\\]/}
    },
    keyword: /\b(?:if|else|while|do|for|return|in|instanceof|function|new|try|throw|catch|finally|null|break|continue)\b/,
    boolean: /\b(?:true|false)\b/,
    function: /\w+(?=\()/,
    number: /\b0x[\da-f]+\b|(?:\b\d+(?:\.\d*)?|\B\.\d+)(?:e[+-]?\d+)?/i,
    operator: /[<>]=?|[!=]=?=?|--?|\+\+?|&&?|\|\|?|[?*/~^%]/,
    punctuation: /[{}[\];(),.:]/
}, Prism.languages.javascript = Prism.languages.extend("clike", {
    "class-name": [Prism.languages.clike["class-name"], {
        pattern: /(^|[^$\w\xA0-\uFFFF])(?!\s)[_$A-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\.(?:prototype|constructor))/,
        lookbehind: !0
    }],
    keyword: [{
        pattern: /((?:^|})\s*)(?:catch|finally)\b/,
        lookbehind: !0
    }, {
        pattern: /(^|[^.]|\.\.\.\s*)\b(?:as|async(?=\s*(?:function\b|\(|[$\w\xA0-\uFFFF]|$))|await|break|case|class|const|continue|debugger|default|delete|do|else|enum|export|extends|for|from|function|(?:get|set)(?=\s*[\[$\w\xA0-\uFFFF])|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|static|super|switch|this|throw|try|typeof|undefined|var|void|while|with|yield)\b/,
        lookbehind: !0
    }],
    function: /#?(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\s*(?:\.\s*(?:apply|bind|call)\s*)?\()/,
    number: /\b(?:(?:0[xX](?:[\dA-Fa-f](?:_[\dA-Fa-f])?)+|0[bB](?:[01](?:_[01])?)+|0[oO](?:[0-7](?:_[0-7])?)+)n?|(?:\d(?:_\d)?)+n|NaN|Infinity)\b|(?:\b(?:\d(?:_\d)?)+\.?(?:\d(?:_\d)?)*|\B\.(?:\d(?:_\d)?)+)(?:[Ee][+-]?(?:\d(?:_\d)?)+)?/,
    operator: /--|\+\+|\*\*=?|=>|&&=?|\|\|=?|[!=]==|<<=?|>>>?=?|[-+*/%&|^!=<>]=?|\.{3}|\?\?=?|\?\.?|[~:]/
}), Prism.languages.javascript["class-name"][0].pattern = /(\b(?:class|interface|extends|implements|instanceof|new)\s+)[\w.\\]+/, Prism.languages.insertBefore("javascript", "keyword", {
    regex: {
        pattern: /((?:^|[^$\w\xA0-\uFFFF."'\])\s]|\b(?:return|yield))\s*)\/(?:\[(?:[^\]\\\r\n]|\\.)*]|\\.|[^/\\\[\r\n])+\/[gimyus]{0,6}(?=(?:\s|\/\*(?:[^*]|\*(?!\/))*\*\/)*(?:$|[\r\n,.;:})\]]|\/\/))/,
        lookbehind: !0,
        greedy: !0,
        inside: {
            "regex-source": {
                pattern: /^(\/)[\s\S]+(?=\/[a-z]*$)/,
                lookbehind: !0,
                alias: "language-regex",
                inside: Prism.languages.regex
            }, "regex-flags": /[a-z]+$/, "regex-delimiter": /^\/|\/$/
        }
    },
    "function-variable": {
        pattern: /#?(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\s*[=:]\s*(?:async\s*)?(?:\bfunction\b|(?:\((?:[^()]|\([^()]*\))*\)|(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*)\s*=>))/,
        alias: "function"
    },
    parameter: [{
        pattern: /(function(?:\s+(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*)?\s*\(\s*)(?!\s)(?:[^()\s]|\s+(?![\s)])|\([^()]*\))+(?=\s*\))/,
        lookbehind: !0,
        inside: Prism.languages.javascript
    }, {
        pattern: /(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\s*=>)/i,
        inside: Prism.languages.javascript
    }, {
        pattern: /(\(\s*)(?!\s)(?:[^()\s]|\s+(?![\s)])|\([^()]*\))+(?=\s*\)\s*=>)/,
        lookbehind: !0,
        inside: Prism.languages.javascript
    }, {
        pattern: /((?:\b|\s|^)(?!(?:as|async|await|break|case|catch|class|const|continue|debugger|default|delete|do|else|enum|export|extends|finally|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|try|typeof|undefined|var|void|while|with|yield)(?![$\w\xA0-\uFFFF]))(?:(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*\s*)\(\s*|\]\s*\(\s*)(?!\s)(?:[^()\s]|\s+(?![\s)])|\([^()]*\))+(?=\s*\)\s*\{)/,
        lookbehind: !0,
        inside: Prism.languages.javascript
    }],
    constant: /\b[A-Z](?:[A-Z_]|\dx?)*\b/
}), Prism.languages.insertBefore("javascript", "string", {
    "template-string": {
        pattern: /`(?:\\[\s\S]|\${(?:[^{}]|{(?:[^{}]|{[^}]*})*})+}|(?!\${)[^\\`])*`/,
        greedy: !0,
        inside: {
            "template-punctuation": {pattern: /^`|`$/, alias: "string"},
            interpolation: {
                pattern: /((?:^|[^\\])(?:\\{2})*)\${(?:[^{}]|{(?:[^{}]|{[^}]*})*})+}/,
                lookbehind: !0,
                inside: {
                    "interpolation-punctuation": {pattern: /^\${|}$/, alias: "punctuation"},
                    rest: Prism.languages.javascript
                }
            },
            string: /[\s\S]+/
        }
    }
}), Prism.languages.markup && Prism.languages.markup.tag.addInlined("script", "javascript"), Prism.languages.js = Prism.languages.javascript, function () {
    if ("undefined" != typeof self && self.Prism && self.document) {
        Element.prototype.matches || (Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector);
        var e = window.Prism, t = {
                js: "javascript",
                py: "python",
                rb: "ruby",
                ps1: "powershell",
                psm1: "powershell",
                sh: "bash",
                bat: "batch",
                h: "c",
                tex: "latex"
            }, n = "data-src-status", a = "loading", s = "loaded",
            r = 'pre[data-src]:not([data-src-status="loaded"]):not([data-src-status="loading"])',
            i = /\blang(?:uage)?-([\w-]+)\b/i;
        e.hooks.add("before-highlightall", (function (e) {
            e.selector += ", " + r
        })), e.hooks.add("before-sanity-check", (function (i) {
            var o = i.element;
            if (o.matches(r)) {
                i.code = "", o.setAttribute(n, a);
                var u = o.appendChild(document.createElement("CODE"));
                u.textContent = "Loading…";
                var c = o.getAttribute("data-src"), d = i.language;
                if ("none" === d) {
                    var g = (/\.(\w+)$/.exec(c) || [, "none"])[1];
                    d = t[g] || g
                }
                l(u, d), l(o, d);
                var p = e.plugins.autoloader;
                p && p.loadLanguages(d);
                var m = new XMLHttpRequest;
                m.open("GET", c, !0), m.onreadystatechange = function () {
                    var t, a;
                    4 == m.readyState && (m.status < 400 && m.responseText ? (o.setAttribute(n, s), u.textContent = m.responseText, e.highlightElement(u)) : (o.setAttribute(n, "failed"), m.status >= 400 ? u.textContent = (t = m.status, a = m.statusText, "✖ Error " + t + " while fetching file: " + a) : u.textContent = "✖ Error: File does not exist or is empty"))
                }, m.send(null)
            }
        })), e.plugins.fileHighlight = {
            highlight: function (t) {
                for (var n, a = (t || document).querySelectorAll(r), s = 0; n = a[s++];) e.highlightElement(n)
            }
        };
        var o = !1;
        e.fileHighlight = function () {
            o || (console.warn("Prism.fileHighlight is deprecated. Use `Prism.plugins.fileHighlight.highlight` instead."), o = !0), e.plugins.fileHighlight.highlight.apply(this, arguments)
        }
    }

    function l(e, t) {
        var n = e.className;
        n = n.replace(i, " ") + " language-" + t, e.className = n.replace(/\s+/g, " ").trim()
    }
}(), function (e) {
    var t = "\\b(?:BASH|BASHOPTS|BASH_ALIASES|BASH_ARGC|BASH_ARGV|BASH_CMDS|BASH_COMPLETION_COMPAT_DIR|BASH_LINENO|BASH_REMATCH|BASH_SOURCE|BASH_VERSINFO|BASH_VERSION|COLORTERM|COLUMNS|COMP_WORDBREAKS|DBUS_SESSION_BUS_ADDRESS|DEFAULTS_PATH|DESKTOP_SESSION|DIRSTACK|DISPLAY|EUID|GDMSESSION|GDM_LANG|GNOME_KEYRING_CONTROL|GNOME_KEYRING_PID|GPG_AGENT_INFO|GROUPS|HISTCONTROL|HISTFILE|HISTFILESIZE|HISTSIZE|HOME|HOSTNAME|HOSTTYPE|IFS|INSTANCE|JOB|LANG|LANGUAGE|LC_ADDRESS|LC_ALL|LC_IDENTIFICATION|LC_MEASUREMENT|LC_MONETARY|LC_NAME|LC_NUMERIC|LC_PAPER|LC_TELEPHONE|LC_TIME|LESSCLOSE|LESSOPEN|LINES|LOGNAME|LS_COLORS|MACHTYPE|MAILCHECK|MANDATORY_PATH|NO_AT_BRIDGE|OLDPWD|OPTERR|OPTIND|ORBIT_SOCKETDIR|OSTYPE|PAPERSIZE|PATH|PIPESTATUS|PPID|PS1|PS2|PS3|PS4|PWD|RANDOM|REPLY|SECONDS|SELINUX_INIT|SESSION|SESSIONTYPE|SESSION_MANAGER|SHELL|SHELLOPTS|SHLVL|SSH_AUTH_SOCK|TERM|UID|UPSTART_EVENTS|UPSTART_INSTANCE|UPSTART_JOB|UPSTART_SESSION|USER|WINDOWID|XAUTHORITY|XDG_CONFIG_DIRS|XDG_CURRENT_DESKTOP|XDG_DATA_DIRS|XDG_GREETER_DATA_DIR|XDG_MENU_PREFIX|XDG_RUNTIME_DIR|XDG_SEAT|XDG_SEAT_PATH|XDG_SESSION_DESKTOP|XDG_SESSION_ID|XDG_SESSION_PATH|XDG_SESSION_TYPE|XDG_VTNR|XMODIFIERS)\\b",
        n = {pattern: /(^(["']?)\w+\2)[ \t]+\S.*/, lookbehind: !0, alias: "punctuation", inside: null}, a = {
            bash: n,
            environment: {pattern: RegExp("\\$" + t), alias: "constant"},
            variable: [{
                pattern: /\$?\(\([\s\S]+?\)\)/,
                greedy: !0,
                inside: {
                    variable: [{pattern: /(^\$\(\([\s\S]+)\)\)/, lookbehind: !0}, /^\$\(\(/],
                    number: /\b0x[\dA-Fa-f]+\b|(?:\b\d+(?:\.\d*)?|\B\.\d+)(?:[Ee]-?\d+)?/,
                    operator: /--?|-=|\+\+?|\+=|!=?|~|\*\*?|\*=|\/=?|%=?|<<=?|>>=?|<=?|>=?|==?|&&?|&=|\^=?|\|\|?|\|=|\?|:/,
                    punctuation: /\(\(?|\)\)?|,|;/
                }
            }, {
                pattern: /\$\((?:\([^)]+\)|[^()])+\)|`[^`]+`/,
                greedy: !0,
                inside: {variable: /^\$\(|^`|\)$|`$/}
            }, {
                pattern: /\$\{[^}]+\}/,
                greedy: !0,
                inside: {
                    operator: /:[-=?+]?|[!\/]|##?|%%?|\^\^?|,,?/,
                    punctuation: /[\[\]]/,
                    environment: {pattern: RegExp("(\\{)" + t), lookbehind: !0, alias: "constant"}
                }
            }, /\$(?:\w+|[#?*!@$])/],
            entity: /\\(?:[abceEfnrtv\\"]|O?[0-7]{1,3}|x[0-9a-fA-F]{1,2}|u[0-9a-fA-F]{4}|U[0-9a-fA-F]{8})/
        };
    e.languages.bash = {
        shebang: {pattern: /^#!\s*\/.*/, alias: "important"},
        comment: {pattern: /(^|[^"{\\$])#.*/, lookbehind: !0},
        "function-name": [{
            pattern: /(\bfunction\s+)\w+(?=(?:\s*\(?:\s*\))?\s*\{)/,
            lookbehind: !0,
            alias: "function"
        }, {pattern: /\b\w+(?=\s*\(\s*\)\s*\{)/, alias: "function"}],
        "for-or-select": {pattern: /(\b(?:for|select)\s+)\w+(?=\s+in\s)/, alias: "variable", lookbehind: !0},
        "assign-left": {
            pattern: /(^|[\s;|&]|[<>]\()\w+(?=\+?=)/,
            inside: {environment: {pattern: RegExp("(^|[\\s;|&]|[<>]\\()" + t), lookbehind: !0, alias: "constant"}},
            alias: "variable",
            lookbehind: !0
        },
        string: [{
            pattern: /((?:^|[^<])<<-?\s*)(\w+?)\s[\s\S]*?(?:\r?\n|\r)\2/,
            lookbehind: !0,
            greedy: !0,
            inside: a
        }, {
            pattern: /((?:^|[^<])<<-?\s*)(["'])(\w+)\2\s[\s\S]*?(?:\r?\n|\r)\3/,
            lookbehind: !0,
            greedy: !0,
            inside: {bash: n}
        }, {
            pattern: /(^|[^\\](?:\\\\)*)(["'])(?:\\[\s\S]|\$\([^)]+\)|\$(?!\()|`[^`]+`|(?!\2)[^\\`$])*\2/,
            lookbehind: !0,
            greedy: !0,
            inside: a
        }],
        environment: {pattern: RegExp("\\$?" + t), alias: "constant"},
        variable: a.variable,
        function: {
            pattern: /(^|[\s;|&]|[<>]\()(?:add|apropos|apt|aptitude|apt-cache|apt-get|aspell|automysqlbackup|awk|basename|bash|bc|bconsole|bg|bzip2|cal|cat|cfdisk|chgrp|chkconfig|chmod|chown|chroot|cksum|clear|cmp|column|comm|composer|cp|cron|crontab|csplit|curl|cut|date|dc|dd|ddrescue|debootstrap|df|diff|diff3|dig|dir|dircolors|dirname|dirs|dmesg|du|egrep|eject|env|ethtool|expand|expect|expr|fdformat|fdisk|fg|fgrep|file|find|fmt|fold|format|free|fsck|ftp|fuser|gawk|git|gparted|grep|groupadd|groupdel|groupmod|groups|grub-mkconfig|gzip|halt|head|hg|history|host|hostname|htop|iconv|id|ifconfig|ifdown|ifup|import|install|ip|jobs|join|kill|killall|less|link|ln|locate|logname|logrotate|look|lpc|lpr|lprint|lprintd|lprintq|lprm|ls|lsof|lynx|make|man|mc|mdadm|mkconfig|mkdir|mke2fs|mkfifo|mkfs|mkisofs|mknod|mkswap|mmv|more|most|mount|mtools|mtr|mutt|mv|nano|nc|netstat|nice|nl|nohup|notify-send|npm|nslookup|op|open|parted|passwd|paste|pathchk|ping|pkill|pnpm|popd|pr|printcap|printenv|ps|pushd|pv|quota|quotacheck|quotactl|ram|rar|rcp|reboot|remsync|rename|renice|rev|rm|rmdir|rpm|rsync|scp|screen|sdiff|sed|sendmail|seq|service|sftp|sh|shellcheck|shuf|shutdown|sleep|slocate|sort|split|ssh|stat|strace|su|sudo|sum|suspend|swapon|sync|tac|tail|tar|tee|time|timeout|top|touch|tr|traceroute|tsort|tty|umount|uname|unexpand|uniq|units|unrar|unshar|unzip|update-grub|uptime|useradd|userdel|usermod|users|uudecode|uuencode|v|vdir|vi|vim|virsh|vmstat|wait|watch|wc|wget|whereis|which|who|whoami|write|xargs|xdg-open|yarn|yes|zenity|zip|zsh|zypper)(?=$|[)\s;|&])/,
            lookbehind: !0
        },
        keyword: {
            pattern: /(^|[\s;|&]|[<>]\()(?:if|then|else|elif|fi|for|while|in|case|esac|function|select|do|done|until)(?=$|[)\s;|&])/,
            lookbehind: !0
        },
        builtin: {
            pattern: /(^|[\s;|&]|[<>]\()(?:\.|:|break|cd|continue|eval|exec|exit|export|getopts|hash|pwd|readonly|return|shift|test|times|trap|umask|unset|alias|bind|builtin|caller|command|declare|echo|enable|help|let|local|logout|mapfile|printf|read|readarray|source|type|typeset|ulimit|unalias|set|shopt)(?=$|[)\s;|&])/,
            lookbehind: !0,
            alias: "class-name"
        },
        boolean: {pattern: /(^|[\s;|&]|[<>]\()(?:true|false)(?=$|[)\s;|&])/, lookbehind: !0},
        "file-descriptor": {pattern: /\B&\d\b/, alias: "important"},
        operator: {
            pattern: /\d?<>|>\||\+=|==?|!=?|=~|<<[<-]?|[&\d]?>>|\d?[<>]&?|&[>&]?|\|[&|]?|<=?|>=?/,
            inside: {"file-descriptor": {pattern: /^\d/, alias: "important"}}
        },
        punctuation: /\$?\(\(?|\)\)?|\.\.|[{}[\];\\]/,
        number: {pattern: /(^|\s)(?:[1-9]\d*|0)(?:[.,]\d+)?\b/, lookbehind: !0}
    }, n.inside = e.languages.bash;
    for (var s = ["comment", "function-name", "for-or-select", "assign-left", "string", "environment", "function", "keyword", "builtin", "boolean", "file-descriptor", "operator", "punctuation", "number"], r = a.variable[1].inside, i = 0; i < s.length; i++) r[s[i]] = e.languages.bash[s[i]];
    e.languages.shell = e.languages.bash
}(Prism), Prism.languages.javascript = Prism.languages.extend("clike", {
    "class-name": [Prism.languages.clike["class-name"], {
        pattern: /(^|[^$\w\xA0-\uFFFF])(?!\s)[_$A-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\.(?:prototype|constructor))/,
        lookbehind: !0
    }],
    keyword: [{
        pattern: /((?:^|})\s*)(?:catch|finally)\b/,
        lookbehind: !0
    }, {
        pattern: /(^|[^.]|\.\.\.\s*)\b(?:as|async(?=\s*(?:function\b|\(|[$\w\xA0-\uFFFF]|$))|await|break|case|class|const|continue|debugger|default|delete|do|else|enum|export|extends|for|from|function|(?:get|set)(?=\s*[\[$\w\xA0-\uFFFF])|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|static|super|switch|this|throw|try|typeof|undefined|var|void|while|with|yield)\b/,
        lookbehind: !0
    }],
    function: /#?(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\s*(?:\.\s*(?:apply|bind|call)\s*)?\()/,
    number: /\b(?:(?:0[xX](?:[\dA-Fa-f](?:_[\dA-Fa-f])?)+|0[bB](?:[01](?:_[01])?)+|0[oO](?:[0-7](?:_[0-7])?)+)n?|(?:\d(?:_\d)?)+n|NaN|Infinity)\b|(?:\b(?:\d(?:_\d)?)+\.?(?:\d(?:_\d)?)*|\B\.(?:\d(?:_\d)?)+)(?:[Ee][+-]?(?:\d(?:_\d)?)+)?/,
    operator: /--|\+\+|\*\*=?|=>|&&=?|\|\|=?|[!=]==|<<=?|>>>?=?|[-+*/%&|^!=<>]=?|\.{3}|\?\?=?|\?\.?|[~:]/
}), Prism.languages.javascript["class-name"][0].pattern = /(\b(?:class|interface|extends|implements|instanceof|new)\s+)[\w.\\]+/, Prism.languages.insertBefore("javascript", "keyword", {
    regex: {
        pattern: /((?:^|[^$\w\xA0-\uFFFF."'\])\s]|\b(?:return|yield))\s*)\/(?:\[(?:[^\]\\\r\n]|\\.)*]|\\.|[^/\\\[\r\n])+\/[gimyus]{0,6}(?=(?:\s|\/\*(?:[^*]|\*(?!\/))*\*\/)*(?:$|[\r\n,.;:})\]]|\/\/))/,
        lookbehind: !0,
        greedy: !0,
        inside: {
            "regex-source": {
                pattern: /^(\/)[\s\S]+(?=\/[a-z]*$)/,
                lookbehind: !0,
                alias: "language-regex",
                inside: Prism.languages.regex
            }, "regex-flags": /[a-z]+$/, "regex-delimiter": /^\/|\/$/
        }
    },
    "function-variable": {
        pattern: /#?(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\s*[=:]\s*(?:async\s*)?(?:\bfunction\b|(?:\((?:[^()]|\([^()]*\))*\)|(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*)\s*=>))/,
        alias: "function"
    },
    parameter: [{
        pattern: /(function(?:\s+(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*)?\s*\(\s*)(?!\s)(?:[^()\s]|\s+(?![\s)])|\([^()]*\))+(?=\s*\))/,
        lookbehind: !0,
        inside: Prism.languages.javascript
    }, {
        pattern: /(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\s*=>)/i,
        inside: Prism.languages.javascript
    }, {
        pattern: /(\(\s*)(?!\s)(?:[^()\s]|\s+(?![\s)])|\([^()]*\))+(?=\s*\)\s*=>)/,
        lookbehind: !0,
        inside: Prism.languages.javascript
    }, {
        pattern: /((?:\b|\s|^)(?!(?:as|async|await|break|case|catch|class|const|continue|debugger|default|delete|do|else|enum|export|extends|finally|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|try|typeof|undefined|var|void|while|with|yield)(?![$\w\xA0-\uFFFF]))(?:(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*\s*)\(\s*|\]\s*\(\s*)(?!\s)(?:[^()\s]|\s+(?![\s)])|\([^()]*\))+(?=\s*\)\s*\{)/,
        lookbehind: !0,
        inside: Prism.languages.javascript
    }],
    constant: /\b[A-Z](?:[A-Z_]|\dx?)*\b/
}), Prism.languages.insertBefore("javascript", "string", {
    "template-string": {
        pattern: /`(?:\\[\s\S]|\${(?:[^{}]|{(?:[^{}]|{[^}]*})*})+}|(?!\${)[^\\`])*`/,
        greedy: !0,
        inside: {
            "template-punctuation": {pattern: /^`|`$/, alias: "string"},
            interpolation: {
                pattern: /((?:^|[^\\])(?:\\{2})*)\${(?:[^{}]|{(?:[^{}]|{[^}]*})*})+}/,
                lookbehind: !0,
                inside: {
                    "interpolation-punctuation": {pattern: /^\${|}$/, alias: "punctuation"},
                    rest: Prism.languages.javascript
                }
            },
            string: /[\s\S]+/
        }
    }
}), Prism.languages.markup && Prism.languages.markup.tag.addInlined("script", "javascript"), Prism.languages.js = Prism.languages.javascript, Prism.languages.scss = Prism.languages.extend("css", {
    comment: {
        pattern: /(^|[^\\])(?:\/\*[\s\S]*?\*\/|\/\/.*)/,
        lookbehind: !0
    },
    atrule: {pattern: /@[\w-](?:\([^()]+\)|[^()\s]|\s+(?!\s))*?(?=\s+[{;])/, inside: {rule: /@[\w-]+/}},
    url: /(?:[-a-z]+-)?url(?=\()/i,
    selector: {
        pattern: /(?=\S)[^@;{}()]?(?:[^@;{}()\s]|\s+(?!\s)|#\{\$[-\w]+\})+(?=\s*\{(?:\}|\s|[^}][^:{}]*[:{][^}]+))/m,
        inside: {parent: {pattern: /&/, alias: "important"}, placeholder: /%[-\w]+/, variable: /\$[-\w]+|#\{\$[-\w]+\}/}
    },
    property: {pattern: /(?:[-\w]|\$[-\w]|#\{\$[-\w]+\})+(?=\s*:)/, inside: {variable: /\$[-\w]+|#\{\$[-\w]+\}/}}
}), Prism.languages.insertBefore("scss", "atrule", {
    keyword: [/@(?:if|else(?: if)?|forward|for|each|while|import|use|extend|debug|warn|mixin|include|function|return|content)\b/i, {
        pattern: /( +)(?:from|through)(?= )/,
        lookbehind: !0
    }]
}), Prism.languages.insertBefore("scss", "important", {variable: /\$[-\w]+|#\{\$[-\w]+\}/}), Prism.languages.insertBefore("scss", "function", {
    "module-modifier": {
        pattern: /\b(?:as|with|show|hide)\b/i,
        alias: "keyword"
    },
    placeholder: {pattern: /%[-\w]+/, alias: "selector"},
    statement: {pattern: /\B!(?:default|optional)\b/i, alias: "keyword"},
    boolean: /\b(?:true|false)\b/,
    null: {pattern: /\bnull\b/, alias: "keyword"},
    operator: {pattern: /(\s)(?:[-+*\/%]|[=!]=|<=?|>=?|and|or|not)(?=\s)/, lookbehind: !0}
}), Prism.languages.scss.atrule.inside.rest = Prism.languages.scss, function (e) {
    var t = /("|')(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/;
    e.languages.css = {
        comment: /\/\*[\s\S]*?\*\//,
        atrule: {
            pattern: /@[\w-](?:[^;{\s]|\s+(?![\s{]))*(?:;|(?=\s*\{))/,
            inside: {
                rule: /^@[\w-]+/,
                "selector-function-argument": {
                    pattern: /(\bselector\s*\(\s*(?![\s)]))(?:[^()\s]|\s+(?![\s)])|\((?:[^()]|\([^()]*\))*\))+(?=\s*\))/,
                    lookbehind: !0,
                    alias: "selector"
                },
                keyword: {pattern: /(^|[^\w-])(?:and|not|only|or)(?![\w-])/, lookbehind: !0}
            }
        },
        url: {
            pattern: RegExp("\\burl\\((?:" + t.source + "|" + /(?:[^\\\r\n()"']|\\[\s\S])*/.source + ")\\)", "i"),
            greedy: !0,
            inside: {
                function: /^url/i,
                punctuation: /^\(|\)$/,
                string: {pattern: RegExp("^" + t.source + "$"), alias: "url"}
            }
        },
        selector: RegExp("[^{}\\s](?:[^{};\"'\\s]|\\s+(?![\\s{])|" + t.source + ")*(?=\\s*\\{)"),
        string: {pattern: t, greedy: !0},
        property: /(?!\s)[-_a-z\xA0-\uFFFF](?:(?!\s)[-\w\xA0-\uFFFF])*(?=\s*:)/i,
        important: /!important\b/i,
        function: /[-a-z0-9]+(?=\()/i,
        punctuation: /[(){};:,]/
    }, e.languages.css.atrule.inside.rest = e.languages.css;
    var n = e.languages.markup;
    n && (n.tag.addInlined("style", "css"), e.languages.insertBefore("inside", "attr-value", {
        "style-attr": {
            pattern: /(^|["'\s])style\s*=\s*(?:"[^"]*"|'[^']*')/i,
            lookbehind: !0,
            inside: {
                "attr-value": {
                    pattern: /=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+)/,
                    inside: {
                        style: {
                            pattern: /(["'])[\s\S]+(?=["']$)/,
                            lookbehind: !0,
                            alias: "language-css",
                            inside: e.languages.css
                        }, punctuation: [{pattern: /^=/, alias: "attr-equals"}, /"|'/]
                    }
                }, "attr-name": /^style/i
            }
        }
    }, n.tag))
}(Prism), function () {
    var e = Object.assign || function (e, t) {
        for (var n in t) t.hasOwnProperty(n) && (e[n] = t[n]);
        return e
    };

    function t(t) {
        this.defaults = e({}, t)
    }

    function n(e) {
        for (var t = 0, n = 0; n < e.length; ++n) e.charCodeAt(n) == "\t".charCodeAt(0) && (t += 3);
        return e.length + t
    }

    t.prototype = {
        setDefaults: function (t) {
            this.defaults = e(this.defaults, t)
        }, normalize: function (t, n) {
            for (var a in n = e(this.defaults, n)) {
                var s = a.replace(/-(\w)/g, (function (e, t) {
                    return t.toUpperCase()
                }));
                "normalize" !== a && "setDefaults" !== s && n[a] && this[s] && (t = this[s].call(this, t, n[a]))
            }
            return t
        }, leftTrim: function (e) {
            return e.replace(/^\s+/, "")
        }, rightTrim: function (e) {
            return e.replace(/\s+$/, "")
        }, tabsToSpaces: function (e, t) {
            return t = 0 | t || 4, e.replace(/\t/g, new Array(++t).join(" "))
        }, spacesToTabs: function (e, t) {
            return t = 0 | t || 4, e.replace(RegExp(" {" + t + "}", "g"), "\t")
        }, removeTrailing: function (e) {
            return e.replace(/\s*?$/gm, "")
        }, removeInitialLineFeed: function (e) {
            return e.replace(/^(?:\r?\n|\r)/, "")
        }, removeIndent: function (e) {
            var t = e.match(/^[^\S\n\r]*(?=\S)/gm);
            return t && t[0].length ? (t.sort((function (e, t) {
                return e.length - t.length
            })), t[0].length ? e.replace(RegExp("^" + t[0], "gm"), "") : e) : e
        }, indent: function (e, t) {
            return e.replace(/^[^\S\n\r]*(?=\S)/gm, new Array(++t).join("\t") + "$&")
        }, breakLines: function (e, t) {
            t = !0 === t ? 80 : 0 | t || 80;
            for (var a = e.split("\n"), s = 0; s < a.length; ++s) if (!(n(a[s]) <= t)) {
                for (var r = a[s].split(/(\s+)/g), i = 0, o = 0; o < r.length; ++o) {
                    var l = n(r[o]);
                    (i += l) > t && (r[o] = "\n" + r[o], i = l)
                }
                a[s] = r.join("")
            }
            return a.join("\n")
        }
    }, "undefined" != typeof module && module.exports && (module.exports = t), void 0 !== Prism && (Prism.plugins.NormalizeWhitespace = new t({
        "remove-trailing": !0,
        "remove-indent": !0,
        "left-trim": !0,
        "right-trim": !0
    }), Prism.hooks.add("before-sanity-check", (function (e) {
        var t = Prism.plugins.NormalizeWhitespace;
        if ((!e.settings || !1 !== e.settings["whitespace-normalization"]) && Prism.util.isActive(e.element, "whitespace-normalization", !0)) if (e.element && e.element.parentNode || !e.code) {
            var n = e.element.parentNode;
            if (e.code && n && "pre" === n.nodeName.toLowerCase()) {
                for (var a = n.childNodes, s = "", r = "", i = !1, o = 0; o < a.length; ++o) {
                    var l = a[o];
                    l == e.element ? i = !0 : "#text" === l.nodeName && (i ? r += l.nodeValue : s += l.nodeValue, n.removeChild(l), --o)
                }
                if (e.element.children.length && Prism.plugins.KeepMarkup) {
                    var u = s + e.element.innerHTML + r;
                    e.element.innerHTML = t.normalize(u, e.settings), e.code = e.element.textContent
                } else e.code = s + e.code + r, e.code = t.normalize(e.code, e.settings)
            }
        } else e.code = t.normalize(e.code, e.settings)
    })))
}(), Prism.plugins.NormalizeWhitespace.setDefaults({
    "remove-trailing": !0,
    "remove-indent": !0,
    "left-trim": !0,
    "right-trim": !0
});
