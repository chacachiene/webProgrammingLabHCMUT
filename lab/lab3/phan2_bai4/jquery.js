$(document).ready(function(){
    $(".card").mouseenter( func1);
    function func1(){
        $(this).css("background-color", "pink");
    }
    $(".card").mouseleave( func2);
    function func2(){
        $(this).css("background-color", "#ffffff");
    }

    var imageUrl;
   $("img").mouseenter(funcChange).mouseleave(function(){
    $("img#"+ $(this).attr('id') ).attr('src', imageUrl);
   }
    );
    function funcChange(){
    var id = $(this).attr('id');
    imageUrl = $(this).attr('src');
    var imgEl = $(this);
    $.ajax({
        url:'changeImage.php',
        type: 'GET',
        data: {id: id},
        success: function(response){
            imgEl.attr('src', response.image);
        }
    })
    }
    var mainPicSrc = $('#mainPic').attr("src");
    $(".de").hover(function(){
        mainPicSrc=$('#mainPic').attr("src");
        $('#mainPic').attr("src", $(this).attr("src"));
    })
});
