</div><!-- #main -->

	<div id="footer">
		<div id="colophon">

			<div id="site-info">
                            <div id="postlist">
                                <h2>Five Random Posts:</h2>
                                <ul class="spy">
                                <?php $my_query = new WP_Query('orderby=rand'); ?>
                                <?php while ($my_query->have_posts()) : $my_query->the_post();?>
                                    <li>
                                        <?php $screen = get_post_meta($post->ID, 'screen', $single = true); ?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                            <div class="clear"></div>
			</div><!-- #site-info -->

		</div><!-- #colophon -->
	</div><!-- #footer -->
</div><!-- #wrapper -->
</body>
</html>
