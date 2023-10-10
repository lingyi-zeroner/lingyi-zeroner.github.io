/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2020-07-17 20:19:21
 * @version $Id$
 */
var footertext = ["iGEM2020", "Jilin_China", "School of Life Science", "Office of Global Engagement", "Office of Undergraduate Education", "Nation Engineering Labortory for AIDS Vaccine", "HXT II", "GSAP", "p5.js", "Font Awesome", "jQuery", "Viewer.js(open document)", "Viewer.js(image viewer)"];


function fficon() {
    for (var i = 0; i < $C$("f00_icon").length; i++) {
        (function(i) {
            $C$("f00_icon")[i].onmouseenter = function() {
                $C$("footer2")[0].style.display = "block";
                if (i==0) {
                    $$("ft2img").src="https://static.igem.org/mediawiki/2020/6/65/T--Jilin_China--Team--footer--email.png";
                }
                if (i==1) {
                    $$("ft2img").src="https://static.igem.org/mediawiki/2019/2/25/T--Jilin_China--Main--weixin.jpg";
                }
                if (i==2) {
                    $$("ft2img").src="https://static.igem.org/mediawiki/2019/a/a6/T--Jilin_China--Main--Twitter.jpg";
                }

            }
        })(i)

        $C$("f00_icon")[i].onmouseleave = function() {
            $C$("footer2")[0].style.display = "none";
        }
    }

}
fficon()

function renderfootertext() {
    $$("f01_span_c").innerHTML = "";
    var els = [];
    for (var i = 0; i < footertext.length; i++) {
        var el = document.createElement("div")
        addClass(el, "f01_span")
        el.innerHTML = footertext[i];
        els.push(el)
        $$("f01_span_c").appendChild(el)


    }
    return els
}

function getfoot01W() {
    var data = [];
    var els = renderfootertext()
    for (var i = 0; i < els.length; i++) {
        data.push([els[i], els[i].clientWidth]);
    }
    console.log(data)
    return data;
}


function footerTA() {
    var footspeed = 50;
    var btnTl1;
    var data = getfoot01W();

    this.op = function() {
        btnTl1 = new TimelineMax({ paused: false, repeat: -1 });
        for (var i = 0; i < data.length; i++) {
            btnTl1.to(data[i][0], 0, {
                width: (data[i][1]) + "px",
                left: 100 + "%",
            }, 0)
            if (i == 0) {
                btnTl1.to(data[i][0], (window.innerWidth + data[i][1]) / footspeed, {
                        ease: "none",
                        left: (-data[i][1]) + "px"
                    },
                    0)
                btnTl1.add("myLabel" + i, 0);

            } else {
                var interval = (1 / footspeed) * (data[i - 1][1] + 40)
                btnTl1.to(data[i][0], (window.innerWidth + data[i][1]) / footspeed, {
                        ease: "none",
                        left: (-data[i][1]) + "px"
                    },
                    "myLabel" + (i - 1) + "+=" + interval)
                btnTl1.add("myLabel" + i, "myLabel" + (i - 1) + "+=" + interval);
            }


        }
        btnTl1.play(0)
    }


    this.sp = function() {


        btnTl1.kill();
    }




}
var fTA = new footerTA();

fTA.op();






function footerTL() {
    var footspeed = 100;
    var data = $C$("f12_logo");
    var tl = [];
    //console.log(data)
    var firstcp = false;
    var lastcp = false;
    var count = 0;
    var tla;
    this.op = function() {
        tl = [];
        tla = new TimelineMax({ paused: false, });
        for (var i = 0; i < data.length; i++) {

            tl.push(new TimelineMax({ paused: true, }));

            (function(i) {
                tl[i].to(data[i], 0, {

                    left: 100 + "%",
                    top: Math.random() * 20 + 10 + "px",
                }, 0)

                tl[i].to(data[i], (window.innerWidth + 95) / footspeed, {
                        ease: "none",
                        left: (-95) + "px",
                        onStart: function() {
                            if (i == data.length - 1) {
                                count++;
                                lastcp = true;
                                console.log(i)
                            }

                            if (i == data.length - 1 && count != 0) {


                                var timer = setInterval(function() {
                                    if (!tl[0].isActive()) {
                                        tla.play(0);
                                        clearInterval(timer)
                                    }
                                }, 500)

                            }




                        },
                        onComplete: function() {
                            tl[i].pause()
                        }

                    },
                    0.1)

            })(i)
        }

        for (var i = 0; i < tl.length; i++) {
            (function(i, tl) {
                tla.add(function() { tl[i].play(0) }, 1.8 * i);
            })(i, tl)

        }
        tla.play(0);


    }
    this.sp = function() {

        for (var i = 0; i < tl.length; i++) {

            tl[i].kill();


        }
        tla.kill();
    }




}

var fTL = new footerTL()

fTL.op()


function footerTB() {
    var data = $C$("f10_bar")

    var btnTl3 = new TimelineMax({ paused: false, repeat: -1 });


    for (var i = 0; i < data.length; i++) {
        btnTl3.to(data[i], 0.1, {
            ease: "none",
            opacity: 1,
            x: -20,
        }, i * 0.2)
    }
    for (var i = data.length - 1; i >= 0; i--) {
        btnTl3.to(data[i], 0.1, {
            ease: "none",
            opacity: 0,
            x: 0
        }, 2)
    }
    btnTl3.play(0)

}

