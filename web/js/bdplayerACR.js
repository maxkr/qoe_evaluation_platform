/**
 * Created by maximilian on 19.05.16.
 */


function setupBDPlayer(content, showSlider, mediaEnded) {

    var bdplayer;
    var intervalId = -1;

    var mpdPath = content.path;
    var playbackOffset = content.playbackOffset;
    var playbackDuration = content.playbackDuration;

    var config = {
        key: 'b231b798-1270-4542-b310-a632825d3783',
        playback: {
            autoplay: true
        },
        source: {
            dash: mpdPath
        },
        style: {
          controls: false,
        },
        events      : {
            onPlay: function() {
                if(paused){
                    metrics.addPause(Date.now() - pausedTime);
                    paused = false;
                }
                if (intervalId < 0) {
                    intervalId = setInterval(pullMetrics, 250);
                }
                if(metrics.startupTimeEnd < 0){
                    metrics.startupTimeEnd = Date.now();
                }
            },
            onStartBuffering: function(){
                stalled = true;
                stalledTime = Date.now();
            },
            onStopBuffering: function(){
                if(stalled){
                    metrics.addStall(Date.now() - stalledTime);
                    stalled = false;
                }
            },onPause: function(){
                paused = true;
                pausedTime = Date.now();
            },
            onError: function() {},
            onReady: function() {
                if (playbackOffset > 0 ) {
                    bdplayer.seek(playbackOffset);
                }
            },
            onPlaybackFinished: function(e){},
        }
    }
    $("#video").show();
    bdplayer = bitdash("video");

    bdplayer.setup(config).then(function(value) {
        //Success
    }, function(reason) {
        //Error!
    });

    function pullMetrics() {
        if(playbackDuration < bdplayer.getCurrentTime()){ /* getCurrentTime in secs*/
            clearInterval(intervalId);
            bdplayer.destroy();
            showSlider(content, mediaEnded);
        }

        var requestWindow,
            downloadTimes,
            movingDownload,
            bandwidthValue,
            estBwVideo;

        metrics.pushVideoTime(bdplayer.getCurrentTime());
        metrics.pushBufferLevel(bdplayer.getVideoBufferLength());
        metrics.pushRepresentationBw(bdplayer.getPlaybackVideoData().bitrate);

        requestWindow = window.performance.getEntries()
            .slice(-20)
            .filter(function(req){return req.entryType == "resource" && !!req.duration && hasExtension(req.name, ['.m4s']);})
            .slice(-4);

        if (requestWindow.length > 0) {
            downloadTimes = requestWindow.map(function (req){return Math.abs(req.duration) / 1000;});

            movingDownload = {
                average: downloadTimes.reduce(function(l, r) {return l + r;}) / downloadTimes.length,
                high: downloadTimes.reduce(function(l, r) {return l < r ? r : l;}),
                low: downloadTimes.reduce(function(l, r) {return l < r ? l : r;}),
                count: downloadTimes.length
            };

            bandwidthValue = bdplayer.getDownloadedVideoData().bitrate;
            estBwVideo = Math.round( bandwidthValue / movingDownload.average);
            metrics.pushGuessedBw(estBwVideo);
        }
    }
}



