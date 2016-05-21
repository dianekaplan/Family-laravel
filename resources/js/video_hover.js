// execute when the DOM is fully loaded

$(function() {

// Used by the media link partial for the modal popup
// Get the modal
    var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
//    var videos = document.getElementsByClassName('img-thumbnail');
    var videos = document.getElementsByClassName('popup');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");

    var this_caption;
    var this_video;
    var person_list = "";

    var i;
    for (i = 0; i < videos.length; i++) {
        //videos[i].onmouseover = function(){
        videos[i].onmouseenter = function () {
            modal.style.display = "block";
            this_video = $(this).attr('data-video-id');
            var parameters = {video: this_video};

            $.getJSON("/video/list/" + this_video, function () {
                console.log(parameters);
            })
                .done(function (people, textStatus, jqXHR) {
                    if (people.length === 0) {
                        console.log("no people associated with this video");
                    }
                    else {
                        for (i = 0; i < people.length; i++) {
                            person_list += people[i].first + " " + people[i].last + "<br/>";
                        }
                        this_caption = "<b>Featuring:</b> <br/>";
                        this_caption = this_caption + person_list;
                        captionText.innerHTML = this_caption;
                    }
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    // log error to browser's console
                    console.log(errorThrown.toString());
                });

            // Clear out list at the end
            person_list = "";
        }


        videos[i].onmouseout = function(){
                modal.style.display = "none";
            }
    }
});

