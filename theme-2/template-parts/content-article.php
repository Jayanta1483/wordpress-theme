<p><?php
    the_content(); ?></p>
<div class="row">
    <div class="col text-left"><h4><?php previous_post_link();    ?></h4></div>
    <div class="col text-right"><h4><?php next_post_link();    ?></h4></div>
</div>
</hr>

<?php comments_template(); ?>