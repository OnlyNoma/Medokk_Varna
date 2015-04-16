function charsCount(id, maxChars){
    var count = $("#"+id).val().length;
    $("#"+id+"_w").text(count);
    $("#"+id).bind("keyup",function (e) {
        count = $("#"+id).val().length;
        if(!(e.keyCode == 8)){
            if(count >= maxChars)
            {
                $("#"+id).val($("#"+id).val().substring(0,maxChars));
                $("#"+id+"_w").text(count);
                return false;
            }
            if(e.keyCode == e.altKey || e.keyCode == e.shiftKey || e.keyCode == e.ctrlKey || e.keyCode == e.accessKey)
                return false;
            count++;
        }else{
            count--;
        }
        $("#"+id+"_w").text(count);
    });
}