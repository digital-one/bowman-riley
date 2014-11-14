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


$(".fancybox").fancybox();



//mobile menu
var isMobile = $(window).width() < 641,
    isDeviceSize = $(window).width() < 769,
    isMobileMenu = $(window).width() < 1200,
    mobileMenuIsActive = isMobileMenu ? true : false,
    $mobileMenuWidth = isMobile ? '80%' : '30%',
    $historyActive = Modernizr.history && !isMobile,
    $mobileMenuHandle = $('#mobile'),
    $navLinks = $('#nav ul a'),
    $parentLI = $('#nav li.menu-item-has-children,#nav li#menu-item-50'),
    $parentLinks =  $('#nav li > a:first-child'),
    $parentLIMobile = $('#nav li.menu-item-has-children'),
    $parentLinksMobile =  $('#nav li.menu-item-has-children > a:first-child'),
    $navPushStateLinks = $([]);
    $pushStateLinks = $('.case-study-link, #case-studies a.close, #news a.close,#our-people-sector a.close,#people-single a.close, a.news-link, .case-study-links .category-links a, a.push-link');
    $home_url = 'http://92.60.114.159/~bowmanriley/',
    $totalPages = 0,
    $loadedPages = 0,
    $cache = [],
    $sectionCache = [],
    $loadedObjs=[],
    $pages = [],
    $firstLoad=1,
    $target = 'main',
    $selector = '.section',
    $initFullPageJS=0; //counter to handle if fullpage js has already been called.
   
   
   
//console.log($('#nav li a:not(#nav li.menu-item-has-children > a:first-child)'));

var desktopDropDown = {
    activate: function() {
        $parentLI.bind('mouseenter',function(){
        $(this).addClass('hover');
        $('.sub-menu',$(this)).fadeIn(200);
        })
        $parentLI.bind('mouseleave',function(){
        $(this).removeClass('hover');
        $('.sub-menu',$(this)).fadeOut(100);
        })
    },
    deactivate: function() {
        $parentLI.unbind('mouseenter');
        $parentLI.unbind('mouseleave');
    }
  }

var mobileDropDown = {
  activate: function() {
    $parentLinksMobile.bind('click',toggleMobileDropDown);
  },
  deactivate: function(){
    $parentLinksMobile.unbind('click',toggleMobileDropDown);
  }
}

var firstSubMenuLink = {
    show: function(){
      $('.sub-menu').each(function(){
        $('li',$(this)).eq(0).show();
      })
    },
    hide: function(){
      $('.sub-menu').each(function(){
        $('li',$(this)).eq(0).hide();
      })
    }
}

var initPushStateLinks = {
  desktop: function(){
    $navPushStateLinks = $([])
    $navPushStateLinks = $('#nav ul a');
  },
  mobile: function(){
   $navPushStateLinks = $([])
  $('li.menu-item-has-children').each(function(){
    links = $("a:not(:eq(0))",$(this));
    links.each(function(){
      $.merge($navPushStateLinks,$(this));
    })
 })

  }
}

loaderPosition = function(){
  var $loaderHeight = $('#loader').outerHeight(),
      $loaderWidth = $('#loader').outerWidth(),
      $width = $(window).width(),
      $height = $(window).height(),
      $top = (($height/2) - ($loaderHeight/2)),
      $left = (($width/2) - ($loaderWidth/2));

      $('#loader').css({
        left: $left+'px',
        top: $top+'px'
      })
}

