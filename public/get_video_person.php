<?php

//require(__DIR__ . "/../includes/config.php");

// ensure proper usage
if (empty($_GET["video"]))
{
    http_response_code(400);
    exit;
}

$our_video = ($_GET["video"]);

// then look it up by the name to get the video object
$video_object =

// get video's people
$people = $video_object->person;

// output articles as JSON (pretty-printed for debugging convenience)
header("Content-type: application/json");
// print(json_encode($articles, JSON_PRETTY_PRINT));
print(json_encode($people));

?>