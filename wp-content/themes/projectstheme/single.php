<?php get_header(); ?>

<?php if (is_singular()) : ?>
	<main class="page-container pb-4" id="page-<?php the_ID(); ?>">
		<div class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 mb-10">
			<div class="container mx-auto px-10 text-center lg:text-left">
				<h2 class="text-white text-2xl">Detalhes do projeto</h2>
			</div>
		</div>
		<div class="container mx-auto max-w-5xl">
			<h2 class="text-gray-600 text-3xl font-bold mb-5 text-center lg:text-left"><?php the_title(); ?></h2>
			<div class="bg-white flex flex-col lg:flex-row max-w-4xl justify-center p-5 lg:p-0">
				<?php
				$imageProject = get_field("imagem");
				if (!empty($imageProject)) : ?>
					<img class="rounded-md shadow-md max-w-md" src="<?php echo esc_url($imageProject['url']); ?>" alt="<?php echo esc_attr($imageProject['alt']); ?>" />
				<?php endif; ?>
				<div class="lg:ml-3">
					<article class="my-3 font-normal"><?php the_field("resumo"); ?></article>
				</div>
				<p class="text-xs text-cyan-500 uppercase mt-4">Categoria: <strong><?php the_field("categoria"); ?></strong></p>
			</div>
		</div>
		<?php

		$location = get_field('categoria');
		// args
		$args = array(
			'posts_per_page'    => -1,
			'post_type'     => 'projetos',
			'meta_value'    => $location
		);


		// query
		$the_query = new WP_Query($args);

		?>
		<?php if ($the_query->have_posts()) : ?>
			<div class="related-posts mt-6 lg:mt-12 bg-gray-50 py-6">
				<div class="container mx-auto max-w-5xl">
					<h6 class="text-xl font-bold text-center lg:text-left border-solid border-b-2 border-gray-600 pb-3 text-gray-600">Projetos Relacionados</h6>
					<div class="flex items-center lg:items-stretch flex-col lg:flex-row mt-2 lg:mt-10 gap-4">
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<div class="flex flex-col max-w-xs relative items-center shadow-md p-5 bg-white hover:bg-gray-100">
								<?php
								$imageProject = get_field("imagem");
								if (!empty($imageProject)) : ?>
									<img class="rounded-md max-w-xs p-5" src="<?php echo esc_url($imageProject['url']); ?>" alt="<?php echo esc_attr($imageProject['alt']); ?>" />
								<?php endif; ?>
								<strong class="my-6 text-xl inline-block text-center text-gray-600"><?php the_field("titulo"); ?></strong>
								<a class="absolute w-full h-full inset-x-0 inset-y-0" href="<?php the_permalink(); ?>"></a>
							</div>

						<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php wp_reset_query();  // Restore global post data stomped by the_post(). 
		?>
	</main><!-- END page -->
<?php endif; ?>

<?php get_footer(); ?>