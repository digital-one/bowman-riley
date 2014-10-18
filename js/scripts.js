var isTouchDevice = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isTouchDevice.Android() || isTouchDevice.BlackBerry() || isTouchDevice.iOS() || isTouchDevice.Opera() || isTouchDevice.Windows());
    }
};



$(document).ready(function() {

    if(!isTouchDevice.any()){
        dropDown();
    }
    $('#page-wrap').fullpage({
    	verticalCentered: false,
        resize : false,
        scrollOverflow: true,
        paddingTop: 0,
        paddingBottom: 0,
        normalScrollElementTouchThreshold: 24
    });


    var config1 = {
 	"id": '345170787868762112',
  	"domId": 'twitter-feed',
    "maxTweets": 2,
    "enableLinks": true
};
twitterFetcher.fetch(config1);


$('#mobile').on('click',function(e){
    e.preventDefault();
    if($(this).hasClass('active')){
   $(this).removeClass('active');
   $('#nav ul').hide();
$('#page-wrap').animate({
    left: 0
    }, {
    duration: 200,
    easing: "easeOutQuad"
});
    } else {
  $('#page-wrap').animate({
    left: '30%'
    }, {
    duration: 200,
    easing: "easeInQuad",
    complete: function(){
        $('#nav ul').fadeIn(100);
    }
    });
  $(this).addClass('active');
}
});

$('.arrow-divide a').on('click',function(e){
    e.preventDefault();
    $.fn.fullpage.moveSectionDown();
})
});

$(window).on('resize',function(){
     if($(window).width()>1199){
        $('#mobile').removeClass('active');
        $('#page-wrap').animate({
        left: 0
        }, {
        duration: 200,
        easing: "easeOutQuad"
        });
        $('#nav ul').show();
        $('#nav .sub-menu').hide();
    } else {
        if(!$('#mobile').hasClass('active')){
         $('#nav ul').hide();
     }
    }
})


function dropDown(){
    $('#nav li.menu-item-has-children').on('mouseenter',function(){
        console.log('show');
        $('.sub-menu',$(this)).show();
    })
}