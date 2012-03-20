<?php

//ooh translations

load_theme_textdomain('compucrunch-one', TEMPLATEPATH . '/languages');
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if (is_readable($locale_file)) {
   require_once($locale_file);
}

//page numbers :D

function get_page_number() {
  if (get_query_var('paged')) {
    print ' | ' . __('Page ', 'compucrunch-one') . get_query_var('paged');
  }
}

// Let's fuck with comments (the not this kind, the kind on blog posts)
function custom_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
?>

<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    <!-- <div class="comment-author vcard"><?php commenter_link() ?></div> -->
    <div class="comment-meta">

<?php

    printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'compucrunch-one'), get_comment_date(), get_comment_time(), '#comment-' . get_comment_ID());
    edit_comment_link(__('Edit', 'compucrunch-one'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>');
?>
    </div>
<?php
    if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'compucrunch-one')
?>
    <div class="comment-content">
        <?php comment_text() ?>
    </div>
<?php
    if($args['type'] == 'all' || get_comment_type() == 'comment'):
        comment_reply_link(array_merge($args, array(
            'reply_text' => __('Reply','compucrunch-one'),
            'login_text' => __('Log in to reply.','compucrunch-one'),
            'depth' => $depth,
            'before' => '<div class="comment-reply-link">',
            'after' => '</div>'
        )));
    endif;
}

// Let's list pings separately
function custom_pings($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    <div class="comment-author">
<?php
    printf(__('By %1$s on %2$s at %3$s', 'your-theme'), get_comment_author_link(), get_comment_date(), get_comment_time());
    edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>');
?>
    </div>
<?php 
    if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'your-theme')
?>
    <div class="comment-content">
<?php
    comment_text()
?>
    </div>
<?php 
}

function change_wp_search_size($query) {
	if ( $query->is_search ) // Make sure it is a search page
		$query->query_vars['posts_per_page'] = 10; // Change 10 to the number of posts you would like to show
 
	return $query; // Return our modified query variables
}
add_filter('pre_get_posts', 'change_wp_search_size'); // Hook our custom function onto the request filter

function kriesi_pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         if ($paged == 1) {
	     echo "<div class='pagination bumpleft'>";
         } else if ($paged == $pages) {
	     echo "<div class='pagination bumpright'>";
         } else {
	     echo "<div class='pagination bumpup'>";
         }
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>1</a><span class="bluetext">&hellip;</span>";
         /*if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";*/

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         /*if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  */
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<span class="bluetext>&hellip;</span><a href='".get_pagenum_link($pages)."'>$pages</a>";
         echo "</div>\n";
     }
}

?>