/**
 * Created by maximilian on 23.05.16.
 */
var metricsUrl = window.location.origin + "/storeMetrics";

var metrics =
{
    'rumpfi' : 'hallo'
}

$.ajax(
    {	url: metricsUrl,
        method:'POST',
        data: metrics.getPostData()
    })
    .done(function(/*args vom server*/)
    {
        alert ("JUHU");
    })
    .fail(function(/*args vom server*/)
    {
        alert ("hot net hinghaut");
    });


var metrics =
{
    //....

    getPostData: function()
    {
        var postData = {};

        postData["fullscreen"] = this.getFullscreen();
        //-----

    }
}