
"use_strict"
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
/*
var
    windowHeight = $(window).height(),
    windowWidth = $(window).width();*/

function _get_scroll_modal1() {
    if (self.pageYOffset) {
        return {scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset};
    } else if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict
        return {scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};
    } else if (document.body) {// all other Explorers
        return {scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};
    };
};

function _center_overlay_modal1(parameters){
    var
        cn              = parameters.cn,
        scroll_pos      = _get_scroll_modal1(),
        contentHeight   = $("."+cn+":eq(0)").height(),
        contentWidth    = $("."+cn+":eq(0)").width(),
        projectedTop = (windowHeight/2) + scroll_pos['scrollTop'] - (contentHeight/2);

    if(projectedTop < 0) projectedTop = 0;

    //if(contentHeight > windowHeight) return;

    var box = document.getElementsByClassName(cn)[0];
    box.style.left = ((windowWidth/2) + scroll_pos['scrollLeft'] - (contentWidth/2)) + "px";
};

function hasGetElementsByClassName(){
    if(document.getElementsByClassName == undefined) {
        document.getElementsByClassName = function(cl) {
            var retnode = [];
            var myclass = new RegExp('\\b'+cl+'\\b');
            var elem = this.getElementsByTagName('*');
            for (var i = 0; i < elem.length; i++) {
                var classes = elem[i].className;
                if (myclass.test(classes)) {
                    retnode.push(elem[i]);
                }
            }
            return retnode;
        }
    }
}

function scrolling () {
    var menu = $('.menu:eq(0)'),
        pos = menu.offset();

        $(window).scroll(function(){
            if($(this).scrollTop() > pos.top+menu.height()){
                //$(".back_to_top").stop(true, true);
                $(".back_to_top").delay(100).fadeIn(350);
            } else if($(this).scrollTop() <= pos.top){
                //$(".back_to_top").stop(true, true);
                $(".back_to_top").delay(100).fadeOut(350);
            }
        });

        $('.back_to_top:eq(0)').click(function(){
            $('html, body').animate({scrollTop:0}, 500);
        });
}

function menuHover(){
    $(".menu ul li ul").css({'display' : 'none'});
    $(".menu ul").first().find("li").hover(function () {
        $(this).addClass('hover');
        $(this).find('ul').first().fadeIn('fast');
    }, function () {
        $(this).removeClass('hover');
        $(this).find('ul').first().fadeOut('fast');
    });
}

function addButtons(){

    $(".addInput").click( function (event) {
        $('.m_cont').append("<input type='file' name='photo[]' class='multiple' onchange='viewAddImg(this,event);'> ");
    });

    $(".removeInput").bind('click', function () {
        $('.m_cont').find('input[type=file]').last().remove();
    });
}

function viewAddImg(obj, event,_class) {
    _class = _class || "view_img";
    if($(obj).hasClass('multiple') == false){//
        $(".review_comment").find("."+_class).html(
                "<img src ='"+URL.createObjectURL(event.target.files[0])+"'>"
        );
    }else{
        $(".review_comment").find("."+_class+"_mult").append(
            "<div class='blob_container'>"+
                "<span class='delete' onclick='deletePicture(this)'></span>"+
                "<img src ='"+URL.createObjectURL(event.target.files[0])+"'>"+
            "</div>"
        );
        $(obj).hide();
    }
}

function deletePicture(obj, id){
    id = id || 0;
    var o = $(obj).parent();
    var a = confirm("Точно удалить?");
    if(a) {
        $('.m_cont').find('input[type=file]:eq(' + ( $(o).index() -1 )+ ')').remove();

        if(id != 0){
            $.ajax({
                type: "post",
                url: "/query/deletePic.php",
                data: "id="+id,
                dataType: "html",
                success: function(result)
                {
                    if(result == 'yes') {
                        alert('Даааа');
                        //$(obj).parent().parent().remove();
                    }
                    //

                }
            });
        }

        $(o).remove();
    }

}

function validSettings(e){
    var val = $("#form").serialize();

    if($("#pass").val() != $("#reppass").val()){
        alert("Пароли не совпадают!");
        e.preventDefault();
        return;
    }else{

    }
}

function fixed_panel(){
    var menu = $('.panel:eq(0)'),
        pos = menu.offset();

    $(window).scroll(function(){
        if($(this).scrollTop() > pos.top){
            //$(menu).stop(true, true);
            $(menu).addClass('panel_fixed');
        } else if($(this).scrollTop() <= pos.top){
            //$(menu).stop(true, true);
            $(menu).removeClass('panel_fixed');
        }
    });
}

