/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2020-02-17 16:35:27
 * @version $Id$
 */
Array.prototype.diff = function(a) {
    return this.filter(function(i) { return a.indexOf(i) < 0; });
};

Array.prototype.intersection = function(a) {
    return this.filter(function(i) { return a.indexOf(i) !== -1; });
};

Array.prototype.duplicateRemoval = function() {
    var arr = new Array(); //定义一个临时数组 
    for (var i = 0; i < this.length; i++) { //循环遍历当前数组 
        //判断当前数组下标为i的元素是否已经保存到临时数组 
        //如果已保存，则跳过，否则将此元素保存到临时数组中 
        if (arr.indexOf(this[i]) == -1) {
            arr.push(this[i]);
        }
    }
    return arr;
}
//两个获取元素的方法 $$ $C$
function $$(id) {
    var el = document.getElementById(id);
    return el;
}

function $C$(Class) {
    var el = document.getElementsByClassName(Class);
    return el;
}

function $T$(Tag) {
    var el = document.getElementsByTagName(Tag);
    return el;
}
//有关类名字的方法 太常用就不写到tools里面了
function addClass(el, className) {
    if (hasClass(el, className)) {
        return;
    }
    let newClass = el.className.split(' ');
    newClass.push(className);
    el.className = newClass.join(' ');
}

function hasClass(el, className) {
    // \s匹配任何空白字符，包括空格、制表符、换页符等等
    let reg = new RegExp('(^|\\s)' + className + '(\\s|$)');
    return reg.test(el.className);
}

function removeClass(el, className) {
    if (!hasClass(el, className)) {
        return;
    }
    let newClass = el.className.split(' ');
    newClass.forEach(function(val, index, newClass) {
        if (val === className) {
            newClass.splice(index, 1);
        }
    });
    el.className = newClass.join(' ');
}

function classList(el) {
    if (el.className == undefined || el.className == null || el.className == "") {
        return [];
    }
    return el.className.split(' ');
}

function addClasses(cls1, cls2) {
    for (var i = 0; i < $C$(cls1).length; i++) {
        addClass($C$(cls1)[i], cls2);
    }
}

function removeClasses(cls1, cls2) {
    for (var i = 0; i < $C$(cls1).length; i++) {
        removeClass($C$(cls1)[i], cls2);
    }
}

tools = {
    bowser: {}
};
//检测浏览器
tools.bowser.OS = {
    LINUX: "LINUX",
    MAC: "MAC",
    WINDOWS: "WINDOWS"
};

tools.getOS = function() {
    if (tools.bowser.isMac) {
        return tools.bowser.OS.MAC;
    } else if (tools.bowser.isLinux) {
        return tools.bowser.OS.LINUX;
    } else {
        return tools.bowser.OS.WINDOWS;
    }
};
var _navigator = typeof navigator == "object" ? navigator : {};
var os = (/mac|win|linux/i.exec(_navigator.platform) || ["other"])[0].toLowerCase();
var ua = _navigator.userAgent || "";
var appName = _navigator.appName || "";
tools.bowser.isWin = (os == "win");
tools.bowser.isMac = (os == "mac");
tools.bowser.isLinux = (os == "linux");
tools.bowser.isIE =
    (appName == "Microsoft Internet Explorer" || appName.indexOf("MSAppHost") >= 0) ?
    parseFloat((ua.match(/(?:MSIE |Trident\/[0-9]+[\.0-9]+;.*rv:)([0-9]+[\.0-9]+)/) || [])[1]) :
    parseFloat((ua.match(/(?:Trident\/[0-9]+[\.0-9]+;.*rv:)([0-9]+[\.0-9]+)/) || [])[1]); // for ie

tools.bowser.isOldIE = tools.bowser.isIE && tools.bowser.isIE < 9;
tools.bowser.isGecko = tools.bowser.isMozilla = ua.match(/ Gecko\/\d+/);
tools.bowser.isOpera = typeof opera == "object" && Object.prototype.toString.call(window.opera) == "[object Opera]";
tools.bowser.isWebKit = parseFloat(ua.split("WebKit/")[1]) || undefined;

tools.bowser.isChrome = parseFloat(ua.split(" Chrome/")[1]) || undefined;

tools.bowser.isEdge = parseFloat(ua.split(" Edge/")[1]) || undefined;