loader = function(status){
 // console.log(status);
  switch(status){
    case 'show':
   var $width = $(window).width(),
       $height = $(window).height(),
       $loaderHeight = 80,
       $loaderWidth = 80,
       $move = 50,
       $top = (($height/2) - ($loaderHeight/2)),
       $left = (($width/2) - ($loaderWidth/2)),
       $startPos = $top + $move;

 $('body').prepend('<div id="loader" />');
 $('#loader').css({
  top: $startPos+'px',
  left: $left
 })
 //animate loader
$('#loader').animate({
  top: $top,
  opacity: 1
},500);
//$(window).bind('resize', loaderPosition());
break;
case 'hide':
$('#loader').animate({
  opacity:0
},500,function(){
$(this).remove();
$('main').removeClass('loading');
$('#overlay').remove();
})
//$(window).unbind('resize', loaderPosition());
break;
}
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

setNavState = function(href){
  var $hash = location.hash;
    href = href.replace($hash,'');
            if(href==$home_url){
  $('header').removeAttr('style').addClass('front-page');
        animateLogo('up')
    } else {
        $('header').removeAttr('style').removeClass('front-page');
        animateLogo('down')
    }
    //update the nav state after url change or popstate
  $navLinks.parent('li').removeClass('current-menu-item');
    $navLinks.each(function(){
      if($(this).attr('href')==href){
            $(this).parent('li').addClass('current-menu-item');
        }
    })

}

getPages = function(url){
 

//if(console) console.log('get pages');
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
    loader('show');
    $loadedObjs=[];
    if(!isMobileMenu) setNavState(url);
    /*
    $target = 'main';
    $selector = '.section';
    if(target) $target = target;
    if(selector) $selector =  selector;
    */
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
    timeout: 10000,
    data: { url: url, firstLoad: $firstLoad} ,
    timeout: 1000,
    success: function(data) {
    //$pages = data;
    $sectionCache.push(data);
    loadPages(data);
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
        $('main').removeClass('loading');
        $('#overlay').remove();
        loader('hide');
    },
    complete: function(xhr, textStatus) {
    } 
    }); 
    }
}
}


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
  if(!$firstLoad){
    if($initFullPageJS){
    $.fn.fullpage.destroy('all');
    }
$('main').empty();
   }
        for(i=0;i<$loadedObjs.length;i++){
            $('main').append($loadedObjs[i])
        }
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

sendPushLink = function(e){
  e.preventDefault()
  $this = $(e.currentTarget);
  url = $this.attr('href');
  getPages(url);
}
//refresh the push state links click action
 refreshPushLinkActions = function(){
  //if(console) console.log('refresh push links');
  $navPushStateLinks.unbind('click', sendPushLink);
    $navPushStateLinks.bind('click',sendPushLink);
  /*$navPushStateLinks.bind('click',function(e){
      e.preventDefault();
      url = $(this).attr('href');
      getPages(url);
    });*/
 }

toggleMobileDropDown = function(e){
  e.preventDefault();
  var $this = $(e.target);
  if($this.parent('li').hasClass('hover')){
      $this.parent('li').removeClass('hover');
      $('.sub-menu',$this.parent('li')).hide();
  } else {
    $('#nav li.menu-item-has-children').removeClass('hover');
    $('#nav li.menu-item-has-children .sub-menu').hide();
      $this.parent('li').addClass('hover');
      $('.sub-menu',$this.parent('li')).slideDown(800,function(){
       //  $('.sub-menu').not($(this)).slideUp(200);
      });
  }
}
//if a link is clicked in sub menu, sets parent link to active
setParentLinkState = function(e){
    e.preventDefault();
  $('#nav li').removeClass('current-menu-item');

  var $this = $(e.currentTarget),
      $subMenu = $this.parents('.sub-menu'),
      $li = $subMenu.parent('li');
      //console.log($li);
      $li.addClass('current-menu-item');
}

setLinkState = function(e){
  e.preventDefault();
  $('#nav li').removeClass('current-menu-item');
   var $this = $(e.currentTarget)
   $this.parent('li').addClass('current-menu-item');
}
 
initMobileMenuActions = function(){
  $('#nav ul').hide();
  killDesktopMenuActions();
  killMobileMenuActions();
  mobileDropDown.activate();
   $navPushStateLinks.unbind('click', sendPushLink);
  initPushStateLinks.mobile();
  firstSubMenuLink.show();
  $mobileMenuHandle.bind('click',toggleMobileMenu);
  $('.sub-menu a').bind('click',setParentLinkState);

   
}

