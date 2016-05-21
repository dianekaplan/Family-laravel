/**
 * Created by Diane on 5/17/2016.
 */
/**
 * Created by Diane on 5/17/2016.
 */


/**
 * Adds marker for place to map.
 */
function addMarker(place)
{
    // grab the place's latitude & longitude and zip code
    var latlong = new google.maps.LatLng(place.latitude,
        place.longitude);
    var zip = place.postal_code;

    // muppet newsman marker
    var image = 'https://res.cloudinary.com/hnyiprajv/image/upload/c_scale,h_100/v1460332968/newsman.jpg';

    // create a new marker there
    var marker = new google.maps.Marker({
        position: latlong,
        map: map,
        icon: image
    });

    var contentString;
    var parameters = {
        geo: zip
    };

    $.getJSON("articles.php", parameters)
        .done(function(articles, textStatus, jqXHR) {

            // check if we got something, calling articles.php for this postal code
            if (articles.length === 0)
            {
                contentString = "No stories happening here";
            }
            else
            // if we did, make list of articles for popup
            {
                contentString = "<ul>";
                var template = _.template("<li><a href='<%- link %>' target='_blank'><%- title %></a></li>");

                for (var i = 0; i < articles.length; i++)
                {
                    //add article titles
                    contentString += template({link: articles[i].link, title: articles[i].title});
                }
                contentString += "</ul>";
            }

        })
        .fail(function(jqXHR, textStatus, errorThrown) {

            // log error to browser's console
            console.log(errorThrown.toString());
        });

    marker.addListener('click', function() {
        showInfo(marker, contentString);
    });

    // add it to our map
    marker.setMap(map);

    // add it to the global array of markers
    markers.push(marker);
}




/// and (in public) articles.php has:
// make get_video_person.php
<?php

    require(__DIR__ . "/../includes/config.php");

// ensure proper usage
if (empty($_GET["geo"]))
{
    http_response_code(400);
    exit;
}

// get geography's articles
$articles = lookup($_GET["geo"]);

// output articles as JSON (pretty-printed for debugging convenience)
header("Content-type: application/json");
// print(json_encode($articles, JSON_PRETTY_PRINT));
print(json_encode($articles));

?>