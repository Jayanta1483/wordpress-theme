<h3><a href="<?php the_permalink();     ?>" target="__blank" class="link-decoration"><?php the_title(); ?></a></h3>
<small>Posted on <?php the_time('F j,Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(); ?></small>
<img src="<?php the_post_thumbnail_url('thumbnail');  ?>" alt="">
<p><?php the_excerpt(); ?></p>
<a href="<?php the_permalink();   ?>" target="_blank">Read more&rarr;</a>