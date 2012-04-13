$.fn.cycle.transitions.scrollHorzJK = function($cont, $slides, opts) { 
    $cont.css('overflow','hidden').width();
	opts.before.push(function(curr, next, opts, fwd) {
		if (opts.rev)
			fwd = !fwd;
		jkReset(curr,next,opts);
		opts.cssBefore.left = fwd ? (next.cycleW-1) : (1-next.cycleW);
		opts.animOut.left = fwd ? -curr.cycleW : curr.cycleW;
	});
	opts.cssFirst.left = 0;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
	opts.animOut.top = 0;
};

jkReset = function(curr,next,opts,w,h,rev) {
	//$(opts.elements).not(curr).hide();
	if (typeof opts.cssBefore.opacity == 'undefined')
		opts.cssBefore.opacity = 1;
	opts.cssBefore.display = 'block';
	if (opts.slideResize && w !== false && next.cycleW > 0)
		opts.cssBefore.width = next.cycleW;
	if (opts.slideResize && h !== false && next.cycleH > 0)
		opts.cssBefore.height = next.cycleH;
	opts.cssAfter = opts.cssAfter || {};
	//opts.cssAfter.display = 'none';
	$(curr).css('zIndex',opts.slideCount + (rev === true ? 1 : 0));
	$(next).css('zIndex',opts.slideCount + (rev === true ? 0 : 1));
};


var videos= [];
	//console.log('start');
	//var tag = document.createElement('script');
	//tag.src = "http://www.youtube.com/player_api";
	//var firstScriptTag = document.getElementsByTagName('script')[0];
	//firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	
	// 3. This function creates an <iframe> (and YouTube player)
	//    after the API code downloads.
	function videosReady(){
		//console.log(videos);
		for (i = 0; i < videos.length; i++){
			
			
			var params = { allowScriptAccess: "always" };
			var atts = { id: videos[i] };
			swfobject.embedSWF("http://www.youtube.com/v/"+videos[i]+"?enablejsapi=1&playerapiid="+videos[i]+"&version=3",
							   videos[i], "460", "264", "8", null, null, params, atts);	
				
			
		/*	player = new YT.Player(videos[i], {
				width: '460',
				height: '264',
				videoId: videos[i],
				events: {
				'onReady': onPlayerReady,
				'onStateChange': onPlayerStateChange
				}*/
		};
	}
	function onYouTubePlayerReady(playerId) {
		//console.log("API");
		//console.log(playerId);
		var ytplayer = document.getElementById(playerId);
		ytplayer.addEventListener("onStateChange", "onPlayerStateChange");		
	
	
	}
	
	var playing = false;
	
	function onPlayerStateChange(status) {
		//console.log("change", status);
		if (status != -1 && status != 0 && status != 5){
			$('#slideshow').cycle('pause');
			playing = true;
		}
		
		if (status == 0){
			setTimeout(function(){
				$('#slideshow').cycle('resume');
				playing = false;
			}, 3000);
		}
	}
	
	
	
	$(document).ready(function() {
		$("#slideshow").cycle({ 
			fx:      'scrollHorzJK', 
			speed:    600, 
			timeout:  4000,
			prev: '.prev',
			next: '.next',
			pager: '.pager',
			pagerAnchorBuilder: function(idx, slide) { 
				return '<li><a href="#"></a></li>'; 
			},
			cssAfter: {display:'block'},
			cssBefore: {display:'block'}
		});
		
		
		$("#slideshow").on('mouseenter.ss', function(){
			
			//console.log("in");
			$('#slideshow').cycle('pause');
			
		}).on('mouseleave.ss', function(){
			
			//console.log("out");
			
			if (!playing){
				$('#slideshow').cycle('resume');
			}
			
		});
	   
	});
	