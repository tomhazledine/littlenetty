<?php include"header.php"; ?>

<section id="homeContent" class="homeContent">
    <?php if (have_posts()) :
        while (have_posts()) :
            the_post();
            ?>

            <?php the_content(); ?>
            
            <?php get_template_part('module','mailchimp'); ?>

            <?php
        endwhile;
    endif; ?>
</section>

<?php include"footer.php"; ?>