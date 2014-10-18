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

    if(!isTouchDevice.any() && !mobileMenu()){
        activateDropDown();
    }
    menu();

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
        activateDropDown();
    } else {
        if(!$('#mobile').hasClass('active')){
         $('#nav ul').hide();
         deactivateDropDown();
     }
    }
})
function mobileMenu(){
     if($(window).width()<1200){
        return true;
    }
    return false;
}
function deactivateDropDown(){
    $('#nav li.menu-item-has-children').unbind('mouseenter');
     $('#nav li.menu-item-has-children').unbind('mouseleave');
 }

function activateDropDown(){
    $('#nav li.menu-item-has-children').bind('mouseenter',function(){
        $('.sub-menu',$(this)).fadeIn(200);
    })
    $('#nav li.menu-item-has-children').bind('mouseleave',function(){
        $('.sub-menu',$(this)).fadeOut(100);
    })
}

function menu(){
    var $links = $('.sub-menu a');
    $links.on('click',function(e){
        e.preventDefault();
        var $index = $links.index($(this))+1;
        console.log($index);
        var $url = $(this).attr('href');
        //remove trailing slash from url if present
        if ($url.substring($url.length-1) == "/"){
            var $url = ($url.slice(0, -1));
        }
        //get slug of page
        var $urlSegments = $url.split('/');
            $segmentLength = $urlSegments.length,
            $slug = $urlSegments[$segmentLength-1];
            //move down to section
            $.fn.fullpage.moveTo($index);
    })
}

