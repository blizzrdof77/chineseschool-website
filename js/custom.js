function changeLink(linkname)  { document.getElementById('normal-view').href = linkname; }

function hideDiv(pass) { 
  var divs = document.getElementsByTagName('div'); 
  for(i=0;i<divs.length;i++) { 
    if(divs[i].id.match(pass)) {//if they are 'see' divs 
      if (document.getElementById) { // DOM3 = IE5, NS6 
        divs[i].style.opactity="0";// show/hide 
        divs[i].style.visibility="hidden";// show/hide 
        divs[i].style.display="none";// show/hide 
      }
    }
  }
}

function showDiv(pass) { 
  var divs = document.getElementsByTagName('div'); 
  for(i=0;i<divs.length;i++){ 
    if(divs[i].id.match(pass)){ 
      if (document.getElementById) { 
        divs[i].style.visibility="visible";
        divs[i].style.display="block";
        divs[i].style.opacity="1";
      }
      else  { }
    } 
  } 
} 

function initVideoSlider() {
  $("#video-scroll .next").click(function() {
    if( $(".current").hasClass("last")) {
      $("#video-scroll .last").fadeOut("slow").removeClass("current");
      $("#video-scroll .first").addClass("current").fadeIn("slow");
    } else {
      $(".current").removeClass("current").next().addClass("current").hide().fadeIn("slow");
    }
  });
  $("#video-scroll .prev").click(function() {
    if( $(".current").hasClass("first")) {
      $("#video-scroll .first").fadeOut("slow").removeClass("current");
      $("#video-scroll .last").fadeIn("slow").addClass("current");
    } else {
      $(".current").removeClass("current").prev().addClass("current").hide().fadeIn("slow");
    }
  });
}

// Called by Adapt.js
function myCallback(i, height) {
  // Alias HTML tag.
  var html = document.documentElement;
  // Find all instances of range_NUMBER and kill 'em.
  html.className = html.className.replace(/(\s+)?range_\d/g, '');
  // Check for valid range.
  if (i > -1) {
    // Add class="range_NUMBER"
    html.className += ' range_' + i;
  }
  // Note: Not making use of width here, but I'm sure
  // you could think of an interesting way to use it.
}

// Edit to suit your needs.
var ADAPT_CONFIG = {
  // false = Only run once, when page first loads.
  // true = Change on window resize and page tilt.
  dynamic: true,

  // Optional callback... myCallback(i, width)
  callback: myCallback,

  // First range entry is the minimum.
  // Last range entry is the maximum.
  // Separate ranges by "to" keyword.
  range: [
  '0 to 640',
  '640 to 660',
  '660 to 680',
  '680 to 700',
  '700 to 1920',
  '1920'
  ]
};

$(document).keyup(function(e) {
  // Close overlay/shadowbox with escape key
  if (e.keyCode == 27) { 
    hideDiv('password-form');
  }

});

function customCloseOverlay () {
  $("#link-shows").click( function () {
    $('link[href="styles/shadowbox.css"]').attr('href','styles/shadowbox-custom.css');
  });
  $("#link-music").click( function () {
    $('link[href="styles/shadowbox.css"]').attr('href','styles/shadowbox-custom.css');
  });
  $("#link-videos").click( function () {
    $('link[href="styles/shadowbox-custom.css"]').attr('href','styles/shadowbox.css');
  });
  $("#link-contact").click( function () {
    $('link[href="styles/shadowbox-custom.css"]').attr('href','styles/shadowbox.css');
  });
$("#link-photos").click( function () {
    $('link[href="styles/shadowbox-custom.css"]').attr('href','styles/shadowbox.css');
  });   
}

$(function () {
  initVideoSlider();
  customCloseOverlay();
});