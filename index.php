<?php

define(T2W_VERSION, '0.3-benward');

# Check for valid input
$username = isset($_REQUEST['username']) && !empty($_REQUEST['username']) ? $_REQUEST['username'] : '';

if(empty($username)): ?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
		<title>Tumblr2WordPress: Export Your Tumblr To WordPress</title>
		<style>
			body {
			    max-width: 40em;
			    font: 100%/150% Helvetica, Arial, sans-serif;
			}
			h1 {
			    font-size: 130%;
			    line-height: 150%;
			}
			dl {
			    font-size: 80%;
			}
			dt {
			    font-weight: bold;
			}
			form {
			    margin: 5px 0;
			    padding: 0;
			}
			fieldset {
			    border: 0;
			    -webkit-border-radius: 10px;
			    -moz-border-radius: 10px;
			    background-color: #eee;
			    background-image: -webkit-gradient(linear, left top, left bottom, from(#eee), to(#fff));
			    border: 3px #2D4261 solid;
			    padding: 5px 15px;
			}
			legend {
			    font-weight: bold;
			    padding-top: 2.5em;
			    margin-left: -2px;
			}
			fieldset ul {
			    list-style-type: none;
			    margin: 0;
			    padding: 0;
			}
			p.donate {
			    font-size: 80%;
			}
		</style>
	</head>
	<body>
		<h1>Tumblr2WordPress: Export Your Tumblr to WordPress</h1>
		<dl>
			<dt>Version</dt>
			<dd><?php echo T2W_VERSION ?></dd>
			<dt>Author</dt>
			<dd class="vcard">
			    Originally by
			    <a class="fn url" href="http://haochen.me/">Hao Chen</a>
			</dd>
			<dd class="vcard">
			    This version by
			    <a class="fn url" href="http://benward.me">Ben Ward</a>
			</dd>
			<dt>License</dt>
			<dd><a rel="license" href="http://www.gnu.org/licenses/gpl.html">GPL v3</a></dd>
			<dt>Source Code</dt>
			<dd><a href="http://github.com/benward/tumblr2wordpress">
			    github.com/benward/tumblr2wordpress</a></dd>
		</dl>
		<p>This tool will create a WordPress compatible XML file from your
		    Tumblr blog, which you can then save and import into WordPress.</p>
		<form method="POST" action="">

		<fieldset>
		    <legend>Tumblr Account</legend>
		    <label for="tumblr-user">Tumblr Blog URL (not your email address or custom domain):</label>
		    <input type="text" id="tumblr-user" name="username" size="40">
		    <samp>.tumblr.com</samp>
		</fieldset>
		<fieldset>
		    <legend>Exported Content Format</legend>
		    <p>By default, Tumblr posts are output are converted into HTML,
		        just as they would be on your Tumblr blog page.</p>
		    <ul>
		        <li><input type="radio" name="filter" id="fltr-html" value="html" checked>
		            <label for="fltr-html">HTML</label>
		        </li>
		        <li><input type="radio" name="filter" id="fltr-text" value="text">
		            <label for="fltr-text">Plain Text</label>
		        </li>
		        <li><input type="radio" name="filter" id="fltr-none" value="none">
		            <label for="fltr-none">Raw Input (preserving Markdown)</label>
		        </li>
		    </ul>
		</fieldset>
		<fieldset>
		    <legend>Permalink Slugs</legend>
		    <p>Here, choose the permalink format for the posts when they
		        are imported into Wordpress.</p>
		    <p>A reliable permalink may allow you to redirect content between
    		   your old and new site. <a href="#help-permalinks">Read more</a>.</p>
		    <ul>
		        <li><input type="radio" name="permaform" id="link-id" value="id" checked>
		            <label for="link-id">Use the Tumblr post ID.
		                e.g. <kbd>http://blog.example.com/posts/<strong>12345678</strong></kbd>
		            </label>
		        </li>
		        <li><input type="radio" name="permaform" id="link-combo" value="combo">
		            <label for="link-combo">Create a combined slug
		                e.g. <kbd>http://blog.example.com/posts/<strong>12345678-my-blog-post-title</strong></kbd>
		            </label>
		        </li>
		        <li><input type="radio" name="permaform" id="link-orig" value="text">
		            <label for="link-orig">Use original Tumblr text slug only.
		                e.g. <kbd>http://blog.example.com/posts/<strong>my-blog-post-title-about-stuff</strong></kbd>
		            </label>
		        </li>
		    </ul>
		</fieldset>
		<fieldset>
		    <legend>Export for</legend>
		    <ul>
    		    <li><input type="radio" name="type" id="xp-dotcom" value="wordpress.com" checked>
    		        <label for="xp-dotcom">WordPress.com Hosted Blog</label>
    		    </li>
    		    <li>
    		        <input type="radio" name="type" id="xp-dotorg" value="wordpress">
    		        <label for="xp-dotorg">Self-Hosted WordPress Installation</label>
    		    </li>
    		</ul>
    	</fieldset>
		<fieldset>
		    <legend>Post Options</legend>
            <div>
		    <label for="publish-state">Imported Post Status</label>
		    <select name="publish-state" id="publish-state">
		        <option value="publish" selected>Published</option>
		        <option value="draft">Draft</option>
		    </select>
		    </div>

		    <div>
		    <label for="comment-state">Comments</label>
		    <select name="comment-state" id="comment-state">
		        <option value="off" selected>Comments Disabled</option>
		        <option value="on">Comments Enabled</option>
		    </select>
		    </div>

		    <div>
		    <label for="ping-state">Pings</label>
		    <select name="ping-state" id="ping-state">
		        <option value="off" selected>Pingbacks Disabled</option>
		        <option value="on">Pingbacks Enabled</option>
		    </select>
		    </div>
    	</fieldset>
    	<fieldset>
    	    <legend>Ready?</legend>
		    <input type="submit" value="Export">
		</fieldset>
		</form>
		<h2>Notes and Help</h2>
		<div id="help-permalinks">
		    <p>So, you're migrating your blog. Good for you!
            If you're running your tumblr blog on your own domain
            (<samp>yourdomain.com</samp> rather than <samp>me.tumblr.com</samp>,
            for example), then you can set up redirects	from the old URLs that
            people are still linking to, to the imported post on your new
            Wordpress blog.</p>
		    <p>Basically, where you have a Tumblr post URL that looks like this:
	        <samp>http://example.com/post/12345678/this-is-a-post</samp>,
	        the only part that matters is
	        <samp>http://example.com/post/12345678/</samp>. That number is
	        the ID. Everything after that gets ignored when Tumblr loads
	        the post.</p>
	        <p>When you export your post, you're encouraged to include that
	        post ID in the new permalink slugs, since that way you can redirect
	        from one to the other.</p>
	        <p>If you take your current Tumblr custom domain, and host it
	        yourself, you can set up a simple <samp>.htaccess</samp> redirect
	        for people linking to your old posts:</p>
	        <pre><code>RewriteEngine On
RewriteRule ^/?posts/([0-9]+).*$ http://wordpress.example.com/blog/$1</code></pre>
        </div>
		<p class="donate">If you find this tool useful, consider dropping a tip
		    to Hao Chen, who wrote the original version of the script. Find his
		    version at <a href="http://haochen.me/tumblr/">http://haochen.me/tumblr/</a>
		</p>
	</body>
</html>
<?php
  # If we output the form, end now:
  exit();
endif;

  # Didn't output the form. So, process the input:

$type = $_REQUEST["type"];
$i = 0;

$posts = array();
$feed = '';
$allTags = array();

# Tumblr Query Options:
switch($_REQUEST["filter"]) {
    case "text":
        # Plaintext Content
        $filter = "&filter=text";
        break;
    case "none":
        # Do not post-process posts (leaves Markdown intact)
        $filter = "&filter=none";
        break;
    default:
        $filter = "";
        break;
}

# Output Options

# Permalink Format
switch($_REQUEST["permaform"]) {
    case "combo":
        # Do not post-process posts (leaves Markdown intact)
        $permalink_format = "combined";
        break;
    case "text":
        # Plaintext Content
        $permalink_format = "text";
        break;
    case "id":
    default:
        # Plaintext Content
        $permalink_format = "id";
        break;
}

# Publication Status
switch($_REQUEST["publish-state"]) {
    case "draft":
        $publish = 'draft';
        break;
    case "publish":
    default:
        $publish = 'publish';
        break;
}

# Enable Comments
if('on' === $_REQUEST["comment-state"]) {
    $comments = 'open';
}
else {
    $comments = 'closed';
}

# Enable Pingback
if('on' === $_REQUEST["ping-state"]) {
    $pings = 'open';
}
else {
    $pings = 'closed';
}

# OK. Query the Tumblr API for the posts and get them all in 50-post batches:
do {
	$url = 'http://'.$username.'.tumblr.com/api/read?start='. $i . '&num=50' . $filter;
	$file = file_get_contents($url);
	$feed = new SimpleXMLElement($file);
	$posts = array_merge($posts, $feed->xpath('posts//post'));
	$i = (int)$feed->posts->attributes()->start + 50;
} while($i <= (int)$feed->posts["total"]);

function formatForWP($str)
{
	global $type;
	switch($type)
	{
		case "wordpress.com":
			$str = formatVideoForWP(formatImageForWP($str));
	}
	return $str;
}
function formatImageForWP($str)
{
	if(preg_match_all('/(<p>)?\s*(<img[^>]*\/?>)\s*(<\/p>)?/', $str, $matches))
	{
		for($i=0;$i<sizeof($matches[0]);$i++)
		{
			$str = str_replace($matches[0][$i], str_replace('/>',' alt=""/>', $matches[2][$i]), $str);
		}
	}
	return $str;
}

function formatVideoForWP($str)
{
	if(preg_match_all('/<object[\s\S]*src="([\S\s]*?)&amp;[\s\S]*"[\s\S]*<\/object>/', $str, $matches))
	{
		for($i=0;$i<sizeof($matches);$i++)
		{
			if((strpos($matches[1][$i], 'youtube.com') !== false))
			{
				$str = str_replace($matches[0][$i], '[youtube='.$matches[1][$i].']', $str);
			}
		}
	}
	return $str;
}

function removeWeirdChars($str)
{
	return trim(preg_replace('{(-)\1+}','$1',preg_replace('/[^a-zA-Z0-9-]/', '', str_replace(' ','-',strtolower(strip_tags($str))))),'-');
}

function getTags($post)
{
	if($post->attributes()->type)
	{
		echo "<category><![CDATA[" . $post->attributes()->type . "]]></category>\n";
		echo "\t\t<category domain=\"category\" nicename=\"" . $post->attributes()->type . "\"><![CDATA[" . $post->attributes()->type . "]]></category>\n";
	}
	else
	{
		echo "<category><![CDATA[Uncategorized]]></category>\n";
		echo "\t\t<category domain=\"category\" nicename=\"uncategorized\"><![CDATA[Uncategorized]]></category>\n";
	}
	if($post->tag)
	{
		foreach($post->tag as $tag)
		{
			echo "\t\t<category domain=\"tag\"><![CDATA[$tag]]></category>\n";
			echo "\t\t<category domain=\"tag\" nicename=\"" . removeWeirdChars($tag) . "\"><![CDATA[$tag]]></category>\n";
			addTag((String)$tag);
		}
	}
}

function addTag($tag)
{
	global $allTags;
	if(!in_array($tag, $allTags))
		$allTags[] = $tag;
}

function getAllTags()
{
	global $allTags;
	foreach($allTags as $tag)
	{
		echo "\t<wp:tag><wp:tag_slug>". removeWeirdChars($tag) . "</wp:tag_slug><wp:tag_name><![CDATA[$tag]]></wp:tag_name></wp:tag>\n";
	}
}

function formatPermalinkSlug($id, $text) {
    switch($permalink_format) {
        case 'combo':
            return $id . '-' . removeWeirdChars($text);
        case 'text':
            return removeWeirdChars($text);
        case 'id':
        default:
            return $id;
    }
}

# Try to extract a sane, single line blog title from input text, and
# (optionally) remove it from the entry body to avoid duplication.
function formatEntryTitle(&$text, $strip=true) {
    $lines = explode("\n", $text);
    $block_count = 0; # How far into the entry are we?
    for($i=0; $l = $lines[$i]; $i++) {

        if(empty($l)) {
            # Ignoring emptry lines
            continue;
        }
        elseif(preg_match('/^\s*(#+|<[hH][1-6]>).*$/', $l, $match)) {
            # Matches a heading in Markdown or HTML

            # Now we need to see if the title embeds any links. If it does,
            # we want to strip out the link mark-up…

            # If raw input:
            if('none' == $_REQUEST["filter"]) {
                # Run markdown:
                if(file_exists("markdown.php")) {
                    require_once("markdown.php");
                    $l = Markdown($l);
                }
                else {
                    error_log("Couldn't import Markdown parser");
                }
            }
            # Crudely check for <a>
            $contains_link = !(false === stripos('<a', $l));

            if( true === $strip
                && false === $contains_link) {
                # If there has been no other content so far (allowing one block
                # for quote attribution), and we're stripping titles out of the
                # text to avoid duplication, do it:
                $lines = array_splice($lines, $i, 1);
                $text = implode('\n', $lines);
            }

            # In the final return, strip not-inline HTML tags.
            return str_replace('\n', '', strip_tags(
                $l,
                '<abbr><acronym><i><b><strong><em><code><kbd><samp><span><q>
                 <cite><dfn><ins><del><mark><meter><rp><rt><ruby><sub><sup>
                 <time><var>'
            ));
        }
        else {
            $block_count++;
        }

        if($block_count > 2) {
            # Too far into the post. Give up.
            break;
        }
    }
    return '';
}

header('content-type: text/xml');
header("content-disposition: attachment; filename=tumblr_$username.xml");
?>
<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n"; ?>
<!-- This is a WordPress eXtended RSS file generated from your Tumblr posts. -->
<!-- It contains information about your blog's posts, comments, and categories. -->
<!-- You may use this file to transfer that content from one site to another. -->
<!-- This file is not intended to serve as a complete backup of your blog. -->

<!-- To import this information into a WordPress blog follow these steps. -->
<!-- 1. Log into that blog as an administrator. -->
<!-- 2. Go to Manage: Import in the blog's admin panels. -->
<!-- 3. Choose "WordPress" from the list. -->
<!-- 4. Upload this file using the form provided on that page. -->
<!-- 5. You will first be asked to map the authors in this export file to users -->
<!--    on the blog.  For each author, you may choose to map to an -->
<!--    existing user on the blog or to create a new user -->
<!-- 6. WordPress will then import each of the posts, comments, and categories -->
<!--    contained in this file into your blog -->

<!-- generator="Tumblr2WordPress/<?php echo T2W_VERSION ?>" created="<?php echo date("Y-m-d H:i") ?>"-->
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:wp="http://wordpress.org/export/1.0/"
>

<channel>
	<title><?php echo $feed->tumblelog->attributes()->title ?></title>
	<link>http://<?php echo $feed->tumblelog->attributes()->name ?>.tumblr.com/</link>
	<description><?php echo $feed->tumblelog ?></description>
	<pubDate><?php echo date("r") ?></pubDate>
	<generator>http://<?php echo 'Tumblr2Wordpress/' . T2W_VERSION . '(' . $_SERVER['HTTP_HOST'] . ')' ?></generator>
	<language>en</language>
	<wp:wxr_version>1.0</wp:wxr_version>
	<wp:base_site_url>http://<?php echo $feed->tumblelog->attributes()->name ?>.tumblr.com/</wp:base_site_url>
	<wp:base_blog_url>http://<?php echo $feed->tumblelog->attributes()->name ?>.tumblr.com/</wp:base_blog_url>
	<wp:category>
		<wp:category_nicename>uncategorized</wp:category_nicename>
		<wp:category_parent></wp:category_parent>
		<wp:cat_name><![CDATA[Uncategorized]]></wp:cat_name>
	</wp:category>
<?php
ob_start();
	foreach($posts as $post)
	{
?>
	<item>
<?php
        // Shared Output:
?>
		<link><?php echo $post->attributes()->url ?></link>
		<pubDate><?php echo $post->attributes()->date ?> +0000</pubDate>
		<dc:creator><![CDATA[post_author]]></dc:creator>
		<?php getTags($post) ?>
		<guid isPermaLink="false"><?php echo $post->attributes()->url ?></guid>
		<wp:post_id><?php echo $post->attributes()->id ?></wp:post_id>
		<wp:post_date><?php echo date('Y-m-d G:i:s', (double)$post->attributes()->{'unix-timestamp'}) ?></wp:post_date>
		<wp:post_date_gmt><?php echo str_replace(" GMT", "", $post->attributes()->{'date-gmt'}) ?></wp:post_date_gmt>
		<wp:comment_status><?php echo $comments ?></wp:comment_status>
		<wp:ping_status><?php echo $pings ?></wp:ping_status>
		<wp:status><?php echo $publish ?></wp:status>
		<wp:post_parent>0</wp:post_parent>
		<wp:menu_order>0</wp:menu_order>
		<wp:post_type>post</wp:post_type>
		<wp:post_password></wp:post_password>
<?php
        // Post Specific Elements:
		switch($post->attributes()->type)
		{
			case "regular": ?>
	 	<title><?php echo htmlspecialchars($post->{'regular-title'}) ?></title>
		<description></description>
		<content:encoded><![CDATA[<?php echo formatForWP($post->{'regular-body'}) ?>]]></content:encoded>
		<wp:post_name><?php echo formatPermalinkSlug($post->attributes()->id, $post->{'regular-title'}) ?></wp:post_name>
<?php		break;


			case "photo":
			$post_content = $post->{'photo-caption'};

			?>
	 	<title><?php echo htmlspecialchars(formatEntryTitle(&$post_content)) ?></title>
		<description></description>
		<content:encoded><![CDATA[<img src="<?php echo $post->{'photo-url'} ?>" alt=""/>

		<?php echo formatForWP($post_content) ?>]]></content:encoded>
		<wp:post_name><?php echo formatPermalinkSlug($post->attributes()->id, $post->{'photo-caption'}) ?></wp:post_name>
<?php
			break;

			case "quote":
			$post_content = $post->{'quote-source'};
		?>
	 	<title><?php echo htmlspecialchars(formatEntryTitle(&$post_content)) ?></title>
		<description></description>
		<content:encoded><![CDATA[<blockquote><?php echo $post->{'quote-text'} ?></blockquote>

		<?php echo formatForWP($post_content) ?>]]></content:encoded>
		<wp:post_name><?php echo formatPermalinkSlug($post->attributes()->id, str_replace('&#8220;','',str_replace('&#8221;','',$post->{'quote-text'}))) ?></wp:post_name>
<?php
			break;

			case "link": ?>
	 	<title><?php echo htmlspecialchars(strip_tags($post->{'link-text'})) ?></title>
		<description><?php echo htmlspecialchars(strip_tags($post->{'link-description'})) ?></description>
		<content:encoded><![CDATA[<a href="<?php echo $post->{'link-url'} ?>"><?php echo $post->{'link-text'} ?></a>

		<?php echo formatForWP($post->{'link-description'}) ?>]]></content:encoded>
		<wp:post_name><?php echo formatPermalinkSlug($post->attributes()->id, $post->{'link-text'}) ?></wp:post_name>
<?php
			break;


		    case "conversation": ?>
	 	<title><?php echo htmlspecialchars(strip_tags($post->{'conversation-title'})) ?></title>
		<description></description>
		<content:encoded><![CDATA[<?php
		    foreach($post->{'conversation-line'} as $line) { ?>
		        <cite><?php echo $line->attributes()->label ?></cite>
		        <q><?php echo $line ?></q><br/><?php } ?>]]></content:encoded>
		<wp:post_name><?php echo formatPermalinkSlug($post->attributes()->id, $post->{'conservation-title'}) ?></wp:post_name>
<?php
			break;


			case "video":
			$post_content = $post->{'video-caption'};
		?>
	 	<title><?php echo htmlspecialchars(formatEntryTitle(&$post_content)) ?></title>
		<description></description>
		<content:encoded><![CDATA[
        <?php if($type == 'wordpress.com' && strpos($post->{'video-source'}, 'youtube.com') !== false) { ?>
		[youtube=<?php echo $post->{'video-source'} ?>]
        <?php } elseif($type == 'wordpress.com' && strpos($post->{'video-source'}, 'video.google.com') !== false) { ?>
		[googlevideo=<?php preg_match('/src="([\S\s]*?)"/', $post->{'video-player'}, $matches); echo $matches[1]; ?>]
        <?php } else { ?>
	    <?php echo $post->{'video-player'} ?>

	    <?php echo $post_content ?>
	    ]]></content:encoded>
        <?php } ?>
		<wp:post_name><?php echo formatPermalinkSlug($post->attributes()->id, $post->{'video-caption'}) ?></wp:post_name>
<?php
			break;

			case "audio":
			$post_content = $post->{'audio-caption'};
		?>
	 	<title><?php echo htmlspecialchars(formatEntryTitle(&$post_content)) ?></title>
		<description></description>
		<content:encoded><![CDATA[<a href="<?php preg_match('/audio_file=([\S\s]*?)(&|")/', $post->{'audio-player'}, $matches); echo $matches[1]; ?>">Audio</a>

		<?php echo $post_content ?>]]></content:encoded>
		<wp:post_name><?php echo formatPermalinkSlug($post->attributes()->id, $post->{'audio-caption'}) ?></wp:post_name>
<?php
			break;
		}
?>
	</item>
<?php
	}
	$out = ob_get_contents();
	ob_end_clean();
	getAllTags();
	echo $out;
?>
</channel>
</rss>