killMobileMenuActions = function(){
  mobileDropDown.deactivate();
 //  $($navPushStateLinks).unbind('click',closeMobileMenu);
  $mobileMenuHandle.unbind('click',toggleMobileMenu);
   $('.sub-menu a').unbind('click',setParentLinkState);
}

initDesktopMenuActions = function(){
  $('#nav ul:not(#nav ul.sub-menu)').show();
  killDesktopMenuActions();
  killMobileMenuActions();
 firstSubMenuLink.hide();
  $navPushStateLinks.unbind('click', sendPushLink);
 initPushStateLinks.desktop(); 
  if(mobileMenuIsActive) closeMobileMenu();
  desktopDropDown.activate();
  $parentLinks.bind('click',setLinkState);
  $('.sub-menu a').bind('click',setParentLinkState);
  
}

killDesktopMenuActions = function(){
   desktopDropDown.deactivate();
    $('.sub-menu a').unbind('click',setParentLinkState);
    $parentLinks.unbind('click',setLinkState);
}

toggleMobileMenu = function(e){
    var $this = $(e.currentTarget);
    if($this.hasClass('active')){
   $this.removeClass('active');
   $('#nav ul').hide();
   $('#nav a').removeClass('hover');
$('#page-wrap').animate({
    left: 0
    }, {
    duration: 400,
    easing: "easeOutQuad"
});
    } else {
        $this.addClass('active');
  $('#page-wrap').animate({
    left: $mobileMenuWidth
    }, {
    duration: 400,
    easing: "easeInQuad",
    complete: function(){
        $('#nav ul:not(#nav ul.sub-menu)').fadeIn(100);
    }
    });
 }

}
closeMobileMenu = function(){
   $('#nav ul').hide();
   $('#mobile').removeClass('active');
    $('#nav li').removeClass('hover');
  $('#page-wrap').animate({
    left: 0
    }, {
    duration: 2,
    easing: "easeOutQuad"
});
}

initMapDirectionsLink = function(){
  $('body').on('click','.directions-link',function(e){
    e.preventDefault();
    $('#map').attr('data-lat',$(this).attr('data-lat'));
    $('#map').attr('data-lng',$(this).attr('data-lng'));
    $('form#calculate-route').slideDown();
})
}

updateMenuActions = function(){
    isMobile = $(window).width() < 641,
    isDeviceSize = $(window).width() < 769,
    isMobileMenu = $(window).width() < 1200,
    $mobileMenuWidth = isMobile ? '80%' : '30%',
    mobileMenuIsActive = $mobileMenuHandle.hasClass('active'),
    $historyActive = Modernizr.history && !isMobile;

    if(!isMobileMenu){
      if(console)  console.log('desktop menu');
      initDesktopMenuActions();
    } else {
      if(console)  console.log('mobile menu');
      initMobileMenuActions();
    }
    if($historyActive) refreshPushLinkActions(); //if history, set up push link actions
}



 convertChildLinksToHash = function(){
  //$('a:not([href*=javascript]):not([href^=#])') ...
  var $subMenus = $('.sub-menu:not(#menu-item-50 .sub-menu):not(#menu-item-60 .sub-menu)');
  $subMenus.each(function(){
    var $submenu_links  = $('a:not(:first)',$(this))
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
  })
    
 }
 
 convertHomeChildLinksToHash = function(){
    var $home_submenu_links  =$('#menu-item-60 .sub-menu a:not(:first)');
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
 }

 removeHashLinks = function(){ //function to reset hash urls
   var $links = $('.sub-menu a');
   $links.each(function(){
    $(this).attr('href').replace('#','');
   })
 }

 caseStudyPushLinkHandler = function(e){
    e.preventDefault();
    $this = $(e.currentTarget);
     $('#case-studies-nav a').removeClass('current');
    $this.addClass('current');
    var $href = $this.attr("href");
    getPages($href);
 }

killCaseStudiesSubNav = function(){
$('body').unbind('click','#case-studies-nav a', caseStudyPushLinkHandler);
}

initCaseStudiesSubNav = function(){
 $('body').bind('click','#case-studies-nav a', caseStudyPushLinkHandler);
}

