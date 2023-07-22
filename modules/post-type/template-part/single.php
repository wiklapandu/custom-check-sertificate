<?php
    
wp_head();

while (have_posts()) : the_post();
    require __DIR__ . '/single-content.php';
endwhile;

wp_footer();