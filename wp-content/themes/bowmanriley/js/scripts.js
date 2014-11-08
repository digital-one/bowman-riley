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


$(".fancybox").fancybox();

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

//route calculator

if (typeof navigator.geolocation != "undefined") {
          $('#from-link').show();
         
        }


$("#calculate-route").submit(function(event) {
  event.preventDefault();
  calculateRoute($("#from").val(), $("#to").val());
});
$('body').on('click','#calculate-route a#reset',function(e){
    e.preventDefault();
    $('#calculate-route input').val('');
});
//retreive current geo location
$('body').on('click','#from-link',function(event){
     $('#calculate-route  p.error').empty().hide();
     $('body').prepend('<div id="overlay" />');
    $('main').addClass('loading');

          event.preventDefault();
          var addressId = this.id.substring(0, this.id.indexOf("-"));
 
          navigator.geolocation.getCurrentPosition(function(position) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
              "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
            },
            function(results, status) {
                $('#overlay').remove();
                $('main').removeClass('loading');
              if (status == google.maps.GeocoderStatus.OK)
                $("#" + addressId).val(results[0].formatted_address);
              else
               
                $('#calculate-route p.error').show().append("Unable to retrieve your current location");
            });
          },
          function(positionError){
           $('#calculate-route p.error').show().append("Error: " + positionError.message);
          },
          {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          });
        });