peoplePushLinkHandler = function(e){
  e.preventDefault();
  $this = $(e.currentTarget);
  $('#sub-nav.people-categories a').parent('li').removeClass('current-menu-item');
    $(this).parent('li').addClass('current-menu-item');
    var $href = $(this).attr("href");
     getPages($href);
}

killPeopleSubNav = function(){
$('body').unbind('click','#sub-nav.people-categories  a', peoplePushLinkHandler);
}


initPeopleSubNav = function(){
 $('body').bind('click','#sub-nav.people-categories  a', peoplePushLinkHandler);
}

initPeopleLinks = function(){
  if(!isTouchDevice.any()){
$('body').on('click','.people-link',function(e){
    e.preventDefault();
    var $href = $(this).attr("href");
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
    getPages($href);
    })
}
}

/*
killPopState = function(){
  $(window).unbind("popstate");
}

initPopState = function(){

  $(window).bind("popstate", function(event) {

     if(event.state==null){
      } else {
    var $url = location.href.replace(location.hash,'');
    if($url==$home_url){
         $url = $home_url;
    }
    getPages($url);
}
 });

  }
*/


initPopState = function(){
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
}



//function called by fullpage.js to update share links when hash changes or page is loading via AJAX
updateShareLinks = function(index){
  var $href = location.href,
      $section =  $('.fp-section').eq(index-1),
      $title = $section.attr('data-title');
      document.title = $title;
      $('#utility-nav a.share-twitter').attr('href',encodeURI('http://twitter.com/home?status='+$title+'+'+$href));
      $('#utility-nav a.share-facebook').attr('href',encodeURI('http://www.facebook.com/share.php?u='+$href+'&amp;title='+$title));
      $('#gform_3 .gform_hidden').val($href);
}

initTwitterFeed = function(){
 if($('#twitter-feed').length){ 
    var config1 = {
    "id": '532496073038630912',
    "domId": 'twitter-feed',
    "maxTweets": 2,
    "enableLinks": true
    };
    twitterFetcher.fetch(config1);
    }
}

initFullPageJS = function(){

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
         updateShareLinks(nextIndex);
         }
    });
    $initFullPageJS=1;
}

initFirstMap = function(){
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
}

initImageSliders  = function(){
  //init image slider
  if($('.slider').length){
$('.slider').unslick().slick({
  autoplay: true
});
}
}

scrollToAnchorPage = function(){
  //move page to requested anchor link
   if(location.hash){
    var $hash = location.hash.replace('#','');
    if($initFullPageJS>0){
    $.fn.fullpage.moveTo($hash,0);
    $.fn.fullpage.reBuild();
  }
    }
}

// page down arrow action
initPageDownArrowLink = function(){
  $('body').on('click', '.arrow-divide a',function(e){
    e.preventDefault();
    $.fn.fullpage.moveSectionDown();
})
}

initHistoryActions = function(){
       var $main = $('main'),
           $aside = $('aside'),
           $firstLoad = 1;

           //convert child link to hash urls
      convertChildLinksToHash();
      convertHomeChildLinksToHash();
      initCaseStudiesSubNav();
      initPeopleSubNav();
      initPopState();
      initPeopleLinks();
}

killHistoryActions = function(){
  removeHashLinks();
  killCaseStudiesSubNav();
  killPeopleSubNav();
  killPopState();
}


initLoadedPages = function(){ 
    initTwitterFeed();
    initFullPageJS();
    updateShareLinks(1); //update share links with first page permalink and title
    initFirstMap();
    initImageSliders();
    loader('hide'); //hide the loader
    $firstLoad=0;
    scrollToAnchorPage(); //move page to anchor link if hash in requested URL
    if(isMobileMenu) closeMobileMenu();
}

//on page load actions
updateMenuActions(); //set up menu actions
initMapDirectionsLink() //set up get directions link on map page
if($historyActive){
   getPages(location.href); //get first page load if history active
  initHistoryActions();
}
}); //closing on document ready

//on resize actions
$(window).on('resize',function(){
  updateMenuActions()
});

/*

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
  
*/


