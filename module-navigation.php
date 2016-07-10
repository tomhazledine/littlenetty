<div class="pagenaviBox clearfix">
    <?php if(function_exists('wp_pagenavi')) {?>

        <div class="pagenaviInner clearfix <?php
            $pageNumber = get_query_var('paged');
        ?>">
            <?php wp_pagenavi(); ?>
        </div>
    <?php } else { ?>
        <div class="prev fallback"><?php previous_posts_link( '« Newer Entries' ); ?></div>
        <div class="next fallback"><?php next_posts_link('Older Entries »', 0); ?></div>
    <?php } ?>
</div>