function deleteMessage(){
    $('.delete_form').submit(function(e){
        var response = confirm("Вы уверены?\nДанные не вернуть! :-(");
        if(!response) {
            e.preventDefault();
        }
    });
}

function addHave(){
    var room = $("#roomh").val();
    $(".list").append(
        "<div class='list_item'><li>"+room+"</li><span><img src='/img/delete.gif'></span><input type='hidden' name = 'roomhave[]' class='room_item' value='"+room+"'></div>"
    );
        editHave();
        deleteHave();
}

function deleteHave(){
    $(".list_item").find('img').bind('click', function () {
        $(this).parent().parent().remove();
    });
}

function editHave(){
    $('.list').find('li').bind('click',function(){
        $(this).attr('contenteditable', 'true');
        $(this).css({"background" : '#fff', "border" : '1px solid #d8d8d8', "outline" : 'none'});

        $(this).bind("keypress", function (e) {
            if(e.keyCode == 13){
                $(this).attr('contenteditable', 'false');
                $(this).attr('style', '');
                $('.room_item:eq("'+$(this).index()+'")').val($(this).text());
                if($(this).attr('name')){
                    var id = $(this).attr('name');
                    $.ajax({
                        type: "post",
                        url: "/query/editHave.php",
                        data: "id="+id+"&text="+$(this).text(),
                        dataType: "html",
                        success: function(result)
                        {
                            if(result == 'yes') {
                                alert('Даааа');
                                //$(obj).parent().parent().remove();
                            }
                            //

                        }
                    });
                }
            }
        });
    });
}

function priceValid(){
    $('#price').keypress(function(eve) {
        if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0) ) {
            eve.preventDefault();
        }

// this part is when left part of number is deleted and leaves a . in the leftmost position. For example, 33.25, then 33 is deleted
        $('#price').keyup(function(eve) {
            if($(this).val().indexOf('.') == 0) {    $(this).val($(this).val().substring(1));
            }
        });
    });

}


jQuery(function($) {
    $("#phone").mask("+38(999) 999-9999", {placeholder: "+38(098) 765-4321"});
    $("#alt_phone").mask("+38(999) 999-9999", {placeholder: "+38(098) 765-4321"});
});


function ajaxDeleteHave(obj, id){
    $.ajax({
        type: "post",
        url: "/query/deleteHave.php",
        data: "id="+id,
        dataType: "html",
        success: function(result)
        {
            //alert(result);
            if(result == 'yes') {
                //alert('lol');
                $(obj).parent().parent().remove();
            }
        }
    }).always(function () {
        $(obj).parent().parent().remove();
    });
}

function parseVideo(){
    $('#src').bind('keyup', function () {
        $('#loader').fadeIn('fast');
        $.ajax({
            type: "post",
            url: "/query/video.php",
            data: "src="+$('#src').val(),
            dataType: "html",
            success: function(result)
            {
                $('#title').val(result.split('|')[0]);
                $('.view_img').html(
                    '<iframe width="460" height="315" src="https://www.youtube.com/embed/'+result.split('|')[1]+'" frameborder="0" allowfullscreen></iframe>'
                );
                $('#loader').fadeOut('fast');
                $('#h_src').val(result.split('|')[1]);
            }
        });
    })
}




function settingsLimit(){
    $("#usp").bind('keypress', function () {
        charsCount('usp', 256);
    });
    $("#address").bind('keypress', function () {
        charsCount('address', 128);
    });
    $("#title").bind('keypress', function () {
        charsCount('title', 64);
    });
    $("#title_big").bind('keypress', function () {
        charsCount('title_big', 128);
    });
    $("#descr").bind('keypress', function () {
        charsCount('descr', 256);
    });
    $("#adv").bind('keypress', function () {
        charsCount('adv', 128);
    });
    $("#price").bind('keypress', function () {
        charsCount('price', 10);
    });
    $("#recall_title").bind('keypress', function () {
        charsCount('recall_title', 64);
    });
    $("#who").bind('keypress', function () {
        charsCount('who', 128);
    });
}




$(document).ready(function(){
    hasGetElementsByClassName();

    new PhotoViewer('pvPhotos');

    var browserArr = browser();
    var ie = (browserArr[0] == "ie");
    var ieVers = parseInt(browserArr[1]);
    if(ie && (ieVers <= 7)){
        window.location = "../ie/";
    }

    menuHover();

    addButtons();

    //acceptSubmit();

    scrolling();

    fixed_panel();

    deleteMessage();

    priceValid();

    editHave();

    parseVideo();

    settingsLimit();
});