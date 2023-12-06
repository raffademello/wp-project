<?php get_header(); ?>

<section class="bg-white dark:bg-gray-900 oi">
	<div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
		<h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Website Wordpress <br> para exibição de projetos</h1>
		<p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Aqui é listado os projetos cadastrados através do ACF no painel admin</p>
	</div>
</section>

<?php
$posts = get_posts(array(
	'posts_per_page'    => -1,
	'post_type'         => 'projetos'
));

?>
<div class="container mx-auto mt-4 lg:mt-10">
	<h3 class="font-bold text-3xl text-center lg:text-left">Projetos Recentes</h3>
</div>
<div class="container mx-auto mt-4 lg:my-10">
	<div class="flex gap-4 justify-center flex-col lg:flex-row my-4 items-center lg:items-stretch">
		<?php
		foreach ($posts as $post) :

			setup_postdata($post);

		?>
			<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
				<a href="<?php the_permalink(); ?>">
					<?php
					$imageProject = get_field("imagem");
					if (!empty($imageProject)) : ?>
						<img class="rounded-t-lg" src="<?php echo esc_url($imageProject['url']); ?>" alt="<?php echo esc_attr($imageProject['alt']); ?>" />
					<?php endif; ?>
				</a>
				<div class="p-5">
					<a href="#">
						<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php the_field("titulo"); ?></h5>
					</a>
					<p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php the_field("resumo"); ?></p>
					<small class="text-white">Categoria:<?php the_field("categoria") ?></small>
				</div>
			</div>

		<?php endforeach; ?>
	</div>
</div>




<?php
wp_reset_postdata();
get_footer(); ?>