<div class="comments-wrapper">


    <div class="comments" id="comments">


        <div class="comments-header">

            <h4 class="comment-reply-title">
                <?php
                if (comments_open()) {
                    if (!have_comments()) {
                        echo "Leave a comment";
                    } else {
                        echo get_comments_number() . " comments";
                    }
                }

                ?>
            </h4><!-- .comments-title -->

        </div><!-- .comments-header -->

        <div class="comments-inner">
            <?php
            wp_list_comments(array(
                'avatar_size' => 120,
                'style' => 'div'

            ));

            ?>
        </div><!-- .comments-inner -->

    </div><!-- comments -->

    <!-- <hr class="" aria-hidden="true"> -->
    <?php
    if (comments_open()) {
        comment_form(
            array(
                'class-form' => '',
                'title-reply-before' => '<h5 id="reply_title" >',
                'title-reply-after' => '</h5>'
            )
        );
    } else {
        echo "<h5 class ='text-center'>Sorry comments are closed</h5>";
    }




    ?>

</div>