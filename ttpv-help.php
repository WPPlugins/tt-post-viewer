<?php
function help_string(){
    $helpstr = "TT Post Viewer is a plugin that lets you display Most recent posts, Most popular posts, Most commented posts, Related Posts, Featured Posts, Posts by author, Posts by category, Posts by date in widget area and also can be displayed in post area by using short codes. Posts can be displayed as List or with thumbnail. You can also select whether you want the excerpt to be displayed or not and you can also set the number of words to display.

<br><br><strong>Installation:</strong>
<ol>
	<li>Unzip &amp; upload the plugin directory inside your /wp-content/plugins/ directory</li>
	<li>Activate the plugin through the 'Plugins' menu in WordPress</li>
	<li>Go to 'Settings' and 'Post Viewer Options'</li>
</ol>
<strong>How to Use:</strong><br>

TT Post viewer option page can be accessed by going to 'Settings' and then 'Post Viewer Options'.

There are 9 sections in the option page.
<ul>
	<li>General Settings</li>
	<li>Recent Posts</li>
	<li>Most Popular Posts</li>
	<li>Most Commented Posts</li>
	<li>Related Posts</li>
	<li>Featured Posts</li>
	<li>Posts by Authors</li>
	<li>Posts by Categories</li>
	<li>Posts By Date</li>
</ul>
<b>1. General Settings:</b>

This section is to set the thumbnail size that will be displayed in widget area and post area. Width and Height is in pixel. After the size is set and saved you need to run any plugin that regenerate thumbnail sizes to take that into effect. One such plugin is Force Regenerate Thumbnails.

<br><br><b>2. Recent Posts:</b><b> </b>

<i>Title:</i> This field is to set the title that will be displayed in widget area or post area when short code is used for recent posts. If this field is empty then default title will be displayed.

<i>Enable Sidebar Widget: </i>If this check box is selected then a widget for recent post will be enabled and that widget can be used in sidebar or footer or any other widget area that a theme supports. By checking this option few more options will be displayed. Those are:
<ul>
	<li>Number of posts: Set the number of posts to be displayed.</li>
	<li>Display posts as: Select between list view or thumbnail view.</li>
	<li>By author: Select one or multiple authors.</li>
	<li>By Category: Select one or multiple Categories.</li>
</ul>
When the widget is enabled in order to use that widget you need to go to 'Appearance' -&gt; 'Widgets' and then select 'TTPV: Recent Posts' widget and drag and drop to the widget area. Once the it is placed in the widget area all the values that are set for this widget in the Post Viewer Options page will be available here as well. You can also change the values or options from the widget page. Any values that will be set from widget page will override the values set from Post Viewer main option page.

<i>Enable Shortcode: </i>By checking this shortcode will be enable for recent posts. Anywhere in the post shortcode can be placed. Basic shortcode for recent post is [ttpv-recent]. Few more options will be displayed when this checkbox will be selected.
<ul>
	<li>Number of posts: Set the number of posts to be displayed.</li>
	<li>Display posts as: Select between list view or thumbnail view.</li>
	<li>Show Excerpt: To enable and disable excerpts to be displayed</li>
	<li>Excerpt size: Size of excerpts in word numbers.</li>
	<li>By author: Select one or multiple authors.</li>
	<li>By Category: Select one or multiple Categories.</li>
</ul>
<strong>Use of shortcode:</strong><br>

[ttpv-recent] : Shows recent posts depending on the options set from main Post Viewer Option page.<br>

[ttpv-recent auths='1,2']: Shows posts by selected authors. Here Posts by user id 1 and 2 will be displayed.<br>

[ttpv-recent cats='1,2'] : Shows posts from selected categories. Here Posts category id 1 and 2 will be displayed.<br>

[ttpv-recent cats='1,2' auths='1,2']: Can be used this way to customise more.<br>

[ttpv-recent disp='thumbnail']: Display all posts with thumbnail<br>

[ttpv-recent disp='list']: Display all posts as list.<br>

[ttpv-recent posts='4']: Displays 4 posts.<br>

[ttpv-recent title='Most Recent Posts']: Display 'Most Recent Posts' as title in recent post area.<br>

[ttpv-recent exrpt='yes' exrptlen='10']: Displays posts with excerpts enabled and excerpt size is set to 10 words.<br>

These options can be used in any combination. Any values that will be set in shortcode will override the values set from main option page. Otherwise it will use the values set from main option page as default values.

<br><br><strong>3. Most Popular Posts:</strong> Similar use as Recent Posts. Only when using shortcode you need to type [ttpv-mostpopular].

<br><strong>Some example</strong>:<br>

[ttpv-[ttpv-mostpopular] : Shows recent posts depending on the options set from main Post Viewer Option page.<br>

[ttpv- mostpopular auths='1,2']: Shows posts by selected authors. Here Posts by user id 1 and 2 will be displayed.<br>

[ttpv- mostpopular cats='1,2'] : Shows posts from selected categories. Here Posts category id 1 and 2 will be displayed.<br>

[ttpv- mostpopular cats='1,2' auths='1,2']: Can be used this way to customise more.<br>

[ttpv- mostpopular disp='thumbnail']: Display all posts with thumbnail<br>

[ttpv- mostpopular disp='list']: Display all posts as list.<br>

[ttpv- mostpopular posts='4']: Displays 4 posts.<br>

[ttpv- mostpopular title='Most Recent Posts']: Display 'Most Recent Posts' as title in recent post area.<br>

[ttpv- mostpopular exrpt='yes' exrptlen='10']: Displays posts with excerpts enabled and excerpt size is set to 10 words.] : Shows recent posts  depending on the options set from main Post Viewer Option page.<br>

<br><br><strong>4. Most Commented Posts:</strong> Similar use as the previous options. . Only when using shortcode you need to type [ttpv-mostcommented].

<br><br><strong>5. Featured Posts:</strong> Similar use as the previous options. . Only when using shortcode you need to type [ttpv-featured].

<br><br><strong>6. Posts by Authors:</strong> Similar use as the previous options. . Only when using shortcode you need to type [ttpv-author].

<br><br><strong>7. Related Posts:</strong> similar use as previous options. Only difference is there is no option to select author or category. Widgets and shortcodes will only be used in single page. For shortcodes you need to type [ttpv-related].

<br><br><strong>8. Posts by Category:</strong> This is also similar to the other ones but it doesn't have the option to select author. Apart from that everything is similar. For shortcodes you need to type [ttpv-category].

<br><br><strong>9. Posts by Date:</strong> This one is also used exactly same as other options. In addition it have 2 additional fields to select the date range. One is for the start date and other is for end date. So the posts which are posted between that date range will be displayed. For shortcodes you need to type [ttpv-bydate].

<br>Example:

[ttpv-bydate from_date='01-01-2010' to_date='23-02-2014' posts='4' exrpt='yes' exrptlen='5']

&nbsp;

&nbsp;

<b> </b>";

return $helpstr;
}
?>