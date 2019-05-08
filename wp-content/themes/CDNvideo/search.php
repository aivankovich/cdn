<?php get_header(); ?> 

    <div class="first__block wrap">
        <div class="breadcrumbs flex">
            <?php if(pll_current_language() == 'ru') { ?>
                <a href="/">Главная</a>
                <p>Результаты поиска</p>
            <?php } else { ?>
                <a href="/en/">Home</a>
                <p>Searching results</p>
            <?php } ?>
        </div>
        <h1>Результаты поиска: «<?php echo $_GET['s'];?>»</h1>
    </div>
</div>

<div class="searching__results wrap">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <h3><a href="<?php the_permalink(); ?>"><?php relevanssi_the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
    <?php endwhile; else: ?>
        <h3>По запросу «<?php echo $_GET['s'];?>» ничего не найдено.</h3>
    <?php endif;?>
</div>

<?php get_footer(); ?>