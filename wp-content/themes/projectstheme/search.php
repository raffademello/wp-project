<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <div class="container">
    <?php while (have_posts()) : the_post(); ?>
      <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></p>
    <?php endwhile; ?>
  </div><!-- END container -->
<?php elseif : ?>
  <h2>No posts found</h2>
<?php endif; ?>
<?php get_footer(); ?>