/**
 * Created by zeitgeist on 18.07.2016.
 */

var metrics             = new Metrics();

var paused = false;
var pausedTime = 0;
var stalled = false;
var stalledTime = 0;

/* log browser focus */
window.onfocus = function(){
    metrics.incBFChange();
}
window.onblur = function(){
    metrics.incBFChange();
}



var loopcount = 0;
var totalContentCount = Object.keys(evalContents).length;

function contentLoop() {
    var currentContent = evalContents[Object.keys(evalContents)[loopcount]];
    playUntil(currentContent,showSlider, mediaEnded);
}

function playUntil(content, showSlider, mediaEnded) {
    metrics.startupTimeBegin = Date.now();
    metrics.setFullscreen(isFullscreen());
    metrics.setFingerprint(new Fingerprint().get());
    setupBDPlayer(content, showSlider, mediaEnded)
}

function mediaEnded(content) {
    saveMetrics(content);
    loopcount++;
    $("#qoeSlider").hide();
    $("#ex1").slider('destroy');
    metrics.reset();
    if(loopcount < totalContentCount) {
        contentLoop();
    }else{
        window.location.replace(window.location.origin
            + "/evaluation/"
            + evaluationId
        + "/postQuestions");
    }
}

function saveMetrics(content) {
    evalContentMetrics = null;
    evalContentMetrics = {
        fullscreen:             metrics.getFullscreen(),
        playerType:             metrics.getPlayerType(),
        bfchange:               metrics.getBFChange(),
        fingerprint:            metrics.getFingerprint(),
        buffer:                 genCSV(metrics.getBufferLevels(), ";"),
        guessedBw:              genCSV(metrics.getGuessedBw(), ";"),
        representationBitrate:  genCSV(metrics.getRepresentationBw(), ";"),
        videoTimes:             genCSV(metrics.getVideoTime(), ";"),
        startupTime:            metrics.getStartupTime(),
        pauses:                 genCSV(metrics.getPauses(), ";"),
        stalls:                 genCSV(metrics.getStalls(), ";"),
        userRating:             $("#ex1").slider('getValue')
    }

    var metricsUrl = window.location.origin
        + "/evaluation/"
        + evaluationId
        + "/content/"
        + content.id;

    $.ajax(
        {	url: metricsUrl,
            method:'POST',
            dataType: 'json',
            data: JSON.stringify(evalContentMetrics)
        })
        .done(function(data)
        {
            console.log("Storing metrics...");
//                        console.log(data);
        })
        .fail(function(data)
        {
            console.log("problems handling metrics result...");
//                        console.log(data);
        });
}

function showSlider(content, mediaEnded) {

    $("#video").hide();
    $("#qoeSlider").show();

    $('#ex1').attr({
        "data-slider-min"   : content.ratingLowerBound,
        "data-slider-max"   : content.ratingUpperBound
    });

    $('#ex1').slider();

    setTimeout(mediaEnded,(content.ratingTime * 1000), content);
}

contentLoop();