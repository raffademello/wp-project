<?php 
/**
** get_header() pulls in the header.php file. it also allows header hooks to run
** making it possible for scripts, styles, etc. to load
*/
get_header(); 
?>

<?php 
/**
** if (have_posts()) checks to see if any posts exist,
** before we loop through them
*/
if (have_posts()) : 
?>
  <h1>Index Template</h1>
  <ul>
  <?php 
    /**
    ** while(have_posts()) : the_post() sets up all the post data 
    ** so we can loop through posts and 
    ** display information associated with each
    */
    while(have_posts()) : the_post(); 
    ?>
    <li><a href="<?php the_permalink(); ?><?php the_title(); ?></a></li>
    <?php 
    /** 
    ** the_permalink() and the_title() are two examples 
    ** of functions available 
    ** within the loop (they link to each post by showing their title)
    */
    ?>
  <?php endwhile; ?>
  </ul>
<?php endif; ?>
<?php 
/**
** get_footer() pulls in footer.php and 
** lets hooks and filters run in the footer
*/
get_footer(); ?>