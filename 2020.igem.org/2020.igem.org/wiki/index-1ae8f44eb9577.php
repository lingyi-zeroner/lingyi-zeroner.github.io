(function nav() {
    var time = [];
    for (var i = 0; i < $C$("nav_parent").length; i++) {
        (function(i) {
            //$C$("nav_parent")[i].onmouseenter = me
            $C$("nav_parent")[i].addEventListener("mouseenter", me, false)
            $C$("nav_parent")[i].addEventListener("mouseleave", mo, false)

            $C$("nav_parent")[i].addEventListener("click", me, false)
            $C$("nav_parent")[i].addEventListener("click", mo, false)

            function me() {
                // console.log(11)
                clearTimeout(time[i]);
                event.stopImmediatePropagation()
                var els = this.getElementsByClassName("nav_child");
                if (els.length == 0) {
                    return
                }
                this.getElementsByClassName("nav_child_c")[0].style.display = "block";
                for (var j = 0; j < els.length; j++) {
                    (function(j) {
                        setTimeout(function() {
                            els[j].onmouseenter = function() {

                                event.stopPropagation();
                                return false;
                            };
                            els[j].onclick = function() {

                                event.stopPropagation();
                               
                            };
                            els[j].style.opacity = "1";
                            els[j].style.transform = "rotateY(0deg)";

                        }, 50 * j + 1);

                    })(j)
                }
            }

            function mo() {
                // console.log(22)
                event.stopImmediatePropagation()
                var els = this.getElementsByClassName("nav_child");
                if (els.length == 0) {
                    return
                }
                this.getElementsByClassName("nav_child_c")[0].style.display = "block";

                time[i] = setTimeout(function() { meile(); }, 1000)

                function meile() {
                    for (var j = 0; j < els.length; j++) {
                        (function(j) {
                            setTimeout(function() {
                                els[j].onmouseenter = function() {

                                    event.stopPropagation();
                                    return false;
                                };

                                els[j].onclick = function() {

                                    event.stopPropagation();
                                   
                                };

                               

                                els[j].style.opacity = "0";
                                els[j].style.transform = "rotateY(90deg)";

                            }, 50 * j + 1);

                        })(j)
                    }
                }


            }
        })(i)

    }
})()