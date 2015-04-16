/*
* by Pyatin Vitaliy (c) 2015;
* */

var PhotoViewer = function(_classNamePhotoBlock, _classNamePhotoBox){
    _classNamePhotoBox = _classNamePhotoBox === undefined ?  'box' : _classNamePhotoBox;
    _classNamePhotoBlock = _classNamePhotoBlock === undefined ?  'photoViewer' : _classNamePhotoBlock;
    // global variables
    this.windowHeight = window.innerHeight;
    this.windowWidth = window.innerWidth;
    this.picUrl = new Array();
    this.classNamePhotoBlock = _classNamePhotoBlock;
    this.classNamePhotoBox = _classNamePhotoBox;

    this.append();
    this.getURLs();
};

PhotoViewer.prototype = {

    append: function(){
        document.body.innerHTML +=
            '<div class="box" id="idBox">' +
            '<div class="close">×</div>' +
            '<span></span>' +
            '<div class="leftSide" id="idLeft"><div class="prev" id="idPrev"></div></div>' +
            '<div class="centerSide">'+
            '<div class="photoBox">'+
            '<div class="layer1">'+
            '   <img src id="bigImgSrc" name/>'+
            '</div>'+
            '</div>'+
            '</div>' +
            '<div class="rightSide" id="idRight"><div class="next" id="idNext"></div></div>' +
            '</div>' +
            '<div class="shadow" id="idShadow"></div>';
    },
    get_scroll_modal: function(){
        if (self.pageYOffset) {
            return {scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset};
        } else if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict
            return {scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};
        } else if (document.body) {// all other Explorers
            return {scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};
        }
    },
    center_overlay_modal: function(){
        var
            scroll_pos      = this.get_scroll_modal(),
            contentHeight   = document.getElementsByClassName(this.classNamePhotoBox)[0].clientHeight,
            contentWidth    = document.getElementsByClassName(this.classNamePhotoBox)[0].clientWidth;

        projectedTop = (this.windowHeight/2) + scroll_pos['scrollTop'] - (contentHeight/2);

        if(projectedTop < 0) projectedTop = 0;

        var box = document.getElementsByClassName(this.classNamePhotoBox)[0];
        box.style.left = ((this.windowWidth/2) + scroll_pos['scrollLeft'] - (contentWidth/2)) + "px";
    },
    getURLs: function(){
        var obj = document.getElementsByClassName(this.classNamePhotoBlock);
        var classCount = obj.length;
        var picUrl_tmp = new Array();

        var __class__ = this;
        for(var i = 0; i < classCount; i++) obj[i].onmousemove = function () {
            if (this.getElementsByTagName("img")[0] == undefined) return;
            var count = this.getElementsByTagName("img").length;

            for (var j = 0; j < count; j++) {
                picUrl_tmp[j] = this.getElementsByTagName("img")[j].src;
                this.getElementsByTagName("img")[j].setAttribute("name", j);

                this.getElementsByTagName("img")[j].onclick = function(){
                    __class__.view(this);
                };

                var parent = this.getElementsByTagName("img")[j].parentNode;
                if(parent.hasAttribute('href')){
                    parent.setAttribute('href', 'javascript:void(0)');
                }
            }
        }
        this.picUrl = picUrl_tmp;
    },
    view: function(obj) {
        var src = (obj.childElementCount == 0) ? obj : obj.getElementsByTagName("img")[0],
            name = obj.getAttribute("name"),
            bigImg = document.getElementById("bigImgSrc");

        src = src.getAttribute("src");

        if (bigImg.hasAttribute('width') && bigImg.hasAttribute('width')) {
            bigImg.removeAttribute("width");
            bigImg.removeAttribute("height");
        }

        bigImg.src = src;
        bigImg.setAttribute("name", name);

        var
            width = bigImg.width,
            newWidth,
            height = bigImg.height,
            newHeight,
            ratio,
            maxWidth = 650,
            maxHeight = 500;

        if (width > height)
            ratio = maxWidth / width;
        else
            ratio = maxHeight / height;

        newWidth = width * ratio;
        newHeight = height * ratio;

        bigImg.width = newWidth;
        bigImg.height = newHeight;

        var box = document.getElementById("idBox");
        box.style.left = 0;
        box.width = (newWidth + 48 + 20) + "px";
        var lSide = document.getElementById("idLeft");
        lSide.height = newHeight + "px";
        var rSide = document.getElementById("idRight");
        rSide.height = newHeight + "px";

        var shadow = document.getElementById("idShadow");
        shadow.style.display = "block";

        var prev = document.getElementById("idPrev");
        prev.style.marginTop = (newHeight / 2 - 32) + "px";

        var next = document.getElementById("idNext");
        next.style.marginTop = (newHeight / 2 - 32) + "px";


        box.style.display = "block";

        this.center_overlay_modal();

        var __class__ = this;

        lSide.onclick = function(){
            var temp = document.getElementById("bigImgSrc");
            var current = parseInt(temp.name);
            var maxItem = __class__.picUrl.length;
            var i = (current == 0) ? maxItem - 1: current - 1;
            if(__class__.picUrl[i] != null)
            {
                temp.removeAttribute("width");
                temp.removeAttribute("height");
                temp.src = __class__.picUrl[i];
                temp.setAttribute("name", i.toString());
                __class__.view(temp);
            }
        };

        rSide.onclick = function(){
            var temp = document.getElementById("bigImgSrc");
            var current = parseInt(temp.name);
            var maxItem = __class__.picUrl.length;
            var i = (current == maxItem - 1) ? 0 : current + 1;
            if(__class__.picUrl[i] != null)
            {
                temp.removeAttribute("width");
                temp.removeAttribute("height");
                temp.src = __class__.picUrl[i];
                temp.setAttribute("name", i.toString());
                __class__.view(temp);
            }
        };

        document.getElementsByClassName('close')[0].onclick = function(){
            box.style.display = 'none';
            shadow.style.display = 'none';
        };

        shadow.onclick = document.getElementsByClassName('close')[0].onclick;

        bigImg.onclick = rSide.onclick;

        var kd = document.onkeydown;
        document.onkeydown = function (event) {
            if(kd) kd();
            if(event.keyCode == 39) {
                rSide.onclick();
            }
            if(event.keyCode == 37) {
                lSide.onclick();
            }
            if(event.keyCode == 27) {
                document.getElementsByClassName('close')[0].onclick();
            }
        }
    }
};