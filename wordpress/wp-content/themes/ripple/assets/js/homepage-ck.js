// Add the video-container div
function resizeVideo(){var e=$("#video-area").height()-vid_padding*2,t=e*1.78,n=$("#primary").width();if(t>n){t=n;e=t/1.78;if(e>=max_height){e=max_height;t=max_height*1.78}}$("#video-area").width(n);$("#video-container").css("height",e+vid_padding*2+"px").css("width","100%").css("background","rgba(0, 0, 0, .85)");if($("#vimeo-player").length>0){$("#vimeo-player").height(e).width(t);$("iframe").height(e).width(t);$("#vimeo-player").css("margin-left",(n-t)/2).css("margin-right",(n-t)/2).css("padding-top",vid_padding).css("padding-bottom",vid_padding)}}function showAndPlayVideo(){$("#video-container").append('<div id="vimeo-player"><iframe src="//player.vimeo.com/video/73887321?autoplay=1" frameborder="0" height="100%" width="100%" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>');resizeVideo();$(".entry-content").fadeOut(400,function(){$("#video-container").fadeIn(400)})}function hideVideo(){$("#video-container").fadeOut(400,function(){$("#vimeo-player").remove();$(".entry-content").fadeIn(400)})}$("#video-area").append('<div id="video-container"></div>');$("#video-container").css("display","none");var vid_padding=20,max_height=$("#video-area").height()-vid_padding*2;$("#start-video").click(showAndPlayVideo);$("#video-container").click(hideVideo);$("#vimeo-player").click(function(e){e.stopPropagation()});$(window).resize(function(){resizeVideo()});