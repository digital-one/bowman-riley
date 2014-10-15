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
    $('#page-wrap').fullpage({
    	verticalCentered: false,
        resize : false,
    });


    var config1 = {
 	 "id": '345170787868762112',
  	"domId": 'twitter-feed',
  "maxTweets": 2,
  "enableLinks": true
};
twitterFetcher.fetch(config1);
});