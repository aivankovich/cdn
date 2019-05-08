<?php get_header(); ?>

    <div class="first__block wrap">
        <div class="breadcrumbs flex">
            <?php if(pll_current_language() == 'ru') { ?>
                <a href="/">Главная</a>
            <?php } else { ?>
                <a href="/en/">Home</a>
            <?php }
            
if(is_singular('solutions')) { ?>
                <p><?php the_title(); ?></p>
            </div>
            <h1><?php the_title(); ?></h1>
            <div class="flex">
                <div class="content">
                    <div>
                        <?php the_field('description_solution'); ?>
                    </div>
                    <p><a class="price" href="<?php if(pll_current_language() == 'ru') { echo '/tarify/'; } else { echo '/en/pricing/'; } ?>"> <?php the_field('price'); ?></p></a>
                    <a class="read__more"><?php if(pll_current_language() == 'ru') { echo 'Подробнее'; } else { echo 'Read more'; } ?></a>
                </div>
                <?php $form_toggle = get_field('form_toggle');
                if($form_toggle) { ?>
                    <div class="form">
                        <?php if(pll_current_language() == 'ru') { echo (do_shortcode('[contact-form-7 id="251" title="Мини-контактная форма"]')); } else { echo (do_shortcode('[contact-form-7 id="591" title="Mini contact form"]')); } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php $clients = get_field('clients_hover');
    if ($clients) { ?>
        <div class="clients clients-solution">
            <div class="wrap">
                <h2 class="title"><?php if (pll_current_language() == 'ru') {
                        echo 'Наши услуги выбрали:';
                    } else {
                        echo 'Our valued customers:';
                    } ?></h2>
                <div class="clients__desctop__slider owl-carousel owl-theme">
                    <?php foreach ($clients as $client) { ?>
                        <div class="client grayscale" style="background: url(<?php echo ($client['url']); ?>) no-repeat; background-size: contain; background-position: center 0;"></div>
                    <?php } ?>
                </div>

                <div class="clients__mobile__slider owl-carousel owl-theme">
                    <?php foreach ($clients as $client) { ?>
                        <div class="client"
                             style="background: url(<?php echo($client['url']); ?>) no-repeat; background-size: contain; background-position: center;"></div>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php } ?>
    <div class="adv__solution__block">
        <div class="wrap">
            <h2 class="title"><?php if(pll_current_language() == 'ru') { echo 'Преимущества продукта'; } else { echo 'Solution benefits'; } ?></h2>
            
            <div class="scrollbar-inner">
                <div class="adv__solution flex">
                    <?php $adv_solution = get_field('adv_solution');
                    foreach ($adv_solution as $adv_solution_item) { ?>
                        <div class="adv__solution__item">
                            <div class="img__adv__solution" style="background: url(<?php echo ($adv_solution_item['img_adv_solution']); ?>) no-repeat; background-size: auto; background-position: center center;"></div>
                            <p><?php echo ($adv_solution_item['text_adv_solution']); ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            
            <div class="adv__solution__mobile__slider owl-carousel owl-theme">
                <?php foreach ($adv_solution as $adv_solution_item) { ?>
                    <div class="adv__solution__item">
                        <div class="img__adv__solution" style="background: url(<?php echo ($adv_solution_item['img_adv_solution']); ?>) no-repeat; background-size: auto; background-position: 0 center;"></div>
                        <p><?php echo ($adv_solution_item['text_adv_solution']); ?></p>
                    </div>
                <?php } ?>
            </div>
            
            <?php $special_offers = get_field('special_offers');
            if($special_offers) { ?>
                <div class="special__offers">
                    <h3><?php if(pll_current_language() == 'ru') { echo 'СПЕЦПРЕДЛОЖЕНИЯ'; } else { echo 'SPECIAL OFFERS'; } ?></h3>

                    <div>
                        <?php foreach ($special_offers as $special_offer) { ?>
                            <div class="special__offer">
                                <div class="img__special__offer" style="background: url(<?php echo ($special_offer['img_special_offer']); ?>) no-repeat; background-size: cover; background-position: center;"></div>
                                <a href="<?php echo ($special_offer['link_special_offer']); ?>" target="_blank"><?php echo ($special_offer['text_special_offer']); ?></a>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="special__offers__mobile__slider owl-carousel owl-theme">
                        <?php foreach ($special_offers as $special_offer) { ?>
                            <div class="special__offer">
                                <div class="img__special__offer" style="background: url(<?php echo ($special_offer['img_special_offer']); ?>) no-repeat; background-size: cover; background-position: center;"></div>
                                <a href="<?php echo ($special_offer['link_special_offer']); ?>" target="_blank"><?php echo ($special_offer['text_special_offer']); ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="additional__services">
        <div class="wrap">
            <h2 class="title"><?php if(pll_current_language() == 'ru') { echo 'Дополнительные услуги'; } else { echo 'Additional services'; } ?></h2>
            
            <?php $additional_services = get_field('additional_services_solution');
            foreach ($additional_services as $additional_service) { ?>
                <div class="additional__service">
                    <h3><?php echo ($additional_service['title_additional_service_solution']); ?></h3>
                    <p><?php echo ($additional_service['text_additional_service_solution']); ?></p>
                    <a href="<?php echo ($additional_service['link_additional_service_solution']); ?>"><?php if(pll_current_language() == 'ru') { echo 'Подробнее'; } else { echo 'Read more'; } ?></a>
                </div>
            <?php } ?>
        </div>
    </div>


    <?php $cases_solution = get_field('cases_solution');
    if($cases_solution) { ?>
        <div class="cases__solution">
            <div class="wrap">
                <h2 class="title"><?php if(pll_current_language() == 'ru') { echo 'Реализованные кейсы'; } else { echo 'Related Case Studies'; } ?></h2>

                <div class="flex">
                    <?php foreach ($cases_solution as $case_solution) { ?>
                        <div class="case__solution">
                            <div class="img__case__solution" style="background: url(<?php echo ($case_solution['img_case_solution']); ?>) no-repeat; background-size: cover; background-position: center;"></div>
                            <h3><?php echo ($case_solution['title_case_solution']); ?></h3>
                            <p><?php echo ($case_solution['text_case_solution']); ?></p>
                            <a href="<?php echo ($case_solution['link_case_solution']); ?>"><?php if(pll_current_language() == 'ru') { echo 'Подробнее'; } else { echo 'Read more'; } ?></a>
                        </div>
                    <?php } ?>
                </div>

                <div class="cases__solution__mobile__slider owl-carousel owl-theme">
                    <?php foreach ($cases_solution as $case_solution) { ?>
                        <div class="case__solution">
                            <div class="img__case__solution" style="background: url(<?php echo ($case_solution['img_case_solution']); ?>) no-repeat; background-size: cover; background-position: center;"></div>
                            <h3><?php echo ($case_solution['title_case_solution']); ?></h3>
                            <p><?php echo ($case_solution['text_case_solution']); ?></p>
                            <a href="<?php echo ($case_solution['link_case_solution']); ?>"><?php if(pll_current_language() == 'ru') { echo 'Подробнее'; } else { echo 'Read more'; } ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="form__block form__block-solution">
        <div class="wrap">
            <?php if(pll_current_language() == 'ru') { echo (do_shortcode('[contact-form-7 id="255" title="Контактная форма на странице Решения"]')); } else { echo (do_shortcode('[contact-form-7 id="256" title="Contact form on the solutions page"]')); } ?>
        </div>
    </div>

    <?php if(get_field('how_it_works_video')){ ?>
        <div class="how__it__works">
            <div class="wrap">
                <div class="flex">
                    <div class="content">
                        <span><?php if(pll_current_language() == 'ru') { echo 'Посмотрите короткое&nbsp;видео,<br /> как это работает'; } else { echo 'See the short video<br /> about it'; } ?></span>
                    </div>
                    <div data-video="<?php the_field('how_it_works_video') ?>" id="player-0" class="player"></div>
                </div>
            </div>
        </div>
    <?php } ?>


    <div class="reviews reviews-solution">
        <div class="wrap">
            <h2 class="title"><?php the_field('title_reviews_block', pll_get_post(12)); ?></h2>
            <div class="reviews__slider__solution owl-carousel owl-theme">
                <?php $slider = get_field('reviews', pll_get_post(12));
                foreach ($slider as $slide) { ?>
                    <div class="item">
                        <div class="review">
                            <?php echo ($slide['review']); ?>
                        </div>
                        <a class="show__review"><?php if(pll_current_language() == 'ru') { echo 'Показать полностью'; } else { echo 'Show full text'; } ?></a>
                        <div class="flex">
                            <div>
                                <p class="author__review"><?php echo ($slide['author_review']); ?></p>
                                <p class="company__review"><?php echo ($slide['author_company_review']); ?></p>
                            </div>
                            <?php if($slide['logo_company_review']) { ?>
                                <div class="logo__company" style="background: url(<?php echo ($slide['logo_company_review']); ?>) no-repeat; background-size: contain; background-position: 100% center;"></div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    
<?php } else if(is_singular('industry')) { ?>

                <p><?php the_title(); ?></p>
            </div>
            <h1><?php the_title(); ?></h1>
            <div class="flex">
                <div class="content">
                    <?php the_field('description_industry'); ?>
                </div>
                <?php $form_toggle = get_field('form_toggle');
                if($form_toggle) { ?>
                    <div class="form">
                        <?php if(pll_current_language() == 'ru') { echo (do_shortcode('[contact-form-7 id="251" title="Мини-контактная форма"]')); } else { echo (do_shortcode('[contact-form-7 id="252" title="Mini contact form"]')); } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


<?php $clients = get_field('clients_hover');
    if ($clients) { ?>
        <div class="clients clients-solution">
            <div class="wrap">
                <h2 class="title"><?php if (pll_current_language() == 'ru') {
                        echo 'Наши услуги выбрали:';
                    } else {
                        echo 'Our valued customers:';
                    } ?></h2>
                <div class="clients__desctop__slider owl-carousel owl-theme">
                    <?php foreach ($clients as $client) { ?>
                        <div class="client grayscale" style="background: url(<?php echo ($client['url']); ?>) no-repeat; background-size: contain; background-position: center 0;"></div>
                    <?php } ?>
                </div>

                <div class="clients__mobile__slider owl-carousel owl-theme">
                    <?php foreach ($clients as $client) { ?>
                        <div class="client"
                             style="background: url(<?php echo($client['url']); ?>) no-repeat; background-size: contain; background-position: center;"></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="industry">
        <div class="wrap flex">
            <?php $solutions_industry = get_field('solutions_industry');
            if($solutions_industry) { ?>
                <div class="solutions__industry">
                    <?php foreach ($solutions_industry as $solution_industry) { ?>
                        <div class="solution__industry">
                            <h3><?php echo ($solution_industry['title_solution_industry']); ?></h3>
                            <div class="flex">
                                <div class="img__solution__industry" style="background: url(<?php echo ($solution_industry['img_solution_industry']); ?>) no-repeat; background-size: cover; background-position: center;"></div>
                                <div>
                                    <p><?php echo ($solution_industry['text_solution_industry']); ?></p>
                                    <a href="<?php echo ($solution_industry['link_solution_industry']); ?>"><?php if(pll_current_language() == 'ru') { echo 'Подробнее'; } else { echo 'Read more'; } ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            
                <div class="solution__industry__mobile__slider owl-carousel owl-theme">
                    <?php foreach ($solutions_industry as $solution_industry) { ?>
                        <div class="solution__industry">
                            <h3><?php echo ($solution_industry['title_solution_industry']); ?></h3>
                            <div class="flex">
                                <div class="img__solution__industry" style="background: url(<?php echo ($solution_industry['img_solution_industry']); ?>) no-repeat; background-size: cover; background-position: center;"></div>
                                <div>
                                    <p><?php echo ($solution_industry['text_solution_industry']); ?></p>
                                    <a href="<?php echo ($solution_industry['link_solution_industry']); ?>"><?php if(pll_current_language() == 'ru') { echo 'Подробнее'; } else { echo 'Read more'; } ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            
        <?php $cases_industry = get_field('cases_industry');
            if($cases_industry) { ?>
                <div class="cases__industry">
                    <h2><?php if(pll_current_language() == 'ru') { echo 'РЕАЛИЗОВАННЫЕ КЕЙСЫ'; } else { echo 'RELATED CASE STUDIES'; } ?></h2>

                    <div>
                        <?php foreach ($cases_industry as $case_industry) { ?>
                            <div class="case__industry">
                                <h3><?php echo ($case_industry['title_case_industry']); ?></h3>
                                <div class="img__case__industry" style="background: url(<?php echo ($case_industry['img_case_industry']); ?>) no-repeat; background-size: cover; background-position: center;"></div>
                                <p><?php echo ($case_industry['text_case_industry']); ?></p>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="cases__industry__mobile__slider owl-carousel owl-theme">
                        <?php foreach ($cases_industry as $case_industry) { ?>
                            <div class="case__industry">
                                <h3><?php echo ($case_industry['title_case_industry']); ?></h3>
                                <div class="img__case__industry" style="background: url(<?php echo ($case_industry['img_case_industry']); ?>) no-repeat; background-size: cover; background-position: center;"></div>
                                <p><?php echo ($case_industry['text_case_industry']); ?></p>
                            </div>
                        <?php } ?>
                    </div>


                </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="form__block">
        <div class="wrap">
            <?php if(pll_current_language() == 'ru') { echo (do_shortcode('[contact-form-7 id="558" title="Контактная форма на странице Отрасли"]')); } else { echo (do_shortcode('[contact-form-7 id="559" title="Contact form on the industry page"]')); }?>
        </div>
    </div>


    <?php if(get_field('how_it_works_video')){ ?>
        <div class="how__it__works">
            <div class="wrap">
                <div class="flex">
                    <div class="content">
                        <span><?php if(pll_current_language() == 'ru') { echo 'Посмотрите короткое&nbsp;видео,<br /> как это работает'; } else { echo 'See the short video<br /> about it'; } ?></span>
                    </div>
                    <div data-video="<?php the_field('how_it_works_video') ?>" id="player-0" class="player"></div>
                </div>
            </div>
        </div>
    <?php } ?>


<div class="reviews reviews-solution">
    <div class="wrap">
        <h2 class="title"><?php the_field('title_reviews_block', pll_get_post(12)); ?></h2>
        <div class="reviews__slider__solution owl-carousel owl-theme">
            <?php $slider = get_field('reviews', pll_get_post(12));
            foreach ($slider as $slide) { ?>
                <div class="item">
                    <div class="review">
                        <?php echo ($slide['review']); ?>
                    </div>
                    <a class="show__review"><?php if(pll_current_language() == 'ru') { echo 'Показать полностью'; } else { echo 'Show full text'; } ?></a>
                    <div class="flex">
                        <div>
                            <p class="author__review"><?php echo ($slide['author_review']); ?></p>
                            <p class="company__review"><?php echo ($slide['author_company_review']); ?></p>
                        </div>
                        <?php if($slide['logo_company_review']) { ?>
                            <div class="logo__company" style="background: url(<?php echo ($slide['logo_company_review']); ?>) no-repeat; background-size: contain; background-position: 100% center;"></div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<?php } else if(is_singular('cases')) { ?>

                <?php if(pll_current_language() == 'ru') { ?>
                    <a href="/cases/">Наши кейсы</a>
                <?php } else { ?>
                    <a href="/en/cases/">Our cases</a>
                <?php } ?>
                <p><?php the_title(); ?></p>
            </div>
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    
    <div class="case">
        <div class="wrap">
            <div class="flex">
                <div class="img__case" style="background: url(<?php the_field('logo_case'); ?>) no-repeat; background-size: contain; background-position: center;"></div>
                <p><?php if(pll_current_language() == 'ru') { echo 'Заказчик'; } else { echo 'Customer'; } ?>: <?php the_field('customer_case'); ?></p>
            </div>
            <div class="tasks__case">
                <h2 class="title"><?php if(pll_current_language() == 'ru') { echo 'Поставленные задачи'; } else { echo 'Tasks'; } ?></h2>
                <ul>
                    <?php $tasks = get_field('tasks_case');
                    foreach ($tasks as $task) { ?>
                        <li><?php echo ($task['task_case']); ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="case__description wrap">
        <h2 class="title"><?php if(pll_current_language() == 'ru') { echo 'Описание решения'; } else { echo 'Description of the solution'; } ?></h2>
        <div class="content">
            <?php the_field('description_case'); ?>
        </div>
        <?php if(get_field('img_description_case')){ ?>
            <div class="img__description__case" style="background: url(<?php the_field('img_description_case'); ?>) no-repeat; background-size: cover; background-position: center;"></div>
        <?php } ?>
        <?php
        if(!get_field('left_description_case') && !get_field('left_description_case')){

        }else{?>
            <div class="flex">
                <div class="left__description__case content">
                    <?php the_field('left_description_case'); ?>
                </div>

                <div class="right__description__case content">
                    <?php the_field('right_description_case'); ?>
                </div>
            </div>
        <?php } ?>
    </div>

<?php } else if(is_singular('events')) { ?>
                
                <?php if(pll_current_language() == 'ru') { ?>
                    <a href="/events/">Мероприятия</a>
                <?php } else { ?>
                    <a href="/en/events/">Events</a>
                <?php } ?>
                <p><?php the_title(); ?></p>
            </div>
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    
    <div class="event wrap flex">
        <div class="content">
            <?php the_content(); ?>
        </div>
        
        <sidebar class="info__event">
            <div class="info__event__up">
                <div class="img__event" style="background: url(<?php the_field('logo_event'); ?>) no-repeat; background-size: cover; background-position: center;"></div>
                
                <div>
                    <?php $start_date = explode('-', get_field('date_start_event'));
                    $finish_date = explode('-', get_field('date_finish_event'));
                                        
                    if(pll_current_language() == 'ru') {
                        $months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
                    } else {
                        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                    } ?>

                    <p><span><?php if($start_date[0]){ echo ($start_date[0]); } ?></span> <?php if($start_date[1]){ echo ($months[$start_date[1] - 1]); } ?> - </p>
                    <p><span><?php if($finish_date[0]){ echo ($finish_date[0]); } ?></span> <?php if($finish_date[1]){ echo ($months[$finish_date[1] - 1]); } ?></p>
                    <p><?php the_field('time_start_event'); ?> - <?php the_field('time_finish_event'); ?></p>
                </div>
            </div>
            
            <div class="info__event__down">
                <?php if (get_field('address_event')){ ?>
                    <p><?php if(pll_current_language() == 'ru') { echo 'АДРЕС'; } else { echo 'ADDRESS'; } ?></p>
                    <p><?php the_field('address_event'); ?></p>
                <?php } ?>
                <?php if (get_field('status_event')){ ?>
                    <p><?php if(pll_current_language() == 'ru') { echo 'СТАТУС'; } else { echo 'STATUS'; } ?></p>
                    <p><?php the_field('status_event'); ?></p>
                <?php } ?>
                <?php if (get_field('speaker_event')){ ?>
                    <p><?php if(pll_current_language() == 'ru') { echo 'ДОКЛАДЧИК'; } else { echo 'SPEAKER'; } ?></p>
                    <p><?php the_field('speaker_event'); ?></p>
                <?php } ?>
                <?php if (get_field('stand_number_event')){ ?>
                    <p><?php if(pll_current_language() == 'ru') { echo 'НОМЕР СТЕНДА'; } else { echo 'STAND NUMBER'; } ?></p>
                    <p><?php the_field('stand_number_event'); ?></p>
                <?php } ?>
            </div>
        </sidebar>
    </div>
    
    <div class="form__block form__block-event">
        <div class="wrap">
            <?php if(pll_current_language() == 'ru') { echo (do_shortcode('[contact-form-7 id="257" title="Контактная форма на странице мероприятия"]')); } else { echo (do_shortcode('[contact-form-7 id="258" title="Contact form on the event page"]')); } ?>
        </div>
    </div>
    
<?php } else { ?>

                <p><?php the_title(); ?></p>
            </div>
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
   
    <article class="wrap">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <div class="content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>
    </article>

<?php } ?>

<?php get_footer(); ?>