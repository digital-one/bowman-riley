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

var isRetina = (
    window.devicePixelRatio > 1 ||
    (window.matchMedia && window.matchMedia("(-webkit-min-device-pixel-ratio: 1.5),(-moz-min-device-pixel-ratio: 1.5),(min-device-pixel-ratio: 1.5)").matches)
);


$(function(){

    if(!isTouchDevice.any() && !mobileMenu()){
        activateDropDown();
    }
    menu();



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
          $links = $('#nav a'),
          $firstLoad  = 1;

var $navLinks = $('#nav a');
$navLinks.on('click',function(e){
    e.preventDefault();
$navLinks.removeClass('current-menu-item');
$(this).addClass('current-menu-item');
})


String.prototype.decodeHTML = function() {
    return $("<div>", {html: "" + this}).html();
  };

    $('#nav a').on('click',function(e){
        e.preventDefault();
        var $href = $(this).attr("href");
        //loadPage($href);
        getPages($href);
    }) 
$('body').on('click', '.case-study-link, #case-studies a.close, #news a.close, a.news-link, .case-study-links .category-links a', function(e) {
        e.preventDefault();
        var $href = $(this).attr("href");
        getPages($href,'aside','aside .inner');
    })

$('body').on('click','.push-link',function(e){
    e.preventDefault();
    var $href = $(this).attr("href");
    getPages($href);
})

$('body').on('click', '#case-studies-nav a',function(e){
     e.preventDefault();
     $('#case-studies-nav a').removeClass('current');
     $(this).addClass('current');
        var $href = $(this).attr("href");
        getPages($href,'aside','aside .inner');
})

$('body').on('click','#sub-nav.people-categories  a',function(e){
    e.preventDefault();
    $('#sub-nav.people-categories a').parent('li').removeClass('current-menu-item');
    $(this).parent('li').addClass('current-menu-item');
    var $href = $(this).attr("href");
     getPages($href);
})
/*
window.addEventListener("popstate", function(e) {

    // URL location
    var location = document.location;

    // state
    //var state = e.state;
    if (e.originalEvent.state !== null) {
     getPages(location.href);
    
    }

});
 */

window.onpopstate = function(event) {
 // console.log("location: " + document.location.pathname + ", state: " + JSON.stringify(event.state));
if(event.state==null){
   
} else {
    getPages(location.href);
}
};

/*
    $(window).on("popstate", function(e) { //handle browser back button
console.log(e);
    if (e.originalEvent.state !== null) {

      getPages(location.href);
    }
    });

*/


var $totalPages = 0,
    $loadedPages = 0,
    $loadedObjs=[];
    $pages = Array(),
    $target = 'main',
    $selector = '.section',
    $initFullPageJS=0; //counter to handle if fullpage js has already been called.

setNavState = function(href){
    var $hash = location.hash;
    href = href.replace($hash,'');
    if(href=='http://bowmanriley.localhost/'){
        $('header').removeAttr('style').addClass('front-page');
        animateLogo('up')
    } else {
        $('header').removeAttr('style').removeClass('front-page');
        animateLogo('down')
    }
    
    $links.parent('li').removeClass('current-menu-item');
    $links.each(function(){
        if($(this).attr('href')==href){
            $(this).parent('li').addClass('current-menu-item');
        }
    })
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

getPages = function(url,target,selector){

    $('body').prepend('<div id="overlay" />');
    $('main').addClass('loading');
    $loadedObjs=[];
    //kill mouse scroll
   /* if($initFullPageJS>0){
            $.fn.fullpage.destroy();
            $.fn.fullpage.setAllowScrolling(false);
            $.fn.fullpage.setKeyboardScrolling(false);
        }
        */
        setNavState(url);
    $target = 'main';
    $selector = '.section';
    if(target) $target = target;
    if(selector) $selector =  selector;

    $.ajax({
    //url: $url,
    url:"?action=ajax_get_pages&url="+url+"&firstLoad="+$firstLoad,
    dataType: 'json',
    timeout: 1000,
    success: function(data) {
    //$pages = data;
    loadPages(data);
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
        if(console) console.log('error')
    },
    complete: function(xhr, textStatus) {
    } 
    }); 
}

   getPages(location.href); 

loadPages = function(pages){ //get page urls back
    $totalPages = pages.length;
    $loadedPages = 0;
    $pages = pages;
    var $href  = $pages[0];

   
     history.pushState({}, '', $href); //push the parent url
    // setNavState($href); //set the nav state to parent
     if($firstLoad && $pages.length > 1){ //if first load and more than one page, start at 2nd page down
        $href= $pages[1];
    }
     loadPage($href); //load the parent page
}

loadPage  = function(url){
    $.get(url, function(data){ 
        if($firstLoad==0 && $loadedPages==0){
        document.title = data.match(/<title>(.*?)<\/title>/)[1].trim();
        }
       var $section = $(data).find($selector);
    $loadedObjs.push($section);
    //console.log($loadedObjs);
 // $(data).find($selector).appendTo($target);
 
  $loadedPages++;
  if($loadedPages < $totalPages){
    var $url = $pages[$loadedPages];
    loadPage($url);
    } else {
        //all pages loaded
       
if(!$firstLoad){
        $($target).empty();
        }

        for(i=0;i<$loadedObjs.length;i++){
            $($target).append($loadedObjs[i])
           // $loadedObjs[i].appendTo($target);
        }
       initLoadedPages();
       $firstLoad=0;
    }
    });
}

initLoadedPages = function(){
    //page anchors
      var $sections = $('.section'),
            $anchors = Array();
        $sections.each(function(){
        $anchors.push($(this).attr('data-anchor'));
        });
        //console.log($anchors);
        if($initFullPageJS>0){
            $.fn.fullpage.setAllowScrolling(false);
            $.fn.fullpage.setKeyboardScrolling(false);
        }
    

    //twitter feed
    if($('#twitter-feed').length){ 
    var config1 = {
    "id": '345170787868762112',
    "domId": 'twitter-feed',
    "maxTweets": 2,
    "enableLinks": true
    };
    twitterFetcher.fetch(config1);
    }

    //init fullpage js
    $('#page-wrap').fullpage({
        verticalCentered: false,
        resize : false,
        scrollOverflow: true,
        paddingTop: 0,
        paddingBottom: 0,
        normalScrollElementTouchThreshold: 15,
        touchSensitivity: 5,
        scrollingSpeed: 700,
        anchors: $anchors,
        onLeave: function(index, nextIndex, direction){
              history.pushState({}, '', location.href);
         //after leaving section 2
        if(index == 1 && direction =='down'){
          animateLogo('down');
         }
         if(index == 2 && direction =='up'){
            if($('header').hasClass('front-page')){
          animateLogo('up');
          }
         }
         }
    });
    $initFullPageJS++;
    //google maps

    if($('#map').length){
    //load first map
     $('#map').gmap({
        markers: [{'latitude': 53.7970116,'longitude': -1.5483672}],
        markerFile: 'http://bowmanriley.localhost/wp-content/themes/bowmanriley/images/marker.png',
        markerWidth:130,
        markerHeight:154,
        markerAnchorX:65,
        markerAnchorY:154
    });
    $('.map-1').on('click',function(e){
        e.preventDefault();
        $('#map').empty().gmap({
        markers: [{'latitude': 53.7970116,'longitude': -1.5483672}],
        markerFile: 'http://bowmanriley.localhost/wp-content/themes/bowmanriley/images/marker.png',
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
        markerFile: 'http://bowmanriley.localhost/wp-content/themes/bowmanriley/images/marker.png',
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
        markerFile: 'http://bowmanriley.localhost/wp-content/themes/bowmanriley/images/marker.png',
        markerWidth:130,
        markerHeight:154,
        markerAnchorX:65,
        markerAnchorY:154
    })
    });
    }
    //reposition sub navs
   // repositionSubNavs();
      $('main').removeClass('loading');
   $('#overlay').remove();
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

} //closing if modernizr history
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
 //   repositionSubNavs();
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
     
setTimeout(setSubNavPosition,200);
}
  



