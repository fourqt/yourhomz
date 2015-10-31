$(document).ready(function() {
    function e() {
        document.fullScreenElement && null !== document.fullScreenElement || !document.mozFullScreen && !document.webkitIsFullScreen ? document.documentElement.requestFullScreen ? document.documentElement.requestFullScreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullScreen && document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT) : document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen()
    }

    function n(e) {
        $(e).block({
            message: '<img src="assets/images/reload.gif" width="20px" alt="">',
            css: {
                border: "none",
                padding: "0px",
                width: "20px",
                height: "20px",
                backgroundColor: "transparent"
            },
            overlayCSS: {
                backgroundColor: "#fff",
                opacity: .9,
                cursor: "wait"
            }
        })
    }

    function a(e) {
        $(e).unblock()
    }
    $(".show-search").click(function() {
        $(".search-form").css("margin-top", "0"), $(".search-input").focus()
    }), $(".close-search").click(function() {
        $(".search-form").css("margin-top", "-60px")
    }), $(".toggle-fullscreen").click(function() {
        e()
    }), $('[data-toggle~="tooltip"]').tooltip({
        container: "body"
    });
    var s = Array.prototype.slice.call(document.querySelectorAll(".js-switch"));
    s.forEach(function(e) {
        new Switchery(e, {
            color: "#23B7E5"
        })
    }), $(".panel-collapse").click(function() {
        $(this).closest(".panel").children(".panel-body").slideToggle("fast")
    }), $(".panel-reload").click(function() {
        var e = $(this).closest(".panel").children(".panel-body");
        n(e), window.setTimeout(function() {
            a(e)
        }, 1e3)
    }), $(".panel-remove").click(function() {
        $(this).closest(".panel").hide()
    }), $(".push-sidebar").click(function() {
        var e = $(".sidebar");
        e.hasClass("visible") ? (e.removeClass("visible"), $(".page-inner").removeClass("sidebar-visible")) : (e.addClass("visible"), $(".page-inner").addClass("sidebar-visible"))
    }), $(".sortable").sortable({
        connectWith: ".sortable",
        items: ".panel",
        helper: "original",
        revert: !0,
        placeholder: "panel-placeholder",
        forcePlaceholderSize: !0,
        opacity: .95,
        cursor: "move"
    });
    var i = $("input[type=checkbox]:not(.switchery), input[type=radio]:not(.no-uniform)");
    i.size() > 0 && i.each(function() {
        $(this).uniform()
    }), $.fn.toggleAttr = function(e, n) {
        var a = void 0 === n;
        return this.each(function() {
            a && !$(this).is("[" + e + "]") || !a && n ? $(this).attr(e, e) : $(this).removeAttr(e)
        })
    };
    $(".sidebar .accordion-menu li .sub-menu").slideUp(0), $(".sidebar .accordion-menu li.open .sub-menu").slideDown(0), $(".small-sidebar .sidebar .accordion-menu li.open .sub-menu").hide(0), $(".sidebar .accordion-menu > li.droplink > a").click(function() {
        if (!$("body").hasClass("small-sidebar") && !$("body").hasClass("page-horizontal-bar") && !$("body").hasClass("hover-menu")) {
            {
                var e = $(".sidebar .menu"),
                    n = ($(".page-sidebar-inner"), $(".page-content"), $(this).next());
                $(this)
            }
            return e.find("li").removeClass("open"), $(".sub-menu").slideUp(200, function() {
                o()
            }), o(), n.is(":visible") ? n.slideUp(200, function() {
                o()
            }) : ($(this).parent("li").addClass("open"), $(this).next(".sub-menu").slideDown(200, function() {
                o()
            })), !1
        }
    }), $(".sidebar .accordion-menu .sub-menu li.droplink > a").click(function() {
        {
            var e = $(this).parent().parent(),
                n = ($(".page-sidebar-inner"), $(".page-content"), $(this).next());
            $(this)
        }
        return e.find("li").removeClass("open"), o(), n.is(":visible") ? n.slideUp(200, function() {
            o()
        }) : ($(this).parent("li").addClass("open"), $(this).next(".sub-menu").slideDown(200, function() {
            o()
        })), !1
    });
    var o = function() {
        {
            var e, n = $(".page-inner"),
                a = $(".page-sidebar"),
                s = $("body"),
                i = $(".page-footer").outerHeight();
            $(".page-content").height()
        }
        n.attr("style", "min-height:" + a.height() + "px !important"), s.hasClass("page-sidebar-fixed") ? e = a.height() + i : (e = a.height() + i, e < $(window).height() && (e = $(window).height())), e >= n.height() && n.attr("style", "min-height:" + e + "px !important")
    };
    o(), window.onresize = o, $(".slimscroll").slimscroll({
        allowPageScroll: !0
    });
    var t = document.querySelector(".fixed-header-check"),
        c = document.querySelector(".fixed-sidebar-check"),
        l = document.querySelector(".toggle-sidebar-check"),
        r = document.querySelector(".compact-menu-check"),
        d = function() {
            $("body").hasClass("small-sidebar") && 1 == l.checked && l.click(), $("body").hasClass("page-header-fixed") || 0 != t.checked || t.click(), $("body").hasClass("page-sidebar-fixed") && 1 == c.checked && c.click(), $("body").hasClass("compact-menu") || 0 != r.checked || r.click(), $(".theme-color").attr("href", "assets/css/themes/white.css"), o()
        }, h = $(".navbar .logo-box a span").text(),
        u = h.slice(0, 1),
        m = function() {
            $("body").toggleClass("small-sidebar"), $(".navbar .logo-box a span").html($(".navbar .logo-box a span").text() == u ? h : u), o()
        }, b = function() {
            $("body").hasClass("page-horizontal-bar") && $("body").hasClass("page-sidebar-fixed") && $("body").hasClass("page-header-fixed") && (c.click(), alert("Static header isn't compatible with fixed horizontal nav mode. Modern will set static mode on horizontal nav.")), $("body").toggleClass("page-header-fixed"), o()
        }, p = function() {
            !$("body").hasClass("page-horizontal-bar") || $("body").hasClass("page-sidebar-fixed") || $("body").hasClass("page-header-fixed") || (t.click(), alert("Fixed horizontal nav isn't compatible with static header mode. Modern will set fixed mode on header.")), $("body").hasClass("hover-menu") && !$("body").hasClass("page-sidebar-fixed") && (hoverMenuCheck.click(), alert("Fixed sidebar isn't compatible with hover menu mode. Modern will set accordion mode on menu.")), $("body").toggleClass("page-sidebar-fixed"), $("body").hasClass(".page-sidebar-fixed") && $(".page-sidebar-inner").slimScroll({
                destroy: !0
            }), $(".page-sidebar-inner").slimScroll(), o()
        }, g = function() {
            $("body").toggleClass("compact-menu"), o()
        };
    if ($(".page-sidebar-fixed .page-sidebar-inner").slimScroll(), $(".small-sidebar .navbar .logo-box a span").html($(".navbar .logo-box a span").text() == u ? h : u), $(".theme-settings").length || $(".sidebar-toggle").click(function() {
        m()
    }), $(".theme-settings").length && (t.onchange = function() {
        b()
    }, c.onchange = function() {
        p()
    }, l.onchange = function() {
        m()
    }, r.onchange = function() {
        g()
    }, $(".sidebar-toggle").click(function() {
        l.click()
    }), $(".reset-options").click(function() {
        d()
    }), $(".colorbox").click(function() {
        var e = $(this).attr("data-css");
        return $(".theme-color").attr("href", "assets/css/themes/" + e + ".css"), !1
    }), $("body").hasClass("page-sidebar-fixed") || 1 != c.checked || $("body").addClass("page-sidebar-fixed"), $("body").hasClass("page-sidebar-fixed") && 0 == c.checked && $(".fixed-sidebar-check").prop("checked", !0), $("body").hasClass("page-header-fixed") || 1 != t.checked || $("body").addClass("page-header-fixed"), $("body").hasClass("page-header-fixed") && 0 == t.checked && $(".fixed-header-check").prop("checked", !0), $("body").hasClass("small-sidebar") || 1 != l.checked || $("body").addClass("small-sidebar"), $("body").hasClass("small-sidebar") && 0 == l.checked && $(".horizontal-bar-check").prop("checked", !0)), $(".chat").length) {
        {
            var f = document.getElementById("cbp-spmenu-s1"),
                k = document.getElementById("showRight"),
                y = document.getElementById("closeRight"),
                v = document.getElementById("cbp-spmenu-s2"),
                x = document.getElementById("closeRight2");
            document.body
        }
        k.onclick = function() {
            classie.toggle(f, "cbp-spmenu-open")
        }, y.onclick = function() {
            classie.toggle(f, "cbp-spmenu-open")
        }, x.onclick = function() {
            classie.toggle(v, "cbp-spmenu-open")
        }, $(".showRight2").click(function() {
            classie.toggle(v, "cbp-spmenu-open")
        }), $(".chat-write form input").keypress(function(e) {
            if (13 == e.which && 0 == !$(this).val().length) $('<div class="chat-item chat-item-right"><div class="chat-message">' + $(this).val() + "</div></div>").insertAfter(".chat .chat-item:last-child"), $(this).val("");
            else if (13 == e.which) return;
            $(".chat").slimscroll({
                allowPageScroll: !0
            })
        })
    }

    $('#collapseOne .imgd button').click(function(){
        $('#collapseOne .imgd button').removeClass('active');
        $(this).addClass('active');
        $('#collapseOne .imgd a').toggleClass('hidden');
    });
});