var arVersion = navigator.appVersion.split("MSIE");
var version = parseFloat(arVersion[1]);

jQuery(function( $ ){
	/**
	 * Demo binding and preparation, no need to read this part
	 */
		//borrowed from jQuery easing plugin
		//http://gsgd.co.uk/sandbox/jquery.easing.php
		$.easing.elasout = function(x, t, b, c, d) {
			var s=1.70158;var p=0;var a=c;
			if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
			if (a < Math.abs(c)) { a=c; var s=p/4; }
			else var s = p/(2*Math.PI) * Math.asin (c/a);
			return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
		};
		
		//just for the example, to stop the click on the links.
		$('#nav').click(function(e){
			e.preventDefault();
			var link = e.target;
			link.blur();
			if( link.title )
				$(this).parent().find('span.message').text(link.title);
		});
		$('.home_link').click(function(e){
			e.preventDefault();
			var link = e.target;
			link.blur();
			if( link.title )
				$(this).parent().find('span.message').text(link.title);
		});
	
	//by default, the scroll is only done vertically ('y'), change it to both.
	$.scrollTo.defaults.axis = 'xy';
	//this one is important, many browsers don't reset scroll on refreshes
	$('#content').scrollTo( 0 );//reset all scrollable panes to (0,0)
	$.scrollTo( 0 );//reset the screen to (0,0)
	
	
	if(version >= 5.5 && version <= 7){
		//Target examples bindings
		var $paneTarget = $('#scroll_container');
	} else {
		//Target examples bindings
		var $paneTarget = $('#scroll_container');	
	}
	
	if(version >= 5.5 && version <= 6){
	
  	$('#link_1').click(function(){
  		$("#menu").hide();
  		$("#positioner_ls").hide();
      $paneTarget.stop().scrollTo( {top: '0px' , left: '0px' }, 800 );
      setTimeout('$("#menu").show("slow");', 800);
      setTimeout('$("#positioner_ls").show("slow");', 800);
  	});
    
    $('#link_2').click(function(){
      var link2_left = $("#menu").width() + 1 + 'px';
      $("#menu").hide();
      $("#positioner_ls").hide();
  		$paneTarget.stop().scrollTo( {top: '990px' , left: link2_left }, 800 );
  		setTimeout('$("#menu").show("slow");', 800);
  		setTimeout('$("#positioner_ls").show("slow");', 800);
  	});
  	
  	$('#link_3').click(function(){
      $("#menu").hide();
      $("#positioner_ls").hide();
      var link3_left = $("#menu").width() * 2 + 2 + 'px';
  		$paneTarget.stop().scrollTo( {top: '165px' , left: link3_left }, 800 );
  		setTimeout('$("#menu").show("slow");', 800);
  		setTimeout('$("#positioner_ls").show("slow");', 800);
  	});
  
  	$('#link_4').click(function(){
      $("#menu").hide();
      $("#positioner_ls").hide();
      var link4_left = $("#menu").width() * 3 + 3 + 'px';
  		$paneTarget.stop().scrollTo( {top: '1469px' , left: link4_left }, 800 );
  		setTimeout('$("#menu").show("slow");', 800);
  		setTimeout('$("#positioner_ls").show("slow");', 800);
  	});
    
    $('#link_5').click(function(){
      $("#menu").hide();
      $("#positioner_ls").hide();
      var link5_left = $("#menu").width() * 4 + 4 + 'px';
  		$paneTarget.stop().scrollTo( {top: '440px' , left: link5_left }, 800 );
  		setTimeout('$("#menu").show("slow");', 800);
  		setTimeout('$("#positioner_ls").show("slow");', 800);
  	});
    
    $('#link_6').click(function(){
      $("#menu").hide();
      $("#positioner_ls").hide();
      var link6_left = $("#menu").width() * 5 + 5 + 'px';
  		$paneTarget.stop().scrollTo( {top: '1265px' , left: link6_left }, 800 );
  		setTimeout('$("#menu").show("slow");', 800);
  		setTimeout('$("#positioner_ls").show("slow");', 800);
  	});			
  	
  	$('.home_link').click(function(){
      $("#menu").hide();
      $("#positioner_ls").hide();
  		$paneTarget.stop().scrollTo( {top: '0px' , left: '0px' }, 800 );
  		setTimeout('$("#menu").show("slow");', 800);
  		setTimeout('$("#positioner_ls").show("slow");', 800);
  	});
  	
  } else {
  
    $('#link_1').click(function(){
  		$paneTarget.stop().scrollTo( {top: '0px' , left: '0px' }, 800 );
  	});
    
    $('#link_2').click(function(){
      var link2_left = $("#menu").width() + 1 + 'px';
  		$paneTarget.stop().scrollTo( {top: '990px' , left: link2_left } , 800 );
  	});
  	
  	$('#link_3').click(function(){
      var link3_left = $("#menu").width() * 2 + 2 + 'px';
  		$paneTarget.stop().scrollTo( {top: '165px' , left: link3_left }, 800 );
  	});
  
  	$('#link_4').click(function(){
      var link4_left = $("#menu").width() * 3 + 3 + 'px';
  		$paneTarget.stop().scrollTo( {top: '1469px' , left: link4_left }, 800 );
  	});
    
    $('#link_5').click(function(){
      var link5_left = $("#menu").width() * 4 + 4 + 'px';
  		$paneTarget.stop().scrollTo( {top: '440px' , left: link5_left }, 800 );
  	});
    
    $('#link_6').click(function(){
      var link6_left = $("#menu").width() * 5 + 5 + 'px';
  		$paneTarget.stop().scrollTo( {top: '1265px' , left: link6_left }, 800 );
  	});
  
    $('.home_link').click(function(){
  		$paneTarget.stop().scrollTo( {top: '0px' , left: '0px' }, 800 );
  	});
  }
	
});