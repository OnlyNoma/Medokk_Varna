/*
 ifBrowser 0.0.3
 a function which returns specified data depending on a user's browser
 written by Plyushch Gregory, 2012
 is free to use for everyone in condition of saving the author's name

 //here i use only function cBrowser() and renamed it to browser()
 */
function browser() {
    var ua = navigator.userAgent;
    var bName = function () {
        if (ua.search(/YaBrowser/) > -1) return "yabrowser";
        if (ua.search(/MSIE/) > -1) return "ie";
        if (ua.search(/Firefox/) > -1) return "firefox";
        if (ua.search(/Opera/) > -1) return "opera";
        if (ua.search(/Chrome/) > -1) return "chrome";
        if (ua.search(/Safari/) > -1) return "safari";
        if (ua.search(/Konqueror/) > -1) return "konqueror";
        if (ua.search(/Iceweasel/) > -1) return "iceweasel";
        if (ua.search(/SeaMonkey/) > -1) return "seamonkey";
    }();

    var version = function (bName) {
        switch (bName) {
            case "ie" : return (ua.split("MSIE ")[1]).split(";")[0];break;
            case "firefox" : return ua.split("Firefox/")[1];break;
            case "opera" : return ua.split("Version/")[1];break;
            case "yabrowser" : return (ua.split("YaBrowser/")[1]).split(" ")[0];break;
            case "chrome" : return (ua.split("Chrome/")[1]).split(" ")[0];break;
            case "safari" : return (ua.split("Version/")[1]).split(" ")[0];break;
            case "konqueror" : return (ua.split("KHTML/")[1]).split(" ")[0];break;
            case "iceweasel" : return (ua.split("Iceweasel/")[1]).split(" ")[0];break;
            case "seamonkey" : return ua.split("SeaMonkey/")[1];break;
            default: return "undefined"; break;
        }}(bName);

    version = version.toString();

    if(version == "undefined") return [null,null];

    return [bName,version.split(".")[0]];
}

var
    windowHeight = $(window).height(),
    windowWidth = $(window).width();

function _get_scroll_modal() {
    if (self.pageYOffset) {
        return {scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset};
    } else if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict
        return {scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};
    } else if (document.body) {// all other Explorers
        return {scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};
    };
};

function _center_overlay_modal(parameters){
    var
        cn              = parameters.cn,
        scroll_pos      = _get_scroll_modal(),
        contentHeight   = $("."+cn+":eq(0)").height(),
        contentWidth    = $("."+cn+":eq(0)").width(),
        projectedTop = (windowHeight/2) + scroll_pos['scrollTop'] - (contentHeight/2);

    if(projectedTop < 0) projectedTop = 0;

    if(contentHeight > windowHeight) return;

    var box = document.getElementsByClassName(cn)[0];

    box.style.left = ((windowWidth/2) + scroll_pos['scrollLeft'] - (contentWidth/2)) + "px";
};



function closeBox(){
    $(".order_window_wrapp").animate({
        "opacity" : 0
    }, 500);
    $(".shadow").animate({
        "opacity" : 0
    }, 500);
    $(".order_window_wrapp").hide("slow");
    $(".shadow").hide("slow");
}


function sendCall () {
    $(".callBox1").delay(20).fadeOut(150);
    $(".callShadow").fadeIn();
    $(".callBox").delay().fadeIn();
    _center_overlay_modal({cn: "callBox"});
}
function sendCall1 () {
    $(".callShadow").fadeIn();
    $(".callBox1").delay().fadeIn();
    _center_overlay_modal({cn: "callBox1"});
}
function sendCall2 () {
    $(".callShadow").fadeIn();
    $(".callBox2").delay().fadeIn();
    _center_overlay_modal({cn: "callBox2"});
}

function sendCall3 () {
    $(".callShadow").fadeIn();
    $(".callBox3").delay().fadeIn();
    _center_overlay_modal({cn: "callBox3"});
}


function closeCallBox () {
    $(".callShadow").fadeOut(150);
    $(".callBox").delay(20).fadeOut(150);
    $(".callBox1").delay(20).fadeOut(150);
     $(".callBox2").delay(20).fadeOut(150);
     $(".callBox3").delay(20).fadeOut(150);
}