calculateRoute =function (from) {
    $('#calculate-route  p.error').empty().hide();

        $('#map').css({
        height:'80%'
        })
         lat = $('#map').attr('data-lat');
        lng = $('#map').attr('data-lng');

        var myOptions = {
          zoom: 10,
          center: new google.maps.LatLng(lat, lng),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
       
        to = new google.maps.LatLng(lat, lng);
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
 
        var directionsService = new google.maps.DirectionsService();
    


        var directionsRequest = {
          origin: from,
          destination: to,
          travelMode: google.maps.DirectionsTravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC
        };
        directionsService.route(
          directionsRequest,
          function(response, status){
            $('aside').append('<div id="directions" />');
            if (status == google.maps.DirectionsStatus.OK){
              directionsDisplay = new google.maps.DirectionsRenderer({
                map: mapObject,
                panel: document.getElementById('directions'),
                directions: response
              });


            
             
     


              // directionsDisplay.setDirections(response);
            }
            else
                $('#calculate-route p.error').show().append("Unable to retrieve your route");
          }
        );
      }
 

if (Modernizr.history){ //if browser supports history
      var $main = $('main'),
          $aside = $('aside'),
          $links = $('#nav a'),
          $firstLoad  = 1,
          $home_url = 'http://bowmanriley.localhost/';
       


//on click change nav state

var $navLinks = $('#nav a');
$navLinks.on('click',function(e){
    e.preventDefault();
$navLinks.parent('li').removeClass('current-menu-item');
$(this).parent('li').addClass('current-menu-item');
})

//convert drop down links to hash

var $submenu_links = $('.sub-menu a:not(#menu-item-50 .sub-menu a,#menu-item-60 .sub-menu a)');
$submenu_links.each(function(){
    var $href = $(this).attr('href');
    //remove trailing slash
    $href =  $href.replace(/\/$/,"");
    $url = $href.split("/");
    if($url.length>4){
        $url[$url.length-1] = '#'+$url[$url.length-1];
    }
    $url = $url.join('/');
    $(this).attr('href',$url);
})

// add hash to homepage sub pages

var $home_submenu_links  =$('#menu-item-60 .sub-menu a');
$home_submenu_links.each(function(){
    var $href = $(this).attr('href');
    //remove trailing slash
    $href =  $href.replace(/\/$/,"");
    $href = $href.replace('about-us/','');
    $href
    $url = $href.split("/");
    if($url.length>1){
        $url[$url.length-1] = '#'+$url[$url.length-1];
    }
    $url = $url.join('/');
    $(this).attr('href',$url);
})

String.prototype.decodeHTML = function() {
    return $("<div>", {html: "" + this}).html();
  };

//link actions

    $('#nav a').on('click',function(e){
        e.preventDefault();
        var $href = $(this).attr("href");
        getPages($href);
    }) 
$('body').on('click', '.case-study-link, #case-studies a.close, #news a.close,#our-people-sector a.close,#people-single a.close, a.news-link, .case-study-links .category-links a', function(e) {
        e.preventDefault();
        var $href = $(this).attr("href");
      //  getPages($href,'aside','aside .inner');
        getPages($href);
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

$('body').on('click','.directions-link',function(e){
    e.preventDefault();
    $('#map').attr('data-lat',$(this).attr('data-lat'));
    $('#map').attr('data-lng',$(this).attr('data-lng'));
    $('form#calculate-route').slideDown();
})


window.onpopstate = function(event) {
  
if(event.state==null){
 
} else {
    var $url = location.href.replace(location.hash,'');
    if($url==$home_url){
         $url = $home_url;
    }
    getPages($url);
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
    $cache = [],
    $sectionCache = [],
    $loadedObjs=[],
    $pages = [],
    $target = 'main',
    $selector = '.section',
    $initFullPageJS=0; //counter to handle if fullpage js has already been called.


setNavState = function(href){

    var $hash = location.hash;
    href = href.replace($hash,'');
   // if(href=='http://92.60.114.159/~bowmanriley/'){
            if(href=='http://bowmanriley.localhost/'){

        $('header').removeAttr('style').addClass('front-page');
        animateLogo('up')
    } else {
        $('header').removeAttr('style').removeClass('front-page');
        animateLogo('down')
    }
   // console.log($links);
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

//check if page request is within the section currently being viewed

var $hasHash=0;
var $currentURL = location.href.replace(location.hash,'');
var $requestedURL = url.split('#');
if($requestedURL[1]) $hasHash=1;
$requestedURL = $requestedURL[0];
var $sameSection=0;
//if page request is within current section, goto anchor
if($currentURL==$requestedURL) $sameSection=1;

if($sameSection && $hasHash && !$firstLoad){
   // console.log('hash page within same section')
      history.pushState({}, '', url); //push the parent url
      // if(location.hash){
       var $anchor = location.hash.replace('#','');
        $.fn.fullpage.moveTo($anchor, 0);
     
} else {
//   console.log('page within same section but parent')
    //load the section pages

    $('body').prepend('<div id="overlay" />');
    $('main').addClass('loading');
    $loadedObjs=[];
    setNavState(url);
    $target = 'main';
    $selector = '.section';
    if(target) $target = target;
    if(selector) $selector =  selector;

    //check section cache to see if url has been called previously

    var $getAjaxPages=1;
    if($sectionCache.length>0){
    $.each($sectionCache, function( key, $arr) {
       /// console.log($arr);
        $.each($arr,function($key, $url){
         
            if($url==url){ //if url has been cached load the cached section pages
                loadPages($arr);
                $getAjaxPages=0;
            }
        })
      });
    }

    if($getAjaxPages){ //otherwise get the section pages via AJAX
    $.ajax({
    //url: $url,
    url:"?action=ajax_get_pages",
    dataType: 'json',
    timeout: 5000,
    data: { url: url, firstLoad: $firstLoad} ,
    timeout: 1000,
    success: function(data) {
    //$pages = data;
    $sectionCache.push(data);
    loadPages(data);
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
        if(console) console.log('error')
    },
    complete: function(xhr, textStatus) {
    } 
    }); 
    }
}

}

   getPages(location.href); // on page load - get pages.

loadPages = function(pages){ //get page urls back
  // console.log(pages);

    $totalPages = pages.length;
    $loadedPages = 0;
    $pages = pages;

    var $href  = $pages[0];

   
     history.pushState({}, '', $href); //push the parent url
    // setNavState($href); //set the nav state to parent
    var $loadPage=0;
    
    if(!$firstLoad){
        $loadPage=1;
    }
     if($firstLoad && $pages.length > 1){ //if first load and more than one page, start at 2nd page down
        $href= $pages[1];
        $loadedPages++;
        $loadPage=1;
    }
     if($loadPage){
        loadPage($href); //load the parent page
     } else {
        $firstLoad=0;
        initLoadedPages();
}
   
}
renderPage = function(){
  // console.log('render page');
   if(!$firstLoad){
    if($initFullPageJS){
    $.fn.fullpage.destroy('all');
    }
   $($target).empty(); //if not first load empty the stage
  // console.log($target);
   }
        for(i=0;i<$loadedObjs.length;i++){
           //  console.log($loadedObjs[i])
            $($target).append($loadedObjs[i])

        }
        $firstLoad=0;
        $loadedObjs = [];
        initLoadedPages();
}

loadPage  = function(url){

    //first check if requested page HTML is in cache
    var $ajaxLoad=1;
    if($cache.length>0){
    $.each($cache, function( key, obj) {
      if(obj.url == url){
        $ajaxLoad=0;
         //page is in cache, get the HTML
      //   console.log('loading '+url+' form cache');
          $loadedObjs.push(obj.html);
          $loadedPages++;
           if($loadedPages < $totalPages){
                 var $url = $pages[$loadedPages];
                loadPage($url);
                } else {
                    renderPage()
                }
      } 
      });
} 

    if($ajaxLoad){
     //    console.log('loading '+url+' form ajax');
        //page HTML not in cache so load it via AJAX
        $.get(url)
        .done(function(data){
        // $.get(url, function(data){ 
              var $section = $(data).find($selector);
              $loadedObjs.push($section);
              $cache.push({url: url, html: $section});
              $loadedPages++;
                if($loadedPages < $totalPages){
                 var $url = $pages[$loadedPages];
                loadPage($url);
                } else {
                    renderPage()
                }
         });
    }
}


//after all section pages have loaded, init fullpage.js and other plugins.
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
        touchSensitivity: 10,
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

if($('#map').length){
    var $lat = $('#map').attr('data-lat'),
        $lng = $('#map').attr('data-lng');
$('#map').gmap({
        markers: [{'latitude': $lat,'longitude': $lng}],
        markerFile: $home_url+'/wp-content/themes/bowmanriley/images/marker.png',
        markerWidth:140,
        markerHeight:164,
        markerAnchorX:68,
        markerAnchorY:162
    });
}

    //owl carousel

    if($('.slider').length){
    var owl = $('.slider');
    owl.owlCarousel({
        autoplay: true,
        center: true,
        items:1,
        loop:true,
        margin:0,
        nav: true,
        navContainer: '.slider-container',
        responsive:{
            0:{
                nav: true,
                dotsEach: false,
                items:1
            }
        }
    });  
}
    

    //reposition sub navs
   // repositionSubNavs();
      $('main').removeClass('loading');
      $('#overlay').remove();

   //move page to requested anchor link
   if(location.hash){
    var $hash = location.hash.replace('#','');
    $.fn.fullpage.moveTo($hash,0);
    $.fn.fullpage.reBuild();
    }
}

// people button click actions

if(!isTouchDevice.any()){
$('body').on('click','.people-link',function(e){
    e.preventDefault();
    var $href = $(this).attr("href");
     //getPages($href,'aside','aside .inner');
     getPages($href);
})
} else {
    $('body').on('click', '.people-link.select', function(e) {
    e.preventDefault();
    $(this).removeClass('select').addClass('link');
    });
    $('body').on('click','.people-link.link',function(e){
    e.preventDefault();
    var $href = $(this).attr("href");
   // getPages($href,'aside','aside .inner');
    getPages($href);
    })
}

// page down arrow action

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
        $(this).addClass('hover');
        $('.sub-menu',$(this)).fadeIn(200);
    })
    $('#nav li.menu-item-has-children').bind('mouseleave',function(){
        $(this).removeClass('hover');
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
           // $.fn.fullpage.moveTo($index);
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
  



