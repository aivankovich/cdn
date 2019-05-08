<!DOCTYPE html><html><head>    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    <meta name="viewport" content="width=device-width, initial-scale=1">    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">    <title><?php wp_title(); ?></title>        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico">    <?php wp_head(); ?></head><body <?php body_class($class); ?>><?php if(get_field('toolbar_news_intro')) { ?>    <div class="top__new">        <div class="wrap flex">            <p><?php if(pll_current_language() == 'ru') { echo 'НОВОСТИ'; } else { echo 'NEWS'; } ?></p>            <div class="flex">                <p><?php the_field('toolbar_news_intro') ?></p>                <a href="<?php the_field('toolbar_news_link') ?>"><?php if(pll_current_language() == 'ru') { echo 'Подробнее'; } else { echo 'Read More'; } ?></a>            </div>            <span class="hide__top__new"></span>        </div>    </div><?php } ?><?php if(is_post_type_archive()) {    if(is_post_type_archive('cases')) {        $bg = 'cases';    } else if (is_post_type_archive('events')) {        $bg = 'events';    } ?>    <div class="bg__page" style="background: url(<?php bloginfo('template_url'); ?>/img/<?php echo ($bg); ?>.jpg) no-repeat; background-size: cover; background-position: center;">    <?php } else { ?>    <div class="bg__page" style="background: url(<?php the_post_thumbnail_url('full'); ?>) no-repeat; background-size: cover; background-position: center;"><?php } ?>       <header class="wrap">        <div class="flex">            <div class="flex">                <a href="/<?php if(pll_current_language() == 'en') { echo 'en/'; } ?>" class="header__logo img"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="CDN-Video"></a>                                <form class="search__form flex" action="<?php bloginfo('url'); ?>" method="get">                    <input type="submit" value="">                    <input type="search" name="s" value="">                </form>            </div>            <div class="flex">                <nav class="header__menu">                    <?php wp_nav_menu(array('theme_location' => 'header_menu', 'container' => '')); ?>                </nav>                                <?php if(pll_current_language() == 'ru') { ?>                    <ul class="lang flex"><?php pll_the_languages(array('show_names' => 0, 'show_flags' => 1, 'hide_current' => 1)); ?></ul>                <?php } ?>                                <a href="tel:<?php if(pll_current_language() == 'ru') { echo get_option('our_phone'); } else { echo get_option('our_phone_en'); } ?>" class="tel"><?php if(pll_current_language() == 'ru') { echo get_option('our_phone'); } else { echo get_option('our_phone_en'); } ?></a>                <a class="login" href="<?php if(pll_current_language() == 'ru') { echo 'https://my.cdnvideo.ru/ru/login/'; } else { echo 'https://my.cdnvideo.ru/en/login/'; } ?>"><?php if(pll_current_language() == 'ru') { echo 'Войти'; } else { echo 'Login'; } ?></a>                <label for="mobile__menu__toggle" class="mobile__menu__toggle" onclick><span></span></label>            </div>        </div>        <?php if(pll_current_language() == 'ru') { ?>            <a class="modal__open btn try__free" data-modal="modal-0">ПОПРОБОВАТЬ БЕСПЛАТНО</a>        <?php } else { ?>            <a href="https://www.cdnvideo.com/welcome/" class="btn try__free">TRY FREE</a>        <?php } ?>        <input type="checkbox" id="mobile__menu__toggle" hidden>        <nav class="mobile__menu">            <?php wp_nav_menu(array('theme_location' => 'header_menu', 'container' => '')); ?>        </nav>        <div class="menu__overlay"></div>    </header>