<?php get_header(); ?> 
    
    <?php if(is_post_type_archive('cases')) {
        if(pll_current_language() == 'ru') {
            $title_post_type = 'Наши кейсы';
        } else {
            $title_post_type = 'Our cases';
        }
    } else if(is_post_type_archive('events')) {
        if(pll_current_language() == 'ru') {
            $title_post_type = 'Мероприятия';
        } else {
            $title_post_type = 'Events';
        }
    } ?>
    
    <div class="first__block wrap">
        <div class="breadcrumbs flex">
            <?php if(pll_current_language() == 'ru') { ?>
                <a href="/">Главная</a>
            <?php } else { ?>
                <a href="/en/">Home</a>
            <?php } ?>
            <p><?php echo ($title_post_type); ?></p>
        </div>
        <h1><?php echo ($title_post_type); ?></h1>
    </div>
</div>

<?php if(is_post_type_archive('cases')) { ?>
   
    <div class="cases wrap">
        <?php $item = new WP_Query (array('post_type' => 'cases', 'post__not_in' => array('188'), 'order' => 'ASC', 'posts_per_page' => '-1'));
        if ($item->have_posts()) : while($item->have_posts()) : $item->the_post(); ?>
            <div class="cases__item flex">
                <div class="img__cases__item" style="background: url(<?php the_field('logo_case'); ?>) no-repeat; background-size: contain; background-position: center;"></div>
                <div>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_field('short_description_case'); ?></p>
                    <a href="<?php the_permalink(); ?>"><?php if(pll_current_language() == 'ru') { echo 'Заказчик'; } else { echo 'Customer'; } ?>: <?php the_field('customer_case'); ?></a>
                    <a href="<?php the_permalink(); ?>"><?php if(pll_current_language() == 'ru') { echo 'Подробнее'; } else { echo 'More'; } ?></a>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>

<?php } else if(is_post_type_archive('events')) { ?>
    
    <div class="events wrap">
        <?php $item = new WP_Query (array('post_type' => 'events', 'post__not_in' => array('194'), 'order' => 'ASC', 'posts_per_page' => '-1'));
        if ($item->have_posts()) : while($item->have_posts()) : $item->the_post(); ?>
           
            <div class="events__item flex">
                <div>
                    <div class="date__events__item">
                        <?php $date = explode('-', get_field('date_start_event'));
                        if(pll_current_language() == 'ru') {
                            $months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
                        } else {
                            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        }
                        
                        $start_date = date_create(get_field('date_start_event'));
                        $finish_date = date_create(get_field('date_finish_event')); 
                        $diff_date = date_diff($start_date, $finish_date)->d + 1;
                                                 
                        if(pll_current_language() == 'ru') {
                            if($diff_date % 10 == 1) {
                                $day = 'день';
                            } else if($diff_date % 10 > 1 && $diff_date % 10 < 5) {
                                $day = 'дня';
                            } else {
                                $day = 'дней';
                            }
                        } else {
                            if($diff_date == 1) {
                                $day = 'day';
                            } else {
                                $day = 'days';
                            }
                        } ?>

                        <p><span><?php echo ($date[0]); ?></span> <?php echo ($months[$date[1] - 1]); ?></p>
                        <p><span><?php echo ($diff_date); ?></span> <?php echo ($day); ?></p>
                        <p><?php the_field('address_event'); ?></p>
                    </div>
                
                    <div class="img__events__item" style="background: url(<?php the_field('logo_event'); ?>) no-repeat; background-size: auto; background-position: center;"></div>
                </div>
                
                <div>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_field('description_event'); ?></p>
                    <a href="<?php the_permalink(); ?>"><?php if(pll_current_language() == 'ru') { echo 'Подробнее'; } else { echo 'More'; } ?></a>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
    
<?php } ?>

<?php get_footer(); ?>