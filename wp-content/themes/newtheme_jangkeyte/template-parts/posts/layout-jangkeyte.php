<?php 
if(is_home()){
	get_template_part( 'template-parts/posts/partials/content', 'home');
} else {
?>

<?php //do_action('jangkeyte_before_blog'); ?>

<nav class="breadcrumbs">
    <div class="container">
        <?php //if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb(); } ?>
    </div>    
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-sx-12">
		<?php
		/*
			if(is_single()){
				get_template_part( 'template-parts/posts/partials/content', 'single');
			} elseif(is_archive()){
				get_template_part( 'template-parts/posts/partials/content', 'archive');
			} elseif(is_page('lien-he')){
				get_template_part( 'template-parts/posts/partials/content', 'contact');
			} elseif(is_page('dong-xe')){
				get_template_part( 'template-parts/posts/partials/content', 'product');
			} elseif(is_page()){
				get_template_part( 'template-parts/posts/partials/content', 'page');
			} else {
				echo '<p>Đây là trang error</p>';
				get_template_part( 'template-parts/posts/partials/content', 'none');				
			}
		*/
		?>
		</div> <!-- .post-content -->
	</div><!-- .row -->
</div><!-- .container -->

<?php } 

//do_action('jangkeyte_after_blog');