<?php get_header(); ?> 

    <div class="first__block wrap">
        <?php if(pll_current_language() == 'ru') { ?>
            <h1>Ошибка 404</h1>
            <p>Данная страница не найдена, либо ее не существует.</p>
        <?php } else { ?>
            <h1>Error 404</h1>
            <p>This page was not found, or it does not exist.</p>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>