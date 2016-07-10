<?php include"header.php"; ?>

<div class="singlePost">

    <section class="mainContent blog">

        <?php if (have_posts()) :
            while (have_posts()) : the_post();
                // The Main Content Lives Here
                get_template_part('content','single');
                
            endwhile;
        else : ?>

            <h2>Not Found</h2>

        <?php endif; ?>
    </section>

</div>

<?php include"footer.php"; ?>
