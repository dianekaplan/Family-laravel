// execute when the DOM is fully loaded

$(function() {

// Used by the media link partial for the modal popup
// Get the modal
    var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
    var images = document.getElementsByClassName("img_popup");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");

    var this_caption;
    var this_image;
    var person_list = "";

    var i;
    for (i = 0; i < images.length; i++) {
        images[i].onmouseenter = function () {
            modal.style.display = "block";
            this_image = $(this).attr('data-image-id');
            var parameters = {image: this_image};

            $.getJSON("/image/list/" + this_image, function () {
                console.log(parameters);
            })
                .done(function (people, textStatus, jqXHR) {
                    if (people.length === 0) {
                        console.log("no people associated with this image");
                        this_caption = "<b>Featuring:</b> <br/>";
                        this_caption = this_caption + "(no people associations)";
                        captionText.innerHTML = this_caption;
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
            captionText.innerHTML = "<b>Featuring:</b>";  // this line resets default to show before list is ready
            person_list = ""; // this line prevents the list from being additive as you hover
        }


        images[i].onmouseout = function(){
                modal.style.display = "none";
            }
    }
});

