<article class="homePost">
    <div class="postHeader">
        <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
        <div class="postMeta">
            Posted by <span class="authorLink"><?php the_author(); ?></span> on <?php the_date(); ?>
        </div>
    </div>

    <?php if(has_post_thumbnail()){ ?>
        <div class="postThumbnail">
            <?php the_post_thumbnail(); ?>
            <?php the_post_thumbnail_caption(); ?>
        </div>
    <?php } ?>
    
    <div class="postWrapper">
        <?php the_content(); ?>

        <div class="postFooter clearfix">

            <div class="authorMeta clearfix">
                <div class="authorAvatar">
                    <img class="authorAvatarInner" src="<?php if(get_wp_user_avatar()){ echo get_wp_user_avatar_src(); } ?>"/>
                    <div class="authorAvatarFilter"></div>
                </div>
                <div class="authorInfo">
                    <h3>Posted by <?php the_author(); ?></h3>
                    <a href="<?=get_author_posts_url(get_the_author_meta( 'ID' ));?>">View all posts by <?php the_author(); ?></a>
                </div>
            </div>
        </div>
    </div>
</article>
