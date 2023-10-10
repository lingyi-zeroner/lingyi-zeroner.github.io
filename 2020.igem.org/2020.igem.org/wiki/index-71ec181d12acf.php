
$C$("cfmore")[0].onmousemove = function(e) {
    // 函数节流，1 帧内只触发一次
    if (this.time && Date.now() - this.time < 16) return
    this.time = Date.now()
    // 获取鼠标当前距离浏览器中央的坐标
    let mouseX = e.clientX - document.body.clientWidth / 2
    let mouseY = e.clientY - document.body.clientHeight / 2
    // 为绑定的函数赋值
   // console.log(mouseX*210/window.innerHeight, mouseY*210/window.innerWidth)

    for (var i = 0; i < $C$("moreat").length; i++) {
    	$C$("moreat")[i].style.transform="translate("+-mouseX*120/window.innerHeight+"px"+","+-mouseY*120/window.innerWidth+"px)" ;
    	$C$("morebg")[i].style.transform="translate("+-mouseX*30/window.innerHeight+"px"+","+-mouseY*30/window.innerWidth+"px)" ;
    	
    }



};



document.addEventListener("scroll", function() {
    var wsTop = document.documentElement.scrollTop || document.body.scrollTop;

    for (var i = 0; i < $C$("cftxt").length; i++) {
        (function(i) {
            var elbottom = (wsTop + window.innerHeight) - ($C$("cftxt")[i].offsetTop + $C$("cfwyz")[i].offsetTop + $C$("cftxt")[i].offsetHeight);
            // console.log(elbottom)
            if (i % 2 == 1) {
                if (elbottom < window.innerHeight * 0.5) {
                    $C$("cftxt")[i].style.right = ((1 - (elbottom / (window.innerHeight * 0.5))) * (window.innerWidth - $C$("cftxt")[i].offsetWidth) + 90) + "px";
                } else {
                    $C$("cftxt")[i].style.right = 90 + "px";
                }



            } else {

                if (elbottom < window.innerHeight * 0.5) {
                    $C$("cftxt")[i].style.left = ((1 - (elbottom / (window.innerHeight * 0.5))) * (window.innerWidth - $C$("cftxt")[i].offsetWidth) + 90) + "px";
                } else {
                    $C$("cftxt")[i].style.left = 90 + "px";
                }
            }

        })(i)

    }
})


document.addEventListener("scroll", function() {
    var wsTop = document.documentElement.scrollTop || document.body.scrollTop;

    for (var i = 0; i < $C$("cfmorett").length; i++) {
        (function(i) {
            var elbottom = (wsTop + window.innerHeight) - ($C$("cfmorett")[i].offsetTop + $C$("cfmore")[0].offsetTop + $C$("cfmorett")[i].offsetHeight);
            // console.log(elbottom)
            if (i % 2 == 1) {
                if (elbottom < window.innerHeight * 0.5) {

                    $C$("cfmorett")[i].style.opacity = ((1 - (elbottom / (window.innerHeight * 0.5))) * 0.8 + 0.2);
                } else {

                    $C$("cfmorett")[i].style.opacity = 1;
                }



            } else {

                if (elbottom < window.innerHeight * 0.5) {
                    $C$("cfmorett")[i].style.left = ((1 - (elbottom / (window.innerHeight * 0.5))) * (window.innerWidth - $C$("cfmorett")[i].offsetWidth) + 90) + "px";
                    $C$("cfmorett")[i].style.opacity = ((elbottom / (window.innerHeight * 0.5)) * 0.8 + 0.2);
                } else {
                    $C$("cfmorett")[i].style.left = 90 + "px";
                    $C$("cfmorett")[i].style.opacity = 1;
                }
            }

        })(i)

    }
});