tools.bowser.isAIR = ua.indexOf("AdobeAIR") >= 0;

tools.bowser.isAndroid = ua.indexOf("Android") >= 0;

tools.bowser.isChromeOS = ua.indexOf(" CrOS ") >= 0;

tools.bowser.isIOS = /iPad|iPhone|iPod/.test(ua) && !window.MSStream;

if (tools.bowser.isIOS) tools.bowser.isMac = true;

tools.bowser.isMobile = tools.bowser.isIOS || tools.bowser.isAndroid;

//高级的点的创建对象 智能点 能自定义标签的属性
tools.buildDom = function buildDom(arr, parent, refs) {
    if (typeof arr == "string" && arr) {
        var txt = document.createTextNode(arr);
        if (parent)
            parent.appendChild(txt);
        return txt;
    }

    if (!Array.isArray(arr))
        return arr;
    if (typeof arr[0] != "string" || !arr[0]) {
        var els = [];
        for (var i = 0; i < arr.length; i++) {
            var ch = buildDom(arr[i], parent, refs);
            ch && els.push(ch);
        }
        return els;
    }

    var el = document.createElement(arr[0]);
    var options = arr[1];
    var childIndex = 1;
    if (options && typeof options == "object" && !Array.isArray(options))
        childIndex = 2;
    for (var i = childIndex; i < arr.length; i++)
        buildDom(arr[i], el, refs);
    if (childIndex == 2) {

        Object.keys(options).forEach(function(n) {
            var val = options[n];
            if (n === "class") {
                el.className = Array.isArray(val) ? val.join(" ") : val;
            } else if (typeof val == "function" || n == "value") {
                el[n] = val;
            } else if (n === "ref") {
                if (refs) refs[val] = el;
            } else if (val != null) {
                el.setAttribute(n, val);
            }
        });
    }
    if (parent) {
        parent.appendChild(el);
    }
    return el;
};
//创建文本节点
tools.createTextNode = function(textContent, element) {
    var doc = element ? element.ownerDocument : document;
    return doc.createTextNode(textContent);
};
//切换class 有或无
tools.toggleCssClass = function(el, name) {
    var classes = el.className.split(/\s+/g),
        add = true;
    while (true) {
        var index = classes.indexOf(name);
        if (index == -1) {
            break;
        }
        add = false;
        classes.splice(index, 1);
    }
    if (add)
        classes.push(name);

    el.className = classes.join(" ");
    return add;
};

tools.switchCssClass = function(el, name1,name2) {
    if (!hasClass(el,name1)&&!hasClass(el,name2)) {
        addClass(el,name1);
        return
    }
    if (hasClass(el,name1)) {
        removeClass(el,name1)
        addClass(el,name2)
        return
    }
    if (hasClass(el,name2)) {
        removeClass(el,name2)
        addClass(el,name1)
        return
    }

    
};




//简易版创建dom
tools.createElement = function(tag) {
    return document.createElement(tag);
};
//找文档的head
tools.getDocumentHead = function(doc) {
    if (!doc) {
        doc = document;
    }
    return doc.head || doc.getElementsByTagName("head")[0] || doc.documentElement;
};
//看是否有刚插入的css style(一般用不到，除非很极端的js写css文件那种)
tools.hasCssString = function(id, doc) {
    var index = 0,
        sheets;
    doc = doc || document;
    if ((sheets = doc.querySelectorAll("style"))) {
        while (index < sheets.length)
            if (sheets[index++].id === id)
                return true;
    }
};
//插入特殊的css style代码块
tools.importCssString = function importCssString(cssText, id, target) {
    var container = target;

    if (!target || !target.getRootNode) {
        container = document;
    } else {
        container = target.getRootNode();
        if (!container || container == target)
            container = document;
    }
    console.log(container)
    var doc = container.ownerDocument || container;

    if (id && tools.hasCssString(id, container))
        return null;

    if (id)
        cssText += "\n/*# sourceURL=css/" + id + " */";
    console.log(cssText)
    var style = tools.createElement("style");
    style.appendChild(doc.createTextNode(cssText));
    if (id)
        style.id = id;

    if (container == doc)
        container = tools.getDocumentHead(doc);
    container.insertBefore(style, container.firstChild);
};
//插入css文件的引用
//这玩意默认插在头部其实哪里都可以插，到时候把buildDom参数2改成doc就行了。 bulidDom方法第一个参数可以是字符串可以是数组，数组的话数组[1]位写属性。
tools.importCssStylsheet = function(uri,id, doc) {
    tools.buildDom(["link", { rel: "stylesheet", href: uri,id:id }], tools.getDocumentHead(doc));
};
//获取css属性
tools.computedStyle = function(element, style) {
    return window.getComputedStyle(element, "") || {};
};
//检测数字
tools.isNumber = function(val) {

    var regPos = /^\d+(\.\d+)?$/; //非负浮点数
    var regNeg = /^(-(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*)))$/; //负浮点数
    if (regPos.test(val) || regNeg.test(val)) {
        return true;
    } else {
        return false;
    }

}
//获取select的文本
tools.getSelectedText = function(name) {
    var obj = document.getElementById(name);
    for (i = 0; i < obj.length; i++) {
        if (obj[i].selected == true) {
            return obj[i].innerText; //关键是通过option对象的innerText属性获取到选项文本
        }
    }
}
//获取元素相对窗口的top值，此处应加上窗口本身的偏移
tools.getTopData = function(el) {
    var rect = el.getBoundingClientRect();
    var top = rect.height;
    return top;
}

