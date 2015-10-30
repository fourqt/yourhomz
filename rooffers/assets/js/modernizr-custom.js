/*! modernizr 3.1.0 (Custom Build) | MIT *
 * http://modernizr.com/download/?-applicationcache-audio-audiopreload-backgroundsize-bgpositionshorthand-bgpositionxy-bgrepeatspace_bgrepeatround-bgsizecover-borderimage-borderradius-boxshadow-boxsizing-canvas-canvasblending-canvastext-canvaswinding-cssanimations-csscalc-csscolumns-cssfilters-cssgradients-cssinvalid-csspointerevents-csspositionsticky-csspseudoanimations-csspseudotransitions-cssreflections-cssremunit-cssresize-cssscrollbar-csstransforms-csstransforms3d-csstransitions-cssvalid-displaytable-flexbox-flexboxtweener-flexwrap-fontface-generatedcontent-geolocation-hashchange-history-hsla-indexeddb-indexeddbblob-inlinesvg-lastchild-localstorage-mediaqueries-multiplebgs-nthchild-opacity-overflowscrolling-placeholder-postmessage-preserve3d-rgba-sessionstorage-shapes-siblinggeneral-smil-subpixelfont-supports-svg-svgclippaths-target-textalignlast-textshadow-todataurljpeg_todataurlpng_todataurlwebp-touchevents-video-videoautoplay-videoloop-videopreload-webgl-webglextensions-webplossless_webp_lossless-websockets-webworkers-xhrresponsetypejson !*/
