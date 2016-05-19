/**
 * Created by maximilian on 19.05.16.
 */


var config = {
    key: 'b231b798-1270-4542-b310-a632825d3783',
    playback: {
        autoplay: true
    },
    source: {
        dash: 'http://www.bok.net/dash/tears_of_steel/cleartext/stream.mpd'
    }
};

var bdplayer = bitdash("video");
bdplayer.setup(config).then(function(value) {
    //Success
}, function(reason) {
    //Error!
});
