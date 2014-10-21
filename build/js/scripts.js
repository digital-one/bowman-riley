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



$(function(){

    if(!isTouchDevice.any() && !mobileMenu()){
        activateDropDown();
    }
    menu();

    var $initFullPageJS=0; //counter to handle if fullpage js has already been called.

//mobile menu

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




if (Modernizr.history){ //if browser supports history
      var $main = $('main'),
          $aside = $('aside'),
          $links = $('#nav a');
String.prototype.decodeHTML = function() {
    return $("<div>", {html: "" + this}).html();
  };

    $('#nav a').on('click',function(e){
        e.preventDefault();
        var $href = $(this).attr("href");
        loadPage($href);
    }) 
$('body').on('click', '.case-study-link, #case-studies a.close, #news a.close, a.news-link', function(e) {
        e.preventDefault();
        var $href = $(this).attr("href");
        loadPage($href,'aside');
    })

$('body').on('click','.push-link',function(e){
    e.preventDefault();
    var $href = $(this).attr("href");
    loadPage($href);
})


    $(window).on("popstate", function(e) { //handle browser back button
    if (e.originalEvent.state !== null) {
      loadPage(location.href);
    }
    });


loadPage = function(href,selector){
    if(!selector){
        selector = 'main';
    } 
    target  = $(selector)
    history.pushState({}, '', href);
    target.empty();
    setNavState(href);
    target.load(href + " "+ selector+">*", onAjaxLoad);
}
onAjaxLoad = function(html){
    document.title = html
          .match(/<title>(.*?)<\/title>/)[1]
          .trim()
          .decodeHTML();
          onPageLoad(html);
}

animateLogo = function(direction){
    if(direction=='down'){
    $('#home-link').animate({
        top: '18px'
    },{
        duration: 500,
        easing: "easeInQuad"
        });
} else {
    $('#home-link').animate({
        top: '-20px'
    },{
        duration: 500,
        easing: "easeOutQuad"
        });
}
}
onPageLoad = function(html){
 //$.fn.fullpage.destroy();
//get number of sections 
var $sections = $('.section',html),
    $anchors = Array()

$sections.each(function(){
    $anchors.push($(this).attr('data-anchor'));
    
})
;
if($initFullPageJS>0){
 $.fn.fullpage.setAllowScrolling(false);
 $.fn.fullpage.setKeyboardScrolling(false);
}
 $initFullPageJS++;
//set the nav bar to the current url
$('#page-wrap').fullpage({
        verticalCentered: false,
        resize : false,
        scrollOverflow: true,
        paddingTop: 0,
        paddingBottom: 0,
        normalScrollElementTouchThreshold: 30,
        touchSensitivity: 15,
        scrollingSpeed: 700,
        anchors: $anchors,
        onLeave: function(index, nextIndex, direction){
         //after leaving section 2
        if(index == 1 && direction =='down'){
          animateLogo('down');
         }
         if(index == 2 && direction =='up'){
          animateLogo('up');
         }
         }
    });
 if($('#twitter-feed').length){
    var config1 = {
    "id": '345170787868762112',
    "domId": 'twitter-feed',
    "maxTweets": 2,
    "enableLinks": true
    };
twitterFetcher.fetch(config1)
}

//google maps

if($('#map').length){

     $('#map').gmap({
        markers: [{'latitude': 53.7970116,'longitude': -1.5483672}],
        markerFile: 'http://bowmanriley.localhost/images/marker.png',
        markerWidth:130,
        markerHeight:154,
        markerAnchorX:65,
        markerAnchorY:154
});

    $('.map-1').on('click',function(e){
        e.preventDefault();
        $('#map').empty().gmap({
        markers: [{'latitude': 53.7970116,'longitude': -1.5483672}],
        markerFile: 'http://bowmanriley.localhost/images/marker.png',
        markerWidth:130,
        markerHeight:154,
        markerAnchorX:65,
        markerAnchorY:154
    })
    });
     $('.map-2').on('click',function(e){
        e.preventDefault();
        $('#map').empty().gmap({
        markers: [{'latitude': 51.5232556,'longitude': -0.0977822}],
        markerFile: 'http://bowmanriley.localhost/images/marker.png',
        markerWidth:130,
        markerHeight:154,
        markerAnchorX:65,
        markerAnchorY:154
    })
    });
     $('.map-3').on('click',function(e){
        e.preventDefault();
        $('#map').empty().gmap({
        markers: [{'latitude': 53.9615561,'longitude': -2.0139126}],
        markerFile: 'http://bowmanriley.localhost/images/marker.png',
        markerWidth:130,
        markerHeight:154,
        markerAnchorX:65,
        markerAnchorY:154
    })
    });
   
}


 repositionSubNavs();
}

setNavState = function(href){
    var $hash = location.hash;
    href = href.replace($hash,'');
    $links.parent('li').removeClass('current-menu-item');
    $links.each(function(){
        if($(this).attr('href')==href){
            $(this).parent('li').addClass('current-menu-item');
        }
    })
}
loadPage(location.href);
}
// button click actions

$('body').on('click', '.people-link.select', function(e) {
 e.preventDefault();
    $(this).removeClass('select').addClass('close');
});
$('body').on('click','.people-link.close',function(e){
    e.preventDefault();
    $(this).removeClass('close').addClass('select');
})
$('body').on('click', '.arrow-divide a',function(e){
    e.preventDefault();
    $.fn.fullpage.moveSectionDown();
})



}); //closing on document ready

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
    repositionSubNavs();
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
setSubNavPosition =  function(){

  $('.secondary-nav').each(function(){
      var $windowHeight = $(this).parent('.main').outerHeight(),
        $navHeight = $(this).outerHeight(),
        $spacing = 24,
        $top = ($windowHeight - $navHeight) - $spacing;
        $(this).css({
            top: $top+'px'
        })
        $(this).show();
    })
}
repositionSubNavs = function(){
     
setTimeout(setSubNavPosition,500);
}
  



