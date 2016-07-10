<article class="homePost">

    <div class="postHeader">
        <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
        <div class="postMeta">
            Posted by <span class="authorLink"><?php the_author(); ?></span> on <?php the_date(); ?>
        </div>
    </div>

    <?php if(has_post_thumbnail()){ ?>
        <div class="postThumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php } ?>
    
    <div class="postWrapper">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="readMore">Read more</a>
    </div>

</article>