tools.toChinesNum = function(num) {
    var changeNum = ['零', '一', '二', '三', '四', '五', '六', '七', '八', '九'];
    var unit = ["", "十", "百", "千", "万"];
    num = parseInt(num);
    var getWan = (temp) => {
        var strArr = temp.toString().split("").reverse();
        var newNum = "";
        for (var i = 0; i < strArr.length; i++) {
            newNum = (i == 0 && strArr[i] == 0 ? "" : (i > 0 && strArr[i] == 0 && strArr[i - 1] == 0 ? "" : changeNum[strArr[i]] + (strArr[i] == 0 ? unit[0] : unit[i]))) + newNum;
        }
        return newNum;
    }
    var overWan = Math.floor(num / 10000);
    var noWan = num % 10000;
    if (noWan.toString().length < 4) {
        noWan = "0" + noWan;
    }
    return overWan ? getWan(overWan) + "万" + getWan(noWan) : getWan(num);
}
tools.cloneObj = function(obj) { // 对象复制
    return JSON.parse(JSON.stringify(obj))
}

tools.stopBubble = function(e) {
    if (e && e.stopPropagation) {
        e.stopPropagation(); //w3c
    } else {
        window.event.cancelBubble = true; //IE
    }
}

tools.getMousePos = function(event) {
    var e = event || window.event;
    var scrollX = document.documentElement.scrollLeft || document.body.scrollLeft;
    var scrollY = document.documentElement.scrollTop || document.body.scrollTop;
    var x = e.pageX || e.clientX + scrollX;
    var y = e.pageY || e.clientY + scrollY;
    //alert('x: ' + x + '\ny: ' + y);
    return { 'x': x, 'y': y };
}

tools.colorRGB2Hex = function(color) {
    var rgb = color.split(',');
    var r = parseInt(rgb[0].split('(')[1]);
    var g = parseInt(rgb[1]);
    var b = parseInt(rgb[2].split(')')[0]);
    var hex = ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
    return hex;
}
tools.loadScript = function(path, callback) {
    var script = document.createElement('script');
    script.async = true;
    script.src = path;
    script.type = 'text/javascript';
    script.onload = callback || script.onload;
    document.getElementsByTagName('head')[0].appendChild(script);
}

tools.GetRequest= function () {
        var url = location.search; //获取url中"?"符后的字串
        var theRequest = new Object();
        if (url.indexOf("?") != -1) {
            var str = url.substr(1);
            strs = str.split("&");
            for (var i = 0; i < strs.length; i++) {
                theRequest[strs[i].split("=")[0]] = unescape(strs[i].split("=")[1]);
            }
        }
        return theRequest;
    }
/*
tools.importCssStylsheet("css/css.css")

var cssClass = "ace-dreamweaver";
var cssText = ".ace-dreamweaver .ace_gutter {background: #e8e8e8;color: #333;}.ace-dreamweaver .ace_print-margin {width: 1px;background: #e8e8e8;}";


tools.importCssString(cssText, cssClass);
*/