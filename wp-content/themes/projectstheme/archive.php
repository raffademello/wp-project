<?php get_header(); ?>
<div class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 mb-10">
	<div class="container mx-auto px-10">
		<h2 class="text-white text-2xl">Projetos</h2>
	</div>
</div>
<div class="container mx-auto px-10">
	<div class="flex flex-col lg:flex-row gap-4">
		<div id="archive-filters" class="shadow-md p-5 lg:p-11 lg:h-screen mb-5 w-80">
			<h5 class="font-bold text-lg lg:text-base mb-4 lg:mb-8">Pesquisa por categoria</h5>
			<?php foreach ($GLOBALS['my_query_filters'] as $key => $name) :
				// get the field's settings without attempting to load a value
				$field = get_field_object($key, false, false);
				// set value if available
				if (isset($_GET[$name])) {
					$field['value'] = explode(',', $_GET[$name]);
				}
				// create filter
			?>
				<div class="filter" data-filter="<?php echo $name; ?>">
					<?php create_field($field); ?>
				</div>
			<?php endforeach; ?>
		</div>
		<?php if (have_posts()) : ?>
			<main class="w-full">
				<div class="container mx-auto">
					<h5 class="font-bold text-2xl border-solid border-b-2 border-gray-500 pb-3 uppercase">Resultado da pesquisa: <span id="queryResult"></div></h5>
					<div class="py-5 grid  gap-10">
						<?php while (have_posts()) : the_post(); ?>
							<div class="flex flex-col lg:flex-row items-center rounded-md overflow-hidden shadow-lg p-5">

								<?php if (has_post_thumbnail($post->ID)) : ?>
									<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
									<div class="custom-bg w-full lg:w-44 h-44 bg-no-repeat bg-center bg-contain" style="background-image: url('<?php echo $image[0]; ?>')">

									</div>
								<?php endif; ?>

								<div class="py-4 px-4 bg-white">
									<h3 class="text-lg font-semibold text-gray-600"><?php the_title(); ?></h3>
									<p class="mt-4 text-md font-thin"><?php echo get_the_excerpt(); ?><br /><a class="text-blue-400" href="<?php the_permalink(); ?>">Ler descrição completa</a></p>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</main>
		<?php endif; ?>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#archive-filters').find('input[type="radio"]').prop('checked', false);
		var searchParams = new URLSearchParams(window.location.search)
		let param = searchParams.getAll('categoria')
		$("#queryResult").html(param[0]);

		$('#archive-filters').on('change', 'input[type="radio"]', function() {

			// vars
			var url = '<?php echo home_url('projetos'); ?>';
			args = {};


			// loop over filters
			$('#archive-filters .filter').each(function() {

				// vars
				var filter = $(this).data('filter'),
					vals = [];


				// find checked inputs
				$(this).find('input:checked').each(function() {

					vals.push($(this).val());

				});


				// append to args
				args[filter] = vals.join(',');

			});


			// update url
			url += '?';


			// loop over args
			$.each(args, function(name, value) {

				url += name + '=' + value + '&';

			});


			// remove last &
			url = url.slice(0, -1);


			// reload page
			window.location.replace(url);


		});
	});
</script>
<?php get_footer(); ?>