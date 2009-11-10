<?php

add_filter("get_the_generator_atom", "tags_in_feeds_is_atom", 8);
add_filter("get_the_generator_rss2", "tags_in_feeds_is_rss2", 8);
add_filter("get_the_content", "tags_in_feeds_filter_the_content", 0);

$TYPE = null;
function tags_in_feeds_is_atom($data){
  global $TYPE;
  $TYPE = 'atom';
  return $data;
}

function tags_in_feeds is_rss2($data){
  global $TYPE;
  $TYPE = 'rss2';
  return $data;
}

function tags_in_feeds_filter_the_content($data){
  global $TYPE, $post;
  if($TYPE == null) return $data;
  $tags = array();
  foreach($post->tags as $tag){
    $tags[] = "<a href=\"\">". $tag->name . "</a>";
  }
  $tags_html = "<p>Filed under: " . implode($tags, ",") . "</p>";
}