!function(e,t,n){function A(e){var t=R.className,n=Modernizr._config.classPrefix||"";if(C&&(t=t.baseVal),Modernizr._config.enableJSClass){var A=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(A,"$1"+n+"js$2")}Modernizr._config.enableClasses&&(t+=" "+n+e.join(" "+n),C?R.className.baseVal=t:R.className=t)}function o(e,t){return typeof e===t}function r(){var e,t,n,A,r,a,i;for(var s in x)if(x.hasOwnProperty(s)){if(e=[],t=x[s],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(A=o(t.fn,"function")?t.fn():t.fn,r=0;r<e.length;r++)a=e[r],i=a.split("."),1===i.length?Modernizr[i[0]]=A:(!Modernizr[i[0]]||Modernizr[i[0]]instanceof Boolean||(Modernizr[i[0]]=new Boolean(Modernizr[i[0]])),Modernizr[i[0]][i[1]]=A),b.push((A?"":"no-")+i.join("-"))}}function a(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):C?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function i(e,t){return!!~(""+e).indexOf(t)}function s(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function d(e,t){if("object"==typeof e)for(var n in e)U(e,n)&&d(n,e[n]);else{e=e.toLowerCase();var o=e.split("."),r=Modernizr[o[0]];if(2==o.length&&(r=r[o[1]]),"undefined"!=typeof r)return Modernizr;t="function"==typeof t?t():t,1==o.length?Modernizr[o[0]]=t:(!Modernizr[o[0]]||Modernizr[o[0]]instanceof Boolean||(Modernizr[o[0]]=new Boolean(Modernizr[o[0]])),Modernizr[o[0]][o[1]]=t),A([(t&&0!=t?"":"no-")+o.join("-")]),Modernizr._trigger(e,t)}return Modernizr}function c(){var e=t.body;return e||(e=a(C?"svg":"body"),e.fake=!0),e}function l(e,n,A,o){var r,i,s,d,l="modernizr",u=a("div"),p=c();if(parseInt(A,10))for(;A--;)s=a("div"),s.id=o?o[A]:l+(A+1),u.appendChild(s);return r=a("style"),r.type="text/css",r.id="s"+l,(p.fake?p:u).appendChild(r),p.appendChild(u),r.styleSheet?r.styleSheet.cssText=e:r.appendChild(t.createTextNode(e)),u.id=l,p.fake&&(p.style.background="",p.style.overflow="hidden",d=R.style.overflow,R.style.overflow="hidden",R.appendChild(p)),i=n(u,e),p.fake?(p.parentNode.removeChild(p),R.style.overflow=d,R.offsetHeight):u.parentNode.removeChild(u),!!i}function u(e,t){return function(){return e.apply(t,arguments)}}function p(e,t,n){var A;for(var r in e)if(e[r]in t)return n===!1?e[r]:(A=t[e[r]],o(A,"function")?u(A,n||t):A);return!1}function f(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function g(t,A){var o=t.length;if("CSS"in e&&"supports"in e.CSS){for(;o--;)if(e.CSS.supports(f(t[o]),A))return!0;return!1}if("CSSSupportsRule"in e){for(var r=[];o--;)r.push("("+f(t[o])+":"+A+")");return r=r.join(" or "),l("@supports ("+r+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return n}function h(e,t,A,r){function d(){l&&(delete N.style,delete N.modElem)}if(r=o(r,"undefined")?!1:r,!o(A,"undefined")){var c=g(e,A);if(!o(c,"undefined"))return c}for(var l,u,p,f,h,m=["modernizr","tspan"];!N.style;)l=!0,N.modElem=a(m.shift()),N.style=N.modElem.style;for(p=e.length,u=0;p>u;u++)if(f=e[u],h=N.style[f],i(f,"-")&&(f=s(f)),N.style[f]!==n){if(r||o(A,"undefined"))return d(),"pfx"==t?f:!0;try{N.style[f]=A}catch(v){}if(N.style[f]!=h)return d(),"pfx"==t?f:!0}return d(),!1}function m(e,t,n,A,r){var a=e.charAt(0).toUpperCase()+e.slice(1),i=(e+" "+Y.join(a+" ")+a).split(" ");return o(t,"string")||o(t,"undefined")?h(i,t,A,r):(i=(e+" "+z.join(a+" ")+a).split(" "),p(i,t,n))}function v(e,t,A){return m(e,n,n,t,A)}var b=[],x=[],T={_version:"3.1.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){x.push({name:e,fn:t,options:n})},addAsyncTest:function(e){x.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=T,Modernizr=new Modernizr,Modernizr.addTest("applicationcache","applicationCache"in e),Modernizr.addTest("history",function(){var t=navigator.userAgent;return-1===t.indexOf("Android 2.")&&-1===t.indexOf("Android 4.0")||-1===t.indexOf("Mobile Safari")||-1!==t.indexOf("Chrome")||-1!==t.indexOf("Windows Phone")?e.history&&"pushState"in e.history:!1}),Modernizr.addTest("geolocation","geolocation"in navigator),Modernizr.addTest("postmessage","postMessage"in e),Modernizr.addTest("svg",!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect),Modernizr.addTest("websockets","WebSocket"in e&&2===e.WebSocket.CLOSING);var w="CSS"in e&&"supports"in e.CSS,y="supportsCSS"in e;Modernizr.addTest("supports",w||y),Modernizr.addTest("target",function(){var t=e.document;if(!("querySelectorAll"in t))return!1;try{return t.querySelectorAll(":target"),!0}catch(n){return!1}}),Modernizr.addTest("localstorage",function(){var e="modernizr";try{return localStorage.setItem(e,e),localStorage.removeItem(e),!0}catch(t){return!1}}),Modernizr.addTest("sessionstorage",function(){var e="modernizr";try{return sessionStorage.setItem(e,e),sessionStorage.removeItem(e),!0}catch(t){return!1}}),Modernizr.addTest("webworkers","Worker"in e);var R=t.documentElement,C="svg"===R.nodeName.toLowerCase();Modernizr.addTest("audio",function(){var e=a("audio"),t=!1;try{(t=!!e.canPlayType)&&(t=new Boolean(t),t.ogg=e.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),t.mp3=e.canPlayType("audio/mpeg;").replace(/^no$/,""),t.opus=e.canPlayType('audio/ogg; codecs="opus"').replace(/^no$/,""),t.wav=e.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),t.m4a=(e.canPlayType("audio/x-m4a;")||e.canPlayType("audio/aac;")).replace(/^no$/,""))}catch(n){}return t}),Modernizr.addTest("canvas",function(){var e=a("canvas");return!(!e.getContext||!e.getContext("2d"))}),Modernizr.addTest("canvastext",function(){return Modernizr.canvas===!1?!1:"function"==typeof a("canvas").getContext("2d").fillText}),Modernizr.addTest("video",function(){var e=a("video"),t=!1;try{(t=!!e.canPlayType)&&(t=new Boolean(t),t.ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),t.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),t.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""),t.vp9=e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/,""),t.hls=e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/,""))}catch(n){}return t}),Modernizr.addTest("audiopreload","preload"in a("audio")),Modernizr.addTest("webgl",function(){var t=a("canvas"),n="probablySupportsContext"in t?"probablySupportsContext":"supportsContext";return n in t?t[n]("webgl")||t[n]("experimental-webgl"):"WebGLRenderingContext"in e}),Modernizr.addTest("canvasblending",function(){if(Modernizr.canvas===!1)return!1;var e=a("canvas").getContext("2d");try{e.globalCompositeOperation="screen"}catch(t){}return"screen"===e.globalCompositeOperation});var E=a("canvas");Modernizr.addTest("todataurljpeg",function(){return!!Modernizr.canvas&&0===E.toDataURL("image/jpeg").indexOf("data:image/jpeg")}),Modernizr.addTest("todataurlpng",function(){return!!Modernizr.canvas&&0===E.toDataURL("image/png").indexOf("data:image/png")}),Modernizr.addTest("todataurlwebp",function(){var e=!1;try{e=!!Modernizr.canvas&&0===E.toDataURL("image/webp").indexOf("data:image/webp")}catch(t){}return e}),Modernizr.addTest("canvaswinding",function(){if(Modernizr.canvas===!1)return!1;var e=a("canvas").getContext("2d");return e.rect(0,0,10,10),e.rect(2,2,6,6),e.isPointInPath(5,5,"evenodd")===!1}),Modernizr.addTest("bgpositionshorthand",function(){var e=a("a"),t=e.style,n="right 10px bottom 10px";return t.cssText="background-position: "+n+";",t.backgroundPosition===n}),Modernizr.addTest("multiplebgs",function(){var e=a("a").style;return e.cssText="background:url(https://),url(https://),red url(https://)",/(url\s*\(.*?){3}/.test(e.background)}),Modernizr.addTest("csspointerevents",function(){var e=a("a").style;return e.cssText="pointer-events:auto","auto"===e.pointerEvents}),Modernizr.addTest("cssremunit",function(){var e=a("a").style;try{e.fontSize="3rem"}catch(t){}return/rem/.test(e.fontSize)}),Modernizr.addTest("rgba",function(){var e=a("a").style;return e.cssText="background-color:rgba(150,255,150,.5)",(""+e.backgroundColor).indexOf("rgba")>-1}),Modernizr.addTest("placeholder","placeholder"in a("input")&&"placeholder"in a("textarea")),Modernizr.addTest("inlinesvg",function(){var e=a("div");return e.innerHTML="<svg/>","http://www.w3.org/2000/svg"==("undefined"!=typeof SVGRect&&e.firstChild&&e.firstChild.namespaceURI)}),Modernizr.addTest("videoloop","loop"in a("video")),Modernizr.addAsyncTest(function(){if(Modernizr.webglextensions=new Boolean(!1),Modernizr.webgl){var e,t,A;try{e=a("canvas"),t=e.getContext("webgl")||e.getContext("experimental-webgl"),A=t.getSupportedExtensions()}catch(o){return}t!==n&&(Modernizr.webglextensions=new Boolean(!0));for(var r=-1,i=A.length;++r<i;)Modernizr.webglextensions[A[r]]=!0;e=n}}),Modernizr.addTest("videopreload","preload"in a("video"));var B=function(e){function n(t,n){var o;return t?(n&&"string"!=typeof n||(n=a(n||"div")),t="on"+t,o=t in n,!o&&A&&(n.setAttribute||(n=a("div")),n.setAttribute(t,""),o="function"==typeof n[t],n[t]!==e&&(n[t]=e),n.removeAttribute(t)),o):!1}var A=!("onblur"in t.documentElement);return n}();T.hasEvent=B,Modernizr.addTest("hashchange",function(){return B("hashchange",e)===!1?!1:t.documentMode===n||t.documentMode>7});var S=T._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):[];T._prefixes=S,Modernizr.addTest("csscalc",function(){var e="width:",t="calc(10px);",n=a("a");return n.style.cssText=e+S.join(t+e),!!n.style.length}),Modernizr.addTest("cssgradients",function(){for(var e,t="background-image:",n="gradient(linear,left top,right bottom,from(#9f9),to(white));",A="",o=0,r=S.length-1;r>o;o++)e=0===o?"to ":"",A+=t+S[o]+"linear-gradient("+e+"left top, #9f9, white);";Modernizr._config.usePrefixes&&(A+=t+"-webkit-"+n);var i=a("a"),s=i.style;return s.cssText=A,(""+s.backgroundImage).indexOf("gradient")>-1}),Modernizr.addTest("opacity",function(){var e=a("a").style;return e.cssText=S.join("opacity:.55;"),/^0.55$/.test(e.opacity)}),Modernizr.addTest("csspositionsticky",function(){var e="position:",t="sticky",n=a("a"),A=n.style;return A.cssText=e+S.join(t+";"+e).slice(0,-e.length),-1!==A.position.indexOf(t)}),Modernizr.addTest("hsla",function(){var e=a("a").style;return e.cssText="background-color:hsla(120,40%,100%,.5)",i(e.backgroundColor,"rgba")||i(e.backgroundColor,"hsla")});var k=function(e){if("undefined"==typeof XMLHttpRequest)return!1;var t=new XMLHttpRequest;t.open("get","/",!0);try{t.responseType=e}catch(n){return!1}return"response"in t&&t.responseType==e};Modernizr.addTest("xhrresponsetypejson",k("json"));var F={}.toString;Modernizr.addTest("svgclippaths",function(){return!!t.createElementNS&&/SVGClipPath/.test(F.call(t.createElementNS("http://www.w3.org/2000/svg","clipPath")))}),Modernizr.addTest("smil",function(){return!!t.createElementNS&&/SVGAnimate/.test(F.call(t.createElementNS("http://www.w3.org/2000/svg","animate")))});var U;!function(){var e={}.hasOwnProperty;U=o(e,"undefined")||o(e.call,"undefined")?function(e,t){return t in e&&o(e.constructor.prototype[t],"undefined")}:function(t,n){return e.call(t,n)}}(),T._l={},T.on=function(e,t){this._l[e]||(this._l[e]=[]),this._l[e].push(t),Modernizr.hasOwnProperty(e)&&setTimeout(function(){Modernizr._trigger(e,Modernizr[e])},0)},T._trigger=function(e,t){if(this._l[e]){var n=this._l[e];setTimeout(function(){var e,A;for(e=0;e<n.length;e++)(A=n[e])(t)},0),delete this._l[e]}},Modernizr._q.push(function(){T.addTest=d}),Modernizr.addAsyncTest(function(){var e=new Image;e.onerror=function(){d("webplossless",!1,{aliases:["webp-lossless"]})},e.onload=function(){d("webplossless",1==e.width,{aliases:["webp-lossless"]})},e.src="data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA="}),Modernizr.addAsyncTest(function(){function e(n){clearTimeout(t),A.removeEventListener("playing",e,!1),d("videoautoplay",n&&"playing"===n.type||0!==A.currentTime),A.parentNode.removeChild(A)}var t,n=300,A=a("video"),o=A.style;if(!(Modernizr.video&&"autoplay"in A))return void d("videoautoplay",!1);o.position="absolute",o.height=0,o.width=0;try{if(Modernizr.video.ogg)A.src="data:video/ogg;base64,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";else{if(!Modernizr.video.h264)return void d("videoautoplay",!1);A.src="data:video/mp4;base64,AAAAHGZ0eXBtcDQyAAAAAG1wNDJpc29tYXZjMQAAAz5tb292AAAAbG12aGQAAAAAzaNacc2jWnEAAV+QAAFfkAABAAABAAAAAAAAAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACAAAAGGlvZHMAAAAAEICAgAcAT////3//AAACQ3RyYWsAAABcdGtoZAAAAAHNo1pxzaNacQAAAAEAAAAAAAFfkAAAAAAAAAAAAAAAAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAEAAAAAAEAAAABAAAAAAAd9tZGlhAAAAIG1kaGQAAAAAzaNacc2jWnEAAV+QAAFfkFXEAAAAAAAhaGRscgAAAAAAAAAAdmlkZQAAAAAAAAAAAAAAAAAAAAGWbWluZgAAABR2bWhkAAAAAQAAAAAAAAAAAAAAJGRpbmYAAAAcZHJlZgAAAAAAAAABAAAADHVybCAAAAABAAABVnN0YmwAAACpc3RzZAAAAAAAAAABAAAAmWF2YzEAAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAEAAQAEgAAABIAAAAAAAAAAEOSlZUL0FWQyBDb2RpbmcAAAAAAAAAAAAAAAAAAAAAAAAY//8AAAAxYXZjQwH0AAr/4QAZZ/QACq609NQYBBkAAAMAAQAAAwAKjxImoAEABWjOAa8gAAAAEmNvbHJuY2xjAAYAAQAGAAAAGHN0dHMAAAAAAAAAAQAAAAUAAEZQAAAAKHN0c3oAAAAAAAAAAAAAAAUAAAIqAAAACAAAAAgAAAAIAAAACAAAAChzdHNjAAAAAAAAAAIAAAABAAAABAAAAAEAAAACAAAAAQAAAAEAAAAYc3RjbwAAAAAAAAACAAADYgAABaQAAAAUc3RzcwAAAAAAAAABAAAAAQAAABFzZHRwAAAAAAREREREAAAAb3VkdGEAAABnbWV0YQAAAAAAAAAhaGRscgAAAAAAAAAAbWRpcgAAAAAAAAAAAAAAAAAAAAA6aWxzdAAAADKpdG9vAAAAKmRhdGEAAAABAAAAAEhhbmRCcmFrZSAwLjkuOCAyMDEyMDcxODAwAAACUm1kYXQAAAHkBgX/4NxF6b3m2Ui3lizYINkj7u94MjY0IC0gY29yZSAxMjAgLSBILjI2NC9NUEVHLTQgQVZDIGNvZGVjIC0gQ29weWxlZnQgMjAwMy0yMDExIC0gaHR0cDovL3d3dy52aWRlb2xhbi5vcmcveDI2NC5odG1sIC0gb3B0aW9uczogY2FiYWM9MCByZWY9MSBkZWJsb2NrPTE6MDowIGFuYWx5c2U9MHgxOjAgbWU9ZXNhIHN1Ym1lPTkgcHN5PTAgbWl4ZWRfcmVmPTAgbWVfcmFuZ2U9NCBjaHJvbWFfbWU9MSB0cmVsbGlzPTAgOHg4ZGN0PTAgY3FtPTAgZGVhZHpvbmU9MjEsMTEgZmFzdF9wc2tpcD0wIGNocm9tYV9xcF9vZmZzZXQ9MCB0aHJlYWRzPTYgc2xpY2VkX3RocmVhZHM9MCBucj0wIGRlY2ltYXRlPTEgaW50ZXJsYWNlZD0wIGJsdXJheV9jb21wYXQ9MCBjb25zdHJhaW5lZF9pbnRyYT0wIGJmcmFtZXM9MCB3ZWlnaHRwPTAga2V5aW50PTUwIGtleWludF9taW49NSBzY2VuZWN1dD00MCBpbnRyYV9yZWZyZXNoPTAgcmM9Y3FwIG1idHJlZT0wIHFwPTAAgAAAAD5liISscR8A+E4ACAACFoAAITAAAgsAAPgYCoKgoC+L4vi+KAvi+L4YfAEAACMzgABF9AAEUGUgABDJiXnf4AAAAARBmiKUAAAABEGaQpQAAAAEQZpilAAAAARBmoKU"}}catch(r){return void d("videoautoplay",!1)}A.setAttribute("autoplay",""),A.style.cssText="display:none",R.appendChild(A),setTimeout(function(){A.addEventListener("playing",e,!1),t=setTimeout(e,n)},0)});var G=T.testStyles=l;Modernizr.addTest("touchevents",function(){var n;if("ontouchstart"in e||e.DocumentTouch&&t instanceof DocumentTouch)n=!0;else{var A=["@media (",S.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");G(A,function(e){n=9===e.offsetTop})}return n}),G("#modernizr{display: table; direction: ltr}#modernizr div{display: table-cell; padding: 10px}",function(e){var t,n=e.childNodes;t=n[0].offsetLeft<n[1].offsetLeft,Modernizr.addTest("displaytable",t,{aliases:["display-table"]})},2);var P=function(){var e=navigator.userAgent,t=e.match(/applewebkit\/([0-9]+)/gi)&&parseFloat(RegExp.$1),n=e.match(/w(eb)?osbrowser/gi),A=e.match(/windows phone/gi)&&e.match(/iemobile\/([0-9])+/gi)&&parseFloat(RegExp.$1)>=9,o=533>t&&e.match(/android/gi);return n||o||A}();P?Modernizr.addTest("fontface",!1):G('@font-face {font-family:"font";src:url("https://")}',function(e,n){var A=t.getElementById("smodernizr"),o=A.sheet||A.styleSheet,r=o?o.cssRules&&o.cssRules[0]?o.cssRules[0].cssText:o.cssText||"":"",a=/src/i.test(r)&&0===r.indexOf(n.split(" ")[0]);Modernizr.addTest("fontface",a)}),G('#modernizr{font:0/0 a}#modernizr:after{content:":)";visibility:hidden;font:7px/1 a}',function(e){Modernizr.addTest("generatedcontent",e.offsetHeight>=7)}),Modernizr.addTest("cssinvalid",function(){return G("#modernizr input{height:0;border:0;padding:0;margin:0;width:10px} #modernizr input:invalid{width:50px}",function(e){var t=a("input");return t.required=!0,e.appendChild(t),t.clientWidth>10})}),G("#modernizr div {width:100px} #modernizr :last-child{width:200px;display:block}",function(e){Modernizr.addTest("lastchild",e.lastChild.offsetWidth>e.firstChild.offsetWidth)},2),G("#modernizr div {width:1px} #modernizr div:nth-child(2n) {width:2px;}",function(e){Modernizr.addTest("nthchild",function(){for(var t=e.getElementsByTagName("div"),n=!0,A=0;5>A;A++)n=n&&t[A].offsetWidth===A%2+1;return n})},5),G("#modernizr{overflow: scroll; width: 40px; height: 40px; }#"+S.join("scrollbar{width:0px} #modernizr::").split("#").slice(1).join("#")+"scrollbar{width:0px}",function(e){Modernizr.addTest("cssscrollbar",40==e.scrollWidth)}),Modernizr.addTest("siblinggeneral",function(){return G("#modernizr div {width:100px} #modernizr div ~ div {width:200px;display:block}",function(e){return 200==e.lastChild.offsetWidth},2)}),G("#modernizr{position: absolute; top: -10em; visibility:hidden; font: normal 10px arial;}#subpixel{float: left; font-size: 33.3333%;}",function(t){var n=t.firstChild;n.innerHTML="This is a text written in Arial",Modernizr.addTest("subpixelfont",e.getComputedStyle?"44px"!==e.getComputedStyle(n,null).getPropertyValue("width"):!1)},1,["subpixel"]),Modernizr.addTest("cssvalid",function(){return G("#modernizr input{height:0;border:0;padding:0;margin:0;width:10px} #modernizr input:valid{width:50px}",function(e){var t=a("input");return e.appendChild(t),t.clientWidth>10})});var Q=function(){var t=e.matchMedia||e.msMatchMedia;return t?function(e){var n=t(e);return n&&n.matches||!1}:function(t){var n=!1;return l("@media "+t+" { #modernizr { position: absolute; } }",function(t){n="absolute"==(e.getComputedStyle?e.getComputedStyle(t,null):t.currentStyle).position}),n}}();T.mq=Q,Modernizr.addTest("mediaqueries",Q("only all"));var V="Moz O ms Webkit",z=T._config.usePrefixes?V.toLowerCase().split(" "):[];T._domPrefixes=z;var Y=T._config.usePrefixes?V.split(" "):[];T._cssomPrefixes=Y;var I=function(t){var A,o=S.length,r=e.CSSRule;if("undefined"==typeof r)return n;if(!t)return!1;if(t=t.replace(/^@/,""),A=t.replace(/-/g,"_").toUpperCase()+"_RULE",A in r)return"@"+t;for(var a=0;o>a;a++){var i=S[a],s=i.toUpperCase()+"_"+A;if(s in r)return"@-"+i.toLowerCase()+"-"+t}return!1};T.atRule=I;var M={elem:a("modernizr")};Modernizr._q.push(function(){delete M.elem});var N={style:M.elem.style};Modernizr._q.unshift(function(){delete N.style});var Z=T.testProp=function(e,t,A){return h([e],n,t,A)};Modernizr.addTest("textshadow",Z("textShadow","1px 1px")),T.testAllProps=m;var D=T.prefixed=function(e,t,n){return 0===e.indexOf("@")?I(e):(-1!=e.indexOf("-")&&(e=s(e)),t?m(e,t,n):m(e,"pfx"))},W=D("indexedDB",e);Modernizr.addTest("indexeddb",!!W),W&&Modernizr.addTest("indexeddb.deletedatabase","deleteDatabase"in W),Modernizr.addAsyncTest(function(){var t,n,A=D("indexedDB",e),o="detect-blob-support",r=!1;if(!Modernizr.indexeddb||!Modernizr.indexeddb.deleteDatabase)return!1;try{A.deleteDatabase(o).onsuccess=function(){t=A.open(o,1),t.onupgradeneeded=function(){t.result.createObjectStore("store")},t.onsuccess=function(){n=t.result;try{n.transaction("store","readwrite").objectStore("store").put(new Blob,"key"),r=!0}catch(e){r=!1}finally{d("indexeddbblob",r),n.close(),A.deleteDatabase(o)}}}}catch(a){d("indexeddbblob",!1)}}),T.testAllProps=v,Modernizr.addTest("cssanimations",v("animationName","a",!0)),Modernizr.addTest("csspseudoanimations",function(){var t=!1;if(!Modernizr.cssanimations||!e.getComputedStyle)return t;var n=["@",Modernizr._prefixes.join("keyframes csspseudoanimations { from { font-size: 10px; } }@").replace(/\@$/,""),'#modernizr:before { content:" "; font-size:5px;',Modernizr._prefixes.join("animation:csspseudoanimations 1ms infinite;"),"}"].join("");return Modernizr.testStyles(n,function(n){t="10px"===e.getComputedStyle(n,":before").getPropertyValue("font-size")}),t}),Modernizr.addTest("bgpositionxy",function(){return v("backgroundPositionX","3px",!0)&&v("backgroundPositionY","5px",!0)}),Modernizr.addTest("bgrepeatround",v("backgroundRepeat","round")),Modernizr.addTest("bgrepeatspace",v("backgroundRepeat","space")),Modernizr.addTest("bgsizecover",v("backgroundSize","cover")),Modernizr.addTest("backgroundsize",v("backgroundSize","100%",!0)),Modernizr.addTest("borderimage",v("borderImage","url() 1",!0)),Modernizr.addTest("borderradius",v("borderRadius","0px",!0)),Modernizr.addTest("boxshadow",v("boxShadow","1px 1px",!0)),Modernizr.addTest("boxsizing",v("boxSizing","border-box",!0)&&(t.documentMode===n||t.documentMode>7)),function(){Modernizr.addTest("csscolumns",function(){var e=!1,t=v("columnCount");try{(e=!!t)&&(e=new Boolean(e))}catch(n){}return e});for(var e,t,n=["Width","Span","Fill","Gap","Rule","RuleColor","RuleStyle","RuleWidth","BreakBefore","BreakAfter","BreakInside"],A=0;A<n.length;A++)e=n[A].toLowerCase(),t=v("column"+n[A]),("breakbefore"===e||"breakafter"===e||"breakinside"==e)&&(t=t||v(n[A])),Modernizr.addTest("csscolumns."+e,t)}(),Modernizr.addTest("cssfilters",function(){if(Modernizr.supports)return v("filter","blur(2px)");var e=a("a");return e.style.cssText=S.join("filter:blur(2px); "),!!e.style.length&&(t.documentMode===n||t.documentMode>9)}),Modernizr.addTest("flexbox",v("flexBasis","1px",!0)),Modernizr.addTest("flexboxtweener",v("flexAlign","end",!0)),Modernizr.addTest("flexwrap",v("flexWrap","wrap",!0)),Modernizr.addTest("overflowscrolling",v("overflowScrolling","touch",!0)),Modernizr.addTest("cssreflections",v("boxReflect","above",!0)),Modernizr.addTest("cssresize",v("resize","both",!0)),Modernizr.addTest("shapes",v("shapeOutside","content-box",!0)),Modernizr.addTest("textalignlast",v("textAlignLast")),Modernizr.addTest("csstransforms",function(){return-1===navigator.userAgent.indexOf("Android 2.")&&v("transform","scale(1)",!0)}),Modernizr.addTest("csstransforms3d",function(){var e=!!v("perspective","1px",!0),t=Modernizr._config.usePrefixes;if(e&&(!t||"webkitPerspective"in R.style)){var n,A="#modernizr{width:0;height:0}";Modernizr.supports?n="@supports (perspective: 1px)":(n="@media (transform-3d)",t&&(n+=",(-webkit-transform-3d)")),n+="{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}",G(A+n,function(t){e=7===t.offsetWidth&&18===t.offsetHeight})}return e}),Modernizr.addTest("preserve3d",v("transformStyle","preserve-3d")),Modernizr.addTest("csstransitions",v("transition","all",!0)),Modernizr.addTest("csspseudotransitions",function(){var t=!1;if(!Modernizr.csstransitions||!e.getComputedStyle)return t;var n='#modernizr:before { content:" "; font-size:5px;'+Modernizr._prefixes.join("transition:0s 100s;")+"}#modernizr.trigger:before { font-size:10px; }";return Modernizr.testStyles(n,function(n){e.getComputedStyle(n,":before").getPropertyValue("font-size"),n.className+="trigger",t="5px"===e.getComputedStyle(n,":before").getPropertyValue("font-size")}),t}),r(),A(b),delete T.addTest,delete T.addAsyncTest;for(var j=0;j<Modernizr._q.length;j++)Modernizr._q[j]();e.Modernizr=Modernizr}(window,document);