footerTB();

function footerTD() {
    var footerrb = $$("footerrb")
    var footerlb = $$("footerlb")
    var footerrbc = $$("footerrbc")
    var footerlbc = $$("footerlbc")
    var footerlbi = $$("footerlbi")
    var footerrbi = $$("footerrbi")
    var btnTl4 = new TimelineMax({ paused: false, repeat: -1 });



    btnTl4.to(footerrb, 0.5, {
        ease: "none",
        opacity: 0.8,
        scale: 1.1,
        x: 6,
        y: 6,
    }, 0).to(footerrb, 0.3, {
        ease: "none",
        opacity: 1,
        scale: 0.95,
        x: 0,
        y: 0,
    }, 0.5).to(footerrb, 0.5, {
        ease: "none",
        opacity: 1,
        scale: 1,
        x: 0,
        y: -6,
    }, 0.8).to(footerrb, 0.5, {
        ease: "none",
        opacity: 1,
        scale: 1,
        x: 0,
        y: -0,
    }, 1.2).to(footerrb, 0.3, {
        ease: "none",
        opacity: 1,
        scale: 0.95,
        x: 4,
        y: 0,
    }, 1.5).to(footerrb, 0.5, {
        ease: "none",
        opacity: 1,
        scale: 1,
        x: -10,
        y: -6,
    }, 1.8).to(footerrb, 0.5, {
        ease: "none",
        opacity: 1,
        scale: 1,
        x: 0,
        y: -0,
    }, 2.4)

    btnTl4.to(footerlb, 0.5, {
        ease: "none",
        opacity: 0.8,
        scale: 1.1,
        x: 6,
        y: 6,
    }, 0).to(footerlb, 0.3, {
        ease: "none",
        opacity: 1,
        scale: 0.95,
        x: 0,
        y: 0,
    }, 0.5).to(footerlb, 0.5, {
        ease: "none",
        opacity: 1,
        scale: 1,
        x: -16,
        y: -6,
    }, 0.8).to(footerlb, 0.5, {
        ease: "none",
        opacity: 1,
        scale: 1,
        x: 0,
        y: -0,
    }, 1.2).to(footerlb, 0.3, {
        ease: "none",
        opacity: 1,
        scale: 0.95,
        x: 10,
        y: -10,
    }, 1.5).to(footerlb, 0.5, {
        ease: "none",
        opacity: 1,
        scale: 1,
        x: -16,
        y: -6,
    }, 1.8).to(footerlb, 0.5, {
        ease: "none",
        opacity: 1,
        scale: 1,
        x: 0,
        y: -0,
    }, 2.4)



    btnTl4.to(footerlbi, 0.2, {
        ease: "none",
        opacity: 0.8,
        scaleX: 0.95,
        scale: 0.95,


    }, 0).to(footerlbi, 0.1, {
        ease: "none",
        opacity: 1,
        scaleX: 1,
        scale: 1,


    }, 0.2).to(footerlbi, 0.1, {
        ease: "none",
        opacity: 1,
        scaleX: 1.05,
        scale: 1,


    }, 0.3).to(footerlbi, 0.3, {
        ease: "none",
        opacity: 1,
        scaleX: 1,
        scale: 1,


    }, 0.5)


    btnTl4.to(footerlbc, 0.2, {
        ease: "none",

        scaleY: 0.95,


    }, 0).to(footerlbc, 0.1, {
        ease: "none",

        scaleY: 1,


    }, 0.2).to(footerlbc, 0.1, {
        ease: "none",

        scaleY: 1.05,


    }, 0.3).to(footerlbc, 0.3, {
        ease: "none",

        scaleY: 1,


    }, 0.5)



    btnTl4.to(footerrbi, 0.2, {
        ease: "none",
        opacity: 0.8,
        scaleY: 0.95,
        scale: 0.95,


    }, 0).to(footerrbi, 0.1, {
        ease: "none",
        opacity: 1,
        scaleY: 1,
        scale: 1,


    }, 0.2).to(footerrbi, 0.1, {
        ease: "none",
        opacity: 1,
        scaleY: 1.05,
        scale: 1,


    }, 0.3).to(footerrbi, 0.3, {
        ease: "none",
        opacity: 1,
        scaleY: 1,
        scale: 1,


    }, 0.5)


    btnTl4.to(footerrbc, 0.2, {
        ease: "none",

        scaleX: 0.95,


    }, 0).to(footerrbc, 0.1, {
        ease: "none",

        scaleX: 1,


    }, 0.2).to(footerrbc, 0.1, {
        ease: "none",

        scaleX: 1.05,


    }, 0.3).to(footerrbc, 0.3, {
        ease: "none",

        scaleX: 1,


    }, 0.5)


    btnTl4.play(0)

}

footerTD();


window.addEventListener("resize", function() {
    fTL.sp();
    fTL.op();
    fTA.sp()
    fTA.op();

})