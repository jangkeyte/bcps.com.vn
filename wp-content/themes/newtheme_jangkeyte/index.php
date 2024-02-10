<?php
/**
 * The blog template file.
 *
 * @package jangkeyte
 */

get_header();
?>

<div id="content-home" class="container-fluid">
		<?php get_template_part( 'template-parts/posts/layout', 'jangkeyte' ); ?>	
</div><!-- .page-wrapper .blog-wrapper -->

<?php get_footer(); ?>