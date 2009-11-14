<?php
/*
Plugin Name: Add tags to RSS feeds
Plugin URI: http://github.com/glasserc/
Description: Add links to the tags in each post
Version: 0.1
Author: Ethan Glasser-Camp
Author URI: http://travelogue.betacantrips.com/
*/

/*  Copyright 2009  Ethan Glasser-Camp  (email : ethan@betacantrips.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_filter("get_the_generator_atom", "tags_in_feeds_is_atom", 8);
add_filter("get_the_generator_rss2", "tags_in_feeds_is_rss2", 8);
add_filter("the_content", "tags_in_feeds_filter_the_content", 0);

$TYPE = null;
function tags_in_feeds_is_atom($data){
  global $TYPE;
  $TYPE = 'atom';
  return $data;
}

function tags_in_feeds_is_rss2($data){
  global $TYPE;
  $TYPE = 'rss2';
  return $data;
}

function tags_in_feeds_filter_the_content($data){
  global $TYPE;
  if($TYPE == null) return $data;
  $post = get_post(get_the_ID());
  $terms = get_the_tags();
  if(!$terms) return $data;

  $tags_array = array();
  foreach($terms as $tag){
    $tags_array[] = "<a href='" . get_tag_link($tag) . "'>" . $tag->name . "</a>";
  }
  $tags_html = "<p>Filed under: " . implode(', ', $tags_array)  . "</p>";
  return $tags_html . $data;
}