(function() {

    var btnTl = new TimelineMax({ paused: false, repeat: -1 });
    var btnT2 = new TimelineMax({ paused: false, repeat: -1 });
    var btnT3 = new TimelineMax({ paused: false, repeat: -1 });
    var btnT4 = new TimelineMax({ paused: false, repeat: -1 });
    var dou1 = $$("dou1");
    var dou2 = $$("dou2");
    var huan1 = $$("huan1");
    var huan2 = $$("huan2");

    btnTl.to(dou1, 0.7, {
        rotation: 0,
        ease: Power1.easeOut,
        y: -20,
    }).to(dou1, 0.3, {
        rotation: 0,
        scale: 1.05,
        ease: Power1.easeOut,
        x: 0,
    }).
    to(dou1, 0.3, {
        rotation: 0,
        scale: 0.95,
        ease: Back.easeOut.config(4)
    }).
    to(dou1, 0.7, {
        x: 0,
        y: -10,
        scale: 1,
        ease: Back.easeOut.config(4)
    }).to(dou1, 0.7, {
        x: 0,
        y: 0,
        scale: 1,
        ease: Power1.easeOut,
    }).to(dou1, 0.7, {
        x: 0,
        y: 10,
        scale: 1,
        ease: Power1.easeOut,
    }).to(dou1, 0.7, {
        x: 0,
        y: 0,
        scale: 1,
        ease: Power1.easeOut,
    })



    btnT3.to(huan1, 0.7, {
        rotation: 0,
        ease: Power1.easeOut,
        y: -5,
    }).to(huan1, 0.3, {
        rotation: 0,
        scale: 1.1,
        ease: Power1.easeOut,
        x: -10,
        y: 0,
    }).
    to(huan1, 0.3, {
        rotation: 0,
        scale: 0.99,
        x: 0,
        y: 6,
        ease: Back.easeOut.config(4)
    }).
    to(huan1, 0.7, {
        x: 0,
        y: 0,
        scale: 1,
        ease: Back.easeOut.config(4)
    }).to(huan1, 0.7, {
        x: 0,
        y: 14,
        scale: 1,
        ease: Power1.easeOut,
    }).to(huan1, 0.7, {
        x: 0,
        y: -18,
        scale: 1,
        ease: Power1.easeOut,
    }).to(huan1, 0.7, {
        x: 0,
        y: 0,
        scale: 1,
        ease: Power1.easeOut,
    })



    btnT4.to(huan2, 0.6, {
        x: 0,
        y: 5,
        scale: 1,
        ease: Power1.easeOut,
    }).to(huan2, 0.7, {
        x: 0,
        y: -5,
        scale: 1,
        ease: Power1.easeOut,
    }).to(huan2, 0.7, {
        rotation: 0,

        ease: Power1.easeOut,
        y: -20,
    }).to(huan2, 0.2, {
        rotation: 0,
        scale: 1.05,
        ease: Power1.easeOut,
        x: -5,
    }).
    to(huan2, 0.2, {
        rotation: 0,
        scale: 0.95,
        x: 0,
        ease: Back.easeOut.config(4)
    }).
    to(huan2, 0.8, {
        x: 0,
        y: 0,
        scale: 1,
        ease: Back.easeOut.config(4)
    })






    btnT2.to(dou2, 0.6, {
        x: 0,
        y: -10,
        scale: 1,
        ease: Power1.easeOut,
    }).to(dou2, 0.7, {
        x: 0,
        y: 0,
        scale: 1,
        ease: Power1.easeOut,
    }).to(dou2, 0.7, {
        rotation: 0,

        ease: Power1.easeOut,
        y: -20,
    }).to(dou2, 0.2, {
        rotation: 0,
        scale: 1.05,
        ease: Power1.easeOut,
        x: -5,
    }).
    to(dou2, 0.2, {
        rotation: 0,
        scale: 0.95,
        x: 0,
        ease: Back.easeOut.config(4)
    }).
    to(dou2, 0.8, {
        x: 0,
        y: 0,
        scale: 1,
        ease: Back.easeOut.config(4)
    })


    var btnT5 = new TimelineMax({ paused: false, repeat: -1 });
    var han1 = $$("han1");

    btnT5.to(han1, 0.4, {
        x: 20,
        y: 0,
        scale: 1,
        ease: Power1.easeOut,
    }).to(han1, 0.5, {
        x: 10,
        y: 0,
        scale: 1.1,
        ease: Power1.easeOut,
    }).to(han1, 0.5, {
        rotation: 0,
        scale: 1,
        ease: Power1.easeOut,
        x: 0,

    }).to(han1, 0.5, {
        rotation: 0,
        scale: 1.05,
        ease: Power1.easeOut,
        x: -5,
    }).
    to(han1, 0.2, {
        rotation: 0,
        scale: 1,
        x: 0,
        ease: Back.easeOut.config(4)
    }).to(han1, 0.2, {
        rotation: 0,
        scale: 1,
        x: 10,
        ease: Back.easeOut.config(4)
    }).to(han1, 0.2, {
        rotation: 0,
        scale: 1,
        x: 0,
        ease: Back.easeOut.config(4)
    })



    var btnT6 = new TimelineMax({ paused: false, repeat: -1 });
    var han2 = $$("han2");

    btnT6.to(han2, 0.4, {
        x: 20,
        y: 0,
        scale: 1,
        ease: Power1.easeOut,
    }).to(han2, 0.5, {
        x: 10,
        y: 0,
        scale: 1.1,
        ease: Power1.easeOut,
    }).to(han2, 0.5, {
        rotation: 0,
        scale: 1,
        ease: Power1.easeOut,
        x: 0,

    }).to(han2, 0.5, {
        rotation: 0,
        scale: 1.05,
        ease: Power1.easeOut,
        x: 5,
    }).
    to(han2, 0.2, {
        rotation: 0,
        scale: 1,
        x: 0,
        ease: Back.easeOut.config(4)
    }).to(han2, 0.2, {
        rotation: 0,
        scale: 1,
        x: -10,
        ease: Back.easeOut.config(4)
    }).to(han2, 0.2, {
        rotation: 0,
        scale: 1,
        x: 0,
        ease: Back.easeOut.config(4)
    })



    var btnT7 = new TimelineMax({ paused: false, repeat: -1 });
    var guan11 = $$("guan11");
    var guan12 = $$("guan12");
    var guan13 = $$("guan13");
    btnT7.to(guan11, 0.4, {
        x: 2,
        y: 5,
        scale: 1,
        rotation: 2,

    }, 0).to(guan11, 0.5, {
        x: -2,
        y: 0,
        scale: 1,
        rotation: 0,

    }, 0.3).to(guan11, 0.5, {
        x: 0,
        y: 0,
        scale: 1,

    }, 0.8)


    btnT7.to(guan12, 0.3, {
        x: 2,
        y: -2,
        scale: 1,
        rotation: -5,

    }, 0).to(guan12, 0.5, {
        x: -2,
        y: 2,
        scale: 1,
        rotation: 0,

    }, 0.3).to(guan12, 0.5, {
        x: 0,
        y: 0,
        scale: 1,

    }, 0.8)



    btnT7.to(guan13, 0.3, {
        x: 0,
        y: -2,
        scale: 1,
        rotation: -2,

    }, 0).to(guan13, 0.5, {
        x: 0,
        y: 2,
        scale: 1,
        rotation: 2,

    }, 0.3).to(guan13, 0.5, {
        x: 0,
        y: 0,
        scale: 1,
        rotation: 0,

    }, 0.8)








    var btnT8 = new TimelineMax({ paused: false, repeat: -1 });
    var guan21 = $$("guan21");
    var guan22 = $$("guan22");
    var guan23 = $$("guan23");
    btnT7.to(guan21, 0.4, {
        x: 2,
        y: 5,

        scale: 1,

    }, 0).to(guan21, 0.5, {
        x: -2,
        y: 0,
        scale: 1,
        rotation: -2,


    }, 0.3).to(guan21, 0.5, {
        x: 0,
        y: 0,
        scale: 1,
        rotation: 0,

    }, 0.8)


    btnT7.to(guan22, 0.3, {
        x: 2,
        y: -2,
        scale: 1,
        rotation: 2,

    }, 0).to(guan22, 0.5, {
        x: -2,
        y: 2,
        rotation: -1,
        scale: 1,

    }, 0.3).to(guan22, 0.5, {
        x: 0,
        y: 0,
        rotation: -0,
        scale: 1,

    }, 0.8)



    btnT7.to(guan23, 0.3, {
        x: 0,
        y: -2,
        rotation: -3,
        scale: 1,

    }, 0).to(guan23, 0.5, {
        x: 0,
        y: 2,
        rotation: 0,
        scale: 1,

    }, 0.3).to(guan23, 0.5, {
        x: 0,
        y: 0,
        scale: 1,

    }, 0.8)


    var btnT8 = new TimelineMax({ paused: false, repeat: -1 });
    var tai11 = $$("tai11");
    var tai12 = $$("tai12");
    var tai21 = $$("tai21");
    var tai22 = $$("tai22");


    btnT8.to(tai11, 0.5, {
        opacity: 0.4,

    }, 0).to(tai11, 0.8, {
        opacity: 1,

    }, 0.5)

    btnT8.to(tai21, 0.3, {
        opacity: 0.4,

    }, 0).to(tai21, 0.5, {
        opacity: 1,

    }, 0.7)

    btnT8.to(tai12, 0.2, {
        opacity: 0.4,

    }, 0).to(tai12, 0.6, {
        opacity: 1,

    }, 0.6)

    btnT8.to(tai22, 0.4, {
        opacity: 0.4,

    }, 0).to(tai22, 0.7, {
        opacity: 1,

    }, 0.8)


})()