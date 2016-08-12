$(document).ready(function(){

    // Get IP data
    $.getJSON("http://ip-api.com/json/?callback=?", function(data){
        $("#country").text(data.country);
        $("#country-code").text(data.countryCode);
        $("#region").text(data.regionName);
        $("#region-code").text(data.region);
        $("#city").text(data.city);
        $("#zip").text(data.zip);
        $("#lat").text(data.lat);
        $("#lon").text(data.lon);
        $("#query").text(data.query);
    });
    
});
