// Add the video-container div
        $("#video-area").append('<div id="video-container"></div>');
        $("#video-container").css("display", "none")

        var vid_padding = 20;
        var max_height = $("#video-area").height() - (vid_padding * 2);

        function resizeVideo () {
            // Determine dimensions of vimeo iframe
            var vid_height = $("#video-area").height() - (vid_padding * 2);
            var vid_width = vid_height * 1.78; // $("#primary").width();
            var primary_width = $("#primary").width();
            if (vid_width > primary_width) {
                vid_width = primary_width;
                vid_height = vid_width / 1.78;

                if (vid_height >= max_height) {
                    vid_height = max_height;
                    vid_width = max_height * 1.78;
                }
            }

            // Resize the video container and black background
            $("#video-area").width(primary_width);
            $("#video-container").css("height", (vid_height + (vid_padding * 2)) +  "px")
                .css("width", "100%")
                .css("background", "rgba(0, 0, 0, .85)");

            if ($("#vimeo-player").length > 0) {
                // Resize the video player div and the iframe
                $("#vimeo-player")
                    .height(vid_height)
                    .width(vid_width);
                $("iframe").height(vid_height)
                    .width(vid_width);
                $("#vimeo-player")
                    .css("margin-left", (primary_width - vid_width) / 2)
                    .css("margin-right", (primary_width - vid_width) / 2)
                    .css("padding-top", vid_padding)
                    .css("padding-bottom", vid_padding);
            }
        }


        // When the user clicks the start-video button, show and play the video
        $('#start-video').click(showAndPlayVideo);

        // When user clicks the black outside of the video, close the video
        $("#video-container").click(hideVideo);
        $("#vimeo-player").click(function(e){
            e.stopPropagation();
        });

        // Insert the video-player div and iframe
        // fade out the text and fade in the video
        function showAndPlayVideo () {
            // Insert the vimeo-player iframe into the video-container
            $("#video-container").append('<div id="vimeo-player"><iframe src="//player.vimeo.com/video/73887321?autoplay=1" frameborder="0" height="100%" width="100%" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>');
            resizeVideo();

            $('.entry-content').fadeOut(400, function(){
                $('#video-container').fadeIn(400);
            });
        }

        // Remove the video player and fade back in the text
        function hideVideo () {
            $('#video-container').fadeOut(400, function(){
                $("#vimeo-player").remove();
                $('.entry-content').fadeIn(400);
            });
        }

        // Resize the video player if the user resizes the window
        $(window).resize(function(){
            resizeVideo();
        });