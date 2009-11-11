=== tags-in-feeds ===
Contributors: Ethan Glasser-Camp
Tags: tags, rss, atom, feeds
Requires at least: 2.8.4

Adds some text to your feed items like: "Filed under tag1, tag2, tag3".

== Description ==

This is a simple plugin meant to make the crap dumped in rss2/atom
feeds a little more complete. I take care choosing the tags on my
posts; I want them to show up in the feeds.

A more thorough plugin would allow you to customize which things
showed up in your feeds -- possibly categories, possibly tags, who
knows what else?

N.B. this is a total hack that takes advantage of how RSS/Atom is
implemented in WP 2.8.4 or whatever I'm running. Basically, intercept
the calls that indicate what kind of feed it is, and then filter the
content to look like it has a "Filed under" block at the top. I expect
this plugin to stop working arbitrarily soon, at which point your
Wordpress install will probably start behaving extremely badly.

N.B. I couldn't find anything to intercept that would tell me if it
was "just" RSS (RSS 0.9), so this functionality probably won't work on
those feeds.

If you haven't yet gotten the idea that this is extremely sloppy work,
READ AGAIN. It would be more robust by far to rewrite the templates
for rss2/atom, but that way lies madness. If you want to take the idea
in this plugin and build something production-quality, get changes
merged upstream, whatever, PLEASE DO and PLEASE TELL ME because I'll
likely be your first user. This crap was thrown together because I
couldn't find anything useful in the Wordpress plugin directory.

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Check your Atom/RSS2 feeds to make sure tags are appearing in the "content" elements.




