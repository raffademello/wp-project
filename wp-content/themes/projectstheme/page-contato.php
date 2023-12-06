<?php /* Template Name: Page Contato */ ?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<div class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 mb-10">
		<div class="container mx-auto px-10">
			<h2 class="text-white text-2xl"><?php the_title(); ?></h2>
		</div>
	</div>
	<main class="container mx-auto" id="page-<?php the_ID(); ?>">
		<div class="flex flex-col lg:flex-row px-5">
			<section class="mb-10 lg:w-1/2">
				<div class="flex flex-wrap">
					<div class="mb-10 w-full shrink-0 grow-0 basis-auto md:mb-0 md:w-6/12 md:px-3 lg:px-6">
						<h2 class="mb-6 text-3xl font-bold">Entre em contato</h2>
						<p class="mb-6 text-neutral-500">
							Lorem ipsum dolor sit amet consectetur adipisicing elit.
							Laudantium, modi accusantium ipsum corporis quia asperiores
							dolorem nisi corrupti eveniet dolores ad maiores repellendus enim
							autem omnis fugiat perspiciatis? Ad, veritatis.
						</p>
						<p class="mb-2 text-neutral-500">
							Lorem ipsum dolor sit amet, Brasília
						</p>
						<p class="mb-2 text-neutral-500">
							+ 01 234 567 89
						</p>
						<p class="mb-2 text-neutral-500">
							info@email.com
						</p>
					</div>
				</div>
			</section>
			<?php while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	</main><!-- END page -->
<?php endif; ?>
<?php get_footer(); ?>