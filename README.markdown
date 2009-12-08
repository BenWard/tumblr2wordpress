# Tumblr2Wordpress

Tumblr2Wordpress is a PHP script to take posts from Tumblr and export them in
the extended RSS format that Wordpress uses for full-data input/export.

It allows you to take your posts, categories and tags from Tumblr and move
them to Wordpress. Some amount of configuration of publication state and post
state is supported, as well as control over processing of Markdown syntax
on the Tumblr side.

Tumblr2Wordpress is a project by Hao Chen <http://haochen.me/>, and you can
find the core development at <http://code.google.com/p/tumblr2wordpress/>.

This work is licensed under the GPL v3 <http://www.gnu.org/licenses/gpl.html>

## Change Log

### Version 0.3-benward

  * Forked <http://code.google.com/p/tumblr2wordpress/>
  * Added configuration options for Tumblr `filter` — allows Markdown to be
    maintained rather than processed into HTML.
  * Added configuration option to choose generation of permalinks in export
    file. Now generates simple /12345678 (ID) slugs by default, but can choose
    to include the Tumblr-esque long-text forms instead.
  * Included a combined slug form, with both the ID and text for those wanting
    to map the post IDs in URLs, whist keeping the 'friendly' URL text.
  * Added configuration options for enable/disable comments, pings in the
    Wordpress export file.
  * Added configuration option to set the default publish state of the posts
    in the Wordpress export file.
  * Refactored the input page mark-up. HTML5, richer form semantics.
  * Refactored the RSS output. No-longer repeats XML elements that are the
    same for all post types.
  * Improved the output mark-up for conversation posts. Now uses `<cite>` and
    `<q>`, rather than `<strong>` and nothing.
  * Improved the output mark-up for quotes. Quotes is now wrapped in a
    `<blockquote>` element.
  * Page header now includes project details, shared author attribution,
    and so forth.
  * Added inline help documentation for why fixing your redirects is useful.
  * Added a parser to try and extract meaningful post titles where possible.
    Will take the first heading from early in the content if available, else
    will return empty titles.
  * BUGFIX: Captions were not being included for video files.
  * BUGFIX: Audio links now have text 'Audio'. Caption follows below. This
    prevents nesting problems if the caption itself contains links elsewhere,
    or block elements.
  * Including Markdown processor to handle mark-up of conversations and title-
    extraction.
  * Links are prefixed with "Link:", to differentiate the content from post
    titles. Wordpress will (by default) always link to the new posts
    permalink from the title.

## Known Issues

  * Doesn't support Tumblr's new multiple-photos-per-post feature
  * Wordpress.com does not import the HTML5 `<audio>` element
  * Wordpress.com does not import any `<embed>` or `<object>` mark-up for videos.