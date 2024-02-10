<div class="home">
	<div class="h-banner">
		<?php get_template_part( 'template-parts/posts/partials/home/entry-home', 'banner'); ?>
	</div>

	<div class="h-model">
		<?php get_template_part( 'template-parts/posts/partials/home/entry-home', 'product'); ?>
	</div>

	<div class="h-service">
		<?php get_template_part( 'template-parts/posts/partials/home/entry-home', 'service'); ?>
	</div>

	<div class="h-posts">
		<?php get_template_part( 'template-parts/posts/partials/home/entry-home', 'post'); ?>
	</div>

	<div class="h-partners">
		<?php get_template_part( 'template-parts/posts/partials/home/entry-home', 'partner'); ?>
	</div>
</div><!-- .home-content -->

<?php get_template_part( 'template-parts/posts/partials/home/entry-home', 'modal'); ?>