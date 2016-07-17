/**
 * Created by maximilian on 19.05.16.
 */


function setupBDPlayer(mpdPath, playbackOffset, playbackDuration, mediaEnded) {

    var bdplayer;
    var intervalId = -1;

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
            onReady: function() {},
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
            mediaEnded();
        }
    }
}



