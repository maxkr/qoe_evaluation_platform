/**
 * Created by maximilian on 23.05.16.
 */
var metrics = {
    startupTimeBegin : 0,
    startupTimeEnd : -1,
    /* time until playback start */
    getStartupTime: function(){
        return this.startupTimeEnd - this.startupTimeBegin;
    },
    /* the type of player used in this specific evaluation run */
    playerType: "noPlayer",
    setPlayerType: function(type){
        this.playerType = type;
    },
    getPlayerType: function(){
        return this.playerType;
    },
    /* browser fingerprint */
    fingerprint: "",
    setFingerprint: function(fp){
        this.fingerprint = fp;
    },
    getFingerprint: function(){
        return this.fingerprint;
    },
    /* number of browser focus changes */
    bfchange: 0,
    getBFChange: function(){
        return this.bfchange;
    },
    setBFChange: function(n){
        this.bfchange = n;
    },
    incBFChange: function(){
        this.bfchange++;
    },
    /* fullscreen flag */
    fullscreen: "",
    setFullscreen: function(isFullscreen){
        this.fullscreen = isFullscreen;
    },
    getFullscreen: function(){
        return this.fullscreen;
    },
    /* number of pauses */
    pauses: [],
    addPause: function(duration){
        this.pauses.push(duration);
    },
    getPauses: function(){
        return this.pauses;
    },
    /* number of stalls */
    stalls: [],
    addStall: function(duration){
        this.stalls.push(duration);
    },
    getStalls: function(){
        return this.stalls;
    },
    /* buffer levels at discrete time points */
    buffer: [],
    getBufferLevels: function(){
        return this.buffer;
    },
    pushBufferLevel: function(level){
        this.buffer.push(level);
    },
    /* guessed Bandwith at discrete time points */
    guessedBw: [],
    getGuessedBw: function(){
        return this.guessedBw;
    },
    pushGuessedBw: function(gbw){
        this.guessedBw.push(gbw);
    },
    /* chosen representations at discrete time points */
    representationBw: [],
    getRepresentationBw: function(){
        return this.representationBw;
    },
    pushRepresentationBw: function(rbw){
        this.representationBw.push(rbw);
    },
    /* time for measurement of representation, buffer and bandwith estimation */
    times: [],
    pushVideoTime: function(time){
        this.times.push(time);
    },
    getVideoTime: function(){
        return this.times;
    },
    rateChanges: 0,
    incRateChanges: function(){
        rateChanges++;
    },
    getRateChanges: function(){
        return rateChanges;
    },
};
