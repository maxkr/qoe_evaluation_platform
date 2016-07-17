/**
 * Created by maximilian on 23.05.16.
 */
function Metrics() {
    this.startupTimeBegin = 0;
    this.startupTimeEnd = -1;
    /* time until playback start */
    this.getStartupTime = function(){
        return this.startupTimeEnd - this.startupTimeBegin;
    };
    /* the type of player used in this specific evaluation run */
    this.playerType = "noPlayerSet";
    this.setPlayerType = function(type){
        this.playerType = type;
    };
    this.getPlayerType = function(){
        return this.playerType;
    };
    /* browser fingerprint */
    this.fingerprint = "";
    this.setFingerprint = function(fp){
        this.fingerprint = fp;
    };
    this.getFingerprint = function(){
        return this.fingerprint;
    };
    /* number of browser focus changes */
    this.bfchange = 0;
    this.getBFChange = function(){
        return this.bfchange;
    };
    this.setBFChange = function(n){
        this.bfchange = n;
    };
    this.incBFChange = function(){
        this.bfchange++;
    };
    /* fullscreen flag */
    this.fullscreen = "";
    this.setFullscreen = function(isFullscreen){
        this.fullscreen = isFullscreen;
    };
    this.getFullscreen = function(){
        return this.fullscreen;
    };
    /* number of pauses */
    this.pauses = [];
    this.addPause = function(duration){
        this.pauses.push(duration);
    };
    this.getPauses = function(){
        return this.pauses;
    };
    /* number of stalls */
    this.stalls = [];
    this.addStall = function(duration){
        this.stalls.push(duration);
    };
    this.getStalls = function(){
        return this.stalls;
    };
    /* buffer levels at discrete time points */
    this.buffer = [];
    this.getBufferLevels = function(){
        return this.buffer;
    };
    this.pushBufferLevel = function(level){
        this.buffer.push(level);
    };
    /* guessed Bandwith at discrete time points */
    this.guessedBw = [];
    this.getGuessedBw = function(){
        return this.guessedBw;
    };
    this.pushGuessedBw = function(gbw){
        this.guessedBw.push(gbw);
    };
    /* chosen representations at discrete time points */
    this.representationBw = [];
    this.getRepresentationBw = function(){
        return this.representationBw;
    };
    this.pushRepresentationBw = function(rbw){
        this.representationBw.push(rbw);
    };
    /* time for measurement of representation; buffer and bandwith estimation */
    this.times = [];
    this.pushVideoTime = function(time){
        this.times.push(time);
    };
    this.getVideoTime = function(){
        return this.times;
    };
    this.rateChanges = 0;
    this.incRateChanges = function(){
        this.rateChanges++;
    };
    this.getRateChanges = function(){
        return this.rateChanges;
    };
    this.userRating = 0;
    this.setuserRating = function(userRating) {
        this.userRating = userRating;
    };
    this.getuserRating = function() {
        return this.userRating;
    }
    
    this.reset = function(){
        this.startupTimeBegin   = 0;
        this.startupTimeEnd     = -1;
        this.playerType         = "noPlayerSet";
        this.fingerprint        = "";
        this.bfchange           = 0;
        this.fullscreen         = "";
        this.pauses             = [];
        this.stalls             = [];
        this.buffer             = [];
        this.guessedBw          = [];
        this.representationBw   = [];
        this.times              = [];
        this.rateChanges        = 0;
        this.userRating         = 0;
    }
};
