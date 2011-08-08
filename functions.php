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
?>